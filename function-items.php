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

		$equipR=$row['equipR'];
		$equipL=$row['equipL'];
		$equipHead=$row['equipHead'];
		$equipBody=$row['equipBody'];
		$equipHands=$row['equipHands'];
		$equipFeet=$row['equipFeet'];


		$hpmax=$row['hpmax'];
		$mpmax=$row['mpmax'];

		$hp=$row['hp'];
		$mp=$row['mp'];

		$wingspotion=$row['wingspotion'];
		$gillspotion=$row['gillspotion'];
		$flying = $_SESSION['flying'];
		$breathingwater = $_SESSION['breathingwater'];

		$coffee=$row['coffee'];
		$tea=$row['tea'];
		$reds=$row['reds'];
		$greens=$row['greens'];
		$blues=$row['blues'];
		$yellows=$row['yellows'];
		$antidotepotion=$row['antidotepotion'];

//$_SESSION['reds'] = 0;




//		if	($flying>=1) { 		$flying = $_SESSION['flying'] = $_SESSION['flying'] - 1;
//								echo "<i>[ wings: $flying ] </i><em></em>"; } // --- update feed
//		if	($breathingwater>=1) { 		$breathingwater = $_SESSION['breathingwater'] = $_SESSION['breathingwater'] - 1;
//								echo "<i>[ gills: $breathingwater ] </i><em></em>"; } // --- update feed


// ------------------------------------------------------------------------------------------------------------------------------ WINGS
if ($input=="drink wings potion" || $input=="wings potion"){
	if	($flying>=1) { echo $message = "You are already flying!<br>"; include ('update_feed.php'); } // --- update feed
	else if	($wingspotion<=0) { echo $message = "You don't have any wings potions.<br>"; include ('update_feed.php'); } // --- update feed
	else {
		$flying = $_SESSION['flying'] = 100;
		//$results = $link->query("UPDATE $user SET wingspotion = wingspotion - 1");
		$updates = [ // -- set changes
            'wingspotion' => $wingspotion - 1
        ];
        updateStats($link, $username, $updates); // -- apply changes
		echo $message = 'You drink a wings potion and grow some wings!!! You can now fly for 100 clicks.<br>'; include ('update_feed.php'); // --- update feed
		}
	}
// ------------------------------------------------------------------------------------------------------------------------------ GILLS
if ($input=="drink gills potion" || $input=="gills potion"){
	if	($breathingwater>=1) { echo $message = "You are already breathing water!<br>"; include ('update_feed.php'); } // --- update feed
	else if	($gillspotion<=0) { echo $message = "You don't have any gills potions.<br>"; include ('update_feed.php'); } // --- update feed
	else {
		$breathingwater = $_SESSION['breathingwater'] = 100;
		//$results = $link->query("UPDATE $user SET gillspotion = gillspotion - 1");
		$updates = [ // -- set changes
		   'gillspotion' => $gillspotion - 1
		];
		updateStats($link, $username, $updates); // -- apply changes
		echo $message = 'You drink a gills potion and grow some gills!!! You can now breathe water for 100 clicks.<br>';
		include ('update_feed.php'); // --- update feed
		}
	}
	// ------------------------------------------------------------------------------------------------------------------------------ antidote
if ($input=="drink antidote potion" || $input=="antidote potion"){
	if	($_SESSION['poisonyou']<1) { echo $message = "You aren't poisoned!<br>"; include ('update_feed.php'); } // --- update feed
	else if	($antidotepotion<=0) { echo $message = "You don't have any antidote potions.<br>"; include ('update_feed.php'); } // --- update feed
	else {
		//$results = $link->query("UPDATE $user SET antidotepotion = antidotepotion - 1");
		$updates = [ // -- set changes
			'antidotepotion' => $antidotepotion - 1
		];
		updateStats($link, $username, $updates); // -- apply changes
		$_SESSION['poisonyou']=0;
		$_SESSION['poisonimmune']=20;
		echo $message = 'You drink an antidote potion and cure your poison! You are also immune to poison for 20 clicks.<br>';
		include ('update_feed.php'); // --- update feed
		}
	}

// ------------------------------------------------------------------------------------------------------------------------------ COLORS
if ($input=="drink coffee" || $input=="coffee"){
	if	($_SESSION['coffee']>=1) { echo $message = "You're already all buzzed up on coffee!<br>";
		include ('update_feed.php'); } // --- update feed
	else if	($coffee<=0) { echo $message = "You don't have any coffee.<br>"; include ('update_feed.php'); } // --- update feed
	else {
		$_SESSION['coffee'] = 100;
		//$results = $link->query("UPDATE $user SET coffee = coffee - 1");
		$updates = [ // -- set changes
			'coffee' => $coffee - 1
		];
		updateStats($link, $username, $updates); // -- apply changes
		echo $message = 'You drink some COFFEE and feel a boost of energy come over you! (+10 all stats / 100 clicks)<br>'; 
		include ('update_feed.php'); // --- update feed
		}
	}
if ($input=="drink tea" || $input=="tea"){
	if	($_SESSION['tea']>=1) { echo $message = "You're already all tea'd up!<br>";
		include ('update_feed.php'); } // --- update feed
	else if	($tea<=0) { echo $message = "You don't have any tea.<br>"; include ('update_feed.php'); } // --- update feed
	else {
		$_SESSION['tea'] = 100;
		//$results = $link->query("UPDATE $user SET tea = tea - 1");
		$updates = [ // -- set changes
			'tea' => $tea - 1
		];
		updateStats($link, $username, $updates); // -- apply changes
		echo $message = 'You drink some TEA and feel great! (+5 hp/mp regen / 100 clicks)<br>';
		include ('update_feed.php'); // --- update feed
		}
	}

if ($input=="use reds" || $input=="reds"){
	if	($_SESSION['reds']>=1) { echo $message = "You're already pumped up on some reds!<br>";
		include ('update_feed.php'); } // --- update feed
	else if	($reds<=0) { echo $message = "You don't have any reds.<br>"; include ('update_feed.php'); } // --- update feed
	else {
		$_SESSION['reds'] = 100;
		//$results = $link->query("UPDATE $user SET reds = reds - 1");
		$updates = [ // -- set changes
			'reds' => $reds - 1
		];
		updateStats($link, $username, $updates); // -- apply changes
		echo $message = 'You use some reds and feel a surge of STRENGTH! (+20 str / 100 clicks)<br>';
		include ('update_feed.php'); // --- update feed
		}
	}
if ($input=="use greens" || $input=="greens"){
	if	($_SESSION['greens']>=1) { echo $message = "You're already jacked up on some greens!<br>";
		include ('update_feed.php'); } // --- update feed
	else if	($greens<=0) { echo $message = "You don't have any greens.<br>"; include ('update_feed.php'); } // --- update feed
	else {
		$_SESSION['greens'] = 100;
		//$results = $link->query("UPDATE $user SET greens = greens - 1");
		$updates = [ // -- set changes
			'greens' => $greens - 1
		];
		updateStats($link, $username, $updates); // -- apply changes
		echo $message = 'You use some greens and you feel your DEXTERITY rise! (+20 dex / 100 clicks)<br>';
		include ('update_feed.php'); // --- update feed
		}
	}



if ($input=="use blues" || $input=="blues"){
	if	($_SESSION['blues']>=1) { echo $message = "You're already surging with blues!<br>";
		include ('update_feed.php'); } // --- update feed
	else if	($blues<=0) { echo $message = "You don't have any blues.<br>"; include ('update_feed.php'); } // --- update feed
	else {
		$_SESSION['blues'] = 100;
		//$results = $link->query("UPDATE $user SET blues = blues - 1");
		$updates = [ // -- set changes
			'blues' => $blues - 1
		];
		updateStats($link, $username, $updates); // -- apply changes
		echo $message = 'You use some blues and feel a wave of MAGIC come over you! (+20 mag / 100 clicks)<br>';
		include ('update_feed.php'); // --- update feed
		}
	}


if ($input=="use yellows" || $input=="yellows"){
	if	($_SESSION['yellows']>=1) { echo $message = "You're already pumped up on some yellows!<br>";
		include ('update_feed.php'); } // --- update feed
	else if	($yellows<=0) { echo $message = "You don't have any yellows.<br>"; include ('update_feed.php'); } // --- update feed
	else {
		$_SESSION['yellows'] = 100;
		//$results = $link->query("UPDATE $user SET yellows = yellows - 1");
		$updates = [ // -- set changes
			'yellows' => $yellows - 1
		];
		updateStats($link, $username, $updates); // -- apply changes
		echo $message = 'You use some yellows and feel a surge of DEFENSE! (+20 def / 100 clicks)<br>';
		include ('update_feed.php'); // --- update feed
		}
	}







// } // end database while



?>
