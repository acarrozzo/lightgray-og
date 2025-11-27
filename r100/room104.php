<?php
// -- 104 -- On a Stone Path by a Forest Gate
$roomname = "On a Stone Path by a Forest Gate";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc104'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1"; // danger level

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
$teleport2 = $row['teleport2'];
$KLorc=$_SESSION['KLorc']; 
$KLogre=$_SESSION['KLogre']; 
$KLkobold=$_SESSION['KLkobold']; 

$travelingwizardFlag = $row['travelingwizardFlag'];
$travelingwarriorFlag = $row['travelingwarriorFlag'];

include('battle-sets/forest-path.php');

// -------------------------------------------------------------------------- Activate Forest Path Teleport
if ($teleport2 == 0) {
    // $results = $link->query("UPDATE $user SET teleport2 = 1");
    updateStats($link, $username,['teleport2' => 1 ]); // -- update stat 
    echo $message="<i>You can now teleport to the Forest Crossroads! Click 'Forest Crossroads' to teleport to this location at any time. </i><br>";
    include('update_feed.php'); // --- update feed
}
    

// -------------------------------------------------------------------------- READ SIGN!
elseif ($input=='read sign') {  //read sign
   echo '<i>You read the Forest Path Directory</i> <br>  ';
    $message="
   <i>you read the sign:</i>
   <div class='sign darkgreenBG'>
   <h4 class=''>Forest Path </h4>
   <h3>Directory</h3>
   	<form id='mainForm' method='post' action='' name='formInput'>
    <span class='direc'><input type='submit' name='input1' value='north' /></span> <span class=''>Traveling Wizard ( Spell Trainer ) • Kobold Lair • Dark Forest • Mountains</span><br />
    <span class='direc'><input type='submit' name='input1' value='northeast' /></span> <span class=''>Forest • Hunter Bill •  Forest Gnome • Lots o' Trees</span><br />
    <span class='direc'><input type='submit' name='input1' value='west' /></span> <span class=''>Freddie's Leather Farm • Grassy Field</span> <br />
    <span class='direc'><input type='submit' name='input1' value='south' /></span> <span class=''>Traveling Warrior ( Skill Trainer ) • Ogre Lair • Red Town</span><br />
    ---------------------------------------------------<br>
    <span class='gold'>FOREST GATE</span><br>
    To gain access to the Forest, you must defeat an Orc. You can find them in the Ogre Lair southwest of here.<br>
    ---------------------------------------------------<br>
    </form></div>";
    include('update_feed.php'); // --- update feed
}


// --------------------------------------------------------------------------- PICK UP MAP
if ($input=="pick up map") {
    echo 'You pick up the forest map:<br>';
    $message ='<br><i>You pick up the forest map. Check your INV to view the map at anytime</i><br>
    <a target="_blank" rel="map" href="img/lightgray_map_forest_main.jpg" class="fancybox">
    <img class="mapimage" width="350" height="350" alt="View Map"  src="img/lightgray_map_forest_main.jpg"><br>
    click to open map in new window and view full size</a><br>';
    include('update_feed_alt.php'); // --- update feed ALT
    $results = $link->query("UPDATE $user SET forestmap = 1");
}

// -------------------------------------------------------------------------- Battle TRAVEL
elseif (($input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
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
//     $message="<i>You travel south</i><br>".$_SESSION['desc106'];
//     include('update_feed.php'); // --- update feed
//     $results = $link->query("UPDATE $user SET room = 106"); // -- room change
//     //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//     // ---------------------- SKILL FLAG! ---------------------- //
//     if ($travelingwarriorFlag==0) {
//         echo  $message = "<div class='menuAction'>You can now learn new SKILLS from the Traveling Warrior!</div> ";
//         include('update_feed.php'); // --- update feed
//         $results = $link->query("UPDATE $user SET travelingwarriorFlag = 1");
//     }
// } 
//     elseif ($input=='w' || $input=='west') {
//         echo 'You travel west<br>';
//         $message="<i>You travel west</i><br>".$_SESSION['desc102'];
//         include('update_feed.php'); // --- update feed
//     $results = $link->query("UPDATE $user SET room = 102"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
//     } 
elseif ($input=='n' || $input=='north') {
    echo 'You travel north<br>';
    $message="<i>You travel north</i><br>".$_SESSION['desc105'];
    include('update_feed.php'); // --- update feed
    // $results = $link->query("UPDATE $user SET room = 105"); // -- room change
    $updates = ['endfight' => 0, 'room' => '105' ]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes
    // ---------------------- SKILL FLAG! ---------------------- //
    if ($travelingwizardFlag==0) {
        echo  $message = "<div class='menuAction'>
        You can now learn new SPELLS from the Traveling Wizard!</div> ";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET travelingwizardFlag = 1");
        $updates = ['travelingwizardFlag' => 1 ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
} 
elseif ($input=='ne' || $input=='northeast') {
        if ($KLkobold >= 1 || $KLogre >= 1) {
            echo 'You travel northeast and enter the forest<br>';
            $message="<i>You travel northeast and enter the forest</i><br>".$_SESSION['desc116'];
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET room = 116"); // -- room change
            $updates = ['endfight' => 0, 'room' => '116' ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
            $_SESSION['emptytree'] = 0; // reset tree
        } 
        else {
        echo 'As you attempt to enter the forest you are stopped by a Red Guard.<br>';
        $message="<p>As you attempt to enter the Forest you are stopped by a Red Guard.</p>
        <h6 class='gold'> To gain access to the Forest you must defeat an Ogre or a Kobold.</h6>
        <p>You can find them in the caves to the southwest and northwest of here.</p>";
        include('update_feed.php'); // --- update feed
    }
}

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    
    $roomNum = '106';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');
    if ($travelingwarriorFlag==0) {
        echo  $message = "<div class='menuAction'>You can now learn new SKILLS from the Traveling Warrior!</div> ";
        include('update_feed.php'); // --- update feed
        $results = $link->query("UPDATE $user SET travelingwarriorFlag = 1");
    }
} 
elseif ($input == 'west') {     $roomNum = '102';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');} 


// ----------------------------------- end of room function
include('function-end.php');
// }
