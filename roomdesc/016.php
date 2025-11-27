<?php
// ---------------------------------------------------- 016 - Abandoned Docks On the Beach
$_SESSION['dangerLVL'] = "0";
$dirS='active sand';
$dirN='active sand';
$dirW='active ocean';
$icon = file_get_contents("img/svg/beach-dock.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon sand big">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="blue">Abandoned Docks On the Beach</h3>
</div>
    </div>
<p>You stand on a worn wooden dock. A vast blue ocean is to your west.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
    <button class="blueBG" type="submit" name="input1" value="west">West</button>
    <button class="sandBG" type="submit" name="input1" value="north">North</button>
  	<button class="sandBG" type="submit" name="input1" value="south">South</button>
  	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
  	<button class="brownBG" type="submit" name="input1" value="use wooden boat">Use Wooden Boat</button>
  	</form>
  </div>';
