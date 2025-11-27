<?php
						$roomname = "In the Ocean Trapped under the Storm";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc410'];
//$dangerLVL = $_SESSION['dangerLVL'] = "13"; // danger level

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

$equipMount = $row['equipMount'];
include ('battle-sets/blueocean.php'); // blue ocean battle set


$bluefish = $row['bluefish'];
$gillspotion = $row['gillspotion'];
$redbalm = $row['redbalm'];
$wingspotion = $row['wingspotion'];
$purplebalm = $row['purplebalm'];
$blues = $row['blues'];
$reds = $row['reds'];
$greens = $row['greens'];
$yellows = $row['yellows'];
$currency = $row['currency'];



// -------------------------------------------------------------------------- SEARCH Sunken Ship
if ($input == 'search')
{
	$rand = rand (1,2); 			//		50%
	if ($rand == 1) {
		$rand2 = rand(1,10);		//		1/10
		if ($rand2 ==1){
			echo $message="You search the ocean and find a Bluefish!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET bluefish = bluefish + 1");
			updateStats($link, $username,['bluefish' => $bluefish + 1 ]); // -- update stat
		}
		if ($rand2 ==2){
			$rand3 = rand(100,300);
			echo $message= "You search the ocean and find $rand3 ".$_SESSION['currency']."!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET currency = currency + $rand3");
			updateStats($link, $username,['currency' => $currency + $rand3 ]); // -- update stat 

		}
		if ($rand2 ==3){
			echo $message="You search the ocean and find a Gills Potion!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET gillspotion = gillspotion + 1");
			updateStats($link, $username,['gillspotion' => $gillspotion + 1 ]); // -- update stat
		}
		if ($rand2 ==4){
			echo $message="You search the ocean and find a Red Balm!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET redbalm = redbalm + 1");
			updateStats($link, $username,['redbalm' => $redbalm + 1 ]); // -- update stat
		}
		if ($rand2 ==5){
			echo $message="You search the ocean and find a Wings Potion!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET wingspotion = wingspotion + 1");
			updateStats($link, $username,['wingspotion' => $wingspotion + 1 ]); // -- update stat
		}
		if ($rand2 ==6){
			echo $message="You search the ocean and find a Purple Balm!<br>";
			include ('update_feed.php'); // --- update feed
			updateStats($link, $username,['purplebalm' => $purplebalm + 1 ]); // -- update stat
		}
		if ($rand2 ==7){
			echo $message="You search the ocean and find some Blues!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET blues = blues + 1");
			updateStats($link, $username,['blues' => $blues + 1 ]); // -- update stat
		}
		if ($rand2 ==8){
			echo $message="You search the ocean and find some Reds!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET reds = reds + 1");
			updateStats($link, $username,['reds' => $reds + 1 ]); // -- update stat
		}
		if ($rand2 ==9){
			echo $message="You search the ocean and find some Greens!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET greens = greens + 1");
			updateStats($link, $username,['greens' => $greens + 1 ]); // -- update stat	
		}
		if ($rand2 ==10){
			echo $message="You search the ocean and find some Yellows!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET yellows = yellows + 1");
			updateStats($link, $username,['yellows' => $yellows + 1 ]); // -- update stat	
		}
	}
	else {
		echo $message="You search the ocean and find nothing, you should search again.<br>";
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
else if($input=='d' || $input=='down') 
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim underwater!<br>';
   		$message="<i>You swim underwater!</i><br>".$_SESSION['desc486'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '486'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '486' ]); // -- update stats

		} else{
 		echo $message="<i>You can't go below the ocean! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}






// ----------------------------------- end of room function
include('function-end.php');
// }
?>