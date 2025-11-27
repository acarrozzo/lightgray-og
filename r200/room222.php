<?php
                        $roomname = "Mayor Rudolf - Town Hall Office";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc222'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

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

$KLscorpionking=$_SESSION['KLscorpionking'];
$quest24=$row['quest24'];
$chest3 = $row['chest3'];

$redtalisman = $row['redtalisman'];
$goldkey = $row['goldkey'];
$currency = $row['currency'];
$xp = $row['xp'];

// ---------------------- START ALL QUESTS ---------------------- //
if ($input=='start quest' || $input=='start quests' || $input=='start quest 24') {
    if ($quest24 <1) {
        echo $message = '<div class="fbox">
        <h3 class="padd red">You start the Red Town Mayor\'s Quests!</h3>
        <span class="icon red">'.file_get_contents("img/svg/npc/npc-mayor.svg").'</span>
        <p class="padd"><i>"The Scorpion King has brought fear to our town for far to long!"</i></p>
        <a href data-link="quests" class="btn goldBG">Open Quests </a>
        </div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET quest24 = 1");
        $updates = [ // -- set changes
            'quest24' => 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
    }
}
// ---------------------- QUEST 24) Scorpion King Bounty ---------------------- //
if ($input=='info 24') {
    echo $message="<div class='menuAction'><strong class='green'>Quest 24 Info</strong><br>
    The Scorpion King is located at the end of the lair below the Spider Cave. You have to flip a switch down there to open a secret passageway to his throne room. </div>";
    include('update_feed.php'); // --- update feed
} elseif ($input=='complete 24') {
    if ($KLscorpionking >= 1) {
        echo $message="<div class='questWin'>
        <h3>Quest 24 Completed!</h3>
        <h4>Scorpion King Bounty</h4>
        Congratulations! You have defeated the very powerful Scorpion King! The Mayor hands you a large sum of ".$_SESSION['currency'].", a Red Talisman and a Gold Key. Head to the Babylon Gardens below this office to open the Gold Chest.
        <h4>Rewards</h4>
        [ + 1000 xp  ]<br />
        [ + 1000 ".$_SESSION['currency']." ]<br />
        [ + Red Talisman! ]<br />
        [ + Gold Key! ]</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET currency = currency + 1000");
        // $results = $link->query("UPDATE $user SET xp = xp + 1000");
        // $results = $link->query("UPDATE $user SET redtalisman = redtalisman + 1");
        // $results = $link->query("UPDATE $user SET goldkey = goldkey + 1");
        // $results = $link->query("UPDATE $user SET quest24 = 2");
        $updates = [ // -- set changes
            'quest24' => 2,
            'xp' => $xp + 1000,
            'currency' => $currency + 1000,
            'redtalisman' => $redtalisman + 1,
            'goldkey' => $goldkey + 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($quest24 == 1) {
        echo $message="<div class='menuAction'><strong class='green'>Quest 24 Not Complete</strong><br>
        To complete this quest you need defeat the Scorpion King. You can find him in his lair below the Grassy Field Spider Cave.</div>";
        include('update_feed.php'); // --- update feed
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
else if($input=='n' || $input=='north') 
{ 
    if ($chest3 <= 0){
    echo  $message="<i>You cannot travel north yet. Opening up the Gold Chest at the Babylon Gardens to the west of here will unlock this door. Complete the Mayor's Quest to get a Gold Key.</i><br>";	
        include ('update_feed.php'); // --- update feed
    }
    else {
        echo 'You travel north to the Red Dining Room<br>';
        $message="<i>You travel north to the Red Dining Room</i><br>".$_SESSION['desc223'];
        include ('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET room = '223'"); // -- room change
        //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
        $updates = ['endfight' => 0, 'room' => '223' ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
}
// else if($input=='s' || $input=='south') 
// {	echo 'You travel south<br>';
//     $message="<i>You travel south</i><br>".$_SESSION['desc221'];
//     include ('update_feed.php'); // --- update feed
//     $results = $link->query("UPDATE $user SET room = 221"); // -- room change
//     //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
//         updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='w' || $input=='west') 
// {	echo 'You travel west<br>';
//    $message="<i>You travel west</i><br>".$_SESSION['desc224'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 224"); // -- room change
// }
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '221';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'west') {     $roomNum = '224';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}




// ----------------------------------- end of room function
include('function-end.php');
// }
