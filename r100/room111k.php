<?php
							$roomname = "Ogre Lieutenant Quarters";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc111k'];
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

		$KLogrelieutenant=$_SESSION['KLogrelieutenant'];   


// -------------------------------------------------------------------------- START BATTLE BLOCK
	$infight = $row['infight'];
$endfight = $row['endfight'];
	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10);$randrare = rand (1,50);  }	else {$rand=0;$randrare=0;}
// -------------------------------------------------------------------------- INITIALIZE SUPER RARE - Ogre Priest - 1/50
if(($randrare == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Ogre Priest'");
	updateStats($link, $username,['enemy' => 'Ogre Priest' ]); // -- set enemy
	include ('battle.php'); 
}					
// -------------------------------------------------------------------------- INITIALIZE Ogre Lieutenant - 50%
else if($infight==0 && $endfight==0 && ($input=='attack' || $input=='attack ogre lieutenant' || $rand <= 5 )) 
	{	if ($input=='attack ogre lieutenant') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Ogre Lieutenant'");
		updateStats($link, $username,['enemy' => 'Ogre Lieutenant' ]); // -- set enemy
		include ('battle.php');	}			
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack ogre lieutenant') { $input = 'attack'; } 
		include ('battle.php');	}	
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
// -------------------------------------------------------------------------- END BATTLE BLOCK








// -------------------------------------------------------------------------- TRAVEL

// else if($input=='n' || $input=='north') 
// {	echo 'You travel north<br>';
//    	$message="<i>You travel north</i><br>".$_SESSION['desc111j'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = '111j'"); // -- room change
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	$_SESSION['ogresearch'] = 0;	
// }
else if($input=='se' || $input=='southeast') 
{	
	if ($KLogrelieutenant >= 1 && $infight == 0)
	{
		echo 'You travel through a magical portal to the OGRE LAIR EXIT.<br>';
	 	$message="<i>You travel through a magical portal to the OGRE LAIR EXIT</i><br>".$_SESSION['desc111a'];
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET room = '111a'"); // -- room change
		$updates = ['endfight' => 0, 'room' => '111a' ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
	}
	else if ($KLogrelieutenant == 0 && $infight == 0)
	{
		echo $message="<i>You cannot use the portal to the exit until you defeat the Ogre Lieutenant.</i><br>";
		include ('update_feed.php'); // --- update feed	
	}
	else
	{
		echo $message="<i>You cannot use the exit portal while in battle.</i><br>";
		include ('update_feed.php'); // --- update feed	
	}
}

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '111j';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');} 
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
