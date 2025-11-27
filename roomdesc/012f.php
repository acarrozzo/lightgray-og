<?php
// ---------------------------------------------------- 012f - Scorpion Hall
$_SESSION['dangerLVL'] = "10";
$dirS='active redbrown';
$dirNE='active redbrown';
$icon = file_get_contents("img/svg/scorpion6.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon big redbrown">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="redbrown">Scorpion Hall</h3>
</div>
    </div>
<p>A very, very large room. Giant Scorpion tracks line the floor.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
    <button type="submit" name="input1" value="south">South</button>
    <button type="submit" name="input1" value="northeast">Northeast</button>

	</form>
  </div>';
