<?php
                        $roomname = "Red Guard Captain - Forest Lookout ";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc215'];
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

    $quest11=$row['quest11'];
    $quest12=$row['quest12'];
    $quest13=$row['quest13'];

    $KLthief=$_SESSION['KLthief'];
    $longsword=$row['longsword'];
    $KLtarantula=$_SESSION['KLtarantula'];
    $KLsewerrat=$_SESSION['KLsewerrat'];
    $KLredgator=$_SESSION['KLredgator'];

    $currency=$row['currency'];
    $xp=$row['xp'];
    $arrows=$row['arrows'];
    $bolts=$row['bolts'];
    $crossbow=$row['crossbow'];
    $battlehelm=$row['battlehelm'];
    $threechainedflail=$row['threechainedflail'];


    // ---------------------- START ALL QUESTS ---------------------- //
    if ($input=='start quests') {
        if ($quest11 <1 || $quest12 <1 || $quest13 <1) {
            echo $message = '<div class="fbox">
            <h3 class="padd red">You start the Red Guard Captain\'s Quests!</h3>
            <span class="icon red">'.file_get_contents("img/svg/npc/npc-redguardcaptain.svg").'</span>
            <p class="padd"><i>"Finally! I need your help cleaning up this town!"</i></p>
            <a href data-link="quests" class="btn goldBG">Open Quests </a>
            </div>';
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET quest11 = 1");
            // $results = $link->query("UPDATE $user SET quest12 = 1");
            // $results = $link->query("UPDATE $user SET quest13 = 1");
            $updates = [ // -- set changes
                'quest11' => 1,
                'quest12' => 1,
                'quest13' => 1
            ]; 
            updateStats($link, $username, $updates); // -- apply changes
        }
    }

    // ---------------------- QUEST 11) Bring 3 Thieves to Justice ---------------------- //
    if ($input=='info 11') {
        echo $message="<div class='menuAction'><strong class='green'>Quest 11 Info</strong><br>
		Thieves will randomly attack you here in town and along the stone paths. As you walk around i'm sure you'll encounter some. Eliminate 3 of them for some ammo and a crossbow reward.</div>";
        include('update_feed.php'); // --- update feed
    } elseif ($input=='complete 11') {
        if ($quest11 == 1 && $KLthief >= 3) {
            echo $message="<div class='questWin'>
            <h3>Quest 11 Completed!</h3>
            <h4>Bring 3 Thieves to Justice</h4>
            Congratulations! You have brought 3 Thieves to justice! Your reward is 50 arrows, 50 bolts and a shiny new crossbow.</p>
            <h4>Rewards</h4>
            [ + 300 xp  ]<br />
            [ + 500 ".$_SESSION['currency']." ]<br />
            [ + 50 Arrows ]<br>
            [ + 50 Bolts ]<br>
            [ + Crossbow ]</div>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET currency = currency + 500");
            // $results = $link->query("UPDATE $user SET xp = xp + 300");
            // $results = $link->query("UPDATE $user SET arrows = arrows + 50");
            // $results = $link->query("UPDATE $user SET bolts = bolts + 50");
            // $results = $link->query("UPDATE $user SET crossbow = crossbow + 1");
            // $results = $link->query("UPDATE $user SET quest11 = 2");
            $updates = [ // -- set changes
                'quest11' => 2,
                'xp' => $xp + 300,
                'currency' => $currency + 500,
                'arrows' => $arrows + 50,
                'bolts' => $bolts + 50,
                'crossbow' => $crossbow + 1
            ]; 
            updateStats($link, $username, $updates); // -- apply changes
        } elseif ($quest11 == 1) {
            echo $message="<div class='menuAction'><strong class='green'>Quest 11 Not Complete</strong><br>
		To complete this quest you need to find and defeat 3 Thieves. Travel the roads and towns to find them.</div>";
            include('update_feed.php'); // --- update feed
        }
    }

    // ---------------------- QUEST 12) Swords for the Red Guard ---------------------- //
    if ($input=='info 12') {
        echo $message="<div class='menuAction'><strong class='green'>Quest 12 Info</strong><br>
		Long Swords can be bought from the shops to the south or are dropped by certain enemies. Alpha Scorpions, Orcs, Kobolds & Tarantulas drop them, or just buy some from Michael or Adam to save time.</div>";
        include('update_feed.php'); // --- update feed
    } elseif ($input=='complete 12') {
        if ($quest12 == 1 && $longsword >= 5) {
            echo $message="<div class='questWin'>
            <h3>Quest 12 Completed!</h3>
            <h4>Swords for the Red Guard</h4>
            Congratulations! You hand 5 Long Swords over to the guard. You receive the elite guard helmet, the Battle Helm, as a reward.
            <h4>Rewards</h4>
            [ + 300 xp  ]<br />
            [ + 500 ".$_SESSION['currency']." ]<br />
            [ + Battle Helm! ]</div>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET currency = currency + 500");
            // $results = $link->query("UPDATE $user SET xp = xp + 300");
            // $results = $link->query("UPDATE $user SET battlehelm = battlehelm + 1");
            // $results = $link->query("UPDATE $user SET quest12 = 2");
            // $results = $link->query("UPDATE $user SET longsword = longsword - 5");
            $updates = [ // -- set changes
                'quest12' => 2,
                'xp' => $xp + 300,
                'currency' => $currency + 500,
                'battlehelm' => $battlehelm + 1,
                'longsword' => $longsword - 5
            ]; 
            updateStats($link, $username, $updates); // -- apply changes
        } elseif ($quest12 == 1) {
            echo $message="<div class='menuAction'><strong class='green'>Quest 12 Not Complete</strong><br>
            To complete this quest return with 5 Long Swords. Alpha Scorpions, Orcs, Kobolds & Tarantulas drop them, or you can buy them from the shops to the south. Your reward for delivering 5 long swords will be an awesome Battle Helm.</div>";
            include('update_feed.php'); // --- update feed
        }
    }



    // ---------------------- QUEST 13) Sewer Pest Control ---------------------- //
    if ($input=='info 13') {
        echo $message="<div class='menuAction'><strong class='green'>Quest 13 Info</strong><br>
		You can find the sewer entrances to the south and then east of here. Kill a Tarantula, a Sewer Rat and a Red Gator and you will be rewarded with a Three-Chained Flail.</div>";
        include('update_feed.php'); // --- update feed
    } elseif ($input=='complete 13') {
        if ($quest13 == 1 && ($KLtarantula >= 1 && $KLsewerrat >= 1 && $KLredgator >= 1)) {
            echo $message="<div class='questWin'>
            <h3>Quest 13 Completed!</h3>
            <h4>Sewer Pest Control</h4>
            Congratulations! The Sewers are now a slightly safer place. Your reward is a shiny Three-Chained Flail.
            <h4>Rewards</h4>
            [ + 300 xp  ]<br />
            [ + 500 ".$_SESSION['currency']." ]<br />
            [ + Three-Chained Flail! ]</div>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET currency = currency + 500");
            // $results = $link->query("UPDATE $user SET xp = xp + 300");
            // $results = $link->query("UPDATE $user SET threechainedflail = threechainedflail + 1");
            // $results = $link->query("UPDATE $user SET quest13 = 2");
            $updates = [ // -- set changes
                'quest13' => 2,
                'xp' => $xp + 300,
                'currency' => $currency + 500,
                'threechainedflail' => $threechainedflail + 1,
            ]; 
            updateStats($link, $username, $updates); // -- apply changes
        } elseif ($quest13 == 1) {
            echo $message="<div class='menuAction'><strong class='green'>Quest 13 Not Complete</strong><br>
		To complete this quest you need to kill a Tarantula, a Sewer Rat and a Red Gator in the Sewers below Red Town.</div>";
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
// elseif ($input=='s' || $input=='south') {
//     echo 'You travel south<br>';
//     $message="<i>You travel south</i><br>".$_SESSION['desc214'];
//     include('update_feed.php'); // --- update feed
//     $results = $link->query("UPDATE $user SET room = 214"); // -- room change
//     //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
//         updateStats($link, $username, ['endfight' => 0]); // -- update stats
// } 

elseif ($input=='n' || $input=='north') {
    if ($quest11 == 2 || $quest12 == 2 || $quest13 == 2) {
        echo "The Red Guard Captain lets you go down the ladder and you enter the forest.";
        $message="<i>The Red Guard Captain lets you go down the lookout tower's ladder and you enter the forest.</i><br>".$_SESSION['desc124'];
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET room = 124"); // -- room change
        $updates = ['endfight' => 0, 'room' => '124' ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
        $_SESSION['emptytree'] = 0; // reset tree
    } else {
        echo $message="<i>You can't go north here until you complete one of the Captain's quests. Otherwise you can access the Forest by going back to the Forest Path.</i><br>";
        include('update_feed.php'); // --- update feed
    }
}



// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '214';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}




// ----------------------------------- end of room function
include('function-end.php');
// }
