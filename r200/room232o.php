<?php
							  $roomname = "Thieve's Den Treasure Room";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc232o'];
//$dangerLVL = $_SESSION['dangerLVL'] = "14"; // danger level

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

$infight = $row['infight'];
$endfight = $row['endfight'];


$ironboomerang=$row['ironboomerang'];
$ironbow=$row['ironbow'];
$banditgloves=$row['banditgloves'];
$banditboots=$row['banditboots'];
$ringofstrengthV=$row['ringofstrengthV'];
$ringofdexterityV=$row['ringofdexterityV'];
$ringofmagicV=$row['ringofmagicV'];
$ringofdefenseV=$row['ringofdefenseV'];
$ringofhealthregen=$row['ringofhealthregen'];
$ringofmanaregen=$row['ringofmanaregen'];
$currency=$row['currency'];


// -------------------------------------------------------------------------- OPEN THIEF CHEST 	

// $_SESSION['thieftreasure'] = $_SESSION['thieftreasure']+99; // TO TEST BELOW WITHOUT 100 CLICKS

$clicks = $row['clicks'];

// -------------------------------------------------------------------------- gray chest - reset after 100 clicks
if ($_SESSION['thieftreasure'] == 0) {$_SESSION['thieftreasurecheck'] = 0;} 
	else { $_SESSION['thieftreasure'] = $clicks; }

// -------------------------------------------------------------------------- OPEN CHEST 	
if($input=='open chest') 
{
	if ($_SESSION['thieftreasure'] >= $_SESSION['thieftreasurecheck'])
	{
	echo $message = "You open the Thieve's Treasure Chest!<br>";
	include ('update_feed.php'); // --- update feed
   	$_SESSION['thieftreasure'] = $clicks;	
	$_SESSION['thieftreasurecheck'] = $_SESSION['thieftreasure'] + 100;
	// -------------------------------------------------------------------------- chest reward - ITEM
	$rand = rand (1,4);
	if ($rand == 1) { 
		echo $message = "+ Iron Boomerang<br>";
		include ('update_feed_alt.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET ironboomerang = ironboomerang + 1"); 
		updateStats($link, $username,['ironboomerang' => $ironboomerang + 1 ]); // -- update stat 
		}
	if ($rand == 2) { 
		echo $message = "+ Iron Bow<br>";
		include ('update_feed_alt.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET ironbow = ironbow + 1"); 
		updateStats($link, $username,['ironbow' => $ironbow + 1 ]); // -- update stat 
		}
	if ($rand == 3) { 
		echo $message = "+ Bandit Gloves<br>";
		include ('update_feed_alt.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET banditgloves = banditgloves + 1"); 
		updateStats($link, $username,['banditgloves' => $banditgloves + 1 ]); // -- update stat 
		}
	if ($rand == 4) { 
		echo $message = "+ Bandit Boots<br>";
		include ('update_feed_alt.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET banditboots = banditboots + 1"); 
		updateStats($link, $username,['banditboots' => $banditboots + 1 ]); // -- update stat 
		}	
	// -------------------------------------------------------------------------- chest reward - Ring
	$rand2 = rand(1,4);
	if ($rand2 == 1 ){
		$bonus = 'Ring of Strength V';
		// $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1"); 
		updateStats($link, $username,['ringofstrengthV' => $ringofstrengthV + 1 ]); // -- update stat 
		}
	if ($rand2 == 2 ){
		$bonus = 'Ring of Dexterity V';
		// $results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV + 1"); 
		updateStats($link, $username,['ringofdexterityV' => $ringofdexterityV + 1 ]); // -- update stat
		}
	if ($rand2 == 3 ){
		$bonus = 'Ring of Magic V';
		// $results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1"); 
		updateStats($link, $username,['ringofmagicV' => $ringofmagicV + 1 ]); // -- update stat 
		}
	if ($rand2 == 4 ){
		$bonus = 'Ring of Defense V';
		// $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1");
		updateStats($link, $username,['ringofdefenseV' => $ringofdefenseV + 1 ]); // -- update stat  
		}
	echo $message = "+ $bonus<br>";
	include ('update_feed_alt.php'); // --- update feed
	// -------------------------------------------------------------------------- chest reward - Ring regen
	$rand2 = rand(1,2);
	if ($rand2 == 1 ){
		$bonus = 'Ring of Health Regen';
		// $results = $link->query("UPDATE $user SET ringofhealthregen = ringofhealthregen + 1"); 
		updateStats($link, $username,['ringofhealthregen' => $ringofhealthregen + 1 ]); // -- update stat 
		}
	if ($rand2 == 2 ){
		$bonus = 'Ring of Mana Regen';
		// $results = $link->query("UPDATE $user SET ringofmanaregen = ringofmanaregen + 1"); 
		updateStats($link, $username,['ringofmanaregen' => $ringofmanaregen + 1 ]); // -- update stat 
		}
	echo $message = "+ $bonus<br>";
	include ('update_feed_alt.php'); // --- update feed
	// -------------------------------------------------------------------------- chest reward - Gold
	$qty = rand (2000,5000);
	echo $message = "+ $qty ".$_SESSION['currency']."<br>";
	include ('update_feed_alt.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET currency = currency + $qty");	
	updateStats($link, $username,['currency' => $currency + $qty ]); // -- update stat	
	}
	else { 
	echo "For some reason you can't open the chest now, you should try again later.<br>";
   	$message="<i>For some reason you can't open the chest now, you should try again later.<br></i><br>";
	include ('update_feed.php'); // --- update feed
	}
}




	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE Master Thief - 5/10
if(($rand <= 5 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Master Thief'");
	updateStats($link, $username,['enemy' => 'Master Thief' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE Thief Brute - 1/10 - removed
// else if(($rand == 4 ) && $infight==0 && $endfight==0) {	
//     // $results = $link->query("UPDATE $user SET enemy = 'Thief Brute'");
// 	updateStats($link, $username,['enemy' => 'Thief Brute' ]); // -- set enemy
// 	include ('battle.php'); 
// }								
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	







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

// else if($input=='w' || $input=='west') 
// {			echo 'You travel west<br>';
// 			$message="<i>You travel west</i><br>".$_SESSION['desc232n'];
// 			include ('update_feed.php');   // --- update feed
// 			$results = $link->query("UPDATE $user SET room = '232n'"); // -- room change
// 			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 		   	$_SESSION['thievesdensearch'] = 0;
// }


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'west') {     $roomNum = '232n';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>
