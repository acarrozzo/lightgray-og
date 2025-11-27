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


 	$KLjiemji=$_SESSION['KLjiemji'];
 	$KLjikay=$_SESSION['KLjikay'];
 	$KLgiantmountaingiant=$_SESSION['KLgiantmountaingiant'];
  $KLgatekeeper=$_SESSION['KLgatekeeper'];
  $KLkingblade=$_SESSION['KLkingblade'];


// -------------------------------------------------------------------------- After Battle - SAFE ROOM
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br>"; }
// -------------------------------------------------------------------------- If room ready create random rand #


if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{
		$rand = rand (1,15);
		$randrare = rand (1,50);
	}
		else {$rand=0;$randrare=0;}

// -------------------------------------------------------------------------- INITIALIZE Jikay or Jiemji or KING BLADE
if(($randrare == 1 ) && $infight==0 && $endfight==0)
	{

		if ($KLjikay>=1 && $KLjiemji>=1 && $KLkingblade >=1) { // DEFEATED ALL OF THEM
			$rand2 = rand (1,3);
			if ($rand2 == 1){ 
				// $results = $link->query("UPDATE $user SET enemy = 'Jikay'");
				updateStats($link, $username,['enemy' => 'Jikay' ]); // -- set enemy 
	include ('battle.php'); 
}		
			else if ($rand2 == 2){ 
				// $results = $link->query("UPDATE $user SET enemy = 'Jiemji'");
				updateStats($link, $username,['enemy' => 'Jiemji' ]); // -- set enemy
	include ('battle.php'); 
}		
			else if ($rand2 == 3){ 
				// $results = $link->query("UPDATE $user SET enemy = 'King Blade'");
				updateStats($link, $username,['enemy' => 'King Blade' ]); // -- set enemy
	include ('battle.php'); 
}		
		}
		else if ($KLjikay>=1 && $KLjiemji>=1 && $KLkingblade ==0) { // READY FOR KING BLADE
			$rand2 = rand (1,5);
			if ($rand2 == 1){ 
				// $results = $link->query("UPDATE $user SET enemy = 'Jikay'");
				updateStats($link, $username,['enemy' => 'Jikay' ]); // -- set enemy
	include ('battle.php'); 
}		
			else if ($rand2 == 2){ 
				// $results = $link->query("UPDATE $user SET enemy = 'Jiemji'");
				updateStats($link, $username,['enemy' => 'Jiemji' ]); // -- set enemy
	include ('battle.php'); 
}		
			else if ($rand2 == 3){ 
				// $results = $link->query("UPDATE $user SET enemy = 'King Blade'");
				updateStats($link, $username,['enemy' => 'King Blade' ]); // -- set enemy
	include ('battle.php'); 
}		
			else if ($rand2 == 4){ 
				// $results = $link->query("UPDATE $user SET enemy = 'King Blade'");
				updateStats($link, $username,['enemy' => 'King Blade' ]); // -- set enemy
	include ('battle.php'); 
}		
			else if ($rand2 == 5){ 
				// $results = $link->query("UPDATE $user SET enemy = 'King Blade'");
				updateStats($link, $username,['enemy' => 'King Blade' ]); // -- set enemy
	include ('battle.php'); 
}		
		}
		else if ($KLjikay>=1 && $KLjiemji==0) {
			// $results = $link->query("UPDATE $user SET enemy = 'Jiemji'");
			updateStats($link, $username,['enemy' => 'Jiemji' ]); // -- set enemy
			include ('battle.php');
		}
		else if ($KLjikay==0 && $KLjiemji>=1) {
			// $results = $link->query("UPDATE $user SET enemy = 'Jikay'"); 
			updateStats($link, $username,['enemy' => 'Jikay' ]); // -- set enemy
			include ('battle.php');
		}
		else if ($KLgiantmountaingiant>=1 || $KLgatekeeper>=1) {
			$rand2 = rand (1,2);
			if ($rand2 == 1){ 
				// $results = $link->query("UPDATE $user SET enemy = 'Jikay'");
				updateStats($link, $username,['enemy' => 'Jikay' ]); // -- set enemy
	include ('battle.php'); 
}		
			if ($rand2 == 2){ 
				// $results = $link->query("UPDATE $user SET enemy = 'Jiemji'");
				updateStats($link, $username,['enemy' => 'Jiemji' ]); // -- set enemy
	include ('battle.php'); 
}		
		}
		else {
			// $results = $link->query("UPDATE $user SET enemy = 'Flying Dung Beetle'"); 
			updateStats($link, $username,['enemy' => 'Flying Dung Beetle' ]); // -- set enemy
			include ('battle.php');
		}
	}





// -------------------------------------------------------------------------- INITIALIZE low RARES - 1/15 -> 1/7
else if(($rand == 1 ) && $infight==0 && $endfight==0) {
	$rand2 = rand (1,7);

		 if ($rand2 == 1){ 
			// $results = $link->query("UPDATE $user SET enemy = 'Bowman'");
			updateStats($link, $username,['enemy' => 'Bowman' ]); // -- set enemy
	include ('battle.php'); 
}		
	else if ($rand2 == 2){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Highwayman'");
		updateStats($link, $username,['enemy' => 'Highwayman' ]); // -- set enemy
	include ('battle.php'); 
}		
	else if ($rand2 == 3){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Imp'");
		updateStats($link, $username,['enemy' => 'Imp' ]); // -- set enemy
	include ('battle.php'); 
}		
	else if ($rand2 == 4){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Wisp'");
		updateStats($link, $username,['enemy' => 'Wisp' ]); // -- set enemy
	include ('battle.php'); 
}		
	else if ($rand2 == 5){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Falcon'");
		updateStats($link, $username,['enemy' => 'Falcon' ]); // -- set enemy
	include ('battle.php'); 
}		
	else if ($rand2 == 6){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Dark Ranger'");
		updateStats($link, $username,['enemy' => 'Dark Ranger' ]); // -- set enemy
	include ('battle.php'); 
}		
	else if ($rand2 == 7){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Ent'");
		updateStats($link, $username,['enemy' => 'Ent' ]); // -- set enemy
	include ('battle.php'); 
}		
	}
// -------------------------------------------------------------------------- INITIALIZE - 1/15
else if(($rand == 2 ) && $infight==0 && $endfight==0)
	{	
		// $results = $link->query("UPDATE $user SET enemy = 'Mountain Giant'");
		
		updateStats($link, $username,['enemy' => 'Mountain Giant' ]); // -- set enemy
		include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/15
else if(($rand == 3 ) && $infight==0 && $endfight==0)
	{	
		// $results = $link->query("UPDATE $user SET enemy = 'Ice Troll'");
		updateStats($link, $username,['enemy' => 'Ice Troll' ]); // -- set enemy
		include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/15
else if(($rand == 4 ) && $infight==0 && $endfight==0)
	{	
		// $results = $link->query("UPDATE $user SET enemy = 'Giant Brute'");
		updateStats($link, $username,['enemy' => 'Giant Brute' ]); // -- set enemy
		include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/15
else if(($rand == 5 ) && $infight==0 && $endfight==0)
	{	
		// $results = $link->query("UPDATE $user SET enemy = 'Wyvern'");
		updateStats($link, $username,['enemy' => 'Wyvern' ]); // -- set enemy
		include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/15
else if(($rand == 6 ) && $infight==0 && $endfight==0)
	{	
		// $results = $link->query("UPDATE $user SET enemy = 'Stone Dwarf'");
		updateStats($link, $username,['enemy' => 'Stone Dwarf' ]); // -- set enemy
		include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/15 -> 1/7
else if(($rand == 7 ) && $infight==0 && $endfight==0)
	{	$rand2 = rand (1,7);
		 if ($rand2 == 1){ 
			// $results = $link->query("UPDATE $user SET enemy = 'Yeti'");
			updateStats($link, $username,['enemy' => 'Yeti' ]); // -- set enemy
	include ('battle.php'); 
}		
	else if ($rand2 == 2){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Yeti'");
		updateStats($link, $username,['enemy' => 'Yeti' ]); // -- set enemy
	include ('battle.php'); 
}		
	else if ($rand2 == 3){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Yeti'");
		updateStats($link, $username,['enemy' => 'Yeti' ]); // -- set enemy
		include ('battle.php'); 
}		
	else if ($rand2 == 4){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Snow Ogre'");
		updateStats($link, $username,['enemy' => 'Snow Ogre' ]); // -- set enemy
		include ('battle.php'); 
}		
	else if ($rand2 == 5){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Snow Ninja'");
		updateStats($link, $username,['enemy' => 'Snow Ninja' ]); // -- set enemy
		include ('battle.php'); 
}		
	else if ($rand2 == 6){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Snow Owl'");
		updateStats($link, $username,['enemy' => 'Snow Owl' ]); // -- set enemy
		include ('battle.php'); 
}		
	else if ($rand2 == 7){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Dragon'");
		updateStats($link, $username,['enemy' => 'Dragon' ]); // -- set enemy
		include ('battle.php'); 
}		

	 }


// -------------------------------------------------------------------------- IN BATTLE
else if ($infight >=1 ) { include ('battle.php'); }




// // } // ---end while


?>
