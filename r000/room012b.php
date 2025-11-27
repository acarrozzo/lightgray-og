<?php
				$roomname = "Scorpion Pit Entrance";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc012b'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5"; // danger level
  

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
	$enemy=$row['enemy'];

	$redpotion=$row['redpotion'];
	$bluepotion=$row['bluepotion'];
	
		
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1 && $input!='attack alpha scorpion' && $input!='attack giant spider' && $input!='attack' && $input!='a') 
	{	$rand = rand (1,10); 
	}	else {$rand=0;}
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input != 'sw') { echo "This room is safe.<br>"; }	
// -------------------------------------------------------------------------- INITIALIZE ALPHA	3/10
else if(($input=='attack alpha scorpion' || $rand >= 7 ) && $infight==0 && $endfight==0) 
	{
		if ($input=='attack alpha scorpion') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Alpha Scorpion'");
		updateStats($link, $username, ['enemy' => 'Alpha Scorpion']); // -- update stats
		include ('battle.php');
	}
// -------------------------------------------------------------------------- INITIALIZE giant spider	2/10
else if(($input=='attack giant spider' || $rand <= 2 ) && $infight==0 && $endfight==0) 
	{
		if ($input=='attack giant spider') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Giant Spider'");
		updateStats($link, $username, ['enemy' => 'Giant Spider']); // -- update stats
		include ('battle.php');
	}
	
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{
	if($input=='attack alpha scorpion' || $input=='attack giant spider') { $input = 'attack'; }
	include ('battle.php');
	}





if ($input == 'search')
{
	$rand = rand (1,2); 			//		1/2
	if ($rand == 1) {
		$rand2 = rand(1,2);		//		1/2
		if ($rand2 ==1){
			echo $message="You search the Scorpion Pit and find a Red Potion!<br>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
			updateStats($link, $username, ['redpotion' => $redpotion + 1]); // -- update stats

			
		}
		if ($rand2 ==2){
			echo $message="You search the Scorpion Pit and find a Blue Potion!<br>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1");
			updateStats($link, $username, ['bluepotion' => $bluepotion + 1]); // -- update stats
		}		
	}
	else {
		echo $message="You search the Scorpion Pit and find nothing, you should search again.<br>";
		include ('update_feed.php'); // --- update feed
	}
	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}




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
elseif ($input == 'south') {    
	$roomNum = '012c';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['scorpionswitch'] = 0;
} 
// else if($input=='s' || $input=='south') 
// {  	echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc012c'];
// 	include ('update_feed.php'); // --- update feed
//    	$results = $link->query("UPDATE $user SET room = '012c'"); // -- room change
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	$_SESSION['scorpionswitch'] = 0;
// }

else if($input=='u' || $input=='up') 
{	echo 'You exit the scorpion pit and enter the spider cave<br>';
   	$message="<i>You exit the scorpion pit and enter the spider cave</i><br>".$_SESSION['desc012'];
	include ('update_feed.php'); // --- update feed
   	// $results = $link->query("UPDATE $user SET room = '012'"); // -- room change
	   updateStats($link, $username, ['room' => '012']); // -- update stats
   	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
	$_SESSION['scorpionswitch'] = 0;
	
}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
