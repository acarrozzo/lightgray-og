<?php
						$roomname = "Red Guard Captain's Office";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc214'];
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


$ringofstrengthII=$row['ringofstrengthII'];


// -------------------------------------------------------------------------- READ SIGN!
if($input=='read sign') {  //read sign
	echo '<i>You read the sign</i> <br>  ';
	$message="
	<i>you read the sign:</i>   
	<div class='sign'>
	<h3>Free Ring <i></i></h3>
	<form id='mainForm' method='post' action='' name='formInput'>
	---------------------------------------------------<br>
	<span class='hilight'>Grab a FREE Ring! (But only one!)</span><br>
	---------------------------------------------------<br>
	</form></div>";
	include ('update_feed.php'); // --- update feed	
}

// -------------------------------------------------------------------------- GRAB RING
if($input=='grab ring') 
{	if ($ringofstrengthIII >= 1)
	 	{ 
			echo $message="<div class='menuAction'>You already have a Ring of Strength III. If you lose it come back here for another free one.</div>"; 
			include ('update_feed.php'); // --- update feed
		}
	else
	 	{ 
			echo $message="<div class='menuAction'>You grab a Ring of Strength III out of the bowl.</div>"; 
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET ringofstrengthIII = ringofstrengthIII + 1");
			updateStats($link, $username,['ringofstrengthIII' => $ringofstrengthIII + 1 ]); // -- update stat 
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
// else if($input=='sw' || $input=='southwest') 
// {  echo 'You travel southwest<br>';
//    $message="<i>You travel southwest</i><br>".$_SESSION['desc212'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 212"); // -- room change
// }
// else if($input=='n' || $input=='north') 
// {	echo 'You travel north<br>';
//    $message="<i>You travel north</i><br>".$_SESSION['desc215'];
//   include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 215"); // -- room change
// }


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '215';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southwest') { $roomNum = '212';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
