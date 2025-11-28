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
    $level = $row['level'];
    $nxlevel = $level + 1;
    $xp = $row['xp'];


    // --- EASY ORIGINAL LEVELING
    $nextlevel = ($level+1) * ($level+1) * ($level+1);
    $prevlevel = $level * $level * $level;

    // --- DOUBLE ORIGINAL LEVELING
    $nextlevel = (($level+1) * ($level+1) * ($level+1))*2;
    $prevlevel = ($level * $level * $level)*2;

   // $nextlevel = ($level+1) * ($level+1) * ($level+1) * ($level+1); // activate for hard / slow leveling // TOO SLOW
   // $prevlevel = $level * $level * $level * $level; // activate for hard / slow leveling // TOO SLOW

    $num_total = $nextlevel - $prevlevel;
    $num_xp = $xp - $prevlevel;
    $need = $nextlevel - $xp;

    $count1 = $num_xp / $num_total;
    $count2 = $count1 * 100;
    $count = number_format($count2, 0);

    $enemy=$row['enemy']; // if enemy hasent been established yet

    // --------------------------------------------------------------------------- STATS!
    if ($input=='stats' || $input=='xp') {
        $message = $username.'<span> Stats</span>
				Level '.$level.'<br />
				You are '.$count.'% to the next level<br />
				You have '.$xp.' xp.<br />
				Next level at '.$nextlevel.' xp<br />
				You need '.$need.' xp to get to level '.$nxlevel.'<br />';
        echo 'You check your stats<br>';
        include('update_feed.php'); // --- update feed
        $funflag=1;
    }


    // // // ---- FOR DEBUGGING
    // $updates = [ // -- set changes
    //     'level' => 0
    // ]; 
    // updateStats($link, $username, $updates); // -- apply changes
    // --------------------------------------------------------------------------- LEVEL!
    if ($xp >= $nextlevel) {
      //  $query = $link->query("UPDATE $user SET level = level + 1 ");

        $updates = [ // -- set changes
            'level' => $level + 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes

        // -------------------------DB QUERY!
        $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $_SESSION['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        if (!$result) {
            die('There was an error running the query [' . $link->error . ']');
        }
        // -------------------------DB OUTPUT!
        while ($row = $result->fetch_assoc()) {
            $level = $row['level'];
            $xp = $row['xp'];
            $hp = $row['hpmax'];
            $mp = $row['mpmax'];
            $cp = $row['cp'];
            $tp = $row['tp'];
            $sp = $row['sp'];
            $physicaltraining = $row['physicaltraining'];
            $mentaltraining = $row['mentaltraining'];

            $rand = rand(1, $physicaltraining);
            $hpAdd = $rand; //hp gained
            $hpAdd = $physicaltraining; //hp gained
            $hpAdd = 1 + $physicaltraining*2; //hp gained X2
            $rand = rand(1, $mentaltraining);
            $mpAdd = $rand; //mp gained
            $mpAdd = $mentaltraining; //mp gained
            $mpAdd = 1 + $mentaltraining * 2; //mp gained X2
            // -------------------- POINTS GAINED            
            $cpAdd =  1; // core points gained
            $tpAdd =  1; // training points gained
            $spAdd = $level; // skill points gained equal to new level
            if ($level > 20) { $spAdd = 20; } // if level is more than 20, sp is maxed at 20

            // -------------------- SUPER GENEROUS SP
            //$rand = rand(10,20);
            //$sp =  $level + $rand;
            //if ($sp < 15) {$sp = rand (15,20);} // for low level SP, min 15

            $nextlevel = ($level+1) * ($level+1) * ($level+1);
            $prevlevel = $level * $level * $level;
            $num_total = $nextlevel - $prevlevel;
            $num_xp = $xp - $prevlevel;
            $count1 = $num_xp / $num_total;
            $count2 = $count1 * 100;
            $count = number_format($count2, 0);


            // +'.$hp.' HP
            // +'.$mp.' MP<br>
            // +'.$cp.' CP
            // +'.$tp.' TP
            // +'.$sp.' SP

            $message = '<div class="levelWin">
            <h1>LEVEL UP!</h1>
            <h3 class="yellow">You are now level '.$level.'</h3>
            <h6>+'.$hpAdd.' HP</h6>
            <h6>+'.$mpAdd.' MP</h6>
            <h6>+'.$cpAdd.' Core Point</h6>
            <h6>+'.$tpAdd.' Training Point</h6>
            <h6>+'.$spAdd.' Skill Points</h6>
            </h3>
            <a class="btn ddgray yellowBG" href="" data-link2="training">Training &gt;</a>
            <a class="btn white purpleBG" href="" data-link="stats">Stats &gt;</a>
            <a class="btn white purpleBG" href="" data-link2="skills">Skills &gt;</a>
            <a class="btn white purpleBG" href="" data-link2="spells">Spells &gt;</a>
            </div>';

            echo "<div class='menuAction'><p> YOU ARE NOW LEVEL $level!</p>
            <p>
            +$hpAdd HP 
            +$mpAdd MP 
            +$cpAdd CP 
            +$tpAdd TP 
            +$spAdd SP 
            </p>
            </div>
            ";

            include('update_feed_alt.php'); // --- update feed

            // $query = $link->query("UPDATE $user SET hpmax = hpmax + $hpAdd ");
            // $query = $link->query("UPDATE $user SET mpmax = mpmax + $mpAdd ");
            // $query = $link->query("UPDATE $user SET cp = cp + $cpAdd ");
            // $query = $link->query("UPDATE $user SET tp = tp + $tpAdd ");
            // $query = $link->query("UPDATE $user SET sp = sp + $spAdd ");

            // $query = $link->query("UPDATE $user SET hp = hpmax");
            // $query = $link->query("UPDATE $user SET mp = mpmax");

            // Update user attributes for leveling up
            $updates = [
                'hpmax' => $hpmax + $hpAdd,
                'mpmax' => $mpmax + $mpAdd,
                'cp' => $cp + $cpAdd,
                'tp' => $tp + $tpAdd,
                'sp' => $sp + $spAdd,
                'hp' => $hpmax + $hpAdd, // Set current HP to new max HP
                'mp' => $mpmax + $mpAdd  // Set current MP to new max MP
            ];

            // Apply the updates
            updateStats($link, $username, $updates);

            $_SESSION['evolveAlready'] = 0; // so you can evolve again
            $message = '<div class="battlestatus">You have defeated the '.$enemy.'!<br> YOU ARE NOW LEVEL '.$level.'!</div>';
        }
    }




    // --------------------------------------------------------------------------- SPEND CP FOR STATS!
    $cp = $row['cp'];
    $str = $row['str'];
    $strincrease = $str + 1;
    $dex = $row['dex'];
    $dexincrease = $dex + 1;
    $mag = $row['mag'];
    $magincrease = $mag + 1;
    $def = $row['def'];
    $defincrease = $def + 1;

    $strincreasemax = $str + $cp;
    $dexincreasemax = $dex + $cp;
    $magincreasemax = $mag + $cp;
    $defincreasemax = $def + $cp;

    // --------------------------------------------------------------------------- SPEND CP FOR STATS!
    if ($input=='increase str' || $input=='+1 str') {
        if ($cp<1) {
            echo $message=$notenoughcp;
            include('update_feed.php');
            $funflag=1;
        } else {
            echo $message = 'You spend 1 CP and increase your STR to '.$strincrease.'<br>';
            include('update_feed.php');
            // $query = $link->query("UPDATE $user SET str = str + 1");
            // $query = $link->query("UPDATE $user SET cp = cp - 1");
            $updates = [ // -- set changes
                'str' => $str + 1,
                'cp' => $cp - 1
            ]; 
            updateStats($link, $username, $updates); // -- apply changes
            $funflag=1;
        }
    } else if ($input=='all str') {
        if ($cp<1) {
            echo $message=$notenoughcp;
            include('update_feed.php');
            $funflag=1;
        } else {
            echo $message = 'You spend '.$cp.' CP and increase your STR to '.$strincreasemax.'<br>';
            include('update_feed.php');
            // $query = $link->query("UPDATE $user SET str = str + $cp");
            // $query = $link->query("UPDATE $user SET cp = cp - $cp");
            $updates = [ // -- set changes
                'str' => $str + $cp,
                'cp' => 0
            ]; 
            updateStats($link, $username, $updates); // -- apply changes
            $funflag=1;
        }
    } 
    if ($input=='increase dex' || $input=='+1 dex') {
        if ($cp<1) {
            echo $message=$notenoughcp;
            include('update_feed.php');
            $funflag=1;
        } else {
            echo $message = 'You spend 1 CP and increase your DEX to '.$dexincrease.'<br>';
            include('update_feed.php');
            $updates = [ // -- set changes
                'dex' => $dex + 1,
                'cp' => $cp - 1
            ]; 
            updateStats($link, $username, $updates); // -- apply changes
            $funflag=1;
        }
    }

    if ($input=='all dex') {
        if ($cp<1) {
            echo $message=$notenoughcp;
            include('update_feed.php');
            $funflag=1;
        } else {
            echo $message = 'You spend '.$cp.' CP and increase your dex to '.$dexincreasemax.'<br>';
            include('update_feed.php');
            $updates = [ // -- set changes
                'dex' => $dex + $cp,
                'cp' => 0
            ]; 
            updateStats($link, $username, $updates); // -- apply changes
            $funflag=1;
        }
    } elseif ($input=='increase mag' || $input=='+1 mag') {
        if ($cp<1) {
            echo $message=$notenoughcp;
            include('update_feed.php');
            $funflag=1;
        } else {
            echo $message = 'You spend 1 CP and increase your MAG to '.$magincrease.'<br>';
            include('update_feed.php');
            $updates = [ // -- set changes
                'mag' => $mag + 1,
                'cp' => $cp - 1
            ]; 
            updateStats($link, $username, $updates); // -- apply changes
            $funflag=1;
        }
    }
    if ($input=='all mag') {
        if ($cp<1) {
            echo $message=$notenoughcp;
            include('update_feed.php');
            $funflag=1;
        } else {
            echo $message = 'You spend '.$cp.' CP and increase your mag to '.$magincreasemax.'<br>';
            include('update_feed.php');
            $updates = [ // -- set changes
                'mag' => $mag + $cp,
                'cp' => 0
            ];
            updateStats($link, $username, $updates); // -- apply changes
            $funflag=1;
        }
    } elseif ($input=='increase def' || $input=='+1 def') {
        if ($cp<1) {
            echo $message=$notenoughcp;
            include('update_feed.php');
            $funflag=1;
        } else {
            echo $message = 'You spend 1 CP and increase your DEF to '.$defincrease.'<br>';
            include('update_feed.php');
            $updates = [ // -- set changes
                'def' => $def + 1,
                'cp' => $cp - 1
            ]; 
            updateStats($link, $username, $updates); // -- apply changes
            $funflag=1;
        }
    }

    if ($input=='all def') {
        if ($cp<1) {
            echo $message=$notenoughcp;
            include('update_feed.php');
            $funflag=1;
        } else {
            echo $message = 'You spend '.$cp.' CP and increase your def to '.$defincreasemax.'<br>';
            include('update_feed.php');
            $updates = [ // -- set changes
                'def' => $def + $cp,
                'cp' => 0
            ]; 
            updateStats($link, $username, $updates); // -- apply changes
            $funflag=1;
        }
    }




// --------------------------------------------------------------------------- SPEND TP FOR TRAINING!
 /*       $tp = $row['tp'];
        $str = $row['str'];
        $strincrease = $str + 1;
        $dex = $row['dex'];
        $dexincrease = $dex + 1;
        $mag = $row['mag'];
        $magincrease = $mag + 1;
        $def = $row['def'];
        $defincrease = $def + 1;*/

     //   $tp = $row['tp'];

        $physicaltraining_new = $physicaltraining+1;
        $physicaltraining_new2 = $physicaltraining+2;
        $physicaltraining_new5 = $physicaltraining+5;
        $mentaltraining_new = $mentaltraining+1;
        $mentaltraining_new2 = $mentaltraining+2;
        $mentaltraining_new5 = $mentaltraining+5;
        
// -------------------------------------------------------------------------------Physical Training - learn
if($input=='learn physical training') 
{	
	if($tp<1) {echo $message=$notenoughtp;include ('update_feed.php');}
	else { 
		// $query = $link->query("UPDATE $user SET physicaltraining =physicaltraining + 1"); 
		// $query = $link->query("UPDATE $user SET tp = tp - 1"); 
        // $query = $link->query("UPDATE $user SET hpmax = hpmax + 10 ");
        // $query = $link->query("UPDATE $user SET hp = hpmax");

        $updates = [ // -- set changes
            'physicaltraining' => $physicaltraining + 1,
            'tp' => $tp - 1,
            'hpmax' => $hpmax + 10,
            'hp' => $hpmax + 10
        ]; 
        updateStats($link, $username, $updates); // -- apply changes

        $hpmax =  $row['hpmax']+10;
        $mpmax =  $row['mpmax'];
		echo $message = "
		<div class='menuAction'>
		<p>(You spend 1 TP)</p>
        <p><span class='h3 red'>Physical Training </span> is now level <span class='h2 red'>$physicaltraining_new</span></p>
        <p>You gain <span class='red'>10</span> Hit Points. </p>
        <p>You now have <span class='red'>$hpmax</span> HP and <span class='blue'>$mpmax</span> MP.</p>
		</div>";
		include ('update_feed.php'); // --- update feed


		}
}
if($input=='learn physical training 2') 
{	
	if($tp<2) {echo $message=$notenoughtp;include ('update_feed.php');}
	else { 
        // $query = $link->query("UPDATE $user SET physicaltraining =physicaltraining + 2"); 
		// $query = $link->query("UPDATE $user SET tp = tp - 2"); 
        // $query = $link->query("UPDATE $user SET hpmax = hpmax + 20 ");
        // $query = $link->query("UPDATE $user SET hp = hpmax");

        $updates = [ // -- set changes
            'physicaltraining' => $physicaltraining + 2,
            'tp' => $tp - 2,
            'hpmax' => $hpmax + 20,
            'hp' => $hpmax + 20
        ]; 
        updateStats($link, $username, $updates); // -- apply changes

        $hpmax =  $row['hpmax']+20;
        $mpmax =  $row['mpmax'];
    	echo $message = "
		<div class='menuAction'>
		<p>(You spend 2 TP)</p>
        <p><span class='h3 red'>Physical Training </span> is now level <span class='h2 red'>$physicaltraining_new2</span></p>
        <p>You gain <span class='red'>20</span> Hit Points.</p>
        <p>You now have <span class='red'>$hpmax</span> HP and <span class='blue'>$mpmax</span> MP.</p>
		</div>";
		include ('update_feed.php'); // --- update feed
		}
}
if($input=='learn physical training 5') 
{	
	if($tp<5) {echo $message=$notenoughtp;include ('update_feed.php');}
	else { 
		// $query = $link->query("UPDATE $user SET physicaltraining =physicaltraining + 5"); 
		// $query = $link->query("UPDATE $user SET tp = tp - 5"); 
        // $query = $link->query("UPDATE $user SET hpmax = hpmax + 50 ");
        // $query = $link->query("UPDATE $user SET hp = hpmax");

        $updates = [ // -- set changes
            'physicaltraining' => $physicaltraining + 5,
            'tp' => $tp - 5,
            'hpmax' => $hpmax + 50,
            'hp' => $hpmax + 50
        ]; 
        updateStats($link, $username, $updates); // -- apply changes

        $hpmax =  $row['hpmax']+50;
        $mpmax =  $row['mpmax'];
		echo $message = "
		<div class='menuAction'>
		<p>(You spend 5 TP)</p>
        <p><span class='h3 red'>Physical Training </span> is now level <span class='h2 red'>$physicaltraining_new5</span></p>
        <p>You gain <span class='red'>50</span> Hit Points.</p>
        <p>You now have <span class='red'>$hpmax</span> HP and <span class='blue'>$mpmax</span> MP.</p>
		</div>";
		include ('update_feed.php'); // --- update feed

		}
}

// -------------------------------------------------------------------------------Mental Training - learn
if($input=='learn mental training') 
{	
	if($tp<1) {echo $message=$notenoughtp;include ('update_feed.php');}
	else { 
		// $query = $link->query("UPDATE $user SET mentaltraining =mentaltraining + 1"); 
		// $query = $link->query("UPDATE $user SET tp = tp - 1"); 
        // $query = $link->query("UPDATE $user SET mpmax = mpmax + 10 ");
        // $query = $link->query("UPDATE $user SET mp = mpmax");

        $updates = [ // -- set changes
            'mentaltraining' => $mentaltraining + 1,
            'tp' => $tp - 1,
            'mpmax' => $mpmax + 10,
            'mp' => $mpmax + 10
        ]; 
        updateStats($link, $username, $updates); // -- apply changes

        $hpmax =  $row['hpmax'];
        $mpmax =  $row['mpmax']+10;
		echo $message = "
		<div class='menuAction'>
		<p>(You spend 1 TP)</p>
        <p><span class='h3 blue'>Mental Training </span> is now level <span class='h2 blue'>$mentaltraining_new</span></p>
        <p>You gain <span class='blue'>10</span> Magic Points.</p>
        <p>You now have <span class='red'>$hpmax</span> HP and <span class='blue'>$mpmax</span> MP.</p>
		</div>";
		include ('update_feed.php'); // --- update feed

		}
}
if($input=='learn mental training 2') 
{	
	if($tp<2) {echo $message=$notenoughtp;include ('update_feed.php');}
	else { 
		// $query = $link->query("UPDATE $user SET mentaltraining =mentaltraining + 2"); 
		// $query = $link->query("UPDATE $user SET tp = tp - 2"); 
        // $query = $link->query("UPDATE $user SET mpmax = mpmax + 20 ");
        // $query = $link->query("UPDATE $user SET mp = mpmax");

        $updates = [ // -- set changes
            'mentaltraining' => $mentaltraining + 2,
            'tp' => $tp - 2,
            'mpmax' => $mpmax + 20,
            'mp' => $mpmax + 20
        ]; 
        updateStats($link, $username, $updates); // -- apply changes


        $hpmax =  $row['hpmax'];
        $mpmax =  $row['mpmax']+20;
		echo $message = "
		<div class='menuAction'>
		<p>(You spend 2 TP)</p>
        <p><span class='h3 blue'>Mental Training </span> is now level <span class='h2 blue'>$mentaltraining_new2</span></p>
        <p>You gain <span class='blue'>20</span> Magic Points.</p>
        <p>You now have <span class='red'>$hpmax</span> HP and <span class='blue'>$mpmax</span> MP.</p>
		</div>";
		include ('update_feed.php'); // --- update feed
		}
}
if($input=='learn mental training 5') 
{	
	if($tp<5) {echo $message=$notenoughtp;include ('update_feed.php');}
	else { 
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET mentaltraining =mentaltraining + 5"); 
		// $query = $link->query("UPDATE $user SET tp = tp - 5"); 
        // $query = $link->query("UPDATE $user SET mpmax = mpmax + 50 ");
        // $query = $link->query("UPDATE $user SET mp = mpmax");

        $updates = [ // -- set changes
            'mentaltraining' => $mentaltraining + 5,
            'tp' => $tp - 5,
            'mpmax' => $mpmax + 50,
            'mp' => $mpmax + 50
        ]; 
        updateStats($link, $username, $updates); // -- apply changes

        $hpmax =  $row['hpmax'];
        $mpmax =  $row['mpmax']+50;
		echo $message = "
		<div class='menuAction'>
		<p>(You spend 5 TP)</p>
        <p><span class='h3 blue'>Mental Training </span> is now level <span class='h2 blue'>$mentaltraining_new5</span></p>
        <p>You gain <span class='blue'>50</span> Magic Points.</p>
        <p>You now have <span class='red'>$hpmax</span> HP and <span class='blue'>$mpmax</span> MP.</p>
		</div>";
		}
}

// } // -- END BIG WHILE
