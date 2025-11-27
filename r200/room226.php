<?php
                        $roomname = "Warrior's Guild";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc226'];
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


$quest19=$row['quest19'];
$KLogrelieutenant=$_SESSION['KLogrelieutenant'];

$quest25=$row['quest25']; 
$quest26=$row['quest26']; 
$quest27=$row['quest27']; 

$KLskeletonknight=$_SESSION['KLskeletonknight'];
$KLgreatwhite=$_SESSION['KLgreatwhite'];
$KLhammerhead=$_SESSION['KLhammerhead']; 
$KLtrollchampion=$_SESSION['KLtrollchampion']; 

$rawmeat=$row['rawmeat']; 
$cookedmeat=$row['cookedmeat']; 
$meatball=$row['meatball']; 
$redpotion=$row['redpotion']; 
$redbalm=$row['redbalm']; 
$reds=$row['reds']; 

$hpmax=$row['hpmax'];   
$mpmax=$row['mpmax'];   
$hp=$row['hp'];  	
$mp=$row['mp'];

$warriorskillFlag = $row['warriorskillFlag'];

$irondagger=$row['irondagger'];
$ironsword=$row['ironsword'];
$polearm=$row['polearm'];
$iron2hsword=$row['iron2hsword'];
$ringofstrengthV=$row['ringofstrengthV'];
$ringofhealthregenV=$row['ringofhealthregenV'];
$currency=$row['currency'];
$meatball=$row['meatball'];
$redbalm=$row['redbalm'];
$championarmor=$row['championarmor'];
$greatwhitesword=$row['greatwhitesword'];
$hammerheadhammer=$row['hammerheadhammer'];
$boneknuckles=$row['boneknuckles'];
$bastardsword=$row['bastardsword'];
$greatsword=$row['greatsword'];



// ---------------------- SKILL FLAG! ---------------------- //
if ($warriorskillFlag==0 && $quest19>=2) {
    echo  $message = "<div class='menuAction'>You can now learn new SKILLS from the WARRIOR'S GUILD!!</div> ";
    include ('update_feed.php'); // --- update feed
    // $results = $link->query("UPDATE $user SET warriorskillFlag = 1");
    updateStats($link, $username,['warriorskillFlag' => 1 ]); // -- update stat 

}


// -------------------------------------------------------------------------- Teleport ogre Lair
if ($input=='teleport to ogre lair') {
    echo 'You teleport to the entrance of the Ogre Lair!<br>';
    $message="<i>You teleport to the entrance of the Ogre Lair! </i><br>".$_SESSION['desc111'];
    include('update_feed.php'); // --- update feed
    // $results = $link->query("UPDATE $user SET room = '111'"); // -- room change
    // $results = $link->query("UPDATE $user SET endfight = 0"); // End fight
    // $results = $link->query("UPDATE $user SET infight = 0"); // End Fight
    $updates = ['endfight' => 0, 'infight' => 0, 'room' => '111' ]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes
    $message=""; //so doesn't display message in HUD battle status
}



if ($input=='grab pack' && $quest19 <2) {
    echo $message="Join the Warrior's Guild to get the Warrior's Pack<br>
    <a href data-link='quests' class='btn goldBG'>Open Quests</a>
    ";
    include('update_feed.php'); // --- update feed
}
    elseif ($input=='grab pack' )  // ---- GRAB meatball
{
    echo $message="<div class='menuAction'><h4 class='darkblue'>You replenish your Warrior Pack</h3><br>";
    include('update_feed.php'); // --- update feed
    if ($reds>= 3) {	// ------------------------------  reds
        echo $message="<p>You have ".$reds." reds.</p>";
        include('update_feed_alt.php'); // --- update feed
    } else {
        echo $message="<p class='red'>You now have 3 reds.</p>";
        include('update_feed_alt.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET reds = 3");
        updateStats($link, $username,['reds' => 3 ]); // -- update stat 
    }
    if ($meatball>= 5) {	// ------------------------------  meatball
        echo $message="<p>You have ".$meatball." meatballs.</p>";
        include('update_feed_alt.php'); // --- update feed
    } else {
        echo $message="<p class='green'>You now have 5 meatballs.</p>";
        include('update_feed_alt.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET meatball = 5");
        updateStats($link, $username,['meatball' => 5 ]); // -- update stat
    }   
    if ($redpotion>= 5) {	// ------------------------------  red potion
        echo $message="<p>You have ".$redpotion." red potions.</p>";
        include('update_feed_alt.php'); // --- update feed
    } else {
        echo $message="<p class='red'>You now have 5 red potions.</p>";
        include('update_feed_alt.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET redpotion = 5");
        updateStats($link, $username,['redpotion' => 5 ]); // -- update stat
    } 
    if ($redbalm>= 1) {	// ------------------------------  red balm
        echo $message="<p>You have ".$redbalm." red balm.</p>";
        include('update_feed_alt.php'); // --- update feed
    } else {
        echo $message="<p class='red'>You now have 1 red balm.</p>";
        include('update_feed_alt.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET redbalm = 1");
        updateStats($link, $username,['redbalm' => 1 ]); // -- update stat
    }

    echo $message="</div>";
    include('update_feed_alt.php'); // --- update feed

}


// --------------------------------------------------------------------------- REST HEAL +100 HP
if ($input=='rest' && $quest19 <2) {
    echo $message="Join the Warrior's Guild to rest at the Warrior's Fire<br>
    <a href data-link='quests' class='btn goldBG'>Open Quests</a>
    ";
    include('update_feed.php'); // --- update feed
}
    else if ($input=="rest"){
    // $query = $link->query("UPDATE $user SET hp = $hpmax + 100 "); 
    //     $query = $link->query("UPDATE $user SET mp = $mpmax "); 
    $updates = [ // -- set changes
        'hp' => $hpmax + 100,
        'mp' => $mpmax
    ]; 
    updateStats($link, $username, $updates); // -- update 
        echo $message = "You rest at the Warrior's Fire and supercharge your HP (+100 HP)!<br>";
        include ('update_feed.php'); // --- update feed

}
   
   
    
    // -------------------------------------------------------------------------- READ SIGN!
if ($input=='read sign') {  //read sign
    echo '<i>You read the Warrior\'s Guild Sign.</i><br>';
    $message="<i>you read the sign:</i>
    <div class='sign darkgrayBG'>
    <h4 class='lgray'>Warrior's Guild</h4>
    ---------------------------------------------------<br>
    <p>Do you love crushing enemies with massive warhammers and razor-sharp swords? Want to block devastating blows with an unbreakable shield? Dream of becoming the strongest warrior the world has ever known? Then the Warrior's Guild wants you.</p><br>
    <p>Prove your strength by defeating the Ogre Lieutenant. Earn your place, and you'll unlock powerful skills, elite gear, and exclusive Warrior Quests.</p>
    ---------------------------------------------------
    <p>Initiation Bonus: TWO FREE SWORDS. Because one just isn't enough.</p>
    </div>";
    include('update_feed.php'); // --- update feed
}
    // Do you enjoy destroying your enemies with massive warhammers and super sharp swords? Do you want to block huge amounts of damage with your shield? Do you want to become the strongest warrior anyone has ever seen?! Well then you want to join the Warrior's Guild. <br><br> Find and defeat the Ogre Lieutenant to prove you are worthy. Once in the Guild you can learn stronger skills, purchase better equipment and get access to exclusive Warrior Quests.<br><br>Get 2 Free Swords upon Initiation!!<br>



    
// -------------------------------------------------------- START WARRIOR SHOP
// -------------------------------------------------------- START WARRIOR SHOP
// -------------------------------------------------------- START WARRIOR SHOP
if($input=='buy iron dagger') 
{	if($currency<1000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy an iron dagger for 1000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET irondagger = irondagger + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 1000"); 
        updateStats($link, $username, ['currency' => $currency - 1000, 'irondagger' => $irondagger + 1]); // -- apply changes
		}
}
if($input=='buy iron sword') 
{	if($currency<3000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy an iron sword for 3000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET ironsword = ironsword + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 3000"); 
        updateStats($link, $username, ['currency' => $currency - 3000, 'ironsword' => $ironsword + 1]); // -- apply changes
		} 
}
if($input=='buy polearm') 
{	if($currency<3000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a polearm for 3000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET polearm = polearm + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 3000"); 
        updateStats($link, $username, ['currency' => $currency - 3000, 'polearm' => $polearm + 1]); // -- apply changes
		} 
}
if($input=='buy iron 2h sword') 
{	if($currency<5000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy an iron 2h sword for 5000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET iron2hsword = iron2hsword + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 5000"); 
        updateStats($link, $username, ['currency' => $currency - 5000, 'iron2hsword' => $iron2hsword + 1]); // -- apply changes
		} 
}
if($input=='buy ring of strength V') 
{	if($currency<16000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a ring of strength V for 16000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 16000"); 
        updateStats($link, $username, ['currency' => $currency - 16000, 'ringofstrengthV' => $ringofstrengthV + 1]); // -- apply changes
		} 
}
if($input=='buy ring of health regen V') 
{	if($currency<32000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a ring of health regen V for 32000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET ringofhealthregenV = ringofhealthregenV + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 32000"); 
        updateStats($link, $username, ['currency' => $currency - 32000, 'ringofhealthregenV' => $ringofhealthregenV + 1]); // -- apply changes
		} 
}
if($input=='buy meatball') 
{	if($currency<250) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a meatball for 250 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET meatball = meatball + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 250"); 
        updateStats($link, $username, ['currency' => $currency - 250, 'meatball' => $meatball + 1]); // -- apply changes
		} 
}
if($input=='buy red balm') 
{	if($currency<1000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a red balm for 1000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET redbalm = redbalm + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 1000"); 
        updateStats($link, $username, ['currency' => $currency - 1000, 'redbalm' => $redbalm + 1]); // -- apply changes
		} 
}
// -------------------------------------------------------- END SHOP
// -------------------------------------------------------- END SHOP
// -------------------------------------------------------- END SHOP








// ---------------------- START ALL QUESTS ---------------------- //
// ---------------------- START ALL QUESTS ---------------------- //
// ---------------------- START ALL QUESTS ---------------------- //
if ($input=='start quests' || $input=='start quest 19') {
    if ($quest19 <1) {
        echo $message = '<div class="fbox">
        <h3 class="padd darkblue">You start the Warrior Initiation Quest!</h3>
        <span class="icon darkblue">'.file_get_contents("img/svg/npc/npc-warrior.svg").'</span>
        <p class="padd"><i>"Slay the brutal Ogre Lieutenant to prove you are a true Warrior!"</i></p>
        <a href data-link="quests" class="btn goldBG">Open Quests </a>
        </div>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET quest19 = 1");
        $updates = [ // -- set changes
            'quest19' => 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
    }
}
// ---------------------- QUEST 19) Defeat the Ogre Lieutenant ---------------------- //
if ($input=='info 19') {
    echo $message="<div class='menuAction'><strong class='green'>Quest 19 Info</strong><br>
    To join the Warrior's Guild you have to defeat the Ogre Lieutenant. His Lair is found in the southwest part of the Forest Map. Follow the path out of town to the north and then go W when you reach the Forest Map. </div>";
    include('update_feed.php'); // --- update feed
}
if ($input=='complete 19') {
    if ($KLogrelieutenant >= 1) {
        echo $message='<div class="questWin">
        <h3>Quest 19 Completed!</h3>
        <h4>Defeat the Ogre Lieutenant</h4>
        Congratulations! You have indeed slain the Ogre Lieutenant. Welcome to the Warrior\'s Guild! You can enter by heading UP. Your sign up bonus is a new Bastard Sword and Great Sword!!
        <h4>Rewards</h4>
        [ + 500 xp  ]<br />
        [ + 1000 '.$_SESSION['currency'].' ]<br />
        [ + Bastard Sword (1h) ]<br>
        [ + Great Sword (2h) ]</div>
        <form id="mainForm" method="post" action="" name="formInput">
        <a href data-link="quests" class="btn goldBG">Open Quests</a>
        </form>';
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET xp = xp + 500");
        // $results = $link->query("UPDATE $user SET currency = currency + 1000");
        // $results = $link->query("UPDATE $user SET bastardsword = bastardsword + 1");
        // $results = $link->query("UPDATE $user SET greatsword = greatsword + 1");
        // $results = $link->query("UPDATE $user SET quest19 = 2");
        $updates = [ // -- set changes
            'quest19' => 2,
            'xp' => $xp + 500,
            'currency' => $currency + 1000,
            'bastardsword' => $bastardsword + 1,
            'greatsword' => $greatsword + 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($quest19 == 1) {
        echo $message="<div class='menuAction'><strong class='green'>Quest 19 Not Complete</strong><br>
        To complete this quest you need to find and kill the Ogre Lieutenant. Find him in his lair north of here.</div>";
        include('update_feed.php'); // --- update feed
    }
}







// ---------------------- START ALL QUESTS ---------------------- //
if($input=='start quests' && $quest19 >=2) {
    if ($quest25 <1 || $quest26 <1 || $quest27 <1) {	
        echo $message = '<div class="fbox">
        <h3 class="padd darkblue">You start Warrior Pete\'s Quests!</h3>
        <span class="icon darkblue">'.file_get_contents("img/svg/npc/npc-warrior2.svg").'</span>
        <p class="padd"><i>"You say you\'re a warrior huh? I don\'t see it."</i></p>
        <a href data-link="quests" class="btn goldBG">Open Quests </a>
        </div>';
        include ('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET quest25 = 1");
        // $results = $link->query("UPDATE $user SET quest26 = 1");
        // $results = $link->query("UPDATE $user SET quest27 = 1");
        $updates = [ // -- set changes
        'quest25' => 1,
        'quest26' => 1,
        'quest27' => 1
        ];
        updateStats($link, $username, $updates); // -- apply changes
        }
}


// ---------------------- QUEST 25) Banish the Skeleton Knights ---------------------- //
if($input=='info 25') { 
       echo $message="<div class='menuAction'><strong class='green'>Quest 25 Info</strong><br>
       You need to defeat 3 Skeleton Knights. They are found in the Catacombs below Red Town. Head down into the Sewers and then head northwest to reach the Catacombs entrance.</div>";
       include ('update_feed.php'); // --- update feed
}
else if($input=='complete 25') 
{	if ($KLskeletonknight >= 3)
   {	
        echo $message="<div class='questWin'>
        <h3>Quest 25 Completed!</h3>
        <h4>Banish the Skeleton Knights</h4>
        Congratulations! You have sent 3 Skeleton Knights back to hell! A shiny pair of Bone Knuckles is your reward!
        <h4>Rewards</h4>
        [ + 800 xp  ]<br />
        [ + 200 ".$_SESSION['currency']." ]<br />
        [ + Bone Knuckles! ]</div>";	
        include ('update_feed.php'); // --- update feed
        //       $results = $link->query("UPDATE $user SET currency = currency + 200"); 
        //    $results = $link->query("UPDATE $user SET xp = xp + 800"); 
        //    $results = $link->query("UPDATE $user SET boneknuckles = boneknuckles + 1");
        //    $results = $link->query("UPDATE $user SET quest25 = 2");
        $updates = [ // -- set changes
        'quest25' => 2,
        'currency' => $currency + 200,
        'xp' => $xp + 800,
        'boneknuckles' => $boneknuckles + 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
   } 
   else if ($quest25 == 1)
   {	
        echo $message="<div class='menuAction'><strong class='green'>Quest 25 Not Complete</strong><br>
        To complete this quest you need to defeat 3 Skeleton Knights. Find them in the Catacombs below Town.</div>";
        include ('update_feed.php'); // --- update feed
   }  
}

// ---------------------- QUEST 26) Shark Hunter ---------------------- //
if($input=='info 26') { 
       echo $message="<div class='menuAction'><strong class='green'>Quest 26 Info</strong><br>
       Sharks infest the waters below the Blue Ocean. Slay a Great White and Hammerhead to receive some really great weapons. You can reach the Ocean by going west from the Grassy Field. Go under the Ocean by casting a Gills spell or drinking a Gills Potion.</div>";
       include ('update_feed.php'); // --- update feed
}
else if($input=='complete 26') 
{	if ($KLgreatwhite >= 1 && $KLhammerhead >= 1)
   {	
        echo $message="<div class='questWin'>
        <h3>Quest 26 Completed!</h3>
        <h4>Shark Hunter</h4>
        Congratulations! You have hunted down the sharks! Here are 2 of the best swords you can get!
        <h4>Rewards</h4>
        [ + 1000 xp  ]<br />
        [ + 200 ".$_SESSION['currency']." ]<br />
        [ + Great White Sword! ]<br />
        [ + Hammerhead Hammer! ]</div>";	
        include ('update_feed.php'); // --- update feed
        //    $results = $link->query("UPDATE $user SET xp = xp + 1000"); 
        //    $results = $link->query("UPDATE $user SET currency = currency + 200"); 
        //    $results = $link->query("UPDATE $user SET greatwhitesword = greatwhitesword + 1");
        //    $results = $link->query("UPDATE $user SET hammerheadhammer = hammerheadhammer + 1");
        //    $results = $link->query("UPDATE $user SET quest26 = 2");
        $updates = [ // -- set changes
        'quest26' => 2,
        'currency' => $currency + 200,
        'xp' => $xp + 1000,
        'greatwhitesword' => $greatwhitesword + 1,
        'hammerheadhammer' => $hammerheadhammer + 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
   } 
   else if ($quest26 == 1)
   {	
        echo $message="<div class='menuAction'><strong class='green'>Quest 26 Not Complete</strong><br>
        To complete this quest you need to hunt down a Great White Shark and Hammerhead Shark. They can be found under the Blue Ocean.</div>";
        include ('update_feed.php'); // --- update feed
   }  
}

// ---------------------- QUEST 27) True Troll Champion ---------------------- //
if($input=='info 27') { 
       echo $message="<div class='menuAction'><strong class='green'>Quest 27 Info</strong><br>
       The Troll Champion is one of the strongest beasts in the Dark Forest. Slay 3 of them to prove you are the true champion.</div>";
       include ('update_feed.php'); // --- update feed
}
else if($input=='complete 27') 
{	if ($KLtrollchampion >= 3)
   {	
        echo $message="<div class='questWin'>
        <h3>Quest 27 Completed!</h3>
        <h4>True Troll Champion</h4>
        Congratulations! You have indeed slain 3 Troll Champions. Wear this Champion Armor with pride!
        <h4>Rewards</h4>
        [ + 1000 xp  ]<br />
        [ + 200 ".$_SESSION['currency']." ]<br />
        [ + Champion Armor ]</div>";	
        include ('update_feed.php'); // --- update feed
        //       $results = $link->query("UPDATE $user SET currency = currency + 200"); 
        //    $results = $link->query("UPDATE $user SET xp = xp + 1000"); 
        //    $results = $link->query("UPDATE $user SET championarmor = championarmor + 1");
        //    $results = $link->query("UPDATE $user SET quest27 = 2");
        $updates = [ // -- set changes
        'quest27' => 2,
        'currency' => $currency + 200,
        'xp' => $xp + 1000,
        'championarmor' => $championarmor + 1
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
   } 
   else if ($quest27 == 1)
   {	
        echo $message="<div class='menuAction'><strong class='green'>Quest 27 Not Complete</strong><br>
        To complete this quest you need to find and slay 3 Troll Champions. Find them in the Dark Forest north of the regular Forest.</div>";
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
// elseif ($input=='se' || $input=='southeast') {
//     echo 'You travel southeast<br>';
//     $message="<i>You travel southeast</i><br>".$_SESSION['desc210'];
//     include('update_feed.php'); // --- update feed
// $results = $link->query("UPDATE $user SET room = 210"); // -- room change
// } 
elseif ($input=='u' || $input=='up') {
    if ($quest19 >=2) {
        echo 'You travel up<br>';
        $message="<i>You travel up</i><br>".$_SESSION['desc226a'];
        include('update_feed.php'); // --- update feed
        // $results = $link->query("UPDATE $user SET room = '226a'"); // -- room change
        $updates = ['endfight' => 0, 'room' => '226a' ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    } else {
        echo $message = "You need to complete the quest here to become a member of the Warriors Guild!";
        include('update_feed.php'); // --- update feed
    }
}




// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'southeast') { $roomNum = '210';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');}



// ----------------------------------- end of room function
include('function-end.php');
// }
