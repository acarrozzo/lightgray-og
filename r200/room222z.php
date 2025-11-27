<?php
						$roomname = "Red Town Royal Courtyard";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc222z'];
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

// include ('battle-sets/thief.php');






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
else if($input=='s' || $input=='south') 
{	echo 'You travel south<br>';
   $message="<i>You travel south</i><br>".$_SESSION['desc221'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 221"); // -- room change
}

else if($input=='n' || $input=='north') 
{	echo 'You travel north<br>';
   $message="<i>You travel north</i><br>".$_SESSION['desc223'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 223"); // -- room change
}
else if($input=='w' || $input=='west') 
{	echo 'You travel west<br>';
   $message="<i>You travel west</i><br>".$_SESSION['desc224'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 224"); // -- room change
}
else if($input=='u' || $input=='up') 
{	echo 'You travel up<br>';
   $message="<i>You travel up</i><br>".$_SESSION['desc222'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '222'"); // -- room change
}
elseif ($input=='d' || $input=='down') {
	echo 'You travel down<br>';
	$message="<i>You travel down</i><br>".$_SESSION['desc222'];
	include('update_feed.php'); // --- update feed
$results = $link->query("UPDATE $user SET room = 222"); // -- room change
//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}




// ----------------------------------- end of room function
include('function-end.php');
// }
?>
