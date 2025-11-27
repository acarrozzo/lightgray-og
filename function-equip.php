<?php
// // -------------------------DB CONNECT!
// include('db-connect.php');
// // -------------------------DB QUERY!
// $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
// $stmt->bind_param("s", $_SESSION['username']);
// $stmt->execute();
// $result = $stmt->get_result();
// if (!$result) {
//     die('There was an error running the query [' . $link->error . ']');
// }
// // -------------------------DB OUTPUT!
// while ($row = $result->fetch_assoc()) {

$row = getUserData($link, $_SESSION['username']); // --- gets all user data from database
    $right = $row['equipR'];
    $left = $row['equipL'];
    $mount = $row['equipMount'];
    $room = $row['room'];



// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ONE HANDED SLOT

// --------------------------------------------------------------------------- equip dagger
if ($input == "equip dagger" && $row['dagger'] > 0) {
    echo $message = '<div class="menuAction">You equip your dagger</div>';
    include('update_feed.php'); // --- update feed
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
    updateStats($link, $username, ['equipR' => 'dagger', 'weapontype' => 1]);
}

// --------------------------------------------------------------------------- equip short sword
if ($input == "equip short sword" && $row['shortsword'] > 0) {
    echo $message = '<div class="menuAction">You equip your short sword</div>';
    include('update_feed.php'); // --- update feed
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
    updateStats($link, $username, ['equipR' => 'short sword', 'weapontype' => 1]);
}

    // --------------------------------------------------------------------------- equip training sword
    if ($input=="equip training sword" && $row['trainingsword'] > 0) {
        echo $message = '<div class="menuAction">You equip your training sword</div>';
        include('update_feed.php');
        if ($right == $left) { // ---- two-handed check
            updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        updateStats($link, $username, ['equipR' => 'training sword', 'weapontype' => 1]);
    }
    // --------------------------------------------------------------------------- equip broad sword
    if ($input=="equip broad sword" && $row['broadsword'] > 0) {
        echo $message = '<div class="menuAction">You equip your broad sword</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
    updateStats($link, $username, ['equipR' => 'broad sword', 'weapontype' => 1]);

    }
    // --------------------------------------------------------------------------- equip mace
    if ($input=="equip mace" && $row['mace'] > 0) {
        echo $message = '<div class="menuAction">You equip your mace</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
    updateStats($link, $username, ['equipR' => 'mace', 'weapontype' => 1]);
    }
    // --------------------------------------------------------------------------- equip club
    if ($input=="equip club" && $row['club'] > 0) {
        echo $message = '<div class="menuAction">You equip your club</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
    updateStats($link, $username, ['equipR' => 'club', 'weapontype' => 1]);
    }
    // --------------------------------------------------------------------------- equip long sword
    if ($input=="equip long sword" && $row['longsword'] > 0) {
        echo $message = '<div class="menuAction">You equip your long sword</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
    updateStats($link, $username, ['equipR' => 'long sword', 'weapontype' => 1]);
    }


    // --------------------------------------------------------------------------- equip flail
    if ($input=="equip flail" && $row['flail'] > 0) {
        echo $message = '<div class="menuAction">You equip your flail</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
    updateStats($link, $username, ['equipR' => 'flail', 'weapontype' => 1]);
    }
    // --------------------------------------------------------------------------- equip morning star
    if ($input=="equip morning star" && $row['morningstar'] > 0) {
        echo $message = '<div class="menuAction">You equip your morning star</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'morning star'");
    updateStats($link, $username, ['equipR' => 'morning star', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip samurai sword
    if ($input=="equip samurai sword" && $row['samuraisword'] > 0) {
        echo $message = '<div class="menuAction">You equip your samurai sword</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'samurai sword'");
    updateStats($link, $username, ['equipR' => 'samurai sword', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip gladius
    if ($input=="equip gladius" && $row['gladius'] > 0) {
        echo $message = '<div class="menuAction">You equip your gladius</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'gladius'");
    updateStats($link, $username, ['equipR' => 'gladius', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip basic staff
    if ($input=="equip basic staff" && $row['basicstaff'] > 0) {
        echo $message = '<div class="menuAction">You equip your basic staff</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'basic staff'");
    updateStats($link, $username, ['equipR' => 'basic staff', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip wooden staff
    if ($input=="equip wooden staff" && $row['woodenstaff'] > 0) {
        echo $message = '<div class="menuAction">You equip your wooden staff</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'wooden staff'");
    updateStats($link, $username, ['equipR' => 'wooden staff', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip wand
    if ($input=="equip wand" && $row['wand'] > 0) {
        echo $message = '<div class="menuAction">You equip your wand</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'wand'");
    updateStats($link, $username, ['equipR' => 'wand', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip demon dagger
    if ($input=="equip demon dagger" && $row['demondagger'] > 0) {
        echo $message = '<div class="menuAction">You equip your demon dagger</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'demon dagger'");
    updateStats($link, $username, ['equipR' => 'demon dagger', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip wizard staff
    if ($input=="equip wizard staff" && $row['wizardstaff'] > 0) {
        echo $message = '<div class="menuAction">You equip your wizard staff</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'wizard staff'");
    updateStats($link, $username, ['equipR' => 'wizard staff', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip gray wand
    if ($input=="equip gray wand" && $row['graywand'] > 0) {
        echo $message = '<div class="menuAction">You equip your gray wand</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'gray wand'");
    updateStats($link, $username, ['equipR' => 'gray wand', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip three-chained flail
    if ($input=="equip three-chained flail" && $row['threechainedflail'] > 0) {
        echo $message = '<div class="menuAction">You equip your three-chained flail</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'three-chained flail'");
    updateStats($link, $username, ['equipR' => 'three-chained flail', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip bastard sword
    if ($input=="equip bastard sword" && $row['bastardsword'] > 0) {
        echo $message = '<div class="menuAction">You equip your bastard sword</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'bastard sword'");
    updateStats($link, $username, ['equipR' => 'bastard sword', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip giant club
    if ($input=="equip giant club" && $row['giantclub'] > 0) {
        echo $message = '<div class="menuAction">You equip your giant club</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'giant club'");
    updateStats($link, $username, ['equipR' => 'giant club', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip great white sword
    if ($input=="equip great white sword" && $row['greatwhitesword'] > 0) {
        echo $message = '<div class="menuAction">You equip your great white sword</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'great white sword'");
    updateStats($link, $username, ['equipR' => 'great white sword', 'weapontype' => 1]);    }

    // --------------------------------------------------------------------------- equip iron dagger
    if ($input=="equip iron dagger" && $row['irondagger'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron dagger</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'iron dagger'");
    updateStats($link, $username, ['equipR' => 'iron dagger', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip iron sword
    if ($input=="equip iron sword" && $row['ironsword'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron sword</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'iron sword'");
    updateStats($link, $username, ['equipR' => 'iron sword', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip iron staff
    if ($input=="equip iron staff" && $row['ironstaff'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron staff</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'iron staff'");
    updateStats($link, $username, ['equipR' => 'iron staff', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip poison saber
    if ($input=="equip poison saber" && $row['poisonsaber'] > 0) {
        echo $message = '<div class="menuAction">You equip your poison saber</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'poison saber'");
    updateStats($link, $username, ['equipR' => 'poison saber', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip axe of slaughter
    if ($input=="equip axe of slaughter" && $row['axeofslaughter'] > 0) {
        echo $message = '<div class="menuAction">You equip your axe of slaughter</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'axe of slaughter'");
    updateStats($link, $username, ['equipR' => 'axe of slaughter', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip silver sword
    if ($input=="equip silver sword" && $row['silversword'] > 0) {
        echo $message = '<div class="menuAction">You equip your silver sword</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'silver sword'");
    updateStats($link, $username, ['equipR' => 'silver sword', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip silver staff
    if ($input=="equip silver staff" && $row['silverstaff'] > 0) {
        echo $message = '<div class="menuAction">You equip your silver staff</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'silver staff'");
    updateStats($link, $username, ['equipR' => 'silver staff', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip steel dagger
    if ($input=="equip steel dagger" && $row['steeldagger'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel dagger</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'steel dagger'");
    updateStats($link, $username, ['equipR' => 'steel dagger', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip steel sword
    if ($input=="equip steel sword" && $row['steelsword'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel sword</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'steel sword'");
    updateStats($link, $username, ['equipR' => 'steel sword', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip steel staff
    if ($input=="equip steel staff" && $row['steelstaff'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel staff</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'steel staff'");
    updateStats($link, $username, ['equipR' => 'steel staff', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip silver whip
    if ($input=="equip silver whip" && $row['silverwhip'] > 0) {
        echo $message = '<div class="menuAction">You equip your silver whip</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'silver whip'");
    updateStats($link, $username, ['equipR' => 'silver whip', 'weapontype' => 1]);    }


    // --------------------------------------------------------------------------- equip staff of the scorpion
    if ($input=="equip staff of the scorpion" && $row['staffofthescorpion'] > 0) {
        echo $message = '<div class="menuAction">You equip your staff of the scorpion</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'staff of the scorpion'");
    updateStats($link, $username, ['equipR' => 'staff of the scorpion', 'weapontype' => 1]);    }

    // --------------------------------------------------------------------------- equip forest saber
    if ($input=="equip forest saber" && $row['forestsaber'] > 0) {
        echo $message = '<div class="menuAction">You equip your forest saber</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'forest saber'");
    updateStats($link, $username, ['equipR' => 'forest saber', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip sharp katana
    if ($input=="equip sharp katana" && $row['sharpkatana'] > 0) {
        echo $message = '<div class="menuAction">You equip your sharp katana</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'sharp katana'");
    updateStats($link, $username, ['equipR' => 'sharp katana', 'weapontype' => 1]);    }

    // --------------------------------------------------------------------------- equip black blade
    if ($input=="equip black blade" && $row['blackblade'] > 0) {
        echo $message = '<div class="menuAction">You equip your black blade</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'black blade'");
    updateStats($link, $username, ['equipR' => 'black blade', 'weapontype' => 1]);    }
    // --------------------------------------------------------------------------- equip flamberg
    if ($input=="equip flamberg" && $row['flamberg'] > 0) {
        echo $message = '<div class="menuAction">You equip your flamberg</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'flamberg'");
    updateStats($link, $username, ['equipR' => 'flamberg', 'weapontype' => 1]);    }





    // --------------------------------------------------------------------------- equip master blade
    if ($input=="equip master blade" && $row['masterblade'] > 0) {
        echo $message = '<div class="menuAction">You equip your master blade</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'master blade'");
    updateStats($link, $username, ['equipR' => 'master blade', 'weapontype' => 1]);    }



    // --------------------------------------------------------------------------- equip guardian blade
    if ($input=="equip guardian blade" && $row['guardianblade'] > 0) {
        echo $message = '<div class="menuAction">You equip your guardian blade</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'guardian blade'");
    updateStats($link, $username, ['equipR' => 'guardian blade', 'weapontype' => 1]);    }


    // --------------------------------------------------------------------------- equip gilded falcion
    if ($input=="equip gilded falcion" && $row['gildedfalcion'] > 0) {
        echo $message = '<div class="menuAction">You equip your gilded falcion</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'guardian blade'");
    updateStats($link, $username, ['equipR' => 'gilded falcion', 'weapontype' => 1]);    }
    


    // --------------------------------------------------------------------------- equip gamma knife
    if ($input=="equip gamma knife" && $row['gammaknife'] > 0) {
        echo $message = '<div class="menuAction">You equip your gamma knife</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'gamma knife'");
    updateStats($link, $username, ['equipR' => 'gamma knife', 'weapontype' => 1]);    }

        // --------------------------------------------------------------------------- equip gmg club
        if ($input=="equip gmg club" && $row['gmgclub'] > 0) {
            echo $message = '<div class="menuAction">You equip your gmg club</div>';
            include('update_feed.php');
            if ($right == $left) { // ---- two handed check
                // $results = $link->query("UPDATE $user SET equipR = 'fists'");
                // $results = $link->query("UPDATE $user SET equipL = '- - -'");
            }
            // $results = $link->query("UPDATE $user SET equipR = 'gmg club'");
        updateStats($link, $username, ['equipR' => 'gmg club', 'weapontype' => 1]);        }

            // --------------------------------------------------------------------------- equip gk club
    if ($input=="equip gk club" && $row['gkclub'] > 0) {
        echo $message = '<div class="menuAction">You equip your gk club</div>';
        include('update_feed.php');
    if ($right == $left) { // ---- two-handed check
        updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
    }
        // $results = $link->query("UPDATE $user SET equipR = 'gk club'");
    updateStats($link, $username, ['equipR' => 'gk club', 'weapontype' => 1]);    }









    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx TWO HANDED SLOT

    // --------------------------------------------------------------------------- equip training 2h sword
    if ($input=="equip training 2h sword" && $row['training2hsword'] > 0) {
        echo $message = '<div class="menuAction">You equip your training 2h sword</div>';
        include('update_feed.php'); // --- update feed
        updateStats($link, $username, ['equipR' => 'training 2h sword', 'equipL' => 'training 2h sword', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip bo
    if ($input=="equip bo" && $row['bo'] > 0) {
        echo $message = '<div class="menuAction">You equip your bo</div>';
        include('update_feed.php'); // --- update feed
        updateStats($link, $username, ['equipR' => 'bo', 'equipL' => 'bo', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip battle axe
    if ($input=="equip battle axe" && $row['battleaxe'] > 0) {
        echo $message = '<div class="menuAction">You equip your battle axe</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'battle axe'");
        // $results = $link->query("UPDATE $user SET equipL = 'battle axe'");
        updateStats($link, $username, ['equipR' => 'battle axe', 'equipL' => 'battle axe', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip warhammer
    if ($input=="equip warhammer" && $row['warhammer'] > 0) {
        echo $message = '<div class="menuAction">You equip your warhammer</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'warhammer'");
        // $results = $link->query("UPDATE $user SET equipL = 'warhammer'");
        updateStats($link, $username, ['equipR' => 'warhammer', 'equipL' => 'warhammer', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip wooden bo
    if ($input=="equip wooden bo" && $row['woodenbo'] > 0) {
        echo $message = '<div class="menuAction">You equip your wooden bo</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'wooden bo'");
        // $results = $link->query("UPDATE $user SET equipL = 'wooden bo'");
        updateStats($link, $username, ['equipR' => 'wooden bo', 'equipL' => 'wooden bo', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip pike
    if ($input=="equip pike" && $row['pike'] > 0) {
        echo $message = '<div class="menuAction">You equip your pike</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'pike'");
        // $results = $link->query("UPDATE $user SET equipL = 'pike'");
        updateStats($link, $username, ['equipR' => 'pike', 'equipL' => 'pike', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip claymore
    if ($input=="equip claymore" && $row['claymore'] > 0) {
        echo $message = '<div class="menuAction">You equip your claymore</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'claymore'");
        // $results = $link->query("UPDATE $user SET equipL = 'claymore'");
        updateStats($link, $username, ['equipR' => 'claymore', 'equipL' => 'claymore', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip great sword
    if ($input=="equip great sword" && $row['greatsword'] > 0) {
        echo $message = '<div class="menuAction">You equip your great sword</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'great sword'");
        // $results = $link->query("UPDATE $user SET equipL = 'great sword'");
        updateStats($link, $username, ['equipR' => 'great sword', 'equipL' => 'great sword', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip bo staff
    if ($input=="equip bo staff" && $row['bostaff'] > 0) {
        echo $message = '<div class="menuAction">You equip your bo staff</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'bo staff'");
        // $results = $link->query("UPDATE $user SET equipL = 'bo staff'");
        updateStats($link, $username, ['equipR' => 'bo staff', 'equipL' => 'bo staff', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip battle staff
    if ($input=="equip battle staff" && $row['battlestaff'] > 0) {
        echo $message = '<div class="menuAction">You equip your battle staff</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'battle staff'");
        // $results = $link->query("UPDATE $user SET equipL = 'battle staff'");
        updateStats($link, $username, ['equipR' => 'battle staff', 'equipL' => 'battle staff', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip dual tomahawk
    if ($input=="equip dual tomahawk" && $row['dualtomahawk'] > 0) {
        echo $message = '<div class="menuAction">You equip your dual tomahawk</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'dual tomahawk'");
        // $results = $link->query("UPDATE $user SET equipL = 'dual tomahawk'");
        updateStats($link, $username, ['equipR' => 'dual tomahawk', 'equipL' => 'dual tomahawk', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip bone knuckles
    if ($input=="equip bone knuckles" && $row['boneknuckles'] > 0) {
        echo $message = '<div class="menuAction">You equip your bone knuckles</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'bone knuckles'");
        // $results = $link->query("UPDATE $user SET equipL = 'bone knuckles'");
        updateStats($link, $username, ['equipR' => 'bone knuckles', 'equipL' => 'bone knuckles', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip polearm
    if ($input=="equip polearm" && $row['polearm'] > 0) {
        echo $message = '<div class="menuAction">You equip your polearm</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'polearm'");
        // $results = $link->query("UPDATE $user SET equipL = 'polearm'");
        updateStats($link, $username, ['equipR' => 'polearm', 'equipL' => 'BOOpolearmOOO', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip bone cudgel
    if ($input=="equip bone cudgel" && $row['bonecudgel'] > 0) {
        echo $message = '<div class="menuAction">You equip your bone cudgel</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'bone cudgel'");
        // $results = $link->query("UPDATE $user SET equipL = 'bone cudgel'");
        updateStats($link, $username, ['equipR' => 'bone cudgel', 'equipL' => 'bone cudgel', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip hammerhead hammer
    if ($input=="equip hammerhead hammer" && $row['hammerheadhammer'] > 0) {
        echo $message = '<div class="menuAction">You equip your hammerhead hammer</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'hammerhead hammer'");
        // $results = $link->query("UPDATE $user SET equipL = 'hammerhead hammer'");
        updateStats($link, $username, ['equipR' => 'hammerhead hammer', 'equipL' => 'hammerhead hammer', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip iron maul
    if ($input=="equip iron maul" && $row['ironmaul'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron maul</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'iron maul'");
        // $results = $link->query("UPDATE $user SET equipL = 'iron maul'");
        updateStats($link, $username, ['equipR' => 'iron maul', 'equipL' => 'iron maul', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip iron 2h sword
    if ($input=="equip iron 2h sword" && $row['iron2hsword'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron 2h sword</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'iron 2h sword'");
        // $results = $link->query("UPDATE $user SET equipL = 'iron 2h sword'");
        updateStats($link, $username, ['equipR' => 'iron 2h sword', 'equipL' => 'iron 2h sword', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip iron battle staff
    if ($input=="equip iron battle staff" && $row['ironbattlestaff'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron battle staff</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'iron battle staff'");
        // $results = $link->query("UPDATE $user SET equipL = 'iron battle staff'");
        updateStats($link, $username, ['equipR' => 'iron battle staff', 'equipL' => 'iron battle staff', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip great axe
    if ($input=="equip great axe" && $row['greataxe'] > 0) {
        echo $message = '<div class="menuAction">You equip your great axe</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'great axe'");
        // $results = $link->query("UPDATE $user SET equipL = 'great axe'");
        updateStats($link, $username, ['equipR' => 'great axe', 'equipL' => 'great axe', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip trident
    if ($input=="equip trident" && $row['trident'] > 0) {
        echo $message = '<div class="menuAction">You equip your trident</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'trident'");
        // $results = $link->query("UPDATE $user SET equipL = 'trident'");
        updateStats($link, $username, ['equipR' => 'trident', 'equipL' => 'trident', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip solomons staff
    if ($input=="equip solomons staff" && $row['solomonstaff'] > 0) {
        echo $message = '<div class="menuAction">You equip your solomon staff</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'solomon staff'");
        // $results = $link->query("UPDATE $user SET equipL = 'solomon staff'");
        updateStats($link, $username, ['equipR' => 'solomon staff', 'equipL' => 'solomon staff', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip oak battlestaff
    if ($input=="equip oak battle staff" && $row['oakbattlestaff'] > 0) {
        echo $message = '<div class="menuAction">You equip your oak battle staff</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'oak battle staff'");
        // $results = $link->query("UPDATE $user SET equipL = 'oak battle staff'");
        updateStats($link, $username, ['equipR' => 'oak battle staff', 'equipL' => 'oak battle staff', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip jim bo
    if ($input=="equip jim bo" && $row['jimbo'] > 0) {
        echo $message = '<div class="menuAction">You equip your jim bo</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'jim bo'");
        // $results = $link->query("UPDATE $user SET equipL = 'jim bo'");
        updateStats($link, $username, ['equipR' => 'jim bo', 'equipL' => 'jim bo', 'weapontype' => 2]);
    }

    // --------------------------------------------------------------------------- equip silver 2h sword
    if ($input=="equip silver 2h sword" && $row['silver2hsword'] > 0) {
        echo $message = '<div class="menuAction">You equip your silver 2h sword</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'silver 2h sword'");
        // $results = $link->query("UPDATE $user SET equipL = 'silver 2h sword'");
        updateStats($link, $username, ['equipR' => 'silver 2h sword', 'equipL' => 'silver 2h sword', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip steel 2h sword
    if ($input=="equip steel 2h sword" && $row['steel2hsword'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel 2h sword</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'steel 2h sword'");
        // $results = $link->query("UPDATE $user SET equipL = 'steel 2h sword'");
        updateStats($link, $username, ['equipR' => 'steel 2h sword', 'equipL' => 'steel 2h sword', 'weapontype' => 2]);
    }

    // --------------------------------------------------------------------------- equip steel battle staff
    if ($input=="equip steel battle staff" && $row['steelbattlestaff'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel battle staff</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'steel battle staff'");
        // $results = $link->query("UPDATE $user SET equipL = 'steel battle staff'");
        updateStats($link, $username, ['equipR' => 'steel battle staff', 'equipL' => 'steel battle staff', 'weapontype' => 2]);
    }

    // --------------------------------------------------------------------------- equip steel nunchaku
    if ($input=="equip steel nunchaku" && $row['steelnunchaku'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel nunchaku</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'steel nunchaku'");
        // $results = $link->query("UPDATE $user SET equipL = 'steel nunchaku'");
        updateStats($link, $username, ['equipR' => 'steel nunchaku', 'equipL' => 'steel nunchaku', 'weapontype' => 2]);
    }

    // --------------------------------------------------------------------------- equip heavy katana
    if ($input=="equip heavy katana" && $row['heavykatana'] > 0) {
        echo $message = '<div class="menuAction">You equip your heavy katana</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'heavy katana'");
        // $results = $link->query("UPDATE $user SET equipL = 'heavy katana'");
        updateStats($link, $username, ['equipR' => 'heavy katana', 'equipL' => 'heavy katana', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip heavy spear
    if ($input=="equip heavy spear" && $row['heavyspear'] > 0) {
        echo $message = '<div class="menuAction">You equip your heavy spear</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'heavy spear'");
        // $results = $link->query("UPDATE $user SET equipL = 'heavy spear'");
        updateStats($link, $username, ['equipR' => 'heavy spear', 'equipL' => 'heavy spear', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip heavy hammer
    if ($input=="equip heavy hammer" && $row['heavyhammer'] > 0) {
        echo $message = '<div class="menuAction">You equip your heavy hammer</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'heavy hammer'");
        // $results = $link->query("UPDATE $user SET equipL = 'heavy hammer'");
        updateStats($link, $username, ['equipR' => 'heavy hammer', 'equipL' => 'heavy hammer', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip oak warhammer
    if ($input=="equip oak warhammer" && $row['oakwarhammer'] > 0) {
        echo $message = '<div class="menuAction">You equip your oak warhammer</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'oak warhammer'");
        // $results = $link->query("UPDATE $user SET equipL = 'oak warhammer'");
        updateStats($link, $username, ['equipR' => 'oak warhammer', 'equipL' => 'oak warhammer', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip bardiche
    if ($input=="equip bardiche" && $row['bardiche'] > 0) {
        echo $message = '<div class="menuAction">You equip your bardiche</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'bardiche'");
        // $results = $link->query("UPDATE $user SET equipL = 'bardiche'");
        updateStats($link, $username, ['equipR' => 'bardiche', 'equipL' => 'bardiche', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip glaive
    if ($input=="equip glaive" && $row['glaive'] > 0) {
        echo $message = '<div class="menuAction">You equip your glaive</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'glaive'");
        // $results = $link->query("UPDATE $user SET equipL = 'glaive'");
        updateStats($link, $username, ['equipR' => 'glaive', 'equipL' => 'glaive', 'weapontype' => 2]);
    }


    // --------------------------------------------------------------------------- equip mithril 2h sword
    if ($input=="equip mithril 2h sword" && $row['mithril2hsword'] > 0) {
        echo $message = '<div class="menuAction">You equip your mithril 2h sword</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'mithril 2h sword'");
        // $results = $link->query("UPDATE $user SET equipL = 'mithril 2h sword'");
        updateStats($link, $username, ['equipR' => 'mithril 2h sword', 'equipL' => 'mithril 2h sword', 'weapontype' => 2]);
    }

    // --------------------------------------------------------------------------- equip mithril battle staff
    if ($input=="equip mithril battle staff" && $row['mithrilbattlestaff'] > 0) {
        echo $message = '<div class="menuAction">You equip your mithril battle staff</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'mithril battle staff'");
        // $results = $link->query("UPDATE $user SET equipL = 'mithril battle staff'");
        updateStats($link, $username, ['equipR' => 'mithril battle staff', 'equipL' => 'mithril battle staff', 'weapontype' => 2]);
    }

    // --------------------------------------------------------------------------- equip mithril nunchaku
    if ($input=="equip mithril nunchaku" && $row['mithrilnunchaku'] > 0) {
        echo $message = '<div class="menuAction">You equip your mithril nunchaku</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'mithril nunchaku'");
        // $results = $link->query("UPDATE $user SET equipL = 'mithril nunchaku'");
        updateStats($link, $username, ['equipR' => 'mithril nunchaku', 'equipL' => 'mithril nunchaku', 'weapontype' => 2]);
    }


    // --------------------------------------------------------------------------- equip humongous battleaxe
    if ($input=="equip humongous battleaxe" && $row['humongousbattleaxe'] > 0) {
        echo $message = '<div class="menuAction">You equip your humongous battleaxe</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'humongous battleaxe'");
        // $results = $link->query("UPDATE $user SET equipL = 'humongous battleaxe'");
        updateStats($link, $username, ['equipR' => 'humongous battleaxe', 'equipL' => 'humongous battleaxe', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip gargantuan warhammer
    if ($input=="equip gargantuan warhammer" && $row['gargantuanwarhammer'] > 0) {
        echo $message = '<div class="menuAction">You equip your gargantuan warhammer</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'gargantuan warhammer'");
        // $results = $link->query("UPDATE $user SET equipL = 'gargantuan warhammer'");
        updateStats($link, $username, ['equipR' => 'gargantuan warhammer', 'equipL' => 'gargantuan warhammer', 'weapontype' => 2]);
    }

    // --------------------------------------------------------------------------- equip blessed spear
    if ($input=="equip blessed spear" && $row['blessedspear'] > 0) {
        echo $message = '<div class="menuAction">You equip your blessed spear</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'blessed spear'");
        // $results = $link->query("UPDATE $user SET equipL = 'blessed spear'");
        updateStats($link, $username, ['equipR' => 'blessed spear', 'equipL' => 'blessed spear', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip fortified fauchard
    if ($input=="equip fortified fauchard" && $row['fortifiedfauchard'] > 0) {
        echo $message = '<div class="menuAction">You equip your fortified fauchard</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'fortified fauchard'");
        // $results = $link->query("UPDATE $user SET equipL = 'fortified fauchard'");
        updateStats($link, $username, ['equipR' => 'fortified fauchard', 'equipL' => 'fortified fauchard', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip neutron staff
    if ($input=="equip neutron staff" && $row['neutronstaff'] > 0) {
        echo $message = '<div class="menuAction">You equip your neutron staff</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'neutron staff'");
        // $results = $link->query("UPDATE $user SET equipL = 'neutron staff'");
        updateStats($link, $username, ['equipR' => 'neutron staff', 'equipL' => 'neutron staff', 'weapontype' => 2]);    
    }
    // --------------------------------------------------------------------------- equip atomic warhammer
    if ($input=="equip atomic warhammer" && $row['atomicwarhammer'] > 0) {
        echo $message = '<div class="menuAction">You equip your atomic warhammer</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'atomic warhammer'");
        // $results = $link->query("UPDATE $user SET equipL = 'atomic warhammer'");
        updateStats($link, $username, ['equipR' => 'atomic warhammer', 'equipL' => 'atomic warhammer', 'weapontype' => 2]);
    }





    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx PROJECTILE SLOT
    // --------------------------------------------------------------------------- equip boomerang
    if (($input=="equip boomerang" || $input=="boomerang") && $row['boomerang'] > 0) {
        echo $message = '<div class="menuAction">You equip your boomerang</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'boomerang'");
        updateStats($link, $username, ['equipR' => 'boomerang', 'weapontype' => 3]);
    }
    // --------------------------------------------------------------------------- equip chakram
    if (($input=="equip chakram" || $input=="chakram") && $row['chakram'] > 0) {
        echo $message = '<div class="menuAction">You equip your chakram</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'chakram'");
        updateStats($link, $username, ['equipR' => 'chakram', 'weapontype' => 3]);
    }
    // --------------------------------------------------------------------------- equip wooden bow
    if (($input=="equip wooden bow" || $input=="wooden bow") && $row['woodenbow'] > 0) {
        echo $message = '<div class="menuAction">You equip your wooden bow</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'wooden bow'");
        // $results = $link->query("UPDATE $user SET equipL = 'wooden bow'");
        updateStats($link, $username, ['equipR' => 'wooden bow', 'equipL' => 'wooden bow', 'weapontype' => 2]);
    }
    // --------------------------------------------------------------------------- equip hunter bow
    if (($input=="equip hunter bow"|| $input=="hunter bow") && $row['hunterbow'] > 0) {
        echo $message = '<div class="menuAction">You equip your hunter bow</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'hunter bow'");
        // $results = $link->query("UPDATE $user SET equipL = 'hunter bow'");
        updateStats($link, $username, ['equipR' => 'hunter bow', 'equipL' => 'hunter bow', 'weapontype' => 3]);
    }
    // --------------------------------------------------------------------------- equip long bow
    if (($input=="equip long bow" || $input=="long bow") && $row['longbow'] > 0) {
        echo $message = '<div class="menuAction">You equip your long bow</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'long bow'");
        // $results = $link->query("UPDATE $user SET equipL = 'long bow'");
        updateStats($link, $username, ['equipR' => 'long bow', 'equipL' => 'long bow', 'weapontype' => 3]);
    }

    // --------------------------------------------------------------------------- equip crossbow
    if (($input=="equip crossbow" || $input=="crossbow") && $row['crossbow'] > 0) {
        echo $message = '<div class="menuAction">You equip your crossbow</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'crossbow'");
        // $results = $link->query("UPDATE $user SET equipL = 'crossbow'");
        updateStats($link, $username, ['equipR' => 'crossbow', 'equipL' => 'crossbow', 'weapontype' => 3]);
    }


    // --------------------------------------------------------------------------- equip iron boomerang
    if (($input=="equip iron boomerang" || $input=="iron boomerang") && $row['ironboomerang'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron boomerang</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'iron boomerang'");
        updateStats($link, $username, ['equipR' => 'iron boomerang', 'weapontype' => 3]);
    }

    // --------------------------------------------------------------------------- equip harpoon
    if (($input=="equip harpoon" || $input=="harpoon") && $row['harpoon'] > 0) {
        echo $message = '<div class="menuAction">You equip your harpoon</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'harpoon'");
        updateStats($link, $username, ['equipR' => 'harpoon', 'weapontype' => 3]);
    }
    // --------------------------------------------------------------------------- equip iron bow
    if (($input=="equip iron bow" || $input=="iron bow") && $row['ironbow'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron bow</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'iron bow'");
        // $results = $link->query("UPDATE $user SET equipL = 'iron bow'");
        updateStats($link, $username, ['equipR' => 'iron bow', 'equipL' => 'iron bow', 'weapontype' => 3]);
    }
    // --------------------------------------------------------------------------- equip iron chakram
    if (($input=="equip iron chakram" || $input=="iron chakram") && $row['ironchakram'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron chakram</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'iron chakram'");
        updateStats($link, $username, ['equipR' => 'iron chakram', 'weapontype' => 3]);
    }

    // --------------------------------------------------------------------------- equip enchanted bow
    if (($input=="equip enchanted bow" || $input=="enchanted bow") && $row['enchantedbow'] > 0) {
        echo $message = '<div class="menuAction">You equip your enchanted bow</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'enchanted bow'");
        // $results = $link->query("UPDATE $user SET equipL = 'enchanted bow'");
        updateStats($link, $username, ['equipR' => 'enchanted bow', 'equipL' => 'enchanted bow', 'weapontype' => 3]);
    }

    // --------------------------------------------------------------------------- equip jim bow
    if (($input=="equip jim bow" || $input=="jim bow") && $row['jimbow'] > 0) {
        echo $message = '<div class="menuAction">You equip your jim bow</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'jim bow'");
        // $results = $link->query("UPDATE $user SET equipL = 'jim bow'");
        updateStats($link, $username, ['equipR' => 'jim bow', 'equipL' => 'jim bow', 'weapontype' => 3]);
    }


    // --------------------------------------------------------------------------- equip iron crossbow
    if (($input=="equip iron crossbow"  || $input=="iron crossbow") && $row['ironcrossbow'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron crossbow</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'iron crossbow'");
        // $results = $link->query("UPDATE $user SET equipL = 'iron crossbow'");
        updateStats($link, $username, ['equipR' => 'iron crossbow', 'equipL' => 'iron crossbow', 'weapontype' => 3]);
    }


    // --------------------------------------------------------------------------- equip compound crossbow
    if (($input=="equip compound crossbow"  || $input=="compound crossbow") && $row['compoundcrossbow'] > 0) {
        echo $message = '<div class="menuAction">You equip your compound crossbow</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'compound crossbow'");
        // $results = $link->query("UPDATE $user SET equipL = 'compound crossbow'");
        updateStats($link, $username, ['equipR' => 'compound crossbow', 'equipL' => 'compound crossbow', 'weapontype' => 3]);
    }

    // --------------------------------------------------------------------------- equip hand crossbow
    if (($input=="equip hand crossbow" || $input=="hand crossbow") && $row['handcrossbow'] > 0) {
        echo $message = '<div class="menuAction">You equip your hand crossbow</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'hand crossbow'");
        updateStats($link, $username, ['equipR' => 'hand crossbow', 'weapontype' => 3]);
    }


    // --------------------------------------------------------------------------- equip silver boomerang
    if (($input=="equip silver boomerang" || $input=="silver boomerang") && $row['silverboomerang'] > 0) {
        echo $message = '<div class="menuAction">You equip your silver boomerang</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'silver boomerang'");
        updateStats($link, $username, ['equipR' => 'silver boomerang', 'weapontype' => 3]);
    }
    // --------------------------------------------------------------------------- equip silver bow
    if (($input=="equip silver bow" || $input=="silver bow") && $row['silverbow'] > 0) {
        echo $message = '<div class="menuAction">You equip your silver bow</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'silver bow'");
        // $results = $link->query("UPDATE $user SET equipL = 'silver bow'");
        updateStats($link, $username, ['equipR' => 'silver bow', 'equipL' => 'silver bow', 'weapontype' => 3]);
    }
    // --------------------------------------------------------------------------- equip silver crossbow
    if (($input=="equip silver crossbow" || $input=="silver crossbow") && $row['silvercrossbow'] > 0) {
        echo $message = '<div class="menuAction">You equip your silver crossbow</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'silver crossbow'");
        // $results = $link->query("UPDATE $user SET equipL = 'silver crossbow'");
        updateStats($link, $username, ['equipR' => 'silver crossbow', 'equipL' => 'silver crossbow', 'weapontype' => 3]);
    }


    // --------------------------------------------------------------------------- equip steel boomerang
    if (($input=="equip steel boomerang" || $input=="steel boomerang") && $row['steelboomerang'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel boomerang</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'steel boomerang'");
        updateStats($link, $username, ['equipR' => 'steel boomerang', 'weapontype' => 3]);
    }
    // --------------------------------------------------------------------------- equip steel bow
    if (($input=="equip steel bow" || $input=="steel bow") && $row['steelbow'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel bow</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'steel bow'");
        // $results = $link->query("UPDATE $user SET equipL = 'steel bow'");
        updateStats($link, $username, ['equipR' => 'steel bow', 'equipL' => 'steel bow', 'weapontype' => 3]);
    }
    // --------------------------------------------------------------------------- equip steel crossbow
    if (($input=="equip steel crossbow" || $input=="steel crossbow") && $row['steelcrossbow'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel crossbow</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'steel crossbow'");
        // $results = $link->query("UPDATE $user SET equipL = 'steel crossbow'");
        updateStats($link, $username, ['equipR' => 'steel crossbow', 'equipL' => 'steel crossbow', 'weapontype' => 3]);
    }
    // --------------------------------------------------------------------------- equip steel chakram
    if (($input=="equip steel chakram" || $input=="steel chakram") && $row['steelchakram'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel chakram</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipR = 'steel chakram'");
        updateStats($link, $username, ['equipR' => 'steel chakram', 'weapontype' => 3]);
    }
    // --------------------------------------------------------------------------- equip greenhorn bow
    if (($input=="equip greenhorn bow" || $input=="greenhorn bow") && $row['greenhornbow'] > 0) {
        echo $message = '<div class="menuAction">You equip your greenhorn bow</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'greenhorn bow'");
        // $results = $link->query("UPDATE $user SET equipL = 'greenhorn bow'");
        updateStats($link, $username, ['equipR' => 'greenhorn bow', 'equipL' => 'greenhorn bow', 'weapontype' => 3]);
    }
    // --------------------------------------------------------------------------- equip keepers crossbow
    if (($input=="equip keepers crossbow" || $input=="keepers crossbow") && $row['keeperscrossbow'] > 0) {
        echo $message = '<div class="menuAction">You equip your keeper\'s crossbow</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'keeper\'s crossbow'");
        // $results = $link->query("UPDATE $user SET equipL = 'keeper\'s crossbow'");
        updateStats($link, $username, ['equipR' => 'keeper\'s crossbow<', 'equipL' => 'keeper\'s crossbow<', 'weapontype' => 3]);
    }
    // --------------------------------------------------------------------------- equip ranger crossbow
    if (($input=="equip ranger crossbow" || $input=="ranger crossbow") && $row['rangercrossbow'] > 0) {
        echo $message = '<div class="menuAction">You equip your ranger crossbow</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'ranger crossbow'");
        // $results = $link->query("UPDATE $user SET equipL = 'ranger crossbow'");
        updateStats($link, $username, ['equipR' => 'ranger crossbow', 'equipL' => 'ranger crossbow', 'weapontype' => 3]);
    }
    // --------------------------------------------------------------------------- equip snow bow
    if (($input=="equip snow bow" || $input=="snow bow") && $row['snowbow'] > 0) {
        echo $message = '<div class="menuAction">You equip your snow bow</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipR = 'snow bow'");
        // $results = $link->query("UPDATE $user SET equipL = 'snow bow'");
        updateStats($link, $username, ['equipR' => 'snow bow', 'equipL' => 'snow bow', 'weapontype' => 3]);
    }


    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx SHIELDS

    // --------------------------------------------------------------------------- equip training shield
    if ($input=="equip training shield" && $row['trainingshield'] > 0) {
        echo $message = '<div class="menuAction">You equip your training shield</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'training shield'");
        updateStats($link, $username, ['equipL' => 'training shield']);
    }
    // --------------------------------------------------------------------------- equip basic shield
    if ($input=="equip basic shield" && $row['basicshield'] > 0) {
        echo $message = '<div class="menuAction">You equip your basic shield</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'basic shield'");
        updateStats($link, $username, ['equipL' => 'basic shield']);
    }
    // --------------------------------------------------------------------------- equip kite shield
    if ($input=="equip kite shield" && $row['kiteshield'] > 0) {
        echo $message = '<div class="menuAction">You equip your kite shield</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'kite shield'");
        updateStats($link, $username, ['equipL' => 'kite shield']);
    }
    // --------------------------------------------------------------------------- equip buckler
    if ($input=="equip buckler" && $row['buckler'] > 0) {
        echo $message = '<div class="menuAction">You equip your buckler</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'buckler'");
        updateStats($link, $username, ['equipL' => 'buckler']);
    }
    // --------------------------------------------------------------------------- equip off hand dagger
    if ($input=="equip off hand dagger" && $row['offhanddagger'] > 0) {
        echo $message = '<div class="menuAction">You equip your off hand dagger</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'off hand dagger'");
        updateStats($link, $username, ['equipL' => 'off hand dagger']);
    }
    // --------------------------------------------------------------------------- equip wooden shield
    if ($input=="equip wooden shield" && $row['woodenshield'] > 0) {
        echo $message = '<div class="menuAction">You equip your wooden shield</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'wooden shield'");
        updateStats($link, $username, ['equipL' => 'wooden shield']);
    }
    // --------------------------------------------------------------------------- equip hunter shield
    if ($input=="equip hunter shield" && $row['huntershield'] > 0) {
        echo $message = '<div class="menuAction">You equip your hunter shield</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'hunter shield'");
        updateStats($link, $username, ['equipL' => 'hunter shield']);
    }
    // --------------------------------------------------------------------------- equip tower shield
    if ($input=="equip tower shield" && $row['towershield'] > 0) {
        echo $message = '<div class="menuAction">You equip your tower shield</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'tower shield'");
        updateStats($link, $username, ['equipL' => 'tower shield']);
    }
    // --------------------------------------------------------------------------- equip iron shield
    if ($input=="equip iron shield" && $row['ironshield'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron shield</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'iron shield'");
        updateStats($link, $username, ['equipL' => 'iron shield']); 
    }
    // --------------------------------------------------------------------------- equip iron kite shield
    if ($input=="equip iron kite shield" && $row['ironkiteshield'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron kite shield</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'iron kite shield'");
        updateStats($link, $username, ['equipL' => 'iron kite shield']);    
    }
    // --------------------------------------------------------------------------- equip glowing orb
    if ($input=="equip glowing orb" && $row['glowingorb'] > 0) {
        echo $message = '<div class="menuAction">You equip your glowing orb</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'glowing orb'");
        updateStats($link, $username, ['equipL' => 'glowing orb']);
    }
    // --------------------------------------------------------------------------- equip enchanted orb
    if ($input=="equip enchanted orb" && $row['enchantedorb'] > 0) {
        echo $message = '<div class="menuAction">You equip your enchanted orb</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'enchanted orb'");
        updateStats($link, $username, ['equipL' => 'enchanted orb']);
    }
    // --------------------------------------------------------------------------- equip death orb
    if ($input=="equip death orb" && $row['deathorb'] > 0) {
        echo $message = '<div class="menuAction">You equip your death orb</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'death orb'");
        updateStats($link, $username, ['equipL' => 'death orb']);
        
    }
    // --------------------------------------------------------------------------- equip red shield
    if ($input=="equip red shield" && $row['redshield'] > 0) {
        echo $message = '<div class="menuAction">You equip your red shield</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'red shield'");
        updateStats($link, $username, ['equipL' => 'red shield']);
    }
    // --------------------------------------------------------------------------- equip steel shield
    if ($input=="equip steel shield" && $row['steelshield'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel shield</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'steel shield'");
        updateStats($link, $username, ['equipL' => 'steel shield']);
    }
    // --------------------------------------------------------------------------- equip steel kite shield
    if ($input=="equip steel kite shield" && $row['steelkiteshield'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel kite shield</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'steel kite shield'");
        updateStats($link, $username, ['equipL' => 'steel kite shield']);
    }// --------------------------------------------------------------------------- equip silver shield
    if ($input=="equip silver shield" && $row['silvershield'] > 0) {
        echo $message = '<div class="menuAction">You equip your silver shield</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'silver shield'");
        updateStats($link, $username, ['equipL' => 'silver shield']);
    }
    // --------------------------------------------------------------------------- equip viking shield
    if ($input=="equip viking shield" && $row['vikingshield'] > 0) {
        echo $message = '<div class="menuAction">You equip your viking shield</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'viking shield'");
        updateStats($link, $username, ['equipL' => 'viking shield']);
    }
    // --------------------------------------------------------------------------- equip green orb
    if ($input=="equip green orb" && $row['greenorb'] > 0) {
        echo $message = '<div class="menuAction">You equip your green orb</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'green orb'");
        updateStats($link, $username, ['equipL' => 'green orb']);
    }
    // --------------------------------------------------------------------------- equip off hand sword
    if ($input=="equip off hand sword" && $row['offhandsword'] > 0) {
        echo $message = '<div class="menuAction">You equip your off hand sword</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'off hand sword'");
        updateStats($link, $username, ['equipL' => 'off hand sword']);
    }


    // --------------------------------------------------------------------------- equip off hand mace
    if ($input=="equip off hand mace" && $row['offhandmace'] > 0) {
        echo $message = '<div class="menuAction">You equip your off hand mace</div>';
        include('update_feed.php'); // --- update feed
        if ($right == $left) { // ---- two handed check
                updateStats($link, $username, ['equipR' => 'fists', 'equipL' => '- - -']);
        }
        // $results = $link->query("UPDATE $user SET equipL = 'off hand mace'");
        updateStats($link, $username, ['equipL' => 'off hand mace']);   
    }





    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx HEAD SLOT

    // --------------------------------------------------------------------------- equip training helmet
    if ($input=="equip training helmet" && $row['traininghelmet'] > 0) {
        echo $message = '<div class="menuAction">You equip your training helmet</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'training helmet'");
        updateStats($link, $username, ['equipHead' => 'training helmet']);
    }
    // --------------------------------------------------------------------------- equip basic helmet
    if ($input=="equip basic helmet" && $row['basichelmet'] > 0) {
        echo $message = '<div class="menuAction">You equip your basic helmet</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'basic helmet'");
        updateStats($link, $username, ['equipHead' => 'basic helmet']);
    }
    // --------------------------------------------------------------------------- equip basic hood
    if ($input=="equip basic hood" && $row['basichood'] > 0) {
        echo $message = '<div class="menuAction">You equip your basic hood</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'basic hood'");
        updateStats($link, $username, ['equipHead' => 'basic hood']);
    }
    // --------------------------------------------------------------------------- equip red hood
    if ($input=="equip red hood" && $row['redhood'] > 0) {
        echo $message = '<div class="menuAction">You equip your red hood</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'red hood'");
        updateStats($link, $username, ['equipHead' => 'red hood']);
    }
    // --------------------------------------------------------------------------- equip green hood
    if ($input=="equip green hood" && $row['greenhood'] > 0) {
        echo $message = '<div class="menuAction">You equip your green hood</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'green hood'");
        updateStats($link, $username, ['equipHead' => 'green hood']);
    }
    // --------------------------------------------------------------------------- equip blue hood
    if ($input=="equip blue hood" && $row['bluehood'] > 0) {
        echo $message = '<div class="menuAction">You equip your blue hood</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'blue hood'");
        updateStats($link, $username, ['equipHead' => 'blue hood']);
    }
    // --------------------------------------------------------------------------- equip leather hood
    if ($input=="equip leather hood" && $row['leatherhood'] > 0) {
        echo $message = '<div class="menuAction">You equip your leather hood</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'leather hood'");
        updateStats($link, $username, ['equipHead' => 'leather hood']);
    }
    // --------------------------------------------------------------------------- equip leather helmet
    if ($input=="equip leather helmet" && $row['leatherhelmet'] > 0) {
        echo $message = '<div class="menuAction">You equip your leather helmet</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'leather helmet'");
        updateStats($link, $username, ['equipHead' => 'leather helmet']);
    }
    // --------------------------------------------------------------------------- equip horned helmet
    if ($input=="equip horned helmet" && $row['hornedhelmet'] > 0) {
        echo $message = '<div class="menuAction">You equip your horned helmet</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'horned helmet'");
        updateStats($link, $username, ['equipHead' => 'horned helmet']);
    }
    // --------------------------------------------------------------------------- equip barbarian helmet
    if ($input=="equip barbarian helmet" && $row['barbarianhelmet'] > 0) {
        echo $message = '<div class="menuAction">You equip your barbarian helmet</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'barbarian helmet'");
        updateStats($link, $username, ['equipHead' => 'barbarian helmet']);
    }


    // --------------------------------------------------------------------------- equip gray hood
    if ($input=="equip gray hood" && $row['grayhood'] > 0) {
        echo $message = '<div class="menuAction">You equip your gray hood</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'gray hood'");
        updateStats($link, $username, ['equipHead' => 'gray hood']);
    }
    // --------------------------------------------------------------------------- equip wizard hat
    if ($input=="equip wizard hat" && $row['wizardhat'] > 0) {
        echo $message = '<div class="menuAction">You equip your wizard hat</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'wizard hat'");
        updateStats($link, $username, ['equipHead' => 'wizard hat']);
    }

    // --------------------------------------------------------------------------- equip battle helm
    if ($input=="equip battle helm" && $row['battlehelm'] > 0) {
        echo $message = '<div class="menuAction">You equip your battle helm</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'battle helm'");
        updateStats($link, $username, ['equipHead' => 'battle helm']);
    }
    // --------------------------------------------------------------------------- equip victorias hood
    if ($input=="equip victorias hood" && $row['victoriashood'] > 0) {
        echo $message = '<div class="menuAction">You equip your victoria\'s hood</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'victoria\'s hood'");
        updateStats($link, $username, ['equipHead' => 'victoria\'s hood']);
    }

    // --------------------------------------------------------------------------- equip scorpion hood
    if ($input=="equip scorpion hood" && $row['scorpionhood'] > 0) {
        echo $message = '<div class="menuAction">You equip your scorpion hood</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'scorpion hood'");
        updateStats($link, $username, ['equipHead' => 'scorpion hood']);
    }
    // --------------------------------------------------------------------------- equip iron hood
    if ($input=="equip iron hood" && $row['ironhood'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron hood</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'iron hood'");
        updateStats($link, $username, ['equipHead' => 'iron hood']);
    }
    // --------------------------------------------------------------------------- equip iron helmet
    if ($input=="equip iron helmet" && $row['ironhelmet'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron helmet</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'iron helmet'");
        updateStats($link, $username, ['equipHead' => 'iron helmet']);      
    }
    // --------------------------------------------------------------------------- equip haunted helm
    if ($input=="equip haunted helm" && $row['hauntedhelm'] > 0) {
        echo $message = '<div class="menuAction">You equip your haunted helm</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'haunted helm'");
        updateStats($link, $username, ['equipHead' => 'haunted helm']); 
    }
    // --------------------------------------------------------------------------- equip bandit hood
    if ($input=="equip bandit hood" && $row['bandithood'] > 0) {
        echo $message = '<div class="menuAction">You equip your bandit hood</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'bandit hood'");
        updateStats($link, $username, ['equipHead' => 'bandit hood']);
    }
    // --------------------------------------------------------------------------- equip calamari cap
    if ($input=="equip calamari cap" && $row['calamaricap'] > 0) {
        echo $message = '<div class="menuAction">You equip your calamari cap</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'calamari cap'");
        updateStats($link, $username, ['equipHead' => 'calamari cap']);
    }
    // --------------------------------------------------------------------------- equip heavy helmet
    if ($input=="equip heavy helmet" && $row['heavyhelmet'] > 0) {
        echo $message = '<div class="menuAction">You equip your heavy helmet</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'heavy helmet'");
        updateStats($link, $username, ['equipHead' => 'heavy helmet']);
    }
    // --------------------------------------------------------------------------- equip earth hood
    if ($input=="equip earth hood" && $row['earthhood'] > 0) {
        echo $message = '<div class="menuAction">You equip your earth hood</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'earth hood'");
        updateStats($link, $username, ['equipHead' => 'earth hood']);
    }
    // --------------------------------------------------------------------------- equip kettle helm
    if ($input=="equip kettle helm" && $row['kettlehelm'] > 0) {
        echo $message = '<div class="menuAction">You equip your kettle helm</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'kettle helm'");
        updateStats($link, $username, ['equipHead' => 'kettle helm']);
    }
    // --------------------------------------------------------------------------- equip silver helmet
    if ($input=="equip silver helmet" && $row['silverhelmet'] > 0) {
        echo $message = '<div class="menuAction">You equip your silver helmet</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'silver helmet'");
        updateStats($link, $username, ['equipHead' => 'silver helmet']);
    }
    // --------------------------------------------------------------------------- equip steel hood
    if ($input=="equip steel hood" && $row['steelhood'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel hood</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'steel hood'");
        updateStats($link, $username, ['equipHead' => 'steel hood']);
    }
    // --------------------------------------------------------------------------- equip steel helmet
    if ($input=="equip steel helmet" && $row['steelhelmet'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel helmet</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'steel helmet'");
        updateStats($link, $username, ['equipHead' => 'steel helmet']);
    }
    // --------------------------------------------------------------------------- equip steel master helm
    if ($input=="equip steel master helm" && $row['steelmasterhelm'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel master helm</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'steel master helm'");
        updateStats($link, $username, ['equipHead' => 'steel master helm']);
    }
    // --------------------------------------------------------------------------- equip troll crown
    if ($input=="equip troll crown" && $row['trollcrown'] > 0) {
        echo $message = '<div class="menuAction">You equip your troll crown</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'troll crown'");
        updateStats($link, $username, ['equipHead' => 'troll crown']);
    }
    // --------------------------------------------------------------------------- equip ranger hood
    if ($input=="equip ranger hood" && $row['rangerhood'] > 0) {
        echo $message = '<div class="menuAction">You equip your ranger hood</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'ranger hood'");
        updateStats($link, $username, ['equipHead' => 'ranger hood']);
    }
    // --------------------------------------------------------------------------- equip gamma hood
    if ($input=="equip gamma hood" && $row['gammahood'] > 0) {
        echo $message = '<div class="menuAction">You equip your gamma hood</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'gamma hood'");
        updateStats($link, $username, ['equipHead' => 'gamma hood']);
    }

    // --------------------------------------------------------------------------- equip mithril helmet
    if ($input=="equip mithril helmet" && $row['mithrilhelmet'] > 0) {
        echo $message = '<div class="menuAction">You equip your mithril helmet</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'mithril helmet'");
        updateStats($link, $username, ['equipHead' => 'mithril helmet']);
    }
    // --------------------------------------------------------------------------- equip mithril hood
    if ($input=="equip mithril hood" && $row['mithrilhood'] > 0) {
        echo $message = '<div class="menuAction">You equip your mithril hood</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'mithril hood'");
        updateStats($link, $username, ['equipHead' => 'mithril hood']);
    }
    // --------------------------------------------------------------------------- equip banshee mask
    if ($input=="equip banshee mask" && $row['bansheemask'] > 0) {
        echo $message = '<div class="menuAction">You equip your banshee mask</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'banshee mask'");
        updateStats($link, $username, ['equipHead' => 'banshee mask']);
    }
    // --------------------------------------------------------------------------- equip black hood
    if ($input=="equip black hood" && $row['blackhood'] > 0) {
        echo $message = '<div class="menuAction">You equip your black hood</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHead = 'black hood'");
        updateStats($link, $username, ['equipHead' => 'black hood']);
    }

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ARMOR SLOT

    // --------------------------------------------------------------------------- equip training armor
    if ($input=="equip training armor" && $row['trainingarmor'] > 0) {
        echo $message = '<div class="menuAction">You equip your training armor</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'training armor'");
        updateStats($link, $username, ['equipBody' => 'training armor']);   
    }
    // --------------------------------------------------------------------------- equip training armor pro
    if ($input=="equip training armor pro" && $row['trainingarmorpro'] > 0) {
        echo $message = '<div class="menuAction">You equip your training armor pro</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'training armor pro'");
        updateStats($link, $username, ['equipBody' => 'training armor pro']);
    }
    // --------------------------------------------------------------------------- equip padded armor
    if ($input=="equip padded armor" && $row['paddedarmor'] > 0) {
        echo $message = '<div class="menuAction">You equip your padded armor</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'padded armor'");
        updateStats($link, $username, ['equipBody' => 'padded armor']);
    }
    // --------------------------------------------------------------------------- equip pajamas
    if ($input=="equip pajamas" && $row['pajamas'] > 0) {
        echo $message = '<div class="menuAction">You jump into your comfy pajamas</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'pajamas'");
        updateStats($link, $username, ['equipBody' => 'pajamas']);  
    }
    // --------------------------------------------------------------------------- equip green cloak
    if ($input=="equip green cloak" && $row['greencloak'] > 0) {
        echo $message = '<div class="menuAction">You equip your green cloak</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'green cloak'");
        updateStats($link, $username, ['equipBody' => 'green cloak']);
    }
    // --------------------------------------------------------------------------- equip black robe
    if ($input=="equip black robe" && $row['blackrobe'] > 0) {
        echo $message = '<div class="menuAction">You equip your black robe</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'black robe'");
        updateStats($link, $username, ['equipBody' => 'black robe']);
    }
    // --------------------------------------------------------------------------- equip gray robe
    if ($input=="equip gray robe" && $row['grayrobe'] > 0) {
        echo $message = '<div class="menuAction">You equip your gray robe</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'gray robe'");
        updateStats($link, $username, ['equipBody' => 'gray robe']);
    }
    // --------------------------------------------------------------------------- equip leather vest
    if ($input=="equip leather vest" && $row['leathervest'] > 0) {
        echo $message = '<div class="menuAction">You equip your leather vest</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'leather vest'");
        updateStats($link, $username, ['equipBody' => 'leather vest']);
    }
    // --------------------------------------------------------------------------- equip leather armor
    if ($input=="equip leather armor" && $row['leatherarmor'] > 0) {
        echo $message = '<div class="menuAction">You equip your leather armor</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'leather armor'");
        updateStats($link, $username, ['equipBody' => 'leather armor']);
    }
    // --------------------------------------------------------------------------- equip sasquatch cloak
    if ($input=="equip sasquatch cloak" && $row['sasquatchcloak'] > 0) {
        echo $message = '<div class="menuAction">You equip your sasquatch cloak</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'sasquatch cloak'");
        updateStats($link, $username, ['equipBody' => 'sasquatch cloak']);
    }
    // --------------------------------------------------------------------------- equip turtle shell
    if ($input=="equip turtle shell" && $row['turtleshell'] > 0) {
        echo $message = '<div class="menuAction">You equip your turtle shell</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'turtle shell'");
        updateStats($link, $username, ['equipBody' => 'turtle shell']);
    }


    // --------------------------------------------------------------------------- equip iron armor
    if ($input=="equip iron armor" && $row['ironarmor'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron armor</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'iron armor'");
        updateStats($link, $username, ['equipBody' => 'iron armor']);
    }
    // --------------------------------------------------------------------------- equip iron cape
    if ($input=="equip iron cape" && $row['ironcape'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron cape</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'iron cape'");
        updateStats($link, $username, ['equipBody' => 'iron cape']);
    }
    // --------------------------------------------------------------------------- equip black cape
    if ($input=="equip black cape" && $row['blackcape'] > 0) {
        echo $message = '<div class="menuAction">You equip your black cape</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'black cape'");
        updateStats($link, $username, ['equipBody' => 'black cape']);
    }
    // --------------------------------------------------------------------------- equip forest cloak
    if ($input=="equip forest cloak" && $row['forestcloak'] > 0) {
        echo $message = '<div class="menuAction">You equip your forest cloak</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'forest cloak'");
        updateStats($link, $username, ['equipBody' => 'forest cloak']);
    }
    // --------------------------------------------------------------------------- equip warlock robe
    if ($input=="equip warlock robe" && $row['warlockrobe'] > 0) {
        echo $message = '<div class="menuAction">You equip your warlock robe</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'warlock robe'");
        updateStats($link, $username, ['equipBody' => 'warlock robe']);
    }
    // --------------------------------------------------------------------------- equip champion armor
    if ($input=="equip champion armor" && $row['championarmor'] > 0) {
        echo $message = '<div class="menuAction">You equip your champion armor</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'champion armor'");
        updateStats($link, $username, ['equipBody' => 'champion armor']);
    }
    // --------------------------------------------------------------------------- equip silver breastplate
    if ($input=="equip silver breastplate" && $row['silverbreastplate'] > 0) {
        echo $message = '<div class="menuAction">You equip your silver breastplate</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'silver breastplate'");
        updateStats($link, $username, ['equipBody' => 'silver breastplate']);
    }
    // --------------------------------------------------------------------------- equip steel armor
    if ($input=="equip steel armor" && $row['steelarmor'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel armor</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'steel armor'");
        updateStats($link, $username, ['equipBody' => 'steel armor']);
    }
    // --------------------------------------------------------------------------- equip steel cape
    if ($input=="equip steel cape" && $row['steelcape'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel cape</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'steel cape'");
        updateStats($link, $username, ['equipBody' => 'steel cape']);
    }
    // --------------------------------------------------------------------------- equip ranger cloak
    if ($input=="equip ranger cloak" && $row['rangercloak'] > 0) {
        echo $message = '<div class="menuAction">You equip your ranger cloak</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'ranger cloak'");
        updateStats($link, $username, ['equipBody' => 'ranger cloak']);
    }
    // --------------------------------------------------------------------------- equip yeti cloak
    if ($input=="equip yeti cloak" && $row['yeticloak'] > 0) {
        echo $message = '<div class="menuAction">You equip your yeti cloak</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'yeti cloak'");
        updateStats($link, $username, ['equipBody' => 'yeti cloak']);
    }
    // --------------------------------------------------------------------------- equip demon cape
    if ($input=="equip demon cape" && $row['demoncape'] > 0) {
        echo $message = '<div class="menuAction">You equip your demon cape</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'demon cape'");
        updateStats($link, $username, ['equipBody' => 'demon cape']);
    }
    // --------------------------------------------------------------------------- equip silver pajamas
    if ($input=="equip silver pajamas" && $row['silverpajamas'] > 0) {
        echo $message = '<div class="menuAction">You equip your silver pajamas</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipBody = 'silver pajamas'");
        updateStats($link, $username, ['equipBody' => 'silver pajamas']);
    }


        // --------------------------------------------------------------------------- equip mithril armor
        if ($input=="equip mithril armor" && $row['mithrilarmor'] > 0) {
            echo $message = '<div class="menuAction">You equip your mithril armor</div>';
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET equipBody = 'mithril armor'");
            updateStats($link, $username, ['equipBody' => 'mithril armor']);    
        }
        // --------------------------------------------------------------------------- equip mithril cape
        if ($input=="equip mithril cape" && $row['mithrilcape'] > 0) {
            echo $message = '<div class="menuAction">You equip your mithril cape</div>';
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET equipBody = 'mithril cape'");
            updateStats($link, $username, ['equipBody' => 'mithril cape']);
        }
        // --------------------------------------------------------------------------- equip snow vest
        if ($input=="equip snow vest" && $row['snowvest'] > 0) {
            echo $message = '<div class="menuAction">You equip your snow vest</div>';
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET equipBody = 'snow vest'");
            updateStats($link, $username, ['equipBody' => 'snow vest']);    
        }
        // --------------------------------------------------------------------------- equip mithril cape
        if ($input=="equip black cloak" && $row['blackcloak'] > 0) {
            echo $message = '<div class="menuAction">You equip your black cloak</div>';
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET equipBody = 'black cloak'");
            updateStats($link, $username, ['equipBody' => 'black cloak']);  
        }                




    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx HAND SLOT

    // --------------------------------------------------------------------------- equip training gloves
    if ($input=="equip training gloves" && $row['traininggloves'] > 0) {
        echo $message = '<div class="menuAction">You equip your training gloves</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'training gloves'");
        updateStats($link, $username, ['equipHands' => 'training gloves']); 
    }
    // --------------------------------------------------------------------------- equip wrist bracers
    if ($input=="equip wrist bracers" && $row['wristbracers'] > 0) {
        echo $message = '<div class="menuAction">You equip your wrist bracers</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'wrist bracers'");
        updateStats($link, $username, ['equipHands' => 'wrist bracers']);
    }
    // --------------------------------------------------------------------------- equip glowing brace
    if ($input=="equip glowing brace" && $row['glowingbrace'] > 0) {
        echo $message = '<div class="menuAction">You equip your glowing brace</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'glowing brace'");
        updateStats($link, $username, ['equipHands' => 'glowing brace']);
    }
    // --------------------------------------------------------------------------- equip black gloves
    if ($input=="equip black gloves" && $row['blackgloves'] > 0) {
        echo $message = '<div class="menuAction">You equip your black gloves</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'black gloves'");
        updateStats($link, $username, ['equipHands' => 'black gloves']);
    }
    // --------------------------------------------------------------------------- equip green gloves
    if ($input=="equip green gloves" && $row['greengloves'] > 0) {
        echo $message = '<div class="menuAction">You equip your green gloves</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'green gloves'");
        updateStats($link, $username, ['equipHands' => 'green gloves']);
    }
    // --------------------------------------------------------------------------- equip gray gloves
    if ($input=="equip gray gloves" && $row['graygloves'] > 0) {
        echo $message = '<div class="menuAction">You equip your gray gloves</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'gray gloves'");
        updateStats($link, $username, ['equipHands' => 'gray gloves']);
    }
    // --------------------------------------------------------------------------- equip leather gloves
    if ($input=="equip leather gloves" && $row['leathergloves'] > 0) {
        echo $message = '<div class="menuAction">You equip your leather gloves</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'leather gloves'");
        updateStats($link, $username, ['equipHands' => 'leather gloves']);
    }
    // --------------------------------------------------------------------------- equip hunter gloves
    if ($input=="equip hunter gloves" && $row['huntergloves'] > 0) {
        echo $message = '<div class="menuAction">You equip your hunter gloves</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'hunter gloves'");
        updateStats($link, $username, ['equipHands' => 'hunter gloves']);
    }
    // --------------------------------------------------------------------------- equip troll gloves
    if ($input=="equip troll gloves" && $row['trollgloves'] > 0) {
        echo $message = '<div class="menuAction">You equip your troll gloves</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'troll gloves'");
        updateStats($link, $username, ['equipHands' => 'troll gloves']);
    }
    // --------------------------------------------------------------------------- equip iron gauntlets
    if ($input=="equip iron gauntlets" && $row['irongauntlets'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron gauntlets</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'iron gauntlets'");
        updateStats($link, $username, ['equipHands' => 'iron gauntlets']);
    }
    // --------------------------------------------------------------------------- equip iron gloves
    if ($input=="equip iron gloves" && $row['irongloves'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron gloves</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'iron gloves'");
        updateStats($link, $username, ['equipHands' => 'iron gloves']);
    }
    // --------------------------------------------------------------------------- equip iron knuckles
    if ($input=="equip iron knuckles" && $row['ironknuckles'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron knuckles</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'iron knuckles'");
        updateStats($link, $username, ['equipHands' => 'iron knuckles']);
    }
    // --------------------------------------------------------------------------- equip bandit gloves
    if ($input=="equip bandit gloves" && $row['banditgloves'] > 0) {
        echo $message = '<div class="menuAction">You equip your bandit gloves</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'bandit gloves'");
        updateStats($link, $username, ['equipHands' => 'bandit gloves']);
    }
    // --------------------------------------------------------------------------- equip gator gloves
    if ($input=="equip gator gloves" && $row['gatorgloves'] > 0) {
        echo $message = '<div class="menuAction">You equip your gator gloves</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'gator gloves'");
        updateStats($link, $username, ['equipHands' => 'gator gloves']);
    }
    // --------------------------------------------------------------------------- equip grotto gloves
    if ($input=="equip grotto gloves" && $row['grottogloves'] > 0) {
        echo $message = '<div class="menuAction">You equip your grotto gloves</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'grotto gloves'");
        updateStats($link, $username, ['equipHands' => 'grotto gloves']);
    }
    // --------------------------------------------------------------------------- equip silver gauntlets
    if ($input=="equip silver gauntlets" && $row['silvergauntlets'] > 0) {
        echo $message = '<div class="menuAction">You equip your silver gauntlets</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'silver gauntlets'");
        updateStats($link, $username, ['equipHands' => 'silver gauntlets']);
    }
    // --------------------------------------------------------------------------- equip steel gauntlets
    if ($input=="equip steel gauntlets" && $row['steelgauntlets'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel gauntlets</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'steel gauntlets'");
        updateStats($link, $username, ['equipHands' => 'steel gauntlets']);
    }
    // --------------------------------------------------------------------------- equip steel gloves
    if ($input=="equip steel gloves" && $row['steelgloves'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel gloves</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'steel gloves'");
        updateStats($link, $username, ['equipHands' => 'steel gloves']);
    }
    // --------------------------------------------------------------------------- equip silk bracers
    if ($input=="equip silk bracers" && $row['silkbracers'] > 0) {
        echo $message = '<div class="menuAction">You equip your silk bracers</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'silk bracers'");
        updateStats($link, $username, ['equipHands' => 'silk bracers']);
    }
    // --------------------------------------------------------------------------- equip ranger gloves
    if ($input=="equip ranger gloves" && $row['rangergloves'] > 0) {
        echo $message = '<div class="menuAction">You equip your ranger gloves</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipHands = 'ranger gloves'");
        updateStats($link, $username, ['equipHands' => 'ranger gloves']);
    }
        // --------------------------------------------------------------------------- equip glowing gloves
        if ($input=="equip glowing gloves" && $row['glowinggloves'] > 0) {
            echo $message = '<div class="menuAction">You equip your glowing gloves</div>';
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET equipHands = 'glowing gloves'");
            updateStats($link, $username, ['equipHands' => 'glowing gloves']);  
        }



    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx FEET SLOT

    // --------------------------------------------------------------------------- equip training boots
    if ($input=="equip training boots" && $row['trainingboots'] > 0) {
        echo $message = '<div class="menuAction">You equip your training boots</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipFeet = 'training boots'");
        updateStats($link, $username, ['equipFeet' => 'training boots']);   
    }
    // --------------------------------------------------------------------------- equip red boots
    if ($input=="equip red boots" && $row['redboots'] > 0) {
        echo $message = '<div class="menuAction">You equip your red boots</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipFeet = 'red boots'");
        updateStats($link, $username, ['equipFeet' => 'red boots']);
    }
    // --------------------------------------------------------------------------- equip green boots
    if ($input=="equip green boots" && $row['greenboots'] > 0) {
        echo $message = '<div class="menuAction">You equip your green boots</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipFeet = 'green boots'");
        updateStats($link, $username, ['equipFeet' => 'green boots']);
    }
    // --------------------------------------------------------------------------- equip black boots
    if ($input=="equip black boots" && $row['blackboots'] > 0) {
        echo $message = '<div class="menuAction">You equip your black boots</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipFeet = 'black boots'");
        updateStats($link, $username, ['equipFeet' => 'black boots']);
    }
    // --------------------------------------------------------------------------- equip gray boots
    if ($input=="equip gray boots" && $row['grayboots'] > 0) {
        echo $message = '<div class="menuAction">You equip your gray boots</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipFeet = 'gray boots'");
        updateStats($link, $username, ['equipFeet' => 'gray boots']);
    }
    // --------------------------------------------------------------------------- equip slippers
    if ($input=="equip slippers" && $row['slippers'] > 0) {
        echo $message = '<div class="menuAction">You equip your slippers</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipFeet = 'slippers'");
        updateStats($link, $username, ['equipFeet' => 'slippers']);
    }
    // --------------------------------------------------------------------------- equip leather boots
    if ($input=="equip leather boots" && $row['leatherboots'] > 0) {
        echo $message = '<div class="menuAction">You equip your leather boots</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipFeet = 'leather boots'");
        updateStats($link, $username, ['equipFeet' => 'leather boots']);
    }
    // --------------------------------------------------------------------------- equip troll boots
    if ($input=="equip troll boots" && $row['trollboots'] > 0) {
        echo $message = '<div class="menuAction">You equip your troll boots</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipFeet = 'troll boots'");
        updateStats($link, $username, ['equipFeet' => 'troll boots']);
    }
    // --------------------------------------------------------------------------- equip bone boots
    if ($input=="equip bone boots" && $row['boneboots'] > 0) {
        echo $message = '<div class="menuAction">You equip your bone boots</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipFeet = 'bone boots'");
        updateStats($link, $username, ['equipFeet' => 'bone boots']);
    }
    // --------------------------------------------------------------------------- equip iron boots
    if ($input=="equip iron boots" && $row['ironboots'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron boots</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipFeet = 'iron boots'");
        updateStats($link, $username, ['equipFeet' => 'iron boots']);
    }
    // --------------------------------------------------------------------------- equip bigfoot boots
    if ($input=="equip bigfoot boots" && $row['bigfootboots'] > 0) {
        echo $message = '<div class="menuAction">You equip your bigfoot boots</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipFeet = 'bigfoot boots'");
        updateStats($link, $username, ['equipFeet' => 'bigfoot boots']);
    }
    // --------------------------------------------------------------------------- equip bandit boots
    if ($input=="equip bandit boots" && $row['banditboots'] > 0) {
        echo $message = '<div class="menuAction">You equip your bandit boots</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipFeet = 'bandit boots'");
        updateStats($link, $username, ['equipFeet' => 'bandit boots']);
    }
    // --------------------------------------------------------------------------- equip mud boots
    if ($input=="equip mud boots" && $row['mudboots'] > 0) {
        echo $message = '<div class="menuAction">You equip your mud boots</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipFeet = 'mud boots'");
        updateStats($link, $username, ['equipFeet' => 'mud boots']);
    }
    // --------------------------------------------------------------------------- equip warlock boots
    if ($input=="equip warlock boots" && $row['warlockboots'] > 0) {
        echo $message = '<div class="menuAction">You equip your warlock boots</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipFeet = 'warlock boots'");
        updateStats($link, $username, ['equipFeet' => 'warlock boots']);
    }
    // --------------------------------------------------------------------------- equip silver boots
    if ($input=="equip silver boots" && $row['silverboots'] > 0) {
        echo $message = '<div class="menuAction">You equip your silver boots</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipFeet = 'silver boots'");
        updateStats($link, $username, ['equipFeet' => 'silver boots']);
    }
    // --------------------------------------------------------------------------- equip steel boots
    if ($input=="equip steel boots" && $row['steelboots'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel boots</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipFeet = 'steel boots'");
        updateStats($link, $username, ['equipFeet' => 'steel boots']);
    }
    // --------------------------------------------------------------------------- equip thunder boots
    if ($input=="equip thunder boots" && $row['thunderboots'] > 0) {
        echo $message = '<div class="menuAction">You equip your thunder boots</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipFeet = 'thunder boots'");
        updateStats($link, $username, ['equipFeet' => 'thunder boots']);
    }
    // --------------------------------------------------------------------------- equip ranger boots
    if ($input=="equip ranger boots" && $row['rangerboots'] > 0) {
        echo $message = '<div class="menuAction">You equip your ranger boots</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipFeet = 'ranger boots'");
        updateStats($link, $username, ['equipFeet' => 'ranger boots']);
    }
    // --------------------------------------------------------------------------- equip silver slippers
    if ($input=="equip silver slippers" && $row['silverslippers'] > 0) {
        echo $message = '<div class="menuAction">You equip your silver slippers</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipFeet = 'silver slippers'");
        updateStats($link, $username, ['equipFeet' => 'silver slippers']);
    }




    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx RING 1 SLOT

    // --------------------------------------------------------------------------- equip ring of strength
    if ($input=="equip ring of strength" && $row['ringofstrength'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of strength</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of strength'");
        updateStats($link, $username, ['equipRing1' => 'ring of strength']);
    }
    // --------------------------------------------------------------------------- equip ring of dexterity
    if ($input=="equip ring of dexterity" && $row['ringofdexterity'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of dexterity</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of dexterity'");
        updateStats($link, $username, ['equipRing1' => 'ring of dexterity']);
    }
    // --------------------------------------------------------------------------- equip ring of magic
    if ($input=="equip ring of magic" && $row['ringofmagic'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of magic</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of magic'");
        updateStats($link, $username, ['equipRing1' => 'ring of magic']);
    }
    // --------------------------------------------------------------------------- equip ring of defense
    if ($input=="equip ring of defense" && $row['ringofdefense'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of defense</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of defense'");
        updateStats($link, $username, ['equipRing1' => 'ring of defense']);
    }


    // --------------------------------------------------------------------------- equip ring of strength II
    if ($input=="equip ring of strength II" && $row['ringofstrengthII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of strength II</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of strength II'");
        updateStats($link, $username, ['equipRing1' => 'ring of strength II']);
    }
    // --------------------------------------------------------------------------- equip ring of dexterity II
    if ($input=="equip ring of dexterity II" && $row['ringofdexterityII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of dexterity II</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of dexterity II'");
        updateStats($link, $username, ['equipRing1' => 'ring of dexterity II']);
    }
    // --------------------------------------------------------------------------- equip ring of magic II
    if ($input=="equip ring of magic II" && $row['ringofmagicII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of magic II</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of magic II'");
        updateStats($link, $username, ['equipRing1' => 'ring of magic II']);
    }
    // --------------------------------------------------------------------------- equip ring of defense II
    if ($input=="equip ring of defense II" && $row['ringofdefenseII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of defense II</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of defense II'");
        updateStats($link, $username, ['equipRing1' => 'ring of defense II']);
    }



    // --------------------------------------------------------------------------- equip ring of strength III
    if ($input=="equip ring of strength III" && $row['ringofstrengthIII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of strength III</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of strength III'");
        updateStats($link, $username, ['equipRing1' => 'ring of strength III']);
    }
    // --------------------------------------------------------------------------- equip ring of dexterity III
    if ($input=="equip ring of dexterity III" && $row['ringofdexterityIII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of dexterity III</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of dexterity III'");
        updateStats($link, $username, ['equipRing1' => 'ring of dexterity III']);
    }
    // --------------------------------------------------------------------------- equip ring of magic III
    if ($input=="equip ring of magic III" && $row['ringofmagicIII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of magic III</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of magic III'");
        updateStats($link, $username, ['equipRing1' => 'ring of magic III']);
    }
    // --------------------------------------------------------------------------- equip ring of defense III
    if ($input=="equip ring of defense III" && $row['ringofdefenseIII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of defense III</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of defense III'");
        updateStats($link, $username, ['equipRing1' => 'ring of defense III']);
    }


    // --------------------------------------------------------------------------- equip ring of strength IV
    if ($input=="equip ring of strength IV" && $row['ringofstrengthIV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of strength IV</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of strength IV'");
        updateStats($link, $username, ['equipRing1' => 'ring of strength IV']);
    }
    // --------------------------------------------------------------------------- equip ring of dexterity IV
    if ($input=="equip ring of dexterity IV" && $row['ringofdexterityIV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of dexterity IV</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of dexterity IV'");
        updateStats($link, $username, ['equipRing1' => 'ring of dexterity IV']);
    }
    // --------------------------------------------------------------------------- equip ring of magic IV
    if ($input=="equip ring of magic IV" && $row['ringofmagicIV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of magic IV</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of magic IV'");
        updateStats($link, $username, ['equipRing1' => 'ring of magic IV']);
    }
    // --------------------------------------------------------------------------- equip ring of defense IV
    if ($input=="equip ring of defense IV" && $row['ringofdefenseIV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of defense IV</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of defense IV'");
        updateStats($link, $username, ['equipRing1' => 'ring of defense IV']);
    }


    // --------------------------------------------------------------------------- equip ring of strength V
    if ($input=="equip ring of strength V" && $row['ringofstrengthV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of strength V</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of strength V'");
        updateStats($link, $username, ['equipRing1' => 'ring of strength V']);
    }
    // --------------------------------------------------------------------------- equip ring of dexterity V
    if ($input=="equip ring of dexterity V" && $row['ringofdexterityV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of dexterity V</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of dexterity V'");
        updateStats($link, $username, ['equipRing1' => 'ring of dexterity V']);
    }
    // --------------------------------------------------------------------------- equip ring of magic V
    if ($input=="equip ring of magic V" && $row['ringofmagicV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of magic V</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of magic V'");
        updateStats($link, $username, ['equipRing1' => 'ring of magic V']);
    }
    // --------------------------------------------------------------------------- equip ring of defense V
    if ($input=="equip ring of defense V" && $row['ringofdefenseV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of defense V</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of defense V'");
        updateStats($link, $username, ['equipRing1' => 'ring of defense V']);
    }


    // --------------------------------------------------------------------------- equip soldier's ring
    if ($input=="equip soldiers ring" && $row['soldiersring'] > 0) {
        echo $message = '<div class="menuAction">You equip your soldier\'s ring</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'soldier\'s ring'");
        updateStats($link, $username, ['equipRing1' => 'soldier\'s ring']);
    }
    // --------------------------------------------------------------------------- equip hunter ring
    if ($input=="equip hunter ring" && $row['hunterring'] > 0) {
        echo $message = '<div class="menuAction">You equip your hunter ring</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'hunter ring'");
        updateStats($link, $username, ['equipRing1' => 'hunter ring']);
    }
    // --------------------------------------------------------------------------- equip coyote ring
    if ($input=="equip coyote ring" && $row['coyotering'] > 0) {
        echo $message = '<div class="menuAction">You equip your coyote ring</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'coyote ring'");
        updateStats($link, $username, ['equipRing1' => 'coyote ring']);
    }

    // --------------------------------------------------------------------------- equip red wizard ring
    if ($input=="equip red wizard ring" && $row['redwizardring'] > 0) {
        echo $message = '<div class="menuAction">You equip your red wizard ring</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'red wizard ring'");
        updateStats($link, $username, ['equipRing1' => 'red wizard ring']);
    }
    // --------------------------------------------------------------------------- equip green wizard ring
    if ($input=="equip green wizard ring" && $row['greenwizardring'] > 0) {
        echo $message = '<div class="menuAction">You equip your green wizard ring</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'green wizard ring'");
        updateStats($link, $username, ['equipRing1' => 'green wizard ring']);
    }
    // --------------------------------------------------------------------------- equip yellow wizard ring
    if ($input=="equip yellow wizard ring" && $row['yellowwizardring'] > 0) {
        echo $message = '<div class="menuAction">You equip your yellow wizard ring</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'yellow wizard ring'");
        updateStats($link, $username, ['equipRing1' => 'yellow wizard ring']);
    }


    // --------------------------------------------------------------------------- equip ring of strength VI
    if ($input=="equip ring of strength VI" && $row['ringofstrengthVI'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of strength VI</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of strength VI'");
        updateStats($link, $username, ['equipRing1' => 'ring of strength VI']);
    }
    // --------------------------------------------------------------------------- equip ring of dexterity VI
    if ($input=="equip ring of dexterity VI" && $row['ringofdexterityVI'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of dexterity VI</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of dexterity VI'");
        updateStats($link, $username, ['equipRing1' => 'ring of dexterity VI']);
    }
    // --------------------------------------------------------------------------- equip ring of magic VI
    if ($input=="equip ring of magic VI" && $row['ringofmagicVI'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of magic VI</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of magic VI'");
        updateStats($link, $username, ['equipRing1' => 'ring of magic VI']);
    }
    // --------------------------------------------------------------------------- equip ring of defense VI
    if ($input=="equip ring of defense VI" && $row['ringofdefenseVI'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of defense VI</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of defense VI'");
        updateStats($link, $username, ['equipRing1' => 'ring of defense VI']);
    }


    // --------------------------------------------------------------------------- equip ring of strength VII
    if ($input=="equip ring of strength VII" && $row['ringofstrengthVII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of strength VII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of strength VII'");
        updateStats($link, $username, ['equipRing1' => 'ring of strength VII']);
    }
    // --------------------------------------------------------------------------- equip ring of dexterity VII
    if ($input=="equip ring of dexterity VII" && $row['ringofdexterityVII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of dexterity VII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of dexterity VII'");
        updateStats($link, $username, ['equipRing1' => 'ring of dexterity VII']);
    }
    // --------------------------------------------------------------------------- equip ring of magic VII
    if ($input=="equip ring of magic VII" && $row['ringofmagicVII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of magic VII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of magic VII'");
        updateStats($link, $username, ['equipRing1' => 'ring of magic VII']);
    }
    // --------------------------------------------------------------------------- equip ring of defense VII
    if ($input=="equip ring of defense VII" && $row['ringofdefenseVII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of defense VII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of defense VII'");
        updateStats($link, $username, ['equipRing1' => 'ring of defense VII']);
    }


    // --------------------------------------------------------------------------- equip ring of strength VIII
    if ($input=="equip ring of strength VIII" && $row['ringofstrengthVIII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of strength VIII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of strength VIII'");
        updateStats($link, $username, ['equipRing1' => 'ring of strength VIII']);
    }
    // --------------------------------------------------------------------------- equip ring of dexterity VIII
    if ($input=="equip ring of dexterity VIII" && $row['ringofdexterityVIII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of dexterity VIII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of dexterity VIII'");
        updateStats($link, $username, ['equipRing1' => 'ring of dexterity VIII']);
    }
    // --------------------------------------------------------------------------- equip ring of magic VIII
    if ($input=="equip ring of magic VIII" && $row['ringofmagicVIII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of magic VIII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of magic VIII'");
        updateStats($link, $username, ['equipRing1' => 'ring of magic VIII']);
    }
    // --------------------------------------------------------------------------- equip ring of defense VIII
    if ($input=="equip ring of defense VIII" && $row['ringofdefenseVIII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of defense VIII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of defense VIII'");
        updateStats($link, $username, ['equipRing1' => 'ring of defense VIII']);
    }





    // --------------------------------------------------------------------------- equip ring of strength IX
    if ($input=="equip ring of strength IX" && $row['ringofstrengthIX'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of strength IX</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of strength IX'");
        updateStats($link, $username, ['equipRing1' => 'ring of strength IX']); 
    }
    // --------------------------------------------------------------------------- equip ring of dexterity IX
    if ($input=="equip ring of dexterity IX" && $row['ringofdexterityIX'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of dexterity IX</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of dexterity IX'");
        updateStats($link, $username, ['equipRing1' => 'ring of dexterity IX']);
    }
    // --------------------------------------------------------------------------- equip ring of magic IX
    if ($input=="equip ring of magic IX" && $row['ringofmagicIX'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of magic IX</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of magic IX'");
        updateStats($link, $username, ['equipRing1' => 'ring of magic IX']);
    }
    // --------------------------------------------------------------------------- equip ring of defense IX
    if ($input=="equip ring of defense IX" && $row['ringofdefenseIX'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of defense IX</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of defense IX'");
        updateStats($link, $username, ['equipRing1' => 'ring of defense IX']);
    }


    // --------------------------------------------------------------------------- equip ring of strength X
    if ($input=="equip ring of strength X" && $row['ringofstrengthX'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of strength X</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of strength X'");
        updateStats($link, $username, ['equipRing1' => 'ring of strength X']);
    }
    // --------------------------------------------------------------------------- equip ring of dexterity X
    if ($input=="equip ring of dexterity X" && $row['ringofdexterityX'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of dexterity X</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of dexterity X'");
        updateStats($link, $username, ['equipRing1' => 'ring of dexterity X']);
    }
    // --------------------------------------------------------------------------- equip ring of magic X
    if ($input=="equip ring of magic X" && $row['ringofmagicX'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of magic X</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of magic X'");
        updateStats($link, $username, ['equipRing1' => 'ring of magic X']);
    }
    // --------------------------------------------------------------------------- equip ring of defense X
    if ($input=="equip ring of defense X" && $row['ringofdefenseX'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of defense X</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of defense X'");
        updateStats($link, $username, ['equipRing1' => 'ring of defense X']);
    }



    // --------------------------------------------------------------------------- equip ring of strength XI
    if ($input=="equip ring of strength XI" && $row['ringofstrengthXI'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of strength XI</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of strength XI'");
        updateStats($link, $username, ['equipRing1' => 'ring of strength XI']);
    }
    // --------------------------------------------------------------------------- equip ring of dexterity XI
    if ($input=="equip ring of dexterity XI" && $row['ringofdexterityXI'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of dexterity XI</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of dexterity XI'");
        updateStats($link, $username, ['equipRing1' => 'ring of dexterity XI']);
    }
    // --------------------------------------------------------------------------- equip ring of magic XI
    if ($input=="equip ring of magic XI" && $row['ringofmagicXI'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of magic XI</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of magic XI'");
        updateStats($link, $username, ['equipRing1' => 'ring of magic XI']);
    }
    // --------------------------------------------------------------------------- equip ring of defense XI
    if ($input=="equip ring of defense XI" && $row['ringofdefenseXI'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of defense XI</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of defense XI'");
        updateStats($link, $username, ['equipRing1' => 'ring of defense XI']);
    }


    // --------------------------------------------------------------------------- equip ring of strength XII
    if ($input=="equip ring of strength XII" && $row['ringofstrengthXII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of strength XII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of strength XII'");
        updateStats($link, $username, ['equipRing1' => 'ring of strength XII']);    
    }
    // --------------------------------------------------------------------------- equip ring of dexterity XII
    if ($input=="equip ring of dexterity XII" && $row['ringofdexterityXII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of dexterity XII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of dexterity XII'");
        updateStats($link, $username, ['equipRing1' => 'ring of dexterity XII']);
    }
    // --------------------------------------------------------------------------- equip ring of magic XII
    if ($input=="equip ring of magic XII" && $row['ringofmagicXII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of magic XII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of magic XII'");
        updateStats($link, $username, ['equipRing1' => 'ring of magic XII']);
    }
    // --------------------------------------------------------------------------- equip ring of defense XII
    if ($input=="equip ring of defense XII" && $row['ringofdefenseXII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of defense XII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of defense XII'");
        updateStats($link, $username, ['equipRing1' => 'ring of defense XII']);
    }


    // --------------------------------------------------------------------------- equip ring of strength XIII
    if ($input=="equip ring of strength XIII" && $row['ringofstrengthXIII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of strength XIII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of strength XIII'");
        updateStats($link, $username, ['equipRing1' => 'ring of strength XIII']);
    }
    // --------------------------------------------------------------------------- equip ring of dexterity XIII
    if ($input=="equip ring of dexterity XIII" && $row['ringofdexterityXIII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of dexterity XIII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of dexterity XIII'");
        updateStats($link, $username, ['equipRing1' => 'ring of dexterity XIII']);
    }
    // --------------------------------------------------------------------------- equip ring of magic XIII
    if ($input=="equip ring of magic XIII" && $row['ringofmagicXIII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of magic XIII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of magic XIII'");
        updateStats($link, $username, ['equipRing1' => 'ring of magic XIII']);
    }
    // --------------------------------------------------------------------------- equip ring of defense XIII
    if ($input=="equip ring of defense XIII" && $row['ringofdefenseXIII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of defense XIII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of defense XIII'");
        updateStats($link, $username, ['equipRing1' => 'ring of defense XIII']);
    }




    // --------------------------------------------------------------------------- equip ring of strength XIV
    if ($input=="equip ring of strength XIV" && $row['ringofstrengthXIV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of strength XIV</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of strength XIV'");
        updateStats($link, $username, ['equipRing1' => 'ring of strength XIV']);    
    }
    // --------------------------------------------------------------------------- equip ring of dexterity XIV
    if ($input=="equip ring of dexterity XIV" && $row['ringofdexterityXIV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of dexterity XIV</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of dexterity XIV'");
        updateStats($link, $username, ['equipRing1' => 'ring of dexterity XIV']);   
    }
    // --------------------------------------------------------------------------- equip ring of magic XIV
    if ($input=="equip ring of magic XIV" && $row['ringofmagicXIV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of magic XIV</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of magic XIV'");
        updateStats($link, $username, ['equipRing1' => 'ring of magic XIV']);
    }
    // --------------------------------------------------------------------------- equip ring of defense XIV
    if ($input=="equip ring of defense XIV" && $row['ringofdefenseXIV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of defense XIV</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of defense XIV'");
        updateStats($link, $username, ['equipRing1' => 'ring of defense XIV']);
    }




    // --------------------------------------------------------------------------- equip ring of strength XV
    if ($input=="equip ring of strength XV" && $row['ringofstrengthXV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of strength XV</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of strength XV'");
        updateStats($link, $username, ['equipRing1' => 'ring of strength XV']); 
    }
    // --------------------------------------------------------------------------- equip ring of dexterity XV
    if ($input=="equip ring of dexterity XV" && $row['ringofdexterityXV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of dexterity XV</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of dexterity XV'");
        updateStats($link, $username, ['equipRing1' => 'ring of dexterity XV']);
    }
    // --------------------------------------------------------------------------- equip ring of magic XV
    if ($input=="equip ring of magic XV" && $row['ringofmagicXV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of magic XV</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of magic XV'");
        updateStats($link, $username, ['equipRing1' => 'ring of magic XV']);
    }
    // --------------------------------------------------------------------------- equip ring of defense XV
    if ($input=="equip ring of defense XV" && $row['ringofdefenseXV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of defense XV</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of defense XV'");
        updateStats($link, $username, ['equipRing1' => 'ring of defense XV']);
    }






    // --------------------------------------------------------------------------- equip silver ring
    if ($input=="equip silver ring" && $row['silverring'] > 0) {
        echo $message = '<div class="menuAction">You equip your silver ring</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'silver ring'");
        updateStats($link, $username, ['equipRing1' => 'silver ring']); 
    }

        // --------------------------------------------------------------------------- equip rabid ring
        if ($input=="equip rabid ring" && $row['rabidring'] > 0) {
            echo $message = '<div class="menuAction">You equip your rabid ring</div>';
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET equipRing1 = 'rabid ring'");
            updateStats($link, $username, ['equipRing1' => 'rabid ring']);
        }
            // --------------------------------------------------------------------------- equip warped ring
    if ($input=="equip warped ring" && $row['warpedring'] > 0) {
        echo $message = '<div class="menuAction">You equip your warped ring</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'warped ring'");
        updateStats($link, $username, ['equipRing1' => 'warped ring']);
    }
        // --------------------------------------------------------------------------- equip ring of the magi
        if ($input=="equip ring of the magi" && $row['ringofthemagi'] > 0) {
            echo $message = '<div class="menuAction">You equip your ring of the magi</div>';
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET equipRing1 = 'ring of the magi'");
            updateStats($link, $username, ['equipRing1' => 'ring of the magi']);
        }

    // --------------------------------------------------------------------------- equip warped ring
    if ($input=="equip warped ring" && $row['warpedring'] > 0) {
        echo $message = '<div class="menuAction">You equip your warped ring</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing1 = 'warped ring'");
        updateStats($link, $username, ['equipRing1' => 'warped ring']);
    }

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx RING 2 SLOT




    // --------------------------------------------------------------------------- equip ring of health regen
    if ($input=="equip ring of health regen" && $row['ringofhealthregen'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of health regen</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of health regen'");
        updateStats($link, $username, ['equipRing2' => 'ring of health regen']);
    }
    // --------------------------------------------------------------------------- equip ring of mana regen
    if ($input=="equip ring of mana regen" && $row['ringofmanaregen'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of mana regen</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of mana regen'");  
        updateStats($link, $username, ['equipRing2' => 'ring of mana regen']);
    }
    // --------------------------------------------------------------------------- equip ring of health regen II
    if ($input=="equip ring of health regen II" && $row['ringofhealthregenII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of health regen II</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of health regen II'");
        updateStats($link, $username, ['equipRing2' => 'ring of health regen II']);
    }
    // --------------------------------------------------------------------------- equip ring of mana regen II
    if ($input=="equip ring of mana regen II" && $row['ringofmanaregenII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of mana regen II</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of mana regen II'");
        updateStats($link, $username, ['equipRing2' => 'ring of mana regen II']);
    }
    // --------------------------------------------------------------------------- equip ring of health regen III
    if ($input=="equip ring of health regen III" && $row['ringofhealthregenIII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of health regen III</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of health regen III'");
        updateStats($link, $username, ['equipRing2' => 'ring of health regen III']);
    }
    // --------------------------------------------------------------------------- equip ring of mana regen III
    if ($input=="equip ring of mana regen III" && $row['ringofmanaregenIII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of mana regen III</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of mana regen III'");
        updateStats($link, $username, ['equipRing2' => 'ring of mana regen III']);
    }
    // --------------------------------------------------------------------------- equip ring of health regen IV
    if ($input=="equip ring of health regen IV" && $row['ringofhealthregenIV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of health regen IV</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of health regen IV'");
        updateStats($link, $username, ['equipRing2' => 'ring of health regen IV']);
    }
    // --------------------------------------------------------------------------- equip ring of mana regen IV
    if ($input=="equip ring of mana regen IV" && $row['ringofmanaregenIV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of mana regen IV</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of mana regen IV'");
        updateStats($link, $username, ['equipRing2' => 'ring of mana regen IV']);
    }
    // --------------------------------------------------------------------------- equip ring of health regen V
    if ($input=="equip ring of health regen V" && $row['ringofhealthregenV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of health regen V</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of health regen V'");
        updateStats($link, $username, ['equipRing2' => 'ring of health regen V']);
    }
    // --------------------------------------------------------------------------- equip ring of mana regen V
    if ($input=="equip ring of mana regen V" && $row['ringofmanaregenV'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of mana regen V</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of mana regen V'");
        updateStats($link, $username, ['equipRing2' => 'ring of mana regen V']);
    }

    // --------------------------------------------------------------------------- equip ring of health regen IV
    if ($input=="equip ring of health regen VI" && $row['ringofhealthregenVI'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of health regen VI</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of health regen VI'");
        updateStats($link, $username, ['equipRing2' => 'ring of health regen VI']);
    }
    // --------------------------------------------------------------------------- equip ring of mana regen IV
    if ($input=="equip ring of mana regen VI" && $row['ringofmanaregenVI'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of mana regen VI</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of mana regen VI'");
        updateStats($link, $username, ['equipRing2' => 'ring of mana regen VI']);
    }
    // --------------------------------------------------------------------------- equip ring of health regen VII
    if ($input=="equip ring of health regen VII" && $row['ringofhealthregenVII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of health regen VII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of health regen VII'");
        updateStats($link, $username, ['equipRing2' => 'ring of health regen VII']);
    }
    // --------------------------------------------------------------------------- equip ring of mana regen VII
    if ($input=="equip ring of mana regen VII" && $row['ringofmanaregenVII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of mana regen VII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of mana regen VII'");
        updateStats($link, $username, ['equipRing2' => 'ring of mana regen VII']);
    }
    // --------------------------------------------------------------------------- equip ring of health regen VIII
    if ($input=="equip ring of health regen VIII" && $row['ringofhealthregenVIII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of health regen VIII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of health regen VIII'");
        updateStats($link, $username, ['equipRing2' => 'ring of health regen VIII']);   
    }
    // --------------------------------------------------------------------------- equip ring of mana regen VIII
    if ($input=="equip ring of mana regen VIII" && $row['ringofmanaregenVIII'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of mana regen VIII</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of mana regen VIII'");
        updateStats($link, $username, ['equipRing2' => 'ring of mana regen VIII']);
    }
    // --------------------------------------------------------------------------- equip ring of health regen IX
    if ($input=="equip ring of health regen IX" && $row['ringofhealthregenIX'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of health regen IX</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of health regen IX'");
        updateStats($link, $username, ['equipRing2' => 'ring of health regen IX']);
    }
    // --------------------------------------------------------------------------- equip ring of mana regen IX
    if ($input=="equip ring of mana regen IX" && $row['ringofmanaregenIX'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of mana regen IX</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of mana regen IX'");
        updateStats($link, $username, ['equipRing2' => 'ring of mana regen IX']);
    }
    // --------------------------------------------------------------------------- equip ring of health regen X
    if ($input=="equip ring of health regen X" && $row['ringofhealthregenX'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of health regen X</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of health regen X'");
        updateStats($link, $username, ['equipRing2' => 'ring of health regen X']);
    }
    // --------------------------------------------------------------------------- equip ring of mana regen X
    if ($input=="equip ring of mana regen X" && $row['ringofmanaregenX'] > 0) {
        echo $message = '<div class="menuAction">You equip your ring of mana regen X</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipRing2 = 'ring of mana regen X'");
        updateStats($link, $username, ['equipRing2' => 'ring of mana regen X']);
    }


















    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx NECKLACE SLOT
    // --------------------------------------------------------------------------- wooden necklace
    if ($input=="equip wooden necklace" && $row['woodennecklace'] > 0) {
        echo $message = '<div class="menuAction">You equip your wooden necklace</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipNeck = 'wooden necklace'");
        updateStats($link, $username, ['equipNeck' => 'wooden necklace']);  
    }
    // --------------------------------------------------------------------------- bone necklace
    if ($input=="equip bone necklace" && $row['bonenecklace'] > 0) {
        echo $message = '<div class="menuAction">You equip your bone necklace</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipNeck = 'bone necklace'");
        updateStats($link, $username, ['equipNeck' => 'bone necklace']);    
    }
    // --------------------------------------------------------------------------- stone necklace
    if ($input=="equip stone necklace" && $row['stonenecklace'] > 0) {
        echo $message = '<div class="menuAction">You equip your stone necklace</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipNeck = 'stone necklace'");
        updateStats($link, $username, ['equipNeck' => 'stone necklace']);
    }
    // --------------------------------------------------------------------------- blue pendant
    if ($input=="equip blue pendant" && $row['bluependant'] > 0) {
        echo $message = '<div class="menuAction">You equip your blue pendant</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipNeck = 'blue pendant'");
        updateStats($link, $username, ['equipNeck' => 'blue pendant']);
    }
    // --------------------------------------------------------------------------- red talisman
    if ($input=="equip red talisman" && $row['redtalisman'] > 0) {
        echo $message = '<div class="menuAction">You equip your red talisman</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipNeck = 'red talisman'");
        updateStats($link, $username, ['equipNeck' => 'red talisman']); 
    }
    // --------------------------------------------------------------------------- green pendant
    if ($input=="equip green pendant" && $row['greenpendant'] > 0) {
        echo $message = '<div class="menuAction">You equip your green pendant</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipNeck = 'green pendant'");
        updateStats($link, $username, ['equipNeck' => 'green pendant']);
    }
    // --------------------------------------------------------------------------- coral necklace
    if ($input=="equip coral necklace" && $row['coralnecklace'] > 0) {
        echo $message = '<div class="menuAction">You equip your coral necklace</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipNeck = 'coral necklace'");
        updateStats($link, $username, ['equipNeck' => 'coral necklace']);
    }
    // --------------------------------------------------------------------------- vapor necklace
    if ($input=="equip vapor necklace" && $row['vapornecklace'] > 0) {
        echo $message = '<div class="menuAction">You equip	 your vapor necklace</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipNeck = 'vapor necklace'");
        updateStats($link, $username, ['equipNeck' => 'vapor necklace']);
    }
    // --------------------------------------------------------------------------- silver necklace
    if ($input=="equip silver necklace" && $row['silvernecklace'] > 0) {
        echo $message = '<div class="menuAction">You equip your silver necklace</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipNeck = 'silver necklace'");
        updateStats($link, $username, ['equipNeck' => 'silver necklace']);
    }

    // --------------------------------------------------------------------------- iron necklace
    if ($input=="equip iron necklace" && $row['ironnecklace'] > 0) {
        echo $message = '<div class="menuAction">You equip your iron necklace</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipNeck = 'iron necklace'");
        updateStats($link, $username, ['equipNeck' => 'iron necklace']);
    }

    // --------------------------------------------------------------------------- shaman necklace
    if ($input=="equip shaman necklace" && $row['shamannecklace'] > 0) {
        echo $message = '<div class="menuAction">You equip your shaman necklace</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipNeck = 'shaman necklace'");
        updateStats($link, $username, ['equipNeck' => 'shaman necklace']);
    }

    // --------------------------------------------------------------------------- warrior pendant
    if ($input=="equip warrior pendant" && $row['warriorpendant'] > 0) {
        echo $message = '<div class="menuAction">You equip your warrior pendant</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipNeck = 'warrior pendant'");
        updateStats($link, $username, ['equipNeck' => 'warrior pendant']);
    }


        // --------------------------------------------------------------------------- ranger amulet
        if ($input=="equip ranger amulet" && $row['rangeramulet'] > 0) {
            echo $message = '<div class="menuAction">You equip your ranger amulet</div>';
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET equipNeck = 'ranger amulet'");
            updateStats($link, $username, ['equipNeck' => 'ranger amulet']);
        }

        
            // --------------------------------------------------------------------------- royal necklace
    if ($input=="equip royal necklace" && $row['royalnecklace'] > 0) {
        echo $message = '<div class="menuAction">You equip your royal necklace</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipNeck = 'royal necklace'");
        updateStats($link, $username, ['equipNeck' => 'royal necklace']);
    }

    // --------------------------------------------------------------------------- steel necklace
    if ($input=="equip steel necklace" && $row['steelnecklace'] > 0) {
        echo $message = '<div class="menuAction">You equip your steel necklace</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipNeck = 'steel necklace'");
        updateStats($link, $username, ['equipNeck' => 'steel necklace']);
    }
    // --------------------------------------------------------------------------- owl eye pendant
    if ($input=="equip owl eye pendant" && $row['owleyependant'] > 0) {
        echo $message = '<div class="menuAction">You equip your owl eye pendant</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipNeck = 'owl eye pendant'");
        updateStats($link, $username, ['equipNeck' => 'owl eye pendant']);
    }
    // --------------------------------------------------------------------------- mithril necklace
    if ($input=="equip mithril necklace" && $row['mithrilnecklace'] > 0) {
        echo $message = '<div class="menuAction">You equip your mithril necklace</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipNeck = 'mithril necklace'");
        updateStats($link, $username, ['equipNeck' => 'mithril necklace']);
    }



















    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ARTIFACT SLOT
    // --------------------------------------------------------------------------- coral coin
    if ($input=="equip coral coin" && $row['coralcoin'] > 0) {
        echo $message = '<div class="menuAction">You equip your coral coin</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipArtifact = 'coral coin'");
        updateStats($link, $username, ['equipArtifact' => 'coral coin']);   
    }
    // --------------------------------------------------------------------------- squid tooth
    if ($input=="equip squid tooth" && $row['squidtooth'] > 0) {
        echo $message = '<div class="menuAction">You equip your squid tooth</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipArtifact = 'squid tooth'");
        updateStats($link, $username, ['equipArtifact' => 'squid tooth']);
    }

    // --------------------------------------------------------------------------- pearl of wisdom
    if ($input=="equip pearl of wisdom" && $row['pearlofwisdom'] > 0) {
        echo $message = '<div class="menuAction">You equip your pearl of wisdom</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipArtifact = 'pearl of wisdom'");
        updateStats($link, $username, ['equipArtifact' => 'pearl of wisdom']);
    }


    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ACTIVATE COMPANION
    // --------------------------------------------------------------------------- dwarf axeman
    if ($input=="activate dwarf axeman" && $row['COMPdwarfaxeman'] > 0) {
        echo $message = '<div class="menuAction">The dwarf axeman stands by your side ready for battle!</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipComp = 'dwarf axeman'");
        updateStats($link, $username, ['equipComp' => 'dwarf axeman']); 
        
    }


    if ($input=="activate elf ranger" && $row['COMPelfranger'] > 0) {
        echo $message = '<div class="menuAction">The elf ranger stands by your side ready for battle!</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipComp = 'elf ranger'");
        updateStats($link, $username, ['equipComp' => 'elf ranger']); 
    }


    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ACTIVATE PET

    // --------------------------------------------------------------------------- pet hampster
    if ($input=="activate pet hampster" && $row['pethampster'] > 0) {
        echo $message = '<div class="menuAction">Your pet hampster jumps by your side ready for battle!</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipPet = 'pet hampster'");
        updateStats($link, $username, ['equipPet' => 'pet hampster']);  
    }
    // --------------------------------------------------------------------------- pet bat
    if ($input=="activate pet bat" && $row['petbat'] > 0) {
        echo $message = '<div class="menuAction">Your pet bat flies by your side ready for battle!</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipPet = 'pet bat'");
        updateStats($link, $username, ['equipPet' => 'pet bat']);
    }

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ACTIVATE MOUNT
    // --------------------------------------------------------------------------- wooden boat
    if ($input=="use wooden boat" && $row['MOUNTwoodenboat'] > 0 &&

($room == '016' || $room == 401 || $room == 402 || $room == 403 || $room == 404 || $room == 405 || $room == 406 || $room == 407 || $room == 408 || $room == 409 || $room == 410 || $room == 411 || $room == 412 || $room == 413 || $room == 414 || $room == 415 || $room == 416 || $room == 417 || $room == 418 || $room == 419 || $room == 420 || $room == 421 || $room == 422 || $room == 423 || $room == 424 || $room == 425 || $room == 426)

) {
        echo $message = '<div class="menuAction">You jump into your Wooden Boat!</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipMount = 'wooden boat'");
        updateStats($link, $username, ['equipMount' => 'wooden boat']);       
    } elseif ($input=="use wooden boat" && $row['MOUNTwoodenboat'] > 0) {
        echo $message = '<div class="menuAction">You can only use your Wooden Boat if you are in the Ocean or at a Dock!</div>';
        include('update_feed.php'); // --- update feed
    } elseif ($input=="use wooden boat" && $row['MOUNTwoodenboat'] <= 0) {
        echo $message = "You don't have a Wooden Boat! You need to CRAFT one out of 20 wood if you want to enter the ocean.<br>";
        include('update_feed.php'); // --- update feed
    }

    // --------------------------------------------------------------------------- dire wolf
    if ($input=="mount dire wolf" && $row['MOUNTdirewolf'] > 0) {
        echo $message = '<div class="menuAction">You mount your awesome Dire Wolf!</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipMount = 'dire wolf'");
        updateStats($link, $username, ['equipMount' => 'dire wolf']);
    }
    // --------------------------------------------------------------------------- sky hawk
    if ($input=="mount sky hawk" && $row['MOUNTskyhawk'] > 0) {
        echo $message = '<div class="menuAction">You mount your awesome sky hawk!</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipMount = 'sky hawk'");
        updateStats($link, $username, ['equipMount' => 'sky hawk']);
    }
    // --------------------------------------------------------------------------- green griffin
    if ($input=="mount green griffin" && $row['MOUNTgreengriffin'] > 0) {
        echo $message = '<div class="menuAction">You mount your awesome green griffin!</div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET equipMount = 'green griffin'");
        updateStats($link, $username, ['equipMount' => 'green griffin']);
    }
// }





 // // -------------------------DB CONNECT!
// include('db-connect.php');
// // -------------------------DB QUERY!
// $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
// $stmt->bind_param("s", $_SESSION['username']);
// $stmt->execute();
// $result = $stmt->get_result();
// if (!$result) {
//     die('There was an error running the query [' . $link->error . ']');
// }
// // -------------------------DB OUTPUT!
// while ($row = $result->fetch_assoc()) {

$row = getUserData($link, $_SESSION['username']); // --- gets all user data from database
    // --------------------------------------------------------------------------- no boat if not in ocean or dock
    $mount = $row['equipMount'];
    //echo $mount.' ' .$room;

    if ($mount == 'wooden boat' && ($room == '016' || $room == 401 || $room == 402 || $room == 403 || $room == 404 || $room == 405 || $room == 406 || $room == 407 || $room == 408 || $room == 409 || $room == 410 || $room == 411 || $room == 412 || $room == 413 || $room == 414 || $room == 415 || $room == 416 || $room == 417 || $room == 418 || $room == 419 || $room == 420 || $room == 421 || $room == 422 || $room == 423 || $room == 424 || $room == 425 || $room == 426)) {
    } elseif ($mount == 'wooden boat') {
        // $results = $link->query("UPDATE $user SET equipMount = '<span> - - - </span>'");
        updateStats($link, $username, ['equipMount' => '<span> - - - </span>']);

    }





    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ONE HANDED SLOT

    // --------------------------------------------------------------------------- activate silver aura
    if ($input=="activate silver aura" && $row['AURAsilveraura'] > 0) {
        echo $message = '<div class="menuAction">You activate your Silver Aura!</div>';
        include('update_feed.php'); // --- update feed
        // // $results = $link->query("UPDATE $user SET equipAura = 'silver aura'");
        updateStats($link, $username, ['equipAura' => 'silver aura']);
    }


    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx UNEQUIP

    // --------------------------------------------------------------------------- UNEQUIP ALL
    if ($input=="unequip all") {
        echo $message = '<div class="menuAction">You unequip all of your equipment</div>';
        include('update_feed.php'); // --- update feed
        // // $results = $link->query("UPDATE $user SET equipR = 'fists'");
        // // $results = $link->query("UPDATE $user SET equipL = '<span> - - - </span>'");
        // // $results = $link->query("UPDATE $user SET equipHead = '<span> - - - </span>'");
        // // $results = $link->query("UPDATE $user SET equipBody = '<span> - - - </span>'");
        // // $results = $link->query("UPDATE $user SET equipHands = '<span> - - - </span>'");
        // // $results = $link->query("UPDATE $user SET equipFeet = '<span> - - - </span>'");
        // // $results = $link->query("UPDATE $user SET equipRing1 = '<span> - - - </span>'");
        // // $results = $link->query("UPDATE $user SET equipRing2 = '<span> - - - </span>'");
        // // $results = $link->query("UPDATE $user SET equipNeck = '<span> - - - </span>'");
        // // $results = $link->query("UPDATE $user SET equipPet = '<span> - - - </span>'");
        // // $results = $link->query("UPDATE $user SET equipComp = '<span> - - - </span>'");
        // // $results = $link->query("UPDATE $user SET equipMount = '<span> - - - </span>'");
        // // $results = $link->query("UPDATE $user SET equipArtifact = '<span> - - - </span>'");

        updateStats($link, $username, ['equipR' => 'fists']);
        updateStats($link, $username, ['equipL' => '<span> - - - </span>']);
        updateStats($link, $username, ['equipHead' => '<span> - - - </span>']);
        updateStats($link, $username, ['equipBody' => '<span> - - - </span>']);
        updateStats($link, $username, ['equipHands' => '<span> - - - </span>']);
        updateStats($link, $username, ['equipFeet' => '<span> - - - </span>']);
        updateStats($link, $username, ['equipRing1' => '<span> - - - </span>']);
        updateStats($link, $username, ['equipRing2' => '<span> - - - </span>']);
        updateStats($link, $username, ['equipNeck' => '<span> - - - </span>']);
        updateStats($link, $username, ['equipPet' => '<span> - - - </span>']);
        updateStats($link, $username, ['equipComp' => '<span> - - - </span>']);
        updateStats($link, $username, ['equipMount' => '<span> - - - </span>']);
        updateStats($link, $username, ['equipArtifact' => '<span> - - - </span>']); 

        // $results = $link->query("UPDATE $user SET weapontype = 0");
        updateStats($link, $username, ['weapontype' => 0]); 
        


        //$funflag=1;
    }
//}
