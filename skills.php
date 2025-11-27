<?php
// --------------------------------------------------------------------------------- Skills TAB
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
    include('skills-spells-calculator.php'); // LOAD MAX SKILL/SPELLS
    // ---------------------------------------------------------------------------------- // START SKILL MENU

    echo'<h3 class="spCount white">SP <span class="purple">'.$sp.'</span></h3>';
    echo'<div class="gbox">';

    echo'  <h1>Skills</h1>';
    echo '<p class="gray">Use SP to purchase and upgrade SKILLS and SPELLS. Skills range from passive to active. To see more details about skills and where you can learn them, scroll down. </p>';
    echo '</div>';

    echo '<div class="gbox">';

    echo'<h2>Offense</h2>';
    echo '<p class="gray">Do more damage by specializing in a specific wepaon type.</p>';

    // ---------------------------------------------------------------------------------- One Handed
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($onehanded_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($onehanded_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$onehanded_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/sword1.svg").'</span>
          <h4 class="inline '.$maxcolor.'">One Handed</h4>
          <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['onehanded'].'</span></h3>
          <span class="lgray '.$stat.'">/'.$onehanded_max.'</span>
          <div class="gray">Do more damage with one handed weapons</div>
          <div class="purple '.$cost.'"> Cost for next level: '.$onehanded_cost.' SP</div>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn one handed">+1 One Handed</button>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="max one handed">MAX One Handed</button>
          ';
    echo '</div>';

        // ---------------------------------------------------------------------------------- One Handed PRO
        if ($onehandedpro_max != 0) {
            $stat=$button=$zeroskill=$cost=$maxcolor='';
            $color="purple";
            if ($onehandedpro_cost == 'max') { // at max skill level
                $button=$cost='hide';
                $color=$maxcolor='green';
            } elseif ($onehandedpro_max==0) { // skill not available yet
                $stat =$button = $cost='hide';
                $zeroskill = 'disable';
            } elseif ($sp<$onehandedpro_cost) { // not enough sp to upgrade skill
                $button='disable';
            }
            echo '<div class="gslice '.$zeroskill.'">';
            echo '<span class="icon ddgray">'.file_get_contents("img/svg/sword1.svg").'</span>
                <h4 class="inline '.$maxcolor.'">One Handed Pro</h4>
                <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['onehandedpro'].'</span></h3>
                <span class="lgray '.$stat.'">/'.$onehandedpro_max.'</span>
                <div class="gray">Do even more damage with one handed weapons</div>
                <div class="purple '.$cost.'"> Cost for next level: '.$onehandedpro_cost.' SP</div>
                <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn one handed pro">+1 One Handed Pro</button>
                <button type="submit" class="purpleBG '.$button.'" name="input1" value="max one handed pro">MAX One Handed Pro</button>
                ';
            echo '</div>';

    }
    // ---------------------------------------------------------------------------------- Two Handed
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($twohanded_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($twohanded_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$twohanded_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/axe1.svg").'</span>
          <h4 class="inline '.$maxcolor.'">Two Handed</h4>
          <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['twohanded'].'</span></h3>
          <span class="lgray '.$stat.'">/'.$twohanded_max.'</span>
          <div class="gray">Do more damage with two handed weapons</div>
          <div class="purple '.$cost.'"> Cost for next level: '.$twohanded_cost.' SP</div>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn two handed">+1 Two Handed</button>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="max two handed">MAX Two Handed</button>
          ';
    echo '</div>';

        // ---------------------------------------------------------------------------------- Two Handed PRO
        if ($twohandedpro_max != 0) {

        $stat=$button=$zeroskill=$cost=$maxcolor='';
        $color="purple";
        if ($twohandedpro_cost == 'max') { // at max skill level
            $button=$cost='hide';
            $color=$maxcolor='green';
        } elseif ($twohandedpro_max==0) { // skill not available yet
            $stat =$button = $cost='hide';
            $zeroskill = 'disable';
        } elseif ($sp<$twohandedpro_cost) { // not enough sp to upgrade skill
            $button='disable';
        }
        echo '<div class="gslice '.$zeroskill.'">';
        echo '<span class="icon ddgray">'.file_get_contents("img/svg/sword1.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Two Handed Pro</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['twohandedpro'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$twohandedpro_max.'</span>
              <div class="gray">Do even more damage with Two handed weapons</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$twohandedpro_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn two handed pro">+1 Two Handed Pro</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max two handed pro">MAX Two Handed Pro</button>
              ';
        echo '</div>';
    }
    // ---------------------------------------------------------------------------------- Ranged
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($ranged_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($ranged_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$ranged_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/bowarrow.svg").'</span>
          <h4 class="inline '.$maxcolor.'">Ranged</h4>
          <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['ranged'].'</span></h3>
          <span class="lgray '.$stat.'">/'.$ranged_max.'</span>
          <div class="gray">Do more damage with ranged weapons</div>
          <div class="purple '.$cost.'"> Cost for next level: '.$ranged_cost.' SP</div>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn ranged">+1 Ranged</button>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="max ranged">MAX Ranged</button>
          ';
    echo '</div>';

        // ---------------------------------------------------------------------------------- Ranged PRO
        if ($rangedpro_max != 0) {
            $stat=$button=$zeroskill=$cost=$maxcolor='';
        $color="purple";
        if ($rangedpro_cost == 'max') { // at max skill level
            $button=$cost='hide';
            $color=$maxcolor='green';
        } elseif ($rangedpro_max==0) { // skill not available yet
            $stat =$button = $cost='hide';
            $zeroskill = 'disable';
        } elseif ($sp<$rangedpro_cost) { // not enough sp to upgrade skill
            $button='disable';
        }
        echo '<div class="gslice '.$zeroskill.'">';
        echo '<span class="icon ddgray">'.file_get_contents("img/svg/bowarrow.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Ranged Pro</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['rangedpro'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$rangedpro_max.'</span>
              <div class="gray">Do even more damage with Ranged weapons</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$rangedpro_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn ranged pro">+1 Ranged Pro</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max ranged pro">MAX Ranged Pro</button>
              ';
        echo '</div>';
    }
        // ---------------------------------------------------------------------------------- Warcraft
        $stat=$button=$zeroskill=$cost=$maxcolor='';
        $color="purple";
        if ($warcraft_cost == 'max') { // at max skill level
            $button=$cost='hide';
            $color=$maxcolor='green';
        } elseif ($warcraft_max==0) { // skill not available yet
            $stat =$button = $cost='hide';
            $zeroskill = 'disable';
        } elseif ($sp<$warcraft_cost) { // not enough sp to upgrade skill
            $button='disable';
        }
        echo '<div class="gslice '.$zeroskill.'">';
        echo '<span class="icon ddgray">'.file_get_contents("img/svg/warcraft.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Warcraft</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['warcraft'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$warcraft_max.'</span>
              <div class="gray">Do more damage with 1h, 2h and ranged weapons.</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$warcraft_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn warcraft">+1 Warcraft</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max warcraft">MAX Warcraft</button>
              ';
        echo '</div>';
    


        echo'</div><div class="gbox">';
        echo'<h2>Special Attacks</h2>';
        echo '<p class="gray">Special Attacks cost a little MP to cause even more damage.</p>';
    // ---------------------------------------------------------------------------------- Slice
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($slice_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($slice_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$slice_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/slice.svg").'</span>
          <h4 class="inline '.$maxcolor.'">Slice</h4>
          <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['slice'].'</span></h3>
          <span class="lgray '.$stat.'">/'.$slice_max.'</span>
          <div class="gray">Slicing causes extra damage with one handed weapons</div>
          <div class="purple '.$cost.'"> Cost for next level: '.$slice_cost.' SP</div>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn slice">+1 Slice</button>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="max slice">MAX Slice</button>
          ';
    echo '</div>';

    // ---------------------------------------------------------------------------------- Smash
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($smash_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($smash_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$smash_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/smash.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Smash</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['smash'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$smash_max.'</span>
              <div class="gray">Smashing causes extra damage with two handed weapons</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$smash_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn smash">+1 Smash</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max smash">MAX Smash</button>
              ';
    echo '</div>';

    // ---------------------------------------------------------------------------------- Aim
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($aim_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($aim_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$aim_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/aim.svg").'</span>
                  <h4 class="inline '.$maxcolor.'">Aim</h4>
                  <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['aim'].'</span></h3>
                  <span class="lgray '.$stat.'">/'.$aim_max.'</span>
                  <div class="gray">Aiming causes extra damage with ranged weapons</div>
                  <div class="purple '.$cost.'"> Cost for next level: '.$aim_cost.' SP</div>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn aim">+1 Aim</button>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="max aim">MAX Aim</button>
                  ';
    echo '</div>';

    // ---------------------------------------------------------------------------------- Magic Strike
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($magicstrike_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($magicstrike_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$magicstrike_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/magicstrike.svg").'</span>
                  <h4 class="inline '.$maxcolor.'">Magic Strike</h4>
                  <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['magicstrike'].'</span></h3>
                  <span class="lgray '.$stat.'">/'.$magicstrike_max.'</span>
                  <div class="gray">Adds magical damage to your weapon attack</div>
                  <div class="purple '.$cost.'"> Cost for next level: '.$magicstrike_cost.' SP</div>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn magic strike">+1 Magic Strike</button>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="max magic strike">MAX Magic Strike</button>
                  ';
    echo '</div>';

    echo'</div><div class="gbox">';
    echo '<h2>Defense</h2>';
    echo '<p class="gray">Skills that increase your defense and survivability</p>';
    // ---------------------------------------------------------------------------------- Toughness
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($toughness_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($toughness_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$toughness_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/toughness.svg").'</span>
                  <h4 class="inline '.$maxcolor.'">Toughness</h4>
                  <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['toughness'].'</span></h3>
                  <span class="lgray '.$stat.'">/'.$toughness_max.'</span>
                  <div class="gray">Toughness increases defense</div>
                  <div class="purple '.$cost.'"> Cost for next level: '.$toughness_cost.' SP</div>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn toughness">+1 Toughness</button>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="max toughness">MAX Toughness</button>
                  ';
    echo '</div>';

    // ---------------------------------------------------------------------------------- Block
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($block_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($block_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$block_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/block.svg").'</span>
                  <h4 class="inline '.$maxcolor.'">Block</h4>
                  <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['block'].'</span></h3>
                  <span class="lgray '.$stat.'">/'.$block_max.'</span>
                  <div class="gray">Increase defense even more with a shield equipped</div>
                  <div class="purple '.$cost.'"> Cost for next level: '.$block_cost.' SP</div>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn block">+1 Block</button>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="max block">MAX Block</button>
                  ';
    echo '</div>';

    // ---------------------------------------------------------------------------------- Dodge
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($ddge_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($ddge_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$ddge_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/dodge.svg").'</span>
                  <h4 class="inline '.$maxcolor.'">Dodge</h4>
                  <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['ddge'].'</span></h3>
                  <span class="lgray '.$stat.'">/'.$ddge_max.'</span>
                  <div class="gray">Increase your chances of dodging an attack</div>
                  <div class="purple '.$cost.'"> Cost for next level: '.$ddge_cost.' SP</div>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn dodge">+1 Dodge</button>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="max dodge">MAX Dodge</button>
                  ';
    echo '</div>';


    echo'</div><div class="gbox">';
    echo '<h2>Upgrades</h2>';
    echo '<p class="gray">Specialize even further and do more damage.</p>';
    // ---------------------------------------------------------------------------------- Multi Arrow
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($multiarrow_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($multiarrow_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$multiarrow_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/multiarrow.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Multi Arrow</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['multiarrow'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$multiarrow_max.'</span>
              <div class="gray">Do more damage with bows</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$multiarrow_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn multi arrow">+1 Multi Arrow</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max multi arrow">MAX Multi Arrow</button>
              ';
    echo '</div>';
    // ---------------------------------------------------------------------------------- Bolt Upgrade
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($boltupgrade_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($boltupgrade_max==0) { //P skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$boltupgrade_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/boltupgrade.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Bolt Upgrade</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['boltupgrade'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$boltupgrade_max.'</span>
              <div class="gray">Do more damage with crossbows</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$boltupgrade_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn bolt upgrade">+1 Bolt Upgrade</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max bolt upgrade">MAX Bolt Upgrade</button>
              ';
    echo '</div>';


    echo '</div>';




    // ---------------------------------------------------------------------------------- SKILL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SKILL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SKILL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SKILL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SKILL DESCRIPTIONS
    echo '
    <br><br><br><br><br><br><br>
    <div class="gbox">

<h2>SKILL DESCRIPTIONS</h2>	';

    echo '<h2>TRAINING</h2>';
    echo '
<div class="descrip">
<h6 class="red">Physical Training [PASSIVE]</h6>
<p>PT increases the amount of HP you gain when you level, as well as when you rest.</p>
<p><i class="purple">10</i> Pajama Shaman</p>
<p><i class="purple">20</i> Warrior\'s Guild</p>
<p><i class="purple">25</i> Ranger\'s Guild</p>
<p><i class="purple">30</i> Star City</p>
<p><i class="purple">50</i> Barbarian\'s Guild / Knight\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="blue">Mental Training [PASSIVE]</h6>
<p>MT increases the amount of MP you gain when you level, as well as when you rest.</p>
<p><i class="purple">10</i> Pajama Shaman</p>
<p><i class="purple">20</i> Wizard\'s Guild</p>
<p><i class="purple">25</i> Ranger\'s Guild</p>
<p><i class="purple">30</i> Star City</p>
<p><i class="purple">50</i> Warlock\'s Guild</p>
</div>
';



    echo '<h2>OFFENSE</h2>	';


    echo'
<div class="descrip">
<h6 class="red">One Handed [PASSIVE]</h6>
<p>Increases damage done with all one handed weapons. Each point in the skill is another point higher for STR.</p>
<p><i class="purple">5</i> Young Soldier</p>
<p><i class="purple">10</i> Traveling Warrior</p>
<p><i class="purple">20</i> Warrior\'s Guild</p>
<p><i class="purple">30</i> Star City</p>
<p><i class="purple">50</i> Knight\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="red">Two Handed [PASSIVE]</h6>
<p>Increases damage done with all two handed weapons. Each point in the skill is another point higher for STR.</p>
<p><i class="purple">5</i> Young Soldier</p>
<p><i class="purple">10</i> Traveling Warrior</p>
<p><i class="purple">20</i> Warrior\'s Guild</p>
<p><i class="purple">30</i> Star City</p>
<p><i class="purple">50</i> Barbarian\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="green">Ranged [PASSIVE]</h6>
<p>Increases damage done with all ranged weapons. Each point in the skill is another point higher for DEX.</p>
<p><i class="purple">5</i> Jack Lumber</p>
<p><i class="purple">15</i> Hunter Bill</p>
<p><i class="purple">30</i> Ranger\'s Guild</p>
<p><i class="purple">50</i> Druid\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="black">Warcraft [PASSIVE]</h6>
<p>Increases damage done with all 1h, 2h or ranged weapons. Each point in the skill is another point higher for STR or DEX.</p>
<p><i class="purple">10</i> Master Trainer</p>
<p><i class="purple">30</i> Barbarian\'s Guild</p>
</div>
';



    echo '<h2>ATTACKS</h2>';

    echo '
<div class="descrip">
<h6 class="red">Slice [ATTACK]</h6>
<p>Adds extra damage to your ONE HANDED attacks. </p>
<p class="purple">Adds ( 1 - skill lvl ) extra damage to your 1h attack damage. <span class="lightgray">[ COST: skill lvl mp ]</span></p>
<p><i class="purple">5</i> Traveling Warrior</p>
<p><i class="purple">10</i> Warrior\'s Guild</p>
<p><i class="purple">20</i> Knight\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="red">Smash [ATTACK]</h6>
<p>Adds extra damage to your TWO HANDED attacks. </p>
<p class="purple">Adds ( 1 - skill lvl ) extra damage to your 2h attack damage. <span class="lightgray">[ COST: skill lvl mp ]</span></p>
<p><i class="purple">5</i> Traveling Warrior</p>
<p><i class="purple">10</i> Warrior\'s Guild</p>
<p><i class="purple">20</i> Knight\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="green">Aim [ATTACK]</h6>
<p>Adds extra damage to your RANGED attacks. </p>
<p class="purple">Adds ( 1 - skill lvl ) extra damage to your ranged damage. <span class="lightgray">[ COST: skill lvl mp ]</span></p>
<p><i class="purple">5</i> Hunter Bill</p>
<p><i class="purple">10</i> Ranger\'s Guild</p>
<p><i class="purple">20</i> Assassin\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="blue">Magic Strike [ATTACK]</h6>
<p>Adds some magic damage to your normal STR attacks. </p>
<p class="purple">Adds ( lvl x 5% MAG )	damage.	 <span class="lightgray">[ COST: 2 x skill lvl mp ]</span></p>
<p><i class="purple">10</i> Warrior\'s Guild</p>
<p><i class="purple">20</i> Knight\'s Guild</p>
</div>
';




    echo '<h2>DEFENSE</h2>';
    echo '
<div class="descrip">
<h6 class="purple">Toughness [PASSIVE]</h6>
<p>Increases Defense. Each point in the skill is another point added to DEF.</p>
<p><i class="purple">5</i> Young Soldier</p>
<p><i class="purple">10</i> Traveling Warrior</p>
<p><i class="purple">20</i> Warrior\'s Guild</p>
<p><i class="purple">30</i> Star City</p>
<p><i class="purple">50</i> Barbarian\'s Guild / Knight\'s Guild</p>
</div>
';

    echo '
<div class="descrip">
<h6 class="purple">Block [PASSIVE]</h6>
<p>Increases Defense with shields. When a shield is equipped each point in the skill is another 2 points added to DEF.</p>
<p><i class="purple">10</i> Warrior\'s Guild</p>
<p><i class="purple">30</i> Knight\'s Guild</p>
</div>
';

    echo '
<div class="descrip">
<h6 class="purple">Dodge [PASSIVE]</h6>
<p>Skill LVL % chance to dodge enemie\'s attack</p>
<p><i class="purple">5</i> Hunter Bill</p>
<p><i class="purple">10</i> Ranger\'s Guild</p>
<p><i class="purple">15</i> Assassin\'s Guild</p>
</div>';

    echo '<h2>UPGRADES</h2>';

    echo '</div>';
// }
