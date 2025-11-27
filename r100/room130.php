<?php
						$roomname = "Abandoned Campsite";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc130'];
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

$redberry=$row['redberry'];
$bluefish=$row['bluefish'];
$meatball=$row['meatball'];
$purplepotion=$row['purplepotion'];
$wingspotion=$row['wingspotion'];

include ('battle-sets/forest.php');
include ('function-choptree.php');


if($input=='pick redberry' || $input=='pick berry')  // ---- PICK REDBERRY
{
	if ( $redberry >= 15 )
	{
	echo $message="<div class='menuAction'>You already have more than 15 redberries! Come back if you run low.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { 
		echo $message="<div class='menuAction'>You pick up 15 redberries!</div>";
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET redberry = 15");
		$updates = [ // -- set changes
			'redberry' => 15
		];
		updateStats($link, $username, $updates); // -- apply changes
	}
	updateStats($link, $username, ['endfight' => 0]); // -- update stats
}


// -------------------------------------------------------------------------- SEARCH Abandoned Campsite
if ($input == 'search')
{
	$rand = rand (1,2); 			//		50%
	if ($rand == 1) {
		$rand2 = rand(1,5);		//		1/5
		if ($rand2 ==1){
			echo $message="You search the Abandoned Campsite and find a Bluefish!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET bluefish = bluefish + 1");
			updateStats($link, $username, ['bluefish' => $bluefish + 1]); // -- update stats
		}
		if ($rand2 ==2){
			$rand3 = rand(50,200);
			echo $message= 'You search the Abandoned Campsite and find '.$rand3.' '.$_SESSION['currency'].'!<br>';
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET currency = currency + $rand3");
			updateStats($link, $username, ['currency' => $currency + $rand3]); // -- update stats
		}
		if ($rand2 ==3){
			echo $message="You search the Abandoned Campsite and find a Meatball!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET meatball = meatball + 1");
			updateStats($link, $username, ['meatball' => $meatball + 1]); // -- update stats
		}
		if ($rand2 ==4){
			echo $message="You search the Abandoned Campsite and find a Purple Potion!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1");
			updateStats($link, $username, ['purplepotion' => $purplepotion + 1]); // -- update stats
		}
		if ($rand2 ==5){
			echo $message="You search the Abandoned Campsite and find a Wings Potion!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET wingspotion = wingspotion + 1");
			updateStats($link, $username, ['wingspotion' => $wingspotion + 1]); // -- update stats
		}
	}
	else {
		echo $message="You search the Abandoned Campsite and find nothing, you should search again.<br>";
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
// else if($input=='w' || $input=='west') 
// {	echo 'You travel west<br>';
//    $message="<i>You travel west</i><br>".$_SESSION['desc121'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 121"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'west') {     $roomNum = '121';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
