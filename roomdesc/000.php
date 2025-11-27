<?php

//------ 000 ROOM ZERO


//  if ($roomID=='000') {
      $_SESSION['dangerLVL'] = "0";
      $icon = file_get_contents("img/svg/roomzero.svg");
      //$icon = file_get_contents("img/svg/checkbox.svg");
  //}
  echo '<div class="roomBox">
<div class="roomIconTitle">
  <span class="icon roomIcon gray">'.$icon.'</span>
  	<div class="roomTitle">
<h3>Room Zero</h3>
</div>
  	</div>
<p>You are in an empty room. The walls are all gray and there are no windows or doors. The only light you see comes from a pillar in the center of the room. There is a small sign on the side of the pillar and a small piece of paper on the floor</p>
  	<form id="mainForm" method="post" action="" name="formInput">
  	<button type="submit" name="input1" value="ex sign">Ex Sign</button>
  	<button type="submit" name="input1" value="ex pillar">Ex Pillar</button>
  	<button type="submit" name="input1" value="ex light">Ex Light</button>
  	<button type="submit" name="input1" value="ex button">Ex Button</button>
  	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
  	<button class="blueBG" type="submit" name="input1" value="pick up map">Pick Up Map</button>
  	<button class="goldBG" type="submit" name="input1" value="press button">Press Button</button>
  	</form>
    </div>';
?>