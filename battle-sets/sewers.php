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
	{	$rand = rand (1,35); }	else {$rand=0;}	
	//echo 'RR'.$rand;
// -------------------------------------------------------------------------- INITIALIZE - 1/35
if(($rand == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Rat'");
	updateStats($link, $username,['enemy' => 'Rat' ]); // -- set enemy 
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 2 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Giant Rat'");
	updateStats($link, $username,['enemy' => 'Giant Rat' ]); // -- set enemy
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 3 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Thief'");
	updateStats($link, $username,['enemy' => 'Thief' ]); // -- set enemy
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 4 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Spider'");
	updateStats($link, $username,['enemy' => 'Spider' ]); // -- set enemy
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 5 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Snake'");
	updateStats($link, $username,['enemy' => 'Snake' ]); // -- set enemy
	include ('battle.php'); 
}		

// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 6 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Goblin'");
	updateStats($link, $username,['enemy' => 'Goblin' ]); // -- set enemy
	include ('battle.php'); 
}		

// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 7 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Bat'");
	updateStats($link, $username,['enemy' => 'Bat' ]); // -- set enemy
	include ('battle.php'); 
}		

// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 8 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Golden Bat'");
	updateStats($link, $username,['enemy' => 'Golden Bat' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 9 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Salamander'");
	updateStats($link, $username,['enemy' => 'Salamander' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 10 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Skeleton'");
	updateStats($link, $username,['enemy' => 'Skeleton' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 11 || $rand == 12) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Tarantula'");
	updateStats($link, $username,['enemy' => 'Tarantula' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 13 || $rand == 14 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Sewer Rat'");
	updateStats($link, $username,['enemy' => 'Sewer Rat' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 15 || $rand == 16 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Red Gator'");
	updateStats($link, $username,['enemy' => 'Red Gator' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 17 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Flying Dung Beetle'");
	updateStats($link, $username,['enemy' => 'Flying Dung Beetle' ]); // -- set enemy	
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 18 ) && $infight==0 && $endfight==0) 
	{	
	$rand2 = rand(1,2);
	if ($rand2 ==1){
		// $results = $link->query("UPDATE $user SET enemy = 'Imp'");
		updateStats($link, $username,['enemy' => 'Imp' ]); // -- set enemy
	include ('battle.php'); 
}			
	else {echo 'No Imp this time!<br>';}
	}
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	



	
// } // ---end while


?>