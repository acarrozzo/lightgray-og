<?php
						$roomname = "In the Ocean near Mud Island";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc411'];
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
else if($input=='w' || $input=='west') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel west.<br>';
   		$message="<i>You travel west.</i><br>".$_SESSION['desc415'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '415'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '415' ]); // -- update stats

		} 
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly west!<br>';
            $message="<i>You fly west! </i><br>".$_SESSION['desc415'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '415'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '415' ]); // -- update stats
        } 
		  else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='n' || $input=='north') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel north.<br>';
   		$message="<i>You travel north.</i><br>".$_SESSION['desc406'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '406'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '406' ]); // -- update stats

		} 
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly north!<br>';
            $message="<i>You fly north! </i><br>".$_SESSION['desc406'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '406'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '406' ]); // -- update stats
        } 
		  else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}

else if($input=='se' || $input=='southeast') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel southeast.<br>';
   		$message="<i>You travel southeast.</i><br>".$_SESSION['desc412'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '412'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '412' ]); // -- update stats

		} 
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly southeast!<br>';
            $message="<i>You fly southeast! </i><br>".$_SESSION['desc412'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '412'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '412' ]); // -- update stats
        } 
		  else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}

else if($input=='sw' || $input=='southwest') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel southwest.<br>';
   		$message="<i>You travel southwest.</i><br>".$_SESSION['desc416'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '416'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '416' ]); // -- update stats

		} 
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly southwest!<br>';
            $message="<i>You fly southwest! </i><br>".$_SESSION['desc416'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '416'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '416' ]); // -- update stats
        } 
		  else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}






// ----------------------------------- end of room function
include('function-end.php');
// }
?>