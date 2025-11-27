<?php
// ---------------------------------------------------- 012h - Scorpion Throne Room
$_SESSION['dangerLVL'] = "30";
$dirS='active redbrown';
$icon = file_get_contents("img/svg/scorpion8.svg");


//<p>You stand in an enormous throne room. Very few travelers have reached. The King of all Scorpions calls this place home. There is a chest here.</p>


echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon big3 redbrown">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="redbrown">Scorpion Throne Room</h3>
</div>
    </div>
<p>You stand in an enormous throne room, a place few travelers have ever reached. This is the home of the King of All Scorpions. A weathered chest sits nearby.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
  	<button type="submit" name="input1" value="south">South</button>
  	<button class="darkestgrayBG" type="submit" name="input1" value="open chest">Open Chest</button>
  	<button class="ddgrayBG" type="submit" name="input1" value="get pickaxe">Get Pickaxe</button>
	</form>
  </div>';
