<?php


include('function-randomevents.php');
include('function-die.php');
include('function-level.php');
include('function-items.php');
include('function-statuseffects.php');



// -------------------------DB CONNECT!
include('db-connect.php');

// -------------------------DB QUERY!
$sql = "SELECT fire, craftingtable, room FROM users WHERE username = ?";
$stmt = $link->prepare($sql);
if (!$stmt) {
    die('Prepare failed: ' . $link->error);
}
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();

// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {
    $fire = $row['fire'];
    $craftingtable = $row['craftingtable'];
    $room = $row['room'];

    $lastroom = $_SESSION['lastroom'];


    // -----------------------------------------------------------------------------CRAFTING TABLE AND FIRE DISPLAY!
    if (($craftingtable == $room) && ($fire == $room) && ($input == 'look' || $room != $lastroom)) {
        $message = "
        <p>A <span class='red'>Crafting Table </span> and <span class='gold'>Cooking Fire </span> is set up here</p>
        <a href data-link2='craft' class='redBG btn'>Craft & Cook</a>";
        include('update_feed_alt.php'); // --- update feed
    } elseif (($fire == $room) && ($input == 'look' || $room != $lastroom)) {
        $message = "
        <p>A <span class='red'>Cooking Fire </span> burns here</p>
        <a href data-link2='craft' class='redBG btn'>Cook</a>";
        include('update_feed_alt.php'); // --- update feed
    } elseif (($craftingtable == $room) && ($input == 'look' || $room != $lastroom)) {
        $message = "
        <p>A <span class='red'>Crafting Table </span> is set up here</p>
        <a href data-link2='craft' class='redBG btn'>Craft</a>";
        include('update_feed_alt.php'); // --- update feed
    }

    // --------------------------------------------------------------------------- function flag - DISPLAYS NOTHING
    if ($funflag==1 ||
 $input == "increase str" ||
 $input == "increase dex" ||
 $input == "increase mag" ||
 $input == "increase def" ||
 $room != $lastroom
) {
    }

    // --------------------------------------------------------------------------- SEARCH
    elseif ($input == "search") {
        if ($infight == 1000) {
            echo "You cannot search in the middle of battle.<br>";
            $message = '<i>You cannot search in the middle of battle.</i><br>';
            include('update_feed.php'); // --- update feed
        } else {
            echo "You search the room.<br>";
            $message = '<i>You search the room and find nothing.</i><br>';
            include('update_feed.php'); // --- update feed
            $stmt_reset = $link->prepare("UPDATE users SET endfight = 0 WHERE username = ?");
            $stmt_reset->bind_param("s", $_SESSION['username']);
            $stmt_reset->execute();
        }
        $funflag = 1;
    }

    // --------------------------------------------------------------------------- NO DIRECTION
    elseif (in_array($input, ['n', 'north', 'ne', 'northeast', 'e', 'east', 'se', 'southeast', 's', 'south', 'sw', 'southwest', 'w', 'west', 'nw', 'northwest', 'u', 'up', 'd', 'down'])) {
        echo $message = "<i>You don't see an exit in that direction: $input</i><br>";
        include('update_feed.php'); // --- update feed
    }

    // --------------------------------------------------------------------------- NOTHING TO ATTACK
    elseif ($input == 'attack' || $input == 'a') {
        echo $message = "<i>There is nothing here to attack.</i><br>";
        include('update_feed.php'); // --- update feed
        $stmt_reset = $link->prepare("UPDATE users SET endfight = 0 WHERE username = ?");
        $stmt_reset->bind_param("s", $_SESSION['username']);
        $stmt_reset->execute();
    }

    // --------------------------------------------------------------------------- NOT RECOGNIZED COMMAND
    else {
        echo $message = '<p class="red">' . $notcommand . ' ' . $input . '</p>';
        include('update_feed.php'); // --- update feed
    }




    // Increment clicks
    $stmt_clicks = $link->prepare("UPDATE users SET clicks = clicks + 1 WHERE username = ?");
    $stmt_clicks->bind_param("s", $_SESSION['username']);
    $stmt_clicks->execute();



}
