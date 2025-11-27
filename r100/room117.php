<?php
						$roomname = "Under a Massive Tree in the Forest";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc117'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5-13"; // danger level

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

$leather=$row['leather'];

include ('battle-sets/forest.php');
include ('function-choptree.php');

if($input=='get leather')  // ---- Get leather
{
	if ( $leather >= 5 )
	{
	echo $message="<div class='menuAction'>You already have more than 5 leather! Come back if you run low.</div>";	include ('update_feed.php'); // --- update feed
	}
	else {
	echo $message="<div class='menuAction'>You pick up 5 pieces of leather!</div>";
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET leather = 5");
	updateStats($link, $username,['leather' => 5 ]); // -- update stat 

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
//    $message="<i>You travel south</i><br>".$_SESSION['desc116'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 116"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='n' || $input=='north') 
// {	echo 'You travel north<br>';
//    $message="<i>You travel north</i><br>".$_SESSION['desc118'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 118"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='u' || $input=='up') 
// {	
// 	echo 'You travel up<br>';
//    	$message="<i>You travel up</i><br>".$_SESSION['desc117'];
//   	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 117"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='e' || $input=='east') 
// {	echo 'You travel east<br>';
//    $message="<i>You travel east</i><br>".$_SESSION['desc121'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 121"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '118';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	} 
elseif ($input == 'east') {     $roomNum = '121';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	} 
elseif ($input == 'south') {    $roomNum = '116';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	} 
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
