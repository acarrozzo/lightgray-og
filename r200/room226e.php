<?php
						$roomname = "Warrior Pete's Quest Set";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc226e'];
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

$quest25=$row['quest25']; 
$quest26=$row['quest26']; 
$quest27=$row['quest27']; 

$KLskeletonknight=$_SESSION['KLskeletonknight'];
$KLgreatwhite=$_SESSION['KLgreatwhite'];
$KLhammerhead=$_SESSION['KLhammerhead']; 
$KLtrollchampion=$_SESSION['KLtrollchampion']; 



// ---------------------- START ALL QUESTS ---------------------- //
if($input=='start quests') {
	 if ($quest25 <1 || $quest26 <1 || $quest27 <1) {	
		echo $message = "<div class='menuAction'><em class='gold'>You start Warrior Pete's Quests! (25 - 27)</em><br>Check your Quests tab to review what needs to be done.</div> ";		
		include ('update_feed.php'); // --- update feed
   		$results = $link->query("UPDATE $user SET quest25 = 1");
   		$results = $link->query("UPDATE $user SET quest26 = 1");
   		$results = $link->query("UPDATE $user SET quest27 = 1");
	  	}
}


// ---------------------- QUEST 25) Banish the Skeleton Knights ---------------------- //
if($input=='info 25') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 25 Info</strong><br>
		You need to defeat 3 Skeleton Knights. They are found in the Catacombs below Red Town. Head down into the Sewers and then head northwest to reach the Catacombs entrance.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 25') 
{	if ($KLskeletonknight >= 3)
	{	echo $message="<div class='questWin'>
		<h3>Quest 25 Completed!</h3>
		<h4>Banish the Skeleton Knights</h4>
		Congratulations! You have sent 3 Skeleton Knights back to hell! A shiny pair of Bone Knuckles is your reward!
	  	<h4>Rewards</h4>
  	  	[ + 800 xp  ]<br />
      	[ + 200 ".$_SESSION['currency']." ]<br />
      	[ + Bone Knuckles! ]</div>";	
		include ('update_feed.php'); // --- update feed
	   	$results = $link->query("UPDATE $user SET currency = currency + 200"); 
		$results = $link->query("UPDATE $user SET xp = xp + 800"); 
		$results = $link->query("UPDATE $user SET boneknuckles = boneknuckles + 1");
		$results = $link->query("UPDATE $user SET quest25 = 2");
	} 
	else if ($quest25 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 25 Not Complete</strong><br>
	  To complete this quest you need to defeat 3 Skeleton Knights. Find them in the Catacombs below Town.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

// ---------------------- QUEST 26) Shark Hunter ---------------------- //
if($input=='info 26') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 26 Info</strong><br>
		Sharks infest the waters below the Blue Ocean. Slay a Great White and Hammerhead to receive some really great weapons. You can reach the Ocean by going west from the Grassy Field. Go under the Ocean by casting a Gills spell or drinking a Gills Potion.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 26') 
{	if ($KLgreatwhite >= 1 && $KLhammerhead >= 1)
	{	echo $message="<div class='questWin'>
		<h3>Quest 26 Completed!</h3>
		<h4>Shark Hunter</h4>
		Congratulations! You have hunted down the sharks! Here are 2 of the best swords you can get!
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 200 ".$_SESSION['currency']." ]<br />
      	[ + Great White Sword! ]<br />
      	[ + Hammerhead Hammer! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	    $results = $link->query("UPDATE $user SET currency = currency + 200"); 
		$results = $link->query("UPDATE $user SET greatwhitesword = greatwhitesword + 1");
		$results = $link->query("UPDATE $user SET hammerheadhammer = hammerheadhammer + 1");
		$results = $link->query("UPDATE $user SET quest26 = 2");
	} 
	else if ($quest26 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 26 Not Complete</strong><br>
	  To complete this quest you need to hunt down a Great White Shark and Hammerhead Shark. They can be found under the Blue Ocean.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

// ---------------------- QUEST 27) True Troll Champion ---------------------- //
if($input=='info 27') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 27 Info</strong><br>
		The Troll Champion is one of the strongest beasts in the Dark Forest. Slay 3 of them to prove you are the true champion.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 27') 
{	if ($KLtrollchampion >= 3)
	{	echo $message="<div class='questWin'>
		<h3>Quest 27 Completed!</h3>
		<h4>True Troll Champion</h4>
		Congratulations! You have indeed slain 3 Troll Champions. Wear this Champion Armor with pride!
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 200 ".$_SESSION['currency']." ]<br />
      	[ + Champion Armor ]</div>";	
		include ('update_feed.php'); // --- update feed
	   	$results = $link->query("UPDATE $user SET currency = currency + 200"); 
		$results = $link->query("UPDATE $user SET xp = xp + 1000"); 
		$results = $link->query("UPDATE $user SET championarmor = championarmor + 1");
		$results = $link->query("UPDATE $user SET quest27 = 2");
	} 
	else if ($quest27 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 27 Not Complete</strong><br>
	  To complete this quest you need to find and slay 3 Troll Champions. Find them in the Dark Forest north of the regular Forest.</div>";
		include ('update_feed.php'); // --- update feed
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
else if($input=='e' || $input=='east') 
{	echo 'You travel east<br>';
   $message="<i>You travel east</i><br>".$_SESSION['desc226d'];
	include ('update_feed.php'); // --- update feed
   		  $results = $link->query("UPDATE $user SET room = '226d'"); // -- room change
}
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
