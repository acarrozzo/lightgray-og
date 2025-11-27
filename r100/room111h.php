<?php
							$roomname = "Ogre Treasure Room";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc111h'];
//$dangerLVL = $_SESSION['dangerLVL'] = "8"; // danger level

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

$clicks = $row['clicks'];

$infight = $row['infight'];
$endfight = $row['endfight'];

$giantclub = $row['giantclub'];
$warhammer = $row['warhammer'];
$offhanddagger = $row['offhanddagger'];
$ironhood = $row['ironhood'];
$ringofstrengthIII = $row['ringofstrengthIII'];
$ringofdexterityIII = $row['ringofdexterityIII'];
$ringofmagicIII = $row['ringofmagicIII'];
$ringofdefenseIII = $row['ringofdefenseIII'];
$redpotion = $row['redpotion'];
$currency = $row['currency'];
	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10);$randrare = rand (1,20);  }	else {$rand=0;$randrare=0;}
// -------------------------------------------------------------------------- INITIALIZE SUPER RARE - Ogre Priest - 1/20 PLUS!!
if(($randrare == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Ogre Priest'");
	updateStats($link, $username,['enemy' => 'Ogre Priest' ]); // -- set enemy
	include ('battle.php'); 
}					
// -------------------------------------------------------------------------- INITIALIZE Ogre - 20%
else if($infight==0 && $endfight==0 && ($input=='attack' || $input=='attack ogre' || $rand <= 2 )) 
	{	if ($input=='attack ogre') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Ogre'");
		updateStats($link, $username,['enemy' => 'Ogre' ]); // -- set enemy
		include ('battle.php');	}
// -------------------------------------------------------------------------- INITIALIZE Ogre Guard - 20%
else if( $infight==0 && $endfight==0 && ($input=='attack ogre guard' || $rand == 3 || $rand == 4 ) ) 
	{	if ($input=='attack ogre guard') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Ogre Guard'");
		updateStats($link, $username,['enemy' => 'Ogre Guard' ]); // -- set enemy
		include ('battle.php'); }				
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack ogre' || $input=='attack ogre guard') { $input = 'attack'; } 
		include ('battle.php');	}	


// -------------------------------------------------------------------------- END BATTLE BLOCK


// echo 'OT: '.$_SESSION['ogretreasure'].'<br> OTC: '.$_SESSION['ogretreasurecheck'];



// -------------------------------------------------------------------------- gray chest - reset after 100 clicks
if ($_SESSION['ogretreasure'] == 0) {$_SESSION['ogretreasurecheck'] = 0;} 
	else { $_SESSION['ogretreasure'] = $clicks;}



// -------------------------------------------------------------------------- OPEN CHEST 	
if($input=='open chest') 
{	
	if ($_SESSION['ogretreasure'] >= $_SESSION['ogretreasurecheck'])
	{
	echo $message = "You open the Ogre Treasure Chest!<br>";
	include ('update_feed.php'); // --- update feed
   	$_SESSION['ogretreasure'] = $clicks;	
	$_SESSION['ogretreasurecheck'] = $_SESSION['ogretreasure'] + 100;
	// -------------------------------------------------------------------------- chest reward - ITEM
	$rand = rand (1,4);
	if ($rand == 1) { 
		echo $message = "+ Giant Club<br>";
		include ('update_feed_alt.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET giantclub = giantclub + 1"); 
		$updates = ['giantclub' => $giantclub + 1 ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
	}	

	if ($rand == 2) { 
		echo $message = "+ Warhammer<br>";
		include ('update_feed_alt.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET warhammer = warhammer + 1"); 
		$updates = ['warhammer' => $warhammer + 1 ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
	}	
	if ($rand == 3) { 
		echo $message = "+ Off Hand Dagger<br>";
		include ('update_feed_alt.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET offhanddagger = offhanddagger + 1"); 
		$updates = ['offhanddagger' => $offhanddagger + 1 ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
	}	
	if ($rand == 4) { 
		echo $message = "+ Iron Hood<br>";
		include ('update_feed_alt.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET ironhood = ironhood + 1"); 
		$updates = ['ironhood' => $ironhood + 1 ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
	}		
	// -------------------------------------------------------------------------- chest reward - Ring
	$rand2 = rand(1,4);
	if ($rand2 == 1 ){
		$bonus = 'Ring of Strength III';
		// $results = $link->query("UPDATE $user SET ringofstrengthIII = ringofstrengthIII + 1");
		$updates = ['ringofstrengthIII' => $ringofstrengthIII + 1 ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes 
	}
	if ($rand2 == 2 ){
		$bonus = 'Ring of Dexterity III';
		// $results = $link->query("UPDATE $user SET ringofdexterityIII = ringofdexterityIII + 1"); 
		$updates = ['ringofdexterityIII' => $ringofdexterityIII + 1 ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
	}
	if ($rand2 == 3 ){
		$bonus = 'Ring of Magic III';
		// $results = $link->query("UPDATE $user SET ringofmagicIII = ringofmagicIII + 1"); 
		$updates = ['ringofmagicIII' => $ringofmagicIII + 1 ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
	}
	if ($rand2 == 4 ){
		$bonus = 'Ring of Defense III';
		// $results = $link->query("UPDATE $user SET ringofdefenseIII = ringofdefenseIII + 1"); 
		$updates = ['ringofdefenseIII' => $ringofdefenseIII + 1 ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
	}	
	echo $message = "+ $bonus<br>";
	include ('update_feed_alt.php'); // --- update feed
	// -------------------------------------------------------------------------- chest reward - Potions
	$qty = rand (2,4);
	echo $message = "+ $qty Red Potions<br>";
	include ('update_feed_alt.php'); // --- update feed
	$results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
	$updates = ['redpotion' => $redpotion + $qty ]; // -- set changes
	updateStats($link, $username, $updates); // -- apply changes
	// -------------------------------------------------------------------------- chest reward - Gold
	$qty = rand (500,1500);
	echo $message = "+ $qty " . $_SESSION['currency'] . "<br>";
	include ('update_feed_alt.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET currency = currency + $qty"); 	
	$updates = ['currency' => $currency + $qty ]; // -- set changes
	updateStats($link, $username, $updates); // -- apply changes		
	}


	else { 
	echo "For some reason you can't open the chest now, you should try again later.<br>";
   	$message="<i>For some reason you can't open the chest now, you should try again later.<br></i><br>";
	include ('update_feed.php'); // --- update feed
	}
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

// else if($input=='se' || $input=='southeast') 
// {	echo 'You travel southeast<br>';
//    	$message="<i>You travel southeast</i><br>".$_SESSION['desc111g'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = '111g'"); // -- room change
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	$_SESSION['ogresearch'] = 0;	
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'southeast') { 
	$roomNum = '111g';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['ogresearch'] = 0;
} 

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
