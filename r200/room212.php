<?php
						$roomname = "Red Town Barracks";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc212'];
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



//include ('battle-sets/thief.php'); 

$mace=$row['mace'];
$longsword=$row['longsword'];
$warhammer=$row['warhammer'];


if($input=='grab mace') 
{	if ($mace >= 1)
	 	{ 
			echo $message="<div class='menuAction'>You already have a mace. If you lose it come back here for another free one.</div>"; 
			include ('update_feed.php'); // --- update feed
		}
	else
	 	{ 
			echo $message="<div class='menuAction'>You grab a mace off the weapon rack and place it in your pack.</div>"; 
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET mace = 1");
			updateStats($link, $username,['mace' => 1 ]); // -- update stat 
	 	}
}
if($input=='grab long sword') 
{	if ($longsword >= 1)
	 	{ 
			echo $message="<div class='menuAction'>You already have a long sword. If you lose it come back here for another free one.</div>"; 
			include ('update_feed.php'); // --- update feed
		}
	else
	 	{ 
			echo $message="<div class='menuAction'>You grab a long sword off the weapon rack and place it in your pack.</div>"; 
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET longsword = 1");
			updateStats($link, $username,['longsword' => 1 ]); // -- update stat 
	 	}
}
if($input=='grab warhammer') 
{	if ($warhammer >= 1)
	 	{ 
			echo $message="<div class='menuAction'>You already have a warhammer. If you lose it come back here for another free one.</div>"; 
			include ('update_feed.php'); // --- update feed
		}
	else
	 	{ 
			echo $message="<div class='menuAction'>You grab a warhammer off the weapon rack and place it in your pack.</div>"; 
			include ('update_feed.php'); // --- update feed
			// $link->query("UPDATE $user SET warhammer = 1");
			updateStats($link, $username,['warhammer' => 1 ]); // -- update stat 
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
// else if($input=='s' || $input=='south') 
// {  echo 'You travel south<br>';
//    $message="<i>You travel south</i><br>".$_SESSION['desc211'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 211"); // -- room change
// }

// else if($input=='n' || $input=='north') 
// {	echo 'You travel north<br>';
//    $message="<i>You travel north</i><br>".$_SESSION['desc213'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 213"); // -- room change
// }

// else if($input=='ne' || $input=='northeast') 
// {	echo 'You travel northeast<br>';
//    $message="<i>You travel northeast</i><br>".$_SESSION['desc214'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 214"); // -- room change
// }



// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '213';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'south') {    $roomNum = '211';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northeast') { $roomNum = '214';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
