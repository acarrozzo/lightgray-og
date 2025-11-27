<?php
							  $roomname = "Across a Sewer River by a Gray Chest";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc232y'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1-8"; // danger level

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

$flying = $_SESSION['flying'];
$breathingwater = $_SESSION['breathingwater'];
$clicks = $row['clicks'];
$wingspotion = $row['wingspotion'];


include ('battle-sets/sewers.php'); 




if($input=='get wings potion' )  // ---- get wings potion
{
	if ( $wingspotion >= 5 )
	{
	echo $message="<div class='menuAction'>You already have more than 5 wings potions! Come back if you run out.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'>You pick up 5 wings potion!</div>";
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET wingspotion = 5");
	updateStats($link, $username,['wingspotion' => 5 ]); // -- update stat 

	}
}

// -------------------------------------------------------------------------- END BATTLE BLOCK


// -------------------------------------------------------------------------- gray chest - reset after 100 clicks
if ($_SESSION['graychest'] == 0) {$_SESSION['graychestcheck'] = 0;} 
	else { $_SESSION['graychest'] = $clicks;}

//echo ' CLICKS: '.$clicks;
//echo ' CHEST: '.$_SESSION['graychest'];
//echo ' CHESTCK: '.$_SESSION['graychestcheck'];


if($input=='open chest') 
{	
	if ($_SESSION['graychest'] >= $_SESSION['graychestcheck'])
	{
   	$_SESSION['graychest'] = $clicks;	
	$_SESSION['graychestcheck'] = $_SESSION['graychest'] + 100;
	// -------------------------------------------------------------------------- chest rewards
		$rand = rand (1,7);
		if ($rand == 1) { 
			$qty = rand (100,400);
			echo 'You open the gray chest and find '.$qty.' '.$_SESSION['currency'].'!<br>';
			$message = "You open the gray chest and find $qty $currency!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET currency = currency + $qty"); 
			updateStats($link, $username,['currency' => $currency + $qty ]); // -- update stat 
			}
		if ($rand == 2) { 
			$qty = rand (50,100);
			echo 'You open the gray chest and gain '.$qty.' XP!<br>';
			$message = "You open the gray chest and gain $qty XP!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET xp = xp + $qty"); 
			updateStats($link, $username,['xp' => $xp + $qty ]); // -- update stat 
			}
		if ($rand == 3) { 
			$qty = rand (3,5);
			echo 'You open the gray chest and find '.$qty.' Red Potions!<br>';
			$message = "You open the gray chest and find $qty Red Potions!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty"); 
			updateStats($link, $username,['redpotion' => $redpotion + $qty ]); // -- update stat 
			}	
		if ($rand == 4) { 
			$rand2 = rand(1,2);
			if ($rand2 == 1 ){
				$bonus = 'Ring of Health Regen';
				// $results = $link->query("UPDATE $user SET ringofhealthregen = ringofhealthregen + 1"); 
				updateStats($link, $username,['ringofhealthregen' => $ringofhealthregen + 1 ]); // -- update stat 
			}
			if ($rand2 == 2 ){
				$bonus = 'Ring of Mana Regen';
				// $results = $link->query("UPDATE $user SET ringofmanaregen = ringofmanaregen + 1");
				updateStats($link, $username,['ringofmanaregen' => $ringofmanaregen + 1 ]); // -- update stat 
			}
			echo 'You open the gray chest and find a '.$bonus.'!<br>';
			$message = "You open the gray chest and find a $bonus!<br>";
			include ('update_feed.php'); // --- update feed
 			}					
		if ($rand == 5) { 
			$qty = rand (20,30);
			echo 'You open the gray chest and find '.$qty.' arrows!<br>';
			$message = "You open the gray chest and find $qty arrows!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET arrows = arrows + $qty"); 
			updateStats($link, $username,['arrows' => $arrows + $qty ]); // -- update stat 
			}	
		if ($rand == 6) { 
			$qty = rand (20,30);
			echo 'You open the gray chest and find '.$qty.' bolts!<br>';
			$message = "You open the gray chest and find $qty bolts!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET bolts = bolts + $qty"); 
			updateStats($link, $username,['bolts' => $bolts + $qty ]); // -- update stat 
			}	
		if ($rand == 7) { 
			$rand2 = rand(1,4);
			if ($rand2 == 1 ){
				$bonus = 'Ring of Strength II';
				// $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1"); 
				updateStats($link, $username,['ringofstrengthII' => $ringofstrengthII + 1 ]); // -- update stat
			}
			if ($rand2 == 2 ){
				$bonus = 'Ring of Dexterity II';
				// $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1"); 
				updateStats($link, $username,['ringofdexterityII' => $ringofdexterityII + 1 ]); // -- update stat
			}
			if ($rand2 == 3 ){
				$bonus = 'Ring of Magic II';
				// $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1"); 
				updateStats($link, $username,['ringofmagicII' => $ringofmagicII + 1 ]); // -- update stat
			}
			if ($rand2 == 4 ){
				$bonus = 'Ring of Defense II';
				// $results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1"); 
				updateStats($link, $username,['ringofdefenseII' => $ringofdefenseII + 1 ]); // -- update stat
			}	
			echo 'You open the gray chest and find a '.$bonus.'!<br>';
			$message = "You open the gray chest and find a $bonus!<br>";
			include ('update_feed.php'); // --- update feed
 			}			
		// $results = $link->query("UPDATE $user SET graychests = graychests + 1");	
		updateStats($link, $username,['graychests' => $graychests + 1 ]); // -- update stat
	}
	else { 
	echo $message= "<i>For some reason you can't open the chest now, you should try again later.</i><br>";
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

else if($input=='s' || $input=='south') 
{			
	if ($flying >= 1)
		{
			echo 'You fly across the sewer river and travel south.<br>';
			$message="<i>You fly across the sewer river and travel south.</i><br>".$_SESSION['desc232d'];
			include ('update_feed.php');   // --- update feed
			//    $results = $link->query("UPDATE $user SET room = '232d'"); // -- room change
			$updates = ['endfight' => 0, 'room' => '232d' ]; // -- set changes
			updateStats($link, $username, $updates); // -- apply changes
		}
	else{
 		echo $message="<i>You will not be able to cross this sewer river unless you are flying. Find or buy a wings potion.</i>";
		include ('update_feed.php');   // --- update feed
	}
}



// ----------------------------------- end of room function
include('function-end.php');
// }
?>
