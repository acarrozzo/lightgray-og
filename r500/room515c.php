<?php
						$roomname = "Silver Shaman | Silver Aura";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc515c'];

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
	
$AURAsilveraura = $row['AURAsilveraura'];

$silversword = $row['silversword'];
$silverstaff = $row['silverstaff'];

$silver2hsword = $row['silver2hsword'];

$silverboomerang = $row['silverboomerang'];
$silverbow = $row['silverbow'];
$silvercrossbow = $row['silvercrossbow'];

$silvershield = $row['silvershield'];
$silverhelmet=$row['silverhelmet']; 
$silverbreastplate=$row['silverbreastplate']; 
$silvergauntlets=$row['silvergauntlets']; 
$silverboots=$row['silverboots']; 


$equipR=$row['equipR']; 
$equipL=$row['equipL']; 
$equipHead=$row['equipHead']; 
$equipBody=$row['equipBody']; 
$equipHands=$row['equipHands']; 
$equipFeet=$row['equipFeet']; 





if($input=='learn silver aura' && $AURAsilveraura >=1) {  //learn silver aura
		echo $message="<div class='menuAction'><span class='gold'>You already know the Silver Aura!</span><br>
			Go to your COMP menu to activate it if you haven't already.</div>";
			include ('update_feed.php'); // --- update feed
}
if($input=='learn silver aura' && $AURAsilveraura ==0) {  //learn silver aura

if ( 	(( ($equipR == 'silver boomerang' || $equipR == 'silver sword' || $equipR == 'silver staff') && ($equipL == 'silver shield' )) 
		||
		( 	$equipR == 'silver 2h sword' ||	$equipR == 'silver boomerang' || $equipR == 'silver bow' || $equipR == 'silver crossbow' )) 
		&& ( $equipHead == 'silver helmet' )
		&& ( $equipBody == 'silver breastplate' )
		&& ( $equipHands == 'silver gauntlets' )
		&& ( $equipFeet == 'silver boots') 
)

	{
			echo $message="<div class='menuAction'><span class='gold'>You learn the Silver Aura!</span><br>
			Go to your COMP menu to activate it!</div>";
			include ('update_feed.php'); // --- update feed
					// $results = $link->query("UPDATE $user SET AURAsilveraura = 1"); 
					updateStats($link, $username,['AURAsilveraura' => 1 ]); // -- update stat 

	}
	else {
			echo $message="<div class='menuAction'><span class='gold'>You can't learn Silver Aura yet!</span><br>
			You need to be wearing a full set of Silver Equipment! (6 slots)</div>";
			include ('update_feed.php'); // --- update feed	
	}
}


 // -------------------------------------------------------------------------- READ SIGN!
if($input=='read sign') {  //read sign
	echo '<i>You read the Aura Sign.</i><br>';

	$message="
	<i>you read the sign:</i>
	<div class='sign lightgrayBG darkgray'>
	<span class='h3 gray'>AURAS!</span><br>
	---------------------------------------------------<br>
	<span class='blue'>Activate Auras to increase your stats!</span><br>
	(You can only have one aura active at a time)<br>
	---------------------------------------------------<br>
	<span class='blue'>SILVER AURA</span> increases all stats by 20. <br>
	<span class=''>( <span class='lightred'>STR +20</span>, <span class='green'>DEX +20</span>, <span class='blue'>MAG +20</span>, <span class='gold'>DEF +20</span> )</span><br>
	---------------------------------------------------<br>
	To initially learn the Silver Aura you must be wearing a full set of Silver Armor (6 slots).<br>
	---------------------------------------------------<br>
	After you learn the Aura though, you can activate it at any time, wearing any equipment.<br>
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
//    	$message="<i>You travel northwest</i><br>".$_SESSION['desc515b'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '515b'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='w' || $input=='west') 
// {			echo 'You travel west<br>';
//    	$message="<i>You travel west</i><br>".$_SESSION['desc515a'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '515a'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='sw' || $input=='southwest') 
// {			echo 'You travel southwest<br>';
//    	$message="<i>You travel southwest</i><br>".$_SESSION['desc515d'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '515d'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
else if($input=='d' || $input=='down') 
{			
	echo 'You exit the Ranger\'s Guild<br>';
	$message="<i>You exit the Ranger's Guild</i><br>".$_SESSION['desc519'];
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET room = '519'"); // -- room change
	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	updateStats($link, $username,['endfight' => 0, 'room' => '519' ]); // -- update stats
	$_SESSION['emptytree'] = 0; // reset tree
}


// -------------------------------------------------------------------------- TRAVEL

elseif ($input == 'west') {     $roomNum = '515a';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'southwest') { $roomNum = '516d';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'northwest') { $roomNum = '515b';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>