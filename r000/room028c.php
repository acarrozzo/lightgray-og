<?php
// -- 0028c -- Abandoned Workshop in the Bat Cave
$roomname = "Abandoned Workshop in the Bat Cave";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc028c'];
//$dangerLVL = $_SESSION['dangerLVL'] = "2"; // danger level


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


$hammer = $row['hammer'];
$string = $row['string'];

if($input=='get hammer') 
{
	if ($hammer >= 1)
	 {
		echo 'You already have a hammer. If you lose it come back here for another free one<br>';
	   	$message="<i>You already have a hammer. If you lose it come back here for another free one</i><br>";
		include ('update_feed.php'); // --- update feed
	 }
	else
	 {	 
   	echo 'You pick up a hammer and put it in your inventory<br>';
   	$message="You pick up a hammer and put it in your inventory<br>";
	include ('update_feed.php'); // --- update feed
  	// $results = $link->query("UPDATE $user SET hammer = hammer + 1");
	  updateStats($link, $username, ['hammer' => $hammer + 1]); // -- update stats
	}
}


if($input=='get string') 
{
	if ($string >= 1)
	 {
		echo 'You already have a string. If you lose it come back here for another free one<br>';
	   	$message="<i>You already have a string. If you lose it come back here for another free one</i><br>";
		include ('update_feed.php'); // --- update feed
	 }
	else
	 {	 
   	echo 'You pick up a string and put it in your inventory<br>';
   	$message="You pick up a string and put it in your inventory<br>";
	include ('update_feed.php'); // --- update feed
  	// $results = $link->query("UPDATE $user SET string = string + 1");
	  updateStats($link, $username, ['string' => $string + 1]); // -- update stats
	 }
}



	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1) 
	{	$rand = rand (1,10); 
		//echo "<br>RAND: ".$rand."<br>";
	}	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE Bat - 30%
if(($input=='attack bat' || $input=='attack' || $rand <=3 ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack bat') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Bat'");
		updateStats($link, $username, ['enemy' => 'Bat']); // -- update stats
		include ('battle.php'); }
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack bat') { $input = 'attack'; }
		include ('battle.php');	}	

// -------------------------------------------------------------------------- Battle TRAVEL
else if ((	$input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='east' || $input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' || $input=='down' )  && $infight >= 1) {
	echo 'You cannot leave the room in the middle of battle!<br>';
   	$message="<i>You cannot leave the room in the middle of battle!</i><br>";
	include ('update_feed.php'); // --- update feed
	} 

// -------------------------------------------------------------------------- TRAVEL
// else if($input=='nw' || $input=='northwest') 
// {
// 	echo 'You travel northwest<br>';
// 	$message="<i>You travel northwest</i><br>".$_SESSION['desc028d'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = '028d'"); // -- room change
//   	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='w' || $input=='west') 
// {
// 	echo 'You travel west<br>';
// 	$message="<i>You travel west</i><br>".$_SESSION['desc028b'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = '028b'"); // -- room change
//   	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'west') {     $roomNum = '028b';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'northwest') { $roomNum = '028d';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');} 
// ----------------------------------- end of room function
include('function-end.php');
// }

?>
