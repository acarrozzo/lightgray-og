<?php
// ---------------------------------------------------- 022 - Dirt Road East
$_SESSION['dangerLVL'] = "0";
$dirW='active greenfield';
$dirE='active dirt';
$icon = file_get_contents("img/svg/sign2.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon dirt">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="dirt">Dirt Road East</h3>
</div>
    </div>
<p>You are on a dirt path heading towards the forest. To the west you see the grassy field.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
  	<button type="submit" name="input1" value="west">West</button>
  	<button type="submit" name="input1" value="east">East</button>
  	</form>
  </div>';
