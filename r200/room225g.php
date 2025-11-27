<?php
						$roomname = "Wizard Morty's Quest Set"; 
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc225g'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 
include ('shops/wizards_jeweler_shop.php');  

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

$quest28=$row['quest28']; 
$quest29=$row['quest29']; 
$quest30=$row['quest30']; 

$graymatter=$row['graymatter'];
$KLvictoria=$_SESSION['KLvictoria'];
$KLomar=$_SESSION['KLomar']; 

$KLtrollqueen=$_SESSION['KLtrollqueen']; 



 // ---------------------- START ALL QUESTS ---------------------- //
if($input=='start quests') {
	 if ($quest28 <1 || $quest29 <1 || $quest30 <1) {	
		echo $message = "<div class='menuAction'><em class='gold'>You start Wizard Morty's Quests! (28 - 30)</em><br>Check your Quests tab to review what needs to be done.</div> ";		
		include ('update_feed.php'); // --- update feed
   		$results = $link->query("UPDATE $user SET quest28 = 1");
   		$results = $link->query("UPDATE $user SET quest29 = 1");
   		$results = $link->query("UPDATE $user SET quest30 = 1");
	  	}
}
// ---------------------- QUEST 28) Rare Gray Matter ---------------------- //
if($input=='info 28') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 28 Info</strong><br>
		Find a rare piece of gray matter and give it to Morty. Rare creatures drop gray matter, you will come across them randomly in your travels.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 28') 
{	if ($graymatter >= 1)
	{	echo $message="<div class='questWin'>
		<h3>Quest 28 Completed!</h3>
		<h4>Rare Gray Matter</h4>
		Congratulations! You hand a piece of gray matter to Morty and he creates a powerful Gray Wand for you! 
	  	<h4>Rewards</h4>
  	  	[ + 800 xp  ]<br />
      	[ + 200 ".$_SESSION['currency']." ]<br />
      	[ + 5 Blue Potions ]<br />
      	[ + Gray Wand! ]</div>";	
		include ('update_feed.php'); // --- update feed
	    $results = $link->query("UPDATE $user SET currency = currency + 200"); 
		$results = $link->query("UPDATE $user SET xp = xp + 800"); 
		$results = $link->query("UPDATE $user SET graywand = graywand + 1");
		$results = $link->query("UPDATE $user SET bluepotion = bluepotion + 5");
		$results = $link->query("UPDATE $user SET quest28 = 2");
	} 
	else if ($quest28 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 28 Not Complete</strong><br>
	 	To complete this quest you need to find a piece of gray matter. It is dropped by rare enemies.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}


// ---------------------- QUEST 29) Omar & Victoria the Dead ---------------------- //
if($input=='info 29') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 29 Info</strong><br>
		Defeat the undead duo, Omar and Victoria, in the haunted Catacombs below Red Town. Omar packs a mean punch and Victoria is immune to magic, so be prepared.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 29') 
{	if ($KLvictoria >= 1 && $KLomar >=1)
	{	echo $message="<div class='questWin'>
		<h3>Quest 29 Completed!</h3>
		<h4>Omar & Victoria the Dead</h4>
		Congratulations! You have defeated Omar and Victoria. Morty hands you a sweet looking pair of Bone Boots! 
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 200 ".$_SESSION['currency']." ]<br />
      	[ + Bone Boots! ]</div>";	
		include ('update_feed.php'); // --- update feed
	    $results = $link->query("UPDATE $user SET currency = currency + 200"); 
		$results = $link->query("UPDATE $user SET xp = xp + 1000"); 
		$results = $link->query("UPDATE $user SET boneboots = boneboots + 1");
		$results = $link->query("UPDATE $user SET quest29 = 2");
	} 
	else if ($quest29 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 29 Not Complete</strong><br>
	 	To complete this quest you need to defeat Omar and Victoria the Dead found deep in the Catacombs under Red Town.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}



// ---------------------- QUEST 30) Magic and the Troll Queen ---------------------- //
if($input=='info 30') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 30 Info</strong><br>
		 Defeat the evil and magical Troll Queen found deep in the Dark Forest to the far north.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 30') 
{	if ($KLtrollqueen >= 1)
	{	echo $message="<div class='questWin'>
		<h3>Quest 30 Completed!</h3>
		<h4>Magic and the Troll Queen</h4>
		Congratulations! You have indeed slain the Troll Queen! Morty hands you an incredibly strong magical weapon, Solomon Staff! 
	  	<h4>Rewards</h4>
  	  	[ + 2000 xp  ]<br />
      	[ + 200 ".$_SESSION['currency']." ]<br />
      	[ + Solomon Staff! ]</div>";	
		include ('update_feed.php'); // --- update feed
	    $results = $link->query("UPDATE $user SET currency = currency + 200"); 
		$results = $link->query("UPDATE $user SET xp = xp + 2000"); 
		$results = $link->query("UPDATE $user SET solomonstaff = solomonstaff + 1");
		$results = $link->query("UPDATE $user SET quest30 = 2");
	} 
	else if ($quest30 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 30 Not Complete</strong><br>
	 	To complete this quest you need to defeat the Troll Queen. Travel to her nest in the Dark Forest and use magic to defeat her.</div>";
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
else if($input=='n' || $input=='north') 
{	echo 'You travel north<br>';
   $message="<i>You travel north</i><br>".$_SESSION['desc225b'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '225b'"); // -- room change
}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
