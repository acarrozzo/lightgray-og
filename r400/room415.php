<?php
						$roomname = "Ocean Calm";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc415'];
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
   		$message="<i>You travel west.</i><br>".$_SESSION['desc418'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '418'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '418' ]); // -- update stats

		}
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly west!<br>';
            $message="<i>You fly west! </i><br>".$_SESSION['desc418'];
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
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel south.<br>';
   		$message="<i>You travel south.</i><br>".$_SESSION['desc416'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '416'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '416' ]); // -- update stats

		}
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly south!<br>';
            $message="<i>You fly south! </i><br>".$_SESSION['desc416'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '416'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '416' ]); // -- update stats
        } 
		   else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='ne' || $input=='northeast') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel northeast.<br>';
   		$message="<i>You travel northeast.</i><br>".$_SESSION['desc406'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '406'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '406' ]); // -- update stats

		}
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly northeast!<br>';
            $message="<i>You fly northeast! </i><br>".$_SESSION['desc406'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '406'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '406' ]); // -- update stats
        } 
		   else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='e' || $input=='east') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel east.<br>';
   		$message="<i>You travel east.</i><br>".$_SESSION['desc411'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '411'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '411' ]); // -- update stats

		}
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly east!<br>';
            $message="<i>You fly east! </i><br>".$_SESSION['desc411'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '411'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '411' ]); // -- update stats
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