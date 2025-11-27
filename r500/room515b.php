<?php
						$roomname = "Ranger Lego's Quests";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc515b'];

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


$quest58=$row['quest58']; 
$quest59=$row['quest59']; 
$quest60=$row['quest60']; 

$KLwarturtle=$_SESSION['KLwarturtle']; 

$KLwhitegargoyle=$_SESSION['KLwhitegargoyle']; 
$KLgreygargoyle=$_SESSION['KLgreygargoyle']; 
$KLgriffin=$_SESSION['KLgriffin']; 

$COMPelfranger=$row['COMPelfranger'];
$MOUNTgreengriffin=$row['MOUNTgreengriffin'];
$rangershield=$row['rangershield'];



// ---------------------- START ALL QUESTS ---------------------- //
if($input=='start quests') {
	 if ($quest58 <1 || $quest59 <1 || $quest60 <1) {	
		/*
		echo $message = "<div class='menuAction'>
		<p class='gold'>You start Ranger Lego's Quests! (58 - 60)</p>
		<p>Check your Quests tab to review what needs to be done.</p>
		<a href='' data-link='quests' class='btn goldBG'>Open Quests</a>
		</div> ";	
		*/
		echo $message = '<div class="fbox">
		<h3 class="padd forest">You start the Ranger Lego\'s Quests!</h3>
		<span class="icon forest">'.file_get_contents("img/svg/npc/npc-ranger2.svg").'</span>
		<p class="padd"><i>"Aye. I only need the help of Elite Rangers. Let\'s see what you got."</i></p>
		<a href data-link="quests" class="btn goldBG">Open Quests </a>
		</div>';	
		include ('update_feed.php'); // --- update feed
   		// $results = $link->query("UPDATE $user SET quest58 = 1");
   		// $results = $link->query("UPDATE $user SET quest59 = 1");
   		// $results = $link->query("UPDATE $user SET quest60 = 1");
		   $updates = [ // -- set changes
			'quest58' => 1,
			'quest59' => 1,
			'quest60' => 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	  	}
}


// ---------------------- QUEST 58) Stubborn War Turtle ---------------------- //
if($input=='info 58') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 58 Info</strong><br>
		That Turtle is so stubborn. Go defeat the armored war turtle in the Neverending Mine.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 58') 
{	if ( $KLwarturtle >=1 )
	{	echo $message="<div class='questWin'>
		<h3>Quest 58 Completed!</h3>
		<h4>Stubborn War Turtle</h4>
		Congratulations! You have indeed defeated a War Turtle! Lego can now join you in battle! [ + elf ranger companion! ]
		<h4>Rewards</h4>
  	  	[ + 2000 xp  ]<br />
      	[ + 5000 ".$_SESSION['currency']." ]<br />
      	[ + Elf Ranger Companion! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 2000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		// $results = $link->query("UPDATE $user SET COMPelfranger = COMPelfranger + 1");
		// $results = $link->query("UPDATE $user SET quest58 = 2");
		$updates = [ // -- set changes
			'quest58' => 2,
			'xp' => $xp + 2000,
			'currency' => $currency + 5000,
			'COMPelfranger' => $COMPelfranger + 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest58 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 58 Not Complete</strong><br>
	To complete this quest you need to defeat the War Turtle found at level 5 in the Mine. He blocks ranged attacks so put away your bow.
	</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

// ---------------------- QUEST 59) Gargoyle Hunter ---------------------- //
if($input=='info 59') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 59 Info</strong><br>
		Gargoyle’s are so cool, and evil! Go defeat a white and grey one in the Cathedral.
		</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 59') 
{	if ( $KLwhitegargoyle >=1 && $KLgreygargoyle >=1 )
	{	echo $message="<div class='questWin'>
		<h3>Quest 59 Completed!</h3>
		<h4>Gargoyle Hunter</h4>
Congratulations! You have indeed defeated a white and grey gargoyle! Lego hands you a perfectly balanced Ranger Shield!
		<h4>Rewards</h4>
  	  	[ + 3000 xp  ]<br />
      	[ + 5000 ".$_SESSION['currency']." ]<br />
      	[ + Ranger Shield! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 3000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		// $results = $link->query("UPDATE $user SET rangershield = rangershield + 1");
		// $results = $link->query("UPDATE $user SET quest59 = 2");
		$updates = [ // -- set changes
			'quest59' => 2,
			'xp' => $xp + 3000,
			'currency' => $currency + 5000,
			'rangershield' => $rangershield + 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest59 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 59 Not Complete</strong><br>
To complete this quest you need to defeat a white and grey gargoyle. Find both of them in the Cathedral in the Stone Mountain Map.
	</div>";
		include ('update_feed.php'); // --- update feed
	}  
}


// ---------------------- QUEST 60) The Griffin ---------------------- //
if($input=='info 60') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 60 Info</strong><br>
Slay the magical flying Griffin in the Neverending Mine.
		</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 60') 
{	if ( $KLgriffin >=1 )
	{	echo $message="<div class='questWin'>
		<h3>Quest 60 Completed!</h3>
		<h4>The Griffin</h4>
Congratulations! You have indeed defeated the Griffin! Lego whistles and a Green Griffin comes flying in. A new mount! [ + Green Griffin ]
		<h4>Rewards</h4>
  	  	[ + 4000 xp  ]<br />
      	[ + 5000 ".$_SESSION['currency']." ]<br />
      	[ + Green Griffin! ]</div>";	
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 4000"); 
	   	// $results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		// $results = $link->query("UPDATE $user SET MOUNTgreengriffin = MOUNTgreengriffin + 1");
		// $results = $link->query("UPDATE $user SET quest60 = 2");
		$updates = [ // -- set changes
			'quest60' => 2,
			'xp' => $xp + 4000,
			'currency' => $currency + 5000,
			'MOUNTgreengriffin' => $MOUNTgreengriffin + 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest60 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 60 Not Complete</strong><br>
To complete this quest you need to defeat the magical Griffin found at level 25 in the Neverending Mine.
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

// else if($input=='se' || $input=='southeast') 
// {			echo 'You travel southeast<br>';
//    	$message="<i>You travel southeast</i><br>".$_SESSION['desc515c'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '515c'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='s' || $input=='south') 
// {			echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc515a'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '515a'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='sw' || $input=='southwest') 
// {			echo 'You travel southwest<br>';
//    	$message="<i>You travel southwest</i><br>".$_SESSION['desc515e'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '515e'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '515a';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'southeast') { $roomNum = '515c';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'southwest') { $roomNum = '515e';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>