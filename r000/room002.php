 <?php
// -- 002 -- Grassy Field South
$roomname = "Grassy Field South";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc002'];
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

//$chest1 = $row['chest1'];

if($input=='pick redberry' ||$input=='pick 5 redberry' || $input=='pick berry')  // ---- PICK REDBERRY
{
    //$check=$row['redberry'];
	if ( $row['redberry'] >= 5 )
	{
		echo $message="<div class='menuAction'>You already have a bunch of redberries! Come back if you run low.</div>";
		include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'>You pick up 5 redberries!</div>";
	include ('update_feed.php'); // --- update feed

	$updates = ['redberry' => '5']; // -- set changes
	updateStats($link, $username, $updates); // -- apply changes
	}
}

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '001';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'east') {     $roomNum = '007';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'west') {     $roomNum = '003';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'northeast') { $roomNum = '006';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'northwest') { $roomNum = '004';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');} 

elseif ($input == 's' || $input == 'south') {
	if ($row['chest1'] <= 0){
		echo $message="<div class='menuAction'>You cannot travel to the south yet! You first need what is in the Gold Chest north of here. Help out the Young Soldier to get the Gold Key.</div>";			
   		include ('update_feed.php'); // --- update feed
	}	
	else{
		handleTravel($_SESSION['username'], $link, 'west', '026', 'desc026');
	}
} 

// ----------------------------------- end of room function
include('function-end.php');
// }

?>
