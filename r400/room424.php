<?php
						$roomname = "Crocodile Island - Jungle Jim";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc424'];
//$dangerLVL = $_SESSION['dangerLVL'] = "30"; // danger level

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


$quest44=$row['quest44']; 
$quest45=$row['quest45']; 
$quest46=$row['quest46']; 

$flower=$row['flower']; 

$KLhawk=$_SESSION['KLhawk']; 
$KLalbatross=$_SESSION['KLalbatross']; 
$KLfalcon=$_SESSION['KLfalcon']; 

$irondagger = $row['irondagger'];
$ironsword = $row['ironsword'];
$ironstaff = $row['ironstaff'];

$ironmaul = $row['ironmaul'];
$iron2hsword = $row['iron2hsword'];
$ironbattlestaff = $row['ironbattlestaff'];
$ironnunchaku = $row['ironnunchaku'];

$ironboomerang = $row['ironboomerang'];
$ironchakram = $row['ironchakram'];
$ironbow = $row['ironbow'];
$ironcrossbow = $row['ironcrossbow'];

$ironshield = $row['ironshield'];
$ironkiteshield = $row['ironkiteshield'];

$ironhelmet=$row['ironhelmet']; 
$ironhood=$row['ironhood']; 

$ironarmor=$row['ironarmor']; 
$ironcape=$row['ironcape']; 

$irongauntlets=$row['irongauntlets']; 
$irongloves=$row['irongloves']; 

$ironboots=$row['ironboots']; 


$equipR=$row['equipR']; 
$equipL=$row['equipL']; 
$equipHead=$row['equipHead']; 
$equipBody=$row['equipBody']; 
$equipHands=$row['equipHands']; 
$equipFeet=$row['equipFeet']; 


$jimbo=$row['jimbo'];
$jimbow=$row['jimbow'];


if($input=='grab colors')  // ---- GRAB COLOR PACK
{
    if ($row['reds'] >=5 && $row['greens'] >=5 && $row['blues'] >=5 && $row['yellows'] >=5 )
	{
	echo $message="<div class='menuAction'>You already have some colors! Come back if you run low.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'>You grab a pack of colors [+5 reds, greens, blues, yellows ]</div>";
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET reds = 5");
	// $results = $link->query("UPDATE $user SET greens = 5");
	// $results = $link->query("UPDATE $user SET blues = 5");
	// $results = $link->query("UPDATE $user SET yellows = 5");
	updateStats($link, $username,['reds' => 5, 'greens' => 5, 'blues' => 5, 'yellows' => 5]); // -- update stats

	}
}


// -------------------------------------------------------------------------------------------------------------- BATTLE VARIABLES		
 	
$infight = $row['infight'];
$endfight = $row['endfight'];
	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,15); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE - 1/15
if(($rand == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Crocodile'");
	updateStats($link, $username,['enemy' => 'Crocodile' ]); // -- set enemy
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	
// -------------------------------------------------------------------------- END BATTLE BLOCK
// -------------------------------------------------------------------------- END BATTLE BLOCK
// -------------------------------------------------------------------------- END BATTLE BLOCK






// ---------------------- START ALL QUESTS ---------------------- //
if($input=='start quests') {
	 if ($quest44 <1 || $quest45 <1 || $quest46 <1) {	
		/*
		echo $message = "<div class='menuAction'>
		<p class='gold'>You start Jungle Jim's Quests! (44 - 46)</p>
		<p>Check your Quests tab to review what needs to be done.</p>
		<a href='' data-link='quests' class='btn goldBG'>Open Quests</a>
		</div> ";	
		*/	

		echo $message = '<div class="fbox">
		<h3 class="padd ocean">You start Jungle Jim\'s Quests!</h3>
		<span class="icon ocean">'.file_get_contents("img/svg/npc/npc-surfer.svg").'</span>
		<p class="padd"><i>"Bro! Nothing beats the waves here at Crocodile Island."</i></p>
		<a href data-link="quests" class="btn goldBG">Open Quests </a>
		</div>';
		include ('update_feed.php'); // --- update feed
   		// $results = $link->query("UPDATE $user SET quest44 = 1");
   		// $results = $link->query("UPDATE $user SET quest45 = 1");
   		// $results = $link->query("UPDATE $user SET quest46 = 1");
		// updateStats($link, $username,['quest44' => 1, 'quest45' => 1, 'quest46' => 1]); // -- update stats
		$updates = [ // -- set changes
			'quest44' => 1,
			'quest45' => 1,
			'quest46' => 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	  	}
}






// ---------------------- QUEST 44) Third Times a Charm ---------------------- //
if($input=='info 44') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 44 Info</strong><br>
		You need to pick a third flower found in a secret area under the Ocean. To access the area you first need to flip the underwater switch. REMEMBER, collect the first 2 flowers before you attempt to get the 3rd. They can be found in the Grassy Field and the Red Town Gardens.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 44')
{	if ($flower >= 3)
	{	echo $message="<div class='questWin'>
		<h3>Quest 44 Completed!</h3>
		<h4>Third Times a Charm</h4>
		Congratulations! You have collected 3 flowers! Jungle Jim hands you a vicious Jim Bo & Jim Bow, each laced with toxic poison!
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 500 ".$_SESSION['currency']." ]<br />
      	[ + Jim Bo! ]<br />
      	[ + Jim Bow! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 500"); 
		// $results = $link->query("UPDATE $user SET jimbo = jimbo + 1");
		// $results = $link->query("UPDATE $user SET jimbow = jimbow + 1");
		// $results = $link->query("UPDATE $user SET flower = flower - 3");
		// $results = $link->query("UPDATE $user SET quest44 = 2");
		$updates = [ // -- set changes
			'quest44' => 2,
			'xp' => $xp + 1000,
			'currency' => $currency + 500,
			'jimbo' => $jimbo + 1,
			'jimbow' => $jimbow + 1,
			'flower' => $flower - 3
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest44 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 44 Not Complete</strong><br>
	Quest not complete. To complete this quest you need to collect 3 flowers. Find the first one at the Grassy Field and the second at the Babylon Gardens. Then venture under the ocean to get the third.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

// ---------------------- QUEST 45) Angry Birds ---------------------- //
if($input=='info 45') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 45 Info</strong><br>
		Jungle Jim is afraid of birds, especially angry ones. Hunt down a Hawk, Albatross and a Falcon in the Forest, Ocean and Dark Forest.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 45') 
{	if ( $KLhawk >=1 && $KLalbatross >=1 && $KLfalcon >=1 )
	{	echo $message="<div class='questWin'>
		<h3>Quest 45 Completed!</h3>
		<h4>Angry Birds</h4>
 		Congratulations! You have indeed hunted down the angry birds! Jim hands you a really Sharp Katana and a really Heavy Katana. 
 	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 500 ".$_SESSION['currency']." ]<br />
      	[ + Sharp Katana! ]<br />
      	[ + Heavy Katana! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 500"); 
		// $results = $link->query("UPDATE $user SET sharpkatana = sharpkatana + 1");
		// $results = $link->query("UPDATE $user SET heavykatana = heavykatana + 1");
		// $results = $link->query("UPDATE $user SET quest45 = 2");
		$updates = [ // -- set changes
			'quest45' => 2,
			'xp' => $xp + 1000,
			'currency' => $currency + 500,
			'sharpkatana' => $sharpkatana + 1,
			'heavykatana' => $heavykatana + 1
		];
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest45 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 45 Not Complete</strong><br>
	To complete this quest you need to find these angry birds. Hunt down a Hawk, Albatross and a Falcon. You can find them in the Forest, Ocean and Dark Forest.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}


// ---------------------- QUEST 46) Iron Warrior ---------------------- //
if($input=='info 46') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 46 Info</strong><br>
		Impress Jungle Jim in a full set of Iron Armor. Collect, buy or craft the armor and return here with a full set of iron equipment.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 46') 
{	/*if ( 

 		(( ($equipR == 'iron boomerang' || $equipR == 'iron chakram' || $equipR == 'iron dagger' || $equipR == 'iron sword' || $equipR == 'iron staff') 
			&& ($equipL == 'iron shield' || $equipL == 'iron kite shield' )) 
		||
		( 	$equipR == 'iron maul' || $equipR == 'iron 2h sword' || $equipR == 'iron battlestaff' || $equipR == 'iron nunchaku' ||
			$equipR == 'iron boomerang' || $equipR == 'iron chakram' || $equipR == 'iron bow' || $equipR == 'iron crossbow' )) 
		
		&& ( $equipHead == 'iron helmet' || $equipHead == 'iron hood' )
		&& ( $equipBody == 'iron armor' || $equipBody == 'iron cape' )
		&& ( $equipHands == 'iron gloves' || $equipHands == 'iron gauntlets' )
		&& ( $equipFeet == 'iron boots') 
)*/
if (
	($row['irondagger']   >= 1  || $row['ironsword']    >= 1  || $row['ironstaff']    >= 1  ||
	$row['ironmaul']   >= 1  || $row['iron2hsword']   >= 1  || $row['ironbattlestaff']   >= 1  
	|| $row['ironnunchaku']   >= 1  || $row['ironboomerang']   >= 1  || $row['ironchakram']   >= 1  
	|| $row['ironbow']   >= 1  || $row['ironcrossbow']   >= 1 )
	&& ($row['ironhelmet']   >= 1  || $row['ironhood']   >= 1 )
	&& ($row['ironarmor']   >= 1  || $row['ironcape']   >= 1 )
	&& ($row['irongloves']   >= 1  || $row['irongauntlets']   >= 1 )
	&& ($row['ironboots']   >= 1 )
	)

	{	echo $message="<div class='questWin'>
		<h3>Quest 46 Completed!</h3>
		<h4>Iron Warrior</h4>
 		JUNGLE JIM IS IMPRESSED! You got yourself some nice iron armor. Jim hands you a pair of devastating Iron Knuckles to complete the set! 
 	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 500 ".$_SESSION['currency']." ]<br />
      	[ + Iron Knuckles! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 500"); 
		// $results = $link->query("UPDATE $user SET ironknuckles = ironknuckles + 1");
		// $results = $link->query("UPDATE $user SET quest46 = 2");
		$updates = [ // -- set changes
			'quest46' => 2,
			'xp' => $xp + 1000,
			'currency' => $currency + 500,
			'ironknuckles' => $ironknuckles + 1
		];
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest46 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 46 Not Complete</strong><br>
	To complete this quest you need to collect a full set of iron equipment.</div>";
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
else if($input=='ne' || $input=='northeast') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel northeast.<br>';
   		$message="<i>You travel northeast.</i><br>".$_SESSION['desc422'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '422'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '422' ]); // -- update stats

		}
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly northeast!<br>';
            $message="<i>You fly northeast! </i><br>".$_SESSION['desc422'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '422'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '422' ]); // -- update stats
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