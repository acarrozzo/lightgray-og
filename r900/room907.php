<?php
                        $roomname = "The Despair";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc907'];

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

$infight = $row['infight'];
$endfight = $row['endfight'];


include('battle-sets/the-despair-1.php'); // BATTLE SET DESPAIR



    

  

// -------------------------------------------------------------------------- Battle TRAVEL
if ((	$input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='east' || $input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' || $input=='down' )  && $infight >= 1) {
	echo 'You cannot leave the room in the middle of battle!<br>';
   	$message="<i>You cannot leave the room in the middle of battle!</i><br>";
	include ('update_feed.php'); // --- update feed
	}
// -------------------------------------------------------------------------- TRAVEL
// else if($input=='w' || $input=='west') 
// {	echo 'You travel west through The Despair<br>';
//    $message="<i>You travel west through The Despair</i><br>".$_SESSION['desc924'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 924"); // -- room change
// }
// else if($input=='sw' || $input=='southwest') 
// {	echo 'You travel southwest through The Despair<br>';
//    $message="<i>You travel southwest through The Despair</i><br>".$_SESSION['desc905'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 905"); // -- room change
// }
// else if($input=='se' || $input=='southeast') 
// {	echo 'You travel southeast through The Despair<br>';
//    $message="<i>You travel southeast through The Despair</i><br>".$_SESSION['desc908'];
//    include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 908"); // -- room change
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'west') {     $roomNum = '924';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southeast') { $roomNum = '908';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southwest') { $roomNum = '905';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
