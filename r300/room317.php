<?php
						$roomname = "Dry Grass Clearing";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc317'];
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
//    	$message="<i>You travel north</i><br>".$_SESSION['desc303'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 303"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='sw' || $input=='southwest') 
// {			echo 'You travel southwest<br>';
//    	$message="<i>You travel southwest</i><br>".$_SESSION['desc318'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 318"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

// else if($input=='se' || $input=='southeast') 
// {			echo 'You travel southeast<br>';
//    	$message="<i>You travel southeast</i><br>".$_SESSION['desc327'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 327"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

else if($input=='s' || $input=='south') 
{			
	if (1 == 2 ) {
		echo 'You go south!<br>';
		$message="<i>You go south! </i><br>".$_SESSION['desc328'];
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET room = '328'"); // -- room change
		$updates = ['endfight' => 0, 'room' => '328' ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
	}
	else {
		echo $message = "The gate to the south seems to be magically locked.<br>";
		include ('update_feed.php'); // --- update feed
	}
}
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '303';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'east') {     $roomNum = '000';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'south') {    $roomNum = '000';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'west') {     $roomNum = '000';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northeast') { $roomNum = '000';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southeast') { $roomNum = '327';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southwest') { $roomNum = '318';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northwest') { $roomNum = '000';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>