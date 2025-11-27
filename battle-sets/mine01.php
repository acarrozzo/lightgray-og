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


// -------------------------------------------------------------------------- BATTLE VARIABLES		
$infight = $row['infight'];
$endfight = $row['endfight'];
	
	
	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // -UNDER OCEAN RAND GENERATOR
	{	$rand = rand (1,10); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE 4/10
if(($rand == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Iron Rat'");
	updateStats($link, $username,['enemy' => 'Iron Rat' ]); // -- set enemy

	include ('battle.php'); 
}		 // - 1/10
else if(($rand == 2 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Iron Crab'");
	updateStats($link, $username,['enemy' => 'Iron Crab' ]); // -- set enemy
	include ('battle.php'); 
}				
else if(($rand == 3 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Iron Scorpion'");
	updateStats($link, $username,['enemy' => 'Iron Scorpion' ]); // -- set enemy
	include ('battle.php'); 
}		
else if(($rand == 4 ) && $infight==0 && $endfight==0) 
	{	
		$rand2 = rand(1,5);
		if($rand2 == 1 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Slag Beast'");
			updateStats($link, $username,['enemy' => 'Slag Beast' ]); // -- set enemy
			include ('battle.php'); 
		}		 // - 1/
		if($rand2 == 2 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Iron Gator'");
			updateStats($link, $username,['enemy' => 'Iron Gator' ]); // -- set enemy
			include ('battle.php'); 
		}		 //
		if($rand2 == 3 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Iron Golem'");
			updateStats($link, $username,['enemy' => 'Iron Golem' ]); // -- set enemy
			include ('battle.php'); 
		}
		if($rand2 == 4 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Iron Cobra'");
			updateStats($link, $username,['enemy' => 'Iron Cobra' ]); // -- set enemy
			include ('battle.php'); 
		}		 // - 1/
		if($rand2 == 5 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Earth Golem'");
			updateStats($link, $username,['enemy' => 'Earth Golem' ]); // -- set enemy
		include ('battle.php'); 
	}		 // - 1/
	}
// -------------------------------------------------------------------------- IN BATTLE	
	
else if ($infight >=1 ) { include ('battle.php'); }	

	
	
// } // ---end while


?>