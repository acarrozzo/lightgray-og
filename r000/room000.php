<?php
// -- 000 -- Room Zero
$roomname = $_SESSION['roomname'] = "Room Zero";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc000'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

//$funflag=2;

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





if ($input=='ex sign') {  //ex sign
   echo'You examine the sign.<br>';
    $message="<i>You examine the sign</i> <p>The sign is quite shiny and has a message etched into it. You can READ SIGN</p>";
    include('update_feed.php'); // --- update feed
} elseif ($input=='read signXXX') {  // ----------------------------- read sign - OLD
   echo'You read the sign.<br>';
    $message ="<i>You read the sign</i> <br />
   <p>----------------------------------------------------<br />
		Welcome to Room Zero. The light at the top of this pillar is also a button. You can EX BUTTON or PRESS BUTTON. <br />
      ----------------------------------------------------</p>";
    include('update_feed.php'); // --- update feed
}

    // -------------------------------------------------------------------------- READ SIGN!
elseif ($input=='read sign') {  //read sign
   echo	 '<i>You read the Room Zero Sign.</i><br>';

    $message="
   <i>you read the sign:</i>
   <div class='sign darkgrayBG'>
---------------------------------------------------<br>
<span class='h4 lgray'>Welcome to Room Zero.</span><br>
<span class='blue'>To look around the room you are in click LOOK. </span><br>
---------------------------------------------------<br>
When you look around you will be shown a description of the room and actions you can perform. <br>
---------------------------------------------------<br>
When you are ready to leave this room and enter the world above, you can PRESS BUTTON.<br>
---------------------------------------------------
</div>
";
    include('update_feed.php'); // --- update feed
} elseif ($input=='ex pillar') {  // ----------------------------- ex pillar
   echo'You examine the pillar.<br>';
    $message="<i>You examine the pillar</i><p>About 4 feet tall and 8 inches wide. A soft blue light emits from the top.</p>";
    include('update_feed.php'); // --- update feed
} elseif ($input=='ex button') {  //ex button
   echo'You examine the button.<br>';
    $message="<i>You examine the button</i> <p>The bright blue light emanating from the pillar seems to be a button. You should see what happens if you PRESS BUTTON.</p>";
    include('update_feed.php'); // --- update feed
} elseif ($input=='ex light') {  //ex light
   echo'You examine the light.<br>';
    $message="<i>You examine the light</i> <p>The light glows a soft blue and is perfectly square. Its surface lies flush with the top of pillar.</p>";
    include('update_feed.php'); // --- update feed
}

    // --------------------------------------------------------------------------- GET MAP
    elseif ($input=="pick up map") {
        echo 'You pick up the room zero map<br>';
        $message ='<br><h3>You pick up the Room Zero map.</h3><i>Check your MAP tab anytime to view your current map.</i><br>
	<a target="_blank" rel="map" href="img/lightgray_map_roomzero.jpg" class="fancybox">
	<img class="mapimage" width="350" height="350" alt="View Map"  src="img/lightgray_map_roomzero.jpg"><br>
	ROOM ZERO MAP: Click to open map in new window and view full size</a><br>';
        include('update_feed_alt.php'); // --- update feed ALT
        // $results = $link->query("UPDATE $user SET roomzeromap = 1");
        updateStats($link, $username,['roomzeromap' => 1 ]); // -- update stat 

    }

    // -------------------------------------------------------------------------- TRAVEL
elseif ($input=='press button') {  //press button
   echo'You press the button. Almost immediately you appear elsewhere!<br>';
    $message="<i>You press the button</i> <p>Almost immediately you appear elsewhere!</p>".$_SESSION['desc001'];
    include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET room = '001'"); // -- room change
        $updates = ['endfight' => 0, 'room' => '001' ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
} elseif ($input=='u') {  //press button
   echo'You magically appear above ground.<br>';
    $message="You magically appear above ground.</p>".$_SESSION['desc001'];
    include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET room = '001'"); // -- room change
        $updates = ['endfight' => 0, 'room' => '001' ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
}


// ----------------------------------- end of room function
include('function-end.php');
// }
