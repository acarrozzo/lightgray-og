<?php
						$roomname = "Dark Elf | Tree Hut";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc506'];

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

$quest54=$row['quest54']; 
$quest55=$row['quest55']; 
$quest56=$row['quest56']; 

$wood=$row['wood']; 
$KLtrollshaman=$_SESSION['KLtrollshaman']; 
$KLtrollsorcerer=$_SESSION['KLtrollsorcerer']; 

$KLent=$_SESSION['KLent']; 

$mithrilhatchet=$row['mithrilhatchet'];
$ringofhealthregenV=$row['ringofhealthregenV'];
$ringofmanaregenV=$row['ringofmanaregenV'];
$goldkey=$row['goldkey'];
$MOUNTskyhawk=$row['MOUNTskyhawk'];

// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
		// $query = $link->query("UPDATE $user SET hp = $hpmax + 75 "); 
		// $query = $link->query("UPDATE $user SET mp = $mpmax + 75 "); 
		updateStats($link, $username, ['hp' => $hpmax + 75, 'mp' => $mpmax + 75]); // -- update stats
		echo $message = "you rest at the Tree Hut fireplace and super charge you health and mana (+75 HP, +75 MP)<br>";
		include ('update_feed.php'); // --- update feed
		//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}
// -------------------------------------------------------------------------- GRAB tea
if($input=='grab tea' || $input=='get tea'  )  
{
    $check=$row['tea'];
	if ( $check >= 5 )
	{
		echo $message="<div class='menuAction'>You pick up a cup of tea and drink it. (+5 hp/mp regen / 100 clicks)</div>";
		include ('update_feed.php'); // --- update feed
	}
	else { 
		echo $message="<div class='menuAction'>
		<p>You pick up 5 cups o' tea from the table!</p>
		<p>You drink some TEA and feel great! (+5 hp/mp regen / 100 clicks)</p>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET tea = 5");
		updateStats($link, $username, ['tea' => 5]); // -- update stats
	}
	$_SESSION['tea'] = 100;
	// echo $message = 'You drink some TEA and feel great! (+5 hp/mp regen / 100 clicks)<br>';
	// include ('update_feed.php'); // --- update feed
}


// ---------------------- START ALL QUESTS ---------------------- //
if($input=='start quests') {
	 if ($quest54 <1 || $quest55 <1 || $quest56 <1) {	
		/*
		echo $message = "<div class='menuAction'>
		<p class='gold'>You start the Dark Elf Quests! (54 - 56)</p>
		<p>Check your Quests tab to review what needs to be done.</p>
		<a href='' data-link='quests' class='btn goldBG'>Open Quests</a>
		</div> ";	
		*/		
		echo $message = '<div class="fbox">
		<h3 class="padd forest">You start the Dark Elf\'s Quests!</h3>
		<span class="icon forest">'.file_get_contents("img/svg/npc/npc-darkelf.svg").'</span>
		<p class="padd"><i>"Man this tea is good."</i></p>
		<a href data-link="quests" class="btn goldBG">Open Quests </a>
		</div>';	
		include ('update_feed.php'); // --- update feed
   		// $results = $link->query("UPDATE $user SET quest54 = 1");
   		// $results = $link->query("UPDATE $user SET quest55 = 1");
   		// $results = $link->query("UPDATE $user SET quest56 = 1");
		   $updates = [ // -- set changes
			'quest54' => 1,
			'quest55' => 1,
			'quest56' => 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	  	}
}


// ---------------------- QUEST 54) Dark Forest Lumberjack ---------------------- //
if($input=='info 54') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 54 Info</strong><br>
		You ready for a big order traveler? Return here with 50 wood.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 54') 
{	if ( $wood >=50 )
	{	echo $message="<div class='questWin'>
		<h3>Quest 54 Completed!</h3>
		<h4>Dark Forest Lumberjack</h4>
		Congratulations! You have indeed gathered 50 pieces of wood. That’s a lot of wood! The Dark Elf hands you a freshly crafted Mithril Hatchet.
		<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 5000 ".$_SESSION['currency']." ]<br />
      	[ + Ring of Health Regen V ]<br />
      	[ + Ring of Mana Regen V ]<br />
      	[ + Mithril Hatchet! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		// $results = $link->query("UPDATE $user SET mithrilhatchet = mithrilhatchet + 1");
		// $results = $link->query("UPDATE $user SET ringofhealthregenV = ringofhealthregenV + 1");
		// $results = $link->query("UPDATE $user SET ringofmanaregenV = ringofmanaregenV + 1");
		// $results = $link->query("UPDATE $user SET quest54 = 2");
		$updates = [ // -- set changes
			'xp' => $xp + 1000,
			'currency' => $currency + 5000,
			'mithrilhatchet' => $mithrilhatchet + 1,
			'ringofhealthregenV' => $ringofhealthregenV + 1,
			'ringofmanaregenV' => $ringofmanaregenV + 1,
			'quest54' => 2
		];
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest54 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 54 Not Complete</strong><br>
	To complete this quest pick up a hatchet and go into the Forest and chop down some wood. Return when you have 50 pieces.
	</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

// ---------------------- QUEST 55) Shaman & Sorcerer Slayer ---------------------- //
if($input=='info 55') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 55 Info</strong><br>
		I have a shiny gold key with your name on it. Return here after you slay a Troll Shaman and a Troll Sorcerer and it’s all yours.
		</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 55') 
{	if ( $KLtrollshaman >=1 && $KLtrollsorcerer >=1 )
	{	echo $message="<div class='questWin'>
		<h3>Quest 55 Completed!</h3>
		<h4>Shaman & Sorcerer Slayer</h4>
Congratulations! You have indeed slain a Shaman and Sorcerer. I present to you this marvelous Gold Key. Use it to open the Dark Forest Gold Chest or any other Gold Chest you like.
		<h4>Rewards</h4>
  	  	[ + 1500 xp  ]<br />
      	[ + 5000 ".$_SESSION['currency']." ]<br />
      	[ + Gold Key! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 1500"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		// $results = $link->query("UPDATE $user SET goldkey = goldkey + 1");
		// $results = $link->query("UPDATE $user SET quest55 = 2");
		$updates = [ // -- set changes
			'xp' => $xp + 1500,
			'currency' => $currency + 5000,
			'goldkey' => $goldkey + 1,
			'quest55' => 2
		];
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest55 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 55 Not Complete</strong><br>
To complete this quest you need to defeat a Troll Shaman and a Troll Sorcerer. They can both be found in the Dark Forest.
	</div>";
		include ('update_feed.php'); // --- update feed
	}  
}


// ---------------------- QUEST 56) Ent Hunter ---------------------- //
if($input=='info 56') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 56 Info</strong><br>
Trees have been coming to life and attacking the wildlife. They are difficult to spot but when you do send it back into the ground.
		</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 56')
{	if ( $KLent >=1 )
	{	echo $message="<div class='questWin'>
		<h3>Quest 56 Completed!</h3>
		<h4>Ent Hunter</h4>
Congratulations! You have indeed beat up a tree! A marvelous sky hawk flies in from the sky. With glowing feathers that look like tempered mithril, this bird is ready to go.
		<h4>Rewards</h4>
  	  	[ + 2000 xp  ]<br />
      	[ + 5000 ".$_SESSION['currency']." ]<br />
      	[ + Sky Hawk! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 2000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		// $results = $link->query("UPDATE $user SET MOUNTskyhawk = MOUNTskyhawk + 1");
		// $results = $link->query("UPDATE $user SET quest56 = 2");
		$updates = [ // -- set changes
			'xp' => $xp + 2000,
			'currency' => $currency + 5000,
			'MOUNTskyhawk' => $MOUNTskyhawk + 1,
			'quest56' => 2
		];
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest56 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 56 Not Complete</strong><br>
To complete this quest you need to defeat an Ent. They are rare creatures found in the Dark Forest.
		</div>";
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
// else if($input=='nw' || $input=='northwest') 
// {			echo 'You travel northwest to the Dark Forest Teleport<br>';
//    	$message="<i>You travel northwest to the Dark Forest Teleport</i><br>".$_SESSION['desc507'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '507'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='se' || $input=='southeast') 
// {			echo 'You travel southeast<br>';
//    	$message="<i>You travel southeast</i><br>".$_SESSION['desc505'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '505'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'southeast') { $roomNum = '505';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northwest') { $roomNum = '507';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>