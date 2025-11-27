<?php
						$roomname = "Red Town Grand Path";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc209'];
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

$teleport3 = $row['teleport3'];

include ('battle-sets/thief.php'); 



// --------------------------------------------------------------------------- PICK UP MAP
if ($input=="pick up map"){
	echo 'You pick up the red town map:<br>';
	$message ='<br><i>You pick up the red town map. Check your INV to view the map at anytime</i><br>
	<a target="_blank" rel="map" href="img/lightgray_map_redtown_main.jpg" class="fancybox">
	<img class="mapimage" width="350" height="350" alt="View Map"  src="img/lightgray_map_redtown_main.jpg"><br>
	click to open map in new window and view full size</a><br>';
  	include ('update_feed_alt.php'); // --- update feed ALT
	// $results = $link->query("UPDATE $user SET redtownmap = 1");
	updateStats($link, $username,['redtownmap' => 1 ]); // -- update stat 

	
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
// else if($input=='w' || $input=='west') 
// {	echo 'You travel west<br>';
//    $message="<i>You travel west</i><br>".$_SESSION['desc204'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 204"); // -- room change
// }
// else if($input=='e' || $input=='east') 
// {	echo 'You travel east<br>';
//    $message="<i>You travel east</i><br>".$_SESSION['desc210'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 210"); // -- room change
   
//    			// -------------------------------------------------------------------------- Activate Red Town Teleport
// 		if ($teleport3 == 0) { 	
// 			$results = $link->query("UPDATE $user SET teleport3 = 1");
// 			echo $message="<i>You can now teleport to the Red Town square! Click 'red town' to teleport to this location at any time. </i><br>";
// 			include ('update_feed.php'); // --- update feed	  
// 			}	   
// }



// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     
			$roomNum = '210';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');
   			// -------------------------------------------------------------------------- Activate Red Town Teleport
			   if ($teleport3 == 0) { 	
				// $results = $link->query("UPDATE $user SET teleport3 = 1");
				updateStats($link, $username,['teleport3' => 1 ]); // -- update stat 
				echo $message="<i>You can now teleport to the Red Town square! Click 'red town' to teleport to this location at any time. </i><br>";
				include ('update_feed.php'); // --- update feed	  
				}	   
			}
elseif ($input == 'west') {     $roomNum = '204';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
