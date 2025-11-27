<?php
						$roomname = "Lost in the Trees";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc514'];

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


include ('function-choptree.php');


// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
   $input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
   $input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
   $input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
   $input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br>"; }	
	
//include ('battle-sets/dark-forest.php');
include ('function-choptree.php');

if ($input == 'search')
{
	echo $message="You search the trees and somehow get even more lost.<br>";
	include ('update_feed.php'); // --- update feed
}



// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
   $input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
   $input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
   $input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
   $input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br>"; }	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
{	$rand = rand (1,20);
	$randrare = rand (1,100); 

}	
   else {$rand=0;$randrare=0;}	
// -------------------------------------------------------------------------- INITIALIZE SUPER RARE - Wisp - 1/100!!! - DOUBLE NORMAL 1/200
if(($randrare == 1 ) && $infight==0 && $endfight==0) 
{	
	// $results = $link->query("UPDATE $user SET enemy = 'Wisp'");
	updateStats($link, $username,['enemy' => 'Wisp' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE low RARES - 
else if(($rand == 1 ) && $infight==0 && $endfight==0) {
	$rand2 = rand (1,4);
	if ($rand2 == 1){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Bigfoot'");
		updateStats($link, $username,['enemy' => 'Bigfoot' ]); // -- set enemy
	include ('battle.php'); 
}		
	else if ($rand2 == 2){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Imp'");
		updateStats($link, $username,['enemy' => 'Imp' ]); // -- set enemy
	include ('battle.php'); 
}		
	else if ($rand2 == 3){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Ent'");
		updateStats($link, $username,['enemy' => 'Ent' ]); // -- set enemy
	include ('battle.php'); 
}		
	else if ($rand2 == 4){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Falcon'");
		updateStats($link, $username,['enemy' => 'Falcon' ]); // -- set enemy
	include ('battle.php'); 
}		
	else if ($rand2 == 5){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Bowman'");
		updateStats($link, $username,['enemy' => 'Bowman' ]); // -- set enemy
	include ('battle.php'); 
}		
	else if ($rand2 == 6){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Dark Ranger'");
		updateStats($link, $username,['enemy' => 'Dark Ranger' ]); // -- set enemy
	include ('battle.php'); 
	}
}	
// -------------------------------------------------------------------------- INITIALIZE - 1
else if(($rand == 2 ) && $infight==0 && $endfight==0) 
{	
	// $results = $link->query("UPDATE $user SET enemy = 'Dark Ranger'");
	updateStats($link, $username,['enemy' => 'Dark Ranger' ]); // -- set enemy
	include ('battle.php'); 
}			 // EXTRA DARK RANGER	
// -------------------------------------------------------------------------- INITIALIZE - 1
else if(($rand == 3 ) && $infight==0 && $endfight==0) 
{	
	// $results = $link->query("UPDATE $user SET enemy = 'Troll Shaman'");
	updateStats($link, $username,['enemy' => 'Troll Shaman' ]); // -- set enemy
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- INITIALIZE - 1
else if(($rand == 4 ) && $infight==0 && $endfight==0) 
{	
	// $results = $link->query("UPDATE $user SET enemy = 'Troll Sorcerer'");
	updateStats($link, $username,['enemy' => 'Troll Sorcerer' ]); // -- set enemy
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- INITIALIZE - 1
else if(($rand == 5 ) && $infight==0 && $endfight==0) 
{	
	// $results = $link->query("UPDATE $user SET enemy = 'Troll Elder'");
	updateStats($link, $username,['enemy' => 'Troll Elder' ]); // -- set enemy
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- INITIALIZE - 1
else if(($rand == 6 ) && $infight==0 && $endfight==0) 
{	
	// $results = $link->query("UPDATE $user SET enemy = 'Bowman'");
	updateStats($link, $username,['enemy' => 'Bowman' ]); // -- set enemy
	include ('battle.php'); 
}				// EXTRA BOWMAN
// -------------------------------------------------------------------------- INITIALIZE - 1
else if(($rand == 7 ) && $infight==0 && $endfight==0) 
{	
	// $results = $link->query("UPDATE $user SET enemy = 'Troll Champion'");
	updateStats($link, $username,['enemy' => 'Troll Champion' ]); // -- set enemy
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

// -------------------------------------------------------------------------- TRAVEL
else if($input=='sw' || $input=='southwest') 
{			echo 'you attempt to go southwest but end up going southeast<br>';
   	$message="<i>you attempt to go southwest but end up going southeast</i><br>".$_SESSION['desc514'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '514'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			   updateStats($link, $username,['endfight' => 0, 'room' => '514' ]); // -- update stats
			   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='se' || $input=='southeast') 
{			echo 'you attempt to go southeast but end up going northeast<br>';
   	$message="<i>you attempt to go southeast but end up going northeast</i><br>".$_SESSION['desc514'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '514'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			   updateStats($link, $username,['endfight' => 0, 'room' => '514' ]); // -- update stats
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='nw' || $input=='northwest') 
{			echo 'you attempt to go northwest but end up going southwest<br>';
   	$message="<i>you attempt to go northwest but end up going southwest</i><br>".$_SESSION['desc514'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '514'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			   updateStats($link, $username,['endfight' => 0, 'room' => '514' ]); // -- update stats
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='ne' || $input=='northeast') 
{			echo 'you attempt to go northeast but actually go northwest. you somehow arrive at the base of a massive tree which claims home to the Ranger’s Guild.<br>';
   	$message="<i>you attempt to go northeast but actually go northwest. you somehow arrive at the base of a massive tree which claims home to the Ranger’s Guild.</i><br>".$_SESSION['desc515'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '515'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			   updateStats($link, $username,['endfight' => 0, 'room' => '515' ]); // -- update stats
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='w' || $input=='west') 
{			echo 'you attempt to go west but end up going south<br>';
   	$message="<i>you attempt to go west but end up going south</i><br>".$_SESSION['desc514'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '514'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			   updateStats($link, $username,['endfight' => 0, 'room' => '514' ]); // -- update stats
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='e' || $input=='east') 
{			echo 'you attempt to go east but end up going north<br>';
   	$message="<i>you attempt to go east but end up going north</i><br>".$_SESSION['desc514'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '514'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			   updateStats($link, $username,['endfight' => 0, 'room' => '514' ]); // -- update stats
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='n' || $input=='north') 
{			echo 'you attempt to go north but end up going west<br>';
   	$message="<i>you attempt to go north but end up going west</i><br>".$_SESSION['desc514'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '514'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			   updateStats($link, $username,['endfight' => 0, 'room' => '514' ]); // -- update stats
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='s' || $input=='south') 
{			echo 'You travel south and somehow go east and are no longer lost<br>';
   	$message="<i>You travel south and somehow go east and are no longer lost</i><br>".$_SESSION['desc509'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '509'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			   updateStats($link, $username,['endfight' => 0, 'room' => '509' ]); // -- update stats
   $_SESSION['emptytree'] = 0; // reset tree
}




// ----------------------------------- end of room function
include('function-end.php');
// }
?>