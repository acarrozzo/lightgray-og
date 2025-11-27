<?php
						$roomname = "Dark Stairwell";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc516d'];

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

// include ('battle-sets/dark-keep-1.php');




	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // - 
	{	$rand = rand (1,10); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE 1/10 OR go UP    ------ STONE SPHINX!!!!
if(($rand == 1 || $input=='u' || $input=='up') && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Stone Sphinx'");
	updateStats($link, $username,['enemy' => 'Stone Sphinx' ]); // -- set enemy
	include ('battle.php'); 
}		 // - 1/10
else if(($rand == 2 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Giant Rat'");
	updateStats($link, $username,['enemy' => 'Giant Rat' ]); // -- set enemy
	include ('battle.php'); 
}				// for funsies and test

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
// else if($input=='ne' || $input=='northeast') 
// {			echo 'You travel northeast<br>';
//    	$message="<i>You travel northeast</i><br>".$_SESSION['desc516a'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '516a'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
else if($input=='u' || $input=='up') 
{			echo 'You travel up the winding stairwell<br>';
   	$message="<i>You travel up the winding stairwell</i><br>".$_SESSION['desc516e'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '516e'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			   updateStats($link, $username,['endfight' => 0, 'room' => '516e' ]); // -- update stats
			}

// -------------------------------------------------------------------------- TRAVEL

elseif ($input == 'northeast') { $roomNum = '516a';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>