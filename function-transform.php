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

		$hpmax=$row['hpmax'];   
		$mpmax=$row['mpmax'];   
		 
		$hp=$row['hp'];   
		$mp=$row['mp'];
		
		$regenHP = $_SESSION['healthregen'];
		$regenMP = $_SESSION['manaregen'];
		

// --------------------------------------------------------------------------- HP ADJUST
if ($input == 'transform hp') { 
		echo $message = 'hp/mp adjust!';
	  	include ('update_feed.php'); // --- update feed ALT
	
		$results = $link->query("UPDATE $user SET hpmax = 140");
		$results = $link->query("UPDATE $user SET mpmax = 70");		
		
}
	
	
// --------------------------------------------------------------------------- TRANSFORM TEN
if ($input == 'transform ten') { 
		echo $message = 'You transform to a balanced level 10 character!';
	  	include ('update_feed.php'); // --- update feed ALT
	
		$results = $link->query("UPDATE $user SET level = 10");
		$results = $link->query("UPDATE $user SET room = 1");
		$results = $link->query("UPDATE $user SET xp = 1004");
		$results = $link->query("UPDATE $user SET cp = 1");
		$results = $link->query("UPDATE $user SET sp = 20");
		$results = $link->query("UPDATE $user SET currency = 3000");
		$results = $link->query("UPDATE $user SET hpmax = 140");
		$results = $link->query("UPDATE $user SET mpmax = 70");
		$results = $link->query("UPDATE $user SET hp = 140");
		$results = $link->query("UPDATE $user SET mp = 70");
		$results = $link->query("UPDATE $user SET str = 3");
		$results = $link->query("UPDATE $user SET dex = 3");
		$results = $link->query("UPDATE $user SET mag = 3");
		$results = $link->query("UPDATE $user SET def = 3");
		$results = $link->query("UPDATE $user SET weapontype = 1");
		$results = $link->query("UPDATE $user SET onehanded = 3");
		$results = $link->query("UPDATE $user SET twohanded = 3");
		$results = $link->query("UPDATE $user SET ranged = 3");
		$results = $link->query("UPDATE $user SET toughness = 4");
		$results = $link->query("UPDATE $user SET destruction = 2");
		$results = $link->query("UPDATE $user SET restoration = 2");
		$results = $link->query("UPDATE $user SET alteration = 1");
		$results = $link->query("UPDATE $user SET physicaltraining = 9");
		$results = $link->query("UPDATE $user SET mentaltraining = 8");
		$results = $link->query("UPDATE $user SET crafting = 1");
		$results = $link->query("UPDATE $user SET fireball = 3");
		$results = $link->query("UPDATE $user SET heal = 2");
		
		$results = $link->query("UPDATE $user SET equipR = 'flail'");
		$results = $link->query("UPDATE $user SET equipL = 'buckler'");	
		$results = $link->query("UPDATE $user SET equipHead = 'basic helmet'");
		$results = $link->query("UPDATE $user SET equipBody = 'training armor pro'");
		$results = $link->query("UPDATE $user SET equipHands = 'wrist bracers'");
		$results = $link->query("UPDATE $user SET equipFeet = 'black boots'");
		$results = $link->query("UPDATE $user SET equipRing1 = 'ring of defense III'");
		
		
		$results = $link->query("UPDATE $user SET dagger = 5");
		$results = $link->query("UPDATE $user SET longsword = 4");
		$results = $link->query("UPDATE $user SET morningstar = 1");
		$results = $link->query("UPDATE $user SET flail = 1");
		$results = $link->query("UPDATE $user SET bo = 1");
		$results = $link->query("UPDATE $user SET pike = 1");
		$results = $link->query("UPDATE $user SET boomerang = 1");
		$results = $link->query("UPDATE $user SET woodenbow = 1");
		$results = $link->query("UPDATE $user SET arrows = 50");
		$results = $link->query("UPDATE $user SET buckler = 1");
		$results = $link->query("UPDATE $user SET woodenshield = 1");
		$results = $link->query("UPDATE $user SET basichelmet = 1");
		$results = $link->query("UPDATE $user SET trainingarmorpro = 1");
		$results = $link->query("UPDATE $user SET paddedarmor = 1");
		$results = $link->query("UPDATE $user SET leathervest = 1");
		$results = $link->query("UPDATE $user SET wristbracers = 1");
		$results = $link->query("UPDATE $user SET blackgloves = 1");
		$results = $link->query("UPDATE $user SET greengloves = 1");
		$results = $link->query("UPDATE $user SET greenboots = 1");
		$results = $link->query("UPDATE $user SET blackboots = 1");
		$results = $link->query("UPDATE $user SET ringofdefenseIII = 1");
		
		$results = $link->query("UPDATE $user SET cookedmeat = 15");
		$results = $link->query("UPDATE $user SET redpotion = 10");
		$results = $link->query("UPDATE $user SET bluepotion = 5");
		$results = $link->query("UPDATE $user SET hatchet = 1");
		$results = $link->query("UPDATE $user SET hammer = 1");
		$results = $link->query("UPDATE $user SET stone = 4");
		$results = $link->query("UPDATE $user SET iron = 3");
				
		$results = $link->query("UPDATE $user SET quest1 = 2");
		$results = $link->query("UPDATE $user SET quest2 = 2");
		$results = $link->query("UPDATE $user SET quest3 = 2");
		$results = $link->query("UPDATE $user SET quest4 = 2");
		$results = $link->query("UPDATE $user SET quest5 = 2");
		$results = $link->query("UPDATE $user SET quest6 = 2");
		$results = $link->query("UPDATE $user SET quest7 = 2");
		$results = $link->query("UPDATE $user SET quest8 = 2");
		$results = $link->query("UPDATE $user SET quest9 = 2");
		$results = $link->query("UPDATE $user SET quest10 = 2");
		$results = $link->query("UPDATE $user SET grandquest2 = 1"); 

		$results = $link->query("UPDATE $user SET KLthief = 3");
		$results = $link->query("UPDATE $user SET chest1 = 1");
		$results = $link->query("UPDATE $user SET roomzeromap = 1");
		$results = $link->query("UPDATE $user SET grassyfieldmap = 1");
		$results = $link->query("UPDATE $user SET grassyfieldundergroundmap = 1");
		$results = $link->query("UPDATE $user SET forestmap = 1");
		$results = $link->query("UPDATE $user SET x = 1");
		$results = $link->query("UPDATE $user SET x = 1");
		$results = $link->query("UPDATE $user SET x = 1");
		
			$funflag=1;	

		
  	}
/*




*/



// } // end database while



?>