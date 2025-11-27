<?php
						$roomname = "Dark Grove";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc509'];

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
	
	 $randrare = rand(1,20);
// -------------------------------------------------------------------------- INITIALIZE RARE - Ent - 1/20!
if(($randrare == 1 ) && $infight==0 && $endfight==0) 
{	
	// $results = $link->query("UPDATE $user SET enemy = 'Ent'");
	updateStats($link, $username,['enemy' => 'Ent' ]); // -- set enemy 
	include ('battle.php'); 
}			
else {
	include ('battle-sets/dark-forest.php');
}
include ('function-choptree.php');

//$x=$_SESSION['darkforestsearch'];
//echo 'XX: '.$x.' ';

if ($input == 'search')
{
	$rand = rand (1,2);
	if ($rand ==1)
	{
		echo $message="You search the Dark Grove and find nothing.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if (	$_SESSION['darkforestsearch'] == 0) {
		echo $message="You search the Dark Grove and discover a secret path to the north!<br>";
		include ('update_feed.php'); // --- update feed
		$_SESSION['darkforestsearch'] = 1; 
	}
	else if (	$_SESSION['darkforestsearch'] == 1) {
		echo $message="You search the Dark Grove and think you find something, but you don’t.<br>";
		include ('update_feed.php'); // --- update feed
		$_SESSION['darkforestsearch'] = 2; 
	}
	else if (	$_SESSION['darkforestsearch'] == 2) {
		echo $message="You search and find a secret way through the strange trees to the west!!<br>";
		include ('update_feed.php'); // --- update feed
		$_SESSION['darkforestsearch'] = 3; 
	}
	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	updateStats($link, $username, ['endfight' => 0]); // -- update stats

}
// you search the dark grove and think you find something, but you don’t (50%) // grove flag 2

// you search and find a secret way through the strange trees to the west! (50%) // grove flag 3

// you go west and get lost in the trees.






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
// else if($input=='sw' || $input=='southwest') 
// {			echo 'You travel southwest<br>';
//    	$message="<i>You travel southwest</i><br>".$_SESSION['desc508'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '508'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='se' || $input=='southeast') 
// {			echo 'You travel southeast<br>';
//    	$message="<i>You travel southeast</i><br>".$_SESSION['desc510'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '510'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }



else if($input=='n' || $input=='north') 
{			
	if ($_SESSION['darkforestsearch'] == 0) 
	{ 
	echo "You don't see an exit to the north. You should try searching.<br>";
	$message="<i>You don't see an exit to the north. You should try searching.</i><br>";
	include ('update_feed.php'); // --- update feed
   	
	}
	else {
	echo 'You go north through the secret path and arrive at a fallen tree<br>';
	$message="<i>You go north through the secret path and arrive at a fallen tree</i><br>".$_SESSION['desc519'];
	include ('update_feed.php'); // --- update feed
   	// $results = $link->query("UPDATE $user SET room = '519'"); // -- room change
  	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	  updateStats($link, $username,['endfight' => 0, 'room' => '519' ]); // -- update stats
	  $_SESSION['darkforestsearch'] = 0;
	}
}
else if($input=='w' || $input=='west') 
{	

	if ($_SESSION['darkforestsearch'] != 3) 
	{ 
	echo "You don't see an exit to the west.<br>";
	$message="<i>You don't see an exit to the west.</i><br>";
	include ('update_feed.php'); // --- update feed
   	
	}
	else {
	echo 'You go west and get lost in the trees.<br>';
	$message="<i>You go west and get lost in the trees.</i><br>".$_SESSION['desc514'];
	include ('update_feed.php'); // --- update feed
   	// $results = $link->query("UPDATE $user SET room = '514'"); // -- room change
  	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	  updateStats($link, $username,['endfight' => 0, 'room' => '514' ]); // -- update stats
	  $_SESSION['darkforestsearch'] = 0;
	}
}


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'southeast') { $roomNum = '510';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'southwest') { $roomNum = '508';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>