<?php
// -- 106 -- Traveling Warrior - Warrior Skills
$roomname = "Traveling Warrior - Warrior Skills";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc106'];
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


$travelingwarriorFlag = $row['travelingwarriorFlag'];

include ('battle-sets/forest-path.php'); 


// ---------------------- SKILL FLAG! ---------------------- //
if ($travelingwarriorFlag==0) {
echo  $message = "<div class='menuAction'>
You can now learn new SKILLS from the Traveling Warrior!</div> ";
include ('update_feed.php'); // --- update feed
// $results = $link->query("UPDATE $user SET travelingwarriorFlag = 1");
updateStats($link, $username,['travelingwarriorFlag' => 1 ]); // -- update stat 
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
//    $message="<i>You travel south</i><br>".$_SESSION['desc107'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 107"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

// else if($input=='n' || $input=='north') 
// {	echo 'You travel north<br>';
//    $message="<i>You travel north</i><br>".$_SESSION['desc104'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 104"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
elseif ($input == 'north') {    $roomNum = '104';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'south') {    $roomNum = '107';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');} 

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
