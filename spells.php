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
    echo '<h3 class="spCount white">SP <span class="purple">'.$sp.'</span></h3>';
    echo'<div class="gbox">';
    echo '<h1>Spells</h1>';
    echo '<p class="gray">Use SP to purchase and upgrade SKILLS and SPELLS. Spells will almost always consume MP to cast. To see more details about SPELLS and where you can learn them, scroll down. </p>';
    echo '</div>';
    echo'<div class="gbox">';
    echo'<h2>Destruction</h2>';
    echo'<p class="gray">Attack enemies with powerful Destruction magic</p>';
    // ---------------------------------------------------------------------------------- Magic Missile
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($magicmissile_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($magicmissile_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$magicmissile_cost) { // not enough sp to upgrade skill
        $button='disable';
    }

    $minhit = 1 + $row['magicmissile'];
    $maxhit = 1 + $row['magicmissile'] + $row['magmod'];
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/magicmissile.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Magic Missile</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['magicmissile'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$magicmissile_max.'</span>
              <div class="gray">A weak projectile to cast at an enemy</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$magicmissile_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn magicmissile">+1 Magic Missile</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max magicmissile">MAX Magic Missile</button>

              <p class="ddgray">DAMAGE = 1 + lvl + rand(0,mag)	</p>  
              <p class="ddgray">MIN HIT = 1 + '.$row['magicmissile'].' + 0 = '.$minhit.'</p>  
              <p class="ddgray">MAX HIT = 1 + '.$row['magicmissile'].' + '.$row['magmod'].' = '.$maxhit.'</p>  


              ';
    echo '</div>';
    // ---------------------------------------------------------------------------------- Fireball
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($fireball_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($fireball_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$fireball_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
   // $maxhit = $row['fireball'] + (rand(0,$row['magmod'])) + (.05 * $row['fireball']);
   $maxhit = ceil($row['fireball'] + $row['magmod'] * (1 + (.05 * $row['fireball'])));
   $minhit = ceil($row['fireball'] + 0 * (1 + (.05 * $row['fireball'])));
   $fireballmod = (1 + (.05 * $row['fireball']));
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/fireball.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Fireball</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['fireball'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$fireball_max.'</span>
              <div class="gray">Throw a fireball at your enemies</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$fireball_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn fireball">+1 Fireball</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max fireball">MAX Fireball</button>

              <p class="ddgray">DAMAGE = lvl +  ( 0 - mag ) x ( 1 + ( 5% x lvl ))	</p>  
              <p class="ddgray">MIN HIT = '.$row['fireball'].' + ( 0 x '.$fireballmod.') = '.$minhit.'</p>  
              <p class="ddgray">MAX HIT = '.$row['fireball'].' + ( '.$row['magmod'].' x '.$fireballmod.') = '.$maxhit.'</p>  

              ';
    echo '</div>';


    // ---------------------------------------------------------------------------------- Poison Dart
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($poisondart_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($poisondart_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$poisondart_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    $maxhit = ceil($row['poisondart'] + $row['magmod'] * (1 + (.05 * $row['poisondart'])));
    $minhit = ceil($row['poisondart'] + 0 * (1 + (.05 * $row['poisondart'])));
    $mod = (1 + (.05 * $row['poisondart']));
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/poisondart.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Poison Dart</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['poisondart'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$poisondart_max.'</span>
              <div class="gray">Launch a Poison Dart at your enemies to do damage over time</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$poisondart_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn poison dart">+1 Poison Dart</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max poison dart">MAX Poison Dart</button>

              <p class="ddgray">DAMAGE = lvl +  ( 0 - mag ) x ( 1 + ( 5% x lvl ))	</p>  
              <p class="ddgray">MIN HIT = '.$row['poisondart'].' + ( 0 x '.$mod.') = '.$minhit.'</p>  
              <p class="ddgray">MAX HIT = '.$row['poisondart'].' + ( '.$row['magmod'].' x '.$mod.') = '.$maxhit.'</p>  

              ';
    echo '</div>';
    // ---------------------------------------------------------------------------------- Atomic Blast
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($atomicblast_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($atomicblast_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$atomicblast_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
     $minhit = $row['mag'] + (0 * $row['atomicblast']);
     $maxhit = $row['mag'] + ($row['magmod'] * $row['atomicblast']);
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/atomicblast.svg").'</span>
            <h4 class="inline '.$maxcolor.'">Atomic Blast</h4>
            <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['atomicblast'].'</span></h3>
            <span class="lgray '.$stat.'">/'.$atomicblast_max.'</span>
            <div class="gray">PRO SPELL: Atomic Blast causes devastating damage but is expensive to cast</div>
            <div class="purple '.$cost.'"> Cost for next level: '.$atomicblast_cost.' SP</div>
            <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn atomic blast">+1 Atomic Blast</button>
            <button type="submit" class="purpleBG '.$button.'" name="input1" value="max atomic blast">MAX Atomic Blast</button>
            
            <p class="ddgray">DAMAGE = magCore + (( 0 - mag ) * lvl)	</p>  
            <p class="ddgray">MIN HIT = '.$row['mag'].' + (0 * '.$row['atomicblast'].') = '.$minhit.'</p>  
            <p class="ddgray">MAX HIT = '.$row['mag'].' + ('.$row['magmod'].' *'.$row['atomicblast'].') = '.$maxhit.'</p>  

            ';
    echo '</div>';

    echo '<h2>Restoration</h2>';
    echo'<p class="gray">Support your character with a variety of healing spells.</p>';
    // ---------------------------------------------------------------------------------- Heal
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($heal_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($heal_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$heal_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/heal.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Heal</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['heal'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$heal_max.'</span>
              <div class="gray">Heal your HP at any time</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$heal_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn heal">+1 Heal</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max heal">MAX Heal</button>
              ';
    echo '</div>';
    // ---------------------------------------------------------------------------------- Regenerate
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($regenerate_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($regenerate_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$regenerate_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/regenerate.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Regenerate</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['regenerate'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$regenerate_max.'</span>
              <div class="gray">Regenerate health over time</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$regenerate_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn regenerate">+1 Regenerate</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max regenerate">MAX Regenerate</button>
              ';
    echo '</div>';
    // ---------------------------------------------------------------------------------- Antidote
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($antidote_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($antidote_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$antidote_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/antidote.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Antidote</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['antidote'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$antidote_max.'</span>
              <div class="gray">Cure yourself of poison and become immune for a short time</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$antidote_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn antidote">+1 Antidote</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max antidote">MAX Antidote</button>
              ';
    echo '</div>';


    echo '<h2>Alteration</h2>';
    echo'<p class="gray">Manipulate yourself and the world around you to your advantage with Alteration spells.</p>';

    // ---------------------------------------------------------------------------------- Magic Armor
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($magicarmor_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($magicarmor_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$magicarmor_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/magicarmor.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Magic Armor</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['magicarmor'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$magicarmor_max.'</span>
              <div class="gray">Magic Armor protects you by absorbing damage</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$magicarmor_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn magic armor">+1 Magic Armor</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max magic armor">MAX Magic Armor</button>
              ';
    echo '</div>';
    // ---------------------------------------------------------------------------------- Iron Skin
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($ironskin_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($ironskin_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$ironskin_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/ironskin.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Iron Skin</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['ironskin'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$ironskin_max.'</span>
              <div class="gray">Increase defense with Iron Skin</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$ironskin_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn iron skin">+1 Iron Skin</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max iron skin">MAX Iron Skin</button>
              ';
    echo '</div>';
    // ---------------------------------------------------------------------------------- Wings
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($wings_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($wings_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$wings_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/wings.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Wings</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['wings'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$wings_max.'</span>
              <div class="gray">Wings give you the ability to fly</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$wings_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn wings">+1 Wings</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max wings">MAX Wings</button>
              ';
    echo '</div>';
    // ---------------------------------------------------------------------------------- Gills
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($gills_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($gills_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$gills_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/gills.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Gills</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['gills'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$gills_max.'</span>
              <div class="gray">Gills allows you to breathe underwater</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$gills_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn gills">+1 Gills</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max gills">MAX Gills</button>
              ';
    echo '</div>';



    // ---------------------------------------------------------------------------------- SPELL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SPELL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SPELL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SPELL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SPELL DESCRIPTIONS
    echo '	<br><br><br><br><br><br><br><br><br><br>
<h2 class="h5 darkestgray">SPELL DESCRIPTIONS</h2>	';
    echo '<h2 class="h2 darkestgray clear">DESTRUCTION</h2>	';


    echo'
<div class="descrip">
<h6 class="red">Fireball</h6>
<p class="">Launch a destructive Fireball at your enemy.</p>
<p class="small"><span class="red">Damage: </span> lvl + (rand(1-mag) + (lvl*5%))  </p>
<p class="small"><span class="blue">Cost: </span> 5 + (2*lvl) mp </p>
<p><i class="purple">3</i> Pajama Shaman</p>
<p><i class="purple">5</i> Traveling Wizard</p>
<p><i class="purple">10</i> Wizard\'s Guild</p>
<p><i class="purple">20</i> Star City</p>
<p><i class="purple">30</i> Warlock\'s Guild</p>
</div>
';
    echo'
<div class="descrip">
<h6 class="blue">Magic Missile</h6>
<p class="">Launch a destructive Magic Missile at your enemy.</p>
<p class="small"><span class="red">Damage: </span> lvl + (rand(1-mag) + (lvl*5%))  </p>
<p class="small"><span class="blue">Cost: </span> 5 + (2*lvl) mp </p>
<p><i class="purple">5</i> Traveling Wizard</p>
<p><i class="purple">10</i> Wizard\'s Guild</p>
<p><i class="purple">20</i> Star City</p>
<p><i class="purple">30</i> Warlock\'s Guild</p>
</div>
';
    echo'
<div class="descrip">
<h6 class="green">Poison Dart</h6>
<p class="">Launch a Poisonous Dart at your enemy.</p>
<p class="small"><span class="red">Damage: </span> lvl + (rand(1-mag) + (lvl*5%))  </p>
<p class="small"><span class="green">Poison: </span> rand (lvl*2) </p>
<p class="small"><span class="blue">Cost: </span> 5 + (3*lvl) mp </p>
<p><i class="purple">10</i> Wizard\'s Guild</p>
<p><i class="purple">20</i> Star City</p>
<p><i class="purple">30</i> Warlock\'s Guild</p>
</div>
';
    echo'
<div class="descrip">
<h6 class="black">Atomic Blast</h6>
<p class="">Destroy your enemy with Atomic Power.</p>
<p class="small"><span class="red">Damage: </span>  lvl*rand(mag)  </p>
<p class="small"><span class="blue">Cost: </span> 100*lvl mp </p>
<p><i class="purple">5</i> Wizard\'s Guild</p>
<p><i class="purple">10</i> Star City</p>
<p><i class="purple">15</i> Warlock\'s Guild</p>
</div>
';


    echo '<h2 class="h2 darkestgray">RESTORATION</h2>	';


    echo'
<div class="descrip">
<h6 class="green">Heal</h6>
<p class="">Use Magic to Heal your Hit Points.</p>
<p class="small"><span class="green">Heal Amount: </span> rand(1,mag) + (rand(1,mag)*lvl)  </p>
<p class="small"><span class="blue">Cost: </span> 2*lvl mp </p>
<p><i class="purple">3</i> Pajama Shaman</p>
<p><i class="purple">5</i> Traveling Wizard</p>
<p><i class="purple">10</i> Wizard\'s Guild</p>
<p><i class="purple">20</i> Star City</p>
<p><i class="purple">30</i> Knight\'s Guild</p>
</div>
';
    echo'
<div class="descrip">
<h6 class="green">Regenerate</h6>
<p class="">Regenerate your HP for many clicks.</p>
<p class="small"><span class="green">Regen Amount: </span> rand(lvl,lvl*2) hp  </p>
<p class="small"><span class="purple">Clicks: </span> rand(magbase, magmod) clicks  </p>
<p class="small"><span class="blue">Cost: </span> 20*lvl mp </p>
<p><i class="purple">10</i> Wizard\'s Guild</p>
<p><i class="purple">30</i> Knight\'s Guild</p>
</div>
';


    echo '<h2 class="h2 darkestgray">ALTERATION</h2>	';


    echo'
</span>';
//}
