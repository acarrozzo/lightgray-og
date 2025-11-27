<?php
						$roomname = "Dwarf Guard - Bounty Board";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc306'];
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


$arrows=$row['arrows'];
$bolts=$row['bolts'];
$polearm=$row['polearm'];


if($input=='grab arrows')  // ---- GRAB ARROWS
{
	if ( $arrows >= 50 )
	{
		echo $message="<div class='menuAction'>You already have more than 50 arrows! [you have $arrows] Come back if you run low.</div>";
		include ('update_feed.php'); // --- update feed
	}
	else { 
		echo $message="<div class='menuAction'>You grab a bundle of arrows! [ +50 arrows ]</div>";
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET arrows = 50");
		updateStats($link, $username,['arrows' => 50 ]); // -- update stat 
	}
}
if($input=='grab bolts')  // ---- GRAB BOLTS
{
	if ( $bolts >= 50 )
	{
		echo $message="<div class='menuAction'>You already have more than 50 bolts! [you have $bolts] Come back if you run low.</div>";
		include ('update_feed.php'); // --- update feed
	}
	else { 
		echo $message="<div class='menuAction'>You grab a bundle of bolts! [ +50 bolts ]</div>";
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET bolts = 50");
		updateStats($link, $username,['bolts' => 50 ]); // -- update stat 
	}
}

if($input=='grab polearm')
{	if ($polearm >= 1)
	 	{ echo $message="<div class='menuAction'>You already have a polearm. If you lose it come back here for another free one.</div>"; 
			include ('update_feed.php'); // --- update feed
		}
	else
	 	{ 
			echo $message="<div class='menuAction'>You grab a polearm and put in your pack! [ +1 polearm ]</div>"; 
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET polearm = 1");
			updateStats($link, $username,['polearm' => 1 ]); // -- update stat
	 	}
}



// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
	// $query = $link->query("UPDATE $user SET hp = $hpmax + 50 "); 
	// $query = $link->query("UPDATE $user SET mp = $mpmax + 50 "); 
	echo $message = "You rest on the ledge and supercharge! (+50 HP, +50 MP)<br>";
	include ('update_feed.php'); // --- update feed
	$updates = [ // -- set changes
		'hp' => $hpmax + 50,
		'mp' => $mpmax + 50
	]; 
	updateStats($link, $_SESSION['username'], $updates); // -- update 
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
//    	$message="<i>You travel west</i><br>".$_SESSION['desc303'];
// 	include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 303"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='n' || $input=='north')
// {			echo 'You travel north<br>';
//    	$message="<i>You travel north</i><br>".$_SESSION['desc307'];
// 	include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 307"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='se' || $input=='southeast')
// {			echo 'You travel southeast<br>';
//    	$message="<i>You travel southeast</i><br>".$_SESSION['desc301'];
// 	include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 301"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '307';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'west') {     $roomNum = '303';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southeast') { $roomNum = '301';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>
