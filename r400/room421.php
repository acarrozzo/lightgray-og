<?php
						$roomname = "Riding a Massive Wave";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc421'];

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
// -------------------------------------------------------------------------- INITIALIZE - 3/10
if(($rand <= 3 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'King Squid'");
	updateStats($link, $username,['enemy' => 'King Squid' ]); // -- set enemy 
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	
// -------------------------------------------------------------------------- END BATTLE BLOCK


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
else if($input=='sw' || $input=='southwest') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel southwest.<br>';
   		$message="<i>You travel southwest.</i><br>".$_SESSION['desc423'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '423'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '423' ]); // -- update stats

		} 
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly southwest!<br>';
            $message="<i>You fly southwest! </i><br>".$_SESSION['desc423'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '423'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '423' ]); // -- update stats
        } 
		else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='e' || $input=='east') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel east.<br>';
   		$message="<i>You travel east.</i><br>".$_SESSION['desc420'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '420'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '420' ]); // -- update stats

		} 
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly east!<br>';
            $message="<i>You fly east! </i><br>".$_SESSION['desc420'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '420'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '420' ]); // -- update stats
        } 
		else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}




// ----------------------------------- end of room function
include('function-end.php');
// }
?>