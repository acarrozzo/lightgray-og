<?php
						$roomname = "Yellow Water Temple";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc405'];
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
$KLheavywalrus = $_SESSION['KLheavywalrus'];

// HEAVY WALRUS
// -------------------------------------------------------------------------- BATTLE VARIABLES
 	
$infight = $row['infight'];
$endfight = $row['endfight'];
// -------------------------------------------------------------------------- After Battle - SAFE ROOM
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br>"; }
// -------------------------------------------------------------------------- INITIALIZE HEAVY WALRUS - NOPE! Need to defeat kraken
/*
if($input=='attack temple boss' && $_SESSION['KLkraken'] == 0)
	{
	echo $message="<div class='menuAction'>You can't attack the Yellow Water Temple Boss yet. You need to defeat the Kraken under the Ocean first.</div>";
	include ('update_feed.php');   // --- update feed
	}
	*/
// -------------------------------------------------------------------------- INITIALIZE HEAVY WALRUS!
else if(($input=='attack temple boss' || $input=='attack' ) && $infight==0 && $endfight==0)
	{
		if ($input=='attack temple boss') { $input = 'attack'; }
		// $results = $link->query("UPDATE $user SET enemy = 'Heavy Walrus'");
		updateStats($link, $username,['enemy' => 'Heavy Walrus' ]); // -- set enemy 

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
else if($input=='w' || $input=='west')
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel west.<br>';
   		$message="<i>You travel west.</i><br>".$_SESSION['desc406'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '406'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '406' ]); // -- update stats

		} 
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly west!<br>';
            $message="<i>You fly west! </i><br>".$_SESSION['desc406'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '406'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '406' ]); // -- update stats
        } 
		  else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='ne' || $input=='northeast')
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel northeast.<br>';
   		$message="<i>You travel northeast.</i><br>".$_SESSION['desc403'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '403'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '403' ]); // -- update stats

		} 
        elseif ($_SESSION['flying'] >= '1') {
            echo 'You fly northeast!<br>';
            $message="<i>You fly northeast! </i><br>".$_SESSION['desc403'];
            include('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET room = '403'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '403' ]); // -- update stats
        } 
		  else{
 		echo $message="<i>You can't go that way! You need to be flying or in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='se' || $input=='southeast')
{
		if ($KLheavywalrus >=1)
			  { echo 'You travel southeast to the Master Temple.<br>';
   				$message="<i>You travel southeast to the Master Temple.</i><br>".$_SESSION['desc425'];
				include ('update_feed.php');   // --- update feed
   			   		// $results = $link->query("UPDATE $user SET room = '425'"); // -- room change
					updateStats($link, $username,['endfight' => 0, 'room' => '425' ]); // -- update stats
				}
		else {
				echo $message="<div class='menuAction'>You can't enter the Master Temple Yet! You need defeat the Yellow Water Temple Boss first!</div>";
				include ('update_feed.php');   // --- update feed
	}
}






// ----------------------------------- end of room function
include('function-end.php');
// }
?>
