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
    $crafting=$row['crafting'];
    $craftingtable=$row['craftingtable'];
    $string=$row['string'];
    $wood=$row['wood'];
    $leather=$row['leather'];
    $fire=$row['fire'];
    $room=$row['room'];
    $sand=$row['sand'];
    $glass=$row['glass'];
    $bottle=$row['bottle'];
    $mud=$row['mud'];
    $stone=$row['stone'];
    $iron=$row['iron'];
    $coal=$row['coal'];
    $steel=$row['steel'];
    $mithril=$row['mithril'];

    $graymatter=$row['graymatter'];

    $dagger=$row['dagger'];


    $redberry=$row['redberry'];
    $blueberry=$row['blueberry'];
    $rawmeat=$row['rawmeat'];
    $cookedmeat=$row['cookedmeat'];
    $meatball=$row['meatball'];
    $quest22=$row['quest22'];
    $redpotion=$row['redpotion'];
    $bluepotion=$row['bluepotion'];
    $purplepotion=$row['purplepotion'];
    $redbalm=$row['redbalm'];
    $bluebalm=$row['bluebalm'];
    $purplebalm=$row['purplebalm'];

    $hammer=$row['hammer'];
    $ironhammer=$row['ironhammer'];
    $steelhammer=$row['steelhammer'];
    $mithrilhammer=$row['mithrilhammer'];


    $ringofstrength=$row['ringofstrength'];
    $ringofdexterity=$row['ringofdexterity'];
    $ringofmagic=$row['ringofmagic'];
    $ringofdefense=$row['ringofdefense'];
    $ringofstrengthII=$row['ringofstrengthII'];
    $ringofdexterityII=$row['ringofdexterityII'];
    $ringofmagicII=$row['ringofmagicII'];
    $ringofdefenseII=$row['ringofdefenseII'];
    $ringofstrengthIII=$row['ringofstrengthIII'];
    $ringofdexterityIII=$row['ringofdexterityIII'];
    $ringofmagicIII=$row['ringofmagicIII'];
    $ringofdefenseIII=$row['ringofdefenseIII'];
    $ringofstrengthIV=$row['ringofstrengthIV'];
    $ringofdexterityIV=$row['ringofdexterityIV'];
    $ringofmagicIV=$row['ringofmagicIV'];
    $ringofdefenseIV=$row['ringofdefenseIV'];
    $ringofstrengthV=$row['ringofstrengthV'];
    $ringofdexterityV=$row['ringofdexterityV'];
    $ringofmagicV=$row['ringofmagicV'];
    $ringofdefenseV=$row['ringofdefenseV'];

    $ringofstrengthVI=$row['ringofstrengthVI'];
    $ringofdexterityVI=$row['ringofdexterityVI'];
    $ringofmagicVI=$row['ringofmagicVI'];
    $ringofdefenseVI=$row['ringofdefenseVI'];
    $ringofstrengthVII=$row['ringofstrengthVII'];
    $ringofdexterityVII=$row['ringofdexterityVII'];
    $ringofmagicVII=$row['ringofmagicVII'];
    $ringofdefenseVII=$row['ringofdefenseVII'];
    $ringofstrengthVIII=$row['ringofstrengthVIII'];
    $ringofdexterityVIII=$row['ringofdexterityVIII'];
    $ringofmagicVIII=$row['ringofmagicVIII'];
    $ringofdefenseVIII=$row['ringofdefenseVIII'];
    $ringofstrengthIX=$row['ringofstrengthIX'];
    $ringofdexterityIX=$row['ringofdexterityIX'];
    $ringofmagicIX=$row['ringofmagicIX'];
    $ringofdefenseIX=$row['ringofdefenseIX'];
    $ringofstrengthX=$row['ringofstrengthX'];
    $ringofdexterityX=$row['ringofdexterityX'];
    $ringofmagicX=$row['ringofmagicX'];
    $ringofdefenseX=$row['ringofdefenseX'];

    $ringofstrengthXI=$row['ringofstrengthXI'];
    $ringofdexterityXI=$row['ringofdexterityXI'];
    $ringofmagicXI=$row['ringofmagicXI'];
    $ringofdefenseXI=$row['ringofdefenseXI'];
    $ringofstrengthXII=$row['ringofstrengthXII'];
    $ringofdexterityXII=$row['ringofdexterityXII'];
    $ringofmagicXII=$row['ringofmagicXII'];
    $ringofdefenseXII=$row['ringofdefenseXII'];
    $ringofstrengthXIII=$row['ringofstrengthXIII'];
    $ringofdexterityXIII=$row['ringofdexterityXIII'];
    $ringofmagicXIII=$row['ringofmagicXIII'];
    $ringofdefenseXIII=$row['ringofdefenseXIII'];

    $ringofstrengthXIV=$row['ringofstrengthXIV'];
    $ringofdexterityXIV=$row['ringofdexterityXIV'];
    $ringofmagicXIV=$row['ringofmagicXIV'];
    $ringofdefenseXIV=$row['ringofdefenseXIV'];
    $ringofstrengthXV=$row['ringofstrengthXV'];
    $ringofdexterityXV=$row['ringofdexterityXV'];
    $ringofmagicXV=$row['ringofmagicXV'];
    $ringofdefenseXV=$row['ringofdefenseXV'];

    $ringofstrengthXVI=$row['ringofstrengthXVI'];
    $ringofdexterityXVI=$row['ringofdexterityXVI'];
    $ringofmagicXVI=$row['ringofmagicXVI'];
    $ringofdefenseXVI=$row['ringofdefenseXVI'];
    $ringofstrengthXVII=$row['ringofstrengthXVII'];
    $ringofdexterityXVII=$row['ringofdexterityXVII'];
    $ringofmagicXVII=$row['ringofmagicXVII'];
    $ringofdefenseXVII=$row['ringofdefenseXVII'];
    $ringofstrengthXVIII=$row['ringofstrengthXVIII'];
    $ringofdexterityXVIII=$row['ringofdexterityXVIII'];
    $ringofmagicXVIII=$row['ringofmagicXVIII'];
    $ringofdefenseXVIII=$row['ringofdefenseXVIII'];

    $ringofstrengthXIX=$row['ringofstrengthXIX'];
    $ringofdexterityXIX=$row['ringofdexterityXIX'];
    $ringofmagicXIX=$row['ringofmagicXIX'];
    $ringofdefenseXIX=$row['ringofdefenseXIX'];


    $ringofstrengthXX=$row['ringofstrengthXX'];
    $ringofdexterityXX=$row['ringofdexterityXX'];
    $ringofmagicXX=$row['ringofmagicXX'];
    $ringofdefenseXX=$row['ringofdefenseXX'];



    $ringofhealthregen=$row['ringofhealthregen'];
    $ringofmanaregen=$row['ringofmanaregen'];
    $ringofhealthregenII=$row['ringofhealthregenII'];
    $ringofmanaregenII=$row['ringofmanaregenII'];
    $ringofhealthregenIII=$row['ringofhealthregenIII'];
    $ringofmanaregenIII=$row['ringofmanaregenIII'];
    $ringofhealthregenIV=$row['ringofhealthregenIV'];
    $ringofmanaregenIV=$row['ringofmanaregenIV'];
    $ringofhealthregenV=$row['ringofhealthregenV'];
    $ringofmanaregenV=$row['ringofmanaregenV'];


    $ringofhealthregenV=$row['ringofhealthregenV'];
    $ringofmanaregenV=$row['ringofmanaregenV'];
    $ringofhealthregenVII=$row['ringofhealthregenVII'];
    $ringofmanaregenVII=$row['ringofmanaregenVII'];
    $ringofhealthregenVIII=$row['ringofhealthregenVIII'];
    $ringofmanaregenVIII=$row['ringofmanaregenVIII'];
    $ringofhealthregenIX=$row['ringofhealthregenIX'];
    $ringofmanaregenIX=$row['ringofmanaregenIX'];
    $ringofhealthregenX=$row['ringofhealthregenX'];
    $ringofmanaregenX=$row['ringofmanaregenX'];

    $ringofhealthregenXII=$row['ringofhealthregenXII'];
    $ringofmanaregenXII=$row['ringofmanaregenXII'];
    $ringofhealthregenXIII=$row['ringofhealthregenXIII'];
    $ringofmanaregenXIII=$row['ringofmanaregenXIII'];
    $ringofhealthregenXIV=$row['ringofhealthregenXIV'];
    $ringofmanaregenXIV=$row['ringofmanaregenXIV'];
    $ringofhealthregenXV=$row['ringofhealthregenXV'];
    $ringofmanaregenXV=$row['ringofmanaregenXV'];





    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ITEMS TO CRAFT!!!!!
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ITEMS TO CRAFT!!!!!
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ITEMS TO CRAFT!!!!!
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT TABLE
    if ($input=='craft table') {
        if ($crafting== 0) {
            echo $message="<i>What's craft? You should talk to Jack Lumber</i><br>";
            include('update_feed.php'); // --- update feed
        } elseif ($crafting >= 1 && $wood < 3) {
            echo "<span class='gold'>You don't have enough wood to build a crafting table. Visit Jack's Tree Farm or the Forest to chop some down.</span><br>";
            $message = "You don't have enough wood to build a crafting table. Visit Jack's Tree Farm or the Forest to chop some down.<br>";
            include('update_feed.php'); // --- update feed
        } elseif ($crafting >= 1 && $wood >= 3) {
            echo "<span class='gold'>You build a crafting table!</span><br>";
            $message = "You build a crafting table! Use the CRAFT menu to create and combine new items!<br>";
            include('update_feed.php'); // --- update feed

            // $results = $link->query("UPDATE $user SET craftingtable = room"); // -- crafting table set up
            // $results = $link->query("UPDATE $user SET wood = wood - 3");
            $updates = [
                'craftingtable' => $room, 
                'wood' => $wood - 3
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes

            $message = "
            <p>A <span class='red'>Crafting Table </span> is set up here</p>
            <a href data-link2='craft' class='redBG btn'>
             Craft Now</a> ";
            include('update_feed_alt.php'); // --- update feed
            //<i class='icon white'>".file_get_contents("img/svg/table.svg")."</i>
        }
    }


    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT fire
    elseif ($input=='craft fire' || $input=='build fire') {
        if ($crafting >= 1 && $room == $fire) {
            echo "<span class='gold'>You already have a fire burning here.</span><br>";
            $message = "You already have a fire burning here.<br>";
            include('update_feed.php'); // --- update feed
        } elseif ($crafting >= 1 && $wood >= 1) {
            echo "<span class='gold'>You build a FIRE!</span><br>";
            $message = "You build a FIRE!<br>";
            include('update_feed.php'); // --- update feed

            // $results = $link->query("UPDATE $user SET fire = room");
            // $results = $link->query("UPDATE $user SET wood = wood - 1");
            $updates = [
                'fire' => $room, 
                'wood' => $wood - 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
            $message = "
            <p>A <span class='red'>Cooking Fire </span> burns here</p>
            <a href data-link2='craft' class='redBG btn'>
            Cook</a> ";
            include('update_feed_alt.php'); // --- update feed
            // <i class='icon white'>".file_get_contents("img/svg/fire.svg")."</i>
        } else {
            echo "<span class='gold'>You don't have any wood to build a fire.</span><br>";
            $message = "You don't have any wood to build a fire.<br>";
            include('update_feed.php'); // --- update feed
        }
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx COOK meat
    elseif ($input=='cook meat') {
        if ($fire == $room && $crafting >= 1 && $rawmeat >= 1) {
            echo "You COOK some raw meat on the fire<br>";
            $message = "You COOK some raw meat on the fire<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET rawmeat = rawmeat - 1");
            // $results = $link->query("UPDATE $user SET cookedmeat = cookedmeat + 1");
            $updates = [
                'rawmeat' => $rawmeat - 1, 
                'cookedmeat' => $cookedmeat + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
        }
    } elseif ($input=='cook all meat') {
        $times = $rawmeat;

        if ($fire == $room && $crafting >= 1 && $rawmeat >= 1) {
            echo "<span class='gold'>You COOK $times raw meat on the fire!</span><br>";
            $message = "You COOK $times raw meat on the fire!<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET rawmeat = rawmeat - $times");
            // $results = $link->query("UPDATE $user SET cookedmeat = cookedmeat + $times");
            $updates = [
                'rawmeat' => $rawmeat - $times, 
                'cookedmeat' => $cookedmeat + $times
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
        }
    } elseif ($input=='cook meatball') {
        if ($fire == $room && $crafting >= 1 && $cookedmeat >= 5) {
            echo "You COOK up a tasty meat-a-ball!<br>";
            $message = "You COOK up a tasty meat-a-ball!<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET cookedmeat = cookedmeat - 5");
            // $results = $link->query("UPDATE $user SET meatball = meatball + 1");
            $updates = [
                'cookedmeat' => $cookedmeat - 5, 
                'meatball' => $meatball + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
        }
    } elseif ($input=='cook all meatball') {
        $times = $cookedmeat/5;
        $times = floor($times); // round down
        $qty = $times * 5;

        if ($fire == $room && $crafting >= 1 && $cookedmeat >= 5) {
            echo $message ="You COOK $qty cooked meat into $times meatballs!<br>";
            include('update_feed.php'); // --- update feed

            // $results = $link->query("UPDATE $user SET cookedmeat = cookedmeat - $qty");
            // $results = $link->query("UPDATE $user SET meatball = meatball + $times");
            $updates = [
                'cookedmeat' => $cookedmeat - $qty, 
                'meatball' => $meatball + $times
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
        }
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT glass
    elseif ($craftingtable==$room && $input=='craft glass') {
        if ($fire == $room && $craftingtable==$room && $crafting >= 1 && $sand >= 1) {
            echo "You craft some GLASS out of sand<br>";
            $message = "You craft some GLASS out of sand<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET glass = glass + 1");
            // $results = $link->query("UPDATE $user SET sand = sand - 1");
            $updates = [
                'glass' => $glass + 1, 
                'sand' => $sand - 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
            }
    } elseif ($input=='craft all glass') {
        $times = $sand;

        if ($fire == $room && $craftingtable==$room && $crafting >= 1 && $sand >= 1) {
            echo "You CRAFT $times glass<br>";
            $message = "You CRAFT $times glass<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET sand = sand - $times");
            // $results = $link->query("UPDATE $user SET glass = glass + $times");
            $updates = [
                'sand' => $sand - $times, 
                'glass' => $glass + $times
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
        }
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT bottle
    elseif ($craftingtable==$room && $fire == $room && $input=='craft bottle') {
        if ($crafting >= 1 && $glass >= 1) {
            echo "You craft a BOTTLE out of some glass<br>";
            $message = "You craft a BOTTLE out of some glass<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET bottle = bottle + 1");
            // $results = $link->query("UPDATE $user SET glass = glass - 1");
            $updates = [
                'bottle' => $bottle + 1, 
                'glass' => $glass - 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
        }
    } elseif ($input=='craft all bottle') {
        $times = $glass;

        if ($fire == $room && $craftingtable==$room && $crafting >= 1 && $glass >= 1) {
            echo "You CRAFT $times bottles<br>";
            $message = "You CRAFT $times bottles<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET glass = glass - $times");
            // $results = $link->query("UPDATE $user SET bottle = bottle + $times");
            $updates = [
                'glass' => $glass - $times, 
                'bottle' => $bottle + $times
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
        }
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT red potion
    elseif ($craftingtable==$room && $input=='craft red potion' && $crafting >= 1 && $bottle >= 1 && $redberry >=5) {
        echo $message = "You craft a RED POTION out of 5 redberries and a bottle<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET bottle = bottle - 1");
        // $results = $link->query("UPDATE $user SET redberry = redberry - 5");
        // $results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
        $updates = [
            'bottle' => $bottle - 1, 
            'redberry' => $redberry - 5, 
            'redpotion' => $redpotion + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes        
    } elseif ($input=='craft all red potion') {
        $times = $redberry/5;
        $times = floor($times); // round down
        $qty = $times * 5;

        if ($craftingtable == $room && $crafting >= 1 && $redberry >= 5) {
            echo $message ="You craft $qty redberries into $times Red Potions!<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET redberry = redberry - $qty");
            // $results = $link->query("UPDATE $user SET redpotion = redpotion + $times");
            $updates = [
                'redberry' => $redberry - $qty, 
                'redpotion' => $redpotion + $times
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
        }
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT blue potion
    elseif ($craftingtable==$room && $input=='craft blue potion' && $crafting >= 1 && $bottle >= 1 && $blueberry >=5) {
        echo $message = "You craft a BLUE POTION out of 5 blueberries and a bottle<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET bottle = bottle - 1");
        // $results = $link->query("UPDATE $user SET blueberry = blueberry - 5");
        // $results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1");
        $updates = [
            'bottle' => $bottle - 1, 
            'blueberry' => $blueberry - 5, 
            'bluepotion' => $bluepotion + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($input=='craft all blue potion') {
        $times = $blueberry/5;
        $times = floor($times); // round down
        $qty = $times * 5;

        if ($craftingtable==$room && $crafting >= 1 && $blueberry >= 5) {
            echo $message ="You craft $qty blueberries into $times Blue Potions!<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET blueberry = blueberry - $qty");
            // $results = $link->query("UPDATE $user SET bluepotion = bluepotion + $times");
            $updates = [
                'blueberry' => $blueberry - $qty, 
                'bluepotion' => $bluepotion + $times
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
        }
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT purple potion
    elseif ($craftingtable==$room && $input=='craft purple potion' && $crafting >= 1 && $redpotion >=1 && $bluepotion >=1) {
        echo $message = "You craft a PURPLE POTION out of a Red Potion and a Blue Potion<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET redpotion = redpotion - 1");
        // $results = $link->query("UPDATE $user SET bluepotion = bluepotion - 1");
        // $results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1");
        $updates = [
            'redpotion' => $redpotion - 1, 
            'bluepotion' => $bluepotion - 1, 
            'purplepotion' => $purplepotion + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($input=='craft all purple potion') {
        $times = $redpotion;
        if ($redpotion > $bluepotion) {
            $times=$bluepotion;
        }

        if ($craftingtable==$room && $crafting >= 1 && $redpotion >=1 && $bluepotion >=1) {
            echo $message ="You combine your Red and Blue Potions into $times Purple Potions!<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET redpotion = redpotion - $times");
            // $results = $link->query("UPDATE $user SET bluepotion = bluepotion - $times");
            // $results = $link->query("UPDATE $user SET purplepotion = purplepotion + $times");
            $updates = [
                'redpotion' => $redpotion - $times, 
                'bluepotion' => $bluepotion - $times, 
                'purplepotion' => $purplepotion + $times
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
        }
    }


    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT red balm
    elseif ($craftingtable==$room && $input=='craft red balm' && $crafting >= 1 && $mud >= 1 && $redpotion >=5) {
        echo $message = "You craft a RED balm out of 5 red potions and mud<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET mud = mud - 1");
        // $results = $link->query("UPDATE $user SET redpotion = redpotion - 5");
        // $results = $link->query("UPDATE $user SET redbalm = redbalm + 1");
        $updates = [
            'mud' => $mud - 1, 
            'redpotion' => $redpotion - 5, 
            'redbalm' => $redbalm + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($input=='craft all red balm') {
        $times = $redpotion/5;
        $times = floor($times); // round down
        $qty = $times * 5;

        if ($craftingtable == $room && $crafting >= 1 && $redpotion >= 5 && $mud >= 1) {
            echo $message ="You craft $qty red potions into $times Red balms!<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET mud = mud - $times");
            // $results = $link->query("UPDATE $user SET redpotion = redpotion - $qty");
            // $results = $link->query("UPDATE $user SET redbalm = redbalm + $times");
            $updates = [
                'mud' => $mud - $times, 
                'redpotion' => $redpotion - $qty, 
                'redbalm' => $redbalm + $times
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
        }
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT blue balm
    elseif ($craftingtable==$room && $input=='craft blue balm' && $crafting >= 1 && $mud >= 1 && $bluepotion >=5) {
        echo $message = "You craft a BLUE balm out of 5 blueberries and a mud<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET mud = mud - 1");
        // $results = $link->query("UPDATE $user SET bluepotion = bluepotion - 5");
        // $results = $link->query("UPDATE $user SET bluebalm = bluebalm + 1");
        $updates = [
            'mud' => $mud - 1, 
            'bluepotion' => $bluepotion - 5, 
            'bluebalm' => $bluebalm + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($input=='craft all blue balm') {
        $times = $bluepotion/5;
        $times = floor($times); // round down
        $qty = $times * 5;

        if ($craftingtable==$room && $crafting >= 1 && $bluepotion >= 5 && $mud >= 1) {
            echo $message ="You craft $qty blueberries into $times Blue balms!<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET mud = mud - $times");
            // $results = $link->query("UPDATE $user SET bluepotion = bluepotion - $qty");
            // $results = $link->query("UPDATE $user SET bluebalm = bluebalm + $times");
            $updates = [
                'mud' => $mud - $times, 
                'bluepotion' => $bluepotion - $qty, 
                'bluebalm' => $bluebalm + $times
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
        }
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT purple balm
    elseif ($craftingtable==$room && $input=='craft purple balm' && $crafting >= 1 && $redbalm >=1 && $bluebalm >=1) {
        echo $message = "You craft a PURPLE balm out of a Red balm and a Blue balm<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET redbalm = redbalm - 1");
        // $results = $link->query("UPDATE $user SET bluebalm = bluebalm - 1");
        // $results = $link->query("UPDATE $user SET purplebalm = purplebalm + 1");
        $updates = [
            'redbalm' => $redbalm - 1, 
            'bluebalm' => $bluebalm - 1, 
            'purplebalm' => $purplebalm + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($input=='craft all purple balm') {
        $times = $redbalm;
        if ($redbalm > $bluebalm) {
            $times=$bluebalm;
        }
        if ($craftingtable==$room && $crafting >= 1 && $redbalm >=1 && $bluebalm >=1) {
            echo $message ="You combine your Red and Blue balms into $times Purple balms!<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET redbalm = redbalm - $times");
            // $results = $link->query("UPDATE $user SET bluebalm = bluebalm - $times");
            // $results = $link->query("UPDATE $user SET purplebalm = purplebalm + $times");
            $updates = [
                'redbalm' => $redbalm - $times,
                'bluebalm' => $bluebalm - $times,
                'purplebalm' => $purplebalm + $times
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
        }
    }

       // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT purple balm 2
       elseif ($craftingtable==$room && $input=='craft purple balm 2' && $crafting >= 1 && $purplepotion >=5) {
        echo $message = "You craft a Purple balm out of a 5 purple potions<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET purplepotion = purplepotion - 5");
        // $results = $link->query("UPDATE $user SET purplebalm = purplebalm + 1");
        $updates = [
            'purplepotion' => $purplepotion - 5, 
            'purplebalm' => $purplebalm + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($input=='craft all purple balm 2') {
        $times = $purplepotion/5;
        $times = floor($times); // round down
        $qty = $times * 5;
        if ($craftingtable == $room && $crafting >= 1 && $purplepotion >= 5) {
            include('update_feed.php'); // --- update feed
            echo $message ="You craft $qty Purple Potions into $times Purple Balms!<br>";
            // $results = $link->query("UPDATE $user SET purplepotion = purplepotion - $qty");
            // $results = $link->query("UPDATE $user SET purplebalm = purplebalm + $times");
            $updates = [
                'purplepotion' => $purplepotion - $qty, 
                'purplebalm' => $purplebalm + $times
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
        }
    }


    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx hatchet
    elseif ($craftingtable==$room && $crafting >= 1 && $input=='craft hatchet' && $stone >=3 && $wood >=1) {
        echo $message = "You craft a HATCHET out of 3 stone and 1 wood<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET hatchet = hatchet + 1");
        // $results = $link->query("UPDATE $user SET stone = stone - 3");
        // $results = $link->query("UPDATE $user SET wood = wood - 1");
        $updates = [
            'hatchet' => $hatchet + 1, 
            'stone' => $stone - 3, 
            'wood' => $wood - 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx pickaxe
    elseif ($craftingtable==$room && $crafting >= 1 && $input=='craft pickaxe' && $stone >=3 && $wood >=1) {
        echo $message = "You craft a PICKAXE out of 3 stone and 1 wood<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET pickaxe = pickaxe + 1");
        // $results = $link->query("UPDATE $user SET stone = stone - 3");
        // $results = $link->query("UPDATE $user SET wood = wood - 1");
        $updates = [
            'pickaxe' => $pickaxe + 1, 
            'stone' => $stone - 3, 
            'wood' => $wood - 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx hammer
    elseif ($craftingtable==$room && $crafting >= 1 && $input=='craft hammer' && $stone >=3 && $wood >=1) {
        echo $message = "You craft a HAMMER out of 3 stone and 1 wood<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET hammer = hammer + 1");
        // $results = $link->query("UPDATE $user SET stone = stone - 3");
        // $results = $link->query("UPDATE $user SET wood = wood - 1");
        $updates = [
            'hammer' => $hammer + 1, 
            'stone' => $stone - 3, 
            'wood' => $wood - 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }


    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT wooden items!!!
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx wooden staff
    elseif ($craftingtable==$room && $crafting >= 1 && $hammer >=1 && $input=='craft wooden staff' && $wood >=7) {
        echo $message = "You craft a WOODEN STAFF out of 7 wood<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET woodenstaff = woodenstaff + 1");
        // $results = $link->query("UPDATE $user SET wood = wood - 7");
        $updates = [
            'woodenstaff' => $woodenstaff + 1, 
            'wood' => $wood - 7
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx wooden bo
    elseif ($craftingtable==$room && $crafting >= 1 && $hammer >=1 && $input=='craft wooden bo'  && $wood >=7) {
        echo $message = "You craft a WOODEN BO out of 7 wood<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET woodenbo = woodenbo + 1");
        // $results = $link->query("UPDATE $user SET wood = wood - 7");
        $updates = [
            'woodenbo' => $woodenbo + 1, 
            'wood' => $wood - 7
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx wooden shield
    elseif ($craftingtable==$room && $crafting >= 1 && $hammer >=1 && $input=='craft wooden shield' && $stone >=2 && $wood >=5) {
        echo $message = "You craft a WOODEN SHIELD out of 5 wood and 2 stone<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET woodenshield = woodenshield + 1");
        // $results = $link->query("UPDATE $user SET stone = stone - 2");
        // $results = $link->query("UPDATE $user SET wood = wood - 5");
        $updates = [
            'woodenshield' => $woodenshield + 1, 
            'stone' => $stone - 2, 
            'wood' => $wood - 5
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx wooden bow
    elseif ($craftingtable==$room && $crafting >= 1 && $hammer >=1 && $input=='craft wooden bow' && $string >=1 && $wood >=5) {
        echo $message = "You craft a WOODEN BOW out of 5 wood and 1 string<br>";
        include('update_feed.php'); // --- update feed
    //     $results = $link->query("UPDATE $user SET woodenbow = woodenbow + 1");
    //     $results = $link->query("UPDATE $user SET string = string - 1");
    //     $results = $link->query("UPDATE $user SET wood = wood - 5");
        $updates = [
            'woodenbow' => $woodenbow + 1, 
            'string' => $string - 1, 
            'wood' => $wood - 5
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx 10 arrows
    elseif ($craftingtable==$room && $crafting >= 1 && $hammer >=1 && $input=='craft 10 arrows' && $stone >=1 && $wood >=1) {
        echo $message = "You craft 10 ARROWS out of 1 wood and 1 stone<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET arrows = arrows + 10");
        // $results = $link->query("UPDATE $user SET stone = stone - 1");
        // $results = $link->query("UPDATE $user SET wood = wood - 1");
        $updates = [
            'arrows' => $arrows + 10, 
            'stone' => $stone - 1, 
            'wood' => $wood - 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx wooden boat
    elseif ($craftingtable==$room && $crafting >= 1 && $hammer >=1 && $input=='craft wooden boat'  && $wood >=20) {
        echo $message = "You craft a WOODEN BOAT out of 20 wood!<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET MOUNTwoodenboat = MOUNTwoodenboat + 1");
        // $results = $link->query("UPDATE $user SET wood = wood - 20");
        $updates = [
            'MOUNTwoodenboat' => $MOUNTwoodenboat + 1, 
            'wood' => $wood - 20
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }




    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT leather!!!
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx leather hood
    elseif ($craftingtable==$room && $crafting >= 1 && $input=='craft leather hood' && $hammer >=1 && $leather >=3) {
        echo $message = "You craft a LEATHER HOOD using 3 leather<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET leatherhood = leatherhood + 1");
        // $results = $link->query("UPDATE $user SET leather = leather - 3");
        $updates = [
            'leatherhood' => $leatherhood + 1, 
            'leather' => $leather - 3
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx leather helmet
    elseif ($craftingtable==$room && $crafting >= 1 && $input=='craft leather helmet' && $hammer >=1 && $leather >=5) {
        echo $message = "You craft a LEATHER HELMET using 5 leather<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET leatherhelmet = leatherhelmet + 1");
        // $results = $link->query("UPDATE $user SET leather = leather - 5");
        $updates = [
            'leatherhelmet' => $leatherhelmet + 1, 
            'leather' => $leather - 5
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx leather vest
    elseif ($craftingtable==$room && $crafting >= 1 && $input=='craft leather vest' && $hammer >=1 && $leather >=7) {
        echo $message = "You craft a LEATHER VEST using 7 leather<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET leathervest = leathervest + 1");
        // $results = $link->query("UPDATE $user SET leather = leather - 7");
        $updates = [
            'leathervest' => $leathervest + 1, 
            'leather' => $leather - 7
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx leather armor
    elseif ($craftingtable==$room && $crafting >= 1 && $input=='craft leather armor' && $hammer >=1 && $leather >=10) {
        echo $message = "You craft a LEATHER ARMOR using 10 leather<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET leatherarmor = leatherarmor + 1");
        // $results = $link->query("UPDATE $user SET leather = leather - 10");
        $updates = [
            'leatherarmor' => $leatherarmor + 1, 
            'leather' => $leather - 10
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx leather gloves
    elseif ($craftingtable==$room && $crafting >= 1 && $input=='craft leather gloves' && $hammer >=1 && $leather >=3) {
        echo $message = "You craft a LEATHER GLOVES using 3 leather<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET leathergloves = leathergloves + 1");
        // $results = $link->query("UPDATE $user SET leather = leather - 3");
        $updates = [
            'leathergloves' => $leathergloves + 1, 
            'leather' => $leather - 3
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx leather boots
    elseif ($craftingtable==$room && $crafting >= 1 && $input=='craft leather boots' && $hammer >=1 && $leather >=3) {
        echo $message = "You craft a LEATHER BOOTS using 3 leather<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET leatherboots = leatherboots + 1");
        // $results = $link->query("UPDATE $user SET leather = leather - 3");
        $updates = [
            'leatherboots' => $leatherboots + 1, 
            'leather' => $leather - 3
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }



    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT iron!!!
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron dagger
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron dagger' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=1 && $wood >=1) {
        echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON DAGGER</span> using 1 iron & 1 wood!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET irondagger = irondagger + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 1");
        // $results = $link->query("UPDATE $user SET wood = wood - 1");
        $updates = [
            'irondagger' => $irondagger + 1, 
            'iron' => $iron - 1, 
            'wood' => $wood - 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron sword
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron sword' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=7 && $wood >=1) {
        echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON SWORD</span> using 7 iron & 1 wood!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ironsword = ironsword + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 7");
        // $results = $link->query("UPDATE $user SET wood = wood - 1");
        $updates = [
            'ironsword' => $ironsword + 1, 
            'iron' => $iron - 7, 
            'wood' => $wood - 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron staff
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron staff' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=7 && $wood >=1) {
        echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON STAFF</span> using 7 iron & 1 wood!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ironstaff = ironstaff + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 7");
        // $results = $link->query("UPDATE $user SET wood = wood - 1");
        $updates = [
            'ironstaff' => $ironstaff + 1, 
            'iron' => $iron - 7, 
            'wood' => $wood - 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron maul
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron maul' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=10 && $wood >=1) {
        echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON MAUL</span> using 10 iron & 1 wood!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ironmaul = ironmaul + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 10");
        // $results = $link->query("UPDATE $user SET wood = wood - 1");
        $updates = [
            'ironmaul' => $ironmaul + 1, 
            'iron' => $iron - 10, 
            'wood' => $wood - 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron 2hsword
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron 2h sword' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=15 && $wood >=1) {
        echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON 2H SWORD</span> using 15 iron & 1 wood!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET iron2hsword = iron2hsword + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 15");
        // $results = $link->query("UPDATE $user SET wood = wood - 1");
        $updates = [
            'iron2hsword' => $iron2hsword + 1, 
            'iron' => $iron - 15, 
            'wood' => $wood - 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron battlestaff
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron battle staff' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=15 && $wood >=1) {
        echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON BATTLE STAFF</span> using 15 iron & 1 wood!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ironbattlestaff = ironbattlestaff + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 15");
        // $results = $link->query("UPDATE $user SET wood = wood - 1");
        $updates = [
            'ironbattlestaff' => $ironbattlestaff + 1, 
            'iron' => $iron - 15, 
            'wood' => $wood - 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron nunchaku
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron nunchaku' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=10 && $graymatter >=1) {
        echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON NUNCHAKU</span> using 10 iron & 1 gray matter!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ironnunchaku = ironnunchaku + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 10");
        // $results = $link->query("UPDATE $user SET graymatter = graymatter - 1");
        $updates = [
            'ironnunchaku' => $ironnunchaku + 1, 
            'iron' => $iron - 10, 
            'graymatter' => $graymatter - 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron boomerang
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron boomerang' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=5 && $wood >=1) {
        echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON BOOMERANG</span> using 5 iron & 1 wood!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ironboomerang = ironboomerang + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 5");
        // $results = $link->query("UPDATE $user SET wood = wood - 1");
        $updates = [
            'ironboomerang' => $ironboomerang + 1, 
            'iron' => $iron - 5, 
            'wood' => $wood - 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron bow
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron bow' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=7 && $wood >=1) {
        echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON BOW</span> using 7 iron & 1 wood!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ironbow = ironbow + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 7");
        // $results = $link->query("UPDATE $user SET wood = wood - 1");
        $updates = [
            'ironbow' => $ironbow + 1, 
            'iron' => $iron - 7, 
            'wood' => $wood - 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron crossbow
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron crossbow' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=10 && $wood >=1) {
        echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON CROSSBOW</span> using 10 iron & 1 wood!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ironcrossbow = ironcrossbow + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 10");
        // $results = $link->query("UPDATE $user SET wood = wood - 1");
        $updates = [
            'ironcrossbow' => $ironcrossbow + 1, 
            'iron' => $iron - 10, 
            'wood' => $wood - 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron chakram
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron chakram' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=7 && $graymatter >=1) {
        echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON CHAKRAM</span> using 7 iron & 1 gray matter!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ironchakram = ironchakram + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 7");
        // $results = $link->query("UPDATE $user SET graymatter = graymatter - 1");
        $updates = [
            'ironchakram' => $ironchakram + 1, 
            'iron' => $iron - 7, 
            'graymatter' => $graymatter - 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron shield
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron shield' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=10) {
        echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON SHIELD</span> using 10 iron!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ironshield = ironshield + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 10");
        $updates = [
            'ironshield' => $ironshield + 1, 
            'iron' => $iron - 10
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron kite shield
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron kite shield' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=15) {
        echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON KITE SHIELD</span> using 15 iron!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ironkiteshield = ironkiteshield + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 15");
        $updates = [
            'ironkiteshield' => $ironkiteshield + 1, 
            'iron' => $iron - 15
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron helmet
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron helmet' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=5) {
        echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON HELMET</span> using 5 iron!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ironhelmet = ironhelmet + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 5");
        $updates = [
            'ironhelmet' => $ironhelmet + 1, 
            'iron' => $iron - 5
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron hood
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron hood' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=3) {
        echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON HOOD</span> using 3 iron!</div>";
        include('update_feed.php'); // --- update feed
    //     $results = $link->query("UPDATE $user SET ironhood = ironhood + 1");
    //     $results = $link->query("UPDATE $user SET iron = iron - 3");
        $updates = [
            'ironhood' => $ironhood + 1, 
            'iron' => $iron - 3
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
     }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron armor
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron armor' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=10) {
        echo $message = "<div class='menuAction'>You craft some <span class='brown'>IRON ARMOR</span> using 10 iron!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ironarmor = ironarmor + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 10");
        $updates = [
            'ironarmor' => $ironarmor + 1, 
            'iron' => $iron - 10
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron cape
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron cape' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=7) {
        echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON CAPE</span> using 7 iron!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ironcape = ironcape + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 7");
        $updates = [
            'ironcape' => $ironcape + 1, 
            'iron' => $iron - 7
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron gauntlets
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron gauntlets' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=5) {
        echo $message = "<div class='menuAction'>You craft a pair of <span class='brown'>IRON GAUNTLETS</span> using 5 iron!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET irongauntlets = irongauntlets + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 5");
        $updates = [
            'irongauntlets' => $irongauntlets + 1, 
            'iron' => $iron - 5
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron gloves
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron gloves' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=3) {
        echo $message = "<div class='menuAction'>You craft a pair of <span class='brown'>IRON GLOVES</span> using 3 iron!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET irongloves = irongloves + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 3");
        $updates = [
            'irongloves' => $irongloves + 1, 
            'iron' => $iron - 3
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron boots
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron boots' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=3) {
        echo $message = "<div class='menuAction'>You craft a pair of <span class='brown'>IRON BOOTS</span> using 3 iron!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ironboots = ironboots + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 3");
        $updates = [
            'ironboots' => $ironboots + 1, 
            'iron' => $iron - 3
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }










    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron hatchet
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron hatchet' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=3 && $wood >=1) {
        echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON HATCHET</span> using 3 iron & 1 wood!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ironhatchet = ironhatchet + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 3");
        // $results = $link->query("UPDATE $user SET wood = wood - 1");
        $updates = [
            'ironhatchet' => $ironhatchet + 1,
            'iron' => $iron - 3,
            'wood' => $wood - 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron pickaxe
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron pickaxe' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=3 && $wood >=1) {
        echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON PICKAXE</span> using 3 iron & 1 wood!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ironpickaxe = ironpickaxe + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 3");
        // $results = $link->query("UPDATE $user SET wood = wood - 1");
        $updates = [
            'ironpickaxe' => $ironpickaxe + 1,
            'iron' => $iron - 3,
            'wood' => $wood - 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron hammer
    elseif ($craftingtable==$room && $crafting >= 2 && $input=='craft iron hammer' && $iron >=3 && $wood >=1) {
        echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON HAMMER</span> using 3 iron & 1 wood!</div>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ironhammer = ironhammer + 1");
        // $results = $link->query("UPDATE $user SET iron = iron - 3");
        // $results = $link->query("UPDATE $user SET wood = wood - 1");
        $updates = [
            'ironhammer' => $ironhammer + 1,
            'iron' => $iron - 3,
            'wood' => $wood - 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT rings!!!
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx rings II
    elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of strength II') && $hammer >=1 && $ringofstrength >=2) {
        echo $message = "You combine your 2 rings into a Ring of Strength II<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ringofstrength = ringofstrength - 2");
        // $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
        $updates = [
            'ringofstrength' => $ringofstrength - 2, 
            'ringofstrengthII' => $ringofstrengthII + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of dexterity II') && $hammer >=1 && $ringofdexterity >=2) {
        echo $message = "You combine your 2 rings into a Ring of Dexterity II<br>";
        include('update_feed.php'); // --- update feed
        $updates = [
            'ringofdexterity' => $ringofdexterity - 2,
            'ringofdexterityII' => $ringofdexterityII + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of magic II') && $hammer >=1 && $ringofmagic >=2) {
        echo $message = "You combine your 2 rings into a Ring of Magic II<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ringofmagic = ringofmagic - 2");
        // $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
        $updates = [
            'ringofmagic' => $ringofmagic - 2, 
            'ringofmagicII' => $ringofmagicII + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of defense II') && $hammer >=1 && $ringofdefense >=2) {
        echo $message = "You combine your 2 rings into a Ring of Defense II<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ringofdefense = ringofdefense - 2");
        // $results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1");
        $updates = [
            'ringofdefense' => $ringofdefense - 2, 
            'ringofdefenseII' => $ringofdefenseII + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx rings III
    elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of strength III') && $hammer >=1 && $ringofstrengthII >=2) {
        echo $message = "You combine your 2 rings into a Ring of Strength III<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII - 2");
        // $results = $link->query("UPDATE $user SET ringofstrengthIII = ringofstrengthIII + 1");
        $updates = [
            'ringofstrengthII' => $ringofstrengthII - 2, 
            'ringofstrengthIII' => $ringofstrengthIII + 1
        ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of dexterity III') && $hammer >=1 && $ringofdexterityII >=2) {
        echo $message = "You combine your 2 rings into a Ring of Dexterity III<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII - 2");
        // $results = $link->query("UPDATE $user SET ringofdexterityIII = ringofdexterityIII + 1");
        $updates = [
            'ringofdexterityII' => $ringofdexterityII - 2, 
            'ringofdexterityIII' => $ringofdexterityIII + 1
        ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of magic III') && $hammer >=1 && $ringofmagicII >=2) {
        echo $message = "You combine your 2 rings into a Ring of Magic III<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII - 2");
        // $results = $link->query("UPDATE $user SET ringofmagicIII = ringofmagicIII + 1");
        $updates = [
            'ringofmagicII' => $ringofmagicII - 2, 
            'ringofmagicIII' => $ringofmagicIII + 1
        ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of defense III') && $hammer >=1 && $ringofdefenseII >=2) {
        echo $message = "You combine your 2 rings into a Ring of Defense III<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII - 2");
        // $results = $link->query("UPDATE $user SET ringofdefenseIII = ringofdefenseIII + 1");
        $updates = [
            'ringofdefenseII' => $ringofdefenseII - 2, 
            'ringofdefenseIII' => $ringofdefenseIII + 1
        ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx rings IV
    elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of strength IV') && $hammer >=1 && $ringofstrengthIII >=2) {
        echo $message = "You combine your 2 rings into a Ring of Strength IV<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ringofstrengthIII = ringofstrengthIII - 2");
        // $results = $link->query("UPDATE $user SET ringofstrengthIV = ringofstrengthIV + 1");
        $updates = [
            'ringofstrengthIII' => $ringofstrengthIII - 2, 
            'ringofstrengthIV' => $ringofstrengthIV + 1
        ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of dexterity IV') && $hammer >=1 && $ringofdexterityIII >=2) {
        echo $message = "You combine your 2 rings into a Ring of Dexterity IV<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ringofdexterityIII = ringofdexterityIII - 2");
        // $results = $link->query("UPDATE $user SET ringofdexterityIV = ringofdexterityIV + 1");
        $updates = [
            'ringofdexterityIII' => $ringofdexterityIII - 2, 
            'ringofdexterityIV' => $ringofdexterityIV + 1
        ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of magic IV') && $hammer >=1 && $ringofmagicIII >=2) {
        echo $message = "You combine your 2 rings into a Ring of Magic IV<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ringofmagicIII = ringofmagicIII - 2");
        // $results = $link->query("UPDATE $user SET ringofmagicIV = ringofmagicIV + 1");
        $updates = [
            'ringofmagicIII' => $ringofmagicIII - 2, 
            'ringofmagicIV' => $ringofmagicIV + 1
        ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of defense IV') && $hammer >=1 && $ringofdefenseIII >=2) {
        echo $message = "You combine your 2 rings into a Ring of Defense IV<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ringofdefenseIII = ringofdefenseIII - 2");
        // $results = $link->query("UPDATE $user SET ringofdefenseIV = ringofdefenseIV + 1");
        $updates = [
            'ringofdefenseIII' => $ringofdefenseIII - 2, 
            'ringofdefenseIV' => $ringofdefenseIV + 1
        ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx rings V
    elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of strength V') && $hammer >=1 && $ringofstrengthIV >=2) {
        echo $message = "You combine your 2 rings into a Ring of Strength V<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ringofstrengthIV = ringofstrengthIV - 2");
        // $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
        $updates = [
            'ringofstrengthIV' => $ringofstrengthIV - 2, 
            'ringofstrengthV' => $ringofstrengthV + 1
        ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of dexterity V') && $hammer >=1 && $ringofdexterityIV >=2) {
        echo $message = "You combine your 2 rings into a Ring of Dexterity V<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ringofdexterityIV = ringofdexterityIV - 2");
        // $results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV + 1");
        $updates = [
            'ringofdexterityIV' => $ringofdexterityIV - 2, 
            'ringofdexterityV' => $ringofdexterityV + 1
        ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of magic V') && $hammer >=1 && $ringofmagicIV >=2) {
        echo $message = "You combine your 2 rings into a Ring of Magic V<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ringofmagicIV = ringofmagicIV - 2");
        // $results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1");
        $updates = [
            'ringofmagicIV' => $ringofmagicIV - 2, 
            'ringofmagicV' => $ringofmagicV + 1
        ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of defense V') && $hammer >=1 && $ringofdefenseIV >=2) {
        echo $message = "You combine your 2 rings into a Ring of Defense V<br>";
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET ringofdefenseIV = ringofdefenseIV - 2");
        // $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1");
        $updates = [
            'ringofdefenseIV' => $ringofdefenseIV - 2, 
            'ringofdefenseV' => $ringofdefenseV + 1
        ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
    }
        // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx rings VI
        elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of strength VI') && $hammer >=1 && $ringofstrengthV >=2) {
            echo $message = "You combine your 2 rings into a Ring of Strength VI<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV - 2");
            // $results = $link->query("UPDATE $user SET ringofstrengthVI = ringofstrengthVI + 1");
            $updates = [
                'ringofstrengthV' => $ringofstrengthV - 2, 
                'ringofstrengthVI' => $ringofstrengthVI + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
            } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of dexterity VI') && $hammer >=1 && $ringofdexterityV >=2) {
            echo $message = "You combine your 2 rings into a Ring of Dexterity VI<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV - 2");
            // $results = $link->query("UPDATE $user SET ringofdexterityVI = ringofdexterityVI + 1");
            $updates = [
                'ringofdexterityV' => $ringofdexterityV - 2, 
                'ringofdexterityVI' => $ringofdexterityVI + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
            } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of magic VI') && $hammer >=1 && $ringofmagicV >=2) {
            echo $message = "You combine your 2 rings into a Ring of Magic VI<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV - 2");
            // $results = $link->query("UPDATE $user SET ringofmagicVI = ringofmagicVI + 1");
            $updates = [
                'ringofmagicV' => $ringofmagicV - 2, 
                'ringofmagicVI' => $ringofmagicVI + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
            } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of defense VI') && $hammer >=1 && $ringofdefenseV >=2) {
            echo $message = "You combine your 2 rings into a Ring of Defense VI<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV - 2");
            // $results = $link->query("UPDATE $user SET ringofdefenseVI = ringofdefenseVI + 1");
            $updates = [
                'ringofdefenseV' => $ringofdefenseV - 2, 
                'ringofdefenseVI' => $ringofdefenseVI + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
            }
        // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx rings VII
        elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of strength VII') && $hammer >=1 && $ringofstrengthVI >=2) {
            echo $message = "You combine your 2 rings into a Ring of Strength VII<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofstrengthVI = ringofstrengthVI - 2");
            // $results = $link->query("UPDATE $user SET ringofstrengthVII = ringofstrengthVII + 1");
            $updates = [
                'ringofstrengthVI' => $ringofstrengthVI - 2, 
                'ringofstrengthVII' => $ringofstrengthVII + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
                    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of dexterity VII') && $hammer >=1 && $ringofdexterityVI >=2) {
            echo $message = "You combine your 2 rings into a Ring of Dexterity VII<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofdexterityVI = ringofdexterityVI - 2");
            // $results = $link->query("UPDATE $user SET ringofdexterityVII = ringofdexterityVII + 1");
            $updates = [
                'ringofdexterityVI' => $ringofdexterityVI - 2, 
                'ringofdexterityVII' => $ringofdexterityVII + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
                    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of magic VII') && $hammer >=1 && $ringofmagicVI >=2) {
            echo $message = "You combine your 2 rings into a Ring of Magic VII<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofmagicVI = ringofmagicVI - 2");
            // $results = $link->query("UPDATE $user SET ringofmagicVII = ringofmagicVII + 1");
            $updates = [
                'ringofmagicVI' => $ringofmagicVI - 2, 
                'ringofmagicVII' => $ringofmagicVII + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
                    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of defense VII') && $hammer >=1 && $ringofdefenseVI >=2) {
            echo $message = "You combine your 2 rings into a Ring of Defense VII<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofdefenseVI = ringofdefenseVI - 2");
            // $results = $link->query("UPDATE $user SET ringofdefenseVII = ringofdefenseVII + 1");
            $updates = [
                'ringofdefenseVI' => $ringofdefenseVI - 2, 
                'ringofdefenseVII' => $ringofdefenseVII + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
                    }
        // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx rings VIII
        elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of strength VIII') && $hammer >=1 && $ringofstrengthVII >=2) {
            echo $message = "You combine your 2 rings into a Ring of Strength VIII<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofstrengthVII = ringofstrengthVII - 2");
            // $results = $link->query("UPDATE $user SET ringofstrengthVIII = ringofstrengthVIII + 1");
            $updates = [
                'ringofstrengthVII' => $ringofstrengthVII - 2, 
                'ringofstrengthVIII' => $ringofstrengthVIII + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
            } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of dexterity VIII') && $hammer >=1 && $ringofdexterityVII >=2) {
            echo $message = "You combine your 2 rings into a Ring of Dexterity VIII<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofdexterityVII = ringofdexterityVII - 2");
            // $results = $link->query("UPDATE $user SET ringofdexterityVIII = ringofdexterityVIII + 1");
            $updates = [
                'ringofdexterityVII' => $ringofdexterityVII - 2, 
                'ringofdexterityVIII' => $ringofdexterityVIII + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
            } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of magic VIII') && $hammer >=1 && $ringofmagicVII >=2) {
            echo $message = "You combine your 2 rings into a Ring of Magic VIII<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofmagicVII = ringofmagicVII - 2");
            // $results = $link->query("UPDATE $user SET ringofmagicVIII = ringofmagicVIII + 1");
            $updates = [
                'ringofmagicVII' => $ringofmagicVII - 2, 
                'ringofmagicVIII' => $ringofmagicVIII + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
            } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of defense VIII') && $hammer >=1 && $ringofdefenseVII >=2) {
            echo $message = "You combine your 2 rings into a Ring of Defense VIII<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofdefenseVII = ringofdefenseVII - 2");
            // $results = $link->query("UPDATE $user SET ringofdefenseVIII = ringofdefenseVIII + 1");
            $updates = [
                'ringofdefenseVII' => $ringofdefenseVII - 2, 
                'ringofdefenseVIII' => $ringofdefenseVIII + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
            }
              // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx rings IX
              elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of strength IX') && $hammer >=1 && $ringofstrengthVIII >=2) {
                echo $message = "You combine your 2 rings into a Ring of Strength IX<br>";
                include('update_feed.php'); // --- update feed
                // $results = $link->query("UPDATE $user SET ringofstrengthVIII = ringofstrengthVIII - 2");
                // $results = $link->query("UPDATE $user SET ringofstrengthIX = ringofstrengthIX + 1");
                $updates = [
                    'ringofstrengthVIII' => $ringofstrengthVIII - 2, 
                    'ringofstrengthIX' => $ringofstrengthIX + 1
                ]; // -- set changes
                updateStats($link, $username, $updates); // -- apply changes
                include('update_feed.php'); // --- update feed
                    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of dexterity IX') && $hammer >=1 && $ringofdexterityVIII >=2) {
                echo $message = "You combine your 2 rings into a Ring of Dexterity IX<br>";
                include('update_feed.php'); // --- update feed
                // $results = $link->query("UPDATE $user SET ringofdexterityVIII = ringofdexterityVIII - 2");
                // $results = $link->query("UPDATE $user SET ringofdexterityIX = ringofdexterityIX + 1");
                $updates = [
                    'ringofdexterityVIII' => $ringofdexterityVIII - 2, 
                    'ringofdexterityIX' => $ringofdexterityIX + 1
                ]; // -- set changes
                updateStats($link, $username, $updates); // -- apply changes
                include('update_feed.php'); // --- update feed
                    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of magic IX') && $hammer >=1 && $ringofmagicVIII >=2) {
                echo $message = "You combine your 2 rings into a Ring of Magic IX<br>";
                include('update_feed.php'); // --- update feed
                // $results = $link->query("UPDATE $user SET ringofmagicVIII = ringofmagicVIII - 2");
                // $results = $link->query("UPDATE $user SET ringofmagicIX = ringofmagicIX + 1");
                $updates = [
                    'ringofmagicVIII' => $ringofmagicVIII - 2, 
                    'ringofmagicIX' => $ringofmagicIX + 1
                ]; // -- set changes
                updateStats($link, $username, $updates); // -- apply changes
                include('update_feed.php'); // --- update feed
                    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of defense IX') && $hammer >=1 && $ringofdefenseVIII >=2) {
                echo $message = "You combine your 2 rings into a Ring of Defense IX<br>";
                include('update_feed.php'); // --- update feed
                // $results = $link->query("UPDATE $user SET ringofdefenseVIII = ringofdefenseVIII - 2");
                // $results = $link->query("UPDATE $user SET ringofdefenseIX = ringofdefenseIX + 1");
                $updates = [
                    'ringofdefenseVIII' => $ringofdefenseVIII - 2, 
                    'ringofdefenseIX' => $ringofdefenseIX + 1
                ]; // -- set changes
                updateStats($link, $username, $updates); // -- apply changes
                include('update_feed.php'); // --- update feed
                    }
            // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx rings X
            elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of strength X') && $hammer >=1 && $ringofstrengthIX >=2) {
            echo $message = "You combine your 2 rings into a Ring of Strength X<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofstrengthIX = ringofstrengthIX - 2");
            // $results = $link->query("UPDATE $user SET ringofstrengthX = ringofstrengthX + 1");
            $updates = [
                'ringofstrengthIX' => $ringofstrengthIX - 2, 
                'ringofstrengthX' => $ringofstrengthX + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
            } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of dexterity X') && $hammer >=1 && $ringofdexterityIX >=2) {
            echo $message = "You combine your 2 rings into a Ring of Dexterity X<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofdexterityIX = ringofdexterityIX - 2");
            // $results = $link->query("UPDATE $user SET ringofdexterityX = ringofdexterityX + 1");
            $updates = [
                'ringofdexterityIX' => $ringofdexterityIX - 2, 
                'ringofdexterityX' => $ringofdexterityX + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
            } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of magic X') && $hammer >=1 && $ringofmagicIX >=2) {
            echo $message = "You combine your 2 rings into a Ring of Magic X<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofmagicIX = ringofmagicIX - 2");
            // $results = $link->query("UPDATE $user SET ringofmagicX = ringofmagicX + 1");
            $updates = [
                'ringofmagicIX' => $ringofmagicIX - 2, 
                'ringofmagicX' => $ringofmagicX + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
            } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of defense X') && $hammer >=1 && $ringofdefenseIX >=2) {
            echo $message = "You combine your 2 rings into a Ring of Defense X<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofdefenseIX = ringofdefenseIX - 2");
            // $results = $link->query("UPDATE $user SET ringofdefenseX = ringofdefenseX + 1");
            $updates = [
                'ringofdefenseIX' => $ringofdefenseIX - 2, 
                'ringofdefenseX' => $ringofdefenseX + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
            }
        // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx rings XI
            elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of strength XI') && $hammer >=1 && $ringofstrengthX >=2) {
            echo $message = "You combine your 2 rings into a Ring of Strength XI<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofstrengthX = ringofstrengthX - 2");
            // $results = $link->query("UPDATE $user SET ringofstrengthXI = ringofstrengthXI + 1");
            $updates = [
                'ringofstrengthX' => $ringofstrengthX - 2, 
                'ringofstrengthXI' => $ringofstrengthXI + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
            } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of dexterity XI') && $hammer >=1 && $ringofdexterityX >=2) {
            echo $message = "You combine your 2 rings into a Ring of Dexterity XI<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofdexterityX = ringofdexterityX - 2");
            // $results = $link->query("UPDATE $user SET ringofdexterityXI = ringofdexterityXI + 1");
            $updates = [
                'ringofdexterityX' => $ringofdexterityX - 2, 
                'ringofdexterityXI' => $ringofdexterityXI + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
            } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of magic XI') && $hammer >=1 && $ringofmagicX >=2) {
            echo $message = "You combine your 2 rings into a Ring of Magic XI<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofmagicX = ringofmagicX - 2");
            // $results = $link->query("UPDATE $user SET ringofmagicXI = ringofmagicXI + 1");
            $updates = [
                'ringofmagicX' => $ringofmagicX - 2, 
                'ringofmagicXI' => $ringofmagicXI + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
            } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of defense XI') && $hammer >=1 && $ringofdefenseX >=2) {
            echo $message = "You combine your 2 rings into a Ring of Defense XI<br>";
            include('update_feed.php'); // --- update feed
            // $results = $link->query("UPDATE $user SET ringofdefenseX = ringofdefenseX - 2");
            // $results = $link->query("UPDATE $user SET ringofdefenseXI = ringofdefenseXI + 1");
            $updates = [
                'ringofdefenseX' => $ringofdefenseX - 2, 
                'ringofdefenseXI' => $ringofdefenseXI + 1
            ]; // -- set changes
            updateStats($link, $username, $updates); // -- apply changes
            }










    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx rings of regen
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx rings of regen
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx rings of regen
    elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of health regen II') && $hammer >=1 && $ringofhealthregen >=2) {
        echo $message = "You combine your 2 rings into a Ring of Health Regen II<br>";
        // $results = $link->query("UPDATE $user SET ringofhealthregen = ringofhealthregen - 2");
        // $results = $link->query("UPDATE $user SET ringofhealthregenII = ringofhealthregenII + 1");
        include('update_feed.php'); // --- update feed
        $updates = [
            'ringofhealthregen' => $ringofhealthregen - 2, 
            'ringofhealthregenII' => $ringofhealthregenII + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of mana regen II') && $hammer >=1 && $ringofmanaregen >=2) {
        echo $message = "You combine your 2 rings into a Ring of Mana Regen II<br>";
        // $results = $link->query("UPDATE $user SET ringofmanaregen = ringofmanaregen - 2");
        // $results = $link->query("UPDATE $user SET ringofmanaregenII = ringofmanaregenII + 1");
        include('update_feed.php'); // --- update feed
        $updates = [
            'ringofmanaregen' => $ringofmanaregen - 2, 
            'ringofmanaregenII' => $ringofmanaregenII + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of health regen III') && $hammer >=1 && $ringofhealthregenII >=2) {
        echo $message = "You combine your 2 rings into a Ring of Health Regen III<br>";
        // $results = $link->query("UPDATE $user SET ringofhealthregenII = ringofhealthregenII - 2");
        // $results = $link->query("UPDATE $user SET ringofhealthregenIII = ringofhealthregenIII + 1");
        include('update_feed.php'); // --- update feed
        $updates = [
            'ringofhealthregenII' => $ringofhealthregenII - 2, 
            'ringofhealthregenIII' => $ringofhealthregenIII + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of mana regen III') && $hammer >=1 && $ringofmanaregenII >=2) {
        echo $message = "You combine your 2 rings into a Ring of Mana Regen III<br>";
        // $results = $link->query("UPDATE $user SET ringofmanaregenII = ringofmanaregenII - 2");
        // $results = $link->query("UPDATE $user SET ringofmanaregenIII = ringofmanaregenIII + 1");
        include('update_feed.php'); // --- update feed
        $updates = [
            'ringofmanaregenII' => $ringofmanaregenII - 2, 
            'ringofmanaregenIII' => $ringofmanaregenIII + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of health regen IV') && $hammer >=1 && $ringofhealthregenIII >=2) {
        echo $message = "You combine your 2 rings into a Ring of Health Regen IV<br>";
        // $results = $link->query("UPDATE $user SET ringofhealthregenIII = ringofhealthregenIII - 2");
        // $results = $link->query("UPDATE $user SET ringofhealthregenIV = ringofhealthregenIV + 1");
        include('update_feed.php'); // --- update feed
        $updates = [
            'ringofhealthregenIII' => $ringofhealthregenIII - 2, 
            'ringofhealthregenIV' => $ringofhealthregenIV + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of mana regen IV') && $hammer >=1 && $ringofmanaregenIII >=2) {
        echo $message = "You combine your 2 rings into a Ring of Mana Regen IV<br>";
        // $results = $link->query("UPDATE $user SET ringofmanaregenIII = ringofmanaregenIII - 2");
        // $results = $link->query("UPDATE $user SET ringofmanaregenIV = ringofmanaregenIV + 1");
        include('update_feed.php'); // --- update feed
        $updates = [
            'ringofmanaregenIII' => $ringofmanaregenIII - 2, 
            'ringofmanaregenIV' => $ringofmanaregenIV + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of health regen V') && $hammer >=1 && $ringofhealthregenIV >=2) {
        echo $message = "You combine your 2 rings into a Ring of Health Regen V<br>";
        // $results = $link->query("UPDATE $user SET ringofhealthregenIV = ringofhealthregenIV - 2");
        // $results = $link->query("UPDATE $user SET ringofhealthregenV = ringofhealthregenV + 1");
        include('update_feed.php'); // --- update feed
        $updates = [
            'ringofhealthregenIV' => $ringofhealthregenIV - 2, 
            'ringofhealthregenV' => $ringofhealthregenV + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of mana regen V') && $hammer >=1 && $ringofmanaregenIV >=2) {
        echo $message = "You combine your 2 rings into a Ring of Mana Regen V<br>";
        // $results = $link->query("UPDATE $user SET ringofmanaregenIV = ringofmanaregenIV - 2");
        // $results = $link->query("UPDATE $user SET ringofmanaregenV = ringofmanaregenV + 1");
        include('update_feed.php'); // --- update feed
        $updates = [
            'ringofmanaregenIV' => $ringofmanaregenIV - 2, 
            'ringofmanaregenV' => $ringofmanaregenV + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of health regen VI') && $hammer >=1 && $ringofhealthregenV >=2) {
        echo $message = "You combine your 2 rings into a Ring of Health Regen VI<br>";
        // $results = $link->query("UPDATE $user SET ringofhealthregenV = ringofhealthregenV - 2");
        // $results = $link->query("UPDATE $user SET ringofhealthregenVI = ringofhealthregenVI + 1");
        include('update_feed.php'); // --- update feed
        $updates = [
            'ringofhealthregenV' => $ringofhealthregenV - 2, 
            'ringofhealthregenVI' => $ringofhealthregenVI + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($craftingtable==$room && $crafting >= 1 && ($input == 'auto combine' || $input=='craft ring of mana regen VI') && $hammer >=1 && $ringofmanaregenV >=2) {
        echo $message = "You combine your 2 rings into a Ring of Mana Regen VI<br>";
        // $results = $link->query("UPDATE $user SET ringofmanaregenV = ringofmanaregenV - 2");
        // $results = $link->query("UPDATE $user SET ringofmanaregenVI = ringofmanaregenVI + 1");
        include('update_feed.php'); // --- update feed
        $updates = [
            'ringofmanaregenV' => $ringofmanaregenV - 2, 
            'ringofmanaregenVI' => $ringofmanaregenVI + 1
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    elseif ($input == 'auto combine'){
        echo $message = "<i>You have no rings to combine.</i><br>";
        include('update_feed.php'); // --- update feed
        $input='NOTautocombine'; // prevents auto combine from showing
    }


    if ($input == 'auto combine') {
        echo $message = "
        <form id='mainForm' method='post' action='' name='formInput'>
        <button type='submit' name='input1' class='goldBG' value='auto combine'>Combine Again</button>
        </form>";
        include('update_feed_alt.php'); // --- update feed
    }



// } // END CRAFT FUNTIONS

