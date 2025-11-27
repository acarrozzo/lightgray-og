<?php
						$roomname = "Stone Mountain | Base Camp";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc607'];

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





$quest61=$row['quest61']; 
$quest62=$row['quest62']; 
$quest63=$row['quest63']; 

$flower=$row['flower']; 


$redpotion=$row['redpotion']; 
$bluepotion=$row['bluepotion']; 
$mud=$row['mud']; 

$KLulfberht=$_SESSION['KLulfberht']; 

$glowinggloves=$row['glowinggloves'];
$redbalm=$row['redbalm'];
$bluebalm=$row['bluebalm'];
$COMPogreshieldmate=$row['COMPogreshieldmate'];


// ---------------------- START ALL QUESTS ---------------------- //
if($input=='start quests') {
	 if ($quest61 <1 || $quest62 <1 || $quest63 <1) {	
/*		echo $message = "<div class='menuAction'>
		<p class='gold'>You start Master Raul's Quests! (61 - 63)</p>
		<p>Check your Quests tab to review what needs to be done.</p>
		<a href='' data-link='quests' class='btn goldBG'>Open Quests</a>
		</div> ";	
		*/
		echo $message = '<div class="fbox">
		<h3 class="padd gray">You start Base Camp\'s Quests!</h3>
		<span class="icon gray">'.file_get_contents("img/svg/npc/npc-basecamp.svg").'</span>
		<p class="padd"><i>"Like, one day, we\'ll totally make it to the peak!"</i></p>
		<a href data-link="quests" class="btn goldBG">Open Quests </a>
		</div>';	

		include ('update_feed.php'); // --- update feed
   		// $results = $link->query("UPDATE $user SET quest61 = 1");
   		// $results = $link->query("UPDATE $user SET quest62 = 1");
   		// $results = $link->query("UPDATE $user SET quest63 = 1");
		   $updates = [ // -- set changes
			'quest61' => 1,
			'quest62' => 1,
			'quest63' => 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	  	}
}



// ---------------------- QUEST 61) Frozen Fourth Flower ---------------------- //
if($input=='info 61') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 61 Info</strong><br>
		An elderly woman at the camp requests you bring her 4 flowers. After getting the first 3 you can find the final one past the stone bridge up in the mountains.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 61')
{	if ($flower >= 4)
	{	echo $message="<div class='questWin'>
		<h3>Quest 61 Completed!</h3>
		<h4>Frozen Fourth Flower</h4>
		Congratulations! You have 4 flowers! You hand them to the elderly lady and she gives you a pair of Glowing Gloves pulsing with magical energy.
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 5000 ".$_SESSION['currency']." ]<br />
      	[ + Glowing Gloves! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		// $results = $link->query("UPDATE $user SET glowinggloves = glowinggloves + 1");
		// $results = $link->query("UPDATE $user SET flower = flower - 4");
		// $results = $link->query("UPDATE $user SET quest61 = 2");
		$updates = [ // -- set changes
			'quest61' => 2,
			'xp' => $xp + 1000,
			'currency' => $currency + 5000,
			'glowinggloves' => $glowinggloves + 1,
			'flower' => $flower - 4
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest61 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 61 Not Complete</strong><br>
	Quest not complete. To complete this quest you need to collect 4 flowers. Start with the one in the grassy field, then Red Town, then the ocean, and then finally the one here in the mountains over the stone bridge.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}



// ---------------------- QUEST 62) Balm Mixer ---------------------- //
if($input=='info 62') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 62 Info</strong><br>
		You see a snow covered shaman in the corner of camp mixing some potions with mud. He will teach you how make potent balms if you bring the correct ingredients.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 62')
{	if ($redpotion >= 5 && $bluepotion >= 5 && $mud >= 10)
	{	echo $message="<div class='questWin'>
		<h3>Quest 62 Completed!</h3>
		<h4>Balm Mixer</h4>
		Congratulations! You hand the shaman the ingredients and he shows you how to make healing balms!
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 5000 ".$_SESSION['currency']." ]<br />
      	[ + 10  Red Balm ]<br />
      	[ + 10  Blue Balm ]
		</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		// $results = $link->query("UPDATE $user SET redbalm = redbalm + 10");
		// $results = $link->query("UPDATE $user SET bluebalm = bluebalm + 10");
		// $results = $link->query("UPDATE $user SET quest62 = 2");
		$updates = [ // -- set changes
			'quest62' => 2,
			'xp' => $xp + 1000,
			'currency' => $currency + 5000,
			'redbalm' => $redbalm + 10,
			'bluebalm' => $bluebalm + 10
		];
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest62 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 62 Not Complete</strong><br>
	Quest not complete. To complete this quest you need to bring the snowy shaman 5 red potions, 5 blue potions, and 10 mud.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}



// ---------------------- QUEST 63) Ulfberht the Viking ---------------------- //
if($input=='info 63') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 63 Info</strong><br>
		The leader of the camp approaches you with a bounty. Defeat the undead viking found in the Neverending mine and you will be rewarded with a loyal companion.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 63') 
{	if ( $KLulfberht >=1  )
	{	echo $message="<div class='questWin'>
		<h3>Quest 63 Completed!</h3>
		<h4>Ulfberht the Viking</h4>
 		Congratulations! You have defeated the mighty Ulfberht! The entire camp applauds your achievement. The leader gives a quick whistle and an ogre shieldmate comes running up to your side [ New Companion: Ogre Shieldmate ]
 	  	<h4>Rewards</h4>
  	  	[ + 3000 xp  ]<br />
      	[ + 5000 ".$_SESSION['currency']." ]<br />
      	[ + Ogre Shieldmate ! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 3000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		// $results = $link->query("UPDATE $user SET COMPogreshieldmate = COMPogreshieldmate + 1");
		// $results = $link->query("UPDATE $user SET quest63 = 2");
		$updates = [ // -- set changes
			'quest63' => 2,
			'xp' => $xp + 3000,
			'currency' => $currency + 5000,
			'COMPogreshieldmate' => $COMPogreshieldmate + 1
		];
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest63 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 63 Not Complete</strong><br>
	Quest not complete. To complete this quest you need to defeat Ulfberht found at mine level 15 in the Neverending Mine.</div>";
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
// else if($input=='ne' || $input=='northeast') 
// {			echo 'You travel northeast<br>';
//    	$message="<i>You travel northeast</i><br>".$_SESSION['desc605'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '605'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='n' || $input=='north') 
// {			echo 'You travel north<br>';
//    	$message="<i>You travel north</i><br>".$_SESSION['desc608'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '608'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// -------------------------------------------------------------------------- LIFT SOUTH		
else if ($input == 'take lift south')
{
	if ($currency < 500) {
		echo $message="<div class='menuAction'>You don’t have enough coin to take the lift. stop being so poor.</div>";	
		include ('update_feed.php'); // --- update feed	
	}
	else {
		echo "You pay Raul 500 coin and take the lift south!<br>"; 
		 $message="<div class='menuAction'>You pay Raul 500 coin and take the lift south!</div><br>".$_SESSION['desc606'];
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET room = '606'"); // -- room change
  	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	  updateStats($link, $username,['endfight' => 0, 'room' => '606' ]); // -- update stats
	//   $query = $link->query("UPDATE $user SET currency = currency - 500"); 
	//   $results = $link->query("UPDATE $user SET currency = currency - 500");
		$updates = [ // -- set changes
			'currency' => $currency - 500
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	
	  
	}
}



// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '608';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northeast') { $roomNum = '605';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>