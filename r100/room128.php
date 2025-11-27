<?php
						$roomname = "Forest Gnome - Tree Hut";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc128'];
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

$quest14=$row['quest14']; 
$quest15=$row['quest15'];
$quest16=$row['quest16'];  

$redberry=$row['redberry'];  
$blueberry=$row['blueberry'];  

$wood=$row['wood'];  

$KLtroll=$_SESSION['KLtroll'];  
$hatchet=$row['hatchet'];   

$redpotion=$row['redpotion'];
$bluepotion=$row['bluepotion'];
$purplepotion=$row['purplepotion'];

$ironhatchet=$row['ironhatchet'];
$leather=$row['leather'];
//$currency=$row['currency'];
$trollgloves=$row['trollgloves'];






if($input=='get hatchet')  // ---- get hatchet
{
	if ( $hatchet >= 1 )
	{
	echo $message="<div class='menuAction'>You already have a hatchet. If you lose it come back here for another free one.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'>You pick up a hatchet and put it in your inventory</div>";
	include ('update_feed.php'); // --- update feed
  				// $results = $link->query("UPDATE $user SET hatchet = hatchet + 1");
	$updates = [ // -- set changes
        'hatchet' => 1
    ];
    updateStats($link, $username, $updates); // -- apply changes
	
	}
}


// ---------------------- START ALL QUESTS ---------------------- //
  if($input=='start quests') {
	 if ($quest14 <1 || $quest15 <1 || $quest16 <1) {	
	/*
		echo $message = "<div class='menuAction'>
		<p class='gold'>You start The Tree Gnome's Quests! (14 - 16)</p>
		<p>Check your Quests tab to review what needs to be done.</p>
		<a href='' data-link='quests' class='btn goldBG'>Open Quests</a>
		</div> ";	
		*/	

		echo $message = '<div class="fbox">
		<h3 class="padd forest">You start Tree Gnome\'s Quests!</h3>
		<span class="icon forest">'.file_get_contents("img/svg/npc/npc-forestgnome.svg").'</span>
		<p class="padd"><i>"Welcome to my tree hut. Pretty nice right?"</i></p>
		<a href data-link="quests" class="btn goldBG">Open Quests </a>
		</div>';


		include ('update_feed.php'); // --- update feed
   					// $results = $link->query("UPDATE $user SET quest14 = 1");
   					// $results = $link->query("UPDATE $user SET quest15 = 1");
   					// $results = $link->query("UPDATE $user SET quest16 = 1");
		   $updates = [ // -- set changes
            'quest14' => 1,
            'quest15' => 1,
            'quest16' => 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
	  	}
}

// ---------------------- QUEST 14) Gnome Needs Berries	 ---------------------- //
if($input=='info 14') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 14 Info</strong><br>
		You need 20 redberries and 20 blueberries. You can pick up berries from bushes found scattered around the forest. They are also dropped by many enemies and sold at some shops.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 14') 
{	if ($quest14 == 1 && ($redberry >= 20 && $blueberry >= 20))
	{	$r = rand (1,3);
			if ($r == 1 ) {$p1 = "[ +1 Red Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
			updateStats($link, $username,['redpotion' => $redpotion + 1 ]); // -- update stat 
			}
			if ($r == 2 ) {$p1 = "[ +1 Blue Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1");
			updateStats($link, $username,['bluepotion' => $bluepotion + 1 ]); // -- update stat
			}
			if ($r == 3 ) {$p1 = "[ +1 Purple Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1");
			updateStats($link, $username,['purplepotion' => $purplepotion + 1 ]); // -- update stat
			}
		$r = rand (1,3);
			if ($r == 1 ) {$p2 = "[ +1 Red Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
			updateStats($link, $username,['redpotion' => $redpotion + 1 ]); // -- update stat 
			}
			if ($r == 2 ) {$p2 = "[ +1 Blue Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1");
			updateStats($link, $username,['bluepotion' => $bluepotion + 1 ]); // -- update stat
			}
			if ($r == 3 ) {$p2 = "[ +1 Purple Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1");
			updateStats($link, $username,['purplepotion' => $purplepotion + 1 ]); // -- update stat
			}
		$r = rand (1,3);
			if ($r == 1 ) {$p3 = "[ +1 Red Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
			updateStats($link, $username,['redpotion' => $redpotion + 1 ]); // -- update stat 
			}
			if ($r == 2 ) {$p3 = "[ +1 Blue Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1");
			updateStats($link, $username,['bluepotion' => $bluepotion + 1 ]); // -- update stat
			}
			if ($r == 3 ) {$p3 = "[ +1 Purple Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1");
			updateStats($link, $username,['purplepotion' => $purplepotion + 1 ]); // -- update stat
			}
		$r = rand (1,3);
			if ($r == 1 ) {$p4 = "[ +1 Red Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
			updateStats($link, $username,['redpotion' => $redpotion + 1 ]); // -- update stat 
			}
			if ($r == 2 ) {$p4 = "[ +1 Blue Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1");
			updateStats($link, $username,['bluepotion' => $bluepotion + 1 ]); // -- update stat
			}
			if ($r == 3 ) {$p4 = "[ +1 Purple Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1");
			updateStats($link, $username,['purplepotion' => $purplepotion + 1 ]); // -- update stat
			}
		$r = rand (1,3);
			if ($r == 1 ) {$p5 = "[ +1 Red Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
			updateStats($link, $username,['redpotion' => $redpotion + 1 ]); // -- update stat 
			}
			if ($r == 2 ) {$p5 = "[ +1 Blue Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1");
			updateStats($link, $username,['bluepotion' => $bluepotion + 1 ]); // -- update stat
			}
			if ($r == 3 ) {$p5 = "[ +1 Purple Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1");
			updateStats($link, $username,['purplepotion' => $purplepotion + 1 ]); // -- update stat
			}
		$r = rand (1,3);
			if ($r == 1 ) {$p6 = "[ +1 Red Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
			updateStats($link, $username,['redpotion' => $redpotion + 1 ]); // -- update stat 
			}
			if ($r == 2 ) {$p6 = "[ +1 Blue Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1");
			updateStats($link, $username,['bluepotion' => $bluepotion + 1 ]); // -- update stat
			}
			if ($r == 3 ) {$p6 = "[ +1 Purple Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1");
			updateStats($link, $username,['purplepotion' => $purplepotion + 1 ]); // -- update stat
			}
		$r = rand (1,3);
			if ($r == 1 ) {$p7 = "[ +1 Red Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
			updateStats($link, $username,['redpotion' => $redpotion + 1 ]); // -- update stat 
			}
			if ($r == 2 ) {$p7 = "[ +1 Blue Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1");
			updateStats($link, $username,['bluepotion' => $bluepotion + 1 ]); // -- update stat
			}
			if ($r == 3 ) {$p7 = "[ +1 Purple Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1");
			updateStats($link, $username,['purplepotion' => $purplepotion + 1 ]); // -- update stat
			}					
		$r = rand (1,3);
			if ($r == 1 ) {$p8 = "[ +1 Red Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
			updateStats($link, $username,['redpotion' => $redpotion + 1 ]); // -- update stat 
			}
			if ($r == 2 ) {$p8 = "[ +1 Blue Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1");
			updateStats($link, $username,['bluepotion' => $bluepotion + 1 ]); // -- update stat
			}
			if ($r == 3 ) {$p8 = "[ +1 Purple Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1");
			updateStats($link, $username,['purplepotion' => $purplepotion + 1 ]); // -- update stat
			}
		$r = rand (1,3);
			if ($r == 1 ) {$p9 = "[ +1 Red Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
			updateStats($link, $username,['redpotion' => $redpotion + 1 ]); // -- update stat 
			}
			if ($r == 2 ) {$p9 = "[ +1 Blue Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1");
			updateStats($link, $username,['bluepotion' => $bluepotion + 1 ]); // -- update stat
			}
			if ($r == 3 ) {$p9 = "[ +1 Purple Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1");
			updateStats($link, $username,['purplepotion' => $purplepotion + 1 ]); // -- update stat
			}	
		$r = rand (1,3);
			if ($r == 1 ) {$p10 = "[ +1 Red Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
			updateStats($link, $username,['redpotion' => $redpotion + 1 ]); // -- update stat 
			}
			if ($r == 2 ) {$p10 = "[ +1 Blue Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1");
			updateStats($link, $username,['bluepotion' => $bluepotion + 1 ]); // -- update stat
			}
			if ($r == 3 ) {$p10 = "[ +1 Purple Potion ]<br />" ;
			// $results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1");
			updateStats($link, $username,['purplepotion' => $purplepotion + 1 ]); // -- update stat
			}
		echo $message="<div class='questWin'>
		<h3>Quest 14 Completed!</h3>
		<h4>Gnome Needs Berries</h4>
		Congratulations! You hand the Forest Gnome 20 redberries and 20 blueberries. He thanks you for your hard work, immediately smashes the berries together and hands you 10 random potions.
	  	<h4>Rewards</h4>
  	  	[ + 300 xp  ]<br />
      	[ + 300 ".$_SESSION['currency']." ]<br />
		$p1$p2$p3$p4$p5$p6$p7$p8$p9$p10
		</div>";	
		include ('update_feed.php'); // --- update feed
	//     $results = $link->query("UPDATE $user SET currency = currency + 300"); 
	// 	$results = $link->query("UPDATE $user SET xp = xp + 300"); 
	// 	$results = $link->query("UPDATE $user SET quest14 = 2");
	// $results = $link->query("UPDATE $user SET redberry = redberry - 20"); 
	// $results = $link->query("UPDATE $user SET blueberry = blueberry - 20"); 
	$updates = [ // -- set changes
        'quest14' => 2,
        'xp' => $xp + 300,
        'currency' => $currency + 300,
		'redberry' => $redberry - 20,
		'blueberry' => $blueberry - 20
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest14 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 14 Not Complete</strong><br>
		To complete this quest you need to return with 20 redberries and 20 blueberries. You can pick them from bushes found scattered around the Forest. You can also get them from enemy drops.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

// ---------------------- QUEST 15) New Tree Hut Door ---------------------- //
if($input=='info 15') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 15 Info</strong><br>
		You can chop down wood from trees in this forest using your hatchet. Return here once you have accumulated 20 pieces.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 15') 
{	if ($quest15 == 1 && $wood >= 20)
	{	echo $message="<div class='questWin'>
		<h3>Quest 15 Completed!</h3>
		<h4>New Tree Hut Door</h4>
		Congratulations! You hand 20 wood over to the Tree Gnome. He can now build a new door. He rewards you with some leather and an iron hatchet! This hatchet is stronger than your current one and you can now chop down trees more efficiently! 
	  	<h4>Rewards</h4>
  	  	[ + 300 xp  ]<br />
      	[ + 300 ".$_SESSION['currency']." ]<br />
      	[ + 5 Leather ]<br />
      	[ + Iron Hatchet ]</div>";	
		include ('update_feed.php'); // --- update feed
	    // $results = $link->query("UPDATE $user SET currency = currency + 300"); 
		// $results = $link->query("UPDATE $user SET xp = xp + 300"); 
		// $results = $link->query("UPDATE $user SET ironhatchet = ironhatchet + 1"); 
		// $results = $link->query("UPDATE $user SET leather = leather + 5"); 
		// $results = $link->query("UPDATE $user SET quest15 = 2");
		// $results = $link->query("UPDATE $user SET wood = wood-20");
		$updates = [ // -- set changes
			'quest15' => 2,
			'xp' => $xp + 300,
			'currency' => $currency + 300,
			'ironhatchet' => $ironhatchet + 1,
			'leather' => $leather + 5,
			'wood' => $wood - 20
		]; 
		updateStats($link, $username, $updates); // -- apply changes
		
	} 
	else if ($quest15 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 15 Not Complete</strong><br>
	To complete this quest you need to return here with 20 wood. Chop some down in this forest using your hatchet.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

// ---------------------- QUEST 16) Troll Base Camp ---------------------- //
if($input=='info 16') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 16 Info</strong><br>
		You can find Trolls guarding the gate found all the way to the north of this forest. Go defeat 3 of them.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 16') 
{	if ($quest16 == 1 && $KLtroll >= 3)
	{	echo $message="<div class='questWin'>
		<h3>Quest 16 Completed!</h3>
		<h4>Troll Base Camp</h4>
		Congratulations! You have defeated 3 Trolls! The Gnome hands you a fresh pair of Troll Gloves as a reward!
	  	<h4>Rewards</h4>
  	  	[ + 600 xp  ]<br />
      	[ + 300 ".$_SESSION['currency']." ]<br />
      	[ + Troll Gloves ]
		</div>";	
		include ('update_feed.php'); // --- update feed
	    // $results = $link->query("UPDATE $user SET currency = currency + 300"); 
		// $results = $link->query("UPDATE $user SET xp = xp + 600"); 
		// $results = $link->query("UPDATE $user SET trollgloves = trollgloves + 1"); 
		// $results = $link->query("UPDATE $user SET quest16 = 2");
		$updates = [ // -- set changes
			'quest16' => 2,
			'xp' => $xp + 600,
			'currency' => $currency + 300,
			'trollgloves' => $trollgloves + 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest16 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 16 Not Complete</strong><br>
		To complete this quest you need to slay 3 Trolls. The guard the entrance to the Dark Forest. Go north of here to find them.</div>";
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
// else if($input=='e' || $input=='east') 
// {	echo 'You travel east<br>';
//    $message="<i>You travel east</i><br>".$_SESSION['desc127'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 127"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='se' || $input=='southeast') 
// {	echo 'You travel southeast<br>';
//    $message="<i>You travel southeast</i><br>".$_SESSION['desc126'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 126"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='ne' || $input=='northeast') 
// {	echo 'You travel northeast<br>';
//    $message="<i>You travel northeast</i><br>".$_SESSION['desc132'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 132"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '127';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'northeast') { $roomNum = '132';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'southeast') { $roomNum = '126';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
