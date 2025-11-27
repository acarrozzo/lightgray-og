<?php
// --------- Random Events

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

// -------------------------------------------------------------------------- BATTLE VARIABLES


$infight = $row['infight'];
$endfight = $row['endfight'];
$level=$row['level'];

$clicks = $row['clicks'];
//$_SESSION['silverchest'] = $clicks;

$silverkey = $row['silverkey'];

//$randEvent = rand (1,50);		 // SUPER GENEROUS rate
$randEvent = rand (1,200);		 // regular rate

// echo 'Rand Event: '.$randEvent.'<br>';


$room = $row['room'];

$xp = $row['xp'];
$currency = $row['currency'];
$dagger = $row['dagger'];
$stone = $row['stone'];
$bolts = $row['bolts'];
$pots = $row['pots'];
$redpotion = $row['redpotion'];
$woodenchests = $row['woodenchests'];
$ironhatchet = $row['ironhatchet'];
$blueberry = $row['blueberry'];
$bluefish = $row['bluefish'];
$redberry = $row['redberry'];
$meatball = $row['meatball'];
$purplepotion = $row['purplepotion'];
$wingspotion = $row['wingspotion'];
$ringofstrength = $row['ringofstrength'];
$ringofdexterity = $row['ringofdexterity'];
$ringofmagic = $row['ringofmagic'];
$ringofdefense = $row['ringofdefense'];
$ringofstrengthV = $row['ringofstrengthV'];
$ringofdexterityV = $row['ringofdexterityV'];
$ringofmagicV = $row['ringofmagicV'];
$ringofdefenseV = $row['ringofdefenseV'];

$samuraisword = $row['samuraisword'];
$pike = $row['pike'];
$gladius = $row['gladius'];
$claymore = $row['claymore'];





if ($infight == 0) {		// ONLY RUN IF NOT IN BATTLE



  // -- EXPERIMENTAL
  // -- EXPERIMENTAL
  // -- EXPERIMENTAL
  // -- EXPERIMENTAL
  // -- EXPERIMENTAL
  // -- EXPERIMENTAL

 // 1 out of 300 chance
  // LVL 1 - 10 - The ground rumbles below you [ You take 25% current HP Damage ]
  // LVL 1 - 30 - The ground shakes and you fall hard to the floor. [ You take 50% current HP Damage ]
  // LVL 1 - 50 - The earth shakes from a monstrous explosion in the mountains. [ You take 75% current HP Damage ]
  // LVL 1 - 70 - You are inturrupted by a full blown earthquake. You are thrown around violently for what seems like an eternity [ You take 90% current HP Damage ]







 // RANDOM 1 - Clay Pot
if (($randEvent == 1 && $infight == 0) || ($_SESSION['pots'] == $room && $input != 'smash pot')) {  // RANDOM 1 - Clay Pot
// ----------------------------------------------- clay poy
echo 'There is a clay pot here.<br>';
$message = "There is a clay pot here.<br>
			<form id='mainForm' method='post' action='' name='formInput'>
			<input type='submit' class='goldBG' name='input1' value='smash pot' />
			</form>";
			include ('update_feed_alt.php'); // --- update feed
			$_SESSION['pots'] = $room;
}
if ($_SESSION['pots'] == $room && $input == 'smash pot') {

		$rand = rand (1,7);

		if ($rand == 1) {
      //$qty = rand (1,30);
      $qty = rand (100*$level,1000*$level);
			echo 'You smash open the pot and find '.$qty.' '.$_SESSION['currency'].'!<br>';
			$message = "You smash open the pot and find $qty ".$_SESSION['currency'].'!<br>';
			include ('update_feed.php'); // --- update feed
			//$results = $link->query("UPDATE $user SET currency = currency + $qty");
			updateStats($link, $username,['currency' => $currency + $qty ]); // -- update stat 
 			}
		if ($rand == 2) {
      //$qty = rand (2,4);
      $qty = rand (1*$level,5*$level);
			echo 'You smash open the pot and gain '.$qty.' XP!<br>';
			$message = "You smash open the pot and gain $qty XP!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET xp = xp + $qty");
			updateStats($link, $username,['xp' => $xp + $qty ]); // -- update stat 
 			}
		if ($rand == 3) {
			echo 'You smash open the pot and find a string!<br>';
			$message = "You smash open the pot and find a string!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET string = string + 1");
			updateStats($link, $username,['string' => $string + 1 ]); // -- update stat 
 			}
		if ($rand == 4) {
			echo 'You smash open the pot and find a dagger!<br>';
			$message = "You smash open the pot and find a dagger!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET dagger = dagger + 1");
			updateStats($link, $username,['dagger' => $dagger + 1 ]); // -- update stat 
 			}
		if ($rand == 5) {
			$qty = rand (2,5);
			echo 'You smash open the pot and find '.$qty.' arrows!<br>';
			$message = "You smash open the pot and find $qty arrows!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET arrows = arrows + $qty");
			updateStats($link, $username,['arrows' => $arrows + $qty ]); // -- update stat 
 			}
		if ($rand == 6) {
			$qty = rand (2,5);
			echo 'You smash open the pot and find '.$qty.' bolts!<br>';
			$message = "You smash open the pot and find $qty bolts!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET bolts = bolts + $qty");
			updateStats($link, $username,['bolts' => $bolts + $qty ]); // -- update stat 
 			}
		if ($rand == 7) {
			$qty = rand (2,5);
			echo 'You smash open the pot and find '.$qty.' stone!<br>';
			$message = "You smash open the pot and find $qty stone!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET stone = stone + $qty");
			updateStats($link, $username,['stone' => $stone + $qty ]); // -- update stat 
 			}

	$_SESSION['pots'] = -1;
	// $results = $link->query("UPDATE $user SET pots = pots + 1");
	updateStats($link, $username,['pots' => $pots + 1 ]); // -- update stat 


}
if (($randEvent == 2 && $infight == 0) || ($_SESSION['woodenchests'] == $room && $input != 'open wooden chest')) { // ----------------------------------------------- wooden chest

echo 'You come across a wooden chest<br>';
$message = "You come across a wooden chest<br>
			<form id='mainForm' method='post' action='' name='formInput'>
			<input type='submit' class='goldBG' name='input1' value='open wooden chest' />
			</form>";
			include ('update_feed_alt.php'); // --- update feed
			$_SESSION['woodenchests'] = $room; $funflag=1;
}
if ($_SESSION['woodenchests'] == $room && $input == 'open wooden chest') {

		$rand = rand (1,6);

		if ($rand == 1) {
			$qty = rand (50,200);
			echo 'You open the wooden chest and find '.$qty.' '.$_SESSION['currency'].'!<br>';
			$message = "You open the wooden chest and find $qty ".$_SESSION['currency']."<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET currency = currency + $qty");
			updateStats($link, $username,['currency' => $currency + $qty ]); // -- update stat 
 			}
		if ($rand == 2) {
			$qty = rand (10,20);
			echo 'You open the wooden chest and gain '.$qty.' XP!<br>';
			$message = "You open the wooden chest and gain $qty XP!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET xp = xp + $qty");
			updateStats($link, $username,['xp' => $xp + $qty ]); // -- update stat 
 			}
		if ($rand == 3) {
			$qty = rand (2,5);
			echo 'You open the wooden chest and find '.$qty.' Red Potions!<br>';
			$message = "You open the wooden chest and find $qty Red Potions!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
			updateStats($link, $username,['redpotion' => $redpotion + $qty ]); // -- update stat 
 			}
		if ($rand == 4) {
			echo 'You open the wooden chest and find a Samurai Sword!<br>';
			$message = "You open the wooden chest and find a Samurai Sword!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET samuraisword = samuraisword + 1");
			updateStats($link, $username,['samuraisword' => $samuraisword + 1 ]); // -- update stat 
 			}
		if ($rand == 5) {
			echo 'You open the wooden chest and find a Pike!<br>';
			$message = "You open the wooden chest and find a Pike!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET pike = pike + 1");
			updateStats($link, $username,['pike' => $pike + 1 ]); // -- update stat 
 			}
		if ($rand == 6) {

			$rand2 = rand(1,4);
			if ($rand2 == 1 ){
				$bonus = 'Ring of Strength';
				// $results = $link->query("UPDATE $user SET ringofstrength = ringofstrength + 1"); 
				updateStats($link, $username,['ringofstrength' => $ringofstrength + 1]); // -- update stat
				}
			if ($rand2 == 2 ){
				$bonus = 'Ring of Dexterity';
				// $results = $link->query("UPDATE $user SET ringofdexterity = ringofdexterity + 1"); 
				updateStats($link, $username,['ringofdexterity' => $ringofdexterity + 1]); // -- update stat
				}
			if ($rand2 == 3 ){
				$bonus = 'Ring of Magic';
				// $results = $link->query("UPDATE $user SET ringofmagic = ringofmagic + 1"); 
				updateStats($link, $username,['ringofmagic' => $ringofmagic + 1]); // -- update stat
				}
			if ($rand2 == 4 ){
				$bonus = 'Ring of Defense';
				// $results = $link->query("UPDATE $user SET ringofdefense = ringofdefense + 1"); 
				updateStats($link, $username,['ringofdefense' => $ringofdefense + 1]); // -- update stat 
				}

			echo 'You open the wooden chest and find a '.$bonus.'!<br>';
			$message = "You open the wooden chest and find a $bonus!<br>";
			include ('update_feed.php'); // --- update feed
 			}

	$_SESSION['woodenchests'] = -1;
	// $results = $link->query("UPDATE $user SET woodenchests = woodenchests + 1");
	updateStats($link, $username,['woodenchests' => $woodenchests + 1 ]); // -- update stat

}
//if ($_SESSION['silverchest'] ==0 ) {$_SESSION['silverchest']=-1;}
// ----------------------------------------------------------------------------------------------------------- silver chest
if (($randEvent == 3333 && $infight == 0 && $level>=2) || (($_SESSION['silverchest'] == ($room)) && $input != 'open silver chest')) {  // RANDOM 3
// ----------------------------------------------- clay poy
echo 'You come across a silver chest!<br>';
$message = "You come across a silver chest!<br>
			<form id='mainForm' method='post' action='' name='formInput'>
			<input type='submit' class='goldBG' name='input1' value='open silver chest' />
			</form>";
			include ('update_feed.php'); // --- update feed
			$_SESSION['silverchest'] = $room;
}
if ($_SESSION['silverchest'] == $room && $input == 'open silver chest') {

		$silverkeyleft = $silverkey - 1;
		if ($silverkey < 1) {
			echo $message = "You don't have a silver key to open this chest!<br>";
			include ('update_feed.php'); // --- update feed
			}
		else{
			echo $message = "You use a silverkey. You have $silverkeyleft left.<br>";
			include ('update_feed.php'); // --- update feed


		$rand = rand (1,6);

		if ($rand == 1) {
			$qty = rand (1000,2000);
			echo 'You open the silver chest and find '.$qty.' '.$_SESSION['currency'].'!<br>';
			$message = "You open the silver chest and find $qty ".$_SESSION['currency']."!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET currency = currency + $qty");
			updateStats($link, $username,['currency' => $currency + $qty ]); // -- update stat 
 			}
		if ($rand == 2) {
			$qty = rand (50,200);
			echo 'You open the silver chest and gain '.$qty.' XP!<br>';
			$message = "You open the silver chest and gain $qty XP!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET xp = xp + $qty");
			updateStats($link, $username,['xp' => $xp + $qty ]); // -- update stat 
 			}
		if ($rand == 3) {
			$qty = rand (2,5);
			echo 'You open the silver chest and find '.$qty.' Purple Potions!<br>';
			$message = "You open the silver chest and find $qty Purple Potions!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET purplepotion = purplepotion + $qty");
			updateStats($link, $username,['purplepotion' => $purplepotion + $qty ]); // -- update stat 
 			}
		if ($rand == 4) {
			echo 'You open the silver chest and find a Gladius!<br>';
			$message = "You open the silver chest and find a Gladius!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET gladius = gladius + 1");
			updateStats($link, $username,['gladius' => $gladius + 1 ]); // -- update stat
 			}
		if ($rand == 5) {
			echo 'You open the silver chest and find a Claymore!<br>';
			$message = "You open the silver chest and find a claymore!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET claymore = claymore + 1");
 			updateStats($link, $username,['claymore' => $claymore + 1]); // -- update stat 
 			}
		if ($rand == 6) {

			$rand2 = rand(1,4);
			if ($rand2 == 1 ){
				$bonus = 'Ring of Strength V';
				// $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
				updateStats($link, $username,['ringofstrengthV' => $ringofstrengthV + 1]); // -- update stat
			}
			if ($rand2 == 2 ){
				$bonus = 'Ring of Dexterity V';
				// $results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV + 1");
				updateStats($link, $username,['ringofdexterityV' => $ringofdexterityV + 1]); // -- update stat
			}
			if ($rand2 == 3 ){
				$bonus = 'Ring of Magic V';
				// $results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1");
				updateStats($link, $username,['ringofmagicV' => $ringofmagicV + 1]); // -- update stat
			}
			if ($rand2 == 4 ){
				$bonus = 'Ring of Defense V';
				// $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1");
				updateStats($link, $username,['ringofdefenseV' => $ringofdefenseV + 1]); // -- update stat
		}

			echo 'You open the silver chest and find a '.$bonus.'!<br>';
			$message = "You open the silver chest and find a $bonus!<br>";
			include ('update_feed.php'); // --- update feed
 			}
	$_SESSION['silverchest'] = -1;
	// $results = $link->query("UPDATE $user SET silverkey = silverkey - 1");
	// $results = $link->query("UPDATE $user SET silverchests = silverchests + 1");
	updateStats($link, $username,['silverkey' => $silverkey - 1 ]); // -- update stat
	updateStats($link, $username,['silverchests' => $silverchests + 1 ]); // -- update stat

}
}




} // END BIG WHILE IN FIGHT!


// } //-end while

?>
