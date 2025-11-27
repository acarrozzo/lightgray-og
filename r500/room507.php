<?php
						$roomname = "Dark Forest Teleport";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc507'];

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

$ironhatchet=$row['ironhatchet'];   

// -------------------------------------------------------------------------- BATTLE VARIABLES		
$infight = $row['infight'];
$endfight = $row['endfight'];
	
// -------------------------------------------------------------------------- Activate Forest Teleport
if ($row['teleport8'] == 0) { 	
	// $results = $link->query("UPDATE $user SET teleport8 = 1");
	updateStats($link, $username,['teleport8' => 1 ]); // -- update stat 
	echo $message="<i>You can now teleport to the Dark Forest! Click 'Dark Forest' in your teleport menu to teleport to this location at any time. </i><br>";
	include ('update_feed.php'); // --- update feed	  
	}
// -------------------------------------------------------------------------- GQ4 activate	
if ($row['grandquest4']=='0'){
		// $query = $link->query("UPDATE $user SET grandquest4 = 1 "); 
		updateStats($link, $username,['grandquest4' => 1 ]); // -- update stat
		echo $message = "You start GRAND QUEST 4! Help the friends you find in the Dark Forest and the Stone Mountain (Complete Quests 51-70)<br>";
		include ('update_feed.php'); // --- update feed
}


// -------------------------------------------------------------------------- grab iron hatchet	
if($input=='grab iron hatchet')
{
	if ( $ironhatchet >= 1 )
	{
	echo $message="<div class='menuAction'>You already have an iron hatchet. </div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'>you pick up the iron hatchet. you are too cool.
</div>";
	include ('update_feed.php'); // --- update feed
  	// $results = $link->query("UPDATE $user SET ironhatchet = ironhatchet + 1");
	updateStats($link, $username,['ironhatchet' => $ironhatchet + 1 ]); // -- update stat
	}
}

// -------------------------------------------------------------------------- READ SIGN!
if($input=='read sign') { 
	echo '<i>You read the Dark Forest Directory</i> <br>  ';
	$message="
	<i>you read the sign:</i>   
	<div class='sign'>
	<h3>Dark Forest <i>Directory</i></h3>
	<form id='mainForm' method='post' action='' name='formInput'>
	---------------------------------------------------<br>
	<span class='direc'><input type='submit' name='input1' value='north' /></span> <span class='hilight'>Gold Chest, Dark Keep, Troll Nest</span> <i></i><br />
	<span class='direc'><input type='submit' name='input1' value='east' /></span> <span class='hilight'>Dark Grove</span> <i>Champion's Camp</i> <br />
	<span class='direc'><input type='submit' name='input1' value='southeast' /></span> <span class='hilight'>Dark Elf Tree Hut</span> <i>QUESTS!</i><br />
	<span class='direc'><input type='submit' name='input1' value='southwest' /></span> <span class='hilight'>Ranger Guard Outpost</span> <i>Stone Path to Mountains</i> <br />
	---------------------------------------------------<br>
	<span class='direc'> <span class='hilight'>BONUS!</span> <i>Grab an Iron Axe here if your need one.</i><br />
	---------------------------------------------------<br>
	</form>
	</div>";
	include ('update_feed.php'); // --- update feed	
}



include ('battle-sets/dark-forest.php');
include ('function-choptree.php');












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
{			echo 'You jump southwest off the ledge to the Ranger Outpost<br>';
   	$message="<i>You jump southwest off the ledge to the Ranger Outpost</i><br>".$_SESSION['desc502'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '502'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			   updateStats($link, $username,['endfight' => 0, 'room' => '502' ]); // -- update stats
			   $_SESSION['emptytree'] = 0; // reset tree
}
// else if($input=='n' || $input=='north') 
// {			echo 'You travel north<br>';
//    	$message="<i>You travel north</i><br>".$_SESSION['desc513'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '513'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='e' || $input=='east') 
// {			echo 'You travel east<br>';
//    	$message="<i>You travel east</i><br>".$_SESSION['desc508'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '508'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
else if($input=='se' || $input=='southeast') 
{			echo 'You travel southeast to the Tree Hut<br>';
   	$message="<i>You travel southeast to the Tree Hut</i><br>".$_SESSION['desc506'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '506'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			   updateStats($link, $username,['endfight' => 0, 'room' => '506' ]); // -- update stats
			   $_SESSION['emptytree'] = 0; // reset tree
}


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '513';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'east') {     $roomNum = '508';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}




// ----------------------------------- end of room function
include('function-end.php');
// }
?>