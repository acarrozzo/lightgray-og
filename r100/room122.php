<?php
						$roomname = "In the Forest by a Fork in the Road";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc122'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5-13"; // danger level

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

include ('battle-sets/forest.php');
include ('function-choptree.php');
	
	

	

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
// {	echo 'You travel west<br>';
//    $message="<i>You travel west</i><br>".$_SESSION['desc116'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 116"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='n' || $input=='north') 
// {	echo 'You travel north<br>';
//    $message="<i>You travel north</i><br>".$_SESSION['desc121'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 121"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='s' || $input=='south') 
// {	echo 'You travel south<br>';
//    $message="<i>You travel south</i><br>".$_SESSION['desc123'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 123"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '121';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'south') {    $roomNum = '123';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'west') {     $roomNum = '116';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
