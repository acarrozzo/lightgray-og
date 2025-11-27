<?php
						$roomname = "Underwater Flower Patch";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc494'];

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




$flower = $row['flower'];
$ringofstrengthV = $row['ringofstrengthV'];
$redbalm = $row['redbalm'];
$purplepotion = $row['purplepotion'];
$purplebalm = $row['purplebalm'];
$blues = $row['blues'];
$reds = $row['reds'];
$greens = $row['greens'];
$yellows = $row['yellows'];
$gillspotion = $row['gillspotion'];
$wingspotion = $row['wingspotion'];
$coffee = $row['coffee'];
$tea = $row['tea'];
$bluebalm = $row['bluebalm'];

	
	
	if($input=='get flower' || $input=='pick flower' || $input=='pick up flower')  // ---- PICK FLOWER
	{
		if ( $row['flower'] <= 1 )
		{
		echo $message="FOOL! You just wasted a trip. You can only pick a flower here if you already have 2 in your inventory. Return to the Grassy Field and then the Red Town Babylon Gardens to get the first 2.<br>";
		include ('update_feed.php'); // --- update feed
		}
		else if ( $row['flower'] >= 3 )
		{
		echo 'You cannot pick up another flower here. You already have 3.<br>';
		$message="<i>You cannot pick up another flower here. You already have 3.</i><br>";
		include ('update_feed.php'); // --- update feed
		}
		else {
		echo 'You pick a flower up from the ocean floor. You now have 3 flowers!<br>';
		$message="<i>You pick a flower up from the ocean floor. You now have 3 flowers!</i><br>";
		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET flower = flower + 1");
		updateStats($link, $username,['flower' => $flower + 1 ]); // -- update stat 

		
		}
	}
	




// -------------------------------------------------------------------------- SEARCH underwater flower patch
if ($input == 'search')
{
	$rand = rand (1,2); 			//		1/2
	if ($rand == 1) {
		$rand2 = rand(1,10);		//		1/10
		if ($rand2 ==1){
			echo $message="You search the underwater flower patch and find a Ring of Strength V!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
			updateStats($link, $username,['ringofstrengthV' => $ringofstrengthV + 1 ]); // -- update stat 
		}
		if ($rand2 ==2){
			echo $message="You search the underwater flower patch and find a Ring of Magic V!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1");
			updateStats($link, $username,['ringofmagicV' => $ringofmagicV + 1 ]); // -- update stat 
		}
		if ($rand2 ==3){
			echo $message="You search the underwater flower patch and find a Blue Balm!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET bluebalm = bluebalm + 1");
			updateStats($link, $username,['bluebalm' => $bluebalm + 1 ]); // -- update stat 
		}
		if ($rand2 ==4){
			echo $message="You search the underwater flower patch and find a Red Balm!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET redbalm = redbalm + 1");
			updateStats($link, $username,['redbalm' => $redbalm + 1 ]); // -- update stat
		}
		if ($rand2 ==5){
			echo $message="You search the underwater flower patch and find a Gills Potion and Wings Potion!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET wingspotion = wingspotion + 1");
			// $results = $link->query("UPDATE $user SET gillspotion = gillspotion + 1");
			updateStats($link, $username,['wingspotion' => $wingspotion + 1 ]); // -- update stat
			updateStats($link, $username,['gillspotion' => $gillspotion + 1 ]); // -- update stat
		}
		if ($rand2 ==6){
			echo $message="You search the underwater flower patch and find some Coffee and Tea! That's weird.<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET coffee = coffee + 1");
			// $results = $link->query("UPDATE $user SET tea = tea + 1");
			updateStats($link, $username,['coffee' => $coffee + 1 ]); // -- update stat
			updateStats($link, $username,['tea' => $tea + 1 ]); // -- update stat
		}
		if ($rand2 ==7){
			echo $message="You search the underwater flower patch and find some Blues!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET blues = blues + 1");
			updateStats($link, $username,['blues' => $blues + 1 ]); // -- update stat
		}
		if ($rand2 ==8){
			echo $message="You search the underwater flower patch and find some Reds!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET reds = reds + 1");
			updateStats($link, $username,['reds' => $reds + 1 ]); // -- update stat
		}
		if ($rand2 ==9){
			echo $message="You search the underwater flower patch and find some Greens!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET greens = greens + 1");
			updateStats($link, $username,['greens' => $greens + 1 ]); // -- update stat
		}
		if ($rand2 ==10){
			echo $message="You search the underwater flower patch and find some Yellows!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET yellows = yellows + 1");
			updateStats($link, $username,['yellows' => $yellows + 1 ]); // -- update stat
		}
	}
	else {
		echo $message="You search the underwater flower patch and find nothing, you should search again.<br>";
		include ('update_feed.php'); // --- update feed
	}
	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}

	

//include ('battle-sets/blueocean-underwater.php'); // blue ocean battle set
include ('random-encounters/blueocean-underwater.php'); // blue ocean battle set

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

else if($input=='w' || $input=='west') 
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim west<br>';
   		$message="<i>You swim west</i><br>".$_SESSION['desc493'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '493'"); // -- room change
			updateStats($link, $username,['endfight' => 0, 'room' => '493' ]); // -- update stats

		} else{
 		echo $message="<i>You can't swim that way! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
// ----------------------------------- end of room function
include('function-end.php');
// }
?>