<?php
// ---------------------------------------------------- 026 - Stone Path South
$_SESSION['dangerLVL'] = "0";
$dirN='active greenfield';
$dirS='active gray';
$dirSW='active gray';
$icon = file_get_contents("img/svg/environment/stone-path.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
<span class="icon roomIcon gray">'.$icon.'</span>
<div class="roomTitle">
<h3>Stone Path South</h3>
</div>
</div>
<p>On a stone path south of the grassy field.</p>
<form id="mainForm" method="post" action="" name="formInput">
<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
<button type="submit" name="input1" value="north">North</button>
<button type="submit" name="input1" value="southwest">Southwest</button>
<button type="submit" name="input1" value="south">South</button>
</form>
</div>';




