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

// $row = getUserData($link, $_SESSION['username']); // --- gets all user data from database

//$row = getKLData($link, $username); // --- gets all Kill List data from database

    //---------------------------------------------------------------------------- KL

    echo '<h3 class="spCount">TOTAL<span class="red">'. $_SESSION['KLtotalkill'].'</h5>';
    echo '<div class="gbox">';

    echo '<h1 class="gold">Kill List</h1>';

    echo '</div>';
    echo'<div class="gbox">';
    echo '<h3 class="yellowgreen">Grassy Field </h3><h5 class="dddgrayBG lgray levelrange">lvl 1-5</h5>';


    // if ($_SESSION['KLbullfrog']>=1) {
    //     echo '<h4 class="elvl">xxx: KLbullfrog <span class="right gold">'. $_SESSION['KLbullfrog'].'</span></h4>	';
    // } else {
    //     echo '<div><span class="ddgray">KLbullfrog </span></div>';
    // }





    if ($_SESSION['KLrat']>=1) {
        echo '<h4 class="elvl">1: Rat <span class="right gold">'. $_SESSION['KLrat'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Rat </span></div>';
    }
    if ($_SESSION['KLsandcrab']>=1) {
        echo '<h4 class="elvl">2: Sand Crab <span class="right gold">'. $_SESSION['KLsandcrab'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Sand Crab </span></div>';
    }
    if ($_SESSION['KLgiantrat']>=1) {
        echo '<h4 class="elvl">3: Giant Rat <span class="right gold">'. $_SESSION['KLgiantrat'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Giant Rat </span></div>';
    }
    if ($_SESSION['KLgator']>=1) {
        echo '<h4 class="elvl green">5: Gator <span class="right gold">'. $_SESSION['KLgator'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Gator </span></div>';
    }

    echo '</div><div class="gbox">';

    echo '<h3 class="gray">Spider Cave</h3><h5 class="dddgrayBG lgray levelrange">lvl 2-5</h5>';

    if ($_SESSION['KLspider']>=1) {
        echo '<h4 class="elvl">2: Spider <span class="right gold">'. $_SESSION['KLspider'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Spider </span></div>';
    }
    if ($_SESSION['KLscorpion']>=1) {
        echo '<h4 class="elvl">3: Scorpion <span class="right gold">'. $_SESSION['KLscorpion'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Scorpion </span></div>';
    }
    if ($_SESSION['KLgiantspider']>=1) {
        echo '<h4 class="elvl">4: Giant Spider <span class="right gold">'. $_SESSION['KLgiantspider'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Giant Spider </span></div>';
    }
    if ($_SESSION['KLalphascorpion']>=1) {
        echo '<h4 class="elvl">5: Alpha Scorpion <span class="right gold">'. $_SESSION['KLalphascorpion'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Alpha Scorpion </span></div>';
    }





    echo '</div><div class="gbox">';

    echo '<h3 class="lightred">Scorpion Pit</h3><h5 class="dddgrayBG lgray levelrange">lvl 5-30</h5>';

    if ($_SESSION['KLscorpionguard']>=1) {
        echo '<h4 class="elvl">7: Scorpion Guard <span class="right gold">'. $_SESSION['KLscorpionguard'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Scorpion Guard </span></div>';
    }
    if ($_SESSION['KLmammothscorpion']>=1) {
        echo '<h4 class="elvl">10: Mammoth Scorpion <span class="right gold">'. $_SESSION['KLmammothscorpion'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Mammoth Scorpion </span></div>';
    }
    if ($_SESSION['KLscorpionqueen']>=1) {
        echo '<h4 class="blue elvl">15: Scorpion Queen <span class="right gold">'. $_SESSION['KLscorpionqueen'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Scorpion Queen </span></div>';
    }
    if ($_SESSION['KLscorpionking']>=1) {
        echo '<h4 class="lightred elvl">30: Scorpion King <span class="right gold">'. $_SESSION['KLscorpionking'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Scorpion King </span></div>';
    }










    echo '</div><div class="gbox">';

    echo '<h3 class="darkblue">Bat Cave</h3><h5 class="dddgrayBG lgray levelrange">lvl 2-10</h5>';

    if ($_SESSION['KLbat']>=1) {
        echo '<h4 class="elvl">2: Bat <span class="right gold">'. $_SESSION['KLbat'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Bat </span></div>';
    }
    if ($_SESSION['KLgoldenbat']>=1) {
        echo '<h4 class="elvl"><span class="rare">R</span>6: Golden Bat <span> '. $_SESSION['KLgoldenbat'].'</span>	';
    } else {
        echo '<div><span class="ddgray"><span class="rare">R</span>Golden Bat <i>rare</i> </span> </div>';
    }

    if ($_SESSION['KLsalamander']>=1) {
        echo '<h4 class="elvl">6: Salamander <span class="right gold">'. $_SESSION['KLsalamander'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Salamander </span></div>';
    }
    if ($_SESSION['KLgoblin']>=1) {
        echo '<h4 class="elvl">5: Goblin <span class="right gold">'. $_SESSION['KLgoblin'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Goblin </span></div>';
    }
    if ($_SESSION['KLgoblinbandit']>=1) {
        echo '<h4 class="elvl">7: Goblin Bandit <span class="right gold">'. $_SESSION['KLgoblinbandit'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Goblin Bandit </span></div>';
    }
    if ($_SESSION['KLgoblinchief']>=1) {
        echo '<h4 class="lightbrown elvl">10: Goblin Chief <span class="right gold">'. $_SESSION['KLgoblinchief'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Goblin Chief </span></div>';
    }


    echo '</div><div class="gbox">';


    echo '<h3 class="green">Forest Path</h3><h5 class="dddgrayBG lgray levelrange">lvl 1-10</h5>';

    if ($_SESSION['KLcow']>=1) {
        echo '<h4 class="elvl">4: Cow <span class="right gold">'. $_SESSION['KLcow'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Cow </span></div>';
    }
    if ($_SESSION['KLsnake']>=1) {
        echo '<h4 class="elvl">5: Snake <span class="right gold">'. $_SESSION['KLsnake'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Snake </span></div>';
    }
    if ($_SESSION['KLhillogre']>=1) {
        echo '<h4 class="lightbrown elvl">10: Hill Ogre <span class="right gold">'. $_SESSION['KLhillogre'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Hill Ogre</span></div>';
    }
    if ($_SESSION['KLimp']>=1) {
        echo '<h4 class="elvl">7: <span class="rare">R</span>Imp <span class="right gold">'. $_SESSION['KLimp'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray"><span class="rare">R</span>Imp </span></div>';
    }

    echo '</div><div class="gbox">';

    echo '<h3 class="blue">Ogre Lair</h3><h5 class="dddgrayBG lgray levelrange">lvl 2-13</h5>';

    if ($_SESSION['KLhobgoblin']>=1) {
        echo '<h4 class="elvl">6: Hob Goblin <span class="right gold">'. $_SESSION['KLhobgoblin'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Hob Goblin </span></div>';
    }
    if ($_SESSION['KLorc']>=1) {
        echo '<h4 class="elvl">7: Orc <span class="right gold">'. $_SESSION['KLorc'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Orc </span></div>';
    }
    if ($_SESSION['KLogre']>=1) {
        echo '<h4 class="elvl">8: Ogre <span class="right gold">'. $_SESSION['KLogre'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Ogre </span></div>';
    }
    if ($_SESSION['KLogreguard']>=1) {
        echo '<h4 class="elvl">9: Ogre Guard <span class="right gold">'. $_SESSION['KLogreguard'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Ogre Guard</span></div>';
    }
    if ($_SESSION['KLfireogress']>=1) {
        echo '<h4 class="elvl">10: Fire Ogress <span class="right gold">'. $_SESSION['KLfireogress'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Fire Ogress </span></div>';
    }
    if ($_SESSION['KLogrelieutenant']>=1) {
        echo '<h4 class="blue elvl">13: Ogre Lieutenant <span class="right gold">'. $_SESSION['KLogrelieutenant'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Ogre Lieutenant</span></div>';
    }
    if ($_SESSION['KLogrepriest']>=1) {
        echo '<h4 class="elvl">11: <span class="rare">R</span>Ogre Priest <span class="right gold">'. $_SESSION['KLogrepriest'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray"><span class="rare">R</span>Ogre Priest </span></div>';
    }




    echo '</div><div class="gbox">';
    echo '<h3 class="medpurple">Kobold Layer</h3><h5 class="dddgrayBG lgray levelrange">lvl 3-13</h5>';

    if ($_SESSION['KLkobold']>=1) {
        echo '<h4 class="elvl">7: Kobold <span class="right gold">'. $_SESSION['KLkobold'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Kobold </span></div>';
    }
    if ($_SESSION['KLflyingkobold']>=1) {
        echo '<h4 class="elvl">7: Flying Kobold <span class="right gold">'. $_SESSION['KLflyingkobold'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Flying Kobold </span></div>';
    }
    if ($_SESSION['KLkoboldshaman']>=1) {
        echo '<h4 class="elvl">8: Kobold Shaman <span class="right gold">'. $_SESSION['KLkoboldshaman'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Kobold Shaman </span></div>';
    }
    if ($_SESSION['KLkoboldninja']>=1) {
        echo '<h4 class="elvl">8: Kobold Ninja <span class="right gold">'. $_SESSION['KLkoboldninja'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Kobold Ninja </span></div>';
    }
    if ($_SESSION['KLkoboldwarlock']>=1) {
        echo '<h4 class="elvl">9: Kobold Warlock <span class="right gold">'. $_SESSION['KLkoboldwarlock'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Kobold Warlock </span></div>';
    }
    if ($_SESSION['KLkoboldchampion']>=1) {
        echo '<h4 class="elvl">10: Kobold Champion <span class="right gold">'. $_SESSION['KLkoboldchampion'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Kobold Champion </span></div>';
    }
    if ($_SESSION['KLkoboldmaster']>=1) {
        echo '<h4 class="medpurple elvl">13: Kobold Master <span class="right gold">'. $_SESSION['KLkoboldmaster'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Kobold Master</span></div>';
    }
    if ($_SESSION['KLkoboldmonk']>=1) {
        echo '<h4 class="elvl">11: <span class="rare">R</span>Kobold Monk <span class="right gold">'. $_SESSION['KLkoboldmonk'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray"><span class="rare">R</span>Kobold Monk </span></div>';
    }





    echo '</div><div class="gbox">';
    echo '<h3 class="green">Forest</h3><h5 class="dddgrayBG lgray levelrange">lvl 5-13</h5>';

    if ($_SESSION['KLwildboar']>=1) {
        echo '<h4 class="elvl">5: Wild Boar <span class="right gold">'. $_SESSION['KLwildboar'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Wild Boar </span></div>';
    }
    if ($_SESSION['KLwolf']>=1) {
        echo '<h4 class="elvl">5: Wolf <span class="right gold">'. $_SESSION['KLwolf'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Wolf </span></div>';
    }
    if ($_SESSION['KLcoyote']>=1) {
        echo '<h4 class="elvl">6: Coyote <span class="right gold">'. $_SESSION['KLcoyote'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Coyote </span></div>';
    }
    if ($_SESSION['KLbuck']>=1) {
        echo '<h4 class="elvl">6: Buck <span class="right gold">'. $_SESSION['KLbuck'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Buck </span></div>';
    }
    if ($_SESSION['KLbear']>=1) {
        echo '<h4 class="elvl">8: Bear <span class="right gold">'. $_SESSION['KLbear'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Bear </span></div>';
    }
    if ($_SESSION['KLstag']>=1) {
        echo '<h4 class="elvl">8: Stag <span class="right gold">'. $_SESSION['KLstag'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Stag </span></div>';
    }
    if ($_SESSION['KLbigfoot']>=1) {
        echo '<h4 class="elvl lightbrown">13: Bigfoot <span class="right gold">'. $_SESSION['KLbigfoot'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Bigfoot </span></div>';
    }
    if ($_SESSION['KLhawk']>=1) {
        echo '<h4 class="elvl">9: <span class="rare">R</span>Hawk <span class="right gold">'. $_SESSION['KLhawk'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray"><span class="rare">R</span>Hawk </span></div>';
    }





    echo '</div><div class="gbox">';


    echo '<h3 class="lightred">Sewers</h3><h5 class="dddgrayBG lgray levelrange">lvl 1-10</h5>';

    if ($_SESSION['KLtarantula']>=1) {
        echo '<h4 class="elvl">7: Tarantula <span class="right gold">'. $_SESSION['KLtarantula'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Tarantula </span></div>';
    }
    if ($_SESSION['KLsewerrat']>=1) {
        echo '<h4 class="elvl">7: Sewer Rat <span class="right gold">'. $_SESSION['KLsewerrat'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Sewer Rat </span></div>';
    }
    if ($_SESSION['KLredgator']>=1) {
        echo '<h4 class="elvl ">10: Red Gator <span class="right gold">'. $_SESSION['KLredgator'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Red Gator </span></div>';
    }
    if ($_SESSION['KLflyingdungbeetle']>=1) {
        echo '<h4 class="elvl">8: <span class="rare">R</span>Flying Dung Beetle <span class="right gold">'. $_SESSION['KLflyingdungbeetle'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray"><span class="rare">R</span>Flying Dung Beetle </span></div>';
    }





    echo '</div><div class="gbox">';
    echo '<h3 class="gold">Thieves Den</h3><h5 class="dddgrayBG lgray levelrange">lvl 5-14</h5>';
    if ($_SESSION['KLthief']>=1) {
        echo '<h4 class="elvl">5: Thief <span class="right gold">'. $_SESSION['KLthief'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Thief </span></div>';
    }
    if ($_SESSION['KLthiefpickpocket']>=1) {
        echo '<h4 class="elvl">8: Thief Pickpocket <span class="right gold">'. $_SESSION['KLthiefpickpocket'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Thief Pickpocket </span></div>';
    }
    if ($_SESSION['KLthiefbrute']>=1) {
        echo '<h4 class="elvl">11: Thief Brute <span class="right gold">'. $_SESSION['KLthiefbrute'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Thief Brute </span></div>';
    }
    if ($_SESSION['KLmasterthief']>=1) {
        echo '<h4 class="gold elvl">14: Master Thief <span class="right gold">'. $_SESSION['KLmasterthief'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Master Thief </span></div>';
    }




    echo '</div><div class="gbox">';
    echo '<h3 class="white">Catacombs</h3><h5 class="dddgrayBG lgray levelrange">lvl 7-17</h5>';
    if ($_SESSION['KLskeleton']>=1) {
        echo '<h4 class="elvl">7: Skeleton <span class="right gold">'. $_SESSION['KLskeleton'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Skeleton </span></div>';
    }
    if ($_SESSION['KLskeletonarcher']>=1) {
        echo '<h4 class="elvl">8: Skeleton Archer <span class="right gold">'. $_SESSION['KLskeletonarcher'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Skeleton Archer </span></div>';
    }
    if ($_SESSION['KLskeletonknight']>=1) {
        echo '<h4 class="elvl">10: Skeleton Knight <span class="right gold">'. $_SESSION['KLskeletonknight'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Skeleton Knight</span></div>';
    }
    if ($_SESSION['KLskeletonsorcerer']>=1) {
        echo '<h4 class="elvl">11: Skeleton Sorcerer <span class="right gold">'. $_SESSION['KLskeletonsorcerer'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Skeleton Sorcerer </span></div>';
    }
    if ($_SESSION['KLancientskeleton']>=1) {
        echo '<h4 class="elvl">13: Ancient Skeleton <span class="right gold">'. $_SESSION['KLancientskeleton'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Ancient Skeleton </span></div>';
    }
    if ($_SESSION['KLvictoria']>=1) {
        echo '<h4 class="blue elvl">17: Victoria the Dead <span class="right gold">'. $_SESSION['KLvictoria'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Victoria the Dead </span></div>';
    }
    if ($_SESSION['KLomar']>=1) {
        echo '<h4 class="lightred elvl">17: Omar the Dead <span class="right gold">'. $_SESSION['KLomar'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Omar the Dead </span></div>';
    }







    echo '</div><div class="gbox">';

    echo '<h3 class="green">Abandoned Mine</h3><h5 class="dddgrayBG lgray levelrange">lvl 15-23</h5>';
    if ($_SESSION['KLrabidskeever']>=1) {
        echo '<h4 class="elvl">15: Rabid Skeever <span class="right gold">'. $_SESSION['KLrabidskeever'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Rabid Skeever</span></div>';
    }
    if ($_SESSION['KLbleedingdartwing']>=1) {
        echo '<h4 class="elvl">20: Bleeding Dartwing <span class="right gold">'. $_SESSION['KLbleedingdartwing'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Bleeding Dartwing</span></div>';
    }
    if ($_SESSION['KLmongoliandeathworm']>=1) {
        echo '<h4 class="green elvl">23: Mongolian Death Worm <span class="right gold">'. $_SESSION['KLmongoliandeathworm'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Mongolian Death Worm</span></div>';
    }




    echo '</div><div class="gbox">';
    echo '<h3 class="lightblue">Stone Grotto</h3><h5 class="dddgrayBG lgray levelrange">lvl 20-25</h5>';
    if ($_SESSION['KLdemonwing']>=1) {
        echo '<h4 class="elvl">20: Demon Wing <span class="right gold">'. $_SESSION['KLdemonwing'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Demon Wing </span></div>';
    }
    if ($_SESSION['KLpossessedaxeman']>=1) {
        echo '<h4 class="lightblue elvl">25: Possessed Axeman <span class="right gold">'. $_SESSION['KLpossessedaxeman'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Possessed Axeman </span></div>';
    }






    echo '</div><div class="gbox">';
    echo '<h3 class="lightred">Red Beard\'s Fort</h3><h5 class="dddgrayBG lgray levelrange">lvl 15-30</h5>';
    if ($_SESSION['KLredbandit']>=1) {
        echo '<h4 class="elvl">15: Red Bandit <span class="right gold">'. $_SESSION['KLredbandit'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Red Bandit </span></div>';
    }
    if ($_SESSION['KLbanditmarauder']>=1) {
        echo '<h4 class="elvl">18: Bandit Marauder <span class="right gold">'. $_SESSION['KLbanditmarauder'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Bandit Marauder </span></div>';
    }
    if ($_SESSION['KLbutcher']>=1) {
        echo '<h4 class="elvl">23: Butcher <span class="right gold">'. $_SESSION['KLbutcher'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Butcher </span></div>';
    }
    if ($_SESSION['KLredbeard']>=1) {
        echo '<h4 class="lightred elvl">30: Red Beard <span class="right gold">'. $_SESSION['KLredbeard'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Red Beard </span></div>';
    }





    echo '</div><div class="gbox">';
    echo '<h3 class="blue">Blue Ocean</h3><h5 class="dddgrayBG lgray levelrange">lvl 10-40</h5>';
    if ($_SESSION['KLjellyfish']>=1) {
        echo '<h4 class="elvl">10: Jellyfish <span class="right gold">'. $_SESSION['KLjellyfish'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Jellyfish </span></div>';
    }
    if ($_SESSION['KLelectriceel']>=1) {
        echo '<h4 class="elvl">10: Electric Eel <span class="right gold">'. $_SESSION['KLelectriceel'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Electric Eel </span></div>';
    }
    if ($_SESSION['KLpiranha']>=1) {
        echo '<h4 class="elvl">11: Piranha <span class="right gold">'. $_SESSION['KLpiranha'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Piranha </span></div>';
    }
    if ($_SESSION['KLbarracuda']>=1) {
        echo '<h4 class="elvl">12: Barracuda <span class="right gold">'. $_SESSION['KLbarracuda'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Barracuda </span></div>';
    }
    if ($_SESSION['KLsquid']>=1) {
        echo '<h4 class="elvl">13: Squid <span class="right gold">'. $_SESSION['KLsquid'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Squid </span></div>';
    }
    if ($_SESSION['KLalbatross']>=1) {
        echo '<h4 class="elvl">13: Albatross <span class="right gold">'. $_SESSION['KLalbatross'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Albatross </span></div>';
    }
    if ($_SESSION['KLcrocodile']>=1) {
        echo '<h4 class="green elvl">20: Crocodile <span class="right gold">'. $_SESSION['KLcrocodile'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Crocodile </span></div>';
    }
    if ($_SESSION['KLkingsquid']>=1) {
        echo '<h4 class="blue elvl">35: King Squid <span class="right gold">'. $_SESSION['KLkingsquid'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">King Squid </span></div>';
    }
    if ($_SESSION['KLmudcrab']>=1) {
        echo '<h4 class="elvl">11: Mud Crab <span class="right gold">'. $_SESSION['KLmudcrab'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Mud Crab </span></div>';
    }





    echo '</div><div class="gbox">';
    echo '<h3 class="darkblue">Under the Ocean</h3><h5 class="dddgrayBG lgray levelrange">lvl 15-25</h5>';
    if ($_SESSION['KLgiantseaturtle']>=1) {
        echo '<h4 class="elvl">15: Giant Sea Turtle <span class="right gold">'. $_SESSION['KLgiantseaturtle'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Giant Sea Turtle </span></div>';
    }
    if ($_SESSION['KLcolossalsquid']>=1) {
        echo '<h4 class="elvl">17: Colossal Squid <span class="right gold">'. $_SESSION['KLcolossalsquid'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Colossal Squid </span></div>';
    }
    if ($_SESSION['KLhammerhead']>=1) {
        echo '<h4 class="lightblue elvl">20: Hammerhead <span class="right gold">'. $_SESSION['KLhammerhead'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Hammerhead </span></div>';
    }
    if ($_SESSION['KLgreatwhite']>=1) {
        echo '<h4 class="lightblue elvl">20: Great White <span class="right gold">'. $_SESSION['KLgreatwhite'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Great White </span></div>';
    }
    if ($_SESSION['KLkraken']>=1) {
        echo '<h4 class="green elvl">25: Kraken <span class="right gold">'. $_SESSION['KLkraken'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Kraken </span></div>';
    }
    if ($_SESSION['KLglowingoctopus']>=1) {
        echo '<h4 class="elvl">20: <span class="rare">R</span>Glowing Octopus <span class="right gold">'. $_SESSION['KLglowingoctopus'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray"><h4 class="rare">R</i>Glowing Octopus </span></div>';
    }




    echo '</div><div class="gbox">';
    echo '<h3 class="lightblue">Water Temples</h3><h5 class="dddgrayBG lgray levelrange">lvl 35-50</h5>';
    if ($_SESSION['KLthunderbarbarian']>=1) {
        echo '<h4 class="lightred elvl">35: Thunder Barbarian <span class="right gold">'. $_SESSION['KLthunderbarbarian'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Thunder Barbarian</span></div>';
    }
    if ($_SESSION['KLsmoothranger']>=1) {
        echo '<h4 class="green elvl">35: Smooth Ranger <span class="right gold">'. $_SESSION['KLsmoothranger'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Smooth Ranger</span></div>';
    }
    if ($_SESSION['KLcoralwizard']>=1) {
        echo '<h4 class="blue elvl">35: Coral Wizard </i><span class="right gold">'. $_SESSION['KLcoralwizard'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Coral Wizard</span></div>';
    }
    if ($_SESSION['KLheavywalrus']>=1) {
        echo '<h4 class="gold elvl">35: Heavy Walrus <span class="right gold">'. $_SESSION['KLheavywalrus'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Heavy Walrus</span></div>';
    }
    if ($_SESSION['KLwatertempleguardian']>=1) {
        echo '<h4 class="lightblue elvl">50: Water Temple Guardian <span class="right gold">'. $_SESSION['KLwatertempleguardian'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Water Temple Guardian </span></div>';
    }





    echo '</div><div class="gbox">';
    echo '<h3 class="lightbrown">Iron Mine</h3><h5 class="dddgrayBG lgray levelrange">lvl 15-30</h5>';
    if ($_SESSION['KLironrat']>=1) {
        echo '<h4 class="elvl">15: Iron Rat <span class="right gold">'. $_SESSION['KLironrat'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Iron Rat</span></div>';
    }
    if ($_SESSION['KLironcrab']>=1) {
        echo '<h4 class="elvl">15: Iron Crab <span class="right gold">'. $_SESSION['KLironcrab'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Iron Crab</span></div>';
    }
    if ($_SESSION['KLironscorpion']>=1) {
        echo '<h4 class="elvl">20: Iron Scorpion <span class="right gold">'. $_SESSION['KLironscorpion'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Iron Scorpion</span></div>';
    }
    if ($_SESSION['KLwarturtle']>=1) {
        echo '<h4 class="green elvl">25: War Turtle <span class="right gold">'. $_SESSION['KLwarturtle'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">War Turtle</span></div>';
    }

    if ($_SESSION['KLslagbeast']>=1) {
        echo '<h4 class="elvl">25: Slag Beast <span class="right gold">'. $_SESSION['KLslagbeast'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Slag Beast</span></div>';
    }
    if ($_SESSION['KLirongator']>=1) {
        echo '<h4 class="elvl">25: Iron Gator <span class="right gold">'. $_SESSION['KLirongator'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Iron Gator</span></div>';
    }
    if ($_SESSION['KLirongolem']>=1) {
        echo '<h4 class="elvl">25: Iron Golem <span class="right gold">'. $_SESSION['KLirongolem'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Iron Golem</span></div>';
    }
    if ($_SESSION['KLphoenix']>=1) {
        echo '<h4 class="lightred elvl">30: Phoenix <span class="right gold">'. $_SESSION['KLphoenix'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Phoenix</span></div>';
    }

    if ($_SESSION['KLironcobra']>=1) {
        echo '<h4 class="elvl">30: <span class="rare">R</span>Iron Cobra <span class="right gold">'. $_SESSION['KLironcobra'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Iron Cobra</span></div>';
    }
    if ($_SESSION['KLearthgolem']>=1) {
        echo '<h4 class="elvl">30: <span class="rare">R</span>Earth Golem <span class="right gold">'. $_SESSION['KLearthgolem'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Earth Golem</span></div>';
    }





    echo '</div><div class="gbox">';
    echo '<h3 class="gray">Steel Mine</h3><h5 class="dddgrayBG lgray levelrange">lvl 20-40</h5>';
    if ($_SESSION['KLsteelrat']>=1) {
        echo '<h4 class="elvl">20: Steel Rat <span class="right gold">'. $_SESSION['KLsteelrat'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Steel Rat</span></div>';
    }
    if ($_SESSION['KLsteelcrab']>=1) {
        echo '<h4 class="elvl">20: Steel Crab <span class="right gold">'. $_SESSION['KLsteelcrab'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Steel Crab</span></div>';
    }
    if ($_SESSION['KLsteelscorpion']>=1) {
        echo '<h4 class="elvl">25: Steel Scorpion <span class="right gold">'. $_SESSION['KLsteelscorpion'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Steel Scorpion</span></div>';
    }
    if ($_SESSION['KLulfberht']>=1) {
        echo '<h4 class="blue elvl">35: Ulfberht <span class="right gold">'. $_SESSION['KLulfberht'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Ulfberht</span></div>';
    }

    if ($_SESSION['KLblackfrog']>=1) {
        echo '<h4 class="elvl">30: Black Frog <span class="right gold">'. $_SESSION['KLblackfrog'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Black Frog</span></div>';
    }
    if ($_SESSION['KLsteelgator']>=1) {
        echo '<h4 class="elvl">35: Steel Gator <span class="right gold">'. $_SESSION['KLsteelgator'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Steel Gator</span></div>';
    }
    if ($_SESSION['KLsteelgolem']>=1) {
        echo '<h4 class="elvl">35: Steel Golem <span class="right gold">'. $_SESSION['KLsteelgolem'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Steel Golem</span></div>';
    }
    if ($_SESSION['KLcyclops']>=1) {
        echo '<h4 class="lightblue elvl">40: Cyclops <span class="right gold">'. $_SESSION['KLcyclops'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Cyclops</span></div>';
    }

    if ($_SESSION['KLstoneassassin']>=1) {
        echo '<h4 class="elvl">40: <span class="rare">R</span>Stone Assassin <span class="right gold">'. $_SESSION['KLstoneassassin'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Stone Assassin</span></div>';
    }
    if ($_SESSION['KLgammamonk']>=1) {
        echo '<h4 class="elvl">40: <span class="rare">R</span>Gamma Monk <span class="right gold">'. $_SESSION['KLgammamonk'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Gamma Monk</span></div>';
    }





    echo '</div><div class="gbox">';
    echo '<h3 class="blue">Mithril Mine</h3><h5 class="dddgrayBG lgray levelrange">lvl 30-60</h5>';
    if ($_SESSION['KLmithrilrat']>=1) {
        echo '<h4 class="elvl">30: Mithril Rat <span class="right gold">'. $_SESSION['KLmithrilrat'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Mithril Rat</span></div>';
    }
    if ($_SESSION['KLmithrilcrab']>=1) {
        echo '<h4 class="elvl">30: Mithril Crab <span class="right gold">'. $_SESSION['KLmithrilcrab'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Mithril Crab</span></div>';
    }
    if ($_SESSION['KLmithrilscorpion']>=1) {
        echo '<h4 class="elvl">40: Mithril Scorpion <span class="right gold">'. $_SESSION['KLmithrilscorpion'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Mithril Scorpion</span></div>';
    }
    if ($_SESSION['KLgriffin']>=1) {
        echo '<h4 class="blue elvl">50: Griffin <span class="right gold">'. $_SESSION['KLgriffin'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Griffin</span></div>';
    }

    if ($_SESSION['KLbluefrog']>=1) {
        echo '<h4 class="elvl">45: Blue Frog <span class="right gold">'. $_SESSION['KLbluefrog'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Blue Frog</span></div>';
    }
    if ($_SESSION['KLmithrilgator']>=1) {
        echo '<h4 class="elvl">45: Mithril Gator <span class="right gold">'. $_SESSION['KLmithrilgator'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Mithril Gator</span></div>';
    }
    if ($_SESSION['KLmithrilgolem']>=1) {
        echo '<h4 class="elvl">45: Mithril Golem <span class="right gold">'. $_SESSION['KLmithrilgolem'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Mithril Golem</span></div>';
    }
    if ($_SESSION['KLminotaur']>=1) {
        echo '<h4 class="lightred elvl">60: Minotaur <span class="right gold">'. $_SESSION['KLminotaur'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Minotaur</span></div>';
    }

    if ($_SESSION['KLcosmicmage']>=1) {
        echo '<h4 class="elvl">60: <span class="rare">R</span>Cosmic Mage <span class="right gold">'. $_SESSION['KLcosmicmage'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Cosmic Mage</span></div>';
    }
    if ($_SESSION['KLcarbonbeast']>=1) {
        echo '<h4 class="elvl">60: <span class="rare">R</span>Carbon Beast <span class="right gold">'. $_SESSION['KLcarbonbeast'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Carbon Beast</span></div>';
    }






   





    echo '</div><div class="gbox">';
    echo '<h3 class="gray">Mountain Path</h3><h5 class="dddgrayBG lgray levelrange">lvl 20-45</h5>';
    if ($_SESSION['KLbowman']>=1) {
        echo '<h4 class="elvl">23: Bowman <span class="right gold">'. $_SESSION['KLbowman'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Bowman</span></div>';
    }
    if ($_SESSION['KLhighwayman']>=1) {
        echo '<h4 class="elvl">25: Highwayman <span class="right gold">'. $_SESSION['KLhighwayman'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Highwayman</span></div>';
    }



    echo '</div><div class="gbox">';
    echo '<h3 class="darkgreen">Dark Forest</h3><h5 class="dddgrayBG lgray levelrange">lvl 20-45</h5>';
    if ($_SESSION['KLtroll']>=1) {
        echo '<h4 class="elvl">13: Troll <span class="right gold">'. $_SESSION['KLtroll'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Troll</span></div>';
    }
    if ($_SESSION['KLtrollshaman']>=1) {
        echo '<h4 class="elvl">20: Troll Shaman <span class="right gold">'. $_SESSION['KLtrollshaman'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Troll Shaman</span></div>';
    }
    if ($_SESSION['KLtrollsorcerer']>=1) {
        echo '<h4 class="elvl">25: Troll Sorcerer <span class="right gold">'. $_SESSION['KLtrollsorcerer'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Troll Sorcerer</span></div>';
    }
    if ($_SESSION['KLtrollelder']>=1) {
        echo '<h4 class="elvl">30: Troll Elder <span class="right gold">'. $_SESSION['KLtrollelder'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Troll Elder</span></div>';
    }
    if ($_SESSION['KLtrollchampion']>=1) {
        echo '<h4 class="elvl">35: Troll Champion <span class="right gold">'. $_SESSION['KLtrollchampion'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Troll Champion</span></div>';
    }

    if ($_SESSION['KLtrollqueen']>=1) {
        echo '<h4 class="blue elvl">40: Troll Queen <span class="right gold">'. $_SESSION['KLtrollqueen'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Troll Queen </span></div>';
    }
    if ($_SESSION['KLtrollking']>=1) {
        echo '<h4 class="green elvl">45: Troll King <span class="right gold">'. $_SESSION['KLtrollking'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Troll King </span></div>';
    }

    if ($_SESSION['KLfalcon']>=1) {
        echo '<h4 class="elvl">25: <span class="rare">R</span>Falcon <span class="right gold">'. $_SESSION['KLfalcon'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray"><span class="rare">R</span>Falcon </span></div>';
    }

    if ($_SESSION['KLent']>=1) {
        echo '<h4 class="elvl">25: <span class="rare">R</span>Ent <span class="right gold">'. $_SESSION['KLent'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray"><span class="rare">R</span>Ent </span></div>';
    }

    if ($_SESSION['KLdarkranger']>=1) {
        echo '<h4 class="elvl">25: <span class="rare">R</span>Dark Ranger <span class="right gold">'. $_SESSION['KLdarkranger'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray"><span class="rare">R</span>Dark Ranger </span></div>';
    }

    if ($_SESSION['KLwisp']>=1) {
        echo '<h4 class="elvl">40: <span class="rare">R</span>Wisp <span class="right gold">'. $_SESSION['KLwisp'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray"><span class="rare">R</span>Wisp </span></div>';
    }








    echo '</div><div class="gbox">';
 //   echo '<h3 class="yellow">Demigods</h3><h5 class="dddgrayBG lgray levelrange">lvl 70</h5>';
    if ($_SESSION['KLforestprincess']>=1) {
        echo '<h4 class="green elvl">80: Forest Princess <span class="right gold">'. $_SESSION['KLforestprincess'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Forest Princess</span></div>';
    }






    echo '</div><div class="gbox">';
    echo '<h3 class="ddddgrayBG lgray">Dark Keep</h3><h5 class="dddgrayBG lgray levelrange">lvl 30-60</h5>';
    if ($_SESSION['KLlurker']>=1) {
        echo '<h4 class="elvl">30: Lurker <span class="right gold">'. $_SESSION['KLlurker'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Lurker</span></div>';
    }
    if ($_SESSION['KLwingeddemon']>=1) {
        echo '<h4 class="elvl">35: Winged Demon <span class="right gold">'. $_SESSION['KLwingeddemon'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Winged Demon</span></div>';
    }
    if ($_SESSION['KLundeadorc']>=1) {
        echo '<h4 class="elvl">45: Undead Orc <span class="right gold">'. $_SESSION['KLundeadorc'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Undead Orc</span></div>';
    }
    if ($_SESSION['KLstonesphinx']>=1) {
        echo '<h4 class="gold elvl">50: Stone Sphinx <span class="right gold">'. $_SESSION['KLstonesphinx'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Stone Sphinx</span></div>';
    }
    if ($_SESSION['KLwarpedpriest']>=1) {
        echo '<h4 class="elvl">55:<span class="rare">R</span> Warped Priest <span class="right gold">'. $_SESSION['KLwarpedpriest'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Warped Priest</span></div>';
    }
    if ($_SESSION['KLdarkpaladin']>=1) {
        echo '<h4 class="elvl">55: Dark Paladin <span class="right gold">'. $_SESSION['KLdarkpaladin'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Dark Paladin</span></div>';
    }
    if ($_SESSION['KLdarkprince']>=1) {
        echo '<h4 class="lightpurple elvl">60: Dark Prince <span class="right gold">'. $_SESSION['KLdarkprince'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Dark Prince</span></div>';
    }








    echo '</div><div class="gbox">';
    echo '<h3 class="lightpurple">Cathedral</h3><h5 class="dddgrayBG lgray levelrange">lvl 40-60</h5>';
    if ($_SESSION['KLgreygargoyle']>=1) {
        echo '<h4 class="elvl">40: Grey Gargoyle <span class="right gold">'. $_SESSION['KLgreygargoyle'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Grey Gargoyle</span></div>';
    }
    if ($_SESSION['KLwhitegargoyle']>=1) {
        echo '<h4 class="elvl">45: White Gargoyle <span class="right gold">'. $_SESSION['KLwhitegargoyle'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">White Gargoyle</span></div>';
    }
    if ($_SESSION['KLvampire']>=1) {
        echo '<h4 class="elvl">45: Vampire <span class="right gold">'. $_SESSION['KLvampire'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Vampire</span></div>';
    }

    if ($_SESSION['KLfallenpriest']>=1) {
        echo '<h4 class="elvl">50: Fallen Priest <span class="right gold">'. $_SESSION['KLfallenpriest'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Fallen Priest</span></div>';
    }
    if ($_SESSION['KLfallenangel']>=1) {
        echo '<h4 class="lightpurple elvl">60: Fallen Angel <span class="right gold">'. $_SESSION['KLfallenangel'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Fallen Angel</span></div>';
    }
    if ($_SESSION['KLrisenskeleton']>=1) {
        echo '<h4 class="elvl">30: Risen Skeleton <span class="right gold">'. $_SESSION['KLrisenskeleton'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Risen Skeleton</span></div>';
    }






    echo '</div><div class="gbox">';
    echo '
		   <h3 class="gray">Mountains</h3><h5 class="dddgrayBG lgray levelrange">lvl 30-60</h5>';
    if ($_SESSION['KLfriendlygiant']>=1) {
        echo '<h4 class="elvl">30: Friendly Giant <span class="right gold">'. $_SESSION['KLfriendlygiant'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Friendly Giant</span></div>';
    }
    if ($_SESSION['KLmountaingiant']>=1) {
        echo '<h4 class="elvl">30: Mountain Giant <span class="right gold">'. $_SESSION['KLmountaingiant'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Mountain Giant</span></div>';
    }
    if ($_SESSION['KLicetroll']>=1) {
        echo '<h4 class="elvl">30: Ice Troll <span class="right gold">'. $_SESSION['KLicetroll'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Ice Troll</span></div>';
    }

    if ($_SESSION['KLgiantbrute']>=1) {
        echo '<h4 class="elvl">35: Giant Brute <span class="right gold">'. $_SESSION['KLgiantbrute'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Giant Brute</span></div>';
    }

    if ($_SESSION['KLwyvern']>=1) {
        echo '<h4 class="elvl">35: Wyvern <span class="right gold">'. $_SESSION['KLwyvern'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Wyvern</span></div>';
    }

    if ($_SESSION['KLstonedwarf']>=1) {
        echo '<h4 class="elvl">40: Stone Dwarf <span class="right gold">'. $_SESSION['KLstonedwarf'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Stone Dwarf</span></div>';
    }

    if ($_SESSION['KLgiantmountaingiant']>=1) {
        echo '<h4 class="gold elvl">50: Giant Mountain Giant <span class="right gold">'. $_SESSION['KLgiantmountaingiant'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Giant Mountain Giant</span></div>';
    }

    if ($_SESSION['KLgatekeeper']>=1) {
        echo '<h4 class="black elvl">60: Gatekeeper <span class="right gold">'. $_SESSION['KLgatekeeper'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Gatekeeper</span></div>';
    }

    if ($_SESSION['KLyeti']>=1) {
        echo '<h4 class="elvl">45:<span class="rare">R</span> Yeti <span class="right gold">'. $_SESSION['KLyeti'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Yeti</span></div>';
    }

    if ($_SESSION['KLsnowogre']>=1) {
        echo '<h4 class="elvl">50: <span class="rare">R</span>Snow Ogre<span class="right gold">'. $_SESSION['KLsnowogre'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Snow Ogre</span></div>';
    }

    if ($_SESSION['KLsnowninja']>=1) {
        echo '<h4 class="elvl">50:<span class="rare">R</span> Snow Ninja <span class="right gold">'. $_SESSION['KLsnowninja'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Snow Ninja</span></div>';
    }

    if ($_SESSION['KLsnowowl']>=1) {
        echo '<h4 class="elvl">50:<span class="rare">R</span> Snow Owl <span class="right gold">'. $_SESSION['KLsnowowl'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Snow Owl</span></div>';
    }

    if ($_SESSION['KLdragon']>=1) {
        echo '<h4 class="red elvl">60:<span class="rare">R</span> Dragon <span class="right gold">'. $_SESSION['KLdragon'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Dragon</span></div>';
    }
    if ($_SESSION['KLjiemji']>=1) {
        echo '<h4 class="elvl">70:<span class="rare">R</span> Jiemji <span class="right gold">'. $_SESSION['KLjiemji'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Jiemji</span></div>';
    }

    if ($_SESSION['KLjikay']>=1) {
        echo '<h4 class="elvl">70:<span class="rare">R</span> Jikay <span class="right gold">'. $_SESSION['KLjikay'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Jikay</span></div>';
    }

    if ($_SESSION['KLkingblade']>=1) {
        echo '<h4 class="purple elvl">90:<span class="rare">R</span> King Blade <span class="right gold">'. $_SESSION['KLkingblade'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">King Blade</span></div>';
    }










    echo '</div><div class="gbox">';
    echo '<h3 class="ddgray">The Despair</h3><h5 class="dddgrayBG lgray levelrange">lvl 50-100</h5>';
    if ($_SESSION['KLhydra']>=1) {
        echo '<h4 class="elvl">50: Hydra <span class="right gold">'. $_SESSION['KLhydra'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Hydra</span></div>';
    }

    if ($_SESSION['KLbrownie']>=1) {
        echo '<h4 class="elvl">50: Brownie <span class="right gold">'. $_SESSION['KLbrownie'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Brownie</span></div>';
    }
    if ($_SESSION['KLharpy']>=1) {
        echo '<h4 class="elvl">50: Harpy <span class="right gold">'. $_SESSION['KLharpy'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Harpy</span></div>';
    }
    if ($_SESSION['KLgorgon']>=1) {
        echo '<h4 class="elvl">60: Gorgon <span class="right gold">'. $_SESSION['KLgorgon'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Gorgon</span></div>';
    }
    if ($_SESSION['KLbanshee']>=1) {
        echo '<h4 class="elvl">60: Banshee <span class="right gold">'. $_SESSION['KLbanshee'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Banshee</span></div>';
    }
    if ($_SESSION['KLsuccubus']>=1) {
        echo '<h4 class="elvl">70: Succubus <span class="right gold">'. $_SESSION['KLsuccubus'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Succubus</span></div>';
    }
    if ($_SESSION['KLmagmagoblin']>=1) {
        echo '<h4 class="elvl">50: Magma Goblin<span class="right gold">'. $_SESSION['KLmagmagoblin'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Magma Goblin</span></div>';
    }
    if ($_SESSION['KLmagmakobold']>=1) {
        echo '<h4 class="elvl">60: Magma Kobold<span class="right gold">'. $_SESSION['KLmagmakobold'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Magma Kobold</span></div>';
    }
    if ($_SESSION['KLmagmaorc']>=1) {
        echo '<h4 class="elvl">60: Magma Orc<span class="right gold">'. $_SESSION['KLmagmaorc'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Magma Orc</span></div>';
    }
    if ($_SESSION['KLmagmaogre']>=1) {
        echo '<h4 class="elvl">70: Magma Ogre<span class="right gold">'. $_SESSION['KLmagmaogre'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Magma Ogre</span></div>';
    }
    if ($_SESSION['KLmagmatroll']>=1) {
        echo '<h4 class="elvl">70: Magma Troll<span class="right gold">'. $_SESSION['KLmagmatroll'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Magma Troll</span></div>';
    }




    
    echo '</div><div class="gbox">';
    echo '<h3 class="lightblue">Silver Temple</h3><h5 class="dddgrayBG lgray levelrange">lvl 80-1000</h5>';


    if ($_SESSION['KLsilvertitan']>=1) {
        echo '<h4 class="elvl">90: Silver Titan <span class="right gold">'. $_SESSION['KLsilvertitan'].'</span></h4>	';
    } else {
        echo '<div><span class="ddgray">Silver Titan</span></div>';
    }




    echo '</div>';
// }
