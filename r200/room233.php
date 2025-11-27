<?php
						$roomname = "Red Town - Turn in the Back Alley";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc233'];
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
		echo $message="You search the room and find a hidden thief passageway to the southeast!<br>";
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
// else if($input=='w' || $input=='west') 
// {	echo 'You travel west<br>';
//    $message="<i>You travel west</i><br>".$_SESSION['desc232'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 232"); // -- room change
//    		$_SESSION['shadysearch'] = 0; 
// }
// else if($input=='nw' || $input=='northwest') 
// {	echo 'You travel northwest<br>';
//    $message="<i>You travel northwest</i><br>".$_SESSION['desc234'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 234"); // -- room change
//       	$_SESSION['shadysearch'] = 0; 

// }
else if($input=='se' || $input=='southeast') 
{ 
	if ($_SESSION['shadysearch'] != 1) 
	{ 
	echo $message="<i>You don't see an exit to the southeast. It's really dark but you should try searching.</i><br>";
	include ('update_feed.php'); // --- update feed
   	
	}
	else {
	echo 'You travel southeast through a secret thief passageway!<br>';
	$message="<i>You travel southeast through a secret thief passageway</i><br>".$_SESSION['desc232mm'];
	include ('update_feed.php'); // --- update feed
   	// $results = $link->query("UPDATE $user SET room = '232mm'"); // -- room change
	$updates = ['endfight' => 0, 'room' => '232mm' ]; // -- set changes
	updateStats($link, $username, $updates); // -- apply changes
	$_SESSION['shadysearch'] = 0;
	}
}



// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'west') {     $roomNum = '232';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northwest') { $roomNum = '234';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');}



// ----------------------------------- end of room function
include('function-end.php');
// }
?>
