<?php
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


$level = $row['level'];
$room = $row['room'];
$cp = $row['cp'];
$sp = $row['sp'];
// $physicaltraining = $row['physicaltraining'];
// $mentaltraining = $row['mentaltraining'];
$evolve = $row['evolve'];

$currency = $row['currency'];
$toopoor = $_SESSION['toopoor'];

$dailychestcount = $row['dailychestcount'];

// --------------------------------------------------------------------------- EVOLVE!
if (($input == 'evolve' && $_SESSION['evolveAlready'] == 0 && $currency >= 10000 && ($room == '425')) || ($input == 'cheat evolve'))
	{	
		$cp = $level; 
		//$sp = $level * 25;
		$sp = (($level- 20) * 20) + 209; // 209 is all the SP you get up till level 20 (2 + 3 + 4 + 5 ... etc)
		$sp = $sp += ($dailychestcount *5); // 5 sp for each daily chest
		$evolve = $evolve + 1;
 
		echo $message = '	<div class="levelWin blackBG">
				<span class="h3 white">YOU EVOLVE!</span><br>
				<span class="white">You are now evolve level '.$evolve.'</span><br>
			<span class="yellow">-10,000 '.$_SESSION['currency'].'</span></span><br>
			<span class="cyan">ZERO OUT STATS...</span><br>
			<span class="cyan">ZERO OUT SKILLS...</span><br>
			<span class="cyan">ZERO OUT SPELLS...</span><br>
			<span class="blue">+ '.$sp.' SP!</span></span><br>
			<span class="gold">+ '.$cp.' CP!</span></span><br>
</div>';
		include ('update_feed.php'); // --- update feed

// $results = $link->query("UPDATE $user SET cp = $cp"); 
// $results = $link->query("UPDATE $user SET sp = $sp"); 
// $results = $link->query("UPDATE $user SET currency = currency - 10000"); 
// $results = $link->query("UPDATE $user SET evolve = evolve + 1"); 
// $_SESSION['evolveAlready'] = 1;
// // --------------------------------------------------------------------------- ZERO STATS!
// $results = $link->query("UPDATE $user SET str = 0"); 
// $results = $link->query("UPDATE $user SET dex = 0"); 
// $results = $link->query("UPDATE $user SET mag = 0"); 
// $results = $link->query("UPDATE $user SET def = 0"); 
// $results = $link->query("UPDATE $user SET strmod = 0"); 
// $results = $link->query("UPDATE $user SET dexmod = 0"); 
// $results = $link->query("UPDATE $user SET magmod = 0"); 
// $results = $link->query("UPDATE $user SET defmod = 0"); 
// // --------------------------------------------------------------------------- ZERO SKILLS!
// $results = $link->query("UPDATE $user SET onehanded = 0"); 
// $results = $link->query("UPDATE $user SET twohanded = 0"); 
// $results = $link->query("UPDATE $user SET ranged = 0"); 
// $results = $link->query("UPDATE $user SET onehandedpro = 0"); 
// $results = $link->query("UPDATE $user SET twohandedpro = 0"); 
// $results = $link->query("UPDATE $user SET rangedpro = 0"); 
// $results = $link->query("UPDATE $user SET warcraft = 0"); 
// $results = $link->query("UPDATE $user SET toughness = 0"); 
// $results = $link->query("UPDATE $user SET block = 0"); 
// $results = $link->query("UPDATE $user SET ddge = 0"); 
// $results = $link->query("UPDATE $user SET slice = 0"); 
// $results = $link->query("UPDATE $user SET smash = 0"); 
// $results = $link->query("UPDATE $user SET aim = 0"); 
// $results = $link->query("UPDATE $user SET multiarrow = 0"); 
// $results = $link->query("UPDATE $user SET boltupgrade = 0"); 
// $results = $link->query("UPDATE $user SET magicstrike = 0"); 
// // --------------------------------------------------------------------------- ZERO SPELLS!
// $results = $link->query("UPDATE $user SET fireball = 0"); 
// $results = $link->query("UPDATE $user SET magicmissile = 0"); 
// $results = $link->query("UPDATE $user SET poisondart = 0"); 
// $results = $link->query("UPDATE $user SET atomicblast = 0"); 
// $results = $link->query("UPDATE $user SET heal = 0"); 
// $results = $link->query("UPDATE $user SET regenerate = 0"); 
// $results = $link->query("UPDATE $user SET antidote = 0"); 
// $results = $link->query("UPDATE $user SET unlck = 0"); 
// $results = $link->query("UPDATE $user SET ironskin = 0"); 
// $results = $link->query("UPDATE $user SET magicarmor = 0"); 
// $results = $link->query("UPDATE $user SET wings = 0"); 
// $results = $link->query("UPDATE $user SET gills = 0"); 
// $results = $link->query("UPDATE $user SET equipR = 'fists'");
// // --------------------------------------------------------------------------- ZERO EQUIP!
// $results = $link->query("UPDATE $user SET equipL = '<span> - - - </span>'");
// $results = $link->query("UPDATE $user SET equipHead = '<span> - - - </span>'");
// $results = $link->query("UPDATE $user SET equipBody = '<span> - - - </span>'");
// $results = $link->query("UPDATE $user SET equipHands = '<span> - - - </span>'");
// $results = $link->query("UPDATE $user SET equipFeet = '<span> - - - </span>'");

// $results = $link->query("UPDATE $user SET equipRing1 = '<span> - - - </span>'");
// $results = $link->query("UPDATE $user SET equipRing2 = '<span> - - - </span>'");
// $results = $link->query("UPDATE $user SET equipNeck = '<span> - - - </span>'");

// $results = $link->query("UPDATE $user SET equipPet = '<span> - - - </span>'");
// $results = $link->query("UPDATE $user SET equipComp = '<span> - - - </span>'");
// $results = $link->query("UPDATE $user SET equipMount = '<span> - - - </span>'");
// $results = $link->query("UPDATE $user SET equipArtifact = '<span> - - - </span>'");

// $results = $link->query("UPDATE $user SET weapontype = 0");


    $updates = [ // -- set changes
		'cp' => $cp,
		'sp' => $sp,
		'currency' => $currency - 10000,
		'evolve' => $evolve + 1,
		// // --------------------------------------------------------------------------- ZERO STATS!
		'str' => 0,
		'dex' => 0,
		'mag' => 0,
		'def' => 0,
		'strmod' => 0,
		'dexmod' => 0,
		'magmod' => 0,
		'defmod' => 0,
		// // --------------------------------------------------------------------------- ZERO SKILLS!
		'onehanded' => 0,
		'twohanded' => 0,
		'ranged' => 0,
		'onehandedpro' => 0,
		'twohandedpro' => 0,
		'rangedpro' => 0,
		'warcraft' => 0,
		'toughness' => 0,
		'block' => 0,
		'ddge' => 0,
		'slice' => 0,
		'smash' => 0,
		'aim' => 0,
		'multiarrow' => 0,
		'boltupgrade' => 0,
		'magicstrike' => 0,
		// // --------------------------------------------------------------------------- ZERO SPELLS!
		'fireball' => 0,
		'magicmissile' => 0,
		'poisondart' => 0,
		'atomicblast' => 0,
		'heal' => 0,
		'regenerate' => 0,
		'antidote' => 0,
		'unlck' => 0,
		'ironskin' => 0,
		'magicarmor' => 0,
		'wings' => 0,
		'gills' => 0,
		// // --------------------------------------------------------------------------- ZERO EQUIP!
		'equipR' => 'fists',
		'equipL' => '<span> - - - </span>',
		'equipHead' => '<span> - - - </span>',
		'equipBody' => '<span> - - - </span>',
		'equipHands' => '<span> - - - </span>',
		'equipFeet' => '<span> - - - </span>',
		'equipRing1' => '<span> - - - </span>',
		'equipRing2' => '<span> - - - </span>',
		'equipNeck' => '<span> - - - </span>',
		'equipPet' => '<span> - - - </span>',
		'equipComp' => '<span> - - - </span>',
		'equipMount' => '<span> - - - </span>',
		'equipArtifact' => '<span> - - - </span>',
		'weapontype' => 0
    ]; 
    updateStats($link, $username, $updates); // -- apply changes

}
else if ( $input == 'evolve' && $currency < 10000) {echo $message=$toopoor;include ('update_feed.php');}

else if ( $input == 'evolve' && $_SESSION['evolveAlready'] >= 1 )
{
	echo $message= "<span>You can't evolve again until you Level up. Come back later.</span>";
 	include ('update_feed.php'); // --- update feed
	}

else { 
	echo $message='You no evolve.';
 	include ('update_feed.php'); // --- update feed
	}
 

 
// --------------------------------------------------------------------------- CP RESET !




// --------------------------------------------------------------------------- SP RESET !


//}



?>