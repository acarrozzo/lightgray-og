<?php
						$roomname = "Mud Island";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc412'];
//$dangerLVL = $_SESSION['dangerLVL'] = "11"; // danger level

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

$equipMount = $row['equipMount'];




// -------------------------------------------------------------------------------------------------------------- BATTLE VARIABLES		
 	
$infight = $row['infight'];
$endfight = $row['endfight'];
	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE mud crab - 2/10
if(($rand <= 2 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Mud Crab'");
	updateStats($link, $username,['enemy' => 'Mud Crab' ]); // -- set enemy 
	include ('battle.php'); 
}				
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
// -------------------------------------------------------------------------- END BATTLE BLOCK



// -------------------------------------------------------------------------- TRAVEL

else if($input=='nw' || $input=='northwest') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel northwest.<br>';
   		$message="<i>You travel northwest.</i><br>".$_SESSION['desc411'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '411'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '411' ]); // -- update stats

		} 
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly northwest!<br>';
            $message="<i>You fly northwest! </i><br>".$_SESSION['desc411'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '411'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '411' ]); // -- update stats
        } 
		 else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}

else if($input=='d' || $input=='down') 
{	echo 'You travel down into the Muddy Cave.<br>';
   		$message="<i>You travel down into the Muddy Cave.</i><br>".$_SESSION['desc490'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '490'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '490' ]); // -- update stats

	}






// ----------------------------------- end of room function
include('function-end.php');
// }
?>