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

echo '<h4>Offense Spells</h4><br>';

echo '<div class="item-flex">'; // item flex box
// --------------------------------------------------------------------- Magic Missile
if ($magicmissile >= 1) {
   //$spell_cost_cast = 5 + ($row['magicmissile']*2); // was *1
   if ($mp < $magicmissile_cost_cast) { $disabled="disabled";} else { $disabled="";} // disabled check
   echo '
           <button class="itembox '.$disabled.'" type="submit" name="input1" value="magicmissile">
           <span class="icon blue">'.file_get_contents("img/svg/magicmissile.svg").'</span>
           <p class="">lvl '.$magicmissile.'</p>
           <strong class="blue">Magic Missile</strong>
           <p class="qty">'.$magicmissile_cost_cast.'mp</p>
           </button>';
   }   
// --------------------------------------------------------------------- FIREBALL
if ($fireball >= 1) {
if ($mp < $fireball_cost_cast) { $disabled="disabled";} else { $disabled="";} // disabled check
echo '
       <button class="itembox '.$disabled.'" type="submit" name="input1" value="fireball">
       <span class="icon red">'.file_get_contents("img/svg/fireball.svg").'</span>
       <p class="">lvl '.$fireball.'</p>
       <strong class="red">Fireball</strong>
       <p class="qty">'.$fireball_cost_cast.'mp</p>
       </button>';
}


// --------------------------------------------------------------------- poisondart
if ($poisondart >= 1) {
if ($mp < $poisondart_cost_cast) { $disabled="disabled";} else { $disabled="";} // disabled check
echo '
       <button class="itembox '.$disabled.'" type="submit" name="input1" value="poison dart">
       <span class="icon green">'.file_get_contents("img/svg/poisondart.svg").'</span>
       <p class="">lvl '.$poisondart.'</p>
       <strong class="green">Poisondart</strong>
       <p class="qty">'.$poisondart_cost_cast.'mp</p>
       </button>';
}  
       
       
// --------------------------------------------------------------------- Atomic Blast
if ($atomicblast >= 1) {
if ($mp < $atomicblast_cost_cast) { $disabled="disabled";} else { $disabled="";} // disabled check
echo '
       <button class="itembox '.$disabled.'" type="submit" name="input1" value="atomic blast">
       <span class="icon pink">'.file_get_contents("img/svg/atomicblast.svg").'</span>
       <p class="">lvl '.$atomicblast.'</p>
       <strong class="pink">Atomic Blast</strong>
       <p class="qty">'.$atomicblast_cost_cast.'mp</p>
       </button>';
}  
echo '</div>'; // end item flex box
echo '</div>'; // end gbox
echo '<div class="gbox">';
echo '<h4>Support Spells</h4><br/>';
echo '<div class="item-flex">'; // item flex box
// --------------------------------------------------------------------- HEAL
if ($heal >= 1) {
if ($mp < $heal_cost_cast || $hp>=$hpmax) { $disabled="disabled";} else { $disabled="";} // disabled check
echo '
       <button class="itembox '.$disabled.'" type="submit" name="input1" value="heal">
       <span class="icon red">'.file_get_contents("img/svg/heal.svg").'</span>
       <p class="">lvl '.$heal.'</p>
       <strong class="red">Heal</strong>
       <p class="qty">'.$heal_cost_cast.'mp</p>
       </button>';
}

// --------------------------------------------------------------------- regenerate
if ($regenerate >= 1) {
if ($mp < $regenerate_cost_cast) { $disabled="disabled";} else { $disabled="";} // disabled check
echo '
       <button class="itembox '.$disabled.'" type="submit" name="input1" value="regenerate">
       <span class="icon green">'.file_get_contents("img/svg/regenerate.svg").'</span>
       <p class="">lvl '.$regenerate.'</p>
       <strong class="green">Regenerate</strong>
       <p class="qty">'.$regenerate_cost_cast.'mp</p>
       </button>';
}  

// --------------------------------------------------------------------- magicarmor
if ($magicarmor >= 1) {
if ($mp < $magicarmor_cost_cast || $_SESSION['magicarmor_amount'] > 0) { $disabled="disabled";} else { $disabled="";} // disabled check
echo '
       <button class="itembox '.$disabled.'" type="submit" name="input1" value="magic armor">
       <span class="icon blue">'.file_get_contents("img/svg/magicarmor.svg").'</span>
       <p class="">lvl '.$magicarmor.'</p>
       <strong class="blue">Magic Armor</strong>
       <p class="qty">'.$magicarmor_cost_cast.'mp</p>
       </button>';
}       
  // --------------------------------------------------------------------- ironskin
  if ($ironskin >= 1) {
   if ($mp < $ironskin_cost_cast || $_SESSION['ironskin_amount'] > 0) { $disabled="disabled";} else { $disabled="";} // disabled check
   echo '
           <button class="itembox '.$disabled.'" type="submit" name="input1" value="iron skin">
           <span class="icon gold">'.file_get_contents("img/svg/ironskin.svg").'</span>
           <p class="">lvl '.$ironskin.'</p>
           <strong class="gold">Iron Skin</strong>
           <p class="qty">'.$ironskin_cost_cast.'mp</p>
           </button>';
   }    


// --------------------------------------------------------------------- wings
if ($wings >= 1) {
   if ($mp < $wings_cost_cast || $flying>=1) { $disabled="disabled";} else { $disabled="";} // disabled check
   echo '
           <button class="itembox '.$disabled.'" type="submit" name="input1" value="wings">
           <span class="icon lightblue">'.file_get_contents("img/svg/wings.svg").'</span>
           <p class="">lvl '.$wings.'</p>
           <strong class="lightblue">Wings</strong>
           <p class="qty">'.$wings_cost_cast.'mp</p>
           </button>';
   }   

// --------------------------------------------------------------------- gills
if ($gills >= 1) {
   if ($mp < $gills_cost_cast || $breathingwater>=1) { $disabled="disabled";} else { $disabled="";} // disabled check
   echo '
           <button class="itembox '.$disabled.'" type="submit" name="input1" value="gills">
           <span class="icon blue">'.file_get_contents("img/svg/gills.svg").'</span>
           <p class="">lvl '.$wings.'</p>
           <strong class="blue">Gills</strong>
           <p class="qty">'.$gills_cost_cast.'mp</p>
           </button>';
   }                    


   echo '</div>'; // end item flex box









        echo '</div>'; // END GBOX





} // END WHILE
