<?php
                        $roomname = "Silver Temple";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc625'];

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


// -------------------------------------------------------------------------- If room ready create random rand #
$rand = rand(1, 4);
// -------------------------------------------------------------------------- INITIALIZE - 1/4
if ((($rand == 1) && $infight==0 && $endfight==0) || $input == "attack") {
    // $results = $link->query("UPDATE $user SET enemy = 'Silver Titan'");
    updateStats($link, $username, ['enemy' => 'Silver Titan']); // -- set enemy
    include('battle.php');
}
// -------------------------------------------------------------------------- IN BATTLE
elseif ($infight >=1) {
    include('battle.php');
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


    else if($input=='se' || $input=='southeast') 
{ 
    echo "You travel southeast to the Dragon's Ledge<br>";
    $message="<i>You travel southeast to the Dragon's Ledge</i><br>".$_SESSION['desc620'];
    include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET room = '620'"); // -- room change
        //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
        updateStats($link, $username,['endfight' => 0, 'room' => '620' ]); // -- update stats
        $_SESSION['dragonsledgesearch'] = 0;
}



// ----------------------------------- end of room function
include('function-end.php');
// }
