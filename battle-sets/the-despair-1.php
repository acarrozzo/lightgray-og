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
if ($infight < 1 && $endfight != 1)  // - THE DESPAIR RANDOM ENEMY GENERATOR
	{	$rand = rand (1,11); }	else {$rand=0;}	
	//echo 'RR'.$rand;
// -------------------------------------------------------------------------- INITIALIZE - 1/11
if(($rand == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Hydra'");
	updateStats($link, $username,['enemy' => 'Hydra' ]); // -- set enemy 
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 1/11
else if(($rand == 2 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Brownie'");
	updateStats($link, $username,['enemy' => 'Brownie' ]); // -- set enemy 
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 1/11
else if(($rand == 3 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Harpy'");
	updateStats($link, $username,['enemy' => 'Harpy' ]); // -- set enemy 
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 1/11
else if(($rand == 4 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Gorgon'");
	updateStats($link, $username,['enemy' => 'Gorgon' ]); // -- set enemy 
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 1/11
else if(($rand == 5 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Banshee'");
	updateStats($link, $username,['enemy' => 'Banshee' ]); // -- set enemy 
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 1/11
else if(($rand == 6 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Succubus'");
	updateStats($link, $username,['enemy' => 'Succubus' ]); // -- set enemy 
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/11
else if(($rand == 7 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Magma Goblin'");
	updateStats($link, $username,['enemy' => 'Magma Goblin' ]); // -- set enemy 
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/11
else if(($rand == 8 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Magma Kobold'");
	updateStats($link, $username,['enemy' => 'Magma Kobold' ]); // -- set enemy 
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/11
else if(($rand == 9 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Magma Orc'");
	updateStats($link, $username,['enemy' => 'Magma Orc' ]); // -- set enemy 
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/11
else if(($rand == 10 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Magma Ogre'");
	updateStats($link, $username,['enemy' => 'Magma Ogre' ]); // -- set enemy 
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/11
else if(($rand == 11 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Magma Troll'");
	updateStats($link, $username,['enemy' => 'Magma Troll' ]); // -- set enemy 
	include ('battle.php'); 
}										
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	



	
// } // ---end while


?>