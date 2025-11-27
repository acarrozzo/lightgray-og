<?php
						$roomname = "Stone Path Bridge";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc501'];

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
	

if ($row['grandquest4']=='0'){
		// $query = $link->query("UPDATE $user SET grandquest4 = 1 "); 
		updateStats($link, $username,['grandquest4' => 1 ]); // -- update stat 
		echo $message = "You start GRAND QUEST 4! Help the friends you find in the Dark Forest and the Stone Mountain (Complete Quests 51-70)<br>";
		include ('update_feed.php'); // --- update feed
}



// -------------------------------------------------------------------------- READ SIGN!
if($input=='read sign') {  //read sign
	echo	 '<i>You read the sign.</i><br>';
	$message="
	<i>you read the sign:</i>   
	<div class='sign brownBG'>
	---------------------------------------------------<br>
	<span class='h4'>Path to the Mountains</span><br>
	<span class='blue'>:: DANGER :: <br>
	This road is no longer patrolled by the Red Guard. <br>
	Travel at your own risk.</span><br>
	---------------------------------------------------<br>
	Highwaymen attack for 60 damage every single hit. <br>
	(Unless they pickpocket you. )<br>
	---------------------------------------------------<br>
	</div>";
	include ('update_feed.php'); // --- update feed	

}		
	

// -------------------------------------------------------------------------- BATTLE SET - Dark Forest Mountain Path
	
	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,8); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE bowman 1/8
if(($rand == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Bowman'");
	updateStats($link, $username,['enemy' => 'Bowman' ]); // -- set enemy 
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE highwayman 1/8
else if(($rand == 2 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Highwayman'");
	updateStats($link, $username,['enemy' => 'Highwayman' ]); // -- set enemy 
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE others 1/4
else if(($rand == 3 || $rand == 4  ) && $infight==0 && $endfight==0) 
	{	
		//imp, snake, salamander, golden bat, wild boar, kobold, skeleton, giant rat, troll
		$rand2 = rand(1,9);
		if($rand2 == 1 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Imp'");
			updateStats($link, $username,['enemy' => 'Imp' ]); // -- set enemy 

	include ('battle.php'); 
}		 			// - 1/9
		if($rand2 == 2 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Snake'");
			updateStats($link, $username,['enemy' => 'Snake' ]); // -- set enemy 
			include ('battle.php'); 
}		 		// - 1/9
		if($rand2 == 3 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Salamander'");
			updateStats($link, $username,['enemy' => 'Salamander' ]); // -- set enemy 
			include ('battle.php'); 
}		 	// - 1/9
		if($rand2 == 4 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Golden Bat'");
			updateStats($link, $username,['enemy' => 'Golden Bat' ]); // -- set enemy 
			include ('battle.php'); 
}			// - 1/9
		if($rand2 == 5 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Wild Boar'");
			updateStats($link, $username,['enemy' => 'Wild Boar' ]); // -- set enemy 
			include ('battle.php'); 
}			// - 1/9
		if($rand2 == 6 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Kobold'");
			updateStats($link, $username,['enemy' => 'Kobold' ]); // -- set enemy 
			include ('battle.php'); 
}			 	// - 1/9
		if($rand2 == 7 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Skeleton'");
			updateStats($link, $username,['enemy' => 'Skeleton' ]); // -- set enemy 
			include ('battle.php'); 
}			 	// - 1/9
		if($rand2 == 8 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Giant Rat'");
			updateStats($link, $username,['enemy' => 'Giant Rat' ]); // -- set enemy 
			include ('battle.php'); 
}			// - 1/9
		if($rand2 == 9 ) { 
			// $results = $link->query("UPDATE $user SET enemy = 'Troll'");
			updateStats($link, $username,['enemy' => 'Troll' ]); // -- set enemy 
			include ('battle.php'); 
}			 		// - 1/9
	}
	
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	










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
// else if($input=='n' || $input=='north') 
// {			echo 'You travel north<br>';
//    	$message="<i>You travel north</i><br>".$_SESSION['desc502'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '502'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='s' || $input=='south') 
// {			echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc114'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '114'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }



// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '502';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'south') {    $roomNum = '114';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>