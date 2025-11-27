<?php
						$roomname = "Red Town Grand Square";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc210'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

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

$teleport3 = $row['teleport3'];


// $results = $link->query("UPDATE $user SET craftingtable = '210'"); // -- set room to crafting table
// $results = $link->query("UPDATE $user SET fire = '210'"); // -- set fire to room

// -- set room to crafting table + fire
$updates = [ // -- set changes
	'craftingtable' => '210',
	'fire' => '210'
]; 
updateStats($link, $_SESSION['username'], $updates); // -- update 

// -------------------------------------------------------------------------- Activate Red Town Teleport
if ($teleport3 == 0) { 	
	// $results = $link->query("UPDATE $user SET teleport3 = 1");
	updateStats($link, $username,['teleport3' => 1 ]); // -- update stat 
	echo $message="<i>You can now teleport to the Red Town square! Click 'red town' to teleport to this location at any time. </i><br>";
	include ('update_feed.php'); // --- update feed	  
	}	
// -------------------------------------------------------------------------- READ SIGN!
else if($input=='read sign') {  //read sign
	echo '   <i>You read the Red Town Directory</i> <br>  ';
	$message="
	<i>you read the sign:</i>   
	<div class='sign'>
	<h3>Red Town<i>Directory</i></h3>
	<form id='mainForm' method='post' action='' name='formInput'>
	<span class='direc'><input type='submit' name='input1' value='north' /></span> <span class='hilight'>Red Guard</span> <i>Quests 11-13</i><br />
	<span class='direc'><input type='submit' name='input1' value='east' /></span> <span class='hilight'>Town Hall</span> <i>Quests 21-24</i><br />
	<span class='direc'><input type='submit' name='input1' value='south' /></span> <span class='hilight'>Back Alley</span> <i>Sewer Entrance</i><br />
	<span class='direc'><input type='submit' name='input1' value='west' /></span> <span class='hilight'>Town Exit</span> <i>Path to Rocky Flats</i><br />
	<span class='direc'><input type='submit' name='input1' value='northeast' /></span> <span class='hilight'>Adam's General Store</span><i></i><br />
	<span class='direc'><input type='submit' name='input1' value='southwest' /></span> <span class='hilight'>Michael's Weapon Shop</span> <i></i> <br /><span class='direc'><input type='submit' name='input1' value='northwest' /></span> <span class='hilight'>Warrior's Guild</span><i></i><br />
	<span class='direc'><input type='submit' name='input1' value='southeast' /></span> <span class='hilight'>Wizard's Guild</span><i></i> <br />
	---------------------------------------------------<br>
	<span class='hilight'>Red Guard</span> 
	Complete any quest from the Red Guard and gain access to the forest.<br>
	---------------------------------------------------<br>
	<span class='hilight'>Guilds</span> 
	You will find Guilds scattered throughout the land. Guilds are always a great places to learn newer and stronger skills and spells.<br>
	---------------------------------------------------
	</form></div>";
	include ('update_feed.php'); // --- update feed	
}


// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
		// $query = $link->query("UPDATE $user SET hp = $hpmax + 25 "); 
		// $query = $link->query("UPDATE $user SET mp = $mpmax + 25 "); 
		$updates = [ // -- set changes
			'hp' => $hpmax + 25,
			'mp' => $mpmax + 25
		]; 
		updateStats($link, $_SESSION['username'], $updates); // -- update 
		echo $message = "You rest at the fountain and supercharge your HP & MP!<br>";
		include ('update_feed.php'); // --- update feed
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
// else if($input=='s' || $input=='south') 
// {  echo 'You travel south<br>';
//    $message="<i>You travel south</i><br>".$_SESSION['desc228'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 228"); // -- room change
// }

// else if($input=='w' || $input=='west') 
// {	echo 'You travel west<br>';
//    $message="<i>You travel west</i><br>".$_SESSION['desc209'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 209"); // -- room change
// }

// else if($input=='sw' || $input=='southwest') 
// {	echo 'You travel southwest<br>';
//    $message="<i>You travel southwest</i><br>".$_SESSION['desc227'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 227"); // -- room change
// }

// else if($input=='n' || $input=='north') 
// {	echo 'You travel north<br>';
//    $message="<i>You travel north</i><br>".$_SESSION['desc211'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 211"); // -- room change
// }

// else if($input=='e' || $input=='east') 
// {	echo 'You travel east<br>';
//    $message="<i>You travel east</i><br>".$_SESSION['desc217'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 217"); // -- room change
// }
// else if($input=='ne' || $input=='northeast') 
// {	echo 'You travel northeast<br>';
//    $message="<i>You travel northeast</i><br>".$_SESSION['desc216'];
//   include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 216"); // -- room change
// }
// else if($input=='nw' || $input=='northwest') 
// {	echo 'You travel northwest<br>';
//    $message="<i>You travel northwest</i><br>".$_SESSION['desc226'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 226"); // -- room change
// }

// else if($input=='se' || $input=='southeast') 
// {	echo 'You travel southeast<br>';
//    $message="<i>You travel southeast</i><br>".$_SESSION['desc225'];
//    include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 225"); // -- room change
// }




// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '211';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'east') {     $roomNum = '217';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'south') {    $roomNum = '228';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'west') {     $roomNum = '209';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northeast') { $roomNum = '216';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southeast') { $roomNum = '225';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southwest') { $roomNum = '227';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northwest') { $roomNum = '226';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
