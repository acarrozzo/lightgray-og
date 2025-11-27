<?php
// -- 024 -- Jack Lumber - Professional Lumberjack
$roomname = "Jack Lumber";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc024'];

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


$quest7=$row['quest7'];
$quest8=$row['quest8'];
$quest9=$row['quest9'];

$chest1 = $row['chest1'];
$currency = $row['currency'];

$quest5=$row['quest5'];
$boomerang=$row['boomerang'];

$batwing=$row['batwing'];
$KLgoblinchief=$_SESSION['KLgoblinchief'];

$hatchet=$row['hatchet'];
$jacklumberFlag = $row['jacklumberFlag'];

$battleaxe=$row['battleaxe'];
$greenboots=$row['greenboots'];

$wood=$row['wood'];
$stone=$row['stone'];
$iron=$row['iron'];

// $results = $link->query("UPDATE $user SET crafting = 1"); // Delete this next push , was to fix below


// ---------------------- SKILL FLAG! ---------------------- //
if ($jacklumberFlag==0) {
    echo  $message = "<div class='menuAction'>You can now learn the Ranged SKILL!</div>";
    include('update_feed.php'); // --- update feed
    // $results = $link->query("UPDATE $user SET jacklumberFlag = 1");
    // $results = $link->query("UPDATE $user SET crafting = 1"); // -- room change
    $updates = ['jacklumberFlag' => 1,'crafting' => 1]; // -- room change + reset fight
    updateStats($link, $username, $updates); // -- apply changes
}
if ($input=='start quests') {
    if ($quest7 <1 || $quest8 <1 || $quest9 <1) {
        echo $message = '<div class="fbox">
        <h3 class="padd forest">You start Jack Lumber\'s Quests!</h3>
        <span class="icon forest">'.file_get_contents("img/svg/npc/npc-jacklumber.svg").'</span>
        <p class="padd"><i>"I\'m Jack Lumber, get it! Like Lumberjack! I can show you how to chop wood and craft with it!"</i></p>
        <a href data-link="quests" class="btn goldBG">Open Quests</a>
        </div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET quest7 = 1");
        // $results = $link->query("UPDATE $user SET quest8 = 1");
        // $results = $link->query("UPDATE $user SET quest9 = 1");
        // $results = $link->query("UPDATE $user SET crafting = 1"); // open up crafting
        $updates = [ // -- set changes
            'quest7' => 1,
            'quest8' => 1,
            'quest9' => 1,
            'crafting' => 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
    }
}

// -------------------------------------------------------------------------- QUEST 7 - BOOMERANG SOME BATS
elseif ($input=='info 7') {
    echo 'Quest Info: 7) Boomerang Some Bats<br>';
    $message="Quest Info: 7) Boomerang Some Bats<br>You need to equip your boomerang (or any other ranged weapon) to hit the bats since your sword cannot reach them. When you use any ranged weapon, the damage done is determined by your dexterity [DEX]. The bat cave can be found s, s, sw of the crossroads [RECALL].<br>";
    include('update_feed.php'); // --- update feed
} elseif ($input=='complete 7') {
    if ($batwing >= 5 && $quest7 == 1) {
        echo "You Complete Quest 7) Boomerang Some Bats<br>";
        $message="
        <div class='questWin'>
        <h3>Quest 7 Completed!</h3>
        <h4>Boomerang some Bats</h4>
        You hand Jack 5 bat wings. He hands you some ".$_SESSION['currency']." and a sweet pair of green boots.</p>
        <h4>Rewards</h4>
        [ + 50 xp  ]<br />
        [ + 100 ".$_SESSION['currency']." ]<br />
        [ + Green Boots! (+2 dex) ]</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET currency = currency + 100");
        // $results = $link->query("UPDATE $user SET xp = xp + 50");
        // $results = $link->query("UPDATE $user SET quest7 = 2");
        // $results = $link->query("UPDATE $user SET greenboots = greenboots + 1");
        // $results = $link->query("UPDATE $user SET batwing = batwing - 5");
        $updates = [ // -- set changes
            'quest7' => 2,
            'xp' => $xp + 50,
            'greenboots' => $greenboots + 1,
            'batwing' => $batwing - 5,
            'currency' => $currency + 100
        ]; 
        updateStats($link, $username, $updates); // -- apply changes

    } else {
        echo "Quest Not Complete: Go and collect 5 bat wings.<br>";
        $message="Quest Not Complete: Go and collect 5 bat wings.<br>";
        include('update_feed.php'); // --- update feed
    }
}




// -------------------------------------------------------------------------- QUEST 8 - Chop Some Wood, Craft a Table
elseif ($input=='info 8') {
    echo 'Quest Info: 8) Chop Some Wood, Craft a Table<br>';
    $message="Quest Info: 8) Chop Some Wood, Craft a Table<br>GET HATCHET if you haven't already. Then go one space north of here and CHOP down some trees. You will then CREATE a crafting table using 3 wood. A crafting table will allow you to create new useful items. To access the crafting menu use CRAFT or CREATE.<br>";
    include('update_feed.php'); // --- update feed
} elseif ($input=='complete 8') {
    if ($craftingtable >= 1 && $quest8 == 1) {
        echo "You Complete Quest 8) Chop Some Wood, Craft a Table<br>";
        $message="
        <div class='questWin'>
        <h3>Quest 8 Completed!</h3>
        <h4>Chop Some Wood, Craft a Table</h4>
        Congratulations! You created a crafting table. Build one at anytime and you will be able to create many new useful items. Here are some materials to start with.
        <h4>Rewards</h4>
        [ + 50 xp  ]<br />
        [ + 100 ".$_SESSION['currency']." ]<br />
        [ + 10 wood ]<br>
        [ + 5 stone ]<br>
        [ + 3 iron ]</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET currency = currency + 100");
        // $results = $link->query("UPDATE $user SET xp = xp + 50");
        // $results = $link->query("UPDATE $user SET quest8 = 2");
        // $results = $link->query("UPDATE $user SET wood = wood + 10");
        // $results = $link->query("UPDATE $user SET stone = stone + 5");
        // $results = $link->query("UPDATE $user SET iron = iron + 3");
        $updates = [ // -- set changes
            'quest8' => 2,
            'xp' => $xp + 50,
            'wood' => $wood + 10,
            'stone' => $stone + 5,
            'iron' => $iron + 3,
            'currency' => $currency + 100
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
    } else {
        echo "Quest Not Complete: Go chop some wood and craft a table<br>";
        $message="Quest Not Complete: Go chop some wood and craft a table<br>";
        include('update_feed.php'); // --- update feed
    }
}











// -------------------------------------------------------------------------- QUEST 9 - Goblin Chief Bounty
elseif ($input=='info 9') {
    echo $message="<div class='menuAction'><strong class='green'>Quest 9 Info</strong><br>
    The Goblin Chief is hiding out somewhere in the Bat Cave. You will have to search in a specific room to find the hiding spot. It will be a difficult fight, so go prepared.</div>";
    include('update_feed.php'); // --- update feed
} elseif ($input=='complete 9') {
    if ($KLgoblinchief >= 1 && $quest9 == 1) {
        echo "You Complete Quest 9) Goblin Chief Bounty<br>";
        $message="
        <div class='questWin'>
        <h3>Quest 9 Completed!</h3>
        <h4>Goblin Chief Bounty</h4>
        Congratulations! Great work getting rid of that Goblin Chief. You are now free to leave this Grassy Field and enter the Forest. Go east and then south through the forest path to get to Red Town.
        <h4>Rewards</h4>
        [ + Access to the FOREST PATH ]<br />
        [ + 200 xp  ]<br />
        [ + 1000 ".$_SESSION['currency']." ]<br />
        [ + Battle Axe! ( +11 str, -2 def ) ]</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET currency = currency + 1000");
        // $results = $link->query("UPDATE $user SET xp = xp + 200");
        // $results = $link->query("UPDATE $user SET quest9 = 2");
        // $results = $link->query("UPDATE $user SET battleaxe = battleaxe + 1");
        $updates = [ // -- set changes
            'quest9' => 2,
            'xp' => $xp + 200,
            'battleaxe' => $battleaxe + 1,
            'currency' => $currency + 1000
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
    } else {
        echo "Quest Not Complete: Find and eliminate the Goblin Chief<br>";
        $message="Quest Not Complete: Find and eliminate the Goblin Chief<br>";
        include('update_feed.php'); // --- update feed
    }
}


elseif ($input=='get hatchet') {
    if ($hatchet >= 1) {
        echo 'You already have a hatchet. If you lose it come back here for another one<br>';
        $message="<i>You already have a hatchet. If you lose it come back here for another one.</i><br>";
        include('update_feed.php'); // --- update feed
    } else {
        echo 'You pick up a hatchet<br>';
        $message="You pick up a hatchet<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET hatchet = hatchet + 1");
        $updates = ['hatchet' => $hatchet + 1]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
}




// -------------------------------------------------------------------------- TRAVEL
// elseif ($input=='s' || $input=='south') {
//     echo 'You travel south<br>';
//     $message="<i>You travel south</i><br>".$_SESSION['desc023'];
//     include('update_feed.php'); // --- update feed
// $results = $link->query("UPDATE $user SET room = '023'"); // -- room change
// //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
//         updateStats($link, $username, ['endfight' => 0]); // -- update stats
// } 
elseif ($input == 'south') {    $roomNum = '023';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');} 

elseif ($input=='n' || $input=='north') {
    if ($chest1 == 0) {
        echo $message='The Tree Farm is off limits until you open the Grassy Field Gold Chest. Go do that!<br>';
        include('update_feed.php'); // --- update feed
    } else {
        echo 'You travel north to the Tree Farm.<br>';
        $message="<i>You travel north to the Tree Farm</i><br>".$_SESSION['desc025'];
        include('update_feed.php'); // --- update feed
// $results = $link->query("UPDATE $user SET room = '025'"); // -- room change
//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
        $updates = ['room' => '025', 'endfight' => 0]; // -- room change + reset fight
		updateStats($link, $username, $updates); // -- apply changes
    }
}


// ----------------------------------- end of room function
include('function-end.php');
// }
