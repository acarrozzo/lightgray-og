<?php
							  $roomname = "A Fork in the Sewer";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc232d'];
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



$flying = $_SESSION['flying'];
$breathingwater = $_SESSION['breathingwater'];






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

else if($input=='n' || $input=='north') 
{			
	if ($_SESSION['flying'] >= 1)
		{
			echo 'You fly across the sewer river and travel north<br>';
			$message="<i>You fly across the sewer river and travel north</i><br>".$_SESSION['desc232y'];
			include ('update_feed.php');   // --- update feed
			// $results = $link->query("UPDATE $user SET room = '232y'"); // -- room change
			$updates = ['endfight' => 0, 'room' => '232y' ]; // -- set changes
			updateStats($link, $username, $updates); // -- apply changes
		}
	else{
 		echo $message="<i>You will not be able to cross this sewer river unless you are flying. Find or buy a wings potion or cast a wings spell.</i>";
		include ('update_feed.php');   // --- update feed
	}
}
// else if($input=='w' || $input=='west') 
// {			echo 'You travel west<br>';
//    	$message="<i>You travel west</i><br>".$_SESSION['desc232i'];
// 	include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232i'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='e' || $input=='east') 
// {			echo 'You travel east<br>';
//    	$message="<i>You travel east</i><br>".$_SESSION['desc232c'];
// 	include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232c'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='s' || $input=='south') 
// {			echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc232e'];
// 	include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232e'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }



// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '232c';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'south') {    $roomNum = '232e';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'west') {     $roomNum = '232i';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
