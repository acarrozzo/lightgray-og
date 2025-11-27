<?php
						$roomname = "In the Forest by a Gold Chest";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc119'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5-13"; // danger level

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

$chest2 = $row['chest2'];
$goldkey = $row['goldkey'];
$xp = $row['xp'];
$currency = $row['currency'];
$wood = $row['wood'];
$cookedmeat = $row['cookedmeat'];
$purplepotion = $row['purplepotion'];
$hunterring = $row['hunterring'];
$huntergloves = $row['huntergloves'];

include ('battle-sets/forest.php');
include ('function-choptree.php');
	

// ------------------------------------- ------------------------------------- CHEST 2 - FOREST
if($input=='open chest') 
{
	if ($chest2 >= 1) { 	 // --- already opened
	echo $message="<i>You already opened this gold chest. Remember that sweet hunter equipment?</i><br>";
	include ('update_feed.php'); // --- update feed	
	}
	
	else if ($chest2 == 0 &&  $goldkey <= 0) {  // ---- no key	
	echo $message="<i>You need a Gold Key to open this chest. You can get one by completing Quest 18 from Hunter Bill. You can find him to the southwest.</i><br>";
	include ('update_feed.php'); // --- update feed	
	}
	
	
	else if ($chest2 == 0 || $goldkey >= 1 ) {  // ---- open!
	echo 'You use your golden key to open the chest!<br>';
	$message="You use your golden key to open the chest!<br>";
	include ('update_feed.php'); // --- update feed	
	$qty = rand (500,1000);
	$message = "<i>the chest contains:</i>   
	<div class='goldchestopen'>
	<h3>Forest</h3>
	<h3>Gold Chest</h3>
	<p>+ 200 XP</p>
	<p>+ $qty " . $_SESSION['currency'] . "</p>
	<p>+ 20 Wood</p>
	<p>+ 10 Cooked Meat</p>
	<p>+ 3 Purple Potions</p>
	<p class='h4'>+ Hunter Ring!</p>
	<p class='h4'>+ Hunter Gloves!</p>
	</div>";
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET xp = xp + 200");
	// $results = $link->query("UPDATE $user SET currency = currency + $qty");
	// $results = $link->query("UPDATE $user SET wood = wood + 20");
	// $results = $link->query("UPDATE $user SET cookedmeat = cookedmeat + 10");
	// $results = $link->query("UPDATE $user SET purplepotion = purplepotion + 3");
	// $results = $link->query("UPDATE $user SET hunterring = hunterring + 1");
	// $results = $link->query("UPDATE $user SET huntergloves = huntergloves + 1");
	// $results = $link->query("UPDATE $user SET chest2 = 1");
	// $results = $link->query("UPDATE $user SET goldkey = goldkey - 1");
	$updates = [ // -- set changes
		'xp' => $xp + 200,
		'currency' => $currency + $qty,
		'wood' => $wood + 20,
		'cookedmeat' => $cookedmeat + 10,
		'purplepotion' => $purplepotion + 3,
		'hunterring' => $hunterring + 1,
		'huntergloves' => $huntergloves + 1,
		'chest2' => 1,
		'goldkey' => $goldkey - 1
	];
	updateStats($link, $username, $updates); // -- apply changes
}
}
if ($input == 'reset chest')
{
	// $results = $link->query("UPDATE $user SET chest2 = 0");
	// $results = $link->query("UPDATE $user SET goldkey = goldkey + 1");
	$updates = [ // -- set changes
		'chest2' => 0,
		'goldkey' => $goldkey + 1
	];
	updateStats($link, $username, $updates); // -- apply changes
}

// -------------------------------------------------------------------------- READ SIGN!
if($input=='read sign') {  //read sign
	echo '<i>You read the sign</i> <br>  ';
	$message="
	<i>you read the sign:</i>   
	<div class='sign'>
	<h3 class='gold'>Forest Gold Chest<i></i></h3>
	---------------------------------------------------<br>
	You will need a gold key if you wish to open this chest. Rumor has it a nearby hunter has one.<br>
	---------------------------------------------------<br>
	<span class='hilight'>Opening this chest will open the gate to the east and allow you to access the more dangerous Dark Forest, where Trolls can be found.</span><br>
	---------------------------------------------------<br>
	</div>";
	include ('update_feed.php'); // --- update feed	
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
// else if($input=='sw' || $input=='southwest') 
// {	echo 'You travel southwest<br>';
//    $message="<i>You travel southwest</i><br>".$_SESSION['desc118'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 118"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='s' || $input=='south') 
// {	echo 'You travel south<br>';
//    $message="<i>You travel south</i><br>".$_SESSION['desc120'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 120"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '120';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}   
elseif ($input == 'southwest') { $roomNum = '118';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}  
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
