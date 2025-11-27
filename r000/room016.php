<?php
// -- 016 -- Abandoned Docks On the Beach
$roomname = "Abandoned Docks On the Beach";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc016'];
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


$longsword = $row['longsword'];

// -------------------------------------------------------------------------- SEARCH 2000 gold
if ($input == 'search')
{
    if ($longsword < 3) {
            echo $message="You search the docks and find a secret weapon stash of 3 long swords!<br>";
            include ('update_feed.php'); // --- update feed
        //   $results = $link->query("UPDATE $user SET longsword = 3");
            updateStats($link, $username, ['longsword' => $row['longsword'] + 3]); // -- update stats
    }
    else {
        echo $message="You search the docks but find nothing.<br>";
        include ('update_feed.php'); // --- update feed
    }
}


// -------------------------------------------------------------------------- READ SIGN!
elseif ($input=='read sign') {  //read sign
    echo '<i>You read the Blue Ocean Dock Sign</i><br>';
    $message="
    <i>you read the sign:</i>
    <div class='sign'>
    <h3><span class='blue'>Blue Ocean </span>Docks</h3>
    ---------------------------------------------------<br>
    <span class='h5 blue'>To access the Blue Ocean you need to be in a boat.</span><br>
    Craft a boat using 20 wood. If you don't know how to craft yet, visit Jack Lumber east of here.<br>
    ---------------------------------------------------
    </div>";
    include('update_feed.php'); // --- update feed
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
elseif ($input == 'north') {    $roomNum = '015';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'south') {    $roomNum = '017';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'west') {     
    if ($row['equipMount'] == 'wooden boat') {
        echo 'You travel west in your wooden boat to the Blue Ocean!<br>';
        $message="<i>You travel west in your wooden boat to the Blue Ocean! </i><br>".$_SESSION['desc401'];
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET room = '401'"); // -- room change
        updateStats($link, $username, ['room' => '401', 'endfight' => 0]); // -- update stats
    }
    elseif ($_SESSION['flying'] >= '1') {
        echo 'You fly west to the Blue Ocean!<br>';
        $message="<i>You fly west to the Blue Ocean! </i><br>".$_SESSION['desc401'];
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET room = '401'"); // -- room change
        //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
        updateStats($link, $username, ['room' => '401', 'endfight' => 0]); // -- update stats
    } else {
        echo $message = "You try to go west to the Blue Ocean but you can't yet. To access it you need to be flying or need a boat! You can craft a boat out of 20 wood.<br>";
        include('update_feed.php'); // --- update feed
    }
} 




//     // -------------------------------------------------------------------------- TRAVEL
//     elseif ($input=='w' || $input=='west') {
//         if ($row['equipMount'] == 'wooden boat') {
//             echo 'You travel west in your wooden boat to the Blue Ocean!<br>';
//             $message="<i>You travel west in your wooden boat to the Blue Ocean! </i><br>".$_SESSION['desc401'];
//             include('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = '401'"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//         }
//         elseif ($_SESSION['flying'] >= '1') {
//             echo 'You fly west to the Blue Ocean!<br>';
//             $message="<i>You fly west to the Blue Ocean! </i><br>".$_SESSION['desc401'];
//             include('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = '401'"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//         } else {
//             echo $message = "You try to go west to the Blue Ocean but you can't yet. To access it you need to be flying or need a boat! You can craft one out of 20 wood.<br>";
//             include('update_feed.php'); // --- update feed
//         }
//     } elseif ($input=='s' || $input=='south') {
//         echo 'You travel south<br>';
//         $message="<i>You travel south</i><br>".$_SESSION['desc017'];
//         include('update_feed.php'); // --- update feed
//     $results = $link->query("UPDATE $user SET room = '017'"); // -- room change
//     //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//     } elseif ($input=='n' || $input=='north') {
//         echo 'You travel north<br>';
//         $message="<i>You travel north</i><br>".$_SESSION['desc015'];
//         include('update_feed.php'); // --- update feed
//     $results = $link->query("UPDATE $user SET room = '015'"); // -- room change
//     //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//     }


// ----------------------------------- end of room function
include('function-end.php');
// }
