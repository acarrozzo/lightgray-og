<?php
// -- 003c -- Weapons Training Area - Young Soldier
$roomname = "Weapons Training Area";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc003c'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level


include('function-start.php');


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




$currency=$row['currency'];
    $xp=$row['xp'];
    $cookedmeat=$row['cookedmeat'];
    $quest4=$row['quest4'];
    $quest5=$row['quest5'];
    $quest6=$row['quest6'];
    $trainingsword=$row['trainingsword'];
    $training2hsword=$row['training2hsword'];
    $trainingshield=$row['trainingshield'];
    $soldiersring=$row['soldiersring'];

    $traininghelmet=$row['traininghelmet'];
    $trainingarmor=$row['trainingarmor'];
    $traininggloves=$row['traininggloves'];
    $trainingboots=$row['trainingboots'];
    $equipHead=$row['equipHead'];
    $equipBody=$row['equipBody'];
    $equipHands=$row['equipHands'];
    $equipFeet=$row['equipFeet'];

    $masterblade=$row['masterblade'];
    $equipR=$row['equipR'];
    $equipL=$row['equipL'];
    $scorpiontail=$row['scorpiontail'];

    $youngsoldierFlag = $row['youngsoldierFlag'];

//}




if ($input == 'attack' || $input == 'a' || $input == 'attack dummy' || $input == 'attack dummy again') {
    include('battle-dummy.php');
    // $results = $link->query("UPDATE $user SET KLdummy = 1"); // -- update KLdummy
    // $updates = [ // -- set changes
    //     'KLdummy' => 1
    // ]; 
    // updateStats($link, $username, $updates); // -- apply changes
    updateStats($link, $username, ['KLdummy' => $KLdummy + 1],'users_kl'); // -- update kl stat
}

// ---------------------- START ALL QUESTS ---------------------- //
if ($input=='start quests') {
    if ($quest4 <1 || $quest5 <1 || $quest6 <1) {
    echo $message = '<div class="fbox">
    <h3 class="gold padd">You start the Young Soldier\   Quests</h3>
    <span class="icon blue ">'.file_get_contents("img/svg/npc/npc-youngsoldier.svg").'</span>
    <p class="padd"><i>"Hello there Young Adventurer. I\'m a Young Soldier sent here from Domus to assist you. Feel free to take any of the training weapons here.</i></p>
    <p class="gray">Check your <span class="gold"> Quests</span> tab to review what needs to be done.</p>
    <a href data-link="quests" class="btn goldBG">Open Quests</a>
    </div>';
    include('update_feed.php'); // --- update feed
    // $results = $link->query("UPDATE $user SET quest4 = 1");
    // $results = $link->query("UPDATE $user SET quest5 = 1");
    // $results = $link->query("UPDATE $user SET quest6 = 1");
        $updates = [ // -- set changes
        'quest4' => 1,
        'quest5' => 1,
        'quest6' => 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
    }
}


// ---------------------- QUEST 4) My first sword and shield ---------------------- //
if ($input=='info 4') {
    echo $message="<div class='menuAction'>
		<strong class='green'>Quest 4 Info</strong><p>
		If you're going to adventure beyond the Grassy Field you're going to need some good equipment. Go ahead and grab a Training Sword and Shield and equip them both using the WEAP menu.</p></div>";
    include('update_feed.php'); // --- update feed
} elseif ($input=='complete 4') {
    if ($quest4 == 1 && $equipR != 'fists' && $trainingsword >= 1) {
        echo $message="
		<div class='questWin'>
		<h3>Quest 4 Completed!</h3>
		<h4>My First Sword and Shield</h4>
		<p>You show the Young Soldier that you can indeed equip a sword. As a reward you are handed 5 scrumptious steaks. Time to explore the Spider Cave.</p>
	  	<h4>Rewards</h4>
  	  	[ + 10 xp ]<br />
		[ + 30 ".$_SESSION['currency']." ]<br />
		[ + 5 Cooked Meat! ]</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET quest4 = 2");
        // $results = $link->query("UPDATE $user SET xp = xp + 10");
        // $results = $link->query("UPDATE $user SET gold = gold + 30");
        // $results = $link->query("UPDATE $user SET cookedmeat = cookedmeat + 5");
        $updates = [ // -- set changes
            'quest4' => 2,
            'xp' => $xp + 10,
            'currency' => $currency + 30,
            'cookedmeat' => $cookedmeat + 5
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($quest4 == 1) {
        echo $message="<div class='menuAction'>
		<strong class='green'>Quest 4 Not Complete</strong>
		<p>You need to equip a weapon. Pick one up here and equip it using your INV menu.</p></div>";
        include('update_feed.php'); // --- update feed
    }
}







// ---------------------- QUEST 5) Collect 5 Scorpion Tails ---------------------- //
if ($input=='info 5') {
    echo $message="<div class='menuAction'>
		<strong class='green'>Quest 5 Info</strong>
		<p>Take your new Sword and Shield and go slay some Scorpions in the Spider Cave east of here. Return with 5 Tails to receive your first Golden Key!</p></div>";
    include('update_feed.php'); // --- update feed
} elseif ($input=='complete 5') {
    if ($quest5 == 1 && $scorpiontail >= '5') {
        echo $message="
		<div class='questWin'>
		<h3>Quest 5 Completed!</h3>
		<h4>Collect 5 Scorpion Tails</h4>
		You hand over 5 Scorpion Tails. The Soldier hands you a shiny gold key. You should go and see if it opens the gold chest at the Crossroads.
	  	<h4>Rewards</h4>
  	  	[ + 20 xp ]<br />
		[ + 50 ".$_SESSION['currency']." ]<br />
		[ + Soldier's Ring! (+2 str, +2 def) ]<br />
		[ + Gold Key! ]</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET quest5 = 2");
        // $results = $link->query("UPDATE $user SET currency = currency + 50");
        // $results = $link->query("UPDATE $user SET soldiersring = soldiersring + 1");
        // $results = $link->query("UPDATE $user SET goldkey = goldkey + 1");
        // $results = $link->query("UPDATE $user SET xp = xp + 20");
        // $results = $link->query("UPDATE $user SET scorpiontail = scorpiontail - 5");
        $updates = [ // -- set changes
            'quest5' => 2,
            'xp' => $xp + 20,   
            'currency' => $currency + 50,
            'soldiersring' => $soldiersring + 1,
            'scorpiontail' => $scorpiontail - 5,
            'goldkey' => $goldkey + 1
         ]; 
          updateStats($link, $username, $updates); // -- apply changes
    } elseif ($quest5 == 1) {
        echo $message="<div class='menuAction'>
		<strong class='green'>Quest 5 Not Complete</strong>
		<p>You have $scorpiontail Scorpion Tails. Get some more from the Spider Cave southeast of the Crossroads.</p></div>";
        include('update_feed.php'); // --- update feed
    }
}



// ---------------------- QUEST 6) Training Armor Pro ---------------------- //
if ($input=='info 6') {
    echo $message="<div class='menuAction'>
		<strong class='green'>Quest 6 Info</strong>
		<p>Think you're a pro? Go and collect the rest of the training armor set and return here with it all equipped. You will need to find the training helmet, armor, gloves and boots. Check your Quests tab to see what enemies drop them.</p></div>";
    include('update_feed.php'); // --- update feed
} elseif ($input=='complete 6') {
    if ($quest6 == 1 && $traininghelmet >= '1'
    && $trainingarmor >= '1'
    && $traininggloves >= '1'
    && $trainingboots >= '1') {
        echo $message="
        <div class='questWin'>
        <h3>Quest 6 Completed!</h3>
        <h4>Training Armor Pro</h4>
        <p>You show the Young Soldier that you have acquired and equipped the rest of the Training Set! You are handed a very strong piece of Training Armor.</p>
        <h4>Rewards</h4>
        [ + 50 xp ]<br />
        [ + 100 ".$_SESSION['currency']." ]<br />
        [ + Training Armor Pro ( <i class='gold'>+5</i> def, <i class='red'>+1</i> str, <i class='green'>+1</i> dex ) ]</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET quest6 = 2");
        // $results = $link->query("UPDATE $user SET currency = currency + 100");
        // $results = $link->query("UPDATE $user SET trainingarmorpro = trainingarmorpro + 1");
        // $results = $link->query("UPDATE $user SET equipBody = 'training armor pro'");
        // $results = $link->query("UPDATE $user SET xp = xp + 50");
        $updates = [ // -- set changes
            'quest6' => 2,
            'xp' => $xp + 50,
            'currency' => $currency + 100,
            'trainingarmorpro' => $trainingarmorpro + 1,
            'equipBody' => 'training armor pro'
            ]; 
        updateStats($link, $username, $updates); // -- apply changes

    } elseif ($quest6 == 1) {
        echo $message="<div class='menuAction'>
		<strong class='green'>Quest 6 Not Complete</strong>
		<p>You need to equip a Training Helmet, Armor, Gloves & Boots. Certain enemies will drop them, check your Quests tab.</p></div>";
        include('update_feed.php'); // --- update feed
    }
}



// -------------------------------------------------------------------------- Room Commands
elseif ($input=='get training sword' || $input=='get sword'|| $input=='pick up sword and shield'|| $input=='pick up weapons'|| $input=='get weapons' || $input=='get training 2h sword' || $input=='pick up 2-handed sword') {
    if ($quest4 == 1 && $equipR != 'fists' && $trainingsword != 0) {
        echo $message="<div class='menuAction'>You have equipped a weapon! Open the QUESTS tab to complete this quest.
        <a href='' data-link='quests' class='btn goldBG'>Open Quests</a>
        </div>";
        include('update_feed.php'); // --- update feed
    }
    else if ($trainingsword >= 1) {
        echo $message="<div class='menuAction'>You already have the training weapons. Go to your inventory [INV] and equip one of the swords.
        <a href='' data-link='inv' class='btn greenBG'>Open Inv</a>
        </div>";
        include('update_feed.php'); // --- update feed
    // } elseif ($quest4 == 0) {
    //     echo $message="<div class='menuAction'>You need to start the Young Soldier's quests before you can pick up any weapons. Go to QUESTS and START QUESTS.<br>
    //     <a href='' data-link='quests' class='btn goldBG'>Open Quests</a>
    //     </div>";
    //     include('update_feed.php'); // --- update feed
    } else {
        echo $message="<div class='menuAction'>You grab a training sword, a shield, and a two-handed sword off the weapon rack and place it in your pack.
        <a href='' data-link='inv' class='btn greenBG'>Open Inv</a>
        </div>";
        include('update_feed.php'); // --- update feed 
       // $results = $link->query("UPDATE $user SET trainingsword = 1");
       // $results = $link->query("UPDATE $user SET trainingshield = 1");
       // $results = $link->query("UPDATE $user SET training2hsword = 1");
        $updates = [ // -- set changes
            'trainingsword' => 1,
            'trainingshield' => 1,
            'training2hsword' => 1
         ]; 
          updateStats($link, $username, $updates); // -- apply changes
    }
}


// // -------------------------DB CONNECT! - RECALCULATE FOR GOLD KEY AND SKILLS TEACH
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
//     $quest4=$row['quest4'];
//     $quest5=$row['quest5'];
//     $quest6=$row['quest6'];
//     $goldkey=$row['goldkey'];
//     $chest1=$row['chest1'];
// }

//     if ($quest4 == 2 && $quest5 == 2 && $quest6 == 2  && $goldkey == 0 && $chest1 == 0) {
//         echo $message = "<div class='menuAction'>You have completed all the Young Soldier's Quests! <br>
// He hands you a shiny GOLD KEY!</div>";
//         include('update_feed.php'); // --- update feed
//        // $results = $link->query("UPDATE $user SET goldkey = goldkey + 1");
//         $updates = ['goldkey' => $goldkey + 1]; // -- set change
//         updateStats($link, $username, $updates); // -- apply change
        
//     }


// ---------------------- SKILL FLAG! ---------------------- //
//if ($quest4 == 2 && $youngsoldierFlag==0) {
if ($youngsoldierFlag==0) {
    echo  $message = "<div class='menuAction'>You can now learn the 1h Weapons, 2h Weapon & Toughness SKILLS!</div> ";
    include('update_feed.php'); // --- update feed
    $updates = ['youngsoldierFlag' => 1]; // -- set change
    updateStats($link, $username, $updates); // -- apply change
}




// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '003';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'northeast') { $roomNum = '004';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'southwest') { 
    echo 'You jump down to the Sand Crab Nest!<br>';
    $message = "<i>You jump down to the Sand Crab Nest!</i><br>" . $_SESSION[ 'desc019' ];
    include('update_feed.php'); // --- update feed
    $updates = ['room' => '019', 'endfight' => 0]; // -- room change + reset fight
    updateStats($link, $username, $updates); // -- apply changes
} 
elseif ($input == 'northwest') { 
    echo 'You jump down to the beach!<br>';
    $message = "<i>You jump down to the beach!</i><br>" . $_SESSION[ 'desc017' ];
    include('update_feed.php'); // --- update feed
    $updates = ['room' => '017', 'endfight' => 0]; // -- room change + reset fight
    updateStats($link, $username, $updates); // -- apply changes
} 
elseif ($input == 'down') { 
    echo 'You go down into the basement!<br>';
    $message = "<i>You go down into the basement!</i><br>" . $_SESSION[ 'desc003bb' ];
    include('update_feed.php'); // --- update feed
    $updates = ['room' => '003bb', 'endfight' => 0]; // -- room change + reset fight
    updateStats($link, $username, $updates); // -- apply changes
}


// ----------------------------------- end of room function
include('function-end.php');
