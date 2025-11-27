<?php
// -- 007 -- Grassy Field Cave Entrance
$roomname = "Grassy Field Cave Entrance";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc007'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

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

$quest4=$row['quest4'];
$woodennecklace=$row['woodennecklace'];

// -------------------------------------------------------------------------- READ SIGN!
if ($input=='read sign') {  //read sign
   echo	 '<i>You read the Spider Cave Entrance Sign</i><br>';
    $message="
   <i>you read the sign:</i>
   <div class='sign'>
   <h3>Spider Cave <span class='gold'>Entrance </span></h3>
    <p>Beware the spiders and scorpions that live in the cave to the south. You will need a weapon if you want to survive. </p>
    <strong class='gold'>If you don't have a weapon, go west of here and pick one up near the Young Soldier.</strong>
    </div>";
    include('update_feed.php'); // --- update feed
}


if ($input == 'search') // ----------- SEARCH Wooden Necklace
{
	$rand = rand (1,2); 			//		50%
	if ($woodennecklace >= 1) {
		echo $message="<i>You find a Wooden Necklace, but you already have one, so you leave it for the next adventurer.</i><br>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($rand == 1) {
			echo $message="You search the Cave Entrance and find a Wooden Necklace!<br> [ + 1 Wooden Necklace ]<br>";
			include ('update_feed.php'); // --- update feed
			//$results = $link->query("UPDATE $user SET woodennecklace = woodennecklace + 1");
            updateStats($link, $username, ['woodennecklace' => 1]); // -- update stat
	}
	else {
		echo $message="You search the Cave Entrance and think you see something in the rocks, you should search again.<br>";
		include ('update_feed.php'); // --- update feed
	}
}


    // -------------------------------------------------------------------------- TRAVEL
    // elseif ($input=='n' || $input=='north') {
    //     echo 'You travel north<br>';
    //     $message="<i>You travel north</i><br>".$_SESSION['desc006'];
    //     include('update_feed.php'); // --- update feed
    // $results = $link->query("UPDATE $user SET room = '006'");// -- room change
    // } elseif ($input=='nw' || $input=='northwest') {
    //     echo 'You travel northwest<br>';
    //     $message="<i>You travel northwest</i><br>".$_SESSION['desc001'];
    //     include('update_feed.php'); // --- update feed
    // $results = $link->query("UPDATE $user SET room = '001'");// -- room change
    // } elseif ($input=='w' || $input=='west') {
    //     echo 'You travel west<br>';
    //     $message="<i>You travel west</i><br>".$_SESSION['desc002'];
    //     include('update_feed.php'); // --- update feed
    // $results = $link->query("UPDATE $user SET room = '002'");// -- room change
    // } elseif ($input=='s' || $input=='south') {
    //     //if($quest4 < 2) {
    //     //	echo $message="<i>You need a weapon before you can enter the Spider Cave! Go 3 spaces west of here, talk to the Young Soldier and complete QUEST 4 to get your first Sword & Shield (or 2-Handed Sword!)</i><br>";
    //     if ($row['equipR']=='fists') {
    //         echo $message="<i>You can't enter the Spider Cave without a weapon! Go 3 spaces west of here and talk to the Young Soldier to get a sword.</i><br>";
    //         include('update_feed.php'); // --- update feed
    //     } else {
    //         echo 'You enter the Spider Cave<br>';
    //         $message="<i>You go south and enter the spider cave</i><br>".$_SESSION['desc008'];
    //         include('update_feed.php'); // --- update feed
    // $results = $link->query("UPDATE $user SET room = '008'"); // -- room change
    // //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    //     }
    // }



    elseif ($input == 'north') {    $roomNum = '006';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');} 
    elseif ($input == 'west') {     $roomNum = '002';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');} 
    elseif ($input == 'northwest') { $roomNum = '001';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');} 
    elseif ($input == 'south') {    
        if ($row['equipR']=='fists') {
            echo $message="<i>You can't enter the Spider Cave without a weapon! Go 3 spaces west of here and talk to the Young Soldier to get a sword.</i><br>";
            include('update_feed.php'); // --- update feed
        } else {
            echo 'You enter the Spider Cave<br>';
            $message="<i>You go south and enter the spider cave</i><br>".$_SESSION['desc008'];
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET room = '008'"); // -- room change
            // //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		// updateStats($link, $username, ['endfight' => 0]); // -- update stats
            updateStats($link, $username, ['room' => '008', 'endfight' => 0]); // -- update stats
        }
    } 

  
// ----------------------------------- end of room function
include('function-end.php');
// }
