<?php
						$roomname = "Chilly Pete | Mountain Cabin";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc609'];

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




$quest67=$row['quest67']; 
$quest68=$row['quest68']; 
$quest69=$row['quest69']; 

$KLvampire=$_SESSION['KLvampire']; 
$KLdarkpaladin=$_SESSION['KLdarkpaladin']; 
$KLsnowogre=$_SESSION['KLsnowogre']; 
$KLsnowninja=$_SESSION['KLsnowninja']; 
$KLsnowowl=$_SESSION['KLsnowowl']; 

$vampiricdagger=$row['vampiricdagger'];
$blessedspear=$row['blessedspear'];
$COMPsnowberserker=$row['COMPsnowberserker'];

// -------------------------------------------------------------------------- GRAB tea
if($input=='grab tea' || $input=='get tea'  )  
{
    $check=$row['tea'];
	if ( $check >= 5 )
	{
	echo $message="<div class='menuAction'>You already have tea! Come back if you run out.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'>You pick up 5 cups o' tea from the table!</div>";
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET tea = 5");
	updateStats($link, $username,['tea' => 5 ]); // -- update stat 
	}
}


// ---------------------- START ALL QUESTS ---------------------- //
if($input=='start quests') {
	 if ($quest67 <1 || $quest68 <1 || $quest69 <1) {	
		/*echo $message = "<div class='menuAction'>
		<p class='gold'>You start Chilly Pete's Quests! (67 - 69)</p>
		<p>Check your Quests tab to review what needs to be done.</p>
		<a href='' data-link='quests' class='btn goldBG'>Open Quests</a>
		</div> ";		
		*/

		echo $message = '<div class="fbox">
		<h3 class="padd purple">You start Chilly Pete\'s Quests!</h3>
		<span class="icon purple">'.file_get_contents("img/svg/npc/npc-chillypete.svg").'</span>
		<p class="padd"><i>"My tea is way better than the Dark Elfs."</i></p>
		<a href data-link="quests" class="btn goldBG">Open Quests </a>
		</div>';	
		include ('update_feed.php'); // --- update feed
   		// $results = $link->query("UPDATE $user SET quest67 = 1");
   		// $results = $link->query("UPDATE $user SET quest68 = 1");
   		// $results = $link->query("UPDATE $user SET quest69 = 1");
		   $updates = [ // -- set changes
			'quest67' => 1,
			'quest68' => 1,
			'quest69' => 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	  	}
}




// ---------------------- QUEST 67) Vampire Hunter ---------------------- //
if($input=='info 67') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 67 Info</strong><br>
		Chilly Pete has a bloody good reward for anyone who can defeat 3 Vampires. </div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 67') 
{	if ( $KLvampire >=3  )
	{	echo $message="<div class='questWin'>
		<h3>Quest 67 Completed!</h3>
		<h4>Vampire Hunter</h4>
 		Congratulations! You have hunted down 3 undead vampires. Chilly Pete hands you a life stealing Vampiric Dagger gleaming with energy.
 	  	<h4>Rewards</h4>
  	  	[ + 10000 xp  ]<br />
      	[ + 20000 ".$_SESSION['currency']." ]<br />
      	[ + Vampiric Dagger! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 10000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 20000"); 
		// $results = $link->query("UPDATE $user SET vampiricdagger = vampiricdagger + 1");
		// $results = $link->query("UPDATE $user SET quest67 = 2");
		$updates = [ // -- set changes
			'quest67' => 2,
			'xp' => $xp + 10000,
			'currency' => $currency + 20000,
			'vampiricdagger' => $vampiricdagger + 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	

	} 
	else if ($quest67 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 67 Not Complete</strong><br>
	Quest not complete. To complete this quest you need to defeat 3 vampires. They can be found in the Dark Cathedral in the Mountains.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}






// ---------------------- QUEST 68) Dark Paladin Cleanse ---------------------- //
if($input=='info 68') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 68 Info</strong><br>
		Chilly Pete wants you to remove some evil from this world. Visit the Dark Keep and defeat 3 Dark Paladins.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 68') 
{	if ( $KLdarkpaladin >=3  )
	{	echo $message="<div class='questWin'>
		<h3>Quest 68 Completed!</h3>
		<h4>Dark Paladin Cleanse</h4>
 		Congratulations! You have slain 3 Dark Paladins. Chilly Pete fishes around his weapons cache and hands you a spear blessed by the gods.
 	  	<h4>Rewards</h4>
  	  	[ + 10000 xp  ]<br />
      	[ + 20000 ".$_SESSION['currency']." ]<br />
      	[ + Blessed Spear! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 10000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 20000"); 
		// $results = $link->query("UPDATE $user SET blessedspear = blessedspear + 1");
		// $results = $link->query("UPDATE $user SET quest68 = 2");
		$updates = [ // -- set changes
			'quest68' => 2,
			'xp' => $xp + 10000,
			'currency' => $currency + 20000,
			'blessedspear' => $blessedspear + 1
		];
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest68 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 68 Not Complete</strong><br>
	Quest not complete. To complete this quest you must go to the top of the Dark Keep and defeat 3 Dark Paladins who patrol there. </div>";
		include ('update_feed.php'); // --- update feed
	}  
}



// ---------------------- QUEST 69) The Super Rare Snowy Trio  ---------------------- //
if($input=='info 69') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 69 Info</strong><br>
		Chilly Pete has a most difficult quest for you. You must find the super rare snowy trio in the mountains.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 69') 
{	if (  $KLsnowogre >=1 && $KLsnowninja >=1 && $KLsnowowl >=1  )
	{	echo $message="<div class='questWin'>
		<h3>Quest 69 Completed!</h3>
		<h4>The Super Rare Snowy Trio</h4>
 		Congratulations! You did it! You somehow were able to find the super rare trio! Chilly Pete, most impressed, calls out quickly and a Snow Berserker bounds out of nowhere ready to fight at your side [ New Companion: Snow Berserker ]
 	  	<h4>Rewards</h4>
  	  	[ + 20000 xp  ]<br />
      	[ + 100000 ".$_SESSION['currency']." ]<br />
      	[ + Snow Berserker Companion! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 20000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 100000"); 
		// $results = $link->query("UPDATE $user SET COMPsnowberserker = COMPsnowberserker + 1");
		// $results = $link->query("UPDATE $user SET quest69 = 2");
		$updates = [ // -- set changes
			'quest69' => 2,
			'xp' => $xp + 20000,
			'currency' => $currency + 100000,
			'COMPsnowberserker' => $COMPsnowberserker + 1
		];
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest69 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 69 Not Complete</strong><br>
	Quest not complete. To complete this quest you must find the super rare trio in the mountains. A Snow Ogre, Snow Ninja, and Snow Owl. </div>";
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
// else if($input=='ne' || $input=='northeast') 
// {
// 	echo 'You travel northeast<br>';
// 	$message="<i>You travel northeast</i><br>".$_SESSION['desc618'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '618'"); // -- room change
// 	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	}

// else if($input=='s' || $input=='south') 
// {			echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc608'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '608'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }



// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '608';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northeast') { $roomNum = '618';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southeast') { $roomNum = '605';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>