<?php
// ---------------------------------------------------- 012b - Scorpion Pit Exit
$_SESSION['dangerLVL'] = "5";
$dirU='active darkgray';
$dirS='active redbrown';
$icon = file_get_contents("img/svg/scorpion3.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon redbrown">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="redbrown">Scorpion Pit Entrance</h3>
</div>
    </div>
<p>Head up to the much safer Spider Cave. If you are feeling brave continue south through the Scorpion Pit.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
    <button type="submit" name="input1" value="south">South</button>
  	<button class="darkgrayBG" type="submit" name="input1" value="up">Up</button>
	</form>
  </div>';
