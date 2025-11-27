<?php
						$roomname = "Silver Shop";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc310'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

//include ('shops/silver_shop.php'); 

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

$silversword = $row['silversword'];
$silver2hsword = $row['silver2hsword'];
$silverboomerang = $row['silverboomerang'];
$silverbow = $row['silverbow'];
$silvercrossbow = $row['silvercrossbow'];
$silvershield = $row['silvershield'];
$silverhelmet = $row['silverhelmet'];
$silverbreastplate = $row['silverbreastplate'];
$silvergauntlets = $row['silvergauntlets'];
$silverboots = $row['silverboots'];
$silverring = $row['silverring'];
$silvernecklace = $row['silvernecklace'];
$currency = $row['currency'];

if($input=='buy silver sword') 
{	if($currency<50000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver sword for 50k '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET silversword = silversword + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 50000"); 
		$updates = [ // -- set changes
			'silversword' => $silversword + 1,
			'currency' => $currency - 50000
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	} 
}
if($input=='buy silver staff') 
{	if($currency<50000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver staff for 50k '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET silverstaff = silverstaff + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 50000"); 
		$updates = [ // -- set changes
			'silverstaff' => $silverstaff + 1,
			'currency' => $currency - 50000
		];
		updateStats($link, $username, $updates); // -- apply changes
     } 
}
if($input=='buy silver 2h sword') 
{	if($currency<60000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver 2h sword for 60k '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET silver2hsword = silver2hsword + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 60000"); 
		$updates = [ // -- set changes
			'silver2hsword' => $silver2hsword + 1,
			'currency' => $currency - 60000
		];
		updateStats($link, $username, $updates); // -- apply changes
     } 
}
if($input=='buy silver boomerang') 
{	if($currency<40000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver boomerang for 40k '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET silverboomerang = silverboomerang + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 40000"); 
		$updates = [ // -- set changes
			'silverboomerang' => $silverboomerang + 1,
			'currency' => $currency - 40000
		];
		updateStats($link, $username, $updates); // -- apply changes
     } 
}
if($input=='buy silver bow') 
{	if($currency<50000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver bow for 50k '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET silverbow = silverbow + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 50000"); 
		$updates = [ // -- set changes
			'silverbow' => $silverbow + 1,
			'currency' => $currency - 50000
		];
		updateStats($link, $username, $updates); // -- apply changes
     } 
}
if($input=='buy silver crossbow') 
{	if($currency<60000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver crossbow for 60k '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET silvercrossbow = silvercrossbow + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 60000"); 
		$updates = [ // -- set changes
			'silvercrossbow' => $silvercrossbow + 1,
			'currency' => $currency - 60000
		];
		updateStats($link, $username, $updates); // -- apply changes
     } 
}
if($input=='buy silver shield') 
{	if($currency<30000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver shield for 30k '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET silvershield = silvershield + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 30000"); 
		$updates = [ // -- set changes
			'silvershield' => $silvershield + 1,
			'currency' => $currency - 30000
		];
		updateStats($link, $username, $updates); // -- apply changes
     } 
}
if($input=='buy silver helmet') 
{	if($currency<20000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver helmet for 20k '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET silverhelmet = silverhelmet + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 20000"); 
		$updates = [ // -- set changes
			'silverhelmet' => $silverhelmet + 1,
			'currency' => $currency - 20000
		];
		updateStats($link, $username, $updates); // -- apply changes
     } 
}
if($input=='buy silver breastplate') 
{	if($currency<30000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver breastplate for 30k '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET silverbreastplate = silverbreastplate + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 30000"); 
		$updates = [ // -- set changes
			'silverbreastplate' => $silverbreastplate + 1,
			'currency' => $currency - 30000
		];
		updateStats($link, $username, $updates); // -- apply changes
     } 
}
if($input=='buy silver gauntlets') 
{	if($currency<20000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a pair of silver gauntlets for 20k '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET silvergauntlets = silvergauntlets + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 20000"); 
		$updates = [ // -- set changes
			'silvergauntlets' => $silvergauntlets + 1,
			'currency' => $currency - 20000
		];
		updateStats($link, $username, $updates); // -- apply changes
     } 
}
if($input=='buy silver boots') 
{	if($currency<20000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a pair of silver boots for 20k '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET silverboots = silverboots + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 20000"); 
		$updates = [ // -- set changes
			'silverboots' => $silverboots + 1,
			'currency' => $currency - 20000
		];
		updateStats($link, $username, $updates); // -- apply changes
     } 
}



if($input=='buy silver ring') 
{	if($currency<100000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver ring for 100k '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET silverring = silverring + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 100000"); 
		$updates = [ // -- set changes
			'silverring' => $silverring + 1,
			'currency' => $currency - 100000
		];
		updateStats($link, $username, $updates); // -- apply changes
     } 
}
if($input=='buy silver necklace') 
{	if($currency<200000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver necklace for 200k '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET silvernecklace = silvernecklace + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 200000"); 
		$updates = [ // -- set changes
			'silvernecklace' => $silvernecklace + 1,
			'currency' => $currency - 200000
		];
		updateStats($link, $username, $updates); // -- apply changes
     } 
}














// if($input=='+10 HP') 
// {			echo $message="<strong>[ secret ] +1M BABY!</strong><br>";
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET currency = currency + 1000000"); // -- reset fight
// }

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
// {			echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc307'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 307"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// // -------------------------------------------------------------------------- TRAVEL

// else if($input=='se' || $input=='southeast') 
// {			echo 'You travel southeast<br>';
//    	$message="<i>You travel southeast</i><br>".$_SESSION['desc308'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 308"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '307';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southeast') { $roomNum = '308';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>