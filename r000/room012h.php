<?php
$roomname = "Scorpion Throne Room";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc012h'];
//$dangerLVL = $_SESSION['dangerLVL'] = "30"; // danger level

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

$clicks = $row['clicks'];
$pickaxe = $row['pickaxe'];

$gladius = $row['gladius'];
$claymore = $row['claymore'];
$chakram = $row['chakram'];
$giantclub = $row['giantclub'];
$ringofstrengthIII = $row['ringofstrengthIII'];
$ringofdexterityIII = $row['ringofdexterityIII'];
$ringofmagicIII = $row['ringofmagicIII'];
$ringofdefenseIII = $row['ringofdefenseIII'];
$ringofhealthregen = $row['ringofhealthregen'];
$ringofmanaregen = $row['ringofmanaregen'];
$currency = $row['currency'];


// -------------------------------------------------------------------------- OPEN scorpion CHEST 	
// -------------------------------------------------------------------------- scorpion chest - reset after 100 clicks
if ($_SESSION['scorpiontreasure'] == 0) {$_SESSION['scorpiontreasurecheck'] = 0;} 
	else { $_SESSION['scorpiontreasure'] = $clicks; }


	//$_SESSION['scorpiontreasure'] = $_SESSION['scorpiontreasure']+99; // TO TEST BELOW WITHOUT 100 CLICKS


$time_left = $_SESSION['scorpiontreasurecheck'] - $_SESSION['scorpiontreasure'];


echo '<br>CLICKS:'. $clicks;
echo '<br>Scorpion Treasure:'. $_SESSION['scorpiontreasure'];
echo '<br>Scorpion Check:'. $_SESSION['scorpiontreasurecheck'];
echo '<br>Time Left:'. $time_left;


// -------------------------------------------------------------------------- OPEN CHEST 	
if($input=='open chest') 
{	
	if ($_SESSION['scorpiontreasure'] >= $_SESSION['scorpiontreasurecheck'])
	{
	echo $message = "You open the Scorpion Treasure Chest!<br>";
	include ('update_feed.php'); // --- update feed
   	$_SESSION['scorpiontreasure'] = $clicks;	
	$_SESSION['scorpiontreasurecheck'] = $_SESSION['scorpiontreasure'] + 100;
	// -------------------------------------------------------------------------- chest reward - ITEM
	$rand = rand (1,4);
	if ($rand == 1) { 
		echo $message = "+ Gladius<br>";
		include ('update_feed_alt.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET gladius = gladius + 1");
		updateStats($link, $username, ['gladius' => $gladius + 1]); // -- update stats

		
	 }	
	if ($rand == 2) { 
		echo $message = "+ Claymore<br>";
		include ('update_feed_alt.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET claymore = claymore + 1"); 
		updateStats($link, $username, ['claymore' => $claymore + 1]); // -- update stats
	}	
	if ($rand == 3) { 
		echo $message = "+ Chakram<br>";
		include ('update_feed_alt.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET chakram = chakram + 1");
		updateStats($link, $username, ['chakram' => $chakram + 1]); // -- update stats
	}	
	if ($rand == 4) { 
		echo $message = "+ Giant Club<br>";
		include ('update_feed_alt.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET giantclub = giantclub + 1");
		updateStats($link, $username, ['giantclub' => $giantclub + 1]); // -- update stats 
	}		
	// -------------------------------------------------------------------------- chest reward - Ring
	$rand2 = rand(1,4);
	if ($rand2 == 1 ){
		$bonus = 'Ring of Strength III';
		// $results = $link->query("UPDATE $user SET ringofstrengthIII = ringofstrengthIII + 1");
		updateStats($link, $username, ['ringofstrengthIII' => $ringofstrengthIII + 1]); // -- update stats 
	}
	if ($rand2 == 2 ){
		$bonus = 'Ring of Dexterity III';
		// $results = $link->query("UPDATE $user SET ringofdexterityIII = ringofdexterityIII + 1"); 
		updateStats($link, $username, ['ringofdexterityIII' => $ringofdexterityIII + 1]); // -- update stats 
	}
	if ($rand2 == 3 ){
		$bonus = 'Ring of Magic III';
		// $results = $link->query("UPDATE $user SET ringofmagicIII = ringofmagicIII + 1"); 
		updateStats($link, $username, ['ringofmagicIII' => $ringofmagicIII + 1]); // -- update stats 
	}
	if ($rand2 == 4 ){
		$bonus = 'Ring of Defense III';
		// $results = $link->query("UPDATE $user SET ringofdefenseIII = ringofdefenseIII + 1"); 
		updateStats($link, $username, ['ringofdefenseIII' => $ringofdefenseIII + 1]); // -- update stats 
	}	
	echo $message = "+ $bonus<br>";
	include ('update_feed_alt.php'); // --- update feed
	// -------------------------------------------------------------------------- chest reward - Ring regen
	$rand2 = rand(1,2);
	if ($rand2 == 1 ){
		$bonus = 'Ring of Health Regen';
		// $results = $link->query("UPDATE $user SET ringofhealthregen = ringofhealthregen + 1");
		updateStats($link, $username, ['ringofhealthregen' => $ringofhealthregen + 1]); // -- update stats 
	}
	if ($rand2 == 2 ){
		$bonus = 'Ring of Mana Regen';
		// $results = $link->query("UPDATE $user SET ringofmanaregen = ringofmanaregen + 1");
		updateStats($link, $username, ['ringofmanaregen' => $ringofmanaregen + 1]); // -- update stats
	}
	echo $message = "+ $bonus<br>";
	include ('update_feed_alt.php'); // --- update feed
	// -------------------------------------------------------------------------- chest reward - Gold
	$qty = rand (4000,8000);
	echo $message = '+ '.$qty.' '.$_SESSION['currency'].'<br>';
	include ('update_feed_alt.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET currency = currency + $qty"); // -- update currency
	updateStats($link, $username, ['currency' => $currency + $qty]); // -- update stats			
	}
	else { 
	echo $message="For some reason you can't open the scorpion chest now, you can try again in $time_left clicks.<br>";
	include ('update_feed.php'); // --- update feed
	}
}







// -------------------------------------------------------------------------- PICKUP PICKAXE
if($input=='get pickaxe' || $input=='grab pickaxe' || $input=='pick up pickaxe') 
{
	if ($pickaxe >= 1)
	 {
		echo $message="You already have a pickaxe. If you lose it come back here for another one.<br>";
		include ('update_feed.php'); // --- update feed
	 }
	else
	 {	 
   	echo $message="You pick up a pickaxe and put it in your inventory.<br>";
	include ('update_feed.php'); // --- update feed
  	$results = $link->query("UPDATE $user SET pickaxe = pickaxe + 1");
	updateStats($link, $username, ['pickaxe' => $pickaxe + 1]); // -- update stats
	 }
}




// -------------------------------------------------------------------------- BATTLE VARIABLES		
	// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1 && $input!='attack scorpion king' && $input!='attack' && $input!='a') 
	{	$rand = rand (1,10); 
	}	else {$rand=0;}
// -------------------------------------------------------------------------- INITIALIZE KING - 4/10
if(($input=='attack scorpion king' || $rand <= 4 ) && $infight==0 && $endfight==0) 
	{
		if ($input=='attack scorpion king') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Scorpion King'");
		updateStats($link, $username, ['enemy' => 'Scorpion King']); // -- update stats
		include ('battle.php');
	}

// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{
	if($input=='attack scorpion king') { $input = 'attack'; }
	include ('battle.php');
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
// else if($input=='s' || $input=='south') 
// {  	echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc012g'];
// 	include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '012g'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
elseif ($input == 'south') {    $roomNum = '012g';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');} 


// ----------------------------------- end of room function
include('function-end.php');
// }
?>
