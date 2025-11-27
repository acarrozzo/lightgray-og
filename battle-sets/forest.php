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
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,30); }	else {$rand=	0;}	
// -------------------------------------------------------------------------- INITIALIZE bigfoot / wild boar / snake - 1/30
if(($rand == 1 ) && $infight==0 && $endfight==0) {
$rand2 = rand (1,3);
	if ($rand2 == 1){ 
	// $results = $link->query("UPDATE $user SET enemy = 'Bigfoot'");
	updateStats($link, $username,['enemy' => 'Bigfoot' ]); // -- set enemy 
	include ('battle.php'); 
}		
	if ($rand2 == 2){ 
	// $results = $link->query("UPDATE $user SET enemy = 'Hawk'");
	updateStats($link, $username,['enemy' => 'Hawk' ]); // -- set enemy 
	include ('battle.php'); 
}		
	if ($rand2 == 3){ 
	// $results = $link->query("UPDATE $user SET enemy = 'Snake'");
	updateStats($link, $username,['enemy' => 'Snake' ]); // -- set enemy 
	include ('battle.php'); 
}		
	}	
// -------------------------------------------------------------------------- INITIALIZE - 1/30
else if(($rand == 2 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Wolf'");
	updateStats($link, $username,['enemy' => 'Wolf' ]); // -- set enemy 
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 1/30
else if(($rand == 3 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Coyote'");
	updateStats($link, $username,['enemy' => 'Coyote' ]); // -- set enemy 
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- INITIALIZE - 1/30
else if(($rand == 4 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Buck'");
	updateStats($link, $username,['enemy' => 'Buck' ]); // -- set enemy 
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- INITIALIZE - 1/30
else if(($rand == 5 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Bear'");
	updateStats($link, $username,['enemy' => 'Bear' ]); // -- set enemy 
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- INITIALIZE - 1/30
else if(($rand == 6 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Stag'");
	updateStats($link, $username,['enemy' => 'Stag' ]); // -- set enemy 
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- INITIALIZE - 1/30
else if(($rand == 7 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Wild Boar'");
	updateStats($link, $username,['enemy' => 'Wild Boar' ]); // -- set enemy 
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 3x1/30 = 1/90, 1/90, 1/90 - rare battles
else if(($rand == 8 ) && $infight==0 && $endfight==0) 
	{	
	$rand2 = rand (1,3);
	if ($rand2 == 1){ 
	// $results = $link->query("UPDATE $user SET enemy = 'Bigfoot'");
	updateStats($link, $username,['enemy' => 'Bigfoot' ]); // -- set enemy 
	include ('battle.php'); 
}		
	if ($rand2 == 2){ 
	// $results = $link->query("UPDATE $user SET enemy = 'Hawk'");
	updateStats($link, $username,['enemy' => 'Hawk' ]); // -- set enemy	
	include ('battle.php'); 
}		
	if ($rand2 == 3){ 
	// $results = $link->query("UPDATE $user SET enemy = 'Imp'");
	updateStats($link, $username,['enemy' => 'Imp' ]); // -- set enemy 
	include ('battle.php'); 
}		
	}			
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	


	
	
// } // ---end while


?>