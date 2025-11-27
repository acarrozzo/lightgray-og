<?php
// -- 008 -- Spider Cave Exit
$roomname = "Spider Cave Exit";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc008'];
////$dangerLVL = $_SESSION['dangerLVL'] = "2"; // danger level

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

	
echo 'endfight: '.$endfight.'<br>';
echo 'infight: '.$infight.'<br>';




	
	
		
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1) 
	{	$rand = rand (1,10); 
	}	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE Spider -30%
if(($input=='attack spider' || $input=='attack' || $rand <= 3 ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack spider') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Spider'");
		updateStats($link, $username, ['enemy' => 'Spider']); // -- update stats
		include ('battle.php'); }
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack spider') { $input = 'attack'; }
		include ('battle.php');	}		



if($input=='read sign') {  //read sign
   echo $message ="<i>You read the sign:</i><br>Run NORTH to safety!<br>";
	include ('update_feed.php'); // --- update feed	
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
// else if($input=='n' || $input=='north') 
// {
// 	echo 'You travel north<br>';
// 	$message="<i>You travel north</i><br>".$_SESSION['desc007'];
// 	include ('update_feed.php'); // --- update feed
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	$results = $link->query("UPDATE $user SET room = '007'"); // -- room change
// }
// else if($input=='s' || $input=='south') 
// {
// 	echo 'You travel south<br>';
// 	$message="<i>You travel south</i><br>".$_SESSION['desc009'];
// 	include ('update_feed.php'); // --- update feed
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	$results = $link->query("UPDATE $user SET room = '009'"); // -- room change
// }
// else if($input=='e' || $input=='east') 
// {
// 	echo 'You travel east<br>';
//    	$message="<i>You travel east</i><br>".$_SESSION['desc011'];
// 	include ('update_feed.php'); // --- update feed
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	$results = $link->query("UPDATE $user SET room = '011'"); // -- room change
// }
// else if($input=='se' || $input=='southeast') 
// {
// 	echo 'You travel southeast<br>';
//    	$message="<i>You travel southeast</i><br>".$_SESSION['desc010'];
// 	include ('update_feed.php'); // --- update feed
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	$results = $link->query("UPDATE $user SET room = '010'"); // -- room change
// }
elseif ($input == 'north') {    $roomNum = '007';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'east') {     $roomNum = '011';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'south') {    $roomNum = '009';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'southeast') { $roomNum = '010';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');} 

// ----------------------------------- end of room function
include('function-end.php');
// }

?>
