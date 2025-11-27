<?php
							  $roomname = "Silver Vault";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc232z'];
//$dangerLVL = $_SESSION['dangerLVL'] = "6-12"; // danger level

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

include ('battle-sets/catacombs.php'); 


$clicks = $row['clicks'];
$_SESSION['silverchest'] = '232z';
// -------------------------------------------------------------------------- silver chest - reset after 100 clicks
if ($_SESSION['silverchestclick'] <= 0) {$_SESSION['silverchestcheck'] = 0;} 
	else { $_SESSION['silverchestclick'] = $clicks; }


if($input=='open silver chest') 
{	
	if ($_SESSION['silverchestclick'] >= $_SESSION['silverchestcheck'])
	{
	//echo 'You open the treasure chest<br>';
   	//$message="<i>You open the treasure chest</i><br>";
	//include ('update_feed.php'); // --- update feed
   	$_SESSION['silverchestclick'] = $clicks;	
	$_SESSION['silverchestcheck'] = $_SESSION['silverchestclick'] + 100;
	// -------------------------------------------------------------------------- chest rewards
		
 								
	}
	else { 
	echo "For some reason you can't open the chest now, you should try again later.<br>";
   	$message="<i>For some reason you can't open the chest now, you should try again later.<br></i><br>";
	include ('update_feed.php'); // --- update feed
	}
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
// -------------------------------------------------------------------------- TRAVEL
// else if($input=='w' || $input=='west') 
// {			echo 'You travel west<br>';
//    	$message="<i>You travel west</i><br>".$_SESSION['desc232q'];
// 	include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232q'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	$_SESSION['silverchest'] = '0';
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'west') {     
	$roomNum = '232q';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['silverchest'] = '0';
}
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
