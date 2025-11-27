<?php
						$roomname = "By a Fallen Tree";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc519'];

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

// -------------------------------------------------------------------------- BATTLE VARIABLES		
$infight = $row['infight'];
$endfight = $row['endfight'];

include ('battle-sets/dark-forest.php');
include ('function-choptree.php');


if ($input == 'search')
{
	$rand = rand (1,2);
	if ($rand !=2)
	{
		echo 'You search and find nothing, you should try searching again.<br>';
	$message="You search and find nothing, you should try searching again.<br>";
	include ('update_feed.php'); // --- update feed
		
	}
	else {
		echo 'You search and find a secret way to the south through the trees!<br>';
	$message="You search and find a secret way to the south through the trees!<br>";
	include ('update_feed.php'); // --- update feed
	$_SESSION['darkforestsearch'] = 1; 
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
// {			echo 'You travel west<br>';
//    	$message="<i>You travel west</i><br>".$_SESSION['desc518'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '518'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='e' || $input=='east') 
// {			echo 'You travel east<br>';
//    	$message="<i>You travel east</i><br>".$_SESSION['desc520'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '520'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
else if($input=='s' || $input=='south') 
{ 
	if ($_SESSION['darkforestsearch'] != 1) 
	{ 
	echo "You don't see an exit to the south. You should try searching.<br>";
	$message="<i>You don't see an exit to the south. You should try searching.</i><br>";
	include ('update_feed.php'); // --- update feed
   	
	}
	else {
	echo 'You travel south through the trees<br>';
	$message="<i>You travel south through the trees</i><br>".$_SESSION['desc509'];
	include ('update_feed.php'); // --- update feed
   	// $results = $link->query("UPDATE $user SET room = '509'"); // -- room change
  	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	  updateStats($link, $username,['endfight' => 0, 'room' => '509' ]); // -- update stats
	  $_SESSION['darkforestsearch'] = 0;
	}
}
else if($input=='u' || $input=='up') 
{	
	if ($quest57 == 2)
	{
			echo 'You climb a secret ladder into the Ranger\'s Guild.<br>';
   	$message="<i>You climb a secret ladder into the Ranger\'s Guild.</i><br>".$_SESSION['desc515c'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '515c'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			   updateStats($link, $username,['endfight' => 0, 'room' => '515c' ]); // -- update stats
			}
}
// -------------------------------------------------------------------------- TRAVEL

elseif ($input == 'east') {     $roomNum = '520';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'west') {     $roomNum = '518';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>