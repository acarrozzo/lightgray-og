<?php
// ---------------------------------------------------- 005 - Grassy Field North
$_SESSION['dangerLVL'] = "000";
$dirN='active gray';
$dirS='active greenfield';
$dirSW='active greenfield';
$dirSE='active greenfield';
$dirW='active greenfield';
$dirE='active greenfield';
    $icon = file_get_contents("img/svg/blueberry.svg");


echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon blue">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="greenfield">Grassy Field North</h3>
    <h4 class="blue">Blueberry patch</h4>
</div>
  	</div>
<p>Blueberry bushes grow in this part of the field. To the west you see a waterfall and to the east an odd tent. To the south you see the main crossroads.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
  	<button type="submit" name="input1" value="east">East</button>
  	<button type="submit" name="input1" value="south">South</button>
  	<button type="submit" name="input1" value="north">North</button>
  	<button type="submit" name="input1" value="west">West</button>
  	<button type="submit" name="input1" value="examine tent">Ex Tent</button>
  	<button class="blueBG " type="submit" name="input1" value="pick blueberry">Pick Blueberry</button>
	</form></div>';
	