<?php
// ---------------------------------------------------- 011 - Spider Cave
$_SESSION['dangerLVL'] = "3";
$dirS='active darkgray';
$dirE='active darkgray';
$icon = file_get_contents("img/svg/spider2.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon darkgray">'.$icon.'</span>
  	<div class="roomTitle">
<h3 class="">Spider Cave</h3>
</div>
    </div>
<p>Inside the spider cave.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
    <button type="submit" name="input1" value="south">South</button>
  	<button type="submit" name="input1" value="east">East</button>
	</form>
  </div>';
