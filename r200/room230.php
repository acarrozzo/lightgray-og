<?php
						$roomname = "Red Town South Gate";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc230'];
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

$row = getUserData($link, $_SESSION['username']); // --- gets all user data from database   

include ('battle-sets/thief.php');






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
// {	echo 'You travel north<br>';
//    $message="<i>You travel north</i><br>".$_SESSION['desc228'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 228"); // -- room change
// }
// else if($input=='w' || $input=='west') 
// {	echo 'You travel west<br>';
//    $message="<i>You travel west</i><br>".$_SESSION['desc229'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 229"); // -- room change
// }
else if($input=='s' || $input=='south') 
{	
	if (1 == 1){
		echo $message= 'The Red Guard prevents you from going south.<br>';
		include ('update_feed.php'); // --- update feed
	}
	else 
	{
		echo 'You travel south<br>';
		$message="<i>You travel south</i><br>".$_SESSION['desc230'];
		include ('update_feed.php'); // --- update feed
   		// $results = $link->query("UPDATE $user SET room = 230"); // -- room change
		   $updates = ['endfight' => 0, 'room' => '230' ]; // -- set changes
		   updateStats($link, $username, $updates); // -- apply changes

	}
}


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '228';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'west') {     $roomNum = '229';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}





// ----------------------------------- end of room function
include('function-end.php');
// }
?>
