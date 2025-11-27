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



    // --------------------------------------------------------------------------- get starter pack

    if ($input=='get starter pack' || $input=='starter pack' || $input=='starterpack') {
        if ($row['towershield']>=1)
        {
            echo $message="<p class='gold'>You already redeemed your STARTPACK.</p>";
            include('update_feed.php'); // --- update feed
        }
        else {
        echo $message="<p class='white'>CHEAT ACTIVATED!</p>
        <h4 class='gold'>You pull a STARTER PACK out your ass! Talented.</h4>
        <p>+ Morning Star</p>
        <p>+ Tower Shield</p>
        <p>+ Crossbow, + 100 bolts</p>
        <p>+ Ring of Defense V</p>
        <p>+ 5000 coin</p>
        <a href='' data-link='inv' class='btn greenBG'>Open Inv</a>";
        include('update_feed.php'); // --- update feed
        $results = $link->query("UPDATE $user SET morningstar = 1");
        $results = $link->query("UPDATE $user SET towershield = 1");
        $results = $link->query("UPDATE $user SET crossbow = 1");
        $results = $link->query("UPDATE $user SET bolts = 100");
        $results = $link->query("UPDATE $user SET ringofdefenseV = 1");
        $results = $link->query("UPDATE $user SET currency = currency + 5000");
        }
    }

        

// --------------------------------------------------------------------------- supercharge HP & MP
    if ($input=="hp100") {
        $results = $link->query("UPDATE $user SET hpmax = 100");
        $results = $link->query("UPDATE $user SET mpmax = 100");
        $message = 'HP 100 MP 100!';
        include('update_feed.php'); // --- update feed
    }
    // --------------------------------------------------------------------------- supercharge HP & MP
    if ($input=="supercharge") {
        $results = $link->query("UPDATE $user SET hp = hpmax + 100");
        $results = $link->query("UPDATE $user SET mp = mpmax + 1");
        $message = 'SUPERCHARGE CHEAT!';
        include('update_feed.php'); // --- update feed
    }
        // --------------------------------------------------------------------------- XP bonus
        if ($input=="free xp") {
            $results = $link->query("UPDATE $user SET xp = xp + 100");
            $message = 'FREE XP CHEAT!';
            include('update_feed.php'); // --- update feed
        }
    // --------------------------------------------------------------------------- reset quests
    elseif ($input=="reset quests") {
        echo 'you reset all your quests';
        $results = $link->query("UPDATE $user SET quest1 = 0");
        $results = $link->query("UPDATE $user SET flower = 0");
        $results = $link->query("UPDATE $user SET KLdummy = 0");
        $results = $link->query("UPDATE $user SET KLgiantrat = 0");
        $results = $link->query("UPDATE $user SET quest2 = 0");
        $results = $link->query("UPDATE $user SET quest3 = 0");
        $results = $link->query("UPDATE $user SET quest4 = 0");
        $results = $link->query("UPDATE $user SET eqiupR = fists");

        $results = $link->query("UPDATE $user SET quest5 = 0");
        $results = $link->query("UPDATE $user SET quest6 = 0");
        $results = $link->query("UPDATE $user SET quest7 = 0");
        $results = $link->query("UPDATE $user SET quest8 = 0");
        $results = $link->query("UPDATE $user SET quest9 = 0");

        $results = $link->query("UPDATE $user SET quest10 = 0");
        $results = $link->query("UPDATE $user SET quest11 = 0");
        $results = $link->query("UPDATE $user SET quest12 = 0");
        $results = $link->query("UPDATE $user SET quest13 = 0");
        $results = $link->query("UPDATE $user SET quest14 = 0");
        $results = $link->query("UPDATE $user SET quest15 = 0");
        $results = $link->query("UPDATE $user SET quest16 = 0");
        $results = $link->query("UPDATE $user SET quest17 = 0");
        $results = $link->query("UPDATE $user SET quest18 = 0");
        $results = $link->query("UPDATE $user SET quest19 = 0");

        $results = $link->query("UPDATE $user SET quest20 = 0");
        $results = $link->query("UPDATE $user SET quest21 = 0");
        $results = $link->query("UPDATE $user SET quest22 = 0");
        $results = $link->query("UPDATE $user SET quest23 = 0");
        $results = $link->query("UPDATE $user SET quest24 = 0");
        $results = $link->query("UPDATE $user SET quest25 = 0");
        $results = $link->query("UPDATE $user SET quest26 = 0");
        $results = $link->query("UPDATE $user SET quest27 = 0");
        $results = $link->query("UPDATE $user SET quest28 = 0");
        $results = $link->query("UPDATE $user SET quest29 = 0");

        $results = $link->query("UPDATE $user SET quest30 = 0");
        $results = $link->query("UPDATE $user SET quest31 = 0");
        $results = $link->query("UPDATE $user SET quest32 = 0");
        $results = $link->query("UPDATE $user SET quest33 = 0");
        $results = $link->query("UPDATE $user SET quest34 = 0");
        $results = $link->query("UPDATE $user SET quest35 = 0");
        $results = $link->query("UPDATE $user SET quest36 = 0");
        $results = $link->query("UPDATE $user SET quest37 = 0");
        $results = $link->query("UPDATE $user SET quest38 = 0");
        $results = $link->query("UPDATE $user SET quest39 = 0");

        $results = $link->query("UPDATE $user SET quest40 = 0");
        $results = $link->query("UPDATE $user SET quest41 = 0");
        $results = $link->query("UPDATE $user SET quest42 = 0");
        $results = $link->query("UPDATE $user SET quest43 = 0");
        $results = $link->query("UPDATE $user SET quest44 = 0");
        $results = $link->query("UPDATE $user SET quest45 = 0");
        $results = $link->query("UPDATE $user SET quest46 = 0");
        $results = $link->query("UPDATE $user SET quest47 = 0");
        $results = $link->query("UPDATE $user SET quest48 = 0");
        $results = $link->query("UPDATE $user SET quest49 = 0");

        $results = $link->query("UPDATE $user SET quest50 = 0");
        $results = $link->query("UPDATE $user SET quest51 = 0");
        $results = $link->query("UPDATE $user SET quest52 = 0");
        $results = $link->query("UPDATE $user SET quest53 = 0");
        $results = $link->query("UPDATE $user SET quest54 = 0");
        $results = $link->query("UPDATE $user SET quest55 = 0");
        $results = $link->query("UPDATE $user SET quest56 = 0");
        $results = $link->query("UPDATE $user SET quest57 = 0");
        $results = $link->query("UPDATE $user SET quest58 = 0");
        $results = $link->query("UPDATE $user SET quest59 = 0");

        $results = $link->query("UPDATE $user SET quest60 = 0");
        $results = $link->query("UPDATE $user SET quest61 = 0");
        $results = $link->query("UPDATE $user SET quest62 = 0");
        $results = $link->query("UPDATE $user SET quest63 = 0");
        $results = $link->query("UPDATE $user SET quest64 = 0");
        $results = $link->query("UPDATE $user SET quest65 = 0");
        $results = $link->query("UPDATE $user SET quest66 = 0");
        $results = $link->query("UPDATE $user SET quest67 = 0");
        $results = $link->query("UPDATE $user SET quest68 = 0");
        $results = $link->query("UPDATE $user SET quest69 = 0");

        $results = $link->query("UPDATE $user SET quest70 = 0");
        $results = $link->query("UPDATE $user SET quest71 = 0");
        $results = $link->query("UPDATE $user SET quest72 = 0");
        $results = $link->query("UPDATE $user SET quest73 = 0");
        $results = $link->query("UPDATE $user SET quest74 = 0");
        $results = $link->query("UPDATE $user SET quest75 = 0");
        $results = $link->query("UPDATE $user SET quest76 = 0");
        $results = $link->query("UPDATE $user SET quest77 = 0");
        $results = $link->query("UPDATE $user SET quest78 = 0");
        $results = $link->query("UPDATE $user SET quest79 = 0");
        $message = 'RESET QUESTS CHEAT!';
        include('update_feed.php'); // --- update feed
    }
    // --------------------------------------------------------------------------- all quests 1 (START)
    elseif ($input=="all quests start") {
        echo 'you start all your quests - to test!!!';
        $results = $link->query("UPDATE $user SET quest1 = 1");
        $results = $link->query("UPDATE $user SET quest2 = 1");
        $results = $link->query("UPDATE $user SET quest3 = 1");
        $results = $link->query("UPDATE $user SET quest4 = 1");
        $results = $link->query("UPDATE $user SET quest5 = 1");
        $results = $link->query("UPDATE $user SET quest6 = 1");
        $results = $link->query("UPDATE $user SET quest7 = 1");
        $results = $link->query("UPDATE $user SET quest8 = 1");
        $results = $link->query("UPDATE $user SET quest9 = 1");

        $results = $link->query("UPDATE $user SET quest10 = 1");
        $results = $link->query("UPDATE $user SET quest11 = 1");
        $results = $link->query("UPDATE $user SET quest12 = 1");
        $results = $link->query("UPDATE $user SET quest13 = 1");
        $results = $link->query("UPDATE $user SET quest14 = 1");
        $results = $link->query("UPDATE $user SET quest15 = 1");
        $results = $link->query("UPDATE $user SET quest16 = 1");
        $results = $link->query("UPDATE $user SET quest17 = 1");
        $results = $link->query("UPDATE $user SET quest18 = 1");
        $results = $link->query("UPDATE $user SET quest19 = 1");

        $results = $link->query("UPDATE $user SET quest20 = 1");
        $results = $link->query("UPDATE $user SET quest21 = 1");
        $results = $link->query("UPDATE $user SET quest22 = 1");
        $results = $link->query("UPDATE $user SET quest23 = 1");
        $results = $link->query("UPDATE $user SET quest24 = 1");
        $results = $link->query("UPDATE $user SET quest25 = 1");
        $results = $link->query("UPDATE $user SET quest26 = 1");
        $results = $link->query("UPDATE $user SET quest27 = 1");
        $results = $link->query("UPDATE $user SET quest28 = 1");
        $results = $link->query("UPDATE $user SET quest29 = 1");

        $results = $link->query("UPDATE $user SET quest30 = 1");
        $results = $link->query("UPDATE $user SET quest31 = 1");
        $results = $link->query("UPDATE $user SET quest32 = 1");
        $results = $link->query("UPDATE $user SET quest33 = 1");
        $results = $link->query("UPDATE $user SET quest34 = 1");
        $results = $link->query("UPDATE $user SET quest35 = 1");
        $results = $link->query("UPDATE $user SET quest36 = 1");
        $results = $link->query("UPDATE $user SET quest37 = 1");
        $results = $link->query("UPDATE $user SET quest38 = 1");
        $results = $link->query("UPDATE $user SET quest39 = 1");

        $results = $link->query("UPDATE $user SET quest40 = 1");
        $results = $link->query("UPDATE $user SET quest41 = 1");
        $results = $link->query("UPDATE $user SET quest42 = 1");
        $results = $link->query("UPDATE $user SET quest43 = 1");
        $results = $link->query("UPDATE $user SET quest44 = 1");
        $results = $link->query("UPDATE $user SET quest45 = 1");
        $results = $link->query("UPDATE $user SET quest46 = 1");
        $results = $link->query("UPDATE $user SET quest47 = 1");
        $results = $link->query("UPDATE $user SET quest48 = 1");
        $results = $link->query("UPDATE $user SET quest49 = 1");

        $message = 'ALL QUESTS START CHEAT!';
        include('update_feed.php'); // --- update feed
    }

/*
    $results = $link->query("UPDATE $user SET quest1 = 0");
    $results = $link->query("UPDATE $user SET quest2 = 0");
    $results = $link->query("UPDATE $user SET quest3 = 0");
    $results = $link->query("UPDATE $user SET quest4 = 0");
    $results = $link->query("UPDATE $user SET quest5 = 0");
    $results = $link->query("UPDATE $user SET quest6 = 0");
    $results = $link->query("UPDATE $user SET quest7 = 0");
    $results = $link->query("UPDATE $user SET quest8 = 0");
    $results = $link->query("UPDATE $user SET quest9 = 0");
    $results = $link->query("UPDATE $user SET quest10 = 0");
    */

    // --------------------------------------------------------------------------- get master blade

    elseif ($input=='get master blade' || $input=='get blade') {
        echo 'You pull a master blade from the heavens!';
        $message="<i>You pull a master blade from the heavens!</i><br>";
        include('update_feed.php'); // --- update feed
        $results = $link->query("UPDATE $user SET masterblade = 1");
    }


    // --------------------------------------------------------------------------- complete quests 1-7
    elseif ($input=="complete quests 1-7") {
        echo 'You Complete 1 - 7';
        $results = $link->query("UPDATE $user SET quest1 = 2");
        $results = $link->query("UPDATE $user SET quest2 = 2");
        $results = $link->query("UPDATE $user SET quest3 = 2");
        $results = $link->query("UPDATE $user SET quest4 = 2");
        $results = $link->query("UPDATE $user SET quest5 = 2");
        $results = $link->query("UPDATE $user SET quest6 = 2");
        $results = $link->query("UPDATE $user SET crafting = crafting + 1");
        $results = $link->query("UPDATE $user SET goldkey = goldkey + 1");
     //   $results = $link->query("UPDATE $user SET quest7 = 2");

        $message = 'COMPLETE MISSIONS (1-7) CHEAT!';
        include('update_feed.php'); // --- update feed
    }

    // --------------------------------------------------------------------------- ZERO OUT STATS

    elseif ($input=="zero stat") {
        $results = $link->query("UPDATE $user SET str = 0");
        $results = $link->query("UPDATE $user SET dex = 0");
        $results = $link->query("UPDATE $user SET mag = 0");
        $results = $link->query("UPDATE $user SET def = 0");
        $message = '[CHEAT] YOU ZERO OUT YOUR STATS!';
        include('update_feed.php'); // --- update feed
    }

    // --------------------------------------------------------------------------- FREE STUFF
    elseif ($input=="free stuff") {
        // --------------------------------------------------------------------------- FREE 1h
        $results = $link->query("UPDATE $user SET dagger = 1");
        $results = $link->query("UPDATE $user SET trainingsword = 1");
        $results = $link->query("UPDATE $user SET shortsword = 1");
        $results = $link->query("UPDATE $user SET broadsword = 1");
        $results = $link->query("UPDATE $user SET mace = 1");
        $results = $link->query("UPDATE $user SET longsword = 1");
        $results = $link->query("UPDATE $user SET club = 1");
        $results = $link->query("UPDATE $user SET flail = 1");
        $results = $link->query("UPDATE $user SET morningstar = 1");
        $results = $link->query("UPDATE $user SET samuraisword = 1");
        $results = $link->query("UPDATE $user SET gladius = 1");

        $results = $link->query("UPDATE $user SET basicstaff = 1");
        $results = $link->query("UPDATE $user SET woodenstaff = 1");
        $results = $link->query("UPDATE $user SET wand = 1");
        $results = $link->query("UPDATE $user SET wizardstaff = 1");
        $results = $link->query("UPDATE $user SET demondagger = 1");
        $results = $link->query("UPDATE $user SET graywand = 1");
        $results = $link->query("UPDATE $user SET threechainedflail = 1");
        $results = $link->query("UPDATE $user SET bastardsword = 1");
        $results = $link->query("UPDATE $user SET giantclub = 1");
        $results = $link->query("UPDATE $user SET greatwhitesword = 1");
        $results = $link->query("UPDATE $user SET masterblade = 1");
        // ----------
        $results = $link->query("UPDATE $user SET irondagger = 1");
        $results = $link->query("UPDATE $user SET ironsword = 1");
        $results = $link->query("UPDATE $user SET ironstaff = 1");
        $results = $link->query("UPDATE $user SET poisonsaber = 1");
        $results = $link->query("UPDATE $user SET ulfberht = 1");
        $results = $link->query("UPDATE $user SET axeofslaughter = 1");

        $results = $link->query("UPDATE $user SET silversword = 1");
        $results = $link->query("UPDATE $user SET silverstaff = 1");
        $results = $link->query("UPDATE $user SET steeldagger = 1");
        $results = $link->query("UPDATE $user SET steelsword = 1");
        $results = $link->query("UPDATE $user SET steelstaff = 1");
        $results = $link->query("UPDATE $user SET silverwhip = 1");
        $results = $link->query("UPDATE $user SET sharpkatana = 1");
        $results = $link->query("UPDATE $user SET staffofthescorpion = 1");
        $results = $link->query("UPDATE $user SET forestsaber = 1");
        $results = $link->query("UPDATE $user SET blackblade = 1");



        // --------------------------------------------------------------------------- FREE 2h

        $results = $link->query("UPDATE $user SET training2hsword = 1");
        $results = $link->query("UPDATE $user SET bo = 1");
        $results = $link->query("UPDATE $user SET battleaxe = 1");
        $results = $link->query("UPDATE $user SET warhammer = 1");

        $results = $link->query("UPDATE $user SET woodenbo = 1");
        $results = $link->query("UPDATE $user SET pike = 1");
        $results = $link->query("UPDATE $user SET claymore = 1");
        $results = $link->query("UPDATE $user SET greatsword = 1");

        $results = $link->query("UPDATE $user SET bostaff = 1");
        $results = $link->query("UPDATE $user SET battlestaff = 1");
        $results = $link->query("UPDATE $user SET dualtomahawk = 1");

        $results = $link->query("UPDATE $user SET boneknuckles = 1");
        $results = $link->query("UPDATE $user SET polearm = 1");
        $results = $link->query("UPDATE $user SET bonecudgel = 1");
        $results = $link->query("UPDATE $user SET hammerheadhammer = 1");

        $results = $link->query("UPDATE $user SET ironmaul = 1");
        $results = $link->query("UPDATE $user SET iron2hsword = 1");
        $results = $link->query("UPDATE $user SET ironbattlestaff = 1");
        $results = $link->query("UPDATE $user SET ironnunchaku = 1");

        $results = $link->query("UPDATE $user SET greataxe = 1");
        $results = $link->query("UPDATE $user SET trident = 1");
        $results = $link->query("UPDATE $user SET solomonstaff = 1");
        $results = $link->query("UPDATE $user SET oakbattlestaff = 1");
        $results = $link->query("UPDATE $user SET jimbo = 1");
        $results = $link->query("UPDATE $user SET dualshields = 1");

        $results = $link->query("UPDATE $user SET silver2hsword = 1");
        $results = $link->query("UPDATE $user SET steel2hsword = 1");
        $results = $link->query("UPDATE $user SET steelbattlestaff = 1");
        $results = $link->query("UPDATE $user SET steelnunchaku = 1");

        $results = $link->query("UPDATE $user SET heavykatana = 1");
        $results = $link->query("UPDATE $user SET heavyspear = 1");
        $results = $link->query("UPDATE $user SET heavyhammer = 1");

        $results = $link->query("UPDATE $user SET oakwarhammer = 1");
        $results = $link->query("UPDATE $user SET bardiche = 1");
        $results = $link->query("UPDATE $user SET glaive = 1");


        // --------------------------------------------------------------------------- FREE RANGED
        $results = $link->query("UPDATE $user SET arrows = 100");
        $results = $link->query("UPDATE $user SET bolts = 100");

        $results = $link->query("UPDATE $user SET boomerang = 1");
        $results = $link->query("UPDATE $user SET woodenbow = 1");
        $results = $link->query("UPDATE $user SET hunterbow = 1");
        $results = $link->query("UPDATE $user SET longbow = 1");
        $results = $link->query("UPDATE $user SET crossbow = 1");

        $results = $link->query("UPDATE $user SET ironboomerang = 1");
        $results = $link->query("UPDATE $user SET harpoon = 1");
        $results = $link->query("UPDATE $user SET ironbow = 1");
        $results = $link->query("UPDATE $user SET enchantedbow = 1");
        $results = $link->query("UPDATE $user SET jimbow = 1");
        $results = $link->query("UPDATE $user SET ironcrossbow = 1");
        $results = $link->query("UPDATE $user SET compoundcrossbow = 1");
        $results = $link->query("UPDATE $user SET handcrossbow = 1");

        $results = $link->query("UPDATE $user SET silverboomerang = 1");
        $results = $link->query("UPDATE $user SET silverbow = 1");
        $results = $link->query("UPDATE $user SET silvercrossbow = 1");
        $results = $link->query("UPDATE $user SET steelboomerang = 1");
        $results = $link->query("UPDATE $user SET steelbow = 1");
        $results = $link->query("UPDATE $user SET steelcrossbow = 1");
        $results = $link->query("UPDATE $user SET greenhornbow = 1");
        $results = $link->query("UPDATE $user SET keeperscrossbow = 1");

        // --------------------------------------------------------------------------- FREE SHIELD

        $results = $link->query("UPDATE $user SET trainingshield = 1");
        $results = $link->query("UPDATE $user SET basicshield = 1");
        $results = $link->query("UPDATE $user SET kiteshield = 1");
        $results = $link->query("UPDATE $user SET buckler = 1");
        $results = $link->query("UPDATE $user SET woodenshield = 1");
        $results = $link->query("UPDATE $user SET huntershield = 1");
        $results = $link->query("UPDATE $user SET offhanddagger = 1");
        $results = $link->query("UPDATE $user SET glowingorb = 1");
        $results = $link->query("UPDATE $user SET enchantedorb = 1");

        $results = $link->query("UPDATE $user SET ironshield = 1");
        $results = $link->query("UPDATE $user SET ironkiteshield = 1");
        $results = $link->query("UPDATE $user SET redshield = 1");
        $results = $link->query("UPDATE $user SET deathorb = 1");

        $results = $link->query("UPDATE $user SET silvershield = 1");
        $results = $link->query("UPDATE $user SET woodenshield = 1");
        $results = $link->query("UPDATE $user SET steelshield = 1");
        $results = $link->query("UPDATE $user SET steelkiteshield = 1");
        $results = $link->query("UPDATE $user SET greenorb = 1");
        $results = $link->query("UPDATE $user SET offhandsword = 1");
        $results = $link->query("UPDATE $user SET mithrilshield = 1");



        // --------------------------------------------------------------------------- FREE HEAD ITEMS
        $results = $link->query("UPDATE $user SET traininghelmet = 1");
        $results = $link->query("UPDATE $user SET basichelmet = 1");
        $results = $link->query("UPDATE $user SET basichood = 1");
        $results = $link->query("UPDATE $user SET redhood = 1");
        $results = $link->query("UPDATE $user SET greenhood = 1");
        $results = $link->query("UPDATE $user SET bluehood = 1");
        $results = $link->query("UPDATE $user SET leatherhood = 1");
        $results = $link->query("UPDATE $user SET leatherhelmet = 1");
        $results = $link->query("UPDATE $user SET hornedhelmet = 1");
        $results = $link->query("UPDATE $user SET barbarianhelmet = 1");
        $results = $link->query("UPDATE $user SET grayhood = 1");
        $results = $link->query("UPDATE $user SET wizardhat = 1");
        $results = $link->query("UPDATE $user SET battlehelm = 1");
        $results = $link->query("UPDATE $user SET victoriashood = 1");
        $results = $link->query("UPDATE $user SET scorpionhood = 1");

        $results = $link->query("UPDATE $user SET ironhood = 1");
        $results = $link->query("UPDATE $user SET ironhelmet = 1");
        $results = $link->query("UPDATE $user SET hauntedhelm = 1");
        $results = $link->query("UPDATE $user SET bandithood = 1");
        $results = $link->query("UPDATE $user SET calamaricap = 1");
        $results = $link->query("UPDATE $user SET heavyhelmet = 1");
        $results = $link->query("UPDATE $user SET kettlehelm = 1");

        $results = $link->query("UPDATE $user SET silverhelmet = 1");
        $results = $link->query("UPDATE $user SET steelhood = 1");
        $results = $link->query("UPDATE $user SET steelhelmet = 1");
        $results = $link->query("UPDATE $user SET steelmasterhelm = 1");
        $results = $link->query("UPDATE $user SET trollcrown = 1");
        $results = $link->query("UPDATE $user SET rangerhood = 1");

        // --------------------------------------------------------------------------- FREE BODY ITEMS
        $results = $link->query("UPDATE $user SET trainingarmor = 1");
        $results = $link->query("UPDATE $user SET trainingarmorpro = 1");
        $results = $link->query("UPDATE $user SET paddedarmor = 1");
        $results = $link->query("UPDATE $user SET pajamas = 1");
        $results = $link->query("UPDATE $user SET greencloak = 1");
        $results = $link->query("UPDATE $user SET blackrobe = 1");
        $results = $link->query("UPDATE $user SET grayrobe = 1");
        $results = $link->query("UPDATE $user SET leathervest = 1");
        $results = $link->query("UPDATE $user SET leatherarmor = 1");
        $results = $link->query("UPDATE $user SET sasquatchcloak = 1");
        $results = $link->query("UPDATE $user SET turtleshell = 1");

        $results = $link->query("UPDATE $user SET ironarmor = 1");
        $results = $link->query("UPDATE $user SET ironcape = 1");
        $results = $link->query("UPDATE $user SET blackcape = 1");
        $results = $link->query("UPDATE $user SET forestcloak = 1");
        $results = $link->query("UPDATE $user SET warlockrobe = 1");
        $results = $link->query("UPDATE $user SET championarmor = 1");

        $results = $link->query("UPDATE $user SET silverbreastplate = 1");
        $results = $link->query("UPDATE $user SET steelarmor = 1");
        $results = $link->query("UPDATE $user SET steelcape = 1");
        $results = $link->query("UPDATE $user SET rangercloak = 1");
        $results = $link->query("UPDATE $user SET yeticloak = 1");
        $results = $link->query("UPDATE $user SET demoncape = 1");
        $results = $link->query("UPDATE $user SET silverpajamas = 1");

        // --------------------------------------------------------------------------- FREE HAND ITEMS
        $results = $link->query("UPDATE $user SET traininggloves = 1");
        $results = $link->query("UPDATE $user SET wristbracers = 1");
        $results = $link->query("UPDATE $user SET glowingbrace = 1");
        $results = $link->query("UPDATE $user SET blackgloves = 1");
        $results = $link->query("UPDATE $user SET greengloves = 1");
        $results = $link->query("UPDATE $user SET graygloves = 1");
        $results = $link->query("UPDATE $user SET leathergloves = 1");
        $results = $link->query("UPDATE $user SET huntergloves = 1");
        $results = $link->query("UPDATE $user SET trollgloves = 1");

        $results = $link->query("UPDATE $user SET irongauntlets = 1");
        $results = $link->query("UPDATE $user SET irongloves = 1");
        $results = $link->query("UPDATE $user SET ironknuckles = 1");
        $results = $link->query("UPDATE $user SET banditgloves = 1");
        $results = $link->query("UPDATE $user SET grottogloves = 1");

        $results = $link->query("UPDATE $user SET silvergauntlets = 1");
        $results = $link->query("UPDATE $user SET steelgauntlets = 1");
        $results = $link->query("UPDATE $user SET steelgloves = 1");
        $results = $link->query("UPDATE $user SET silkbracers = 1");
        $results = $link->query("UPDATE $user SET rangergloves = 1");

        // --------------------------------------------------------------------------- FREE FOOT ITEMS
        $results = $link->query("UPDATE $user SET trainingboots = 1");
        $results = $link->query("UPDATE $user SET redboots = 1");
        $results = $link->query("UPDATE $user SET greenboots = 1");
        $results = $link->query("UPDATE $user SET blackboots = 1");
        $results = $link->query("UPDATE $user SET grayboots = 1");
        $results = $link->query("UPDATE $user SET slippers = 1");
        $results = $link->query("UPDATE $user SET leatherboots = 1");
        $results = $link->query("UPDATE $user SET trollboots = 1");
        $results = $link->query("UPDATE $user SET boneboots = 1");

        $results = $link->query("UPDATE $user SET ironboots = 1");
        $results = $link->query("UPDATE $user SET bigfootboots = 1");
        $results = $link->query("UPDATE $user SET banditboots = 1");
        $results = $link->query("UPDATE $user SET mudboots = 1");
        $results = $link->query("UPDATE $user SET warlockboots = 1");

        $results = $link->query("UPDATE $user SET silverboots = 1");
        $results = $link->query("UPDATE $user SET steelboots = 1");
        $results = $link->query("UPDATE $user SET thunderboots = 1");
        $results = $link->query("UPDATE $user SET rangerboots = 1");
        $results = $link->query("UPDATE $user SET silverslippers = 1");

        // --------------------------------------------------------------------------- FREE Rings 2
        $results = $link->query("UPDATE $user SET ringofhealthregen = 1");
        $results = $link->query("UPDATE $user SET ringofmanaregen = 1");

        // --------------------------------------------------------------------------- FREE NEcklaces
        $results = $link->query("UPDATE $user SET bonenecklace = 1");
        $results = $link->query("UPDATE $user SET stonenecklace = 1");
        $results = $link->query("UPDATE $user SET bluependant = 1");
        $results = $link->query("UPDATE $user SET ironnecklace = 1");
        $results = $link->query("UPDATE $user SET redtalisman = 1");
        $results = $link->query("UPDATE $user SET greenpendant = 1");
        $results = $link->query("UPDATE $user SET coralnecklace = 1");
        $results = $link->query("UPDATE $user SET vapornecklace = 1");
        $results = $link->query("UPDATE $user SET ironnecklace = 1");
        $results = $link->query("UPDATE $user SET shamannecklace = 1");
        $results = $link->query("UPDATE $user SET warriorpendant = 1");
        $results = $link->query("UPDATE $user SET rangeramulet = 1");
        $results = $link->query("UPDATE $user SET royalnecklace = 1");
        $results = $link->query("UPDATE $user SET steelnecklace = 1");
        $results = $link->query("UPDATE $user SET silvernecklace = 1");

        $results = $link->query("UPDATE $user SET mithrilnecklace = 1");




        // --------------------------------------------------------------------------- FREE BUFFS
        $results = $link->query("UPDATE $user SET wingspotion = 5");
        $results = $link->query("UPDATE $user SET gillspotion = 5");


        $results = $link->query("UPDATE $user SET coffee = 5");

        $results = $link->query("UPDATE $user SET reds = 5");
        $results = $link->query("UPDATE $user SET greens = 5");
        $results = $link->query("UPDATE $user SET blues = 5");
        $results = $link->query("UPDATE $user SET yellows = 5");
        // --------------------------------------------------------------------------- FREE MISC
        $results = $link->query("UPDATE $user SET goldkey = 7");



        // --------------------------------------------------------------------------- FREE STUFF CRAFTING

        $results = $link->query("UPDATE $user SET sand = 25");
        $results = $link->query("UPDATE $user SET wood = 250");
        $results = $link->query("UPDATE $user SET stone = 25");
        $results = $link->query("UPDATE $user SET iron = 25");
        $results = $link->query("UPDATE $user SET steel = 25");
        $results = $link->query("UPDATE $user SET mithril = 25");
        $results = $link->query("UPDATE $user SET string = 25");
        $results = $link->query("UPDATE $user SET rawmeat = 25");
        $results = $link->query("UPDATE $user SET cookedmeat = 25");
        $results = $link->query("UPDATE $user SET meatball = 25");
        $results = $link->query("UPDATE $user SET redbalm = 25");
        $results = $link->query("UPDATE $user SET bluefish = 25");
        $results = $link->query("UPDATE $user SET redberry = 125");
        $results = $link->query("UPDATE $user SET blueberry = 125");
        $results = $link->query("UPDATE $user SET leather = 25");


        echo $message = '[CHEAT] YOU GET TONS OF FREE STUFF!';
        include('update_feed.php'); // --- update feed
    }

    // --------------------------------------------------------------------------- FREE RINGS CHEAT
    elseif ($input=="free rings") {
        $results = $link->query("UPDATE $user SET ringofstrength = 4");
        $results = $link->query("UPDATE $user SET ringofdexterity = 4");
        $results = $link->query("UPDATE $user SET ringofmagic = 4");
        $results = $link->query("UPDATE $user SET ringofdefense = 4");

        $results = $link->query("UPDATE $user SET ringofstrengthII = 4");
        $results = $link->query("UPDATE $user SET ringofdexterityII = 4");
        $results = $link->query("UPDATE $user SET ringofmagicII = 4");
        $results = $link->query("UPDATE $user SET ringofdefenseII = 4");

        $results = $link->query("UPDATE $user SET ringofstrengthIII = 4");
        $results = $link->query("UPDATE $user SET ringofdexterityIII = 4");
        $results = $link->query("UPDATE $user SET ringofmagicIII = 4");
        $results = $link->query("UPDATE $user SET ringofdefenseIII = 4");

        $results = $link->query("UPDATE $user SET ringofstrengthIV = 4");
        $results = $link->query("UPDATE $user SET ringofdexterityIV = 4");
        $results = $link->query("UPDATE $user SET ringofmagicIV = 4");
        $results = $link->query("UPDATE $user SET ringofdefenseIV = 4");

        $results = $link->query("UPDATE $user SET ringofstrengthV = 4");
        $results = $link->query("UPDATE $user SET ringofdexterityV = 4");
        $results = $link->query("UPDATE $user SET ringofmagicV = 4");
        $results = $link->query("UPDATE $user SET ringofdefenseV = 4");

        $results = $link->query("UPDATE $user SET soldiersring = 1");
        $results = $link->query("UPDATE $user SET hunterring = 1");
        $results = $link->query("UPDATE $user SET coyotering = 1");
        $results = $link->query("UPDATE $user SET redwizardring = 1");
        $results = $link->query("UPDATE $user SET greenwizardring = 1");
        $results = $link->query("UPDATE $user SET yellowwizardring = 1");
        $results = $link->query("UPDATE $user SET rabidring = 1");
        $results = $link->query("UPDATE $user SET vaporring = 1");

        $results = $link->query("UPDATE $user SET silverring = 1");
        $results = $link->query("UPDATE $user SET ironring = 1");
        $results = $link->query("UPDATE $user SET steelring = 1");
        $results = $link->query("UPDATE $user SET mithrilring = 1");

        $results = $link->query("UPDATE $user SET crafting = 1");
        $results = $link->query("UPDATE $user SET wood = 200");
        $results = $link->query("UPDATE $user SET hammer = 1");



        echo $message = "[CHEAT] Free Rings!!!<br>";
        include('update_feed.php'); // --- update feed
    }


    // --------------------------------------------------------------------------- FREE WOOD
    elseif ($input=="free wood") {
        $results = $link->query("UPDATE $user SET wood = 50");
        echo $message = "[CHEAT] Free Wood!!!<br>";
        include('update_feed.php'); // --- update feed
    }
    // --------------------------------------------------------------------------- FREE SP
    elseif ($input=="free sp") {
        $results = $link->query("UPDATE $user SET sp = 100");
        echo $message = "[CHEAT] Free SP!!!<br>";
        include('update_feed.php'); // --- update feed
    }
    // --------------------------------------------------------------------------- FREE COIN MONEY
    elseif ($input=="free coin") {
        $results = $link->query("UPDATE $user SET currency = 100000");
        echo $message = "[CHEAT] Free CASH MONEY!!!<br>";
        include('update_feed.php'); // --- update feed
    }
 // }
