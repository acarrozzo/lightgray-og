<?php
// -- 103c -- More Cows
$roomname = "More Cows";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc103c'];
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
 	$wood=$row['wood'];
	
if($input=='get wood')  // ---- Get wood
{
	if ( $wood >= 5 )
	{
	echo $message="<div class='menuAction'><i>You can't pick up more than 5 pieces of wood here!</i></div>";
	include ('update_feed.php'); // --- update feed
	}
	else {
	echo $message="<div class='menuAction'><i>You grab a stack of 5 wood!</i></div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET wood = 5");
	$updates = [ 'wood' => 5 ]; // -- set changes
	updateStats($link, $username, $updates); // -- apply changes
}
}
	

	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1) 
	{	$rand = rand (1,10); 
	}	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE Cow - 50%
if(($input=='attack cow' || $input=='attack' || $rand <= 5 ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack cow') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Cow'");
		$updates = [ 'enemy' => 'Cow']; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
		include ('battle.php'); }
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack cow') { $input = 'attack'; }
		include ('battle.php');	}		






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

// // -------------------------------------------------------------------------- TRAVEL
// else if($input=='e' || $input=='east') 
// {	echo 'You travel east<br>';
//  	$message="<i>You travel east</i><br>".$_SESSION['desc103b'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '103b'"); // -- room change
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats	
// }
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '103b';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');} 

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
