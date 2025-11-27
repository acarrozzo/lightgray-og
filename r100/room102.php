<?php
// -- 102 -- Forest Path near a Cow Farm
$roomname = "Forest Path near a Cow Farm";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc102'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1"; // danger level

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


include('battle-sets/forest-path.php');

echo 2-1;

$row = getUserData($link, $_SESSION['username']); // --- gets all user data from database   



$infight = $row['infight'];
$endfight = $row['endfight'];


$teleport2 = $row['teleport2'];




	



		




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
// {	echo 'You travel northwest<br>';
//  	$message="<i>You travel northwest</i><br>".$_SESSION['desc101'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = 101"); // -- room change
// }
// else if($input=='n' || $input=='north') 
// {	echo 'You travel north<br>';
//  	$message="<i>You travel north</i><br>".$_SESSION['desc103'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = 103"); // -- room change
// }
// else if($input=='e' || $input=='east') 
// {	echo 'You travel east<br>';
//  	$message="<i>You travel east</i><br>".$_SESSION['desc104'];
// 	include ('update_feed.php'); // --- update feed
// 	// $results = $link->query("UPDATE $user SET room = 104"); // -- room change
// 	$updates = ['room' => '104', 'endfight' => 0]; // -- room change + reset fight
// 	updateStats($link, $username, $updates); // -- apply changes
// 	// -------------------------------------------------------------------------- Activate Forest Path Teleport
// 		if ($teleport2 == 0) { 	
// 			$results = $link->query("UPDATE $user SET teleport2 = 1");
// 			echo $message="<i>You can now teleport to the Forest Path! Click 'forest path' to teleport to this location at any time. </i><br>";
// 			include ('update_feed.php'); // --- update feed	  
// 			}	
// }
elseif ($input == 'east') {     
	$roomNum = '104';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');
	if ($teleport2 == 0) { 	
		// $results = $link->query("UPDATE $user SET teleport2 = 1");
		$updates = ['teleport2' => 1]; // -- room change + reset fight
		updateStats($link, $username, $updates); // -- apply changes
		echo $message="<i>You can now teleport to the Forest Crossroads! Click 'Forest Crossroads' to teleport to this location at any time. </i><br>";
		include ('update_feed.php'); // --- update feed	  		
	}	
} 


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '103';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'northwest') { $roomNum = '101';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');} 

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
