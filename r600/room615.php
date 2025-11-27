<?php
						$roomname = "Bottom of a Ledge";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc615'];

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


// -------------------------------------------------------------------------- BATTLE VARIABLES		
$infight = $row['infight'];
$endfight = $row['endfight'];
	
	
include ('battle-sets/mountains.php');


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
// else if($input=='s' || $input=='south') 
// {			echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc613'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '613'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
else if($input=='nw' || $input=='northwest') 
{			echo 'You find a secret path to the Cathedral Graveyard<br>';
   	$message="<i>You find a secret path to the Cathedral Graveyard</i><br>".$_SESSION['desc616'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '616'"); // -- room change
			   updateStats($link, $username,['endfight' => 0, 'room' => '616' ]); // -- update stats

   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}




// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '613';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>