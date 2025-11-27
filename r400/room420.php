<?php
						$roomname = "Near an Oasis";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc420'];
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
else if($input=='sw' || $input=='southwest') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel southwest.<br>';
   		$message="<i>You travel southwest.</i><br>".$_SESSION['desc422'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '422'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '422' ]); // -- update stats

		} 
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly southwest!<br>';
            $message="<i>You fly southwest! </i><br>".$_SESSION['desc422'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '422'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '422' ]); // -- update stats
        } 
		 else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='e' || $input=='east') 
{	
		echo 'You travel east.<br>';
   		$message="<i>You travel east.</i><br>".$_SESSION['desc413'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '413'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '413' ]); // -- update stats

}
else if($input=='d' || $input=='down') 
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim underwater!<br>';
   		$message="<i>You swim underwater!</i><br>".$_SESSION['desc482'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '482'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '482' ]); // -- update stats

		} else{
 		echo $message="<i>You can't go below the ocean! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}





// ----------------------------------- end of room function
include('function-end.php');
// }
?>