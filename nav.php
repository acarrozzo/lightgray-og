<?php
// --------------------------------------------------------------------------------- NAV MAP
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



    $mapID = 'r'.$_SESSION['roomID']; // set room ID for map image and location


    echo'<div class="nav">';
    echo '<div class="badges">';
    // -------------------------------- SPEND TP BADGE
    if ($row['tp']>=1) {
        echo '
        <a href="" data-link2="training" class="btn yellowBG ddgray badge">
            <i class="icon">'.file_get_contents("img/svg/strong.svg").'</i>
            <span class="alert">'.$row['tp'].'</span>
            <span class="text">Training</span>
            </a>';
    }
    // -------------------------------- SPEND CP BADGE
    if ($row['cp']>=1) {
        echo '
      <a href="" data-link2="stats" class="btn purpleBG white badge">
          <i class="icon">'.file_get_contents("img/svg/character.svg").'</i>
          <span class="alert">'.$row['cp'].'</span>
          <span class="text">Stats</span>
          </a>';
    }
    // -------------------------------- SPEND SP BADGE
    if ($row['sp']>=20) {
        echo '
      <a href="" data-link2="skills" class="btn purpleBG white badge">
          <i class="icon">'.file_get_contents("img/svg/magicstrike.svg").'</i>
          <span class="alert">'.$row['sp'].'</span>
          <span class="text">Skills</span>

          </a>';
    }


    $questCount=0; // reset quest count for quest badges
    // --------------------------------  QUEST BADGES OLD MAN
    if ($roomID=='003') {
        if ($row['quest1']<2) { $questCount++;}
        if ($row['quest2']<2) { $questCount++;}
        if ($row['quest3']<2) { $questCount++;}
    }
    // --------------------------------  QUEST BADGES YOUNG SOLDIER
    if ($roomID=='003c') {
        if ($row['quest4']<2) { $questCount++;}
        if ($row['quest5']<2) { $questCount++;}
        if ($row['quest6']<2) { $questCount++;}
    }
    // --------------------------------  QUEST BADGES JACK LUMBER
    if ($roomID=='024') {
        if ($row['quest7']<2) { $questCount++;}
        if ($row['quest8']<2) { $questCount++;}
        if ($row['quest9']<2) { $questCount++;}
    }
    // --------------------------------  QUEST BADGES FREDDIE
    if ($roomID=='103') {
        if ($row['quest10']<2) { $questCount++;}
    }
    // --------------------------------  QUEST BADGES RED GUARD CAPTAIN
    if ($roomID=='215') {
        if ($row['quest11']<2) { $questCount++;}
        if ($row['quest12']<2) { $questCount++;}
        if ($row['quest13']<2) { $questCount++;}
    }
    // --------------------------------  QUEST BADGES FOREST GNOME
    if ($roomID=='128') {
        if ($row['quest14']<2) { $questCount++;}
        if ($row['quest15']<2) { $questCount++;}
        if ($row['quest16']<2) { $questCount++;}
    }
    // --------------------------------  QUEST BADGES HUNTER BILL
    if ($roomID=='118') {
        if ($row['quest17']<2) { $questCount++;}
        if ($row['quest18']<2) { $questCount++;}
    }
    // -------------------  QUEST BADGES WARRIORS GUILD INITIATION
    if ($roomID=='226') {
        if ($row['quest19']<2) { $questCount++;}
    }
    // -------------------  QUEST BADGES WIZARDS GUILD INITIATION
    if ($roomID=='225') {
        if ($row['quest20']<2) { $questCount++;}
    }
    // --------------------------------  QUEST BADGES Town Hall Plaza
    if ($roomID=='221') {
        if ($row['quest21']<2) { $questCount++;}
        if ($row['quest22']<2) { $questCount++;}
        if ($row['quest23']<2) { $questCount++;}
    }
    // -------------------  QUEST BADGES RED TOWN MAYOR
    if ($roomID=='222') {
        if ($row['quest24']<2) { $questCount++;}
    }
    // --------------------------------  QUEST BADGES Warriors guild - pete
    if ($roomID=='226') {
        if ($row['quest25']<2) { $questCount++;}
        if ($row['quest26']<2) { $questCount++;}
        if ($row['quest27']<2) { $questCount++;}
    }
    // --------------------------------  QUEST BADGES Wizards guild - Morty
    if ($roomID=='225') {
        if ($row['quest28']<2) { $questCount++;}
        if ($row['quest29']<2) { $questCount++;}
        if ($row['quest30']<2) { $questCount++;}
    }
    // -------------------  QUEST BADGES Mining Guild Initiation
    if ($roomID=='308') {
        if ($row['quest31']<2) { $questCount++;}
    }
    // --------------------------------  QUEST BADGES Mining Guild Leader
    if ($roomID=='308') {
        if ($row['quest32']<2) {$questCount++;}
        if ($row['quest33']<2) {$questCount++;}
        if ($row['quest34']<2) {$questCount++;}
    }
    // --------------------------------  QUEST BADGES Dwarf Captain
    if ($roomID=='303') {
        if ($row['quest35']<2) {$questCount++;}
        if ($row['quest36']<2) {$questCount++;}
        if ($row['quest37']<2) {$questCount++;}
    }
    // --------------------------------  QUEST BADGES Dwarf Village Bounty Board
    if ($roomID=='307') {
        if ($row['quest38']<2) {$questCount++;}
        if ($row['quest39']<2) {$questCount++;}
        if ($row['quest40']<2) {$questCount++;}
    }
    // --------------------------------  QUEST BADGES Friendly Pirate
    if ($roomID=='413') {
        if ($row['quest41']<2) {$questCount++;}
        if ($row['quest42']<2) {$questCount++;}
        if ($row['quest43']<2) {$questCount++;}
    }
    // --------------------------------  QUEST BADGES Jungle Jim
    if ($roomID=='424') {
        if ($row['quest44']<2) {$questCount++;}
        if ($row['quest45']<2) {$questCount++;}
        if ($row['quest46']<2) {$questCount++;}
    }
    // --------------------------------  QUEST BADGES Water Temple Guardian
    if ($roomID=='425') {
        if ($row['quest47']<2) {$questCount++;}
        if ($row['quest48']<2) {$questCount++;}
        if ($row['quest49']<2) {$questCount++;}
        if ($row['quest50']<2) {$questCount++;}
    }
    // --------------------------------  QUEST BADGES Dark Forest Outpost - Ranger Guard
    if ($roomID=='502') {
        if ($row['quest51']<2) {$questCount++;}
        if ($row['quest52']<2) {$questCount++;}
        if ($row['quest53']<2) {$questCount++;}
    }
    // --------------------------------  QUEST BADGES Dark Elf Tree Hut
    if ($roomID=='506') {
        if ($row['quest54']<2) {$questCount++;}
        if ($row['quest55']<2) {$questCount++;}
        if ($row['quest56']<2) {$questCount++;}
    }
    // --------------------------------  QUEST BADGES Rangers Guild Initiation
    if ($roomID=='515') {
        if ($row['quest57']<2) {$questCount++;}
    }
    // --------------------------------  QUEST BADGES Ranger Lego
    if ($roomID=='515b') {
        if ($row['quest58']<2) {$questCount++;}
        if ($row['quest59']<2) {$questCount++;}
        if ($row['quest60']<2) {$questCount++;}
    }
    // --------------------------------  QUEST BADGES Stone Mountain Base Camp
    if ($roomID=='607') {
        if ($row['quest61']<2) {$questCount++;}
        if ($row['quest62']<2) {$questCount++;}
        if ($row['quest63']<2) {$questCount++;}
    }
    // --------------------------------  QUEST BADGES Blue Guard Mountain Outpost
    if ($roomID=='608') {
        if ($row['quest64']<2) {$questCount++;}
        if ($row['quest65']<2) {$questCount++;}
        if ($row['quest66']<2) {$questCount++;}
    }
    // --------------------------------  QUEST BADGES Chilly Pete Mountain Cabin
    if ($roomID=='609') {
        if ($row['quest67']<2) {$questCount++;}
        if ($row['quest68']<2) {$questCount++;}
        if ($row['quest69']<2) {$questCount++;}
    }
    // --------------------------------  QUEST BADGES Blue Gate - Rigel the Brave
    if ($roomID=='611') {
        if ($row['quest70']<2) {$questCount++;}
    }

    // --------------------------------  QUEST BADGES XXXTEMPLATE
    if ($roomID=='999') {
        if ($row['quest7']<2) {$questCount++;}
        if ($row['quest7']<2) {$questCount++;}
        if ($row['quest7']<2) {$questCount++;}
    }


    // -------------------------------- ALL QUEST BADGES
    if ($questCount>0) {
        //if ($roomID=='003' || $roomID=='003c' || $roomID=='024') {
        $questBtnTop = '<a href="" data-link="quests" class="btn goldBG white badge">
            <i class="icon">'.file_get_contents("img/svg/trophy.svg").'</i>';
        $questBtnTBottom = '<span class="alert">'.$questCount.'</span>
        <span class="text">Quests</span>

          </a>';
        echo $questBtnTop;
        echo $questBtnTBottom;
        //}
    }

    // -------------------------------- CRAFT BADGES
    if ($roomID=='025' || ($row['craftingtable'] == $row['room'])) {
        echo '<a href="" data-link2="craft" class="btn  red  white redBG badge">
        <i class="icon">'.file_get_contents("img/svg/craft.svg").'</i>';
        echo '<span class="alert">'.$row['wood'].'</span>
        <span class="text">Crafting</span>
      </a>';
    }

    // -------------------------------- COOK MEAT BADGE
    if ($roomID=='003' && $row['rawmeat']>=1) {
        echo '<button class="badge redBG lightgray" type="submit" name="input1" value="cook meat">
        <i class="icon">'.file_get_contents("img/svg/steak.svg").'</i>
        <span class="alert">'.$row['rawmeat'].'</span>
        <span class="text">Cook Meat</span>
        </button>';
    }




    // -------------------------------- BADGE - CHOP TREE
    if ($row['wood']<10 && $roomID=='025') {
        $wood10 = 10 - $row['wood'];
        echo '
      <button class="btn forestBG white badge" type="submit" name="input1" value="chop tree">
          <i class="icon">'.file_get_contents("img/svg/axelog.svg").'</i>
          <span class="alert">'.$wood10.'</span>
          <span class="text">Chop Wood</span>
          </button>';
    }
    // -------------------------------- BADGE - PICK BLUEBERRY
    if ($row['blueberry']<5 && $roomID=='005') {
        $opposite = 5 - $row['blueberry'];
        echo '
      <button class="btn blueBG white badge" type="submit" name="input1" value="pick blueberry">
          <i class="icon">'.file_get_contents("img/svg/blueberry.svg").'</i>
          <span class="alert">'.$opposite.'</span>
          <span class="text">Pick Blueberry</span>

          </button>';
    }
    // -------------------------------- BADGE - CHOP TREE







    // -------------------------------- BADGE - WOODEN BOAT
    // --------------------------------------------------------------------------- wooden boat
if ($row['equipMount'] != 'wooden boat' && $row['MOUNTwoodenboat'] > 0 &&
($room == '016' || $room == 401 || $room == 402 || $room == 403 || $room == 404 || $room == 405 || $room == 406 || $room == 407 || $room == 408 || $room == 409 || $room == 410 || $room == 411 || $room == 412 || $room == 413 || $room == 414 || $room == 415 || $room == 416 || $room == 417 || $room == 418 || $room == 419 || $room == 420 || $room == 421 || $room == 422 || $room == 423 || $room == 424 || $room == 426)
) 
{
    echo '
    <button class="btn brownBG white badge" type="submit" name="input1" value="use wooden boat">
        <i class="icon">'.file_get_contents("img/svg/boat.svg").'</i>
        <span class="text">Use Boat</span>
        </button>';
}
    echo '</div>';

   // echo'<div class="nav">';
    echo '<div class="navhud">';
   /*
    $char = file_get_contents("img/svg/character.svg");
    $char = file_get_contents("img/svg/npc/char-archer.svg");
    $char = file_get_contents("img/svg/npc/char-spearman.svg");
    $char = file_get_contents("img/svg/npc/char-darkprince.svg");
    $char = file_get_contents("img/svg/npc/char-general.svg");
    $char = file_get_contents("img/svg/npc/char-wizard.svg");
    $char = file_get_contents("img/svg/npc/char-wanderer.svg");
    $char = file_get_contents("img/svg/npc/char-mage.svg");
    $char = file_get_contents("img/svg/npc/char-marauder.svg");
    $char = file_get_contents("img/svg/npc/char-soldier.svg");
    $char = file_get_contents("img/svg/npc/char-beastmaster.svg");
    $char = file_get_contents("img/svg/npc/char-barbarian.svg");
    $char = file_get_contents("img/svg/npc/char-ranger1.svg");
    $char = file_get_contents("img/svg/npc/char-commander.svg");
*/

//echo 'WT:'.$weapontype.'<br>';

    list($charactercolor, $char) = getCharacterDetails($weapontype, $row);

    echo '<i class="icon '.$charactercolor.' character hide-on-mobile">'.$char.'</i>';
    echo '<div class="lightgray">'.$row['username'].'<span class="gray"> lvl </span><span class="gold">'. $row['level'].'</span></div>';


    echo '<div class="buffboundXXX small">';
    //<span class= "cyan"> e</span><span class="cyan">'. $row['evolve'].'</span>
    // --------------------------------------------------------------------------- Poison Buff Box
    if ($_SESSION['poisonyou'] >  0) {
        echo '<span class="green buffBox">poison -'.$_SESSION['poisonyou'].'</span> ';
    }
    // --------------------------------------------------------------------------- COLORS Box
    if ($_SESSION['reds'] >  0) {
        echo '<span class="red buffBox">str</span> ';
    }
    if ($_SESSION['greens'] >  0) {
        echo '<span class="green buffBox">dex</span> ';
    }
    if ($_SESSION['blues'] >  0) {
        echo '<span class="blue buffBox">mag</span> ';
    }
    if ($_SESSION['yellows'] >  0) {
        echo '<span class="gold buffBox">def</span> ';
    }
    if ($_SESSION['coffee'] >  0) {
        echo '<span class="lightbrown buffBox">java</span> ';
    }
    if ($_SESSION['tea'] >  0) {
        echo '<span class="yellowgreen buffBox">tea</span> ';
    }
    // --------------------------------------------------------------------------- Iron Skin Buff Box
    if ($_SESSION['ironskin_amount'] >  0) {
        echo '<span class="gold buffBox">iron</span> ';
    }
    // --------------------------------------------------------------------------- Regenerate Buff Box
    if ($_SESSION['regenerate_clicks'] >  0) {
        echo '<span class="red buffBox">regen</span> ';
    }
    // --------------------------------------------------------------------------- Flying Buff Box
    if ($_SESSION['flying'] >  0) {
        echo '<span class="blue buffBox">wings</span> ';
    }
    // --------------------------------------------------------------------------- Breathing Water Buff Box
    if ($_SESSION['breathingwater'] >  0) {
        echo '<span class="darkblue buffBox">gills</span> ';
    }

    echo '</div>'; // end buffbound box



    // --------------------------------------------------------------------------- HP BAR
    // HP Percent
    $percent = (($row['hp'] / $row['hpmax'])* 100);
    if ($percent > 100) {
        $percent = 100;
    }

    if ($row['hp'] >  $row['hpmax']) { // HP EXTRA
        $barBGcolor = 'redBG';
        $barNUMcolor = 'yellow';
        $extrahp = $row['hp'] - $row['hpmax'];
    } else { // HP NORMALbr
        $barBGcolor = 'redBG';
        $barNUMcolor = 'lightgray';
    }
    echo '
	<div class="bar">
	<div style="width: '.$percent.'%" class="barMid '.$barBGcolor.'">
     <span>HP</span>
	</div>
	<span class="maxxer "><strong class="'.$barNUMcolor.'">'.$row['hp'].'</strong><span class="small lgray"> / '.$row['hpmax'].'</span></span>
	';
    echo '</div>';

    // --------------------------------------------------------------------------- Magic Armor Buff Box
    if ($_SESSION['magicarmor_amount'] >  0) {
        echo '<span class="red magicarmorBox">+'.$_SESSION['magicarmor_amount'].'</span> ';
    }


    // --------------------------------------------------------------------------- MP BAR
    // MP Percent
    $percent = (($row['mp'] / $row['mpmax'])* 100);
    if ($percent > 100) {
        $percent = 100;
    }


    if ($row['mp'] >  $row['mpmax']) { // HP EXTRA
        $barBGcolor = 'blueBG';
        $barNUMcolor = 'yellow';
        $extramp = $row['mp'] - $row['mpmax'];
    } else {
        $barBGcolor = 'blueBG';
        $barNUMcolor = 'lightgray';
    }

    echo '
	<div class="bar">
	<div style="width: '.$percent.'%" class="barMid '.$barBGcolor.'">
    <span> MP</span>
	</div>
	<span class="maxxer"><strong class="'.$barNUMcolor.'">'.$row['mp'] .'</strong><span class="small lgray"> / '.$row['mpmax'].'</strong>
	</div>';


    // XP Percent
    $xpPercent = $count2;
    if ($xpPercent > 100) {
        $xpPercent = 100;
    }
    if ($xpPercent < 0) {
        $xpPercent = 0;
    }
    $xpPercent = round($xpPercent,2);
    //$percent = $percent * $scale;

    $barBGcolor = 'greenBG';
    $barNUMcolor = 'lightgray';
    echo '
<div class="bar">
<div style="width: '.$xpPercent.'%" class="barMid '.$barBGcolor.'">
<span>XP</span>
</div>
<span class="maxxer small"> '.$xpPercent.'% </span>
</div>';
// echo '
// <div class="bar">
// <div style="width: '.$xpPercent.'%" class="barMid '.$barBGcolor.'">
// <span>XP</span>
// </div>
// <span class="maxxer small">'.$num_xp.' <span class="gray"> / '.$num_total.' </span></span>

// </div>';


echo '</div>';
//echo '<div class="navhud2">';  // NAVHUD 2
include('navquicklinks.php'); // ------------------------------------------------------- NAV QUICK LINKS 
//echo '</div>'; // END NAVHUD 2


echo '<div class="quickBox">';



// --------------------------------------------------------------------------- DISPLAY OTHER USERS
// function to display a button for every other users names here if it matches the room you, the user, is also in.
// function displayOtherUsers($currentRoom, $currentUsername) {
//     global $users;
//     $otherUsers = [];
//     foreach ($users as $user) {
//         if ($user['room'] === $currentRoom && $user['username'] !== $currentUsername) {
//             $otherUsers[] = $user;
//         }
//     }
//     // Show the message ONCE if there are any other users
//     if (count($otherUsers) > 0) {
//         echo '<p class="gold">Also Here:</p>';
//         foreach ($otherUsers as $user) {
//             echo '<button class="oceanBG userButton" type="button" data-username="' . htmlspecialchars($user['username']) . '">' . htmlspecialchars($user['username']) . '</button>';
//         }
//         echo '•';
//     }
// }
// Fetch all users from the database
// $users = [];
// $result = $link->query("SELECT username, room FROM users");
// if ($result) {
//     while ($user = $result->fetch_assoc()) {
//         $users[] = $user;
//     }
// }
// displayOtherUsers($row['room'], $row['username']); // Call the function with the current room and username from the user data

echo '
<div id="room-users-container">
  <!-- Dynamic user buttons will be inserted here -->
</div>';


// --------------------------------------------------------------------------- CLEAR FEED COUNTER - 200?
if ($row['feedcounter']>=200) {
    echo'<button class="greenBG" type="submit" name="input1" value="clear feed">Clear Feed <br> [' .$feedcounter.']</button>';
} 

        

// -------------------------------- ALL QUEST BTN
if ($questCount>0) {
    //if ($roomID=='003' || $roomID=='003c' || $roomID=='024') {
    $questBtnTop = '<a href="" data-link="quests" class="goldBG white badge">
        <i class="icon">'.file_get_contents("img/svg/trophy.svg").'</i>';
    $questBtnTBottom = '<span class="alert">'.$questCount.'</span>
    <span class="text">Quests</span>

        </a>';
   //     echo'<a href="" data-link="quests" class="btn goldBG">Quests ['.$questCount.']</a>';
        echo'<a href="" data-link="quests" class="btn goldBG">Open Quests</a>';

   // echo $questBtnTop;
   // echo $questBtnTBottom;
    //}
}


// -------------------------------- CRAFT BADGES
if ($roomID=='025' || ($row['craftingtable'] == $row['room'])) {
    echo '<button href="" data-link2="craft" class="btnXXX white redBG">
    <span class="text">Craft</span>
    </button>';
} 


//-------------------------------- Room Buttons
if ($roomID == '001') {
    if ($infight == 0 && $_SESSION['chest1'] != 0 && ($currenttimedaily >= $dailychestnextavailable)) {
        $btnIcon = file_get_contents("img/svg/chest.svg");
        echo '<button class="yellowBG dddgray btnIcon" type="submit" name="input1" value="open daily chest">
        <span>Open Daily Chest</span>
        <span>'.$btnIcon.'</span>
        </button>';
        }
    else if ($_SESSION['chest1'] == 0) {
        echo '<button class="goldBG" type="submit" name="input1" value="open chest">Open Gold Chest</button>';
    }
    $btnIcon = file_get_contents("img/svg/sign.svg");
    echo '<button class="brownBG btnIcon" type="submit" name="input1" value="read sign">Read Sign <span class="">'.$btnIcon.'</span></button>';
}
else if ($roomID == '002') {
    if ($row['redberry'] < 5) {
        echo pickRedberry();
    }
}
else if ($roomID == '003') {
    if ($row['rawmeat'] >= 1) {
        echo'<button class="redBG" type="submit" name="input1" value="cook meat">Cook Meat</button>';
    }
    //echo'<a href="" data-link="quests" class="btn goldBG">Open Quests</a>';
   // echo'<button class="brownBG" type="submit" name="input1" value="down">Enter Basement'.file_get_contents("img/svg/arrow-down.svg").'</button>';
    echo'<button class="brownBG" type="submit" name="input1" value="down">Enter Basement</button>';
} 
else if ($roomID == '003b') {
   // echo'<button class="greenBG" type="submit" name="input1" value="up">'.file_get_contents("img/svg/arrow-up.svg").'Exit Basement</button>';
    echo'<button class="greenBG" type="submit" name="input1" value="up">Exit Basement</button>';
    echo'<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>';
    echo'<button class="redBG" type="submit" name="input1" value="attack">Attack</button>';
} 
else if ($roomID == '003bb') {
    echo'<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>';
    echo'<button class="redBG" type="submit" name="input1" value="attack">Attack</button>';
} 
else if ($roomID == '003c') {
    if ($row['trainingsword'] == 0) {
        echo'<button class="blueBG" type="submit" name="input1" value="pick up weapons">Pick Up Weapons</button>';
    }
//echo'<a href="" data-link="quests" class="btn goldBG">Open Quests</a>';
echo'<a href="" data-link2="skills" class="btn purpleBG">Open Skills</a>';
echo'<a href="" data-link="inv" class="btn greenBG">Open Inventory</a>';
//echo'<button class="redBG" type="submit" name="input1" value="attack dummy">Attack Dummy</button>';
} 
else if ($roomID == '004' && $row['flower'] == 0) {
    echo'<button class="goldBG" type="submit" name="input1" value="pick flower">Pick Flower</button>';
}
else if ($roomID == '005') {
    if ($row['blueberry'] < 5) {
        echo'<button class="blueBG" type="submit" name="input1" value="pick blueberry">Pick Blueberry</span>
        </button>';
    }
}
else if ($roomID == '006') {
    echo'<a href="" data-link="shop" class="btn goldBG">View Shop</a>';
} 
else if ($roomID == '007') {
    echo'<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>';
} 
else if ($roomID == '008') {
    echo'<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>';
} 
else if ($roomID == '012') {
    echo'<button class="redbrownBG btnIcon" type="submit" name="input1" value="down">Enter Scorpion Pit '.file_get_contents("img/svg/arrow-down.svg").'</button>';
} 
else if ($roomID == '012b') { 
    echo'<button class="grayBG btnIcon" type="submit" name="input1" value="up">'.file_get_contents("img/svg/arrow-up.svg").'Exit Scorpion Pit</button>';
} 
else if ($roomID == '012d') { 
    echo'<button class="goldBG" type="submit" name="input1" value="flip lever">Flip Lever</button>';
} 
else if ($roomID == '012h') { 
    if ($_SESSION['scorpiontreasure'] >= $_SESSION['scorpiontreasurecheck']){
                echo '<button class="darkestgrayBG" type="submit" name="input1" value="open chest">Open Chest</button>';
    }
    if ($row['pickaxe'] == 0) {
        echo '<button class="ddgrayBG" type="submit" name="input1" value="get pickaxe">Get Pickaxe</button>';
    }
}  
else if ($roomID == '020') {
    echo'<input type="submit" class="greenBG" name="input1" value="rest">';
} 
else if ($roomID == '021') {
    echo'<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>';
    echo'<a href="" data-link2="spells" class="btn purpleBG">Open Spells</a>';
    echo'<a href="" data-link="shop" class="btn goldBG">View Shop</a>';
}  







else if ($roomID == '999') {
    echo'<a href="" data-link="quests" class="btn goldBG">Open Quests</a>';
echo'<a href="" data-link2="skills" class="btn purpleBG">Open Skills</a>';
echo'<a href="" data-link="inv" class="btn greenBG">Open Inventory</a>';

}




echo '
•
<input type="submit" class="redBG" name="input1" value="attack">
<input type="submit" class="goldBG" name="input1" value="search">
<input type="submit" class="greenBG" name="input1" value="rest">
<input type="submit" class="blueBG" name="input1" value="look">
</div>';


echo '
<div class="nav-center">';
	echo '
    <div id="compass">
        <div id="map" class=" '.$mapID.'"></div>
		<span class="nw '.$dirNW.'"><button class="" type="submit" name="input1" value="northwest"><i>NW</i></button>'.file_get_contents("img/svg/arrow-northwest.svg").'</span>
		<span class="n '.$dirN.'"><button class="" type="submit" name="input1" value="north"><i>N</i></button>'.file_get_contents("img/svg/arrow-north.svg").'</span>
		<span class="ne '.$dirNE.'"><button class="" type="submit" name="input1" value="northeast"><i>NE</i></button>'.file_get_contents("img/svg/arrow-northeast.svg").'</span>
		<span class="w '.$dirW.'"><button class="" type="submit" name="input1" value="west"><i>W</i></button>'.file_get_contents("img/svg/arrow-west.svg").'</span>
		<span class="e '.$dirE.'"><button class="" type="submit" name="input1" value="east"><i>E</i></button>'.file_get_contents("img/svg/arrow-east.svg").'</span>
		<span class="sw '.$dirSW.'"><button class="" type="submit" name="input1" value="southwest"><i>SW</i></button>'.file_get_contents("img/svg/arrow-southwest.svg").'</span>
		<span class="s '.$dirS.'"><button class="" type="submit" name="input1" value="south"><i>S</i></button>'.file_get_contents("img/svg/arrow-south.svg").'</span>
		<span class="se '.$dirSE.'"><button class="" type="submit" name="input1" value="southeast"><i>SE</i></button>'.file_get_contents("img/svg/arrow-southeast.svg").'</span>
    <div class="updown">
		<span class="u '.$dirU.'"><button class="" type="submit" name="input1" value="up"><i>U</i></button>'.file_get_contents("img/svg/arrow-up.svg").'</span>
		<span class="d '.$dirD.'"><button class="" type="submit" name="input1" value="down"><i>D</i></button>'.file_get_contents("img/svg/arrow-down.svg").'</span>
    </div>
    </div>

    </div>
  </div>';


    //   	</form>
//  <p class="danger">danger lvl <strong>'.$_SESSION['dangerLVL'].'</strong></p>
//}
