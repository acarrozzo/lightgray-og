<?php
						$roomname = "Broccoli Rob's Veggie Stand";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc207'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

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


$currency = $row['currency'];
$dung = $row['dung'];
$toopoor = $_SESSION['toopoor'];

$redberry = $row['redberry'];
$blueberry = $row['blueberry'];
$veggies = $row['veggies'];

// ------------------------------------------------------------------------------------------- Broccoli Rob Shop

if($input=='buy redberry')
{	if($currency<10) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a redberry for 10 '.$_SESSION['currency'].'<br>';
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET redberry = redberry + 1");
		// $query = $link->query("UPDATE $user SET currency = currency - 10");
		$updates = [ // -- set changes
			'redberry' => $redberry + 1,
			'currency' => $currency - 10
		];
		updateStats($link, $username, $updates); // -- apply changes
	
		}
}
if($input=='buy blueberry')
{	if($currency<20) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a blueberry for 20 '.$_SESSION['currency'].'<br>';
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET blueberry = blueberry + 1");
		// $query = $link->query("UPDATE $user SET currency = currency - 20");
		$updates = [ // -- set changes
			'blueberry' => $blueberry + 1,
			'currency' => $currency - 20
		];
		updateStats($link, $username, $updates); // -- apply changes
		}
}
if($input=='buy veggies')
{	if($currency<100) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy some veggies for 100 '.$_SESSION['currency'].'<br>';
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET veggies = veggies + 1");
		// $query = $link->query("UPDATE $user SET currency = currency - 100");
		$updates = [ // -- set changes
			'veggies' => $veggies + 1,
			'currency' => $currency - 100
		];
		updateStats($link, $username, $updates); // -- apply changes
		}
}



// -------------------------------------------------------------------------- SELL ALL DUNG
if($input=='sell all dung')
{
	if($dung>=1) {
		$amt = $dung*10000;
		echo $message = 'You sell '.$dung.' dung to Broccoli Rob for  '.$amt.' '.$_SESSION['currency'].'<br>';
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET dung = 0");
		// $query = $link->query("UPDATE $user SET currency = currency + $amt");
		$updates = [ // -- set changes
			'dung' => 0,
			'currency' => $currency + $amt
		];
		updateStats($link, $username, $updates); // -- apply changes

	}
	else if($dung<1) {
		echo $message = 'You have no dung fool. If you want some, go find some flying beetles in the sewers.<br>';
		include ('update_feed.php'); // --- update feed
	}
}




// -------------------------------------------------------------------------- TRAVEL
// if($input=='s' || $input=='south')
// {	echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc208'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = 208"); // -- room change
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='e' || $input=='east')
// {	echo 'You travel east<br>';
//    	$message="<i>You travel east</i><br>".$_SESSION['desc203'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = 203"); // -- room change
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
else if($input=='d' || $input=='down')
{	echo "You travel down through a secret cellar in Broccoli Rob's Cabin that brings you right into the heart of the Catacombs.<br>";
	$message="<i>You travel down through a secret cellar in Broccoli Rob's Cabin that brings you right into the heart of the Catacombs.</i><br>".$_SESSION['desc232w'];
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET room = '232w'"); // -- room change
	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$updates = ['endfight' => 0, 'room' => '232w' ]; // -- set changes
	updateStats($link, $username, $updates); // -- apply changes
}

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '203';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'south') {    $roomNum = '208';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
