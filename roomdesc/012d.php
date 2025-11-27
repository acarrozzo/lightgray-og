<?php
// ---------------------------------------------------- 012d - Scorpion Control Room
$_SESSION['dangerLVL'] = "5";
$dirN='active redbrown';
$icon = file_get_contents("img/svg/rat2.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon redbrown">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="redbrown">Scorpion Control Room</h3>
</div>
    </div>
<p>This room is lighter than the others. There is a lever on the wall.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
    <button type="submit" name="input1" value="north">North</button>
  	<button class="goldBG" type="submit" name="input1" value="flip lever">Flip Lever</button>
	</form>
  </div>';
