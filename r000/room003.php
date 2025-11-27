<?php
// -- 003 -- Wood Cabin - OLD MAN
$roomname = "Wood Cabin";
$lookdesc = $_SESSION['lookdesc' ] = $_SESSION['desc003'];
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


$gold = $row['currency'];
$xp = $row['xp'];
$flower = $row['flower'];
$quest1 = $row['quest1'];
$quest2 = $row['quest2'];
$quest3 = $row['quest3'];
$rawmeat = $row['rawmeat'];
$cookedmeat = $row['cookedmeat'];
$KLdummy = $_SESSION['KLdummy'];
$KLgiantrat = $_SESSION['KLgiantrat'];
$quest4 = $row['quest4'];
$youngsoldierFlag = $row['youngsoldierFlag'];


if ($input == 'attack' || $input == 'a' || $input == 'attack dummy' || $input == 'attack dummy again') {
    include('battle-dummy.php');
    // $results = $link->query("UPDATE $user SET KLdummy = 1"); // -- update KLdummy
    // $updates = [ // -- set changes
    //     'KLdummy' => 1
    // ]; 
    // updateStats($link, $username, $updates); // -- apply changes
    updateStats($link, $username, ['KLdummy' => $KLdummy + 1],'users_kl'); // -- update kl stat
}

elseif (($input == 'cook all meat' || $input == 'cook meat' || $input == 'cook raw meat') && $rawmeat >= 1) {
    $times = $rawmeat;
    echo $message = "<p>You <span class='red'>COOK</span> $times meat at the cabin fireplace. Tasty!</p>";
    include('update_feed.php'); // --- update feed

    // $results = $link->query("UPDATE $user SET rawmeat = rawmeat - $times");
    // $results = $link->query("UPDATE $user SET cookedmeat = cookedmeat + $times");

    $updates = [ // -- set changes
        'rawmeat' => $rawmeat - $times,
        'cookedmeat' => $cookedmeat + $times
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
}
elseif (($input == 'cook all meat' || $input == 'cook meat' || $input == 'cook raw meat') && $rawmeat <= 0) {
    echo $message = "<i>You have no raw meat to cook.</i><br>";
    include('update_feed.php'); // --- update feed
}
/*
else if($input=='ex old man') {  //ex old man
   echo $message ="The old man is just sitting here, smiling, rocking in his chair and staring out the window.<br>";
    include ('update_feed.php'); // --- update feed
}
else if($input=='ex chair') {  //ex rocking chair
   echo $message ="The rocking chair is old. Just like the man.<br>";
    include ('update_feed.php'); // --- update feed
}

else if($input=='ex cabin') {  //ex cabin
   echo $message ="The cabin is warm and cozy. A cooking fire burns here and the old man is rocking in his chair.<br>";
    include ('update_feed.php'); // --- update feed
}

else if($input=='ex dummy') {  //ex dummy
   echo $message ="The dummy is made out of wood and can be used to practice attacks.<br>";
    include ('update_feed.php'); // --- update feed
}
*/
elseif ($input == 'ex cabin') { //ex cabin
    echo $message = "<p>The cabin is warm and cozy. A cooking fire burns here and the old man is rocking in his chair. A wooden dummy is set up in the corner of the cabin for you to practice attacking.</p>";
    include('update_feed.php'); // --- update feed
}



// ---------------------- START ALL QUESTS ---------------------- //
elseif ($input=='start quests') {
    if ($quest1 < 1 || $quest2 < 1 || $quest3 < 1) {
        echo $message = '<div class="fbox">
        <h3 class="green padd">You start the Old Man\'s Quests</h3>
        <span class="icon green">'.file_get_contents("img/svg/npc/npc-oldman.svg").'</span>
        <p class="padd"><i>"Hey there young whippersnapper, I could use the help of a bright adventurer like yourself.</i></p>
        <p class="gray">Check your <span class="gold"> Quests</span> tab to review what needs to be done.</p>
        <a href data-link="quests" class="btn goldBG">Open Quests </a>
        </div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET quest1 = 1");
        // $results = $link->query("UPDATE $user SET quest2 = 1");
        // $results = $link->query("UPDATE $user SET quest3 = 1");

        $updates = [ // -- set changes
            'quest1' => 1,
            'quest2' => 1,
            'quest3' => 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes

    }
}

// -------------------------------------------------------------------------- QUEST 1 -
if ($input == 'info 1') {
    echo $message = "<div class='menuAction'>
	<strong class='green'>Quest 1 Info</strong>
	<p>The Old Man will reward you if you bring him a flower. You can find a flower patch just north of here.</p></div>";
    include('update_feed.php'); // --- update feed
} elseif ($input == 'complete 1') {
    if ($quest1 == 1 && $flower != 1) {
        echo $message = "<div class='menuAction'>
		<strong class='green'>Quest 1 Not Complete</strong>
		<p>You need to have a flower to complete this Quest. You can find one in the patch north of here.</p></div>";
        include('update_feed.php'); // --- update feed
    } elseif ($quest1 == 1 && $flower == 1) {
        echo $message = "
		<div class='questWin'><h3>Quest 1 Completed!</h3>
		<h4>A Flower for my Wife</h4>
		<p>You give the flower to the old man. He smiles and thanks you. He says he will be putting the flower on her grave later tonight. He gives you some ".$_SESSION['currency']." and you gain xp.</p>
		<h4>Rewards</h4>
		[ + 5 xp ]<br>
		[ + 10 ".$_SESSION['currency']." ]</div>";

        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET flower = flower - 1");
        // $results = $link->query("UPDATE $user SET xp = xp + 5");
        // $results = $link->query("UPDATE $user SET currency = currency + 10");
        // $results = $link->query("UPDATE $user SET quest1 = 2");

        $updates = [ // -- set changes
            'quest1' => 2,
            'xp' => $xp + 5,
            'flower' => $flower - 1,
            'currency' => $currency + 10
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
    }
}



// -------------------------------------------------------------------------- QUEST 2 -
elseif ($input == 'info 2') {
    echo $message = "<div class='menuAction'>
	<strong class='green'>Quest 2 Info</strong>
	<p>There is a wooden practice dummy standing in the corner of the room. You can fight the dummy with no risk of getting hurt. ATTACK.</p></div>";
    include('update_feed.php'); // --- update feed
} elseif ($input == 'complete 2') {
    if ($quest2 == 1 && $KLdummy >= 1) {
        echo $message = "
		<div class='questWin'><h3>Quest 2 Completed!</h3>
		<h4>Practice on the Dummy</h4>
		<p>You have proven to the old man that you can indeed attack a lifeless dummy. He gives you a dagger and some ".$_SESSION['currency'].". Before you take on the next quest, you should get a sword and shield west of here.</p>
	  	<h4>Rewards</h4>
  	  	[ + 5 xp ]<br>
      	[ + 10 ".$_SESSION['currency']." ]<br>
	  	[ + dagger! ( +1 str ) ]</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET currency = currency + 10");
        // $results = $link->query("UPDATE $user SET xp = xp + 5");
        // $results = $link->query("UPDATE $user SET dagger = dagger + 1");
        // $results = $link->query("UPDATE $user SET quest2 = 2");

        $updates = [ // -- set changes
            'quest2' => 2,
            'xp' => $xp + 5,
            'dagger' => $dagger + 1,
            'currency' => $currency + 10
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($quest2 == 1 && $KLdummy == 0) {
        echo $message = "<div class='menuAction'>
		<strong class='green'>Quest 2 Not Complete</strong>
		<p>Attack the dummy in this room as much as you like. Speak to the Old Man when you are done for a reward.</p></div>";
        include('update_feed.php'); // --- update feed
    }
}



// -------------------------------------------------------------------------- QUEST 3
if ($input == 'info 3') {
    echo $message = "<div class='menuAction'>
	<strong class='green'>Quest 3 Info</strong>
	<p>The Old Man has a Rat Problem. Go down into the Basement and exterminate a Giant Rat.</p></div>";
    include('update_feed.php'); // --- update feed
} elseif ($input == 'complete 3') {
    if ($KLgiantrat >= 1 && $quest3 == 1) {
        echo $message = "
		<div class='questWin'><h3>Quest 3 Completed!</h3>
		<h4>Rat Problem</h4>
		<p>You have killed a Giant Rat! The Old Man will now allow you to use his fire. Cook the raw meat you get from rats and other animals to make some delicious steaks that heal 50 HP when eaten. Go ahead and COOK MEAT.</p>
	  	<h4>Rewards</h4>
  	  	[ + 10 xp  ]<br />
      	[ + 30 ".$_SESSION['currency']." ]<br>
		[ + 5 raw meat ]<br>
		[ can cook meat here! ]</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET currency = currency + 30");
        // $results = $link->query("UPDATE $user SET rawmeat = rawmeat + 5");
        // $results = $link->query("UPDATE $user SET xp = xp + 10");
        // $results = $link->query("UPDATE $user SET quest3 = 2");
        $updates = [ // -- set changes
            'quest3' => 2,
            'xp' => $xp + 10,
            'rawmeat' => $rawmeat + 5,
            'currency' => $currency + 30
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($quest3 == 1) {
        echo $message = "<div class='menuAction'>
		<strong class='green'>Quest 3 Not Complete</strong>
		<p>Go down into the basement and exterminate a Giant Rat.</p></div>";
        include('update_feed.php'); // --- update feed
    }
}


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '004';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'east') {     $roomNum = '002';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'northeast') { $roomNum = '001';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');}  
elseif ($input == 'northwest') { $roomNum = '014';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'west') {     
    $roomNum = '003c';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');
    if ($youngsoldierFlag==0) {
        $updates = ['youngsoldierFlag' => 1]; // -- set change
        updateStats($link, $username, $updates); // -- apply change
        echo  $message = "<div class='menuAction'>You can now learn the 1h Weapons, 2h Weapon & Toughness SKILLS!</div> ";
        include('update_feed_alt.php'); // --- update feed
     }    
} 
elseif ($input == 'sw' || $input == 'southwest') {
    if ($KLgiantrat < 1) {
        echo $message = "<div class='menuAction'> Whoa there! There's a dangerous Gator to the southwest! Prove to me you can defeat a Giant Rat and then you can enter the Marsh.</div>";
        include('update_feed.php'); // --- update feed
    } else {
        echo 'You travel southwest<br>';
        $message = "<i>You travel southwest</i><br>" . $_SESSION['desc013'];
        include('update_feed.php'); // --- update feed
        $updates = ['room' => '013', 'endfight' => 0]; // -- room change + reset fight
        updateStats($link, $username, $updates); // -- apply changes
    }
} elseif ($input == 'down' || $input == 'd') {
    if ($quest4 < 2) {
        echo $message = "<div class='menuAction'>Whoa Whoa Whoa! you'll need to equip a weapon before you can enter the basement! Go west of here and talk to the Young Soldier to get one. You can enter once you complete his first quest.</div>";
        include('update_feed.php'); // --- update feed
    } else {
        echo 'You travel down into the basement<br>';
        $message = "<i>You travel down into the basement</i><br>" . $_SESSION['desc003b'];
        include('update_feed.php'); // --- update feed
        $updates = ['room' => '003b', 'endfight' => 0]; // -- room change + reset fight
        updateStats($link, $username, $updates); // -- apply changes
    }
}
// ----------------------------------- end of room function
include('function-end.php');
