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
if ($infight < 1 && $endfight != 1)  // - RAND GENERATOR
	{	$rand = rand (1,50); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE
if(($rand == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Thief'");
	updateStats($link, $username,['enemy' => 'Thief' ]); // -- set enemy 
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE
else if(($rand == 2 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Red Bandit'");
	updateStats($link, $username,['enemy' => 'Red Bandit' ]); // -- set enemy
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE
else if(($rand == 3 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Goblin'");
	updateStats($link, $username,['enemy' => 'Goblin' ]); // -- set enemy
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE
else if(($rand == 4 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Goblin Bandit'");
	updateStats($link, $username,['enemy' => 'Goblin Bandit' ]); // -- set enemy
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE 
else if(($rand == 5 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Snake'");
	updateStats($link, $username,['enemy' => 'Snake' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE 
else if(($rand == 6 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Salamander'");
	updateStats($link, $username,['enemy' => 'Salamander' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE 
else if(($rand == 7 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Kobold'");
	updateStats($link, $username,['enemy' => 'Kobold' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE 
else if(($rand == 8 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Golden Bat'");
	updateStats($link, $username,['enemy' => 'Golden Bat' ]); // -- set enemy
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE 
else if(($rand == 9 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Skeleton'");
	updateStats($link, $username,['enemy' => 'Skeleton' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE 
else if(($rand == 10 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Imp'");
	updateStats($link, $username,['enemy' => 'Imp' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE  
else if(($rand == 11 ) && $infight==0 && $endfight==0) {	
// $results = $link->query("UPDATE $user SET enemy = 'Hob Goblin'");
	updateStats($link, $username,['enemy' => 'Hob Goblin' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE 
else if(($rand == 12 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Orc'");
	updateStats($link, $username,['enemy' => 'Orc' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE 
else if(($rand == 13 ) && $infight==0 && $endfight==0) {	
	// $results = $link->query("UPDATE $user SET enemy = 'Ogre'");
	updateStats($link, $username,['enemy' => 'Ogre' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE 
else if(($rand == 14 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Kobold'");
	updateStats($link, $username,['enemy' => 'Kobold' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE
else if(($rand == 15 ) && $infight==0 && $endfight==0) {	
	// $results = $link->query("UPDATE $user SET enemy = 'Flying Kobold'");
	updateStats($link, $username,['enemy' => 'Flying Kobold' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE
else if(($rand == 16 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Troll'");
	updateStats($link, $username,['enemy' => 'Troll' ]); // -- set enemy
	include ('battle.php'); 
}								
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	


// path - thief, giant rat, bat, imp, skeleton, goblin, goblin bandit,  ogre, salamander, spider, snake, rat, kobold, 
	
	
// } // ---end while


?>