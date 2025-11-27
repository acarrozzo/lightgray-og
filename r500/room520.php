<?php
						$roomname = "Thorny Path";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc520'];

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

$hp = $row['hp'];


// -------------------------------------------------------------------------- rand
if ($infight == 0)  // RAND GENERATOR
	{	$randEncounter = rand (1,3); }	else {$randEncounter=0;}	
// -------------------------------------------------------------------------- INITIALIZE 7/21
if( $randEncounter == 1 ) 
	{
		$thorndamage = rand(50,100);
		echo $message="<br><i> --- ouch! you run into a thorn bush! </i>[ <i class='red'>-".$thorndamage." HP!</i> ]<br>";
		// $query = $link->query("UPDATE $user SET hp = hp - $thorndamage"); 	
		updateStats($link, $username, ['hp' => $hp - $thorndamage]); // -- update stats			
		include ('update_feed_alt.php');   // --- update feed
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
//    	$message="<i>You travel west</i><br>".$_SESSION['desc519'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '519'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='nw' || $input=='northwest') 
// {			echo 'You travel northwest<br>';
//    	$message="<i>You travel northwest</i><br>".$_SESSION['desc521'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '521'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// -------------------------------------------------------------------------- TRAVEL

elseif ($input == 'west') {     $roomNum = '519';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'northwest') { $roomNum = '521';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>