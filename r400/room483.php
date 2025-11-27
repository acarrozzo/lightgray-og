<?php
						$roomname = "Surrounded by Coral";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc483'];

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

include ('battle-sets/blueocean-underwater.php'); // blue ocean battle set
include ('random-encounters/blueocean-underwater.php'); // blue ocean battle set


if ($input == 'flip lever')
{
	if ($_SESSION['underwaterswitch'] == 1)
	{
		echo $message = 'You already flipped this switch. A secret door has opened somewhere to the south.<br>';
		include ('update_feed.php'); // --- update feed
	}
	else {
		echo $message= 'You flip the coral lever and hear a rumbling come from the south.<br>';
		include ('update_feed.php'); // --- update feed
		$_SESSION['underwaterswitch'] = 1;
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
else if($input=='n' || $input=='north') 
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim north<br>';
   		$message="<i>You swim north</i><br>".$_SESSION['desc484'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '484'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '484' ]); // -- update stats

		} else{
 		echo $message="<i>You can't swim that way! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>