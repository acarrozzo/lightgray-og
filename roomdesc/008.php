<?php
// ---------------------------------------------------- 008 - Spider Cave Exit
$_SESSION['dangerLVL'] = "2";
$dirN='active greenfield';
$dirS='active darkgray';
$icon = file_get_contents("img/svg/spidercave.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon darkgray">'.$icon.'</span>
  	<div class="roomTitle">
<h3 class="greenfield">Spider Cave Exit</h3>
</div>
    </div>
<p>Inside the spider cave. You can exit to the north or continue deeper into the cave by going south.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
    <button type="submit" name="input1" value="north">North</button>
  	<button type="submit" name="input1" value="south">South</button>
  	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
  	<button class="redBG" type="submit" name="input1" value="attack">Attack</button>
	</form>
  </div>';
