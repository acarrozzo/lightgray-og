<?php
							  $roomname = "A Sewer Oasis";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc232x'];
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





// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
		// $query = $link->query("UPDATE $user SET hp = $hpmax"); 
		// $query = $link->query("UPDATE $user SET mp = $mpmax"); 
		$updates = [ // -- set changes
			'hp' => $hpmax,
			'mp' => $mpmax
		]; 
		updateStats($link, $_SESSION['username'], $updates); // -- update 
		echo $message = "You rest at the Sewer Oasis and replenish your HP and MP!<br>";
		include ('update_feed.php'); // --- update feed
		//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
	}

// --------------------------------------------------------------------------- SEARCH Black Robe
if ($input == 'search') 
{
	//$rand = rand (1,2); 			//		50%
	if ($blackrobe < 1) {
		echo $message="<i>You search the Sewer Oasis and find a neat stack of folded Black Robes. Luckily, you already have one.</i><br>";
		include ('update_feed.php'); // --- update feed
	}
	else {
		echo $message="You search the Sewer Oasis and find a neat stack of folded Black Robes! You pick one up!<br> [ + 1 Black Robe ]<br>";
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET blackrobe = blackrobe + 1");
		updateStats($link, $username,['blackrobe' => $blackrobe + 1 ]); // -- update stat 

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

// else if($input=='n' || $input=='north') 
// {			echo 'You travel north<br>';
//    	$message="<i>You travel north</i><br>".$_SESSION['desc232i'];
// 	include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232i'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='w' || $input=='west') 
// {			echo 'You travel west<br>';
//    	$message="<i>You travel west</i><br>".$_SESSION['desc232h'];
// 	include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232h'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='s' || $input=='south') 
// {			echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc232g'];
// 	include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232g'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='e' || $input=='east') 
// {			echo 'You travel east<br>';
//    	$message="<i>You travel east</i><br>".$_SESSION['desc232e'];
// 	include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232e'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '232i';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'east') {     $roomNum = '232e';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'south') {    $roomNum = '232g';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'west') {     $roomNum = '232h';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
