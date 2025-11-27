<?php
// -- 010 -- Spider Cave
$roomname = "Spider Cave";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc010'];
//$dangerLVL = $_SESSION['dangerLVL'] = "4"; // danger level

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






// -------------------------------------------------------------------------- READ SIGN!
if($input=='read sign') {  //read sign
   echo	 '<i>You read the Spider Cave Directory</i><br>   ';
   
   $message="
   <i>you read the sign:</i>   
   <div class='sign'>
   <h3>Spider Cave <i>Directory</i></h3>

<form id='mainForm' method='post' action='' name='formInput'>

<span class='direc'><input type='submit' name='input1' value='nw' /></span> 
<span class='hilight'>Grassy Field</span> <i>return to safety</i><br />

<span class='direc'><input type='submit' name='input1' value='ne' /></span> 
<span class='hilight'>Scorpion Pit</span> <i>stronger enemies ahead</i><br />

------------------------------------------------<br>
The deeper you go into this Cave the harder the enemies will become. If you run into trouble and need to escape you can <span class='hilight'>TELEPORT</span> back to the grassy field by using the teleport menu above. <br>
------------------------------------------------
</div>
";
	include ('update_feed.php'); // --- update feed	

}






	
		
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1 && $input!='attack giant spider' && $input!='attack scorpion' && $input!='attack' && $input!='a') 
	{	$rand = rand (1,10); 
	}	else {$rand=0;}
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input != 'ne' && $input != 'n' && $input != 'e') { echo "This room is safe.<br>"; }	
// -------------------------------------------------------------------------- INITIALIZE SCORPION	3/10
else if(($input=='attack scorpion' || $rand >= 7 ) && $infight==0 && $endfight==0) 
	{
		if ($input=='attack scorpion') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Scorpion'");
		updateStats($link, $username, ['enemy' => 'Scorpion']); // -- update stats

		include ('battle.php');
	}
// -------------------------------------------------------------------------- INITIALIZE giant spider	3/10
else if(($input=='attack giant spider' || $rand <= 3 ) && $infight==0 && $endfight==0) 
	{
		if ($input=='attack giant spider') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Giant Spider'");
		updateStats($link, $username, ['enemy' => 'Giant Spider']); // -- update stats

		include ('battle.php');
	}
	
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{
	if($input=='attack scorpion' || $input=='attack giant spider') { $input = 'attack'; }
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


elseif ($input == 'north') {    $roomNum = '011';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'west') {     $roomNum = '009';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'northeast') { $roomNum = '012';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'northwest') { $roomNum = '008';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');} 




// // -------------------------------------------------------------------------- TRAVEL
// else if($input=='n' || $input=='north') 
// {
// 	echo 'You travel north<br>';
//    	$message="<i>You travel north</i><br>".$_SESSION['desc011'];
// 	include ('update_feed.php'); // --- update feed
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	$results = $link->query("UPDATE $user SET room = '011'"); // -- room change
// }
// else if($input=='w' || $input=='west') 
// {
// 	echo 'You travel west<br>';
//    	$message="<i>You travel west</i><br>".$_SESSION['desc009'];
// 	include ('update_feed.php'); // --- update feed
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	$results = $link->query("UPDATE $user SET room = '009'"); // -- room change	
// }
// else if($input=='ne' || $input=='northeast') 
// {
// 	echo 'You travel northeast<br>';
//    	$message="<i>You travel northeast</i><br>".$_SESSION['desc012'];
// 	include ('update_feed.php'); // --- update feed
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	$results = $link->query("UPDATE $user SET room = '012'"); // -- room change
// }
// else if($input=='nw' || $input=='northwest') 
// {
// 	echo 'You travel northwest<br>';
//    	$message="<i>You travel northwest</i><br>".$_SESSION['desc008'];
// 	include ('update_feed.php'); // --- update feed
//    	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// 	$results = $link->query("UPDATE $user SET room = '008'"); // -- room change
// }

// ----------------------------------- end of room function
include('function-end.php');
// }

?>
