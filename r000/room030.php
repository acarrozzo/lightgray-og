<?php
$roomname = "Friendly Giant - Mountain Shortcut";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc030'];


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


$infight = $row['infight'];
$endfight = $row['endfight'];

 	$KLfriendlygiant=$_SESSION['KLfriendlygiant'];

	
// -------------------------------------------------------------------------- If room ready create random rand #
//if ($infight < 1 && $endfight != 1) 
//	{	$rand = rand (1,10); 
//		//echo "<br>RAND: ".$rand."<br>";
//	}	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE Friendly Giant on attack
if(($input=='attack friendly giant' || $input=='attack' ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack friendly giant') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Friendly Giant'");
		include ('battle.php'); }			

// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack giant' || $input=='attack friendly giant') { $input = 'attack'; }
		include ('battle.php');	}	
		
		
		
		
		
		
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
else if($input=='se' || $input=='southeast') 
{
	echo 'You travel southeast<br>';
	$message="<i>You travel southeast</i><br>".$_SESSION['desc029'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '029'"); // -- room change
  	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}

else if($input=='n' || $input=='north') 
{	
		if ($KLfriendlygiant >=1)
			  { echo 'You travel north to the mountains.<br>';
   				$message="<i>You travel north to the mountains.</i><br>".$_SESSION['desc606'];
				include ('update_feed.php');   // --- update feed
   			   		$results = $link->query("UPDATE $user SET room = '606'"); // -- room change
   			   		$results = $link->query("UPDATE $user SET endfight = 2"); // -- reset fight
		}
		else { 
				echo $message="<div class='menuAction'>You can't enter the Mountains Yet! You need defeat the Friendly Giant in combat first!</div>";
				include ('update_feed.php');   // --- update feed
	}
}


// ----------------------------------- end of room function
include('function-end.php');
// }

?>
