<?php
                        $roomname = "Wooded Mountain Path";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc603'];

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


    include('function-choptree.php');
    include('battle-sets/mountains.php');










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
    //     $message="<i>You travel east</i><br>".$_SESSION['desc612'];
    //     include('update_feed.php'); // --- update feed
    //         $results = $link->query("UPDATE $user SET room = '612'"); // -- room change
    //         //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // } elseif ($input=='nw' || $input=='northwest') {
    //     echo 'You travel northwest<br>';
    //     $message="<i>You travel northwest</i><br>".$_SESSION['desc605'];
    //     include('update_feed.php'); // --- update feed
    //         $results = $link->query("UPDATE $user SET room = '605'"); // -- room change
    //         //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // } elseif ($input=='se' || $input=='southeast') {
    //     echo 'You travel southeast<br>';
    //     $message="<i>You travel southeast</i><br>".$_SESSION['desc602'];
    //     include('update_feed.php'); // --- update feed
    //         $results = $link->query("UPDATE $user SET room = '602'"); // -- room change
    //         //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // } elseif ($input=='sw' || $input=='southwest') {
    //     echo 'You travel southwest<br>';
    //     $message="<i>You travel southwest</i><br>".$_SESSION['desc604'];
    //     include('update_feed.php'); // --- update feed
    //         $results = $link->query("UPDATE $user SET room = '604'"); // -- room change
    //         //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // }





// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '612';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southeast') { $roomNum = '602';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southwest') { $roomNum = '604';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northwest') { $roomNum = '605';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
