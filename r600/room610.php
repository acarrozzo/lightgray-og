<?php
						$roomname = "Master Trainer | Master Skills";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc610'];

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




// ---------------------- TEACH SKILLS ---------------------- //
// $results = $link->query("UPDATE $user SET mastertrainerFlag = 1"); // -- mastertrainer flag on
updateStats($link, $username,['mastertrainerFlag' => 1 ]); // -- update stat 




$chest7 = $row['chest7'];




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
			/*
				if ($chest7 <= 0){
				echo  $message="<i>You cannot travel west yet. Open up the Gold Chest at the Cathedral Courtyard to the north of here to unlock this door. Complete Chilly Pete's Quest to get a Gold Key.</i><br>";	
					include ('update_feed.php'); // --- update feed
				}
				
				else {
					*/
				echo 'You travel west to the Star City Blue Gate<br>';
				$message="<i>You travel west to the Star City Blue Gate</i><br>".$_SESSION['desc611'];
				include ('update_feed.php'); // --- update feed
				//    $results = $link->query("UPDATE $user SET room = '611'"); // -- room change
				updateStats($link, $username,['endfight' => 0, 'room' => '611' ]); // -- update stats

					//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			//	}
}

else if($input=='e' || $input=='east') 
{	
				if ($chest7 <= 0){
				echo  $message="<i>You cannot travel east yet. Open up the Gold Chest at the Cathedral Courtyard to the north of here to unlock this door. Complete Chilly Pete's Quest to get a Gold Key.</i><br>";	
					include ('update_feed.php'); // --- update feed
				}
				
				else {
				echo 'You travel east to the Mountain Outpost<br>';
				$message="<i>You travel east to the Mountain Outpost</i><br>".$_SESSION['desc608'];
				include ('update_feed.php'); // --- update feed
				//    $results = $link->query("UPDATE $user SET room = '608'"); // -- room change
				updateStats($link, $username,['endfight' => 0, 'room' => '608' ]); // -- update stats

					//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
				}
}

else if($input=='sw' || $input=='southwest') 
{			echo 'You travel southwest down the waterfall to the grassy field.<br>';
   	$message="<i>You travel southwest down the waterfall to the grassy field.</i><br>".$_SESSION['desc020'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '020'"); // -- room change
			   updateStats($link, $username,['endfight' => 0, 'room' => '020' ]); // -- update stats

   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}




// ----------------------------------- end of room function
include('function-end.php');
// }
?>