<?php
// --------- DAILY Events

// // -------------------------DB CONNECT!
// include ('db-connect.php');
// // -------------------------DB QUERY!
// $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
// $stmt->bind_param("s", $_SESSION['username']);
// $stmt->execute();
// $result = $stmt->get_result();
// if (!$result) {
//     die('There was an error running the query [' . $link->error . ']');
// }
// // -------------------------DB OUTPUT!
// while($row = $result->fetch_assoc()){

$row = getUserData($link, $_SESSION['username']); // --- gets all user data from database 

$currency = $row['currency'];
$sp = $row['sp'];
$redberry = $row['redberry'];
$blueberry = $row['blueberry'];
$redbar = $row['redbar'];
$bluebar = $row['bluebar'];
$redbalm = $row['redbalm'];
$bluebalm = $row['bluebalm'];
$meatball = $row['meatball'];
$bluefish = $row['bluefish'];
$redpotion = $row['redpotion'];
$bluepotion = $row['bluepotion'];

// -------------------------------------------------------------------------- DAILY CHEST OPEN - ALL
echo $message = '
<div class="goldchestopen">
<h3>You open the Daily Chest!</h3>
';
include('update_feed.php'); // --- update feed ALT
        // Scaled Currency - LVL * 500
        // -------------------------------------------------------------------------- DAILY CHEST OPEN - ALL
        $currencyadd = $level * 500;
        // $results = $link->query("UPDATE $user SET sp = sp + 5");
        // $results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $updates = [ // -- set changes
            'sp' => $sp + 5,
            'currency' => $currency + $currencyadd
        ];
        updateStats($link, $username, $updates); // -- apply changes
        echo $message = '
        <p>+ 5 SP!</p>
        <p>+ '.$currencyadd.' '.$_SESSION['currency'].'</p>
        ';
        include('update_feed_alt.php'); // --- update feed ALT

// -------------------------------------------------------------------------- DAILY CHEST OPEN - HEALING ITMES
// -------------------------------------------------------------------------- DAILY CHEST OPEN - HEALING ITMES
// -------------------------------------------------------------------------- DAILY CHEST OPEN - HEALING ITMES
    // --------------------------------------------------------------------------  60
    if ($level >= 60) {
        $redbarAdd = $level - 50;
        // $results = $link->query("UPDATE $user SET redbar = redbar + $redbarAdd");
        $bluebarAdd = $level - 50;
        // $results = $link->query("UPDATE $user SET bluebar = bluebar + $bluebarAdd");
        $updates = [ // -- set changes
            $bonus => $bonus + 1,
            'redbar' => $redbar + $redbarAdd,
            'bluebar' => $bluebar + $bluebarAdd
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
        echo $message = '
        <p>+ '.$redbarAdd.' red bar, + '.$bluebarAdd.' blue bar</p>
        ';
        include('update_feed_alt.php'); // --- update feed ALT
    }
    // -------------------------------------------------------------------------- 40
    if ($level >= 40) {
        $redbalmAdd = $level - 30;
        // $results = $link->query("UPDATE $user SET redbalm = redbalm + $redbalmAdd");
        $bluebalmAdd = $level - 30;
        // $results = $link->query("UPDATE $user SET bluebalm = bluebalm + $bluebalmAdd");
        $updates = [ // -- set changes
            'redbalm' => $redbalm + $redbalmAdd,
            'bluebalm' => $bluebalm + $bluebalmAdd
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
        echo $message = '
        <p>+ '.$redbalmAdd.' red balm, + '.$bluebalmAdd.' blue balm</p>
        ';
        include('update_feed_alt.php'); // --- update feed ALT
    }
    // -------------------------------------------------------------------------- 20 - meatball bluefish
    if ($level >= 20) {
        $meatballAdd = $level - 10;
        // $results = $link->query("UPDATE $user SET meatball = meatball + $meatballAdd");
        $bluefishAdd = $level - 10;
        // $results = $link->query("UPDATE $user SET bluefish = bluefish + $bluefishAdd");
        $updates = [ // -- set changes
            'meatball' => $meatball + $meatballAdd,
            'bluefish' => $bluefish + $bluefishAdd
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
        echo $message = '
        <p>+ '.$meatballAdd.' meatballs, + '.$bluefishAdd.' bluefish</p>
        ';
        include('update_feed_alt.php'); // --- update feed ALT
    }
// -------------------------------------------------------------------------- DAILY CHEST OPEN - ALWAYS BERRIES
//else {



        $redberryAdd = $level * 5;
        // $results = $link->query("UPDATE $user SET redberry = redberry + $redberryAdd");
        $blueberryAdd = $level * 5;
        // $results = $link->query("UPDATE $user SET blueberry = blueberry + $blueberryAdd");

        $updates = [ // -- set changes
            'redberry' => $redberry + $redberryAdd,
            'blueberry' => $blueberry + $blueberryAdd
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
        echo $message = '
        <p>+ '.$redberryAdd.' redberry, + '.$blueberryAdd.' blueberry</p>
        ';
        include('update_feed_alt.php'); // --- update feed ALT
//    }
// -------------------------------------------------------------------------- DAILY CHEST OPEN - RING
// -------------------------------------------------------------------------- DAILY CHEST OPEN - RING
// -------------------------------------------------------------------------- DAILY CHEST OPEN - RING
if ($level >= 0) {
        // --------------------------------------------- DAILY CHEST OPEN - LEVEL 70+
        if ($level >= 70) {
            $rand=rand(1, 4);				// rand ring
            if ($rand == 1) {$bonus = 'ringofstrengthXX';    $bonusname = "Ring of Strength XX";}
            if ($rand == 2) {$bonus = 'ringofdexterityXX';   $bonusname = "Ring of Dexterity XX";}
            if ($rand == 3) {$bonus = 'ringofmagicXX';       $bonusname = "Ring of Magic XX";}
            if ($rand == 4) {$bonus = 'ringofdefenseXX';     $bonusname = "Ring of Defense XX";}
        }
        // --------------------------------------------- DAILY CHEST OPEN - LEVEL 30+
        elseif ($level >= 50) {
            $rand=rand(1, 4);				// rand ring
            if ($rand == 1) {$bonus = 'ringofstrengthXV';    $bonusname = "Ring of Strength XV";}
            if ($rand == 2) {$bonus = 'ringofdexterityXV';   $bonusname = "Ring of Dexterity XV";}
            if ($rand == 3) {$bonus = 'ringofmagicXV';       $bonusname = "Ring of Magic XV";}
            if ($rand == 4) {$bonus = 'ringofdefenseXV';     $bonusname = "Ring of Defense XV";}
        }
        // --------------------------------------------- DAILY CHEST OPEN - LEVEL 30+
        elseif ($level >= 30) {
            $rand=rand(1, 4);				// rand ring
            if ($rand == 1) {$bonus = 'ringofstrengthX';    $bonusname = "Ring of Strength X";}
            if ($rand == 2) {$bonus = 'ringofdexterityX';   $bonusname = "Ring of Dexterity X";}
            if ($rand == 3) {$bonus = 'ringofmagicX';       $bonusname = "Ring of Magic X";}
            if ($rand == 4) {$bonus = 'ringofdefenseX';     $bonusname = "Ring of Defense X";}
        }
        // --------------------------------------------- DAILY CHEST OPEN - LEVEL 0+
        else {
            $rand=rand(1, 4);				// rand ring
            if ($rand == 1) {$bonus = 'ringofstrengthV';    $bonusname = "Ring of Strength V";}
            if ($rand == 2) {$bonus = 'ringofdexterityV';   $bonusname = "Ring of Dexterity V";}
            if ($rand == 3) {$bonus = 'ringofmagicV';       $bonusname = "Ring of Magic V";}
            if ($rand == 4) {$bonus = 'ringofdefenseV';     $bonusname = "Ring of Defense V";}
        }
        // $results = $link->query("UPDATE $user SET $bonus = $bonus + 1");
        $bonusOriginalCount = $row[$bonus];
        $updates = [ // -- set changes
            $bonus => $bonusOriginalCount + 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
        echo $message = '
        <p>+ '.$bonusname.' </p>
        ';
        include('update_feed_alt.php'); // --- update feed ALT
}


// -------------------------------------------------------------------------- DAILY CHEST OPEN - REGEN RING
// -------------------------------------------------------------------------- DAILY CHEST OPEN - REGEN RING
// -------------------------------------------------------------------------- DAILY CHEST OPEN - REGEN RING
if ($level >= 20) {
    // --------------------------------------------- DAILY CHEST OPEN - LEVEL 80+
    if ($level >= 80) {
        $rand=rand(1, 2);			// rand ring
        if ($rand == 1) {$bonus = 'ringofhealthregenX';    $bonusname = "Ring of Health Regen X";}
        if ($rand == 2) {$bonus = 'ringofmanaregenX';   $bonusname = "Ring of Mana Regen X";}
    }
    // --------------------------------------------- DAILY CHEST OPEN - LEVEL 60+
    elseif ($level >= 60) {
        $rand=rand(1, 2);			// rand ring
        if ($rand == 1) {$bonus = 'ringofhealthregenVII';    $bonusname = "Ring of Health Regen VII";}
        if ($rand == 2) {$bonus = 'ringofmanaregenVII';   $bonusname = "Ring of Mana Regen VII";}
    }
    // --------------------------------------------- DAILY CHEST OPEN - LEVEL 40+
    elseif ($level >= 40) {
        $rand=rand(1, 2);			// rand ring
        if ($rand == 1) {$bonus = 'ringofhealthregenV';    $bonusname = "Ring of Health Regen V";}
        if ($rand == 2) {$bonus = 'ringofmanaregenV';   $bonusname = "Ring of Mana Regen V";}
    }
    // --------------------------------------------- DAILY CHEST OPEN - LEVEL 20+
    else {
        $rand=rand(1, 2);			// rand ring
        if ($rand == 1) {$bonus = 'ringofhealthregenIII';    $bonusname = "Ring of Health Regen III";}
        if ($rand == 2) {$bonus = 'ringofmanaregenIII';   $bonusname = "Ring of Mana Regen III";}
    }
    // $results = $link->query("UPDATE $user SET $bonus = $bonus + 1");
    $bonusOriginalCount = $row[$bonus];
    $updates = [ // -- set changes
        $bonus => $bonus + 1
    ]; 
	updateStats($link, $username, $updates); // -- apply changes
    echo $message = '
    <p>+ '.$bonusname.' </p>
    ';
    include('update_feed_alt.php'); // --- update feed ALT
}





        
    echo $message = '
    </div>'; // END CHEST BOX
    include('update_feed_alt.php'); // --- update feed ALT








// } //-end while

//$results = $link->query("UPDATE $user SET level = 85");

?>
