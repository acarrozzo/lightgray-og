<?php
						$roomname = "Abandoned Mine ENTRANCE";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc315'];
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


if($input=='read sign') {  //read sign
	echo $message="<i>you read the sign:</i> <br />
	-------------------------------------------<br />
	Mine has been condemned!<br>
	Enter at your own risk!<br>
	-------------------------------------------</p>";
	include ('update_feed.php'); // --- update feed	
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

// else if($input=='sw' || $input=='southwest') 
// {			echo 'You travel southwest<br>';
//    	$message="<i>You travel southwest</i><br>".$_SESSION['desc314'];
// 	include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 314"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='d' || $input=='down') 
// {			echo 'You travel down<br>';
//    	$message="<i>You travel down</i><br>".$_SESSION['desc315a'];
// 	include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '315a'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }





// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'southwest') { $roomNum = '314';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');}

elseif ($input == 'down') {     $roomNum = '315a';handleTravel($_SESSION['username'], $link, 'down', $roomNum, 'desc'.$roomNum.'');}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>