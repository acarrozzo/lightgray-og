<?php
						$roomname = "Mud Cave Exit";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc490'];

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



// -------------------------------------------------------------------------------------------------------------- BATTLE VARIABLES		
 	
$infight = $row['infight'];
$endfight = $row['endfight'];
	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE mud crab - 3/10
if(($rand <= 3 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Mud Crab'");
	updateStats($link, $username,['enemy' => 'Mud Crab' ]); // -- set enemy 

	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	


// -------------------------------------------------------------------------- END BATTLE BLOCK





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
{		echo 'You travel northeast.<br>';
   		$message="<i>You travel northeast.</i><br>".$_SESSION['desc492'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '492'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '492' ]); // -- update stats

}
else if($input=='e' || $input=='east') 
{	 	echo 'You travel east.<br>';
   		$message="<i>You travel east.</i><br>".$_SESSION['desc491'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '491'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '491' ]); // -- update stats

}
else if($input=='u' || $input=='up') 
{	 	echo 'You travel up.<br>';
   		$message="<i>You travel up.</i><br>".$_SESSION['desc412'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '412'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '412' ]); // -- update stats

}






// ----------------------------------- end of room function
include('function-end.php');
// }
?>