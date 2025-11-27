<?php
// --------------------------------------------------------------------------------- DUMMY BATTLE
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

		
		
		$xp=$row['xp'];   
		
		$hp=$row['hp'];      // User Stats
		$hpmax=$row['hpmax'];   
		$mp=$row['mp'];   
		$mpmax=$row['mpmax'];  
		$str=$row['str']; $strmod=$_SESSION['strmod'];   
		$dex=$row['dex']; $dexmod=$_SESSION['dexmod'];   
		$mag=$row['mag']; $magmod=$_SESSION['magmod'];    
		$def=$row['def']; $defmod=$_SESSION['defmod']; 
		
		
		$onehanded=$row['onehanded'];   
		$twohanded=$row['twohanded'];   
		$ranged=$row['ranged'];   
				
		$equipR=$row['equipR'];  
		$level=$row['level'];  

 if ($input == 'attack' || $input == 'a' || $input == 'attack dummy' || $input == 'attack dummy again')
	 {
		 if ($row['weapontype']==3){
			 $damage = rand ( 0 , $row['dexmod']);      
			//$damageskill = rand (0, $ranged);
			//$damage = $damageraw + $damageskill ; 
			$colorDUM='green';		
		}		
		
		else {
		 $damage = rand ( 0 , $_SESSION['strmod']);
		 			$colorDUM='lightred';		

		}
		$block = 0;
		$damageTotal = $damage - $block;
		
		 
 		$smash=$level * ($level + 1); // for cheat XP - un-comment below:
		// $results = $link->query("UPDATE $user SET xp = xp + $smash");
		// $results = $link->query("UPDATE $user SET currency = currency + 10000");

		 		 		 
	echo "You attack the Dummy with your $equipR for $damageTotal damage.<br>";
	
			
	$message= "You attack the Dummy with your <span class='red'>$equipR</span> for <span class='h3 $colorDUM'>$damageTotal</span> damage.<br>";
	

		include ('update_feed.php'); // --- update feed
	} 
// }

   
   ?>
