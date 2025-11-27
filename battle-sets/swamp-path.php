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
	{	
        $rand = rand (1,10);
		$randrare = rand (1,200); 
	}	
		else {$rand=0;$randrare=0;}	
// -------------------------------------------------------------------------- INITIALIZE SUPER RARES - 1/200
if(($randrare == 1 ) && $infight==0 && $endfight==0) 
    {	
    $rand2 = rand (1,3);
         if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Rogue Imperial'");
	include ('battle.php'); 
}		
    else if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Infinity Mage'");
	include ('battle.php'); 
}		
    else if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Venom Dragon'");
	include ('battle.php'); 
}		
    }	



// -------------------------------------------------------------------------- INITIALIZE - 1/10
else if(($rand == 1 ) && $infight==0 && $endfight==0) 
{	$results = $link->query("UPDATE $user SET enemy = 'Bull Frog'");
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- INITIALIZE - 1/10
else if(($rand == 2 ) && $infight==0 && $endfight==0) 
{	$results = $link->query("UPDATE $user SET enemy = 'Bull Frog'");
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE - 1/10
else if(($rand == 3 ) && $infight==0 && $endfight==0) 
{	$results = $link->query("UPDATE $user SET enemy = 'Newt'");
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- INITIALIZE - 1/10
else if(($rand == 4 ) && $infight==0 && $endfight==0) 
{	$results = $link->query("UPDATE $user SET enemy = 'Newt'");
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- INITIALIZE - 1/10
else if(($rand == 5 ) && $infight==0 && $endfight==0) 
	{	
    $rand2 = rand (1,2);
         if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Lizard Thief'");
	include ('battle.php'); 
}		
    else if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Dervish Assassin'");
	include ('battle.php'); 
}		
    }	

	// -------------------------------------------------------------------------- INITIALIZE low RARES - 1/10 -> 1/11
else if(($rand == 6 ) && $infight==0 && $endfight==0) {
	$rand2 = rand (1,11);
	     if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Salamander'");
	include ('battle.php'); 
}		
	else if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Flying Dung Beetle'");
	include ('battle.php'); 
}		
	else if ($rand2 == 3){ $results = $link->query("UPDATE $user SET enemy = 'Snake'");
	include ('battle.php'); 
}		
	else if ($rand2 == 4){ $results = $link->query("UPDATE $user SET enemy = 'Imp'");
	include ('battle.php'); 
}		
	else if ($rand2 == 5){ $results = $link->query("UPDATE $user SET enemy = 'Skeleton'");
	include ('battle.php'); 
}		
	else if ($rand2 == 6){ $results = $link->query("UPDATE $user SET enemy = 'Kobold Champion'");
	include ('battle.php'); 
}		
	else if ($rand2 == 7){ $results = $link->query("UPDATE $user SET enemy = 'Red Bandit'");
	include ('battle.php'); 
}		
	else if ($rand2 == 8){ $results = $link->query("UPDATE $user SET enemy = 'Bandit Marauder'");
	include ('battle.php'); 
}		
	else if ($rand2 == 9){ $results = $link->query("UPDATE $user SET enemy = 'Rabid Skeever'");
	include ('battle.php'); 
}		
	else if ($rand2 == 10){ $results = $link->query("UPDATE $user SET enemy = 'Demon Wing'");
	include ('battle.php'); 
}		
	else if ($rand2 == 11){ $results = $link->query("UPDATE $user SET enemy = 'Dragon'");
	include ('battle.php'); 
}		
	}
    
 //   salamander, flying dung beetle, snake, imp, skeleton, kobold champion, red bandit, bandit marauder, rabid skeever, demon wing, dragon
		
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	


	
	
// } // ---end while
