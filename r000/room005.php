<?php
// -- 005 -- Grassy Field North
$roomname = "Grassy Field North";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc005'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php');

// -------------------------DB CONNECT!
//include ('db-connect.php');
// -------------------------DB QUERY!
// $sql = "SELECT * FROM $username";
// if(!$result = $link->query($sql)){die('There was an error running the query [' . $link->error . ']');}

// // -------------------------DB OUTPUT!
// while($row = $result->fetch_assoc()){


// -------------------------DB QUERY!

// $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
// if (!$stmt) {
//     error_log('Database prepare failed: ' . $link->error);
//     die('An error occurred. Please try again later.');
// }
// $stmt->bind_param("s", $_SESSION['username']);
// $stmt->execute();
// $result = $stmt->get_result();

// // if ($result->num_rows === 0) {
// //     die('User not found.');
// // }

// $row = $result->fetch_assoc();

$row = getUserData($link, $_SESSION['username']); // --- gets all user data from database



$quest9 = $row['quest9'];
$KLgoblinchief = $_SESSION['KLgoblinchief'];
$pajamashamanFlag = $row['pajamashamanFlag'];




if($input=='ex tent' || $input=='examine tent') {  //ex tent
    echo $message="<i>You examine the tent to the east. It appears to be made out of pajamas.</i><br>";
	include ('update_feed.php'); // --- update feed
}





if($input=='pick blueberry' ||$input=='pick 5 blueberry' || $input=='pick berry')  // ---- PICK blueBERRY
{
    $check=$row['blueberry'];
	if ( $check >= 5 )
	{
	echo $message="<div class='menuAction'>You already have a bunch of blueberries! Come back if you run out.</div>";	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'>You pick up 5 blueberries!</div>";
	include ('update_feed.php'); // --- update feed
	//$results = $link->query("UPDATE $user SET blueberry = 5");
	updateStats($link, $username, ['blueberry' => 5]);

	}
}



// -------------------------------------------------------------------------- TRAVEL
// else if($input=='s' || $input=='south')
// {	echo 'You travel south<br>';
// 	$message="<i>You travel south</i><br>".$_SESSION['desc001'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '001'"); // -- room change
// }
// else if($input=='sw' || $input=='southwest')
// {	echo 'You travel southwest<br>';
// 	$message="<i>You travel southwest</i><br>".$_SESSION['desc004'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '004'"); // -- room change
// }
// else if($input=='se' || $input=='southeast')
// {	echo 'You travel southeast<br>';
// 	$message="<i>You travel southeast</i><br>".$_SESSION['desc006'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '006'"); // -- room change
// }
// else if($input=='west' || $input=='w')
// {	echo 'You travel west<br>';
// 	$message="<i>You travel west</i><br>".$_SESSION['desc020'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '020'"); // -- room change
// }
// else if($input=='east' || $input=='e')
// {	echo 'You travel east<br>';
// 	$message="<i>You travel east</i><br>".$_SESSION['desc021'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '021'"); // -- room change
// 	$results = $link->query("UPDATE $user SET pajamashamanFlag = 1");
// }
// else if($input=='down' || $input=='d')
// {	echo 'You travel down into the Secret Battle Arena<br>';
// 	$message="<i>You travel down into the Secret Battle Arena</i><br>".$_SESSION['desc005b'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '005b'"); // -- room change
// }
// else if($input=='north' || $input=='n')
// {
// 	if ($KLgoblinchief == 0) {
// 	echo $message="<i>You cannot go north yet. Complete Jack Lumber's quests to open this gate.</i><br>";
// 	include ('update_feed.php'); // --- update feed
// 	}
// 	else {
// 		echo 'You travel north<br>';
// 		$message="<i>You travel north</i><br>".$_SESSION['desc029'];
// 		include ('update_feed.php'); // --- update feed
// 		$results = $link->query("UPDATE $user SET room = '029'"); // -- room change
// 	}
// }


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {
	if ($KLgoblinchief == 0) {
		echo $message="<i>You cannot go north yet. Complete Jack Lumber's quests to open this gate.</i><br>";
		include ('update_feed.php'); // --- update feed
		}
		else {
			handleTravel($_SESSION['username'], $link, 'north', '029', 'desc029');
		}
}
elseif ($input == 'east') {     
	if ($pajamashamanFlag==0) {
        echo  $message = "<div class='menuAction'>
        The Pajama Shaman can teach you Magic! You can now learn the <em class='red'>FIREBALL</em> and <em class='green'>HEAL</em> spell!</span></div> ";
        include('update_feed.php'); // --- update feed
        updateStats($link, $_SESSION['username'],['pajamashamanFlag' => 1 ]); // -- update  
    } 
	$roomNum = '021';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');
}

elseif ($input == 'south') {    $roomNum = '001';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'west') {     $roomNum = '020';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southeast') { $roomNum = '006';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southwest') { $roomNum = '004';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');}

elseif ($input == 'down') {
	echo 'You travel down into the Secret Battle Arena<br>';
	$message="<i>You travel down into the Secret Battle Arena</i><br>".$_SESSION['desc005b'];
	include ('update_feed.php'); // --- update feed
	//$results = $link->query("UPDATE $user SET room = '005b'"); // -- room change
	$updates = ['endfight' => 0, 'room' => '005b' ]; // -- room change
    updateStats($link, $_SESSION['username'], $updates); // -- set changes
}

// ----------------------------------- end of room function
include('function-end.php');
//}
?>
