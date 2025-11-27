<?php
$funflag=0;
// -------------------------DB CONNECT!
include('db-connect.php');
// -------------------------DB QUERY!
$stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
if (!$stmt) {
    die('Prepare failed: ' . $link->error);
}
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<p>NO ROW RESULTS!!! IS THIS SOMETHING????? REMOVE THIS IF IT NEVER POPS UP</p>";
    header("Location: login.php");
    exit;
}



// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {
    $infight = $row['infight'];
    $endfight = $row['endfight'];
    $retreatroom = $_SESSION['retreatroom'];
    $feed = $row['feed'];
    $feedclear = $row['feedclear'];
    $feedcounter = $row['feedcounter'];
    $level = $_SESSION['level'] = $row['level'];


    include('cost.php');
    include('function-daily.php');

    include('function-equip.php');
    include('function-equip-max.php');
    include('function-magic.php');
    include('function-teleport.php');
    include('function-craft.php');
    include('function-heal.php');
    include('function-cheats.php');
    include('function-transform.php');
//    include('function-help.php');
    include('function-sell.php');
    include('skills-learn.php');
    include('spells-learn.php');




    
    // --------------------------------------------------------------------------- LOOK!
    if ($input=='look' || $input=='l' || $input=='look around' || $input=='+') {
        $message = '<i>You look around: '.$roomname.'</i>'.$_SESSION['lookdesc']; //$lookdesc
        echo '<i>You look around: <span class="gold">'.$roomname.'</span></i><br>';
        include('update_feed.php'); // --- update feed
    }
    // --------------------------------------------------------------------------- VIEW USER CARD
    elseif (strpos($input, 'view ') === 0) {
        $viewedUsername = trim(substr($input, 5));
            echo $message="You view $viewedUsername's player card:<br>";
            include('update_feed.php'); // --- update feed
        displayUserCard($link, $viewedUsername, $_SESSION['username']);
        $funflag=1;
    }
    // --------------------------------------------------------------------------- REST HEAL
    elseif ($input=="rest") {
        $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
        if (!$stmt) {
            die('Prepare failed: ' . $link->error);
        }
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        // -------------------------DB OUTPUT!
        while ($row = $result->fetch_assoc()) {
            $hpmax=$row['hpmax'];
            $mpmax=$row['mpmax'];
            $physicaltraining=$row['physicaltraining'];
            $mentaltraining=$row['mentaltraining'];
            $hp=$row['hp'];
            $mp=$row['mp'];

            if ($room == '20' || $room == '005b' || $room == '225b' || $room == '226d' || $room == '225' || $room == '226' || $room == '232x' || $room == '210' || $room == '118' || $room == '307' || $room == '413' || $room == '497' || $room == '308a'|| $room == '308'|| $room == '701') {
            } // bypass regular rest if resting at supercharge

            elseif ($hp >= $hpmax && $mp >= $mpmax && $infight == 0) {
                echo $message = "<i>You already have full HP and MP</i><br>";
                include('update_feed.php'); // --- update feed
      //  //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
      //  $results = $link->query("UPDATE $user SET infight = 0"); // -- reset fight

		$updates = [ // -- set changes
            'endfight' => 0,
            'infight' => 0
        ]; 
        updateStats($link, $username, $updates); // -- apply changes

        //if (($hp + $physicaltraining) >$hpmax) {$query = $link->query("UPDATE $user SET hp = $hpmax "); }
        //if (($mp + $mentaltraining) >$mpmax) {$query = $link->query("UPDATE $user SET mp = $mpmax "); }
            } elseif ($infight == 0) {
                if ($hp<$hpmax) {
                  //  $query = $link->query("UPDATE $user SET hp = hp + $physicaltraining ");
                    $updates = [ // -- set changes
                        'hp' => $hp + $physicaltraining
                    ]; 
                    updateStats($link, $username, $updates); // -- apply changes
                }
                if ($mp<$mpmax) {
                  //  $query = $link->query("UPDATE $user SET mp = mp + $mentaltraining ");
                
                    $updates = [ // -- set changes
                        'mp' => $mp + $mentaltraining
                    ]; 
                    updateStats($link, $username, $updates); // -- apply changes
                }
                echo $message = "You rest and heal $physicaltraining HP and $mentaltraining MP<br>";
                include('update_feed.php'); // --- update feed
      //  //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
      //  $results = $link->query("UPDATE $user SET infight = 0"); // -- reset fight

        $updates = [ // -- set changes
            'endfight' => 0,
            'infight' => 0
        ]; 
        updateStats($link, $username, $updates); // -- apply changes

        //if (($hp + $physicaltraining) >$hpmax) {$query = $link->query("UPDATE $user SET hp = $hpmax "); }
        //if (($mp + $mentaltraining) >$mpmax) {$query = $link->query("UPDATE $user SET mp = $mpmax "); }
            } else {
                echo $message = "You can't rest in the middle of battle!<br>";
                include('update_feed.php'); // --- update feed
            }
            $funflag=1;
        }
    } elseif (($input == 'retreat' || $input == 're')) { // ------------ YOU RETREAT
        if ($infight == 1) {
            echo $message="You RETREAT from the fight back into the previous room!<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET room = '$retreatroom'"); // run to previous room
            // $results = $link->query("UPDATE $user SET infight = '0'");
            // $results = $link->query("UPDATE $user SET endfight = '0'"); // room unsafe

            $updates = [ // -- set changes
                'room' => $retreatroom,
                'endfight' => 1,
                'infight' => 0
            ]; 
            updateStats($link, $username, $updates); // -- apply changes


        } else {
            echo $message="<i>You are not in battle. You don't need to retreat.</i><br>";
            include('update_feed.php'); // --- update feed
        }
    }

    
    // --------------------------------------------------------------------------- CLEAR FEED
    if ($input=="clear feed") {
    /*  EMAIL FOR LOGIN that works
    $to = "acarrozzo+lg@gmail.com";
    $to = "acarrozzo@gmail.com"; 
    $subject =' -TESTO  LG USER TESTOOOOOOO - '. $username;  
    $txt = '
    NEW LOGIN: '.$username.'
    ';
    mail($to,$subject,$txt);
    echo 'jolllp';
    */

        // $results = $link->query("UPDATE $user SET feedclear = feedclear + 1");
        // $results = $link->query("UPDATE $user SET feedcounter = 0");

        $updates = [ // -- set changes
            'feedclear' => $feedclear + 1,
            'feedcounter' => 0
        ]; 
        updateStats($link, $username, $updates); // -- apply changes

        $feedcounter = $row['feedcounter'];


        $to = "acarrozzo+lg@gmail.com"; 
        // $subject = $username.' - Feed Reset #'.$feedclear;
        $subject = $username.' - FEED RESET';
        $txt = '<html>
        <head>
        </head>
        <body>'.$feed.'</body>'; 
        // More headers
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    //    $headers['MIME-Version'] = 'MIME-Version: 1.0';
     //   $headers['Content-type'] = 'text/html; charset=iso-8859-1';

       mail($to,$subject,$txt,$headers);
       
    //    mail($to,$subject,$txt);

        echo 'beep. boop. you clear the feed (#'.$feedclear.') - '.$username.' <br>';
        $feed_clear = '-<br>[ Beep. Boop. Feed Reset (#'.$feedclear.') - '.$username.' ]<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br>-<br><br>You look around:'.$_SESSION['lookdesc'];
        // $query = $link->prepare("UPDATE $user SET feed = ? ");
        // $query->bind_param("s", $feed_clear);
        // $query->execute();

        $query = $link->prepare("UPDATE users SET feed = ? WHERE username = ?");
        $query->bind_param("ss", $feed_clear, $username);
        $query->execute();

        $funflag=1;

    }
    else {

       // $results = $link->query("UPDATE $user SET feedcounter = feedcounter + 1");
       $updates = [ // -- set changes
        'feedcounter' => $feedcounter + 1
    ]; 
    updateStats($link, $username, $updates); // -- apply changes

    }





        
       // echo 'feed counter:'.$feedcounter.'<br>';
        if ($feedcounter>=200 && ($feedcounter % 20 == 0)) {
            echo $message ='You should clear your feed to improve performace and load time. <br>
            <form id="mainForm" method="post" action="" name="formInput">
            <input class="greenBG" type="submit" name="input1" value="clear feed" />
            </form>
              ';
            include('update_feed.php'); // --- update feed ALT
        }



    // --------------------------------------------------------------------------- reset fight variables
    elseif ($input=="reset fight") {
        // $results = $link->query("UPDATE $user SET infight = '0'");
        // $results = $link->query("UPDATE $user SET endfight = '0'");

        $updates = [ // -- set changes
            'endfight' => 0,
            'infight' => 0
        ]; 

        $funflag=1;
    }
    // --------------------------------------------------------------------------- TURN HINTS ON
    elseif ($input=="turn hints on") {
        echo 'You turn on hints and tips <br>';
        $message ='<br><i>You turn on hints and tips</i><br>';
        include('update_feed.php'); // --- update feed ALT
        $funflag=1;
        $_SESSION['hints']=1;
    } elseif ($input=="turn hints off") {
        echo 'You turn off hints and tips <br>';
        $message ='<br><i>You turn off hints and tips</i><br>';
        include('update_feed.php'); // --- update feed ALT
        $funflag=1;
        $_SESSION['hints']=2;
    }
    // --------------------------------------------------------------------------- VIEW MAPS!
    elseif ($input=="view room zero map") {
        echo 'You view the room zero map<br>';
        $message ='<br><i>You view the room zero map:</i><br>
	<a title="Forest" target="_blank" rel="map" href="img/lightgray_map_roomzero.jpg">
	<img class="mapimage" width="350" height="350" alt="View Map"  src="img/lightgray_map_roomzero.jpg"><br>click to open map in new window and view full size
	</a><br>';
        include('update_feed_alt.php'); // --- update feed ALT
        $funflag=1;
    } elseif ($input=="view grassy field map") {
        echo 'You view the grassy field map<br>';
        $message ='<br><i>You view the grassy field map:</i><br>
	<a title="Grassy Field Map" target="_blank" rel="map" href="img/lightgray_map_grassyfield_main.jpg" class="fancybox">
	<img class="mapimage" width="350" height="350" alt="View Map"  src="img/lightgray_map_grassyfield_main.jpg"><br>click to open map in new window and view full size
	</a><br>';
        include('update_feed_alt.php'); // --- update feed ALT
        $funflag=1;
    } elseif ($input=="view grassy field underground map") {
        echo 'You view the grassy field map<br>';
        $message ='<br><i>You view the grassy field underground map:</i><br>
	<a target="_blank" rel="map" href="img/lightgray_map_grassyfield_underground.jpg" class="fancybox">
	<img class="mapimage" width="350" height="350" alt="View Map"  src="img/lightgray_map_grassyfield_underground.jpg"><br>click to open map in new window and view full size
	</a><br>';
        include('update_feed_alt.php'); // --- update feed ALT
        $funflag=1;
    } elseif ($input=="view forest map") {
        echo 'You view the forest map<br>';
        $message ='<br><i>You view the forest map:</i><br>
	<a title="Forest" target="_blank" rel="map" href="img/lightgray_map_forest_main.jpg">
	<img class="mapimage" width="350" height="350" alt="View Map"  src="img/lightgray_map_forest_main.jpg"><br>click to open map in new window and view full size
	</a><br>';
        include('update_feed_alt.php'); // --- update feed ALT
        $funflag=1;
    } elseif ($input=="view forest underground map") {
        echo 'You view the forest underground map<br>';
        $message ='<br><i>You view the forest underground map:</i><br>
	<a title="Forest" target="_blank" rel="map" href="img/lightgray_map_forest_underground.jpg">
	<img class="mapimage" width="350" height="350" alt="View Map"  src="img/lightgray_map_forest_underground.jpg"><br>click to open map in new window and view full size
	</a><br>';
        include('update_feed_alt.php'); // --- update feed ALT
        $funflag=1;
    }




    // --------------------------------------------------------------------------- NULL COMMAND / REFRESH
    elseif ($input=='') {
        echo $message = '<i>page refreshed - null command</i><br>';
        include('update_feed.php'); // --- update feed
        $funflag=1;
    }

    // --------------------------------------------------------------------------- command fun flags
    elseif ($input=='stats') {
        $funflag=1;
    }
}