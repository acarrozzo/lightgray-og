<?php
							  $roomname = "Kobold Twisted Path";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc115c'];
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
// -------------------------------------------------------------------------- INITIALIZE SUPER RARE - Kobold Monk - 1/50
if(($randrare == 1 ) && $infight==0 && $endfight==0) {	
   // $results = $link->query("UPDATE $user SET enemy = 'Kobold Monk'");
	updateStats($link, $username,['enemy' => 'Kobold Monk' ]); // -- set enemy 
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- INITIALIZE kobold - 3/10
else if(($rand <= 3 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Kobold'");
	updateStats($link, $username,['enemy' => 'Kobold' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE flying kobold - 1/10
else if(($rand == 4 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Flying Kobold'");
	updateStats($link, $username,['enemy' => 'Flying Kobold' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE kobold shaman - 1/10
else if(($rand == 5 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Kobold Shaman'");
	updateStats($link, $username,['enemy' => 'Kobold Shaman' ]); // -- set enemy
	include ('battle.php'); 
}							
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	




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


// else if($input=='se' || $input=='southeast') 
// {	echo 'You travel southeast<br>';
//    $message="<i>You travel southeast</i><br>".$_SESSION['desc115e'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = '115e'"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='w' || $input=='west') 
// {	echo 'You travel west<br>';
//    $message="<i>You travel west</i><br>".$_SESSION['desc115a'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = '115a'"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }else if($input=='nw' || $input=='northwest') 
// {	echo 'You travel northwest<br>';
//    $message="<i>You travel northwest</i><br>".$_SESSION['desc115d'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = '115d'"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'west') {     $roomNum = '115a';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'southeast') { $roomNum = '115e';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'northwest') { $roomNum = '115d';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');} 

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
