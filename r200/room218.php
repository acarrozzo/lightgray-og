<?php
						$roomname = "Red Town Courtyard";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc218'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1"; // danger level

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

include ('battle-sets/thief.php');



// -------------------------------------------------------------------------- READ SIGN!
if($input=='read sign') {  //read sign
   echo '   <i>You read the Red Town Courtyard Directory</i> <br>  ';
   $message="
   <i>you read the sign:</i>   
   <div class='sign'>
   <h3>Red Courtyard</h3>
   <h4>Directory</h4>
   <form id='mainForm' method='post' action='' name='formInput'>
   <span class='direc'><input type='submit' name='input1' class='goldBG' value='north' /></span> <span class='hilight'>Red Town Church</span> <i>Make Peace</i><br />
   <span class='direc'><input type='submit' name='input1' class='goldBG' value='east' /></span> <span class='hilight'>Todd's Pub & Inn</span> <i>Rest & Drink</i><br />
   <span class='direc'><input type='submit' name='input1' class='goldBG' value='south' /></span> <span class='hilight'>Back Alley</span> <i>Be Wary of Thieves</i><br />
   <span class='direc'><input type='submit' name='input1' class='goldBG' value='west' /></span> <span class='hilight'>Grand Square</span> <i>Red Town Center & Guilds</i><br />
   <span class='direc'><input type='submit' name='input1' class='goldBG' value='northeast' /></span> <span class='hilight'>Town Hall</span> <i>Quests & Gold Chest</i><br />
   <span class='direc'><input type='submit' name='input1' class='goldBG' value='southeast' /></span> <span class='hilight'>Red Town Docks</span> <i>Currently Closed</i> <br />
   </form></div>"; 
   include ('update_feed.php'); // --- update feed	
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
// else if($input=='s' || $input=='south') 
// {  echo 'You travel south<br>';
//    $message="<i>You travel south</i><br>".$_SESSION['desc234'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 234"); // -- room change
// }

// else if($input=='w' || $input=='west') 
// {	echo 'You travel west<br>';
//    $message="<i>You travel west</i><br>".$_SESSION['desc217'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 217"); // -- room change
// }

// else if($input=='n' || $input=='north') 
// {	echo 'You travel north<br>';
//    $message="<i>You travel north</i><br>".$_SESSION['desc219'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 219"); // -- room change
// }

// else if($input=='e' || $input=='east') 
// {	echo 'You travel east<br>';
//    $message="<i>You travel east</i><br>".$_SESSION['desc220'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 220"); // -- room change
// }
// else if($input=='ne' || $input=='northeast') 
// {	echo 'You travel northeast<br>';
//    $message="<i>You travel northeast</i><br>".$_SESSION['desc221'];
//   include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 221"); // -- room change
// }

// else if($input=='se' || $input=='southeast') 
// {	echo 'You travel southeast<br>';
//    $message="<i>You travel southeast</i><br>".$_SESSION['desc235'];
//    include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 235"); // -- room change
// }
// else if($input=='d' || $input=='down') 
// {	echo 'You travel down<br>';
//    $message="<i>You travel down</i><br>".$_SESSION['desc232c'];
//    include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = '232c'"); // -- room change
// }



// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '219';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'east') {     $roomNum = '220';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'south') {    $roomNum = '234';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'west') {     $roomNum = '217';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northeast') { $roomNum = '221';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southeast') { $roomNum = '235';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'down') {     $roomNum = '232c';handleTravel($_SESSION['username'], $link, 'down', $roomNum, 'desc'.$roomNum.'');}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
