<?php

// ---------------------------------------------------- 003c - Young Soldier | Weapons Training Area

$_SESSION['dangerLVL'] = "000";
$dirE='active greenfield';
$icon = file_get_contents("img/svg/trainingarea.svg");

  echo '<div class="roomBox">
<div class="roomIconTitle">
      <span class="icon roomIcon blue">'.$icon.'</span>
    	<div class="roomTitle">
<h3 class="blue">Young Soldier</h3>
    	<h4>Weapons Training</h4>
</div>
    	</div>
<p>The training grounds are located on a cliff overlooking the ocean. Racks of weapons and armor stand ready for use, and a young soldier is here to guide you through your training. The breeze carries the fresh, salty sea air throughout the area. </p>
      <form id="mainForm" method="post" action="" name="formInput">
    	<a href data-link="quests" class="btn goldBG">Quests</a>
      <a href data-link2="skills" class="btn purpleBG">Skills</a>
      <a href data-link="inv" class="btn greenBG">Inventory</a>
    	<button class="blueBG" type="submit" name="input1" value="pick up weapons">Pick Up Weapons</button>
      <button class="redBG" type="submit" name="input1" value="attack dummy">Attack Dummy</button>
    	<button type="submit" name="input1" value="east">East</button>

  	</form>
    </div>';
