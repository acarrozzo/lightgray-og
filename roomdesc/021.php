<?php
// ---------------------------------------------------- 21 - Pajama Shaman
$_SESSION['dangerLVL'] = "0";
$dirW='active greenfield';
$dirSW='active greenfield';
$dirS='active greenfield';
$icon = file_get_contents("img/svg/tent.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon purple">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="purple">Pajama Shaman</h3>
    <h4>Shop & Skills</h4>
</div>
    </div>
<p>A hooded man has set up a strange tent here with a makeshift shop. He is selling some basic items and also teaching some important skills.</p>
      <form id="mainForm" method="post" action="" name="formInput">
      <a href data-link="shop" class="btn goldBG">Shop </a>
    	<a href data-link2="skills" class="btn purpleBG">Skills </a>
    	<a href data-link2="spells" class="btn purpleBG">Spells </a>
      <button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
    	<button class="" type="submit" name="input1" value="west">West</button>
    	<button class="" type="submit" name="input1" value="southwest">Southwest</button>
    	<button class="" type="submit" name="input1" value="south">South</button>
  	</form>
  </div>';
