<?php
// ---------------------------------------------------- 013 - Marsh Behind the Cabin
$_SESSION['dangerLVL'] = "5";
$dirNE='active greenfield';
$icon = file_get_contents("img/svg/gator.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon big swamp">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="swamp">Marsh Behind the Cabin</h3>
</div>
    </div>
<p>A gross swampy marsh. You see some gator tracks in the mud.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
    <button class="redBG" type="submit" name="input1" value="attack">Attack Gator</button>
    <button type="submit" name="input1" value="northeast">Northeast</button>
	</form>
  </div>';
