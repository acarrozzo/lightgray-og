<?php
                        $roomname = "Mountain Alcove";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc604'];

include('function-start.php');

// // -------------------------DB CONNECT!
// include('db-connect.php');
// // -------------------------DB QUERY!
// $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
// $stmt->bind_param("s", $_SESSION['username']);
// $stmt->execute();
// $result = $stmt->get_result();
// if (!$result) {
//     die('There was an error running the query [' . $link->error . ']');
// }
// // -------------------------DB OUTPUT!
// while ($row = $result->fetch_assoc()) {

$row = getUserData($link, $_SESSION['username']); // --- gets all user data from database


// -------------------------------------------------------------------------- BATTLE VARIABLES
    $infight = $row['infight'];
    $endfight = $row['endfight'];
    $enemy=$row['enemy'];



    include('function-choptree.php');
    include('battle-sets/mountains.php');


// BATTLE SAME AS MOUNTAINS.PHP BUT HAS EXTRA RARES


$KLjiemji=$_SESSION['KLjiemji'];
$KLjikay=$_SESSION['KLjikay'];
$KLgiantmountaingiant=$_SESSION['KLgiantmountaingiant'];
$KLgatekeeper=$_SESSION['KLgatekeeper'];
$KLkingblade=$_SESSION['KLkingblade'];


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

// // -------------------------------------------------------------------------- INITIALIZE Jikay or Jiemji or KING BLADE
// if(($randrare == 1 ) && $infight==0 && $endfight==0)
// 	{

// 		if ($KLjikay>=1 && $KLjiemji>=1 && $KLkingblade >=1) { // DEFEATED ALL OF THEM
// 			$rand2 = rand (1,3);
// 			if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Jikay'");
// 	include ('battle.php'); 
// }		
// 			else if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Jiemji'");
// 	include ('battle.php'); 
// }		
// 			else if ($rand2 == 3){ $results = $link->query("UPDATE $user SET enemy = 'King Blade'");
// 	include ('battle.php'); 
// }		
// 		}
// 		else if ($KLjikay>=1 && $KLjiemji>=1 && $KLkingblade ==0) { // READY FOR KING BLADE
// 			$rand2 = rand (1,5);
// 			if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Jikay'");
// 	include ('battle.php'); 
// }		
// 			else if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Jiemji'");
// 	include ('battle.php'); 
// }		
// 			else if ($rand2 == 3){ $results = $link->query("UPDATE $user SET enemy = 'King Blade'");
// 	include ('battle.php'); 
// }		
// 			else if ($rand2 == 4){ $results = $link->query("UPDATE $user SET enemy = 'King Blade'");
// 	include ('battle.php'); 
// }		
// 			else if ($rand2 == 5){ $results = $link->query("UPDATE $user SET enemy = 'King Blade'");
// 	include ('battle.php'); 
// }		
// 		}
// 		else if ($KLjikay>=1 && $KLjiemji==0) {
// 			$results = $link->query("UPDATE $user SET enemy = 'Jiemji'"); include ('battle.php');
// 		}
// 		else if ($KLjikay==0 && $KLjiemji>=1) {
// 			$results = $link->query("UPDATE $user SET enemy = 'Jikay'"); include ('battle.php');
// 		}
// 		else if ($KLgiantmountaingiant>=1 || $KLgatekeeper>=1) {
// 			$rand2 = rand (1,2);
// 			if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Jikay'");
// 	include ('battle.php'); 
// }		
// 			if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Jiemji'");
// 	include ('battle.php'); 
// }		
// 		}
// 		else {
// 			$results = $link->query("UPDATE $user SET enemy = 'Flying Dung Beetle'"); include ('battle.php');
// 		}
// 	}





// // -------------------------------------------------------------------------- INITIALIZE low RARES - 1/15 -> 1/7
// else if(($rand == 1 ) && $infight==0 && $endfight==0) {
//         $rand2 = rand (1,7);

//         if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Bowman'");
// 	include ('battle.php'); 
// }		
//         else if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Highwayman'");
// 	include ('battle.php'); 
// }		
//         else if ($rand2 == 3){ $results = $link->query("UPDATE $user SET enemy = 'Imp'");
// 	include ('battle.php'); 
// }		
//         else if ($rand2 == 4){ $results = $link->query("UPDATE $user SET enemy = 'Wisp'");
// 	include ('battle.php'); 
// }		
//         else if ($rand2 == 5){ $results = $link->query("UPDATE $user SET enemy = 'Falcon'");
// 	include ('battle.php'); 
// }		
//         else if ($rand2 == 6){ $results = $link->query("UPDATE $user SET enemy = 'Dark Ranger'");
// 	include ('battle.php'); 
// }		
//         else if ($rand2 == 7){ $results = $link->query("UPDATE $user SET enemy = 'Ent'");
// 	include ('battle.php'); 
// }		
// }
// // -------------------------------------------------------------------------- INITIALIZE - 1/15
// else if(($rand == 2 ) && $infight==0 && $endfight==0)
// {	$results = $link->query("UPDATE $user SET enemy = 'Mountain Giant'");
// 	include ('battle.php'); 
// }		
// // -------------------------------------------------------------------------- INITIALIZE - 1/15
// else if(($rand == 3 ) && $infight==0 && $endfight==0)
// {	$results = $link->query("UPDATE $user SET enemy = 'Ice Troll'");
// 	include ('battle.php'); 
// }		
// // -------------------------------------------------------------------------- INITIALIZE - 1/15
// else if(($rand == 4 ) && $infight==0 && $endfight==0)
// {	$results = $link->query("UPDATE $user SET enemy = 'Giant Brute'");
// 	include ('battle.php'); 
// }		
// // -------------------------------------------------------------------------- INITIALIZE - 1/15
// else if(($rand == 5 ) && $infight==0 && $endfight==0)
// {	$results = $link->query("UPDATE $user SET enemy = 'Wyvern'");
// 	include ('battle.php'); 
// }		
// // -------------------------------------------------------------------------- INITIALIZE - 1/15
// else if(($rand == 6 ) && $infight==0 && $endfight==0)
// {	$results = $link->query("UPDATE $user SET enemy = 'Stone Dwarf'");
// 	include ('battle.php'); 
// }		
// // -------------------------------------------------------------------------- INITIALIZE - 1/15 -> 1/7
// else if(($rand == 7 ) && $infight==0 && $endfight==0)
// {	$rand2 = rand (1,7);
//     if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Yeti'");
// 	include ('battle.php'); 
// }		
//     else if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Yeti'");
// 	include ('battle.php'); 
// }		
//     else if ($rand2 == 3){ $results = $link->query("UPDATE $user SET enemy = 'Yeti'");
// 	include ('battle.php'); 
// }		
//     else if ($rand2 == 4){ $results = $link->query("UPDATE $user SET enemy = 'Snow Ogre'");
// 	include ('battle.php'); 
// }		
//     else if ($rand2 == 5){ $results = $link->query("UPDATE $user SET enemy = 'Snow Ninja'");
// 	include ('battle.php'); 
// }		
//     else if ($rand2 == 6){ $results = $link->query("UPDATE $user SET enemy = 'Snow Owl'");
// 	include ('battle.php'); 
// }		
//     else if ($rand2 == 7){ $results = $link->query("UPDATE $user SET enemy = 'Dragon'");
// 	include ('battle.php'); 
// }		
// }
$rand = rand(1,4);
if(($rand == 1 ) && $infight==0 && $endfight==0) // EXTRA RARES FOR ALCOVE!!!!
{	$rand2 = rand (1,7);
    if ($rand2 == 1){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Snow Ogre'");
		updateStats($link, $username,['enemy' => 'Snow Ogre' ]); // -- set enemy
	include ('battle.php'); 
}		
    else if ($rand2 == 2){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Snow Ogre'");
		updateStats($link, $username,['enemy' => 'Snow Ogre' ]); // -- set enemy
	include ('battle.php'); 
}		
    else if ($rand2 == 3){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Snow Ninja'");
		updateStats($link, $username,['enemy' => 'Snow Ninja' ]); // -- set enemy
		include ('battle.php'); 
}		
    else if ($rand2 == 4){ 
		updateStats($link, $username,['enemy' => 'Snow Ninja' ]); // -- set enemy
		include ('battle.php'); 
}		
    else if ($rand2 == 5){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Snow Owl'");
		updateStats($link, $username,['enemy' => 'Snow Owl' ]); // -- set enemy
	include ('battle.php'); 
}		
    else if ($rand2 == 6){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Snow Owl'");
		updateStats($link, $username,['enemy' => 'Snow Owl' ]); // -- set enemy
	include ('battle.php'); 
}		
    else if ($rand2 == 7){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Dragon'");
		updateStats($link, $username,['enemy' => 'Dragon' ]); // -- set enemy
	include ('battle.php'); 
}		
}
else if(($rand == 2 ) && $infight==0 && $endfight==0) // EXTRA RARES FOR ALCOVE!!!!
{	$rand2 = rand (1,7);
    if ($rand2 == 1){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Snow Ogre'");
		updateStats($link, $username,['enemy' => 'Snow Ogre' ]); // -- set enemy
	include ('battle.php'); 
}		
    else if ($rand2 == 2){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Snow Ogre'");
		updateStats($link, $username,['enemy' => 'Snow Ogre' ]); // -- set enemy
	include ('battle.php'); 
}		
    else if ($rand2 == 3){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Snow Ninja'");
		updateStats($link, $username,['enemy' => 'Snow Ninja' ]); // -- set enemy
	include ('battle.php'); 
}		
    else if ($rand2 == 4){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Snow Ninja'");
		updateStats($link, $username,['enemy' => 'Snow Ninja' ]); // -- set enemy
	include ('battle.php'); 
}		
    else if ($rand2 == 5){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Snow Owl'");
		updateStats($link, $username,['enemy' => 'Snow Owl' ]); // -- set enemy
	include ('battle.php'); 
}		
    else if ($rand2 == 6){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Snow Owl'");
		updateStats($link, $username,['enemy' => 'Snow Owl' ]); // -- set enemy
	include ('battle.php'); 
}		
    else if ($rand2 == 7){ 
		// $results = $link->query("UPDATE $user SET enemy = 'Yeti'");
		updateStats($link, $username,['enemy' => 'Yeti' ]); // -- set enemy
	include ('battle.php'); 
}		
}


// -------------------------------------------------------------------------- IN BATTLE
//else if ($infight >=1 ) { include ('battle.php'); }


















    // -------------------------------------------------------------------------- Battle TRAVEL
    if (($input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
        $input=='e' || $input=='north' || $input=='se' || $input=='southeast' ||
        $input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
        $input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
        $input=='u' || $input=='up' || $input=='d' || $input=='down')  && $infight >= 1) {
        echo 'You cannot leave the room in the middle of battle!<br>';
        $message="<i>You cannot leave the room in the middle of battle!</i><br>";
        include('update_feed.php'); // --- update feed
    }

    // -------------------------------------------------------------------------- TRAVEL

    // elseif ($input=='ne' || $input=='northeast') {
    //     echo 'You travel northeast<br>';
    //     $message="<i>You travel northeast</i><br>".$_SESSION['desc603'];
    //     include('update_feed.php'); // --- update feed
    //         $results = $link->query("UPDATE $user SET room = '603'"); // -- room change
    //         //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // }






// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'northeast') { $roomNum = '603';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');}


// ----------------------------------- end of room function
include('function-end.php');
// }
