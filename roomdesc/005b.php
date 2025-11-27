<?php
// ---------------------------------------------------- 005b - Secret Arena
$_SESSION['dangerLVL'] = "X";
$dirU='active greenfield';
// $icon = file_get_contents("img/svg/monster1.svg");
$icon = file_get_contents("img/svg/enemy/volphina.svg");


echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon purple">'.$icon.'</span>
    <div class="roomTitle">
<h3 class="white">Secret Arena</h3>
    <h4 class="gold"> Hope you\'re having a good time. </h4>
</div>
  	</div>
<p>In a top secret fighting area. so cool. Here the developer can conjure up any enemy he wishes for battle testing. And what does this place look like? Whatever you want, use your imagination.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
	</form></div>';
