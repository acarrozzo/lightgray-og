<?php
// ---------------------------------------------------- 010 - Spider Cave
$_SESSION['dangerLVL'] = "4";
$dirN='active darkgray';
$dirW='active darkgray';
$icon = file_get_contents("img/svg/spider1.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon darkgray">'.$icon.'</span>
  	<div class="roomTitle">
<h3 class="">Spider Cave</h3>
</div>
    </div>
<p>Standing in the darker part of the Cave. You see light from the entrance to the northwest. To the northeast you hear some vile sounds.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
    <button type="submit" name="input1" value="west">West</button>
    <button type="submit" name="input1" value="north">North</button>
    <button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
  	<button class="redBG" type="submit" name="input1" value="attack">Attack</button>
	</form>
  </div>';
