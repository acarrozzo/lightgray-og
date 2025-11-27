<?php
// ---------------------------------------------------- 028e - Bat Nest
$_SESSION['dangerLVL'] = "3";
$dirN='active dgray';
$dirNW='active dgray';
$dirNE='active dgray';
//$dirE='active dgray';
$icon = file_get_contents("img/svg/environment/bat-nest.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
<span class="icon roomIcon darkgray big2">'.$icon.'</span>
<div class="roomTitle">
<h3 class="lightgray">Bat Nest</h3>
</div>
</div>
<p>In the bat cave by the nest. Bats are flying all around the room.</p>

<form id="mainForm" method="post" action="" name="formInput">
<button type="submit" name="input1" value="northwest">Northwest</button>
<button type="submit" name="input1" value="north">North</button>
<button type="submit" name="input1" value="northeast">Northeast</button>
</form></div>';
//<input type="submit" name="input1" value="East" />
?>

