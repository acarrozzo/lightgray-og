<?php
// -- 023 -- Entrance to the Forest
$roomname = "Entrance to the Forest";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc023'];
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
// if($input=='w' || $input=='west') 
// {	echo 'You travel west<br>';
//  	$message="<i>You travel west</i><br>".$_SESSION['desc022'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '022'"); // -- room change
// }
else if ($input == 'west') {     $roomNum = '022';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');} 

else if($input=='n' || $input=='north') 
{	echo 'You travel north<br>';
 	$message="<i>You travel north</i><br>".$_SESSION['desc024'];
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET room = '024'"); // -- room change
	$updates = ['room' => '024', 'endfight' => 0]; // -- room change + reset fight
	updateStats($link, $username, $updates); // -- apply changes
	// ---------------------- SKILL FLAG! ---------------------- //
	if ($jacklumberFlag==0) {
		echo  $message = "<div class='menuAction'>You can now learn the Ranged SKILL from Jack Lumber!</div>";
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET jacklumberFlag = 1");
		$updates = ['jacklumber' => 1]; // -- room change + reset fight
		updateStats($link, $username, $updates); // -- apply changes
	}
	
}
else if($input=='e' || $input=='east') 
{	
	if ($quest9 == 2)
	{
		echo 'You travel east and leave the grassy field<br>';
		$message="<i>You travel east and leave the grassy field</i><br>".$_SESSION['desc101'];
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET room = '101'"); // -- room change
		$updates = ['room' => '101', 'endfight' => 0]; // -- room change + reset fight
		updateStats($link, $username, $updates); // -- apply changes
	}
	else
	{
		echo 'As you attempt to leave the Grassy Field you are stopped by a Red Guard.<br>';
		$message="<i>As you attempt to leave the Grassy Field you are stopped by a Red Guard. He says you're too weak and you need to complete Jack's quests first. You can find Jack in his cabin just north of here. </i><br>";
		include ('update_feed.php'); // --- update feed		
	}
}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>
