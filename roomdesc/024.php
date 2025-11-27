<?php
// ---------------------------------------------------- 024 - Jack Lumber
$_SESSION['dangerLVL'] = "0";
$dirS='active dirt';
$dirN='active forest';
$icon = file_get_contents("img/svg/jacklumber.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon forest">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="forest">Jack Lumber</h3>
    <h4 class="brown">Professional Lumberjack</h4>
</div>
    </div>
<p>A flannel wearing, hatchet wielding man has a wood workshop set up here. He runs the tree farm to the north and has a few quests available. Completing his quests will open up the Forest.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
    <button type="submit" name="input1" value="north">North</button>
  	<button type="submit" name="input1" value="south">South</button>
    <a href data-link="quests" class="btn goldBG">Quests </a>

  	</form>
  </div>';
//  	<button class="brownBG" type="submit" name="input1" value="get hatchet">Get Hatchet</button>
