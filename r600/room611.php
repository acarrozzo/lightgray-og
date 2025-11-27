<?php
                        $roomname = "Star City Blue Gate";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc611'];

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
    $quest70=$row['quest70'];

  //  $KLbutcher=$_SESSION['KLbutcher'];
  //  $KLkingsquid=$_SESSION['KLkingsquid'];

    $KLkraken=$_SESSION['KLkraken'];
    $KLtrollking=$_SESSION['KLtrollking'];
    $KLgiantmountaingiant=$_SESSION['KLgiantmountaingiant'];




    // -------------------------------------------------------------------------- READ SIGN!
if ($input=='read sign') {  //read sign
    echo '<i>You read the Blue Gate Sign.</i><br>';
    $message="
    <i>you read the sign:</i>
    <div class='sign'>
    ---------------------------------------------------<br>
    <span class='h3 gold'>Star City Blue Gate</span><br>
    ---------------------------------------------------<br>
    Find the 3 keys to open the Gate! <br>
    KEY OF GREED: Dropped by the King under the Ocean. <br>
    KEY OF WRATH: Dropped by the King of the Dark Forest. <br>
    KEY OF PRIDE: Dropped by the King of the Mountains <br>
    ---------------------------------------------------
    </div>";
    include('update_feed.php'); // --- update feed
}




    // ---------------------- START ALL QUESTS ---------------------- //
    if ($input=='start quest' || $input=='start quest 70') {
        if ($quest70 < 1) {
            /*
            echo $message = "<div class='menuAction'>
            <p class='gold'>You approach Rigel the Brave requesting access to the City. He tells you to return with the 3 required keys. (70)</p>
            <p>Check your Quests tab to review what needs to be done.</p>
            <a href='' data-link='quests' class='btn goldBG'>Open Quests</a>
            </div> ";
*/
            echo $message = '<div class="fbox">
            <h3 class="padd blue">You start Rigel the Brave\'s Quest!</h3>
            <span class="icon blue">'.file_get_contents("img/svg/npc/npc-rigel.svg").'</span>
            <p class="padd"><i>"This is your greatest quest! Retrieve the 3 magical pendants and unlock the Blue Gate!"</i></p>
            <a href data-link="quests" class="btn goldBG">Open Quests </a>
            </div>';


            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET quest70 = 1");
            updateStats($link, $username, ['quest70' => 1]); // -- update stats
        }
    }



    // ---------------------- QUEST 70) Open the Gate ---------------------- //
    if ($input=='info 70') {
        echo $message="<div class='menuAction'><strong class='green'>Quest 70 Info</strong><br>
		To complete this quest and open the city gate you must collect the 3 required keys. </div>";
        include('update_feed.php'); // --- update feed
    } elseif ($input=='complete 70') {
        if ($KLkraken >= 1 && $KLtrollking >= 1 && $KLgiantmountaingiant >= 1) {
            echo $message="<div class='questWin'>
		<h3>Quest 70 Completed!</h3>
		<h4>Open the Gate	</h4>
		Congratulations! You hand Rigel the Key of Greed, Wrath, and Pride. He lifts them up to the sky and the gate’s magic pulls them right from his hand. The 3 keys all click in unison and the gate opens for you. Welcome to Star City.
	  	<h4>Rewards</h4>
  	  	[ + 10,000 xp  ]<br />
      	[ + 50,000 ".$_SESSION['currency']." ]<br />
		[ + Access to Star City! ]</div>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET xp = xp + 10000");
            // $results = $link->query("UPDATE $user SET currency = currency + 50000");
            // $results = $link->query("UPDATE $user SET quest70 = 2");
            $updates = [ // -- set changes
                'quest70' => 2,
                'xp' => $xp + 10000,
                'currency' => $currency + 50000
            ]; 
            updateStats($link, $username, $updates); // -- apply changes
        } elseif ($quest70 == 1) {
            echo $message="<div class='menuAction'><strong class='green'>Quest 70 Not Complete</strong><br>
	To complete this quest and open the city gate you must collect the 3 required keys. </div>";
            include('update_feed.php'); // --- update feed
        }
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
    elseif ($input=='w' || $input=='west') {
        if ($quest70 == 2) {
            echo 'You walk through the Blue Gates and enter Star City!<br>';
            $message="<i>You walk through the Blue Gates and enter Star City!</i><br>".$_SESSION['desc701'];
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET room = '701'"); // -- room change
            //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
            updateStats($link, $username,['endfight' => 0, 'room' => '701' ]); // -- update stats
        } else {
            echo $message="<i>You can't enter Star City until you complete quest 70.</i><br>";
            include('update_feed.php'); // --- update feed
        }
    } elseif ($input=='e' || $input=='east') {
        echo 'You travel east to the Master Trainer<br>';
        $message="<i>You travel east to the Master Trainer</i><br>".$_SESSION['desc610'];
        include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET room = '610'"); // -- room change
            // $results = $link->query("UPDATE $user SET mastertrainerFlag = 1"); // -- mastertrainer flag on
            updateStats($link, $username,['mastertrainerFlag' => 1 ]); // -- update stat 
            //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
            updateStats($link, $username,['endfight' => 0, 'room' => '610' ]); // -- update stats
        }




// ----------------------------------- end of room function
include('function-end.php');
// }
