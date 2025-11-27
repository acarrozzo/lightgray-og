<?php
						$roomname = "Red Town Shady Shop";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc236'];
//$dangerLVL = $_SESSION['dangerLVL'] = "3"; // danger level

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

include ('battle-sets/thief2.php'); // 1/20 thief encounter


if($input=='buy 200 arrows') 
{	if($currency<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy 200 wooden arrows for 500 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET arrows = arrows + 200"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 500"); 
		updateStats($link, $username, ['currency' => $currency - 500, 'arrows' => $arrows + 200]); // -- apply changes
		}
}
if($input=='buy 200 bolts') 
{	if($currency<1000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy 200 bolts for 1000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET bolts = bolts + 200"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 1000"); 
		updateStats($link, $username, ['currency' => $currency - 1000, 'bolts' => $bolts + 200]); // -- apply changes
		}
}
if($input=='buy reds') 
{	if($currency<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy some REDS for 500 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET reds = reds + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 500"); 
		updateStats($link, $username, ['currency' => $currency - 500, 'reds' => $reds + 1]); // -- apply changes
		}
}
if($input=='buy greens') 
{	if($currency<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy some GREENS for 500 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET greens = greens + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 500"); 
		updateStats($link, $username, ['currency' => $currency - 500, 'greens' => $greens + 1]); // -- apply changes
		}
}
if($input=='buy blues') 
{	if($currency<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy some BLUES for 500 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET blues = blues + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 500"); 
		updateStats($link, $username, ['currency' => $currency - 500, 'blues' => $blues + 1]); // -- apply changes
		}
}
if($input=='buy yellows') 
{	if($currency<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy some YELLOWS for 500 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET yellows = yellows + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 500"); 
		updateStats($link, $username, ['currency' => $currency - 500, 'yellows' => $yellows + 1]); // -- apply changes
		
		}
}
if($input=='buy vapor necklace') 
{	if($currency<50000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a VAPOR NECKLACE for 50k '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET vapornecklace = vapornecklace + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 50000"); 
		updateStats($link, $username, ['currency' => $currency - 50000, 'vapornecklace' => $vapornecklace + 1]); // -- apply changes
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
// {	echo 'You travel north<br>';
//    $message="<i>You travel north</i><br>".$_SESSION['desc232'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 232"); // -- room change
// }




// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '232';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>
