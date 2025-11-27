<?php
// ---------------------------------------------------- 012 - Above the Scorpion Pit
$_SESSION['dangerLVL'] = "5";
$dirW='active darkgray';
$dirD='active redbrown';
$icon = file_get_contents("img/svg/scorpion2.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon darkgray">'.$icon.'</span>
    <div class="roomTitle">
<h3>Above the <span class="redbrown">Scorpion Pit</span></h3>
</div>
    </div>
<p>An opening to a dark cave leads below. There is a warning sign here.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
    <button type="submit" name="input1" value="west">West</button>
  	<button class="redbrownBG" type="submit" name="input1" value="down">Down</button>
  	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	</form>
  </div>';
