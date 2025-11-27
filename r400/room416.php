<?php
						$roomname = "On the Ocean by the Swamp Entrance";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc416'];
//$dangerLVL = $_SESSION['dangerLVL'] = "13"; // danger level

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

	$equipMount = $row['equipMount'];
	$chest4 = $row['chest4'];

	include ('battle-sets/blueocean.php'); // blue ocean battle set



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
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel west.<br>';
   		$message="<i>You travel west.</i><br>".$_SESSION['desc417'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '417'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '417' ]); // -- update stats

		}
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly west!<br>';
            $message="<i>You fly west! </i><br>".$_SESSION['desc417'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '417'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '417' ]); // -- update stats
        } 
		   else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='nw' || $input=='northwest') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel northwest.<br>';
   		$message="<i>You travel northwest.</i><br>".$_SESSION['desc418'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '418'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '418' ]); // -- update stats

		} 
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly northwest!<br>';
            $message="<i>You fly northwest! </i><br>".$_SESSION['desc418'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '418'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '418' ]); // -- update stats
        } 
		  else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='s' || $input=='south') 
{	
	if ($chest4>=1) // rocky flats gold chest check
	{
	echo 'You travel south into the swamp.<br>';
	$message="<i>You travel south into the swamp.</i><br>".$_SESSION['desc804'];
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET room = 804"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '804' ]); // -- update stats
}
	else
	{
	echo $message="<i>The Blue Guard prevents you from entering the Swamp. You need to unlock the Rocky Flats gold chest</i><br>";
	include ('update_feed.php'); // --- update feed	
	}
}








// ----------------------------------- end of room function
include('function-end.php');
// }
?>