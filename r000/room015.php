<?php
// -- 015 -- On the Beach
$roomname = "On the Beach by a Giant Rock";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc015'];
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

$pickaxe = $row['pickaxe'];
$stone = $row['stone'];
$currency = $row['currency'];

if ($input=='mine stone') {  // --- mine stonex
    if ($pickaxe >= 1 && $stone < 10) {
        $stoneQty = rand(2, 4);
        echo 'You mine some stone [ '.+$stoneQty.' stone ]<br>';
        $message="You mine some stone [ +$stoneQty stone ]<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET stone = stone + $stoneQty"); // -- room change
        updateStats($link, $username, ['stone' => $row['stone'] + $stoneQty]); // -- update stats
    } elseif ($pickaxe >= 1 && $stone >=10) {
        echo $message = "You can't mine more than 10 stone here!<br>";
        include('update_feed.php'); // --- update feed
    } else {
        echo 'You need a pickaxe to mine stone. You can make one at a Crafting Table.<br>';
        $message="You need a pickaxe to mine stone. You can make one at a Crafting Table.<br>";
        include('update_feed.php'); // --- update feed
    }
}

// -------------------------------------------------------------------------- SEARCH 2000 gold
if ($input == 'search')
{
    if ($currency < 2000) {
            echo $message="You lucky dog! You find 2000 ".$_SESSION['currency']." under a rock!<br>";
            include ('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET currency = currency + 2000");
            updateStats($link, $username, ['currency' => $row['currency'] + 2000]); // -- update stats
    }
    else {
        echo $message="You thought you might get lucky but you find nothing.<br>";
        include ('update_feed.php'); // --- update feed
    }
}

// // -------------------------------------------------------------------------- TRAVEL
// elseif ($input=='s' || $input=='south') {
//     echo 'You travel south<br>';
//     $message="<i>You travel south</i><br>".$_SESSION['desc016'];
//     include('update_feed.php'); // --- update feed
// $results = $link->query("UPDATE $user SET room = '016'"); // -- room change
// //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '016';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');} 

// ----------------------------------- end of room function
include('function-end.php');
// }
