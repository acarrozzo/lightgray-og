<?php
						$roomname = "Ranger's Guild Entrance";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc515'];

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


$quest57=$row['quest57']; 
$KLdarkranger=$_SESSION['KLdarkranger']; 

$greenhornbow=$row['greenhornbow'];


// -------------------------------------------------------------------------- READ SIGN!
if($input=='read sign') {  //read sign
	echo '<i>You read the Ranger\'s Guild Sign.</i><br>';
	$message="
	<i>you read the sign:</i>
	<div class='sign'>
	---------------------------------------------------<br>
	<span class='h3 gold'>Ranger's Guild Entrance</span><br>
	---------------------------------------------------<br>
	Become the most skilled bowman in all the lands. Find and defeat a Dark Ranger to join the Ranger’s Guild.<br><br>
	Get a FREE BOW upon Initation! <br>
	---------------------------------------------------
	</div>";
	include ('update_feed.php'); // --- update feed	
}	



// ---------------------- START ALL QUESTS ---------------------- //
  if($input=='start quest' || $input=='start quest 57') {
	 if ($quest57 <1 ) {	
		/*echo $message = "<div class='menuAction'>
		<p class='gold'>You start the Ranger's Initiation Quest! (57)</p>
		<p>Check your Quests tab to review what needs to be done.</p>
		<a href='' data-link='quests' class='btn goldBG'>Open Quests</a>
		</div> ";		
		*/
		echo $message = '<div class="fbox">
		<h3 class="padd forest">You start the Ranger\'s Initiation Quest!</h3>
		<span class="icon forest">'.file_get_contents("img/svg/npc/npc-ranger.svg").'</span>
		<p class="padd"><i>"Want to be a Ranger eh? There are fallen Rangers among us, defeat one and return here."</i></p>
		<a href data-link="quests" class="btn goldBG">Open Quests </a>
		</div>';	

		include ('update_feed.php'); // --- update feed
   		// $results = $link->query("UPDATE $user SET quest57 = 1");
		updateStats($link, $username,['quest57' => 1 ]); // -- update stat
	  	}
}
// ---------------------- QUEST 57) Ranger's Guild Initiation ---------------------- //
if($input=='info 57') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 57 Info</strong><br>
		To join the RANGERS Guild you have to defeat a Dark Ranger. You can find them hiding in the Dark Forest. </div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 57') 
{	if ($KLdarkranger >= 1)
	{	echo $message="<div class='questWin'>
		<h3>Quest 57 Completed!</h3>
		<h4>Ranger's Guild Initiation</h4>
		Congratulations! You have indeed defeated a Dark Ranger! You are now an official member of the Rangers Guild. You are handed a sleek and powerful Greenhorn Bow!
	  	<h4>Rewards</h4>
  	  	[ + 3000 xp  ]<br />
      	[ + 5000 ".$_SESSION['currency']." ]<br />
		[ + Greenhorn Bow! ]</div>";	
		include ('update_feed.php'); // --- update feed 
		// $results = $link->query("UPDATE $user SET xp = xp + 3000");
	    // $results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		// $results = $link->query("UPDATE $user SET greenhornbow = greenhornbow + 1");
		// $results = $link->query("UPDATE $user SET quest57 = 2");
		$updates = [ // -- set changes
			'quest57' => 2,
			'xp' => $xp + 3000,
			'currency' => $currency + 5000,
			'greenhornbow' => $greenhornbow + 1,
		]; 
		updateStats($link, $username, $updates); // -- apply changes
	} 
	else if ($quest57 == 1)
	{
		echo $message="<div class='menuAction'><strong class='green'>Quest 57 Not Complete</strong><br>
		To complete this quest you need to find and defeat a Dark Ranger. They rarely spawn in the Dark Forest.</div>";
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

else if($input=='se' || $input=='southeast') 
{			echo 'You travel southeast and get lost in the trees<br>';
   	$message="<i>You travel southeast and get lost in the trees</i><br>".$_SESSION['desc514'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '514'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			   updateStats($link, $username,['endfight' => 0, 'room' => '514' ]); // -- update stats
			   $_SESSION['emptytree'] = 0; // reset tree
}

else if($input=='u' || $input=='up') 
{	
	if ($quest57 == 2)
	{
			echo 'You climb the up the ladder into the Ranger\'s Guild.<br>';
   	$message="<i>You climb the up the ladder into the Ranger\'s Guild.</i><br>".$_SESSION['desc515e'];
				include ('update_feed.php'); // --- update feed
   			// $results = $link->query("UPDATE $user SET room = '515e'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			   updateStats($link, $username,['endfight' => 0, 'room' => '515e' ]); // -- update stats
			}
	else
	{
	echo $message="<i>You can't enter the Ranger's Guild until you complete this quest.</i><br>";
	include ('update_feed.php'); // --- update feed	
	}
}

// ----------------------------------- end of room function
include('function-end.php');
// }
?>