<?php
							  $roomname = "Kobold Dead End";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc115b'];
//$dangerLVL = $_SESSION['dangerLVL'] = "7"; // danger level

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

$blueberry = $row['blueberry'];
$bluepotion = $row['bluepotion'];	
	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10);$randrare = rand (1,50);  }	else {$rand=0;$randrare=0;}
// -------------------------------------------------------------------------- INITIALIZE SUPER RARE - Kobold Monk - 1/50
if(($randrare == 1 ) && $infight==0 && $endfight==0) {	
   // $results = $link->query("UPDATE $user SET enemy = 'Kobold Monk'");
	updateStats($link, $username,['enemy' => 'Kobold Monk' ]); // -- set enemy 
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE flying kobold - 3/10
else if(($rand <= 3 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Flying Kobold'");
	updateStats($link, $username,['enemy' => 'Flying Kobold' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE bat - 1/10
else if(($rand == 4 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Bat'");
	updateStats($link, $username,['enemy' => 'Bat' ]); // -- set enemy
	include ('battle.php'); 
}			
// -------------------------------------------------------------------------- INITIALIZE golden bat - 1/10
else if(($rand == 5 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Golden Bat'");
	updateStats($link, $username,['enemy' => 'Golden Bat' ]); // -- set enemy
	include ('battle.php'); 
}							
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	



// -------------------------------------------------------------------------- SEARCH

if ($input == 'search')
{
	$rand = rand (1,3); 		// 1/3
	if ($rand == 1) {
		$rand2 = rand(1,2);		// 1/2
		if ($rand2 ==1){
			echo $message="You search the Kobold Dead End and find 3 blueberries!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET blueberry = blueberry + 3");
			$updates = [ // -- set changes
				'blueberry' => $blueberry + 3
			];
			updateStats($link, $username, $updates); // -- apply changes
		}
		if ($rand2 ==2){
			echo $message="You search the Kobold Dead End and find a Blue Potion!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1");
			$updates = [ // -- set changes
				'bluepotion' => $bluepotion + 1
			];
			updateStats($link, $username, $updates); // -- apply changes
		}		
	}
	else {
		echo $message="You search the Kobold Dead End and find nothing, you should search again.<br>";
		include ('update_feed.php'); // --- update feed
	}
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
// {	echo 'You travel east<br>';
//    $message="<i>You travel east</i><br>".$_SESSION['desc115a'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = '115a'"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '115a';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');} 
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
