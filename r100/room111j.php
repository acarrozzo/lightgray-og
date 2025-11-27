<?php
							$roomname = "Ogress Fire Altar";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc111j'];
//$dangerLVL = $_SESSION['dangerLVL'] = "10"; // danger level

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
// -------------------------------------------------------------------------- INITIALIZE Fire Ogress - 40%
else if($infight==0 && $endfight==0 && ($input=='attack' || $input=='attack fire ogress' || $rand <= 4 )) 
	{	if ($input=='attack fire ogress') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Fire Ogress'");
		updateStats($link, $username,['enemy' => 'Fire Ogress' ]); // -- set enemy
		include ('battle.php');	}
// -------------------------------------------------------------------------- INITIALIZE Ogre Guard - 10%
else if( $infight==0 && $endfight==0 && ($input=='attack ogre guard' || $rand == 5 ) ) 
	{	if ($input=='attack ogre guard') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Ogre Guard'");
		updateStats($link, $username,['enemy' => 'Ogre Guard' ]); // -- set enemy
		include ('battle.php'); }				
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack fire ogress' || $input=='attack ogre guard') { $input = 'attack'; } 
		include ('battle.php');	}	





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
//    	$message="<i>You travel west</i><br>".$_SESSION['desc111i'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = '111i'"); // -- room change
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	$_SESSION['ogresearch'] = 0;	
// }
// else if($input=='s' || $input=='south') 
// {	echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc111k'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = '111k'"); // -- room change
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '111k';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'west') {     
	$roomNum = '111i';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['ogresearch'] = 0;	
} 
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
