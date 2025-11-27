<?php
echo '<span class="icon gold key">'.file_get_contents("img/svg/key.svg").'</span>';
?>

<form class="login" action="" method="post">
<br/>
 <h3>New Character Sign Up</h3>
 <br/>
  <div class="inputs">
 <p class="lft hide">New Username: </p>
 <input class="whiteBG ddgray inset" type="text" name="username" placeholder="username" maxlength="60">
 <p class="lft hide">Password:</p>
<input class="whiteBG ddgray inset" type="password" name="pass" placeholder="password" maxlength="10">
 <p class="lft hide">Confirm Password:</p>
 <input class="whiteBG ddgray inset" type="password" name="pass2" placeholder="confirm password" maxlength="10">
</div>
<br/>


<!--
 <h3>Select Your Class</h3>

 <div class="class-select">
    <label>
        <input type="radio" id="scout" name="characterclass" value="scout"> 
        <span><h6>Scout</h6>
        <p>A Jack of all Trades. +10% to all stats [STR, DEX, MAG, DEF].</p></span>
    </label>
    <label>
        <input type="radio" id="warrior" name="characterclass" value="warrior"> 
        <span><h6>Warrior</h6>
        <p>50% more damage with Melee Weapons [STR]. 50% more Defense.</p></span>
    </label>
    <label>
        <input type="radio" id="barbarian" name="characterclass" value="barbarian"> 
        <span><h6>Barbarian</h6>
        <p>Double damage with Melee Weapons but Magic power is cut in half.</p></span>
    </label>
    <label>
        <input type="radio" id="ranger" name="characterclass" value="ranger"> 
        <span><h6>Ranger</h6>
        <p>50% more damage with Ranged Weapons [DEX]. 50% more Defense.</p></span>
    </label>
    <label>
        <input type="radio" id="sorcerer" name="characterclass" value="sorcerer"> 
        <span><h6>Sorcerer</h6>
        <p>+50% Magic. -50% Defense.</p></span>
    </label>
    <label>
        <input type="radio" id="battlemage" name="characterclass" value="battlemage"> 
        <span><h6>Battlemage</h6>
        <p>+25% Strength, +25% Magic</p></span>
    </label>
  </div>
<br/>
-->

<div class="inputs">
    <input class="btn login blueBG" type="submit" name="submit" value="Register">
</div>
</form>

<a class="btn" href="index.php">Return Home</a>
