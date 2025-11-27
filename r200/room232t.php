<?php
							  $roomname = "The Catacombs Torture Chamber";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc232t'];
//$dangerLVL = $_SESSION['dangerLVL'] = "7-13"; // danger level

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

include ('battle-sets/catacombs.php'); 


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
//    	 $message="<i>You travel west</i><br>".$_SESSION['desc232w'];
// 	 include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232w'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='n' || $input=='north') 
// {			echo 'You travel north<br>';
//    	$message="<i>You travel north</i><br>".$_SESSION['desc232u'];
// 	include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232u'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='e' || $input=='east') 
// {			echo 'You travel east<br>';
//    	 $message="<i>You travel east</i><br>".$_SESSION['desc232s'];
// 	 include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232s'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '232u';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'east') {     $roomNum = '232s';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'west') {     $roomNum = '232w';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
