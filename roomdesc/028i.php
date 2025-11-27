<?php
// ---------------------------------------------------- 028i - Goblin Chief Hideout
$_SESSION['dangerLVL'] = "10";
$dirS='active dgray';


$icon = file_get_contents("img/svg/environment/goblin-hideout.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
<span class="icon roomIcon darkgray big2">'.$icon.'</span>
<div class="roomTitle">
<h3 class="gold">Goblin Chief Hideout</h3>
</div>
</div>
<p>You find yourself in the Secret Goblin Hideout. The Goblin Chief lives here.</p>
<form id="mainForm" method="post" action="" name="formInput">
<button type="submit" name="input1" value="south">South</button>
</form></div>';
?>



