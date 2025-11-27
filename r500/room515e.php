<?php
						$roomname = "Ranger Shop";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc515e'];

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

$hpmax=$row['hpmax'];   
$mpmax=$row['mpmax'];   
$hp=$row['hp'];  	
$mp=$row['mp'];


$reds=$row['reds']; 
$greens=$row['greens']; 
$blues=$row['blues']; 
$yellows=$row['yellows']; 
$redbalm=$row['redbalm']; 
$bluebalm=$row['bluebalm']; 

$mithrilboomerang=$row['mithrilboomerang'];
$mithrilbow=$row['mithrilbow'];
$mithrilcrossbow=$row['mithrilcrossbow'];
$blackboomerang=$row['blackboomerang'];
$blackbow=$row['blackbow'];
$blackcrossbow=$row['blackcrossbow'];
$greenhornbow=$row['greenhornbow'];
$rangercrossbow=$row['rangercrossbow'];
$rangerhood=$row['rangerhood'];
$rangercloak=$row['rangercloak'];
$rangergloves=$row['rangergloves'];
$rangerboots=$row['rangerboots'];
$rangeramulet=$row['rangeramulet'];

$arrows=$row['arrows'];
$bolts=$row['bolts'];



// ---------------------- SKILL FLAG! ---------------------- // -- move to other room (shop)

$rangerskillFlag = $row['rangerskillFlag'];
// ---------------------- SKILL FLAG! ---------------------- //
if ($rangerskillFlag==0) {
echo  $message = "<div class='menuAction'>
You can now learn new SKILLS from the RANGER'S GUILD!!</div> ";
include ('update_feed.php'); // --- update feed
// $results = $link->query("UPDATE $user SET rangerskillFlag = 1");
updateStats($link, $username,['rangerskillFlag' => 1 ]); // -- update stat 
}


 
 if($input=='cook all meat')  // ---- Cook Meat
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
		// $results = $link->query("UPDATE $user SET rawmeat = rawmeat - $times");
		// $results = $link->query("UPDATE $user SET cookedmeat = cookedmeat + $times"); 	
		$updates = [ // -- set changes
			'rawmeat' => $rawmeat - $times,
			'cookedmeat' => $cookedmeat + $times,
		];
		updateStats($link, $username, $updates); // -- apply changes

	}
}
 


 

// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
		// $query = $link->query("UPDATE $user SET hp = $hpmax + 75 "); 
		// $query = $link->query("UPDATE $user SET mp = $mpmax + 75 "); 
		$updates = [ // -- set changes
			'hp' => $hpmax + 75,
			'mp' => $mpmax + 75
		]; 
		updateStats($link, $_SESSION['username'], $updates); // -- update  
	
		echo $message = "You rest at the Ranger's Guild! (+75 HP, +75 MP)<br>";
		include ('update_feed.php'); // --- update feed
		//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}



// ------------------------------  MASTER PACK

if($input=='grab master pack')  // ---- GRAB Master Pack
{
	if ( $arrows >= 25 )
	{
	echo $message="<div class='menuAction'>You already have more than 100 arrows!</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'>You grab a bundle of arrows! [ +100 arrows ]</div>";
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET arrows = 25");
	updateStats($link, $username,['arrows' => 100 ]); // -- update stat 

	}
			
			if ( $reds== 3 )	// ------------------------------  reds
	{ echo $message="<div class='menuAction'>You already have some reds.</div>";
	include ('update_feed.php'); // --- update feed
	} else { echo $message="<div class='menuAction'>[ +3 reds ]</div>";
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET reds = 3");
	updateStats($link, $username,['reds' => 3 ]); // -- update stat 
	}
			if ( $greens== 3 )	// ------------------------------  greens
	{ echo $message="<div class='menuAction'>You already have some greens.</div>";
	include ('update_feed_alt.php'); // --- update feed
	} else { echo $message="<div class='menuAction'>[ +3 greens ]</div>";
	include ('update_feed_alt.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET greens = 3");
	updateStats($link, $username,['greens' => 3 ]); // -- update stat
	}
			if ( $blues== 3 )	// ------------------------------  blues
	{ echo $message="<div class='menuAction'>You already have some blues.</div>";
	include ('update_feed_alt.php'); // --- update feed
	} else { echo $message="<div class='menuAction'>[ +3 blues ]</div>";
	include ('update_feed_alt.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET blues = 3");
	updateStats($link, $username,['blues' => 3 ]); // -- update stat
	}
			if ( $yellows== 3 )	// ------------------------------  yellows
	{ echo $message="<div class='menuAction'>You already have some yellows.</div>";
	include ('update_feed_alt.php'); // --- update feed
	} else { echo $message="<div class='menuAction'>[ +3 yellows ]</div>";
	include ('update_feed_alt.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET yellows = 3");
	updateStats($link, $username,['yellows' => 3 ]); // -- update stat
	}
			if ( $redbalm== 3 )	// ------------------------------  red balm
	{ echo $message="<div class='menuAction'>You already have red balms.</div>";
	include ('update_feed_alt.php'); // --- update feed
	} else { echo $message="<div class='menuAction'>[ +3 red balms ]</div>";
	include ('update_feed_alt.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET redbalm = 3");
	updateStats($link, $username,['redbalm' => 3 ]); // -- update stat
	}
			if ( $bluebalm== 3 )	// ------------------------------  blue balm
	{ echo $message="<div class='menuAction'>You already have blue balms.</div>";
	}
			if ( $bluebalm== 3 )	// ------------------------------  blue balm
	{ echo $message="<div class='menuAction'>You already have blue balms.</div>";
	include ('update_feed_alt.php'); // --- update feed
	} else { echo $message="<div class='menuAction'>[ +3 blue balms ]</div>";
	include ('update_feed_alt.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET bluebalm = 3");
	updateStats($link, $username,['bluebalm' => 3 ]); // -- update stat
	}
}
 
 


// --------------------------------------------------------------------------- RANGER SHOP - BUY FUNCTIONS
if($input=='buy mithril boomerang') 
{	$tempCOST = $_SESSION['COSTmithrilboomerang'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div>You buy a mithril boomerang for '.$tempCOST.' '.$_SESSION['currency'].'!</div>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET mithrilboomerang = mithrilboomerang + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		$updates = [ // -- set changes
			'mithrilboomerang' => $mithrilboomerang + 1,
			'currency' => $currency - $tempCOST
		];
		updateStats($link, $username, $updates); // -- apply changes
		}
}
if($input=='buy mithril bow') 
{	$tempCOST = $_SESSION['COSTmithrilbow'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div>You buy a mithril bow for '.$tempCOST.' '.$_SESSION['currency'].'!</div>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET mithrilbow = mithrilbow + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		$updates = [ // -- set changes
			'mithrilbow' => $mithrilbow + 1,
			'currency' => $currency - $tempCOST
		];
		updateStats($link, $username, $updates); // -- apply changes
		}
}
if($input=='buy mithril crossbow') 
{	$tempCOST = $_SESSION['COSTmithrilcrossbow'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div>You buy a mithril crossbow for '.$tempCOST.' '.$_SESSION['currency'].'!</div>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET mithrilcrossbow = mithrilcrossbow + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		$updates = [ // -- set changes
			'mithrilcrossbow' => $mithrilcrossbow + 1,
			'currency' => $currency - $tempCOST
		];
		updateStats($link, $username, $updates); // -- apply changes
		}
}

if($input=='buy black boomerang') 
{	$tempCOST = $_SESSION['COSTblackboomerang'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div>You buy a black boomerang for '.$tempCOST.' '.$_SESSION['currency'].'!</div>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET blackboomerang = blackboomerang + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		$updates = [ // -- set changes
			'blackboomerang' => $blackboomerang + 1,
			'currency' => $currency - $tempCOST
		];
		updateStats($link, $username, $updates); // -- apply changes
		}
}
if($input=='buy black bow') 
{	$tempCOST = $_SESSION['COSTblackbow'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div>You buy a black bow for '.$tempCOST.' '.$_SESSION['currency'].'!</div>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET blackbow = blackbow + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		$updates = [ // -- set changes
			'blackbow' => $blackbow + 1,
			'currency' => $currency - $tempCOST
		];
		updateStats($link, $username, $updates); // -- apply changes
		}
}
if($input=='buy black crossbow') 
{	$tempCOST = $_SESSION['COSTblackcrossbow'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div>You buy a black crossbow for '.$tempCOST.' '.$_SESSION['currency'].'!</div>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET blackcrossbow = blackcrossbow + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		$updates = [ // -- set changes
			'blackcrossbow' => $blackcrossbow + 1,
			'currency' => $currency - $tempCOST
		];
		updateStats($link, $username, $updates); // -- apply changes
		}
}

if($input=='buy greenhorn bow') 
{	$tempCOST = $_SESSION['COSTgreenhornbow'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div>You buy a greenhorn bow for '.$tempCOST.' '.$_SESSION['currency'].'!</div>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET greenhornbow = greenhornbow + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		$updates = [ // -- set changes
			'greenhornbow' => $greenhornbow + 1,
			'currency' => $currency - $tempCOST
		];
		updateStats($link, $username, $updates); // -- apply changes
		}
}
if($input=='buy ranger crossbow') 
{	$tempCOST = $_SESSION['COSTrangercrossbow'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div>You buy a ranger crossbow for '.$tempCOST.' '.$_SESSION['currency'].'!</div>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET rangercrossbow = rangercrossbow + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		$updates = [ // -- set changes
			'rangercrossbow' => $rangercrossbow + 1,
			'currency' => $currency - $tempCOST
		];
		updateStats($link, $username, $updates); // -- apply changes
		}
}

if($input=='buy ranger hood') 
{	$tempCOST = $_SESSION['COSTrangerhood'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div>You buy a ranger hood for '.$tempCOST.' '.$_SESSION['currency'].'!</div>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET rangerhood = rangerhood + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		$updates = [ // -- set changes
			'rangerhood' => $rangerhood + 1,
			'currency' => $currency - $tempCOST
		];
		updateStats($link, $username, $updates); // -- apply changes
		}
}
if($input=='buy ranger cloak') 
{	$tempCOST = $_SESSION['COSTrangercloak'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div>You buy a ranger cloak for '.$tempCOST.' '.$_SESSION['currency'].'!</div>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET rangercloak = rangercloak + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		$updates = [ // -- set changes
			'rangercloak' => $rangercloak + 1,
			'currency' => $currency - $tempCOST
		];
		updateStats($link, $username, $updates); // -- apply changes
		}
}
if($input=='buy ranger gloves') 
{	$tempCOST = $_SESSION['COSTrangergloves'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div>You buy a pair of ranger gloves for '.$tempCOST.' '.$_SESSION['currency'].'!</div>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET rangergloves = rangergloves + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		$updates = [ // -- set changes
			'rangergloves' => $rangergloves + 1,
			'currency' => $currency - $tempCOST
		];
		updateStats($link, $username, $updates); // -- apply changes
		}
}
if($input=='buy ranger boots') 
{	$tempCOST = $_SESSION['COSTrangerboots'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div>You buy a pair of ranger boots for '.$tempCOST.' '.$_SESSION['currency'].'!</div>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET rangerboots = rangerboots + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		$updates = [ // -- set changes
			'rangerboots' => $rangerboots + 1,
			'currency' => $currency - $tempCOST
		];
		updateStats($link, $username, $updates); // -- apply changes
		}
}
if($input=='buy ranger amulet') 
{	$tempCOST = $_SESSION['COSTrangeramulet'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div>You buy a ranger amulet for '.$tempCOST.' '.$_SESSION['currency'].'!</div>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET rangeramulet = rangeramulet + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		$updates = [ // -- set changes
			'rangeramulet' => $rangeramulet + 1,
			'currency' => $currency - $tempCOST
		];
		updateStats($link, $username, $updates); // -- apply changes
		}
}

if($input=='buy 100 arrows') 
{	if($currency<1000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div>You buy 100 arrows for 1000 '.$_SESSION['currency'].'!</div>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET arrows = arrows + 100"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 1000"); 
		$updates = [ // -- set changes
			'arrows' => $arrows + 100,
			'currency' => $currency - 1000
		];
		updateStats($link, $username, $updates); // -- apply changes
		}
}
if($input=='buy 100 bolts') 
{	if($currency<2000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div>You buy 100 bolts for 2000 '.$_SESSION['currency'].'!</div>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET bolts = bolts + 100"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 2000"); 
		$updates = [ // -- set changes
			'bolts' => $bolts + 100,
			'currency' => $currency - 2000
		];
		updateStats($link, $username, $updates); // -- apply changes
		}
}

/*
armor
30k ranger hood ( +25 dex )		// dark ranger
30k ranger cloak ( +25 dex )		// dark ranger
20k ranger gloves ( +15 dex )		// dark ranger
20k ranger boots ( +15 dex )		// dark ranger
50k ranger amulet ( +25 dex, +5 mag )	// griffin, buy

ammo 
1k arrows x100
2k bolts x100


weapons
50k mithril boomerang ( +40 dex )		// grey gargoyle
75k mithril bow ( +60 dex  )			// stone sphinx
100k mithril crossbow ( +80 dex )		// fallen angel
200k black boomerang ( +60 dex, +10 mag )   	// black bear 
250k black bow ( +120 dex, +40 mag )  		// mage ultima
300k black crossbow ( +150 dex, +50 def ) 	// lizard king
100k greenhorn bow ( +50 dex, +25 mag ) 		// guild reward
500k ranger crossbow ( +250 dex  )		// buy 

*/





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
// {			echo 'You travel northeast<br>';
//    	$message="<i>You travel northeast</i><br>".$_SESSION['desc515b'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '515b'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='e' || $input=='east') 
// {			echo 'You travel east<br>';
//    	$message="<i>You travel east</i><br>".$_SESSION['desc515a'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '515a'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='se' || $input=='southeast') 
// {			echo 'You travel southeast<br>';
//    	$message="<i>You travel southeast</i><br>".$_SESSION['desc515d'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '515d'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
else if($input=='d' || $input=='down') 
{			echo 'You exit the Ranger\'s Guild<br>';
   	$message="<i>You exit the Ranger's Guild</i><br>".$_SESSION['desc515'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '515'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			   updateStats($link, $username,['endfight' => 0, 'room' => '515' ]); // -- update stats
			   $_SESSION['emptytree'] = 0; // reset tree
}



// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '515a';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'northeast') { $roomNum = '515b';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'southeast') { $roomNum = '515d';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>