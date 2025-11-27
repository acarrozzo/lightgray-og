<?php
// ---------------------------------------------------- 028b - Bat Cave Exit
$_SESSION['dangerLVL'] = "2";
$dirE='active dgray';
$dirU='active gold';
//$icon = file_get_contents("img/svg/enemy/bat.svg");
//$icon = file_get_contents("img/svg/environment/bat-cave-abandoned-workshop.svg");
$icon = file_get_contents("img/svg/environment/bat-cave-exit.svg");
    
echo '<div class="roomBox">
<div class="roomIconTitle">
<span class="icon roomIcon darkgray big2">'.$icon.'</span>
<div class="roomTitle">
<h3 class="lightgray">Bat Cave</h3>
<h4 class="gold">Exit</h4>
</div>
</div>
<p>A way out of the bat cave. To leave go up. To continue deeper into the bat cave go east.</p>
<form id="mainForm" method="post" action="" name="formInput">
<button class="goldBG" type="submit" name="input1" value="up">Up</button>
<button type="submit" name="input1" value="east">East</button>
</form></div>';

//	<input class="goldBG" type="submit" name="input1" value="pick up map" />
//<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>


?>