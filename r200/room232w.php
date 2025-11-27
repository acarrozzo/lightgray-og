<?php
							  $roomname = "The Catacombs Sacrificial Chamber";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc232w'];
//$dangerLVL = $_SESSION['dangerLVL'] = "17"; // danger level

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
// -------------------------------------------------------------------------- After Battle - SAFE ROOM
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br>"; }
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10); }	else {$rand=0;}
// -------------------------------------------------------------------------- INITIALIZE Omar the Dead - 4/10
if(($rand <= 4 ) && $infight==0 && $endfight==0) {
	// $results = $link->query("UPDATE $user SET enemy = 'Omar the Dead'");
		updateStats($link, $username,['enemy' => 'Omar the Dead' ]); // -- set enemy 

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
// else if($input=='n' || $input=='north')
// {			echo 'You travel north<br>';
//    	$message="<i>You travel north</i><br>".$_SESSION['desc232v'];
// 	include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232v'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='e' || $input=='east')
// {			echo 'You travel east<br>';
//    	 $message="<i>You travel east</i><br>".$_SESSION['desc232t'];
// 	 include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232t'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
else if($input=='u' || $input=='up')
{			
	echo "You travel up Broccoli Rob's secret celler and arrive in his Cabin.<br>";
	$message="<i>You travel up Broccoli Rob's secret celler and arrive in his Cabin.</i><br>".$_SESSION['desc207'];
	include ('update_feed.php');   // --- update feed
	//    $results = $link->query("UPDATE $user SET room = '207'"); // -- room change
	$updates = ['endfight' => 0, 'room' => '207' ]; // -- set changes
	updateStats($link, $username, $updates); // -- apply changes
}


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '232v';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'east') {     $roomNum = '232t';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
