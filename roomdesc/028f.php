<?php
// ---------------------------------------------------- 028f - Salamander Cavern
$_SESSION['dangerLVL'] = "6";
$dirW='active dgray';
$dirS='active dgray';

$icon = file_get_contents("img/svg/environment/salamander-cavern.svg");



echo '<div class="roomBox">
<div class="roomIconTitle">
<span class="icon roomIcon darkgray big2">'.$icon.'</span>
<div class="roomTitle">
<h3 class="blue">Salamander Cavern</h3>
</div>
</div>
<p>These magical salamanders mean business. Go west for goblins or south for bats.</p>
<form id="mainForm" method="post" action="" name="formInput">
<button type="submit" name="input1" value="west">West</button>
<button type="submit" name="input1" value="south">South</button>
</form></div>';

?>




