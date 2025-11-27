<?php
$roomname = "Healing Springs";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc020'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

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

$hp=$row['hp'];   
$mp=$row['mp'];
$hpmax=$row['hpmax'];   
$mpmax=$row['mpmax'];   	   

// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
		echo $message = "You rest at the waterfall and supercharge your HP and MP! (Overheal +10 HP, +10 MP)<br>";
		include ('update_feed.php'); // --- update feed

		$updates = [ // -- set changes
			'hp' => $hpmax + 10,
			'mp' => $mpmax + 10
		]; 
		updateStats($link, $_SESSION['username'], $updates); // -- update  
}


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '005';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'south') {    $roomNum = '004';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'southeast') { $roomNum = '001';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'southwest') { $roomNum = '014';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');} 

elseif ($input == 'nw' || $input == 'northwest') {
	if ($_SESSION['flying'] >= 1)
		{
		echo 'You fly up the waterfall.<br>';
   		$message="<i>You fly up the waterfall.</i><br>".$_SESSION['desc610'];
		include ('update_feed.php');   // --- update feed
			$updates = ['room' => '610', 'endfight' => 0, 'mastertrainerFlag' => 1]; // -- room change + reset fight
			updateStats($link, $username, $updates); // -- apply changes
		}
	else{
 		echo $message="<div class='menuAction'>You will not be able to go northwest unless you are flying. Find/buy a wings potion or cast wings spell to fly</div>";
		include ('update_feed.php');   // --- update feed
	}
}
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
