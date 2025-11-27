<?php
// -----------------------------------  BATTLE WINNINGS
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
    $currency = $row['currency'];

    $trainingarmor = $row['trainingarmor'];
    $traininghelmet = $row['traininghelmet'];
    $trainingboots = $row['trainingboots'];
    $traininggloves = $row['traininggloves'];
    $wingspotion = $row['wingspotion'];
    $leather = $row['leather'];
    $guardianblade = $row['guardianblade'];
    $squidtooth = $row['squidtooth'];
    // $KLtotalkill = $_SESSION['KLtotalkill'];

    2-1;
    
    $equipR=$row['equipR'];
    $equipL=$row['equipL'];
    $equipHead=$row['equipHead'];
    $equipBody=$row['equipBody'];
    $equipHands=$row['equipHands'];
    $equipFeet=$row['equipFeet'];    
    

    if ($_SESSION['notthe'] == 1) { // NOT SURE IF I NEED THIS HERE
        $the = '';
        $The = '';
    } else {
        $the ='the';
        $The ='The';
    }	// set no THE for unique boss characters, ex: Diablo, Omar the Dead


    $start='<div class="battlewin"><h3>VICTORY!</h3><h6 class="green">You have defeated '.$the.' </h6><h2 class="white">'.$enemy.'!</h2><h4>';

    $open='</h4><p>Open: <a class="green" href="" data-link2="inv">Weapons ></a> | <a class="green" href="" data-link2="armor">Armor ></a> |  <a class="green" href="" data-link2="acc">Acc ></a></p></div>';

    $bonus = ''; // Reset bonus display for all enemies
    $bonusalways = ''; // Reset always drop display for all enemies // optional 
    $bonusfirst = ''; // Reset best bonus display for all enemies // optional // this is one time drops!
    



    // // --------------------------------------------------------------  battleWinMessage function - MAJOR issues trying to use this in enemiesbelow - not going to use for now.
    // function battleWinMessageNOTINSUSE($start, $currencyadd, $killXP, $bonusfirst, $bonusalways, $bonus, $open) {
    //     // Construct the message
    //     $message = "<div class='battlewin'>" . $start ." QQQ+ ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open ."</div>";
    //     // Include the update feed script
    //     include('update_feed_alt.php'); // --- update feed
    // }


// --------------------------------------------------------------  rat
if ($enemy =='Rat') {
        $KLname = 'KLrat';
        $currencyadd = rand(1, 3);
        $killXP = 1;

        $bonusalways = '<span>+ Raw Meat</span> ';
        updateStats($link, $username, [ 'rawmeat' => $row['rawmeat'] + 1]); // -- update stats

        $rand=rand(1, 4);				// rand bonus
        if ($rand == 1) {
            $bonus = '<span>+ String </span> ';
            updateStats($link, $username, [ 'string' => $row['string'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $qty = rand(1, 2);
            $bonus = '<span>+ '.$qty.' Redberry </span> ';
            updateStats($link, $username, [ 'redberry' => $row['redberry'] + $qty]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Dagger </span> ';
            updateStats($link, $username, [ 'dagger' => $row['dagger'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Blueberry </span> ';
            updateStats($link, $username, [ 'blueberry' => $row['blueberry'] + 1]); // -- update stat
        }
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

/*
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed

*/

// --------------------------------------------------------------  giant rat
if ($enemy =='Giant Rat') {

        $KLname = 'KLgiantrat';
        $currencyadd = rand(3, 8);
        $killXP = 3;

        $bonusalways = '<span>+ Raw Meat</span> ';
        updateStats($link, $username, [ 'rawmeat' => $row['rawmeat'] + 1]); // -- update stats

        $rand=rand(1, 4);				// rand bonus
        if ($rand == 1) {
            $bonus = '<span>+ Ring of Defense </span> ';
            updateStats($link, $username, [ 'ringofdefense' => $row['ringofdefense'] + 1]); // -- update stats
        }
        if ($rand == 2) {
            $qty = rand(1, 3);
            $bonus = '<span>+ '.$qty.' Redberry </span> ';
            updateStats($link, $username, [ 'redberry' => $row['redberry'] + $qty]); // -- update stats
        }
        if ($rand == 3) {
            $qty = rand(1, 2);
            $bonus = '<span>+ '.$qty.' Blueberry </span> ';
            updateStats($link, $username, [ 'blueberry' => $row['blueberry'] + $qty]); // -- update stats
        }
        if ($rand == 4) {
            $bonus = '<span>+ Red Potion </span> ';
            updateStats($link, $username, [ 'redpotion' => $row['redpotion'] + 1]); // -- update stats
        }
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Sand Crab
if ($enemy =='Sand Crab') {
        $KLname = 'KLsandcrab';
        $currencyadd = rand(1, 2);
        $killXP = 2;
        
        // $bonusfirst = '';
        if ($traininghelmet<1) {
            $bonusfirst = '+ Training Helmet! </span> ';
           // $results = $link->query("UPDATE $user SET traininghelmet = traininghelmet + 1");
            updateStats($link, $username, [ 'traininghelmet' => 1]); // -- update stat
            if ($equipHead == '<span> - - - </span>') {
              //  $results = $link->query("UPDATE $user SET equipHead = 'training helmet'");
                updateStats($link, $username, [ 'equipHead' => 'training helmet']); // -- update stat
            }
        }

        $sand = rand(1, 5);
        $bonusalways = '<span>+ '.$sand.' Sand </span> ';
//        // $results = $link->query("UPDATE $user SET sand = sand + $sand");
        updateStats($link, $username, [ 'sand' => $row['sand'] + $sand]); // -- update stat


        $rand=rand(1, 8);				// rand bonus
        if ($rand == 1) {
            $red = rand(1, 3);
            $bonus = '<span>+ '.$red.' Redberry </span> ';
            // $results = $link->query("UPDATE $user SET redberry = redberry + $red");
            updateStats($link, $username, [ 'redberry' => $row['redberry'] + $red]); // -- update stat            
        }
        if ($rand == 2) {
            $blue = rand(1, 3);
            $bonus = '<span>+ '.$blue.' Blueberry </span> ';
            // $results = $link->query("UPDATE $user SET blueberry = blueberry + $blue");
            updateStats($link, $username, [ 'blueberry' => $row['blueberry'] + $blue]); // -- update stat
        }
        if ($rand == 3) {
            $stone = rand(1, 3);
            $bonus = '<span>+ '.$stone.' Stone </span> ';
            // $results = $link->query("UPDATE $user SET stone = stone + $stone");
            updateStats($link, $username, [ 'stone' => $row['stone'] + $stone]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Ring of Defense </span> ';
            // $results = $link->query("UPDATE $user SET ringofdefense = ringofdefense + 1");
            updateStats($link, $username, [ 'ringofdefense' => $row['ringofdefense'] + 1]); // -- update stat
        }
        if ($rand == 5) {
            $bonus = '<span>+ Short Sword </span> ';
            // $results = $link->query("UPDATE $user SET shortsword = shortsword + 1");
            updateStats($link, $username, [ 'shortsword' => $row['shortsword'] + 1]); // -- update stat
        }
        if ($rand == 6) {
            $bonus = '<span>+ Bo </span> ';
            // $results = $link->query("UPDATE $user SET bo = bo + 1");
            updateStats($link, $username, [ 'bo' => $row['bo'] + 1]); // -- update stat
        }
        if ($rand == 7) {
            $bonus = '<span>+ Raw Meat </span> ';
            // $results = $link->query("UPDATE $user SET rawmeat = rawmeat + 1");
            updateStats($link, $username, [ 'rawmeat' => $row['rawmeat'] + 1]); // -- update stat
        }
        if ($rand == 8) {
            $randwater = rand(5, 20);
            $bonus = '<span>+ '.$randwater.' Water </span> ';
            // $results = $link->query("UPDATE $user SET water = water + $randwater");
            updateStats($link, $username, [ 'water' => $row['water'] + $randwater]); // -- update stat
        }
        //echo 
// $message="$start 
// + 2 xp 
// + $currencyadd ".$_SESSION['currency']." 
//   $bonusfirst
//   $bonusalways
//   $bonus$open</div>";
//         include('update_feed_alt.php'); // --- update feed
// $results = $link->query("UPDATE $user SET xp = xp + 2"); // xp
// $results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
//         // $results = $link->query("UPDATE $user SET KLsandcrab = KLsandcrab + 1");



//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed

    }

// --------------------------------------------------------------  gator
if ($enemy =='Gator') {
$KLname = 'KLgator';
$currencyadd = rand(10, 100);
$killXP = 20;


//$bonusfirst = '';
        //if ($trainingarmor<1) { // 25%
        //	$bonusfirst = '+ Training Armor! ';
        //	$results = $link->query("UPDATE $user SET trainingarmor = trainingarmor + 1");
        //	if ($equipBody == '<span> - - - </span>'){ $results = $link->query("UPDATE $user SET equipBody = 'training armor'"); }
        //	}

       // $bonusfirst = '';
        if ($trainingarmor<1) {
            $bonusfirst = '+ Training Armor! [auto-equipped] </span> ';
            // $results = $link->query("UPDATE $user SET trainingarmor = trainingarmor + 1");
            updateStats($link, $username, [ 'trainingarmor' => 1]); // -- update stat

            if ($equipHead != '<span> XXX </span>') {
                // $results = $link->query("UPDATE $user SET equipBody = 'training armor'");
                updateStats($link, $username, [ 'equipBody' => 'training armor']); // -- update stat
            }
        }

        $randstone = rand(2, 5);
        $bonusalways = '<span>+ '.$randstone.' Stone </span> ';
        updateStats($link, $username, [ 'stone' => $row['stone'] + $randstone]); // -- update stat

        if ($rand == 1) {
            $bonus = '<span>+ Padded Armor </span> ';
            updateStats($link, $username, [ 'paddedarmor' => $row['paddedarmor'] + 1]); // -- update stat
        }
        if ($rand == 2) { // 25%
            $bonus = '<span>+ Club </span> ';
            updateStats($link, $username, [ 'club' => $row['club'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Ring of Strength </span> ';
            updateStats($link, $username, [ 'ringofstrength' => $row['ringofstrength'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Ring of Defense </span> ';
            updateStats($link, $username, [ 'ringofdefense' => $row['ringofdefense'] + 1]); // -- update stat
        }
//         //echo 
// $message="$start 
// + 20 xp 
//   + $currencyadd ".$_SESSION['currency']." 
//   $bonusalways$bonus$bonusfirst</div>";
//         include('update_feed_alt.php'); // --- update feed
// $results = $link->query("UPDATE $user SET xp = xp + 20"); // xp
// $results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
//         // $results = $link->query("UPDATE $user SET KLgator = KLgator + 1");




//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  spider
if ($enemy =='Spider') {

        $KLname = 'KLspider';
        $currencyadd = rand(1, 5);
        $killXP = 2;


        // $currencyadd = rand(1, 5);	 // rand gold
        // $bonusfirst = '';
        if ($traininggloves<1) {
            $bonusfirst = '+ Training Gloves </span> ';
            // $results = $link->query("UPDATE $user SET traininggloves = traininggloves + 1");
            updateStats($link, $username, [ 'traininggloves' => 1]); // -- update stat            
            if ($equipHands == '<span> - - - </span>') {
                // $results = $link->query("UPDATE $user SET equipHands = 'training gloves'");
                updateStats($link, $username, [ 'equipHands' => 'training gloves']); // -- update stat
            }
        }
        // $bonus = '';
        $bonusalways = '+ 1 Scorpion Tail </span> ';
        // $results = $link->query("UPDATE $user SET scorpiontail = scorpiontail + 1");
        updateStats($link, $username, [ 'scorpiontail' => $row['scorpiontail'] + 1]); // -- update stat


        $rand=rand(1, 4);				// rand bonus

        if ($rand == 1) { //25%
            $bonus = '<span>+ 2 Raw Meat </span> ';
            // $results = $link->query("UPDATE $user SET rawmeat = rawmeat + 2");
            updateStats($link, $username, [ 'rawmeat' => $row['rawmeat'] + 2]); // -- update stat
        } elseif ($rand == 2) { //25%
            $bonus = '<span>+ 1 Basic Shield </span> ';
            // $results = $link->query("UPDATE $user SET basicshield = basicshield + 1");
            updateStats($link, $username, [ 'basicshield' => $row['basicshield'] + 1]); // -- update stat
            
        } elseif ($rand == 3) { //25%
            $bonus = '<span>+ 2 Redberry </span> ';
            // $results = $link->query("UPDATE $user SET redberry = redberry + 2");
            updateStats($link, $username, [ 'redberry' => $row['redberry'] + 2]); // -- update stat
        } elseif ($rand == 4) { //25%
            $bonus = '<span>+ 2 Blueberry </span> ';
            // $results = $link->query("UPDATE $user SET blueberry = blueberry + 2");
            updateStats($link, $username, [ 'blueberry' => $row['blueberry'] + 2]); // -- update stat
        }
        //echo 
// $message="$start 
// + 2 xp 
//   + $currencyadd ".$_SESSION['currency']." 
//   $bonusalways$bonusfirst$bonus$open</div>";
//         include('update_feed_alt.php'); // --- update feed
// $results = $link->query("UPDATE $user SET xp = xp + 2"); // xp
// $results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
//         // $results = $link->query("UPDATE $user SET KLspider = KLspider + 1");





//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  scorpion
if ($enemy =='Scorpion') {


        $KLname = 'KLscorpion';
        $currencyadd = rand(2, 10);
        $killXP = 4;

        
        if ($trainingboots<1) {
            $bonusfirst = '+ Training Boots </span> ';
            // $results = $link->query("UPDATE $user SET trainingboots = trainingboots + 1");
            updateStats($link, $username, [ 'trainingboots' => 1]); // -- update stat
            if ($equipFeet == '<span> - - - </span>') {
                // $results = $link->query("UPDATE $user SET equipFeet = 'training boots'");
                updateStats($link, $username, [ 'equipFeet' => 'training boots']); // -- update stat
            }
        }
        // $bonus = '';
        $bonusalways = '+ 1 Scorpion Tail </span> ';
        //$results = $link->query("UPDATE $user SET scorpiontail = scorpiontail + 1");
        updateStats($link, $username, [ 'scorpiontail' => $row['scorpiontail'] + 1]); // -- update stat
        if ($rand == 3) { // 25%
            $bonus = '<span>+ Dagger </span> ';
            updateStats($link, $username, [ 'dagger' => $row['dagger'] + 1]); // -- update stat
        } elseif ($rand == 1) { // 25%
            $bonus = '<span>+ 2 Blueberry </span> ';
            // $results = $link->query("UPDATE $user SET blueberry = blueberry + 2");
            updateStats($link, $username, [ 'blueberry' => $row['blueberry'] + 2]); // -- update stat
        } elseif ($rand == 2) { // 25%
            $bonus = '<span>+ Basic Staff </span> ';
            // $results = $link->query("UPDATE $user SET basicstaff = basicstaff + 1");
            updateStats($link, $username, [ 'basicstaff' => $row['basicstaff'] + 1]); // -- update stat
        } elseif ($rand == 4) { // 25%
            $bonus = '<span>+ Basic Hood </span> ';
            // $results = $link->query("UPDATE $user SET basichood = basichood + 1");
            updateStats($link, $username, [ 'basichood' => $row['basichood'] + 1]); // -- update stat
        }

        //echo 
// $message="$start 
// + 4 xp 
//   + $currencyadd ".$_SESSION['currency']." 
//   $bonusalways$bonusfirst$bonus$open</div>";
//         include('update_feed_alt.php'); // --- update feed
// $results = $link->query("UPDATE $user SET xp = xp + 4"); // xp
// $results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
//         // $results = $link->query("UPDATE $user SET KLscorpion = KLscorpion + 1");





//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  giant spider
if ($enemy =='Giant Spider') {

        $KLname = 'KLgiantspider';
        $currencyadd = rand(5, 10); 
        $killXP = 6;


        // $currencyadd = rand(5, 10);	 // rand gold
$rand=rand(1, 4);				// rand bonus
// $bonus = '';
        $bonusalways = '+ 1 Scorpion Tail </span> ';
        // $results = $link->query("UPDATE $user SET scorpiontail = scorpiontail + 1");
        updateStats($link, $username, [ 'scorpiontail' => $row['scorpiontail'] + 1]); // -- update stat


        if ($rand == 1) { //25%
            $bonus = '<span>+ Red Boots </span> ';
            // $results = $link->query("UPDATE $user SET redboots = redboots + 1");
            updateStats($link, $username, [ 'redboots' => $row['redboots'] + 1]); // -- update stat

        } elseif ($rand == 2) { //25%
            $bonus = '<span>+ Mace </span> ';
            // $results = $link->query("UPDATE $user SET mace = mace + 1");
            updateStats($link, $username, [ 'mace' => $row['mace'] + 1]); // -- update stat
        } elseif ($rand == 3) { //25%
            $qty=rand(2, 6);
            $bonus = '<span>+ '.$qty.' Redberry </span> ';
            // $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
            updateStats($link, $username, [ 'redberry' => $row['redberry'] + $qty]); // -- update stat
        } elseif ($rand == 4) { //25%
            $bonus = '<span>+ Dagger </span> ';
            // $results = $link->query("UPDATE $user SET dagger = dagger + 1");
            updateStats($link, $username, [ 'dagger' => $row['dagger'] + 1]); // -- update stat
        }
        //echo 
// $message="$start 
//   + 6 xp 
//   + $currencyadd ".$_SESSION['currency']." 
//   $bonusalways$bonus$open</div>";
//         include('update_feed_alt.php'); // --- update feed
// $results = $link->query("UPDATE $user SET xp = xp + 6"); // xp
// $results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
//         // $results = $link->query("UPDATE $user SET KLgiantspider = KLgiantspider + 1");





//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  alpha scorpion
if ($enemy =='Alpha Scorpion') {

        $KLname = 'KLalphascorpion';
        $currencyadd = rand(10, 20); 
        $killXP = 8;

       // $currencyadd = rand(10, 20);	 // rand gold
        $bonusalways = '+ 2 Scorpion Tail </span> ';
        // $results = $link->query("UPDATE $user SET scorpiontail = scorpiontail + 2");
        updateStats($link, $username, [ 'scorpiontail' => $row['scorpiontail'] + 2]); // -- update stat
        $rand=rand(1, 2);				// rand bonus
        // $bonus = '';
        $rand2 = rand(1, 4);
        if ($rand2 == 1) {
            $bonus = '<span>+ Red Hood </span> ';
            // $results = $link->query("UPDATE $user SET redhood = redhood + 1");
            updateStats($link, $username, [ 'redhood' => $row['redhood'] + 1]); // -- update stat
            
        }
        if ($rand2 == 2) {
            $bonus = '<span>+ Blue Hood </span> ';
            // $results = $link->query("UPDATE $user SET bluehood = bluehood + 1");
            updateStats($link, $username, [ 'bluehood' => $row['bluehood'] + 1]); // -- update stat 

        }
        if ($rand2 == 3) {
            $bonus = '<span>+ Green Hood </span> ';
            // $results = $link->query("UPDATE $user SET greenhood = greenhood + 1");
            updateStats($link, $username, [ 'greenhood' => $row['greenhood'] + 1]); // -- update stat
        }
        if ($rand2 == 4) {
            $bonus = '<span>+ Basic Hood </span> ';
            // $results = $link->query("UPDATE $user SET basichood = basichood + 1");
            updateStats($link, $username, [ 'basichood' => $row['basichood'] + 1]); // -- update stat
        }

        if ($rand == 1) { // 25%
            $bonus2 = '+ Broad Sword </span> ';
            // $results = $link->query("UPDATE $user SET broadsword = broadsword + 1");
            updateStats($link, $username, [ 'broadsword' => $row['broadsword'] + 1]); // -- update stat
        }
        if ($rand == 2) { // 25%
            $bonus2 = '+ Long Sword </span> ';
            // $results = $link->query("UPDATE $user SET longsword = longsword + 1");
            updateStats($link, $username, [ 'longsword' => $row['longsword'] + 1]); // -- update stat
        }
        //echo 
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  scorpion guard
if ($enemy =='Scorpion Guard') {


        $KLname = 'KLscorpionguard';
        $killXP = 10;
        $currencyadd = rand(20, 30); 


        // $currencyadd = rand(20, 30);// rand gold
        $bonusalways = '+ 3 Scorpion Tail </span> ';
        // $results = $link->query("UPDATE $user SET scorpiontail = scorpiontail + 3");
        updateStats($link, $username, [ 'scorpiontail' => $row['scorpiontail'] + 3]); // -- update stat
        $rand=rand(1, 4);				// rand bonus
        // $bonus = '';
        if ($rand == 1) { // 25%
            $qty=rand(2, 4);
            $bonus = '<span>+ '.$qty.' Red Potion </span> ';
            // $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
            updateStats($link, $username, [ 'redpotion' => $row['redpotion'] + $qty]); // -- update stat
        }
        if ($rand == 2) { // 25%
            $bonus = '<span>+ Club </span> ';
            // $results = $link->query("UPDATE $user SET club = club + 1");
            updateStats($link, $username, [ 'club' => $row['club'] + 1]); // -- update stat
        }
        if ($rand == 3) { // 25%
            $bonus = '<span>+ Kite Shield </span> ';
            // $results = $link->query("UPDATE $user SET kiteshield = kiteshield + 1");
            updateStats($link, $username, [ 'kiteshield' => $row['kiteshield'] + 1]); // -- update stat
        }
        if ($rand == 4) { // 25%
            $bonus = '<span>+ Basic Helmet </span> ';
            // $results = $link->query("UPDATE $user SET basichelmet = basichelmet + 1");
            updateStats($link, $username, [ 'basichelmet' => $row['basichelmet'] + 1]); // -- update stat
        }
        //echo 
// $message="$start 
// + 10 xp 
//   + $currencyadd ".$_SESSION['currency']." 
//   $bonusalways$bonus$open</div>";
//         include('update_feed_alt.php'); // --- update feed
// $results = $link->query("UPDATE $user SET xp = xp + 10"); // xp
// $results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
//         // $results = $link->query("UPDATE $user SET KLscorpionguard = KLscorpionguard + 1");



//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  mammoth scorpion
if ($enemy =='Mammoth Scorpion') {

        $KLname = 'KLmammothscorpion';
        $killXP = 25;
        $currencyadd = rand(10, 20); 


        // $currencyadd = rand(10, 20);	 // rand gold
        $bonusalways = '+ 4 Scorpion Tail </span> ';
        // $results = $link->query("UPDATE $user SET scorpiontail = scorpiontail + 4");
        updateStats($link, $username, [ 'scorpiontail' => $row['scorpiontail'] + 4]); // -- update stat
        $rand=rand(1, 4);				// rand bonus
        // $bonus = '';
        if ($rand == 1) { // 50%
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Red Hood ';
                // $results = $link->query("UPDATE $user SET redhood = redhood + 1");
                updateStats($link, $username, [ 'redhood' => $row['redhood'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Blue Hood ';
                // $results = $link->query("UPDATE $user SET bluehood = bluehood + 1");
                updateStats($link, $username, [ 'bluehood' => $row['bluehood'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Green Hood ';
                // $results = $link->query("UPDATE $user SET greenhood = greenhood + 1");
                updateStats($link, $username, [ 'greenhood' => $row['greenhood'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Leather Hood ';
                // $results = $link->query("UPDATE $user SET leatherhood = leatherhood + 1");
                updateStats($link, $username, [ 'leatherhood' => $row['leatherhood'] + 1]); // -- update stat
            }
        }
        if ($rand == 2) { // 25%
            $qty=rand(2, 4);
            $bonus = '<span>+ '.$qty.' Blue Potion </span> ';
            // $results = $link->query("UPDATE $user SET bluepotion = bluepotion + $qty");
            updateStats($link, $username, [ 'bluepotion' => $row['bluepotion'] + $qty]); // -- update stat
        }
        if ($rand == 3) { // 25%
            $bonus = '<span>+ Tower Shield </span> ';
            // $results = $link->query("UPDATE $user SET towershield = towershield + 1");
            updateStats($link, $username, [ 'towershield' => $row['towershield'] + 1]); // -- update stat
        }
        if ($rand == 4) { // 25%
            $bonus = '<span>+ Padded Armor </span> ';
            // $results = $link->query("UPDATE $user SET paddedarmor = paddedarmor + 1");
            updateStats($link, $username, [ 'paddedarmor' => $row['paddedarmor'] + 1]); // -- update stat
        }
        //echo 
// $message="$start 
// + 25 xp 
//   + $currencyadd ".$_SESSION['currency']." 
//   $bonusalways$bonus$open</div>";
//         include('update_feed_alt.php'); // --- update feed
// $results = $link->query("UPDATE $user SET xp = xp + 25"); // xp
// $results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
//         // $results = $link->query("UPDATE $user SET KLmammothscorpion = KLmammothscorpion + 1");



//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
    }


// --------------------------------------------------------------  scorpion queen
if ($enemy =='Scorpion Queen') {

        $KLname = 'KLscorpionqueen';
        $killXP = 150;
        $currencyadd = rand(200, 500); 


        // $currencyadd = rand(200, 500);// rand gold
        $bonusalways = '+ 5 Scorpion Tail </span> ';
        // $results = $link->query("UPDATE $user SET scorpiontail = scorpiontail + 5");
        updateStats($link, $username, [ 'scorpiontail' => $row['scorpiontail'] + 5]); // -- update stat 
        $rand=rand(1, 4);				// rand bonus
        // $bonus = '';
        if ($wingspotion == 0) { // Wings POTION if 0 - to use to escape grassy field without completing quests
            $bonusfirst = '+ Wings Potion </span> ';
            // $results = $link->query("UPDATE $user SET wingspotion = wingspotion + 1");
            updateStats($link, $username, [ 'wingspotion' => 1]); // -- update stat
        }
        else {$bonusfirst = '';}
        if ($rand == 1) { // 25%
            $rand2 = rand(1, 2);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength II ';
                $bonus = '<span>+ Ring of Defense II ';
                // $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
                // $results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1");
                updateStats($link, $username, [ 'ringofstrengthII' => $row['ringofstrengthII'] + 1, 'ringofdefenseII' => $row['ringofdefenseII'] + 1]); // -- update stat
                
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity II ';
                $bonus = '<span>+ Ring of Magic II ';
                // $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
                // $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
                updateStats($link, $username, [ 'ringofdexterityII' => $row['ringofdexterityII'] + 1, 'ringofmagicII' => $row['ringofmagicII'] + 1]); // -- update stat
            }
        } elseif ($rand == 2) { // 25%
            $bonus = '<span>+ Off Hand Dagger </span> ';
            // $results = $link->query("UPDATE $user SET offhanddagger = offhanddagger + 1");
            updateStats($link, $username, [ 'offhanddagger' => $row['offhanddagger'] + 1]); // -- update stat
        } elseif ($rand == 3) { // 25%
            $bonus = '<span>+ Claymore </span> ';
            // $results = $link->query("UPDATE $user SET claymore = claymore + 1");
            updateStats($link, $username, [ 'claymore' => $row['claymore'] + 1]); // -- update stat
        } elseif ($rand == 4) { // 25%
            $bonus = '<span>+ Iron Sword </span> ';
            // $results = $link->query("UPDATE $user SET ironsword = ironsword + 1");
            updateStats($link, $username, [ 'ironsword' => $row['ironsword'] + 1]); // -- update stat
        }
        //echo 
// $message="$start 
// + 150 xp 
//   + $currencyadd ".$_SESSION['currency']." 
//   $bonusalways$bonus$bonusfirst$open</div>";
//         include('update_feed_alt.php'); // --- update feed
// $results = $link->query("UPDATE $user SET xp = xp + 150"); // xp
// $results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
//         // $results = $link->query("UPDATE $user SET KLscorpionqueen = KLscorpionqueen + 1");




//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  scorpion king
if ($enemy =='Scorpion King') {

        $KLname = 'KLscorpionking';
        $killXP = 300;
        $currencyadd = rand(500, 1000); 


        // $currencyadd = rand(500, 1000);// rand gold
        $bonusalways = '+ 10 Scorpion Tail </span> ';
        // $results = $link->query("UPDATE $user SET scorpiontail = scorpiontail + 10");
        updateStats($link, $username, [ 'scorpiontail' => $row['scorpiontail'] + 10]); // -- update stat
        $rand=rand(1, 4);				// rand bonus
        // $bonus = '';
        if ($rand == 1) { // 25%
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength V ';
                // $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
                updateStats($link, $username, [ 'ringofstrengthV' => $row['ringofstrengthV'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity V ';
                // $results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV + 1");
                updateStats($link, $username, [ 'ringofdexterityV' => $row['ringofdexterityV'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic V ';
                // $results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1");
                updateStats($link, $username, [ 'ringofmagicV' => $row['ringofmagicV'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense V ';
                // $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1");
                updateStats($link, $username, [ 'ringofdefenseV' => $row['ringofdefenseV'] + 1]); // -- update stat
            }
        } elseif ($rand == 2) { // 25%
            $bonus = '<span>+ Scorpion Hood </span> ';
            // $results = $link->query("UPDATE $user SET scorpionhood = scorpionhood + 1");
            updateStats($link, $username, [ 'scorpionhood' => $row['scorpionhood'] + 1]); // -- update stat
        } elseif ($rand == 3) { // 25%
            $qty=rand(1, 4);
            $bonus = '<span>+ '.$qty.' Red Balm </span> ';
            // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
            updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
        } elseif ($rand == 4) { // 25%
            $bonus = '<span>+ Iron 2h Sword </span> ';
            // $results = $link->query("UPDATE $user SET iron2hsword = iron2hsword + 1");
            updateStats($link, $username, [ 'iron2hsword' => $row['iron2hsword'] + 1]); // -- update stat
        }
        //echo 
// $message="$start 
// + 300 xp 
//   + $currencyadd ".$_SESSION['currency']." 
//   $bonusalways$bonus$open</div>";
//         include('update_feed_alt.php'); // --- update feed
// $results = $link->query("UPDATE $user SET xp = xp + 300"); // xp
// $results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
//         // $results = $link->query("UPDATE $user SET KLscorpionking = KLscorpionking + 1");




//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  bat
if ($enemy =='Bat') {

        $KLname = 'KLbat';
        $killXP = 3;
        $currencyadd = rand(5, 20); 


        // $currencyadd = rand(5, 20);// rand gold
$rand=rand(1, 4);				// rand bonus

$bonusalways = '+ 1 Bat Wing </span> ';
        // $results = $link->query("UPDATE $user SET batwing = batwing + 1");
        updateStats($link, $username, [ 'batwing' => $row['batwing'] + 1]); // -- update stat
        if ($rand == 1) {
            $blueberry = rand(1, 3);
            $bonus = '<span>+ '.$blueberry.' Blueberry </span> ';
            // $results = $link->query("UPDATE $user SET blueberry = blueberry + $blueberry");
            updateStats($link, $username, [ 'blueberry' => $row['blueberry'] + $blueberry]); // -- update stat
        }
        if ($rand == 2) { // 25%
            $bonus = '<span>+ Long Sword </span> ';
            // $results = $link->query("UPDATE $user SET longsword = longsword + 1");
            updateStats($link, $username, [ 'longsword' => $row['longsword'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $arrows = rand(2, 5);
            $bonus = '<span>+ '.$arrows.' arrows </span> ';
            // $results = $link->query("UPDATE $user SET arrows = arrows + $arrows");
            updateStats($link, $username, [ 'arrows' => $row['arrows'] + $arrows]); // -- update stat
        }
        if ($rand == 4) {
            $bolts = rand(2, 5);
            $bonus = '<span>+ '.$bolts.' bolts </span> ';
            // $results = $link->query("UPDATE $user SET bolts = bolts + $bolts");
            updateStats($link, $username, [ 'bolts' => $row['bolts'] + $bolts]); // -- update stat
        }


        //echo 
// $message="$start 
// + 3 xp 
//   + $currencyadd ".$_SESSION['currency']." 
//   $bonusalways$bonus$open</div>";
//         include('update_feed_alt.php'); // --- update feed
// $results = $link->query("UPDATE $user SET xp = xp + 3"); // xp
// $results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
//         // $results = $link->query("UPDATE $user SET KLbat = KLbat + 1");

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}




// --------------------------------------------------------------  golden bat
if ($enemy =='Golden Bat') {

        $KLname = 'KLgoldenbat';
        $killXP = 10;
        $currencyadd = rand(100, 300); 


        // $currencyadd = rand(100, 300);// rand gold
        $rand=rand(1, 4);				// rand bonus

        $bonusalways = '+ 2 Bat Wing </span> ';
        // $results = $link->query("UPDATE $user SET batwing = batwing + 2");
        updateStats($link, $username, [ 'batwing' => $row['batwing'] + 2]); // -- update stat
        if ($rand == 1) {
            $redpotion = rand(1, 3);
            $bonus = '<span>+ '.$redpotion.' Red Potion </span> ';
            // $results = $link->query("UPDATE $user SET redpotion = redpotion + $redpotion");
            updateStats($link, $username, [ 'redpotion' => $row['redpotion'] + $redpotion]); // -- update stat
        }
        if ($rand == 2) { // 25%
            $bonus = '<span>+ Iron Boomerang </span> ';
            // $results = $link->query("UPDATE $user SET ironboomerang = ironboomerang + 1");
            updateStats($link, $username, [ 'ironboomerang' => $row['ironboomerang'] + 1]); // -- update stat   
        }
        if ($rand == 3) {
            $bluepotion = rand(1, 3);
            $bonus = '<span>+ '.$bluepotion.' Blue Potion </span> ';
            // $results = $link->query("UPDATE $user SET bluepotion = bluepotion + $bluepotion");
            updateStats($link, $username, [ 'bluepotion' => $row['bluepotion'] + $bluepotion]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Ring of Dexterity II </span> ';
            // $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
            updateStats($link, $username, [ 'ringofdexterityII' => $row['ringofdexterityII'] + 1]); // -- update stat
        }

        //echo 
// $message="$start 
// + 10 xp 
//   + $currencyadd ".$_SESSION['currency']." 
//   $bonusalways$bonus$open</div>";
//         include('update_feed_alt.php'); // --- update feed
// $results = $link->query("UPDATE $user SET xp = xp + 10"); // xp
// $results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
//         // $results = $link->query("UPDATE $user SET KLgoldenbat = KLgoldenbat + 1");




//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  salamander
if ($enemy =='Salamander') {

        $KLname = 'KLsalamander';
        $killXP = 9;
        $currencyadd = rand(5, 30); 

        
        // $currencyadd = rand(5, 30);// rand gold
$rand=rand(1, 4);				// rand bonus

$bonusalways = '<span>+ Raw Meat </span> ';
        // $results = $link->query("UPDATE $user SET rawmeat = rawmeat + 1");
        updateStats($link, $username, [ 'rawmeat' => $row['rawmeat'] + 1]); // -- update stat
        if ($rand == 1) {
            $blueberry = rand(5, 15);
            $bonus = '<span>+ '.$blueberry.' Blueberry </span> ';
            // $results = $link->query("UPDATE $user SET blueberry = blueberry + $blueberry");
            updateStats($link, $username, [ 'blueberry' => $row['blueberry'] + $blueberry]); // -- update stat
        }
        if ($rand == 2) { // 25%
            $bonus = '<span>+ bo staff </span> ';
            // $results = $link->query("UPDATE $user SET bostaff = bostaff + 1");
            updateStats($link, $username, [ 'bostaff' => $row['bostaff'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $arrows = rand(5, 15);
            $bonus = '<span>+ '.$arrows.' arrows </span> ';
            // $results = $link->query("UPDATE $user SET arrows = arrows + $arrows");
            updateStats($link, $username, [ 'arrows' => $row['arrows'] + $arrows]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Ring of Magic </span> ';
            // $results = $link->query("UPDATE $user SET ringofmagic = ringofmagic + 1");
            updateStats($link, $username, [ 'ringofmagic' => $row['ringofmagic'] + 1]); // -- update stat
        }

        //echo 
// $message="$start 
// + 9 xp 
//   + $currencyadd ".$_SESSION['currency']." 
//   $bonusalways$bonus$open</div>";
//         include('update_feed_alt.php'); // --- update feed
// $results = $link->query("UPDATE $user SET xp = xp + 9"); // xp
// $results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
//         // $results = $link->query("UPDATE $user SET KLsalamander = KLsalamander + 1");

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  goblin
if ($enemy =='Goblin') {

        $KLname = 'KLgoblin';
        $killXP = 7;
        $currencyadd = rand(5, 10); 

        // $currencyadd = rand(5, 10);// rand gold
        $rand=rand(1, 4);				// rand bonus
        if ($rand == 1) { // 25%
            $qty=rand(5, 15);
            $bonus = '<span>+ '.$qty.' Redberry ';
            // $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
            updateStats($link, $username, [ 'redberry' => $row['redberry'] + $qty]); // -- update stat}
        }
        if ($rand == 2) { // 25%
            $bonus = '<span>+ Dagger </span> ';
            // $results = $link->query("UPDATE $user SET dagger = dagger + 1");
            updateStats($link, $username, [ 'dagger' => $row['dagger'] + 1]); // -- update stat
        }
        if ($rand == 3) { // 25%
            $bonus = '<span>+ Basic Helmet </span> ';
            // $results = $link->query("UPDATE $user SET basichelmet = basichelmet + 1");
            updateStats($link, $username, [ 'basichelmet' => $row['basichelmet'] + 1]); // -- update stat
        }
        if ($rand == 4) { // 25%
            $bonus = '<span>+ Black Gloves </span> ';
            // $results = $link->query("UPDATE $user SET blackgloves = blackgloves + 1");
            updateStats($link, $username, [ 'blackgloves' => $row['blackgloves'] + 1]); // -- update stat
        }
        //echo 
// $message="$start 
// + 7 xp 
//   + $currencyadd ".$_SESSION['currency']." 
//   $bonus$open</div>";
//         include('update_feed_alt.php'); // --- update feed
// $results = $link->query("UPDATE $user SET xp = xp + 7"); // xp
// $results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
//         // $results = $link->query("UPDATE $user SET KLgoblin = KLgoblin + 1");

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  goblin bandit
if ($enemy =='Goblin Bandit') {

        $KLname = 'KLgoblinbandit';
        $killXP = 12;
        $currencyadd = rand(20, 40); 

        
        // $currencyadd = rand(20, 40);// rand gold
$rand=rand(1, 4);				// rand bonus
if ($rand == 1) { // 25%
    $bonus = '<span>+ Buckler ';
    // $results = $link->query("UPDATE $user SET buckler = buckler + 1");
    updateStats($link, $username, [ 'buckler' => $row['buckler'] + 1]); // -- update stat
}
        if ($rand == 2) { // 25%
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Red Hood ';
                // $results = $link->query("UPDATE $user SET redhood = redhood + 1");
                updateStats($link, $username, [ 'redhood' => $row['redhood'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Blue Hood ';
                // $results = $link->query("UPDATE $user SET bluehood = bluehood + 1");
                updateStats($link, $username, [ 'bluehood' => $row['bluehood'] + 1]); // -- update stat

            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Green Hood ';
                // $results = $link->query("UPDATE $user SET greenhood = greenhood + 1");
                updateStats($link, $username, [ 'greenhood' => $row['greenhood'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Basic Hood ';
                // $results = $link->query("UPDATE $user SET basichood = basichood + 1");
                updateStats($link, $username, [ 'basichood' => $row['basichood'] + 1]); // -- update stat
            }
        }
        if ($rand == 3) { // 25%
            $bonus = '<span>+ Wrist Bracers </span> ';
            // $results = $link->query("UPDATE $user SET wristbracers = wristbracers + 1");
            updateStats($link, $username, [ 'wristbracers' => $row['wristbracers'] + 1]); // -- update stat
        }
        if ($rand == 4) { // 25%
            $bonus = '<span>+ Black Boots </span> ';
            // $results = $link->query("UPDATE $user SET blackboots = blackboots + 1");
            updateStats($link, $username, [ 'blackboots' => $row['blackboots'] + 1]); // -- update stat

        }
        //echo 
// $message="$start 
//   + 12 xp 
//   + $currencyadd ".$_SESSION['currency']." 
//   $bonus$open</div>";
//         include('update_feed_alt.php'); // --- update feed
// $results = $link->query("UPDATE $user SET xp = xp + 12"); // xp
// $results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
//         // $results = $link->query("UPDATE $user SET KLgoblinbandit = KLgoblinbandit + 1");

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  goblin chief
if ($enemy =='Goblin Chief') {

        $KLname = 'KLgoblinchief';
        $killXP = 30;
        $currencyadd = rand(100, 200); 

        $rand=rand(1, 4);				// rand bonus
        if ($rand == 1) { // 25%
            $bonus = '<span>+ Green Cloak ';
            // $results = $link->query("UPDATE $user SET greencloak = greencloak + 1");
            updateStats($link, $username, [ 'greencloak' => $row['greencloak'] + 1]); // -- update stat
        }
        if ($rand == 2) { // 25%
            $bonus = '<span>+ Warhammer </span> ';
            // $results = $link->query("UPDATE $user SET warhammer = warhammer + 1");
            updateStats($link, $username, [ 'warhammer' => $row['warhammer'] + 1]); // -- update stat
        }
        if ($rand == 3) { // 25%
            $bonus = '<span>+ Flail </span> ';
            // $results = $link->query("UPDATE $user SET flail = flail + 1");
            updateStats($link, $username, [ 'flail' => $row['flail'] + 1]); // -- update stat
        }
        if ($rand == 4) { // 25%
            $bonus = '<span>+ Morning Star </span> ';
            // $results = $link->query("UPDATE $user SET morningstar = morningstar + 1");
            updateStats($link, $username, [ 'morningstar' => $row['morningstar'] + 1]); // -- update stat
        }
        //echo 
// $message="$start 
// + 30 xp 
//   + $currencyadd ".$_SESSION['currency']." 
//   $bonus$open</div>";
//         include('update_feed_alt.php'); // --- update feed
// $results = $link->query("UPDATE $user SET xp = xp + 30"); // xp
// $results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
//         // $results = $link->query("UPDATE $user SET KLgoblinchief = KLgoblinchief + 1");




//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}























// --------------------------------------------------------------  cow
if ($enemy =='Cow') {

        $KLname = 'KLcow';
        $killXP = 5;
        $currencyadd = rand(2, 5);

        $rand=rand(1, 4);				// rand bonus
        // $bonus = '';
        if ($leather<5) {
            $randleather = rand(1, 3);
            $bonusalways = '<span>+ '.$randleather.' Leather </span> ';
            // $results = $link->query("UPDATE $user SET leather = leather + $randleather");
            updateStats($link, $username, [ 'leather' => $row['leather'] + $randleather]); // -- update stat
        } else {
            $bonusalways = '<span>+ NO MORE Leather. Craft with it. ';
        }
        if ($rand == 1) {
            $bonus = '<span>+ Raw Meat </span> ';
            // $results = $link->query("UPDATE $user SET rawmeat = rawmeat + 1");
            updateStats($link, $username, [ 'rawmeat' => $row['rawmeat'] + 1]); // -- update stat
        }
        if ($rand == 2 || $rand == 3) {
            $bonus = '<span>+ 2 redberry </span> ';
            // $results = $link->query("UPDATE $user SET redberry = redberry + 1");
            updateStats($link, $username, [ 'redberry' => $row['redberry'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ 1 blueberry </span> ';
            // $results = $link->query("UPDATE $user SET blueberry = blueberry + 1");
            updateStats($link, $username, [ 'blueberry' => $row['blueberry'] + 1]); // -- update stat
        }
/*        //echo 
$message="$start 
  + 5 xp 
$bonus$bonusalways</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 5"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET KLcow = KLcow + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  thief
if ($enemy =='Thief') {
        $KLname = 'KLthief';
        $killXP = 8;
        $currencyadd = rand(10, 20);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $qty = rand(5, 15);
            $bonus = '<span>+ '.$qty.' Redberry </span> ';
            // $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
            updateStats($link, $username, [ 'redberry' => $row['redberry'] + $qty]); // -- update stat
        }
        if ($rand == 2) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength ';
                // $results = $link->query("UPDATE $user SET ringofstrength = ringofstrength + 1");
                updateStats($link, $username, [ 'ringofstrength' => $row['ringofstrength'] + 1]); // -- update stat

            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity ';
                // $results = $link->query("UPDATE $user SET ringofdexterity = ringofdexterity + 1");
                updateStats($link, $username, [ 'ringofdexterity' => $row['ringofdexterity'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic ';
                // $results = $link->query("UPDATE $user SET ringofmagic = ringofmagic + 1");
                updateStats($link, $username, [ 'ringofmagic' => $row['ringofmagic'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense ';
                // $results = $link->query("UPDATE $user SET ringofdefense = ringofdefense + 1");
                updateStats($link, $username, [ 'ringofdefense' => $row['ringofdefense'] + 1]); // -- update stat
            }
        }
        if ($rand == 3) {
            $bonus = '<span>+ Iron Dagger </span> ';
            // $results = $link->query("UPDATE $user SET irondagger = irondagger + 1");
            updateStats($link, $username, [ 'irondagger' => $row['irondagger'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $qty = rand(15, 30);
            $bonus = '<span>+ '.$qty.' Arrows </span> ';
            // $results = $link->query("UPDATE $user SET arrows = arrows + $qty");
            updateStats($link, $username, [ 'arrows' => $row['arrows'] + $qty]); // -- update stat
        }
/*        //echo 
$message="$start 
+ 8 xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 8"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET KLthief = KLthief + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  wild boar
if ($enemy =='Wild Boar') {
        $KLname = 'KLwildboar';
        $killXP = 8;
        $currencyadd = rand(10, 20);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Leather </span> ';
            // $results = $link->query("UPDATE $user SET leather = leather + 1");
            updateStats($link, $username, [ 'leather' => $row['leather'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $qty = rand(5, 10);
            $bonus = '<span>+ '.$qty.' Blueberry </span> ';
            // $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
            updateStats($link, $username, [ 'blueberry' => $row['blueberry'] + $qty]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ 3 Raw Meat </span> ';
            // $results = $link->query("UPDATE $user SET rawmeat = rawmeat + 3");
            updateStats($link, $username, [ 'rawmeat' => $row['rawmeat'] + 3]); // -- update stat
        }
        if ($rand == 4) {
            $qty = rand(5, 10);
            $bonus = '<span>+ '.$qty.' Redberry </span> ';
            // $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
            updateStats($link, $username, [ 'redberry' => $row['redberry'] + $qty]); // -- update stat
        }
/*        //echo 
$message="$start 
+ 8 xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 8"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET KLwildboar = KLwildboar + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  snake
if ($enemy =='Snake') {
        $KLname = 'KLsnake';
        $killXP = 8;
        $currencyadd = rand(10, 20);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ 3 Leather </span> ';
            // $results = $link->query("UPDATE $user SET leather = leather + 3");
            updateStats($link, $username, [ 'leather' => $row['leather'] + 3]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ 3 Antidote Potions </span> ';
            // $results = $link->query("UPDATE $user SET antidotepotion = antidotepotion + 3");
            updateStats($link, $username, [ 'antidotepotion' => $row['antidotepotion'] + 3]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ 3 Raw Meat </span> ';
            // $results = $link->query("UPDATE $user SET rawmeat = rawmeat + 3");
            updateStats($link, $username, [ 'rawmeat' => $row['rawmeat'] + 3]); // -- update stat
        }
        if ($rand == 4) {
            $qty = rand(10, 20);
            $bonus = '<span>+ '.$qty.' Blueberry </span> ';
            // $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
            updateStats($link, $username, [ 'blueberry' => $row['blueberry'] + $qty]); // -- update stat
        }
/*        //echo 
$message="$start 
+ 8 xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 8"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET KLsnake = KLsnake + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// -------------------------------------------------------------- hill ogre
if ($enemy =='Hill Ogre') {
        $KLname = 'KLhillogre';
        $killXP = 30;
        $currencyadd = rand(10, 100);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Claymore </span> ';
            // $results = $link->query("UPDATE $user SET claymore = claymore + 1");
            updateStats($link, $username, [ 'claymore' => $row['claymore'] + 1]); // -- update stat            
        }
        if ($rand == 2) {
            $bonus = '<span>+ Gladius </span> ';
            // $results = $link->query("UPDATE $user SET gladius  = gladius  + 1");
            updateStats($link, $username, [ 'gladius' => $row['gladius'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Ring of Strength II </span> ';
            // $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
            updateStats($link, $username, [ 'ringofstrengthII' => $row['ringofstrengthII'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Ring of Health Regen </span> ';
            // $results = $link->query("UPDATE $user SET ringofhealthregen = ringofhealthregen + 1");
            updateStats($link, $username, [ 'ringofhealthregen' => $row['ringofhealthregen'] + 1]); // -- update stat
        }
/*        //echo 
$message="$start 
+ 30 xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 30"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET KLhillogre = KLhillogre + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}



// ---------------------------------------------------------------------------  OGRE CAVE
// --------------------------------------------------------------  hob goblin
if ($enemy =='Hob Goblin') {
        $KLname = 'KLhobgoblin';
        $killXP = 9;
        $currencyadd = rand(10, 20);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $qty = rand(1, 3);
            $bonus = '<span>+ '.$qty.' Blueberry </span> ';
            // $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
            updateStats($link, $username, [ 'blueberry' => $row['blueberry'] + $qty]); // -- update stat

        }
        if ($rand == 2) {
            $bonus = '<span>+ Green Gloves </span> ';
            // $results = $link->query("UPDATE $user SET greengloves = greengloves + 1");
            updateStats($link, $username, [ 'greengloves' => $row['greengloves'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Wooden Bow </span> ';
            // $results = $link->query("UPDATE $user SET woodenbow = woodenbow + 1");
            updateStats($link, $username, [ 'woodenbow' => $row['woodenbow'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $qty = rand(5, 10);
            $bonus = '<span>+ '.$qty.' Arrows </span> ';
            // $results = $link->query("UPDATE $user SET arrows = arrows + $qty");
            updateStats($link, $username, [ 'arrows' => $row['arrows'] + $qty]); // -- update stat
        }
/*        //echo 
$message="$start 
+ 9 xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 9"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET KLhobgoblin = KLhobgoblin + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  orc
if ($enemy =='Orc') {
        $KLname = 'KLorc';
        $killXP = 12;
        $currencyadd = rand(15, 25);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Long Sword </span> ';
            // $results = $link->query("UPDATE $user SET longsword = longsword + 1");
            updateStats($link, $username, [ 'leather' => $row['leather'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Black Gloves </span> ';
            // $results = $link->query("UPDATE $user SET blackgloves = blackgloves + 1");
            updateStats($link, $username, [ 'blackgloves' => $row['blackgloves'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Crossbow </span> ';
            // $results = $link->query("UPDATE $user SET crossbow = crossbow + 1");
            updateStats($link, $username, [ 'crossbow' => $row['crossbow'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $qty = rand(5, 10);
            $bonus = '<span>+ '.$qty.' Bolts </span> ';
            // $results = $link->query("UPDATE $user SET bolts = bolts + $qty");
            updateStats($link, $username, [ 'bolts' => $row['bolts'] + $qty]); // -- update stat
        }
/*        //echo 
$message="$start 
+ 12 xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 12"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET KLorc = KLorc + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  ogre
if ($enemy =='Ogre') {
        $KLname = 'KLogre';
        $killXP = 20;
        $currencyadd = rand(20, 30);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Warhammer </span> ';
            // $results = $link->query("UPDATE $user SET warhammer = warhammer + 1");
            updateStats($link, $username, [ 'warhammer' => $row['warhammer'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Flail </span> ';
            // $results = $link->query("UPDATE $user SET flail = flail + 1");
            updateStats($link, $username, [ 'flail' => $row['flail'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Wrist Bracers </span> ';
            // $results = $link->query("UPDATE $user SET wristbracers = wristbracers + 1");
            updateStats($link, $username, [ 'wristbracers' => $row['wristbracers'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Leather Helmet </span> ';
            // $results = $link->query("UPDATE $user SET leatherhelmet = leatherhelmet + 1");
            updateStats($link, $username, [ 'leatherhelmet' => $row['leatherhelmet'] + 1]); // -- update stat
        }
/*        //echo 
$message="$start 
+ 20 xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 20"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET KLogre = KLogre + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  ogre guard
if ($enemy =='Ogre Guard') {
        $KLname = 'KLogreguard';
        $killXP = 25;
        $currencyadd = rand(30, 40);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Pike </span> ';
            // $results = $link->query("UPDATE $user SET pike = pike + 1");
            updateStats($link, $username, [ 'pike' => $row['pike'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Horned Helmet  </span> ';
            // $results = $link->query("UPDATE $user SET hornedhelmet  = hornedhelmet  + 1");
            updateStats($link, $username, [ 'hornedhelmet' => $row['hornedhelmet'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Red Potion </span> ';
            // $results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
            updateStats($link, $username, [ 'redpotion' => $row['redpotion'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Iron Helmet </span> ';
            // $results = $link->query("UPDATE $user SET ironhelmet = ironhelmet + 1");
            updateStats($link, $username, [ 'ironhelmet' => $row['ironhelmet'] + 1]); // -- update stat
        }
/*        //echo 
$message="$start 
+ 25 xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 25"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET KLogreguard = KLogreguard + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  fire ogress
if ($enemy =='Fire Ogress') {
        $KLname = 'KLfireogress';
        $killXP = 30;
        $currencyadd = rand(40, 50);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Wooden Staff </span> ';
            // $results = $link->query("UPDATE $user SET woodenstaff = woodenstaff + 1");
            updateStats($link, $username, [ 'woodenstaff' => $row['woodenstaff'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Morning Star  </span> ';
            // $results = $link->query("UPDATE $user SET morningstar  = morningstar  + 1");
            updateStats($link, $username, [ 'morningstar' => $row['morningstar'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Red Potion </span> ';
            // $results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
            updateStats($link, $username, [ 'redpotion' => $row['redpotion'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength ';
                // $results = $link->query("UPDATE $user SET ringofstrength = ringofstrength + 1");   
                updateStats($link, $username, [ 'ringofstrength' => $row['ringofstrength'] + 1]); // -- update stat                
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity ';
                // $results = $link->query("UPDATE $user SET ringofdexterity = ringofdexterity + 1");
                updateStats($link, $username, [ 'ringofdexterity' => $row['ringofdexterity'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic ';
                // $results = $link->query("UPDATE $user SET ringofmagic = ringofmagic + 1");
                updateStats($link, $username, [ 'ringofmagic' => $row['ringofmagic'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense ';
                // $results = $link->query("UPDATE $user SET ringofdefense = ringofdefense + 1");
                updateStats($link, $username, [ 'ringofdefense' => $row['ringofdefense'] + 1]); // -- update stat
            }
        }
/*        //echo 
$message="$start 
+ 30 xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 30"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET KLfireogress = KLfireogress + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  ogre lieutenant
if ($enemy =='Ogre Lieutenant') {
        $KLname = 'KLogrelieutenant';
        $killXP = 50;
        $currencyadd = rand(100, 300);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Claymore </span> ';
            // $results = $link->query("UPDATE $user SET claymore = claymore + 1");
            updateStats($link, $username, [ 'claymore' => $row['claymore'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Barbarian Helmet  </span> ';
            // $results = $link->query("UPDATE $user SET barbarianhelmet  = barbarianhelmet  + 1");
            updateStats($link, $username, [ 'barbarianhelmet' => $row['barbarianhelmet'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Buckler </span> ';
            // $results = $link->query("UPDATE $user SET buckler = buckler + 1");
            updateStats($link, $username, [ 'buckler' => $row['buckler'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Iron Shield </span> ';
            // $results = $link->query("UPDATE $user SET ironshield = ironshield + 1");
            updateStats($link, $username, [ 'ironshield' => $row['ironshield'] + 1]); // -- update stat
        }
/*        //echo 
$message="$start 
+ 50 xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 50"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET KLogrelieutenant = KLogrelieutenant + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  ogre priest
if ($enemy =='Ogre Priest') {
        $KLname = 'KLogrepriest';
        $killXP = 50;
        $currencyadd = rand(200, 400);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Nunchaku </span> ';
            // $results = $link->query("UPDATE $user SET nunchaku = nunchaku + 1");
            updateStats($link, $username, [ 'nunchaku' => $row['nunchaku'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Chakram </span> ';
            // $results = $link->query("UPDATE $user SET chakram = chakram + 1");
            updateStats($link, $username, [ 'chakram' => $row['chakram'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Demon Dagger </span> ';
            // $results = $link->query("UPDATE $user SET demondagger = demondagger + 1");
            updateStats($link, $username, [ 'demondagger' => $row['demondagger'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Gray Matter </span> ';
            // $results = $link->query("UPDATE $user SET graymatter = graymatter + 1");
            updateStats($link, $username, [ 'graymatter' => $row['graymatter'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  kobold
if ($enemy =='Kobold') {
        $KLname = 'KLkobold';
        $killXP = 10;
        $currencyadd = rand(15, 25);

        $rand=rand(1, 4);
        $KLname= 'KLkobold';
        if ($rand == 1) {
            $qty = rand(2, 6);
            $bonus = '<span>+ '.$qty.' Blueberry </span> ';
            // $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
            updateStats($link, $username, [ 'blueberry' => $row['blueberry'] + $qty]); // -- update stat
        }
        if ($rand == 2) {
            $qty = rand(2, 6);
            $bonus = '<span>+ '.$qty.' Redberry </span> ';
            // $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
            updateStats($link, $username, [ 'redberry' => $row['redberry'] + $qty]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Long Sword </span> ';
            // $results = $link->query("UPDATE $user SET longsword = longsword + 1");
            updateStats($link, $username, [ 'longsword' => $row['longsword'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Kite Shield </span> ';
            // $results = $link->query("UPDATE $user SET kiteshield = kiteshield + 1");
            updateStats($link, $username, [ 'kiteshield' => $row['kiteshield'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  flying kobold
if ($enemy =='Flying Kobold') {
        $KLname= 'KLflyingkobold';
        $killXP = 15;
        $currencyadd = rand(15, 25);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Wooden Bow </span> ';
            // $results = $link->query("UPDATE $user SET woodenbow = woodenbow + 1");
        }
        if ($rand == 2) {
            $qty = rand(5, 10);
            $bonus = '<span>+ '.$qty.' Arrows </span> ';
            // $results = $link->query("UPDATE $user SET arrows = arrows + $qty");
        }
        if ($rand == 3) {
            $bonus = '<span>+ Crossbow </span> ';
            // $results = $link->query("UPDATE $user SET crossbow = crossbow + 1");
        }
        if ($rand == 4) {
            $qty = rand(5, 10);
            $bonus = '<span>+ '.$qty.' Bolts </span> ';
            // $results = $link->query("UPDATE $user SET bolts = bolts + $qty");
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  kobold shaman
if ($enemy =='Kobold Shaman') {
        $KLname= 'KLkoboldshaman';
        $killXP = 20;
        $currencyadd = rand(30, 60);

        $rand=rand(1, 4);
        if ($rand == 1) { // 25%
            $bonus = '<span>+ Gray Boots </span> ';
            // $results = $link->query("UPDATE $user SET grayboots = grayboots + 1");
            updateStats($link, $username, [ 'grayboots' => $row['grayboots'] + 1]); // -- update stat
        }
        if ($rand == 2) { // 25%
            $bonus = '<span>+ Bo Staff </span> ';
            // $results = $link->query("UPDATE $user SET bostaff = bostaff + 1");
            updateStats($link, $username, [ 'bostaff' => $row['bostaff'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength ';
                // $results = $link->query("UPDATE $user SET ringofstrength = ringofstrength + 1");
                updateStats($link, $username, [ 'ringofstrength' => $row['ringofstrength'] + 1]); // -- update stat

            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity ';
                // $results = $link->query("UPDATE $user SET ringofdexterity = ringofdexterity + 1");
                updateStats($link, $username, [ 'ringofdexterity' => $row['ringofdexterity'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic ';
                // $results = $link->query("UPDATE $user SET ringofmagic = ringofmagic + 1");
                updateStats($link, $username, [ 'ringofmagic' => $row['ringofmagic'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense ';
                // $results = $link->query("UPDATE $user SET ringofdefense = ringofdefense + 1");
                updateStats($link, $username, [ 'ringofdefense' => $row['ringofdefense'] + 1]); // -- update stat
            }
        }
        if ($rand == 4) { // 25%
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Red Hood ';
                // $results = $link->query("UPDATE $user SET redhood = redhood + 1");
                updateStats($link, $username, [ 'redhood' => $row['redhood'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Blue Hood ';
                updateStats($link, $username, [ 'bluehood' => $row['bluehood'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Green Hood ';
                updateStats($link, $username, [ 'greenhood' => $row['greenhood'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Leather Hood ';
                updateStats($link, $username, [ 'leatherhood' => $row['leatherhood'] + 1]); // -- update stat   
            }
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  kobold ninja
if ($enemy =='Kobold Ninja') {
        $KLname= 'KLkoboldninja';
        $killXP = 20;
        $currencyadd = rand(40, 80);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Wooden Bo </span> ';
            // $results = $link->query("UPDATE $user SET woodenbo = woodenbo + 1");
            updateStats($link, $username, [ 'woodenbo' => $row['woodenbo'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $qty = rand(2, 3);
            $bonus = '<span>+ '.$qty.' Javelins </span> ';
            // $results = $link->query("UPDATE $user SET javelin = javelin + $qty");
            updateStats($link, $username, [ 'javelin' => $row['javelin'] + $qty]); // -- update stat
            updateStats($link, $username, [ 'steeldagger' => $row['steeldagger'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Samurai Sword </span> ';
            updateStats($link, $username, [ 'samuraisword' => $row['samuraisword'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength ';
                // $results = $link->query("UPDATE $user SET ringofstrength = ringofstrength + 1");
                updateStats($link, $username, [ 'ringofstrength' => $row['ringofstrength'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity ';
                // $results = $link->query("UPDATE $user SET ringofdexterity = ringofdexterity + 1");
                updateStats($link, $username, [ 'ringofdexterity' => $row['ringofdexterity'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic ';
                updateStats($link, $username, [ 'ringofmagic' => $row['ringofmagic'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense ';
                // $results = $link->query("UPDATE $user SET ringofdefense = ringofdefense + 1");
                updateStats($link, $username, [ 'ringofdefense' => $row['ringofdefense'] + 1]); // -- update stat
            }
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  kobold warlock
if ($enemy =='Kobold Warlock') {
        $KLname= 'KLkoboldwarlock';
        $killXP = 25;
        $currencyadd = rand(30, 80);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Gray Gloves </span> ';
            // $results = $link->query("UPDATE $user SET graygloves = graygloves + 1");
            updateStats($link, $username, [ 'graygloves' => $row['graygloves'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Black Robe </span> ';
            // $results = $link->query("UPDATE $user SET blackrobe = blackrobe + 1");
            updateStats($link, $username, [ 'blackrobe' => $row['blackrobe'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Battle Staff </span> ';
            // $results = $link->query("UPDATE $user SET battlestaff = battlestaff + 1");
            updateStats($link, $username, [ 'battlestaff' => $row['battlestaff'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Wand </span> ';
            // $results = $link->query("UPDATE $user SET wand = wand + 1");
            updateStats($link, $username, [ 'wand' => $row['wand'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  END FIGHT!!!!
    // $results = $link->query("UPDATE $user SET endfight = 1");
    // $results = $link->query("UPDATE $user SET infight = 0");

// --------------------------------------------------------------  kobold champion
if ($enemy =='Kobold Champion') {
        $KLname = 'KLkoboldchampion';
        $killXP = 30;
        $currencyadd = rand(20, 100);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Pike </span> ';
            // $results = $link->query("UPDATE $user SET pike = pike + 1");
        }
        if ($rand == 2) {
            $bonus = '<span>+ Green Cloak </span> ';
            // $results = $link->query("UPDATE $user SET greencloak = greencloak + 1");
        }
        if ($rand == 3) {
            $bonus = '<span>+ Horned Helmet </span> ';
            // $results = $link->query("UPDATE $user SET hornedhelmet = hornedhelmet + 1");
        }
        if ($rand == 4) {
            $bonus = '<span>+ Glowing Orb </span> ';
            // $results = $link->query("UPDATE $user SET glowingorb = glowingorb + 1");
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  END FIGHT!!!!
    // $results = $link->query("UPDATE $user SET endfight = 1");
    // $results = $link->query("UPDATE $user SET infight = 0");


// --------------------------------------------------------------  kobold master
if ($enemy =='Kobold Master') {
        $KLname = 'KLkoboldmaster';
        $killXP = 50;
        $currencyadd = rand(50, 200);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Gladius </span> ';
            // $results = $link->query("UPDATE $user SET gladius = gladius + 1");
            updateStats($link, $username, [ 'gladius' => $row['gladius'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Gray Robe </span> ';
            // $results = $link->query("UPDATE $user SET grayrobe = grayrobe + 1");
            updateStats($link, $username, [ 'grayrobe' => $row['grayrobe'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $qty = rand(1, 2);
            $bonus = '<span>+ '.$qty.' Blue Potion </span> ';
            // $results = $link->query("UPDATE $user SET bluepotion = bluepotion + $qty");
            updateStats($link, $username, [ 'bluepotion' => $row['bluepotion'] + $qty]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Dual Tomahawk </span> ';
            // $results = $link->query("UPDATE $user SET dualtomahawk = dualtomahawk + 1");
            updateStats($link, $username, [ 'dualtomahawk' => $row['dualtomahawk'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  kobold monk
if ($enemy =='Kobold Monk') {
        $KLname = 'KLkoboldmonk';
        $killXP = 50;
        $currencyadd = rand(200, 400);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Nunchaku </span> ';
            // $results = $link->query("UPDATE $user SET nunchaku = nunchaku + 1");
            updateStats($link, $username, [ 'nunchaku' => $row['nunchaku'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Chakram </span> ';
            // $results = $link->query("UPDATE $user SET chakram = chakram + 1");
            updateStats($link, $username, [ 'chakram' => $row['chakram'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Demon Dagger </span> ';
            // $results = $link->query("UPDATE $user SET demondagger = demondagger + 1");
            updateStats($link, $username, [ 'demondagger' => $row['demondagger'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Gray Matter </span> ';
            // $results = $link->query("UPDATE $user SET graymatter = graymatter + 1");
            updateStats($link, $username, [ 'graymatter' => $row['graymatter'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}



// --------------------------------------------------------------  Tarantula
if ($enemy =='Tarantula') {
        $KLname = 'KLtarantula';
        $killXP = 25;
        $currencyadd = rand(2, 3);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Long Sword </span> ';
            // $results = $link->query("UPDATE $user SET longsword = longsword + 1");
            updateStats($link, $username, [ 'longsword' => $row['longsword'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bolts = rand(5, 10);
            $bonus = '<span>+ '.$bolts.' bolts </span> ';
            // $results = $link->query("UPDATE $user SET bolts = bolts + $bolts");
            updateStats($link, $username, [ 'bolts' => $row['bolts'] + $bolts]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Iron Boots </span> ';
            // $results = $link->query("UPDATE $user SET ironboots = ironboots + 1");
            updateStats($link, $username, [ 'ironboots' => $row['ironboots'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength ';
                // $results = $link->query("UPDATE $user SET ringofstrength = ringofstrength + 1");
                updateStats($link, $username, [ 'ringofstrength' => $row['ringofstrength'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity ';
                // $results = $link->query("UPDATE $user SET ringofdexterity = ringofdexterity + 1");
                updateStats($link, $username, [ 'ringofdexterity' => $row['ringofdexterity'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic ';
                // $results = $link->query("UPDATE $user SET ringofmagic = ringofmagic + 1");
                updateStats($link, $username, [ 'ringofmagic' => $row['ringofmagic'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense ';
                // $results = $link->query("UPDATE $user SET ringofdefense = ringofdefense + 1");
                updateStats($link, $username, [ 'ringofdefense' => $row['ringofdefense'] + 1]); // -- update stat
            }
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Sewer Rat
if ($enemy =='Sewer Rat') {
        $KLname = 'KLsewerrat';
        $killXP = 25;
        $currencyadd = rand(2, 3);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $qty = rand(4, 8);
            $bonus = '<span>+ '.$qty.' Raw Meat </span> ';
            // $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $qty");
            updateStats($link, $username, [ 'rawmeat' => $row['rawmeat'] + $qty]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ 2 Meatball </span> ';
            // $results = $link->query("UPDATE $user SET meatball = meatball + 2");
            updateStats($link, $username, [ 'meatball' => $row['meatball'] + 2]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Gills Potions </span> ';
            // $results = $link->query("UPDATE $user SET gillspotion = gillspotion + 1");
            updateStats($link, $username, [ 'gillspotion' => $row['gillspotion'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Reds </span> ';
            // $results = $link->query("UPDATE $user SET reds = reds + 1");
            updateStats($link, $username, [ 'reds' => $row['reds'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Red Gator
if ($enemy =='Red Gator') {
        $KLname = 'KLredgator';
        $killXP = 50;
        $currencyadd = rand(2, 3);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $qty = rand(2, 4);
            $bonus = '<span>+ '.$qty.' Red Potion </span> ';
            // $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
            updateStats($link, $username, [ 'redpotion' => $row['redpotion'] + $qty]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Iron Shield </span> ';
            // $results = $link->query("UPDATE $user SET ironshield = ironshield + 1");
            updateStats($link, $username, [ 'ironshield' => $row['ironshield'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Long Bow </span> ';
            // $results = $link->query("UPDATE $user SET longbow = longbow + 1");
            updateStats($link, $username, [ 'longbow' => $row['longbow'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength II ';
                // $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
                updateStats($link, $username, [ 'ringofstrengthII' => $row['ringofstrengthII'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity II ';
                // $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
                updateStats($link, $username, [ 'ringofdexterityII' => $row['ringofdexterityII'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic II ';
                // $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
                updateStats($link, $username, [ 'ringofmagicII' => $row['ringofmagicII'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense II ';
                // $results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1");
                updateStats($link, $username, [ 'ringofdefenseII' => $row['ringofdefenseII'] + 1]); // -- update stat
            }
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Flying Dung Beetle
if ($enemy =='Flying Dung Beetle') {
        $KLname = 'KLflyingdungbeetle';
        $killXP = 50;
        $currencyadd = rand(100, 300);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $qty = rand(5, 10);
            $bonus = '<span>+ '.$qty.' Dung </span> ';
            // $results = $link->query("UPDATE $user SET dung = dung + $qty");
            updateStats($link, $username, [ 'dung' => $row['dung'] + $qty]); // -- update stat
        }
        if ($rand == 2) {
            $rand2 = rand(1, 2);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Health Regen II ';
                // $results = $link->query("UPDATE $user SET ringofhealthregenII = ringofhealthregenII + 1");
                updateStats($link, $username, [ 'ringofhealthregenII' => $row['ringofhealthregenII'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Mana Regen II ';
                // $results = $link->query("UPDATE $user SET ringofmanaregenII = ringofmanaregenII + 1");
                updateStats($link, $username, [ 'ringofmanaregenII' => $row['ringofmanaregenII'] + 1]); // -- update stat
            }
        }
        if ($rand == 3) {
            $bonus = '<span>+ Iron Chakram </span> ';
            // $results = $link->query("UPDATE $user SET ironchakram = ironchakram + 1");
            updateStats($link, $username, [ 'ironchakram' => $row['ironchakram'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            // $qty = rand(5, 15);
            // $bonus = '<span>+ '.$qty.' Javelins </span> ';
            // // $results = $link->query("UPDATE $user SET javelin = javelin + $qty");
            // updateStats($link, $username, [ 'javelin' => $row['javelin'] + $qty]); // -- update stat
            $bonus = '<span>+ Iron Chakram </span> ';
            // $results = $link->query("UPDATE $user SET ironchakram = ironchakram + 1");
            updateStats($link, $username, [ 'ironchakram' => $row['ironchakram'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Imp
if ($enemy =='Imp') {
        $KLname = 'KLimp';
        $killXP = 30;
        $currencyadd = rand(20, 50);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Gray Matter </span> ';
            // $results = $link->query("UPDATE $user SET graymatter = graymatter + 1");
            updateStats($link, $username, [ 'graymatter' => $row['graymatter'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ 5 Red Balm </span> ';
            // $results = $link->query("UPDATE $user SET redbalm = redbalm + 5");
            updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + 5]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Demon Dagger </span> ';
            // $results = $link->query("UPDATE $user SET demondagger = demondagger + 1");
            updateStats($link, $username, [ 'demondagger' => $row['demondagger'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Dual Tomahawk </span> ';
            // $results = $link->query("UPDATE $user SET dualtomahawk = dualtomahawk + 1");
            updateStats($link, $username, [ 'dualtomahawk' => $row['dualtomahawk'] + 1]); // -- update stat
        }



//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Thief Pickpocket
if ($enemy =='Thief Pickpocket') {
        $KLname = 'KLthiefpickpocket';
        $killXP = 30;
        $currencyadd = rand(50, 100);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Crossbow </span> ';
            // $results = $link->query("UPDATE $user SET crossbow = crossbow + 1");
            updateStats($link, $username, [ 'crossbow' => $row['crossbow'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bolts = rand(10, 20);
            $bonus = '<span>+ '.$bolts.' bolts </span> ';
            // $results = $link->query("UPDATE $user SET bolts = bolts + $bolts");
            updateStats($link, $username, [ 'bolts' => $row['bolts'] + $bolts]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Veggies </span> ';
            // $results = $link->query("UPDATE $user SET veggies = veggies + 1");
            updateStats($link, $username, [ 'veggies' => $row['veggies'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            // $qty = rand(2, 4);
            // $bonus = '<span>+ '.$qty.' Javelins </span> ';
            // // $results = $link->query("UPDATE $user SET javelin = javelin + $qty");
            // updateStats($link, $username, [ 'javelin' => $row['javelin'] + $qty]); // -- update stat
            $bonus = '<span>+ Veggies </span> ';
            // $results = $link->query("UPDATE $user SET veggies = veggies + 1");
            updateStats($link, $username, [ 'veggies' => $row['veggies'] + 1]); // -- update stat
        }


//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Thief Brute
if ($enemy =='Thief Brute') {
        $KLname = 'KLthiefbrute';
        $killXP = 50;
        $currencyadd = rand(50, 100);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Giant Club </span> ';
            // $results = $link->query("UPDATE $user SET giantclub = giantclub + 1");
            updateStats($link, $username, [ 'giantclub' => $row['giantclub'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bolts = rand(10, 20);
            $bonus = '<span>+ '.$bolts.' bolts </span> ';
            // $results = $link->query("UPDATE $user SET bolts = bolts + $bolts");
            updateStats($link, $username, [ 'bolts' => $row['bolts'] + $bolts]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Yellows </span> ';
            // $results = $link->query("UPDATE $user SET yellows = yellows + 1");
            updateStats($link, $username, [ 'yellows' => $row['yellows'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Leather Vest </span> ';
            // $results = $link->query("UPDATE $user SET leathervest = leathervest + 1");
            updateStats($link, $username, [ 'leathervest' => $row['leathervest'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Master Thief
if ($enemy =='Master Thief') {
        $KLname = 'KLmasterthief';
        $killXP = 80;
        $currencyadd = rand(100, 1000);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Off Hand Dagger </span> ';
            // $results = $link->query("UPDATE $user SET offhanddagger = offhanddagger + 1");
        }
        if ($rand == 2) {
            $bonus = '<span>+ Iron Crossbow </span> ';
            // $results = $link->query("UPDATE $user SET ironcrossbow = ironcrossbow+ 1");
        }
        if ($rand == 3) {
            $bonus = '<span>+ Iron Hood </span> ';
            // $results = $link->query("UPDATE $user SET ironhood = ironhood + 1");
        }
        if ($rand == 4) {
            $bonus = '<span>+ Iron Maul </span> ';
            // $results = $link->query("UPDATE $user SET ironmaul = ironmaul + 1");
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------------------------------  CATACOMBS
// --------------------------------------------------------------------------------------  CATACOMBS

// --------------------------------------------------------------  skeleton
if ($enemy =='Skeleton') {
        $KLname = 'KLskeleton';
        $killXP = 20;
        $currencyadd = rand(5, 20);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ 2 Bone </span> ';
            // $results = $link->query("UPDATE $user SET bone = bone + 2");
            updateStats($link, $username, [ 'bone' => $row['bone'] + 2]); // -- update stat
        }
        if ($rand == 2) {
            $qty = rand(5, 8);
            $bonus = '<span>+ '.$qty.' Redberry </span> ';
            // $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
            updateStats($link, $username, [ 'redberry' => $row['redberry'] + $qty]); // -- update stat
        }
        if ($rand == 3) {
            $qty = rand(5, 8);
            $bonus = '<span>+ '.$qty.' Blueberry </span> ';
            // $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
            updateStats($link, $username, [ 'blueberry' => $row['blueberry'] + $qty]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Long Sword </span> ';
            // $results = $link->query("UPDATE $user SET longsword = longsword + 1");
            updateStats($link, $username, [ 'longsword' => $row['longsword'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  skeleton archer
if ($enemy =='Skeleton Archer') {
        $KLname= 'KLskeletonarcher';
        $killXP = 30;
        $currencyadd = rand(5, 20);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ 2 Bone </span> ';
            // $results = $link->query("UPDATE $user SET bone = bone + 2");
            updateStats($link, $username, [ 'bone' => $row['bone'] + 2]); // -- update stat
        }
        if ($rand == 2) {
            $qty = rand(5, 15);
            $bonus = '<span>+ '.$qty.' Arrows </span> ';
            // $results = $link->query("UPDATE $user SET arrows = arrows + $qty");
            updateStats($link, $username, [ 'arrows' => $row['arrows'] + $qty]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Ring of Dexterity II </span> ';
            // $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
            updateStats($link, $username, [ 'ringofdexterityII' => $row['ringofdexterityII'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Hunter Shield </span> ';
            // $results = $link->query("UPDATE $user SET huntershield = huntershield + 1");
            updateStats($link, $username, [ 'huntershield' => $row['huntershield'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  skeleton knight
if ($enemy =='Skeleton Knight') {
        $KLname = 'KLskeletonknight';
        $killXP = 45;
        $currencyadd = rand(5, 20);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ 3 Bone </span> ';
            // $results = $link->query("UPDATE $user SET bone = bone + 3");
            updateStats($link, $username, [ 'bone' => $row['bone'] + 3]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Gladius </span> ';
            // $results = $link->query("UPDATE $user SET gladius = gladius + 1");
            updateStats($link, $username, [ 'gladius' => $row['gladius'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Ring of Strength II </span> ';
            // $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
            updateStats($link, $username, [ 'ringofstrengthII' => $row['ringofstrengthII'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Iron Kite Shield </span> ';
            // $results = $link->query("UPDATE $user SET ironkiteshield = ironkiteshield + 1");
            updateStats($link, $username, [ 'ironkiteshield' => $row['ironkiteshield'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  skeleton sorcerer
if ($enemy =='Skeleton Sorcerer') {
        $KLname = 'KLskeletonsorcerer';
        $killXP = 50;
        $currencyadd = rand(5, 20);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ 3 Bone </span> ';
            // $results = $link->query("UPDATE $user SET bone = bone + 3");
            updateStats($link, $username, [ 'bone' => $row['bone'] + 3]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '+2 Blue Potion </span> ';
            // $results = $link->query("UPDATE $user SET bluepotion = bluepotion + 2");
            updateStats($link, $username, [ 'bluepotion' => $row['bluepotion'] + 2]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Glowing Orb </span> ';
            // $results = $link->query("UPDATE $user SET glowingorb = glowingorb + 1");
            updateStats($link, $username, [ 'glowingorb' => $row['glowingorb'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Gray Robe </span> ';
            // $results = $link->query("UPDATE $user SET grayrobe = grayrobe + 1");
            updateStats($link, $username, [ 'grayrobe' => $row['grayrobe'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  ancient skeleton
if ($enemy =='Ancient Skeleton') {
        $KLname = 'KLancientskeleton';
        $killXP = 80;
        $currencyadd = rand(10, 50);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ 5 Bone </span> ';
            // $results = $link->query("UPDATE $user SET bone = bone + 5");
            updateStats($link, $username, [ 'bone' => $row['bone'] + 5]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Bone Necklace </span> ';
            // $results = $link->query("UPDATE $user SET bonenecklace = bonenecklace + 1");
            updateStats($link, $username, [ 'bonenecklace' => $row['bonenecklace'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $qty = rand(2, 3);
            $bonus = '<span>+ '.$qty.' Red Potion </span> ';
            // $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
            updateStats($link, $username, [ 'redpotion' => $row['redpotion'] + $qty]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Iron Gauntlets </span> ';
            // $results = $link->query("UPDATE $user SET irongauntlets = irongauntlets + 1");
            updateStats($link, $username, [ 'irongauntlets' => $row['irongauntlets'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Victoria the Dead
if ($enemy =='Victoria the Dead') {
        $KLname = 'KLvictoria';
        $killXP = 150;
        $currencyadd = rand(20, 50);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ 10 Bone </span> ';
            // $results = $link->query("UPDATE $user SET bone = bone + 10");
            updateStats($link, $username, [ 'bone' => $row['bone'] + 10]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Victoria\'s Hood </span> ';
            // $results = $link->query("UPDATE $user SET victoriashood = victoriashood + 1");
            updateStats($link, $username, [ 'victoriashood' => $row['victoriashood'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Ring of Magic II </span> ';
            // $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
            updateStats($link, $username, [ 'ringofmagicII' => $row['ringofmagicII'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Ring of Mana Regen </span> ';
            // $results = $link->query("UPDATE $user SET ringofmanaregen = ringofmanaregen + 1");
            updateStats($link, $username, [ 'ringofmanaregen' => $row['ringofmanaregen'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Omar the Dead
if ($enemy =='Omar the Dead') {
        $KLname = 'KLomar';
        $killXP = 150;
        $currencyadd = rand(20, 50);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ 10 Bone </span> ';
            // $results = $link->query("UPDATE $user SET bone = bone + 10");
            updateStats($link, $username, [ 'bone' => $row['bone'] + 10]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Bone Cudgel </span> ';
            // $results = $link->query("UPDATE $user SET bonecudgel = bonecudgel + 1");
            updateStats($link, $username, [ 'bonecudgel' => $row['bonecudgel'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Polearm </span> ';
            // $results = $link->query("UPDATE $user SET polearm = polearm + 1");
            updateStats($link, $username, [ 'polearm' => $row['polearm'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Ring of Health Regen </span> ';
            // $results = $link->query("UPDATE $user SET ringofhealthregen = ringofhealthregen + 1");
            updateStats($link, $username, [ 'ringofhealthregen' => $row['ringofhealthregen'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}















// --------------------------------------------------------------  Wolf
if ($enemy =='Wolf') {
        $KLname = 'KLwolf';
        $killXP = 15;
        $currencyadd = rand(5, 10);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $qty = rand(5, 10);
            $bonus = '<span>+ '.$qty.' Redberry </span> ';
            // $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
            updateStats($link, $username, [ 'redberry' => $row['redberry'] + $qty]); // -- update stat
        }
        if ($rand==2) {
            $bonus = '<span>+ Leather </span> ';
            // $results = $link->query("UPDATE $user SET leather = leather + 1");
            updateStats($link, $username, [ 'leather' => $row['leather'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ 3 Red Potion </span> ';
            // $results = $link->query("UPDATE $user SET redpotion = redpotion + 3");
            updateStats($link, $username, [ 'redpotion' => $row['redpotion'] + 3]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ 3 Blue Potion </span> ';
            // $results = $link->query("UPDATE $user SET bluepotion = bluepotion + 3");
            updateStats($link, $username, [ 'bluepotion' => $row['bluepotion'] + 3]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Coyote
if ($enemy =='Coyote') {
        $KLname = 'KLcoyote';
        $killXP = 20;
        $currencyadd = rand(5, 15);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $qty = rand(5, 10);
            $bonus = '<span>+ '.$qty.' Blueberry </span> ';
            // $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
            updateStats($link, $username, [ 'blueberry' => $row['blueberry'] + $qty]); // -- update stat
        }
        if ($rand==2) {
            $bonus = '<span>+ Leather </span> ';
            // $results = $link->query("UPDATE $user SET leather = leather + 1");
            updateStats($link, $username, [ 'leather' => $row['leather'] + 1]); // -- update stat
        }
        if ($rand == 3) { // 25%
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Red Hood ';
                // $results = $link->query("UPDATE $user SET redhood = redhood + 1");
                updateStats($link, $username, [ 'redhood' => $row['redhood'] + 1]); // -- update stat
                
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Gray Hood ';
                // $results = $link->query("UPDATE $user SET grayhood = grayhood + 1");
                updateStats($link, $username, [ 'grayhood' => $row['grayhood'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Blue Hood ';
                // $results = $link->query("UPDATE $user SET bluehood = bluehood + 1");
                updateStats($link, $username, [ 'bluehood' => $row['bluehood'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Leather Hood ';
                // $results = $link->query("UPDATE $user SET leatherhood = leatherhood + 1");
                updateStats($link, $username, [ 'leatherhood' => $row['leatherhood'] + 1]); // -- update stat
            }
        }
        if ($rand==4) {
            $bonus = '<span>+ Coyote Ring </span> ';
            // $results = $link->query("UPDATE $user SET coyotering = coyotering + 1");
            updateStats($link, $username, [ 'coyotering' => $row['coyotering'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Buck
if ($enemy =='Buck') {        
        $KLname= 'KLbuck';
        $killXP = 25;
        $currencyadd = rand(10, 20);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $qty=rand(10, 20);
            $bonus = '<span>+ '.$qty.' Arrows </span> ';
            // $results = $link->query("UPDATE $user SET arrows = arrows + $qty");
            updateStats($link, $username, [ 'arrows' => $row['arrows'] + $qty]); // -- update stat
        }
        if ($rand==2) {
            $bonus = '<span>+ Meatball </span> ';
            // $results = $link->query("UPDATE $user SET meatball = meatball + 1");
            updateStats($link, $username, [ 'meatball' => $row['meatball'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $qty = rand(1, 2);
            $bonus = '<span>+ '.$qty.' Raw Meat </span> ';
            // $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $qty");
            updateStats($link, $username, [ 'rawmeat' => $row['rawmeat'] + $qty]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Leather Armor </span> ';
            // $results = $link->query("UPDATE $user SET leatherarmor = leatherarmor + 1");
            updateStats($link, $username, [ 'leatherarmor' => $row['leatherarmor'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Bear
if ($enemy =='Bear') {
        $KLname = 'KLbear';
        $killXP = 30;
        $currencyadd = rand(30, 50);

        $rand=rand(1, 4);
        $KLname= 'KLbear';
        if ($rand==1) { // 25%
            $qty=rand(5, 15);
            $bonus = '<span>+ '.$qty.' Bolts </span> ';
            // $results = $link->query("UPDATE $user SET bolts = bolts + $qty");
            updateStats($link, $username, [ 'bolts' => $row['bolts'] + $qty]); // -- update stat
        }
        if ($rand==2) {
            $bonus = '<span>+ Ring of Strength II </span> ';
            // $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
            updateStats($link, $username, [ 'ringofstrengthII' => $row['ringofstrengthII'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $qty = rand(2, 4);
            $bonus = '<span>+ '.$qty.' Raw Meat </span> ';
            // $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $qty");
            updateStats($link, $username, [ 'rawmeat' => $row['rawmeat'] + $qty]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Ring of Health Regen </span> ';
            // $results = $link->query("UPDATE $user SET ringofhealthregen = ringofhealthregen + 1");
            updateStats($link, $username, [ 'ringofhealthregen' => $row['ringofhealthregen'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Stag
if ($enemy =='Stag') {
        $KLname = 'KLstag';
        $killXP = 30;
        $currencyadd = rand(20, 40);

        $rand=rand(1, 4);
        $KLname= 'KLstag';
        if ($rand==1) { // 25%
            $qty=rand(2, 4);
            $bonus = '<span>+ '.$qty.' Javelins </span> ';
            // $results = $link->query("UPDATE $user SET javelin = javelin + $qty");
            updateStats($link, $username, [ 'javelin' => $row['javelin'] + $qty]); // -- update stat
        }
        if ($rand==2) {
            $bonus = '<span>+ Gray Hood </span> ';
            // $results = $link->query("UPDATE $user SET grayhood = grayhood + 1");
            updateStats($link, $username, [ 'grayhood' => $row['grayhood'] + 1]); // -- update stat
        }
        if ($rand==3) {
            $bonus = '<span>+ 2 Leather </span> ';
            // $results = $link->query("UPDATE $user SET leather = leather + 2");
            updateStats($link, $username, [ 'leather' => $row['leather'] + 2]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Ring of Mana Regen </span> ';
            // $results = $link->query("UPDATE $user SET ringofmanaregen = ringofmanaregen + 1");
            updateStats($link, $username, [ 'ringofmanaregen' => $row['ringofmanaregen'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Bigfoot
if ($enemy =='Bigfoot') {
        $KLname = 'KLbigfoot';
        $killXP = 100;
        $currencyadd = rand(200, 300);

        $rand=rand(1, 4);
        $KLname= 'KLbigfoot';
        $bonusalways = '+ Big Foot </span> ';
        // $results = $link->query("UPDATE $user SET bigfoot = bigfoot + 1");
        if ($rand==1) { // 25%
            $qty=rand(1, 3);
            $bonus = '<span>+ '.$qty.' Iron </span> ';
            // $results = $link->query("UPDATE $user SET iron = iron + $qty");
            updateStats($link, $username, [ 'iron' => $row['iron'] + $qty]); // -- update stat
        }
        if ($rand==2) {
            $bonus = '<span>+ Giant Club </span> ';
            // $results = $link->query("UPDATE $user SET giantclub = giantclub + 1");
            updateStats($link, $username, [ 'giantclub' => $row['giantclub'] + 1]); // -- update stat
        }
        if ($rand==3) {
            $bonus = '<span>+ Bigfoot Boots </span> ';
            // $results = $link->query("UPDATE $user SET bigfootboots = bigfootboots + 1");
            updateStats($link, $username, [ 'bigfootboots' => $row['bigfootboots'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Hunter Bow </span> ';
            // $results = $link->query("UPDATE $user SET hunterbow = hunterbow + 1");
            updateStats($link, $username, [ 'hunterbow' => $row['hunterbow'] + 1]); // -- update stat
        }
/*        //echo 
$message="$start 
+ $exp xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonusalways$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Hawk
if ($enemy =='Hawk') {
        $KLname = 'KLhawk';
        $killXP = 50;
        $currencyadd = rand(50, 70);

        $rand=rand(1, 4);
        $KLname= 'KLhawk';
        if ($rand == 1) { // 25%
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength III ';
                // $results = $link->query("UPDATE $user SET ringofstrengthIII = ringofstrengthIII + 1");
                updateStats($link, $username, [ 'ringofstrengthIII' => $row['ringofstrengthIII'] + 1]); // -- update stat
                
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity III ';
                // $results = $link->query("UPDATE $user SET ringofdexterityIII = ringofdexterityIII + 1");
                updateStats($link, $username, [ 'ringofdexterityIII' => $row['ringofdexterityIII'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic III ';
                // $results = $link->query("UPDATE $user SET ringofmagicIII = ringofmagicIII + 1");
                updateStats($link, $username, [ 'ringofmagicIII' => $row['ringofmagicIII'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense III ';
                // $results = $link->query("UPDATE $user SET ringofdefenseIII = ringofdefenseIII + 1");
                updateStats($link, $username, [ 'ringofdefenseIII' => $row['ringofdefenseIII'] + 1]); // -- update stat
            }
        }
        if ($rand==2) {
            $qty=rand(5, 15);
            $bonus = '<span>+ '.$qty.' Javelins | Ring of Dexterity X </span> ';
            // $results = $link->query("UPDATE $user SET javelin = javelin + $qty");
            updateStats($link, $username, [ 'ringofdexterityX' => $row['ringofdexterityX'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Iron Hatchet </span> ';
            // $results = $link->query("UPDATE $user SET ironhatchet = ironhatchet + 1");
            updateStats($link, $username, [ 'ironhatchet' => $row['ironhatchet'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $qty = rand(50, 100);
            $bonus = '<span>+ '.$qty.' Bolts </span> ';
            // $results = $link->query("UPDATE $user SET bolts = bolts + $qty");
            updateStats($link, $username, [ 'bolts' => $row['bolts'] + $qty]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Rabid Skeever
if ($enemy =='Rabid Skeever') {
        $KLname = 'KLrabidskeever';
        $killXP = 100;
        $currencyadd = rand(1, 100);

        $rand=rand(1, 4);
        $KLname= 'KLrabidskeever';
        if ($rand==1) { // 25%
            $qty=rand(10, 20);
            $bonus = '<span>+ '.$qty.' Redberry </span> ';
            // $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
            updateStats($link, $username, [ 'redberry' => $row['redberry'] + $qty]); // -- update stat
        }
        if ($rand==2) { // 25%
            $qty=rand(1, 2);
            $bonus = '<span>+ '.$qty.' Meatball </span> ';
            // $results = $link->query("UPDATE $user SET meatball = meatball + $qty");
            updateStats($link, $username, [ 'meatball' => $row['meatball'] + $qty]); // -- update stat
        }
        if ($rand==3) { // 25%
            $qty=rand(2, 4);
            $bonus = '<span>+ '.$qty.' Javelin </span> ';
            // $results = $link->query("UPDATE $user SET javelin = javelin + $qty");
            updateStats($link, $username, [ 'javelin' => $row['javelin'] + $qty]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Rabid Ring </span> ';
            // $results = $link->query("UPDATE $user SET rabidring = rabidring + 1");
            updateStats($link, $username, [ 'rabidring' => $row['rabidring'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Bleeding Dartwing
if ($enemy =='Bleeding Dartwing') {
        $KLname = 'KLbleedingdartwing';
        $killXP = 150;
        $currencyadd = rand(1, 200);

        $rand=rand(1, 4);
        $KLname= 'KLbleedingdartwing';
        if ($rand==1) { // 25%
            $qty=rand(10, 20);
            $bonus = '<span>+ '.$qty.' Redberry </span> ';
            // $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
            updateStats($link, $username, [ 'redberry' => $row['redberry'] + $qty]); // -- update stat
        }
        if ($rand==2) { // 25%
            $qty=rand(10, 20);
            $bonus = '<span>+ '.$qty.' Blueberry </span> ';
            // $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
            updateStats($link, $username, [ 'blueberry' => $row['blueberry'] + $qty]); // -- update stat
        }
        if ($rand==3) { // 25%
            $qty=rand(10, 20);
            $bonus = '<span>+ '.$qty.' Arrows </span> ';
            // $results = $link->query("UPDATE $user SET arrows = arrows + $qty");
            updateStats($link, $username, [ 'arrows' => $row['arrows'] + $qty]); // -- update stat
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength II ';
                // $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
                updateStats($link, $username, [ 'ringofstrengthII' => $row['ringofstrengthII'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity II ';
                // $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
                updateStats($link, $username, [ 'ringofdexterityII' => $row['ringofdexterityII'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic II ';
                // $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
                updateStats($link, $username, [ 'ringofmagicII' => $row['ringofmagicII'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense II ';
                // $results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1");
                updateStats($link, $username, [ 'ringofdefenseII' => $row['ringofdefenseII'] + 1]); // -- update stat
            }
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Mongolian Death Worm
if ($enemy =='Mongolian Death Worm') {
        $KLname = 'KLmongoliandeathworm';
        $killXP = 300;
        $currencyadd = rand(1, 300);

        $rand=rand(1, 4);
        $KLname= 'KLmongoliandeathworm';
        if ($rand==1) { // 25%
            $bonus = '<span>+ Poison Saber </span> ';
            // $results = $link->query("UPDATE $user SET poisonsaber = poisonsaber + 1");
            updateStats($link, $username, [ 'poisonsaber' => $row['poisonsaber'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $qty=rand(3, 6);
            $bonus = '<span>+ '.$qty.' Purple Potion </span> ';
            // $results = $link->query("UPDATE $user SET purplepotion = purplepotion + $qty");
            updateStats($link, $username, [ 'purplepotion' => $row['purplepotion'] + $qty]); // -- update stat
        }
        if ($rand==3) { // 25%
            $qty=rand(1, 2);
            $bonus = '<span>+ '.$qty.' Red Balm </span> ';
            // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
            updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Death Orb </span> ';
            // $results = $link->query("UPDATE $user SET deathorb = deathorb + 1");
            updateStats($link, $username, [ 'deathorb' => $row['deathorb'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Demon Wing
if ($enemy =='Demon Wing') {
        $KLname = 'KLdemonwing';
        $killXP = 150;
        $currencyadd = rand(50, 100);

        $rand=rand(1, 4);
        $KLname= 'KLdemonwing';
        if ($rand==1) { // 25%
            $qty=rand(2, 3);
            $bonus = '<span>+ '.$qty.' Purple Potion </span> ';
            // $results = $link->query("UPDATE $user SET purplepotion = purplepotion + $qty");
            updateStats($link, $username, [ 'purplepotion' => $row['purplepotion'] + $qty]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ 4 Bat Wing </span> ';
            // $results = $link->query("UPDATE $user SET batwing = batwing + 4");
            updateStats($link, $username, [ 'batwing' => $row['batwing'] + 4]); // -- update stat
        }
        if ($rand==3) { // 25%
            $qty=rand(10, 20);
            $bonus = '<span>+ '.$qty.' Blueberry </span> ';
            // $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
            updateStats($link, $username, [ 'blueberry' => $row['blueberry'] + $qty]); // -- update stat
        }
        if ($rand == 4) {
            $rand2 = rand(1, 2);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Health Regen ';
                // $results = $link->query("UPDATE $user SET ringofhealthregen = ringofhealthregen + 1");
                updateStats($link, $username, [ 'ringofhealthregen' => $row['ringofhealthregen'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Mana Regen ';
                // $results = $link->query("UPDATE $user SET ringofmanaregen = ringofmanaregen + 1");
                updateStats($link, $username, [ 'ringofmanaregen' => $row['ringofmanaregen'] + 1]); // -- update stat
            }
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Possessed Axeman
if ($enemy =='Possessed Axeman') {
        $KLname = 'KLpossessedaxeman';
        $killXP = 400;
        $currencyadd = rand(50, 100);

        $rand=rand(1, 4);
        $KLname= 'KLpossessedaxeman';
        if ($rand==1) { // 25%
            $bonus = '<span>+ Great Axe </span> ';
            // $results = $link->query("UPDATE $user SET greataxe = greataxe + 1");
            updateStats($link, $username, [ 'greataxe' => $row['greataxe'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Red Wizard Ring </span> ';
            // $results = $link->query("UPDATE $user SET redwizardring = redwizardring + 1");
            updateStats($link, $username, [ 'redwizardring' => $row['redwizardring'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $qty=rand(1, 2);
            $bonus = '<span>+ '.$qty.' Iron Hatchet </span> ';
            // $results = $link->query("UPDATE $user SET ironhatchet = ironhatchet + $qty");
            updateStats($link, $username, [ 'ironhatchet' => $row['ironhatchet'] + $qty]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Haunted Helm </span> ';
            // $results = $link->query("UPDATE $user SET hauntedhelm = hauntedhelm + 1");
            updateStats($link, $username, [ 'hauntedhelm' => $row['hauntedhelm'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Red Bandit
if ($enemy =='Red Bandit') {
        $KLname = 'KLredbandit';
        $killXP = 120;
        $currencyadd = rand(60, 120);

        $rand=rand(1, 4);
        $KLname= 'KLredbandit';
        if ($rand==1) { // 25%
            $bonus = '<span>+ Iron Dagger </span> ';
            // $results = $link->query("UPDATE $user SET irondagger = irondagger + 1");
            updateStats($link, $username, [ 'irondagger' => $row['irondagger'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Iron Bow </span> ';
            // $results = $link->query("UPDATE $user SET ironbow = ironbow + 1");
            updateStats($link, $username, [ 'ironbow' => $row['ironbow'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Bandit Boots </span> ';
            // $results = $link->query("UPDATE $user SET banditboots = banditboots + 1");
            updateStats($link, $username, [ 'banditboots' => $row['banditboots'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Steel Dagger </span> ';
            // $results = $link->query("UPDATE $user SET steeldagger = steeldagger + 1");
            updateStats($link, $username, [ 'steeldagger' => $row['steeldagger'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Bandit Marauder
if ($enemy =='Bandit Marauder') {
        $KLname = 'KLbanditmarauder';
        $killXP = 180;
        $currencyadd = rand(60, 120);

        $rand=rand(1, 4);
        $KLname= 'KLbanditmarauder';
        if ($rand==1) { // 25%
            $bonus = '<span>+ Stone Necklace </span> ';
            // $results = $link->query("UPDATE $user SET stonenecklace = stonenecklace + 1");
            updateStats($link, $username, [ 'stonenecklace' => $row['stonenecklace'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Iron Crossbow </span> ';
            // $results = $link->query("UPDATE $user SET ironcrossbow = ironcrossbow + 1");
            updateStats($link, $username, [ 'ironcrossbow' => $row['ironcrossbow'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Bandit Gloves </span> ';
            // $results = $link->query("UPDATE $user SET banditgloves = banditgloves + 1");
            updateStats($link, $username, [ 'banditgloves' => $row['banditgloves'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $qty = rand(10, 20);
            $bonus = '<span>+ '.$qty.' Bolts </span> ';
            // $results = $link->query("UPDATE $user SET bolts = bolts + $qty");
            updateStats($link, $username, [ 'bolts' => $row['bolts'] + $qty]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Butcher
if ($enemy =='Butcher') {
        $KLname = 'KLbutcher';
        $killXP = 250;
        $currencyadd = rand(60, 120);

        $rand=rand(1, 4);
        $KLname= 'KLbutcher';
        if ($rand==1) { // 25%
            $bonus = '<span>+ Iron Maul </span> ';
            // $results = $link->query("UPDATE $user SET ironmaul = ironmaul + 1");
            updateStats($link, $username, [ 'ironmaul' => $row['ironmaul'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $qty=rand(3, 6);
            $bonus = '<span>+ '.$qty.' Meatball </span> ';
            // $results = $link->query("UPDATE $user SET meatball = meatball + $qty");
            updateStats($link, $username, [ 'meatball' => $row['meatball'] + $qty]); // -- update stat
        }
        if ($rand==3) { // 25%
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength II ';
                // $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
                updateStats($link, $username, [ 'ringofstrengthII' => $row['ringofstrengthII'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity II ';
                // $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
                updateStats($link, $username, [ 'ringofdexterityII' => $row['ringofdexterityII'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic II ';
                // $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
                updateStats($link, $username, [ 'ringofmagicII' => $row['ringofmagicII'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense II ';
                // $results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1");
                updateStats($link, $username, [ 'ringofdefenseII' => $row['ringofdefenseII'] + 1]); // -- update stat
            }
        }
        if ($rand == 4) {
            $qty = rand(1, 2);
            $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
            // $results = $link->query("UPDATE $user SET bluebalm = bluebalm + $qty");
            updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Red Beard
if ($enemy =='Red Beard') {
        $KLname = 'KLredbeard';
        $killXP = 400;
        $currencyadd = rand(60, 120);

        $rand=rand(1, 4);
        $KLname= 'KLredbeard';
        if ($rand==1) { // 25%
            $bonus = '<span>+ Great Axe </span> ';
            // $results = $link->query("UPDATE $user SET greataxe = greataxe + 1");
            updateStats($link, $username, [ 'greataxe' => $row['greataxe'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Yellow Wizard Ring </span> ';
            // $results = $link->query("UPDATE $user SET yellowwizardring = yellowwizardring + 1");
            updateStats($link, $username, [ 'yellowwizardring' => $row['yellowwizardring'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $qty = rand(1, 2);
            $bonus = '<span>+ '.$qty.' Red Balm </span> ';
            // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
            updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Red Shield </span> ';
            // $results = $link->query("UPDATE $user SET redshield = redshield + 1");
            updateStats($link, $username, [ 'redshield' => $row['redshield'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}








    




// -------------------------------------------------------------------------------------- OCEAN


// --------------------------------------------------------------  Jellyfish
if ($enemy =='Jellyfish') {
        $KLname = 'KLjellyfish';
        $killXP = 50;
        $currencyadd = rand(1, 100);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $qty=rand(5, 15);
            $bonus = '<span>+ '.$qty.' Redberry </span> ';
            // $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
            updateStats($link, $username, [ 'redberry' => $row['redberry'] + $qty]); // -- update stat
        }
        if ($rand==2) { // 25%
            $qty = rand(5, 15);
            $bonus = '<span>+ '.$qty.' Blueberry </span> ';
            // $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
            updateStats($link, $username, [ 'blueberry' => $row['blueberry'] + $qty]); // -- update stat
        }
        if ($rand==3) { // 25%
            $qty=rand(2, 3);
            $bonus = '<span>+ '.$qty.' Red Potion </span> ';
            // $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
            updateStats($link, $username, [ 'redpotion' => $row['redpotion'] + $qty]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Gills Potion </span> ';
            // $results = $link->query("UPDATE $user SET gillspotion = gillspotion + 1");
            updateStats($link, $username, [ 'gillspotion' => $row['gillspotion'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Electric Eel
if ($enemy =='Electric Eel') {
        $KLname = 'KLelectriceel';
        $killXP = 60;
        $currencyadd = rand(1, 100);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $qty=rand(2, 3);
            $bonus = '<span>+ '.$qty.' Daggers </span> ';
            // $results = $link->query("UPDATE $user SET dagger = dagger + $qty");
            updateStats($link, $username, [ 'dagger' => $row['dagger'] + $qty]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Ring of Mana Regen </span> ';
            // $results = $link->query("UPDATE $user SET ringofmanaregen = ringofmanaregen + 1");
            updateStats($link, $username, [ 'ringofmanaregen' => $row['ringofmanaregen'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Blues </span> ';
            // $results = $link->query("UPDATE $user SET blues = blues + 1");
            updateStats($link, $username, [ 'blues' => $row['blues'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Gills Potion </span> ';
            // $results = $link->query("UPDATE $user SET gillspotion = gillspotion + 1");
            updateStats($link, $username, [ 'gillspotion' => $row['gillspotion'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Piranha
if ($enemy =='Piranha') {
        $KLname = 'KLpiranha';
        $killXP = 70;
        $currencyadd = rand(1, 100);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $qty=rand(5, 15);
            $bonus = '<span>+ '.$qty.' Arrows </span> ';
            // $results = $link->query("UPDATE $user SET arrows = arrows + $qty");
            updateStats($link, $username, [ 'arrows' => $row['arrows'] + $qty]); // -- update stat
        }
        if ($rand==2) { // 25%
            $qty = rand(5, 15);
            $bonus = '<span>+ '.$qty.' Bolts </span> ';
            // $results = $link->query("UPDATE $user SET bolts = bolts + $qty");
            updateStats($link, $username, [ 'bolts' => $row['bolts'] + $qty]); // -- update stat
        }
        if ($rand==3) { // 25%
            $qty=rand(1, 2);
            $bonus = '<span>+ '.$qty.' Bluefish </span> ';
            // $results = $link->query("UPDATE $user SET bluefish = bluefish + $qty");
            updateStats($link, $username, [ 'bluefish' => $row['bluefish'] + $qty]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Blue Balm </span> ';
            // $results = $link->query("UPDATE $user SET bluebalm = bluebalm + 1");
            updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Barracuda
if ($enemy =='Barracuda') {
        $KLname = 'KLbarracuda';
        $killXP = 80;
        $currencyadd = rand(1, 100);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $qty=rand(5, 15);
            $bonus = '<span>+ '.$qty.' Raw Meat </span> ';
            // $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $qty");
            updateStats($link, $username, [ 'rawmeat' => $row['rawmeat'] + $qty]); // -- update stat
        }
        if ($rand==2) { // 25%
            $qty=rand(2, 3);
            $bonus = '<span>+ '.$qty.' Bluefish </span> ';
            // $results = $link->query("UPDATE $user SET bluefish = bluefish + $qty");
            updateStats($link, $username, [ 'bluefish' => $row['bluefish'] + $qty]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Ring of Defense III </span> ';
            // $results = $link->query("UPDATE $user SET ringofdefenseIII = ringofdefenseIII + 1");
            updateStats($link, $username, [ 'ringofdefenseIII' => $row['ringofdefenseIII'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Iron Hood </span> ';
            // $results = $link->query("UPDATE $user SET ironhood = ironhood + 1");
            updateStats($link, $username, [ 'ironhood' => $row['ironhood'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Squid
if ($enemy =='Squid') {
        $KLname = 'KLsquid';
        $killXP = 100;
        $currencyadd = rand(1, 100);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $qty=rand(2, 3);
            $bonus = '<span>+ '.$qty.' Meatball </span> ';
            // $results = $link->query("UPDATE $user SET meatball = meatball + $qty");
            updateStats($link, $username, [ 'meatball' => $row['meatball'] + $qty]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Harpoon </span> ';
            // $results = $link->query("UPDATE $user SET harpoon = harpoon + 1");
            updateStats($link, $username, [ 'harpoon' => $row['harpoon'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Ring of Strength II </span> ';
            // $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
            updateStats($link, $username, [ 'ringofstrengthII' => $row['ringofstrengthII'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Iron Dagger </span> ';
            // $results = $link->query("UPDATE $user SET irondagger = irondagger + 1");
            updateStats($link, $username, [ 'irondagger' => $row['irondagger'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Albatross
if ($enemy =='Albatross') {
        $KLname = 'KLalbatross';
        $killXP = 100;
        $currencyadd = rand(100, 200);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ 3 Blues </span> ';
            // $results = $link->query("UPDATE $user SET blues = blues + 3");
            updateStats($link, $username, [ 'blues' => $row['blues'] + 3]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ 3 Greens </span> ';
            // $results = $link->query("UPDATE $user SET greens = greens + 3");
            updateStats($link, $username, [ 'greens' => $row['greens'] + 3]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Iron Boomerang </span> ';
            // $results = $link->query("UPDATE $user SET ironboomerang = ironboomerang + 1");
            updateStats($link, $username, [ 'ironboomerang' => $row['ironboomerang'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Iron Boomerang </span> ';
            // $results = $link->query("UPDATE $user SET ironboomerang = ironboomerang + 1");
            updateStats($link, $username, [ 'ironboomerang' => $row['ironboomerang'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Crocodile
if ($enemy =='Crocodile') {
        $KLname = 'KLcrocodile';
        $killXP = 300;
        $currencyadd = rand(1, 400);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $qty=rand(5, 15);
            $bonus = '<span>+ '.$qty.' Leather </span> ';
            // $results = $link->query("UPDATE $user SET leather = leather + $qty");
            updateStats($link, $username, [ 'leather' => $row['leather'] + $qty]); // -- update stat
        }
        if ($rand==2) { // 25%
            $qty=rand(5, 15);
            $bonus = '<span>+ '.$qty.' Red Potions </span> ';
            // $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
            updateStats($link, $username, [ 'redpotion' => $row['redpotion'] + $qty]); // -- update stat
        }
        if ($rand==3) { // 25%
            $qty=rand(2, 4);
            $bonus = '<span>+ '.$qty.' Bluefish </span> ';
            // $results = $link->query("UPDATE $user SET bluefish = bluefish + $qty");
            updateStats($link, $username, [ 'bluefish' => $row['bluefish'] + $qty]); // -- update stat
        }
        if ($rand==4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength III ';
                // $results = $link->query("UPDATE $user SET ringofstrengthIII = ringofstrengthIII + 1");
                updateStats($link, $username, [ 'ringofstrengthIII' => $row['ringofstrengthIII'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity III ';
                // $results = $link->query("UPDATE $user SET ringofdexterityIII = ringofdexterityIII + 1");
                updateStats($link, $username, [ 'ringofdexterityIII' => $row['ringofdexterityIII'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic III ';
                // $results = $link->query("UPDATE $user SET ringofmagicIII = ringofmagicIII + 1");
                updateStats($link, $username, [ 'ringofmagicIII' => $row['ringofmagicIII'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense III ';
                // $results = $link->query("UPDATE $user SET ringofdefenseIII = ringofdefenseIII + 1");
                updateStats($link, $username, [ 'ringofdefenseIII' => $row['ringofdefenseIII'] + 1]); // -- update stat
            }
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  King Squid
if ($enemy =='King Squid') {
        $KLname = 'KLkingsquid';
        $killXP = 600;
        $currencyadd = rand(1, 600);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Ring of Dexterity VII </span> ';
            // $results = $link->query("UPDATE $user SET ringofdexterityVII = ringofdexterityVII + 1");
            updateStats($link, $username, [ 'ringofdexterityVII' => $row['ringofdexterityVII'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
        if ($squidtooth>=1) { // 25%
            $bonus = '<span>+ Boomerang </span> ';
            // $results = $link->query("UPDATE $user SET boomerang = boomerang + 1");
            updateStats($link, $username, [ 'boomerang' => $row['boomerang'] + 1]); // -- update stat
        } else {
            $bonus = '<span>+ Squid Tooth [ARTIFACT] </span> ';
            // $results = $link->query("UPDATE $user SET squidtooth = squidtooth + 1");
            updateStats($link, $username, [ 'squidtooth' => $row['squidtooth'] + 1]); // -- update stat
        }
        }
        if ($rand==3) { // 25%
            $qty=rand(2, 4);
            $bonus = '<span>+ '.$qty.' Bluefish </span> ';
            // $results = $link->query("UPDATE $user SET bluefish = bluefish + $qty");
            updateStats($link, $username, [ 'bluefish' => $row['bluefish'] + $qty]); // -- update stat
        }
        if ($rand==4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength III ';
                // $results = $link->query("UPDATE $user SET ringofstrengthIII = ringofstrengthIII + 1");
                updateStats($link, $username, [ 'ringofstrengthIII' => $row['ringofstrengthIII'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity III ';
                // $results = $link->query("UPDATE $user SET ringofdexterityIII = ringofdexterityIII + 1");
                updateStats($link, $username, [ 'ringofdexterityIII' => $row['ringofdexterityIII'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic III ';
                // $results = $link->query("UPDATE $user SET ringofmagicIII = ringofmagicIII + 1");
                updateStats($link, $username, [ 'ringofmagicIII' => $row['ringofmagicIII'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense III ';
                // $results = $link->query("UPDATE $user SET ringofdefenseIII = ringofdefenseIII + 1");
                updateStats($link, $username, [ 'ringofdefenseIII' => $row['ringofdefenseIII'] + 1]); // -- update stat
            }
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Mud Crab
if ($enemy =='Mud Crab') {
        $KLname = 'KLmudcrab';
        $killXP = 20;
        $currencyadd = rand(1, 10);

        $randmud = rand(2, 10);
        $bonusalways = '<span>+ '.$randmud.' Mud </span> ';
        // $results = $link->query("UPDATE $user SET mud = mud + $randmud");
        updateStats($link, $username, [ 'mud' => $row['mud'] + $randmud]); // -- update stat

        $rand=rand(1, 8);				// rand bonus
        if ($rand == 1) {
            $qty = rand(2, 3);
            $bonus = '<span>+ '.$qty.' Raw Meat </span> ';
            // $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $qty");
            updateStats($link, $username, [ 'rawmeat' => $row['rawmeat'] + $qty]); // -- update stat
        }
        if ($rand == 2) {
            $qty = rand(2, 3);
            $bonus = '<span>+ '.$qty.' Red Potions </span> ';
            // $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $qty");
            updateStats($link, $username, [ 'redpotion' => $row['redpotion'] + $qty]); // -- update stat
        }
        if ($rand == 3) {
            $qty = rand(2, 3);
            $bonus = '<span>+ '.$qty.' Daggers </span> ';
            // $results = $link->query("UPDATE $user SET dagger = dagger + $qty");
            updateStats($link, $username, [ 'dagger' => $row['dagger'] + $qty]); // -- update stat
        }
        if ($rand == 4) {
            $qty = rand(2, 5);
            $bonus = '<span>+ '.$qty.' Sand </span> ';
            // $results = $link->query("UPDATE $user SET sand = sand + $qty");
            updateStats($link, $username, [ 'sand' => $row['sand'] + $qty]); // -- update stat
        }
        if ($rand == 5) {
            $qty = rand(2, 5);
            $bonus = '<span>+ '.$qty.' Water </span> ';
            // $results = $link->query("UPDATE $user SET water = water + $qty");
            updateStats($link, $username, [ 'water' => $row['water'] + $qty]); // -- update stat
        }
        if ($rand == 6) {
            $bonus = '<span>+ Coal </span> ';
            // $results = $link->query("UPDATE $user SET coal = coal + 1");
            updateStats($link, $username, [ 'coal' => $row['coal'] + 1]); // -- update stat
        }
        if ($rand == 7) {
            $bonus = '<span>+ Iron </span> ';
            // $results = $link->query("UPDATE $user SET iron = iron + 1");
            updateStats($link, $username, [ 'iron' => $row['iron'] + 1]); // -- update stat
        }
        if ($rand == 8) {
            $bonus = '<span>+ Reds </span> ';
            // $results = $link->query("UPDATE $user SET reds = reds + 1");
            updateStats($link, $username, [ 'reds' => $row['reds'] + 1]); // -- update stat
        }
/*        //echo 
$message="$start 
+ $exp xp 
+ $currencyadd ".$_SESSION['currency']." 
  $bonusalways
  $bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}




// --------------------------------------------------------------  Giant Sea Turtle
if ($enemy =='Giant Sea Turtle') {
        $KLname = 'KLgiantseaturtle';
        $killXP = 110;
        $currencyadd = rand(1, 100);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $qty=rand(200, 500);
            $bonus = '<span>+ '.$qty.' BONUS '.$_SESSION['currency'].' </span> ';
            // $results = $link->query("UPDATE $user SET currency = currency + $qty");
            updateStats($link, $username, [ 'currency' => $row['currency'] + $qty]); // -- update stat
        }
        if ($rand==2) { // 25%
            $qty=rand(5, 15);
            $bonus = '<span>+ '.$qty.' Sand </span> ';
            // $results = $link->query("UPDATE $user SET sand = sand + $qty");
            updateStats($link, $username, [ 'sand' => $row['sand'] + $qty]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Wings Potion </span> ';
            // $results = $link->query("UPDATE $user SET wingspotion = wingspotion + 1");
            updateStats($link, $username, [ 'wingspotion' => $row['wingspotion'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Turtle Shell </span> ';
            // $results = $link->query("UPDATE $user SET turtleshell = turtleshell + 1");
            updateStats($link, $username, [ 'turtleshell' => $row['turtleshell'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Colossal Squid
if ($enemy =='Colossal Squid') {
        $KLname = 'KLcolossalsquid';
        $killXP = 130;
        $currencyadd = rand(1, 100);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $qty=rand(200, 300);
            $bonus = '<span>+ '.$qty.' BONUS XP </span> ';
            // $results = $link->query("UPDATE $user SET xp = xp + $qty");
            updateStats($link, $username, [ 'xp' => $row['xp'] + $qty]); // -- update stat
        }
        if ($rand==2) { // 25%
            $qty=rand(5, 15);
            $bonus = '<span>+ '.$qty.' Raw Meat </span> ';
            // $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $qty");
            updateStats($link, $username, [ 'rawmeat' => $row['rawmeat'] + $qty]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Gills Potion </span> ';
            // $results = $link->query("UPDATE $user SET gillspotion = gillspotion + 1");
            updateStats($link, $username, [ 'gillspotion' => $row['gillspotion'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Polearm </span> ';
            // $results = $link->query("UPDATE $user SET polearm = polearm + 1");
            updateStats($link, $username, [ 'polearm' => $row['polearm'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Hammerhead
if ($enemy =='Hammerhead') {
        $KLname = 'KLhammerhead';
        $killXP = 150;
        $currencyadd = rand(20, 200);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Ring of Magic III </span> ';
            // $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
            updateStats($link, $username, [ 'ringofmagicIII' => $row['ringofmagicIII'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Ring of Magic II </span> ';
            // $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
            updateStats($link, $username, [ 'ringofmagicII' => $row['ringofmagicII'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Yellows </span> ';
            // $results = $link->query("UPDATE $user SET yellows = yellows + 1");
            updateStats($link, $username, [ 'yellows' => $row['yellows'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Steel Shield </span> ';
            // $results = $link->query("UPDATE $user SET steelshield = steelshield + 1");
            updateStats($link, $username, [ 'steelshield' => $row['steelshield'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Great White
if ($enemy =='Great White') {
        $KLname = 'KLgreatwhite';
        $killXP = 150;
        $currencyadd = rand(20, 200);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Ring of Health Regen </span> ';
            // $results = $link->query("UPDATE $user SET ringofhealthregen = ringofhealthregen + 1");
            updateStats($link, $username, [ 'ringofhealthregen' => $row['ringofhealthregen'] + 1]); // -- update stat   
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Ring of Strength II </span> ';
            // $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
            updateStats($link, $username, [ 'ringofstrengthII' => $row['ringofstrengthII'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Reds </span> ';
            // $results = $link->query("UPDATE $user SET reds = reds + 1");
            updateStats($link, $username, [ 'reds' => $row['reds'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Compound Crossbow </span> ';
            // $results = $link->query("UPDATE $user SET compoundcrossbow = compoundcrossbow + 1");
            updateStats($link, $username, [ 'compoundcrossbow' => $row['compoundcrossbow'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Kraken
if ($enemy =='Kraken') {
        $KLname = 'KLkraken';
        $killXP = 400;
        $currencyadd = rand(50, 300);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Trident </span> ';
            // $results = $link->query("UPDATE $user SET trident = trident + 1");
            updateStats($link, $username, [ 'trident' => $row['trident'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $rand2 = rand(1, 2);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Health Regen </span>';
                // $results = $link->query("UPDATE $user SET ringofhealthregen = ringofhealthregen + 1");
                updateStats($link, $username, [ 'ringofhealthregen' => $row['ringofhealthregen'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Mana Regen </span>';
                // $results = $link->query("UPDATE $user SET ringofmanaregen = ringofmanaregen + 1");
                updateStats($link, $username, [ 'ringofmanaregen' => $row['ringofmanaregen'] + 1]); // -- update stat
            }
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Enchanted Orb </span> ';
            // $results = $link->query("UPDATE $user SET enchantedorb = enchantedorb + 1");
            updateStats($link, $username, [ 'enchantedorb' => $row['enchantedorb'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Blue Pendant </span> ';
            // $results = $link->query("UPDATE $user SET bluependant = bluependant + 1");
            updateStats($link, $username, [ 'bluependant' => $row['bluependant'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Glowing Octopus
if ($enemy =='Glowing Octopus') {
        $KLname = 'KLglowingoctopus';
        $killXP = 200;
        $currencyadd = rand(50, 300);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $qty = rand(1, 2);
            $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
            // $results = $link->query("UPDATE $user SET bluebalm = bluebalm + $qty");
            updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat  
        }
        if ($rand==2) { // 25%
            $rand2 = rand(1, 2);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Health Regen ';
                // $results = $link->query("UPDATE $user SET ringofhealthregen = ringofhealthregen + 1");
                updateStats($link, $username, [ 'ringofhealthregen' => $row['ringofhealthregen'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Mana Regen ';
                // $results = $link->query("UPDATE $user SET ringofmanaregen = ringofmanaregen + 1");
                updateStats($link, $username, [ 'ringofmanaregen' => $row['ringofmanaregen'] + 1]); // -- update stat
            }
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Gray Matter </span> ';
            // $results = $link->query("UPDATE $user SET graymatter = graymatter + 1");
            updateStats($link, $username, [ 'graymatter' => $row['graymatter'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Green Wizard Ring </span> ';
            // $results = $link->query("UPDATE $user SET greenwizardring = greenwizardring + 1");
            updateStats($link, $username, [ 'greenwizardring' => $row['greenwizardring'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Thunder Barbarian
if ($enemy =='Thunder Barbarian') {
        $KLname = 'KLthunderbarbarian';
        $killXP = 400;
        $currencyadd = rand(50, 200);

        $rand=rand(1, 2);
        $bonusalways = '+ Reds </span> ';
        // $results = $link->query("UPDATE $user SET reds = reds + 1");
        updateStats($link, $username, [ 'reds' => $row['reds'] + 1]); // -- update stat
        if ($rand==1) { // 50%
            $bonus = '<span>+ Red Balm </span> ';
            // $results = $link->query("UPDATE $user SET redbalm = redbalm + 1");
            updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + 1]); // -- update stat
        }
        if ($rand==2) { // 50%
            $qty=rand(5, 10);
            $bonus = '<span>+ '.$qty.' Red Potions </span> ';
            // $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
            updateStats($link, $username, [ 'redpotion' => $row['redpotion'] + $qty]); // -- update stat
        }
/*        //echo 
$message="$start 
+ $exp xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonusalways$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Smooth Ranger
if ($enemy =='Smooth Ranger') {
        $KLname = 'KLsmoothranger';
        $killXP = 400;
        $currencyadd = rand(50, 200);

        $rand=rand(1, 2);
        $bonusalways = '+ Greens </span> ';
        // $results = $link->query("UPDATE $user SET greens = greens + 1");
        updateStats($link, $username, [ 'greens' => $row['greens'] + 1]); // -- update stat
        if ($rand==1) { // 50%
            $qty=rand(10, 50);
            $bonus = '<span>+ '.$qty.' Bolts </span> ';
            // $results = $link->query("UPDATE $user SET bolts = bolts + $qty");
            updateStats($link, $username, [ 'bolts' => $row['bolts'] + $qty]); // -- update stat
        }
        if ($rand==2) { // 50%
            $qty=rand(20, 100);
            $bonus = '<span>+ '.$qty.' Arrows </span> ';
            // $results = $link->query("UPDATE $user SET arrows = arrows + $qty");
            updateStats($link, $username, [ 'arrows' => $row['arrows'] + $qty]); // -- update stat
        }
/*        //echo 
$message="$start 
+ $exp xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonusalways$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Coral Wizard
if ($enemy =='Coral Wizard') {
        $KLname = 'KLcoralwizard';
        $killXP = 400;
        $currencyadd = rand(50, 200);

        $rand=rand(1, 2);
        $bonusalways = '+ Blues </span> ';
        // $results = $link->query("UPDATE $user SET blues = blues + 1");
        updateStats($link, $username, [ 'blues' => $row['blues'] + 1]); // -- update stat
        if ($rand==1) { // 50%
            $bonus = '<span>+ Blue Balm </span> ';
            // $results = $link->query("UPDATE $user SET bluebalm = bluebalm + 1");
            updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + 1]); // -- update stat
        }
        if ($rand==2) { // 50%
            $qty=rand(5, 10);
            $bonus = '<span>+ '.$qty.' Red Potions </span> ';
            // $results = $link->query("UPDATE $user SET bluepotion = bluepotion + $qty");
            updateStats($link, $username, [ 'bluepotion' => $row['bluepotion'] + $qty]); // -- update stat

        }
/*        //echo 
$message="$start 
+ $exp xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonusalways$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Heavy Walrus
if ($enemy =='Heavy Walrus') {
        $KLname = 'KLheavywalrus';
        $killXP = 400;
        $currencyadd = rand(50, 200);

        $rand=rand(1, 2);
        $KLname= 'KLheavywalrus';
        $bonusalways = '+ Yellows </span> ';
        // $results = $link->query("UPDATE $user SET yellows = yellows + 1");
        updateStats($link, $username, [ 'yellows' => $row['yellows'] + 1]); // -- update stat
        if ($rand==1) { // 50%
            $bonus = '<span>+ 5 Meatballs </span> ';
            // $results = $link->query("UPDATE $user SET meatball = meatball + 5");
            updateStats($link, $username, [ 'meatball' => $row['meatball'] + 5]); // -- update stat
        }
        if ($rand==2) { // 50%
            $qty=rand(15, 25);
            $bonus = '<span>+ '.$qty.' Raw Meat </span> ';
            // $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $qty");
            updateStats($link, $username, [ 'rawmeat' => $row['rawmeat'] + $qty]); // -- update stat
        }
/*        //echo 
$message="$start 
+ $exp xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonusalways$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Water Temple Guardian
if ($enemy =='Water Temple Guardian') {
        $KLname = 'KLwatertempleguardian';
        $killXP = 2000;
        $currencyadd = rand(1000, 3000);

        $rand=rand(1, 5);
        if ($guardianblade == 0) {
            $bonusalways = '+ Guardian Blade!</span> ';
            // $results = $link->query("UPDATE $user SET guardianblade = guardianblade + 1");
            updateStats($link, $username, [ 'guardianblade' => $row['guardianblade'] + 1]); // -- update stat
        } else {
            $bonusalways = '';
        }
        if ($rand==1) { // 20% RARE
            $bonus = '<span>+ Pearl of Wisdom! [RARE ARTIFACT] </span> ';
            // $results = $link->query("UPDATE $user SET pearlofwisdom = pearlofwisdom + 1");
            updateStats($link, $username, [ 'pearlofwisdom' => $row['pearlofwisdom'] + 1]); // -- update stat
        } else {
            // $bonus = '';
        }

/*        //echo 
$message="$start 
+ $exp xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonusalways$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}



// -------------------------------------------------------------------------------------- NEVERENDING MINE


// --------------------------------------------------------------  Iron Rat
if ($enemy =='Iron Rat') {
        $KLname = 'KLironrat';
        $killXP = 100;
        $currencyadd = rand(10, 20);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $qty = rand(10, 20);
            $bonus = '<span>+ '.$qty.' Redberry </span> ';
            // $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
            updateStats($link, $username, [ 'redberry' => $row['redberry'] + $qty]); // -- update stat
            
        }
        if ($rand == 2) {
            $qty = rand(10, 20);
            $bonus = '<span>+ '.$qty.' Blueberry </span> ';
            // $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
            updateStats($link, $username, [ 'blueberry' => $row['blueberry'] + $qty]); // -- update stat
        }
        if ($rand == 3) {
            $qty = rand(5, 10);
            $bonus = '<span>+ '.$qty.' Raw Meat </span> ';
            // $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $qty");
            updateStats($link, $username, [ 'rawmeat' => $row['rawmeat'] + $qty]); // -- update stat
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength II ';
                // $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
                updateStats($link, $username, [ 'ringofstrengthII' => $row['ringofstrengthII'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity II ';
                // $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
                updateStats($link, $username, [ 'ringofdexterityII' => $row['ringofdexterityII'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic II ';
                // $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
                updateStats($link, $username, [ 'ringofmagicII' => $row['ringofmagicII'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense II ';
                // $results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1");
                updateStats($link, $username, [ 'ringofdefenseII' => $row['ringofdefenseII'] + 1]); // -- update stat
            }
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Iron Crab
if ($enemy =='Iron Crab') {
        $KLname = 'KLironcrab';
        $killXP = 100;
        $currencyadd = rand(10, 20);

        $bonusalways = '<span>+ Iron </span> ';
        // $results = $link->query("UPDATE $user SET iron = iron + 1");
        updateStats($link, $username, [ 'iron' => $row['iron'] + 1]); // -- update stat

        $rand=rand(1, 6);				// rand bonus
        if ($rand == 1) {
            $qty = rand(2, 5);
            $bonus = '<span>+ '.$qty.' Sand </span> ';
            // $results = $link->query("UPDATE $user SET sand = sand + $qty");
            updateStats($link, $username, [ 'sand' => $row['sand'] + $qty]); // -- update stat
        }
        if ($rand == 2) {
            $qty = rand(2, 5);
            $bonus = '<span>+ '.$qty.' Water </span> ';
            // $results = $link->query("UPDATE $user SET water = water + $qty");
            updateStats($link, $username, [ 'water' => $row['water'] + $qty]); // -- update stat
        }
        if ($rand == 3) {
            $qty = rand(2, 3);
            $bonus = '<span>+ '.$qty.' Iron Daggers </span> ';
            // $results = $link->query("UPDATE $user SET irondagger = irondagger + $qty");
            updateStats($link, $username, [ 'irondagger' => $row['irondagger'] + $qty]); // -- update stat
        }
        if ($rand == 4) {
            $qty = rand(2, 5);
            $bonus = '<span>+ '.$qty.' Stone </span> ';
            // $results = $link->query("UPDATE $user SET stone = stone + $qty");
            updateStats($link, $username, [ 'stone' => $row['stone'] + $qty]); // -- update stat
        }
        if ($rand == 5) {
            $qty = rand(2, 5);
            $bonus = '<span>+ '.$qty.' Mud </span> ';
            // $results = $link->query("UPDATE $user SET mud = mud + $qty");
            updateStats($link, $username, [ 'mud' => $row['mud'] + $qty]); // -- update stat
        }
        if ($rand == 6) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength II ';
                // $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
                updateStats($link, $username, [ 'ringofstrengthII' => $row['ringofstrengthII'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity II ';
                // $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
                updateStats($link, $username, [ 'ringofdexterityII' => $row['ringofdexterityII'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic II ';
                // $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
                updateStats($link, $username, [ 'ringofmagicII' => $row['ringofmagicII'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense II ';
                // $results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1");
                updateStats($link, $username, [ 'ringofdefenseII' => $row['ringofdefenseII'] + 1]); // -- update stat
            }
        }
/*        //echo 
$message="$start 
+ $exp xp 
+ $currencyadd ".$_SESSION['currency']." 
  $bonusalways
  $bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Iron Scorpion
if ($enemy =='Iron Scorpion') {
        $KLname = 'KLironscorpion';
        $killXP = 150;
        $currencyadd = rand(20, 40);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $qty=rand(2, 5);
            $bonus = '<span>+ '.$qty.' Red Potion </span> ';
            // $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
            updateStats($link, $username, [ 'redpotion' => $row['redpotion'] + $qty]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Barbarian Helmet </span> ';
            // $results = $link->query("UPDATE $user SET barbarianhelmet = barbarianhelmet + 1");
            updateStats($link, $username, [ 'barbarianhelmet' => $row['barbarianhelmet'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Blues </span> ';
            // $results = $link->query("UPDATE $user SET blues = blues + 1");
            updateStats($link, $username, [ 'blues' => $row['blues'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength II ';
                // $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
                updateStats($link, $username, [ 'ringofstrengthII' => $row['ringofstrengthII'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity II ';
                // $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
                updateStats($link, $username, [ 'ringofdexterityII' => $row['ringofdexterityII'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic II ';
                // $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
                updateStats($link, $username, [ 'ringofmagicII' => $row['ringofmagicII'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense II ';
                // $results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1");
                updateStats($link, $username, [ 'ringofdefenseII' => $row['ringofdefenseII'] + 1]); // -- update stat
            }
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  War Turtle
if ($enemy =='War Turtle') {
        $KLname = 'KLwarturtle';
        $killXP = 300;
        $currencyadd = rand(50, 100);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Turtle Shell </span> ';
            // $results = $link->query("UPDATE $user SET turtleshell = turtleshell + 1");
            updateStats($link, $username, [ 'turtleshell' => $row['turtleshell'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Green Pendant </span> ';
            // $results = $link->query("UPDATE $user SET greenpendant = greenpendant + 1");
            updateStats($link, $username, [ 'greenpendant' => $row['greenpendant'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $qty=rand(3, 6);
            $bonus = '<span>+ '.$qty.' Steel Javelins </span> ';
            // $results = $link->query("UPDATE $user SET steeljavelin = steeljavelin + $qty");
            updateStats($link, $username, [ 'steeljavelin' => $row['steeljavelin'] + $qty]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Ring of Defense X </span> ';
            // $results = $link->query("UPDATE $user SET ringofdefenseX = ringofdefenseX + 1");
            updateStats($link, $username, [ 'ringofdefenseX' => $row['ringofdefenseX'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Slag Beast
if ($enemy =='Slag Beast') {
        $KLname = 'KLslagbeast';
        $killXP = 250;
        $currencyadd = rand(10, 20);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Reds </span> ';
            // $results = $link->query("UPDATE $user SET reds = reds + 1");
            updateStats($link, $username, [ 'reds' => $row['reds'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Stone Necklace </span> ';
            // $results = $link->query("UPDATE $user SET stonenecklace = stonenecklace + 1");
            updateStats($link, $username, [ 'stonenecklace' => $row['stonenecklace'] + 1]); // -- update stat
        }
        // if ($rand == 3) {
        //     // $qty=rand(5, 15);
        //     // $bonus = '<span>+ '.$qty.' Iron Javelins </span> ';
        //     // // $results = $link->query("UPDATE $user SET ironjavelin = ironjavelin + $qty");
        //     // updateStats($link, $username, [ 'ironjavelin' => $row['ironjavelin'] + $qty]); // -- update stat
        // }
        if ($rand == 4 || $rand == 3) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength III ';
                // $results = $link->query("UPDATE $user SET ringofstrengthIII = ringofstrengthIII + 1");
                updateStats($link, $username, [ 'ringofstrengthIII' => $row['ringofstrengthIII'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity III ';
                // $results = $link->query("UPDATE $user SET ringofdexterityIII = ringofdexterityIII + 1");
                updateStats($link, $username, [ 'ringofdexterityIII' => $row['ringofdexterityIII'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic III ';
                // $results = $link->query("UPDATE $user SET ringofmagicIII = ringofmagicIII + 1");
                updateStats($link, $username, [ 'ringofmagicIII' => $row['ringofmagicIII'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense III ';
                // $results = $link->query("UPDATE $user SET ringofdefenseIII = ringofdefenseIII + 1");
                updateStats($link, $username, [ 'ringofdefenseIII' => $row['ringofdefenseIII'] + 1]); // -- update stat
            }
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Iron Gator
if ($enemy =='Iron Gator') {
        $KLname = 'KLirongator';
        $killXP = 250;
        $currencyadd = rand(20, 40);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Iron Hammer </span> ';
            // $results = $link->query("UPDATE $user SET ironhammer = ironhammer + 1");
            updateStats($link, $username, [ 'ironhammer' => $row['ironhammer'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Yellows </span> ';
            // $results = $link->query("UPDATE $user SET yellows = yellows + 1");
            updateStats($link, $username, [ 'yellows' => $row['yellows'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Kettle Helm </span> ';
            // $results = $link->query("UPDATE $user SET kettlehelm = kettlehelm + 1");
            updateStats($link, $username, [ 'kettlehelm' => $row['kettlehelm'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Ring of Defense V<br>';
            // $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1");
            updateStats($link, $username, [ 'ringofdefenseV' => $row['ringofdefenseV'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Iron Golem
if ($enemy =='Iron Golem') {
        $KLname = 'KLirongolem';
        $killXP = 300;
        $currencyadd = rand(50, 200);

        $rand=rand(1, 4);
        $bonusalways = '+ Iron Pickaxe<br>';
        // $results = $link->query("UPDATE $user SET ironpickaxe = ironpickaxe + 1");
        updateStats($link, $username, [ 'ironpickaxe' => $row['ironpickaxe'] + 1]); // -- update stat
        if ($rand == 1) {
            $qty = rand(2, 5);
            $bonus = '<span>+ '.$qty.' Iron<br>';
            // $results = $link->query("UPDATE $user SET iron = iron + $qty");
            updateStats($link, $username, [ 'iron' => $row['iron'] + $qty]); // -- update stat
        }
        if ($rand == 2) {
            $qty = rand(2, 5);
            $bonus = '<span>+ '.$qty.' Stone<br>';
            // $results = $link->query("UPDATE $user SET stone = stone + $qty");
            updateStats($link, $username, [ 'stone' => $row['stone'] + $qty]); // -- update stat
        }
        if ($rand == 3) {
            $qty = rand(1, 2);
            $bonus = '<span>+ '.$qty.' Coal<br>';
            // $results = $link->query("UPDATE $user SET coal = coal + $qty");
            updateStats($link, $username, [ 'coal' => $row['coal'] + $qty]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Iron Maul<br>';
            // $results = $link->query("UPDATE $user SET ironmaul = ironmaul + 1");
            updateStats($link, $username, [ 'ironmaul' => $row['ironmaul'] + 1]); // -- update stat
        }
/*        //echo 
$message="$start 
+ $exp xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonusalways$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Phoenix
if ($enemy =='Phoenix') {
        $KLname = 'KLphoenix';
        $killXP = 400;
        $currencyadd = rand(50, 200);

        $rand=rand(1, 4);
        $KLname= 'KLphoenix';
        if ($rand == 1) {
            $bonus = '<span>+ Iron Cape </span> ';
            // $results = $link->query("UPDATE $user SET ironcape = ironcape + 1");
            updateStats($link, $username, [ 'ironcape' => $row['ironcape'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Iron Ring </span> ';
            // $results = $link->query("UPDATE $user SET ironring = ironring + 1");
            updateStats($link, $username, [ 'ironring' => $row['ironring'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Iron Necklace </span> ';
            // $results = $link->query("UPDATE $user SET ironnecklace = ironnecklace + 1");
            updateStats($link, $username, [ 'ironnecklace' => $row['ironnecklace'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Hand Crossbow<br>';
            // $results = $link->query("UPDATE $user SET handcrossbow = handcrossbow + 1");
            updateStats($link, $username, [ 'handcrossbow' => $row['handcrossbow'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Iron Cobra
if ($enemy =='Iron Cobra') {
        $KLname = 'KLironcobra';
        $killXP = 400;
        $currencyadd = rand(1000, 2000);

        $rand=rand(1, 4);
        $KLname= 'KLironcobra';
        if ($rand == 1) {
            $bonus = '<span>+ Off Hand Sword </span> ';
            // $results = $link->query("UPDATE $user SET offhandsword = offhandsword + 1");
            updateStats($link, $username, [ 'offhandsword' => $row['offhandsword'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Iron Nunchaku </span> ';
            // $results = $link->query("UPDATE $user SET ironnunchaku = ironnunchaku + 1");
            updateStats($link, $username, [ 'ironnunchaku' => $row['ironnunchaku'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Iron Chakram </span> ';
            // $results = $link->query("UPDATE $user SET ironchakram = ironchakram + 1");
            updateStats($link, $username, [ 'ironchakram' => $row['ironchakram'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Poison Saber<br>';
            // $results = $link->query("UPDATE $user SET poisonsaber = poisonsaber + 1");
            updateStats($link, $username, [ 'poisonsaber' => $row['poisonsaber'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Earth Golem
if ($enemy =='Earth Golem') {
        $KLname = 'KLearthgolem';
        $killXP = 400;
        $currencyadd = rand(1000, 2000);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Earth Hood </span> ';
            // $results = $link->query("UPDATE $user SET earthhood = earthhood + 1");
            updateStats($link, $username, [ 'earthhood' => $row['earthhood'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Earth Armor </span> ';
            // $results = $link->query("UPDATE $user SET eartharmor = eartharmor + 1");
            updateStats($link, $username, [ 'eartharmor' => $row['eartharmor'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Earth Mittens </span> ';
            // $results = $link->query("UPDATE $user SET earthmittens = earthmittens + 1");
            updateStats($link, $username, [ 'earthmittens' => $row['earthmittens'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Earth Boots<br>';
            // $results = $link->query("UPDATE $user SET earthboots = earthboots + 1");
            updateStats($link, $username, [ 'earthboots' => $row['earthboots'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}




// --------------------------------------------------------------  Steel Rat
if ($enemy =='Steel Rat') {
        $KLname = 'KLsteelrat';
        $killXP = 200;
        $currencyadd = rand(20, 40);

        $rand=rand(1, 4);
        $KLname= 'KLsteelrat';
        if ($rand == 1) {
            $qty = rand(1, 2);
            $bonus = '<span>+ '.$qty.' Coal </span> ';
            // $results = $link->query("UPDATE $user SET coal = coal + $qty");
            updateStats($link, $username, [ 'coal' => $row['coal'] + $qty]); // -- update stat
        }
        if ($rand == 2) {
            $qty = rand(2, 5);
            $bonus = '<span>+ '.$qty.' Meatballs </span> ';
            // $results = $link->query("UPDATE $user SET meatballs = meatballs + $qty");
            updateStats($link, $username, [ 'meatballs' => $row['meatballs'] + $qty]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ 3 String </span> ';
            // $results = $link->query("UPDATE $user SET string = string + 3");
            updateStats($link, $username, [ 'string' => $row['string'] + 3]); // -- update stat
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength V ';
                // $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
                updateStats($link, $username, [ 'ringofstrengthV' => $row['ringofstrengthV'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity V ';
                // $results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV + 1");
                updateStats($link, $username, [ 'ringofdexterityV' => $row['ringofdexterityV'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic V ';
                // $results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1");
                updateStats($link, $username, [ 'ringofmagicV' => $row['ringofmagicV'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense V ';
                // $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1");
                updateStats($link, $username, [ 'ringofdefenseV' => $row['ringofdefenseV'] + 1]); // -- update stat
            }
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Steel Crab
if ($enemy =='Steel Crab') {
        $KLname = 'KLsteelcrab';
        $killXP = 200;
        $currencyadd = rand(20, 40);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $qty = rand(1, 2);
            $bonus = '<span>+ '.$qty.' Coal </span> ';
            // $results = $link->query("UPDATE $user SET coal = coal + $qty");
            updateStats($link, $username, [ 'coal' => $row['coal'] + $qty]); // -- update stat
        }
        if ($rand == 2) {
            $qty = rand(2, 5);
            $bonus = '<span>+ '.$qty.' Water </span> ';
            // $results = $link->query("UPDATE $user SET water = water + $qty");
            updateStats($link, $username, [ 'water' => $row['water'] + $qty]); // -- update stat
        }
        if ($rand == 3) {
            $qty = rand(1, 3);
            $bonus = '<span>+ '.$qty.' Steel Dagger </span> ';
            // $results = $link->query("UPDATE $user SET steeldagger = steeldagger + $qty");
            updateStats($link, $username, [ 'steeldagger' => $row['steeldagger'] + $qty]); // -- update stat
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength V ';
                // $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
                updateStats($link, $username, [ 'ringofstrengthV' => $row['ringofstrengthV'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity V ';
                // $results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV + 1");
                updateStats($link, $username, [ 'ringofdexterityV' => $row['ringofdexterityV'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic V ';
                // $results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1");
                updateStats($link, $username, [ 'ringofmagicV' => $row['ringofmagicV'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense V ';
                // $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1");
                updateStats($link, $username, [ 'ringofdefenseV' => $row['ringofdefenseV'] + 1]); // -- update stat
            }
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Steel Scorpion
if ($enemy =='Steel Scorpion') {
        $KLname = 'KLsteelscorpion';
        $killXP = 250;
        $currencyadd = rand(40, 80);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $qty = rand(2, 5);
            $bonus = '<span>+ '.$qty.' Bluefish </span> ';
            // $results = $link->query("UPDATE $user SET bluefish = bluefish + $qty");
            updateStats($link, $username, [ 'bluefish' => $row['bluefish'] + $qty]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ 2 Yellows </span> ';
            // $results = $link->query("UPDATE $user SET yellows = yellows + 2");
            updateStats($link, $username, [ 'yellows' => $row['yellows'] + 2]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Red Balm </span> ';
            // $results = $link->query("UPDATE $user SET redbalm = redbalm + 1");
            updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength V ';
                // $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
                updateStats($link, $username, [ 'ringofstrengthV' => $row['ringofstrengthV'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity V ';
                // $results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV + 1");
                updateStats($link, $username, [ 'ringofdexterityV' => $row['ringofdexterityV'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic V ';
                // $results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1");
                updateStats($link, $username, [ 'ringofmagicV' => $row['ringofmagicV'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense V ';
                // $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1");
                updateStats($link, $username, [ 'ringofdefenseV' => $row['ringofdefenseV'] + 1]); // -- update stat
            }
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Ulfberht
if ($enemy =='Ulfberht') {
        $KLname = 'KLulfberht';
        $killXP = 500;
        $currencyadd = rand(50, 200);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Ulfberht </span> ';
            // $results = $link->query("UPDATE $user SET ulfberht = ulfberht + 1");
            updateStats($link, $username, [ 'ulfberht' => $row['ulfberht'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Warrior Pendant </span> ';
            // $results = $link->query("UPDATE $user SET warriorpendant = warriorpendant + 1");
            updateStats($link, $username, [ 'warriorpendant' => $row['warriorpendant'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Ring of Defense XX </span> ';
            // $results = $link->query("UPDATE $user SET ringofdefenseXX = ringofdefenseXX + 1");
            updateStats($link, $username, [ 'ringofdefenseXX' => $row['ringofdefenseXX'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Viking Shield<br>';
            // $results = $link->query("UPDATE $user SET vikingshield = vikingshield + 1");
            updateStats($link, $username, [ 'vikingshield' => $row['vikingshield'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Black Frog
if ($enemy =='Black Frog') {
        $KLname = 'KLblackfrog';
        $killXP = 300;
        $currencyadd = rand(40, 80);

        $rand=rand(1, 1);
        if ($rand == 1) {
            $bonus = '<span>+ Reds<br> + Greens<br> + Blues<br> + Yellows </span> ';
            // $results = $link->query("UPDATE $user SET reds = reds + 1");
            // $results = $link->query("UPDATE $user SET greens = greens + 1");
            // $results = $link->query("UPDATE $user SET blues = blues + 1");
            // $results = $link->query("UPDATE $user SET yellows = yellows + 1");
            updateStats($link, $username, [ 'reds' => $row['reds'] + 1]); // -- update stat
            updateStats($link, $username, [ 'greens' => $row['greens'] + 1]); // -- update stat
            updateStats($link, $username, [ 'blues' => $row['blues'] + 1]); // -- update stat
            updateStats($link, $username, [ 'yellows' => $row['yellows'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Steel Gator
if ($enemy =='Steel Gator') {
        $KLname = 'KLsteelgator';
        $killXP = 400;
        $currencyadd = rand(40, 80);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Steel Hammer </span> ';
            // $results = $link->query("UPDATE $user SET steelhammer = steelhammer + 1");
            updateStats($link, $username, [ 'steelhammer' => $row['steelhammer'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ 30 Wood </span> ';
            // $results = $link->query("UPDATE $user SET wood = wood + 30");
            updateStats($link, $username, [ 'wood' => $row['wood'] + 30]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Gator Gloves </span> ';
            // $results = $link->query("UPDATE $user SET gatorgloves = gatorgloves + 1");
            updateStats($link, $username, [ 'gatorgloves' => $row['gatorgloves'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Ring of Defense X<br>';
            // $results = $link->query("UPDATE $user SET ringofdefenseX = ringofdefenseX + 1");
            updateStats($link, $username, [ 'ringofdefenseX' => $row['ringofdefenseX'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Steel Golem
if ($enemy =='Steel Golem') {
        $KLname = 'KLsteelgolem';
        $killXP = 500;
        $currencyadd = rand(100, 200);

        $rand=rand(1, 4);
        $bonusalways = '+ Steel Pickaxe<br>';
        // $results = $link->query("UPDATE $user SET steelpickaxe = steelpickaxe + 1");
        updateStats($link, $username, [ 'steelpickaxe' => $row['steelpickaxe'] + 1]); // -- update stat
        if ($rand == 1) {
            $qty = rand(2, 5);
            $bonus = '<span>+ '.$qty.' Iron<br>';
            // $results = $link->query("UPDATE $user SET iron = iron + $qty");
            updateStats($link, $username, [ 'iron' => $row['iron'] + $qty]); // -- update stat
        }
        if ($rand == 2) {
            $qty = rand(2, 3);
            $bonus = '<span>+ '.$qty.' Mithril<br>';
            // $results = $link->query("UPDATE $user SET mithril = mithril + $qty");
            updateStats($link, $username, [ 'mithril' => $row['mithril'] + $qty]); // -- update stat
        }
        if ($rand == 3) {
            $qty = rand(5, 10);
            $bonus = '<span>+ '.$qty.' Coal<br>';
            // $results = $link->query("UPDATE $user SET coal = coal + $qty");
            updateStats($link, $username, [ 'coal' => $row['coal'] + $qty]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Ring of Dexterity VII<br>';
            // $results = $link->query("UPDATE $user SET ringofdexterityVII = ringofdexterityVII + 1");
            updateStats($link, $username, [ 'ringofdexterityVII' => $row['ringofdexterityVII'] + 1]); // -- update stat
        }
/*        //echo 
$message="$start 
+ $exp xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonusalways$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Cyclops
if ($enemy =='Cyclops') {
        $KLname = 'KLcyclops';
        $killXP = 700;
        $currencyadd = rand(200, 300);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Steel Cape </span> ';
            // $results = $link->query("UPDATE $user SET steelcape = steelcape + 1");
            updateStats($link, $username, [ 'steelcape' => $row['steelcape'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Steel Ring </span> ';
            // $results = $link->query("UPDATE $user SET steelring = steelring + 1");
            updateStats($link, $username, [ 'steelring' => $row['steelring'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Steel Necklace </span> ';
            // $results = $link->query("UPDATE $user SET steelnecklace = steelnecklace + 1");
            updateStats($link, $username, [ 'steelnecklace' => $row['steelnecklace'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Heavy Hammer<br>';
            // $results = $link->query("UPDATE $user SET heavyhammer = heavyhammer + 1");
            updateStats($link, $username, [ 'heavyhammer' => $row['heavyhammer'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Stone Assassin
if ($enemy =='Stone Assassin') {
        $KLname = 'KLstoneassassin';
        $killXP = 1000;
        $currencyadd = rand(2000, 4000);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Off Hand Mace </span> ';
            // $results = $link->query("UPDATE $user SET offhandmace = offhandmace + 1");
            updateStats($link, $username, [ 'offhandmace' => $row['offhandmace'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Steel Nunchaku </span> ';
            // $results = $link->query("UPDATE $user SET steelnunchaku = steelnunchaku + 1");
            updateStats($link, $username, [ 'steelnunchaku' => $row['steelnunchaku'] + 1]); // -- update stat   
        }
        if ($rand == 3) {
            $bonus = '<span>+ Steel Chakram </span> ';
            // $results = $link->query("UPDATE $user SET steelchakram = steelchakram + 1");
            updateStats($link, $username, [ 'steelchakram' => $row['steelchakram'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Glaive<br>';
            // $results = $link->query("UPDATE $user SET glaive = glaive + 1");
            updateStats($link, $username, [ 'glaive' => $row['glaive'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Gamma Monk
if ($enemy =='Gamma Monk') {
        $KLname = 'KLgammamonk';
        $killXP = 1000;
        $currencyadd = rand(2000, 4000);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Gamma Hood </span> ';
            // $results = $link->query("UPDATE $user SET gammahood = gammahood + 1");
            updateStats($link, $username, [ 'gammahood' => $row['gammahood'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Gamma Robe </span> ';
            // $results = $link->query("UPDATE $user SET gammarobe = gammarobe + 1");
            updateStats($link, $username, [ 'gammarobe' => $row['gammarobe'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Gamma Handwraps </span> ';
            // $results = $link->query("UPDATE $user SET gammagloves = gammagloves + 1");
            updateStats($link, $username, [ 'gammahandwraps' => $row['gammahandwraps'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Gamma Boots<br>';
            // $results = $link->query("UPDATE $user SET gammaboots = gammaboots + 1");
            updateStats($link, $username, [ 'gammaboots' => $row['gammaboots'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}








// --------------------------------------------------------------  Mithril Rat
if ($enemy =='Mithril Rat') {
        $KLname = 'KLmithrilrat';
        $killXP = 500;
        $currencyadd = rand(50, 100);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $qty = rand(1, 1);
            $bonus = '<span>+ '.$qty.' Mithril </span> ';
            // $results = $link->query("UPDATE $user SET mithril = mithril + $qty");
            updateStats($link, $username, [ 'mithril' => $row['mithril'] + $qty]); // -- update stat
        }
        if ($rand == 2) {
            $qty = rand(3, 5);
            $bonus = '<span>+ '.$qty.' Coal </span> ';
            // $results = $link->query("UPDATE $user SET coal = coal + $qty");
            updateStats($link, $username, [ 'coal' => $row['coal'] + $qty]); // -- update stat
        }
        if ($rand == 3) {
            $qty = rand(2, 3);
            $bonus = '<span>+ '.$qty.' Red Balms </span> ';
            // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
            updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength VII ';
                // $results = $link->query("UPDATE $user SET ringofstrengthVII = ringofstrengthVII + 1");
                updateStats($link, $username, [ 'ringofstrengthVII' => $row['ringofstrengthVII'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity VII ';
                // $results = $link->query("UPDATE $user SET ringofdexterityVII = ringofdexterityVII + 1");
                updateStats($link, $username, [ 'ringofdexterityVII' => $row['ringofdexterityVII'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic VII ';
                // $results = $link->query("UPDATE $user SET ringofmagicVII = ringofmagicVII + 1");
                updateStats($link, $username, [ 'ringofmagicVII' => $row['ringofmagicVII'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense VII ';
                // $results = $link->query("UPDATE $user SET ringofdefenseVII = ringofdefenseVII + 1");
                updateStats($link, $username, [ 'ringofdefenseVII' => $row['ringofdefenseVII'] + 1]); // -- update stat
            }
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Mithril Crab
if ($enemy =='Mithril Crab') {
        $KLname = 'KLmithrilcrab';
        $killXP = 500;
        $currencyadd = rand(50, 100);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $qty = rand(1, 1);
            $bonus = '<span>+ '.$qty.' Mithril </span> ';
            // $results = $link->query("UPDATE $user SET mithril = mithril + $qty");
            updateStats($link, $username, [ 'mithril' => $row['mithril'] + $qty]); // -- update stat
        }
        if ($rand == 2) {
            $qty = rand(3, 5);
            $bonus = '<span>+ '.$qty.' Coal </span> ';
            // $results = $link->query("UPDATE $user SET coal = coal + $qty");
            updateStats($link, $username, [ 'coal' => $row['coal'] + $qty]); // -- update stat
        }
        if ($rand == 3) {
            $qty = rand(2, 3);
            $bonus = '<span>+ '.$qty.' Yellows </span> ';
            // $results = $link->query("UPDATE $user SET yellows = yellows + $qty");
            updateStats($link, $username, [ 'yellows' => $row['yellows'] + $qty]); // -- update stat
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength VII ';
                // $results = $link->query("UPDATE $user SET ringofstrengthVII = ringofstrengthVII + 1");
                updateStats($link, $username, [ 'ringofstrengthVII' => $row['ringofstrengthVII'] + 1]); // -- update stat   
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity VII ';
                // $results = $link->query("UPDATE $user SET ringofdexterityVII = ringofdexterityVII + 1");
                updateStats($link, $username, [ 'ringofdexterityVII' => $row['ringofdexterityVII'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic VII ';
                // $results = $link->query("UPDATE $user SET ringofmagicVII = ringofmagicVII + 1");
                updateStats($link, $username, [ 'ringofmagicVII' => $row['ringofmagicVII'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense VII ';
                // $results = $link->query("UPDATE $user SET ringofdefenseVII = ringofdefenseVII + 1");
                updateStats($link, $username, [ 'ringofdefenseVII' => $row['ringofdefenseVII'] + 1]); // -- update stat
            }
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Mithril Scorpion
if ($enemy =='Mithril Scorpion') {
        $KLname = 'KLmithrilscorpion';
        $killXP = 600;
        $currencyadd = rand(100, 200);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $qty = rand(2, 5);
            $bonus = '<span>+ '.$qty.' Blues </span> ';
            // $results = $link->query("UPDATE $user SET blues = blues + $qty");
            updateStats($link, $username, [ 'blues' => $row['blues'] + $qty]); // -- update stat
        }
        if ($rand == 2) {
            $qty = rand(2, 3);
            $bonus = '<span>+ '.$qty.' Blue Balms </span> ';
            // $results = $link->query("UPDATE $user SET bluebalm = bluebalm + $qty");
            updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
         }
        if ($rand == 3) {
            $qty = rand(2, 3);
            $bonus = '<span>+ '.$qty.' Red Balms </span> ';
            // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
            updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength VII ';
                // $results = $link->query("UPDATE $user SET ringofstrengthVII = ringofstrengthVII + 1");
                updateStats($link, $username, [ 'ringofstrengthVII' => $row['ringofstrengthVII'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity VII ';
                // $results = $link->query("UPDATE $user SET ringofdexterityVII = ringofdexterityVII + 1");
                updateStats($link, $username, [ 'ringofdexterityVII' => $row['ringofdexterityVII'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic VII ';
                // $results = $link->query("UPDATE $user SET ringofmagicVII = ringofmagicVII + 1");
                updateStats($link, $username, [ 'ringofmagicVII' => $row['ringofmagicVII'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense VII ';
                // $results = $link->query("UPDATE $user SET ringofdefenseVII = ringofdefenseVII + 1");
                updateStats($link, $username, [ 'ringofdefenseVII' => $row['ringofdefenseVII'] + 1]); // -- update stat
            }
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Griffin
if ($enemy =='Griffin') {
        $KLname = 'KLgriffin';
        $killXP = 1500;
        $currencyadd = rand(100, 500);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Ring of Defense XX </span> ';
            // $results = $link->query("UPDATE $user SET ringofdefenseXX = ringofdefenseXX + 1");
            updateStats($link, $username, [ 'ringofdefenseXX' => $row['ringofdefenseXX'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Mithril Boomerang </span> ';
            // $results = $link->query("UPDATE $user SET mithrilboomerang = mithrilboomerang + 1");
            updateStats($link, $username, [ 'mithrilboomerang' => $row['mithrilboomerang'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Ranger Amulet </span> ';
            // $results = $link->query("UPDATE $user SET rangeramulet = rangeramulet + 1");
            updateStats($link, $username, [ 'rangeramulet' => $row['rangeramulet'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Vambraces<br>';
            // $results = $link->query("UPDATE $user SET vambraces = vambraces + 1");
            updateStats($link, $username, [ 'vambraces' => $row['vambraces'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Blue Frog
if ($enemy =='Blue Frog') {
        $KLname = 'KLbluefrog';
        $killXP = 800;
        $currencyadd = rand(50, 100);

        $rand=rand(1, 1);
        if ($rand == 1) {
            $bonus = '<span>+ 5 Red Balm <br> + 5 Blue Balm </span> ';
            // $results = $link->query("UPDATE $user SET redbalm = redbalm + 5");
            // $results = $link->query("UPDATE $user SET bluebalm = bluebalm + 5");
            updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + 5]); // -- update stat
            updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + 5]); // -- update stat 
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Mithril Gator
if ($enemy =='Mithril Gator') {
        $KLname = 'KLmithrilgator';
        $killXP = 1000;
        $currencyadd = rand(100, 200);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Mithril Hammer </span> ';
            // $results = $link->query("UPDATE $user SET mithrilhammer = mithrilhammer + 1");
            updateStats($link, $username, [ 'mithrilhammer' => $row['mithrilhammer'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ 30 Leather </span> ';
            // $results = $link->query("UPDATE $user SET leather = leather + 30");
            updateStats($link, $username, [ 'leather' => $row['leather'] + 30]); // -- update stat
        }
        if ($rand == 3) {
            $qty = rand(30, 50);
            $bonus = '<span>+ '.$qty.' Raw Meat </span> ';
            // $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $qty");
            updateStats($link, $username, [ 'rawmeat' => $row['rawmeat'] + $qty]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Ring of Defense XX<br>';
            // $results = $link->query("UPDATE $user SET ringofdefenseXX = ringofdefenseXX + 1");
            updateStats($link, $username, [ 'ringofdefenseXX' => $row['ringofdefenseXX'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Mithril Golem
if ($enemy =='Mithril Golem') {
        $KLname = 'KLmithrilgolem';
        $killXP = 1500;
        $currencyadd = rand(100, 200);

        $rand=rand(1, 4);
        $bonusalways = '+ Mithril Pickaxe<br>';
        // $results = $link->query("UPDATE $user SET mithrilpickaxe = mithrilpickaxe + 1");
        updateStats($link, $username, [ 'mithrilpickaxe' => $row['mithrilpickaxe'] + 1]); // -- update stat
        if ($rand == 1) {
            $qty = rand(2, 5);
            $bonus = '<span>+ '.$qty.' Mithril<br>';
            // $results = $link->query("UPDATE $user SET mithril = mithril + $qty");
            updateStats($link, $username, [ 'mithril' => $row['mithril'] + $qty]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Mithril 2h Sword<br>';
            // $results = $link->query("UPDATE $user SET mithril2hsword = mithril2hsword + 1");
            updateStats($link, $username, [ 'mithril2hsword' => $row['mithril2hsword'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $qty = rand(5, 15);
            $bonus = '<span>+ '.$qty.' Coal<br>';
            // $results = $link->query("UPDATE $user SET coal = coal + $qty");
            updateStats($link, $username, [ 'coal' => $row['coal'] + $qty]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Ring of Dexterity XIII<br>';
            // $results = $link->query("UPDATE $user SET ringofdexterityXIII = ringofdexterityXIII + 1");
            updateStats($link, $username, [ 'ringofdexterityXIII' => $row['ringofdexterityXIII'] + 1]); // -- update stat
        }
/*        //echo 
$message="$start 
+ $exp xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonusalways$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Minotaur
if ($enemy =='Minotaur') {
        $KLname = 'KLminotaur';
        $killXP = 2000;
        $currencyadd = rand(500, 1000);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Mithril Cape </span> ';
            // $results = $link->query("UPDATE $user SET mithrilcape = mithrilcape + 1");
            updateStats($link, $username, [ 'mithrilcape' => $row['mithrilcape'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Mithril Ring </span> ';
            // $results = $link->query("UPDATE $user SET mithrilring = mithrilring + 1");
            updateStats($link, $username, [ 'mithrilring' => $row['mithrilring'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Mithril Necklace </span> ';
            // $results = $link->query("UPDATE $user SET mithrilnecklace = mithrilnecklace + 1");
            updateStats($link, $username, [ 'mithrilnecklace' => $row['mithrilnecklace'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Gargantuan Warhammer<br>';
            // $results = $link->query("UPDATE $user SET gargantuanwarhammer = gargantuanwarhammer + 1");
            updateStats($link, $username, [ 'gargantuanwarhammer' => $row['gargantuanwarhammer'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

  // --------------------------------------------------------------  Cosmic Mage
  if ($enemy =='Cosmic Mage') {
        $KLname = 'KLcosmicmage';
        $killXP = 4000;
        $currencyadd = rand(5000, 10000);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Silk Moccasins </span> ';
            // $results = $link->query("UPDATE $user SET silkmoccasins = silkmoccasins + 1");
            updateStats($link, $username, [ 'silkmoccasins' => $row['silkmoccasins'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Ring of the Magi </span> ';
            // $results = $link->query("UPDATE $user SET ringofthemagi = ringofthemagi + 1");
            updateStats($link, $username, [ 'ringofthemagi' => $row['ringofthemagi'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Neutron Staff </span> ';
            // $results = $link->query("UPDATE $user SET neutronstaff = neutronstaff + 1");
            updateStats($link, $username, [ 'neutronstaff' => $row['neutronstaff'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Galaxy Bow<br>';
            // $results = $link->query("UPDATE $user SET galaxybow = galaxybow + 1");
            updateStats($link, $username, [ 'galaxybow' => $row['galaxybow'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Carbon Beast
if ($enemy =='Carbon Beast') {
        $KLname = 'KLcarbonbeast';
        $killXP = 4000;
        $currencyadd = rand(5000, 10000);

        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '<span>+ Heater Shield </span> ';
            // $results = $link->query("UPDATE $user SET heatershield = heatershield + 1");
            updateStats($link, $username, [ 'heatershield' => $row['heatershield'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Mithril Nunchaku </span> ';
            // $results = $link->query("UPDATE $user SET mithrilnunchaku = mithrilnunchaku + 1");
            updateStats($link, $username, [ 'mithrilnunchaku' => $row['mithrilnunchaku'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Mithril Chakran </span> ';
            // $results = $link->query("UPDATE $user SET mithrilchakram = mithrilchakram + 1");
            updateStats($link, $username, [ 'mithrilchakram' => $row['mithrilchakram'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Fortified Fauchard </span> ';
            // $results = $link->query("UPDATE $user SET fortifiedfauchard = fortifiedfauchard + 1");
            updateStats($link, $username, [ 'fortifiedfauchard' => $row['fortifiedfauchard'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}




















// --------------------------------------------------------------  Bowman
if ($enemy =='Bowman') {
        $KLname = 'KLbowman';
        $killXP = 300;
        $currencyadd = rand(500, 5000);

        $rand=rand(1, 4);
        $randArrow = rand(10, 20);
        $randBolt = rand(10, 20);
        $bonusalways = '<span>+ '.$randArrow.' Arrows, + '.$randBolt.' Bolts </span> ';
        // $results = $link->query("UPDATE $user SET arrows = arrows + $randArrow");
        // $results = $link->query("UPDATE $user SET bolts = bolts + $randBolt");
        updateStats($link, $username, [ 'arrows' => $row['arrows'] + $randArrow]); // -- update stat
        updateStats($link, $username, [ 'bolts' => $row['bolts'] + $randBolt]); // -- update stat


        if ($rand==1) { // 25%
            $bonus = '<span>+ Hand Crossbow </span> ';
            // $results = $link->query("UPDATE $user SET handcrossbow = handcrossbow + 1");
            updateStats($link, $username, [ 'handcrossbow' => $row['handcrossbow'] + 1]); // -- update stat
        }
        if ($rand==2) {
            $bonus = '<span>+ Compound Crossbow </span> ';
            // $results = $link->query("UPDATE $user SET compoundcrossbow = compoundcrossbow + 1");
            updateStats($link, $username, [ 'compoundcrossbow' => $row['compoundcrossbow'] + 1]); // -- update stat
        }
        if ($rand==3) {
            $bonus = '<span>+ Hunter Bow </span> ';
            // $results = $link->query("UPDATE $user SET hunterbow = hunterbow + 1");
            updateStats($link, $username, [ 'hunterbow' => $row['hunterbow'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Green Orb </span> ';
            // $results = $link->query("UPDATE $user SET greenorb = greenorb + 1");
            updateStats($link, $username, [ 'greenorb' => $row['greenorb'] + 1]); // -- update stat
        }
/*        //echo 
$message="$start 
+ $exp xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonusalways$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Highwayman
if ($enemy =='Highwayman') {
        $KLname = 'KLhighwayman';
        $killXP = 400;
        $currencyadd = rand(2000, 5000);

        $rand=rand(1, 4);
        $rand2 = rand(1, 4);
        if ($rand2 == 1) {
            $bonusalways = '<span>+ Ring of Strength V </span> ';
            // $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
            updateStats($link, $username, [ 'ringofstrengthV' => $row['ringofstrengthV'] + 1]); // -- update stat
        }
        if ($rand2 == 2) {
            $bonusalways = '<span>+ Ring of Dexterity V </span> ';
            // $results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV + 1");
            updateStats($link, $username, [ 'ringofdexterityV' => $row['ringofdexterityV'] + 1]); // -- update stat
        }
        if ($rand2 == 3) {
            $bonusalways = '<span>+ Ring of Magic V </span> ';
            // $results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1");
            updateStats($link, $username, [ 'ringofmagicV' => $row['ringofmagicV'] + 1]); // -- update stat
        }
        if ($rand2 == 4) {
            $bonusalways = '<span>+ Ring of Defense V </span> ';
            // $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1");
            updateStats($link, $username, [ 'ringofdefenseV' => $row['ringofdefenseV'] + 1]); // -- update stat
        }
        if ($rand==1) { // 25%
            $bonus = '<span>+ Black Cape </span> ';
            // $results = $link->query("UPDATE $user SET blackcape = blackcape + 1");
            updateStats($link, $username, [ 'blackcape' => $row['blackcape'] + 1]); // -- update stat
        }
        if ($rand==2) {
            $bonus = '<span>+ Kettle Helm </span> ';
            // $results = $link->query("UPDATE $user SET kettlehelm = kettlehelm + 1");
            updateStats($link, $username, [ 'kettlehelm' => $row['kettlehelm'] + 1]); // -- update stat
        }
        if ($rand==3) {
            $bonus = '<span>+ Iron Sword </span> ';
            // $results = $link->query("UPDATE $user SET ironsword = ironsword + 1");
            updateStats($link, $username, [ 'ironsword' => $row['ironsword'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Iron Gloves </span> ';
            // $results = $link->query("UPDATE $user SET irongloves = irongloves + 1");
            updateStats($link, $username, [ 'irongloves' => $row['irongloves'] + 1]); // -- update stat
        }
/*        //echo 
$message="$start 
+ $exp xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonusalways$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}



// ------------------------------------------------------------------------------  DARK FOREST
// --------------------------------------------------------------  Troll
if ($enemy =='Troll') {
        $KLname = 'KLtroll';
        $killXP = 50;
        $currencyadd = rand(40, 80);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $qty=rand(1, 2);
            $bonus = '<span>+ '.$qty.' Red Potion </span> ';
            // $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
            updateStats($link, $username, [ 'redpotion' => $row['redpotion'] + $qty]); // -- update stat
        }
        if ($rand==2) {
            $bonus = '<span>+ Troll Boots </span> ';
            // $results = $link->query("UPDATE $user SET trollboots = trollboots + 1");
            updateStats($link, $username, [ 'trollboots' => $row['trollboots'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength II ';
                // $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
                updateStats($link, $username, [ 'ringofstrengthII' => $row['ringofstrengthII'] + 1]); // -- update stat                
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity II ';
                // $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
                updateStats($link, $username, [ 'ringofdexterityII' => $row['ringofdexterityII'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic II ';
                // $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
                updateStats($link, $username, [ 'ringofmagicII' => $row['ringofmagicII'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense II ';
                // $results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1");
                updateStats($link, $username, [ 'ringofdefenseII' => $row['ringofdefenseII'] + 1]); // -- update stat
            }
        }
        if ($rand==4) {
            $bonus = '<span>+ Hunter Bow </span> ';
            // $results = $link->query("UPDATE $user SET hunterbow = hunterbow + 1");
            updateStats($link, $username, [ 'hunterbow' => $row['hunterbow'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Troll Shaman
if ($enemy =='Troll Shaman') {
        $KLname = 'KLtrollshaman';
        $killXP = 200;
        $currencyadd = rand(20, 200);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Warlock Boots </span> ';
            // $results = $link->query("UPDATE $user SET warlockboots = warlockboots + 1");
            updateStats($link, $username, [ 'warlockboots' => $row['warlockboots'] + 1]); // -- update stat
        }
        if ($rand==2) {
            $bonus = '<span>+ Shaman Necklace </span> ';
            // $results = $link->query("UPDATE $user SET shamannecklace = shamannecklace + 1");
            updateStats($link, $username, [ 'shamannecklace' => $row['shamannecklace'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Iron Staff </span> ';
            // $results = $link->query("UPDATE $user SET ironstaff = ironstaff + 1");
            updateStats($link, $username, [ 'ironstaff' => $row['ironstaff'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Iron Dagger </span> ';
            // $results = $link->query("UPDATE $user SET irondagger = irondagger + 1");
            updateStats($link, $username, [ 'irondagger' => $row['irondagger'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Troll Sorcerer
if ($enemy =='Troll Sorcerer') {
        $KLname = 'KLtrollsorcerer';
        $killXP = 300;
        $currencyadd = rand(20, 200);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Warlock Robe </span> ';
            // $results = $link->query("UPDATE $user SET warlockrobe = warlockrobe + 1");
            updateStats($link, $username, [ 'warlockrobe' => $row['warlockrobe'] + 1]); // -- update stat
        }
        if ($rand==2) {
            $bonus = '<span>+ Ring of Mana Regen III </span> ';
            // $results = $link->query("UPDATE $user SET ringofmanaregenIII = ringofmanaregenIII + 1");
            updateStats($link, $username, [ 'ringofmanaregenIII' => $row['ringofmanaregenIII'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Iron Battle Staff </span> ';
            // $results = $link->query("UPDATE $user SET ironbattlestaff = ironbattlestaff + 1");
            updateStats($link, $username, [ 'ironbattlestaff' => $row['ironbattlestaff'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Blue Balm </span> ';
            // $results = $link->query("UPDATE $user SET bluebalm = bluebalm + 1");
            updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Troll Elder
if ($enemy =='Troll Elder') {
        $KLname = 'KLtrollelder';
        $killXP = 400;
        $currencyadd = rand(30, 300);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Forest Cloak </span> ';
            // $results = $link->query("UPDATE $user SET forestcloak = forestcloak + 1");
            updateStats($link, $username, [ 'forestcloak' => $row['forestcloak'] + 1]); // -- update stat
        }
        if ($rand==2) {
            $bonus = '<span>+ Ring of Health Regen III </span> ';
            // $results = $link->query("UPDATE $user SET ringofhealthregenIII = ringofhealthregenIII + 1");
            updateStats($link, $username, [ 'ringofhealthregenIII' => $row['ringofhealthregenIII'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Iron Sword </span> ';
            // $results = $link->query("UPDATE $user SET ironsword = ironsword + 1");
            updateStats($link, $username, [ 'ironsword' => $row['ironsword'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Steel Dagger </span> ';
            // $results = $link->query("UPDATE $user SET steeldagger = steeldagger + 1");
            updateStats($link, $username, [ 'steeldagger' => $row['steeldagger'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Troll Champion
if ($enemy =='Troll Champion') {
        $KLname = 'KLtrollchampion';
        $killXP = 500;
        $currencyadd = rand(30, 300);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Iron 2h Sword </span> ';
            // $results = $link->query("UPDATE $user SET iron2hsword = iron2hsword + 1");
            updateStats($link, $username, [ 'iron2hsword' => $row['iron2hsword'] + 1]); // -- update stat
        }
        if ($rand==2) {
            $bonus = '<span>+ Iron Necklace </span> ';
            // $results = $link->query("UPDATE $user SET ironnecklace = ironnecklace + 1");
            updateStats($link, $username, [ 'ironnecklace' => $row['ironnecklace'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Iron Armor </span> ';
            // $results = $link->query("UPDATE $user SET ironarmor = ironarmor + 1");
            updateStats($link, $username, [ 'ironarmor' => $row['ironarmor'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Off Hand Sword </span> ';
            // $results = $link->query("UPDATE $user SET offhandsword = offhandsword + 1");
            updateStats($link, $username, [ 'offhandsword' => $row['offhandsword'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}




// --------------------------------------------------------------  Troll Queen
if ($enemy =='Troll Queen') {
        $KLname = 'KLtrollqueen';
        $killXP = 600;
        $currencyadd = rand(40, 400);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Steel Staff </span> ';
            // $results = $link->query("UPDATE $user SET steelstaff = steelstaff + 1");
            updateStats($link, $username, [ 'steelstaff' => $row['steelstaff'] + 1]); // -- update stat
        }
        if ($rand==2) {
            $bonus = '<span>+ Steel Bow </span> ';
            // $results = $link->query("UPDATE $user SET steelbow = steelbow + 1");
            updateStats($link, $username, [ 'steelbow' => $row['steelbow'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength V ';
                // $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
                updateStats($link, $username, [ 'ringofstrengthV' => $row['ringofstrengthV'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity V ';
                // $results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV + 1");
                updateStats($link, $username, [ 'ringofdexterityV' => $row['ringofdexterityV'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic V ';
                // $results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1");
                updateStats($link, $username, [ 'ringofmagicV' => $row['ringofmagicV'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense V ';
                // $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1");
                updateStats($link, $username, [ 'ringofdefenseV' => $row['ringofdefenseV'] + 1]); // -- update stat
            }
        }
        if ($rand==4) {
            $bonus = '<span>+ Steel Boomerang </span> ';
            // $results = $link->query("UPDATE $user SET steelboomerang = steelboomerang + 1");
            updateStats($link, $username, [ 'steelboomerang' => $row['steelboomerang'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Troll King
if ($enemy =='Troll King') {
        $KLname = 'KLtrollking';
        $killXP = 800;
        $currencyadd = rand(50, 500);

        $rand=rand(1, 4);
       // $bonusfirst = '';
        if ($row['trollcrown']<1) {
            $bonusfirst = '<span>+ Troll Crown!</span> ';
            // $results = $link->query("UPDATE $user SET trollcrown = trollcrown + 1");
            updateStats($link, $username, [ 'trollcrown' => $row['trollcrown'] + 1]); // -- update stat
        }

        if ($rand==1) { // 25%
            $bonus = '<span>+ Steel Battle Staff </span> ';
            // $results = $link->query("UPDATE $user SET steelbattlestaff = steelbattlestaff + 1");
            updateStats($link, $username, [ 'steelbattlestaff' => $row['steelbattlestaff'] + 1]); // -- update stat
        }
        if ($rand==2) {
            $bonus = '<span>+ Steel 2h Sword </span> ';
            // $results = $link->query("UPDATE $user SET steel2hsword = steel2hsword + 1");
            updateStats($link, $username, [ 'steel2hsword' => $row['steel2hsword'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Steel Kite Shield </span> ';
            // $results = $link->query("UPDATE $user SET steelkiteshield = steelkiteshield + 1");
            updateStats($link, $username, [ 'steelkiteshield' => $row['steelkiteshield'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Steel Sword </span> ';
            // $results = $link->query("UPDATE $user SET steelsword = steelsword + 1");
            updateStats($link, $username, [ 'steelsword' => $row['steelsword'] + 1]); // -- update stat
        }
/*        //echo 
$message="$start 
+ $exp xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonusfirst$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Falcon
if ($enemy =='Falcon') {
        $KLname = 'KLfalcon';
        $killXP = 400;
        $currencyadd = rand(30, 300);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Steel Crossbow </span> ';
            // $results = $link->query("UPDATE $user SET steelcrossbow = steelcrossbow + 1");
            updateStats($link, $username, [ 'steelcrossbow' => $row['steelcrossbow'] + 1]); // -- update stat
        }
        if ($rand==2) {
            $qty=rand(5, 15);
            $bonus = '<span>+ '.$qty.' Steel Javelins </span> ';
            // $results = $link->query("UPDATE $user SET steeljavelin = steeljavelin + $qty");
            updateStats($link, $username, [ 'steeljavelin' => $row['steeljavelin'] + $qty]); // -- update stat
        }
        if ($rand == 3) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '<span>+ Ring of Strength V ';
                // $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
                updateStats($link, $username, [ 'ringofstrengthV' => $row['ringofstrengthV'] + 1]); // -- update stat
            }
            if ($rand2 == 2) {
                $bonus = '<span>+ Ring of Dexterity V ';
                // $results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV + 1");
                updateStats($link, $username, [ 'ringofdexterityV' => $row['ringofdexterityV'] + 1]); // -- update stat
            }
            if ($rand2 == 3) {
                $bonus = '<span>+ Ring of Magic V ';
                // $results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1");
                updateStats($link, $username, [ 'ringofmagicV' => $row['ringofmagicV'] + 1]); // -- update stat
            }
            if ($rand2 == 4) {
                $bonus = '<span>+ Ring of Defense V ';
                // $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1");
                updateStats($link, $username, [ 'ringofdefenseV' => $row['ringofdefenseV'] + 1]); // -- update stat
            }
        }
        if ($rand==4) {
            $bonus = '<span>+ Steel Nunchaku </span> ';
            // $results = $link->query("UPDATE $user SET steelnunchaku = steelnunchaku + 1");
            updateStats($link, $username, [ 'steelnunchaku' => $row['steelnunchaku'] + 1]); // -- update stat   
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Ent
if ($enemy =='Ent') {
        $KLname = 'KLent';
        $killXP = 600;
        $currencyadd = rand(30, 300);

        $rand=rand(1, 4);
        $bonusalways = '+ 10 Wood<br>';
        // $results = $link->query("UPDATE $user SET wood = wood + 10");
        updateStats($link, $username, [ 'wood' => $row['wood'] + 10]); // -- update stat

        if ($rand == 1) {
            $bonus = '<span>+ Gray Matter<br>';
            updateStats($link, $username, [ 'graymatter' => $row['graymatter'] + 1]); // -- update stat
            
        }
        if ($rand == 2) {
            $bonus = '<span>+ Steel Chakram<br>';
            updateStats($link, $username, [ 'steelchakram' => $row['steelchakram'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Flamberg<br>';
            // $results = $link->query("UPDATE $user SET flamberg = flamberg + 1");
            updateStats($link, $username, [ 'flamberg' => $row['flamberg'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Oak Warhammer<br>';
            // $results = $link->query("UPDATE $user SET oakwarhammer = oakwarhammer + 1");
            updateStats($link, $username, [ 'oakwarhammer' => $row['oakwarhammer'] + 1]); // -- update stat
        }
/*        //echo 
$message="$start 
+ $exp xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonusalways$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Dark Ranger
if ($enemy =='Dark Ranger') {
        $KLname = 'KLdarkranger';
        $killXP = 600;
        $currencyadd = rand(30, 300);

        $rand=rand(1, 4);
        $bonusalways = '+ 50 Arrows<br>';
        // $results = $link->query("UPDATE $user SET arrows = arrows + 50");
        updateStats($link, $username, [ 'arrows' => $row['arrows'] + 50]); // -- update stat
        if ($rand == 1) {
            $bonus = '<span>+ Ranger Boots<br>';
            // $results = $link->query("UPDATE $user SET rangerboots = rangerboots + 1");
            updateStats($link, $username, [ 'rangerboots' => $row['rangerboots'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Ranger Hood<br>';
            // $results = $link->query("UPDATE $user SET rangerhood = rangerhood + 1");
            updateStats($link, $username, [ 'rangerhood' => $row['rangerhood'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Ranger Gloves<br>';
            // $results = $link->query("UPDATE $user SET rangergloves = rangergloves + 1");
            updateStats($link, $username, [ 'rangergloves' => $row['rangergloves'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Ranger Cloak<br>';
            // $results = $link->query("UPDATE $user SET rangercloak = rangercloak + 1");
            updateStats($link, $username, [ 'rangercloak' => $row['rangercloak'] + 1]); // -- update stat
        }
/*        //echo 
$message="$start 
+ $exp xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonusalways$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Wisp
if ($enemy =='Wisp') {
        $KLname = 'KLwisp';
        $killXP = 1000;
        $currencyadd = 10000;
        $rand=rand(1, 4);
        $bonusalways = '+ gray matter<br>';
        // $results = $link->query("UPDATE $user SET graymatter = graymatter + 1");
        updateStats($link, $username, [ 'graymatter' => $row['graymatter'] + 1]); // -- update stat
        if ($rand == 1) {
            $bonus = '<span>+ Gamma Knife<br>';
            // $results = $link->query("UPDATE $user SET gammaknife = gammaknife + 1");
            updateStats($link, $username, [ 'gammaknife' => $row['gammaknife'] + 1]); // -- update stat
        }
        if ($rand == 2) {
            $bonus = '<span>+ Gamma Knife<br>';
            // $results = $link->query("UPDATE $user SET gammaknife = gammaknife + 1");
            updateStats($link, $username, [ 'gammaknife' => $row['gammaknife'] + 1]); // -- update stat
        }
        if ($rand == 3) {
            $bonus = '<span>+ Gamma Knife<br>';
            // $results = $link->query("UPDATE $user SET gammaknife = gammaknife + 1");
            updateStats($link, $username, [ 'gammaknife' => $row['gammaknife'] + 1]); // -- update stat
        }
        if ($rand == 4) {
            $bonus = '<span>+ Gamma Knife<br>';
            updateStats($link, $username, [ 'gammaknife' => $row['gammaknife'] + 1]); // -- update stat 
        }
/*        //echo 
$message="$start 
+ $exp xp 
+ $currencyadd ".$_SESSION['currency']." 
$bonusalways$bonus$open</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        // $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}




// ------------------------------------------------------------------------------  DARK KEEP
// --------------------------------------------------------------  Lurker
if ($enemy =='Lurker') {
        $KLname = 'KLlurker';
        $killXP = 500;
        $currencyadd = rand(100, 300);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $qty=rand(5, 10);
            $bonus = '<span>+ '.$qty.' Red Potion </span> ';
            // $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
            updateStats($link, $username, [ 'redpotion' => $row['redpotion'] + $qty]); // -- update stat
        }
        if ($rand==2) { // 25%
            $qty=rand(5, 10);
            $bonus = '<span>+ '.$qty.' Blue Potion </span> ';
            // $results = $link->query("UPDATE $user SET bluepotion = bluepotion + $qty");
            updateStats($link, $username, [ 'bluepotion' => $row['bluepotion'] + $qty]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Steel Gloves </span> ';
            // $results = $link->query("UPDATE $user SET steelgloves = steelgloves + 1");
            updateStats($link, $username, [ 'steelgloves' => $row['steelgloves'] + 1]); // -- update stat
        }
        if ($rand==4) { // 25%
            $bonus = '<span>+ Ring of Health Regen III </span> ';
            // $results = $link->query("UPDATE $user SET ringofhealthregenIII = ringofhealthregenIII + 1");
            updateStats($link, $username, [ 'ringofhealthregenIII' => $row['ringofhealthregenIII'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Winged Demon
if ($enemy =='Winged Demon') {
        $KLname = 'KLwingeddemon';
        $killXP = 700;
        $currencyadd = rand(100, 500);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $qty=rand(1, 2);
            $bonus = '<span>+ '.$qty.' Red Balm </span> ';
            // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
            updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
        }
        if ($rand==2) { // 25%
            $qty=rand(1, 2);
            $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
            // $results = $link->query("UPDATE $user SET bluebalm = bluebalm + $qty");
            updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Steel Boomerang </span> ';
            // $results = $link->query("UPDATE $user SET steelboomerang = steelboomerang + 1");
            updateStats($link, $username, [ 'steelboomerang' => $row['steelboomerang'] + 1]); // -- update stat
        }
        if ($rand==4) { // 25%
            $bonus = '<span>+ Steel Hood </span> ';
            // $results = $link->query("UPDATE $user SET steelhood = steelhood + 1");
            updateStats($link, $username, [ 'steelhood' => $row['steelhood'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Undead Orc
if ($enemy =='Undead Orc') {
        $KLname = 'KLundeadorc';
        $killXP = 1000;
        $currencyadd = rand(100, 700);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Steel Bow </span> ';
            // $results = $link->query("UPDATE $user SET steelbow = steelbow + 1");
            updateStats($link, $username, [ 'steelbow' => $row['steelbow'] + 1]); // -- update stat 
        }
        if ($rand==2) { // 25%
            $qty=rand(2, 4);
            // $bonus = '<span>+ '.$qty.' Steel Javelins </span> ';
            $bonus = '<span>+ Ring of Dexterity X </span> ';
            // $results = $link->query("UPDATE $user SET steeljavelin = steeljavelin + $qty");
            // updateStats($link, $username, [ 'steeljavelin' => $row['steeljavelin'] + $qty]); // -- update stat
            updateStats($link, $username, [ 'ringofdexterityX' => $row['ringofdexterityX'] + 1]); // -- update stat

        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Steel Crossbow </span> ';
            // $results = $link->query("UPDATE $user SET steelcrossbow = steelcrossbow + 1");
            updateStats($link, $username, [ 'steelcrossbow' => $row['steelcrossbow'] + 1]); // -- update stat
        }
        if ($rand==4) { // 25%
            $bonus = '<span>+ Ring of Dexterity X </span> ';
            // $results = $link->query("UPDATE $user SET ringofdexterityX = ringofdexterityX + 1");
            updateStats($link, $username, [ 'ringofdexterityX' => $row['ringofdexterityX'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Stone Sphinx
if ($enemy =='Stone Sphinx') {
        $KLname = 'KLstonesphinx';
        $killXP = 3000;
        $currencyadd = rand(1000, 5000);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Mithril Bow </span> ';
            // $results = $link->query("UPDATE $user SET mithrilbow = mithrilbow + 1");
            updateStats($link, $username, [ 'mithrilbow' => $row['mithrilbow'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $qty=rand(20, 50);
            $bonus = '<span>+ '.$qty.' Stone </span> ';
            // $results = $link->query("UPDATE $user SET stone = stone + $qty");
            updateStats($link, $username, [ 'stone' => $row['stone'] + $qty]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Ring of Defense XX </span> ';
            // $results = $link->query("UPDATE $user SET ringofdefenseXX = ringofdefenseXX + 1");
            updateStats($link, $username, [ 'ringofdefenseXX' => $row['ringofdefenseXX'] + 1]); // -- update stat
        }
        if ($rand==4) { // 25%
            $bonus = '<span>+ Sphinx Shield </span> ';
            // $results = $link->query("UPDATE $user SET sphinxshield = sphinxshield + 1");
            updateStats($link, $username, [ 'sphinxshield' => $row['sphinxshield'] + 1]); // -- update stat
        }


//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}



// --------------------------------------------------------------  Warped Priest
if ($enemy =='Warped Priest') {
        $KLname = 'KLwarpedpriest';
        $killXP = 2500;
        $currencyadd = rand(1000, 1500);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Warped Ring </span> ';
            // $results = $link->query("UPDATE $user SET warpedring = warpedring + 1");
            updateStats($link, $username, [ 'warpedring' => $row['warpedring'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $qty=rand(3, 3);
            $bonus = '<span>+ '.$qty.' Blues </span> ';
            // $results = $link->query("UPDATE $user SET blues = blues + $qty");
            updateStats($link, $username, [ 'blues' => $row['blues'] + $qty]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Onyx Cross </span> ';
            // $results = $link->query("UPDATE $user SET onyxcross = onyxcross + 1");
            updateStats($link, $username, [ 'onyxcross' => $row['onyxcross'] + 1]); // -- update stat   
        }
        if ($rand==4) { // 25%
            $bonus = '<span>+ Crimson Moccasins </span> ';
            // $results = $link->query("UPDATE $user SET crimsonmoccasins = crimsonmoccasins + 1");
            updateStats($link, $username, [ 'crimsonmoccasins' => $row['crimsonmoccasins'] + 1]); // -- update stat
        }


//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Dark Paladin
if ($enemy =='Dark Paladin') {
        $KLname = 'KLdarkpaladin';
        $killXP = 2000;
        $currencyadd = rand(1000, 1500);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $qty=rand(2, 5);
            $bonus = '<span>+ '.$qty.' Red Balm </span> ';
            // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
            updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat    
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Mithril Armor </span> ';
            // $results = $link->query("UPDATE $user SET mithrilarmor = mithrilarmor + 1");
            updateStats($link, $username, [ 'mithrilarmor' => $row['mithrilarmor'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Mithril Gloves </span> ';
            // $results = $link->query("UPDATE $user SET mithrilgloves = mithrilgloves + 1");
            updateStats($link, $username, [ 'mithrilgloves' => $row['mithrilgloves'] + 1]); // -- update stat
        }
        if ($rand==4) { // 25%
            $bonus = '<span>+ Mithril Boots </span> ';
            // $results = $link->query("UPDATE $user SET mithrilboots = mithrilboots + 1");
            updateStats($link, $username, [ 'mithrilboots' => $row['mithrilboots'] + 1]); // -- update stat
        }


//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}



// --------------------------------------------------------------  Dark Prince
if ($enemy =='Dark Prince') {
        $KLname = 'KLdarkprince';
        $killXP = 3000;
        $currencyadd = rand(1000, 3000);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Mithril Sword </span> ';
            // $results = $link->query("UPDATE $user SET mithrilsword = mithrilsword + 1");
            updateStats($link, $username, [ 'mithrilsword' => $row['mithrilsword'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Mithril Shield </span> ';
            // $results = $link->query("UPDATE $user SET mithrilshield = mithrilshield + 1");
            updateStats($link, $username, [ 'mithrilshield' => $row['mithrilshield'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Mithril Helmet </span> ';
            // $results = $link->query("UPDATE $user SET mithrilhelmet = mithrilhelmet + 1");
            updateStats($link, $username, [ 'mithrilhelmet' => $row['mithrilhelmet'] + 1]); // -- update stat
        }
        if ($rand==4) { // 25%
            $bonus = '<span>+ Royal Pendant </span> ';
            // $results = $link->query("UPDATE $user SET royalpendant = royalpendant + 1");
            updateStats($link, $username, [ 'royalpendant' => $row['royalpendant'] + 1]); // -- update stat
        }


//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}



// ------------------------------------------------------------------------------  MOUNTAIN SHORTCUT
// --------------------------------------------------------------  Friendly Giant
if ($enemy =='Friendly Giant') {
        $KLname = 'KLfriendlygiant';
        $killXP = 0;
        $currencyadd = 0;

/*        //echo 
$message="$start 
You can now use the mountain shortcut.</div>";
        include('update_feed_alt.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
*/
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// ------------------------------------------------------------------------------  MOUNTAINS

// --------------------------------------------------------------  Mountain Giant
if ($enemy =='Mountain Giant') {
        $KLname = 'KLmountaingiant';
        $killXP = 500;
        $currencyadd = rand(50, 300);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Steel Helmet </span> ';
            // $results = $link->query("UPDATE $user SET steelhelmet = steelhelmet + 1");
            updateStats($link, $username, [ 'steelhelmet' => $row['steelhelmet'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $qty=rand(3, 6);
            $bonus = '<span>+ '.$qty.' Meatballs </span> ';
            // $results = $link->query("UPDATE $user SET meatball = meatball + $qty");
            updateStats($link, $username, [ 'meatball' => $row['meatball'] + $qty]); // -- update stat
        }
        if ($rand==3) { // 25%
            $qty=rand(1, 2);
            $bonus = '<span>+ '.$qty.' Red Balm </span> ';
            // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
            updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Bardiche </span> ';
            // $results = $link->query("UPDATE $user SET bardiche = bardiche + 1");
            updateStats($link, $username, [ 'bardiche' => $row['bardiche'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Ice Troll
if ($enemy =='Ice Troll') {
        $KLname = 'KLicetroll';
        $killXP = 600;
        $currencyadd = rand(50, 500);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ 3 Red Balm </span> ';
            // $results = $link->query("UPDATE $user SET redbalm = redbalm + 3");
            updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + 3]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ 3 Blue Balm </span> ';
            // $results = $link->query("UPDATE $user SET bluebalm = bluebalm + 3");
            updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + 3]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ 2 Blues </span> ';
            // $results = $link->query("UPDATE $user SET blues = blues + 2");
            updateStats($link, $username, [ 'blues' => $row['blues'] + 2]); // -- update stat
        }
        if ($rand==4) {
            // $bonus = '<span>+ 2 Mithril Javelins </span> ';
            // // $results = $link->query("UPDATE $user SET mithriljavelin = mithriljavelin + 2");
            // updateStats($link, $username, [ 'mithriljavelin' => $row['mithriljavelin'] + 2]); // -- update stat
            $bonus = '<span>+ Bardiche </span> ';            // ---- CHANGE THIS TO SOMETHING ELSE - THIS WAS JAVELINS
            // $results = $link->query("UPDATE $user SET bardiche = bardiche + 1");
            updateStats($link, $username, [ 'bardiche' => $row['bardiche'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}




// --------------------------------------------------------------  Giant Brute
if ($enemy =='Giant Brute') {
        $KLname = 'KLgiantbrute';
        $killXP = 600;
        $currencyadd = rand(50, 800);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $qty=rand(1000, 5000);
            $bonus = '<span>+ '.$qty.' Bonus '.$_SESSION['currency'].'! </span> ';
            // $results = $link->query("UPDATE $user SET currency = currency + $qty");
            updateStats($link, $username, [ 'currency' => $row['currency'] + $qty]); // -- update stat  
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ 2 Reds </span> ';
            // $results = $link->query("UPDATE $user SET reds = reds + 2");
            updateStats($link, $username, [ 'reds' => $row['reds'] + 2]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ 2 Yellows </span> ';
            // $results = $link->query("UPDATE $user SET yellows = yellows + 2");
            updateStats($link, $username, [ 'yellows' => $row['yellows'] + 2]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ 2 Blues </span> ';
            // $results = $link->query("UPDATE $user SET greens = greens + 2");
            updateStats($link, $username, [ 'greens' => $row['greens'] + 2]); // -- update stat  
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Wyvern
if ($enemy =='Wyvern') {
        $KLname = 'KLwyvern';
        $killXP = 600;
        $currencyadd = rand(50, 500);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Steel Staff </span> ';
            // $results = $link->query("UPDATE $user SET steelstaff = steelstaff + 1");
            updateStats($link, $username, [ 'steelstaff' => $row['steelstaff'] + 1]); // -- update stat 
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Ring of Defense X </span> ';
            // $results = $link->query("UPDATE $user SET ringofdefenseX = ringofdefenseX + 1");
            updateStats($link, $username, [ 'ringofdefenseX' => $row['ringofdefenseX'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Ring of Dexterity X </span> ';
            // $results = $link->query("UPDATE $user SET ringofdexterityX = ringofdexterityX + 1");
            updateStats($link, $username, [ 'ringofdexterityX' => $row['ringofdexterityX'] + 1]); // -- update stat
        }
        if ($rand==4) {
            // $bonus = '<span>+ 5 Iron Javelins </span> ';
            // // $results = $link->query("UPDATE $user SET ironjavelin = ironjavelin + 5");
            // updateStats($link, $username, [ 'ironjavelin' => $row['ironjavelin'] + 5]); // -- update stat
            $bonus = '<span>+ Ring of Dexterity X </span> ';
            // $results = $link->query("UPDATE $user SET ringofdexterityX = ringofdexterityX + 1");
            updateStats($link, $username, [ 'ringofdexterityX' => $row['ringofdexterityX'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Stone Dwarf
if ($enemy =='Stone Dwarf') {
        $KLname = 'KLstonedwarf';
        $killXP = 800;
        $currencyadd = rand(50, 500);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Steel 2h Sword </span> ';
            // $results = $link->query("UPDATE $user SET steel2hsword = steel2hsword + 1");
            updateStats($link, $username, [ 'steel2hsword' => $row['steel2hsword'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Steel Gauntlets </span> ';
            // $results = $link->query("UPDATE $user SET steelgauntlets = steelgauntlets + 1");
            updateStats($link, $username, [ 'steelgauntlets' => $row['steelgauntlets'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Steel Boots </span> ';
            // $results = $link->query("UPDATE $user SET steelboots = steelboots + 1");
            updateStats($link, $username, [ 'steelboots' => $row['steelboots'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Steel Armor </span> ';
            // $results = $link->query("UPDATE $user SET steelarmor = steelarmor + 1");
            updateStats($link, $username, [ 'steelarmor' => $row['steelarmor'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Giant Mountain Giant
if ($enemy =='Giant Mountain Giant') {
        $KLname = 'KLgiantmountaingiant';
        $killXP = 2000;
        $currencyadd = rand(50, 1500);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Humongous Battleaxe </span> ';
            // $results = $link->query("UPDATE $user SET humongousbattleaxe = humongousbattleaxe + 1");
            updateStats($link, $username, [ 'humongousbattleaxe' => $row['humongousbattleaxe'] + 1]); // -- update stat 
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Mithril Kite Shield </span> ';
            // $results = $link->query("UPDATE $user SET mithrilkiteshield = mithrilkiteshield + 1");
            updateStats($link, $username, [ 'mithrilkiteshield' => $row['mithrilkiteshield'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Ring of Health Regen V </span> ';
            // $results = $link->query("UPDATE $user SET ringofhealthregenV = ringofhealthregenV + 1");
            updateStats($link, $username, [ 'ringofhealthregenV' => $row['ringofhealthregenV'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Ring of Strength X </span> ';
            // $results = $link->query("UPDATE $user SET ringofstrengthX = ringofstrengthX + 1");
            updateStats($link, $username, [ 'ringofstrengthX' => $row['ringofstrengthX'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Gatekeeper
if ($enemy =='Gatekeeper') {
        $KLname = 'KLgatekeeper';
        $killXP = 2500;
        $currencyadd = rand(50, 1500);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Mithril Battle Staff </span> ';
            // $results = $link->query("UPDATE $user SET mithrilbattlestaff = mithrilbattlestaff + 1");
            updateStats($link, $username, [ 'mithrilbattlestaff' => $row['mithrilbattlestaff'] + 1]); // -- update stat 
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Black Hood </span> ';
            // $results = $link->query("UPDATE $user SET blackhood = blackhood + 1");
            updateStats($link, $username, [ 'blackhood' => $row['blackhood'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Black Cloak </span> ';
            // $results = $link->query("UPDATE $user SET blackcloak = blackcloak + 1");
            updateStats($link, $username, [ 'blackcloak' => $row['blackcloak'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Keeper\'s Crossbow </span> ';
            // $results = $link->query("UPDATE $user SET keeperscrossbow = keeperscrossbow + 1");
            updateStats($link, $username, [ 'keeperscrossbow' => $row['keeperscrossbow'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Yeti
if ($enemy =='Yeti') {
        $KLname = 'KLyeti';
        $killXP = 1500;
        $currencyadd = rand(800,800);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Gray Matter </span> ';
            // $results = $link->query("UPDATE $user SET graymatter = graymatter + 1");
            updateStats($link, $username, [ 'graymatter' => $row['graymatter'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Mithril Boots </span> ';
            // $results = $link->query("UPDATE $user SET mithrilboots = mithrilboots + 1");
            updateStats($link, $username, [ 'mithrilboots' => $row['mithrilboots'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Ring of Strength X </span> ';
            // $results = $link->query("UPDATE $user SET ringofstrengthX = ringofstrengthX + 1");
            updateStats($link, $username, [ 'ringofstrengthX' => $row['ringofstrengthX'] + 1]); // -- update stat   
        }
        if ($rand==4) {
            $bonus = '<span>+ Magic Talisman </span> ';
            // $results = $link->query("UPDATE $user SET magictalisman = magictalisman + 1");
            updateStats($link, $username, [ 'magictalisman' => $row['magictalisman'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}




// --------------------------------------------------------------  Snow Ogre
if ($enemy =='Snow Ogre') {
        $KLname = 'KLsnowogre';
        $killXP = 2500;
        $currencyadd = rand(2500,2500);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Heater Shield </span> ';
            // $results = $link->query("UPDATE $user SET heatershield = heatershield + 1");
            updateStats($link, $username, [ 'heatershield' => $row['heatershield'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Ranger Orb </span> ';
            // $results = $link->query("UPDATE $user SET rangerorb = rangerorb + 1");
            updateStats($link, $username, [ 'rangerorb' => $row['rangerorb'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Ranger Moccasins </span> ';
            // $results = $link->query("UPDATE $user SET rangermoccasins = rangermoccasins + 1");
            updateStats($link, $username, [ 'rangermoccasins' => $row['rangermoccasins'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Banshee Mask </span> ';
            // $results = $link->query("UPDATE $user SET bansheemask = bansheemask + 1");
            updateStats($link, $username, [ 'bansheemask' => $row['bansheemask'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Snow Ninja
if ($enemy =='Snow Ninja') {
        $KLname = 'KLsnowninja';
        $killXP = 2500;
        $currencyadd = rand(2500,2500);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Mithril Chakram </span> ';
            // $results = $link->query("UPDATE $user SET mithrilchakram = mithrilchakram + 1");
            updateStats($link, $username, [ 'mithrilchakram' => $row['mithrilchakram'] + 1]); // -- update stat 
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Mithril Nunchaku </span> ';
            // $results = $link->query("UPDATE $user SET mithrilnunchaku = mithrilnunchaku + 1");
            updateStats($link, $username, [ 'mithrilnunchaku' => $row['mithrilnunchaku'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Fortified Fauchard </span> ';
            // $results = $link->query("UPDATE $user SET fortifiedfauchard = fortifiedfauchard + 1");
            updateStats($link, $username, [ 'fortifiedfauchard' => $row['fortifiedfauchard'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Silk Moccasins </span> ';
            // $results = $link->query("UPDATE $user SET silkmoccasins = silkmoccasins + 1");
            updateStats($link, $username, [ 'silkmoccasins' => $row['silkmoccasins'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  Snow Owl
if ($enemy =='Snow Owl') {
        $KLname = 'KLsnowowl';
        $killXP = 2500;
        $currencyadd = rand(2500,2500);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Gray Matter </span> ';
            // $results = $link->query("UPDATE $user SET graymatter = graymatter + 1");
            updateStats($link, $username, [ 'graymatter' => $row['graymatter'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Owl Eye Pendant </span> ';
            // $results = $link->query("UPDATE $user SET owleyependant = owleyependant + 1");
            updateStats($link, $username, [ 'owleyependant' => $row['owleyependant'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Snow Vest </span> ';
            // $results = $link->query("UPDATE $user SET snowvest = snowvest + 1");
            updateStats($link, $username, [ 'snowvest' => $row['snowvest'] + 1]); // -- update stat 
        }
        if ($rand==4) {
            $bonus = '<span>+ Baby Owl </span> ';
            // $results = $link->query("UPDATE $user SET babyowl = babyowl + 1");
            updateStats($link, $username, [ 'babyowl' => $row['babyowl'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Dragon
if ($enemy =='Dragon') {
        $KLname = 'KLdragon';
        $killXP = 2500;
        $currencyadd = rand(5000, 10000);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Mithril Staff </span> ';
            // $results = $link->query("UPDATE $user SET mithrilstaff = mithrilstaff + 1");
            updateStats($link, $username, [ 'mithrilstaff' => $row['mithrilstaff'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Mithril Necklace </span> ';
            // $results = $link->query("UPDATE $user SET mithrilnecklace = mithrilnecklace + 1");
            updateStats($link, $username, [ 'mithrilnecklace' => $row['mithrilnecklace'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Ring of Magic X </span> ';
            // $results = $link->query("UPDATE $user SET ringofmagicX = ringofmagicX + 1");
            updateStats($link, $username, [ 'ringofmagicX' => $row['ringofmagicX'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Dragon Shield </span> ';
            // $results = $link->query("UPDATE $user SET dragonshield = dragonshield + 1");
            updateStats($link, $username, [ 'dragonshield' => $row['dragonshield'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// ------------------------------------------------------------------------------  MOUNTAIN CATHEDRAL

// --------------------------------------------------------------  Grey Gargoyle
if ($enemy =='Grey Gargoyle') {
        $KLname = 'KLgreygargoyle';
        $killXP = 700;
        $currencyadd = rand(200, 600);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Steel Battle Staff </span> ';
            // $results = $link->query("UPDATE $user SET steelbattlestaff = steelbattlestaff + 1");
            updateStats($link, $username, [ 'steelbattlestaff' => $row['steelbattlestaff'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Steel Gloves </span> ';
            // $results = $link->query("UPDATE $user SET steelgloves = steelgloves + 1");
            updateStats($link, $username, [ 'steelgloves' => $row['steelgloves'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Mithril Boomerang </span> ';
            // $results = $link->query("UPDATE $user SET mithrilboomerang = mithrilboomerang + 1");
            updateStats($link, $username, [ 'mithrilboomerang' => $row['mithrilboomerang'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Ring of Health Regen III </span> ';
            // $results = $link->query("UPDATE $user SET ringofhealthregenIII = ringofhealthregenIII + 1");
            updateStats($link, $username, [ 'ringofhealthregenIII' => $row['ringofhealthregenIII'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

// --------------------------------------------------------------  White Gargoyle
if ($enemy =='White Gargoyle') {
        $KLname = 'KLwhitegargoyle';
        $killXP = 800;
        $currencyadd = rand(200, 700);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Steel Necklace </span> ';
            // $results = $link->query("UPDATE $user SET steelnecklace = steelnecklace + 1");
            updateStats($link, $username, [ 'steelnecklace' => $row['steelnecklace'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $qty=rand(5, 10);
            $bonus = '<span>+ '.$qty.' Mithril Javelins </span> ';
            // $results = $link->query("UPDATE $user SET mithriljavelin = mithriljavelin + $qty");
            updateStats($link, $username, [ 'mithriljavelin' => $row['mithriljavelin'] + $qty]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Glaive </span> ';
            // $results = $link->query("UPDATE $user SET glaive = glaive + 1");
            updateStats($link, $username, [ 'glaive' => $row['glaive'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Ring of Health Regen III </span> ';
            // $results = $link->query("UPDATE $user SET ringofhealthregenIII = ringofhealthregenIII + 1");
            updateStats($link, $username, [ 'ringofhealthregenIII' => $row['ringofhealthregenIII'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Vampire
if ($enemy =='Vampire') {
        $KLname = 'KLvampire';
        $killXP = 900;
        $currencyadd = rand(300, 700);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Mithril Dagger </span> ';
            // $results = $link->query("UPDATE $user SET mithrildagger = mithrildagger + 1");
            updateStats($link, $username, [ 'mithrildagger' => $row['mithrildagger'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Ring of Mana Regen III </span> ';
            // $results = $link->query("UPDATE $user SET ringofmanaregenIII = ringofmanaregenIII + 1");
            updateStats($link, $username, [ 'ringofmanaregenIII' => $row['ringofmanaregenIII'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ 2 Red Balm </span> ';
            // $results = $link->query("UPDATE $user SET redbalm = redbalm + 2");
            updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + 2]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Blue Balm </span> ';
            // $results = $link->query("UPDATE $user SET bluebalm = bluebalm + 1");
            updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}



// --------------------------------------------------------------  Fallen Priest
if ($enemy =='Fallen Priest') {
        $KLname = 'KLfallenpriest';
        $killXP = 1500;
        $currencyadd = rand(200, 700);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Mithril Dagger </span> ';
            // $results = $link->query("UPDATE $user SET mithrildagger = mithrildagger + 1");
            updateStats($link, $username, [ 'mithrildagger' => $row['mithrildagger'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Mithril Hood </span> ';
            // $results = $link->query("UPDATE $user SET mithrilhood = mithrilhood + 1");
            updateStats($link, $username, [ 'mithrilhood' => $row['mithrilhood'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Ring of Magic VII </span> ';
            // $results = $link->query("UPDATE $user SET ringofmagicVII = ringofmagicVII + 1");
            updateStats($link, $username, [ 'ringofmagicVII' => $row['ringofmagicVII'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Gray Matter </span> ';
            // $results = $link->query("UPDATE $user SET graymatter = graymatter + 1");
            updateStats($link, $username, [ 'graymatter' => $row['graymatter'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}



// --------------------------------------------------------------  Fallen Angel
if ($enemy =='Fallen Angel') {
        $KLname = 'KLfallenangel';
        $killXP = 3000;
        $currencyadd = rand(1000, 3000);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Mithril 2h Sword </span> ';
            // $results = $link->query("UPDATE $user SET mithril2hsword = mithril2hsword + 1");
            updateStats($link, $username, [ 'mithril2hsword' => $row['mithril2hsword'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Mithril Crossbow </span> ';
            // $results = $link->query("UPDATE $user SET mithrilcrossbow = mithrilcrossbow + 1");
            updateStats($link, $username, [ 'mithrilcrossbow' => $row['mithrilcrossbow'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Ring of Mana Regen V </span> ';
            // $results = $link->query("UPDATE $user SET ringofmanaregenV = ringofmanaregenV + 1");
            updateStats($link, $username, [ 'ringofmanaregenV' => $row['ringofmanaregenV'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Off Hand Mace </span> ';
            // $results = $link->query("UPDATE $user SET offhandmace = offhandmace + 1");
            updateStats($link, $username, [ 'offhandmace' => $row['offhandmace'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}




// --------------------------------------------------------------  Risen Skeleton
if ($enemy =='Risen Skeleton') {
        $KLname = 'KLrisenskeleton';
        $killXP = 500;
        $currencyadd = rand(50, 150);

        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ 20 Bones </span> ';
            // $results = $link->query("UPDATE $user SET bone = bone + 1");
            updateStats($link, $username, [ 'bone' => $row['bone'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Mithril Gauntlets </span> ';
            // $results = $link->query("UPDATE $user SET mithrilgauntlets = mithrilgauntlets + 1");
            updateStats($link, $username, [ 'mithrilgauntlets' => $row['mithrilgauntlets'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Cursed Skull </span> ';
            // $results = $link->query("UPDATE $user SET cursedskull = cursedskull + 1");
            updateStats($link, $username, [ 'cursedskull' => $row['cursedskull'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ Lucky Bone </span> ';
            // $results = $link->query("UPDATE $user SET luckybone = luckybone + 1");
            updateStats($link, $username, [ 'luckybone' => $row['luckybone'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}







// ------------------------------------------------------------------------------  MOUNTAIN XTRA

// --------------------------------------------------------------  Jiemji
if ($enemy =='Jiemji') {
        $KLname = 'KLjiemji';
        $killXP = 8000;
        $currencyadd = 20000;
        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ GMG Club </span> ';
            // $results = $link->query("UPDATE $user SET gmgclub = gmgclub + 1");
            updateStats($link, $username, [ 'gmgclub' => $row['gmgclub'] + 1]); // -- update stat   
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ GMG Club </span> ';
            // $results = $link->query("UPDATE $user SET gmgclub = gmgclub + 1");
            updateStats($link, $username, [ 'gmgclub' => $row['gmgclub'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ GMG Club </span> ';
            // $results = $link->query("UPDATE $user SET gmgclub = gmgclub + 1");
            updateStats($link, $username, [ 'gmgclub' => $row['gmgclub'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ GMG Club </span> ';
            // $results = $link->query("UPDATE $user SET gmgclub = gmgclub + 1");
            updateStats($link, $username, [ 'gmgclub' => $row['gmgclub'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  Jikay
if ($enemy =='Jikay') {
        $KLname = 'KLjikay';
        $killXP = 8000;
        $currencyadd = 20000;
        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ GK Club<br>';
            // $results = $link->query("UPDATE $user SET gkclub = gkclub + 1");
            updateStats($link, $username, [ 'gkclub' => $row['gkclub'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ GK Club<br>';
            // $results = $link->query("UPDATE $user SET gkclub = gkclub + 1");
            updateStats($link, $username, [ 'gkclub' => $row['gkclub'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ GK Club<br>';
            // $results = $link->query("UPDATE $user SET gkclub = gkclub + 1");
            updateStats($link, $username, [ 'gkclub' => $row['gkclub'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ GK Club<br>';
            // $results = $link->query("UPDATE $user SET gkclub = gkclub + 1");
            updateStats($link, $username, [ 'gkclub' => $row['gkclub'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}


// --------------------------------------------------------------  KING BLADE
if ($enemy =='King Blade') {
        $KLname = 'KLkingblade';
        $killXP = 15000;
        $currencyadd = 50000;
        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ King Blade<br>';
            // $results = $link->query("UPDATE $user SET kingblade = kingblade + 1");
            updateStats($link, $username, [ 'kingblade' => $row['kingblade'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Atomic Warhammer<br>';
            // $results = $link->query("UPDATE $user SET atomicwarhammer = atomicwarhammer + 1");
            updateStats($link, $username, [ 'atomicwarhammer' => $row['atomicwarhammer'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Bladerang<br>';
            // $results = $link->query("UPDATE $user SET bladerang = bladerang + 1");
            updateStats($link, $username, [ 'bladerang' => $row['bladerang'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ King Shield<br>';
            // $results = $link->query("UPDATE $user SET kingshield = kingshield + 1");
            updateStats($link, $username, [ 'kingshield' => $row['kingshield'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}

    // --------------------------------------------------------------  SILVER TITAN 
    if ($enemy =='Silver Titan') {
            $killXP = 9000;
            $currencyadd = 9000;
            $rand=rand(1, 4);
            $KLname= 'KLsilvertitan';
        
            

        }



// --------------------------------------------------------------  Forest Princess
if ($enemy =='Forest Princess') {
        $KLname = 'KLforestprincess';
        $killXP = 0;
        $currencyadd = 0;
        $rand=rand(1, 4);
        if ($rand==1) { // 25%
            $bonus = '<span>+ Forest Princess<br>';
            // $results = $link->query("UPDATE $user SET kingblade = kingblade + 1");
            updateStats($link, $username, [ 'kingblade' => $row['kingblade'] + 1]); // -- update stat
        }
        if ($rand==2) { // 25%
            $bonus = '<span>+ Atomic Warhammer<br>';
            // $results = $link->query("UPDATE $user SET atomicwarhammer = atomicwarhammer + 1");
            updateStats($link, $username, [ 'atomicwarhammer' => $row['atomicwarhammer'] + 1]); // -- update stat
        }
        if ($rand==3) { // 25%
            $bonus = '<span>+ Bladerang<br>';
            // $results = $link->query("UPDATE $user SET bladerang = bladerang + 1");
            updateStats($link, $username, [ 'bladerang' => $row['bladerang'] + 1]); // -- update stat
        }
        if ($rand==4) {
            $bonus = '<span>+ King Shield<br>';
            // $results = $link->query("UPDATE $user SET kingshield = kingshield + 1");
            updateStats($link, $username, [ 'kingshield' => $row['kingshield'] + 1]); // -- update stat
        }

//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}




// --------------------------------------------------------------  Hydra
if ($enemy =='Hydra') {
    $KLname = 'KLhydra';
    $killXP = 1000;
    $currencyadd = rand(500, 1000);
    $rand=rand(1, 4);
    if ($rand==1) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat   
    }
    if ($rand==2) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==3) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        // $results = $link->query("UPDATE $user SET bluebalm = bluebalm + $qty");
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
    if ($rand==4) {
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        // $results = $link->query("UPDATE $user SET bluebalm = bluebalm + $qty");
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}    

// --------------------------------------------------------------  Brownie
if ($enemy =='Brownie') {
    $KLname = 'KLbrownie';
    $killXP = 1000;
    $currencyadd = rand(500, 1000);
    $rand=rand(1, 4);
    if ($rand==1) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==2) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==3) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
    if ($rand==4) {
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}  
// --------------------------------------------------------------  Harpy
if ($enemy =='Harpy') {
    $KLname = 'KLharpy';
    $killXP = 1000;
    $currencyadd = rand(500, 1000);
    $rand=rand(1, 4);
    if ($rand==1) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==2) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==3) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
    if ($rand==4) {
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}   
// --------------------------------------------------------------  Gorgon
if ($enemy =='Gorgon') {
    $KLname = 'KLgorgon';
    $killXP = 2000;
    $currencyadd = rand(500, 1000);
    $rand=rand(1, 4);
    if ($rand==1) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==2) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==3) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
    if ($rand==4) {
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}   
// --------------------------------------------------------------  Banshee
if ($enemy =='Banshee') {
    $KLname = 'KLbanshee';
    $killXP = 2000;
    $currencyadd = rand(500, 1000);
    $rand=rand(1, 4);
    if ($rand==1) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==2) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==3) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
    if ($rand==4) {
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}   
// --------------------------------------------------------------  Succubus
if ($enemy =='Succubus') {
    $KLname = 'KLsuccubus';
    $killXP = 3000;
    $currencyadd = rand(500, 1000);
    $rand=rand(1, 4);
    if ($rand==1) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==2) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==3) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
    if ($rand==4) {
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}   


// --------------------------------------------------------------  Magma Goblin
if ($enemy =='Magma Goblin') {
    $KLname = 'KLmagmagoblin';
    $killXP = 2000;
    $currencyadd = rand(1000, 2000);
    $rand=rand(1, 4);
    if ($rand==1) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==2) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==3) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
    if ($rand==4) {
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
} 
// --------------------------------------------------------------  Magma Kobold
if ($enemy =='Magma Kobold') {
    $KLname= 'KLmagmakobold';
    $killXP = 3000;
    $currencyadd = rand(1000, 2000);
    $rand=rand(1, 4);
    if ($rand==1) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==2) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==3) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
    if ($rand==4) {
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
} 
// --------------------------------------------------------------  Magma Orc
if ($enemy =='Magma Orc') {
    $KLname= 'KLmagmaorc';
    $killXP = 3000;
    $currencyadd = rand(1000, 2000);
    $rand=rand(1, 4);
    if ($rand==1) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==2) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==3) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
    if ($rand==4) {
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
} 
// --------------------------------------------------------------  Magma Ogre
if ($enemy =='Magma Ogre') {
    $KLname= 'KLmagmaogre';
    $killXP = 4000;
    $currencyadd = rand(1000, 2000);
    $rand=rand(1, 4);
    if ($rand==1) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==2) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==3) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
    if ($rand==4) {
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
} 
// --------------------------------------------------------------  Magma Troll
if ($enemy =='Magma Troll') {
    $KLname= 'KLmagmatroll';
    $killXP = 4000;
    $currencyadd = rand(1000, 2000);
    $rand=rand(1, 4);
    if ($rand==1) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        // $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==2) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Red Balm </span> ';
        updateStats($link, $username, [ 'redbalm' => $row['redbalm'] + $qty]); // -- update stat
    }
    if ($rand==3) { // 25%
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
    if ($rand==4) {
        $qty=rand(1, 2);
        $bonus = '<span>+ '.$qty.' Blue Balm </span> ';
        updateStats($link, $username, [ 'bluebalm' => $row['bluebalm'] + $qty]); // -- update stat
    }
//  ---- Don't change below here
$KLcount = $_SESSION[$KLname];
$updates = [ // -- set changes
    'xp' => $xp + $killXP,
    'currency' => $currency + $currencyadd,
    // $KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, [$KLname => $KLcount + 1],'users_kl'); // -- update kl stat
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
} 





// --------------------------------------------------------------  Volphina / The Random
if ($enemy =='Volphina') {

// $KLname = 'KLtherandom';
$killXP = 10;
$currencyadd = rand(1, 10000);

$bonus = '<span>+ Nothing Fool! ';

//  ---- Don't change below here
//$KLcount = $row[$KLname];
$updates = [ // -- set changes
'xp' => $xp + $killXP,
'currency' => $currency + $currencyadd
//$KLname => $KLcount + 1
]; 
updateStats($link, $username, $updates); // -- update stats
$message = $start ." + ". $currencyadd . " " . $_SESSION['currency'] . " + " . $killXP . " xp " . $bonusfirst . $bonusalways . $bonus . $open;
include('update_feed_alt.php'); // --- update feed
}



// --------------------------------------------------------------  END FIGHT!!!!
//  $results = $link->query("UPDATE $user SET endfight = 1");
//  $results = $link->query("UPDATE $user SET infight = 0");
//  $results = $link->query("UPDATE $user SET KLtotalkill = KLtotalkill + 1");

$updates = [ // -- set changes
    'endfight' => 1, // rooom safe
    'infight' => 0, // not in fight
    // 'KLtotalkill' => $KLtotalkill + 1,
]; 
updateStats($link, $username, $updates); // -- update stats
updateStats($link, $username, ['KLtotalkill' => $_SESSION['KLtotalkill'] + 1],'users_kl'); // -- update kl stat

// run createKillListVariables
createKillListVariables($link, $_SESSION['username']); // REFRESH KL VARIABLES
//}
