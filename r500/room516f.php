<?php
						$roomname = "Dark Keep Barracks";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc516f'];

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

include ('battle-sets/dark-keep-2.php');

$mithrildagger = $row['mithrildagger'];
$mithrilstaff = $row['mithrilstaff'];
$flamberg = $row['flamberg'];
$glaive = $row['glaive'];
$steelbattlestaff = $row['steelbattlestaff'];
$currency = $row['currency'];
$mithrilboomerang = $row['mithrilboomerang'];
$cursedskull = $row['cursedskull'];

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
			echo $message="You search the barracks and find a Mithril Dagger!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET mithrildagger = mithrildagger + 1");
			updateStats($link, $username,['mithrildagger' => $mithrildagger + 1 ]); // -- update stat 
		}
		if ($rand2 ==2){
			echo $message="You search the barracks and find a Mithril Staff!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET mithrilstaff = mithrilstaff + 1");
			updateStats($link, $username,['mithrilstaff' => $mithrilstaff + 1 ]); // -- update stat
		}
		if ($rand2 ==3){
			echo $message="You search the barracks and find a Flamberg!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET flamberg = flamberg + 1");
			updateStats($link, $username,['flamberg' => $flamberg + 1]); // -- update stat
		}
		if ($rand2 ==4){
			echo $message="You search the barracks and find a Glaive!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET glaive = glaive + 1");
			updateStats($link, $username,['glaive' => $glaive + 1]); // -- update stat
		}
		if ($rand2 ==5){
			echo $message="You search the barracks and find a Steel Battle Staff!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET steelbattlestaff = steelbattlestaff + 1");
			updateStats($link, $username,['steelbattlestaff' => $steelbattlestaff + 1]); // -- update stat
		}
		if ($rand2 ==6){
			$rand3 = rand(200,500);
			echo $message= "You search the barracks and find $rand3 ".$_SESSION['currency']."!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET currency = currency + $rand3");
			updateStats($link, $username,['currency' => $currency + $rand3 ]); // -- update stat
		}
		if ($rand2 ==7){
			echo $message="You search the barracks and find a Mithril Boomerang!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET mithrilboomerang = mithrilboomerang + 1");
			updateStats($link, $username,['mithrilboomerang' => $mithrilboomerang + 1]); // -- update stat
		}
		if ($rand2 ==8){
			echo $message="You search the barracks and find a Cursed Skull!!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET cursedskull = cursedskull + 1");
			updateStats($link, $username,['cursedskull' => $cursedskull + 1]); // -- update stat
		}
		/*
	mithril dagger
mithril staff
flamberg
glaive
steel battle staff
coins
mithril boomerang
cursed skull
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
// else if($input=='w' || $input=='west') 
// {			echo 'You travel west<br>';
//    	$message="<i>You travel west</i><br>".$_SESSION['desc516e'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '516e'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

// -------------------------------------------------------------------------- TRAVEL

elseif ($input == 'west') {     $roomNum = '516e';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>