<?php
						$roomname = "Thieve’s Den Secret Entrance";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc232mm'];
//$dangerLVL = $_SESSION['dangerLVL'] = "3"; // danger level

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

include ('battle-sets/thief2.php'); // 1/20 thief encounter 



if ($input == 'search')
{
	$rand = rand (1,2); 
	if ($rand !=2) 
	{
		echo $message="You search and find nothing, you should try searching again.<br>";
	include ('update_feed.php'); // --- update feed
		
	}
	else {
		echo $message="You search the room and find a hidden passageway to the northeast!<br>";
	include ('update_feed.php'); // --- update feed
	$_SESSION['shadysearch'] = 1; 
	}
	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	updateStats($link, $username, ['endfight' => 0]); // -- update stats
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
{ 
	if ($_SESSION['shadysearch'] != 1) 
	{ 
		echo $message="<i>You don't see an exit to the northeast. You should try searching.</i><br>";
		include ('update_feed.php'); // --- update feed
	}
	else {
		echo 'You travel northeast through a secret passageway back to town.<br>';
		$message="<i>You travel northeast through a secret passageway back to town</i><br>".$_SESSION['desc233'];
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET room = '233'"); // -- room change
		$updates = ['endfight' => 0, 'room' => '233' ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
		$_SESSION['shadysearch'] = 0;
	}
}
else if($input=='d' || $input=='down') 
{	
	echo 'You travel down<br>';
	$message="<i>You travel down</i><br>".$_SESSION['desc232m'];
	include ('update_feed.php'); // --- update feed
	//    $results = $link->query("UPDATE $user SET room = '232m'"); // -- room change
	$updates = ['endfight' => 0, 'room' => '232m' ]; // -- set changes
	updateStats($link, $username, $updates); // -- apply changes
	$_SESSION['shadysearch'] = 0; 
}





// ----------------------------------- end of room function
include('function-end.php');
// }
?>
