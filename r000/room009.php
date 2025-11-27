<?php
// -- 009 -- Spider Cave
$roomname = "Spider Cave";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc009'];
//$dangerLVL = $_SESSION['dangerLVL'] = "3"; // danger level

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

	 if ($input == 'search')
	 {
		 $rand = rand (1,5); //20%
		 if ($rand ==1)
		 {
			 echo 'You search and find nothing..<br>';
			$message="You search and find nothing..<br>";
			include ('update_feed.php'); // --- update feed
		 }
		 else {
			 echo $message="You search the room and up high you find a hidden passageway to the south!<br>";
		 include ('update_feed.php'); // --- update feed
		 $_SESSION['spidercavesearch'] = 1; 
		 }
		//  //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats

	 }
	 


	
		
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1 && $input!='attack spider' && $input!='attack scorpion' && $input!='attack' && $input!='a') 
	{	$rand = rand (1,10); 
	}	else {$rand=0;}
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input != 'ne' && $input != 'n' && $input != 'e') { echo "This room is safe.<br>"; }	
// -------------------------------------------------------------------------- INITIALIZE SPIDER	3/10
else if(($input=='attack spider' || $input=='attack' || $rand >= 7 ) && $infight==0 && $endfight==0) 
	{
		if ($input=='attack spider') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Spider'");
		updateStats($link, $username, ['enemy' => 'Spider']); // -- update stats
		include ('battle.php');
	}
// -------------------------------------------------------------------------- INITIALIZE SCORPION	2/10
else if(($input=='attack scorpion' || $rand <= 2 ) && $infight==0 && $endfight==0) 
	{
		if ($input=='attack scorpion') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Scorpion'");
		updateStats($link, $username, ['enemy' => 'Scorpion']); // -- update stats
		
		include ('battle.php');
	}
	
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{
	if($input=='attack scorpion' || $input=='attack spider') { $input = 'attack'; }
	include ('battle.php');
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
elseif ($input == 'north') { $_SESSION['spidercavesearch'] = 0; $roomNum = '008';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'east') { $_SESSION['spidercavesearch'] = 0; $roomNum = '010';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'northeast') {$_SESSION['spidercavesearch'] = 0; $roomNum = '011';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'south') { 
	if ($_SESSION['spidercavesearch'] != 1) 
	{ 
	echo "You don't see an exit to the south.<br>";
	$message="<i>You don't see an exit to the south.</i><br>";
	include ('update_feed.php'); // --- update feed
	}
	else {
		if ($_SESSION['flying'] >= 1)
		{
			echo 'You fly south through the secret tunnel!<br>';
			$message="<i>You fly south through the secret tunnel!</i><br>".$_SESSION['desc309'];
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '309'"); // -- room change
			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			updateStats($link, $username, ['room' => 309]); // -- update stats
			updateStats($link, $username, ['endfight' => 0]); // -- update stats
			$_SESSION['spidercavesearch'] = 0;
		}
	else
		{
			echo $message="<i>You will not be able to go south through the secret tunnel unless you are flying.</i><br>";
			include ('update_feed.php');   // --- update feed
		}
	}
} 
elseif ($input == 'northwest') { 
	if ( $row['dexmod']>= 20) 
	{ 
		echo "<i>With great dexterity you squeeze through a crack in the cave and travel northwest</i><br>";
		$message="<i>With great dexterity you squeeze through a crack in the cave and travel northwest</i><br>".$_SESSION['desc026'];
		include ('update_feed.php'); // --- update feed
		//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
		// $results = $link->query("UPDATE $user SET room = '026'"); // -- room change
		updateStats($link, $username, ['room' => 026]); // -- update stats
		$_SESSION['spidercavesearch'] = 0;
	}
	else {
		echo $message="You simply don't have the dexterity [20] to go that way.<br>";
	 	include ('update_feed.php'); // --- update feed
	}
} 




// else if($input=='n' || $input=='north') 
// {
// 	echo 'You travel north<br>';
//   	$message="<i>You travel north</i><br>".$_SESSION['desc008'];
// 	include ('update_feed.php'); // --- update feed
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	$results = $link->query("UPDATE $user SET room = '008'"); // -- room change
// 	$_SESSION['spidercavesearch'] = 0;
// }
// else if($input=='e' || $input=='east') 
// {
// 	echo 'You travel east<br>';
//    	$message="<i>You travel east</i><br>".$_SESSION['desc010'];
// 	include ('update_feed.php'); // --- update feed
// 	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	$results = $link->query("UPDATE $user SET room = '010'"); // -- room change
// 	$_SESSION['spidercavesearch'] = 0;
// }

// else if($input=='ne' || $input=='northeast') 
// {
// 	echo 'You travel northeast<br>';
//    	$message="<i>You travel northeast</i><br>".$_SESSION['desc011'];
// 	include ('update_feed.php'); // --- update feed
// 	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	$results = $link->query("UPDATE $user SET room = '011'"); // -- room change
// 	$_SESSION['spidercavesearch'] = 0;
// }

// else if($input=='s' || $input=='south') 
// { 
// 	if ($_SESSION['spidercavesearch'] != 1) 
// 	{ 
// 	echo "You don't see an exit to the south.<br>";
// 	$message="<i>You don't see an exit to the south.</i><br>";
// 	include ('update_feed.php'); // --- update feed
// 	}
// 	else {

// 		if ($_SESSION['flying'] >= 1)
// 		{
// 			echo 'You fly south through the secret tunnel!<br>';
// 			$message="<i>You fly south through the secret tunnel!</i><br>".$_SESSION['desc309'];
// 			include ('update_feed.php'); // --- update feed
// 			$results = $link->query("UPDATE $user SET room = '309'"); // -- room change
// 			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 			$_SESSION['spidercavesearch'] = 0;
// 		}
// 	else
// 		{
// 			echo $message="<i>You will not be able to go south through the secret tunnel unless you are flying.</i><br>";
// 			include ('update_feed.php');   // --- update feed
// 		}
// 	}
// }



// else if($input=='nw' || $input=='northwest') 
// {
// 	if ( $row['dexmod']>= 20) 
// 	{ 
// 		echo "<i>With great dexterity you squeeze through a crack in the cave and travel northwest</i><br>";
// 		$message="<i>With great dexterity you squeeze through a crack in the cave and travel northwest</i><br>".$_SESSION['desc026'];
// 		include ('update_feed.php'); // --- update feed
// 		//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 		$results = $link->query("UPDATE $user SET room = '026'"); // -- room change
// 	}
// 	else {
// 		echo $message="You simply don't have the dexterity [20] to go that way.<br>";
// 	 	include ('update_feed.php'); // --- update feed
// 	}
// }

// ----------------------------------- end of room function
include('function-end.php');
 

// }

?>
