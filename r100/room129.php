<?php
						$roomname = "Forest Dead End";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc129'];
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

$blueberry=$row['blueberry'];
$ironhatchet=$row['ironhatchet'];

include ('battle-sets/forest.php');
include ('function-choptree.php');



if($input=='pick blueberry' || $input=='pick berry')  // ---- PICK REDBERRY
{
	if ( $blueberry >= 10 )
	{
		echo $message="<div class='menuAction'>You already have more than 10 blueberries! Come back if you run low.</div>";
		include ('update_feed.php'); // --- update feed
	}
	else { 
		echo $message="<div class='menuAction'>You pick up 10 blueberries!</div>";
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET blueberry = 10");
		$updates = [ // -- set changes
			'blueberry' => 10
		];
		updateStats($link, $username, $updates); // -- apply changes
	}
	updateStats($link, $username, ['endfight' => 0]); // -- update stats
}




if ($input == 'search') // ----------- SEARCH IRON HATCHET
{
	$rand = rand (1,2); 			//		50%
	if ($ironhatchet >= 1) {
		echo $message="You found an Iron Hatchet here in the past, come back if you need another one.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($rand == 1) {
			echo $message="You search the Forest and find a Iron Hatchet!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET ironhatchet = ironhatchet + 1");
			$updates = [ // -- set changes
				'ironhatchet' => 1
			];
			updateStats($link, $username, $updates); // -- apply changes
	}
	else {
		echo $message="You search the Forest and think you see something shiny in the bushes, you should search again.<br>";
		include ('update_feed.php'); // --- update feed
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
// else if($input=='n' || $input=='north') 
// {	echo 'You travel north<br>';
//    $message="<i>You travel north</i><br>".$_SESSION['desc126'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 126"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '126';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
