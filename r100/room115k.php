<?php
							  $roomname = "Kobold Master Chambers";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc115k'];
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

$KLkoboldmaster=$_SESSION['KLkoboldmaster'];   
 	
$infight = $row['infight'];
$endfight = $row['endfight'];
	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10);$randrare = rand (1,50);  }	else {$rand=0;$randrare=0;}
// -------------------------------------------------------------------------- INITIALIZE SUPER RARE - Kobold Monk - 1/50
if(($randrare == 1 ) && $infight==0 && $endfight==0) {	
   // $results = $link->query("UPDATE $user SET enemy = 'Kobold Monk'");
	updateStats($link, $username,['enemy' => 'Kobold Monk' ]); // -- set enemy 
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE kobold master - 5/10
else if(($rand <= 5 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Kobold Master'");
	updateStats($link, $username,['enemy' => 'Kobold Master' ]); // -- set enemy
	include ('battle.php'); 
}										
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	




// -------------------------------------------------------------------------- Battle TRAVEL
if ((	$input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='north' || $input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' || $input=='down' )  && $infight >= 1) {
	echo 'You cannot leave the room in the middle of battle!<br>';
   	$message="<i>You cannot leave the room in the middle of battle!</i><br>";
	include ('update_feed.php'); // --- update feed
	}


// -------------------------------------------------------------------------- TRAVEL


// else if($input=='s' || $input=='south') 
// {	echo 'You travel south<br>';
//    $message="<i>You travel south</i><br>".$_SESSION['desc115j'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = '115j'"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
else if($input=='ne' || $input=='northeast') 
{	
	if ($KLkoboldmaster >= 1 && $infight == 0)
	{
		echo 'You travel through a magical portal to the KOBOLD LAIR EXIT.<br>';
	 	$message="<i>You travel through a magical portal to the KOBOLD LAIR EXIT</i><br>".$_SESSION['desc115a'];
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET room = '115a'"); // -- room change
		$updates = ['endfight' => 0, 'room' => '115a' ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
	}
	else if ($KLkoboldmaster == 0 && $infight == 0)
	{
		echo $message="<i>You cannot use the portal to the exit until you defeat the Kobold Master.</i><br>";
		include ('update_feed.php'); // --- update feed	
	}
	else
	{
		echo $message="<i>You cannot use the exit portal while in battle.</i><br>";
		include ('update_feed.php'); // --- update feed	
	}
}



// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '115j';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');} 


// ----------------------------------- end of room function
include('function-end.php');
// }
?>
