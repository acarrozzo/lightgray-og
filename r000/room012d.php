<?php
				$roomname = "Scorpion Control Room";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc012d'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5"; // danger level

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
	
$scorpionswitch = $_SESSION['scorpionswitch'];	
	
// -------------------------------------------------------------------------- BATTLE VARIABLES		
 	
$infight = $row['infight'];
$endfight = $row['endfight'];
	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE alpha scorpion - 2/10
if(($rand <= 2 ) && $infight==0 && $endfight==0) 
	{	
		// $results = $link->query("UPDATE $user SET enemy = 'Alpha Scorpion'"); 
		updateStats($link, $username, ['enemy' => 'Alpha Scorpion']); // -- update stats
		include ('battle.php'); 
	}			
// -------------------------------------------------------------------------- INITIALIZE giant rat - 2/10
else if(($rand >= 9 ) && $infight==0 && $endfight==0) 
	{	
		// $results = $link->query("UPDATE $user SET enemy = 'Giant Rat'"); 
		updateStats($link, $username, ['enemy' => 'Giant Rat']); // -- update stats
		include ('battle.php'); 
	}					
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	





if ($input == 'flip lever')
{
	if ($_SESSION['scorpionswitch'] == 1)
	{
		echo $message = 'You already flipped this switch. You have a feeling a doorway has opened up somewhere in this cave.<br>';
		include ('update_feed.php'); // --- update feed
	}
	else {
		echo $message= 'You flip the lever and hear some grinding noises come from the north.<br>';
		include ('update_feed.php'); // --- update feed
		$_SESSION['scorpionswitch'] = 1;
	}
		//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}


// -------------------------------------------------------------------------- Battle TRAVEL
else if ((	$input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='east' || $input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' || $input=='down' )  && $infight >= 1) {
	echo 'You cannot leave the room in the middle of battle!<br>';
   	$message="<i>You cannot leave the room in the middle of battle!</i><br>";
	include ('update_feed.php'); // --- update feed
	}
// // -------------------------------------------------------------------------- TRAVEL
// else if($input=='n' || $input=='north') 
// {  	echo 'You travel north<br>';
//    	$message="<i>You travel north</i><br>".$_SESSION['desc012e'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = '012e'"); // -- room change
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '012e';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');} 
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
