<?php
// ---------------------------------------------------- 028h - Goblin Dead End
$_SESSION['dangerLVL'] = "7";
$dirS='active dgray';
$dirN='active redbrown';

$icon = file_get_contents("img/svg/environment/goblin-dead-end.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
<span class="icon roomIcon darkgray big2">'.$icon.'</span>
<div class="roomTitle">
<h3>Goblin Dead End</h3>
</div>
</div>
<p>You come to a dead end in the cave. You see goblins all around. </p>
<form id="mainForm" method="post" action="" name="formInput">
<input class="goldBG" type="submit" name="input1" value="search" />
<button type="submit" name="input1" value="south">South</button>
</form></div>';


?>





