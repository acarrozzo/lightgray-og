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
	{	$rand = rand (1,21); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE 7/21
if(($rand == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Giant Sea Turtle'");
    updateStats($link, $username,['enemy' => 'Giant Sea Turtle' ]); // -- set enemy 
	include ('battle.php'); 
}		 // - 1/21
else if(($rand == 2 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Giant Sea Turtle'");
	updateStats($link, $username,['enemy' => 'Giant Sea Turtle' ]); // -- set enemy

	include ('battle.php'); 
}				
else if(($rand == 3 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Colossal Squid'");
	updateStats($link, $username,['enemy' => 'Colossal Squid' ]); // -- set enemy
	include ('battle.php'); 
}		
else if(($rand == 4 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Colossal Squid'");
	updateStats($link, $username,['enemy' => 'Colossal Squid' ]); // -- set enemy	
	include ('battle.php'); 
}		
else if(($rand == 5 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Barracuda'");
	updateStats($link, $username,['enemy' => 'Barracuda' ]); // -- set enemy
	include ('battle.php'); 
}		
else if(($rand == 6 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Squid'");
	updateStats($link, $username,['enemy' => 'Squid' ]); // -- set enemy
	include ('battle.php'); 
}				// - 1/21
else if(($rand == 7 ) && $infight==0 && $endfight==0) 
	{	
		$rand2 = rand(1,9);
		if($rand2 == 1 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Glowing Octopus'");
			updateStats($link, $username,['enemy' => 'Glowing Octopus' ]); // -- set enemy
	include ('battle.php'); 
}		 // - 1/
		if($rand2 == 2 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Glowing Octopus'");
			updateStats($link, $username,['enemy' => 'Glowing Octopus' ]); // -- set enemy
	include ('battle.php'); 
}		 //
		if($rand2 == 3 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Great White'");
			updateStats($link, $username,['enemy' => 'Great White' ]); // -- set enemy
	include ('battle.php'); 
}		 // - 1/
		if($rand2 == 4 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Hammerhead'");
			updateStats($link, $username,['enemy' => 'Hammerhead' ]); // -- set enemy
	include ('battle.php'); 
}			 // - 1/
		if($rand2 == 5 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Crocodile'");
			updateStats($link, $username,['enemy' => 'Crocodile' ]); // -- set enemy
	include ('battle.php'); 
}			 // - 1/
		if($rand2 == 6 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Jellyfish'");
			updateStats($link, $username,['enemy' => 'Jellyfish' ]); // -- set enemy
	include ('battle.php'); 
}			 // - 1/
		if($rand2 == 7 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Electric Eel'");
			updateStats($link, $username,['enemy' => 'Electric Eel' ]); // -- set enemy
	include ('battle.php'); 
}			 // - 1/
		if($rand2 == 8 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Piranha'");
			updateStats($link, $username,['enemy' => 'Piranha' ]); // -- set enemy
	include ('battle.php'); 
}			 // - 1/
		if($rand2 == 9 ) { 	
			echo $message="<i>For a moment you see a glowing squid looking thing, but it swims quickly back into the shadows. You just missed a possible rare. You know, there is a slightly higher chance of finding the GLOWING OCTOPUS if you search near the SUNKEN SHIP. </i><br>";	
		include ('update_feed.php');   // --- update feed
		}	 // - 1/105
	}

	
						
// -------------------------------------------------------------------------- IN BATTLE	
	
else if ($infight >=1 ) { include ('battle.php'); }	

	
	
// } // ---end while


?>