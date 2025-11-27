<?php
						$roomname = "Hunter Bill - Hunter Skills";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc118'];
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

	$quest17=$row['quest17'];
	$quest18=$row['quest18']; 

	$KLbigfoot=$_SESSION['KLbigfoot']; 
	
	$KLwildboar=$_SESSION['KLwildboar']; 
	$KLwolf=$_SESSION['KLwolf']; 
	$KLcoyote=$_SESSION['KLcoyote']; 
	$KLbuck=$_SESSION['KLbuck']; 
	$KLbear=$_SESSION['KLbear']; 
	$KLstag=$_SESSION['KLstag']; 	

	$sasquatchcloak=$row['sasquatchcloak'];
	$huntershield=$row['huntershield'];
	$goldkey=$row['goldkey'];
	$currency=$row['currency'];


// ---------------------- SKILL FLAG! ---------------------- //
if ($row['hunterbillFlag']==0) {
	echo  $message = "<div class='menuAction'>
	You can now learn new skills from Hunter Bill!</div>";
	include ('update_feed.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET hunterbillFlag = 1");
	updateStats($link, $username,['hunterbillFlag' => 1 ]); // -- update stat 
}

// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
		// $query = $link->query("UPDATE $user SET hp = $hpmax + 10 "); 
		// $query = $link->query("UPDATE $user SET mp = $mpmax + 10 "); 
		$updates = [ // -- set changes
			'hp' => $hpmax + 10,
			'mp' => $mpmax + 10
		]; 
		updateStats($link, $_SESSION['username'], $updates); // -- update 
		echo $message = "You rest and supercharge your HP and MP!<br>";
		include ('update_feed.php'); // --- update feed
		//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}


	

// ---------------------- START ALL QUESTS ---------------------- //
  if($input=='start quests') {
	 if ($quest17 <1 || $quest18 <1 ) {	
		echo $message = '<div class="fbox">
		<h3 class="padd forest">You start Hunter Bill\'s Quests!</h3>
		<span class="icon forest">'.file_get_contents("img/svg/npc/npc-hunterbill.svg").'</span>
		<p class="padd"><i>"Yo! I just love being in nature."</i></p>
		<a href data-link="quests" class="btn goldBG">Open Quests </a>
		</div>';
		include ('update_feed.php'); // --- update feed
   		// $results = $link->query("UPDATE $user SET quest17 = 1");
   		// $results = $link->query("UPDATE $user SET quest18 = 1");
		$updates = [ // -- set changes
            'quest17' => 1,
			'quest18' => 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
	  	}
}



// ---------------------- QUEST 17) Bigfoot Sighting ---------------------- //
if($input=='info 17') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 17 Info</strong><br>
		Bigfoot has been seen in all parts of the forest. Go hunting and i'm sure he will turn up eventually. Once you defeat him return to Hunter Bill for a snazzy Sasquatch Cloak.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 17') 
{	if ($quest17 == 1 && $KLbigfoot >= 1)
	{	echo $message="<div class='questWin'>
		<h3>Quest 17 Completed!</h3>
		<h4>Bigfoot Sighting</h4>
		Congratulations! You have defeated Bigfoot! Bill is impressed and rewards you with his hand-crafted armor made of ancient Bigfoot fur.
	  	<h4>Rewards</h4>
  	  	[ + 500 xp  ]<br />
      	[ + 500 ".$_SESSION['currency']." ]<br />
		[ + Sasquatch Cloak ]</div>";	
		include ('update_feed.php'); // --- update feed
	    // $results = $link->query("UPDATE $user SET currency = currency + 500"); 
		// $results = $link->query("UPDATE $user SET xp = xp + 500"); 
		// $results = $link->query("UPDATE $user SET sasquatchcloak = sasquatchcloak + 1");
		// $results = $link->query("UPDATE $user SET quest17 = 2");
        $updates = [ // -- set changes
            'quest17' => 2,
            'xp' => $xp + 500,
            'currency' => $currency + 500,
			'sasquatchcloak' => $sasquatchcloak + 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest17 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 17 Not Complete</strong><br>
		To complete this quest you need to find Bigfoot and return here with his foot. He can be found in any part of this forest.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}


// ---------------------- QUEST 18) Forest Hunter ---------------------- //
if($input=='info 18') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 18 Info</strong><br>
		As you travel around the Forest you will randomly encounter creatures. Return here after you have hunted down a Wild Boar, Wolf, Coyote, Buck, Bear & Stag.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 18') 
{	if ($quest18 == 1 && (	$KLwildboar >= 1 &&
				$KLwolf >= 1 && 
				$KLcoyote >= 1 && 
				$KLbuck >= 1 && 
				$KLbear >= 1 && 
				$KLstag >= 1 ))
	{	echo $message="
		<div class='questWin'><h3>Quest 18 Completed!</h3>
		<h4>Forest Hunter</h4>
		Congratulations! You are a skilled huntsman! Hunter Bill hands you a Hunter Shield and a shiny Gold Key. He motions towards the northeast. 
	  	<h4>Rewards</h4>
  	  	[ + 800 xp  ]<br />
      	[ + 500 ".$_SESSION['currency']." ]<br />
		[ + Hunter Shield ]<br />
		[ + Gold Key! ]</div>";	
		include ('update_feed.php'); // --- update feed
	    // $results = $link->query("UPDATE $user SET currency = currency + 500"); 
		// $results = $link->query("UPDATE $user SET xp = xp + 800"); 
		// $results = $link->query("UPDATE $user SET huntershield = huntershield + 1");
		// $results = $link->query("UPDATE $user SET goldkey = goldkey + 1");
		// $results = $link->query("UPDATE $user SET quest18 = 2");
		$updates = [ // -- set changes
            'quest18' => 2,
            'xp' => $xp + 800,
            'currency' => $currency + 500,
            'huntershield' => $huntershield + 1,
            'goldkey' => $goldkey + 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest18 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 18 Not Complete</strong><br>
		To complete this quest you need to hunt down a Wild Boar, Wolf, Coyote, Buck, Bear & Stag. You can find them all in this Forest.</div>";
		include ('update_feed.php'); // --- update feed
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
//    $message="<i>You travel west</i><br>".$_SESSION['desc113'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 113"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='ne' || $input=='northeast') 
// {	echo 'You travel northeast<br>';
//    $message="<i>You travel northeast</i><br>".$_SESSION['desc119'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 119"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='e' || $input=='east') 
// {	echo 'You travel east<br>';
//    $message="<i>You travel east</i><br>".$_SESSION['desc120'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 120"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='se' || $input=='southeast') 
// {	echo 'You travel southeast<br>';
//    $message="<i>You travel southeast</i><br>".$_SESSION['desc121'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 121"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }
// else if($input=='s' || $input=='south') 
// {	echo 'You travel south<br>';
//    $message="<i>You travel south</i><br>".$_SESSION['desc117'];
// 	 include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 117"); // -- room change
//    $_SESSION['emptytree'] = 0; // reset tree
// }


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '120';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	} 
elseif ($input == 'south') {    $roomNum = '117';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}  
elseif ($input == 'west') {     $roomNum = '113';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	} 
elseif ($input == 'northeast') { $roomNum = '119';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	} 
elseif ($input == 'southeast') { $roomNum = '121';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');
	$_SESSION['emptytree'] = 0; // reset tree
	}  

// ----------------------------------- end of room function
include('function-end.php');
// }
?>
