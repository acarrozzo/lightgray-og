<?php
							  $roomname = "North Sewer EXIT";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc232c'];
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





// -------------------------------------------------------------------------- END BATTLE BLOCK


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
// {			echo 'You travel west<br>';
//    	$message="<i>You travel west</i><br>".$_SESSION['desc232d'];
// 	include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232d'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='sw' || $input=='southwest') 
// {			echo 'You travel southwest<br>';
//    	$message="<i>You travel southwest</i><br>".$_SESSION['desc232e'];
// 	include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232e'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='se' || $input=='southeast') 
// {			echo 'You travel southeast<br>';
//    	$message="<i>You travel southeast</i><br>".$_SESSION['desc232b'];
// 	include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232b'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
else if($input=='u' || $input=='up') 
{			
	echo 'You travel up and exit the sewers<br>';
	$message="<i>You travel up and exit the sewers</i><br>".$_SESSION['desc218'];
	include ('update_feed.php');   // --- update feed
	// $results = $link->query("UPDATE $user SET room = '218'"); // -- room change
	$updates = ['endfight' => 0, 'room' => '218' ]; // -- set changes
	updateStats($link, $username, $updates); // -- apply changes
		  
}


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'west') {     $roomNum = '232d';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southeast') { $roomNum = '232b';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southwest') { $roomNum = '232e';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
