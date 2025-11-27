<?php
						$roomname = "Cathedral Courtyard";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc621'];

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





$chest7 = $row['chest7'];
$goldkey = $row['goldkey'];


$KLjiemji=$_SESSION['KLjiemji'];
$KLjikay=$_SESSION['KLjikay'];
$KLgiantmountaingiant=$_SESSION['KLgiantmountaingiant'];
$KLgatekeeper=$_SESSION['KLgatekeeper'];
$KLkingblade=$_SESSION['KLkingblade'];

$ringofstrengthXIII = $row['ringofstrengthXIII'];
$ringofdexterityXIII = $row['ringofdexterityXIII'];
$ringofmagicXIII = $row['ringofmagicXIII'];
$ringofdefenseXIII = $row['ringofdefenseXIII'];
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
$snowbow = $row['snowbow'];


    // -------------------------------------------------------------------------- If room ready create random rand #
	if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,4); }	
		else {$rand=0;}	
	// -------------------------------------------------------------------------- INITIALIZE - 1/4 GARGOYLES
	if(($rand == 1 ) && $infight==0 && $endfight==0) {	
		// $results = $link->query("UPDATE $user SET enemy = 'Giant Mountain Giant'");
		updateStats($link, $username,['enemy' => 'Grey Gargoyle' ]); // -- set enemy
		include ('battle.php'); 
	}	
	elseif(($rand == 2 ) && $infight==0 && $endfight==0) {	
		// $results = $link->query("UPDATE $user SET enemy = 'Giant Mountain Giant'");
		updateStats($link, $username,['enemy' => 'White Gargoyle' ]); // -- set enemy
		include ('battle.php'); 
	}			
	// -------------------------------------------------------------------------- IN BATTLE		
	// else if ($infight >=1 ) { include ('battle.php'); }	
		
		// IF NO DRAGON - REGULAR BATTLE ROOM
		include ('battle-sets/mountains.php');


// // -------------------------------------------------------------------------- After Battle - SAFE ROOM
// if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
//    $input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
//    $input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
//    $input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
//    $input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br>"; }
// // -------------------------------------------------------------------------- If room ready create random rand #
// if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
// {
//    $rand = rand (1,15);
//    $randrare = rand (1,50);
// }
//    else {$rand=0;$randrare=0;}

// // -------------------------------------------------------------------------- INITIALIZE Jikay or Jiemji
// if(($randrare == 1 ) && $infight==0 && $endfight==0)
// {
// if ($KLgiantmountaingiant==0 && $KLgatekeeper==0) {
//  $results = $link->query("UPDATE $user SET enemy = 'Rat'"); include ('battle.php');
// }
// if ($KLgiantmountaingiant>=1 && $KLgatekeeper==0) {
//  $results = $link->query("UPDATE $user SET enemy = 'Jikay'"); include ('battle.php');
// }
// if ($KLgatekeeper>=1 && $KLgiantmountaingiant==0) {
//  $results = $link->query("UPDATE $user SET enemy = 'Jiemji'"); include ('battle.php');
// }
// if ($KLgatekeeper>=1 && $KLgiantmountaingiant>=1 && $KLkingblade==0) {
//  $results = $link->query("UPDATE $user SET enemy = 'King Blade'"); include ('battle.php');
// }
// else {
//  $rand2 = rand (1,3);
// }
// }
// if(($randrare == 2 ) && $infight==0 && $endfight==0)
// {
// if ($KLgatekeeper>=1) {
//  $results = $link->query("UPDATE $user SET enemy = 'Jikay'"); include ('battle.php');
// }
// else
//  $results = $link->query("UPDATE $user SET enemy = 'Giant Rat'"); include ('battle.php');
// }



// // -------------------------------------------------------------------------- INITIALIZE low RARES - 1/15 -> 1/7
// else if(($rand == 1 ) && $infight==0 && $endfight==0) {
// 	$rand2 = rand (1,7);

// 		 if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Bowman'");
// 	include ('battle.php'); 
// }		
// 	else if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Highwayman'");
// 	include ('battle.php'); 
// }		
// 	else if ($rand2 == 3){ $results = $link->query("UPDATE $user SET enemy = 'Imp'");
// 	include ('battle.php'); 
// }		
// 	else if ($rand2 == 4){ $results = $link->query("UPDATE $user SET enemy = 'Wisp'");
// 	include ('battle.php'); 
// }		
// 	else if ($rand2 == 5){ $results = $link->query("UPDATE $user SET enemy = 'Falcon'");
// 	include ('battle.php'); 
// }		
// 	else if ($rand2 == 6){ $results = $link->query("UPDATE $user SET enemy = 'Dark Ranger'");
// 	include ('battle.php'); 
// }		
// 	else if ($rand2 == 7){ $results = $link->query("UPDATE $user SET enemy = 'Ent'");
// 	include ('battle.php'); 
// }		
// 	}
// // -------------------------------------------------------------------------- INITIALIZE - 1/15
// else if(($rand == 2 ) && $infight==0 && $endfight==0)
// 	{	$results = $link->query("UPDATE $user SET enemy = 'Grey Gargoyle'");
// 	include ('battle.php'); 
// }		
// // -------------------------------------------------------------------------- INITIALIZE - 1/15
// else if(($rand == 3 ) && $infight==0 && $endfight==0)
// 	{	$results = $link->query("UPDATE $user SET enemy = 'Grey Gargoyle'");
// 	include ('battle.php'); 
// }		
// // -------------------------------------------------------------------------- INITIALIZE - 1/15
// else if(($rand == 4 ) && $infight==0 && $endfight==0)
// 	{	$results = $link->query("UPDATE $user SET enemy = 'Grey Gargoyle'");
// 	include ('battle.php'); 
// }		
// // -------------------------------------------------------------------------- INITIALIZE - 1/15
// else if(($rand == 5 ) && $infight==0 && $endfight==0)
// 	{	$results = $link->query("UPDATE $user SET enemy = 'White Gargoyle'");
// 	include ('battle.php'); 
// }		
// // -------------------------------------------------------------------------- INITIALIZE - 1/15
// else if(($rand == 6 ) && $infight==0 && $endfight==0)
// 	{	$results = $link->query("UPDATE $user SET enemy = 'White Gargoyle'");
// 	include ('battle.php'); 
// }		
// 	// -------------------------------------------------------------------------- INITIALIZE - 1/15
// else if(($rand == 7 ) && $infight==0 && $endfight==0)
// 	{	$results = $link->query("UPDATE $user SET enemy = 'White Gargoyle'");
// 	include ('battle.php'); 
// }		
// // -------------------------------------------------------------------------- INITIALIZE - 1/15 -> 1/7
// else if(($rand == 8 ) && $infight==0 && $endfight==0)
// 	{	$rand2 = rand (1,7);
// 		 if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Yeti'");
// 	include ('battle.php'); 
// }		
// 	else if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Yeti'");
// 	include ('battle.php'); 
// }		
// 	else if ($rand2 == 3){ $results = $link->query("UPDATE $user SET enemy = 'Yeti'");
// 	include ('battle.php'); 
// }		
// 	else if ($rand2 == 4){ $results = $link->query("UPDATE $user SET enemy = 'Snow Ogre'");
// 	include ('battle.php'); 
// }		
// 	else if ($rand2 == 5){ $results = $link->query("UPDATE $user SET enemy = 'Snow Ninja'");
// 	include ('battle.php'); 
// }		
// 	else if ($rand2 == 6){ $results = $link->query("UPDATE $user SET enemy = 'Snow Owl'");
// 	include ('battle.php'); 
// }		
// 	else if ($rand2 == 7){ $results = $link->query("UPDATE $user SET enemy = 'Flying Dung Beetle'");
// 	include ('battle.php'); 
// }		
// 	 }


// // -------------------------------------------------------------------------- IN BATTLE
// else if ($infight >=1 ) { include ('battle.php'); }

















// -------------------------------------------------------------------------- OPEN CHEST


if($input=='open chest' || $input=='unlock chest' || $input=='open gold chest')
{
	if ($chest7 >= 1) { 	 // --- already opened
	echo $message="<i>You already opened this gold chest, remember that awesome Snow Bow.</i>";
	include ('update_feed.php'); // --- update feed
	}

	else if (($chest7 == 0) &&  $goldkey <= 0) {  // ---- no key
	echo $message="<i>You need a Gold Key to open this chest. You can get one from Chilly Pete</i><br>";
	include ('update_feed.php'); // --- update feed
	}


	else if ($chest7 > 0 || $goldkey >= 1 ) {  // ---- open!

			$rand2 = rand(1,4);
				if ($rand2 == 1 ){
					$ringitem = 'Ring of Strength XIII';
					// $results = $link->query("UPDATE $user SET ringofstrengthXIII = ringofstrengthXIII + 1"); 
					updateStats($link, $username,['ringofstrengthXIII' => $ringofstrengthXIII + 1 ]); // -- update stat 
				}
				if ($rand2 == 2 ){
					$ringitem = 'Ring of Dexterity XIII';
					// $results = $link->query("UPDATE $user SET ringofdexterityXIII = ringofdexterityXIII + 1"); 
					updateStats($link, $username,['ringofdexterityXIII' => $ringofdexterityXIII + 1 ]); // -- update stat
				}
				if ($rand2 == 3 ){
					$ringitem = 'Ring of Magic XIII';
					// $results = $link->query("UPDATE $user SET ringofmagicXIII = ringofmagicXIII + 1"); 
					updateStats($link, $username,['ringofmagicXIII' => $ringofmagicXIII + 1 ]); // -- update stat 
				}
				if ($rand2 == 4 ){
					$ringitem = 'Ring of Defense XIII';
					// $results = $link->query("UPDATE $user SET ringofdefenseXIII = ringofdefenseXIII + 1"); 
					updateStats($link, $username,['ringofdefenseXIII' => $ringofdefenseXIII + 1 ]); // -- update stat 
				}

			$silverrand = rand(1,13);
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
	//$currency = 5000;
	$message = "<i>the chest contains:</i>
	<div class='goldchestopen'>
	<h3>Stone Mountain</h3>
	<h3>Gold Chest</h3>
	<p>+ 2000 XP</p>
	<p>+ 20000 ".$_SESSION['currency']."</p>
	<p>+ 15 Red Balms</p>
	<p>+ 15 Blue Balm</p>
	<p class='h5'>+ $ringitem</p>
	<p class='h5'>+ $silveritem</p>
	<p class='h4'>+ Snow Bow! <span class='h6'>( +45 dex, +15 mag, +15 def )</span></p>
	</div>";
	include ('update_feed.php'); // --- update feed

	// $results = $link->query("UPDATE $user SET xp = xp + 2000");
	// $results = $link->query("UPDATE $user SET currency = currency + 20000");
	// $results = $link->query("UPDATE $user SET redbalm = redbalm + 15");
	// $results = $link->query("UPDATE $user SET bluebalm = bluebalm + 15");
	// $results = $link->query("UPDATE $user SET snowbow = snowbow + 1");
	// $results = $link->query("UPDATE $user SET chest7 = 1");
	// $results = $link->query("UPDATE $user SET goldkey = goldkey - 1");
    $updates = [ // -- set changes
        'chest7' => 1,
        'xp' => $xp + 2000,
        'currency' => $currency + 20000,
		'redbalm' => $redbalm + 15,
		'bluebalm' => $bluebalm + 15,
		'snowbow' => $snowbow + 1,
		'goldkey' => $goldkey - 1
    ]; 
    updateStats($link, $username, $updates); // -- apply changes

}
}

else if ($input == 'reset chest')
{
	// $results = $link->query("UPDATE $user SET chest7 = 0");
	// $results = $link->query("UPDATE $user SET goldkey = 1");
	updateStats($link, $username, ['chest7' => 0, 'goldkey' => 1]); // -- reset chest
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

// 	else if($input=='e' || $input=='east')
// {			echo 'You travel east<br>';
//    	$message="<i>You travel east</i><br>".$_SESSION['desc622'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '622'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }


// else if($input=='sw' || $input=='southwest')
// {			echo 'You travel southwest<br>';
//    	$message="<i>You travel southwest</i><br>".$_SESSION['desc618'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '618'"); // -- room change
//    			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }





// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '622';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southwest') { $roomNum = '618';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>
