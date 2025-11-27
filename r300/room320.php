<?php
						$roomname = "On a Grass Path near the Savannah";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc320'];
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
//    	$message="<i>You travel north</i><br>".$_SESSION['desc319'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '319'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
else if($input=='s' || $input=='south') 
{	
	if (1 == 2 ) {
		echo 'You go south!<br>';
		$message="<i>You go south! </i><br>".$_SESSION['desc320'];
		include ('update_feed.php'); // --- update feed
		//    $results = $link->query("UPDATE $user SET room = '320'"); // -- room change
		$updates = ['endfight' => 0, 'room' => '320' ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
	}
	else {
		echo $message = "The path to the Savannah is blocked by a Gray Guard. You're not sure what he wants.<br>";
		include ('update_feed.php'); // --- update feed
	}
}

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '319';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>