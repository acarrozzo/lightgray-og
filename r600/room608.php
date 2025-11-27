<?php
						$roomname = "Blue Guard | Mountain Outpost";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc608'];

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


$quest64=$row['quest64']; 
$quest65=$row['quest65']; 
$quest66=$row['quest66']; 

$chest7 = $row['chest7'];

$steeldagger = $row['steeldagger'];
$steelsword = $row['steelsword'];
$steelstaff = $row['steelstaff'];

$steel2hsword = $row['steel2hsword'];
$steelbattlestaff = $row['steelbattlestaff'];
$steelnunchaku = $row['steelnunchaku'];

$steelboomerang = $row['steelboomerang'];
$steelchakram = $row['steelchakram'];
$steelbow = $row['steelbow'];
$steelcrossbow = $row['steelcrossbow'];

$steelshield = $row['steelshield'];
$steelkiteshield = $row['steelkiteshield'];

$steelhelmet=$row['steelhelmet']; 
$steelhood=$row['steelhood']; 

$steelarmor=$row['steelarmor']; 
$steelcape=$row['steelcape']; 

$steelgauntlets=$row['steelgauntlets']; 
$steelgloves=$row['steelgloves']; 

$steelboots=$row['steelboots']; 



$equipR=$row['equipR']; 
$equipL=$row['equipL']; 
$equipHead=$row['equipHead']; 
$equipBody=$row['equipBody']; 
$equipHands=$row['equipHands']; 
$equipFeet=$row['equipFeet']; 


$KLyeti=$_SESSION['KLyeti']; 
$KLdragon=$_SESSION['KLdragon']; 

$steelmasterhelm=$row['steelmasterhelm'];
$yeticloak=$row['yeticloak'];
$dragonorb=$row['dragonorb'];
$goldkey=$row['goldkey'];


// ---------------------- START ALL QUESTS ---------------------- //
if($input=='start quests') {
	 if ($quest64 <1 || $quest65 <1 || $quest66 <1) {	
/*
		echo $message = "<div class='menuAction'>
		<p class='gold'>You start the Blue Guards Quests! (64 - 66)</p>
		<p>Check your Quests tab to review what needs to be done.</p>
		<a href='' data-link='quests' class='btn goldBG'>Open Quests</a>
		</div> ";
*/
		echo $message = '<div class="fbox">
		<h3 class="padd gray">You start the Blue Guard Captain Hector\'s Quests!</h3>
		<span class="icon gray">'.file_get_contents("img/svg/npc/npc-hector.svg").'</span>
		<p class="padd"><i>"The mountains are a most dangerous place. Be alert!"</i></p>
		<a href data-link="quests" class="btn goldBG">Open Quests </a>
		</div>';	
		
		
		include ('update_feed.php'); // --- update feed
   		// $results = $link->query("UPDATE $user SET quest64 = 1");
   		// $results = $link->query("UPDATE $user SET quest65 = 1");
   		// $results = $link->query("UPDATE $user SET quest66 = 1");

		   $updates = [ // -- set changes
			'quest64' => 1,
			'quest65' => 1,
			'quest66' => 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes

	  	}
}




// ---------------------- QUEST 64) Steel Warrior ---------------------- //
if($input=='info 64') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 64 Info</strong><br>
		Impress Hector, the Blue Guard Captain, with a full set of Steel Armor. Collect, buy or craft the armor and return here.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 64') 
{	if (
	($row['steeldagger']   >= 1  || $row['steelsword']    >= 1  || $row['steelstaff']    >= 1 
	|| $row['steel2hsword']   >= 1  || $row['steelbattlestaff']   >= 1  
	|| $row['steelnunchaku']   >= 1  || $row['steelboomerang']   >= 1  || $row['steelchakram']   >= 1  
	|| $row['steelbow']   >= 1  || $row['steelcrossbow']   >= 1 )
	&& ($row['steelhelmet']   >= 1  || $row['steelhood']   >= 1 )
	&& ($row['steelarmor']   >= 1  || $row['steelcape']   >= 1 )
	&& ($row['steelgloves']   >= 1  || $row['steelgauntlets']   >= 1 )
	&& ($row['steelboots']   >= 1 )
	)

	{	echo $message="<div class='questWin'>
		<h3>Quest 64 Completed!</h3>
		<h4>Steel Warrior</h4>
 		Hector is impressed! That's some nice looking steel armor you got yourself. The Captain hands you a Master Helm to show the world you are a true steel warrior!
 	  	<h4>Rewards</h4>
  	  	[ + 5000 xp  ]<br />
      	[ + 5000 ".$_SESSION['currency']." ]<br />
      	[ + Steel Master Helm! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		// $results = $link->query("UPDATE $user SET steelmasterhelm = steelmasterhelm + 1");
		// $results = $link->query("UPDATE $user SET quest64 = 2");
		$updates = [ // -- set changes
			'quest64' => 2,
			'xp' => $xp + 1000,
			'currency' => $currency + 5000,
			'steelmasterhelm' => $steelmasterhelm + 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest64 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 64 Not Complete</strong><br>
	Quest not complete. To complete this quest you need to collect a full set of Steel Equipment.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}




// ---------------------- QUEST 65) Yeti Hunter ---------------------- //
if($input=='info 65') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 65 Info</strong><br>
		The illusive Yeti has been terrorizing the mountain side. Hector wants you to find and defeat this beast.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 65') 
{	if ( $KLyeti >=1  )
	{	echo $message="<div class='questWin'>
		<h3>Quest 65 Completed!</h3>
		<h4>Yeti Hunter</h4>
 		Congratulations! You have indeed found and defeated the illusive Yeti! Hector hands you the cloak off his back made from a Yeti he hunted down long ago.
 	  	<h4>Rewards</h4>
  	  	[ + 5000 xp  ]<br />
      	[ + 5000 ".$_SESSION['currency']." ]<br />
      	[ + Yeti Cloak! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 5000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		// $results = $link->query("UPDATE $user SET yeticloak = yeticloak + 1");
		// $results = $link->query("UPDATE $user SET quest65 = 2");
		$updates = [ // -- set changes
			'quest65' => 2,
			'xp' => $xp + 5000,
			'currency' => $currency + 5000,
			'yeticloak' => $yeticloak + 1
		];
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest65 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 65 Not Complete</strong><br>
	Quest not complete. To complete this quest you need to find and slay the rare Yeti. He can be found roaming the mountains.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}




// ---------------------- QUEST 66) Dragon Slayer	 ---------------------- //
if($input=='info 66') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 66 Info</strong><br>
		Ferocious dragons have been seen spotted soaring among the mountain tops. There is a big reward for taking one down.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 66') 
{	if ( $KLdragon >=1  )
	{	echo $message="<div class='questWin'>
		<h3>Quest 66 Completed!</h3>
		<h4>Dragon Slayer</h4>
 		Congratulations! you have indeed slain a Dragon! Hector, most impressed, hands you a dragon orb pulsing with raw power.
 	  	<h4>Rewards</h4>
  	  	[ + 10000 xp  ]<br />
      	[ + 50000 ".$_SESSION['currency']." ]<br />
      	[ + Dragon Orb! ]<br />
      	[ + GOLD KEY! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 10000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 50000"); 
		//    $results = $link->query("UPDATE $user SET dragonorb = dragonorb + 1");
		//    $results = $link->query("UPDATE $user SET goldkey = goldkey  + 1");
		//    $results = $link->query("UPDATE $user SET quest66 = 2");
		$updates = [ // -- set changes
			'quest66' => 2,
			'xp' => $xp + 10000,
			'currency' => $currency + 50000,
			'dragonorb' => $dragonorb + 1,
			'goldkey' => $goldkey + 1
		];
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest66 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 66 Not Complete</strong><br>
	Quest not complete. To complete this quest you need to find and slay a Dragon. They can be found anywhere in the mountains but are seen more frequently in certain areas.</div>";
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
// else if($input=='n' || $input=='north') 
// {
// 	echo 'You travel north<br>';
// 	$message="<i>You travel north</i><br>".$_SESSION['desc609'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '609'"); // -- room change
// 	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	}

else if($input=='w' || $input=='west') 
{
		if ($chest7 <= 0){
		echo  $message="<i>You cannot travel west yet. Open up the Gold Chest at the Cathedral Courtyard to the north of here to unlock this door. Complete Chilly Pete's Quest to get a Gold Key.</i><br>";	
			include ('update_feed.php'); // --- update feed
		}
		
		else {
		echo 'You travel west to the Master Trainer<br>';
		$message="<i>You travel west to the Master Trainer</i><br>".$_SESSION['desc610'];
		include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '610'"); // -- room change
			updateStats($link, $username,['endfight' => 0, 'room' => '610' ]); // -- update stats

			// $results = $link->query("UPDATE $user SET mastertrainerFlag = 1"); // -- mastertrainer flag on
			updateStats($link, $username,['mastertrainerFlag' => 1 ]); // -- update stat 

			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
		}
	}


	
// else if($input=='e' || $input=='east') 
// {
// 	echo 'You travel east<br>';
//    	$message="<i>You travel east</i><br>".$_SESSION['desc605'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = '605'"); // -- room change
// 	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	}
	
// else if($input=='s' || $input=='south') 
// {			echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc607'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '607'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }



// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '609';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'east') {     $roomNum = '605';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'south') {    $roomNum = '607';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>