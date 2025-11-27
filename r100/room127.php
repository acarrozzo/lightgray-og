<?php
						$roomname = "In the Forest Surrounded by Trees";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc127'];
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
		echo $message="You search the room and find a hidden passageway to the north!<br>";
		include ('update_feed.php'); // --- update feed
		$_SESSION['forestsearch'] = 1; 
	}
	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
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
//    $message="<i>You travel west</i><br>".$_SESSION['desc128'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 128"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
//    $_SESSION['forestsearch'] = 0;
// }
// else if($input=='sw' || $input=='southwest') 
// {	echo 'You travel southwest<br>';
//    $message="<i>You travel southwest</i><br>".$_SESSION['desc125'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 125"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
//    $_SESSION['forestsearch'] = 0;

// }
// else if($input=='s' || $input=='south') 
// {	echo 'You travel south<br>';
//    $message="<i>You travel south</i><br>".$_SESSION['desc126'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 126"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
//    $_SESSION['forestsearch'] = 0;

// }
else if($input=='n' || $input=='north') 
{ 
	if ($_SESSION['forestsearch'] != 1) 
	{ 
	echo "You don't see an exit to the north. You should try searching.<br>";
	$message="<i>You don't see an exit to the north. You should try searching.</i><br>";
	include ('update_feed.php'); // --- update feed
   	
	}
	else {
	echo 'You travel north through the trees<br>';
	$message="<i>You travel north through the trees</i><br>".$_SESSION['desc132'];
	include ('update_feed.php'); // --- update feed
   	// $results = $link->query("UPDATE $user SET room = '132'"); // -- room change
	$updates = ['endfight' => 0, 'room' => '132' ]; // -- set changes
	updateStats($link, $username, $updates); // -- apply changes
	$_SESSION['forestsearch'] = 0;
	}
}


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '126';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'west') {     $roomNum = '128';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'southwest') { $roomNum = '125';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
