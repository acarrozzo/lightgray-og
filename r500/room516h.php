<?php
						$roomname = "Dark Throne";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc516h'];

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

// include ('battle-sets/dark-keep-2.php');



	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // - 
	{	$rand = rand (1,10); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE 1/10 OR go UP    ------ Dark Prince!!!!
if(($rand == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Dark Prince'");
	updateStats($link, $username,['enemy' => 'Dark Prince' ]); // -- set enemy
	include ('battle.php'); 
}		 // - 1/10


// -------------------------------------------------------------------------- IN BATTLE	
	
else if ($infight >=1 ) { include ('battle.php'); }	



if(($input=='grab crown' ) && $infight==0) 
	{
		echo 'you attempt to pick up the crown but it’s so heavy it doesn’t even budge. Out of nowhere a dark figure swoops in and you are attacked!<br>';
		$message="<i>you attempt to pick up the crown but it’s so heavy it doesn’t even budge. Out of nowhere a dark figure swoops in and you are attacked!</i><br>";
		include ('update_feed.php'); // --- update feed

		// $results = $link->query("UPDATE $user SET enemy = 'Dark Prince'");
		updateStats($link, $username,['enemy' => 'Dark Prince' ]); // -- set enemy
		include ('battle.php');
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
// else if($input=='sw' || $input=='southwest') 
// {			echo 'You travel southwest<br>';
//    	$message="<i>You travel southwest</i><br>".$_SESSION['desc516e'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '516e'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'southwest') { $roomNum = '516e';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>