<?php
echo '<div id="title">
<h1 class="">Light Gray <span class="hide">RPG</span></h1>
<h2 class="blue">RPG</h2>
<br><p class="">DEMO v0.2 • Last updated: 10.27.25</p>';

// Validate session username - only show this if the user is not logged in
if (!isset($_SESSION['username']) || !is_string($_SESSION['username']) || empty(trim($_SESSION['username']))) {
    echo '<p><a class="btn greenBG" href="#login">Login</a> 
    <a class="btn blueBG" href="register.php">New Character</a></p>';    
}
echo '<div class="padd2">
<span class="padd2 green big2 flip inline-block">'.file_get_contents("img/svg/npc/char-archer.svg").'</span>
<span class="padd2 red big2">'.file_get_contents("img/svg/npc/char-commander.svg").'</span>
<span class="padd2 blue big2 flip inline-block">'.file_get_contents("img/svg/npc/npc-guardian.svg").'</span>
</div>';  
include('login.php');
echo '<h3>Create New Character</h3>
<div class="inputs"><form><a href="register.php" class="login btn blueBG create-new">Create New Character</a></form></div>';
echo ' <div><span class="padd2 gold chestXXX">'.file_get_contents("img/svg/chest.svg").'</span></div>
<br/>
<h5>Welcome to the Light Gray RPG demo where you take the role of a young adventurer with amazing potential.</h5>
<br/>
<p class="purple"> You find yourself in Vega, a distant land brimming with magic and endless opportunities...</p>
<br/><br/><br/>
</div>';
// include('stickman.php');
?>