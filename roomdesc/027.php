<?php
// ---------------------------------------------------- 027 - Entrance to the Rocky Flats
$_SESSION['dangerLVL'] = "0";
$dirN='active gray';
$dirS='active gray';
$dirW='active gray';
//$icon = file_get_contents("img/svg/environment/gate2.svg");
$icon = file_get_contents("img/svg/environment/dwarf-guard-gate.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
<span class="icon roomIcon lightgray">'.$icon.'</span>
<div class="roomTitle">
<h4 class="gray">Gate to the</h4>
<h3>Rocky Flats</h3>
</div>
</div>
<p>An armored dwarf guards the path to the Rocky Flats and the Mining Village. You see the bat cave to the west.</p>
<form id="mainForm" method="post" action="" name="formInput">
<button type="submit" name="input1" value="north">North</button>
<button type="submit" name="input1" value="south">South</button>
<button type="submit" name="input1" value="west">West</button>
</form>
</div>';

?>