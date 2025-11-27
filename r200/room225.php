<?php
                        $roomname = "Wizard's Guild";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc225'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

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

// include ('battle-sets/thief.php');

$quest20=$row['quest20'];
$KLkoboldmaster=$_SESSION['KLkoboldmaster'];
$wizardskillFlag = $row['wizardskillFlag'];
$veggies=$row['veggies']; 
$bluepotion=$row['bluepotion']; 
$bluebalm=$row['bluebalm']; 

$rawmeat=$row['bluefish']; 
$meatball=$row['meatball']; 
$blues=$row['blues']; 

$hpmax=$row['hpmax'];   
$mpmax=$row['mpmax'];   
$hp=$row['hp'];  	
$mp=$row['mp'];

$quest28=$row['quest28']; 
$quest29=$row['quest29']; 
$quest30=$row['quest30']; 

$graymatter=$row['graymatter'];
$KLvictoria=$_SESSION['KLvictoria'];
$KLomar=$_SESSION['KLomar']; 

$KLtrollqueen=$_SESSION['KLtrollqueen']; 

$wizardstaff=$row['wizardstaff'];
$wizardhat=$row['wizardhat'];
$graywand=$row['graywand'];
$boneboots=$row['boneboots'];
$solomonstaff=$row['solomonstaff'];



// ---------------------- SKILL FLAG! ---------------------- //

if ($wizardskillFlag==0  && $quest20>=2) {
    echo  $message = "<div class='menuAction'>
    You can now learn new SKILLS & SPELLS from the WIZARD'S GUILD!!</div> ";
    include ('update_feed.php'); // --- update feed
    // $results = $link->query("UPDATE $user SET wizardskillFlag = 1");
    updateStats($link, $username,['wizardskillFlag' => 1 ]); // -- update stat 
}


// -------------------------------------------------------------------------- Teleport Kobold Lair
if ($input=='teleport to kobold lair') {
    echo 'You teleport to the entrance of the Kobold Lair!<br>';
    $message="<i>You teleport to the entrance of the Kobold Lair! </i><br>".$_SESSION['desc115'];
    include('update_feed.php'); // --- update feed
    // $results = $link->query("UPDATE $user SET room = '115'"); // -- room change
    // $results = $link->query("UPDATE $user SET endfight = 0"); // End fight
    // $results = $link->query("UPDATE $user SET infight = 0"); // End Fight
    $updates = ['endfight' => 0, 'infight' => 0, 'room' => '115' ]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes
    $message=""; //so doesn't display message in HUD battle status
}


// -------------------------------------------------------------------------- READ SIGN!
if ($input=='read sign') {  //read sign
    echo '<i>You read the Wizard\'s Guild Sign.</i><br>';
    $message="
    <i>you read the sign:</i>
    <div class='sign darkgrayBG'>
    <h4 class='lgray'>Wizard's Guild</h4>
    ---------------------------------------------------<br>
    <p>Do you long to unleash storms of fire, bend the winds to your will, and soar like a dragon through the sky? Do you crave arcane power so great it makes the earth shake and your enemies panic? Then the Wizard's Guild awaits you.</p><br>
    <p>Prove your magical might—travel to the Kobold Lair and defeat their cunning Master. Only then will you earn access to powerful spells, legendary wizard gear, and dangerous quests.</p>
    ---------------------------------------------------
    <p>Initiation Reward: Two powerful wizard items to aid you on your path.</p>
    </div>";
    include('update_feed.php'); // --- update feed
}





// Do you like hurling great balls of fire at your enemies? Do you want to regenerate health using powerful magic? Do you dream about flying through the sky like a dragon? Well then you want to join the Wizard's Guild!<br><br>
// Simply travel to the Kobold Lair and defeat their Master to prove you are worthy. You can then learn stronger spells, access exclusive quests and purchase better wizardry items.<br><br>
// Get 2 Free Wizard Items upon Initation! <br>




// --------------------------------------------------------------------------- REST +100 MP
if ($input=='rest' && $quest20 <2) {
        echo $message="Join the Wizard's Guild to rest at the Wizard's Fire<br>
        <a href data-link='quests' class='btn goldBG'>Open Quests</a>";
        include('update_feed.php'); // --- update feed
    }
    else if ($input=="rest"){
        // $query = $link->query("UPDATE $user SET hp = $hpmax"); 
        // $query = $link->query("UPDATE $user SET mp = $mpmax + 100"); 
        $updates = [ // -- set changes
			'hp' => $hpmax,
			'mp' => $mpmax + 100
		]; 
		updateStats($link, $_SESSION['username'], $updates); // -- update 
        echo $message = "You rest at the Wizard's Fire and supercharge your MP (+100 MP)!<br>";
        include ('update_feed.php'); // --- update feed
}



if ($input=='grab pack' && $quest20 <2) {
echo $message="Join the Wizard's Guild to get the Wizard's Pack<br>
<a href data-link='quests' class='btn goldBG'>Open Quests</a>";
include('update_feed.php'); // --- update feed
}
elseif ($input=='grab pack' )  // ---- GRAB meatball
{
    echo $message="<div class='menuAction'><h4 class='darkblue'>You replenish your Wizard Pack</h3><br>";
    include('update_feed.php'); // --- update feed
    if ($blues>= 3) {	// ------------------------------  blues
        echo $message="<p>You have ".$blues." blues.</p>";
        include('update_feed_alt.php'); // --- update feed
    } else {
        echo $message="<p class='blue'>You now have 3 blues.</p>";
        include('update_feed_alt.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET blues = 3");
        updateStats($link, $username,['blues' => 3 ]); // -- update stat 
    }
    if ($bluefish>= 5) {	// ------------------------------  bluefish
        echo $message="<p>You have ".$bluefish." bluefish.</p>";
        include('update_feed_alt.php'); // --- update feed
    } else {
        echo $message="<p class='blue'>You now have 5 bluefish.</p>";
        include('update_feed_alt.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET bluefish = 5");
        updateStats($link, $username,['bluefish' => 5 ]); // -- update stat 
    }   
    if ($bluepotion>= 5) {	// ------------------------------  blue potion
        echo $message="<p>You have ".$bluepotion." blue potions.</p>";
        include('update_feed_alt.php'); // --- update feed
    } else {
        echo $message="<p class='blue'>You now have 5 blue potions.</p>";
        include('update_feed_alt.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET bluepotion = 5");
        updateStats($link, $username,['bluepotion' => 5 ]); // -- update stat
    } 
    if ($bluebalm>= 1) {	// ------------------------------  blue balm
        echo $message="<p>You have ".$bluebalm." blue balm.</p>";
        include('update_feed_alt.php'); // --- update feed
    } else {
        echo $message="<p class='blue'>You now have 1 blue balm.</p>";
        include('update_feed_alt.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET bluebalm = 1");
        updateStats($link, $username,['bluebalm' => 1 ]); // -- update stat
    }
    echo $message="</div>";
    include('update_feed_alt.php'); // --- update feed
}







// ---------------------- START ALL QUESTS ---------------------- //
if ($input=='start quests' || $input=='start quest 20') {
    if ($quest20 <1) {
        echo $message = '<div class="fbox">
        <h3 class="padd purple">You start the Wizard Initiation Quest!</h3>
        <span class="icon purple">'.file_get_contents("img/svg/npc/npc-wizard.svg").'</span>
        <p class="padd"><i>"Defeat the evil Kobold Master at all costs!"</i></p>
        <a href data-link="quests" class="btn goldBG">Open Quests </a>
        </div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET quest20 = 1");
        $updates = [ // -- set changes
            'quest20' => 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
    }
}
// ---------------------- QUEST 20) Defeat the Kobold Master ---------------------- //
if ($input=='info 20') {
    echo $message="<div class='menuAction'><strong class='green'>Quest 20 Info</strong><br>
    To join the Wizards Guild you have to defeat the Kobold Master. His Lair is found in the northwest part of the Forest Map. Follow the path out of town all the way north and then go SW when you can't go any further. </div>";
    include('update_feed.php'); // --- update feed
} elseif ($input=='complete 20') {
    if ($KLkoboldmaster >= 1) {
        echo $message='<div class="questWin">
        <h3>Quest 20 Completed!</h3>
        <h4>Defeat the Kobold Master</h4>
        Congratulations! You have indeed slain the Kobold Master. Welcome to the Wizard\'s Guild! You can enter by heading UP. Your signing bonus is a new Wizard Staff and Wizard Hat!!
        <h4>Rewards</h4>
        [ + 500 xp  ]<br />
        [ + 1000 '.$_SESSION['currency'].' ]<br />
        [ + Wizard Hat ]<br>
        [ + Wizard Staff ]</div>
        <form id="mainForm" method="post" action="" name="formInput">
        <a href data-link="quests" class="btn goldBG">Open Quests</a>
        </form>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET xp = xp + 500");
        // $results = $link->query("UPDATE $user SET currency = currency + 1000");
        // $results = $link->query("UPDATE $user SET wizardhat = wizardhat + 1");
        // $results = $link->query("UPDATE $user SET wizardstaff = wizardstaff + 1");
        // $results = $link->query("UPDATE $user SET quest20 = 2");
        $updates = [ // -- set changes
            'quest20' => 2,
            'xp' => $xp + 500,
            'currency' => $currency + 1000,
            'wizardhat' => $wizardhat + 1,
            'wizardstaff' => $wizardstaff + 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($quest20 == 1) {
        echo $message="<div class='menuAction'><strong class='green'>Quest 20 Not Complete</strong><br>
To complete this quest you need to find and kill the Kobold Master. Find him in his lair north of here.</div>";
        include('update_feed.php'); // --- update feed
    }
}






// ---------------------- START ALL QUESTS ---------------------- //
if($input=='start quests' && $quest20 >=2) {
if ($quest28 <1 || $quest29 <1 || $quest30 <1) {	
    echo $message = '<div class="fbox">
    <h3 class="padd purple">You start Wizard Morty\'s Quests!</h3>
    <span class="icon purple">'.file_get_contents("img/svg/npc/npc-wizard2.svg").'</span>
    <p class="padd"><i>"So you think you\'re a powerful wizard huh!"</i></p>
    <a href data-link="quests" class="btn goldBG">Open Quests </a>
    </div>';
    include ('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET quest28 = 1");
        // $results = $link->query("UPDATE $user SET quest29 = 1");
        // $results = $link->query("UPDATE $user SET quest30 = 1");
        $updates = [ // -- set changes
            'quest28' => 1,
            'quest29' => 1,
            'quest30' => 1
        ];
        updateStats($link, $username, $updates); // -- apply changes
        }
}
// ---------------------- QUEST 28) Rare Gray Matter ---------------------- //
if($input=='info 28') { 
       echo $message="<div class='menuAction'><strong class='green'>Quest 28 Info</strong><br>
       Find a rare piece of gray matter and give it to Morty. Rare creatures drop gray matter, you will come across them randomly in your travels.</div>";
       include ('update_feed.php'); // --- update feed
}
else if($input=='complete 28') 
{	if ($graymatter >= 1)
   {	echo $message="<div class='questWin'>
       <h3>Quest 28 Completed!</h3>
       <h4>Rare Gray Matter</h4>
       Congratulations! You hand a piece of gray matter to Morty and he creates a powerful Gray Wand for you! 
         <h4>Rewards</h4>
           [ + 800 xp  ]<br />
         [ + 200 ".$_SESSION['currency']." ]<br />
         [ + 5 Blue Potions ]<br />
         [ + Gray Wand! ]</div>";	
       include ('update_feed.php'); // --- update feed
    //    $results = $link->query("UPDATE $user SET currency = currency + 200"); 
    //    $results = $link->query("UPDATE $user SET xp = xp + 800"); 
    //    $results = $link->query("UPDATE $user SET graywand = graywand + 1");
    //    $results = $link->query("UPDATE $user SET bluepotion = bluepotion + 5");
    //    $results = $link->query("UPDATE $user SET quest28 = 2");
         $updates = [ // -- set changes
                'quest28' => 2,
                'xp' => $xp + 800,
                'currency' => $currency + 200,
                'graywand' => $graywand + 1,
                'bluepotion' => $bluepotion + 5
          ]; 
          updateStats($link, $username, $updates); // -- apply changes
   } 
   else if ($quest28 == 1)
   {	echo $message="<div class='menuAction'><strong class='green'>Quest 28 Not Complete</strong><br>
        To complete this quest you need to find a piece of gray matter. It is dropped by rare enemies.</div>";
       include ('update_feed.php'); // --- update feed
   }  
}


// ---------------------- QUEST 29) Omar & Victoria the Dead ---------------------- //
if($input=='info 29') { 
       echo $message="<div class='menuAction'><strong class='green'>Quest 29 Info</strong><br>
       Defeat the undead duo, Omar and Victoria, in the haunted Catacombs below Red Town. Omar packs a mean punch and Victoria is immune to magic, so be prepared.</div>";
       include ('update_feed.php'); // --- update feed
}
else if($input=='complete 29') 
{	if ($KLvictoria >= 1 && $KLomar >=1)
   {	
        echo $message="<div class='questWin'>
        <h3>Quest 29 Completed!</h3>
        <h4>Omar & Victoria the Dead</h4>
        Congratulations! You have defeated Omar and Victoria. Morty hands you a sweet looking pair of Bone Boots! 
        <h4>Rewards</h4>
        [ + 1000 xp  ]<br />
        [ + 200 ".$_SESSION['currency']." ]<br />
        [ + Bone Boots! ]</div>";	
        include ('update_feed.php'); // --- update feed
        //    $results = $link->query("UPDATE $user SET currency = currency + 200"); 
        //    $results = $link->query("UPDATE $user SET xp = xp + 1000"); 
        //    $results = $link->query("UPDATE $user SET boneboots = boneboots + 1");
        //    $results = $link->query("UPDATE $user SET quest29 = 2");
        $updates = [ // -- set changes
                'quest29' => 2,
                'xp' => $xp + 1000,
                'currency' => $currency + 200,
                'boneboots' => $boneboots + 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
   } 
   else if ($quest29 == 1)
   {	echo $message="<div class='menuAction'><strong class='green'>Quest 29 Not Complete</strong><br>
        To complete this quest you need to defeat Omar and Victoria the Dead found deep in the Catacombs under Red Town.</div>";
       include ('update_feed.php'); // --- update feed
   }  
}



// ---------------------- QUEST 30) Magic and the Troll Queen ---------------------- //
if($input=='info 30') { 
       echo $message="<div class='menuAction'><strong class='green'>Quest 30 Info</strong><br>
        Defeat the evil and magical Troll Queen found deep in the Dark Forest to the far north.</div>";
       include ('update_feed.php'); // --- update feed
}
else if($input=='complete 30') 
{	if ($KLtrollqueen >= 1)
   {	
        echo $message="<div class='questWin'>
        <h3>Quest 30 Completed!</h3>
        <h4>Magic and the Troll Queen</h4>
        Congratulations! You have indeed slain the Troll Queen! Morty hands you an incredibly strong magical weapon, Solomon Staff! 
        <h4>Rewards</h4>
        [ + 2000 xp  ]<br />
        [ + 200 ".$_SESSION['currency']." ]<br />
        [ + Solomon Staff! ]</div>";	
        include ('update_feed.php'); // --- update feed
        //    $results = $link->query("UPDATE $user SET currency = currency + 200"); 
        //    $results = $link->query("UPDATE $user SET xp = xp + 2000"); 
        //    $results = $link->query("UPDATE $user SET solomonstaff = solomonstaff + 1");
        //    $results = $link->query("UPDATE $user SET quest30 = 2");
        $updates = [ // -- set changes
        'quest30' => 2,
        'xp' => $xp + 2000,
        'currency' => $currency + 200,
        'solomonstaff' => $solomonstaff + 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
   } 
   else if ($quest30 == 1)
   {	echo $message="<div class='menuAction'><strong class='green'>Quest 30 Not Complete</strong><br>
        To complete this quest you need to defeat the Troll Queen. Travel to her nest in the Dark Forest and use magic to defeat her.</div>";
        include ('update_feed.php'); // --- update feed
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
// elseif ($input=='nw' || $input=='northwest') {
//     echo 'You travel northwest<br>';
//     $message="<i>You travel northwest</i><br>".$_SESSION['desc210'];
//     include('update_feed.php'); // --- update feed
// $results = $link->query("UPDATE $user SET room = 210"); // -- room change
// } 
elseif ($input=='u' || $input=='up') {
    if ($quest20 >=2) {
        echo 'You travel up<br>';
        $message="<i>You travel up</i><br>".$_SESSION['desc225a'];
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET room = '225a'"); // -- room change
        $updates = ['endfight' => 0, 'room' => '225a' ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } else {
        echo $message = "You need to complete the quest here to become a member of the Wizards Guild!";
        include('update_feed.php'); // --- update feed
    }
}




// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'northwest') { $roomNum = '210';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');}




// ----------------------------------- end of room function
include('function-end.php');
// }
