<?php
$roomname = "Destroyed Academy | Grand Quest";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc029'];
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
//	$results = $link->query("UPDATE $user SET grandquest2 = 0");


$grandquest1=$row['grandquest1'];
$grandquest2=$row['grandquest2'];
$grandquest3=$row['grandquest3'];
$grandquest4=$row['grandquest4'];
$grandquest5=$row['grandquest5'];


/*

    $quest1=$row['quest1'];
    $quest2=$row['quest2'];
    $quest3=$row['quest3'];
    $quest4=$row['quest4'];
    $quest5=$row['quest5'];
    $quest6=$row['quest6'];
    $quest7=$row['quest7'];
    $quest8=$row['quest8'];
    $quest9=$row['quest9'];

    $quest10=$row['quest10'];
    $quest11=$row['quest11'];
    $quest12=$row['quest12'];
    $quest13=$row['quest13'];
    $quest14=$row['quest14'];
    $quest15=$row['quest15'];
    $quest16=$row['quest16'];
    $quest17=$row['quest17'];
    $quest18=$row['quest18'];
    $quest19=$row['quest19'];
    $quest20=$row['quest20'];
    $quest21=$row['quest21'];
    $quest22=$row['quest22'];
    $quest23=$row['quest23'];
    $quest24=$row['quest24'];
    $quest25=$row['quest25'];
    $quest26=$row['quest26'];
    $quest27=$row['quest27'];
    $quest28=$row['quest28'];
    $quest29=$row['quest29'];

    $quest30=$row['quest30'];
    $quest31=$row['quest31'];
    $quest32=$row['quest32'];
    $quest33=$row['quest33'];
    $quest34=$row['quest34'];
    $quest35=$row['quest35'];
    $quest36=$row['quest36'];
    $quest37=$row['quest37'];
    $quest38=$row['quest38'];
    $quest39=$row['quest39'];

    $quest40=$row['quest40'];
    $quest41=$row['quest41'];
    $quest42=$row['quest42'];
    $quest43=$row['quest43'];
    $quest44=$row['quest44'];
    $quest45=$row['quest45'];
    $quest46=$row['quest46'];
    $quest47=$row['quest47'];
    $quest48=$row['quest48'];
    $quest49=$row['quest49'];

    $quest50=$row['quest50'];
    $quest51=$row['quest51'];
    $quest52=$row['quest52'];
    $quest53=$row['quest53'];
    $quest54=$row['quest54'];
    $quest55=$row['quest55'];
    $quest56=$row['quest56'];
    $quest57=$row['quest57'];
    $quest58=$row['quest58'];
    $quest59=$row['quest59'];

    $quest60=$row['quest60'];
    $quest61=$row['quest61'];
    $quest62=$row['quest62'];
    $quest63=$row['quest63'];
    $quest64=$row['quest64'];
    $quest65=$row['quest65'];
    $quest66=$row['quest66'];
    $quest67=$row['quest67'];
    $quest68=$row['quest68'];
    $quest69=$row['quest69'];

    $quest70=$row['quest70'];
*/




// MOVE THIS TO FILE TO DO QUEST COUNTER WHEN NEEDED FOR OTHER PLACES
// MOVE THIS TO FILE TO DO QUEST COUNTER WHEN NEEDED FOR OTHER PLACES
// MOVE THIS TO FILE TO DO QUEST COUNTER WHEN NEEDED FOR OTHER PLACES
// MOVE THIS TO FILE TO DO QUEST COUNTER WHEN NEEDED FOR OTHER PLACES
// MOVE THIS TO FILE TO DO QUEST COUNTER WHEN NEEDED FOR OTHER PLACES
// MOVE THIS TO FILE TO DO QUEST COUNTER WHEN NEEDED FOR OTHER PLACES
// MOVE THIS TO FILE TO DO QUEST COUNTER WHEN NEEDED FOR OTHER PLACES
// MOVE THIS TO FILE TO DO QUEST COUNTER WHEN NEEDED FOR OTHER PLACES
// MOVE THIS TO FILE TO DO QUEST COUNTER WHEN NEEDED FOR OTHER PLACES
// MOVE THIS TO FILE TO DO QUEST COUNTER WHEN NEEDED FOR OTHER PLACES

// Assuming $row is an associative array containing the 'quest##' variables.
$_SESSION['questCounter'] = $questCounter = 0;
$ones = 0;
$zeros = 0;

// Loop through variables 'quest1' to 'quest70'
for ($i = 1; $i <= 70; $i++) {
    $variableName = 'quest' . $i;
    // Check if $row['quest##'] is set and greater than or equal to 2
    //if (isset($row[$variableName]) && $row[$variableName] >= 2) {
    if ($row[$variableName] >= 2) {
        $questCounter++; 
        $_SESSION['questCounter'] = $questCounter; 
    }
    elseif ($row[$variableName] == 1) {
        $ones++;
    }
    else if ($row[$variableName] == 0) {
        $zeros++;
    } 
}
// Now $questCounter contains the count of 'quest##' variables with values greater than or equal to 2.
// // MOVE THIS TO FILE TO DO QUEST COUNTER WHEN NEEDED FOR OTHER PLACES // END // END // END


    
echo 'questCounter: '.$_SESSION['questCounter'].'<br>';
echo 'ZEROS: '.$zeros.'<br>';
echo 'ONES: '.$ones.'<br>';
    
    // Now $zeros will contain the count of 0's, and $ones will contain the count of 1's.


    // -------------------------------------------------------------------------- GQ1) GRASSY FIELD
    if ($input=='grand quest 1') {
        if ($grandquest1 == 0) {
            echo $message = "You Start Grand Quest 1) Grassy Field Savior!<br>";
            include('update_feed.php'); // --- update feed
        $results = $link->query("UPDATE $user SET grandquest1 = 1"); // -- room change
        } elseif ($grandquest1 == 2) {
            echo $message="You already completed Grand Quest 1) Grassy Field Savior<br>";
            include('update_feed.php'); // --- update feed
        } elseif ($grandquest1 == 1 && ($quest1==2 && $quest2==2 && $quest3==2 && $quest4==2 && $quest5==2 && $quest6==2 && $quest7==2 && $quest8==2 && $quest9==2 && $quest10==2)) {
            echo 'You have Completed Grand Quest 1) Grassy Field Savior!';
            $message = "<div class='questWin'><h5>Grand Quest 1 Completed!</h3>
		<h4>Grassy Field Savior</h4>
		Congratulations! You have saved the Grassy Field from certain doom!
	  	<h4>Rewards</h4>
  	  	[ + 200 xp  ]<br />
      	[ + 5000 ".$_SESSION['currency']." ]</div><br>";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET currency = currency + 5000");
            $results = $link->query("UPDATE $user SET xp = xp + 200");
            $results = $link->query("UPDATE $user SET grandquest1 = 2");
        } elseif ($grandquest1 == 1) {
            echo $message = 'Grand Quest 1 not completed yet. To complete GQ1 you need to help the good people in the Grassy Field. Help the Old Man, the Young Soldier and Jack Lumber. O, and Freddy too! (Complete quests 1-10)<br>';
            include('update_feed.php'); // --- update feed
        }
    }


    // -------------------------------------------------------------------------- GQ2) Red Town
    elseif ($input=='grand quest 2') {
        if ($grandquest2 == 0) {
            echo $message = "You Start Grand Quest 2) Red Town Savior!<br>";
            include('update_feed.php'); // --- update feed
        $results = $link->query("UPDATE $user SET grandquest2 = 1"); // -- room change
        } elseif ($grandquest2 == 2) {
            echo $message="You already completed Grand Quest 2) Red Town Savior<br>";
            include('update_feed.php'); // --- update feed
        } elseif ($grandquest2 == 1 &&
    ($quest11==2 && $quest12==2 && $quest13==2 && $quest14==2 && $quest15==2 && $quest16==2 && $quest17==2 && $quest18==2 && $quest19==2 && $quest20==2 && $quest21==2 && $quest22==2 && $quest23==2 && $quest24==2 && $quest25==2 && $quest26==2 && $quest27==2 && $quest28==2 && $quest29==2 && $quest30==2)) {
            echo 'You have Completed Grand Quest 2) Red Town Savior!';
            $message = "<div class='questWin'><h5>Grand Quest 2 Completed!</h3>
		<h4>Red Town Savior</h4>
		Congratulations! You have saved Red Town and the Forest from certain doom!
	  	<h4>Rewards</h4>
  	  	[ + 5000 xp  ]<br />
      	[ + 10000 ".$_SESSION['currency']." ]</div><br>";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET currency = currency + 10000");
            $results = $link->query("UPDATE $user SET xp = xp + 5000");
            $results = $link->query("UPDATE $user SET grandquest2 = 2");
        } elseif ($grandquest2 == 1) {
            echo $message = 'Grand Quest 2 not completed yet. To complete GQ2 you need to help the good people of the Forest and Red Town. (Complete quests 11-30)<br>';
            include('update_feed.php'); // --- update feed
        }
    }



    // -------------------------------------------------------------------------- GQ3) Rocky Flats
    elseif ($input=='grand quest 3') {
        if ($grandquest3 == 0) {
            echo $message = "You Start Grand Quest 3) Rocky Flats Savior!<br>";
            include('update_feed.php'); // --- update feed
        $results = $link->query("UPDATE $user SET grandquest3 = 1"); // -- room change
        } elseif ($grandquest3 == 2) {
            echo $message="You already completed Grand Quest 3) Rocky Flats Savior<br>";
            include('update_feed.php'); // --- update feed
        } elseif ($grandquest3 == 1 &&
    ($quest31==2 && $quest32==2 && $quest33==2 && $quest34==2 && $quest35==2 && $quest36==2 && $quest37==2 && $quest38==2 && $quest39==2 && $quest40==2 && $quest41==2 && $quest42==2 && $quest43==2 && $quest44==2 && $quest45==2 && $quest46==2 && $quest47==2 && $quest48==2 && $quest49==2 && $quest50==2)) {
            echo 'You have Completed Grand Quest 3) Rocky Flats Savior!';
            $message = "<div class='questWin'><h5>Grand Quest 3 Completed!</h3>
		<h4>Rocky Flats Savior</h4>
		Congratulations! You have saved the Rocky Flats and the Blue Ocean from certain doom!
	  	<h4>Rewards</h4>
  	  	[ + 10,000 xp  ]<br />
      	[ + 20,000 ".$_SESSION['currency']." ]</div><br>";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET currency = currency + 20000");
            $results = $link->query("UPDATE $user SET xp = xp + 10000");
            $results = $link->query("UPDATE $user SET grandquest3 = 2");
        } elseif ($grandquest3 == 1) {
            echo $message = 'Grand Quest 3 not completed yet. To complete GQ3 you need to help the good people of the Rocky Flats and Blue Ocean. (Complete quests 31-50)<br>';
            include('update_feed.php'); // --- update feed
        }
    }

        // -------------------------------------------------------------------------- GQ4) Mountain
        elseif ($input=='grand quest 4') {
            if ($grandquest4 == 0) {
                echo $message = "You Start Grand Quest 4) Mountain Savior!<br>";
                include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET grandquest4 = 1"); // -- room change
            } elseif ($grandquest4 == 2) {
                echo $message="You already completed Grand Quest 4) Mountain Savior<br>";
                include('update_feed.php'); // --- update feed
            } elseif ($grandquest4 == 1 &&
        ($quest51>=2 && $quest52>=2 && $quest53>=2 && $quest54>=2 && $quest55>=2 && $quest56>=2 && $quest57>=2 && $quest58>=2 && $quest59>=2 && $quest60>=2 && $quest61>=2 && $quest62>=2 && $quest63>=2 && $quest64>=2 && $quest65>=2 && $quest66>=2 && $quest67>=2 && $quest68>=2 && $quest69>=2 && $quest70>=2)) {
                echo 'You have Completed Grand Quest 4) Mountain Savior!';
                $message = "<div class='questWin'><h5>Grand Quest 4 Completed!</h3>
            <h4>Mountain Savior</h4>
            Congratulations! You have saved the Mountains and Dark Forest from certain doom!
              <h4>Rewards</h4>
                [ + 10,000 xp  ]<br />
              [ + 20,000 ".$_SESSION['currency']." ]</div><br>";
                include('update_feed.php'); // --- update feed
                $results = $link->query("UPDATE $user SET currency = currency + 50000");
                $results = $link->query("UPDATE $user SET xp = xp + 20000");
                $results = $link->query("UPDATE $user SET grandquest4 = 2");
            } elseif ($grandquest4 == 1) {
                echo $message = 'Grand Quest 4 not completed yet. To complete GQ4 you need to help the good people of the Mountains and the Dark Forest. (Complete quests 51-70)<br>';
                include('update_feed.php'); // --- update feed
            }
        }







    // -------------------------------------------------------------------------- Battle TRAVEL
    if (($input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
        $input=='e' || $input=='north' || $input=='se' || $input=='southeast' ||
        $input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
        $input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
        $input=='u' || $input=='up' || $input=='d' || $input=='down')   && $infight >= 1) {
        echo 'You cannot leave the room in the middle of battle!<br>';
        $message="<i>You cannot leave the room in the middle of battle!</i><br>";
        include('update_feed.php'); // --- update feed
    }
    
    // -------------------------------------------------------------------------- TRAVEL

//     elseif ($input=='s' || $input=='south') {
//         echo 'You travel south<br>';
//         $message="<i>You travel south</i><br>".$_SESSION['desc005'];
//         include('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = '005'"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//     } 
    
    /*
    elseif ($input=='nw' || $input=='northwest') {
        echo 'You travel northwest<br>';
        $message="<i>You travel northwest</i><br>".$_SESSION['desc030'];
        include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '030'"); // -- room change
    }
*/
elseif ($input=='nw' || $input=='northwest') {
    echo $message="<i>The intense winds prevent you from passing over the Chasm. Regular flying will not do, you will have to become superfly.  </i><br>";
    include('update_feed.php'); // --- update feed
    //$results = $link->query("UPDATE $user SET room = '030'"); // -- room change
    ////  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

elseif ($input == 'south') {    $roomNum = '005';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');} 




// ----------------------------------- end of room function
include('function-end.php');
// }
