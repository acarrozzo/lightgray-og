<?php
                        $roomname = "The Despair";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc902'];

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
    // -------------------------------------------------------------------------- BATTLE VARIABLES
    $infight = $row['infight'];
    $endfight = $row['endfight'];
    $enemy=$row['enemy'];

  
  
  
  
    // -------------------------------------------------------------------------- Battle TRAVEL
    if (($input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
        $input=='e' || $input=='north' || $input=='se' || $input=='southeast' ||
        $input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
        $input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
        $input=='u' || $input=='up' || $input=='d' || $input=='down')  && $infight >= 1) {
        echo 'You cannot leave the room in the middle of battle!<br>';
        $message="<i>You cannot leave the room in the middle of battle!</i><br>";
        include('update_feed.php'); // --- update feed
    }

    // -------------------------------------------------------------------------- TRAVEL
    // elseif ($input=='e' || $input=='east') {
    //     echo 'You travel east<br>';
    //     $message="<i>You travel east</i><br>".$_SESSION['desc903'];
    //     include('update_feed.php'); // --- update feed
    //         $results = $link->query("UPDATE $user SET room = '903'"); // -- room change
    //         //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // }
    // else if($input=='w' || $input=='west') 
    // {			echo 'You travel west<br>';
    //        $message="<i>You travel west</i><br>".$_SESSION['desc901'];
    //                 include ('update_feed.php'); // --- update feed
    //                $results = $link->query("UPDATE $user SET room = '901'"); // -- room change
    //                //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats    
    // }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '903';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'west') {     $roomNum = '901';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
