<?php
						$roomname = "A Muddy Tunnel";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc491'];

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
// -------------------------------------------------------------------------- INITIALIZE mud crab - 4/10
if(($rand <= 4 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Mud Crab'");
	updateStats($link, $username,['enemy' => 'Mud Crab' ]); // -- set enemy
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	







// -------------------------------------------------------------------------- SEARCH 100% mud
if ($input == 'search')
{
		echo $message="You search and find some mud… big surprise. [ +1 mud ]<br>";
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET mud = mud + 1");
		updateStats($link, $username,['mud' => $mud + 1 ]); // -- update stat 

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
// -------------------------------------------------------------------------- END BATTLE BLOCK






// -------------------------------------------------------------------------- TRAVEL

else if($input=='n' || $input=='north') 
{		echo 'You travel north.<br>';
   		$message="<i>You travel north.</i><br>".$_SESSION['desc492'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '492'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '492' ]); // -- update stats

}
else if($input=='w' || $input=='west') 
{	 	echo 'You travel west.<br>';
   		$message="<i>You travel west.</i><br>".$_SESSION['desc490'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '490'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '490' ]); // -- update stats

}






// ----------------------------------- end of room function
include('function-end.php');
// }
?>