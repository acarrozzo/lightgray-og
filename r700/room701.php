<?php
                        $roomname = "Camp Hero";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc701'];

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




$starcitysskillsFlag = $row['starcitysskillsFlag'];
$starcityspellsFlag = $row['starcityspellsFlag'];

include ('function-choptree.php');
include ('function-silverchest.php'); 
    
    // ---------------------- CAMP HERO SKILL FLAG! ---------------------- //
    if ($starcitysskillsFlag==0) {
        echo  $message = "<div class='menuAction'>Welcome to Camp Hero. You can now learn many skills and spells.</div> ";
        include ('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET starcitysskillsFlag = 1");
        // $results = $link->query("UPDATE $user SET starcityspellsFlag = 1");
        updateStats($link, $username, ['starcitysskillsFlag' => 1]); // -- set enemy
        updateStats($link, $username, ['starcityspellsFlag' => 1]); // -- set enemy
        }


    // --------------------------------------------------------------------------- REST HEAL
    if ($input=="rest") {
        // $query = $link->query("UPDATE $user SET hp = $hpmax + 250 ");
        // $query = $link->query("UPDATE $user SET mp = $mpmax + 250 ");
        $updates = [ // -- set changes
            'hp' => $hpmax + 250,
            'mp' => $mpmax + 250
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
      //  echo 'HP:'.$hp.'<br>';
      //  echo 'MP:'.$mp.'<br>';
        echo $message = "You rest and feel rejuvenated! (+250 HP, +250 MP)<br>";
        include('update_feed.php'); // --- update feed
        //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
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
    // elseif ($input=='e' || $input=='east') {
    //     echo 'You travel east<br>';
    //     $message="<i>You travel east</i><br>".$_SESSION['desc611'];
    //     include('update_feed.php'); // --- update feed
    //         $results = $link->query("UPDATE $user SET room = '611'"); // -- room change
    //         //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // }


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '611';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}
// ----------------------------------- end of room function
include('function-end.php');
// }
