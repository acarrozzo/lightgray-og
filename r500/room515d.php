<?php
						$roomname = "Ranger Skills";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc515d'];

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


$hpmax=$row['hpmax'];   
$mpmax=$row['mpmax'];   
$hp=$row['hp'];  	
$mp=$row['mp'];

$rangerskillFlag = $row['rangerskillFlag'];

// ---------------------- SKILL FLAG! ---------------------- //
if ($rangerskillFlag==0) {
echo  $message = "<div class='menuAction'>
You can now learn new SKILLS & SPELLS from the RANGERS'S GUILD!!</div> ";
include ('update_feed.php'); // --- update feed
// $results = $link->query("UPDATE $user SET rangerskillFlag = 1");
updateStats($link, $username,['rangerskillFlag' => 1 ]); // -- update stat 

}

 


// -------------------------------------------------------------------------- READ SIGN!
if($input=='read sign') {  //read sign
	echo	 '<i>You read the Ranger\'s Guild Skill Sign.</i><br>';

	$message="
	<i>you read the sign:</i>
	<div class='sign darkgrayBGxxx'>
	---------------------------------------------------<br>
	<span class='h3 gold'>Ranger's Guild SKILLS!</span><br>
	---------------------------------------------------<br>
	<span class='gold'>RANGED</span> adds 30 points to your DEX <br>
	<span class='gold'>DODGE</span> let's you evade enemy attacks 10% of the time! <br>
	<span class='gold'>AIM</span> with your ranged weapon and do up to 20 additional damage. <br>
	---------------------------------------------------<br>
	NEW! - <span class='gold'>MULTI ARROW</span> will shoot another arrow 20% of the time. <br>
	NEW! - <span class='gold'>BOLT UPGRADE</span> will increase damage by 40 when you attack with a crossbow. <br>
	---------------------------------------------------
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

// else if($input=='nw' || $input=='northwest') 
// {			echo 'You travel northwest<br>';
//    	$message="<i>You travel northwest</i><br>".$_SESSION['desc515e'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '515e'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='n' || $input=='north') 
// {			echo 'You travel north<br>';
//    	$message="<i>You travel north</i><br>".$_SESSION['desc515a'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '515a'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='ne' || $input=='northeast') 
// {			echo 'You travel northeast<br>';
//    	$message="<i>You travel northeast</i><br>".$_SESSION['desc515c'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '515c'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '515a';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'northeast') { $roomNum = '515c';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'northwest') { $roomNum = '515e';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>