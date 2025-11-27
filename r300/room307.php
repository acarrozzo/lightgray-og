<?php
						$roomname = "Dwarf Village Square";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc307'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

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

$teleport5 = $row['teleport5'];

$quest38=$row['quest38'];
$quest39=$row['quest39'];
$quest40=$row['quest40'];

$KLredbeard=$_SESSION['KLredbeard'];
$KLtrollking=$_SESSION['KLtrollking'];
$KLgatekeeper=$_SESSION['KLgatekeeper'];

$axeofslaughter=$row['axeofslaughter'];
$staffofthescorpion=$row['staffofthescorpion'];
$gildedfalcion=$row['gildedfalcion'];


$goblin_count = $_SESSION['KLgoblin'] + $_SESSION['KLgoblinbandit'] + $_SESSION['KLgoblinchief'] + $_SESSION['KLhobgoblin'];
$ogre_count = $_SESSION['KLogre'] + $_SESSION['KLogreguard'] + $_SESSION['KLfireogress'] + $_SESSION['KLogrelieutenant'] + $_SESSION['KLogrepriest'] + $_SESSION['KLhillogre'];
$kobold_count = $_SESSION['KLkobold'] + $_SESSION['KLflyingkobold'] + $_SESSION['KLkoboldshaman'] + $_SESSION['KLkoboldninja'] + $_SESSION['KLkoboldwarlock'] + $_SESSION['KLkoboldchampion'] + $_SESSION['KLkoboldmaster'] + $_SESSION['KLkoboldmonk'];
$bandit_count = $_SESSION['KLredbandit'] + $_SESSION['KLbanditmarauder'] + $_SESSION['KLthief'] + $_SESSION['KLthiefbrute'] + $_SESSION['KLthiefpickpocket'] + $_SESSION['KLmasterthief'];
$troll_count = $_SESSION['KLtroll'] + $_SESSION['KLtrollshaman'] + $_SESSION['KLtrollsorcerer'] + $_SESSION['KLtrollelder'] + $_SESSION['KLtrollchampion'] + $_SESSION['KLtrollqueen'] + $_SESSION['KLtrollking'];

// -------------------------------------------------------------------------- Activate Rocky Flats Teleport
if ($teleport5 == 0) { 	
	// $results = $link->query("UPDATE $user SET teleport5 = 1");
	updateStats($link, $username,['teleport5' => 1 ]); // -- update stat 
	echo $message="<i>You can now teleport to the Rocky Flats! Click 'Rocky Flats' to teleport to this location at any time. </i><br>";
	include ('update_feed.php'); // --- update feed	  
	}	


// -------------------------------------------------------------------------- READ SIGN!
else if($input=='read sign') {  //read sign
   echo '   <i>You read the Dwarf Village Directory</i> <br>  ';
   $message="
   <i>you read the sign:</i>   
   <div class='sign'>
   <h3>Dwarf Village<i>Directory</i></h3>
   	<form id='mainForm' method='post' action='' name='formInput'>

<span class='direc'><input type='submit' name='input1' value='northwest' /></span> <span class='hilight'>Dwarf Treasury</span> <i>Gold Chest, Silver Chest</i><br />
<span class='direc'><input type='submit' name='input1' value='north' /></span> <span class='hilight'>Silver Shop</span> <i>Expensive Armor & Weapons</i><br />
<span class='direc'><input type='submit' name='input1' value='northeast' /></span> <span class='hilight'>Neverending Mine</span> <i>Mine Stone, Iron, Coal and Mithril</i><br />
<span class='direc'><input type='submit' name='input1' value='east' /></span> <span class='hilight'>Mining Guild</span> <i>Forge, Mining Supplies & Quests 31-34</i> <br />
<span class='direc'><input type='submit' name='input1' value='southwest' /></span> <span class='hilight'>Rocky Flats Crossroads</span> <i>Quests 35-37</i><br />
</form></div>"; 
include ('update_feed.php'); // --- update feed	
}
//<span class='direc'><input type='submit' name='input1' value='south' /></span> <span class='hilight'>Dwarf Guard Bounty Board</span> <i>Quests 38-40</i><br />


// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
		// $query = $link->query("UPDATE $user SET hp = $hpmax + 50 "); 
		// $query = $link->query("UPDATE $user SET mp = $mpmax + 50 "); 
		echo $message = "You rest at the roaring furnace and supercharge! (+50 HP, +50 MP)<br>";
		include ('update_feed.php'); // --- update feed
		//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		//  updateStats($link, $username, ['endfight' => 0]); // -- update stats
		 $updates = [ // -- set changes
			'hp' => $hpmax + 50,
			'mp' => $mpmax + 50
		]; 
		updateStats($link, $_SESSION['username'], $updates); // -- update 
}











	// ---------------------- START ALL QUESTS ---------------------- //
  if($input=='start quests') {
	 if ($quest38 <1 || $quest39 <1 || $quest40 <1) {
		/*
		echo $message = "<div class='menuAction'>
		<p class='gold'>You start the Dwarf Bounty Board Quests! (38 - 40)</p>
		<p>Check your Quests tab to review what needs to be done.</p>
        <a href='' data-link='quests' class='btn goldBG'>Open Quests</a>
		</div> "; 
		*/   

				
		echo $message = '<div class="fbox">
		<h3 class="padd gold">You start the Dwarf Bounty Board Quests!</h3>
		<span class="icon gold">'.file_get_contents("img/svg/npc/npc-bountyboard.svg").'</span>
		<p class="padd"><i>"Huge Rewards!"</i></p>
		<a href data-link="quests" class="btn goldBG">Open Quests </a>
		</div>';



		include ('update_feed.php'); // --- update feed
   		// $results = $link->query("UPDATE $user SET quest38 = 1");
   		// $results = $link->query("UPDATE $user SET quest39 = 1");
   		// $results = $link->query("UPDATE $user SET quest40 = 1");
		   $updates = [ // -- set changes
			'quest38' => 1,
			'quest39' => 1,
			'quest40' => 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	  	}
}





// ---------------------- QUEST 38) Grunt Bounty ---------------------- //
if($input=='info 38') {
		echo $message="<div class='menuAction'><strong class='green'>Quest 38 Info</strong><br>
		Vicious beasts roam the land. In order to help the people of Vega, you must defeat 10 of each of the following creatures: Goblins, Ogres, Kobolds, Skeletons, Bandits, and Trolls. This will be a great service to the realm.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 38')
{	if ($quest38 == 1 && $goblin_count >= 10 && $ogre_count >= 10 && $kobold_count >= 10 && $bandit_count >= 10 && $troll_count >= 10)
	{	echo $message="<div class='questWin'>
		<h3>Quest 38 Completed!</h3>
		<h4>Grunt Bounty</h4>
		Hurrah! You have defeated many vile creatures and made this land much safer! As a reward, you are handed a deadly Axe of Slaughter and huge amount of coin.
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 10,000 ".$_SESSION['currency']." ]<br />
      	[ + Axe of Slaughter! ]</div>";
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 1000");
	   	// $results = $link->query("UPDATE $user SET currency = currency + 10000");
		// $results = $link->query("UPDATE $user SET axeofslaughter = axeofslaughter + 1");
		// $results = $link->query("UPDATE $user SET quest38 = 2");
		$updates = [ // -- set changes
			'quest38' => 2,
			'xp' => $xp + 1000,
			'currency' => $currency + 10000,
			'axeofslaughter' => $axeofslaughter + 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	}
	else if ($quest38 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 38 Not Complete</strong><br>
		To complete this quest you need to defeat 10 of each of the following creatures: Goblins, Ogres, Kobolds, Skeletons, Bandits, and Trolls. Find them roaming the roads, the forests, and dungeons.</div>";
		include ('update_feed.php'); // --- update feed
	}
}

// ---------------------- QUEST 39) B-Squad Bounty ---------------------- //
if($input=='info 39') {
		echo $message="<div class='menuAction'><strong class='green'>Quest 39 Info</strong><br>
		There are some second rate bosses that need to be dealt with in order to protect the realm. These inferior beings pose a threat to the safety and well-being of the land and its inhabitants. By defeating them, you will be doing a great service to the people of this realm and helping to restore peace and order.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 39')
{	if ($quest39 == 1 && $_SESSION['KLhillogre']>=1 && $_SESSION['KLscorpionqueen']>=1 && $_SESSION['KLbutcher']>=1)
	{	echo $message="<div class='questWin'>
		<h3>Quest 39 Completed!</h3>
		<h4>B-Squad Bounty</h4>
		Congratulations! You have defeated the somewhat impressive B-Squad! You are handed a very powerful magical staff and big time XP and ".$_SESSION['currency']."!
	  	<h4>Rewards</h4>
  	  	[ + 2000 xp  ]<br />
      	[ + 10,000 ".$_SESSION['currency']." ]<br />
      	[ + Staff of the Scorpion! ]</div>";
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 2000");
	   	// $results = $link->query("UPDATE $user SET currency = currency + 10000");
		// $results = $link->query("UPDATE $user SET staffofthescorpion = staffofthescorpion + 1");
		// $results = $link->query("UPDATE $user SET quest39 = 2");
		$updates = [ // -- set changes
			'quest39' => 2,
			'xp' => $xp + 2000,
			'currency' => $currency + 10000,
			'staffofthescorpion' => $staffofthescorpion + 1
		];
		updateStats($link, $username, $updates); // -- apply changes
	}
	else if ($quest39 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 39 Not Complete</strong><br>
		To complete this quest you need to defeat the Hill Ogre, Scorpion Queen, and the Butcher.</div>";
		include ('update_feed.php'); // --- update feed
	}
}

// ---------------------- QUEST 40) Elite Bounty ---------------------- //
if($input=='info 40') {
		echo $message="<div class='menuAction'><strong class='green'>Quest 40 Info</strong><br>
		There are some powerful bosses that must be defeated in order to rid the realm of evil. These formidable creatures, King Squid, the Stone Sphinx, and the Gatekeeper, pose a great threat to the land and its inhabitants. In order to protect the people of this realm, you must vanquish these bosses and restore peace and order.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 40')
{	if ($quest40 == 1 && $_SESSION['KLkingsquid']>=1 && $_SESSION['KLstonesphinx']>=1 && $_SESSION['KLgatekeeper']>=1)
	{	echo $message="<div class='questWin'>
		<h3>Quest 40 Completed!</h3>
		<h4>Elite Bounty</h4>
		Congrats Killer! You have indeed defeated King Squid, the Stone Sphinx, and the powerful Gatekeeper! Your reward is the indomitable Gilded Falcion! and big time XP and coin.
	  	<h4>Rewards</h4>
  	  	[ + 10,000 xp  ]<br />
      	[ + 20,000 ".$_SESSION['currency']." ]<br />
      	[ + Gilded Falcion! ]</div>";
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 10000");
	   	// $results = $link->query("UPDATE $user SET currency = currency + 20000");
		// $results = $link->query("UPDATE $user SET gildedfalcion = gildedfalcion + 1");
		// $results = $link->query("UPDATE $user SET quest40 = 2");
		$updates = [ // -- set changes
			'quest40' => 2,
			'xp' => $xp + 10000,
			'currency' => $currency + 20000,
			'gildedfalcion' => $gildedfalcion + 1
		];
		updateStats($link, $username, $updates); // -- apply changes
	}
	else if ($quest40 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 40 Not Complete</strong><br>
		To complete this quest you need to defeat King Squid, the Stone Sphinx, and the Gatekeeper.</div>";
		include ('update_feed.php'); // --- update feed
	}
}




























// -------------------------------------------------------------------------- Battle TRAVEL
if ((	$input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='east' || $input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' || $input=='down' )  && $infight >= 1) {
	echo 'You cannot leave the room in the middle of battle!<br>';
   	$message="<i>You cannot leave the room in the middle of battle!</i><br>";
	include ('update_feed.php'); // --- update feed
	}

// -------------------------------------------------------------------------- TRAVEL
// else if($input=='nw' || $input=='northwest') 
// {			echo 'You travel northwest<br>';
//    	$message="<i>You travel northwest</i><br>".$_SESSION['desc309'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 309"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='n' || $input=='north') 
// {			echo 'You travel north<br>';
//    	$message="<i>You travel north</i><br>".$_SESSION['desc310'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 310"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='ne' || $input=='northeast') 
// {			echo 'You travel northeast<br>';
//    	$message="<i>You travel northeast</i><br>".$_SESSION['desc311'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 311"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='e' || $input=='east') 
// {			echo 'You travel east<br>';
//    	$message="<i>You travel east</i><br>".$_SESSION['desc308'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 308"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='sw' || $input=='southwest') 
// {			echo 'You travel southwest<br>';
//    	$message="<i>You travel southwest</i><br>".$_SESSION['desc303'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 303"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='s' || $input=='south') 
// {			echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc306'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 306"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '310';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'east') {     $roomNum = '308';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'south') {    $roomNum = '306';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northeast') { $roomNum = '311';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southwest') { $roomNum = '303';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northwest') { $roomNum = '309';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>