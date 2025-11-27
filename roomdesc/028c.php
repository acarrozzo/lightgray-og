<?php
// ---------------------------------------------------- 028c - Abandoned Workshop in the Bat Cave
$_SESSION['dangerLVL'] = "2";
$dirW='active dgray';
$dirNW='active dgray';
//$icon = file_get_contents("img/svg/enemy/golden bat.svg");
$icon = file_get_contents("img/svg/environment/bat-cave-abandoned-workshop.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
<span class="icon roomIcon darkgray big2">'.$icon.'</span>
<div class="roomTitle">
<h3 class="lightgray">Bat Cave</h3>
<h4 class="gold">Abandoned Workshop</h4>
</div>
</div>
<p>A busted table and broken tools are thrown all across the room. You see a hammer on the floor that might be useful for crafting weapons and armor. Pick it up.</p>
<form id="mainForm" method="post" action="" name="formInput">
<input class="goldBG" type="submit" name="input1" value="get hammer" />
<input class="goldBG" type="submit" name="input1" value="get string" />
<button type="submit" name="input1" value="west">West</button>
<button type="submit" name="input1" value="northwest">Northwest</button>
</form></div>';

?>