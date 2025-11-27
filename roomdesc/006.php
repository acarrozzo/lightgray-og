<?php
// ---------------------------------------------------- 006 - Grassy Field East / Basic Shop
$_SESSION['dangerLVL'] = "000";
$dirN='active greenfield';
$dirS='active greenfield';
$dirW='active greenfield';
$dirSW='active greenfield';
$dirNW='active greenfield';
$dirE='active dirt';
$icon = file_get_contents("img/svg/basicshop.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon brown">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="greenfield">Grassy Field East</h3>
    <h4 class="brown">Basic Shop</h4>
</div>
  	</div>
<p>A Basic Shop is set up here where you can buy weapons, armor and other useful items. To the south is a cave and north is a strange tent. To the far east you see a forest.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
    <a class="btn goldBG" data-link="shop">Shop</a>
  	<button class="" type="submit" name="input1" value="west">West</button>
  	<button class="" type="submit" name="input1" value="north">North</button>
  	<button class="" type="submit" name="input1" value="south">South</button>
  	<button class="" type="submit" name="input1" value="east">East</button>
	</form></div>';
