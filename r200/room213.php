<?php
						$roomname = "Red Town Living Quarters";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc213'];
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



//include ('battle-sets/thief.php'); 
$cookedmeat = $row['cookedmeat'];


if($input=='grab meat') 
{	if ($cookedmeat >= 5)
	 	{ 
			echo $message="<div class='menuAction'>You already have 5 pieces of meat! Come back later if you eat them all.</div>"; 
			include ('update_feed.php'); // --- update feed
		}
	else
	 	{ 
			echo $message="<div class='menuAction'>You grab 5 pieces of meat off the table!</div>"; 
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET cookedmeat = 5");
			$updates = [ // -- set changes
				'cookedmeat' => 5
			];
			updateStats($link, $username, $updates); // -- apply changes
	 	}
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

// else if($input=='s' || $input=='south') 
// {	echo 'You travel south<br>';
//    $message="<i>You travel south</i><br>".$_SESSION['desc212'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 212"); // -- room change
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '212';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>
