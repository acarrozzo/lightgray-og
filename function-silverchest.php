<?php
// --------- Silver Chest

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
	$silverkey = $row['silverkey'];

// -------------------------------------------------------------------------- OPEN SILVER CHEST
if ($input == 'open silver chest' ) {
			
	if ($silverkey < 1) {
		echo $message = "You don't have a silver key to open this chest!<br>";
		include ('update_feed.php'); // --- update feed
		}
	else if ( $_SESSION['silverchest'] > 0 ){
		echo $message = "You have opened this chest too recently. Come back in ".$_SESSION['silverchest']." clicks.<br>";
		include ('update_feed.php'); // --- update feed
		}

	else {
		$silverkeyleft = $silverkey - 1;		
		echo $message = "You use a Silver Key and open the SILVER CHEST! You have $silverkeyleft left.<br>";
		include ('update_feed.php'); // --- update feed
		
		$_SESSION['silverchest'] = 100;
		
		$rand = rand (1,6);
		
		$rand = 3;
		
		if ($rand == 1) { 
			$qty = rand (500,1000);
			echo 'You open the silver chest and find '.$qty.' '.$_SESSION['currency'].'!<br>';
			$message = "You open the silver chest and find $qty $currency!<br>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET currency = currency + $qty");
 			}
		if ($rand == 2) { 
			$qty = rand (50,100);
			echo 'You open the silver chest and gain '.$qty.' XP!<br>';
			$message = "You open the silver chest and gain $qty XP!<br>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET xp = xp + $qty");
 			}
		if ($rand == 3) { 
			
			$silverrand = rand(1,13);
			//echo 'SilverRand: '.$silverrand.'<br>';
				if ($silverrand == 1) { $silveritem='Silver Sword';
				$results = $link->query("UPDATE $user SET silversword = silversword + 1"); }
				if ($silverrand == 2) { $silveritem='Silver 2h Sword';
				$results = $link->query("UPDATE $user SET silver2hsword = silver2hsword + 1"); }
				if ($silverrand == 3) { $silveritem='Silver Boomerang';
				$results = $link->query("UPDATE $user SET silverboomerang = silverboomerang + 1"); }
				if ($silverrand == 4) { $silveritem='Silver Bow';
				$results = $link->query("UPDATE $user SET silverbow = silverbow + 1"); }
				if ($silverrand == 5) { $silveritem='Silver Crossbow';
				$results = $link->query("UPDATE $user SET silvercrossbow = silvercrossbow + 1"); }
				if ($silverrand == 6) { $silveritem='Silver Shield';
				$results = $link->query("UPDATE $user SET silvershield = silvershield + 1"); }
				if ($silverrand == 7) { $silveritem='Silver Helmet';
				$results = $link->query("UPDATE $user SET silverhelmet = silverhelmet + 1"); }
				if ($silverrand == 8) { $silveritem='Silver Breastplate';
				$results = $link->query("UPDATE $user SET silverbreastplate = silverbreastplate + 1"); }
				if ($silverrand == 9) { $silveritem='Silver Gauntlets';
				$results = $link->query("UPDATE $user SET silvergauntlets= silvergauntlets + 1"); }
				if ($silverrand == 10) { $silveritem='Silver Boots';
				$results = $link->query("UPDATE $user SET silverboots = silverboots + 1"); }
				if ($silverrand == 11) { $silveritem='Silver Ring';
				$results = $link->query("UPDATE $user SET silverring = silverring + 1"); }
				if ($silverrand == 12) { $silveritem='Silver Necklace';
				$results = $link->query("UPDATE $user SET silvernecklace = silvernecklace + 1"); }		
				if ($silverrand == 13) { $silveritem='Silver Whip!';
				$results = $link->query("UPDATE $user SET silverwhip = silverwhip + 1"); }	
				
				$message = "  
				   	<div class='goldchestopen silverchest lightblueBG darkestgray'>
				   	<h5 class='h5'>Silver Chest</h5>
					<h6>contains:</h6>
					<span class='h4'>+ $silveritem</span><br />
					</div>";
						include ('update_feed_alt.php'); // --- update feed
				
					
 			}	
		if ($rand == 4) { 
			echo 'You open the silver chest and find a Gladius!<br>';
			$message = "You open the silver chest and find a Gladius!<br>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET gladius = gladius + 1");
 			}
		if ($rand == 5) { 
			echo 'You open the silver chest and find a Claymore!<br>';
			$message = "You open the silver chest and find a claymore!<br>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET claymore = claymore + 1");
 			}	
		if ($rand == 6) { 
		
			$rand2 = rand(1,4);
			if ($rand2 == 1 ){
				$bonus = 'Ring of Strength III';
				$results = $link->query("UPDATE $user SET ringofstrengthIII = ringofstrengthIII + 1"); }
			if ($rand2 == 2 ){
				$bonus = 'Ring of Dexterity III';
				$results = $link->query("UPDATE $user SET ringofdexterityIII = ringofdexterityIII + 1"); }
			if ($rand2 == 3 ){
				$bonus = 'Ring of Magic III';
				$results = $link->query("UPDATE $user SET ringofmagicIII = ringofmagicIII + 1"); }
			if ($rand2 == 4 ){
				$bonus = 'Ring of Defense III';
				$results = $link->query("UPDATE $user SET ringofdefenseIII = ringofdefenseIII + 1"); }	
	
			echo 'You open the silver chest and find a '.$bonus.'!<br>';
			$message = "You open the silver chest and find a $bonus!<br>";
			include ('update_feed.php'); // --- update feed
 			}					
	//$_SESSION['silverchest'] = -1;
	$results = $link->query("UPDATE $user SET silverkey = silverkey - 1");
	$results = $link->query("UPDATE $user SET silverchests = silverchests + 1");	

}
}
$_SESSION['silverchest'] -= 1;






// } //-end while

?>