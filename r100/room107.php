<?php
// -- 107 -- Red Town Gate
$roomname = "On a Stone Path by a Hill";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc107'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1"; // danger level

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

$KLogre=$_SESSION['KLogre']; 

include ('battle-sets/forest-path.php'); 




// -------------------------------------------------------------------------- READ SIGN!
if($input=='read sign') {  //read sign
	echo '   <i>You read the Sign</i> <br>  ';
	$message="
	<i>you read the sign:</i>   
	<div class='sign'>
	<form id='mainForm' method='post' action='' name='formInput'>
	<span class='direc'><input type='submit' name='input1' value='south' /></span> <span class='gold h5'>Red Town</span><br>
	Lots o' Quests, Guilds, Shops, Skills, Spells & more.<br>
	---------------------------------------------------<br>
	<span class='direc'><input type='submit' name='input1' value='west' /></span> <span class='gold h5'>Ogre Lair</span><br>
	You need to defeat the Ogre Lieutenant to join the Warrior's Guild.<br>
	---------------------------------------------------<br>
	</form>
	</div>";
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
// else if($input=='w' || $input=='west') 
// {	echo 'You travel west<br>';
//    $message="<i>You travel west</i><br>".$_SESSION['desc108'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 108"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

// else if($input=='n' || $input=='north') 
// {	echo 'You travel north<br>';
//    $message="<i>You travel north</i><br>".$_SESSION['desc106'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 106"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
else if($input=='s' || $input=='south') 
{	
	if ($KLogre >= 1)
	{
		echo 'A proven Ogre slayer, the Red Guard lets you travel south<br>';
		$message="<i>A proven Ogre slayer, the Red Guard lets you travel south</i><br>".$_SESSION['desc201'];
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET room = 201"); // -- room change
		$updates = ['endfight' => 0, 'room' => '201' ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
	}
	else
	{
	echo 'As you attempt to pass the Red Gate you are stopped by a Guard. Kill an Ogre first he says.<br>';
	$message="<p>As you attempt to pass the Red Gate you are stopped by a Red Guard.</p>
	<h6 class='gold'> To gain access to Red Town you must prove your worth by killing an Ogre.</h6>
	<p>You can find Ogres in their lair west of here.</p>";
	include ('update_feed.php'); // --- update feed
	}
}

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '106';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'west') {     $roomNum = '108';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');} 
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
