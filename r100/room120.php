<?php
						$roomname = "In the Forest by a River";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc120'];
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


$ringofdexterityIII=$row['ringofdexterityIII'];
$redberry=$row['redberry'];


include ('battle-sets/forest.php');
include ('function-choptree.php');
	
	

	

if($input=='pick redberry' || $input=='pick berry')  // ---- PICK REDBERRY
{
	if ( $redberry >= 20 )
	{
		$redberrynext = $redberry + 1;
	echo $message='<div class="menuAction">You pick a redberry. ['.$redberrynext.'] 
	<form id="mainForm" method="post" action="" name="formInput">
	<button type="submit" name="input1" class="redBG" value="pick redberry">pick another</button>	
	</form>
	</div>';
	include ('update_feed.php'); // --- update feed

	// $results = $link->query("UPDATE $user SET redberry = redberry + 1");
	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$updates = [ // -- set changes
        'redberry' => $redberrynext,
		'endfight' => 0
    ];
    updateStats($link, $username, $updates); // -- apply changes
	}
//	else if ( $redberry >= 15 )
//	{
//	echo $message="<div class='menuAction'>You already have more than 15 redberries! Come back if you run low.</div>";
//	include ('update_feed.php'); // --- update feed
//	}
	else { echo $message=		
		'<div class="menuAction">You pick up 20 redberries.  
	<form id="mainForm" method="post" action="" name="formInput">
	<button type="submit" name="input1" class="redBG" value="pick redberry">pick redberry</button>	
	</form>
		
		</div>';
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET redberry = 20");
	$updates = [ // -- set changes
        'redberry' => 20,
		'endfight' => 0
    ];
    updateStats($link, $username, $updates); // -- apply changes
	}

}



// -------------------------------------------------------------------------- GRAB RING
if($input=='grab ring') 
{	if ($ringofdexterityIII >= 1)
	 	{ 
			echo $message="<div class='menuAction'>You already have a Ring of Dexterity III. If you lose it come back here for another free one.</div>"; 
			include ('update_feed.php'); // --- update feed
		}
	else
		{ 
			echo $message="<div class='menuAction'>You pick up a Ring of Dexterity III off the Forest floor.</div>"; include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET ringofdexterityIII = ringofdexterityIII + 1");
			$updates = [ // -- set changes
			'ringofdexterityIII' => $ringofdexterityIII + 1
			];
			updateStats($link, $username, $updates); // -- apply changes
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
//    $message="<i>You travel west</i><br>".$_SESSION['desc118'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 118"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='n' || $input=='north') 
// {	echo 'You travel north<br>';
//    $message="<i>You travel north</i><br>".$_SESSION['desc119'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 119"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='s' || $input=='south') 
// {	echo 'You travel south<br>';
//    $message="<i>You travel south</i><br>".$_SESSION['desc121'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 121"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '119';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}  
elseif ($input == 'south') {    $roomNum = '121';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}  
elseif ($input == 'west') {     $roomNum = '118';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
