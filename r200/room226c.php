<?php
						$roomname = "Warrior's Skill Shop";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc226c'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 
//include ('shop-skills/warrior_skills.php'); 

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
{	echo 'You travel north<br>';
   $message="<i>You travel north</i><br>".$_SESSION['desc226d'];
	include ('update_feed.php'); // --- update feed
   		  $results = $link->query("UPDATE $user SET room = '226d'"); // -- room change
}
else if($input=='ne' || $input=='northeast') 
{	echo 'You travel northeast<br>';
   $message="<i>You travel northeast</i><br>".$_SESSION['desc226b'];
	include ('update_feed.php'); // --- update feed
   		  $results = $link->query("UPDATE $user SET room = '226b'"); // -- room change
}
else if($input=='e' || $input=='east') 
{	echo 'You travel east<br>';
   $message="<i>You travel east</i><br>".$_SESSION['desc226a'];
	include ('update_feed.php'); // --- update feed
   		  $results = $link->query("UPDATE $user SET room = '226a'"); // -- room change
}







// ----------------------------------- end of room function
include('function-end.php');
// }
?>
