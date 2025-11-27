<?php
				$roomname = "Scorpion Hall";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc012f'];
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
	
$scorpionswitch = $_SESSION['scorpionswitch'];	
// -------------------------------------------------------------------------- BATTLE VARIABLES		
 	
$infight = $row['infight'];
$endfight = $row['endfight'];
	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE mammoth scorpion - 4/10
if(($rand <= 4 ) && $infight==0 && $endfight==0) {	
    $results = $link->query("UPDATE $user SET enemy = 'Mammoth Scorpion'");
		updateStats($link, $username, ['enemy' => 'Mammoth Scorpion']); // -- update stats
		include ('battle.php'); 
	}	
// -------------------------------------------------------------------------- INITIALIZE scorpion guard - 1/10
else if(($rand == 5 ) && $infight==0 && $endfight==0) {	
    $results = $link->query("UPDATE $user SET enemy = 'Scorpion Guard'"); 
		updateStats($link, $username, ['enemy' => 'Scorpion Guard']); // -- update stats
		include ('battle.php'); 
	}					
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	








// -------------------------------------------------------------------------- Battle TRAVEL
else if ((	$input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='east' || $input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' || $input=='down' )  && $infight >= 1) {
	echo 'You cannot leave the room in the middle of battle!<br>';
   	$message="<i>You cannot leave the room in the middle of battle!</i><br>";
	include ('update_feed.php'); // --- update feed
	}
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '012e';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');} 

// else if($input=='s' || $input=='south') 
// {  	echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc012e'];
// 	include ('update_feed.php'); // --- update feed
//    				$results = $link->query("UPDATE $user SET room = '012e'"); // -- room change
//    				//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
else if($input=='ne' || $input=='northeast') 
{ 
	if ($_SESSION['scorpionswitch'] != 1) 
	{ 
	echo "You don't see an exit to the northeast, just a giant stone slab.<br>";
	$message="<i>You don't see an exit to the northeast, just a giant stone slab.</i><br>";
	include ('update_feed.php'); // --- update feed
	}
	else {
	echo 'You travel northeast through the now open hidden passageway<br>';
	$message="<i>You travel northeast through the now open hidden passageway</i><br>".$_SESSION['desc012g'];
	include ('update_feed.php'); // --- update feed
   	// $results = $link->query("UPDATE $user SET room = '012g'"); // -- room change
	updateStats($link, $username, ['room' => '012g']); // -- update stats
  	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	updateStats($link, $username, ['endfight' => 0]); // -- update stats
	$_SESSION['scorpionswitch'] = 0;
	}
}
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
