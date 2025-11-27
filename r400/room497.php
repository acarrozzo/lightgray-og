<?php
						$roomname = "Secret Underwater Area";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc497'];

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


$ringofstrengthV = $row['ringofstrengthV'];
$redbalm = $row['redbalm'];
$purplepotion = $row['purplepotion'];
$purplebalm = $row['purplebalm'];
$blues = $row['blues'];
$reds = $row['reds'];
$greens = $row['greens'];
$yellows = $row['yellows'];

include ('battle-sets/blueocean-underwater.php'); // blue ocean battle set
include ('random-encounters/blueocean-underwater.php'); // blue ocean battle set


// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
		// $query = $link->query("UPDATE $user SET hp = $hpmax + 100 "); 
		// $query = $link->query("UPDATE $user SET mp = $mpmax + 100 "); 
		$updates = [ // -- set changes
			'hp' => $hpmax + 100,
			'mp' => $mpmax + 100
		]; 
		updateStats($link, $_SESSION['username'], $updates); // -- update  
		echo $message = "You rest at the Green Pillar! (+100 HP, +100 MP)<br>";
		include ('update_feed.php'); // --- update feed
		//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}


// -------------------------------------------------------------------------- SEARCH Sunken Ship
if ($input == 'search')
{
	$rand = rand (1,2); 			//		50%
	if ($rand == 1) {
		$rand2 = rand(1,10);		//		1/10
		if ($rand2 ==1){
			echo $message="You search the secret underwater area and find a Ring of Strength V!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
			updateStats($link, $username,['ringofstrengthV' => $ringofstrengthV + 1 ]); // -- update stat 
		}
		if ($rand2 ==2){
			$rand3 = rand(100,300);
			echo $message= "You search the secret underwater area and find $rand3 ".$_SESSION['currency']."!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET currency = currency + $rand3");
			updateStats($link, $username,['currency' => $currency + $rand3 ]); // -- update stat
		}
		if ($rand2 ==3){
			$rand3 = rand(200,400);
			echo $message= "You search the secret underwater area and find $rand3 ".$_SESSION['currency']."!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET currency = currency + $rand3");
			updateStats($link, $username,['currency' => $currency + $rand3 ]); // -- update stat
		}
		if ($rand2 ==4){
			echo $message="You search the secret underwater area and find a Red Balm!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET redbalm = redbalm + 1");
			updateStats($link, $username,['redbalm' => $redbalm + 1 ]); // -- update stat
		}
		if ($rand2 ==5){
			echo $message="You search the secret underwater area and find a Purple Potion!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1");
			updateStats($link, $username,['purplepotion' => $purplepotion + 1 ]); // -- update stat
		}
		if ($rand2 ==6){
			echo $message="You search the secret underwater area and find a Purple Balm!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET purplebalm = purplebalm + 1");
			updateStats($link, $username,['purplebalm' => $purplebalm + 1 ]); // -- update stat
		}
		if ($rand2 ==7){
			echo $message="You search the secret underwater area and find some Blues!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET blues = blues + 1");
			updateStats($link, $username,['blues' => $blues + 1 ]); // -- update stat
		}
		if ($rand2 ==8){
			echo $message="You search the secret underwater area and find some Reds!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET reds = reds + 1");
			updateStats($link, $username,['reds' => $reds + 1 ]); // -- update stat
		}
		if ($rand2 ==9){
			echo $message="You search the secret underwater area and find some Greens!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET greens = greens + 1");
			updateStats($link, $username,['greens' => $greens + 1 ]); // -- update stat
		}
		if ($rand2 ==10){
			echo $message="You search the secret underwater area and find some Yellows!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET yellows = yellows + 1");
			updateStats($link, $username,['yellows' => $yellows + 1 ]); // -- update stat
		}
	}
	else {
		echo $message="You search the secret underwater area and find nothing, you should search again.<br>";
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
else if($input=='u' || $input=='up') 
{			echo 'You swim up to the surface of the Ocean.<br>';
   	$message="<i>You swim up to the surface</i><br>".$_SESSION['desc402'];
	include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = 402"); // -- room change
       updateStats($link, $username,['endfight' => 0, 'room' => '402' ]); // -- update stats
}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>