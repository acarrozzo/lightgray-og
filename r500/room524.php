<?php
						$roomname = "Top of the Despair";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc524'];

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


//$quest57=$row['quest57']; 

include ('function-choptree.php');







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

else if($input=='w' || $input=='west') 
{			
	echo 'You travel west to the Forest Princess<br>';
	$message="<i>You travel west to the Forest Princess</i><br>".$_SESSION['desc525'];
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET room = '525'"); // -- room change
	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	updateStats($link, $username,['endfight' => 0, 'room' => '525' ]); // -- update stats
	$_SESSION['emptytree'] = 0; // reset tree
	$_SESSION['enterdespair'] = 1;

}

// else if($input=='s' || $input=='south') 
// {			echo 'You travel south<br>';
//    	$message="<i>You travel south </i><br>".$_SESSION['desc517'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '517'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
//    $_SESSION['enterdespair'] = 1;

// }


else if($input=='d' || $input=='down') 
{	
	if ($_SESSION['enterdespair'] == 1)
	{
		echo 'You descend into the Despair...<br>';
		$message="<i>You descend into the Despair...</i><br>".$_SESSION['desc901'];
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET room = '901'"); // -- room change
		//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		updateStats($link, $username,['endfight' => 0, 'room' => '901' ]); // -- update stats
	}
	else
	{
		echo $message="<i>You attempt to go down into the Despair but are prevented from doing so.</i><br>";
		include ('update_feed.php'); // --- update feed	
	}
}
// -------------------------------------------------------------------------- TRAVEL

elseif ($input == 'south') {    $roomNum = '517';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>