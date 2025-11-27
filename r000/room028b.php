<?php
// -- 0028b -- Bat Cave
$roomname = "Bat Cave";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc028b'];
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
if ((	$input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='east' || $input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' || $input=='down' )  && $infight >= 1) {
	echo 'You cannot leave the room in the middle of battle!<br>';
   	$message="<i>You cannot leave the room in the middle of battle!</i><br>";
	include ('update_feed.php'); // --- update feed
	}
  

else if($input=='read sign') {  //read sign
	echo'You read the sign.';
	$message="<i>you read the sign:</i> <br />
	----------------------------<br />
	TO EXIT GO UP! <br>
	----------------------------<br>";
	include ('update_feed.php'); // --- update feed	
}


// --------------------------------------------------------------------------- PICK UP MAP
else if ($input=="pick up map"){
	echo 'You pick up the grassy field underground map:<br>';
	$message ='<br><i>You pick up the grassy field underground map. Check your INV to view the map at anytime</i><br>
	<a target="_blank" rel="map" href="img/lightgray_map_grassyfield_underground.jpg" class="fancybox">
	<img class="mapimage" width="350" height="350" alt="View Map"  src="img/lightgray_map_grassyfield_underground.jpg"><br>
	click to open map in new window and view full size</a><br>';
  	include ('update_feed_alt.php'); // --- update feed ALT
	// $results = $link->query("UPDATE $user SET grassyfieldundergroundmap = 1");
	updateStats($link, $username, ['grassyfieldundergroundmap' => 1]); // -- update stats

	$funflag=1;	
}

// -------------------------------------------------------------------------- TRAVEL
// else if($input=='e' || $input=='east') 
// {
// 	echo 'You travel east<br>';
// 	$message="<i>You travel east</i><br>".$_SESSION['desc028c'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = '028c'"); // -- room change
//   	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='u' || $input=='up') 
// {
// 	echo 'You travel up<br>';
// 	$message="<i>You travel up</i><br>".$_SESSION['desc028'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = '028'"); // -- room change
//   	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '028c';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'up') {       $roomNum = '028';handleTravel($_SESSION['username'], $link, 'up', $roomNum, 'desc'.$roomNum.'');} 


// ----------------------------------- end of room function
include('function-end.php');
// }

?>
