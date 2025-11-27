<?php
						$roomname = "In the Forest atop a Hill";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc135'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5-13"; // danger level

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

$blueberry=$row['blueberry'];

include ('battle-sets/forest.php');
include ('function-choptree.php');

if($input=='pick blueberry' || $input=='pick berry')  // ---- PICK REDBERRY
{
	if ( $blueberry >= 15 )
	{
		$blueberrynext = $blueberry + 1;
	echo $message='<div class="menuAction">You pick a blueberry. ['.$blueberrynext.'] 
	<form id="mainForm" method="post" action="" name="formInput">
	<button type="submit" name="input1" class="blueBG" value="pick blueberry">pick blueberry</button>	
	</form></div>';
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET blueberry = blueberry + 1");
	// $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$updates = ['endfight' => 0, 'blueberry' => $blueberry + 1 ]; // -- set changes
	updateStats($link, $username, $updates); // -- apply changes
	}
//	else if ( $blueberry >= 15 )
//	{
//	echo $message="<div class='menuAction'>You already have more than 15 blueberries! Come back if you run low.</div>";
//	include ('update_feed.php'); // --- update feed
//	}
	else { 
		//echo $message="<div class='menuAction'>You pick up 15 blueberries!</div>";
		echo $message='<div class="menuAction">You pick up 15 blueberries.
		<form id="mainForm" method="post" action="" name="formInput">
		<button type="submit" name="input1" class="blueBG" value="pick blueberry">pick blueberry</button>	
		</form></div>';
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET blueberry = 15");
	$updates = ['endfight' => 0, 'blueberry' => 15 ]; // -- set changes

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
// else if($input=='w' || $input=='west') 
// {	echo 'You travel west<br>';
//    $message="<i>You travel west</i><br>".$_SESSION['desc120'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 120"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='ne' || $input=='northeast') 
// {	echo 'You travel northeast<br>';
//    $message="<i>You travel northeast</i><br>".$_SESSION['desc136'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 136"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }

// else if($input=='e' || $input=='east') 
// {	echo 'You travel east<br>';
//    $message="<i>You travel east</i><br>".$_SESSION['desc134'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 134"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='se' || $input=='southeast') 
// {	echo 'You travel southeast<br>';
//    $message="<i>You travel southeast</i><br>".$_SESSION['desc133'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 133"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }



// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '134';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'west') {     $roomNum = '120';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'northeast') { $roomNum = '136';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'southeast') { $roomNum = '133';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
