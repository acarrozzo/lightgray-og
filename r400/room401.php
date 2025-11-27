<?php
						$roomname = "In the Ocean near the Docks";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc401'];
//$dangerLVL = $_SESSION['dangerLVL'] = "13"; // danger level

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

if ($row['grandquest3']=='0'){
		// $query = $link->query("UPDATE $user SET grandquest3 = 1 "); 
		updateStats($link, $username,['grandquest3' => 1 ]); // -- update stat 
		echo $message = "You start GRAND QUEST 3! Help the good dwarves of the Stone Mining Village and anybody else you find out on the Blue Ocean (Complete Quests 31-50)<br>";
		include ('update_feed.php'); // --- update feed
}	


include ('battle-sets/blueocean.php'); // blue ocean battle set

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
else if($input=='e' || $input=='east') 
{			echo 'You travel east and enter the Grassy Field Docks<br>';
   	$message="<i>You travel east and enter the Grassy Field Docks</i><br>".$_SESSION['desc016'];
	include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '016'"); // -- room change
       updateStats($link, $username,['endfight' => 0, 'room' => '016' ]); // -- update stats
}

else if($input=='nw' || $input=='northwest') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel northwest.<br>';
   		$message="<i>You travel northwest.</i><br>".$_SESSION['desc402'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '402'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '402' ]); // -- update stats

		} 
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly northwest!<br>';
            $message="<i>You fly northwest! </i><br>".$_SESSION['desc402'];
            include('update_feed.php'); // --- update feed
   // $results = $link->query("UPDATE $user SET room = '402'"); // -- room change
   updateStats($link, $username,['endfight' => 0, 'room' => '402' ]); // -- update stats
        } 
		else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='sw' || $input=='southwest') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel southwest.<br>'; 
   		$message="<i>You travel southwest.</i><br>".$_SESSION['desc404'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '404'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '404' ]); // -- update stats

		} 
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly southwest!<br>';
            $message="<i>You fly southwest! </i><br>".$_SESSION['desc404'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '404'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '404' ]); // -- update stats
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