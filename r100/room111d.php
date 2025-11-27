<?php
							$roomname = "Hob Goblin Tent";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc111d'];
//$dangerLVL = $_SESSION['dangerLVL'] = "6"; // danger level

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
	
$redberry = $row['redberry'];
$redpotion = $row['redpotion'];

// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10);$randrare = rand (1,50);  }	else {$rand=0;$randrare=0;}
// -------------------------------------------------------------------------- INITIALIZE SUPER RARE - Ogre Priest - 1/50
if(($randrare == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Ogre Priest'");
	updateStats($link, $username,['enemy' => 'Ogre Priest' ]); // -- set enemy
	include ('battle.php'); 
}					
// -------------------------------------------------------------------------- INITIALIZE Hob Goblin - 40%
else if($infight==0 && $endfight==0 && ($input=='attack' || $input=='attack hob goblin' || $rand <= 4 )) 
	{	if ($input=='attack hob goblin') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Hob Goblin'");
		updateStats($link, $username,['enemy' => 'Hob Goblin' ]); // -- set enemy
		include ('battle.php');	}
// -------------------------------------------------------------------------- INITIALIZE Goblin - 10%
else if( $infight==0 && $endfight==0 && ($input=='attack goblin' || $rand == 5 ) ) 
	{	if ($input=='attack goblin') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Goblin'");
		updateStats($link, $username,['enemy' => 'Goblin' ]); // -- set enemy
		include ('battle.php'); }		
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack goblin' || $input=='attack hob goblin') { $input = 'attack'; } 
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




// -------------------------------------------------------------------------- SEARCH

if ($input == 'search')
{
	$rand = rand (1,3); 		// 1/3
	if ($rand == 1) {
		$rand2 = rand(1,2);		// 1/2
		if ($rand2 ==1){
			echo $message="You search the Hob Goblin Hut and find 3 redberries!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET redberry = redberry + 3");
			$updates = [ // -- set changes
				'redberry' => $redberry + 3
			];
			updateStats($link, $username, $updates); // -- apply changes
		}
		if ($rand2 ==2){
			echo $message="You search the Hob Goblin Hut and find a Red Potion!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
			$updates = [ // -- set changes
				'redpotion' => $redpotion + 1
			];
			updateStats($link, $username, $updates); // -- apply changes

		}		
	}
	else {
		echo $message="You search the Hob Goblin Hut and find nothing, you should search again.<br>";
		include ('update_feed.php'); // --- update feed
	}
	updateStats($link, $username, ['endfight' => 0]); // -- update stats
}



// -------------------------------------------------------------------------- TRAVEL
// else if($input=='nw' || $input=='northwest') 
// {	echo 'You travel northwest<br>';
//    	$message="<i>You travel northwest</i><br>".$_SESSION['desc111b'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = '111b'"); // -- room change
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='n' || $input=='north') 
// {	echo 'You travel north<br>';
//    	$message="<i>You travel north</i><br>".$_SESSION['desc111a'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = '111a'"); // -- room change
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '111a';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'northwest') { $roomNum = '111b';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');} 

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
