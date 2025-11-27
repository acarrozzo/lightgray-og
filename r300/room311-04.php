<?php					
								$roomname = "Mine Level 4";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc311-04'];

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

 	$pickaxe = $row['pickaxe'];
 	$ironpickaxe = $row['ironpickaxe'];
 	$steelpickaxe = $row['steelpickaxe'];
 	$mithrilpickaxe = $row['mithrilpickaxe'];

if($input=='mine here')  
	{ include ('function-mine.php'); // MINE FOR ORE
	}
	
	
include ('battle-sets/mine01.php');	// ENEMY BATTLE - MINE LEVEL 1-4


// -------------------------------------------------------------------------- Battle TRAVEL
if ((	$input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='north' || $input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' ||  $input=='mine down' || $input=='down' )  && $infight >= 1) {
	echo 'You cannot leave the room in the middle of battle!<br>';
   	$message="<i>You cannot leave the room in the middle of battle!</i><br>";
	include ('update_feed.php'); // --- update feed
	}
// -------------------------------------------------------------------------- TRAVEL
else if($input=='u' || $input=='up')  
{			echo 'You travel up the mine<br>';
   	$message="<i class=''>You travel up the mine</i><br>".$_SESSION['desc311-03'];
	include ('update_feed.php'); // --- update feed
   								// $results = $link->query("UPDATE $user SET room = 'm03'"); // -- room change
    $updates = ['endfight' => 0, 'room' => '311-03' ]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes
}
else if($input=='d' || $input=='mine down' || $input=='down') 
{		
		if ($pickaxe<=0 && $ironpickaxe<=0 && $steelpickaxe<=0 && $mithrilpickaxe<=0) {
			echo $message="<i class='redBG lightgray'>You need a pickaxe to mine down!</i><br>";
			include ('update_feed.php'); // --- update feed
		}
		else {
			echo 'You dig down to mine level 5, the War Turtle\'s Lair.<br>';
   			$message="<i class=''>You dig down to mine level 5, the War Turtle's Lair.</i><br>".$_SESSION['desc311-05'];
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = 'm05'"); // -- room change
			$updates = ['endfight' => 0, 'room' => '311-05' ]; // -- set changes
			updateStats($link, $username, $updates); // -- apply changes
			include ('function-mine.php');	// MINE FOR ORE			
		}
}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>