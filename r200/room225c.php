<?php
						$roomname = "Wizard's General Store";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc225c'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 
//include ('shops/wizards_shop.php');  

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





if($input=='buy iron staff') 
{	if($currency<3000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy an iron staff for 3000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironstaff = ironstaff + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 3000"); } 
}
if($input=='buy iron battle staff') 
{	if($currency<5000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy an iron battle staff for 5000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironbattlestaff = ironbattlestaff + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 5000"); } 
}
if($input=='buy ring of magic V') 
{	if($currency<16000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a ring of magic V for 16000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 16000"); } 
}
if($input=='buy ring of mana regen V') 
{	if($currency<32000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a ring of mana regen V for 32000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ringofmanaregenV = ringofmanaregenV + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 32000"); } 
}
if($input=='buy blue potion') 
{	if($currency<200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a blue potion for 200 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bluepotion = bluepotion + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 200"); } 
}
if($input=='buy blue balm') 
{	if($currency<2000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a blue balm for 2000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bluebalm = bluebalm + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 2000"); } 
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
else if($input=='sw' || $input=='southwest') 
{	echo 'You travel southwest<br>';
   $message="<i>You travel southwest</i><br>".$_SESSION['desc225b'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '225b'"); // -- room change
}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
