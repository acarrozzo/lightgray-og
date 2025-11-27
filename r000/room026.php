<?php
// -- 026 -- Stone Path South
$roomname = "Stone Path South";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc026'];
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



// -------------------------------------------------------------------------- TRAVEL
// if($input=='n' || $input=='north') 
// {
// 	echo 'You travel north<br>';
// 	$message="<i>You travel north</i><br>".$_SESSION['desc002']; 
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '002'"); // -- room change
// 	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	}
	
// 	else if($input=='s' || $input=='south') 
// {

// 	echo 'You travel south<br>';
//    $message="<i>You travel south</i><br>".$_SESSION['desc027'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = '027'"); // -- room change
//   	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
 
//    }
// else if($input=='sw' || $input=='southwest') 
// {
// 	echo 'You travel southwest<br>';
// 	$message="<i>You travel southwest</i><br>".$_SESSION['desc028'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = '028'"); // -- room change
//   	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// -------------------------------------------------------------------------- TRAVEL
if ($input == 'north') {    $roomNum = '002';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'south') {    $roomNum = '027';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'southwest') { $roomNum = '028';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');} 
// ----------------------------------- end of room function
include('function-end.php');
// }

?>
