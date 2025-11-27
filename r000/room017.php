<?php
// -- 017 -- On the Beach
$roomname = "On the Beach";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc017'];
//$dangerLVL = $_SESSION['dangerLVL'] = "2"; // danger level

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

// -------------------------------------------------------------------------- READ SIGN!
if ($input=='read sign') {
    echo '<i>You read the Beach Sign</i> <br>  ';
    $message="
    <i>you read the sign:</i>
    <div class='sign'>
    <h3>On the Beach</h3>
    <form id='mainForm' method='post' action='' name='formInput'>
    <p><input type='submit' name='input1' class='sandBG' value='north'/></p>
    <p>Go north past the <span class='gold'>Abandoned Docks</span> to reach the <span class='gold'>Giant Rock</span>. If you have a pickaxe you can mine some quick stone there.</p>
    <p><input type='submit' name='input1' class='sandBG' value='south'/></p>
    <p>You can fight <span class='gold'>Sand Crabs</span> to the south. </p>
    </form>
    </div>";
    include('update_feed.php'); // --- update feed
}


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '016';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'east') {     $roomNum = '014';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'south') {    $roomNum = '018';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');} 
    // // -------------------------------------------------------------------------- TRAVEL
    // elseif ($input=='s' || $input=='south') {
    //     echo 'You travel south<br>';
    //     $message="<i>You travel south</i><br>".$_SESSION['desc018'];
    //     include('update_feed.php'); // --- update feed
    // $results = $link->query("UPDATE $user SET room = '018'"); // -- room change
    // //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // } elseif ($input=='n' || $input=='north') {
    //     echo 'You travel north<br>';
    //     $message="<i>You travel north</i><br>".$_SESSION['desc016'];
    //     include('update_feed.php'); // --- update feed
    // $results = $link->query("UPDATE $user SET room = '016'"); // -- room change
    // //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // } elseif ($input=='e' || $input=='east') {
    //     echo 'You travel east<br>';
    //     $message="<i>You travel north</i><br>".$_SESSION['desc014'];
    //     include('update_feed.php'); // --- update feed
    // $results = $link->query("UPDATE $user SET room = '014'"); // -- room change
    // //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // }


// ----------------------------------- end of room function
include('function-end.php');
// }
