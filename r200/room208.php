<?php
						$roomname = "Rob's Farm";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc208'];
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




	
if($input=='grab veggies' )  // ---- GRAB veggies
{
    $check=$row['veggies'];
	if ( $check >= 5 )
	{
	echo $message="<div class='menuAction'>You already have some veggies! Come back if you run out.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'>You pick up some veggies (5)!</div>";
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET veggies = 5");
	updateStats($link, $username,['veggies' => 5 ]); // -- update stat 

	}
}

// -------------------------------------------------------------------------- SEARCH - secret path to rocky flats

if ($input == 'search')
{
	$rand = rand (1,2);
	if ($rand !=2)
	{
		echo 'You search and find nothing, you should try searching again.<br>';
		$message="You search and find nothing, you should try searching again.<br>";
		include ('update_feed.php'); // --- update feed	
	}
	else {
		echo 'You search the farm and find a hidden path through the veggies to the southwest!<br>';
		$message="You search the farm and find a hidden path through the veggies to the southwest!<br>";
		include ('update_feed.php'); // --- update feed
		$_SESSION['robfarmsearch'] = 1; 
	}
	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	updateStats($link, $username, ['endfight' => 0]); // -- update stats
}






// -------------------------------------------------------------------------- TRAVEL
// if($input=='n' || $input=='north') 
// {	echo 'You travel north<br>';
//    	$message="<i>You travel north</i><br>".$_SESSION['desc207'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = 207"); // -- room change
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

else if($input=='sw' || $input=='southwest') 
{ 
	if ($_SESSION['robfarmsearch'] != 1) 
	{ 
	echo "You don't see an exit to the southwest. But there sure are a lot of veggies that way.<br>";
	$message="<i>You don't see an exit to the southwest. But there sure are a lot of veggies that way.</i><br>";
	include ('update_feed.php'); // --- update feed
   	
	}
	else {
	echo 'You travel southwest through a secret path through the veggies!<br>';
	$message="<i>You travel southwest through a secret path through the veggies!</i><br>".$_SESSION['desc301'];
	include ('update_feed.php'); // --- update feed
   	// $results = $link->query("UPDATE $user SET room = 301"); // -- room change
  	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$updates = ['endfight' => 0, 'room' => '301' ]; // -- set changes
	updateStats($link, $username, $updates); // -- apply changes
	$_SESSION['robfarmsearch'] = 0;
	}
}
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '207';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
