<?php
// ---------------------------------------------------- 028g - Goblin Tracks
$_SESSION['dangerLVL'] = "5";
$dirN='active dgray';
$dirSE='active dgray';
$dirE='active dgray';

$icon = file_get_contents("img/svg/environment/goblin-tracks.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
<span class="icon roomIcon darkgray big2">'.$icon.'</span>
<div class="roomTitle">
<h3 class="">Goblin Tracks</h3>
</div>
</div>
<p>The bats don\'t dare fly to this part of the cave. You can put away your boomerang and use a melee weapon.</p>
<form id="mainForm" method="post" action="" name="formInput">
<button type="submit" name="input1" value="north">North</button>
<button type="submit" name="input1" value="west">East</button>
<button type="submit" name="input1" value="southeast">Southeast</button>
<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
</form></div>';


?>





