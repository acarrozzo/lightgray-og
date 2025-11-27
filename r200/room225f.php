<?php
						$roomname = "Wizard's Jeweler";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc225f'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 
//include ('shops/wizards_jeweler_shop.php');  

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





if($input=='buy red wizard ring') 
{	if($currency<10000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a red wizard ring for 10000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET redwizardring = redwizardring + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 10000"); } 
}
if($input=='buy green wizard ring') 
{	if($currency<10000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a green wizard ring for 10000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET greenwizardring = greenwizardring + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 10000"); } 
}
if($input=='buy yellow wizard ring') 
{	if($currency<10000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a yellow wizard ring for 10000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET yellowwizardring = yellowwizardring + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 10000"); } 
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
else if($input=='ne' || $input=='northeast') 
{	echo 'You travel northeast<br>';
   $message="<i>You travel northeast</i><br>".$_SESSION['desc225b'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '225b'"); // -- room change
}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
