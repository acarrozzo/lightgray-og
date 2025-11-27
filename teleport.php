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
    $bossTeleportCost = $level * 3;
    //<form id="mainForm" method="post" action="" name="formInput">
    //echo '<section data-pop="teleport" id="teleport" class="teleport panel">';


    echo '<div class="gbox">';
    echo '<h1>Map of Vega</h1>';
    echo '<h3 class="blue">Quick Teleport</h3>';
    echo '<p> You can fast travel to any teleport location you have visited before.</p>';
    echo '<p class="">MP cost: <span class ="blue">1</span></p>';

    //---------------------------------------------------------------------------- MAP TELEPORT
    echo '<div class="mapCubes">';

    if ($row['quest70']>=2) {
        echo '<button class="mapCube square whiteBG dddgray" type="submit" name="input1" value="camp hero"><p>Star City</p><p>Camp Hero</p></button>';
    } else {
        echo '<div class="mapCube square darkergray darkestgrayBG"><p>Star City</p><p>Camp Hero</p></div>'; 
    }

    if ($row['teleport9']>=1) {
        echo '<button class="mapCube square dgrayBG" type="submit" name="input1" value="vega mountains">Vega Mountains</button> ';
    } else {
        echo '<div class="mapCube square darkergray darkestgrayBG"><p>Vega Mountains</p><p>Not found yet</p></div>';
    }

    if ($row['teleport8']>=1) {
        echo '<button class="mapCube square darkgreenBG" type="submit" name="input1" value="dark forest">Dark Forest</button> ';
    } else {
        echo '<div class="mapCube square darkergray darkestgrayBG"><p>Dark Forest</p><p>Not found yet</p></div>';
    }

    if ($_SESSION['KLthunderbarbarian']>=1 || $_SESSION['KLsmoothranger']>=1 || $_SESSION['KLcoralwizard']>=1 || $_SESSION['KLheavywalrus']>=1) {
        echo '<button class="mapCube oceanBG white" type="submit" name="input1" value="master water temple">Master Water Temple</button>';
    } else {
        echo '<p class="mapCube darkergray darkestgrayBG"><span>Master Water Temple</span></p>';
    }


    if ($row['quest9']>=1 || $_SESSION['KLgoblinchief']>=1) {
        echo '<button class="mapCube goldBG" type="submit" name="input1" value="destroyed academy">Destroyed Academy</button> ';
    } else {
        echo '<p class="mapCube darkergray darkestgrayBG"><span>Destroyed Academy</span></p>';
    }

    if ($row['quest57']>=2) {
        echo '<button class="mapCube darkgreenBG" type="submit" name="input1" value="ranger\'s guild"><p>Ranger\'s Guild</p></button>';

    } else {
        echo '<p class="mapCube darkergray darkestgrayBG"><span>Ranger\'s Guild</span></p>';
    }
    



    if ($row['teleport6']>=1) {
        echo '<button class="mapCube square blueBG" type="submit" name="input1" value="blue ocean">Blue Ocean</button> ';
    } else {
        echo '<div class="mapCube square darkergray darkestgrayBG"><p>Ocean</p><p>Not found yet</p></div>';
    }



    if ($row['teleport1']>=1) {
        echo '<button class="mapCube square greenBG" type="submit" name="input1" value="grassy field">Grassy Field</button> ';
    } else {
        echo '<div class="mapCube square darkergray darkestgrayBG"><p>Grassy Field</p><p>Not found yet</p></div>';
    }



    if ($row['teleport2']>=1) {
        echo '<button class="mapCube square forestBG" type="submit" name="input1" value="forest crossroads">Forest</button> ';
    } else {
        echo '<div class="mapCube square darkergray darkestgrayBG"><span>Forest</span></div>';
    }
/*
     if ($row['teleport4']>=1) {
        echo '<button class="mapCube square dgreenBG" type="submit" name="input1" value="forest">Forest</button> ';
    } 
    elseif ($row['teleport2']>=1) {
        echo '<button class="mapCube square forestBG" type="submit" name="input1" value="forest crossroads">Forest<br>Crossroads</button> ';
    } else {
        echo '<div class="mapCube square darkergray darkestgrayBG"><span>Forest</span></div>';
    }
        */
   // if ($row['teleport4']>=1) {
     //   echo '<button class="mapCube square dgreenBG" type="submit" name="input1" value="forest">Forest</button> ';
   // } 
    //elseif ($row['teleport2']>=1) {
      //  echo '<input class="mapCube square dgreenBG" type="submit" name="input1" value="forest path" /> ';
   // } 
  //  else {
    //    echo '<div class="mapCube square darkergray darkestgrayBG"><span>Forest</span><p>Not found yet</p></div>';
   // }


    if ($row['teleport7']>=1) {
        echo '<button class="mapCube darkblueBG" type="submit" name="input1" value="underwater">Underwater </button>';
    } else {
        echo '<div class="mapCube darkergray darkestgrayBG"><span>Underwater</span></div>';
    }
    if ($row['quest31']>=2) {
        echo '<button class="mapCube goldBG" type="submit" name="input1" value="mining guild">Mining Guild </button> ';
    } else {
        echo '<div class="mapCube darkergray darkestgrayBG"><span>Mining Guild</span></div>';
    }

/*
    if ($row['teleport2']>=1) {
        echo '<button class="mapCube greenBG" type="submit" name="input1" value="forest path">Forest Path</button> ';
    } else {
        echo '<div class="mapCube darkergray darkestgrayBG"><span>Forest Path</span></div>';
    }
    */
    if ($row['quest19']>=2) {
        echo '<button class="mapCube darkblueBG" type="submit" name="input1" value="warrior\'s guild">Warrior\'s Guild</button>';
    } else {
        echo '<div class="mapCube darkergray darkestgrayBG"><span>Warrior\'s Guild</span></div>';
    }

    echo '<div class="mapCube square darkergray darkestgrayBG"><p>Swamp</p><p>Not found yet</p></div>';


    if ($row['teleport5']>=1) {
        echo '<button class="mapCube square white grayBG" type="submit" name="input1" value="rocky flats">Rocky Flats</button> ';
    } else {
        echo '<div class="mapCube square darkergray darkestgrayBG"><p>Rocky Plains</p><p>Not found yet</p></div>';
    }


    if ($row['teleport3']>=1) {
        echo '<button class="mapCube square redBG" type="submit" name="input1" value="red town">Red Town</button> ';
    } else {
        echo '<div class="mapCube square darkergray darkestgrayBG"><p>Red Town</p><p>Not found yet</p></div>';
    }

    echo '<div class="mapCube darkergray darkestgrayBG"><p>Camp BlackJack</p><p>Not found yet</p></div>';

    if ($_SESSION['KLhydra']>=1) {
        echo '<button class="mapCube blackBG dred" type="submit" name="input1" value="hydra pit">Hydra Pit</button> ';
    } else {
        echo '<div class="mapCube darkergray darkestgrayBG"><p>Hydra Pit</p><p>Not found yet</p></div>';
    }


    if ($row['quest20']>=2) {
        echo '<button class="mapCube purpleBG" type="submit" name="input1" value="wizard\'s guild">Wizard\'s Guild</button>';
    } else {
        echo '<div class="mapCube darkergray darkestgrayBG"><span>Wizard\'s Guild</span></div>';
    }

    echo '</div>';

    /*
    echo '<div class="">';

    if ($row['teleport2']>=1){echo '<input class="greenBG" type="submit" name="input1" value="forest path" /> ';}

    if ($row['teleport7']>=1) {
        echo '<input class=" darkblueBG" type="submit" name="input1" value="underwater" /> ';
    } else {
        echo '<p class=" darkergray darkestgrayBG"><span>Underwater</span></p>';
    }

    if ($_SESSION['KLthunderbarbarian']>=1 || $_SESSION['KLsmoothranger']>=1 || $_SESSION['KLcoralwizard']>=1 || $_SESSION['KLheavywalrus']>=1) {
        echo '<input class=" wide oceanBG white" type="submit" name="input1" value="master water temple" /> ';
    } else {
        echo '<p class=" darkergray darkestgrayBG"><span>Master Temple</span></p>';
    }
    if ($row['quest70']>=2) {
        echo '<input class=" wide whiteBG dddgray" type="submit" name="input1" value="camp hero" /> ';
    } else {
        echo '<p class=" darkergray darkestgrayBG"><span>Camp Hero</span></p>'; 
    }
    echo '</div>';


*/


    echo '</div>';
    //---------------------------------------------------------------------------- GUILD TELEPORT
    /*
    echo '<div class="gbox">';

    echo '<h3 class="blue">Guild Teleport</h3>';
    echo '<p> You can fast travel to any guild you are a member of.</p>';
    echo '<p class="">MP cost: <span class ="blue">1</span></p>';

    if ($row['quest19']>=2) {echo '<input class=" darkblueBG" type="submit" name="input1" value="warrior\'s guild" /> ';}
    if ($row['quest20']>=2) {echo '<input class=" purpleBG" type="submit" name="input1" value="wizard\'s guild" /> ';}
    if ($row['quest31']>=2) {echo '<input class=" goldBG darkgray" type="submit" name="input1" value="mining guild" /> ';}
    if ($row['quest57']>=2) {echo '<input class=" dgreenBG" type="submit" name="input1" value="ranger\'s guild" /> ';}
    echo '</div>';
    */
    //---------------------------------------------------------------------------- BOSS TELEPORT
    echo '<div class="gbox">';
    echo '<h3 class="blue">Boss Teleport</h3>';
    echo '<p> You can fast travel to any boss you have previously defeated.</p>';
    echo '<p class="">MP cost: <span class ="blue">'.$bossTeleportCost.'</span></p>';
    
    if ($_SESSION['KLgator']>=1) {
        echo '<input class=" greenBG" type="submit" name="input1" value="gator" /> ';
    }
    if ($_SESSION['KLgoblinchief']>=1) {
        echo '<input class=" white brownBG" type="submit" name="input1" value="goblin chief" /> ';
    }
    if ($_SESSION['KLogrelieutenant']>=1) {
        echo '<input class=" white darkblueBG" type="submit" name="input1" value="ogre lieutenant" /> ';
    }
    if ($_SESSION['KLkoboldmaster']>=1) {
        echo '<input class=" white purpleBG" type="submit" name="input1" value="kobold master" /> ';
    }
    if ($_SESSION['KLmasterthief']>=1) {
        echo '<input class=" darkgray yellowBG" type="submit" name="input1" value="master thief" /> ';
    }
    if ($_SESSION['KLomar']>=1) {
        echo '<input class=" blackBG" type="submit" name="input1" value="omar the dead" /> ';
    }
    if ($_SESSION['KLmongoliandeathworm']>=1) {
        echo '<input class=" dgreenBG" type="submit" name="input1" value="mongolian death worm" /> ';
    }
    if ($_SESSION['KLpossessedaxeman']>=1) {
        echo '<input class=" blueBG" type="submit" name="input1" value="possessed axeman" /> ';
    }
    if ($_SESSION['KLcrocodile']>=1) {
        echo '<input class=" darkgreenBG" type="submit" name="input1" value="crocodile" /> ';
    }
    if ($_SESSION['KLkraken']>=1) {
        echo '<input class=" greenBG" type="submit" name="input1" value="kraken" /> ';
    }
    if ($_SESSION['KLscorpionking']>=1) {
        echo '<input class=" redBG" type="submit" name="input1" value="scorpion king" /> ';
    }
    if ($_SESSION['KLredbeard']>=1) {
        echo '<input class=" redBG" type="submit" name="input1" value="red beard" /> ';
    }
    if ($_SESSION['KLwatertempleguardian']>=1) {
        echo '<input class=" blueBG" type="submit" name="input1" value="water temple guardian" /> ';
    }
    if ($_SESSION['KLphoenix']>=1) {
        echo '<input class=" brownBG" type="submit" name="input1" value="phoenix" /> ';
    }
    if ($_SESSION['KLcyclops']>=1) {
        echo '<input class=" grayBG" type="submit" name="input1" value="cyclops" /> ';
    }
    if ($_SESSION['KLtrollking']>=1) {
        echo '<input class=" darkgreenBG" type="submit" name="input1" value="troll king" /> ';
    }
    if ($_SESSION['KLminotaur']>=1) {
        echo '<input class=" redBG" type="submit" name="input1" value="minotaur" /> ';
    }

    echo '</div>';

    //---------------------------------------------------------------------------- RECALL
    echo '<div class="gbox">';
    echo '<h3 class="blue">Recall</h3>';
    echo '<p> You can set a room to recall to with SET RECALL.</p>';
    echo '<p> Then you can RECALL to teleport to that room at any time.</p>';
    echo '<p> You can only set one recall room at a time.</p>';
    echo '<p class="">MP cost: <span class ="blue">free</span></p>';

    echo '<input class=" blackBG half" type="submit" name="input1" value="set recall" /> ';
    echo '<input class=" darkblueBG" type="submit" name="input1" value="recall" /> ';
    echo '<p>current recall room: <span class="gold">'.$recall.'</span></p>';

    echo '</div>';

    //echo '</section>';
// }//</form>
