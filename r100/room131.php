<?php
						$roomname = "In the Forest by a Lake";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc131'];
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

$check=$row['bluefish'];


include ('battle-sets/forest.php');
include ('function-choptree.php');


if($input=='pick fish' || $input=='pick up fish' || $input=='get fish' || $input=='fish')  // ---- get fish
{
	if ( $check >= 10 )
	{
		echo $message="<div class='menuAction'>There are no more fish left in the lake, come back later.</div>";
		include ('update_feed.php'); // --- update feed
	}
	else { 
		echo $message="<div class='menuAction'>You fish in the lake and catch 10 bluefish!</div>";
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET bluefish = 10");
		$updates = [ // -- set changes
			'bluefish' => 10
		];
		updateStats($link, $username, $updates); // -- apply changes
	}
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
// else if($input=='nw' || $input=='northwest') 
// {	echo 'You travel northwest<br>';
//    $message="<i>You travel northwest</i><br>".$_SESSION['desc121'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 121"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='e' || $input=='east') 
// {	echo 'You travel east<br>';
//    $message="<i>You travel east</i><br>".$_SESSION['desc132'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 132"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '132';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'northwest') { $roomNum = '121';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
