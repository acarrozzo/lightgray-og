<?php
                        $roomname = "Snowy Mountain Clearing";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc605'];

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



    // -------------------------------------------------------------------------- Activate Forest Teleport
    if ($row['teleport9'] == 0) {
        // $results = $link->query("UPDATE $user SET teleport9 = 1");
        updateStats($link, $username,['teleport9' => 1 ]); // -- update stat 
        echo $message="<i>You can now teleport to the Mountains! Click 'Mountains' in your teleport menu to teleport to this location at any time.</i><br>";
        include('update_feed.php'); // --- update feed
    }



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


    // elseif ($input=='w' || $input=='west') {
    //     echo 'You travel west<br>';
    //     $message="<i>You travel west</i><br>".$_SESSION['desc608'];
    //     include('update_feed.php'); // --- update feed
    //         $results = $link->query("UPDATE $user SET room = '608'"); // -- room change
    //         //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // } elseif ($input=='se' || $input=='southeast') {
    //     echo 'You travel southeast<br>';
    //     $message="<i>You travel southeast</i><br>".$_SESSION['desc603'];
    //     include('update_feed.php'); // --- update feed
    //         $results = $link->query("UPDATE $user SET room = '603'"); // -- room change
    //         //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // } elseif ($input=='sw' || $input=='southwest') {
    //     echo 'You travel southwest<br>';
    //     $message="<i>You travel southwest</i><br>".$_SESSION['desc607'];
    //     include('update_feed.php'); // --- update feed
    //         $results = $link->query("UPDATE $user SET room = '607'"); // -- room change
    //         //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // }
    // elseif ($input=='nw' || $input=='northwest') {
    //     echo 'You travel northwest<br>';
    //     $message="<i>You travel northwest</i><br>".$_SESSION['desc609'];
    //     include('update_feed.php'); // --- update feed
    //         $results = $link->query("UPDATE $user SET room = '609'"); // -- room change
    //         //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'west') {     $roomNum = '608';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southeast') { $roomNum = '603';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southwest') { $roomNum = '607';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northwest') { $roomNum = '609';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
