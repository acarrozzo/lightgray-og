<?php
						$roomname = "Red Dining Room";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc223'];
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

// include ('battle-sets/thief.php');

$veggies = $row['veggies'];
$coffee = $row['coffee'];
$cookedmeat = $row['cookedmeat'];

if($input=='grab veggies' )  // ---- GRAB veggies
{
	if ( $veggies >= 10 )
	{
	echo $message="<div class='menuAction'>You already have more than 10 veggies! Come back if you run out.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'>You pick up 10 veggies from the table!</div>";
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET veggies = 10");
	updateStats($link, $username,['veggies' => 10 ]); // -- update stat 

	}
}
if($input=='grab coffee' )  // ---- GRAB coffee
{
	if ( $coffee >= 10 )
	{
	echo $message="<div class='menuAction'>You already have more than 10 coffee! Come back if you run out.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'>You pick up 10 cups o' coffee from the table!</div>";
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET coffee = 10");
	updateStats($link, $username,['coffee' => 10 ]); // -- update stat 
	}
}
if($input=='grab meat' )  // ---- GRAB cooked meat
{
	if ( $cookedmeat >= 10 )
	{
	echo $message="<div class='menuAction'>You already have more than 10 cooked meat! Come back if you run out.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'>You pick up 10 pieces of meat from the table!</div>";
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET cookedmeat = 10");
	updateStats($link, $username,['cookedmeat' => 10 ]); // -- update stat 
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
//    $message="<i>You travel south</i><br>".$_SESSION['desc222'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 222"); // -- room change
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '222';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}



// ----------------------------------- end of room function
include('function-end.php');
// }
?>
