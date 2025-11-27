<?php
							$roomname = "Ogre Path";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc111e'];
//$dangerLVL = $_SESSION['dangerLVL'] = "8"; // danger level

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
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10);$randrare = rand (1,50);  }	else {$rand=0;$randrare=0;}
// -------------------------------------------------------------------------- INITIALIZE SUPER RARE - Ogre Priest - 1/50
if(($randrare == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Ogre Priest'");
	updateStats($link, $username,['enemy' => 'Ogre Priest' ]); // -- set enemy
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- INITIALIZE Ogre - 30%
else if($infight==0 && $endfight==0 && ($input=='attack' || $input=='attack ogre' || $rand <= 3 )) 
	{	if ($input=='attack ogre') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Ogre'");
		updateStats($link, $username,['enemy' => 'Ogre' ]); // -- set enemy
		include ('battle.php');	}
// -------------------------------------------------------------------------- INITIALIZE Hob Goblin - 10%
else if( $infight==0 && $endfight==0 && ($input=='attack hob goblin' || $rand == 4 ) ) 
	{	if ($input=='attack hob goblin') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Hob Goblin'");
		updateStats($link, $username,['enemy' => 'Hob Goblin' ]); // -- set enemy	
		include ('battle.php'); }
// -------------------------------------------------------------------------- INITIALIZE Orc - 10%
else if( $infight==0 && $endfight==0 && ($input=='attack orc' || $rand == 5 ) ) 
	{	if ($input=='attack orc') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Orc'");
		updateStats($link, $username,['enemy' => 'Orc' ]); // -- set enemy
		include ('battle.php'); }				
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack ogre' || $input=='attack hob goblin' || $input=='attack orc') { $input = 'attack'; } 
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
// -------------------------------------------------------------------------- END BATTLE BLOCK




// --------------------------------------------------------------------------- PICK UP MAP
if ($input=="pick up map"){
	echo 'You pick up the forest underground map:<br>';
	$message ='<br><i>You pick up the forest underground map. Check your INV to view the map at anytime</i><br>
	<a target="_blank" rel="map" href="img/lightgray_map_forest_underground.jpg" class="fancybox">
	<img class="mapimage" width="350" height="350" alt="View Map"  src="img/lightgray_map_forest_underground.jpg"><br>
	click to open map in new window and view full size</a><br>';
  	include ('update_feed_alt.php'); // --- update feed ALT
	// $results = $link->query("UPDATE $user SET forestundergroundmap = 1");
	updateStats($link, $username,['forestundergroundmap' => 1 ]); // -- update stat 

}



// -------------------------------------------------------------------------- TRAVEL
// else if($input=='w' || $input=='west') 
// {	echo 'You travel west<br>';
//    	$message="<i>You travel west</i><br>".$_SESSION['desc111a'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = '111a'"); // -- room change
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='se' || $input=='southeast') 
// {	echo 'You travel southeast<br>';
//    	$message="<i>You travel southeast</i><br>".$_SESSION['desc111f'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = '111f'"); // -- room change
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'west') {     $roomNum = '111a';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'southeast') { $roomNum = '111f';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');} 
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
