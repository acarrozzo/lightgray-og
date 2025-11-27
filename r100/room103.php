<?php
// -- 103 -- Freddie's Cow Farm & Leather Factory
$roomname = "Freddie's Cow Farm";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc103'];
$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

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



$currency = $row['currency'];
$quest10=$row['quest10'];
$xp=$row['xp'];
$leather=$row['leather'];
$redpotion=$row['redpotion'];
$arrows=$row['arrows'];

$hammer=$row['hammer'];

$leatherhood=$row['leatherhood'];
$leatherhelmet=$row['leatherhelmet'];
$leathervest=$row['leathervest'];
$leatherarmor=$row['leatherarmor'];
$leathergloves =$row['leathergloves'];
$leatherboots=$row['leatherboots'];



// -------------------------------------------------------------------------- START QUESTS - 10
if ($input=='start 10' || $input=='start quest 10' || $input=='start quests') {
    if ($quest10 <=1) {
        echo $message = '<div class="fbox">
        <h3 class="padd green">You start Freddie\'s Quests!</h3>
        <span class="icon green">'.file_get_contents("img/svg/npc/npc-freddie.svg").'</span>
        <p class="padd"><i>"Let\'s craft with some leather. You can use my cows to gather some, but you have to pay!"</i></p>
        <a href data-link="quests" class="btn goldBG">Open Quests </a>
        </div>';
        include('update_feed.php'); // --- update feed
    // $results = $link->query("UPDATE $user SET quest10 = 1"); // -- room change
    $updates = [ // -- set changes
        'quest10' => 1
    ];
    updateStats($link, $username, $updates); // -- apply changes
    }
}


// -------------------------------------------------------------------------- QUEST 10) Craft with Leather
if ($input=='info 10') {
    echo $message="<div class='menuAction'><strong class='green'>Quest 10 Info</strong><br>You can craft leather equipment using the CRAFT interface with a Crafting Table built. Collect Leather from the cows to the north. You have to pay a 50 $currency toll each time you want to enter and can only collect a maximum of 5 leather here.</div>";
    include('update_feed.php'); // --- update feed
} elseif ($input=='complete 10') {
    if (($leatherhood >= 1 ||
            $leatherhelmet >= 1 ||
            $leathervest >= 1 ||
            $leatherarmor >= 1 ||
            $leathergloves >= 1 ||
            $leatherboots >= 1) && $quest10 == 1) {
        echo $message="
    <div class='questWin'><h3>Quest 10 Completed!</h3>
    <h4>Craft with Leather</h4>
    Congratulations! You have crafted some leather equipment. Feel free to visit and collect more leather anytime you wish. To collect more than 5 leather head into the forest and hunt some animals.
    <h4>Rewards</h4>
    [ + 100 xp  ]<br />
    [ + 100 ".$_SESSION['currency']." ]<br />
    [ + 50 Arrows ]<br />
    [ + 10 Leather! ]<br />
    [ + 3 Red Potions! ]</div>";

        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET currency = currency + 100");
        // $results = $link->query("UPDATE $user SET xp = xp + 100");
        // $results = $link->query("UPDATE $user SET arrows = arrows + 50");
        // $results = $link->query("UPDATE $user SET leather = leather + 10");
        // $results = $link->query("UPDATE $user SET redpotion = redpotion + 3");
        // $results = $link->query("UPDATE $user SET quest10 = 2");

        $updates = [ // -- set changes
            'quest10' => 2,
            'xp' => $xp + 100,
            'currency' => $currency + 100,
            'arrows' => $arrows + 50,
            'leather' => $leather + 10,
            'redpotion' => $redpotion + 3
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($quest10 == 1) {
        echo $message="<div class='menuAction'><strong class='green'>Quest 10 Not Complete</strong><br>You need to craft a single piece of Leather Equipment. Go north to harvest leather from Freddie's cows and then craft some equipment.</div>";
        include('update_feed.php'); // --- update feed
    }
}



    
elseif ($input=='get hammer') {
    if ($hammer >= 1) {
        echo 'You already have a hammer. If you lose it come back here for another free one<br>';
        $message="<i>You already have a hammer. If you lose it come back here for another one.</i><br>";
        include('update_feed.php'); // --- update feed
    } else {
        echo 'You pick up a hammer and put it in your inventory<br>';
        $message="You pick up a hammer and put it in your inventory<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET hammer = hammer + 1");
        $updates = [ // -- set changes
            'hammer' => $hammer + 1
        ];
        updateStats($link, $username, $updates); // -- apply changes

    }
} elseif ($input == 'pay toll') {
    if ($currency < 50) {
        echo $message="<div class='menuAction'>You don't have 50 $currency to pay the toll.</div>";
        include('update_feed.php'); // --- update feed
    } elseif ($_SESSION['cowtoll'] == 1) {
        echo $message="<div class='menuAction'>You already paid the toll. Go north and get yourself some leather.</div>";
        include('update_feed.php'); // --- update feed
    } else {
        echo $message="<div class='menuAction'>You give Freddie 50 $currency. You can now enter the Cow Farm!</div>";
        include('update_feed.php'); // --- update feed
        // $query = $link->query("UPDATE $user SET currency = currency - 50");
        $updates = [ // -- set changes
            'currency' => $currency - 50
        ];
        updateStats($link, $username, $updates); // -- apply changes
        $_SESSION['cowtoll'] = 1;
    }
}




// -------------------------------------------------------------------------- TRAVEL
elseif ($input=='n' || $input=='north') {
    if ($_SESSION['cowtoll'] != 1) {
        echo $message='<i>You need to pay the toll of 50 '.$_SESSION['currency'].' to enter the cow farm.</i><br>';
        include('update_feed.php'); // --- update feed
    } else {
        echo 'You travel north and enter the Cow Farm<br>';
        $message="<i>You travel north and enter the Cow Farm</i><br>".$_SESSION['desc103b'];
        include('update_feed.php'); // --- update feed
// $results = $link->query("UPDATE $user SET room = '103b'"); // -- room change
//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
        $updates = ['endfight' => 0, 'room' => '103b' ]; // -- room change
        updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['cowtoll'] = 0;
    }
    } 
// elseif ($input=='s' || $input=='south') {
//     echo 'You travel south<br>';
//     $message="<i>You travel south</i><br>".$_SESSION['desc102'];
//     include('update_feed.php'); // --- update feed
// $results = $link->query("UPDATE $user SET room = 102"); // -- room change
// $_SESSION['cowtoll'] = 0;
// }
elseif ($input == 'south') {    
    $roomNum = '102';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');
    $_SESSION['cowtoll'] = 0;
} 

// ----------------------------------- end of room function
include('function-end.php');
// }
