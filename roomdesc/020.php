<?php
// ---------------------------------------------------- 20 - Healing Springs
$_SESSION['dangerLVL'] = "0";
$dirS='active greenfield';
$dirSE='active greenfield';
$dirE='active greenfield';
$dirNW='active blue';
$icon = file_get_contents("img/svg/waterfall.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon blue">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="blue">Healing Springs</h3>
    <h4 class="green">Mountain Waterfall</h4>
</div>
    </div>
<p>Relax in the warm waters that have formed here. Along your journey you will come across many waterfalls, lakes, fountains and other natural springs. Rest at these locations to supercharge your Health and Mana.</p>
      <form id="mainForm" method="post" action="" name="formInput">
    	<button type="submit" name="input1" value="south">South</button>
    	<button type="submit" name="input1" value="southeast">Southeast</button>
    	<button type="submit" name="input1" value="east">East</button>
    	<button class="greenBG" type="submit" name="input1" value="rest">Rest</button>
  	</form>
  </div>';
//      <button class="blueBG" type="submit" name="input1" value="northwest">Northwest</button>
