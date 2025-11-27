<?php
						$roomname = "On a Grass Path near the Grotto";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc319'];
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

include ('battle-sets/rockyflatspath.php'); // 1/20 thief encounter


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
// {			echo 'You travel north<br>';
//    	$message="<i>You travel north</i><br>".$_SESSION['desc318'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '318'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='s' || $input=='south') 
// {			echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc320'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '320'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

else if($input=='sw' || $input=='southwest')  
{		
if ($_SESSION['grottoswitch'] != 1) 
	{ 
		echo $message="<i>A giant stone door blocks your way to the Grotto. There might be a switch nearby that will move it.</i><br>";
		include ('update_feed.php'); // --- update feed
	}
	else {
		echo 'You travel southwest into the Stone Grotto!<br>';
		$message="<i>You travel southwest into the Stone Grotto!</i><br>".$_SESSION['desc321'];
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET room = '321'"); // -- room change
		// updateStats($link, $username, ['endfight' => 0]); // -- update stats
		$updates = ['endfight' => 0, 'room' => '321' ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
	$_SESSION['grottoswitch'] = 0;
	}
}
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '318';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'south') {    $roomNum = '320';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>