<?php
// ---------------------------------------------------- 028d - Bat Cave
$_SESSION['dangerLVL'] = "2";
$dirSW='active dgray';
$dirSE='active dgray';
$icon = file_get_contents("img/svg/environment/bat-cave.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
<span class="icon roomIcon darkgray big2">'.$icon.'</span>
<div class="roomTitle">
<h3>Bat Cave</h3>
</div>
</div>
<p>In the bat cave.</p>
<form id="mainForm" method="post" action="" name="formInput">
<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
<button type="submit" name="input1" value="southwest">Southwest</button>
<button type="submit" name="input1" value="southeast">Southeast</button>
</form></div>';
?>