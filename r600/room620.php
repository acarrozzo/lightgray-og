<?php
                        $roomname = "Dragon’s Ledge";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc620'];

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


    $flower = $row['flower'];

    $KLgiantmountaingiant=$_SESSION['KLgiantmountaingiant'];
    $KLgatekeeper=$_SESSION['KLgatekeeper'];
    $KLjiemji=$_SESSION['KLjiemji'];
    $KLjikay=$_SESSION['KLjikay'];
    $KLkingblade=$_SESSION['KLkingblade'];




    
    
    // -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
{	$rand = rand (1,4); }	
    else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE - 1/4 DRAGON
if(($rand == 1 ) && $infight==0 && $endfight==0) {	
// $results = $link->query("UPDATE $user SET enemy = 'Giant Mountain Giant'");
updateStats($link, $username,['enemy' => 'Dragon' ]); // -- set enemy
include ('battle.php'); 
}				
// -------------------------------------------------------------------------- IN BATTLE		
// else if ($infight >=1 ) { include ('battle.php'); }	
    
    // IF NO DRAGON - REGULAR BATTLE ROOM
    include ('battle-sets/mountains.php');



    if ($input=='get flower' || $input=='pick flower' || $input=='pick up flower') {  // ---- PICK FLOWER
        if ($row['flower'] <= 2) {
            echo $message="You can only pick a flower here if you already have 3 in your inventory. Return to the Grassy Field and then the Red Town Babylon Gardens, and then under the Ocean to get the first 3.<br>";
            include('update_feed.php'); // --- update feed
        } elseif ($row['flower'] >= 4) {
            echo 'You cannot pick up another flower here. You already have 4.<br>';
            $message="<i>You cannot pick up another flower here. You already have 4.</i><br>";
            include('update_feed.php'); // --- update feed
        } else {
            echo 'You pick a flower. You now have 4!<br>';
            $message="<i>You pick a flower. You now have 4!</i><br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET flower = flower + 1");
            updateStats($link, $username,['flower' => $flower + 1 ]); // -- update stat 

        }
    }



    // -------------------------------------------------------------------------- After Battle - SAFE ROOM
//     if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
//         $input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
//         $input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
//         $input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
//         $input!='u' && $input!='up' && $input!='d' && $input!='down') {
//         echo "This room is safe.<br>";
//     }




// if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
// {
//     $rand = rand (1,15);
//     $randrare = rand (1,50);
// }
//     else {$rand=0;$randrare=0;}


// // -------------------------------------------------------------------------- INITIALIZE Jikay or Jiemji or KING BLADE
// if(($randrare == 1 ) && $infight==0 && $endfight==0)
// {

//     if ($KLjikay>=1 && $KLjiemji>=1 && $KLkingblade >=1) { // DEFEATED ALL OF THEM
//         $rand2 = rand (1,3);
//         if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Jikay'");
// 	include ('battle.php'); 
// }		
//         else if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Jiemji'");
// 	include ('battle.php'); 
// }		
//         else if ($rand2 == 3){ $results = $link->query("UPDATE $user SET enemy = 'King Blade'");
// 	include ('battle.php'); 
// }		
//     }
//     else if ($KLjikay>=1 && $KLjiemji>=1 && $KLkingblade ==0) { // READY FOR KING BLADE
//         $rand2 = rand (1,5);
//         if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Jikay'");
// 	include ('battle.php'); 
// }		
//         else if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Jiemji'");
// 	include ('battle.php'); 
// }		
//         else if ($rand2 == 3){ $results = $link->query("UPDATE $user SET enemy = 'King Blade'");
// 	include ('battle.php'); 
// }		
//         else if ($rand2 == 4){ $results = $link->query("UPDATE $user SET enemy = 'King Blade'");
// 	include ('battle.php'); 
// }		
//         else if ($rand2 == 5){ $results = $link->query("UPDATE $user SET enemy = 'King Blade'");
// 	include ('battle.php'); 
// }		
//     }
//     else if ($KLjikay>=1 && $KLjiemji==0) {
//         $results = $link->query("UPDATE $user SET enemy = 'Jiemji'"); include ('battle.php');
//     }
//     else if ($KLjikay==0 && $KLjiemji>=1) {
//         $results = $link->query("UPDATE $user SET enemy = 'Jikay'"); include ('battle.php');
//     }
//     else if ($KLgiantmountaingiant>=1 || $KLgatekeeper>=1) {
//         $rand2 = rand (1,2);
//         if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Jikay'");
// 	include ('battle.php'); 
// }		
//         if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Jiemji'");
// 	include ('battle.php'); 
// }		
//     }
//     else {
//         $results = $link->query("UPDATE $user SET enemy = 'Flying Dung Beetle'"); include ('battle.php');
//     }
// }




// // -------------------------------------------------------------------------- INITIALIZE low RARES - 1/15 -> 1/7
// else if(($rand == 1 ) && $infight==0 && $endfight==0) {
//     $results = $link->query("UPDATE $user SET enemy = 'Dragon'"); include ('battle.php'); 
//     }
//     // -------------------------------------------------------------------------- INITIALIZE - 1/15
//     else if(($rand == 2 ) && $infight==0 && $endfight==0) 
//     {	$results = $link->query("UPDATE $user SET enemy = 'Mountain Giant'");
// 	include ('battle.php'); 
// }		
//     // -------------------------------------------------------------------------- INITIALIZE - 1/15
//     else if(($rand == 3 ) && $infight==0 && $endfight==0)
//     {	$results = $link->query("UPDATE $user SET enemy = 'Ice Troll'");
// 	include ('battle.php'); 
// }		
//     // -------------------------------------------------------------------------- INITIALIZE - 1/15
//     else if(($rand == 4 ) && $infight==0 && $endfight==0)
//     {	$results = $link->query("UPDATE $user SET enemy = 'Giant Brute'");
// 	include ('battle.php'); 
// }		
//     // -------------------------------------------------------------------------- INITIALIZE - 1/15
//     else if(($rand == 5 ) && $infight==0 && $endfight==0)
//     {	$results = $link->query("UPDATE $user SET enemy = 'Wyvern'");
// 	include ('battle.php'); 
// }		
//     // -------------------------------------------------------------------------- INITIALIZE - 1/15
//     else if(($rand == 6 ) && $infight==0 && $endfight==0)
//     {	$results = $link->query("UPDATE $user SET enemy = 'Stone Dwarf'");
// 	include ('battle.php'); 
// }		
//     // -------------------------------------------------------------------------- INITIALIZE - 1/15 -> 1/7
//     else if(($rand == 7 ) && $infight==0 && $endfight==0)
//     {	$rand2 = rand (1,7);
//         if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Yeti'");
// 	include ('battle.php'); 
// }		
//         else if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Yeti'");
// 	include ('battle.php'); 
// }		
//         else if ($rand2 == 3){ $results = $link->query("UPDATE $user SET enemy = 'Yeti'");
// 	include ('battle.php'); 
// }		
//         else if ($rand2 == 4){ $results = $link->query("UPDATE $user SET enemy = 'Snow Ogre'");
// 	include ('battle.php'); 
// }		
//         else if ($rand2 == 5){ $results = $link->query("UPDATE $user SET enemy = 'Snow Ninja'");
// 	include ('battle.php'); 
// }		
//         else if ($rand2 == 6){ $results = $link->query("UPDATE $user SET enemy = 'Snow Owl'");
// 	include ('battle.php'); 
// }		
//         else if ($rand2 == 7){ $results = $link->query("UPDATE $user SET enemy = 'Dragon'");
// 	include ('battle.php'); 
// }		

//     } 

// // -------------------------------------------------------------------------- IN BATTLE
//  elseif ($infight >=1) {
//      include('battle.php');
//  }





    if ($input == 'search')
    {
        $rand = rand (1,2);
        if ($rand !=2)
        {
            echo "You search Dragon's Ledge and don't find anything of interest<br>";
        $message="You search Dragon's Ledge and don't find anything of interest<br>";
        include ('update_feed.php'); // --- update feed
            
        }
        else {
            echo "You search Dragon's Ledge and spot a shiny platform off in the distance to the northwest!<br>";
        $message="You search Dragon's Ledge and spot a shiny platform off in the distance to the northwest!<br>";
        include ('update_feed.php'); // --- update feed
        $_SESSION['dragonsledgesearch'] = 1; 
        }
        //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    }









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

    elseif ($input=='e' || $input=='east') {
        echo 'You travel east<br>';
        $message="<i>You travel east</i><br>".$_SESSION['desc619'];
        include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET room = '619'"); // -- room change
            //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
            updateStats($link, $username,['endfight' => 0, 'room' => '619' ]); // -- update stats
            $_SESSION['dragonsledgesearch'] = 0;
    }


    else if($input=='nw' || $input=='northwest') 
{ 
	if ($_SESSION['dragonsledgesearch'] != 1) 
	{ 
	echo "You don't see an exit to the northwest. You should try searching.<br>";
	$message="<i>You don't see an exit to the northwest. You should try searching.</i><br>";
	include ('update_feed.php'); // --- update feed
   	
	}
	else {
	echo 'You jump off the ledge and land at the entrance to the Silver Temple!<br>';
	$message="<i>You jump off the ledge and land at the entrance to the Silver Temple!</i><br>".$_SESSION['desc625'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '625'"); // -- room change
  	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
      updateStats($link, $username,['endfight' => 0, 'room' => '625' ]); // -- update stats
      $_SESSION['dragonsledgesearch'] = 0;
	}
}

// ----------------------------------- end of room function
include('function-end.php');
// }
