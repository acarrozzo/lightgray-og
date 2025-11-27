<?php
// ---------------------------------------------------- 028 - Bat Cave Entrance
$_SESSION['dangerLVL'] = "0";
$dirNE='active gray';
$dirE='active gray';
$dirD='active gold';
$icon = file_get_contents("img/svg/environment/bat-cave-entrance.svg");


echo '<div class="roomBox">
<div class="roomIconTitle">
<span class="icon roomIcon lgray">'.$icon.'</span>
<div class="roomTitle">
<h3 class="lightgray">Bat Cave</h3>
<h4 class="gold">Entrance</h4>
</div>
</div>
<p>The bat cave\'s concealed entrance is hidden beneath some jagged rock formations. Go below to enter the cave. There is a sign here warning of the dangerous creatures within.</p>
<form id="mainForm" method="post" action="" name="formInput">
<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
<button type="submit" name="input1" value="northeast">Northeast</button>
<input type="submit" name="input1" value="East" />
<input type="submit" name="input1" class="goldBG" value="down" />
</form></div>';
?>
