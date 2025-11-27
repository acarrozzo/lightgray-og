<?php
						$roomname = "Todd's Pub & Inn";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc220'];
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

// include ('battle-sets/thief.php');

$redpotion = $row['redpotion'];
$bluepotion = $row['bluepotion'];
$purplepotion = $row['purplepotion'];
$redbalm = $row['redbalm'];
$bluebalm = $row['bluebalm'];
$purplebalm = $row['purplebalm'];
$wingspotion = $row['wingspotion'];
$gillspotion = $row['gillspotion'];
$antidotepotion = $row['antidotepotion'];
$currency = $row['currency'];




if($input=='buy red potion') 
{	if($currency<100) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a red potion for 100 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET redpotion = redpotion + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 100"); 
		updateStats($link, $username, ['currency' => $currency - 100, 'redpotion' => $redpotion + 1]); // -- apply changes
		}
}
if($input=='buy blue potion') 
{	if($currency<200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a blue potion for 200 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET bluepotion = bluepotion + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 200"); 
		updateStats($link, $username, ['currency' => $currency - 200, 'bluepotion' => $bluepotion + 1]); // -- apply changes
		}
}
if($input=='buy purple potion') 
{	if($currency<400) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a purple potion for 400 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET purplepotion = purplepotion + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 400"); 
		updateStats($link, $username, ['currency' => $currency - 400, 'purplepotion' => $purplepotion + 1]); // -- apply changes
		}
}
if($input=='buy red balm') 
{	if($currency<1000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a red balm for 1000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET redbalm = redbalm + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 1000");
		updateStats($link, $username, ['currency' => $currency - 1000, 'redbalm' => $redbalm + 1]); // -- apply changes
		}
}
if($input=='buy blue balm') 
{	if($currency<2000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a blue balm for 2000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET bluebalm = bluebalm + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 2000"); 
		updateStats($link, $username, ['currency' => $currency - 2000, 'bluebalm' => $bluebalm + 1]); // -- apply changes
		}
}
if($input=='buy purple balm') 
{	if($currency<4000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a purple balm for 4000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET purplebalm = purplebalm + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 4000"); 
		updateStats($link, $username, ['currency' => $currency - 4000, 'purplebalm' => $purplebalm + 1]); // -- apply changes
		}
}
if($input=='buy wings potion') 
{	if($currency<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a wings potion for 500 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET wingspotion = wingspotion + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 500"); 
		updateStats($link, $username, ['currency' => $currency - 500, 'wingspotion' => $wingspotion + 1]); // -- apply changes
		}
}
if($input=='buy gills potion') 
{	if($currency<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a gills potion for 500 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET gillspotion = gillspotion + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 500"); 
		updateStats($link, $username, ['currency' => $currency - 500, 'gillspotion' => $gillspotion + 1]); // -- apply changes
		}
}
if($input=='buy antidote potion') 
{	if($currency<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy an antidote potion for 500 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET antidotepotion = antidotepotion + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 500"); 
		updateStats($link, $username, ['currency' => $currency - 500, 'antidotepotion' => $antidotepotion + 1]); // -- apply changes
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
// else if($input=='w' || $input=='west') 
// {	echo 'You travel west<br>';
//    $message="<i>You travel west</i><br>".$_SESSION['desc218'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 218"); // -- room change
// }


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'west') {     $roomNum = '218';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>
