<?php
							  $roomname = "At a Dead End in the Sewers";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc232l'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1-8"; // danger level

include ('function-start.php'); 

// // -------------------------DB CONNECT!
// include ('db-connect.php');  
// // -------------------------DB QUERY!
// $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
// $stmt->bind_param("s", $_SESSION['username']);
// $stmt->execute();
// $result = $stmt->get_result();
// if (!$result) {
//     die('There was an error running the query [' . $link->error . ']');
// }
// // -------------------------DB OUTPUT!
// while($row = $result->fetch_assoc()){

$row = getUserData($link, $_SESSION['username']); // --- gets all user data from database   

include ('battle-sets/sewers.php'); 


if ($input == 'search')
{
	echo $message="You search the room and find a hidden passageway to the southwest! That was easy.<br>";
	include ('update_feed.php'); // --- update feed
	$_SESSION['thievesdensearch'] = 1;
}


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


// else if($input=='ne' || $input=='northeast') 
// {			echo 'You travel northeast<br>';
//    	$message="<i>You travel northeast</i><br>".$_SESSION['desc232h'];
// 	include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232h'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
else if($input=='sw' || $input=='southwest') 
{			
	if ($_SESSION['thievesdensearch'] != 1) 
	{ 
	echo $message="<i>You don't see an exit to the southwest. Why don't you SEARCH the room and see what you find.</i><br>";
	include ('update_feed.php'); // --- update feed
	}
	else {
	echo 'You travel southwest through the hidden passageway<br>';
	$message="<i>You travel southwest through the hidden passageway</i><br>".$_SESSION['desc232m'];
	include ('update_feed.php'); // --- update feed
   	// $results = $link->query("UPDATE $user SET room = '232m'"); // -- room change
	$updates = ['endfight' => 0, 'room' => '232m' ]; // -- set changes
	updateStats($link, $username, $updates); // -- apply changes
	$_SESSION['thievesdensearch'] = 0;
	}
}

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'northeast') { $roomNum = '232h';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>
