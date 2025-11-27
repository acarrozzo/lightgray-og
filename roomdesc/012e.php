<?php
// ---------------------------------------------------- 012e - Scorpion Guard Room
$_SESSION['dangerLVL'] = "7";
$dirS='active redbrown';
$dirN='active redbrown';
$dirSE='active redbrown';
$icon = file_get_contents("img/svg/scorpion5.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon big redbrown">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="redbrown">Scorpion Guard Room</h3>
</div>
    </div>
<p>Guards patrol this dark room.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
    <button type="submit" name="input1" value="north">North</button>
  	<button type="submit" name="input1" value="southeast">Southeast</button>
  	<button type="submit" name="input1" value="south">South</button>
	</form>
  </div>';
