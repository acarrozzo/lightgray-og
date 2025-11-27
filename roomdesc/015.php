<?php
// ---------------------------------------------------- 015 - On the Beach
$_SESSION['dangerLVL'] = "0";
$dirS='active sand';
$icon = file_get_contents("img/svg/beach-rock.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon big sand">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="blue">On the Beach by a Giant Rock</h3>
</div>
    </div>
<p>The Sun is directly overhead and there is a cool breeze. You can mine stone from the giant rocks here.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
  	<button class="sandBG" type="submit" name="input1" value="south">South</button>
  	<button class="dgrayBG" type="submit" name="input1" value="mine stone">Mine Rock</button>
  	</form>
  </div>';
