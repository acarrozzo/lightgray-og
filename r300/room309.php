<?php
						$roomname = "Dwarf Treasury";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc309'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

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


$chest4 = $row['chest4'];
$goldkey = $row['goldkey'];

$ringofstrengthVII = $row['ringofstrengthVII'];
$ringofmagicVII = $row['ringofmagicVII'];
$ringofdefenseVII = $row['ringofdefenseVII'];
$ringofhealthregenIII = $row['ringofhealthregenIII'];

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

if ( $_SESSION['silverchest']!='309'){
$_SESSION['silverchest'] = '309';}


// --------------------------------------------------------------------------- GOLD CHEST 4 - Rocky Flats VILLAGE
if($input=='open gold chest' || $input=='unlock chest') 
{
	if ($chest4 >= 1) { 	 // --- already opened
	echo $message="<i>You already opened this gold chest. Remember you got that Pet Bat!</i><br>
";
	include ('update_feed.php'); // --- update feed	
	}
	
	else if ($chest4 == 0 &&  $goldkey <= 0) {  // ---- no key	
	echo $message="<i>You need a gold key to open this chest. You can get one by completing quest 35 from the Dwarf Captain. You can find him at the Rocky Flats Crossroads.</i><br>";
	include ('update_feed.php'); // --- update feed	
	}
	else if ($chest4 == 0 && $goldkey >= 1 ) {  // ---- open!
	
		$ringrand = rand(1,4);
		//echo 'SilVIIerRand: '.$silVIIerrand.'<br>';
			if ($ringrand == 1) { $ringitem='Ring of Strength VII';
			// $results = $link->query("UPDATE $user SET ringofstrengthVII = ringofstrengthVII + 1"); 
			updateStats($link, $username,['ringofstrengthVII' => $ringofstrengthVII + 1 ]); // -- update stat
		}
			if ($ringrand == 2) { $ringitem='Ring of Dexterity VII';
			// $results = $link->query("UPDATE $user SET ringofdexterityVII = ringofdexterityVII + 1"); 
			updateStats($link, $username,['ringofdexterityVII' => $ringofdexterityVII + 1 ]); // -- update stat
		}
			if ($ringrand == 3) { $ringitem='Ring of Magic VII';
			// $results = $link->query("UPDATE $user SET ringofmagicVII = ringofmagicVII + 1"); 
			updateStats($link, $username,['ringofmagicVII' => $ringofmagicVII + 1 ]); // -- update stat	
		}
			if ($ringrand == 4) { $ringitem='Ring of Defense VII';
			// $results = $link->query("UPDATE $user SET ringofdefenseVII = ringofdefenseVII + 1"); 
			updateStats($link, $username,['ringofdefenseVII' => $ringofdefenseVII + 1 ]); // -- update stat
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
		$currencyadd = rand (1500,2000);

		$message = "<i>the chest contains:</i>   
		<div class='goldchestopen'>
		<h3>Rocky Flats</h3>
		<h3>Gold Chest</h3>
		<p>+ 500 XP</p>
		<p>+ $currencyadd ".$_SESSION['currency']."</p>
		<p>+ 5 Meatballs</p>
		<p class='h4'>+ $ringitem</p>
		<p class='h4'>+ $silveritem</p>
		<p class='h4'>+ Pet Bat!</p>
		</div>";

		include ('update_feed.php'); // --- update feed
		// $results = $link->query("UPDATE $user SET xp = xp + 500");
		// $results = $link->query("UPDATE $user SET currency = currency + $currency");
		// $results = $link->query("UPDATE $user SET meatball = meatball + 5");
		// $results = $link->query("UPDATE $user SET petbat = 1");
		// $results = $link->query("UPDATE $user SET chest4 = 1");
		// $results = $link->query("UPDATE $user SET goldkey = goldkey - 1");
		$updates = [ // -- set changes
			'currency' => $currency + $currencyadd,
			'xp' => $xp + 500,
			'meatball' => $meatball + 5,
			'petbat' => 1,
			'chest4' => 1,
			'goldkey' => $goldkey - 1
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	}
}
	
if ($input == 'reset chest')
{
	// $results = $link->query("UPDATE $user SET chest4 = 0");
	// $results = $link->query("UPDATE $user SET goldkey = goldkey + 1");
	$updates = [ // -- set changes
		'chest4' => 0,
		'goldkey' => $goldkey + 1
	]; 
	updateStats($link, $username, $updates); // -- apply changes
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

// else if($input=='se' || $input=='southeast') 
// {			echo 'You travel southeast<br>';
//    	$message="<i>You travel southeast</i><br>".$_SESSION['desc307'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = 307"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'southeast') { $roomNum = '307';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>