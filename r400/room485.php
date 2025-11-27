<?php
						$roomname = "Underwater Gold Shrine";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc485'];

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

$chest5 = $row['chest5'];
$goldkey = $row['goldkey']; 

include ('random-encounters/blueocean-underwater.php'); // blue ocean battle set
include ('battle-sets/blueocean-underwater.php'); // blue ocean battle set



if($input=='open chest' || $input=='unlock chest') 
{
	if ($chest5 >= 1) { 	 // --- already opened
	echo 'You already opened this gold chest.<br>';
	$message="<i>You already opened this gold chest.</i>";
	include ('update_feed.php'); // --- update feed	
	}
	
	else if (($chest5 == 0) &&  $goldkey <= 0) {  // ---- no key	
	echo $message="<i>You need a Gold Key to open this chest. You can get one from the Friendly Pirate at the Island Oasis.</i><br>";
	include ('update_feed.php'); // --- update feed	
	}
	
	
	else if ($chest5 > 0 || $goldkey >= 1 ) {  // ---- open!
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
	$currency = 5000;
	$message = "<i>the chest contains:</i>   
	<div class='goldchestopen'>
	<h3>Blue Ocean</h3>
	<h3>Gold Chest</h3>
	<p>+ 500 XP</p>
	<p>+ $currency ".$_SESSION['currency']."</p>
	<p>+ 5 Meatballs</p>
	<p>+ 5 Bluefish</p>
	<p>+ 5 Wings Potions</p>
	<p>+ 5 Gills Potions</p>
	<p class='h5'>+ $ringitem</p>
	<p class='h5'>+ $silveritem</p>
	<p class='h4'>+ Heavy Helmet! <span class='h6'>(+10 str, +10 def)</span></p>
	</div>";
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET xp = xp + 500");
	// $results = $link->query("UPDATE $user SET currency = currency + $currency");
	// $results = $link->query("UPDATE $user SET bluefish = bluefish + 5");
	// 	$results = $link->query("UPDATE $user SET meatball = meatball + 5");
	// 	$results = $link->query("UPDATE $user SET wingspotion = wingspotion + 5");
	// 	$results = $link->query("UPDATE $user SET gillspotion = gillspotion + 5");
	// $results = $link->query("UPDATE $user SET heavyhelmet = heavyhelmet + 1");
	// $results = $link->query("UPDATE $user SET chest5 = 1");
	// $results = $link->query("UPDATE $user SET goldkey = goldkey - 1");
	$updates = [ // -- set changes
		'currency' => $currency + 5000,
		'xp' => $xp + 500,
		'bluefish' => $bluefish + 5,
		'meatball' => $meatball + 5,
		'wingspotion' => $wingspotion + 5,
		'gillspotion' => $gillspotion + 5,
		'heavyhelmet' => $heavyhelmet + 1,
		'chest5' => 1,
		'goldkey' => $goldkey - 1
	];
	updateStats($link, $username, $updates); // -- apply changes

}
}

else if ($input == 'reset chest')
{
	// $results = $link->query("UPDATE $user SET chest5 = 0");
	// $results = $link->query("UPDATE $user SET goldkey = 1");
	updateStats($link, $username,['chest5' => 0, 'goldkey' => 1 ]); // -- update stats
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
else if($input=='sw' || $input=='southwest') 
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim southwest<br>';
   		$message="<i>You swim southwest</i><br>".$_SESSION['desc484'];
		include ('update_feed.php');   // --- update feed
   			   // $results = $link->query("UPDATE $user SET room = '484'"); // -- room change
    updateStats($link, $username,['endfight' => 0, 'room' => '484' ]); // -- update stats

		} else{
 		echo $message="<i>You can't swim that way! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
// ----------------------------------- end of room function
include('function-end.php');
// }
?>