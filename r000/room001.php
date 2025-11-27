<?php

// -- 001 -- Grassy Field Crossroads
$roomname = "Grassy Field Crossroads";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc001'];

// Fetch room description dynamically (if stored in the database or configuration)
//$lookdesc = $_SESSION['lookdesc'] = "You are standing in the middle of a grassy field. Paths lead in all directions.";

include('function-start.php');

// -------------------------DB CONNECT!
//include('db-connect.php');

// -------------------------DB QUERY!
// $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
// if (!$stmt) {
//     error_log('Database prepare failed: ' . $link->error);
//     die('An error occurred. Please try again later.');
// }
// $stmt->bind_param("s", $_SESSION['username']);
// $stmt->execute();
// $result = $stmt->get_result();

// if ($result->num_rows === 0) {
//     die('User not found.');
// }

// $row = $result->fetch_assoc();

// $row = getKLData($link, $username); // --- gets all Kill List data from database

$row = getUserData($link, $_SESSION['username']); // --- gets all user data from database

// Assign variables
$teleport1 = $row['teleport1'];
$pajamashamanFlag = $row['pajamashamanFlag'];

// Assign variables - chest 1
$xp = $row['xp'];
$currency = $row['currency'];
$redpotion = $row['redpotion'];
$cookedmeat = $row['cookedmeat'];
$boomerang = $row['boomerang'];
$glowingbrace = $row['glowingbrace'];
$goldkey = $row['goldkey'];
$chest1 = $row['chest1'];


// -------------------------------------------------------------------------- Activate Grassy Field Teleport
if ($teleport1 == 0) {
    // $stmt = $link->prepare("UPDATE users SET teleport1 = 1 WHERE username = ?");
    // $stmt->bind_param("s", $_SESSION['username']);
    // $stmt->execute();

    $updates = [ // -- set changes
        'teleport1' => 1
    ];
    updateStats($link, $username, $updates); // -- apply changes
    echo $message = "<h5>You can now teleport to the Grassy Field!</h5>
    <p> Go to the <strong class='blue'>WORLD</strong> tab and click <strong class='green'>GRASSY FIELD</strong> to teleport to this location at any time.</p><br>";
    include('update_feed_alt.php'); // --- update feed
}


if ($input == 'help') {
    echo 'help info<br>';
    $message = "<i>Hey there {$_SESSION['username']}. Right now you are standing in the middle of a grassy field and can run off in any direction you like.<br><br>
    Explore the area but know you can't get too far without first talking to the Old Man and Young Soldier to the southwest. Go visit them and do what they ask. You will then get the key necessary to open this chest, which is needed to talk to Jack.<br><br>
    Feel free to explore the area as much as you like. There is no time limit and you can take a break and return back at any time.</i><br>";
    include('update_feed.php'); // --- update feed
} elseif ($input == 'ex sign') {
    echo 'You examine the sign.<br>';
    $message = "<i>You examine the sign:</i><br />The sign is made of wood.<br>";
    include('update_feed.php'); // --- update feed
} elseif ($input == 'read sign') {
    echo '<i>You read the Grassy Field Directory</i> <br>';
    $message = "
    <i>You read the sign:</i>
    <div class='sign'>
    <h3>Grassy Field <span class='gold'>Directory</span></h3>
    <form id='mainForm' method='post' action='' name='formInput'>
    <div class='flex'>
    <div><p class=''>Healing Waterfall</p><input type='submit' name='input1' class='blueBG' value='northwest' /></div>
    <div><p class=''>Shaman Tent</p><input type='submit' name='input1' class='purpleBG' value='northeast' /></div>
    <div><p class=''>Beach</p><input type='submit' name='input1' class='sandBG' value='west' /></div>
    <div><p class=''>Wood Cabin</p><input type='submit' name='input1' class='greenBG' value='southwest' /></div>
    </div>
    --------------------------<br>
    <p>Visit the <span class=''>OLD MAN</span> at the cabin to start your first quest.</p>
    --------------------------
    </form>
    </div>";
    include('update_feed.php'); // --- update feed
}

// -------------------------------------------------------------------------- CHEST ACTIONS
elseif ($input == 'ex chest') {
    echo 'You examine the chest.<br>';
    $message = "<p><i>You examine the chest:</i></p><p>The chest is made of solid gold and is shut tight. Looks like you need a key.</p>";
    include('update_feed.php'); // --- update feed
} elseif ($input == 'open chest' || $input == 'unlock chest') {
    if ($chest1 >= 1) {
        echo 'You already opened this gold chest. Remember that sweet boomerang?<br>';
        $message = "<i>You already opened this gold chest. Remember that sweet boomerang?</i>";
        include('update_feed.php'); // --- update feed
    } elseif ($chest1 == 0 && $goldkey <= 0) {
        echo $message = "<i>You need a Gold Key to open this chest. You can get one by completing the Young Soldier's quest. You can find him by going southwest and then west.</i><br>";
        include('update_feed.php'); // --- update feed
    } elseif ($chest1 == 0 && $goldkey >= 1) {
        echo 'You use your golden key to open the chest!<br>';
        $message = "You use your golden key to open the chest!<br>";
        include('update_feed.php'); // --- update feed
        $currency = rand(100, 200);

        $message = "<i>the chest contains:</i>
        <div class='goldchestopen'>
        <h3>Grassy Field</h3>
        <h3>Gold Chest</h3> 
        <p>+ 50 XP</p>
        <p>+ $currency $currency</p>
        <p>+ 3 Red Potions</p>
        <p>+ 5 Cooked Meat</p>
        <p>+ Glowing Brace! <span class='h6'>(+1 mag)</span></p>
        <p class='h4'>+ Boomerang! <span class='h6'>(+3 dex)</span></p>
        </div>";
        include('update_feed.php'); // --- update feed

        // $stmt = $link->prepare("UPDATE users SET xp = xp + 50, currency = currency + ?, redpotion = redpotion + 3, cookedmeat = cookedmeat + 3, boomerang = boomerang + 1, glowingbrace = glowingbrace + 1, chest1 = 1, goldkey = goldkey - 1 WHERE username = ?");
        // $stmt->bind_param("is", $currency, $_SESSION['username']);
        // $stmt->execute();

        $updates = [ // -- set changes
            'xp' => $xp + 50,
            'currency' => $currency + $currency,
            'redpotion' => $redpotion + 3,
            'cookedmeat' => $cookedmeat + 5,
            'boomerang' => $boomerang + 1,
            'glowingbrace' => $glowingbrace + 1,
            'chest1' => 1,
            'goldkey' => $goldkey - 1
        ];
        updateStats($link, $username, $updates); // -- apply changes
    }
}
elseif ($input == 'reset chest') {
    // $results = $link->query("UPDATE $user SET chest1 = 0");
    // $results = $link->query("UPDATE $user SET goldkey = 1");
    $message = "You reset this chest and get an extra key (for texting purposes, [wink])!<br>";
    include('update_feed.php'); // --- update feed
    $updates = [ // -- set changes
        'chest1' => 0,
        'goldkey' => $goldkey + 1
    ];
    updateStats($link, $username, $updates); // -- apply changes
}


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '005';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'east') {     $roomNum = '006';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'south') {    $roomNum = '002';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'west') {     $roomNum = '004';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'southeast') { $roomNum = '007';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'southwest') { $roomNum = '003';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'northwest') { $roomNum = '020';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');} 

elseif ($input == 'ne' || $input == 'northeast') {
    // --- toggle pajama shaman flag for first time entering
    if ($pajamashamanFlag==0) {
        echo  $message = "<div class='menuAction'>
        The Pajama Shaman can teach you Magic! You can now learn the <em class='red'>FIREBALL</em> and <em class='green'>HEAL</em> spell!</span></div> ";
        include('update_feed.php'); // --- update feed
        updateStats($link, $username,['pajamashamanFlag' => 1 ]); // -- update  
    }
    handleTravel($_SESSION['username'], $link, 'northeast', '021', 'desc021');
}
elseif ($input == 'down' || $input == 'd') {
    echo 'You magically enter Room Zero<br>';
    $message = "<i>You magically enter Room Zero</i><br>" . $_SESSION['desc000'];
    include('update_feed.php'); // --- update feed
    $updates = ['endfight' => 0, 'room' => '000' ]; // -- room change
    updateStats($link, $username, $updates); // -- apply changes
}

// ----------------------------------- end of room function
include('function-end.php');






if (1==2) {
// -------------------------------------------------------------------------- TEMPLATES!!!!! - COPY THIS TO OTHER ROOMS
// -------------------------------------------------------------------------- TEMPLATES!!!!! - COPY THIS TO OTHER ROOMS
// -------------------------------------------------------------------------- TEMPLATES!!!!! - COPY THIS TO OTHER ROOMS
// -------------------------------------------------------------------------- TEMPLATES!!!!! - COPY THIS TO OTHER ROOMS
// -------------------------------------------------------------------------- TEMPLATES!!!!! - COPY THIS TO OTHER ROOMS
if (1==2) {

    $updates = [ // -- set changes
        'hp' => $hpmax + 100,
        'mp' => $mpmax + 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes


    // ".$_SESSION['currency']."

    updateStats($link, $username, ['currency' => $currency - 250, 'meatball' => $meatball + 1]); // -- apply changes


    $updates = [ // -- set changes
        'quest7' => 1,
        'quest8' => 1,
        'quest9' => 1
    ]; 
    updateStats($link, $username, $updates); // -- apply changes

    $updates = [ // -- set changes
        'quest7' => 2,
        'xp' => $xp + 50,
        'currency' => $currency + 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes


    $updates = [ // -- set changes
        'chest1' => 0,
        'goldkey' => $goldkey + 1
    ];
    updateStats($link, $username, $updates); // -- apply changes


    updateStats($link, $username,['currency' => $currency + $qty ]); // -- update stat 

    updateStats($link, $username,['pajamashamanFlag' => 1 ]); // -- update stat 

    updateStats($link, $username,['enemy' => 'Rat' ]); // -- set enemy 


    $updates = ['endfight' => 0, 'room' => '000' ]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes


    updateStats($link, $username,['endfight' => 0, 'room' => '400' ]); // -- update stats


}




// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {    $roomNum = '000';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'east') {     $roomNum = '000';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'south') {    $roomNum = '000';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'west') {     $roomNum = '000';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northeast') { $roomNum = '000';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southeast') { $roomNum = '000';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'southwest') { $roomNum = '000';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'northwest') { $roomNum = '000';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');}

elseif ($input == 'up') {       $roomNum = '000';handleTravel($_SESSION['username'], $link, 'up', $roomNum, 'desc'.$roomNum.'');}
elseif ($input == 'down') {     $roomNum = '000';handleTravel($_SESSION['username'], $link, 'down', $roomNum, 'desc'.$roomNum.'');}

} // -------------------------------------------------------------------------- END TRAVEL TEMPLATE







?>