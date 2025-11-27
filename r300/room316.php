<?php
						$roomname = "On a Muddy Path approaching a Swamp";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc316'];
//$dangerLVL = $_SESSION['dangerLVL'] = "3-7"; // danger level

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


$chest4 = $row['chest4'];


include ('battle-sets/rockyflatspath.php'); // Rocky Flats path enemies




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

else if($input=='w' || $input=='west') 
{	
	if ($chest4>=1) // rocky flats gold chest check
	{
	echo 'You travel west into the swamp.<br>';
 	$message="<i>You travel west into the swamp.</i><br>".$_SESSION['desc801'];
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET room = 801"); // -- room change
	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    $updates = ['endfight' => 0, 'room' => '801' ]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes
	}
	else
	{
	echo $message="<i>The Blue Guard prevents you from entering the Swamp. You need to unlock the Rocky Flats gold chest</i><br>";
	include ('update_feed.php'); // --- update feed	
	}
}
// else if($input=='se' || $input=='southeast') 
// {			echo 'You travel southeast<br>';
//    	$message="<i>You travel southeast</i><br>".$_SESSION['desc314'];
// 	include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 314"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }





// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'southeast') { $roomNum = '314';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>