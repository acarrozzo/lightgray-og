<?php
						$roomname = "Blue Oasis - Friendly Pirate";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc413'];
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

$equipMount = $row['equipMount'];

$teleport6 = $row['teleport6'];


$quest41=$row['quest41']; 
$quest42=$row['quest42']; 
$quest43=$row['quest43']; 

$calamaricap=$row['calamaricap'];
$mudboots=$row['mudboots'];
$goldkey=$row['goldkey'];
$greenshield=$row['greenshield'];
$gillspotion=$row['gillspotion'];


//$KLsquid=$_SESSION['KLsquid']; 
//$KLmudcrab=$_SESSION['KLmudcrab']; 

//$KLjellyfish = $_SESSION['KLjellyfish'];
//$KLelectriceel = $_SESSION['KLelectriceel'];
//$KLpiranha = $_SESSION['KLpiranha'];
//$KLbarracuda = $_SESSION['KLbarracuda'];
//$KLcrocodile = $_SESSION['KLcrocodile'];

// -------------------------------------------------------------------------- Activate Teleport
if ($teleport6 == 0) { 	
	// $results = $link->query("UPDATE $user SET teleport6 = 1");
	updateStats($link, $username,['teleport6' => 1 ]); // -- update stat 
	echo $message="<i>You can now teleport to the Blue Ocean Oasis! Click 'blue ocean' in the teleport menu to teleport to this location at any time. </i><br>";
	include ('update_feed.php'); // --- update feed	  
	}	
	
if($input=='pick redberry' ||$input=='pick 20 redberry' || $input=='pick berry')  // ---- PICK REDBERRY
{
    $check=$row['redberry'];
	if ( $check >= 20 )
	{
	echo $message="<div class='menuAction'>You already have more than 20 redberries! Come back if you run low.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'>You pick up 20 redberries!</div>";
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET redberry = 20");
	updateStats($link, $username,['redberry' => 20 ]); // -- update stat 

	}
}

if($input=='pick blueberry' ||$input=='pick 20 blueberry' || $input=='pick berry')  // ---- PICK blueBERRY
{
    $check=$row['blueberry'];
	if ( $check >= 20 )
	{
	echo $message="<div class='menuAction'>You already have more than 20 blueberries! Come back if you run out.</div>";	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'>You pick up 20 blueberries!</div>";
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET blueberry = 20");
	updateStats($link, $username,['blueberry' => 20 ]); // -- update stat 
	}
}
// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
		// $query = $link->query("UPDATE $user SET hp = $hpmax + 50 "); 
		// $query = $link->query("UPDATE $user SET mp = $mpmax + 50 "); 
		updateStats($link, $username,['hp' => $hpmax + 50, 'mp' => $mpmax + 50 ]); // -- update stat
	
		echo $message = "You rest at the Blue Oasis! (+50 HP, +50 MP)<br>";
		include ('update_feed.php'); // --- update feed
		//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
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

if ($quest41 == 2 && $quest42 == 2 && $quest43 == 2) {	
	}
	// ---------------------- START ALL QUESTS ---------------------- //
  if($input=='start quests' || $input=='start quests') {
	 if ($quest41 <1 || $quest42 <1 || $quest43 <1) {	
		
		/*echo $message = "<div class='menuAction'>
		<p class='gold'>You start the Friendly Pirate's Quests! (41 - 43)</p>
		<p>Check your Quests tab to review what needs to be done.</p>
		<a href='' data-link='quests' class='btn goldBG'>Open Quests</a>
		</div> ";
		*/	
		
		echo $message = '<div class="fbox">
		<h3 class="padd ocean">You start the Friendly Pirate\'s Quests!</h3>
		<span class="icon ocean">'.file_get_contents("img/svg/npc/npc-pirate.svg").'</span>
		<p class="padd"><i>"Aloha Matey! Welcome to my beautiful Oasis!"</i></p>
		<a href data-link="quests" class="btn goldBG">Open Quests </a>
		</div>';

		include ('update_feed.php'); // --- update feed
   		// $results = $link->query("UPDATE $user SET quest41 = 1");
   		// $results = $link->query("UPDATE $user SET quest42 = 1");
   		// $results = $link->query("UPDATE $user SET quest43 = 1");
		$updates = [ // -- set changes
			'quest41' => 1,
			'quest42' => 1,
			'quest43' => 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	  	}
}
			
// ---------------------- QUEST 41) Like a Squid ---------------------- //
if($input=='info 41') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 41 Info</strong><br>
		You can find Squid both on and below the ocean. Hunt down 3 of them.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 41') 
{	if ($quest41 == 1 && $_SESSION['KLsquid']>=3)
	{	echo $message="<div class='questWin'>
		<h3>Quest 41 Completed!</h3>
		<h4>Like a Squid</h4>
		Congratulations! You have indeed defeated 3 Squid! The Pirate smiles and while humming 'Like a Squid', hands you a perfectly balanced Calamari Cap! 
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 500 ".$_SESSION['currency']." ]<br />
      	[ + Calamari Cap! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 500"); 
		// $results = $link->query("UPDATE $user SET calamaricap = calamaricap + 1");
		// $results = $link->query("UPDATE $user SET quest41 = 2");
		$updates = [ // -- set changes
			'quest41' => 2,
			'xp' => $xp + 1000,
			'currency' => $currency + 500,
			'calamaricap' => $calamaricap + 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest41 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 41 Not Complete</strong><br>
		To complete this quest you need to hunt down 3 Squid.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

// ---------------------- QUEST 42) Mud Crab Population Control ---------------------- //
if($input=='info 42') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 42 Info</strong><br>
		Mud island can be found to the southeast of here. Go there and eliminate 20 Mud Crabs.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 42') 
{	if ($quest42 == 1 && $_SESSION['KLmudcrab']>=20)
	{	echo $message="<div class='questWin'>
		<h3>Quest 42 Completed!</h3>
		<h4>Mud Crab Population Control</h4>
		NICE! You have indeed exterminated 20 Mud Crabs! The Pirate rummages through his bag of loot and hands you a surprisingly strong pair of Mud Boots! 
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 500 ".$_SESSION['currency']." ]<br />
      	[ + Mud Boots! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 500"); 
		// $results = $link->query("UPDATE $user SET mudboots = mudboots + 1");
		// $results = $link->query("UPDATE $user SET quest42 = 2");
		$updates = [ // -- set changes
			'quest42' => 2,
			'xp' => $xp + 1000,
			'currency' => $currency + 500,
			'mudboots' => $mudboots + 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest42 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 42 Not Complete</strong><br>
		To complete this quest you need to exterminate 20 Mud Crabs. Go find Mud Island. </div>";
		include ('update_feed.php'); // --- update feed
	}  
}



// ---------------------- QUEST 43) Ocean Hunter Pro ---------------------- //
if($input=='info 43') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 43 Info</strong><br>
		Become a Pro Ocean Hunter. Defeat a Jellyfish, Electric Eel, Piranha, Barracuda & Crocodile. Find all the fish anywhere on the Ocean and find the Crocodile near Crocodile Island. Keep hunting until you find em all.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 43') 
{	if ($quest43 == 1 && ($_SESSION['KLjellyfish'] >= 1 && $_SESSION['KLelectriceel'] >= 1 && $_SESSION['KLpiranha'] >= 1 && $_SESSION['KLbarracuda'] >= 1 && $_SESSION['KLcrocodile'] >= 1 ))
	{	echo $message="<div class='questWin'>
		<h4>Ocean Hunter Pro</h4>
		Awesome! You have indeed exterminated a Jellyfish, Electric Eel, Piranha, Barracuda & Crocodile! The Pirate reaches into his front pocket and hands you a shiny Gold Key! You're pretty sure a Gold Chest can be found somewhere under the ocean.  
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 500 ".$_SESSION['currency']." ]<br />
      	[ + 5 Gills Potions ]<br />
      	[ + Green Shield ]<br />
      	[ + Gold Key! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 500"); 
		// $results = $link->query("UPDATE $user SET goldkey = goldkey + 1");
		// $results = $link->query("UPDATE $user SET greenshield = greenshield + 1");
		// $results = $link->query("UPDATE $user SET gillspotion = gillspotion + 5");
		// $results = $link->query("UPDATE $user SET quest43 = 2");
		$updates = [ // -- set changes
			'quest43' => 2,
			'xp' => $xp + 1000,
			'currency' => $currency + 500,
			'gillspotion' => $gillspotion + 5,
			'greenshield' => $greenshield + 1,
			'goldkey' => $goldkey + 1
		];
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest43 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 43 Not Complete</strong><br>
		To complete this quest you need to defeat a Jellyfish, Electric Eel, Piranha, Barracuda & Crocodile. They can all be found on the Ocean.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

	











// -------------------------------------------------------------------------- TRAVEL
else if($input=='w' || $input=='west') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel west.<br>';
   		$message="<i>You travel west.</i><br>".$_SESSION['desc420'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '420'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '420' ]); // -- update stats

		}
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly west!<br>';
            $message="<i>You fly west! </i><br>".$_SESSION['desc420'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '420'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '420' ]); // -- update stats
        } 
		   else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='se' || $input=='southeast') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel southeast.<br>';
   		$message="<i>You travel southeast.</i><br>".$_SESSION['desc406'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '406'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '406' ]); // -- update stats

		}
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly southeast!<br>';
            $message="<i>You fly southeast! </i><br>".$_SESSION['desc406'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '406'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '406' ]); // -- update stats
        } 
		   else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='e' || $input=='east') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel east.<br>';
   		$message="<i>You travel east.</i><br>".$_SESSION['desc407'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '407'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '407' ]); // -- update stats

		}
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly east!<br>';
            $message="<i>You fly east! </i><br>".$_SESSION['desc407'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '407'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '407' ]); // -- update stats
        } 
		   else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}






// ----------------------------------- end of room function
include('function-end.php');
// }
?>