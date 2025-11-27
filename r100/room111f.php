<?php
							$roomname = "Orc Den";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc111f'];
//$dangerLVL = $_SESSION['dangerLVL'] = "7"; // danger level

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
    $results = $link->query("UPDATE $user SET enemy = 'Ogre Priest'");
	// updateStats($link, $username,['enemy' => 'Ogre Priest' ]); // -- set enemy
	include ('battle.php'); 
}					
// -------------------------------------------------------------------------- INITIALIZE Orc - 50%
else if($infight==0 && $endfight==0 && ($input=='attack' || $input=='attack orc' || $rand <= 5 )) 
	{	if ($input=='attack orc') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Orc'");
		updateStats($link, $username,['enemy' => 'Orc' ]); // -- set enemy
		include ('battle.php');	}
// -------------------------------------------------------------------------- INITIALIZE Ogre - 10%
/*else if( $infight==0 && $endfight==0 && ($input=='attack ogre' || $rand == 4 ) ) 
	{	if ($input=='attack ogre') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Ogre'");
		include ('battle.php'); }	
		*/			
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack ogre' || $input=='attack orc') { $input = 'attack'; } 
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
// -------------------------------------------------------------------------- END BATTLE BLOCK







// -------------------------------------------------------------------------- TRAVEL
// else if($input=='nw' || $input=='northwest') 
// {	echo 'You travel northwest<br>';
//    	$message="<i>You travel northwest</i><br>".$_SESSION['desc111e'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = '111e'"); // -- room change
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='n' || $input=='north') 
// {	echo 'You travel north<br>';
//    	$message="<i>You travel north</i><br>".$_SESSION['desc111g'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = '111g'"); // -- room change
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 		$_SESSION['ogresearch'] = 0;

// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '111g';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'northwest') { $roomNum = '111e';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');} 

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
