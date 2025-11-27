<?php
						$roomname = "Vincenzo's Meat & Produce Stand";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc229'];
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

include ('battle-sets/thief.php');


if($input=='buy cooked meat') 
{	if($currency<50) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a piece of cooked meat for 50 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET cookedmeat = cookedmeat + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 50"); 
		updateStats($link, $username, ['currency' => $currency - 50, 'cookedmeat' => $cookedmeat + 1]); // -- apply changes
		}
}
if($input=='buy meatball') 
{	if($currency<250) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a meatball for 250 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET meatball = meatball + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 250"); 
		updateStats($link, $username, ['currency' => $currency - 250, 'meatball' => $meatball + 1]); // -- apply changes
		}
}
if($input=='buy bluefish') 
{	if($currency<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a bluefish for 500 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET bluefish = bluefish + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 500"); 
		updateStats($link, $username, ['currency' => $currency - 500, 'bluefish' => $bluefish + 1]); // -- apply changes
		}
}
if($input=='buy veggies') 
{	if($currency<100) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy some veggies for 100 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET veggies = veggies + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 100"); 
		updateStats($link, $username, ['currency' => $currency - 100, 'veggies' => $veggies + 1]); // -- apply changes
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
// else if($input=='e' || $input=='east') 
// {	echo 'You travel east<br>';
//    $message="<i>You travel east</i><br>".$_SESSION['desc230'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 230"); // -- room change
// }


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '230';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}




// ----------------------------------- end of room function
include('function-end.php');
// }
?>
