<?php
// -- 114 -- On a Stone Path by a Magical Gate
$roomname = "On a Stone Path by a Magical Gate";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc114'];
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

$quest20=$row['quest20']; 
$KLkoboldmaster=$_SESSION['KLkoboldmaster']; 


include ('battle-sets/forest-path.php'); 

	





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


else if($input=='n' || $input=='north') 
{	
	if ($quest20 >=2 || $KLkoboldmaster >= 1 ) 
	{
	echo 'You travel north through Magical Gate the and enter the Path to the Mountains<br>';
 	$message="<i>You travel north through Magical Gate the and enter the Path to the Mountains</i><br>".$_SESSION['desc501'];
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET room = 501"); // -- room change
    $updates = ['endfight' => 0, 'room' => '501' ]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes
	}
	else
	{
	echo $message="<i>You cannot pass the Magical Gate yet! Join the Wizard's Guild by defeating the Kobold Master to pass.</i><br>";
	include ('update_feed.php'); // --- update feed	
		
	}
}
// else if($input=='sw' || $input=='southwest') 
// {	echo 'You travel southwest<br>';
//    $message="<i>You travel southwest</i><br>".$_SESSION['desc115'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 115"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='s' || $input=='south') 
// {	echo 'You travel south<br>';
//    $message="<i>You travel south</i><br>".$_SESSION['desc113'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 113"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '113';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'southwest') { $roomNum = '115';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');} 
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
