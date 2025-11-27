<?php
// -------------------------DB CONNECT!
include('db-connect.php');

// -------------------------DB QUERY!
$stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();
if (!$result) {
    die('There was an error running the query [' . $link->error . ']');
}

// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){

$magicstrike=$row['magicstrike'];
$fireball=$row['fireball'];
$magicmissile=$row['magicmissile'];
$poisondart=$row['poisondart'];
$atomicblast=$row['atomicblast'];
$recall=$row['recall'];


$heal=$row['heal'];
$regenerate=$row['regenerate'];
$ironskin=$row['ironskin'];
$wings=$row['wings'];
$gills=$row['gills'];

$purplepotion=$row['purplepotion'];
$redpotion=$row['redpotion'];
$bluepotion=$row['bluepotion'];
$cookedmeat=$row['cookedmeat'];
$rawmeat=$row['rawmeat'];
$redberry=$row['redberry'];
$blueberry=$row['blueberry'];

$veggies=$row['veggies'];
$meatball=$row['meatball'];
$bluefish=$row['bluefish'];

$redbalm=$row['redbalm'];
$bluebalm=$row['bluebalm'];
$purplebalm=$row['purplebalm'];
$olive=$row['olive'];

$redbar=$row['redbar'];
$bluebar=$row['bluebar'];

$wingspotion=$row['wingspotion'];
$gillspotion=$row['gillspotion'];
$antidotepotion=$row['antidotepotion'];
$coffee=$row['coffee'];
$tea=$row['tea'];
$reds=$row['reds'];
$greens=$row['greens'];
$blues=$row['blues'];
$yellows=$row['yellows'];
$currency = $row['currency'];

echo '<div class="gbox">';

//$row['hp'] >  $row['hpmax']
echo '<h2>Health & Mana:</h2>';
echo '<button class="right btn redBG battlehide" data-link2="craft"><span>Open Crafting ></span></button>';

$hpdown = $row['hp'] - $row['hpmax'];
$mpdown = $row['mp'] - $row['mpmax'];
echo '<p>You have <span class="red">'.$row['hp'].'</span> / '.$row['hpmax'].' HP ( <span class="red">'.$hpdown.'</span> )</p>';
echo '<p>You have <span class="blue">'.$row['mp'].'</span> / '.$row['mpmax'].' MP ( <span class="blue">'.$mpdown.'</span> )</p>';
echo '<br>';

echo '<div class="item-flex">'; // item flex box

        // -------------------- BLUE BAR
        if ($bluebar <= 0) {
            $disabled="disabled";
        } else {
            $disabled="";
        }
        if ($bluebar >= 1 || $mp >= 3000) {
            echo '
                    <button class="itembox '.$disabled.'" type="submit" name="input1" value="blue bar">
                    <span class="icon blue">'.file_get_contents("img/svg/bar.svg").'</span>
                    <p class="">Blue Bar </p>
                    <strong class="blue">+4000 MP</strong>
                    <p class=" qty">x'.$bluebar.'</p>
                    </button>';
        }

    // -------------------- RED BAR
    if ($redbar <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($redbar >= 1 || $hp >= 3000) {
        echo '
                <button class="itembox '.$disabled.'" type="submit" name="input1" value="red bar">
                <span class="icon red">'.file_get_contents("img/svg/bar.svg").'</span>
                <p class="">Red Bar </p>
                <strong class="red">+4000 HP</strong>
                <p class=" qty">x'.$redbar.'</p>
                </button>';
    }

    // -------------------- OLIVE
    if ($olive <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($olive >= 1 || $hp >= 600) {
        echo '
                <button class="itembox '.$disabled.'" type="submit" name="input1" value="olive">
                <span class="icon purple">'.file_get_contents("img/svg/blueberry.svg").'</span>
                <p class="">Olive </p>
                <strong class="purple">+800 HP/MP</strong>
                <p class=" qty">x'.$olive.'</p>
                </button>';
    }
        // -------------------- PURPLE BALM
        if ($purplebalm <= 0) {
            $disabled="disabled";
        } else {
            $disabled="";
        }
        if ($purplebalm >= 1 || $hp >= 600) {
            echo '
                    <button class="itembox '.$disabled.'" type="submit" name="input1" value="purple balm">
                    <span class="icon purple">'.file_get_contents("img/svg/balm.svg").'</span>
                    <p class="">Purple balm </p>
                    <strong class="purple">+2000 HP/MP</strong>
                    <p class=" qty">x'.$purplebalm.'</p>
                    </button>';
        }
        // -------------------- BLUE BALM
        if ($bluebalm <= 0) {
            $disabled="disabled";
        } else {
            $disabled="";
        }
        if ($bluebalm >= 1 || $redbalm >= 1 || $mp >= 350) {
            echo '
                    <button class="itembox '.$disabled.'" type="submit" name="input1" value="blue balm">
                    <span class="icon blue">'.file_get_contents("img/svg/balm.svg").'</span>
                    <p class="">Blue Balm </p>
                    <strong class="blue">+1000 MP</strong>
                    <p class=" qty">x'.$bluebalm.'</p>
                    </button>';
        }

    // -------------------- RED BALM
    if ($redbalm <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($redbalm >= 1 || $bluebalm >= 1 || $hp >= 400 ) {
        echo '
                <button class="itembox '.$disabled.'" type="submit" name="input1" value="red balm">
                <span class="icon red">'.file_get_contents("img/svg/balm.svg").'</span>
                <p class="">Red Balm </p>
                <strong class="red">+1000 HP</strong>
                <p class=" qty">x'.$redbalm.'</p>
                </button>';
    }
    // -------------------- BLUEFISH
    if ($bluefish <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($bluefish >= 1 || $mp >= 150) {
        echo '
            <button class="itembox '.$disabled.'" type="submit" name="input1" value="bluefish">
            <span class="icon blue">'.file_get_contents("img/svg/fish.svg").'</span>
            <p class="">Blue Fish </p>
            <strong class="blue">+400 MP</strong>
            <p class=" qty">x'.$bluefish.'</p>
            </button>';
    }

   // -------------------- MEATBALL
   if ($meatball <= 0) {
    $disabled="disabled";
} else {
    $disabled="";
}
if ($meatball >= 1 || $hp >= 200) {
    echo '
        <button class="itembox '.$disabled.'" type="submit" name="input1" value="meatball">
        <span class="icon red">'.file_get_contents("img/svg/meatball.svg").'</span>
        <p class="">Meatball </p>
        <strong class="red">+400 HP</strong>
        <p class=" qty">x'.$meatball.'</p>
        </button>';
}

    // -------------------- PURPLE POTION

    if ($purplepotion <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($purplepotion >= 1 || $hp >= 200 || $mp >= 200) {
        echo '
        <button class="itembox '.$disabled.'" type="submit" name="input1" value="purple potion">
        <span class="icon purple">'.file_get_contents("img/svg/potion.svg").'</span>
        <p class="">Purple Potion </p>
        <strong class="purple">+200 HP/MP</strong>
        <p class=" qty">x'.$purplepotion.'</p>
        </button>';
    }
    // -------------------- VEGGIES
    if ($veggies <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    echo '
      <button class="itembox '.$disabled.'" type="submit" name="input1" value="veggies">
      <span class="icon purple">'.file_get_contents("img/svg/veggies.svg").'</span>
      <p class="">Veggies </p>
      <strong class="purple">+80 HP/MP</strong>
      <p class=" qty">x'.$veggies.'</p>
      </button>';
    // -------------------- BLUE POTION
    if ($bluepotion <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($bluepotion >= 1 || $redpotion >= 1  || $hp >= 200) {
        echo '
        <button class="itembox '.$disabled.'" type="submit" name="input1" value="blue potion">
        <span class="icon blue">'.file_get_contents("img/svg/potion.svg").'</span>
        <p class="">Blue Potion </p>
        <strong class="blue">+100 MP</strong>
        <p class=" qty">x'.$bluepotion.'</p>
        </button>';
    }

      // -------------------- RED POTION
      if ($redpotion <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($redpotion >= 1 || $bluepotion >= 1 ||  $mp >= 200) {
        echo '
        <button class="itembox '.$disabled.'" type="submit" name="input1" value="red potion">
        <span class="icon red">'.file_get_contents("img/svg/potion.svg").'</span>
        <p class="">Red Potion </p>
        <strong class="red">+100 HP</strong>
        <p class=" qty">x'.$redpotion.'</p>
        </button>';
    }

    // -------------------- COOKED MEAT
    if ($cookedmeat <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    echo '
        <button class="itembox '.$disabled.'" type="submit" name="input1" value="cooked meat">
        <span class="icon red">'.file_get_contents("img/svg/cooked-meat.svg").'</span>
        <p class="">Cooked Meat </p>
        <strong class="red">+50 HP</strong>
        <p class=" qty">x'.$cookedmeat.'</p>
        </button>';
   // -------------------- RAW MEAT
   if ($rawmeat <= 0) {
    $disabled="disabled";
} else {
    $disabled="";
}
echo '
  <button class="itembox '.$disabled.'" type="submit" name="input1" value="raw meat">
  <span class="icon red">'.file_get_contents("img/svg/uncooked-meat.svg").'</span>
  <p class="">Raw Meat </p>
  <strong class="red">+25 HP</strong>
  <p class=" qty">x'.$rawmeat.'</p>
  </button>';
    // -------------------- BLUEBERRY
    if ($blueberry <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    echo '
    <button class="itembox '.$disabled.'" type="submit" name="input1" value="blueberry">
    <span class="icon blue">'.file_get_contents("img/svg/blueberry.svg").'</span>
    <p class="">Blueberry </p>
    <strong class="blue">+10 MP</strong>
    <p class=" qty">x'.$blueberry.'</p>
    </button>';
    // -------------------- REDBERRY
    if ($redberry <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    echo '
    <button class="itembox '.$disabled.'" type="submit" name="input1" value="redberry">
    <span class="icon red">'.file_get_contents("img/svg/redberry.svg").'</span>
    <p class="">Redberry </p>
    <strong class="red">+10 HP</strong>
    <p class=" qty">x'.$redberry.'</p>
    </button>';


	echo '</div>'; //end flex box







/*

if ($redberry>=1){echo '<div><input class="redBG" type="submit"name="input1" value="+10 HP" /> <span>x</span>'.$redberry.'  <span class="red">redberry</span> </div>';}
if ($rawmeat>=1){echo '<div><input class="redBG" type="submit"name="input1" value="+25 HP" /> <span>x</span>'.$rawmeat.' <span class="red">raw meat</span> </div>';}
if ($cookedmeat>=1){ echo '<div><input class="redBG" type="submit"name="input1" value="+50 HP" /> <span>x</span>'.$cookedmeat.' <span class="red">cooked meat</span> </div>';}
if ($redpotion>=1){echo '<div><input class="redBG" type="submit"name="input1" value="+100 HP" /> <span>x</span>'.$redpotion.' <span class="red">red potion</span> </div>';}
if ($meatball>=1){echo '<div><input class="redBG" type="submit"name="input1" value="+400 HP" /> <span>x</span>'.$meatball.' <span class="red">meatball</span> </div>';}
if ($redbalm>=1){echo '<div><input class="redBG" type="submit"name="input1" value="+1000 HP" /> <span>x</span>'.$redbalm.' <span class="red">red balm</span> </div>';}
if ($blueberry>=1){echo '<div><input class="darkblueBG" type="submit"name="input1" value="+10 MP" /> <span>x</span>'.$blueberry.' <span class="darkblue">blueberry</span> </div>';}
if ($bluepotion>=1){echo '<div><input class="darkblueBG" type="submit"name="input1" value="+100 MP" /> <span>x</span>'.$bluepotion.' <span class="darkblue">blue potion</span> </div>';}
if ($bluefish>=1){echo '<div><input class="darkblueBG" type="submit"name="input1" value="+400 MP" /> <span>x</span>'.$bluefish.' <span class="darkblue">bluefish</span> </div>';}
if ($bluebalm>=1){echo '<div><input class="darkblueBG" type="submit"name="input1" value="+1000 MP" /> <span>x</span>'.$bluebalm.' <span class="darkblue">blue balm</span> </div>';}
if ($veggies>=1){echo '<div><input class="purpleBG" type="submit"name="input1" value="+50 HP/MP" /> <span>x</span>'.$veggies.' <span class="purple">veggies</span>   </div>';}
if ($purplepotion>=1){echo '<div><input class="purpleBG" type="submit"name="input1" value="+200 HP/MP" /> <span>x</span>'.$purplepotion.' <span class="purple">purple potion</span> </div>';}
if ($purplebalm>=1){echo '<div><input class="purpleBG" type="submit"name="input1" value="+2000 HP/MP" /> <span>x</span>'.$purplebalm.' <span class="purple">purple balm</span> </div>';}
*/
/*
echo '</div>';
echo '<div class="gbox">';

echo '<h2>Buffs</h2>';

if ($reds>=1){echo '<div><input class="redBG" type="submit"name="input1" value="reds" /> <span>x</span>'.$reds.'</div>';}
if ($greens>=1){echo '<div><input class="greenBG" type="submit"name="input1" value="greens" /> <span>x</span>'.$greens.'</div>';}
if ($blues>=1){echo '<div><input class="darkblueBG" type="submit"name="input1" value="blues" /> <span>x</span>'.$blues.'</div>';}
if ($yellows>=1){echo '<div><input class="goldBG" type="submit"name="input1" value="yellows" /> <span>x</span>'.$yellows.'</div>';}

if ($coffee>=1){echo '<div><input class="lightbrownBG" type="submit"name="input1" value="coffee" /> <span>x</span>'.$coffee.'</div>';}
if ($tea>=1){echo '<div><input class="greenBG" type="submit"name="input1" value="tea" /> <span>x</span>'.$tea.'</div>';}

if ($wings>=1){echo '<div><input class="blueBG" type="submit" name="input1" value="cast wings" /> lvl '.$wings.'</div>';}
if ($wingspotion>=1){echo '<div><input class="blueBG" type="submit"name="input1" value="wings potion" /> <span>x</span>'.$wingspotion.' <span class="blueBG"></span> </div>';}
if ($gills>=1){echo '<div><input class="darkblueBG" type="submit" name="input1" value="cast gills" /> lvl '.$gills.'</div>';}
if ($gillspotion>=1){echo '<div><input class="darkblueBG" type="submit"name="input1" value="gills potion" /> <span>x</span>'.$gillspotion.' <span class="blueBG"></span> </div>';}
if ($antidotepotion>=1){echo '<div><input class="greenBG" type="submit"name="input1" value="antidote potion" /> <span>x</span>'.$antidotepotion.' <span class="blueBG"></span> </div>';}


*/

echo '</div>';
echo '<div class="gbox">';

echo '<h2 class="padd">Buffs</h2>';
//echo '<p>Last 100 clicks</p>';


echo '<div class="item-flex">'; // item flex box

$disabled="";
if ($reds <= 0) {
    $disabled="disabled";
}
$actives="";
if ($_SESSION['reds'] > 0){
  $disabled="disabled2";
  $actives="<p class='actives'>ACTIVE [<span class='blink'>".$_SESSION['reds']."</span>]</p>";
}
if ($reds >= 1 || $hp >= 400) {
    echo '
            <button class="itembox '.$disabled.'" type="submit" name="input1" value="reds">
            '.$actives.'
            <span class="icon red">'.file_get_contents("img/svg/herb1.svg").'</span>
            <p class="">Reds </p>
            <strong class="red">+20 STR</strong>
            <p class=" qty">x'.$reds.'</p>
            </button>';
}
if ($greens <= 0) {
    $disabled="disabled";
} else {
    $disabled="";
}
if ($greens >= 1 || $mp >= 350) {
    echo '
            <button class="itembox '.$disabled.'" type="submit" name="input1" value="greens">
            <span class="icon green">'.file_get_contents("img/svg/herb11.svg").'</span>
            <p class="">Greens </p>
            <strong class="green">+20 DEX</strong>
            <p class=" qty">x'.$greens.'</p>
            </button>';
}
if ($blues <= 0) {
    $disabled="disabled";
} else {
    $disabled="";
}
if ($blues >= 1 || $mp >= 350) {
    echo '
            <button class="itembox '.$disabled.'" type="submit" name="input1" value="blues">
            <span class="icon blue">'.file_get_contents("img/svg/herb3.svg").'</span>
            <p class="">Blues </p>
            <strong class="blue">+20 MAG</strong>
            <p class=" qty">x'.$blues.'</p>
            </button>';
}
if ($yellows <= 0) {
    $disabled="disabled";
} else {
    $disabled="";
}
if ($yellows >= 1 || $hp >= 400) {
    echo '
            <button class="itembox '.$disabled.'" type="submit" name="input1" value="yellows">
            <span class="icon gold">'.file_get_contents("img/svg/herb6.svg").'</span>
            <p class="">Yellows </p>
            <strong class="gold">+20 DEF</strong>
            <p class=" qty">x'.$yellows.'</p>
            </button>';
}





if ($coffee <= 0) {
    $disabled="disabled";
} else {
    $disabled="";
}
if ($coffee >= 0) {
    echo '
            <button class="itembox '.$disabled.'" type="submit" name="input1" value="coffee">
            <span class="icon brown">'.file_get_contents("img/svg/coffee.svg").'</span>
            <p class="">Coffee </p>
            <strong class="brown">+10 All Stats</strong>
            <p class=" qty">x'.$coffee.'</p>
            </button>';
}

if ($tea <= 0) {
    $disabled="disabled";
} else {
    $disabled="";
}
if ($tea >= 0) {
    echo '
            <button class="itembox '.$disabled.'" type="submit" name="input1" value="tea">
            <span class="icon green">'.file_get_contents("img/svg/tea.svg").'</span>
            <p class="">Tea </p>
            <strong class="green">+5 Regen</strong>
            <p class=" qty">x'.$tea.'</p>
            </button>';
}

if ($wingspotion <= 0) {
    $disabled="disabled";
} else {
    $disabled="";
}
if ($wingspotion >= 1) {
    echo '
            <button class="itembox '.$disabled.'" type="submit" name="input1" value="wings potion">
            <span class="icon lightblue">'.file_get_contents("img/svg/potion.svg").'</span>
            <p class="">Wings Potion</p>
            <strong class="lightblue">Fly / 100 clicks</strong>
            <p class=" qty">x'.$wingspotion.'</p>
            </button>';
}
if ($gillspotion <= 0) {
    $disabled="disabled";
} else {
    $disabled="";
}
if ($gillspotion >= 1) {
    echo '
            <button class="itembox '.$disabled.'" type="submit" name="input1" value="gills potion">
            <span class="icon blue">'.file_get_contents("img/svg/potion.svg").'</span>
            <p class="">Gills Potion</p>
            <strong class="blue">Breathe water</strong>
            <p class=" qty">x'.$gillspotion.'</p>
            </button>';
}




if ($antidote <= 0) {
    $disabled="disabled";
} else {
    $disabled="";
}
if ($antidote >= 1 || $hp >= 600) {
    echo '
            <button class="itembox '.$disabled.'" type="submit" name="input1" value="antidote potion">
            <span class="icon green">'.file_get_contents("img/svg/potion2.svg").'</span>
            <p class="">Antidote</p>
            <strong class="green">Cure Poison</strong>
            <p class=" qty">x'.$antidote.'</p>
            </button>';
}


        echo '</div>'; // end item flex box


        echo '</div>'; // END GBOX






} // END WHILE
