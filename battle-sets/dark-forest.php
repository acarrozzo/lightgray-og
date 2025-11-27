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
	{	$rand = rand (1,20);
		$randrare = rand (1,200); 
	
		//echo 'RR: '.$randrare.' :: ';
	}	
		else {$rand=0;$randrare=0;}	
// -------------------------------------------------------------------------- INITIALIZE SUPER RARE - Wisp - 1/200
if(($randrare == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Wisp'");
	updateStats($link, $username,['enemy' => 'Wisp' ]); // -- set enemy 
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE low RARES - 1/15 -> 1/6
else if(($rand == 1 ) && $infight==0 && $endfight==0) {
	$rand2 = rand (1,6);
		 if ($rand2 == 1){ 
    //   $results = $link->query("UPDATE $user SET enemy = 'Bigfoot'");
			updateStats($link, $username,['enemy' => 'Bigfoot' ]); // -- set enemy 
			include ('battle.php'); 
		}		
	else if ($rand2 == 2){ 
    //   $results = $link->query("UPDATE $user SET enemy = 'Imp'");
			updateStats($link, $username,['enemy' => 'Imp' ]); // -- set enemy 
			include ('battle.php'); 
		}		
	else if ($rand2 == 3){ 
    //   $results = $link->query("UPDATE $user SET enemy = 'Bowman'");
			updateStats($link, $username,['enemy' => 'Bowman' ]); // -- set enemy
			include ('battle.php'); 
		}		
	else if ($rand2 == 4){ 
    //   $results = $link->query("UPDATE $user SET enemy = 'Falcon'");
			updateStats($link, $username,['enemy' => 'Falcon' ]); // -- set enemy
			include ('battle.php'); 
		}		
	else if ($rand2 == 5){ 
    //   $results = $link->query("UPDATE $user SET enemy = 'Ent'");
			updateStats($link, $username,['enemy' => 'Ent' ]); // -- set enemy
			include ('battle.php'); 
		}		
	else if ($rand2 == 6){ 
    //   $results = $link->query("UPDATE $user SET enemy = 'Dark Ranger'");
			updateStats($link, $username,['enemy' => 'Dark Ranger' ]); // -- set enemy
			include ('battle.php'); 
		}		
	}	
// -------------------------------------------------------------------------- INITIALIZE - 1
else if(($rand == 3 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Troll'");
	updateStats($link, $username,['enemy' => 'Troll' ]); // -- set enemy
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- INITIALIZE - 1
else if(($rand == 4 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Troll Shaman'");
	updateStats($link, $username,['enemy' => 'Troll Shaman' ]); // -- set enemy
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- INITIALIZE - 1
else if(($rand == 5 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Troll Sorcerer'");
	updateStats($link, $username,['enemy' => 'Troll Sorcerer' ]); // -- set enemy
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- INITIALIZE - 1
else if(($rand == 6 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Troll Elder'");
	updateStats($link, $username,['enemy' => 'Troll Elder' ]); // -- set enemy
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- INITIALIZE - 1
else if(($rand == 7 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Troll Elder'");
	updateStats($link, $username,['enemy' => 'Troll Elder' ]); // -- set enemy
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- INITIALIZE - 1
else if(($rand == 8 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Troll Champion'");
	updateStats($link, $username,['enemy' => 'Troll Champion' ]); // -- set enemy
	include ('battle.php'); 
}				
				
		
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	


	
	
// } // ---end while


?>