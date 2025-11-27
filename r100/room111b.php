<?php
							$roomname = "Goblin Tent";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc111b'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5"; // danger level

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
$enemy=$row['enemy'];
	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10);$randrare = rand (1,50);  }	else {$rand=0;$randrare=0;}
// -------------------------------------------------------------------------- INITIALIZE SUPER RARE - Ogre Priest - 1/50
if(($randrare == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Ogre Priest'");
	updateStats($link, $username,['enemy' => 'Ogre Priest' ]); // -- set enemy
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- INITIALIZE Goblin - 30%
else if( $infight==0 && $endfight==0 && ($input=='attack' || $input=='attack goblin' || $rand > 7 ) ) 
	{	if ($input=='attack goblin') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Goblin'");
		updateStats($link, $username,['enemy' => 'Goblin' ]); // -- set enemy
		include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE Hob Goblin - 10%
else if($infight==0 && $endfight==0 && ($input=='attack hob goblin' || $rand == 3 )) 
	{	if ($input=='attack hob goblin') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Hob Goblin'");
		updateStats($link, $username,['enemy' => 'Hob Goblin' ]); // -- set enemy
		include ('battle.php');	}
// -------------------------------------------------------------------------- INITIALIZE Alpha Scorpion - 10%
else if($infight==0 && $endfight==0 && ( $rand == 2 )) 
	{	if ($input=='attack alpha scorpion') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Alpha Scorpion'");
		updateStats($link, $username,['enemy' => 'Alpha Scorpion' ]); // -- set enemy
		include ('battle.php'); }					
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack goblin' || $input=='attack hob goblin') { $input = 'attack'; } 
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
// else if($input=='se' || $input=='southeast') 
// {	echo 'You travel south<br>';
//    $message="<i>You travel south</i><br>".$_SESSION['desc111d'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = '111d'"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='e' || $input=='east') 
// {	echo 'You travel east<br>';
//    $message="<i>You travel east</i><br>".$_SESSION['desc111a'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = '111a'"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '111a';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'southeast') { $roomNum = '111d';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');} 
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
