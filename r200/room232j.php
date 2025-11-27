<?php
							  $roomname = "In the Sewer by the Catacombs";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc232j'];
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
	echo $message="You search the room and find a way to open the stone door to the Northeast!<br>";
	include ('update_feed.php'); // --- update feed
	$_SESSION['catacombssearch'] = 1;
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



else if($input=='ne' || $input=='northeast') 
{	if ($_SESSION['catacombssearch'] != 1) 
	{ 
		echo "You don't see an exit to the northeast<br>";
		$message="<i>You don't see an exit to the northeast. Why don't you SEARCH the room and see what you find.</i><br>";
		include ('update_feed.php'); // --- update feed
	}
	else {
		echo 'You travel northeast through the catacombs stone door<br>';
		$message="<i>You travel northeast through the catacombs stone door</i><br>".$_SESSION['desc232p'];
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET room = '232p'"); // -- room change
		$updates = ['endfight' => 0, 'room' => '232p' ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
		$_SESSION['catacombssearch'] = 0;
	}	   
}
// else if($input=='se' || $input=='southeast') 
// {			echo 'You travel southeast<br>';
//    	$message="<i>You travel southeast</i><br>".$_SESSION['desc232i'];
// 	include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232i'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 		   $_SESSION['catacombssearch'] = 0;
// }
// else if($input=='sw' || $input=='southwest') 
// {			echo 'You travel southwest<br>';
//    	$message="<i>You travel southwest</i><br>".$_SESSION['desc232k'];
// 	include ('update_feed.php');   // --- update feed
//    		   $results = $link->query("UPDATE $user SET room = '232k'"); // -- room change
//    		   //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 		   $_SESSION['catacombssearch'] = 0;
// }


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'northeast') { $roomNum = '000';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southeast') { $roomNum = '232i';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southwest') { $roomNum = '232k';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');}
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
