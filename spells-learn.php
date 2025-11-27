<?php
// -------------------------DB CONNECT!
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


include('skills-spells-calculator.php'); // LOAD MAX SKILL/SPELLS



// -------------------------------------------------------------------------------Magic Missile - learn
if ($input=='learn magicmissile') {
    if ($magicmissile_cost == 'max') {
        echo $message="You have MAXED out your Magic Missile spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$magicmissile_cost) {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        echo $message = "
    <div class='menuAction'>
    (You spend $magicmissile_cost SP)
    <strong class='h3 blue'>Magic Missile </strong>
    is now level
    <strong class='h2 blue'>$magicmissile_new</strong>
    </div>";
        include('update_feed.php'); // --- update feed
        // $query = $link->query("UPDATE $user SET magicmissile = magicmissile + 1");
        // $query = $link->query("UPDATE $user SET sp = sp - $magicmissile_cost");
        $updates = [ // -- set changes
            'magicmissile' => $magicmissile + 1,
            'sp' => $sp - $magicmissile_cost
        ]; 
        updateStats($link, $username, $updates); // -- apply changes 
    }
}

// -------------------------------------------------------------------------------Magic Missile - learn MAX
if ($input=='max magicmissile') {
    if ($magicmissile_cost == 'max') {
        echo $message="You have MAXED out your Magic Missile spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$magicmissile_cost && $magicmissile_cost !='max') {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        while ($magicmissile_cost <= $magicmissile_max && $magicmissile_cost <= $sp) {
            echo $message = "
            <div class='menuAction'>
            (You spend $magicmissile_cost SP)
            <strong class='h3 blue'>Magic Missile </strong>
            is now level
            <strong class='h2 blue'>$magicmissile_new</strong>
            </div>";
            include('update_feed.php'); // --- update feed
            // $query = $link->query("UPDATE $user SET magicmissile = magicmissile + 1");
            // $query = $link->query("UPDATE $user SET sp = sp - $magicmissile_cost");
            $updates = [ // -- set changes
                'magicmissile' => $magicmissile + 1,
                'sp' => $sp - $magicmissile_cost
            ]; 
            updateStats($link, $username, $updates); // -- apply changes 
            $magicmissile = $magicmissile + 1;
            $magicmissile_new = $magicmissile_new + 1;
            $sp = $sp - $magicmissile_cost;
            $magicmissile_cost = $magicmissile_cost + 1;
        }
    }
    if ($magicmissile_max == $magicmissile_new-1) {
        echo $message="<strong class='menuAction h3 blue'>Magic Missile MAX!</strong>";
        include('update_feed.php');
    } else if ($sp<$magicmissile_cost) {
        echo $message='You don\'t have enough SP!';
        include('update_feed.php');
    }
}
// -------------------------------------------------------------------------------Fireball - learn
if ($input=='learn fireball') {
    if ($fireball_cost == 'max') {
        echo $message="You have MAXED out your Fireball spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$fireball_cost) {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        echo $message = "
    <div class='menuAction'>
    (You spend $fireball_cost SP)
    <strong class='h3 red'>Fireball </strong>
    is now level
    <strong class='h2 red'>$fireball_new</strong>
    </div>";
        include('update_feed.php'); // --- update feed
        // $query = $link->query("UPDATE $user SET fireball = fireball + 1");
        // $query = $link->query("UPDATE $user SET sp = sp - $fireball_cost");
        $updates = [ // -- set changes
            'fireball' => $fireball + 1,
            'sp' => $sp - $fireball_cost
        ]; 
        updateStats($link, $username, $updates); // -- apply changes 
    }
}
// -------------------------------------------------------------------------------Fireball - learn MAX
if ($input=='max fireball') {
    if ($fireball_cost == 'max') {
        echo $message="You have MAXED out your Fireball spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$fireball_cost && $fireball_cost !='max') {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else while ($fireball_cost <= $fireball_max && $fireball_cost <= $sp) {
            echo $message = "
    <div class='menuAction'>
    (You spend $fireball_cost SP)
    <strong class='h3 red'>Fireball </strong>
    is now level
    <strong class='h2 red'>$fireball_new</strong>
    </div>";
            include('update_feed.php'); // --- update feed
            //$fireball = $row['fireball'];
            // $query = $link->query("UPDATE $user SET fireball = fireball + 1");
            // $query = $link->query("UPDATE $user SET sp = sp - $fireball_cost");
            $updates = [ // -- set changes
                'fireball' => $fireball + 1,
                'sp' => $sp - $fireball_cost
            ]; 
            updateStats($link, $username, $updates); // -- apply changes 
            $fireball = $fireball + 1;
            $fireball_new = $fireball_new + 1;
            $sp = $sp - $fireball_cost;
            $fireball_cost = $fireball_cost + 1;
    }
    if ($fireball_max == $fireball_new-1) {
        echo $message="<strong class='menuAction h3 red'>FIREBALL MAX!</strong>";
        include('update_feed.php');
    } else if ($sp<$fireball_cost) {
        echo $message='You don\'t have enough SP!';
        include('update_feed.php');
    }
}

// -------------------------------------------------------------------------------Poison Dart - learn
if ($input=='learn poison dart') {
    if ($poisondart_cost == 'max') {
        echo $message="You have MAXED out your Poison Dart spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$poisondart_cost) {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        echo $message = "
    <div class='menuAction'>
    (You spend $poisondart_cost SP)
    <strong class='h3 green'>Poison Dart </strong>
    is now level
    <strong class='h2 green'>$poisondart_new</strong>
    </div>";
        include('update_feed.php'); // --- update feed
        // $query = $link->query("UPDATE $user SET poisondart = poisondart + 1");
        // $query = $link->query("UPDATE $user SET sp = sp - $poisondart_cost");
        $updates = [ // -- set changes
            'poisondart' => $poisondart + 1,
            'sp' => $sp - $poisondart_cost
        ]; 
        updateStats($link, $username, $updates); // -- apply changes 
    }
}

// -------------------------------------------------------------------------------Poison Dart - learn MAX
if ($input=='max poison dart') {
    if ($poisondart_cost == 'max') {
        echo $message="You have MAXED out your Poison Dart spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$poisondart_cost && $poisondart_cost !='max') {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        while ($poisondart_cost <= $poisondart_max && $poisondart_cost <= $sp) {
            echo $message = "
    <div class='menuAction'>
    (You spend $poisondart_cost SP)
    <strong class='h3 green'>Poison Dart </strong>
    is now level
    <strong class='h2 green'>$poisondart_new</strong>
    </div>";
            include('update_feed.php'); // --- update feed
            // $query = $link->query("UPDATE $user SET poisondart = poisondart + 1");
            // $query = $link->query("UPDATE $user SET sp = sp - $poisondart_cost");
            $updates = [ // -- set changes
                'poisondart' => $poisondart + 1,
                'sp' => $sp - $poisondart_cost
            ]; 
            updateStats($link, $username, $updates); // -- apply changes 
            $poisondart = $poisondart + 1;
            $poisondart_new = $poisondart_new + 1;
            $sp = $sp - $poisondart_cost;
            $poisondart_cost = $poisondart_cost + 1;
        }
    }
    if ($poisondart_max == $poisondart_new-1) {
        echo $message="<strong class='menuAction h3 green'>POISON DART MAX!</strong>";
        include('update_feed.php');
    } else if ($sp<$poisondart_cost) {
        echo $message='You don\'t have enough SP!';
        include('update_feed.php');
    }
}
// -------------------------------------------------------------------------------Atomic Blast - learn
if ($input=='learn atomic blast') {
    if ($atomicblast_cost == 'max') {
        echo $message="You have MAXED out your Atomic Blast spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$atomicblast_cost) {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        echo $message = "
    <div class='menuAction'>
    (You spend $atomicblast_cost SP)
    <strong class='h3 pink'>Atomic Blast </strong>
    is now level
    <strong class='h2 pink'>$atomicblast_new</strong>
    </div>";
        include('update_feed.php'); // --- update feed
        // $query = $link->query("UPDATE $user SET atomicblast = atomicblast + 1");
        // $query = $link->query("UPDATE $user SET sp = sp - $atomicblast_cost");
        $updates = [ // -- set changes
            'atomicblast' => $atomicblast + 1,
            'sp' => $sp - $atomicblast_cost
        ]; 
        updateStats($link, $username, $updates); // -- apply changes 
    }
}

// -------------------------------------------------------------------------------Atomic Blast - learn MAX
if ($input=='max atomic blast') {
    if ($atomicblast_cost == 'max') {
        echo $message="You have MAXED out your Atomic Blast spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$atomicblast_cost && $atomicblast_cost !='max') {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {

        $costmultiplier = 5; // PRO
        //  $costmultiplier = 10; // ELITE

        //  echo '<br> Cost:'.$atomicblast_cost;
        // echo '<br> MAX:'.$atomicblast_max;
        //echo '<br> sp:'.$sp;
        //  while ($atomicblast_cost <= ($atomicblast_max+10) && $atomicblast_cost <= $sp) {
        //   while ($atomicblast_cost <= ($atomicblast_max*$costmultiplier) && $atomicblast_cost <= $sp) {
            while (($atomicblast_cost <= ($atomicblast_max*$costmultiplier)) && $atomicblast_cost <= $sp) {
                echo $message = "
            <div class='menuAction'>
            (You spend $atomicblast_cost SP)
            <strong class='h3 pink'>Atomic Blast </strong>
            is now level
            <strong class='h2 pink'>$atomicblast_new</strong>
            </div>";
            include('update_feed.php'); // --- update feed
            // $query = $link->query("UPDATE $user SET atomicblast = atomicblast + 1");
            // $query = $link->query("UPDATE $user SET sp = sp - $atomicblast_cost");
            $updates = [ // -- set changes
                'atomicblast' => $atomicblast + 1,
                'sp' => $sp - $atomicblast_cost
            ]; 
            updateStats($link, $username, $updates); // -- apply changes 
            $atomicblast = $atomicblast + 1;
            $atomicblast_new = $atomicblast_new + 1;
            $sp = $sp - $atomicblast_cost;
            //$atomicblast_cost = $atomicblast_cost + 1;
            $atomicblast_cost = $atomicblast_cost + $costmultiplier;
        }
    }   
    if ($atomicblast_max == $atomicblast_new-1) {
        echo $message="<strong class='menuAction h3 pink'>ATOMIC BLAST MAX!</strong>";
        include('update_feed.php');
    } else if ($sp<$atomicblast_cost) {
        echo $message='You don\'t have enough SP!';
        include('update_feed.php');
    }
}
// -------------------------------------------------------------------------------Heal - learn
if ($input=='learn heal') {
    if ($heal_cost == 'max') {
        echo $message="You have MAXED out your Heal spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$heal_cost) {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        echo $message = "
    <div class='menuAction'>
    (You spend $heal_cost SP)
    <strong class='h3 green'>Heal </strong>
    is now level
    <strong class='h2 green'>$heal_new</strong>
    </div>";
        include('update_feed.php'); // --- update feed
        // $query = $link->query("UPDATE $user SET heal = heal + 1");
        // $query = $link->query("UPDATE $user SET sp = sp - $heal_cost");
        $updates = [ // -- set changes
            'heal' => $heal + 1,
            'sp' => $sp - $heal_cost
        ]; 
        updateStats($link, $username, $updates); // -- apply changes 
    }
}

// -------------------------------------------------------------------------------Heal - learn MAX
if ($input=='max heal') {
    if ($heal_cost == 'max') {
        echo $message="You have MAXED out your Heal spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$heal_cost && $heal_cost !='max') {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        while ($heal_cost <= $heal_max && $heal_cost <= $sp) {
            echo $message = "
    <div class='menuAction'>
    (You spend $heal_cost SP)
    <strong class='h3 green'>Heal </strong>
    is now level
    <strong class='h2 green'>$heal_new</strong>
    </div>";
            include('update_feed.php'); // --- update feed
            // $query = $link->query("UPDATE $user SET heal = heal + 1");
            // $query = $link->query("UPDATE $user SET sp = sp - $heal_cost");
            $updates = [ // -- set changes
                'heal' => $heal + 1,
                'sp' => $sp - $heal_cost
            ]; 
            updateStats($link, $username, $updates); // -- apply changes
            $heal = $heal + 1;
            $heal_new = $heal_new + 1;
            $sp = $sp - $heal_cost;
            $heal_cost = $heal_cost + 1;
        }
    }
    if ($heal_max == $heal_new-1) {
        echo $message="<strong class='menuAction h3 green'>HEAL MAX!</strong>";
        include('update_feed.php');
    } else if ($sp<$heal_cost) {
        echo $message='You don\'t have enough SP!';
        include('update_feed.php');
    }
}
// -------------------------------------------------------------------------------Regenerate - learn
if ($input=='learn regenerate') {
    if ($regenerate_cost == 'max') {
        echo $message="You have MAXED out your Regenerate spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$regenerate_cost) {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        echo $message = "
    <div class='menuAction'>
    (You spend $regenerate_cost SP)
    <strong class='h3 green'>Regenerate </strong>
    is now level
    <strong class='h2 green'>$regenerate_new</strong>
    </div>";
        include('update_feed.php'); // --- update feed
        // $query = $link->query("UPDATE $user SET regenerate = regenerate + 1");
        // $query = $link->query("UPDATE $user SET sp = sp - $regenerate_cost");
        $updates = [ // -- set changes
            'regenerate' => $regenerate + 1,
            'sp' => $sp - $regenerate_cost
        ]; 
        updateStats($link, $username, $updates); // -- apply changes 
    }
}
// -------------------------------------------------------------------------------Regenerate - learn MAX
if ($input=='max regenerate') {
    if ($regenerate_cost == 'max') {
        echo $message="You have MAXED out your Regenerate spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$regenerate_cost && $regenerate_cost !='max') {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        while ($regenerate_cost <= $regenerate_max && $regenerate_cost <= $sp) {
            echo $message = "
    <div class='menuAction'>
    (You spend $regenerate_cost SP)
    <strong class='h3 green'>Regenerate </strong>
    is now level
    <strong class='h2 green'>$regenerate_new</strong>
    </div>";
            include('update_feed.php'); // --- update feed
            // $query = $link->query("UPDATE $user SET regenerate = regenerate + 1");
            // $query = $link->query("UPDATE $user SET sp = sp - $regenerate_cost");
            $updates = [ // -- set changes
                'regenerate' => $regenerate + 1,
                'sp' => $sp - $regenerate_cost
            ]; 
            updateStats($link, $username, $updates); // -- apply changes 
            $regenerate = $regenerate + 1;
            $regenerate_new = $regenerate_new + 1;
            $sp = $sp - $regenerate_cost;
            $regenerate_cost = $regenerate_cost + 1;
        }
    }
    if ($regenerate_max == $regenerate_new-1) {
        echo $message="<strong class='menuAction h3 green'>REGENERATE MAX!</strong>";
        include('update_feed.php');
    } else if ($sp<$regenerate_cost) {
        echo $message='You don\'t have enough SP!';
        include('update_feed.php');
    }
}
// -------------------------------------------------------------------------------Antidote - learn
if ($input=='learn antidote') {
    if ($antidote_cost == 'max') {
        echo $message="You have MAXED out your Antidote spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$antidote_cost) {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        echo $message = "
    <div class='menuAction'>
    (You spend $antidote_cost SP)
    <strong class='h3 green'>Antidote </strong>
    is now level
    <strong class='h2 green'>$antidote_new</strong>
    </div>";
        include('update_feed.php'); // --- update feed
        // $query = $link->query("UPDATE $user SET antidote = antidote + 1");
        // $query = $link->query("UPDATE $user SET sp = sp - $antidote_cost");
        $updates = [ // -- set changes
            'antidote' => $antidote + 1,
            'sp' => $sp - $antidote_cost
        ]; 
        updateStats($link, $username, $updates); // -- apply changes 
    }
}
// -------------------------------------------------------------------------------Antidote - learn MAX
if ($input=='max antidote') {
    if ($antidote_cost == 'max') {
        echo $message="You have MAXED out your Antidote spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$antidote_cost && $antidote_cost !='max') {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        while ($antidote_cost <= $antidote_max && $antidote_cost <= $sp) {
            echo $message = "
    <div class='menuAction'>
    (You spend $antidote_cost SP)
    <strong class='h3 green'>Antidote </strong>
    is now level
    <strong class='h2 green'>$antidote_new</strong>
    </div>";
            include('update_feed.php'); // --- update feed
            // $query = $link->query("UPDATE $user SET antidote = antidote + 1");
            // $query = $link->query("UPDATE $user SET sp = sp - $antidote_cost");
            $updates = [ // -- set changes
                'antidote' => $antidote + 1,
                'sp' => $sp - $antidote_cost
            ]; 
            updateStats($link, $username, $updates); // -- apply changes 
            $antidote = $antidote + 1;
            $antidote_new = $antidote_new + 1;
            $sp = $sp - $antidote_cost;
            $antidote_cost = $antidote_cost + 1;
        }
    }
    if ($antidote_max == $antidote_new-1) {
        echo $message="<strong class='menuAction h3 green'>ANTIDOTE MAX!</strong>";
        include('update_feed.php');
    } else if ($sp<$antidote_cost) {
        echo $message='You don\'t have enough SP!';
        include('update_feed.php');
    }
}
// -------------------------------------------------------------------------------Magic Armor - learn
if ($input=='learn magic armor') {
    if ($magicarmor_cost == 'max') {
        echo $message="You have MAXED out your Magic Armor spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$magicarmor_cost) {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        echo $message = "
    <div class='menuAction'>
    (You spend $magicarmor_cost SP)
    <strong class='h3 gold'>Magic Armor </strong>
    is now level
    <strong class='h2 gold'>$magicarmor_new</strong>
    </div>";
        include('update_feed.php'); // --- update feed
        // $query = $link->query("UPDATE $user SET magicarmor = magicarmor + 1");
        // $query = $link->query("UPDATE $user SET sp = sp - $magicarmor_cost");
        $updates = [ // -- set changes
            'magicarmor' => $magicarmor + 1,
            'sp' => $sp - $magicarmor_cost
        ]; 
        updateStats($link, $username, $updates); // -- apply changes 
    }
}
// -------------------------------------------------------------------------------Magic Armor - learn MAX
if ($input=='max magic armor') {
    if ($magicarmor_cost == 'max') {
        echo $message="You have MAXED out your Magic Armor spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$magicarmor_cost && $magicarmor_cost !='max') {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        while ($magicarmor_cost <= $magicarmor_max && $magicarmor_cost <= $sp) {
            echo $message = "
    <div class='menuAction'>
    (You spend $magicarmor_cost SP)
    <strong class='h3 gold'>Magic Armor </strong>
    is now level
    <strong class='h2 gold'>$magicarmor_new</strong>
    </div>";
            include('update_feed.php'); // --- update feed
            // $query = $link->query("UPDATE $user SET magicarmor = magicarmor + 1");
            // $query = $link->query("UPDATE $user SET sp = sp - $magicarmor_cost");
            $updates = [ // -- set changes
                'magicarmor' => $magicarmor + 1,
                'sp' => $sp - $magicarmor_cost
            ]; 
            updateStats($link, $username, $updates); // -- apply change
            $magicarmor = $magicarmor + 1;
            $magicarmor_new = $magicarmor_new + 1;
            $sp = $sp - $magicarmor_cost;
            $magicarmor_cost = $magicarmor_cost + 1;
        }
    }
    if ($magicarmor_max == $magicarmor_new-1) {
        echo $message="<strong class='menuAction h3 gold'>MAGIC ARMOR MAX!</strong>";
        include('update_feed.php');
    } else if ($sp<$magicarmor_cost) {
        echo $message='You don\'t have enough SP!';
        include('update_feed.php');
    }
}
// -------------------------------------------------------------------------------Iron Skin - learn
if ($input=='learn iron skin') {
    if ($ironskin_cost == 'max') {
        echo $message="You have MAXED out your Iron Skin spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$ironskin_cost) {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        echo $message = "
    <div class='menuAction'>
    (You spend $ironskin_cost SP)
    <strong class='h3 gold'>Iron Skin </strong>
    is now level
    <strong class='h2 gold'>$ironskin_new</strong>
    </div>";
        include('update_feed.php'); // --- update feed
        // $query = $link->query("UPDATE $user SET ironskin = ironskin + 1");
        // $query = $link->query("UPDATE $user SET sp = sp - $ironskin_cost");
        $updates = [ // -- set changes
            'ironskin' => $ironskin + 1,
            'sp' => $sp - $ironskin_cost
        ]; 
        updateStats($link, $username, $updates); // -- apply change
    }
}
// -------------------------------------------------------------------------------Iron Skin - learn MAX
if ($input=='max iron skin') {
    if ($ironskin_cost == 'max') {
        echo $message="You have MAXED out your Iron Skin spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$ironskin_cost && $ironskin_cost !='max') {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        while ($ironskin_cost <= $ironskin_max && $ironskin_cost <= $sp) {
            echo $message = "
    <div class='menuAction'>
    (You spend $ironskin_cost SP)
    <strong class='h3 gold'>Iron Skin </strong>
    is now level
    <strong class='h2 gold'>$ironskin_new</strong>
    </div>";
            include('update_feed.php'); // --- update feed
            // $query = $link->query("UPDATE $user SET ironskin = ironskin + 1");
            // $query = $link->query("UPDATE $user SET sp = sp - $ironskin_cost");
            $updates = [ // -- set changes
                'ironskin' => $ironskin + 1,
                'sp' => $sp - $ironskin_cost
            ]; 
            updateStats($link, $username, $updates); // -- apply change
            $ironskin = $ironskin + 1;
            $ironskin_new = $ironskin_new + 1;
            $sp = $sp - $ironskin_cost;
            $ironskin_cost = $ironskin_cost + 1;
        }
    }
    if ($ironskin_max == $ironskin_new-1) {
        echo $message="<strong class='menuAction h3 gold'>IRON SKIN MAX!</strong>";
        include('update_feed.php');
    } else if ($sp<$ironskin_cost) {
        echo $message='You don\'t have enough SP!';
        include('update_feed.php');
    }
}
// -------------------------------------------------------------------------------Wings - learn
if ($input=='learn wings') {
    if ($wings_cost == 'max') {
        echo $message="You have MAXED out your Wings spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$wings_cost) {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        echo $message = "
    <div class='menuAction'>
    (You spend $wings_cost SP)
    <strong class='h3 blue'>Wings </strong>
    is now level
    <strong class='h2 blue'>$wings_new</strong>
    </div>";
        include('update_feed.php'); // --- update feed
        // $query = $link->query("UPDATE $user SET wings = wings + 1");
        // $query = $link->query("UPDATE $user SET sp = sp - $wings_cost");
        $updates = [ // -- set changes
            'wings' => $wings + 1,
            'sp' => $sp - $wings_cost
        ]; 
        updateStats($link, $username, $updates); // -- apply change
    }
}
// -------------------------------------------------------------------------------Wings - learn MAX
if ($input=='max wings') {
    if ($wings_cost == 'max') {
        echo $message="You have MAXED out your Wings spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$wings_cost && $wings_cost !='max') {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        while ($wings_cost <= $wings_max && $wings_cost <= $sp) {
            echo $message = "
    <div class='menuAction'>
    (You spend $wings_cost SP)
    <strong class='h3 blue'>Wings </strong>
    is now level
    <strong class='h2 blue'>$wings_new</strong>
    </div>";
            include('update_feed.php'); // --- update feed
            // $query = $link->query("UPDATE $user SET wings = wings + 1");
            // $query = $link->query("UPDATE $user SET sp = sp - $wings_cost");
            $updates = [ // -- set changes
                'wings' => $wings + 1,
                'sp' => $sp - $wings_cost
            ]; 
            updateStats($link, $username, $updates); // -- apply change
            $wings = $wings + 1;
            $wings_new = $wings_new + 1;
            $sp = $sp - $wings_cost;
            $wings_cost = $wings_cost + 1;
        }
    }
    if ($wings_max == $wings_new-1) {
        echo $message="<strong class='menuAction h3 blue'>WINGS MAX!</strong>";
        include('update_feed.php');
    } else if ($sp<$wings_cost) {
        echo $message='You don\'t have enough SP!';
        include('update_feed.php');
    }
}
// -------------------------------------------------------------------------------Gills - learn
if ($input=='learn gills') {
    if ($gills_cost == 'max') {
        echo $message="You have MAXED out your Gills spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$gills_cost) {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        echo $message = "
    <div class='menuAction'>
    (You spend $gills_cost SP)
    <strong class='h3 blue'>Gills </strong>
    is now level
    <strong class='h2 blue'>$gills_new</strong>
    </div>";
        include('update_feed.php'); // --- update feed
        // $query = $link->query("UPDATE $user SET gills = gills + 1");
        // $query = $link->query("UPDATE $user SET sp = sp - $gills_cost");
        $updates = [ // -- set changes
            'gills' => $gills + 1,
            'sp' => $sp - $gills_cost
        ]; 
        updateStats($link, $username, $updates); // -- apply change
    }
}
// -------------------------------------------------------------------------------Gills - learn MAX
if ($input=='max gills') {
    if ($gills_cost == 'max') {
        echo $message="You have MAXED out your Gills spell! Search for more advanced teachers.<br>";
        include('update_feed.php'); // --- update feed
    } else if ($sp<$gills_cost && $gills_cost !='max') {
        echo $message=$notenoughsp;
        include('update_feed.php');
    } else {
        while ($gills_cost <= $gills_max && $gills_cost <= $sp) {
            echo $message = "
    <div class='menuAction'>
    (You spend $gills_cost SP)
    <strong class='h3 blue'>Gills </strong>
    is now level
    <strong class='h2 blue'>$gills_new</strong>
    </div>";
            include('update_feed.php'); // --- update feed
            // $query = $link->query("UPDATE $user SET gills = gills + 1");
            // $query = $link->query("UPDATE $user SET sp = sp - $gills_cost");
            $updates = [ // -- set changes
                'gills' => $gills + 1,
                'sp' => $sp - $gills_cost
            ]; 
            updateStats($link, $username, $updates); // -- apply change
            $gills = $gills + 1;
            $gills_new = $gills_new + 1;
            $sp = $sp - $gills_cost;
            $gills_cost = $gills_cost + 1;
        }
    }
    if ($gills_max == $gills_new-1) {
        echo $message="<strong class='menuAction h3 blue'>GILLS MAX!</strong>";
        include('update_feed.php');
    } else if ($sp<$gills_cost) {
        echo $message='You don\'t have enough SP!';
        include('update_feed.php');
    }
}
// }
