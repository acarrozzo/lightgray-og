<?php
						$roomname = "Mining Guild";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc308'];
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

$quest31=$row['quest31'];  
//$KLkraken=$_SESSION['KLkraken']; 
$KLredbeard=$_SESSION['KLredbeard']; 


$quest32=$row['quest32'];  
$KLphoenix=$_SESSION['KLphoenix']; 
$quest33=$row['quest33'];  
$KLcyclops=$_SESSION['KLcyclops']; 
$quest34=$row['quest34'];  
$KLminotaur=$_SESSION['KLminotaur']; 

$redpotion=$row['redpotion']; 
$bluepotion=$row['bluepotion']; 

$meatball=$row['meatball']; 
$bluefish=$row['bluefish']; 
$pickaxe=$row['pickaxe']; 
	

$hpmax=$row['hpmax'];   
$mpmax=$row['mpmax'];   
$hp=$row['hp'];  	
$mp=$row['mp'];

$miningskillFlag = $row['miningskillFlag'];

$ironpickaxe=$row['ironpickaxe'];
$steelpickaxe=$row['steelpickaxe'];
$mithrilpickaxe=$row['mithrilpickaxe'];
$ironhammer=$row['ironhammer'];
$steelhammer=$row['steelhammer'];
$mithrilhammer=$row['mithrilhammer'];
$crafting=$row['crafting'];
$currency=$row['currency'];

//$results = $link->query("UPDATE $user SET KLredbeard = 0");


/*
$results = $link->query("UPDATE $user SET quest31 = 0");
$results = $link->query("UPDATE $user SET quest32 = 0");
$results = $link->query("UPDATE $user SET quest33 = 0");
$results = $link->query("UPDATE $user SET quest34 = 0");
*/



// $results = $link->query("UPDATE $user SET craftingtable = '308'"); // -- set room to crafting table
// $results = $link->query("UPDATE $user SET fire = '308'"); // -- set fire to room

// -- set room to crafting table + fire
$updates = [ // -- set changes
	'craftingtable' => '210',
	'fire' => '210'
]; 
updateStats($link, $_SESSION['username'], $updates); // -- update 

// --------------------------------------------------------------------------- REST HEAL +50 HP MP
if ($input=='rest' && $quest31 <2) {
	echo $message="Join the Mining Guild to rest at the Forge<br>
	<a href data-link='quests' class='btn goldBG'>Open Quests</a>";
	include('update_feed.php'); // --- update feed
}
else if ($input=="rest"){
	// $query = $link->query("UPDATE $user SET hp = $hpmax + 50 "); 
	// $query = $link->query("UPDATE $user SET mp = $mpmax + 50 "); 
	$updates = [ // -- set changes
	'hp' => $hpmax + 50,
	'mp' => $mpmax + 50
	]; 
	updateStats($link, $_SESSION['username'], $updates); // -- update 
	echo $message = "You rest at the Guild Forge! (+50 HP, +50 MP)<br>";
	include ('update_feed.php'); // --- update feed
	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	//  updateStats($link, $username, ['endfight' => 0]); // -- update stats
}








if ($input=='grab pack' && $quest31 <2) {
	echo $message="Join the Mining Guild to get the Mining Pack<br>
	<a href data-link='quests' class='btn goldBG'>Open Quests</a>
	";
	include('update_feed.php'); // --- update feed
}
 elseif ($input=='grab pack' )  // ---- GRAB pack
{
	echo $message="<div class='menuAction'><h4 class='darkblue'>You replenish your Mining Pack</h3><br>";
	include('update_feed.php'); // --- update feed
	
	
	
	
	if ($redpotion>= 5) {	// ------------------------------  red potion
		echo $message="<p>You have ".$redpotion." red potions.</p>";
		include('update_feed_alt.php'); // --- update feed
	} else {
		echo $message="<p class='red'>You now have 5 red potions.</p>";
		include('update_feed_alt.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET redpotion = 5");
		updateStats($link, $username,['redpotion' => 5 ]); // -- update stat 
	} 
	if ($bluepotion>= 5) {	// ------------------------------  blue potion
        echo $message="<p>You have ".$bluepotion." blue potions.</p>";
        include('update_feed_alt.php'); // --- update feed
    } else {
        echo $message="<p class='blue'>You now have 5 blue potions.</p>";
        include('update_feed_alt.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET bluepotion = 5");
		updateStats($link, $username,['bluepotion' => 5 ]); // -- update stat
    } 
	if ($bluefish>= 5) {	// ------------------------------  bluefish
        echo $message="<p>You have ".$bluefish." bluefish.</p>";
        include('update_feed_alt.php'); // --- update feed
    } else {
        echo $message="<p class='blue'>You now have 5 bluefish.</p>";
        include('update_feed_alt.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET bluefish = 5");
		updateStats($link, $username,['bluefish' => 5 ]); // -- update stat
    }   
	if ($meatball>= 5) {	// ------------------------------  meatball
		echo $message="<p>You have ".$meatball." meatballs.</p>";
		include('update_feed_alt.php'); // --- update feed
	} else {
		echo $message="<p class='green'>You now have 5 meatballs.</p>";
		include('update_feed_alt.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET meatball = 5");
		updateStats($link, $username,['meatball' => 5 ]); // -- update stat
	}   

	if ($pickaxe>= 1) {	// ------------------------------  pickaxe
		echo $message="<p>You have ".$pickaxe." pickaxe.</p>";
		include('update_feed_alt.php'); // --- update feed
	} else {
		echo $message="<p class='red'>You now have 1 pickaxe.</p>";
		include('update_feed_alt.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET pickaxe = 1");
		updateStats($link, $username,['pickaxe' => 1 ]); // -- update stat
	}

	echo $message="</div>";
	include('update_feed_alt.php'); // --- update feed

}
















// ---------------------- START ALL QUESTS ---------------------- //
  if($input=='start quests' || $input=='start quest 31') {
	 if ($quest31 <1 ) {	
		/*
		echo $message = "<div class='menuAction'>
		<p class='gold'>You start the Mining Guild Initiation Quest! (31)</p>
		<p>Check your Quests tab to review what needs to be done.</p>
		<a href='' data-link='quests' class='btn goldBG'>Open Quests</a>
		</div> ";	
		 */
						
		echo $message = '<div class="fbox">
		<h3 class="padd gold">You start the Mining Guild Initiation Quest!</h3>
		<span class="icon gold">'.file_get_contents("img/svg/npc/npc-miner2.svg").'</span>
		<p class="padd"><i>"You gotta prove your worth to join the Mining Guild!"</i></p>
		<a href data-link="quests" class="btn goldBG">Open Quests </a>
		</div>';

		include ('update_feed.php'); // --- update feed
   		// $results = $link->query("UPDATE $user SET quest31 = 1");
		   $updates = [ // -- set changes
			'quest31' => 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes

	  	}
}
// ---------------------- QUEST 31) Mining Guild Access: Red Beard ---------------------- //
if($input=='info 31') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 31 Info</strong><br>
		Defeat the treacherous Captain Red Beard. Find him hiding out in the Red Fort. Defeat him to gain access to the Mining Guild and the Neverending mine.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 31') 
{	if ($KLredbeard >= 1)
	{	echo $message="<div class='questWin'>
		<h3>Quest 31 Completed!</h3>
		<h4>Mining Guild Access: Red Beard</h4>
		Splendid! You have defeated the traitor Red Beard! You can now access the Mining Guild as well as the Neverending Mine. Time to mine!
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 200 ".$_SESSION['currency']." ]<br />
      	[ + 3 Pickaxe ]<br />
      	[ + 1 Iron Pickaxe ]<br />
      	[ + Access to Guild & Mine ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 200"); 
		// $results = $link->query("UPDATE $user SET pickaxe = pickaxe + 3");
		// $results = $link->query("UPDATE $user SET ironpickaxe = ironpickaxe + 1");
		// $results = $link->query("UPDATE $user SET quest31 = 2");
		$updates = [ // -- set changes
			'quest31' => 2,
			'xp' => $xp + 1000,
			'currency' => $currency + 200,
			'pickaxe' => $pickaxe + 3,
			'ironpickaxe' => $ironpickaxe + 1
		];
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest31 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 31 Not Complete</strong><br>
	To complete this quest you need to defeat the the treacherous Captain Red Beard. Find him hiding out in the Red Fort.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

 






// ---------------------- START ALL QUESTS ---------------------- //
if($input=='start quests' && $quest31 >=2) {
	if ($quest32 <1 ) {	
	/*
	   echo $message = "<div class='menuAction'>
	   <p class='gold'>You start the Mining Guild Leaders Quests! (31)</p>
	   <p>Check your Quests tab to review what needs to be done.</p>
	   <a href='' data-link='quests' class='btn goldBG'>Open Quests</a>
	   </div> ";		
*/
	   echo $message = '<div class="fbox">
	   <h3 class="padd gold">You start the Mining Guild Initiation Quest!</h3>
	   <span class="icon gold">'.file_get_contents("img/svg/npc/npc-miner.svg").'</span>
	   <p class="padd"><i>"Defeat the bosses in the Neverending Mine!"</i></p>
	   <a href data-link="quests" class="btn goldBG">Open Quests </a>
	   </div>';


	   include ('update_feed.php'); // --- update feed
		//   $results = $link->query("UPDATE $user SET quest32 = 1");
		//   $results = $link->query("UPDATE $user SET quest33 = 1");
		//   $results = $link->query("UPDATE $user SET quest34 = 1");
		  $updates = [ // -- set changes
			'quest32' => 1,
			'quest33' => 1,
			'quest34' => 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
		 }
}
// ---------------------- QUEST 32) Iron Boss: Phoenix ---------------------- //
if($input=='info 32') { 
	   echo $message="<div class='menuAction'><strong class='green'>Quest 32 Info</strong><br>
	   Defeat the Phoenix at Mine level 10 to gain the ability to craft with Iron. Be prepared, the Phoenix is only damaged by ranged attacks.</div>";
	   include ('update_feed.php'); // --- update feed
}
else if($input=='complete 32') 
{	if ($KLphoenix >= 1)
   {	echo $message="<div class='questWin'>
	   <h3>Quest 32 Completed!</h3>
	   <h4>Iron Boss: Phoenix</h4>
	   Congratulations! You have indeed defeated the ferocious Iron Boss, the Phoenix! You can now craft with Iron!
		 <h4>Rewards</h4>
		   [ + 2000 xp  ]<br />
		 [ + 20k ".$_SESSION['currency']." ]<br />
		 [ + 3 Iron Pickaxe ]<br />
		 [ + Steel Pickaxe ]<br />
		 [ + Iron Hammer ]<br />
		 [ + Can Craft with IRON! ]</div>";	
	   include ('update_feed.php'); // --- update feed
	//    $results = $link->query("UPDATE $user SET xp = xp + 2000"); 
	// 	  $results = $link->query("UPDATE $user SET currency = currency + 20000"); 
	//    $results = $link->query("UPDATE $user SET ironpickaxe = ironpickaxe + 3");
	//    $results = $link->query("UPDATE $user SET ironhammer = ironhammer + 1");
	//    $results = $link->query("UPDATE $user SET steelpickaxe = steelpickaxe + 1");
	//    $results = $link->query("UPDATE $user SET crafting = crafting + 1");
	//    $results = $link->query("UPDATE $user SET quest32 = 2");
	$updates = [ // -- set changes
        'quest32' => 2,
        'xp' => $xp + 2000,
        'currency' => $currency + 20000,
		'ironpickaxe' => $ironpickaxe + 3,
		'ironhammer' => $ironhammer + 1,
		'steelpickaxe' => $steelpickaxe + 3,
		'crafting' => $crafting + 1
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
   } 
   else if ($quest32 == 1)
   {	echo $message="<div class='menuAction'><strong class='green'>Quest 32 Not Complete</strong><br>
   To complete this quest you need to defeat the Phoenix. Dig down the neverending mine and you will surely find what you're looking for.</div>";
	   include ('update_feed.php'); // --- update feed
   }  
}





// ---------------------- QUEST 33) Steel Boss: Cyclops ---------------------- //
if($input=='info 33') { 
	   echo $message="<div class='menuAction'><strong class='green'>Quest 33 Info</strong><br>
	   Defeat the Cyclops at Mine level 20 to gain the ability to craft with Steel. Don't worry about your DEF though, the Cyclops attacks are pure, meaning they bypass your defenses altogether!</div>";
	   include ('update_feed.php'); // --- update feed
}
else if($input=='complete 33') 
{	if ($KLcyclops >= 1)
   {	echo $message="<div class='questWin'>
	   <h3>Quest 33 Completed!</h3>
	   <h4>Steel Boss: Cyclops</h4>
	   Congratulations! You have indeed defeated the Steel Boss, the Cyclops! You can now craft with Steel!
		 <h4>Rewards</h4>
		   [ + 3000 xp  ]<br />
		 [ + 30k ".$_SESSION['currency']." ]<br />
		 [ + 3 Steel Pickaxe ]<br />
		 [ + Mithril Pickaxe ]<br />
		 [ + Steel Hammer ]<br />
		 [ + Can Craft with STEEL! ]</div>";	
	   include ('update_feed.php'); // --- update feed
	//    $results = $link->query("UPDATE $user SET xp = xp + 3000"); 
	// 	  $results = $link->query("UPDATE $user SET currency = currency + 30000"); 
	// 	  $results = $link->query("UPDATE $user SET steelpickaxe = steelpickaxe + 3");
	// 	  $results = $link->query("UPDATE $user SET mithrilpickaxe = mithrilpickaxe + 1");
	// 	  $results = $link->query("UPDATE $user SET steelhammer = steelhammer + 1");
	//    $results = $link->query("UPDATE $user SET crafting = crafting + 1");
	//    $results = $link->query("UPDATE $user SET quest33 = 2");
	$updates = [ // -- set changes
		'quest33' => 2,
		'xp' => $xp + 3000,
		'currency' => $currency + 30000,
		'steelpickaxe' => $steelpickaxe + 3,
		'mithrilpickaxe' => $mithrilpickaxe + 1,
		'steelhammer' => $steelhammer + 1,
		'crafting' => $crafting + 1
	];
	updateStats($link, $username, $updates); // -- apply changes
   } 
   else if ($quest33 == 1)
   {	echo $message="<div class='menuAction'><strong class='green'>Quest 33 Not Complete</strong><br>
   To complete this quest you need to defeat the Cyclops. Dig down the neverending mine and you will surely find what you're looking for.</div>";
	   include ('update_feed.php'); // --- update feed
   }  
}


// ---------------------- QUEST 34) Mithril Boss: Minotaur ---------------------- //
if($input=='info 34') { 
	   echo $message="<div class='menuAction'><strong class='green'>Quest 34 Info</strong><br>
	   Defeat the Minotaur at Mine level 30 to gain the ability to craft with Mithril. Prepare yourself, the Minotaur is strong and attacks with power and rage.</div>";
	   include ('update_feed.php'); // --- update feed
}
else if($input=='complete 34') 
{	if ($KLminotaur >= 1)
   {	echo $message="<div class='questWin'>
	   <h3>Quest 34 Completed!</h3>
	   <h4>Mithril Boss: Minotaur</h4>
	   Congratulations! You have indeed defeated the very mean Mithril Boss, the Minotaur! You can now craft with Mithril!
		 <h4>Rewards</h4>
		   [ + 4000 xp  ]<br />
		 [ + 40k ".$_SESSION['currency']." ]<br />
		 [ + 3 Mithril Pickaxe ]<br />
		 [ + Mithril Hammer ]<br />
		 [ + Can Craft with MITHRIL! ]</div>";	
	   include ('update_feed.php'); // --- update feed
	//    $results = $link->query("UPDATE $user SET xp = xp + 4000"); 
	// 	  $results = $link->query("UPDATE $user SET currency = currency + 40000"); 
	//    $results = $link->query("UPDATE $user SET mithrilpickaxe = mithrilpickaxe + 3");
	//    $results = $link->query("UPDATE $user SET mithrilhammer = mithrilhammer + 1");
	//    $results = $link->query("UPDATE $user SET crafting = crafting + 1");
	//    $results = $link->query("UPDATE $user SET quest34 = 2");
	$updates = [ // -- set changes
		'quest34' => 2,
		'xp' => $xp + 4000,
		'currency' => $currency + 40000,
		'mithrilpickaxe' => $mithrilpickaxe + 3,
		'mithrilhammer' => $mithrilhammer + 1,
		'crafting' => $crafting + 1
	];
	updateStats($link, $username, $updates); // -- apply changes
   } 
   else if ($quest34 == 1)
   {	echo $message="<div class='menuAction'><strong class='green'>Quest 34 Not Complete</strong><br>
   To complete this quest you need to defeat the Minotaur. Dig down the neverending mine and you will surely find what you're looking for.</div>";
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
// {			echo 'You travel northwest<br>';
//    	$message="<i>You travel northwest</i><br>".$_SESSION['desc310'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 310"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='n' || $input=='north') 
// {			echo 'You travel north<br>';
//    	$message="<i>You travel north</i><br>".$_SESSION['desc311'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 311"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

// else if($input=='w' || $input=='west') 
// {			echo 'You travel west<br>';
//    	$message="<i>You travel west</i><br>".$_SESSION['desc307'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 307"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats 
// }

else if($input=='d' || $input=='down')  
{			
if ($quest31 >=2 ) {
		echo 'You travel down into the Mining Guild<br>';
		$message="<i>You travel down into the Mining Guild</i><br>".$_SESSION['desc308b'];
		include ('update_feed.php'); // --- update feed
		//    $results = $link->query("UPDATE $user SET room = '308b'"); // -- room change
		$updates = ['endfight' => 0, 'room' => '308b' ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
	}
	else {
		echo $message = "You can't enter yet! You need to defeat Red Beard to become a member of the Mining Guild!<br>";
		include ('update_feed.php'); // --- update feed
	}
}
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '311';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'west') {     $roomNum = '307';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northwest') { $roomNum = '310';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>