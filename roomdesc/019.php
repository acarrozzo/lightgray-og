<?php
// ---------------------------------------------------- 019 - Sand Crab Nest
$_SESSION['dangerLVL'] = "3";
$dirN='active sand';
$icon = file_get_contents("img/svg/beach-crabs.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon sand big">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="blue">Sand Crab Nest</h3>
</div>
      </div>
<p>This part of the beach is swarming with Sand Crabs. They just won\'t stop! Teleport to the Grassy Field to escape here.</p><form id="mainForm" method="post" action="" name="formInput">
      <button class="greenBG" type="submit" name="input1" value="grassy field">Teleport to Grassy Field</button>
      <button class="sandBG" type="submit" name="input1" value="north">North</button>
    	<button class="redBG" type="submit" name="input1" value="attack">Attack</button>
  	</form>
  </div>';
