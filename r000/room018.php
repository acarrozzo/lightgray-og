<?php
$roomname = "On the Beach";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc018'];
//$dangerLVL = $_SESSION['dangerLVL'] = "2"; // danger level

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


$infight = $row['infight'];
$endfight = $row['endfight'];

	
// -------------------------------------------------------------------------- ROOM READY - RAND NUM GENERATOR
if ($infight < 1 && $endfight != 1) 
	{	$rand = rand (1,10); 
	} 	else {	$rand=99; } // default rand
// -------------------------------------------------------------------------- INITIALIZE sand crab - 20%
if(($input=='attack sand crab' || $input=='attack' || $rand <= 2 ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack sand crab') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Sand Crab'");
		updateStats($link, $username, ['enemy' => 'Sand Crab']); // -- update stats
		include ('battle.php');	}
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack sand crab') { $input = 'attack'; }
		include ('battle.php');	}	
// -------------------------------------------------------------------------- Battle TRAVEL
if (($input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='north' || $input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' || $input=='down' )  && $infight >= 1) {
	echo 'You cannot leave the room in the middle of battle!<br>';
   	$message="<i>You cannot leave the room in the middle of battle!</i><br>";
	include ('update_feed.php'); // --- update feed
	}

// // -------------------------------------------------------------------------- TRAVEL
// else if($input=='s' || $input=='south') 
// {	echo 'You travel south<br>';
//  	$message="<i>You travel south</i><br>".$_SESSION['desc019'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '019'"); // -- room change
// 	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='n' || $input=='north') 
// {	echo 'You travel north<br>';
//  	$message="<i>You travel north</i><br>".$_SESSION['desc017'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '017'"); // -- room change
// 	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '017';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'south') {    $roomNum = '019';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');} 

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
