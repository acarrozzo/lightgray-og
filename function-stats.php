<?php
// ---------------------------------------------------------------------------
// recomputeStatMods()
//
// Single authoritative computation of a player's effective combat stat mods
// (strmod / dexmod / magmod / defmod) and persistence to the DB columns.
//
// Previously these were only computed as a side-effect of rendering the stats
// panel (stats.php), which is NOT in the combat request path -- so combat read
// stale/zero $_SESSION mods (e.g. 0 damage on a fresh login, equipment bonuses
// not applying until the panel was opened). This function makes the DB the
// single source of truth: it runs on every page load before combat/HUD read
// the mods, and all consumers read the DB column ($row['strmod'] ...).
//
// It reuses the exact arithmetic that the stats panel uses:
//   - Equipment bonuses come from include()'ing the 14 buff-*.php files inside
//     an output buffer (their HTML "badges" are discarded; their $_SESSION mod
//     mutations are kept). This avoids re-transcribing hundreds of item values.
//   - Skill / weapon / proficiency / temp-buff / shield / ironskin math is
//     ported from stats.php (~lines 665-970), arithmetic only (no display, no
//     core-point buttons, and skipping the buggy intermediate updateStats()
//     calls -- the panel overwrites them with the correct final value anyway).
//
// Requires: getUserData() and updateStats() from functions.php.
// ---------------------------------------------------------------------------

if (!function_exists('recomputeStatMods')) {

function recomputeStatMods($link, $username) {
    $row = getUserData($link, $username); // base stats + equipment + skills from DB

    // ----- seed mods from BASE stats (mirrors stats.php:433-436)
    $_SESSION['strmod'] = (int)$row['str'];
    $_SESSION['dexmod'] = (int)$row['dex'];
    $_SESSION['magmod'] = (int)$row['mag'];
    $_SESSION['defmod'] = (int)$row['def'];

    // The buff-*.php files also += into these; reset before the includes so they
    // don't accumulate unbounded across requests (mirrors stats.php:443-444;
    // maxmod is never reset by the panel -- a latent bug -- but nothing reads it,
    // so resetting here is safe and keeps recompute side-effect-clean).
    $_SESSION['healthregen'] = 0;
    $_SESSION['manaregen']   = 0;
    $_SESSION['maxmod']      = 0;

    // ----- EQUIPMENT BONUSES: reuse buff-*.php, discard their HTML badges.
    // Same slot order/conditions as stats.php:464-585. These read $row and
    // mutate $_SESSION['..mod']; the empty-slot sentinel is '<span> - - - </span>'.
    ob_start();
    include('buff-right.php');
    include('buff-left.php');
    include('buff-head.php');
    include('buff-body.php');
    include('buff-hands.php');
    include('buff-feet.php');
    if ($row['equipRing1'] != '<span> - - - </span>') { include('buff-ring1.php'); }
    if ($row['equipRing2'] != '<span> - - - </span>') { include('buff-ring2.php'); }
    if ($row['equipNeck']  != '<span> - - - </span>') { include('buff-neck.php'); }
    if ($row['equipAura']  != '<span> - - - </span>') { include('buff-aura.php'); }
    if ($row['equipComp']  != '<span> - - - </span>') { include('buff-comp.php'); }
    if ($row['equipPet']   != '<span> - - - </span>') { include('buff-pet.php'); }
    if ($row['equipMount'] != '<span> - - - </span>') { include('buff-mount.php'); }
    if ($row['equipArtifact'] != '<span> - - - </span>') { include('buff-artifact.php'); }
    ob_end_clean();

    // read back equipment-adjusted mods to continue with skill/weapon math
    $strmod = (int)$_SESSION['strmod'];
    $dexmod = (int)$_SESSION['dexmod'];
    $magmod = (int)$_SESSION['magmod'];
    $defmod = (int)$_SESSION['defmod'];

    // ----- skill locals (stats.php:51-60)
    $weapontype   = $row['weapontype'];
    $onehanded    = $row['onehanded'];
    $twohanded    = $row['twohanded'];
    $ranged       = $row['ranged'];
    $onehandedpro = $row['onehandedpro'];
    $twohandedpro = $row['twohandedpro'];
    $rangedpro    = $row['rangedpro'];
    $warcraft     = $row['warcraft'];

    // temp-buff session counters (consumables that tick down in combat)
    $reds    = !empty($_SESSION['reds'])    ? $_SESSION['reds']    : 0;
    $greens  = !empty($_SESSION['greens'])  ? $_SESSION['greens']  : 0;
    $blues   = !empty($_SESSION['blues'])   ? $_SESSION['blues']   : 0;
    $yellows = !empty($_SESSION['yellows']) ? $_SESSION['yellows'] : 0;
    $coffee  = !empty($_SESSION['coffee'])  ? $_SESSION['coffee']  : 0;
    $ironskin_amount = !empty($_SESSION['ironskin_amount']) ? $_SESSION['ironskin_amount'] : 0;

    // ----- STR (stats.php:673-766) -- weapon, warcraft, temp buffs, proficiency
    if ($weapontype == 1) { $strmod += $onehanded; }
    if ($weapontype == 2) { $strmod += $twohanded; }
    if (($weapontype == 1 || $weapontype == 2) && $warcraft >= 1) { $strmod += $warcraft; }
    if ($reds   > 0) { $strmod += 20; }
    if ($coffee > 0) { $strmod += 10; }
    if ($weapontype == 1 && $onehandedpro >= 1) { $strmod += round($strmod * ($onehandedpro * .05)); }
    if ($weapontype == 2 && $twohandedpro >= 1) { $strmod += round($strmod * ($twohandedpro * .05)); }

    // ----- DEX (stats.php:789-844)
    if ($weapontype == 3) { $dexmod += $ranged; }
    if ($weapontype == 3 && $warcraft >= 1) { $dexmod += $warcraft; }
    if ($greens > 0) { $dexmod += 20; }
    if ($coffee > 0) { $dexmod += 10; }
    if ($weapontype == 3 && $rangedpro >= 1) { $dexmod += round($dexmod * ($rangedpro * .05)); }

    // ----- MAG (stats.php:870-889)
    if ($blues  > 0) { $magmod += 20; }
    if ($coffee > 0) { $magmod += 10; }

    // ----- DEF (stats.php:913-970) -- toughness, temp buffs, shield block, ironskin
    if ($row['toughness'] >= 1) { $defmod += $row['toughness'] * 2; }
    if ($yellows > 0) { $defmod += 20; }
    if ($coffee  > 0) { $defmod += 10; }

    $shields = array(
        'training shield', 'basic shield', 'kite shield', 'buckler', 'wooden shield',
        'hunter shield', 'iron shield', 'iron kite shield', 'silver shield', 'steel shield',
        'steel kite shield', 'red shield', 'mithril shield', 'mithril kite shield',
        'sphinx shield', 'ranger shield', 'ultima shield'
    );
    if ($row['block'] >= 1 && in_array($row['equipL'], $shields, true)) {
        $defmod += $row['block'] * 3;
    }
    if ($ironskin_amount > 0) { $defmod += $ironskin_amount; }

    // ----- refresh session (display continuity) + PERSIST to DB (source of truth)
    $_SESSION['strmod'] = $strmod;
    $_SESSION['dexmod'] = $dexmod;
    $_SESSION['magmod'] = $magmod;
    $_SESSION['defmod'] = $defmod;

    updateStats($link, $username, array(
        'strmod' => $strmod,
        'dexmod' => $dexmod,
        'magmod' => $magmod,
        'defmod' => $defmod,
    ));

    // keep $row in sync with the freshly persisted values for in-request consumers
    $row['strmod'] = $strmod;
    $row['dexmod'] = $dexmod;
    $row['magmod'] = $magmod;
    $row['defmod'] = $defmod;

    return array(
        'strmod' => $strmod,
        'dexmod' => $dexmod,
        'magmod' => $magmod,
        'defmod' => $defmod,
        'row'    => $row,
    );
}

}
