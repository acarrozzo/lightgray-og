<?php
						$roomname = "Cathedral Graveyard";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc616'];

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
	
$offhandsword = $row['offhandsword'];
$ironsword = $row['ironsword'];
$currency = $row['currency'];
$glowingorb = $row['glowingorb'];
$ironboots = $row['ironboots'];
$redbalm = $row['redbalm'];
$bluebalm = $row['bluebalm'];
$reds = $row['reds'];
$greens = $row['greens'];
$blues = $row['blues'];
	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	
		$rand = rand (1,4);
	}	
		else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE - 1/4
if(($rand == 1 ) && $infight==0 && $endfight==0) {	
    // $results = $link->query("UPDATE $user SET enemy = 'Risen Skeleton'");
	updateStats($link, $username,['enemy' => 'Risen Skeleton' ]); // -- set enemy 
	include ('battle.php'); 
}				
		
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	



// //  // $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats !!! ***













// -------------------------------------------------------------------------- SEARCH cathedral graveyard
if ($input == 'search')
{
	$rand = rand (1,2); 			//		1/2
	if ($rand == 1) {
		$rand2 = rand(1,10);		//		1/10
		if ($rand2 ==1){
			//echo $message="You search the cathedral graveyard and find an Off Hand Sword!<br>";
			echo $message="You search the cathedral graveyard and find an Off Hand Sword!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET offhandsword = offhandsword + 1");
			updateStats($link, $username,['offhandsword' => $offhandsword + 1 ]); // -- update stat 
		}
		if ($rand2 ==2){
			echo $message="You search the cathedral graveyard and find an Iron Sword!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET ironsword = ironsword + 1");
			updateStats($link, $username,['ironsword' => $ironsword + 1 ]); // -- update stat
		}
		if ($rand2 ==3){
			$rand3 = rand(300,700);
			echo $message= "You search the cathedral graveyard and find $rand3 ".$_SESSION['currency']."!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET currency = currency + $rand3");
			updateStats($link, $username,['currency' => $currency + $rand3 ]); // -- update stat
		}
		if ($rand2 ==4){
			echo $message="You search the cathedral graveyard and find a Glowing Orb!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET glowingorb = glowingorb + 1");
			updateStats($link, $username,['glowingorb' => $glowingorb + 1 ]); // -- update stat 
		}
		if ($rand2 ==5){
			echo $message="You search the cathedral graveyard and find a pair of Iron Boots!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET ironboots = ironboots + 1");
			updateStats($link, $username,['ironboots' => $ironboots + 1 ]); // -- update stat
		}
		if ($rand2 ==6){
			echo $message="You search the cathedral graveyard and find a Red Balm!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET redbalm = redbalm + 1");
			updateStats($link, $username,['redbalm' => $redbalm + 1 ]); // -- update stat
		}
		if ($rand2 ==7){
			echo $message="You search the cathedral graveyard and find a Blue Balm!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET bluebalm = bluebalm + 1");
			updateStats($link, $username,['bluebalm' => $bluebalm + 1 ]); // -- update stat
		}
		if ($rand2 ==8){
			echo $message="You search the cathedral graveyard and find some Reds!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET reds = reds + 1");
			updateStats($link, $username,['reds' => $reds + 1 ]); // -- update stat
		}
		if ($rand2 ==9){
			echo $message="You search the cathedral graveyard and find some Greens!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET greens = greens + 1");
			updateStats($link, $username,['greens' => $greens + 1 ]); // -- update stat
		}
		if ($rand2 ==10){
			echo $message="You search the cathedral graveyard and find some Blues!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET blues = blues + 1");
			updateStats($link, $username,['blues' => $blues + 1 ]); // -- update stat
		}
	}
	else {
		echo $message="You search the cathedral graveyard and find nothing, you should search again.<br>";
		include ('update_feed.php'); // --- update feed
	}
	//  // $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
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


if ($input=='n') {$input="north";}
else if ($input=='ne') {$input="northeast";}
else if ($input=='e') {$input="east";}
else if ($input=='se') {$input="southeast";}
else if ($input=='s') {$input="south";}
else if ($input=='sw') {$input="southwest";}
else if ($input=='w') {$input="west";}
else if ($input=='nw') {$input="northwest";}
else if ($input=='d') {$input="down";}
else if ($input=='u') {$input="up";}



if($input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='north' || $input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' || $input=='down') 
{			echo 'You attempt to go '.$input.' but somehow get even more lost.<br>';
   	$message="<i>You attempt to go ".$input." but somehow get even more lost.</i><br>";
				include ('update_feed.php'); // --- update feed
   			//  // $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}



// ----------------------------------- end of room function
include('function-end.php');
// }
?>