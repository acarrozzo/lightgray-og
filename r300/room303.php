<?php
						$roomname = "Rocky Flats Crossroads - Dwarf Captain";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc303'];
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


$quest35=$row['quest35']; 
$quest36=$row['quest36']; 
$quest37=$row['quest37']; 
$teleport5 = $row['teleport5'];

$KLrabidskeever=$_SESSION['KLrabidskeever']; 
$KLbleedingdartwing=$_SESSION['KLbleedingdartwing']; 
$KLmongoliandeathworm=$_SESSION['KLmongoliandeathworm']; 
$KLglowingoctopus=$_SESSION['KLglowingoctopus']; 
$KLpossessedaxeman=$_SESSION['KLpossessedaxeman']; 




// -------------------------------------------------------------------------- Activate Rocky Flats Teleport
if ($teleport5 == 0) { 	
	// $results = $link->query("UPDATE $user SET teleport5 = 1");
	updateStats($link, $username,['teleport5' => 1 ]); // -- update stat 
	echo $message="<i>You can now teleport to the Rocky Flats! Click 'Rocky Flats' to teleport to this location at any time. </i><br>";
	include ('update_feed.php'); // --- update feed	  
	}	
	
// -------------------------------------------------------------------------- READ SIGN!
else if($input=='read sign') {  //read sign
	echo '   <i>You read the Rocky Flats Map Directory</i> <br>  ';
	$message="
	<i>you read the sign:</i>   
	<div class='sign'>
	<h3>Rocky Flats<i>Directory</i></h3>
	<form id='mainForm' method='post' action='' name='formInput'>
	<span class='direc'><input type='submit' name='input1' value='ne' /></span> <span class='hilight'>Dwarf Village</span> <i>Mining Guild, Neverending Mine, Silver Shop</i><br />
	<span class='direc'><input type='submit' name='input1' value='east' /></span> <span class='hilight'>Dwarf Guard Bounty Board</span> <i>Quests 38-40</i><br />
	<span class='direc'><input type='submit' name='input1' value='se' /></span> <span class='hilight'>Path to Red Town</span><i></i> <br />
	<span class='direc'><input type='submit' name='input1' value='south' /></span> <span class='hilight'>Red Fort, Stone Grotto</span> <i></i><br />
	<span class='direc'><input type='submit' name='input1' value='west' /></span> <span class='hilight'>Abandoned Mine</span> <i>Path to the Swamp</i><br />
	<span class='direc'><input type='submit' name='input1' value='nw' /></span> <span class='hilight'>Path to Grassy Field</span> <i>Path to Ocean</i> <br />
	</form></div>"; 
include ('update_feed.php'); // --- update feed	
}

if ($quest35 == 2 && $quest36 == 2 && $quest37 == 2) {	
	}
	// ---------------------- START ALL QUESTS ---------------------- //
  if($input=='start quests') {
	 if ($quest35 <1 || $quest36 <1 || $quest37 <1) {			
		echo $message = '<div class="fbox">
		<h3 class="padd gold">You start the Dwarf Captain\'s Quests!</h3>
		<span class="icon gold">'.file_get_contents("img/svg/npc/npc-dwarfcaptain.svg").'</span>
		<p class="padd"><i>"The Rocky Flats is full of danger."</i></p>
		<a href data-link="quests" class="btn goldBG">Open Quests </a>
		</div>';
		include ('update_feed.php'); // --- update feed
   		// $results = $link->query("UPDATE $user SET quest35 = 1");
   		// $results = $link->query("UPDATE $user SET quest36 = 1");
   		// $results = $link->query("UPDATE $user SET quest37 = 1");
		$updates = [ // -- set changes
			'quest35' => 1,
			'quest36' => 1,
			'quest37' => 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	  	}
}
			
// ---------------------- QUEST 35) Clear out the Abandoned Mine ---------------------- //
if($input=='info 35') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 35 Info</strong><br>
		The Abandoned Mine to the west has been overrun with hideous mutated creatures. Clear them out and return here for a reward.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 35') 
{	if ($quest35 == 1 && ($_SESSION['KLrabidskeever']>=1 && $_SESSION['KLbleedingdartwing']>=1 && $_SESSION['KLmongoliandeathworm']>=1) )
	{	echo $message="<div class='questWin'>
		<h3>Quest 35 Completed!</h3>
		<h4>Clear out the Abandoned Mine</h4>
		Congratulations! You have cleared out the Abandoned Mine! The Captain hands you a gold key. Use it to unlock the Gold Chest found in the Dwarf Treasury to the north. 
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 500 ".$_SESSION['currency']." ]<br />
      	[ + Gold Key! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 500"); 
		// $results = $link->query("UPDATE $user SET goldkey = goldkey + 1");
		// $results = $link->query("UPDATE $user SET quest35 = 2");
		$updates = [ // -- set changes
			'quest35' => 2,
			'xp' => $xp + 1000,
			'currency' => $currency + 500,
			'goldkey' => $goldkey + 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest35 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 35 Not Complete</strong><br>
		To complete this quest you need to kill the 3 unique creatures found in the abandoned mine to the west.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

// ---------------------- QUEST 36) Glowing Sea Monster ---------------------- //
if($input=='info 36') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 36 Info</strong><br>
		A Glowing Monster has been spotted under the sea. Find and defeat this beast for a magic imbued bow.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 36') 
{	if ($quest36 == 1 && $KLglowingoctopus >= 1)
	{	echo $message="<div class='questWin'>
		<h3>Quest 36 Completed!</h3>
		<h4>Glowing Sea Monster</h4>
		Congratulations! You have discovered and defeated the glowing sea monster! The Captain hands you an Enchanted Bow and 200 arrows!  
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 500 ".$_SESSION['currency']." ]<br />
      	[ + 200 arrows ]<br />
      	[ + Enchanted Bow! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 500"); 
		// $results = $link->query("UPDATE $user SET arrows = arrows + 200");
		// $results = $link->query("UPDATE $user SET enchantedbow = enchantedbow + 1");
		// $results = $link->query("UPDATE $user SET quest36 = 2");
		$updates = [ // -- set changes
			'quest36' => 2,
			'xp' => $xp + 1000,
			'currency' => $currency + 500,
			'arrows' => $arrows + 200,
			'enchantedbow' => $enchantedbow + 1
		];
		updateStats($link, $username, $updates); // -- apply changes`
	} 
	else if ($quest36 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 36 Not Complete</strong><br>
		To complete this quest you need to find the rare glowing sea monster.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}



// ---------------------- QUEST 37) Missing Dwarf Axeman ---------------------- //
if($input=='info 37') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 37 Info</strong><br>
		A Dwarven Guard has went missing! He was last seen on patrol around the Stone Grotto. Go find him.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 37') 
{	if ($quest37 == 1 && $KLpossessedaxeman >= 1)
	{	echo $message="<div class='questWin'>
		<h4>Missing Dwarf Axeman</h4>
		Congratulations! You have indeed found and saved the possessed axeman. Since you saved his life he has vowed to serve you. The Dwarf Axeman will be your battle companion for as long as you need him. He will be a valuable asset on your journeys.   
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 500 ".$_SESSION['currency']." ]<br />
      	[ + Dwarf Axeman Companion! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 500"); 
		// $results = $link->query("UPDATE $user SET COMPdwarfaxeman = COMPdwarfaxeman + 1");
		// $results = $link->query("UPDATE $user SET quest37 = 2");
		$updates = [ // -- set changes
			'quest37' => 2,
			'xp' => $xp + 1000,
			'currency' => $currency + 500,
			'COMPdwarfaxeman' => $COMPdwarfaxeman + 1
		];
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest37 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 37 Not Complete</strong><br>
		To complete this quest you need to find the missing dwarf axeman. Head to the Stone Grotto were he was last seen.</div>";
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

// // -------------------------------------------------------------------------- TRAVEL
// else if($input=='w' || $input=='west') 
// {			echo 'You travel west<br>';
//    	$message="<i>You travel west</i><br>".$_SESSION['desc312'];
// 	include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 312"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='e' || $input=='east') 
// {			echo 'You travel east<br>';
//    	$message="<i>You travel east</i><br>".$_SESSION['desc306'];
// 	include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 306"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='nw' || $input=='northwest') 
// {			echo 'You travel northwest<br>';
//    	$message="<i>You travel northwest</i><br>".$_SESSION['desc304'];
// 	include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 304"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='ne' || $input=='northeast') 
// {			echo 'You travel northeast<br>';
//    	$message="<i>You travel northeast</i><br>".$_SESSION['desc307'];
// 	include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 307"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='se' || $input=='southeast') 
// {			echo 'You travel southeast<br>';
//    	$message="<i>You travel southeast</i><br>".$_SESSION['desc302'];
// 	include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 302"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='s' || $input=='south') 
// {			echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc317'];
// 	include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 317"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '306';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'south') {    $roomNum = '317';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'west') {     $roomNum = '312';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northeast') { $roomNum = '307';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southeast') { $roomNum = '302';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northwest') { $roomNum = '304';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>