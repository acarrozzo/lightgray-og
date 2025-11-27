<?php
						$roomname = "Sunken Ship";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc489'];

include ('function-start.php'); 

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
	

$offhandsword = $row['offhandsword'];
$ironnunchaku = $row['ironnunchaku'];
$steelstaff = $row['steelstaff'];
$glowingorb = $row['glowingorb'];
$ironboots = $row['ironboots'];
$redbalm = $row['redbalm'];
$blues = $row['blues'];
$reds = $row['reds'];
$greens = $row['greens'];
$yellows = $row['yellows'];
	
	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // -UNDER OCEAN RAND GENERATOR
	{	$rand = rand (1,21); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE 7/21
if(($rand == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Giant Sea Turtle'");
	updateStats($link, $username,['enemy' => 'Giant Sea Turtle' ]); // -- set enemy 
	include ('battle.php'); 
}		 // - 1/21
else if(($rand == 2 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Giant Sea Turtle'");
	updateStats($link, $username,['enemy' => 'Giant Sea Turtle' ]); // -- set enemy
	include ('battle.php'); 
}				
else if(($rand == 3 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Colossal Squid'");
	updateStats($link, $username,['enemy' => 'Colossal Squid' ]); // -- set enemy
	include ('battle.php'); 
}		
else if(($rand == 4 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Colossal Squid'");
	updateStats($link, $username,['enemy' => 'Colossal Squid' ]); // -- set enemy
	include ('battle.php'); 
}		
else if(($rand == 5 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Glowing Octopus'");
	updateStats($link, $username,['enemy' => 'Glowing Octopus' ]); // -- set enemy
	include ('battle.php'); 
}		
else if(($rand == 6 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Squid'");
	updateStats($link, $username,['enemy' => 'Squid' ]); // -- set enemy
	include ('battle.php'); 
}				// - 1/21
else if(($rand == 7 ) && $infight==0 && $endfight==0) 
	{	
		$rand2 = rand(1,9);
		if($rand2 == 1 ) { 
		// $results = $link->query("UPDATE $user SET enemy = 'Glowing Octopus'");
		updateStats($link, $username,['enemy' => 'Glowing Octopus' ]); // -- set enemy
	include ('battle.php'); 
}		 // - 1/
		if($rand2 == 2 ) { 
		// $results = $link->query("UPDATE $user SET enemy = 'King Squid'");
		updateStats($link, $username,['enemy' => 'King Squid' ]); // -- set enemy
		
	include ('battle.php'); 
}		 //
		if($rand2 == 3 ) { 
		// $results = $link->query("UPDATE $user SET enemy = 'Great White'");
		updateStats($link, $username,['enemy' => 'Great White' ]); // -- set enemy
	include ('battle.php'); 
}		 // - 1/
		if($rand2 == 4 ) { 
		// $results = $link->query("UPDATE $user SET enemy = 'Hammerhead'");
		updateStats($link, $username,['enemy' => 'Hammerhead' ]); // -- set enemy
	include ('battle.php'); 
}			 // - 1/
		if($rand2 == 5 ) { 
		// $results = $link->query("UPDATE $user SET enemy = 'Crocodile'");
		updateStats($link, $username,['enemy' => 'Crocodile' ]); // -- set enemy
	include ('battle.php'); 
}			 // - 1/
		if($rand2 == 6 ) { 
		// $results = $link->query("UPDATE $user SET enemy = 'Jellyfish'");
		updateStats($link, $username,['enemy' => 'Jellyfish' ]); // -- set enemy
	include ('battle.php'); 
}			 // - 1/
		if($rand2 == 7 ) { 
		// $results = $link->query("UPDATE $user SET enemy = 'Electric Eel'");
		updateStats($link, $username,['enemy' => 'Electric Eel' ]); // -- set enemy
	include ('battle.php'); 
}			 // - 1/
		if($rand2 == 8 ) { 
		// $results = $link->query("UPDATE $user SET enemy = 'Piranha'");
		updateStats($link, $username,['enemy' => 'Piranha' ]); // -- set enemy
	include ('battle.php'); 
}			 // - 1/
		if($rand2 == 9 ) { 	
			echo $message="<i>For a brief moment you see a glowing squid looking thing, but then it swims back into the shadows.</i><br>";	
		include ('update_feed.php');   // --- update feed
		}	 // - 1/105
	}

	
						
// -------------------------------------------------------------------------- IN BATTLE	
	
else if ($infight >=1 ) { include ('battle.php'); }	

	

// include ('battle-sets/blueocean-underwater.php'); // blue ocean battle set
include ('random-encounters/blueocean-underwater.php'); // blue ocean battle set




// -------------------------------------------------------------------------- SEARCH Sunken Ship
if ($input == 'search')
{
	$rand = rand (1,2); 			//		1/2
	if ($rand == 1) {
		$rand2 = rand(1,10);		//		1/10
		if ($rand2 ==1){
			echo $message="You search the sunken ship and find an Off Hand Sword!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET offhandsword = offhandsword + 1");
					updateStats($link, $username,['offhandsword' => $offhandsword + 1 ]); // -- update stat 

		}
		if ($rand2 ==2){
			echo $message="You search the sunken ship and find an Iron Nunchaku!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET ironnunchaku = ironnunchaku + 1");
					updateStats($link, $username,['ironnunchaku' => $ironnunchaku + 1 ]); // -- update stat 
		}
		if ($rand2 ==3){
			echo $message="You search the sunken ship and find a Steel Staff!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET steelstaff = steelstaff + 1");
					updateStats($link, $username,['steelstaff' => $steelstaff + 1 ]); // -- update stat
		}
		if ($rand2 ==4){
			echo $message="You search the sunken ship and find a Glowing Orb!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET glowingorb = glowingorb + 1");
					updateStats($link, $username,['glowingorb' => $glowingorb + 1 ]); // -- update stat
		}
		if ($rand2 ==5){
			echo $message="You search the sunken ship and find a pair of Iron Boots!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET ironboots = ironboots + 1");
					updateStats($link, $username,['ironboots' => $ironboots + 1 ]); // -- update stat
		}
		if ($rand2 ==6){
			echo $message="You search the sunken ship and find a Red Balm!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET redbalm = redbalm + 1");
					updateStats($link, $username,['redbalm' => $redbalm + 1 ]); // -- update stat
		}
		if ($rand2 ==7){
			echo $message="You search the sunken ship and find some Blues!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET blues = blues + 1");
					updateStats($link, $username,['blues' => $blues + 1 ]); // -- update stat
		}
		if ($rand2 ==8){
			echo $message="You search the sunken ship and find some Reds!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET reds = reds + 1");
					updateStats($link, $username,['reds' => $reds + 1 ]); // -- update stat	
		}
		if ($rand2 ==9){
			echo $message="You search the sunken ship and find some Greens!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET greens = greens + 1");
					updateStats($link, $username,['greens' => $greens + 1 ]); // -- update stat
		}
		if ($rand2 ==10){
			echo $message="You search the sunken ship and find some Yellows!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET yellows = yellows + 1");
					updateStats($link, $username,['yellows' => $yellows + 1 ]); // -- update stat
		}
	}
	else {
		echo $message="You search the sunken ship and find nothing, you should search again.<br>";
		include ('update_feed.php'); // --- update feed
	}
	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	updateStats($link, $username, ['endfight' => 0]); // -- update stats
}

	


// -------------------------------------------------------------------------- Battle TRAVEL
if ((	$input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='east' || $input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' || $input=='down' )  && $infight >= 1) {
	echo 'You cannot leave the room in the middle of battle!<br>';
   	$message="<i>You cannot leave the room in the middle of battle!</i><br>";
	include ('update_feed.php'); // --- update feed
	}
// -------------------------------------------------------------------------- TRAVEL

else if($input=='nw' || $input=='northwest') 
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim northwest<br>';
   		$message="<i>You swim northwest</i><br>".$_SESSION['desc498'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '498'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '498' ]); // -- update stats

		} else{
 		echo $message="<i>You can't swim that way! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='ne' || $input=='northeast') 
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim northeast<br>';
   		$message="<i>You swim northeast</i><br>".$_SESSION['desc488'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '488'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '488' ]); // -- update stats

		} else{
 		echo $message="<i>You can't swim that way! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}

else if($input=='se' || $input=='southeast') 
{			echo 'You travel southeast into the Mud Crab Nest.<br>';
   	$message="<i>You travel southeast into the Mud Crab Nest</i><br>".$_SESSION['desc492'];
	include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = 492"); // -- room change
       updateStats($link, $username,['endfight' => 0, 'room' => '492' ]); // -- update stats
}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>