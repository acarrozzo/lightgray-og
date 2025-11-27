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
if ($infight < 1 && $endfight != 1)  // -BLUE OCEAN RAND GENERATOR
	{	$rand = rand (1,18); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE 6/18
if(($rand == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Jellyfish'");
	updateStats($link, $username,['enemy' => 'Jellyfish' ]); // -- set enemy 
	include ('battle.php'); 
}		
else if(($rand == 2 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Electric Eel'");
	updateStats($link, $username,['enemy' => 'Electric Eel' ]); // -- set enemy 
	include ('battle.php'); 
}				
else if(($rand == 3 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Piranha'");
	updateStats($link, $username,['enemy' => 'Piranha' ]); // -- set enemy 
	include ('battle.php'); 
}		
else if(($rand == 4 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Barracuda'");
	updateStats($link, $username,['enemy' => 'Barracuda' ]); // -- set enemy
	include ('battle.php'); 
}		
else if(($rand == 5 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Squid'");
	updateStats($link, $username,['enemy' => 'Squid' ]); // -- set enemy
	include ('battle.php'); 
}		
else if(($rand == 6 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Albatross'");
	updateStats($link, $username,['enemy' => 'Albatross' ]); // -- set enemy
	include ('battle.php'); 
}		
						
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	


// path - thief, giant rat, bat, imp, skeleton, goblin, goblin bandit,  ogre, salamander, spider, snake, rat, kobold, 
	
	
// } // ---end while


?>