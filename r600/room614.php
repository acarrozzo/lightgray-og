<?php
						$roomname = "Icy Mountain Path";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc614'];

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
	
	
	$slip=rand(1,3); 			// --- 1/3 chance of slipping
	$falldamage=rand(100,1000);	// --- 100 - 1000 damage on fall

include ('battle-sets/mountains.php');








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

else if($input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='north' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' || $input=='down') 
{			

if ($slip == 1) {
	echo 'You attempt to travel and slip on the ice. You tumble down the mountain and take '.$falldamage.' damage!<br>';
   	$message="<i>You attempt to travel and slip on the ice. You tumble down the mountain and take ".$falldamage." damage!</i><br>".$_SESSION['desc615'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '615'"); // -- room change
			   updateStats($link, $username,['endfight' => 0, 'room' => '615' ]); // -- update stats

   			// $results = $link->query("UPDATE $user SET hp = hp - $falldamage"); // -- room change
			   updateStats($link, $username,['hp' => $hp - $falldamage ]); // -- update stat 
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
	else {
			echo "You don't see an exit in that direction<br>";
   			$message="<i>You don't see an exit in that direction</i><br>";
				include ('update_feed.php'); // --- update feed
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
	}
}


else if($input=='w' || $input=='west') 
{			
if ($slip == 1) {
	echo 'You attempt to travel west and slip on the ice. You tumble down the mountain and take '.$falldamage.' damage!<br>';
   	$message="<i>You attempt to travel west and slip on the ice. You tumble down the mountain and take ".$falldamage." damage!</i><br>".$_SESSION['desc615'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '615'"); // -- room change
			   updateStats($link, $username,['endfight' => 0, 'room' => '615' ]); // -- update stats

   			// $results = $link->query("UPDATE $user SET hp = hp - $falldamage"); // -- room change
			   updateStats($link, $username,['hp' => $hp - $falldamage ]); // -- update stat 

   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
	else {
	echo 'You travel west<br>';
   	$message="<i>You travel west</i><br>".$_SESSION['desc617'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '617'"); // -- room change
			   updateStats($link, $username,['endfight' => 0, 'room' => '617' ]); // -- update stats

   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
}
else if($input=='se' || $input=='southeast') 
{			
if ($slip == 1) {
	echo 'You attempt to travel southeast and slip on the ice. You tumble down the mountain and take '.$falldamage.' damage!<br>';
   	$message="<i>You attempt to travel southeast and slip on the ice. You tumble down the mountain and take ".$falldamage." damage!</i><br>".$_SESSION['desc615'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '615'"); // -- room change
			   updateStats($link, $username,['endfight' => 0, 'room' => '615' ]); // -- update stats

   			// $results = $link->query("UPDATE $user SET hp = hp - $falldamage"); // -- room change
			   updateStats($link, $username,['hp' => $hp - $falldamage ]); // -- update stat 
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
	else {
		echo 'You travel southeast<br>';
   		$message="<i>You travel southeast</i><br>".$_SESSION['desc613'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '613'"); // -- room change
			   updateStats($link, $username,['endfight' => 0, 'room' => '613' ]); // -- update stats

   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
}



// ----------------------------------- end of room function
include('function-end.php');
// }
?>