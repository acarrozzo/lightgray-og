<?php
						$roomname = "The Neverending Mine - Base Camp";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc311'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

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

$quest31=$row['quest31'];  


if($input=='grab blue potion')  // ---- GRAB 
{
	if ( $row['bluepotion'] >= 5 )
	{
	echo $message="<div class='menuAction'>You already have more than 5 blue potions! Come back if you run low.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'>You grab a bunch of blue potions! [ +5 blue potions ]</div>";
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET bluepotion = 5");
	updateStats($link, $username,['bluepotion' => 5 ]); // -- update stat 
	}
}
if($input=='grab red potion')  // ---- GRAB 
{
	if ( $row['redpotion'] >= 5 )
	{
	echo $message="<div class='menuAction'>You already have more than 5 red potions! Come back if you run low.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'>You grab a bunch of red potions! [ +5 red potions ]</div>";
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET redpotion = 5");
	updateStats($link, $username,['redpotion' => 5 ]); // -- update stat 
	}
}
if($input=='grab pickaxe')  // ---- GRAB 
{
	if ( $row['pickaxe'] >= 1 )
	{
	echo $message="<div class='menuAction'>You already have a pickaxe! Come back if you lose it.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'>You grab a pickaxe! [ +1 pickaxe ]</div>";
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET pickaxe = 1");
	updateStats($link, $username,['pickaxe' => 1 ]); // -- update stat 

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

// else if($input=='s' || $input=='south') 
// {			echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc308'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 308"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='sw' || $input=='southwest') 
// {			echo 'You travel southwest<br>';
//    	$message="<i>You travel southwest</i><br>".$_SESSION['desc307'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 307"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
else if($input=='d' || $input=='down') 
{			
	if ($quest31 >=2 ) {
		echo 'You travel down<br>';
		$message="<i>You travel down</i><br>".$_SESSION['desc311-01'];
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET room = 'm01'"); // -- room change
		//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		// updateStats($link, $username, ['endfight' => 0]); // -- update stats
		$updates = ['endfight' => 0, 'room' => '311-01' ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
	}
	else {
		echo $message = "ACCESS DENIED. Join the Mining Guild to the south to gain access to the mine.<br>";
		include ('update_feed.php'); // --- update feed
	}
}




// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '308';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southwest') { $roomNum = '307';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>