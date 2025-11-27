<?php
						$roomname = "Dark Keep Storeroom";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc516b'];

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

// -------------------------------------------------------------------------- BATTLE VARIABLES		
$infight = $row['infight'];
$endfight = $row['endfight'];

 include ('battle-sets/dark-keep-1.php');

$redbalm = $row['redbalm'];
$bluebalm = $row['bluebalm'];
$purplebalm = $row['purplebalm'];
$arrows = $row['arrows'];
$bolts = $row['bolts'];
$blues = $row['blues'];
$yellows = $row['yellows'];
$graymatter = $row['graymatter'];



if ($input == 'flip lever')
{
	if ($_SESSION['darkkeepswitchA'] == 1)
	{
		echo $message = 'You already flipped this lever.<br>';
		include ('update_feed.php'); // --- update feed
	}
	else {
		echo $message= 'You flip the lever and hear some grinding in the walls.<br>';
		include ('update_feed.php'); // --- update feed
		$_SESSION['darkkeepswitchA'] = 1;
	}
	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}



// -------------------------------------------------------------------------- SEARCH DARK KEEP STOREROOM	
if ($input == 'search')
{
	$rand = rand (1,3); 			//		1/3
	if ($rand == 1) {
		$rand2 = rand(1,8);		//		1/8
		if ($rand2 ==1){
			echo $message="You search the dark storeroom and find a Red Balm!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET redbalm = redbalm + 1");
			updateStats($link, $username,['redbalm' => $redbalm + 1 ]); // -- update stat 

		}
		if ($rand2 ==2){
			echo $message="You search the dark storeroom and find a Blue Balm!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET bluebalm = bluebalm + 1");
			updateStats($link, $username,['bluebalm' => $bluebalm + 1 ]); // -- update stat 
		}
		if ($rand2 ==3){
			echo $message="You search the dark storeroom and find a Purple Balm!<br>";
			include ('update_feed.php'); // --- update feed
			updateStats($link, $username,['purplebalm' => $purplebalm + 1 ]); // -- update stat 
		}
		if ($rand2 ==4){
			$rand3 = rand(20,50);
			echo $message= 'You search the dark storeroom and find '.$rand3.' arrows!<br>';
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET arrows = arrows + $rand3");
			updateStats($link, $username,['arrows' => $arrows + $rand3 ]); // -- update stat
		}
		if ($rand2 ==5){
			$rand3 = rand(20,50);
			echo $message= 'You search the dark storeroom and find '.$rand3.' bolts!<br>';
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET bolts = bolts + $rand3");
			updateStats($link, $username,['bolts' => $bolts + $rand3 ]); // -- update stat
		}
		if ($rand2 ==6){
			echo $message="You search the dark storeroom and find some Blues!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET blues = blues + 1");
			updateStats($link, $username,['blues' => $blues + 1]); // -- update stat
		}
		if ($rand2 ==7){
			echo $message="You search the dark storeroom and find some Yellows!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET yellows = yellows + 1");
			updateStats($link, $username,['yellows' => $yellows + 1]); // -- update stat
		}
		if ($rand2 ==8){
			echo $message="You search the dark storeroom and find some Gray Matter!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET graymatter = graymatter + 1");
			updateStats($link, $username,['graymatter' => $graymatter + 1]); // -- update stat
		}
		/*
		red balm
blue balm
purple balm
20-50 arrows
20-50 bolts
blues
yellows
gray matter
*/
	}
	else {
		echo $message="You search the dark keep storeroom and find nothing, you should search again.<br>";
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
// else if($input=='e' || $input=='east') 
// {			echo 'You travel east<br>';
//    	$message="<i>You travel east</i><br>".$_SESSION['desc516a'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '516a'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

// -------------------------------------------------------------------------- TRAVEL

elseif ($input == 'east') {     $roomNum = '516a';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>