<?php
                        $roomname = "In the Forest on a Red Guard Tower";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc124'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5-13"; // danger level

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
    $quest11=$row['quest11'];
    $quest12=$row['quest12'];
    $quest13=$row['quest13'];

    $arrows=$row['arrows'];

    include('battle-sets/forest.php');
    include('function-choptree.php');


    if ($input=='grab arrows') {  // ---- GRAB ARROWS
        if ($arrows >= 50) {
            echo $message="<div class='menuAction'>You already have more than 50 arrows! Come back if you run low.</div>";
            include('update_feed.php'); // --- update feed
        } else {
            echo $message="<div class='menuAction'>You grab a bundle of arrows! [ +50 arrows ]</div>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET arrows = 50");
            $updates = [ // -- set changes
                'arrows' => 50,
                'endfight' => 0
            ];
            updateStats($link, $username, $updates); // -- apply changes

        }
    }


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
//     elseif ($input=='e' || $input=='east') {
//         echo 'You travel east<br>';
//         $message="<i>You travel east</i><br>".$_SESSION['desc125'];
//         include('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 125"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
//     } elseif ($input=='n' || $input=='north') {
//         echo 'You travel north<br>';
//         $message="<i>You travel north</i><br>".$_SESSION['desc123'];
//         include('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 123"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
//     } 
    elseif ($input=='s' || $input=='south') {
        if ($quest11 == 2 || $quest12 == 2 || $quest13 == 2) {
            echo 'You climb up the ladder enter the Red Guard Tower.<br>';
            $message="<i>You climb up the ladder enter the Red Guard Tower.</i><br>".$_SESSION['desc215'];
            include('update_feed.php'); // --- update feed
    // $results = $link->query("UPDATE $user SET room = 215"); // -- room change
    $updates = ['endfight' => 0, 'room' => '215' ]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['emptytree'] = 0; // reset tree
        } else {
            echo "You can't go south here until you help out the Red Guard Captain.<br>";
            $message="<i>You can't go south here until you help out the Red Guard Captain.</i><br>";
            include('update_feed.php'); // --- update feed
        }
    }



// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '123';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'east') {     $roomNum = '125';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
// ----------------------------------- end of room function
include('function-end.php');
// }
