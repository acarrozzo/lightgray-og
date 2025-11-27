<?php
// ---------------------------------------------------- 014 - Dirt Road West
$_SESSION['dangerLVL'] = "0";
$dirW='active sand';
$dirE='active greenfield';
$icon = file_get_contents("img/svg/sign2.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon dirt">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="dirt">Dirt Road West</h3>
</div>
    </div>
<p>You are on a dirt path heading down to the beach.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
      <input class="sandBG" type="submit" name="input1" value="west" />
    	<input class="greenfieldBG" type="submit" name="input1" value="east" />
  	</form>
  </div>';
