<?php
						$roomname = "Red Town Dock Entrance";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc235'];
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

include ('battle-sets/thief.php'); // 1/50 thief encounter



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
// else if($input=='nw' || $input=='northwest') 
// {	echo 'You travel northwest<br>';
//    $message="<i>You travel northwest</i><br>".$_SESSION['desc218'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 218"); // -- room change
// }
else if($input=='e' || $input=='east') 
{	
	if (1 == 1){
		echo $message= 'As you attempt to walk on the docks you are stopped by a town employee. He tells you that the docks are closed for maintenance. You can access the Blue Ocean though if you wish by heading back to the grassy field where you started and going west to where the sand crabs are. There you can either fly or take a boat out onto the water!<br>';
		include ('update_feed.php'); // --- update feed
	}
	else 
	{
		echo 'You travel east<br>';
		$message="<i>You travel east</i><br>".$_SESSION['desc235'];
		include ('update_feed.php'); // --- update feed
   		// $results = $link->query("UPDATE $user SET room = 235"); // -- room change
		$updates = ['endfight' => 0, 'room' => '235' ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
	}
}




// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'northwest') { $roomNum = '218';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');}




// ----------------------------------- end of room function
include('function-end.php');
// }
?>
