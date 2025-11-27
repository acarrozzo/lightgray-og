<?php
						$roomname = "Red Fort Barracks";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc324'];
//$dangerLVL = $_SESSION['dangerLVL'] = "18"; // danger level

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


// -------------------------------------------------------------------------------------------------------------- BATTLE VARIABLES		
 	
$infight = $row['infight'];
$endfight = $row['endfight'];
	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE - 3/10
if(($rand <= 3 ) && $infight==0 && $endfight==0) {	
    $results = $link->query("UPDATE $user SET enemy = 'Bandit Marauder'");
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/10
else if(($rand == 4 ) && $infight==0 && $endfight==0) {	
    $results = $link->query("UPDATE $user SET enemy = 'Red Bandit'");
	include ('battle.php'); 
}				
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	
// -------------------------------------------------------------------------- END BATTLE BLOCK






if ($input == 'search')
{
	$rand = rand (1,4); // 
	if ($rand == 1) {
		$rand2 = rand(1,5);
		if ($rand2 ==1){
			echo $message="You search the barracks and find a Bandit Hood!<br>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET bandithood = bandithood + 1");
		}
		if ($rand2 ==2){
			echo $message="You search the barracks and find an Iron Hood!<br>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET ironhood = ironhood + 1");
		}
		if ($rand2 ==3){
			echo $message="You search the barracks and find a Meatball!<br>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET meatball = meatball + 1");
		}
		if ($rand2 ==4){
			echo $message="You search the barracks and find a Bluefish!<br>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET bluefish = bluefish + 1");
		}
		if ($rand2 ==5){
			$rand3 = rand(100,200);
			echo $message="You search the barracks and find $rand3 ".$_SESSION['currency']."!<br>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET currency = currency + $rand3");
		}
	}
	else {
		echo $message="You search the barracks and find nothing, you should search again.<br>";
		include ('update_feed.php'); // --- update feed
	}
	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}


$randMessage = rand(1,10);
if ($randMessage == 1 && $infight == 0 ) //$endfight == 1
{
	$rand2 = rand(1,3);
	if ( $rand2 == 1 )	{
		echo $message="<br><i> --- you hear a giant rat scurrying along the floor.</i><br>";
   		include ('update_feed_alt.php'); // --- update feed
	}
	else if ( $rand2 == 2 )	{
		echo $message="<br><i> --- you hear someone scream from the north.</i><br>";
   		include ('update_feed_alt.php'); // --- update feed
	}
	else if ( $rand2 == 3 )	{
		echo $message="<br><i> --- the air from the south is warm and delicious.</i><br>";
   		include ('update_feed_alt.php'); // --- update feed
	}
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
else if($input=='n' || $input=='north') 
{			echo 'You travel north<br>';
   	$message="<i>You travel north</i><br>".$_SESSION['desc326'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 326"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}
else if($input=='e' || $input=='east') 
{			echo 'You travel east<br>';
   	$message="<i>You travel east</i><br>".$_SESSION['desc323'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 323"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}
else if($input=='s' || $input=='south') 
{			echo 'You travel south<br>';
   	$message="<i>You travel south</i><br>".$_SESSION['desc325'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 325"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}






// ----------------------------------- end of room function
include('function-end.php');
// }
?>