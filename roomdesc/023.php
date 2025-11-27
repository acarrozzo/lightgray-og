<?php
// ---------------------------------------------------- 023 - Entrance to the Forest
$_SESSION['dangerLVL'] = "0";
$dirW='active dirt';
$dirE='active forest';
$dirN='active greenfield';
$icon = file_get_contents("img/svg/gate.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon brown">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="green">Jack\'s Forest Gate</h3>
</div>
    </div>
<p>A guard dressed in all red stands in front of the Forest Entrance. To the north you see a log cabin with a sign that reads "Free Trees".</p>
  	<form id="mainForm" method="post" action="" name="formInput">
      <button type="submit" name="input1" value="west">West</button>
    	<button type="submit" name="input1" value="north">North</button>
    	<button type="submit" name="input1" value="east">East</button>

  	</form>
  </div>';
