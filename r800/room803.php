<?php
                        $roomname = "Junk Collector";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc803'];

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


// -------------------------------------------------------------------------- BATTLE VARIABLES
    $infight = $row['infight'];
    $endfight = $row['endfight'];
    $enemy=$row['enemy'];



    $scorpiontail = $row['scorpiontail'];
    $batwing = $row['batwing'];
    $bone = $row['bone'];
    $bigfoot = $row['bigfoot'];



    if($input=='sell 20 scorpion tails') 
    {	if($scorpiontail<20) {echo $message="You don't have 20 Scorpion Tails to sell!";include ('update_feed.php');}
        else { echo $message = '<p>You sell <span class="red">20 Scorpion Tails</span> to the Junk Collector for <span class="yellow">10,000 '.$_SESSION['currency'].'!</span></p> <a class="btn goldBG active" data-link="shop">Open Shop</a>';	
            include ('update_feed.php'); // --- update feed
            $query = $link->query("UPDATE $user SET scorpiontail = scorpiontail - 20"); 
            $query = $link->query("UPDATE $user SET currency = currency + 10000"); 
            }
    }
    if($input=='sell 20 bat wings') 
    {	if($batwing<20) {echo $message="You don't have 20 Bat Wings to sell!";include ('update_feed.php');}
        else { echo $message = '<p>You sell <span class="black">20 Bat Wings</span> to the Junk Collector for <span class="yellow">10,000 '.$_SESSION['currency'].'!</span></p> <a class="btn goldBG active" data-link="shop">Open Shop</a>';	
            include ('update_feed.php'); // --- update feed
            $query = $link->query("UPDATE $user SET batwing = batwing - 20"); 
            $query = $link->query("UPDATE $user SET currency = currency + 10000"); 
            }
    }
    if($input=='sell 20 bones') 
    {	if($bone<20) {echo $message="You don't have 20 Bones to sell!";include ('update_feed.php');}
        else { echo $message = '<p>You sell <span class="white">20 Bones</span> to the Junk Collector for <span class="yellow">10,000 '.$_SESSION['currency'].'!</span></p> <a class="btn goldBG active" data-link="shop">Open Shop</a>';	
            include ('update_feed.php'); // --- update feed
            $query = $link->query("UPDATE $user SET bone = bone - 20"); 
            $query = $link->query("UPDATE $user SET currency = currency + 10000"); 
            }
    }
    if($input=='sell big foot') 
    {	if($bigfoot<1) {echo $message="You don't have a Big Foot to sell!";include ('update_feed.php');}
        else { echo $message = '<p>You sell a <span class="lightbrown"> Big Foot</span> to the Junk Collector for <span class="yellow">5,000 '.$_SESSION['currency'].'!</span></p> <a class="btn goldBG active" data-link="shop">Open Shop</a>';	
            include ('update_feed.php'); // --- update feed
            $query = $link->query("UPDATE $user SET bigfoot = bigfoot - 1"); 
            $query = $link->query("UPDATE $user SET currency = currency + 5000"); 
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
    elseif ($input=='e' || $input=='east') {
        echo 'You travel east<br>';
        $message="<i>You travel east</i><br>".$_SESSION['desc802'];
        include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET room = '802'"); // -- room change
            //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    }
    elseif ($input=='nw' || $input=='northwest') {
        echo 'You travel northwest<br>';
        $message="<i>You travel northwest</i><br>".$_SESSION['desc804'];
        include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET room = '804'"); // -- room change
            //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    }
// ----------------------------------- end of room function
include('function-end.php');
// }
