<?php
						$roomname = "Rocky Flats Gate";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc205'];
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

$quest19=$row['quest19']; 
$KLogrelieutenant=$_SESSION['KLogrelieutenant']; 


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
else if($input=='w' || $input=='west') 
{	
	if ($quest19 >= 2 || $KLogrelieutenant >= 1)
	{
	echo 'You travel west into the Rocky Flats<br>';
 	$message="<i>You travel west into the Rocky Flats.</i><br>".$_SESSION['desc301'];
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET room = 301"); // -- room change
    $updates = ['endfight' => 0, 'room' => '301' ]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes
	}
	else
	{
	echo $message="<i>As you attempt to go west you are stopped by a Dwarf Guard. You need to join the WARRIOR'S GUILD by defeating the Ogre Lieutenant if you wish to enter the Rocky Flats.</i><br>";
	include ('update_feed.php'); // --- update feed	
	}
}

// else if($input=='e' || $input=='east') 
// {	echo 'You travel east<br>';
//    $message="<i>You travel east</i><br>".$_SESSION['desc204'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 204"); // -- room change
// }



// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '204';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>
