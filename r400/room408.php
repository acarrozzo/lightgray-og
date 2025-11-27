<?php
						$roomname = "Traveling along a Jetty";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc408'];
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
else if($input=='ne' || $input=='northeast') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel northeast.<br>';
   		$message="<i>You travel northeast.</i><br>".$_SESSION['desc409'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '409'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '409' ]); // -- update stats

		}  
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly northeast!<br>';
            $message="<i>You fly northeast! </i><br>".$_SESSION['desc409'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '409'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '409' ]); // -- update stats
        } 
		  else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}

else if($input=='se' || $input=='southeast') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel southeast.<br>';
   		$message="<i>You travel southeast.</i><br>".$_SESSION['desc407'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '407'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '407' ]); // -- update stats

		} 
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly southeast!<br>';
            $message="<i>You fly southeast! </i><br>".$_SESSION['desc407'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '407'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '407' ]); // -- update stats
        } 
		   else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
	
else if($input=='s' || $input=='south') 
{		echo 'You travel south.<br>';
   		$message="<i>You travel south.</i><br>".$_SESSION['desc413'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '413'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '413' ]); // -- update stats

				  if ($teleport6 == 0) { 	
					// $results = $link->query("UPDATE $user SET teleport6 = 1");
					updateStats($link, $username,['teleport6' => 1 ]); // -- update stat 
					echo $message="<i>You can now teleport to the Blue Ocean Oasis! Click 'blue ocean' in the teleport menu to teleport to this location at any time. </i><br>";
					include ('update_feed.php'); // --- update feed	  
					}	
}






// ----------------------------------- end of room function
include('function-end.php');
// }
?>