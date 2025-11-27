<?php
						$roomname = "Warrior's Weapon & Armor Shop";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc226b'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 
//include ('shops/warriors_shop.php');  

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

 

if($input=='buy iron dagger') 
{	if($currency<1000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy an iron dagger for 1000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET irondagger = irondagger + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 1000"); } 
}
if($input=='buy iron sword') 
{	if($currency<3000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy an iron sword for 3000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironsword = ironsword + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 3000"); } 
}
if($input=='buy polearm') 
{	if($currency<3000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a polearm for 3000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET polearm = polearm + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 3000"); } 
}
if($input=='buy iron 2h sword') 
{	if($currency<5000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy an iron 2h sword for 5000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET iron2hsword = iron2hsword + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 5000"); } 
}
if($input=='buy ring of strength V') 
{	if($currency<16000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a ring of strength V for 16000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 16000"); } 
}
if($input=='buy ring of health regen V') 
{	if($currency<32000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a ring of health regen V for 32000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ringofhealthregenV = ringofhealthregenV + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 32000"); } 
}
if($input=='buy meatball') 
{	if($currency<250) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a meatball for 250 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET meatball = meatball + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 250"); } 
}
if($input=='buy red balm') 
{	if($currency<1000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a red balm for 1000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET redbalm = redbalm + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 1000"); } 
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
else if($input=='w' || $input=='west') 
{	echo 'You travel west<br>';
   $message="<i>You travel west</i><br>".$_SESSION['desc226d'];
	include ('update_feed.php'); // --- update feed
   		  $results = $link->query("UPDATE $user SET room = '226d'"); // -- room change
}
else if($input=='sw' || $input=='southwest') 
{	echo 'You travel southwest<br>';
   $message="<i>You travel southwest</i><br>".$_SESSION['desc226c'];
	include ('update_feed.php'); // --- update feed
   		  $results = $link->query("UPDATE $user SET room = '226c'"); // -- room change
}
else if($input=='s' || $input=='south') 
{	echo 'You travel south<br>';
   $message="<i>You travel south</i><br>".$_SESSION['desc226a'];
	include ('update_feed.php'); // --- update feed
   		  $results = $link->query("UPDATE $user SET room = '226a'"); // -- room change
}







// ----------------------------------- end of room function
include('function-end.php');
// }
?>
