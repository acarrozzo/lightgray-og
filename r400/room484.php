<?php
						$roomname = "A Vast Underwater Landscape";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc484'];

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

$teleport7 = $row['teleport7'];

// -------------------------------------------------------------------------- Activate Teleport
			if ($teleport7 == 0) { 	
				// $results = $link->query("UPDATE $user SET teleport7 = 1");
				updateStats($link, $username,['teleport7' => 1 ]); // -- update stat 
				echo $message="<i>You can now teleport Underwater! Click 'underwater' in the teleport menu to teleport to this location at any time. </i><br>";
				include ('update_feed.php'); // --- update feed	  
				}	
				
				
include ('random-encounters/blueocean-underwater.php'); // blue ocean battle set
include ('battle-sets/blueocean-underwater.php'); // blue ocean battle set

// -------------------------------------------------------------------------- READ SIGN!
if($input=='read sign') { 
	echo '<i>You read the Underwater Directory</i> <br>  ';
	$message="
	<i>you read the sign:</i>   
	<div class='sign'>
	<h3>Uderwater <i>Directory</i></h3>
	<form id='mainForm' method='post' action='' name='formInput'>
	<span class='direc'><input type='submit' name='input1' value='ne' /></span> <span class='hilight'>Gold Chest</span> <i></i><br />
	<span class='direc'><input type='submit' name='input1' value='e' /></span> <span class='hilight'>Ocean Floor</span> <i>Giant Turtle Nest, Sunken Ship</i><br />
	<span class='direc'><input type='submit' name='input1' value='s' /></span> <span class='hilight'>Coral Reed</span> <i>Secret Door Lever</i> <br />
	<span class='direc'><input type='submit' name='input1' value='sw' /></span> <span class='hilight'>Deeper Ocean</span> <i>Jellyfish, Silver Chest</i><br />
	<span class='direc'><input type='submit' name='input1' value='nw' /></span> <span class='hilight'>Shark Infested Path</span> <i>Sharks & Kraken</i><br />
	<span class='direc'><input type='submit' name='input1' value='up' /></span> <span class='hilight'>Ocean Surface</span> <i></i><br />
	---------------------------------------------------
	</form>
	</div>";
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
else if($input=='u' || $input=='up') 
{			echo 'You swim up to the surface of the Ocean.<br>';
   	$message="<i>You swim up to the surface</i><br>".$_SESSION['desc408'];
	include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = 408"); // -- room change
       updateStats($link, $username,['endfight' => 0, 'room' => '408' ]); // -- update stats
}
else if($input=='nw' || $input=='northwest') 
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim northwest<br>';
   		$message="<i>You swim northwest</i><br>".$_SESSION['desc495'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '495'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '495' ]); // -- update stats

		} else{
 		echo $message="<i>You can't swim that way! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}

else if($input=='ne' || $input=='northeast') 
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim northeast<br>';
   		$message="<i>You swim northeast</i><br>".$_SESSION['desc485'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '485'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '485' ]); // -- update stats

		} else{
 		echo $message="<i>You can't swim that way! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='e' || $input=='east') 
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim east<br>';
   		$message="<i>You swim east</i><br>".$_SESSION['desc486'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '486'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '486' ]); // -- update stats

		} else{
 		echo $message="<i>You can't swim that way! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='s' || $input=='south') 
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim south<br>';
   		$message="<i>You swim south</i><br>".$_SESSION['desc483'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '483'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '483' ]); // -- update stats

		} else{
 		echo $message="<i>You can't swim that way! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='sw' || $input=='southwest') 
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim southwest<br>';
   		$message="<i>You swim southwest</i><br>".$_SESSION['desc482'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '482'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '482' ]); // -- update stats

		} else{
 		echo $message="<i>You can't swim that way! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
// ----------------------------------- end of room function
include('function-end.php');
// }
?>