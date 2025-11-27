<?php
                $roomname = "Above the Scorpion Pit";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc012'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5"; // danger level


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


$infight = $row['infight'];
$endfight = $row['endfight'];

$mace=$row['mace'];


if ($input == 'search') // ----------- SEARCH Mace
{
	$rand = rand (1,2); 			//		50%
	if ($mace >= 1) {
		echo $message="<i>You find another Mace, but you only need one, so you leave it for the next adventurer.</i><br>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($rand == 1) {
			echo $message="You search the Spider Cave and find a Mace!<br> [ + 1 MACE ]<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET mace = mace + 1");
            updateStats($link, $username, ['mace' => 1]); // -- update stats
	}
	else {
		echo $message="You search the Spider Cave and think you see something shiny in rubble, you should search again.<br>";
		include ('update_feed.php'); // --- update feed
	}
	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}


    // -------------------------------------------------------------------------- After Battle - SAFE ROOM
    if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
        $input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
        $input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
        $input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
        $input!='u' && $input!='up' && $input!='d' && $input!='down') {
        echo "This room is safe.<br>";
    }
    // -------------------------------------------------------------------------- If room ready create random rand #
    if ($infight < 1 && $endfight != 1 && $input!='attack alpha scorpion' && $input!='attack giant spider' && $input!='attack' && $input!='a') {
        $rand = rand(1, 10);
    } else {
        $rand=0;
    }
    // -------------------------------------------------------------------------- After Battle - SAFE ROOM
    if ($endfight == 1 && $input != 'sw') {
        echo "This room is safe.<br>";
    }
    // -------------------------------------------------------------------------- INITIALIZE ALPHA	2/10
    elseif (($input=='attack alpha scorpion' || $rand >= 8) && $infight==0 && $endfight==0) {
        if ($input=='attack alpha scorpion') {
            $input = 'attack';
        }
        // $results = $link->query("UPDATE $user SET enemy = 'Alpha Scorpion'");
        updateStats($link, $username, ['enemy' => 'Alpha Scorpion']); // -- update stats
        include('battle.php');
    }
    // -------------------------------------------------------------------------- INITIALIZE giant spider	2/10
    elseif (($input=='attack giant spider' || $rand <= 2) && $infight==0 && $endfight==0) {
        if ($input=='attack giant spider') {
            $input = 'attack';
        }
        // $results = $link->query("UPDATE $user SET enemy = 'Giant Spider'");
        updateStats($link, $username, ['enemy' => 'Giant Spider']); // -- update stats
        include('battle.php');
    }

    // -------------------------------------------------------------------------- IN BATTLE
    elseif ($infight >=1) {
        if ($input=='attack alpha scorpion' || $input=='attack giant spider') {
            $input = 'attack';
        }
        include('battle.php');
    }












    










    // -------------------------------------------------------------------------- READ SIGN!
if ($input=='read sign') {  //read sign
   echo	 '<i>You read the Scorpion Pit Entrance sign</i><br>';

    $message="
   <i>you read the sign:</i>
   <div class='sign'>
   <span class='red h3'>Scorpion Pit </span>
   <span class='h4'>Entrance</span><br>
---------------------------------------------------<br>
VERY dangerous scorpions live below. <br>
---------------------------------------------------<br>
You will need to be prepared if you wish to reach the end and defeat the <span class='red'> Scorpion King!</span><br>
---------------------------------------------------
</div>
";
    include('update_feed.php'); // --- update feed
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


elseif ($input == 'west') {     $roomNum = '011';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'southwest') { $roomNum = '010';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'northwest') { 
    echo 'You find a secret path and make your way to the dirt road<br>';
    $message="<i>You find a secret path and make your way to the dirt road</i><br>".$_SESSION['desc022'];
    include('update_feed.php'); // --- update feed
    updateStats($link, $username, ['endfight' => 0]); // -- update stats
    updateStats($link, $username, ['room' => '022']); // -- update stats
    // $results = $link->query("UPDATE $user SET room = '022'"); // -- room change
} 
elseif ($input == 'down') {     
    echo 'You travel down further into the scorpion pit<br>';
    $message="<i>You travel down further into the scorpion pit</i><br>".$_SESSION['desc012b'];
    include('update_feed.php'); // --- update feed
//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
     updateStats($link, $username, ['endfight' => 0]); // -- update stats
     updateStats($link, $username, ['room' => '012b']); // -- update stats

// $results = $link->query("UPDATE $user SET room = '012b'"); // -- room change
}


    // // -------------------------------------------------------------------------- TRAVEL
    // elseif ($input=='sw' || $input=='southwest') {
    //     echo 'You travel southwest<br>';
    //     $message="<i>You travel southwest</i><br>".$_SESSION['desc010'];
    //     include('update_feed.php'); // --- update feed
    // //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // $results = $link->query("UPDATE $user SET room = '010'"); // -- room change
    // } elseif ($input=='w' || $input=='west') {
    //     echo 'You travel west<br>';
    //     $message="<i>You travel west</i><br>".$_SESSION['desc011'];
    //     include('update_feed.php'); // --- update feed
    // //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // $results = $link->query("UPDATE $user SET room = '011'"); // -- room change
    // } elseif ($input=='d' || $input=='down') {
    //     echo 'You travel down further into the scorpion pit<br>';
    //     $message="<i>You travel down further into the scorpion pit</i><br>".$_SESSION['desc012b'];
    //     include('update_feed.php'); // --- update feed
    // //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // $results = $link->query("UPDATE $user SET room = '012b'"); // -- room change
    // }

    // // -- NW SECRET
    // elseif ($input=='nw' || $input=='northwest') {
    //     echo 'You find a secret path and make your way to the dirt road<br>';
    //     $message="<i>You find a secret path and make your way to the dirt road</i><br>".$_SESSION['desc022'];
    //     include('update_feed.php'); // --- update feed
    // //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	// 	 updateStats($link, $username, ['endfight' => 0]); // -- update stats
    // $results = $link->query("UPDATE $user SET room = '022'"); // -- room change
    // }


    // ----------------------------------- end of room function
    include('function-end.php');
// }
