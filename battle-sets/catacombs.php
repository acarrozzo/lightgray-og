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
if ($infight < 1 && $endfight != 1)  // -CATACOMBS RAND GENERATOR
	{	$rand = rand (1,10); }	else {$rand=0;}	
	//echo 'RR'.$rand;
// -------------------------------------------------------------------------- INITIALIZE - 1/10
if(($rand == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Skeleton'");
	updateStats($link, $username,['enemy' => 'Skeleton' ]); // -- set enemy 
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 1/10
else if(($rand == 2 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Skeleton Archer'");
	updateStats($link, $username,['enemy' => 'Skeleton Archer' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 1/10
else if(($rand == 3 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Skeleton Knight'");
	updateStats($link, $username,['enemy' => 'Skeleton Knight' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 1/10
else if(($rand == 4 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Skeleton Sorcerer'");
	updateStats($link, $username,['enemy' => 'Skeleton Sorcerer' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 1/10
else if(($rand == 5 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Ancient Skeleton'");
	updateStats($link, $username,['enemy' => 'Ancient Skeleton' ]); // -- set enemy
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- INITIALIZE - RARE - 1/10 * 1/3
else if(($rand == 6 ) && $infight==0 && $endfight==0) 
	{	
	$rand2 = rand(1,3);
	if ($rand2 ==1){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Imp'");
		updateStats($link, $username,['enemy' => 'Imp' ]); // -- set enemy
		include ('battle.php'); 
	}			
	if ($rand2 ==2){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Golden Bat'");
		updateStats($link, $username,['enemy' => 'Golden Bat' ]); // -- set enemy
		include ('battle.php'); 
	}			
	if ($rand2 ==3){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Skeleton Knight'");
		updateStats($link, $username,['enemy' => 'Skeleton Knight' ]); // -- set enemy
		include ('battle.php'); 
	}			
	
	}
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	



	
// } // ---end while


?>