<?php
						$roomname = "Cathedral Nave"; 
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc622'];

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
	
	
// include ('battle-sets/mountains.php');



$KLjiemji=$_SESSION['KLjiemji'];
$KLjikay=$_SESSION['KLjikay'];
$KLgiantmountaingiant=$_SESSION['KLgiantmountaingiant'];
$KLgatekeeper=$_SESSION['KLgatekeeper'];
$KLkingblade=$_SESSION['KLkingblade'];
// -------------------------------------------------------------------------- After Battle - SAFE ROOM
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
   $input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
   $input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
   $input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
   $input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br>"; }
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
{
   $rand = rand (1,15);
   $randrare = rand (1,50);
}
   else {$rand=0;$randrare=0;}

// -------------------------------------------------------------------------- INITIALIZE Jikay or Jiemji
if(($randrare == 1 ) && $infight==0 && $endfight==0)
{
	if ($KLgiantmountaingiant==0 && $KLgatekeeper==0) {
	// $results = $link->query("UPDATE $user SET enemy = 'Rat'"); 
	updateStats($link, $username,['enemy' => 'Rat' ]); // -- set enemy 

                include ('battle.php');
	}
	if ($KLgiantmountaingiant>=1 && $KLgatekeeper==0) {
	// $results = $link->query("UPDATE $user SET enemy = 'Jikay'"); 
	updateStats($link, $username,['enemy' => 'Jikay' ]); // -- set enemy 
                include ('battle.php');
	}
	if ($KLgatekeeper>=1 && $KLgiantmountaingiant==0) {
	// $results = $link->query("UPDATE $user SET enemy = 'Jiemji'"); 
	updateStats($link, $username,['enemy' => 'Jiemji' ]); // -- set enemy	
                include ('battle.php');
	}
	if ($KLgatekeeper>=1 && $KLgiantmountaingiant>=1 && $KLkingblade==0) {
	// $results = $link->query("UPDATE $user SET enemy = 'King Blade'"); 
	updateStats($link, $username,['enemy' => 'King Blade' ]); // -- set enemy
                include ('battle.php');
	}
	else {
	$rand2 = rand (1,3);
	}
}
if(($randrare == 2 ) && $infight==0 && $endfight==0)
{
	if ($KLgatekeeper>=1) {
	// $results = $link->query("UPDATE $user SET enemy = 'Jikay'"); 
	updateStats($link, $username,['enemy' => 'Jikay' ]); // -- set enemy
                include ('battle.php');
	}
	else {
	// $results = $link->query("UPDATE $user SET enemy = 'Giant Rat'"); 
	updateStats($link, $username,['enemy' => 'Giant Rat' ]); // -- set enemy
                include ('battle.php');
	}
}



// -------------------------------------------------------------------------- INITIALIZE low RARES - 1/15 -> 1/7
else if(($rand == 1 ) && $infight==0 && $endfight==0)
	{	
                // $results = $link->query("UPDATE $user SET enemy = 'Vampire'");

				updateStats($link, $username,['enemy' => 'Vampire' ]); // -- set enemy	
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/15
else if(($rand == 2 ) && $infight==0 && $endfight==0)
	{	
                // $results = $link->query("UPDATE $user SET enemy = 'Vampire'");
	updateStats($link, $username,['enemy' => 'Vampire' ]); // -- set enemy
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/15
else if(($rand == 3 ) && $infight==0 && $endfight==0)
	{	
                // $results = $link->query("UPDATE $user SET enemy = 'Vampire'");
	updateStats($link, $username,['enemy' => 'Vampire' ]); // -- set enemy	
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/15
else if(($rand == 4 ) && $infight==0 && $endfight==0)
	{	
                // $results = $link->query("UPDATE $user SET enemy = 'Vampire'");
	updateStats($link, $username,['enemy' => 'Vampire' ]); // -- set enemy
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/15
else if(($rand == 5 ) && $infight==0 && $endfight==0)
	{	
                // $results = $link->query("UPDATE $user SET enemy = 'Vampire'");
	updateStats($link, $username,['enemy' => 'Vampire' ]); // -- set enemy
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/15
else if(($rand == 6 ) && $infight==0 && $endfight==0)
	{	
                // $results = $link->query("UPDATE $user SET enemy = 'Fallen Priest'");
	updateStats($link, $username,['enemy' => 'Fallen Priest' ]); // -- set enemy
	include ('battle.php'); 
}		
	// -------------------------------------------------------------------------- INITIALIZE - 1/15
else if(($rand == 7 ) && $infight==0 && $endfight==0)
	{	
                // $results = $link->query("UPDATE $user SET enemy = 'Fallen Priest'");
	updateStats($link, $username,['enemy' => 'Fallen Priest' ]); // -- set enemy
	include ('battle.php'); 
}		
// -------------------------------------------------------------------------- INITIALIZE - 1/15 -> 1/7
else if(($rand == 8 ) && $infight==0 && $endfight==0)
	{	$rand2 = rand (1,7);
		 if ($rand2 == 1){ 
            // $results = $link->query("UPDATE $user SET enemy = 'Grey Gargoyle'");
	updateStats($link, $username,['enemy' => 'Grey Gargoyle' ]); // -- set enemy	
	include ('battle.php'); 
}		
	else if ($rand2 == 2){ 
            // $results = $link->query("UPDATE $user SET enemy = 'Grey Gargoyle'");
	updateStats($link, $username,['enemy' => 'Grey Gargoyle' ]); // -- set enemy
	include ('battle.php'); 
}		
	else if ($rand2 == 3){ 
            // $results = $link->query("UPDATE $user SET enemy = 'White Gargoyle'");
	updateStats($link, $username,['enemy' => 'White Gargoyle' ]); // -- set enemy
	include ('battle.php'); 
}		
	else if ($rand2 == 4){ 
            // $results = $link->query("UPDATE $user SET enemy = 'Snow Ogre'");
	updateStats($link, $username,['enemy' => 'Snow Ogre' ]); // -- set enemy
	include ('battle.php'); 
}		
	else if ($rand2 == 5){ 
            // $results = $link->query("UPDATE $user SET enemy = 'Snow Ninja'");
	updateStats($link, $username,['enemy' => 'Snow Ninja' ]); // -- set enemy
	include ('battle.php'); 
}		
	else if ($rand2 == 6){ 
            // $results = $link->query("UPDATE $user SET enemy = 'Snow Owl'");
	updateStats($link, $username,['enemy' => 'Snow Owl' ]); // -- set enemy
	include ('battle.php'); 
}		
	else if ($rand2 == 7){ 
            // $results = $link->query("UPDATE $user SET enemy = 'White Gargoyle'");
	updateStats($link, $username,['enemy' => 'White Gargoyle' ]); // -- set enemy
	include ('battle.php'); 
}		
	 }


// -------------------------------------------------------------------------- IN BATTLE
else if ($infight >=1 ) { include ('battle.php'); }






















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
//    	$message="<i>You travel east</i><br>".$_SESSION['desc623'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '623'"); // -- room change
//    			//  // $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }


// else if($input=='w' || $input=='west') 
// {			echo 'You travel west<br>';
//    	$message="<i>You travel west</i><br>".$_SESSION['desc621'];
// 				include ('update_feed.php'); // --- update feed
//    			$results = $link->query("UPDATE $user SET room = '621'"); // -- room change
//    			//  // $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
	
	 



// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'east') {     $roomNum = '623';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'west') {     $roomNum = '621';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
?>