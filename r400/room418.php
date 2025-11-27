<?php
						$roomname = "Green Water Temple";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc418'];
//$dangerLVL = $_SESSION['dangerLVL'] = "35"; // danger level

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

$equipMount = $row['equipMount'];
$KLsmoothranger = $_SESSION['KLsmoothranger'];

// SMOOTH RANGER
// -------------------------------------------------------------------------- BATTLE VARIABLES
 	
$infight = $row['infight'];
$endfight = $row['endfight'];
// -------------------------------------------------------------------------- After Battle - SAFE ROOM
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br>"; }
// -------------------------------------------------------------------------- INITIALIZE - NOPE! Need to defeat kraken
/*
if($input=='attack temple boss' && $_SESSION['KLkraken'] == 0)
	{
	echo $message="<div class='menuAction'>You can't attack the Green Water Temple Boss yet. You need to defeat the Kraken under the Ocean first.</div>";
	include ('update_feed.php');   // --- update feed
	}
	*/
// -------------------------------------------------------------------------- INITIALIZE SMOOTH RANGER!
else if(($input=='attack temple boss' || $input=='attack' ) && $infight==0 && $endfight==0)
	{
		if ($input=='attack temple boss') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Smooth Ranger'");
		updateStats($link, $username,['enemy' => 'Smooth Ranger' ]); // -- set enemy 
		include ('battle.php');
	}
// -------------------------------------------------------------------------- IN BATTLE
else if ($infight >=1 )
	{
	if($input=='attack temple boss') { $input = 'attack'; }
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

// -------------------------------------------------------------------------- TRAVEL
else if($input=='nw' || $input=='northwest')
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel northwest.<br>';
   		$message="<i>You travel northwest.</i><br>".$_SESSION['desc422'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '422'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '422' ]); // -- update stats

		}
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly northwest!<br>';
            $message="<i>You fly northwest! </i><br>".$_SESSION['desc422'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '422'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '422' ]); // -- update stats
        } 
		   else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='sw' || $input=='southwest')
{
		if ($KLsmoothranger >=1)
			  { echo 'You travel southwest to the Master Temple.<br>';
   				$message="<i>You travel southwest to the Master Temple.</i><br>".$_SESSION['desc425'];
				include ('update_feed.php');   // --- update feed
   			   		// $results = $link->query("UPDATE $user SET room = '425'"); // -- room change
				updateStats($link, $username,['endfight' => 0, 'room' => '425' ]); // -- update stats
				}
		else
		   {
				echo $message="<div class='menuAction'>You can't enter the Master Temple Yet! You need defeat the Green Water Temple Boss first!</div>";
				include ('update_feed.php');   // --- update feed
	}
}

else if($input=='se' || $input=='southeast')
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel southeast.<br>';
   		$message="<i>You travel southeast.</i><br>".$_SESSION['desc416'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '416'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '416' ]); // -- update stats

		} 
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly southeast!<br>';
            $message="<i>You fly southeast! </i><br>".$_SESSION['desc416'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '416'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '416' ]); // -- update stats
        } 
		  else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='e' || $input=='east')
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel east.<br>';
   		$message="<i>You travel east.</i><br>".$_SESSION['desc415'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '415'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '415' ]); // -- update stats

		}
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly east!<br>';
            $message="<i>You fly east! </i><br>".$_SESSION['desc415'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '415'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '415' ]); // -- update stats
        } 
		   else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}






// ----------------------------------- end of room function
include('function-end.php');
// }
?>
