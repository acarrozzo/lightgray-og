<?php
						$roomname = "Dark Forest Gold Chest";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc513'];

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

// -------------------------------------------------------------------------- BATTLE VARIABLES		
$infight = $row['infight'];
$endfight = $row['endfight'];


$chest6 = $row['chest6'];
$goldkey = $row['goldkey']; 


include ('battle-sets/dark-forest.php');
include ('function-choptree.php');

$ringofstrengthX = $row['ringofstrengthX'];
$ringofmagicX = $row['ringofmagicX'];
$ringofdefenseX = $row['ringofdefenseX'];
$ringofdexterityX = $row['ringofdexterityX'];
$silversword = $row['silversword'];
$silver2hsword = $row['silver2hsword'];
$silverboomerang = $row['silverboomerang'];
$silverbow = $row['silverbow'];
$silvercrossbow = $row['silvercrossbow'];
$silvershield = $row['silvershield'];
$silverhelmet = $row['silverhelmet'];
$silverbreastplate = $row['silverbreastplate'];
$silvergauntlets = $row['silvergauntlets'];
$silverboots = $row['silverboots'];
$silverring = $row['silverring'];
$silvernecklace = $row['silvernecklace'];

$redbalm = $row['redbalm'];
$bluebalm = $row['bluebalm'];
$oakbattlestaff = $row['oakbattlestaff'];




if($input=='open chest' || $input=='unlock chest' || $input=='open gold chest') 
{
	if ($chest6 >= 1) { 	 // --- already opened
	echo $message="<i>You already opened this gold chest, remember that sweet Oak Battle Staff.</i>";
	include ('update_feed.php'); // --- update feed	
	}
	
	else if (($chest6 == 0) &&  $goldkey <= 0) {  // ---- no key	
	echo $message="<i>You need a Gold Key to open this chest. You can get one from the Dark Elf in this Forest.</i><br>";
	include ('update_feed.php'); // --- update feed	
	}
	

	else if ($chest6 > 0 || $goldkey >= 1 ) {  // ---- open!

			$rand2 = rand(1,4);
				if ($rand2 == 1 ){
					$ringitem = 'Ring of Strength X';
					// $results = $link->query("UPDATE $user SET ringofstrengthX = ringofstrengthX + 1");
					updateStats($link, $username,['ringofstrengthX' => $ringofstrengthX + 1 ]); // -- update stat 
				}
				if ($rand2 == 2 ){
					$ringitem = 'Ring of Dexterity X';
					// $results = $link->query("UPDATE $user SET ringofdexterityX = ringofdexterityX + 1"); 
					updateStats($link, $username,['ringofdexterityX' => $ringofdexterityX + 1 ]); // -- update stat
				}
				if ($rand2 == 3 ){
					$ringitem = 'Ring of Magic X';
					// $results = $link->query("UPDATE $user SET ringofmagicX = ringofmagicX + 1"); 
					updateStats($link, $username,['ringofmagicX' => $ringofmagicX + 1 ]); // -- update stat 
				}
				if ($rand2 == 4 ){
					$ringitem = 'Ring of Defense X';
					// $results = $link->query("UPDATE $user SET ringofdefenseX = ringofdefenseX + 1"); 
					updateStats($link, $username,['ringofdefenseX' => $ringofdefenseX + 1 ]); // -- update stat
				}			
					$silverrand = rand(1,12);
					//echo 'SilverRand: '.$silverrand.'<br>';
					if ($silverrand == 1) { $silveritem='Silver Sword';
						// $results = $link->query("UPDATE $user SET silversword = silversword + 1"); 
						updateStats($link, $username,['silversword' => $silversword + 1 ]); // -- update stat 
						}
						if ($silverrand == 2) { $silveritem='Silver 2h Sword';
						// $results = $link->query("UPDATE $user SET silver2hsword = silver2hsword + 1");
						updateStats($link, $username,['silver2hsword' => $silver2hsword + 1 ]); // -- update stat 
						}
						if ($silverrand == 3) { $silveritem='Silver Boomerang';
						// $results = $link->query("UPDATE $user SET silverboomerang = silverboomerang + 1"); 
						updateStats($link, $username,['silverboomerang' => $silverboomerang + 1 ]); // -- update stat 
						}
						if ($silverrand == 4) { $silveritem='Silver Bow';
						// $results = $link->query("UPDATE $user SET silverbow = silverbow + 1"); 
						updateStats($link, $username,['silverbow' => $silverbow + 1 ]); // -- update stat
						}
						if ($silverrand == 5) { $silveritem='Silver Crossbow';
						// $results = $link->query("UPDATE $user SET silvercrossbow = silvercrossbow + 1"); 
						updateStats($link, $username,['silvercrossbow' => $silvercrossbow + 1 ]); // -- update stat 
						}
						if ($silverrand == 6) { $silveritem='Silver Shield';
						// $results = $link->query("UPDATE $user SET silvershield = silvershield + 1"); 
						updateStats($link, $username,['silvershield' => $silvershield + 1 ]); // -- update stat 
						}
						if ($silverrand == 7) { $silveritem='Silver Helmet';
						// $results = $link->query("UPDATE $user SET silverhelmet = silverhelmet + 1"); 
						updateStats($link, $username,['silverhelmet' => $silverhelmet + 1 ]); // -- update stat
						}
						if ($silverrand == 8) { $silveritem='Silver Breastplate';
						// $results = $link->query("UPDATE $user SET silverbreastplate = silverbreastplate + 1"); 
						updateStats($link, $username,['silverbreastplate' => $silverbreastplate + 1 ]); // -- update stat 
						}
						if ($silverrand == 9) { $silveritem='Silver Gauntlets';
						// $results = $link->query("UPDATE $user SET silvergauntlets= silvergauntlets + 1"); 
						updateStats($link, $username,['silvergauntlets' => $silvergauntlets + 1 ]); // -- update stat
						}
						if ($silverrand == 10) { $silveritem='Silver Boots';
						// $results = $link->query("UPDATE $user SET silverboots = silverboots + 1"); 
						updateStats($link, $username,['silverboots' => $silverboots + 1 ]); // -- update stat
						}
						if ($silverrand == 11) { $silveritem='Silver Ring';
						// $results = $link->query("UPDATE $user SET silverring = silverring + 1"); 
						updateStats($link, $username,['silverring' => $silverring + 1 ]); // -- update stat
						}
						if ($silverrand == 12) { $silveritem='Silver Necklace';
						// $results = $link->query("UPDATE $user SET silvernecklace = silvernecklace + 1"); 
						updateStats($link, $username,['silvernecklace' => $silvernecklace + 1 ]); // -- update stat
						}	
				
	
	
	
	echo 'You use your golden key to open the chest!<br>';
	$message="You use your golden key to open the chest!<br>";
	include ('update_feed.php'); // --- update feed	
	$currency = 5000;
	$message = "<i>the chest contains:</i>   
	<div class='goldchestopen'>
	<h3>Dark Forest</h3>
	<h3>Gold Chest</h3>
	<p>+ 1000 XP</p>
	<p> $currency ".$_SESSION['currency']."</p>
	<p>+ 10 Red Balms</p>
	<p>+ 10 Blue Balm</p>
	<p class='h5'>+ $ringitem</p>
	<p class='h5'>+ $silveritem</p>
	<p class='h4'>+ Oak Battle Staff! <span class='h6'>( +30 mag, +30 str )</span></p>
	</div>";
	include ('update_feed.php'); // --- update feed
			
	// $results = $link->query("UPDATE $user SET xp = xp + 1000");
	// $results = $link->query("UPDATE $user SET currency = currency + 10000");
	// $results = $link->query("UPDATE $user SET redbalm = redbalm + 10");
	// $results = $link->query("UPDATE $user SET bluebalm = bluebalm + 10");
	// $results = $link->query("UPDATE $user SET oakbattlestaff = oakbattlestaff + 1");
	// $results = $link->query("UPDATE $user SET chest6 = 1");
	// $results = $link->query("UPDATE $user SET goldkey = goldkey - 1");
	$updates = [ // -- set changes
		'currency' => $currency + 10000,
		'xp' => $xp + 1000,
		'redbalm' => $redbalm + 10,
		'bluebalm' => $bluebalm + 10,
		'oakbattlestaff' => $oakbattlestaff + 1,
		'chest6' => 1,
		'goldkey' => $goldkey - 1,
	];
	updateStats($link, $username, $updates); // -- apply changes

}
}

else if ($input == 'reset chest')
{
	$results = $link->query("UPDATE $user SET chest6 = 0");
	$results = $link->query("UPDATE $user SET goldkey = 1");
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
//    	$message="<i>You travel northwest</i><br>".$_SESSION['desc516'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '516'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='s' || $input=='south') 
// {			echo 'You travel south<br>';
//    	$message="<i>You travel south</i><br>".$_SESSION['desc507'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '507'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '507';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}
elseif ($input == 'northwest') { $roomNum = '516';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>