<?php
// -- 004 -- Grassy Field West - Flower Patch
$roomname = "Grassy Field West";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc004'];
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


$quest4=$row['quest4'];



if ($input == 'get flower' || $input == 'pick flower' || $input == 'pick up flower') { // ---- PICK FLOWER
    if ($row['flower'] >= 1) {
        echo 'You already have a flower in your inventory.<br>';
        $message = "<i>You already have a flower in your inventory.</i><br>";
        include('update_feed.php'); // --- update feed
    } else {
        echo 'You pick up a flower.<br>';
        $message = "<i>You pick up a flower.</i><br>";
        include('update_feed.php'); // --- update feed
        updateStats($link, $username, ['flower' => 1]); // --- update flower attribute
    }
}

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '020';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'east') {     $roomNum = '001';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'south') {    $roomNum = '003';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'northeast') { $roomNum = '005';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'southeast') { $roomNum = '002';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'southwest') { $roomNum = '003c';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'west') {     
	if($quest4 < 2) { 
		echo $message="<i>You're going to need a weapon to fight off the Sand Crabs down by the Beach! Complete QUEST 4 to the southwest of here to get your first weapon.</i><br>";
		include ('update_feed.php'); // --- update feed
		}
		else{
		echo 'You travel west<br>';
		$message="<i>You travel west</i><br>".$_SESSION['desc014'];
		include ('update_feed.php'); // --- update feed
		// $updates = ['room' => '014', 'endfight' => 0]; // -- room change + reset fight
        // updateStats($link, $username, $updates); // -- apply changes

        updateStats($link, $username, ['room' => '014', 'endfight' => 0]); // --- update flower attribute

		// $results = $link->query("UPDATE $user SET room = '014'"); // -- room change
		}
} 

// -------------------------------------------------------------------------- TRAVEL
// else if($input=='s' || $input=='south') 
// {
// echo 'You travel south<br>';
// 	$message="<i>You travel south</i><br>".$_SESSION['desc003']; 
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '003'"); // -- room change
// }
// else if($input=='n' || $input=='north') 
// {
// echo 'You travel north<br>';
// 	$message="<i>You travel north</i><br>".$_SESSION['desc020'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '020'"); // -- room change
// }
// else if($input=='ne' || $input=='northeast') 
// {
// echo 'You travel northeast<br>';
// 	$message="<i>You travel northeast</i><br>".$_SESSION['desc005'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '005'"); // -- room change
// }
// else if($input=='se' || $input=='southeast') 
// {
// echo 'You travel southeast<br>';
// 	$message="<i>You travel southeast</i><br>".$_SESSION['desc002'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '002'"); // -- room change
// }
// else if($input=='sw' || $input=='southwest') 
// {
// echo 'You travel southwest<br>';
// 	$message="<i>You travel southwest</i><br>".$_SESSION['desc003c'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '003c'"); // -- room change
// }
// else if($input=='e' || $input=='east') 
// {
// echo 'You travel east<br>';
// 	$message="<i>You travel east</i><br>".$_SESSION['desc001'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '001'"); // -- room change
// }
// else if($input=='wXXX' || $input=='westXXX') 
// {
// if($quest4 < 2) { 
// 	echo $message="<i>You're going to need a weapon to fight off the Sand Crabs down by the Beach! Complete QUEST 4 to the southwest of here to get your first weapon.</i><br>";
// 	include ('update_feed.php'); // --- update feed
// 	}
// 	else{
// 	echo 'You travel west<br>';
// 	$message="<i>You travel west</i><br>".$_SESSION['desc014'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '014'"); // -- room change
// 	}
// }





// ----------------------------------- end of room function
include('function-end.php');
 

// }
?>
