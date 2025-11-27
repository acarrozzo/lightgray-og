<?php
						$roomname = "Warrior's Grand Hall";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc226d'];
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

 	$rawmeat=$row['rawmeat']; 
	$cookedmeat=$row['cookedmeat']; 
	$meatball=$row['meatball']; 
	$redpotion=$row['redpotion']; 
	
	$hpmax=$row['hpmax'];   
	$mpmax=$row['mpmax'];   
	$hp=$row['hp'];  	
	$mp=$row['mp'];

	$warriorskillFlag = $row['warriorskillFlag'];


// ---------------------- SKILL FLAG! ---------------------- //
if ($warriorskillFlag==0) {
echo  $message = "<div class='menuAction'>
You can now learn new SKILLS from the WARRIOR'S GUILD!!</div> ";
include ('update_feed.php'); // --- update feed
$results = $link->query("UPDATE $user SET warriorskillFlag = 1");
}
						

 
 if($input=='cook all meat' && $quest19 >=2)  // ---- Cook Meat
{
	if ( $rawmeat == 0 )
	{	echo $message="<div class='menuAction'>You have no raw meat left to cook.</div>";
		include ('update_feed.php'); // --- update feed
	}
	else 
	{ 
		$times = $rawmeat;
		echo $message="<div class='menuAction'>You COOK $times raw meat on the fire!</div>";
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET rawmeat = rawmeat - $times");
		$results = $link->query("UPDATE $user SET cookedmeat = cookedmeat + $times"); 	
	}
}
 
 
 
 
 
if($input=='grab meatball' )  // ---- GRAB meatball
{
	if ( $row['meatball'] >= 5 )
	{
	echo $message="<div class='menuAction'>You can't grab more than 5 meatballs here. so greedy!</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'>You grab 5 meat-a-balls off the table.</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET meatball = 5");
	}
}
if($input=='grab red potion' )  // ---- GRAB red potion
{
	if ( $row['redpotion'] >= 5 )
	{
	echo $message="<div class='menuAction'>You can't grab more than 5 red potions here.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'>You grab 5 red potions off the table.</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET redpotion = 5");
	}
}

// --------------------------------------------------------------------------- REST HEAL +50 HP
if ($input=="rest"){
		$query = $link->query("UPDATE $user SET hp = $hpmax + 50 "); 
		$query = $link->query("UPDATE $user SET mp = $mpmax "); 
		echo $message = "You rest at the warrior's fire and supercharge your HP!<br>";
		include ('update_feed.php'); // --- update feed
		//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
	
}
// cook all meat
// get red potion // up to 5
// get meatball // up to 5
// rest,  + 50 hp


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
   $message="<i>You travel west</i><br>".$_SESSION['desc226e'];
	include ('update_feed.php'); // --- update feed
   		  $results = $link->query("UPDATE $user SET room = '226e'"); // -- room change
}
else if($input=='s' || $input=='south') 
{	echo 'You travel south<br>';
   $message="<i>You travel south</i><br>".$_SESSION['desc226c'];
	include ('update_feed.php'); // --- update feed
   		  $results = $link->query("UPDATE $user SET room = '226c'"); // -- room change
}
else if($input=='se' || $input=='southeast') 
{	echo 'You travel southeast<br>';
   $message="<i>You travel southeast</i><br>".$_SESSION['desc226a'];
	include ('update_feed.php'); // --- update feed
   		  $results = $link->query("UPDATE $user SET room = '226a'"); // -- room change
}
else if($input=='e' || $input=='east') 
{	echo 'You travel east<br>';
   $message="<i>You travel east</i><br>".$_SESSION['desc226b'];
	include ('update_feed.php'); // --- update feed
   		  $results = $link->query("UPDATE $user SET room = '226b'"); // -- room change
}







// ----------------------------------- end of room function
include('function-end.php');
// }
?>
