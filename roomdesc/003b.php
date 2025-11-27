<?php

// ----------------------------------------------------   // ---------------------------------------------------- 003b - Cabin Basement


$_SESSION['dangerLVL'] = "1";
$dirW='active dirt';
$dirU='active greenfield';
$icon = file_get_contents("img/svg/basement.svg");
//    A water-logged basement. It\'s very messy and smelly. You can attack rats here. Go back up to return to the cabin.
echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon brown">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="brown">Cabin Basement</h3>
</div>
    </div>
<p>The basement is waterlogged and dirty, with a putrid smell that permeates the air. There are rats here that can be attacked. To return to the cabin above, simply go back up the stairs. </p>
    <form id="mainForm" method="post" action="" name="formInput">
    <button type="submit" name="input1" value="west">West</button>
    <button class="goldBG" type="submit" name="input1" value="up">Up</button>
    <button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
    <button class="redBG" type="submit" name="input1" value="attack">Attack</button>
	</form></div>';
