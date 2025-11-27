<?php
							  $roomname = "Kobold Hidden Chamber";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc115f'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5"; // danger level

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

$ironstaff = $row['ironstaff'];
$ironbattlestaff = $row['ironbattlestaff'];
$towershield = $row['towershield'];
$grayhood = $row['grayhood'];
$ringofstrengthIII = $row['ringofstrengthIII'];
$ringofdexterityIII = $row['ringofdexterityIII'];
$ringofmagicIII = $row['ringofmagicIII'];
$ringofdefenseIII = $row['ringofdefenseIII'];
$blueberry = $row['blueberry'];
$bluepotion = $row['bluepotion'];
$currency = $row['currency'];
	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10);$randrare = rand (1,50);  }	else {$rand=0;$randrare=0;}
// -------------------------------------------------------------------------- INITIALIZE SUPER RARE - Kobold Monk - 1/50
if(($randrare == 1 ) && $infight==0 && $endfight==0) {	
   // $results = $link->query("UPDATE $user SET enemy = 'Kobold Monk'");
	updateStats($link, $username,['enemy' => 'Kobold Monk' ]); // -- set enemy 
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE giant rat - 1/10
else if(($rand == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Giant Rat'");
	updateStats($link, $username,['enemy' => 'Giant Rat' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE salamander - 1/10
else if(($rand == 2 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Salamander'");
	updateStats($link, $username,['enemy' => 'Salamander' ]); // -- set enemy
	include ('battle.php'); 
}					
// -------------------------------------------------------------------------- INITIALIZE alpha scorpion - 1/10
else if(($rand == 3 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Alpha Scorpion'");
	updateStats($link, $username,['enemy' => 'Alpha Scorpion' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	






// -------------------------------------------------------------------------- kobold chest - reset after 100 clicks

$clicks = $row['clicks'];

//$_SESSION['koboldtreasure']=	$_SESSION['koboldtreasure']+99; // to reset chest immediately for testing

if ($_SESSION['koboldtreasure'] == 0) {$_SESSION['koboldtreasurecheck'] = 0;} 
	else { $_SESSION['koboldtreasure'] = $clicks;}
	
// -------------------------------------------------------------------------- OPEN CHEST 	
if($input=='open chest') 
{	
	$time_left = $_SESSION['koboldtreasurecheck'] - $_SESSION['koboldtreasure'];

	
	if ($_SESSION['koboldtreasure'] >= $_SESSION['koboldtreasurecheck'])
	{
	echo $message = "You open the kobold treasure chest!<br>";
	include ('update_feed.php'); // --- update feed
   	$_SESSION['koboldtreasure'] = $clicks;	
	$_SESSION['koboldtreasurecheck'] = $_SESSION['koboldtreasure'] + 100;
	// -------------------------------------------------------------------------- chest reward - ITEM
	$rand = rand (1,4);
	if ($rand == 1) { 
		echo $message = "+ Iron Staff<br>";
		include ('update_feed_alt.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET ironstaff = ironstaff + 1"); 
		$updates = ['ironstaff' => $ironstaff + 1 ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes	
		
}	
	if ($rand == 2) { 
		echo $message = "+ Iron Battle Staff<br>";
		include ('update_feed_alt.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET ironbattlestaff = ironbattlestaff + 1"); 
		$updates = ['ironbattlestaff' => $ironbattlestaff + 1 ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes

}	
	if ($rand == 3) { 
		echo $message = "+ Tower Shield<br>";
		include ('update_feed_alt.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET towershield = towershield + 1"); 
		$updates = ['towershield' => $towershield + 1 ]; // -- set changes
		updateStats($link, $username, $updates); // -- apply changes
}	
	if ($rand == 4) { 
		echo $message = "+ Gray Hood<br>";
		include ('update_feed_alt.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET grayhood = grayhood + 1"); 
		$updates = ['grayhood' => $grayhood + 1 ]; // -- set changes
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
	echo $message = "+ $qty Blue Potions<br>";
	include ('update_feed_alt.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET bluepotion = bluepotion + $qty");
	$updates = ['bluepotion' => $bluepotion + $qty ]; // -- set changes
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
	echo "For some reason you can't open the chest now, you should try again in $time_left clicks.<br>";
   	$message="<i>For some reason you can't open the chest now, you should try again in $time_left clicks.<br></i><br>";
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



// // -------------------------------------------------------------------------- TRAVEL
// else if($input=='e' || $input=='east') 
// {	echo 'You travel east<br>';
//    $message="<i>You travel east</i><br>".$_SESSION['desc115e'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = '115e'"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '115e';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');} 
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
