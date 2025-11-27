<?php
                        $roomname = "The Despair";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc908'];

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
// else if($input=='s' || $input=='south') 
// {  echo 'You travel south through The Despair<br>';
//    $message="<i>You travel south through The Despair</i><br>".$_SESSION['desc228'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 904"); // -- room change
// }

// else if($input=='w' || $input=='west') 
// {	echo 'You travel west through The Despair<br>';
//    $message="<i>You travel west through The Despair</i><br>".$_SESSION['desc209'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 904"); // -- room change
// }

// else if($input=='sw' || $input=='southwest') 
// {	echo 'You travel southwest through The Despair<br>';
//    $message="<i>You travel southwest through The Despair</i><br>".$_SESSION['desc227'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 904"); // -- room change
// }

// else if($input=='n' || $input=='north') 
// {	echo 'You travel north through The Despair<br>';
//    $message="<i>You travel north through The Despair</i><br>".$_SESSION['desc211'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 904"); // -- room change
// }

// else if($input=='e' || $input=='east') 
// {	echo 'You travel east through The Despair<br>';
//    $message="<i>You travel east through The Despair</i><br>".$_SESSION['desc217'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 904"); // -- room change
// }
// else if($input=='ne' || $input=='northeast') 
// {	echo 'You travel northeast through The Despair<br>';
//    $message="<i>You travel northeast through The Despair</i><br>".$_SESSION['desc216'];
//   include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 904"); // -- room change
// }
// else if($input=='nw' || $input=='northwest') 
// {	echo 'You travel northwest through The Despair<br>';
//    $message="<i>You travel northwest through The Despair</i><br>".$_SESSION['desc226'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 904"); // -- room change
// }

// else if($input=='se' || $input=='southeast') 
// {	echo 'You travel southeast through The Despair<br>';
//    $message="<i>You travel southeast through The Despair</i><br>".$_SESSION['desc225'];
//    include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 904"); // -- room change
// }


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '909';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northwest') { $roomNum = '907';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
