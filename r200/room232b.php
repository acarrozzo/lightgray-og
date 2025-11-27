<?php
							  $roomname = "By a Large Curved Pipe in the Sewer";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc232b'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1-8"; // danger level

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

include ('battle-sets/sewers.php'); 






if ($input == 'search')
{
	$rand = rand (1,2);
	if ($_SESSION['catacombssearch'] == 1)
	{
		echo $message="You already found a secret passageway, you can go EAST through the pipe.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($rand !=2)
	{
		echo 'You search and find nothing, you should try searching again.<br>';
		$message="You search and find nothing, you should try searching again.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else {
		echo $message="You search the room and find a hidden passageway through the large pipe to the EAST!<br>";
		include ('update_feed.php'); // --- update feed
		$_SESSION['catacombssearch'] = 1; 
	}
	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	updateStats($link, $username, ['endfight' => 0]); // -- update stats
}







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


// else if($input=='nw' || $input=='northwest') 
// {			echo 'You travel northwest<br>';
//    	$message="<i>You travel northwest</i><br>".$_SESSION['desc232c'];
// 	include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232c'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 		$_SESSION['catacombssearch'] = 0;    
// }
// else if($input=='sw' || $input=='southwest') 
// {			echo 'You travel southwest<br>';
//    	$message="<i>You travel southwest</i><br>".$_SESSION['desc232a'];
// 	include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232a'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 		$_SESSION['catacombssearch'] = 0;    
// }
else if($input=='e' || $input=='east') 
{ 
	if ($_SESSION['catacombssearch'] != 1) 
	{ 
		echo $message="<i>You don't see an exit to the east. It's really dark but you should try searching.</i><br>";
		include ('update_feed.php'); // --- update feed
	}
	else {
		echo 'You travel east through a secret passageway through a pipe!<br>';
		$message="<i>You travel east through a secret passageway through a pipe!</i><br>".$_SESSION['desc232k'];
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET room = '232k'"); // -- room change
		$updates = ['endfight' => 0, 'room' => '232k' ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
		$_SESSION['catacombssearch'] = 0;
	}
}
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'southwest') { $roomNum = '232a';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northwest') { $roomNum = '232c';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
