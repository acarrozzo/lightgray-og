<?php
// -------------------------DB CONNECT!
include ('db-connect.php');
// -------------------------DB QUERY!
// $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
// $stmt->bind_param("s", $_SESSION['username']);
// $stmt->execute();
// $result = $stmt->get_result();
// if (!$result) {
//     die('There was an error running the query [' . $link->error . ']');
// }
// -------------------------DB OUTPUT!
// while ($row = $result->fetch_assoc()) {

$row = getUserData($link, $_SESSION['username']); // --- gets all user data from database



    $characterclass = $row['characterclass'];
    $evolve = $row['evolve'];
    $physicaltraining = $row['physicaltraining'];
    $mentaltraining = $row['mentaltraining'];


    // $str = $row['str'];
    // $dex = $row['dex'];
    // $mag = $row['mag'];
    // $def = $row['def'];

    // ---- sets main stats to core stats
    $str = $row['str'];
    $dex = $row['dex'];
    $mag = $row['mag'];
    $def = $row['def'];

    // ---- resets mod stats to core stats
    $strmod = $_SESSION['strmod'] = $str;
    $dexmod = $_SESSION['dexmod'] = $dex;
    $magmod = $_SESSION['magmod'] = $mag;
    $defmod = $_SESSION['defmod'] = $def;

    // $updates = [ // -- set changes
    //     'strmod' => $str,
    //     'dexmod' => $dex,
    //     'magmod' => $mag,
    //     'defmod' => $def
    // ]; 
    // updateStats($link, $username, $updates); // -- apply changes

    //-------------------copied from hud.php
    $cp = $row['cp'];
    $onehanded=$row['onehanded'];
    $twohanded=$row['twohanded'];
    $ranged=$row['ranged'];
    $onehandedpro=$row['onehandedpro'];
    $twohandedpro=$row['twohandedpro'];
    $rangedpro=$row['rangedpro'];
    $warcraft=$row['warcraft'];
    $toughness=$row['toughness'];
    $weapontype = $row['weapontype'];
    $blockSkill = $row['block'];
    $hp = $row['hp'];
    $hpmax = $row['hpmax'];
    $mp = $row['mp'];
    $mpmax = $row['mpmax'];
    $xp = $row['xp'];
    $currency = $row['currency'];
    //-------------------copied from function-level.php
    $level = $row['level'];
    $nxlevel = $level + 1;
    $xp = $row['xp'];

    // --- EASY ORIGINAL LEVELING
    $nextlevel = ($level+1) * ($level+1) * ($level+1);
    $prevlevel = $level * $level * $level;


    // --- DOUBLE ORIGINAL LEVELING
    $nextlevel = (($level+1) * ($level+1) * ($level+1))*2;
    $prevlevel = ($level * $level * $level)*2;

   // $nextlevel = ($level+1) * ($level+1) * ($level+1) * ($level+1); // activate for hard / slow leveling // TOO SLOW
   // $prevlevel = $level * $level * $level * $level; // activate for hard / slow leveling // TOO SLOW

   if ($prevlevel == 1) {
    $prevlevel = 0;
}

    $num_total = $nextlevel - $prevlevel;
    $num_xp = $xp - $prevlevel;
    $need = $nextlevel - $xp;
    $count1 = $num_xp / $num_total;
    $count2 = $count1 * 100;
    $count = number_format($count2, 0);

    //------------------






    // --------------------------------------------------------------------------- USERNAME + LVL
    // --------------------------------------------------------------------------- USERNAME + LVL
    // --------------------------------------------------------------------------- USERNAME + LVL

    echo '<div class="gbox">';

    // ----- updates mod stat to main core stat (doing inside this container to not throw off order css, can move outside when i disable the update message in function)
    $updates = [ // -- set changes
        'strmod' => $str,
        'dexmod' => $dex,
        'magmod' => $mag,
        'defmod' => $def
    ]; 
    updateStats($link, $username, $updates); // -- apply changes

 // Function created by copilot to grab the character details based on the weapon type
    // This function checks the weapon type and the character's stats to determine the character color and SVG icon to display
    // It returns an array with the character color and SVG icon content

 function getCharacterDetails($weapontype, $row) {
    if ($row['weapontype'] == 3 && ($_SESSION['magmod'] > $_SESSION['dexmod'])) {
        return ["blue", file_get_contents("img/svg/npc/char-wizard.svg")];
    } elseif (($row['weapontype'] == 1 || $row['weapontype'] == 2) && $_SESSION['magmod'] >= $_SESSION['strmod']) {
        return ["blue", file_get_contents("img/svg/npc/char-mage.svg")];
    } elseif ($row['weapontype'] == 3) {
        return ["green", file_get_contents("img/svg/npc/char-archer.svg")];
    } elseif ($row['weapontype'] == 2) {
        return ["red", file_get_contents("img/svg/npc/char-beastmaster.svg")];
    } elseif ($row['weapontype'] == 1) {
        return ["red", file_get_contents("img/svg/npc/char-commander.svg")];
    } else {
        return ["dgray", file_get_contents("img/svg/npc/char-wanderer.svg")];
    }
}

list($charactercolor, $char) = getCharacterDetails($weapontype, $row);
// end function

    echo '<h1>'.$row['username'].'</h1>';
    echo '<i class="icon '.$charactercolor.' character card ddgrayBG">'.$char.'</i>';
    echo '<h3 class="toprightX boxX ddgray"> lvl <span class="gold">'. $row['level'].'</span></h3>';
    echo '<div class="buffbound small">';
// <h4 class="lgray">Human '.$characterclass.'</h4>
    //<span class= "cyan"> e</span><span class="cyan">'. $row['evolve'].'</span>

    // --------------------------------------------------------------------------- Poison Buff Box
    if ($_SESSION['poisonyou'] >  0) {
        echo '<span class="green buffBox">poison -'.$_SESSION['poisonyou'].'</span>';
    }
    // --------------------------------------------------------------------------- COLORS Box
    if ($_SESSION['reds'] >  0) {
        echo '<span class="red buffBox">str</span>';
    }
    if ($_SESSION['greens'] >  0) {
        echo '<span class="green buffBox">dex</span>';
    }
    if ($_SESSION['blues'] >  0) {
        echo '<span class="blue buffBox">mag</span>';
    }
    if ($_SESSION['yellows'] >  0) {
        echo '<span class="gold buffBox">def</span>';
    }
    if ($_SESSION['coffee'] >  0) {
        echo '<span class="lightbrown buffBox">java</span>';
    }
    if ($_SESSION['tea'] >  0) {
        echo '<span class="yellowgreen buffBox">tea</span>';
    }
    // --------------------------------------------------------------------------- Iron Skin Buff Box
    if ($_SESSION['ironskin_amount'] >  0) {
        echo '<span class="gold buffBox">ironskin +'.$_SESSION['ironskin_amount'].'</span>';
    }
    // --------------------------------------------------------------------------- Regenerate Buff Box
    if ($_SESSION['regenerate_clicks'] >  0) {
        echo '<span class="red buffBox">regen +'.$row['regenerate'].'</span>';
    }
    // --------------------------------------------------------------------------- Flying Buff Box
    if ($_SESSION['flying'] >  0) {
        echo '<span class="blue buffBox">wings</span>';
    }
    // --------------------------------------------------------------------------- Breathing Water Buff Box
    if ($_SESSION['breathingwater'] >  0) {
        echo '<span class="darkblue buffBox">gills</span>';
    }

    echo '</div>'; // end buffbound box


    $extrahp = 0;
    $extramp = 0;


    // --------------------------------------------------------------------------- HP BAR
    // HP Percent
    $percent = (($hp / $hpmax)* 100);
    if ($percent > 100) {
        $percent = 100;
    }

    if ($row['hp'] >  $row['hpmax']) { // HP EXTRA
        $barBGcolor = 'redBG';
        $barNUMcolor = 'yellow';
        $extrahp = $row['hp'] - $row['hpmax'];
    } else { // HP NORMALbr
        $barBGcolor = 'redBG';
        $barNUMcolor = 'lightgray';
    }
    echo '
	<div class="bar">
	<div style="width: '.$percent.'%" class="barMid '.$barBGcolor.'">
    <span> HP</span>
	</div>
	<span class="maxxer "><strong class="'.$barNUMcolor.'">'.$hp.'</strong>/'.$hpmax.'</span>
	';
    echo '</div>';

    // --------------------------------------------------------------------------- Magic Armor Buff Box
    if ($_SESSION['magicarmor_amount'] >  0) {
        echo '<div class="red magicarmorBox">+'.$_SESSION['magicarmor_amount'].'</div>';
    }


    // --------------------------------------------------------------------------- MP BAR
    // MP Percent
    $percent = (($mp / $mpmax)* 100);
    if ($percent > 100) {
        $percent = 100;
    }

    $extramp = $row['mp'] - $row['mpmax'];

    if ($mp >  $mpmax) {
        $barBGcolor = 'blueBG';
        $barNUMcolor = 'yellow';
    } else {
        $barBGcolor = 'blueBG';
        $barNUMcolor = 'lightgray';
    }

    echo '
	<div class="bar">
	<div style="width: '.$percent.'%" class="barMid '.$barBGcolor.'">
     <span>MP</span>
	</div>
	<span class="maxxer"><strong class="'.$barNUMcolor.'">'.$mp.'</strong>/'.$mpmax.'</span>
	</div>';




    // --------------------------------------------------------------------------- XP BAR
    //$num_total = $nextlevel - $prevlevel;
    //$num_xp = $xp - $prevlevel;
    //$need = $nextlevel - $xp;

    $levelxp = $xp - $prevlevel;

    //$count1 = $num_xp / $num_total;
    //$count2 = $count1 * 100;
    //$count = number_format($count2, 0);

    // XP Percent
    $xpPercent = $count2;
    if ($xpPercent > 100) {
        $xpPercent = 100;
    }
    if ($xpPercent < 0) {
        $xpPercent = 0;
    }
    //$percent = $percent * $scale;

    $barBGcolor = 'greenBG';
    $barNUMcolor = 'lightgray';

    echo '
	<div class="bar">
	<div style="width: '.$xpPercent.'%" class="barMid '.$barBGcolor.'">
	<span>XP</span>
   <strong class="count"> '.$levelxp.' </strong>
    </div>
    <span class="maxxer"><span class="'.$barNUMcolor.'">need </span> '.$need.'</span>
    </div>';

   // echo '<div class="right"><a class="btnl lgray" href="" data-link2="skills">SKILLS &gt;</a></div>';

    // ----------------------------------------------------------------------------------------------------------- CP, SP, COIN, ROOM




    echo'<div class="">'; // POINTS OVERVIEW

    echo'<div>
    <span class="">Core Points</span> ';
    if ($row['cp']>0) {
        echo '<span class=" yellow"> '.$row['cp'].'</span> ';
    } else {
        echo'<span class=" gray"> '.$row['cp'].'</span> ';
    }

    echo'</div>
    <div><span class="">Training Points</span> ';
    if ($row['tp']>0) {
        echo '<span class=" yellow"> '.$row['tp'].'</span>
        <div class="right"><a class="btnl yellow" href="" data-link2="training">Training &gt;</a></div>
        ';
    } else {
        echo'<span class=" gray"> '.$row['tp'].'</span> ';
    }

    echo '</div>
    <div class="right"><a class="btnl purple" href="" data-link2="skills">Skills &gt;</a> <a class="btnl purple" href="" data-link2="spells">Spells &gt;</a></div>
    <div><span class="">Skill Points </span> ';
    if ($row['sp']>0) {
        echo'<span class=" purple"> '.$row['sp'].'</span> ';
    } else {
        echo'<span class=" gray"> '.$row['sp'].'</span> ';
    }
    echo '</div>';
    echo '<div>';
    echo'<span class="">PT </span><span class="red ">'.$physicaltraining.'</span> ' ;
    echo'<span class="">MT </span><span class="blue ">'.$mentaltraining.'</span> ' ;
    echo '</div>';

    echo '<div>';
    echo ' <span class="lgray right">room:'.$room.'</span>' ;
    echo'<span class="">'.$_SESSION['currency'].'</span> ';
    echo '<span class="gold ">'.$currency.'</span> ' ;
    echo '</div>';
    /*
        $currencyorig = $currency;
        if ($currency > 10000000) {
            $currency = $currency / 1000000;
            $currency = floor($currency);
            echo '<span class="white ">'.$currency.'m</span> <span class="gray"> ['.$currencyorig.']</span>' ;
        } elseif ($currency > 10000) {
            $currency = $currency / 1000;
            $currency = floor($currency);
            echo '<span class="yellow ">'.$currency.'k </span> <span class="gray"> ['.$currencyorig.']</span>' ;
        } else {
            echo '<span class="gold ">'.$currency.'</span> ' ;
        }

    */


    echo '<div>';
    if ($row['goldkey']==1) {
        echo ' <span class=" yellow"> You have '.$row['goldkey'].' gold key!</span> ';
    }
    if ($row['goldkey']>1) {
        echo ' <span class=" yellow"> You have '.$row['goldkey'].' gold keys!</span> ';
    }

    echo '</div>' ;


    echo'</div>'; // END POINTS OVERVIEW


// } // -- END WHILE


// ----------------------------------------------------------------------------- HUD TAB
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
    $cp = $row['cp'];

  //  $onehanded=$row['onehanded'];
  //  $twohanded=$row['twohanded'];
 //   $ranged=$row['ranged'];
   // $warcraft=$row['warcraft'];
  //  $toughness=$row['toughness'];
 //   $weapontype = $row['weapontype'];
 //   $blockSkill = $row['block'];
 //   $hp = $row['hp'];
//    $hpmax = $row['hpmax'];
 //   $mp = $row['mp'];
 //   $mpmax = $row['mpmax'];
 //   $xp = $row['xp'];

 //   $currency=$row['currency'];
    //	$goldkey=$row['goldkey'];








    // ------------------------------------ USER STAT BAR MATH!
    ////$scale = 2.80;
    // HP Percent
    $percent = (($hp / $hpmax)* 100);
    if ($percent > 100) {
        $percent = 100;
    }
    ////$percent = $percent * $scale;

    //<a href="" class="closePop"><i class="fa fa-times"></i></a>

    //<h3 class="user">'.$row['username'].'</h3>
    //<span class="lvl">'. $row['level'].'</span>

    //echo '<div id="hud">';






    // -- sets stats to core stats
    $str = $row['str'];
    $dex = $row['dex'];
    $mag = $row['mag'];
    $def = $row['def'];

    $_SESSION['strmod'] = $row['str'];
    $_SESSION['dexmod'] = $row['dex'];
    $_SESSION['magmod'] = $row['mag'];
    $_SESSION['defmod'] = $row['def'];

    // echo '0session strmod: '.$_SESSION['strmod'].'<br>';
    // echo '0session dexmod: '.$_SESSION['dexmod'].'<br>';
    // echo '0session magmod: '.$_SESSION['magmod'].'<br>';
    // echo '0session defmod: '.$_SESSION['defmod'].'<br>';

    $_SESSION["healthregen"]= 0;
    $_SESSION["manaregen"]= 0;

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Resets all BUFFS **
    // xxxxxxxxxxxxThis might not be needed if we use the sessions up above to reser the mod buffs
    // $updates = [ // -- set changes
    //     'strmod' => $str,
    //     'defmod' => $def,
    //     'dexmod' => $dex,
    //     'magmod' => $mag
    // ];
    // updateStats($link, $username, $updates); // -- apply changes

    echo '</div>';
    echo '<div class="gbox equippedBox">';


    echo '<h2 class="gold">Equipped</h2>';

  //  echo '<div class="topright"><a class="btn" href="" class="menuIcon" data-link="inv">Open INV ></a></div>';
    echo '<div><span class="eqpcat">Right</span> '. $row['equipR'].'<span>';
    include('buff-right.php');
    '</span>';


    $held = $row['equipR'];

    if ($held=='wooden bow' || $held=='hunter bow' || $held=='long bow' || $held=='iron bow' || $held=='enchanted bow' || $held=='venom bow'
    || $held=='silver bow' || $held=='steel bow' || $held=='greenhorn bow'
    || $held=='mithril bow' || $held=='black bow' || $held=='snow bow') {
        $_SESSION['bow_equipped'] = 1;
        echo ' <span class="ammo small"> <span class="gold"> arrows </span> x'.$row['arrows'].'</span> ';
    } else {
        $_SESSION['bow_equipped'] = 0;
    }


    if ($held=='crossbow' || $held=='iron crossbow' || $held=='compound crossbow' || $held=='hand crossbow'
    || $held=='silver crossbow' || $held=='steel crossbow' || $held=='keeper\'s crossbow'
    || $held=='mithril crossbow' || $held=='black crossbow' || $held=='ranger crossbow') {
        $_SESSION['crossbow_equipped'] = 1;
        echo ' <span class="ammo small"> <span class="gold"> bolts </span> x'.$row['bolts'].'</span> ';
    } else {
        $_SESSION['crossbow_equipped'] = 0;
    }


    // echo ' session strmod: '.$_SESSION['strmod'].'<br>';
    // echo ' session dexmod: '.$_SESSION['dexmod'].'<br>';
    // echo ' session magmod: '.$_SESSION['magmod'].'<br>';
    // echo ' session defmod: '.$_SESSION['defmod'].'<br>';

    echo '</div><div><span class="eqpcat">Left</span> '. $row['equipL'].'<span>';
    include('buff-left.php');
    '</span>';

    // echo ' session strmod: '.$_SESSION['strmod'].'<br>';
    // echo ' session dexmod: '.$_SESSION['dexmod'].'<br>';
    // echo ' session magmod: '.$_SESSION['magmod'].'<br>';
    // echo ' session defmod: '.$_SESSION['defmod'].'<br>';


    echo '</div><div><span class="eqpcat">Head</span> '. $row['equipHead'].'<span>';
    include('buff-head.php');
    '</span>';

    // echo ' session strmod: '.$_SESSION['strmod'].'<br>';
    // echo ' session dexmod: '.$_SESSION['dexmod'].'<br>';
    // echo ' session magmod: '.$_SESSION['magmod'].'<br>';
    // echo ' session defmod: '.$_SESSION['defmod'].'<br>';

    echo '</div><div><span class="eqpcat">Body</span> '. $row['equipBody'].'<span>';
    include('buff-body.php');
    '</span>';

    // echo ' session strmod: '.$_SESSION['strmod'].'<br>';
    // echo ' session dexmod: '.$_SESSION['dexmod'].'<br>';
    // echo ' session magmod: '.$_SESSION['magmod'].'<br>';
    // echo ' session defmod: '.$_SESSION['defmod'].'<br>';


    echo '</div><div><span class="eqpcat">Hands</span> '. $row['equipHands'].'<span>';
    include('buff-hands.php');
    '</span>';

    // echo ' session strmod: '.$_SESSION['strmod'].'<br>';
    // echo ' session dexmod: '.$_SESSION['dexmod'].'<br>';
    // echo ' session magmod: '.$_SESSION['magmod'].'<br>';
    // echo ' session defmod: '.$_SESSION['defmod'].'<br>';

    echo '</div><div><span class="eqpcat">Feet</span> '. $row['equipFeet'].'<span>';
    include('buff-feet.php');
    '</span>';

    if ($row['equipRing1'] != '<span> - - - </span>') {
        echo '</div><div><span class="eqpcat">Ring1</span> '. $row['equipRing1'].'<span>';
        include('buff-ring1.php');
        '</span>';
    }
    if ($row['equipRing2'] != '<span> - - - </span>') {
        echo '</div><div><span class="eqpcat">Ring2</span> '. $row['equipRing2'].'<span>';
        include('buff-ring2.php');
        '</span>';
    }

    if ($row['equipNeck'] != '<span> - - - </span>') {
        echo '</div><div><span class="eqpcat">Neck</span> '. $row['equipNeck'].'<span>';
        include('buff-neck.php');
        '</span>';
    }
    // if ($row['equipAura'] != '<span> - - - </span>'){ echo '</div><div><span class="eqpcat">Aura</span> '. $row['equipAura']; include ('buff-aura.php'); }

    echo '</div>';


    if ($row['equipAura'] != '<span> - - - </span>') {
        echo '<div><span class="eqpcat "></span> '. $row['equipAura'].'<span>';
        include('buff-aura.php');
        '</span>';
        echo '</div>';
    }

    if ($row['equipComp'] != '<span> - - - </span>') {
        echo '<div><span class="eqpcat ">Comp</span> '. $row['equipComp'].'<span>';
        include('buff-comp.php');
        '</span>';
        echo '</div>';
    }
    if ($row['equipPet'] != '<span> - - - </span>') {
        echo '<div><span class="eqpcat ">Pet</span> '. $row['equipPet'].'<span>';
        include('buff-pet.php');
        '</span>';
        echo '</div>';
    }
    if ($row['equipMount'] != '<span> - - - </span>') {
        echo '<div><span class="eqpcat ">Mount</span> '. $row['equipMount'].'<span>';
        include('buff-mount.php');
        '</span>';
        echo '</div>';
    }
    if ($row['equipArtifact'] != '<span> - - - </span>') {
        echo '<div><span class="eqpcat">Artifact</span> '. $row['equipArtifact'].'<span>';
        include('buff-artifact.php');
        '</span>';
        echo '</div>';
    }


//}

// echo 'Sstrmod: '.$_SESSION['strmod'].'<br>';
// echo 'Sdexmod: '.$_SESSION['dexmod'].'<br>';
// echo 'Smagmod: '.$_SESSION['magmod'].'<br>';
// echo 'Sdefmod: '.$_SESSION['defmod'].'<br>';



echo '</div>';



echo '<div class="gbox lgray">';
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

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


    
    // ------------------------------------ RESET STAT MODS
    // $updates = [ // -- set changes
    //     'strmod' => $str,
    //     'defmod' => $def,
    //     'dexmod' => $dex,
    //     'magmod' => $mag
    // ];
    // updateStats($link, $username, $updates); // -- apply changes



   echo '<h2 class="gold">Main Stats </h2>';

    if ($cp!=0) {
     echo'<div class="topright box"><span>Core Points</span> <strong class="yellow">'.$row['cp'].' </strong></div>';
    }
    // --- resets the session mods stats to add in skills + Equipment, etc below
    // -- don't need this since session has equipment values, and is reset at the top of state
    // $_SESSION['strmod'] = $row['strmod'];
    // $_SESSION['dexmod'] = $row['dexmod'];
    // $_SESSION['magmod'] = $row['magmod'];
    // $_SESSION['defmod'] = $row['defmod'];


    // --- sets the overall equipment stat buff
    $strEQP = $_SESSION['strmod'] - $row['str'];
    $dexEQP = $_SESSION['dexmod'] - $row['dex'];
    $magEQP = $_SESSION['magmod'] - $row['mag'];
    $defEQP = $_SESSION['defmod'] - $row['def'];

    // echo ' 1. $_SESSION[strmod]'.  $_SESSION['strmod'] .'<br>';
    // echo ' 2. $_SESSION[dexmod]'.  $_SESSION['dexmod'] .'<br>';
    // echo ' 3. $_SESSION[magmod]'.  $_SESSION['magmod'] .'<br>';
    // echo ' 4. $_SESSION[defmod]'.  $_SESSION['defmod'] .'<br>';



    echo '<div>';

    // CORE STAT DISPLAY
    // ----------------------------------------------------------------------------------------------------------- STR
    if ($_SESSION['strmod'] ==  0) {
        echo '<span class="h3 red">STR</span> '. $row['str'].' ';
    } elseif ($_SESSION['strmod'] >=  $row['str']) {
        echo '<span class="h3 red">STR '. $row['str'].' </span> + <span class="red">'.$strEQP.'</span> eqp';
    } elseif ($_SESSION['strmod'] <  $row['str']) {
        echo '<span class="h3 red">STR '.$row['str'].'</span> + <span class="black">'.$strEQP.'</span> eqp';
    }

    if ($weapontype==1) {
        echo ' + <span class="red">'.$onehanded.'</span> one-handed ';

        // echo '<br> 2a. $_SESSION[strmod]'.  $_SESSION['strmod'] .'<br>';
  
        $_SESSION['strmod'] += $onehanded;
        // $results = $link->query("UPDATE $user SET strmod = strmod + $onehanded");

        $updates = [ // -- set changes
            'strmod' => $_SESSION['strmod'] + $onehanded
        ];
        echo '<span class="hide">';
        updateStats($link, $username, $updates); // -- apply changes
        echo '</span>';


        // echo ' 2b. $_SESSION[strmod]'.  $_SESSION['strmod'] .'<br>';
    }


    if ($weapontype==2) {
        echo ' + <span class="red">'.$twohanded.'</span> two-handed ';
        $_SESSION['strmod'] += $twohanded;
       // $results = $link->query("UPDATE $user SET strmod = strmod + $twohanded");
        $updates = [ // -- set changes
            'strmod' => $_SESSION['strmod'] + $twohanded
        ];
        updateStats($link, $username, $updates); // -- apply changes
    }

    if (($weapontype==1 || $weapontype==2) && $warcraft>=1) {
        echo ' + <span class="red">'.$warcraft.'</span> wc ';
        $_SESSION['strmod'] += $warcraft;
       // $results = $link->query("UPDATE $user SET strmod = strmod + $warcraft");
        $updates = [ // -- set changes
            'strmod' => $_SESSION['strmod'] + $warcraft
        ];
        updateStats($link, $username, $updates); // -- apply changes
    }

    if ($_SESSION['reds']>0) {
        echo ' <span class="red"> +20</span>';
        $_SESSION['strmod'] += 20;
        //$results = $link->query("UPDATE $user SET strmod = strmod +20");
        $updates = [ // -- set changes
            'strmod' => $_SESSION['strmod'] + 20
        ];
        updateStats($link, $username, $updates); // -- apply changes
    }

    if ($_SESSION['coffee']>0) {
        echo ' <span class="lightbrown"> +10</span>';
        $_SESSION['strmod'] += 10;
        //$results = $link->query("UPDATE $user SET strmod = strmod + 10");
        $updates = [ // -- set changes
            'strmod' => $_SESSION['strmod'] + 10
        ];
        updateStats($link, $username, $updates); // -- apply changes
    }

    if ($weapontype==1 && $onehandedpro>=1) {
        $multiplier = $onehandedpro * .05;
        $multiplier_display = $multiplier * 100;
        $pro_increase = round($_SESSION['strmod'] * $multiplier);
        
        $_SESSION['strmod'] += $pro_increase;

        echo ' <span class="red">x'.$multiplier_display.'%</span> (<span class="red">'.$pro_increase.'</span>)';
      //  $results = $link->query("UPDATE $user SET strmod = strmod + $pro_increase");
        $updates = [ // -- set changes
            'strmod' => $_SESSION['strmod'] + $pro_increase
        ];
        echo '<span class="hide">';
        updateStats($link, $username, $updates); // -- apply changes
        echo '</span>';
        


        // echo ' 3b. $_SESSION[strmod]'.  $_SESSION['strmod'] .'<br>';

    }
    if ($weapontype==2 && $twohandedpro>=1) {
        $multiplier = $twohandedpro * .05;
        $multiplier_display = $multiplier * 100;
        $pro_increase = round($_SESSION['strmod'] * $multiplier);

        $_SESSION['strmod'] += $pro_increase;
        echo ' <span class="red">x'.$multiplier_display.'%</span> (<span class="red">'.$pro_increase.'</span>)';
       // $results = $link->query("UPDATE $user SET strmod = strmod + $pro_increase");
        $updates = [ // -- set changes
            'strmod' => $_SESSION['strmod'] + $pro_increase
        ];
        updateStats($link, $username, $updates); // -- apply changes
    }


    echo '<span class="maxstat h3">  <span class="red">'.$_SESSION['strmod'].'</span></span>';
    echo '</div>';

    if ($cp>0) {
        echo '<button type="submit" class="yellowBG ddgray" name="input1" value="+1 str" >+1 STR</button>';
    }
    if ($cp>1) {
        echo '<button type="submit" class="yellowBG ddgray" name="input1" value="all str" >+'.$cp.' STR</button>';
    }


    // ----------------------------------------------------------------------------------------------------------- DEX
    echo '<div>';
    if ($_SESSION['dexmod'] ==  0) {
        echo '<span class="h3 green">DEX</span> '. $row['dex'].' ';
    } elseif ($_SESSION['dexmod'] >=  $row['dex']) {
        echo '<span class="h3 green">DEX '. $row['dex'].' </span> + <span class="green">'.$dexEQP.'</span> eqp';
    } elseif ($_SESSION['dexmod'] <  $row['dex']) {
        echo '<span class="h3 green">DEX '.$row['dex'].'</span> + <span class="black">'.$dexEQP.'</span> eqp';
    }
    if ($weapontype==3) {
        echo '<span class="green"> + '.$ranged.'</span> ranged </span>';
       // $row['dexmod'] += $ranged;
        $_SESSION['dexmod'] += $ranged;
       // $results = $link->query("UPDATE $user SET dexmod = dexmod + $ranged");
        $updates = [ // -- set changes
            'dexmod' => $_SESSION['dexmod'] + $ranged
        ];
        updateStats($link, $username, $updates); // -- apply changes
    }
    if ($weapontype==3 && $warcraft>=1) {
        echo '<span class="green"> + '.$warcraft.'</span> wc </span>';
       // $row['dexmod'] += $warcraft;
        $_SESSION['dexmod'] += $warcraft;
       // $results = $link->query("UPDATE $user SET dexmod = dexmod + $warcraft");
        $updates = [ // -- set changes
            'dexmod' => $_SESSION['dexmod'] + $warcraft
        ];
        updateStats($link, $username, $updates); // -- apply changes
    }

    if ($_SESSION['greens']>0) {
        echo ' <span class="green"> +20</span>';
        //$row['dexmod'] += 20;
        $_SESSION['dexmod'] += 20;
        //$results = $link->query("UPDATE $user SET dexmod = dexmod +20");
        $updates = [ // -- set changes
            'dexmod' => $_SESSION['dexmod'] + 20
        ];
        updateStats($link, $username, $updates); // -- apply changes
    }


    if ($_SESSION['coffee']>0) {
        echo ' <span class="lightbrown"> +10</span>';
        // $row['dexmod'] += 10;
        $_SESSION['dexmod'] += 10;
        // $results = $link->query("UPDATE $user SET dexmod = dexmod +10");
        $updates = [ // -- set changes
            'dexmod' => $_SESSION['dexmod'] + 10
        ];
        updateStats($link, $username, $updates); // -- apply changes
    }
    if ($weapontype==3 && $rangedpro>=1) {
        $multiplier = $rangedpro * .05;
        $multiplier_display = $multiplier * 100;
        $pro_increase = round($_SESSION['dexmod'] * $multiplier);
        //$row['dexmod'] += $pro_increase;
        $_SESSION['dexmod'] += $pro_increase;
        echo ' <span class="green">x'.$multiplier_display.'%</span> (<span class="green">'.$pro_increase.'</span>)';
        //$results = $link->query("UPDATE $user SET dexmod = dexmod + $pro_increase");
        $updates = [ // -- set changes
            'dexmod' => $_SESSION['dexmod'] + $pro_increase
        ];
        updateStats($link, $username, $updates); // -- apply changes
    }
    echo '<span class="maxstat h3">  <span class="green">'.$_SESSION['dexmod'].'</span></span>';
   // $maxdex = $row['dexmod'];
    echo '</div>';

    if ($cp>0) {
        echo '<button type="submit" class="yellowBG ddgray" name="input1" value="+1 dex" >+1 DEX</button>';
    }
    if ($cp>1) {
        echo '<button type="submit" class="yellowBG ddgray" name="input1" value="all dex" >+'.$cp.' DEX</button>';
    }

    // ----------------------------------------------------------------------------------------------------------- MAG
    echo '<div>';

    if ($_SESSION['magmod'] ==  0) {
        echo '<span class="h3 blue">MAG</span> '. $row['mag'].' ';
    } elseif ($_SESSION['magmod'] >=  $row['mag']) {
        echo '<span class="h3 blue">MAG '. $row['mag'].' </span> + <span class="blue">'.$magEQP.'</span> eqp';
    } elseif ($_SESSION['magmod'] <  $row['mag']) {
        echo '<span class="h3 blue">MAG '.$row['mag'].'</span> + <span class="black">'.$magEQP.'</span> eqp';
    }
    if ($weapontype==4) {
        echo '<span class=""> + null </span>';
    }

    if ($_SESSION['blues']>0) {
        echo ' <span class="blue"> +20</span>';
        //$row['magmod'] += 20;
        $_SESSION['magmod'] += 20;
        //$results = $link->query("UPDATE $user SET magmod = magmod + 20");
        $updates = [ // -- set changes
            'magmod' => $_SESSION['magmod'] + 20
        ];
        updateStats($link, $username, $updates); // -- apply changes
    }
    if ($_SESSION['coffee']>0) {
        echo ' <span class="lightbrown"> +10</span>';
        // $row['magmod'] += 10;
        $_SESSION['magmod'] += 10;
        // $results = $link->query("UPDATE $user SET magmod = magmod + 10");
        $updates = [ // -- set changes
            'magmod' => $_SESSION['magmod'] + 10
        ];
        updateStats($link, $username, $updates); // -- apply changes
    }

    echo '<span class="maxstat h3">  <span class="blue">'.$_SESSION['magmod'].'</span></span>';
    //$maxmag = $row['magmod'];
    echo '</div>';

    if ($cp>0) {
        echo '<button type="submit" class="yellowBG ddgray" name="input1" value="+1 mag" >+1 MAG</button>';
    }
    if ($cp>1) {
        echo '<button type="submit" class="yellowBG ddgray" name="input1" value="all mag" >+'.$cp.' MAG</button>';
    }
    // ----------------------------------------------------------------------------------------------------------- DEF
    echo '<div>';

    if ($_SESSION['defmod'] ==  0) {
        echo '<span class="h3 gold">DEF</span> '. $row['def'].' ';
    } elseif ($_SESSION['defmod'] >=  $row['def']) {
        echo '<span class="h3 gold">DEF '. $row['def'].' </span> + <span class="gold">'.$defEQP.'</span> eqp';
    } elseif ($_SESSION['defmod'] <  $row['def']) {
        echo '<span class="h3 gold">DEF '.$row['def'].'</span> + <span class="black">'.$defEQP.'</span> eqp';
    }


    if ($row['toughness'] >=1) {
        $toughness_amount = $row['toughness']*2;
        echo ' <span class="gold"> + '.$toughness_amount.'</span> tough ';
       // $row['defmod'] += $toughness_amount;
        $_SESSION['defmod'] += $toughness_amount;
        //$results = $link->query("UPDATE $user SET defmod = defmod + $toughness_amount");
        $updates = [ // -- set changes
            'defmod' => $_SESSION['defmod'] + $toughness_amount
        ];
        updateStats($link, $username, $updates); // -- apply changes
    }

    if ($_SESSION['yellows']>0) {
        echo ' <span class="gold"> +20</span>';
       // $row['defmod'] += 20;
        $_SESSION['defmod'] += 20;
       // $results = $link->query("UPDATE $user SET defmod = defmod + 20");
        $updates = [ // -- set changes
            'defmod' => $_SESSION['defmod'] + 20
        ];
        updateStats($link, $username, $updates); // -- apply changes
    }
    if ($_SESSION['coffee']>0) {
        echo ' <span class="lightbrown"> +10</span>';
       // $row['defmod'] += 10;
        $_SESSION['defmod'] += 10;
       // $results = $link->query("UPDATE $user SET defmod = defmod + 10");
        $updates = [ // -- set changes
            'defmod' => $_SESSION['defmod'] + 10
        ];
        updateStats($link, $username, $updates); // -- apply changes
    }

    // shield check for block
    if (($row['block'] >=1) && ($row['equipL'] == 'training shield' || $row['equipL'] == 'basic shield'
                            || $row['equipL'] == 'kite shield' || $row['equipL'] == 'buckler' || $row['equipL'] == 'wooden shield'
                            || $row['equipL'] == 'hunter shield' || $row['equipL'] == 'iron shield' || $row['equipL'] == 'iron kite shield'
                            || $row['equipL'] == 'silver shield' || $row['equipL'] == 'steel shield' || $row['equipL'] == 'steel kite shield'
                            || $row['equipL'] == 'red shield' || $row['equipL'] == 'mithril shield' || $row['equipL'] == 'mithril kite shield'
                            || $row['equipL'] == 'sphinx shield' || $row['equipL'] == 'ranger shield' || $row['equipL'] == 'ultima shield')) {
        $blockMultiply = ($row['block']*3);
      // $row['defmod'] += $blockMultiply;
        $_SESSION['defmod'] += $blockMultiply;
        echo ' <span class="gold"> + '.$blockMultiply.'</span> block ';
    }


    if ($_SESSION['ironskin_amount'] > 0) {
        echo ' <span class="gold"> + '.$_SESSION['ironskin_amount'].'</span> ironskin';
        $ironskin_amount = $_SESSION['ironskin_amount'];
        //$row['defmod'] += $_SESSION['ironskin_amount'];
        $_SESSION['defmod'] += $ironskin_amount;
       // $results = $link->query("UPDATE $user SET defmod = defmod + $ironskin_amount");
        $updates = [ // -- set changes
            'defmod' => $_SESSION['defmod'] + $ironskin_amount
        ];
        updateStats($link, $username, $updates); // -- apply changes
    }

    echo '<span class="maxstat h3">  <span class="gold">'.$_SESSION['defmod'].'</span></span>';
    //$maxdef = $row['defmod'];

    echo '</div>';


    if ($cp>0) {
        echo '<button type="submit" class="yellowBG ddgray" name="input1" value="+1 def" >+1 DEF</button>';
    }
    if ($cp>1) {
        echo '<button type="submit" class="yellowBG ddgray" name="input1" value="all def" >+'.$cp.' DEF</button>';
    }

    $statTotal = $_SESSION['strmod'] + $_SESSION['dexmod'] + $_SESSION['magmod'] + $_SESSION['defmod'];


    echo '<div  class="right">
        <div class="dgray">Stat Total </div>
        <span class="dgray maxstat h3">'. $statTotal .'</span>
        </div>';

        // echo ' Xsession strmod: '.$_SESSION['strmod'].'<br>';
        // echo ' Xsession dexmod: '.$_SESSION['dexmod'].'<br>';
        // echo ' xsession magmod: '.$_SESSION['magmod'].'<br>';
        // echo ' xsession defmod: '.$_SESSION['defmod'].'<br>';


        // -- SET FINAL SESSION MOD TO DATABASE SETTING
        $updates = [ // -- set changes
            'strmod' => $_SESSION['strmod'],
            'dexmod' => $_SESSION['dexmod'],
            'magmod' => $_SESSION['magmod'],
            'defmod' => $_SESSION['defmod']
        ];
        updateStats($link, $username, $updates); // -- apply changes

        // Quick items for testing.
        // $updates = [ // -- set changes
        //     'coffee' => 22,
        //     'tea' => 22,
        //     'reds' => 22,
        //     'greens' => 22,
        //     'blues' => 22,
        //     'yellows' => 22
        // ];
        // updateStats($link, $username, $updates); // -- apply changes 
        
        // Might not need this is display below, purely for database setting.
         $row = getUserData($link, $_SESSION['username']); // --- gets all user data from database

        // echo 'strmod db: '.$row['strmod'].'<br>';
        // echo 'dexmod db: '.$row['dexmod'].'<br>';
        // echo 'magmod db: '.$row['magmod'].'<br>';
        // echo 'defmod db: '.$row['defmod'].'<br>';


    // ----------------------------------------------------------------------------------------------------------- END HUD STATS!


    echo '<div class="gslice lgray">';
    include('stats-quick.php'); // QUICK STATS AND MAX BUTTONS!
    echo '</div>';

    echo '</div>';





    ////////



    echo '<div class="gbox">';

    echo '<h2 class="gold">Battle Stats</h2>
    <div>clicks <span class="blue">'. $row['clicks'].'</span></div>
    <div>kills <span class="green">'. $_SESSION['KLtotalkill'].'</span></div>
    <div>deaths <span class="red"> '. $row['deaths'].'</span></div>';

    echo '</div>';
    echo '<div class="gbox">';

    echo '
	<div class="bar">
	<div style="width: '.$xpPercent.'%" class="barMid '.$barBGcolor.'">
	<span>XP</span> <strong class="count"> '.$levelxp.'</strong>
    <span class="">/ '.$count.'% </span>
    </div></div>';
    echo '
    <h2 class="gold">Experience</h2>
    <div>Level: <span class="green">'.$level.'</span></div>
    <div>Total XP: <span class="green">'.$xp.'</span></div>
    <div>XP at next level: <span class="green">'.$nextlevel.'</span></div>
    <div>XP gained this level: <span class="green">'.$levelxp.'</span></div>
    <div>You are <span class="green">'.$count.'%</span> to the next level</div>
    <div>You need <span class="green">'.$need.'</span> more XP to reach level '.$nxlevel.'</div>
';

    echo '</div>';
    echo '<div class="gbox">';

    echo '
    <h2 class="gold">Quests</h2>
    <div class="topright"><a class="btn" href="" class="menuIcon" data-link="quests">Open Quests ></a></div>
    <div>Quests Completed: <span class="gold">X</span></div>';

    echo '</div>';
    echo '<div class="gbox">';


    echo	'<h2 class="gold">Gold Chests</h2>';

    echo '<div><span class="yellowgreen">Grassy Field </span>';
    if ($row['chest1'] >=1) {
        echo '<span class="green right">OPENED!</span></div>';
    } else {
        echo '<span class="black right"> Locked</span></div> ';
    }

    echo '<div><span class="green">Forest</span> ';
    if ($row['chest2'] >=1) {
        echo '<span class="green right">OPENED!</span></div>';
    } else {
        echo '<span class="black right"> Locked</span></div> ';
    }

    echo '<div><span class="red">Red Town</span> ';
    if ($row['chest3'] >=1) {
        echo '<span class="green right">OPENED!</span></div>';
    } else {
        echo '<span class="black right"> Locked</span></div> ';
    }

    echo '<div><span class="gray">Rocky Flats</span> ';
    if ($row['chest4'] >=1) {
        echo '<span class="green right">OPENED!</span></div>';
    } else {
        echo '<span class="black right"> Locked</span></div>';
    }

    echo '<div><span class="blue">Blue Ocean</span> ';
    if ($row['chest5'] >=1) {
        echo '<span class="green right">OPENED!</span></div>';
    } else {
        echo '<span class="black right"> Locked </span></div>';
    }

    echo '<div><span class="dgreen">Dark Forest</span> ';
    if ($row['chest6'] >=1) {
        echo '<span class="green right">OPENED!</span></div>';
    } else {
        echo '<span class="black right"> Locked </span></div>';
    }

    echo '<div><span class="dgray">Stone Mountain</span> ';
    if ($row['chest7'] >=1) {
        echo '<span class="green right">OPENED!</span></div>';
    } else {
        echo '<span class="black right"> Locked </span></div>';
    }

    echo '<div><span class="blue">Star City</span> ';
    if ($row['chest8'] >=1) {
        echo '<span class="green right">OPENED!</span></div>';
    } else {
        echo '<span class="black right"> Locked </span></div>';
    }
    echo '<div><span class="yellow">Daily Chests Opened </span>';
    echo '<span class="yellow right">'.$row['dailychestcount'].'</span></div>';




    echo '</div>';
    echo '<div class="gbox">';
    echo '<h2 class="gold">Other Containers</h2>';
    echo '<div><span class="lightgray">Silver Chests:  '.$row['silverchests'].'</span></div>';
    echo '<div><span class="gray">Gray Chests: '.$row['graychests'].'</span></div>';
    echo '<div><span class="brown">Wooden Chests: '.$row['woodenchests'].'</span></div>';
    echo '<div><span class="lightbrown">Pots Smashed:  '.$row['pots'].'</span></div>';


    echo '</div>';

    //include ('stickman.php');

//echo '</form>';
//}
