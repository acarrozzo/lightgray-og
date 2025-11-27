<?php
// ---------------------------------------------------- 003bb - Destroyed Basement

$_SESSION['dangerLVL'] = "3";
$dirE='active dirt';
$icon = file_get_contents("img/svg/basement2.svg");

//A destroyed water-logged basement. Rat crap is everywhere. You can rest in between battles to restore lost hit points.

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon brown">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="brown">Destroyed Basement</h3>
</div>
    </div>
<p>    The basement is completely destroyed and waterlogged. There is rat crap everywhere. In between battles, you can rest to regain lost hit points or search the rubble for anything that may be useful. </p>
    <form id="mainForm" method="post" action="" name="formInput">
    <button type="submit" name="input1" value="east">East</button>
    <button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
    <button class="redBG" type="submit" name="input1" value="attack">Attack</button>
	</form></div>';
