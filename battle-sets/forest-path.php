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
if ($infight < 1 && $endfight != 1)  // -FOREST PATH RAND GENERATOR
	 {	$rand = rand (1,50); }	else {$rand=0;}	
	//{	$rand = rand (1,12); }	else {$rand=0;}	// to test 100% attack rate
	//	$rand=100; // to test - 0% attack rate
// -------------------------------------------------------------------------- INITIALIZE rat 
if(($rand == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Rat'");
	updateStats($link, $username,['enemy' => 'Rat' ]); // -- set enemy 
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE giant rat 
else if(($rand == 2 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Giant Rat'");
	updateStats($link, $username,['enemy' => 'Giant Rat' ]); // -- set enemy
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE thief 
else if(($rand == 3 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Thief'");
	updateStats($link, $username,['enemy' => 'Thief' ]); // -- set enemy
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE goblin 
else if(($rand == 4 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Goblin'");
	updateStats($link, $username,['enemy' => 'Goblin' ]); // -- set enemy
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE goblin bandit 
else if(($rand == 5 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Goblin Bandit'");
	updateStats($link, $username,['enemy' => 'Goblin Bandit' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE imp 
else if(($rand == 6 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Imp'");
	updateStats($link, $username,['enemy' => 'Imp' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE hob goblin 
else if(($rand == 7 ) && $infight==0 && $endfight==0) 
{	// $results = $link->query("UPDATE $user SET enemy = 'Hob Goblin'");
	updateStats($link, $username,['enemy' => 'Hob Goblin' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE orc 
else if(($rand == 8 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Orc'");
	updateStats($link, $username,['enemy' => 'Orc' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE ogre 
else if(($rand == 9 ) && $infight==0 && $endfight==0) 
{	// $results = $link->query("UPDATE $user SET enemy = 'Ogre'");
	updateStats($link, $username,['enemy' => 'Ogre' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE kobold 
else if(($rand == 10 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Kobold'");
	updateStats($link, $username,['enemy' => 'Kobold' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE skeleton 
else if(($rand == 11 ) && $infight==0 && $endfight==0) 
{	// $results = $link->query("UPDATE $user SET enemy = 'Skeleton'");
	updateStats($link, $username,['enemy' => 'Skeleton' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE snake 
else if(($rand == 12 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Snake'");
	updateStats($link, $username,['enemy' => 'Snake' ]); // -- set enemy
	include ('battle.php'); 
}								
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	

	
// // } // ---end while


?>