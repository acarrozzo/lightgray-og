<?php
						$roomname = "On a Muddy Path by an Abandoned Mine";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc314'];
//$dangerLVL = $_SESSION['dangerLVL'] = "3-7"; // danger level

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


include ('battle-sets/rockyflatspath.php'); // Rocky Flats path enemies

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
//    	$message="<i>You travel northwest</i><br>".$_SESSION['desc316'];
// 	include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 316"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='ne' || $input=='northeast') 
// {			echo 'You travel northeast<br>';
//    	$message="<i>You travel northeast</i><br>".$_SESSION['desc315'];
// 	include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 315"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='e' || $input=='east') 
// {			echo 'You travel east<br>';
//    	$message="<i>You travel east</i><br>".$_SESSION['desc313'];
// 	include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 313"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '313';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northeast') { $roomNum = '315';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northwest') { $roomNum = '316';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>