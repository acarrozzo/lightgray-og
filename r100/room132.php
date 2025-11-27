<?php
						$roomname = "In the Forest on a Rocky Path";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc132'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5-13"; // danger level

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


include ('battle-sets/forest.php');
include ('function-choptree.php');



if ($input == 'search')
{
	$rand = rand (1,2);
	if ($rand !=2)
	{
		echo $message="You search and find nothing, you should try searching again.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else {
		echo $message="You search the room and find a hidden passageway to the south!<br>";
		include ('update_feed.php'); // --- update feed
		$_SESSION['forestsearch'] = 1; 
	}
	updateStats($link, $username, ['endfight' => 0]); // -- update stats
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
// else if($input=='w' || $input=='west') 
// {	echo 'You travel west<br>';
//    $message="<i>You travel west</i><br>".$_SESSION['desc131'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 131"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='n' || $input=='north') 
// {	echo 'You travel north<br>';
//    $message="<i>You travel north</i><br>".$_SESSION['desc133'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 133"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }

else if($input=='s' || $input=='south') 
{ 
	if ($_SESSION['forestsearch'] != 1) 
	{ 
	echo "You don't see an exit to the south. You should try searching.<br>";
	$message="<i>You don't see an exit to the south. You should try searching.</i><br>";
	include ('update_feed.php'); // --- update feed
	}
	else {
	echo 'You travel south through the trees<br>';
	$message="<i>You travel south through the trees</i><br>".$_SESSION['desc127'];
	include ('update_feed.php'); // --- update feed
   	// $results = $link->query("UPDATE $user SET room = '127'"); // -- room change
	$updates = ['endfight' => 0, 'room' => '127' ]; // -- set changes
	updateStats($link, $username, $updates); // -- apply changes
	$_SESSION['forestsearch'] = 0;
	}
}



// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '133';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'west') {     $roomNum = '131';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
