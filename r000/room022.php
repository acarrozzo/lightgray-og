<?php
// -- 022 -- Dirt Road East
$roomname = "Dirt Road East";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc022'];

include('function-start.php');

// // -------------------------DB CONNECT!
// include('db-connect.php');
// // -------------------------DB QUERY!
// $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
// $stmt->bind_param("s", $_SESSION['username']);
// $stmt->execute();
// $result = $stmt->get_result();
// if (!$result) {
//     die('There was an error running the query [' . $link->error . ']');
// }
// // -------------------------DB OUTPUT!
// while ($row = $result->fetch_assoc()) {

$row = getUserData($link, $_SESSION['username']); // --- gets all user data from database






// -------------------------------------------------------------------------- TRAVEL
// if ($input=='w' || $input=='west') {
//     echo 'You travel west<br>';
//     $message="<i>You travel west</i><br>".$_SESSION['desc006'];
//     include('update_feed.php'); // --- update feed
// $results = $link->query("UPDATE $user SET room = '006'"); // -- room change
// } elseif ($input=='e' || $input=='east') {
//     echo 'You travel east<br>';
//     $message="<i>You travel east</i><br>".$_SESSION['desc023'];
//     include('update_feed.php'); // --- update feed
// $results = $link->query("UPDATE $user SET room = '023'"); // -- room change
// }
// secret SE path
if ($input=='se' || $input=='southeast') {
    echo 'You find a hidden path and make your way into the Spider Cave above the Scorpion Pit<br>';
    $message="<i>You find a hidden path and make your way into the Spider Cave above the Scorpion Pit</i><br>".$_SESSION['desc012'];
    include('update_feed.php'); // --- update feed
// $results = $link->query("UPDATE $user SET room = '012'"); // -- room change
$updates = ['room' => '012', 'endfight' => 0]; // -- room change + reset fight
updateStats($link, $username, $updates); // -- apply changes
}


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '023';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'west') {     $roomNum = '006';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');} 

// ----------------------------------- end of room function
include('function-end.php');
// }
