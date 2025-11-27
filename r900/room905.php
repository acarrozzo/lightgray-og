<?php
                        $roomname = "Hydra Pit";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc905'];

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
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,1); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE - 100%
if(($rand <= 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Hydra'");
    updateStats($link, $username,['enemy' => 'Hydra' ]); // -- set enemy 
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	
// -------------------------------------------------------------------------- END BATTLE BLOCK




// //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight


//updateStats($link, $username, ['endfight' => 0]); // -- update stats // THIS MAKES THE ROOM NEVER SAFE - 


















  
  
  
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
    // elseif ($input=='ne' || $input=='northeast') {
    //     echo 'You travel northeast<br>';
    //     $message="<i>You travel northeast</i><br>".$_SESSION['desc907'];
    //     include('update_feed.php'); // --- update feed
    //         $results = $link->query("UPDATE $user SET room = '907'"); // -- room change
    //         //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // }
    // elseif ($input=='nw' || $input=='northwest') {
    //     echo 'You travel northwest<br>';
    //     $message="<i>You travel northwest</i><br>".$_SESSION['desc923'];
    //     include('update_feed.php'); // --- update feed
    //         $results = $link->query("UPDATE $user SET room = '923'"); // -- room change
    //         //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // }    
    // elseif ($input=='s' || $input=='south') {
    //     echo 'You travel south<br>';
    //     $message="<i>You travel south</i><br>".$_SESSION['desc906'];
    //                 include ('update_feed.php'); // --- update feed
    //                $results = $link->query("UPDATE $user SET room = '906'"); // -- room change
    //                //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats   
    // }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '906';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northeast') { $roomNum = '907';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northwest') { $roomNum = '923';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
