<?php
						$roomname = "Dark Forest Outpost | Ranger Guard";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc502'];

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

$quest51=$row['quest51']; 
$quest52=$row['quest52']; 
$quest53=$row['quest53']; 


$KLbowman=$_SESSION['KLbowman']; 
$KLhighwayman=$_SESSION['KLhighwayman']; 

$KLtrollelder=$_SESSION['KLtrollelder']; 

$KLlurker=$_SESSION['KLlurker']; 
$KLwingeddemon=$_SESSION['KLwingeddemon']; 
$KLundeadorc=$_SESSION['KLundeadorc']; 

$blackblade=$row['blackblade'];
$demoncape=$row['demoncape'];
$MOUNTdirewolf=$row['MOUNTdirewolf'];


// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
	// $query = $link->query("UPDATE $user SET hp = $hpmax "); 
	// $query = $link->query("UPDATE $user SET mp = $mpmax "); 
	$updates = [ // -- set changes
		'hp' => $hpmax,
		'mp' => $mpmax
	]; 
	updateStats($link, $_SESSION['username'], $updates); // -- update  
	echo $message = "You rest at the Outpost and heal all your HP and MP!<br>";
	include ('update_feed.php'); // --- update feed
	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}



// ---------------------- START ALL QUESTS ---------------------- //
if($input=='start quests') {
	 if ($quest51 <1 || $quest52 <1 || $quest53 <1) {	
	/*
		echo $message = "<div class='menuAction'>
		<p class='gold'>You start the Ranger Guard's Quests! (51 - 53)</p>
		<p>Check your Quests tab to review what needs to be done.</p>
		<a href='' data-link='quests' class='btn goldBG'>Open Quests</a>
		</div> ";	
		*/
		
		echo $message = '<div class="fbox">
		<h3 class="padd forest">You start the Ranger Guard\'s Quests!</h3>
		<span class="icon forest">'.file_get_contents("img/svg/npc/npc-ranger.svg").'</span>
		<p class="padd"><i>"These dang Highwaymen need to be stopped. They keep robbing the innocent."</i></p>
		<a href data-link="quests" class="btn goldBG">Open Quests </a>
		</div>';

		include ('update_feed.php'); // --- update feed
   		// $results = $link->query("UPDATE $user SET quest51 = 1");
   		// $results = $link->query("UPDATE $user SET quest52 = 1");
   		// $results = $link->query("UPDATE $user SET quest53 = 1");
		   $updates = [ // -- set changes
			'quest51' => 1,
			'quest52' => 1,
			'quest53' => 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	  	}
}

// ---------------------- QUEST 51) Protect the Mountain Path ---------------------- //
if($input=='info 51') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 51 Info</strong><br>
		The Bowmen and Highwaymen are thieves who prey on those who travel the Mountain Path! Protect the path by removing 5 of each.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 51') 
{	if ( $KLbowman >=5 && $KLhighwayman >=5 )
	{	echo $message="<div class='questWin'>
		<h3>Quest 51 Completed!</h3>
		<h4>Protect the Mountain Path</h4>
 		Congratulations! You have indeed defeated 5 Bowmen & 5 Highwaymen. The Ranger Guard rewards you with a deadly Black Blade! 
		<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 5000 ".$_SESSION['currency']." ]<br />
      	[ + Black Blade! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		// $results = $link->query("UPDATE $user SET blackblade = blackblade + 1");
		// $results = $link->query("UPDATE $user SET quest51 = 2");
		$updates = [ // -- set changes
			'quest51' => 2,
			'xp' => $xp + 1000,
			'currency' => $currency + 5000,
			'blackblade' => $blackblade + 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest51 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 51 Not Complete</strong><br>
	To complete this quest you must defeat 5 Bowmen & 5 Highwaymen. They can be found patrolling the stone path to the mountains.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

// ---------------------- QUEST 52) Elder Slayer ---------------------- //
if($input=='info 52') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 52 Info</strong><br>
		Defeat 3 devious Troll Elders and make the Dark Forest a safer place.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 52') 
{	if ( $KLtrollelder >=3 )
	{	echo $message="<div class='questWin'>
		<h3>Quest 52 Completed!</h3>
		<h4>Elder Slayer</h4>
		Congratulations! You have indeed defeated 3 Troll Elders. The Ranger Guard whistles and a Dire Wolf comes running in. The wolf is now yours!
		<h4>Rewards</h4>
  	  	[ + 1500 xp  ]<br />
      	[ + 5000 ".$_SESSION['currency']." ]<br />
      	[ + Dire Wolf! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 1500"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		// $results = $link->query("UPDATE $user SET MOUNTdirewolf = MOUNTdirewolf + 1");
		// $results = $link->query("UPDATE $user SET quest52 = 2");
		$updates = [ // -- set changes
			'quest52' => 2,
			'xp' => $xp + 1500,
			'currency' => $currency + 5000,
			'MOUNTdirewolf' => $MOUNTdirewolf + 1
		];
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest52 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 52 Not Complete</strong><br>
	To complete this quest you need to defeat 3 Troll Elders. They can be found in the Dark Forest.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}


// ---------------------- QUEST 53) Dark Keep First Floor ---------------------- //
if($input=='info 53') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 53 Info</strong><br>
		Defeat the 3 enemies on the First Floor of the Dark Keep. A Lurker, a Winged Demon, and an Undead Orc.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 53') 
{	if ( $KLlurker >=1 && $KLwingeddemon >=1 && $KLundeadorc >=1 )
	{	echo $message="<div class='questWin'>
		<h3>Quest 53 Completed!</h3>
		<h4>Dark Keep First Floor</h4>
		Congratulations! You have indeed defeated a Lurker, a Winged Demon, and an Undead Orc. The Ranger Guard hands you a mean looking Demon Cape!
		<h4>Rewards</h4>
  	  	[ + 2000 xp  ]<br />
      	[ + 5000 ".$_SESSION['currency']." ]<br />
      	[ + Demon Cape! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 2000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		// $results = $link->query("UPDATE $user SET demoncape = demoncape + 1");
		// $results = $link->query("UPDATE $user SET quest53 = 2");
		$updates = [ // -- set changes
			'quest53' => 2,
			'xp' => $xp + 2000,
			'currency' => $currency + 5000,
			'demoncape' => $demoncape + 1
		];
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest53 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 53 Not Complete</strong><br>
	To complete this quest you need to defeat the 3 enemies found on the First Floor of the Dark Keep. The Dark Keep can be reached by heading west in the Dark Forest.	</div>";
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
// else if($input=='w' || $input=='west') 
// {			echo 'You travel west<br>';
//    	$message="<i>You travel west</i><br>".$_SESSION['desc503'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '503'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='s' || $input=='south') 
// {			echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc501'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '501'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
else if($input=='ne' || $input=='northeast') 
{	
	if ( $KLhighwayman >=1 && $KLbowman >=1 ) 
	{
	echo 'You travel northeast to the Dark Forest<br>';
 	$message="<i>You travel northeast to the Dark Forest</i><br>".$_SESSION['desc507'];
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET room = 507"); // -- room change
	updateStats($link, $username,['endfight' => 0, 'room' => '507' ]); // -- update stats
	}
	else
	{
	echo $message="<i>You cannot enter the Dark Forest from here until you defeat a Highwayman and a Bowman.</i><br>";
	include ('update_feed.php'); // --- update feed		
	}
}


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '501';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'west') {     $roomNum = '503';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>