<?php


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


// -------------------------------------------------------------------------- BATTLE VARIABLES
    $infight = $row['infight'];
    $endfight = $row['endfight'];
    $enemy=$row['enemy'];


    // -------------------------------------------------------------------------- After Battle - SAFE ROOM
    if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
        $input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
        $input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
        $input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
        $input!='u' && $input!='up' && $input!='d' && $input!='down') {
        echo "This room is safe.<br>";
    }
    // -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1) {  // -UNDER OCEAN RAND GENERATOR
        $rand = rand(1, 10);
} else {
    $rand=0;
}
    // -------------------------------------------------------------------------- INITIALIZE 4/10
    if (($rand == 1) && $infight==0 && $endfight==0) {
        // $results = $link->query("UPDATE $user SET enemy = 'Blue Frog'");
        updateStats($link, $username,['enemy' => 'Blue Frog' ]); // -- set enemy
        include('battle.php');
    } // - 1/10
    elseif (($rand == 2) && $infight==0 && $endfight==0) {
        // $results = $link->query("UPDATE $user SET enemy = 'Mithril Gator'");
        updateStats($link, $username,['enemy' => 'Mithril Gator' ]); // -- set enemy
        include('battle.php');
    } elseif (($rand == 3) && $infight==0 && $endfight==0) {
        // $results = $link->query("UPDATE $user SET enemy = 'Mithril Golem'");
        updateStats($link, $username,['enemy' => 'Mithril Golem' ]); // -- set enemy
        include('battle.php');
    } elseif (($rand == 4) && $infight==0 && $endfight==0) {
        $rand2 = rand(1, 5);
        if ($rand2 == 1) {
            // $results = $link->query("UPDATE $user SET enemy = 'Mithril Rat'");
            updateStats($link, $username,['enemy' => 'Mithril Rat' ]); // -- set enemy
            include('battle.php');
        } // - 1/
        if ($rand2 == 2) {
            // $results = $link->query("UPDATE $user SET enemy = 'Mithril Crab'");
            updateStats($link, $username,['enemy' => 'Mithril Crab' ]); // -- set enemy
            include('battle.php');
        } //
        if ($rand2 == 3) {
            // $results = $link->query("UPDATE $user SET enemy = 'Mithril Scorpion'");
            updateStats($link, $username,['enemy' => 'Mithril Scorpion' ]); // -- set enemy
            include('battle.php');
        } // - 1/
        if ($rand2 == 4) {
            // $results = $link->query("UPDATE $user SET enemy = 'Cosmic Mage'");
            updateStats($link, $username,['enemy' => 'Cosmic Mage' ]); // -- set enemy
            include('battle.php');
        } // - 1/
        if ($rand2 == 5) {
            // $results = $link->query("UPDATE $user SET enemy = 'Carbon Beast'");
            updateStats($link, $username,['enemy' => 'Carbon Beast' ]); // -- set enemy
            include('battle.php');
        } // - 1/
    }
    // -------------------------------------------------------------------------- IN BATTLE

    elseif ($infight >=1) {
        include('battle.php');
    }
// // } // ---end while
