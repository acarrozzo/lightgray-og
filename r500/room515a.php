<?php
						$roomname = "Ranger’s Guild Lobby";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc515a'];

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


$rawmeat=$row['rawmeat']; 
$cookedmeat=$row['cookedmeat']; 
	
$hpmax=$row['hpmax'];   
$mpmax=$row['mpmax'];   
$hp=$row['hp'];  	
$mp=$row['mp'];

$arrows=$row['arrows']; 
$reds=$row['reds']; 
$greens=$row['greens']; 
$blues=$row['blues']; 
$yellows=$row['yellows']; 
$redbalm=$row['redbalm']; 
$bluebalm=$row['bluebalm']; 


 
 
if($input=='cook all meat')  // ---- Cook Meat
{
	if ( $rawmeat == 0 )
	{	echo $message="<div class='menuAction'>You have no raw meat left to cook.</div>";
		include ('update_feed.php'); // --- update feed
	}
	else 
	{ 
		$times = $rawmeat;
		echo $message="<div class='menuAction'>You COOK $times raw meat on the fire!</div>";
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET rawmeat = rawmeat - $times");
		// $results = $link->query("UPDATE $user SET cookedmeat = cookedmeat + $times"); 	
		$updates = [ // -- set changes
			'rawmeat' => $rawmeat - $times,
			'cookedmeat' => $cookedmeat + $times
		]; 
		updateStats($link, $_SESSION['username'], $updates); // -- update  
	}
}
 


 

// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
		// $query = $link->query("UPDATE $user SET hp = $hpmax + 75 "); 
		// $query = $link->query("UPDATE $user SET mp = $mpmax + 75 "); 
		$updates = [ // -- set changes
			'hp' => $hpmax + 75,
			'mp' => $mpmax + 75
		]; 
		updateStats($link, $_SESSION['username'], $updates); // -- update  
		echo $message = "You rest at the Ranger's Guild! (+75 HP, +75 MP)<br>";
		include ('update_feed.php'); // --- update feed
		//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}



// ------------------------------  MASTER PACK

if($input=='grab ranger pack')  // ---- GRAB Master Pack
{
			if ( $arrows >= 100 )
	{ echo $message="<div class='menuAction'>You already have more than 100 arrows!</div>";
	include ('update_feed.php'); // --- update feed
	} else { echo $message="<div class='menuAction'>[ +100 arrows ]</div>";
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET arrows = 100");
	updateStats($link, $username,['arrows' => 100 ]); // -- update stat 

	}
			if ( $greens>= 3 )	// ------------------------------  greens
	{ echo $message="<div class='menuAction'>You already have some greens.</div>";
	include ('update_feed_alt.php'); // --- update feed
	} else { echo $message="<div class='menuAction'>[ +3 greens ]</div>";
	include ('update_feed_alt.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET greens = 3");
	updateStats($link, $username,['greens' => 3 ]); // -- update stat 
	}
			if ( $redbalm>= 3 )	// ------------------------------  red balm
	{ echo $message="<div class='menuAction'>You already have red balms.</div>";
	include ('update_feed_alt.php'); // --- update feed
	} else { echo $message="<div class='menuAction'>[ +3 red balms ]</div>";
	include ('update_feed_alt.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET redbalm = 3");
	updateStats($link, $username,['redbalm' => 3 ]); // -- update stat 
	
	}
			if ( $bluebalm>= 3 )	// ------------------------------  blue balm
	{ echo $message="<div class='menuAction'>You already have blue balms.</div>";
	include ('update_feed_alt.php'); // --- update feed
	} else { echo $message="<div class='menuAction'>[ +3 blue balms ]</div>";
	include ('update_feed_alt.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET bluebalm = 3");
	updateStats($link, $username,['bluebalm' => 3 ]); // -- update stat 

	}
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

// else if($input=='n' || $input=='north') 
// {			echo 'You travel north<br>';
//    	$message="<i>You travel north</i><br>".$_SESSION['desc515b'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '515b'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='e' || $input=='east') 
// {			echo 'You travel east<br>';
//    	$message="<i>You travel east</i><br>".$_SESSION['desc515c'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '515c'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='s' || $input=='south') 
// {			echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc515d'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '515d'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='w' || $input=='west') 
// {			echo 'You travel west<br>';
//    	$message="<i>You travel west</i><br>".$_SESSION['desc515e'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '515e'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '515b';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'east') {     $roomNum = '515c';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'south') {    $roomNum = '515d';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'west') {     $roomNum = '515e';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>