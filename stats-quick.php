<?php



echo '
<div class="gray">MAX  
<button class="textX small redBG" type="submit" name="input1" value="max 1h">1H</button> 
<button class="textX small redBG" type="submit" name="input1" value="max 2h">2H</button> 
<button class="textX small greenBG" type="submit" name="input1" value="max dex">DEX</button> 
 <button class="textX small blueBG" type="submit" name="input1" value="max mag">MAG</button> 
 </div>';
// <button class="textX small goldBG" type="submit" name="input1" value="max def">DEF</button> 

echo'<div class="gray">';
echo 'STR<strong class=" red"> '.$_SESSION['strmod'].'</strong> ';
echo 'DEX<strong class=" green"> '.$_SESSION['dexmod'].'</strong> ';
echo 'MAG<strong class=" blue"> '.$_SESSION['magmod'].'</strong> ';
echo 'DEF<strong class=" gold"> '.$_SESSION['defmod'].'</strong> ';
/*if ($row['cp']>0) {
    echo ' |  ';
    echo'<span class="">CP</span> ';
    echo '<span class=" yellow"> '.$row['cp'].'</span> ';
    echo'<a class="yellow" href="" data-link2="stats">Core Stats</a>';
} else {
  //  echo'<span class="lgray" href="" data-link2="stats">Core Stats</span>';
   // echo'<span class=" gray"> '.$row['cp'].'</span> ';
}
*/ 

echo '</div>' ;




/* echo '
<div class="gray">Auto MAX: 
<button class="text red" type="submit" name="input1" value="max 1h">1H</button> | 
<button class="text red" type="submit" name="input1" value="max 2h">2H</button> | 
<button class="text green" type="submit" name="input1" value="max dex">DEX</button> | 
 <button class="text blue" type="submit" name="input1" value="max mag">MAG</button> | 
 <button class="text gold" type="submit" name="input1" value="max def">DEF</button> 
 </div>';
*/

?>