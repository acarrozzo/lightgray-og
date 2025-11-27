<?php




// ---------------------------------------------------- 102 - Forest Path near a Cow Farm
if ($roomID=='102') {
    $_SESSION['dangerLVL'] = "2";
    $dirNW='active green';
    $dirN='active brown';
    $dirE='active green';
}
$_SESSION['desc102'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-grass"></i></div>
	<div class="roomTitle">
<h3 class="green">Forest Path near a Cow Farm</h3>
</div>
</div>
	<p>The path runs northwest to east here. Head north to visit Freddie's Cow Farm.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 103 - Freddie's Cow Farm & Leather Factory
if ($roomID=='103') {
    $_SESSION['dangerLVL'] = "0";
    $dirN='active green';
    $dirS='active green';
}
$icon = file_get_contents("img/svg/npc/npc-freddie.svg");
//	<div class="roomIcon gold"><i class="ra ra-player"></i></div>

$_SESSION['desc103'] = <<<HTML
<html><div class="roomBox">
	<div class="roomIconTitle"> 
		<span class="icon brown big2">$icon</span>
		<div class="roomTitle">
		<h3 class="brown">Freddie's Cow Farm</h3>
		</div>
	</div>
	<p>You want some leather? Freddie's got you covered.</p>
	<a href data-link="quests" class="btn greenBG">Freddie's Quest</a>
	<form id="mainForm" method="post" action="" name="formInput">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	<input class="blueBG" type="submit" name="input1" value="get hammer" />
	<input class="goldBG" type="submit" name="input1" value="pay toll" />
	</form>
	</div></html>
HTML;






// ---------------------------------------------------- 103b - Cows
if ($roomID=='103b') {
    $_SESSION['dangerLVL'] = "4";
    $dirW='active green';
    $dirS='active brown';
}
$_SESSION['desc103b'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon brown"><i class="icon-cow"></i></div>
	<div class="roomTitle">
<h3 class="brown">Cows</h3>
</div>
</div>
	<p>Some cows</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="south">South</button>

	<input class="redBG" type="submit" name="input1" value="attack cow" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 103c - More Cows
if ($roomID=='103c') {
    $_SESSION['dangerLVL'] = "4";
    $dirE='active green';
}
$_SESSION['desc103c'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon brown"><i class="icon-cow"></i></div>
	<div class="roomTitle">
<h3 class="brown">More Cows</h3>
</div>
</div>
	<p>Even more cows. There is also a pile of wood here.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="east">East</button>
	<input class="brownBG" type="submit" name="input1" value="get wood" />
	<input class="redBG" type="submit" name="input1" value="attack cow" />
  <a href data-link2="craft" class="goldBG btn">Open Crafting Menu </a>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 104 - On a Stone Path by a Forest Gate
if ($roomID=='104') {
    $_SESSION['dangerLVL'] = "2";
    $dirN='active ';
    $dirNE='active dgreen';
    $dirW='active green';
    $dirS='active ';
}
$_SESSION['desc104'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon brown"><i class="ra ra-wooden-sign"></i></div>
	<div class="roomTitle">
<h3 class="green">On a Stone Path by a Forest Gate</h3>
</div>
</div>
	<p>A stone path runs north to south here. Head west to return back to the Grassy Field and northeast to enter the Forest. There is a sign here.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="south">South</button>

	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	<input class="goldBG" type="submit" name="input1" value="pick up map" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 105 - Traveling Wizard - Basic Spells
if ($roomID=='105') {
    $_SESSION['dangerLVL'] = "2";
    $dirN='active ';
    $dirS='active ';
}
$_SESSION['desc105'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon purple"><i class="icon-wizard"></i></div>
	<div class="roomTitle">
<h3 class="purple">Traveling Wizard</h3>
</div>
</div><h4>Basic Spells</h4>
	<p>A sleek looking wizard is resting here.</p>
	<a href data-link2="spells" class="btn purpleBG">Spells </a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 106 - Traveling Warrior - Warrior Skills
if ($roomID=='106') {
    $_SESSION['dangerLVL'] = "2";
    $dirN='active ';
    $dirS='active ';
}
$_SESSION['desc106'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkblue"><i class="ra ra-muscle-up"></i></div>
	<div class="roomTitle">
<h3 class="darkblue">Traveling Warrior</h3>
</div>
</div><h4>Warrior Skills</h4>
	<p>A war weathered warrior is temporarily set up here teaching some fighting skills</p>
	<a href data-link2="skills" class="btn purpleBG">Skills </a>

	<p>A SLICE attack will increase the damage you do with One-handed weapons, and SMASH will increase Two-handed damage.</p>

	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 107 - On a Stone Path by a Hill
if ($roomID=='107') {
    $_SESSION['dangerLVL'] = "2";
    $dirN='active ';
    $dirW='active dirt';
    $dirS='active ';
}
$_SESSION['desc107'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon "><i class="icon-village"></i></div>
	<div class="roomTitle">
<h3>On a Stone Path by a Hill</h3>
</div>
</div>
	<p>2 Red Guards stand here. To the north you see the traveling warrior and to the west a dirt path.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>

	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 108 - Dirt Path behind a Hill
if ($roomID=='108') {
    $_SESSION['dangerLVL'] = "2";
    $dirNW='active dirt';
    $dirE='active ';
}
$_SESSION['desc108'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon dirt"><i class="icon-hill"></i></div>
	<div class="roomTitle">
<h3 class="dirt">Dirt Path behind a Hill</h3>
</div>
</div>
	<p>The dirt path leads northwest. The Red Town Gate is east of here.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 109 - Behind a Hill by a Cave
if ($roomID=='109') {
    $_SESSION['dangerLVL'] = "2";
    $dirN='active dirt';
    $dirE='active darkgray';
    $dirSE='active dirt';
}
$_SESSION['desc109'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon dirt"><i class="icon-hill"></i></div>
	<div class="roomTitle">
<h3 class="dirt">Behind a Hill by a Cave</h3>
</div>
</div>
	<p>You are on a dirt path. You see a cave entrance to the east.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 110 - Behind a Hill
if ($roomID=='110') {
    $_SESSION['dangerLVL'] = "10";
    $dirS='active dirt';
}
$_SESSION['desc110'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon dirt"><i class="icon-hillogre"></i></div>
	<div class="roomTitle">
<h3 class="dirt">Behind a Hill</h3>
</div>
</div>
	<p>At a dead end on a dirt path.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 111 - Ogre Lair
// ---------------------------------------------------- 111 - Ogre Lair
// ---------------------------------------------------- 111 - Ogre Lair
if ($roomID=='111') {
    $_SESSION['dangerLVL'] = "000";
    $dirW='active dirt';
    $dirD='active gold';
}
$_SESSION['desc111'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon"><i class="icon-cave"></i></div>
	<div class="roomTitle">
<h3 class="">Ogre Lair Entrance</h3>
</div>
</div>
	<p>A cave entrance leads underground. There is a sign here.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<input class="goldBG" type="submit" name="input1" value="down" />
	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 111a - Ogre Lair Exit
if ($roomID=='111a') {
    $_SESSION['dangerLVL'] = "4";
    $dirW='active dgray';
    $dirS='active dgray';
    $dirSW='active dgray';
    $dirE='active dgray';
    $dirU='active gold';
}
$_SESSION['desc111a'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon"><i class="fa fa-level-up"></i></div>
	<div class="roomTitle">
<h3>Ogre Lair <span class="gold">Exit</span></h3>
</div>
</div>
	<p>An exit in the cave. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="east">East</button>
	<input class="goldBG" type="submit" name="input1" value="up" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 111b - Goblin Tent
if ($roomID=='111b') {
    $_SESSION['dangerLVL'] = "5";
    $dirE='active dgray';
    $dirSE='active dgray';
}
$_SESSION['desc111b'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Goblin Tent</h3>
</div>
</div>
	<p>A ratty tent is set up with a rat cooking over a fire. Goblin tracks run all across the dirt floor.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 111c - Rat's Nest
if ($roomID=='111c') {
    $_SESSION['dangerLVL'] = "2";
    $dirNE='active dgray';
}
$_SESSION['desc111c'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Rat's Nest</h3>
</div>
</div>
	<p>A filthy rat's nest. If you need some meat you can hunt here, otherwise get out because it stinks.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northeast">Northeast</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 111d - Hob Goblin Tent
if ($roomID=='111d') {
    $_SESSION['dangerLVL'] = "6";
    $dirNW='active dgray';
    $dirN='active dgray';
}
$_SESSION['desc111d'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Hob Goblin Tent</h3>
</div>
</div>
	<p>A sturdy tent is set up here with assorted bows and arrows hanging from weapon racks. The goblins that live here seem a little more intelligent than the normal ones.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="north">North</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 111e - Ogre Path
if ($roomID=='111e') {
    $_SESSION['dangerLVL'] = "7";
    $dirW='active dgray';
    $dirSE='active dgray';
}
$_SESSION['desc111e'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Ogre Path</h3>
</div>
</div>
	<p>You are on a wide path through the Ogre Lair. You see a map on the floor.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>

	<input class="goldBG" type="submit" name="input1" value="pick up map" /></form>
</div></html>
HTML;
// ---------------------------------------------------- 111f - Orc Den
if ($roomID=='111f') {
    $_SESSION['dangerLVL'] = "7";
    $dirNW='active dgray';
    $dirN='active dgray';
}
$_SESSION['desc111f'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Orc Den</h3>
</div>
</div>
	<p>Violent crossbow wielding orcs live here.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="north">North</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 111g - Ogre Yard
if ($roomID=='111g') {
    $_SESSION['dangerLVL'] = "8";
    $dirE='active dgray';
    $dirS='active dgray';
}
$_SESSION['desc111g'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Ogre Yard</h3>
</div>
</div>
	<p>At a large clearing in the cave.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="east">East</button>

	<input class="goldBG" type="submit" name="input1" value="search" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 111h - Ogre Treasure Room
if ($roomID=='111h') {
    $_SESSION['dangerLVL'] = "8";
    $dirSE='active dgray';
}
$_SESSION['desc111h'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Ogre Treasure Room</h3>
</div>
</div>
	<p>You see a black treasure chest in the center of this secret room.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southeast">Southeast</button>
	<input type="submit" name="input1" value="open chest" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 111i - Ogre Guard Room
if ($roomID=='111i') {
    $_SESSION['dangerLVL'] = "9";
    $dirE='active dgray';
    $dirW='active dgray';
}
$_SESSION['desc111i'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-knight-helmet"></i></div>
	<div class="roomTitle">
<h3>Ogre <span class="green">Guard</span> Room</h3>
</div>
</div>
	<p>Several guard posts line the eastern wall of the room. Impressive looking weapons hang on the wall.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 111j - Ogress Fire Altar
if ($roomID=='111j') {
    $_SESSION['dangerLVL'] = "10";
    $dirW='active dgray';
    $dirS='active dgray';
}
$_SESSION['desc111j'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="ra ra-burning-embers"></i></div>
	<div class="roomTitle">
<h3>Ogress <span class="red">Fire</span> Altar</h3>
</div>
</div>
	<p>A pillar stands in the center of the room with a large flame shooting out. You hear grunts and chanting from within the shadows.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 111k - Ogre Lieutenant Quarters
if ($roomID=='111k') {
    $_SESSION['dangerLVL'] = "13";
    $dirN='active dgray';
}
$_SESSION['desc111k'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon blue"><i class="ra ra-helmet"></i></div>
	<div class="roomTitle">
<h3>Ogre <span class="blue">Lieutenant</span> Quarters</h3>
</div>
</div>
	<p>The room here is dark and the floor is splattered with blood and goblin carcasses.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 112 - On a Stone Path
if ($roomID=='112') {
    $_SESSION['dangerLVL'] = "2";
    $dirN='active';
    $dirS='active';
}
$_SESSION['desc112'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
<div class="roomTitle">
<h3>On a Stone Path</h3>
</div>
</div>
	<p>You continue on the path.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 113 - On a Stone Path
if ($roomID=='113') {
    $_SESSION['dangerLVL'] = "2";
    $dirN='active';
    $dirS='active';
}
$_SESSION['desc113'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3>On a Stone Path</h3>
</div>
</div>
	<p>You continue on the path.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 114 - On a Stone Path by a Magical Gate
if ($roomID=='114') {
    $_SESSION['dangerLVL'] = "2";
    $dirN='active ';
    $dirSW='active dgray';
    $dirS='active';
}
$_SESSION['desc114'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
<div class="roomTitle">
<h3>On a Stone Path by a Magical Gate</h3>
</div>
</div>
	<p>A Red Guard stands watch at this magical glowing gate. To the southwest you see a cave entrance.</p>
	<p>To go north you must be a member of the Wizard's Guild</p>
	<p>To join the Wizard's Guild you must defeat the Kobold Master found in the cave to the southwest.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 115 - Kobold Lair Entrance
if ($roomID=='115') {
    $_SESSION['dangerLVL'] = "0";
    $dirNE='active ';
    $dirD='active gold';
}
$_SESSION['desc115'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon dirt"><i class="icon-cave"></i></div>
	<div class="roomTitle">
<h3 class="dirt">Kobold Lair Entrance</h3>
</div>
</div>
	<p>The cave entrance below is dark. There is a sign here. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<input class="goldBG" type="submit" name="input1" value="down" />
	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 115a - Kobold Lair Exit
if ($roomID=='115a') {
    $_SESSION['dangerLVL'] = "5";
    $dirW='active dirt';
    $dirE='active dirt';
    $dirU='active gold';
}
$_SESSION['desc115a'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon "><i class="fa fa-level-up"></i></div>
	<div class="roomTitle">
<h3 class="">Kobold Lair <span class="gold">EXIT</span></h3>
</div>
</div>
	<p>At an exit in the Kobold Cave. Head up to safety. </p>
	<form id="mainForm" method="post" action="" name="formInput">
	<input class="goldBG" type="submit" name="input1" value="up" />
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></html>
HTML;
// ---------------------------------------------------- 115b - Kobold Dead End
if ($roomID=='115b') {
    $_SESSION['dangerLVL'] = "7";
    $dirE='active dirt';
}
$_SESSION['desc115b'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="">Kobold Dead End</h3>
</div>
</div>
	<p>At a Dead End in the Kobold Lair. You see marks in the ceiling and walls that might indicate flying creatures. Have your boomerang, bow or crossbow ready on standby.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 115c - Kobold Twisted Path
if ($roomID=='115c') {
    $_SESSION['dangerLVL'] = "7";
    $dirW='active dirt';
    $dirNW='active dirt';
    $dirSE='active dirt';
}
$_SESSION['desc115c'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="">Kobold Twisted Path</h3>
</div>
</div>
	<p>The main path continues southeast. You hear chanting and drumming coming from the northwest.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 115d - Kobold Temple
if ($roomID=='115d') {
    $_SESSION['dangerLVL'] = "8";
    $dirS='active dirt';
    $dirSE='active dirt';
}
$_SESSION['desc115d'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="">Kobold <span class="green">Temple</span></h3>
</div>
</div>
	<p>An altar made out of bone stands in the center of the temple. It appears the kobolds sacrifice rats and other animals here.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 115e - Kobold Bloody Path
if ($roomID=='115e') {
    $_SESSION['dangerLVL'] = "8";
    $dirNW='active dirt';
    $dirE='active dirt';
    $dirSE='active dirt';
    $dirW='active dirt';
}
$_SESSION['desc115e'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="">Kobold Bloody Path</h3>
</div>
</div>
	<p>The path here is bloodier than usual. You hear a lot of grumbling and squealing to the east.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 115f - Kobold Hidden Chamber
if ($roomID=='115f') {
    $_SESSION['dangerLVL'] = "4";
    $dirE='active dirt';
}
$_SESSION['desc115f'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="">Kobold <span class="gold">Hidden</span> Chamber</h3>
</div>
</div>
	<p>A secret room in the lair. A gray chest sits against the far wall.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="east">East</button>
	<input class="darkgrayBG" type="submit" name="input1" value="open chest" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 115g - Dark Courtyard
if ($roomID=='115g') {
    $_SESSION['dangerLVL'] = "8";
    $dirW='active dirt';
    $dirS='active dirt';
    $dirSE='active dirt';
    $dirE='active dirt';
}
$_SESSION['desc115g'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="">Kobold <span class="redbrown">Dark</span> Courtyard</h3>
</div>
</div>
	<p>In a large dark room. You hear many noises coming from the shadows.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 115h - Kobold Control Room
if ($roomID=='115h') {
    $_SESSION['dangerLVL'] = "9";
    $dirNW='active dirt';
    $dirN='active dirt';
    $dirNE='active dirt';
    $dirE='active dirt';
}
$_SESSION['desc115h'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="">Kobold <span class="redbrown">Control</span> Room</h3>
</div>
</div>
	<p>A dark corner of the Kobold Courtyard. You hear many noises coming from the shadows. A lever is mounted to the wall here. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="east">East</button>

	<input class="goldBG" type="submit" name="input1" value="flip lever" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 115i - Magic Altar
if ($roomID=='115i') {
    $_SESSION['dangerLVL'] = "9";
    $dirW='active dirt';
    $dirNW='active dirt';
    $dirN='active dirt';
}
$_SESSION['desc115i'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="">Kobold <span class="blue">Magic</span> Altar</h3>
</div>
</div>
	<p>A Glowing Magical Altar stands in this corner of the Courtyard. Warlocks can be heard chanting in the shadows.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="north">North</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 115j - Champion Arena
if ($roomID=='115j') {
    $_SESSION['dangerLVL'] = "10";
    $dirW='active dirt';
    $dirN='active redbrown';
    $dirS='active dirt';
    $dirSW='active dirt';
}
$_SESSION['desc115j'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3 class="">Kobold <span class="redbrown">Champion</span> Arena</h3>
</div>
</div>
	<p>The floor here is paved flat. You see huge bloody footprints and pieces of weaker kobolds all over the floor.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 115k - Kobold Master Chambers
if ($roomID=='115k') {
    $_SESSION['dangerLVL'] = "13";
    $dirS='active dirt';
}
$_SESSION['desc115k'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon blue"><i class="ra ra-hood"></i></div>
	<div class="roomTitle">
<h3>Kobold <span class="blue">Master</span> Chambers</h3>
</div>
</div>
	<p>The room here is oddly clean. There are lit candles everywhere and unique weapons are mounted on the walls. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;


// ------------------------------------------------------------------- IN THE FOREST
// ------------------------------------------------------------------- IN THE FOREST
// ------------------------------------------------------------------- IN THE FOREST

// ---------------------------------------------------- 116
if ($roomID=='116') {
    $_SESSION['dangerLVL'] = "7";
    $dirN='active dgreen';
    $dirNE='active dgreen';
    $dirE='active dgreen';
    $dirSE='active dgreen';
    $dirSW='active green';
}
$_SESSION['desc116'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="green">Forest <span class="gold">Entrance</span></h3>
</div>
</div>
	<p>A way out of the forest. Go southwest to return to the stone path. Go any other direction to venture deeper into the forest.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>

	<button class="brownBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 117
if ($roomID=='117') {
    $_SESSION['dangerLVL'] = "7";
    $dirN='active dgreen';
    $dirE='active dgreen';
    $dirS='active dgreen';
}
$_SESSION['desc117'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="green">Under a Massive Tree in the Forest</h3>
</div>
</div>
	<p>An enormous tree and its canopy encompass all you see overhead. You see some animal skins scattered on the ground.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="east">East</button>
	<button class="brownBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
	<input class="goldBG brownBG" type="submit" name="input1" value="get leather" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 118
if ($roomID=='118') {
    $_SESSION['dangerLVL'] = "0";
    $dirW='active ';
    $dirNE='active dgreen';
    $dirE='active dgreen';
    $dirSE='active dgreen';
    $dirS='active dgreen';
}
$_SESSION['desc118'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon forest"></div>
	<div class="roomTitle">
<h3 class="forest">Hunter Bill </h3>
<h4 class="brown">Hunter Skills</h4>
</div>
</div>
	<p>You see Bill crafting some arrows while tending to a fire. You can rest up here or learn some new hunting skills. He also has some quests available.</p>


	<form id="mainForm" method="post" action="" name="formInput">
    <a href data-link2="skills" class="btn purpleBG">Skills </a>
    <a href data-link="quests" class="btn goldBG">Quests </a>
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northeast">NE</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="southeast">SE</button>
	<button type="submit" name="input1" value="south">South</button>

	<input class="greenBG" type="submit" name="input1" value="rest" />
	</form>
</div></html>
HTML;


// ---------------------------------------------------- 119
if ($roomID=='119') {
    $_SESSION['dangerLVL'] = "7";
    $dirSW='active dgreen';
    $dirS='active dgreen';
}
$_SESSION['desc119'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon gold"><i class="icon-chest"></i></div>
	<div class="roomTitle">
<h3 class="green">In the Forest by a Gold Chest</h3>
</div>
</div>
	<p>A river is running through the area here and you see a campfire to the southwest. A large, shiny golden chest sits in the grass. There is a sign here.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="south">South</button>

	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	<button class="brownBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
	<input class="goldBG"type="submit" name="input1" value="open chest" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 120
if ($roomID=='120') {
    $_SESSION['dangerLVL'] = "7";
    $dirW='active dgreen';
    $dirN='active dgreen';
    $dirS='active dgreen';
}
$_SESSION['desc120'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="green">In the Forest by a River</h3>
</div>
</div>
	<p>A river runs south here. to the west you see a campfire and to the south you see a glowing teleport. A gold chest can be seen to the north. You see a shiny green ring on the ground.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>

	<button class="brownBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
	<input class="goldBG" type="submit" name="input1" value="grab ring" />
	<input class="redBG" type="submit" name="input1" value="pick redberry" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 121
if ($roomID=='121') {
    $_SESSION['dangerLVL'] = "7";
    $dirNW='active dgreen';
    $dirN='active dgreen';
    $dirE='active dgreen';
    $dirW='active dgreen';
    $dirSW='active dgreen';
    $dirS='active dgreen';
    $dirSE='active dgreen';
}
$_SESSION['desc121'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="green">Forest Clearing</h3>
</div>
</div>
	<p>Paths go off in all directions. There is a directory here.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>

	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 122
if ($roomID=='122') {
    $_SESSION['dangerLVL'] = "7";
    $dirN='active dgreen';
    $dirW='active dgreen';
    $dirS='active dgreen';
}
$_SESSION['desc122'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="green">In the Forest by a Fork in the Road</h3>
</div>
</div>
	<p>You are on the main path that connects the north part of the Forest with the south. The Forest exit is to the west.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>

	<button class="brownBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 123
if ($roomID=='123') {
    $_SESSION['dangerLVL'] = "7";
    $dirNW='active dgreen';
    $dirN='active dgreen';
    $dirS='active dgreen';
    $dirSE='active dgreen';
}
$_SESSION['desc123'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="green">In the Forest on a Beaten Path</h3>
</div>
</div>
	<p>You are on a worn Forest Path. You see a Red Tower peeking through the tree tops to the south and a graveyard to the southeast. Head northwest to exit the Forest.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>

	<button class="brownBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 124
if ($roomID=='124') {
    $_SESSION['dangerLVL'] = "7";
    $dirN='active dgreen';
    $dirE='active dgreen';
    $dirS='active red';
}
$_SESSION['desc124'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="green">In the Forest by a Red Guard Tower</h3>
</div>
</div>
	<p>Red Town lies to the south and a small graveyard to the east. Most of the Forest lies to your north. You see a bundle of arrows resting against the tower.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="east">East</button>

	<button class="brownBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
	<input class="goldBG" type="submit" name="input1" value="grab arrows" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 125
if ($roomID=='125') {
    $_SESSION['dangerLVL'] = "7";
    $dirNW='active dgreen';
    $dirE='active dgreen';
    $dirW='active dgreen';
    $dirNE='active dgreen';
}
$_SESSION['desc125'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="green">In the Forest by a Small Graveyard</h3>
</div>
</div>
	<p>A handful of makeshift gravestones are placed here. This area of the Forest seems darker than the rest. There are some redberry bushes scattered around.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="east">East</button>

	<button class="brownBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
	<input class="redBG" type="submit" name="input1" value="pick redberry" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 126
if ($roomID=='126') {
    $_SESSION['dangerLVL'] = "7";
    $dirNW='active dgreen';
    $dirN='active dgreen';
    $dirW='active dgreen';
    $dirS='active dgreen';
}
$_SESSION['desc126'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="green">In the Forest by a Cliff</h3>
</div>
</div>
	<p>You can walk to the edge of this cliff and overlook a vast desert to your east. To the north you see a very dense area of the Forest.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>

	<button class="brownBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 127
if ($roomID=='127') {
    $_SESSION['dangerLVL'] = "7";
    $dirSW='active dgreen';
    $dirW='active dgreen';
    $dirS='active dgreen';
}
$_SESSION['desc127'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="green">In the Forest Surrounded by Trees</h3>
</div>
</div>
	<p>So many trees here. To the southwest you see a small graveyard and to the west you see a tree hut.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="south">South</button>

	<button class="brownBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
	<input class="goldBG" type="submit" name="input1" value="search" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 128
if ($roomID=='128') {
    $_SESSION['dangerLVL'] = "0";
    $dirE='active dgreen';
    $dirSE='active dgreen';
}
$_SESSION['desc128'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-pine-tree"></i></div>
	<div class="roomIcon brown"><i class="fa fa-home"></i></div>
	<div class="roomTitle">
<h3 class="green">Forest Gnome</h3>
</div>
</div>
	<h4 class="brown">Tree Hut</h4>
	<p>A tiny gnome has a cozy tree hut set up here. He has a set of quests available for you and a free hatchet if you need one.</p>
	<a href data-link="quests" class="btn goldBG">Quests </a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southeast">Southeast</button>
	<button type="submit" name="input1" value="east">East</button>

	<input type="submit" name="input1" class="brownBG" value="get hatchet" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 129
if ($roomID=='129') {
    $_SESSION['dangerLVL'] = "7";
    $dirN='active dgreen';
}
$_SESSION['desc129'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="green">Forest Dead End</h3>
</div>
</div>
	<p>The forest path ends here. There are some blueberry bushes scattered around. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button class="brownBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
	<input class="blueBG" type="submit" name="input1" value="pick blueberry" />
	<input class="goldBG" type="submit" name="input1" value="search" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 130
if ($roomID=='130') {
    $_SESSION['dangerLVL'] = "7";
    $dirW='active dgreen';
}
$_SESSION['desc130'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="green">Abandoned Campsite</h3>
</div>
</div>
	<p>There is a vacant firepit and campground set up here next to the river. It looks like there was an animal attack and whoever was here, decided to leave. There are some redberry bushes here. Head back west to the Forest Clearing.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>

	<button class="brownBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
	<input class="redBG" type="submit" name="input1" value="pick redberry" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 131
if ($roomID=='131') {
    $_SESSION['dangerLVL'] = "7";
    $dirNW='active dgreen';
    $dirE='active dgreen';
}
$_SESSION['desc131'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="green">In the Forest by a Lake</h3>
</div>
</div>
	<p>The river flows into a lake here. Head NW to return back to the Forest Clearing or east along a rocky Forest Path.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="east">East</button>
	<button class="brownBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
	<button class="blueBG" type="submit" name="input1" value="fish">Fish</button>

	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 132
if ($roomID=='132') {
    $_SESSION['dangerLVL'] = "7";
    $dirN='active dgreen';
    $dirW='active dgreen';
}
$_SESSION['desc132'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="green">In the Forest on a Rocky Path</h3>
</div>
</div>
	<p>The path veers west to north here. The path north seems to be a little darker. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>

	<button class="brownBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
	<input class="goldBG" type="submit" name="input1" value="search" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 133
if ($roomID=='133') {
    $_SESSION['dangerLVL'] = "7";
    $dirNW='active dgreen';
    $dirN='active dgreen';
    $dirS='active dgreen';
}
$_SESSION['desc133'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="green">In the Forest on a Twisted Path</h3>
</div>
</div>
	<p>The path is getting darker and more treacherous as you head north. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>

	<button class="brownBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 134
if ($roomID=='134') {
    $_SESSION['dangerLVL'] = "7";
    $dirN='active dgreen';
    $dirW='active dgreen';
    $dirS='active dgreen';
}
$_SESSION['desc134'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="green">In the Forest approaching Troll Territory</h3>
</div>
</div>
	<p>The Forest gets very dark to the north. You hear grunting and squealing coming from that direction as well. A hill stands to your west. Head back south to return to a safer part of the forest.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>

	<button class="brownBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 135
if ($roomID=='135') {
    $_SESSION['dangerLVL'] = "7";
    $dirE='active dgreen';
    $dirW='active dgreen';
    $dirNE='active dgreen';
    $dirSE='active dgreen';
}
$_SESSION['desc135'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="green">In the Forest atop a Hill</h3>
</div>
</div>
	<p>You stand on top of a hill in the Forest. You think you can jump over the river to west if you time it correctly. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>

	<button class="brownBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
	<input class="blueBG" type="submit" name="input1" value="pick blueberry" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 136
if ($roomID=='136') {
    $_SESSION['dangerLVL'] = "7";
    $dirW='active darkgreen';
    $dirSW='active dgreen';
    $dirS='active dgreen';
}
$_SESSION['desc136'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="green">Adandoned Troll Guard Post</h3>
</div>
</div>
	<p>The Forest is getting very dark here. You see a Troll Camp to the west. Head south if you want to return to a safer part of the Forest.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="south">South</button>

	<button class="brownBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 137
if ($roomID=='137') {
    $_SESSION['dangerLVL'] = "13";
    $dirN='active darkgreen';
    $dirE='active dgreen';
}
$_SESSION['desc137'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="icon-goblin-head"></i></div>
	<div class="roomTitle">
<h3 class="green">Troll Base Camp</h3>
</div>
</div>
	<p>Guard Posts are set up here in the darkest part of the Forest. You hear Trolls rustling behind the trees all around you. </p>
	<p>Trolls are quite strong. They have a power attack that can do up to 3 times damage!</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;




























































// ------------------------------------------------------------------- RED TOWN
// ------------------------------------------------------------------- RED TOWN
// ------------------------------------------------------------------- RED TOWN
// ---------------------------------------------------- 201 - On a Path to Red Town by a Forest Gate
if ($roomID=='201') {
    $_SESSION['dangerLVL'] = "1";
    $dirN='active ';
    $dirSW='active ';
}
$_SESSION['desc201'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="icon-dragon"></i></div>
	<div class="roomTitle">
<h3 class="">On a Path to Red Town by a Forest Gate</h3>
</div>
</div>
	<p>To the north you see a forest path and to the far south you see the Red Town Gates.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 202 - On a Stone Path by Red Town
if ($roomID=='202') {
    $_SESSION['dangerLVL'] = "1";
    $dirN='active ';
    $dirS='active ';
}
$_SESSION['desc202'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3>On a Stone Path by Red Town</h3>
</div>
</div>
	<p>Continue southwest to Red Town. North to the forest.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 203 - On a Stone Path by a Farm
if ($roomID=='203') {
    $_SESSION['dangerLVL'] = "1";
    $dirNE='active ';
    $dirW='active dirt';
    $dirS='active ';
}
$_SESSION['desc203'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3>On a Stone Path by a Farm</h3>
</div>
</div>
	<p>A cabin and farm can be seen to the west. You see a big red gate to the south.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 204 - Red Town Grand Gate
if ($roomID=='204') {
    $_SESSION['dangerLVL'] = "1";
    $dirN='active ';
    $dirE='active red';
    $dirW='active ';
    $dirSW='active red';
}
$_SESSION['desc204'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="icon-dragon"></i></div>
	<div class="roomTitle">
<h3 class="red">Red Town Grand Gate</h3>
</div>
</div>
	<p>Four Red Guards stand watch over the massive open doors of the Red Gate. Head east to get to the Grand Square and everything else Red Town has to offer. To the west you see a large stone gate.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;


// ---------------------------------------------------- 205 - Rocky Flats Gate
if ($roomID=='205') {
    $_SESSION['dangerLVL'] = "1";
    $dirE='active ';
    $dirW='active dgray';
}
$_SESSION['desc205'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkgray"><i class="icon-dragon"></i></div>
	<div class="roomTitle">
<h3 class="darkgray">Rocky Flats Gate</h3>
</div>
</div>
	<p>A dwarf guard blocks the entrance to the Rocky Flats Map.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 206 - Iron Altar - NOT IN USE!!!
if ($roomID=='206') {
    $_SESSION['dangerLVL'] = "000";
}
$_SESSION['desc206'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Iron Altar</h3>
</div>
</div>
	<p>A massive iron structure is assembled here. 10 iron pillars are arranged in a circular formation. At the back of the altar is an empty iron chest with a sign next to it.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="south">South</button>

	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	<input type="submit" name="input1" value="offer stone" />
	</form>
</div></div></html>
HTML;


// ---------------------------------------------------- 207 - Broccoli Rob's Veggie Stand
if ($roomID=='207') {
    $_SESSION['dangerLVL'] = "0";
    $dirE='active ';
    $dirS='active green';
}
$_SESSION['desc207'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="icon-dragon"></i></div>
	<div class="roomTitle">
<h3 class="green">Broccoli Rob's <span class="brown">Veggie Stand</span></h3>
</div>
</div>
	<p>Rob has a well built food stand set up here with all sorts of fruits and veggies for sale.</p>
	<a class="btn goldBG" data-link="shop">Veggie Shop</a>
	<form id="mainForm" method="post" action="" name="formInput">
	<input type="submit" name="input1" class="wide brownBG" value="sell all dung" />
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></html>
HTML;

// ---------------------------------------------------- 208 - Rob's Farm
if ($roomID=='208') {
    $_SESSION['dangerLVL'] = "0";
    $dirN='active dirt';
}
$_SESSION['desc208'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="icon-dragon"></i></div>
	<div class="roomTitle">
<h3 class="green">Rob's Farm</h3>
</div>
</div>
	<p>Rows and rows of fruits and veggies are growing here.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>

	<input class="goldBG" type="submit" name="input1" value="grab veggies" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 209 - Red Town Grand Path
if ($roomID=='209') {
    $_SESSION['dangerLVL'] = "1";
    $dirE='active red';
    $dirW='active ';
}
$_SESSION['desc209'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="icon-dragon"></i></div>
	<div class="roomTitle">
<h3 class="red">Red Town Grand Path</h3>
</div>
</div>
	<p>The main road heading to the Grand Square is very busy. There is also a stall here with free Red Town maps. Head back west to exit town. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>

	<input class="goldBG" type="submit" name="input1" value="pick up map" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 210 - Red Town Grand Square
if ($roomID=='210') {
    $_SESSION['dangerLVL'] = "1";
    $dirN='active red';
    $dirNE='active red';
    $dirE='active red';
    $dirSE='active purple';
    $dirS='active red';
    $dirSW='active red';
    $dirW='active red';
    $dirNW='active darkblue';
	$icon = file_get_contents("img/svg/redberry.svg");
	//}
	
		
   // $dirU='active red';
}
//	<button type="submit" name="input1" value="west">w</button>
//	<button type="submit" name="input1" value="northeast">ne</button>
//	<button type="submit" name="input1" value="southwest">sw</button>
//	<button type="submit" name="input1" value="northwest">nw</button>
//	<button type="submit" name="input1" value="north">n</button>
//	<button type="submit" name="input1" value="east">e</button>
//	<button type="submit" name="input1" value="southeast">se</button>
$_SESSION['desc210'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><span class="icon red small">$icon</span></div>
  <div class="roomTitle">
<h3 class="red">Red Town</h3>
<h4 class="">Grand Square</h4>
</div>
</div>
	<p>The heart of New Babylon. This is easily the busiest area in town. There is a bubbling fountain here as well as a crafting table and fire.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	<button class="greenBG" type="submit" name="input1" value="rest">Rest</button>
	<button class="goldBG" type="submit" name="input1" value="auto combine">Combine Rings</button>
	<a href data-link2="craft" class="redBG btn">Crafting </a>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 211 - Red Town Warrior's Way
if ($roomID=='211') {
    $_SESSION['dangerLVL'] = "1";
    $dirN='active red';
    $dirS='active red';
}
$_SESSION['desc211'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="icon-dragon"></i></div>
	<div class="roomTitle">
<h3 class="red">Red Town Warrior's Way</h3>
</div>
</div>
	<p>On a path north of the Grand Square. Continue north to visit the Red Guard Barracks.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 212 - Red Guard Barracks
if ($roomID=='212') {
    $_SESSION['dangerLVL'] = "0";
    $dirN='active red';
    $dirNE='active red';
    $dirS='active red';
}
$_SESSION['desc212'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="icon-dragon"></i></div>
	<div class="roomTitle">
<h3 class="red">Red Guard Barracks</h3>
</div>
</div>
	<p>In the large main room for the Red Guard. Head north to the living quarters or northeast to go through the captain's office to the forest lookout tower. There are some free weapons here.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<br>
	<input class="goldBG"type="submit" name="input1" value="grab mace" />
	<input class="goldBG"type="submit" name="input1" value="grab long sword" />
	<input class="goldBG" type="submit" name="input1" value="grab warhammer" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 213 - Red Guard Living Quarters
if ($roomID=='213') {
    $_SESSION['dangerLVL'] = "0";
    $dirS='active red';
}
$_SESSION['desc213'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="icon-dragon"></i></div>
	<div class="roomTitle">
<h3 class="red">Red Guard Living Quarters</h3>
</div>
</div>
	<p>Beds and dressers line the walls here. Men are seen sleeping, eating or preparing for their work shift. Some are even playing cards. There is a table here with some cooked meat that's up for grabs.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="south">South</button>
	<input class="goldBG" type="submit" name="input1" value="grab meat" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 214 - Red Guard Captain's Office
if ($roomID=='214') {
    $_SESSION['dangerLVL'] = "0";
    $dirN='active red';
    $dirSW='active red';
}
$_SESSION['desc214'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="icon-dragon"></i></div>
	<div class="roomTitle">
<h3 class="red">Red Guard Captain's Office</h3>
</div>
</div>
	<p>This office is empty, no one is around. Head southwest to exit the Barracks, or north to visit the Captain at the Lookout Tower.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="north">North</button>

	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	<input class="goldBG" type="submit" name="input1" value="grab ring" />
	</form>
</div></div></html>
HTML;


// ---------------------------------------------------- 215 - Red Guard Captain - Forest Lookout
if ($roomID=='215') {
    $_SESSION['dangerLVL'] = "0";
    $dirN='active dgreen';
    $dirS='active red';
}
$_SESSION['desc215'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="icon-dragon"></i></div>
	<div class="roomTitle">
<h3 class="red">Red Guard Captain - Forest Lookout</h3>
</div>
</div>
	<p>Standing on the Lookout Tower you see most of the Forest below. Large areas of trees are divided by natural dirt paths. A tree hut is clearly visible as well. The Red Guard Captain has some quests for you.</p>
	<a href data-link="quests" class="btn goldBG">Red Guard Captain's Quests</a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="north">North</button>
	</form>
</div></div></html>
HTML;


// ---------------------------------------------------- 216 - Adam's General Store
if ($roomID=='216') {
    $_SESSION['dangerLVL'] = "0";
    $dirSW='active red';
}
$_SESSION['desc216'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="icon-stand"></i></div>
	<div class="roomTitle">
<h3 class="red">Adam's General Store</h3>
</div>
</div>
	<p>Adam has a neat and tidy shop set up here. </p>
	<a href data-link="shop" class="btn goldBG">Shop </a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 217 - Red Town Royal Road
if ($roomID=='217') {
    $_SESSION['dangerLVL'] = "1";
    $dirE='active red';
    $dirW='active red';
}
$_SESSION['desc217'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3 class="red">Red Town Royal Road</h3>
</div>
</div>
	<p>You are on a pristine road connecting Town Hall with the Shops and Guilds to the west.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 218 - Red Town Courtyard
if ($roomID=='218') {
    $_SESSION['dangerLVL'] = "1";
    $dirN='active red';
    $dirW='active red';
    $dirNE='active red';
    $dirS='active red';
    $dirSE='active dirt';
    $dirE='active red';
    $dirD='active red';
}
$_SESSION['desc218'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="icon-dragon"></i></div>
	<div class="roomTitle">
<h3 class="red">Red Town Courtyard</h3>
</div>
</div>
	<p>Many people are bustling through the courtyard. Paths come and go in all directions. There is a sign here as well as an entrance to the sewers below.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="down">Down</button>

	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 219 - Vacant Lot // Red Town Church

//	<p>It's a vacant lot. One day you might build a house here. But for now, nothing, all you can do is go back south.</p>
if ($roomID=='219') {
    $_SESSION['dangerLVL'] = "1";
    $dirS='active red';
}
$_SESSION['desc219'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="red">Red Town Church</h3>
</div>
</div>
	<p>The church is empty. There is nothing to do here now.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 220 - Todd's Pub & Inn
if ($roomID=='220') {
    $_SESSION['dangerLVL'] = "0";
    $dirW='active red';
}
$_SESSION['desc220'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"></div>
	<div class="roomTitle">
<h3 class="red">Todd's Pub & Inn</h3>
</div>
</div>
	<!-- <p>All sorts of bubbling vials and beakers are set up here. Before any long journey make sure you stock up with plenty of healing potions and other useful consumables.</p> -->
	 <p>Todd's is where travelers and townsfolk gather to swap stories over ale and laughter. The beds are cozy, and the company is always lively.</p>
	<a href data-link="shop" class="btn goldBG">Shop </a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 221 - Town Hall Plaza
if ($roomID=='221') {
    $_SESSION['dangerLVL'] = "0";
    $dirN='active red';
    $dirSW='active red';
}
$_SESSION['desc221'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="icon-dragon"></i></div>
	<div class="roomTitle">
<h3 class="red">Town Hall Plaza</h3>
</div>
</div>
	<p>The Red Town Plaza has many benches and tables set up for its citizens. People are mingling and taking care of business. Some are looking for help and offering rewards.</p>
	<a href data-link="quests" class="btn goldBG">Town Hall Plaza Quests</a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="north">North</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 222z - Town Hall Royal Courtyard
if ($roomID=='222z') {
    $_SESSION['dangerLVL'] = "0";
    $dirN='active red';
    $dirS='active red';
    $dirW='active green';
    $dirU='active red';
}
$_SESSION['desc222z'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="icon-dragon"></i></div>
	<div class="roomTitle">
<h3 class="red">Town Hall Royal Courtyard</h3>
</div>
</div>
	<p>A large lavish courtyard is lined with benches to relax. Potted plants are placed everywhere. You see the gardens to the west and the dining room to the north. The Mayor can be reached upstairs.</p>
	<form id="mainForm" method="post" action="" name="formInput">
	<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="up">Up</button>
	<button type="submit" name="input1" value="down">Down</button>
	</form>
</div></div></html>
HTML;


// ---------------------------------------------------- 222 - Mayor Rudolf - Town Hall Office
if ($roomID=='222') {
    $_SESSION['dangerLVL'] = "0";
    $dirN='active red';
    $dirS='active red';
    $dirW='active green';
}
$_SESSION['desc222'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="icon-desk"></i></div>
  <div class="roomTitle">
<h3 class="red">Mayor Rudolf</h3>
</div>
</div>
  <h4 class="">Town Hall Office</h4>
	<p>Most important business for Red Town is handled in this room. The Mayor is sitting down at his desk going through some paper work. He has a big quest available for you if you are up for the challenge.</p>
	<form id="mainForm" method="post" action="" name="formInput">
	<a href data-link="quests" class="btn goldBG">Quests</a>
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></html>
HTML;


// ---------------------------------------------------- 223 - Red Dining Room
if ($roomID=='223') {
    $_SESSION['dangerLVL'] = "0";
    $dirS='active red';
}
$_SESSION['desc223'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="icon-bigtable"></i></div>
	<div class="roomTitle">
<h3 class="red">Red Dining Room</h3>
</div>
</div>
	<p>A table that can easily sit over 20 is in the center of this very large room. Fancy glass cabinets filled with fine china and silverware line the walls. Some food stuffs are available for you to take.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="south">South</button>
	<input class="goldBG" type="submit" name="input1" value="grab meat" />
	<input class="goldBG" type="submit" name="input1" value="grab veggies" />
	<input class="goldBG" type="submit" name="input1" value="grab coffee" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 224 - Babylon Gardens
if ($roomID=='224') {
    $_SESSION['dangerLVL'] = "1";
    $dirE='active red';
}
$_SESSION['desc224'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon gold"></div>
	<div class="roomTitle">
<h3 class="green">Babylon Gardens</h3>
</div>
</div>
	<p>A perfectly manicured garden is displayed here. All sorts of flowers and bushes are growing, including thick vines climbing the trellises above, creating a lush green shelter with a gold chest in its center.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="east">East</button>
	<input class="goldBG" type="submit" name="input1" value="pick flower" />
	<input class="goldBG" type="submit" name="input1" value="open chest" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 225 - Wizard's Guild
//	<input class="blueBG" type="submit" name="input1" value="teleport to kobold lair" />
$icon = file_get_contents("img/svg/npc/npc-wizard.svg");

if ($roomID=='225') {
    $_SESSION['dangerLVL'] = "0";
    $dirNW='active red';
}
$_SESSION['desc225'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
<span class="icon purple big3">$icon</span>
  <div class="roomTitle">
<h3 class="purple">Wizard's Guild</h3>
</div>
</div>
	<p>Many men and women in robes are standing around the entrance to the Wizards Guild, mingling about magic and potions. There is a sign next to an impressive display of shiny wizard items.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
  <a href data-link="quests" class="btn goldBG">Quests</a>
	<a href data-link2="spells" class="btn purpleBG">Spells </a>
	<a href data-link="shop" class="btn goldBG">Shop </a>
	<button class="darkblueBG" type="submit" name="input1" value="grab pack">Grab Pack</button>
	<button class="greenBG" type="submit" name="input1" value="rest">Rest</button>
	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	<button type="submit" name="input1" value="northwest">nw</button>

	</form>
</div></html>
HTML;













	

// ---------------------------------------------------- 226 - Warrior's Guild
// 	<input class="redBG" type="submit" name="input1" value="teleport to ogre lair" />
/*
  <button class="blueBG" type="submit" name="input1" value="up">Enter Warrior's Guild</button>

*/
if ($roomID=='226') {
    $_SESSION['dangerLVL'] = "0";
    $dirSE='active red';
}

$icon = file_get_contents("img/svg/npc/npc-warrior.svg");
//	<div class="roomIcon red"><i class="icon-dragon"></i></div>

$_SESSION['desc226'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
    <span class="icon darkblue big3">$icon</span>
	<div class="roomTitle">
<h3 class="blue">Warrior's Guild</h3>
</div>
</div>
	<p>Many sword and axe wielding warriors congregate here in front of a massive stone building. Sword and shield banners hang along the walls. There is a sign here next to some impressive looking weapons.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
	<a href data-link="quests" class="btn goldBG">Quests</a>
	<a href data-link2="skills" class="btn purpleBG">Skills </a>
	<a href data-link="shop" class="btn goldBG">Shop </a>
	<button class="darkblueBG" type="submit" name="input1" value="grab pack">Grab Pack</button>
	<button class="greenBG" type="submit" name="input1" value="rest">Rest</button>
	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	<button type="submit" name="input1" value="southeast">se</button>
	</form>
</div></html>
HTML;

// ---------------------------------------------------- 226a - Warrior's Guild EXIT
if ($roomID=='226a') {
    $_SESSION['dangerLVL'] = "0";
}
$_SESSION['desc226a'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Warrior's Guild EXIT</h3>
</div>
</div>
	<p>Head down to exit the Guild. Go North for Weapons and Armor. Go West for Skills. Head NW to access the Grand Mess Hall and Warrior Quests.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="down">Down</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 226b - Warrior's Weapon & Armor Shop
if ($roomID=='226b') {
    $_SESSION['dangerLVL'] = "0";
}
$_SESSION['desc226b'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Warrior's Weapon & Armor Shop</h3>
</div>
</div>
	<p>Rows and rows of shiny weapons and armor are on display in this Shop. Upgrade your weapons to gain the edge in battle.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
  <a href data-link="shop" class="btn redBG">Warrior Shop </a>
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></html>
HTML;
// ---------------------------------------------------- 226c - Warrior's Skill Shop
if ($roomID=='226c') {
    $_SESSION['dangerLVL'] = "0";
}
$_SESSION['desc226c'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
  <h4>Warrior's Guild</h4>
  <div class="roomTitle">
<h3 class="blue">Warrior Skills</h3>
</div>
</div>
	<p>Here you can further your combat training. Increase your fighting and defensive skills!</p>
	<a href data-link2="skills" class="btn redBG">Warrior Skills </a>
	<p class="">
    MAGIC STRIKE will add some extra magic damage to your melee attacks!
    <br>
    BLOCK will increase the amount of damage you deflect with a shield!
    </p>
	  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 226d - Warrior's Grand Hall
if ($roomID=='226d') {
    $_SESSION['dangerLVL'] = "0";
}
$_SESSION['desc226d'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
  <h4>Warrior's Guild</h4>
  <div class="roomTitle">
<h3 class="blue">Warrior's Grand Hall</h3>
</div>
</div>
	<p>Many seasoned warriors congregate here trading war stories while eating chickens whole. Rows of tables with hearty food is available for all members. A fire roars in the corner where you can cook up some meat if you so desire. Resting here also super charges your HP.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="south">South</button>
	<input type="submit" name="input1" value="southest" />
	<button type="submit" name="input1" value="east">East</button>

	<input class="goldBG" type="submit" name="input1" value="cook all meat" />
	<input class="goldBG" type="submit" name="input1" value="grab red potion" />
	<input class="goldBG" type="submit" name="input1" value="grab meatball" />
	<input class="greenBG" type="submit" name="input1" value="rest" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 226e - Warrior Pete's Quest Set
if ($roomID=='226e') {
    $_SESSION['dangerLVL'] = "0";
}
$_SESSION['desc226e'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
  <h4>Warrior's Guild</h4>
  <div class="roomTitle">
<h3 class="blue">Warrior Pete's Quests</h3>
</div>
</div>
	<p>Pete is an accomplished warrior. You see him skillfully juggling some swords. He also has 3 quests available for you.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 226f - Warrior Williams's Quest Set
if ($roomID=='226f') {
    $_SESSION['dangerLVL'] = "0";
}
$_SESSION['desc226f'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
  <div class="roomTitle">
<h3>Warrior William's Quest Set</h3>
</div>
</div>
	<p>Willy will have 3 quests available for you soon. Meanwhile go do something else productive.</p>
	<form id="mainForm" method="post" action="" name="formInput">
	QUESTS COMING SOON:<br>

	<button type="submit" name="input1" value="north">North</button>
	</form>
</div></div></html>
HTML;



// ---------------------------------------------------- 225a - Wizard's Guild Exit
if ($roomID=='225a') {
    $_SESSION['dangerLVL'] = "0";
}
$_SESSION['desc225a'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
  <h4>Wizard's Guild</h4>
  <div class="roomTitle">
<h3 class="purple">Guild Exit</h3>
</div>
</div>
	<p>At the Wizard's main exit. Go southeast to get wizard spells, skills, items and quests. Head down to return back to town.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="down">Down</button>
  <button type="submit" name="input1" value="southeast">Southeast</button>
</form>
</div></html>
HTML;

// ---------------------------------------------------- 225b - Wizard's Guild Lobby
if ($roomID=='225b') {
    $_SESSION['dangerLVL'] = "0";
}
$_SESSION['desc225b'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
  <h4>Wizard's Guild</h4>
  <div class="roomTitle">
<h3 class="purple">Main Lobby</h3>
</div>
</div>
	<p>Many spell casters are seen mingling in this very large room. There are tables with food and drink, and a fire is lit in the corner. Grab some free food or potions off the tables. There is a directory here to help you navigate around the guild.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northwest">nw</button>
	<button type="submit" name="input1" value="northeast">ne</button>
	<button type="submit" name="input1" value="southeast">se</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="southwest">sw</button>
	<button type="submit" name="input1" value="west">West</button>
	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	<input class="goldBG" type="submit" name="input1" value="grab veggies" />
	<input class="goldBG" type="submit" name="input1" value="grab blue potion" />
	<input class="greenBG" type="submit" name="input1" value="rest" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 225c - Wizard's General Store
if ($roomID=='225c') {
    $_SESSION['dangerLVL'] = "0";
}
$_SESSION['desc225c'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
  <h4>Wizard's Guild</h4>
  <div class="roomTitle">
<h3 class="purple">General Store</h3>
</div>
</div>
  <p>Some great wizard items are for sale here. Stock up on blue potions and some stronger staffs before you venture out.</p>
	<a href data-link="shop" class="btn goldBG">Shop </a>
   	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 225d - Guild Master Quinn's Office
if ($roomID=='225d') {
    $_SESSION['dangerLVL'] = "0";
}
$_SESSION['desc225d'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
  <h4>Wizard's Guild</h4>
  <div class="roomTitle">
<h3 class="purple">Guildmaster's Office</h3>
</div>
</div>
  <p>Grandmaster Quinn has a neat and tidy office with all sorts of magical doohickeys laying about. He has a bowl on his desk with a bunch of mana regen rings. // ELITE QUESTS Coming Soon!</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>

	<input class="goldBG" type="submit" name="input1" value="grab ring" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 225e - Wizard Skills & Spells
if ($roomID=='225e') {
    $_SESSION['dangerLVL'] = "0";
}
$_SESSION['desc225e'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
  <h4>Wizard's Guild</h4>
  <div class="roomTitle">
<h3 class="purple">Skills and Spells</h3>
</div>
</div>
	<p>You can now learn a whole slew of new powerful spells. Spend your SP wisely to become a master spell caster.</p>
	<a href data-link2="spells" class="btn purpleBG">Spells </a>
	<p>ATOMIC BLAST is a super powerful spell, but uses alot of MP</p>
	<form id="mainForm" method="post" action="" name="formInput">

	<button type="submit" name="input1" value="northwest">Northwest</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 225f - Wizard's Jeweler
if ($roomID=='225f') {
    $_SESSION['dangerLVL'] = "0";
}
$_SESSION['desc225f'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
  <h4>Wizard's Guild</h4>
  <div class="roomTitle">
<h3 class="purple">Jeweler</h3>
</div>
</div>
  <p>The Jeweler is adorned with all sorts of fancy rings and amulets. He has some popular Wizard Only rings available for purchase.</p>
	<a href data-link="shop" class="btn goldBG">Shop </a>
 	<form id="mainForm" method="post" action="" name="formInput">

	<button type="submit" name="input1" value="northeast">Northeast</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 225g - Wizard Morty's Quest Set
if ($roomID=='225g') {
    $_SESSION['dangerLVL'] = "0";
}
$_SESSION['desc225g'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
  <h4>Wizard's Guild</h4>
  <div class="roomTitle">
<h3 class="purple">Morty's Quest Set</h3>
</div>
</div>
	<p>The comedic wizard Morty has several quests available for you. Complete these 3 quests to become one of the strongest Wizards known.</p>
  <a href data-link="quests" class="btn goldBG">Wizard Morty's Quests</a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 225h - Wizard Xavier's Quest Set
if ($roomID=='225h') {
    $_SESSION['dangerLVL'] = "0";
}
$_SESSION['desc225h'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
  <h4>Wizard's Guild</h4>
  <div class="roomTitle">
<h3 class="purple">Xavier's Quest Set</h3>
</div>
</div>
	<p>Xavier will have the most elite of Guild Quests. Soon...</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 227 - Michael's Weapon Shop
if ($roomID=='227') {
    $_SESSION['dangerLVL'] = "0";
    $dirNE='active red';
}
$_SESSION['desc227'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="ra ra-crossed-axes"></i></div>
	<div class="roomTitle">
<h3 class="red">Michael's Weapon Shop</h3>
</div>
</div>
	<p>Michael has a fully functional weapons distribution business set up here. Time to upgrade your weapon if you have the coin.</p>
	<a href data-link="shop" class="btn goldBG">Shop </a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northeast">Northeast</button>
	</form>
</div></div></html>
HTML;


// ---------------------------------------------------- 228 - Wizards Way
if ($roomID=='228') {
    $_SESSION['dangerLVL'] = "1";
    $dirN='active red';
    $dirS='active red';
    $dirSE='active red';
}
$_SESSION['desc228'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3 class="red">Wizards Way</h3>
</div>
</div>
	<p>On a path heading to the southern part of town. You can reach the south gate as well as Vincenzo's Meat & Produce Stand. The road splits to the southeast into a dark alley.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
    </form>
</div></html>
HTML;


// ---------------------------------------------------- 229 - Vincenzo's Meat & Produce Stand
if ($roomID=='229') {
    $_SESSION['dangerLVL'] = "1";
    $dirE='active red';
}
$_SESSION['desc229'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="ra ra-chicken-leg"></i></div>
	<div class="roomTitle">
<h3 class="red">Vincenzo's Meat & Produce Stand</h3>
</div>
</div>
	<p>Chatty Vinny has a wooden stand set up here with some home-grown meat and produce for sale. There are chickens running all around you.</p>
	<a href data-link="shop" class="btn goldBG">Shop </a>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="east">East</button>
    </form>
</div></html>
HTML;

// ---------------------------------------------------- 230 - Red Town South Gate
if ($roomID=='230') {
    $_SESSION['dangerLVL'] = "1";
    $dirN='active red';
    $dirS='active green';
    $dirW='active red';
}
$_SESSION['desc230'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="icon-southgate"></i></div>
	<div class="roomTitle">
<h3 class="red">Red Town South Gate</h3>
</div>
</div>
	<p>The South Gate is currently locked down by the Red Guard. The southern Plains have creatures that you could not possibly survive against. To the west you see a giddy bearded man waving to grab your attention.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
    </form>
</div></html>
HTML;


// ---------------------------------------------------- 231 - Red Town Back Alley
if ($roomID=='231') {
    $_SESSION['dangerLVL'] = "3";
    $dirNW='active red';
    $dirE='active red';
}
$_SESSION['desc231'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3 class="">Red Town Back Alley</h3>
</div>
</div>
	<p>A shady looking alley continues east here. Head back northwest to the safer part of town.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="east">East</button>
    </form>
</div></html>
HTML;


// ---------------------------------------------------- 232 - Red Town - Back Alley by a Sewer
if ($roomID=='232') {
    $_SESSION['dangerLVL'] = "3";
    $dirW='active red';
    $dirE='active red';
    $dirD='active red';
}
$_SESSION['desc232'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="ra ra-hole-ladder"></i></div>
	<div class="roomTitle">
<h3 class="">Back Alley by a Sewer</h3>
</div>
</div>
	<p>A sewer entrance is here with the cap removed. You can head down if you want, but be prepared to somewhat dangerous, but mostly smelly, enemies. There are some strange looking banners hanging on the building walls here as well.</p>
 	<form id="mainForm" method="post" action="" name="formInput">

	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="down">Down</button>

	<input class="goldBG" type="submit" name="input1" value="search" />
    </form>
</div></html>
HTML;

// ---------------------------------------------------- 233 - Red Town - Turn in the Back Alley
if ($roomID=='233') {
    $_SESSION['dangerLVL'] = "3";
    $dirNW='active red';
    $dirW='active red';
}
$_SESSION['desc233'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3 class="">Turn in the Back Alley</h3>
</div>
</div>
	<p>A dark corner in the alley. You don't know what is lurking in the shadows nor do you want to.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northwest">Northwest</button>
    </form>
</div></html>
HTML;


// ---------------------------------------------------- 234 - Red Town Back Alley
// ---------------------------------------------------- 234 - Back Alley Apartments
if ($roomID=='234') {
    $_SESSION['dangerLVL'] = "3";
    $dirN='active red';
    $dirSE='active red';
}
$_SESSION['desc234'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3 class="">Back Alley Apartments</h3>
</div>
</div>
	<p>Some less than desireable apartments make up the majority of the back alley here. Go back north to the safer part of town.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
    </form>
</div></html>
HTML;



// ---------------------------------------------------- 235 - Red Town Dock Entrance
if ($roomID=='235') {
    $_SESSION['dangerLVL'] = "1";
    $dirNW='active red';
}
$_SESSION['desc235'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon dirt"><i class="icon-pier"></i></div>
	<div class="roomTitle">
<h3 class="dirt">Red Town Docks</h3>
</div>
</div>
	<p>You get a whiff of salty air here. The Sea to the East contains creatures that are currently too strong for you to deal with. [ DOCKS CURRENTLY CLOSED ]</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
    </form>
</div></html>
HTML;


// ---------------------------------------------------- 236 - Red Town Shady Shop
if ($roomID=='236') {
    $_SESSION['dangerLVL'] = "1";
    $dirN='active red';
}
$_SESSION['desc236'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkestgray"><i class="icon-stand"></i></div>
	<div class="roomTitle">
<h3 class="darkestgray">Shady Shop</h3>
</div>
</div>
	<p>A shady looking character has a shady shop set up here. Shady, i know. He has some weapons, consumables and ammunition available at discounted prices.</p>
	<a href data-link="shop" class="btn goldBG">Shop </a>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
    </form>
</div></html>
HTML;


// ---------------------------------------------------- 237 - Red Town Stables
if ($roomID=='237') {
    $_SESSION['dangerLVL'] = "0";
    $dirNE='active red ';
}
$_SESSION['desc237'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="icon-stables"></i></div>
	<div class="roomTitle">
<h3 class="red">Red Town Stables</h3>
</div>
</div>
	<p>A large selection of horses and other strong mounts are available for purchase here, if you have the coin.</p>
	<a class="btn goldBG" data-link="shop">Stables</a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northeast">Northeast</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------------------------------------------------------- SEWER
// ---------------------------------------------------- 232a
if ($roomID=='232a') {
    $_SESSION['dangerLVL'] = "8";
    $dirNW='active dgray';
    $dirW='active dgray';
    $dirNE='active dgray';
    $dirU='active red';
}
$_SESSION['desc232a'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="fa fa-level-up"></i></div>
	<div class="roomTitle">
<h3>South Sewer EXIT</h3>
</div>
</div>
	<p>A way out of this dark and smelly sewer. Head up to return to the back alley or explore what this awful place might have to offer.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="up">Up</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232b
if ($roomID=='232b') {
    $_SESSION['dangerLVL'] = "8";
    $dirNW='active dgray';
    $dirSW='active dgray';
}
$_SESSION['desc232b'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>By a Large Curved Pipe in the Sewer</h3>
</div>
</div>
	<p>The sewer curves here along the path of a huge pipe.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>

	<input class="goldBG" type="submit" name="input1" value="search" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232c
if ($roomID=='232c') {
    $_SESSION['dangerLVL'] = "8";
    $dirSW='active dgray';
    $dirW='active dgray';
    $dirSE='active dgray';
    $dirU='active red';
}
$_SESSION['desc232c'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="fa fa-level-up"></i></div>
	<div class="roomTitle">
<h3>North Sewer EXIT</h3>
</div>
</div>
	<p>Head up to exit the sewer and reach the Royal Courtyard. </p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	<button type="submit" name="input1" value="up">Up</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232d
if ($roomID=='232d') {
    $_SESSION['dangerLVL'] = "8";
    $dirS='active dgray';
    $dirW='active dgray';
    $dirE='active dgray';
    $dirN='active blue';
}
$_SESSION['desc232d'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>A Fork in the Sewer</h3>
</div>
</div>
	<p>The filthy sewer path splits here.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="south">South</button>
	<input class="blueBG" type="submit" name="input1" value="north" />
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232e
if ($roomID=='232e') {
    $_SESSION['dangerLVL'] = "8";
    $dirSW='active dgray';
    $dirNW='active dgray';
    $dirSE='active dgray';
    $dirNE='active dgray';
    $dirN='active dgray';
    $dirS='active dgray';
}
$_SESSION['desc232e'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Sewer Crossroads</h3>
</div>
</div>
	<p>Many paths intersect here. And every path is covered with crap.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232f
if ($roomID=='232f') {
    $_SESSION['dangerLVL'] = "8";
    $dirW='active dgray';
    $dirE='active dgray';
    $dirN='active dgray';
}
$_SESSION['desc232f'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>In the Sewer near the exit</h3>
</div>
</div>
	<p>Head east to reach the exit of this awful place or west to go deeper into the garbage.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232g
if ($roomID=='232g') {
    $_SESSION['dangerLVL'] = "8";
    $dirNW='active dgray';
    $dirNE='active dgray';
    $dirE='active dgray';
}
$_SESSION['desc232g'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>In the Sewer by a Smelly "Pond"</h3>
</div>
</div>
	<p>The pond is made mostly of poop, incase you didn't pick up on that.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232h
if ($roomID=='232h') {
    $_SESSION['dangerLVL'] = "8";
    $dirSW='active dgray';
    $dirNW='active dgray';
    $dirSE='active dgray';
    $dirNE='active dgray';
}
$_SESSION['desc232h'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Crossing the Sewer Path</h3>
</div>
</div>
	<p>The sewer opens up here. Two wide paths intersect here.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232i
if ($roomID=='232i') {
    $_SESSION['dangerLVL'] = "8";
    $dirSW='active dgray';
    $dirNW='active dgray';
    $dirSE='active dgray';
    $dirE='active dgray';
}
$_SESSION['desc232i'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>In the Sewer by a "Waterfall"</h3>
</div>
</div>
	<p>This is not the type of waterfall you want to splash around in. </p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232j
if ($roomID=='232j') {
    $_SESSION['dangerLVL'] = "8";
    $dirSW='active dgray';
    $dirSE='active dgray';
    $dirNE='active darkgray';
}
$_SESSION['desc232j'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>In the Sewer by the Catacombs</h3>
</div>
</div>
	<p>You get an uneasy feeling here. There is a massive stone wall to your north. You can reach the rest of the sewer by heading south.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>

	<input class="goldBG" type="submit" name="input1" value="search" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232k
if ($roomID=='232k') {
    $_SESSION['dangerLVL'] = "8";
    $dirSE='active dgray';
    $dirNE='active dgray';
}
$_SESSION['desc232k'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>It's Pitch Black in the Sewer</h3>
</div>
</div>
	<p>You can barely see a thing. You stumble over dead animals, trash and of course, shit. You hear some muffled screaming coming from the north. </p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232l
if ($roomID=='232l') {
    $_SESSION['dangerLVL'] = "8";
    $dirNE='active dgray';
    $dirSW='active dirt';
}
$_SESSION['desc232l'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>At a Dead End in the Sewers</h3>
</div>
</div>
	<p>You reached a dead end in the sewers and there's nothing you can do about it. Just give up now.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<input class="goldBG" type="submit" name="input1" value="search" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232mm - Thieve’s Den Secret Entrance
if ($roomID=='232mm') {
    $_SESSION['dangerLVL'] = "3";
    //$dirNW='active red';
    $dirD='active dirt';
}
$_SESSION['desc232mm'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon dirt"><i class="ra ra-hole-ladder"></i></div>
	<div class="roomTitle">
<h3 class="dirt">Thieve’s Den Secret Entrance</h3>
</div>
</div>
	<p>You managed to find a secret entrance to the Thieve's Den. Head down to make your way to the Thieve's Treasure Room.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="down">Down</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232m - Thieves Hangout
if ($roomID=='232m') {
    $_SESSION['dangerLVL'] = "8";
    $dirNE='active dgray';
    $dirE='active dirt';
}
$_SESSION['desc232m'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon dirt"><i class="icon-bigtable"></i></div>
	<div class="roomTitle">
<h3 class="dirt">Thieve's Den Hangout</h3>
</div>
</div>
	<p>Chairs and tables are set up here for card games and eating. Stolen merchandise seems to be all over the place. You see a stash of crossbow bolts in the corner of the room.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="east">East</button>
	<input class="goldBG" type="submit" name="input1" value="grab bolts" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232n
if ($roomID=='232n') {
    $_SESSION['dangerLVL'] = "11";
    $dirW='active dirt';
    $dirE='active dirt';
}
$_SESSION['desc232n'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon dirt"><i class="icon-crossed-swords"></i></div>
	<div class="roomTitle">
<h3 class="dirt">Thieve's Den Training Room</h3>
</div>
</div>
	<p>This heavily fortified training room is used quite often by Brute Thieves. Be wary.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 232o
if ($roomID=='232o') {
    $_SESSION['dangerLVL'] = "14";
    $dirW='active dirt';
}
$_SESSION['desc232o'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon dirt"><i class="icon-chest"></i></div>
	<div class="roomTitle">
<h3 class="dirt">Thieve's Den Treasure Room</h3>
</div>
</div>
	<p>This room is littered with gold, treasures and other shiny things. There is a large chest here as well.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<input class="goldBG" type="submit" name="input1" value="open chest" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232p - The Catacombs EXIT
if ($roomID=='232p') {
    $_SESSION['dangerLVL'] = "11";
    $dirSW='active dgray';
    $dirN='active darkgray';
    $dirW='active darkgray';
}
$_SESSION['desc232p'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>The Catacombs EXIT</h3>
</div>
</div>
	<p>A massive stone door is to your southwest. The Catacombs extend very far towards the west. You see some burnt books on the ground and several skulls embedded in the stone walls.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232q
if ($roomID=='232q') {
    $_SESSION['dangerLVL'] = "11";
    $dirW='active darkgray';
    $dirE='active lightblue';
    $dirS='active darkgray';
}
$_SESSION['desc232q'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>The Catacombs Library</h3>
</div>
</div>
	<p>Destroyed bookshelves are littered all across this room. Charred books cover the floor. You see the Catacombs Exit to the south and a very shiny walkway to the east. Head west to go deeper into the catacombs.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232r
if ($roomID=='232r') {
    $_SESSION['dangerLVL'] = "11";
    $dirW='active darkgray';
    $dirE='active darkgray';
    $dirS='active darkgray';
}
$_SESSION['desc232r'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>The Catacombs Gallery</h3>
</div>
</div>
	<p>Faded paintings and murals cover the walls in the gallery. There are shattered bone pieces piled up in the corners.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232s
if ($roomID=='232s') {
    $_SESSION['dangerLVL'] = "11";
    $dirW='active darkgray';
    $dirE='active darkgray';
    $dirN='active darkgray';
}
$_SESSION['desc232s'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>The Catacombs Armory</h3>
</div>
</div>
	<p>Several skeletons are standing upright in this room. Some are still wearing armor but most of their weapons and equipment are scattered along the floor.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232t
if ($roomID=='232t') {
    $_SESSION['dangerLVL'] = "11";
    $dirW='active darkgray';
    $dirE='active darkgray';
    $dirN='active darkgray';
}
$_SESSION['desc232t'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>The Catacombs Torture Chamber</h3>
</div>
</div>
	<p>Various torture devices line the bloody walls of this room.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232u
if ($roomID=='232u') {
    $_SESSION['dangerLVL'] = "11";
    $dirW='active darkgray';
    $dirE='active darkgray';
    $dirS='active darkgray';
}
$_SESSION['desc232u'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>The Catacombs Room of Skulls</h3>
</div>
</div>
	<p>Hundreds of skulls are placed into little cubbies along every wall in this room. Candles are lit in every eye socket.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232v
if ($roomID=='232v') {
    $_SESSION['dangerLVL'] = "17";
    $dirE='active darkgray';
    $dirS='active darkgray';
}
$_SESSION['desc232v'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>The Catacombs Sacred Altar</h3>
</div>
</div>
	<p>Elaborate skull pillars are arranged in a circular fashion around a bone altar. There is a bowl of what can only be assumed is holy water in the center of the altar.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232w
if ($roomID=='232w') {
    $_SESSION['dangerLVL'] = "17";
    $dirN='active darkgray';
    $dirE='active darkgray';
}
$_SESSION['desc232w'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>The Catacombs Sacrificial Chamber</h3>
</div>
</div>
	<p>A blood soaked stone table is covered with several ornamental daggers of various shapes and sizes. Every single wall, floor and ceiling surface in this chamber is made entirely of bone. </p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232x
if ($roomID=='232x') {
    $_SESSION['dangerLVL'] = "0";
    $dirW='active darkgray';
    $dirN='active darkgray';
    $dirE='active darkgray';
    $dirS='active darkgray';
}
$_SESSION['desc232x'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon blue"><i class="ra ra-hearts"></i></div>
	<div class="roomTitle">
<h3 class="blue">A Sewer Oasis</h3>
</div>
</div>
	<p>You have found the only safe haven in the sewers. Rest up here before you head back out into the stink.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="east">East</button>

	<input class="greenBG" type="submit" name="input1" value="rest" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232y
if ($roomID=='232y') {
    $_SESSION['dangerLVL'] = "8";
    $dirS='active darkgray';
}
$_SESSION['desc232y'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Across a Sewer River by a Gray Chest</h3>
</div>
</div>
	<p>The secret sewer alcove here has a shiny gray chest. There are also some potions to pick up!</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="south">South</button>

	<input class="blueBG" type="submit" name="input1" value="get wings potion" />
	<input class="" type="submit" name="input1" value="open chest" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 232z
if ($roomID=='232z') {
    $_SESSION['dangerLVL'] = "11";
    $dirW='active darkgray';
}
$_SESSION['desc232z'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Silver Vault</h3>
</div>
</div>
	<p>A silver chest stands in the center of this shimmering room.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	</form>
</div></div></html>
HTML;


// ---------------------------------------------------- Rocky Flats MAP

// ---------------------------------------------------- 301
if ($roomID=='301') {
    $_SESSION['dangerLVL'] = "8";
    $dirW='active ';
    $dirE='active ';
}
$_SESSION['desc301'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>On a Stone Path near Red Town</h3>
</div>
</div>
	<p>To the east you see the Grand Red Gates approaching New Babylon (a.k.a. Red Town). To the west you can access the rest of the Rocky Flats map.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 302
if ($roomID=='302') {
    $_SESSION['dangerLVL'] = "8";
    $dirNW='active ';
    $dirE='active ';
}
$_SESSION['desc302'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>On a Stone Path</h3>
</div>
</div>
	<p>Head northwest for the Rocky Flats Crossroads. Head east to return to Red Town.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 303
if ($roomID=='303') {
    $_SESSION['dangerLVL'] = "0";
    $dirW='active swamp';
    $dirNE='active gold';
    $dirNW='active ';
    $dirS='active savannah';
    $dirSE='active ';
}
$_SESSION['desc303'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Rocky Flats Crossroads - Dwarf Captain</h3>
</div>
</div>
  	<p>The Dwarven Captain stands guard here, enforcing the law for the area. He has 3 quests available for you. There is a map directory here as well.</p>
	<a href data-link="quests" class="btn goldBG">Dwarf Captain Quests</a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>

	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 304
if ($roomID=='304') {
    $_SESSION['dangerLVL'] = "8";
    $dirN='active ';
    $dirSE='active ';
}
$_SESSION['desc304'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>On a Stone Path</h3>
</div>
</div>
	<p>Head north to get to the Grassy Field or southeast for the Rocky Flats Crossroads. </p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 305
if ($roomID=='305') {
    $_SESSION['dangerLVL'] = "8";
    $dirN='active ';
    $dirS='active ';
}
$_SESSION['desc305'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>On a Stone Path near the Grassy Field</h3>
</div>
</div>
	<p>Head north to get to the Grassy Field (and Blue Ocean) or go south for the rest of the Rocky Flats Map.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 306
if ($roomID=='306') {
    $_SESSION['dangerLVL'] = "0";
    $dirW='active dgray';
    $dirN='active gold';
    $dirSE='active ';
}
//You are in the heavily fortified stone building that houses the Dwarf Guard. There is a bounty board here with available quests that have huge rewards. Some free weapons and supplies are here for you to take too.
$_SESSION['desc306'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Rocky Flats Ledge</h3>
</div>
</div>
	<p>
	From this rocky ledge south of the village, one can get a good view of the stone path below. It is also a good place to rest and gather supplies for adventurers.
	</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	<input class="blueBG" type="submit" name="input1" value="grab arrows" />
	<input class="blueBG" type="submit" name="input1" value="grab bolts" />
	<input class="blueBG" type="submit" name="input1" value="grab polearm" />
	</form>
</div></div></html>
HTML;


// ---------------------------------------------------- 307
if ($roomID=='307') {
    $_SESSION['dangerLVL'] = "0";
    $dirNW='active gold';
    $dirN='active gold';
    $dirE='active gold';
    $dirS='active ';
    $dirSW='active ';
}
$_SESSION['desc307'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Dwarf Village Square</h3>
</div>
</div>
	<p>The common area of the Mining Village is a hub of activity. To the north, you will find a shiny shop that is sure to catch your eye, while a pathway marked "Dwarf Treasury" leads to the northwest. To the east, you can find the Mining Guild. To the southwest, you will find the exit from the village. In the center of the area, there is a coal fire burning where you can rest and warm up after a long day of mining. Near the fire, there is a Bounty Board.	</p>
  	<form id="mainForm" method="post" action="" name="formInput">
	  <a href data-link="quests" class="btn goldBG">Bounty Board Quests</a>
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="south">South</button>
	<input class="greenBG" type="submit" name="input1" value="rest" />
	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	</form>
</div></html>
HTML;


// ---------------------------------------------------- 308
if ($roomID=='308') {
    $_SESSION['dangerLVL'] = "0";
    $dirW='active gold';
    $dirN='active gold';
   // $dirD='active gold';
}
$_SESSION['desc308'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mining Guild</h3>
</div>
</div>
	<p>The blacksmith forge in the Mining Guild burns nonstop, with dwarves bustling all around the area. A strange-looking dwarf has set up a shop nearby, where you can find a perfectly organized display of brand new pickaxes and hammers. To the north, you can find the entrance to the Neverending Mine. The Guild is a busy and lively place, filled with the sound of hammering and the glow of the forge.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
	  <a href data-link="quests" class="btn goldBG">Quests</a>
	  <a class="btn goldBG" data-link="shop">Shop</a>
	  <button class="darkblueBG" type="submit" name="input1" value="grab pack">Grab Pack</button>
	  <input class="greenBG" type="submit" name="input1" value="rest" />
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>
	</form>
</div></html>

HTML;


// --------------------------------------------------------------------- MINING GUILD

// ---------------------------------------------------- 308b
if ($roomID=='308b') {
    $_SESSION['dangerLVL'] = "0";
    $dirW='active dgray';
    $dirU='active gold';
}
$_SESSION['desc308b'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mining Guild EXIT</h3>
</div>
</div>
	<p>You've made it to the Mining Guild! Here you will learn how to craft strong equipment out of Iron, Steel and Mithril by digging down to new depths over at the mine. To get there go northeast from the FORGE, which is west of here. Head up to exit the Guild and reach the Dwarf Village. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="up">Up</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 308a
if ($roomID=='308a') {
    $_SESSION['dangerLVL'] = "0";
    $dirNW='active dgray';
    $dirNE='active gold';
    $dirE='active dgray';
    $dirW='active dgray';
    $dirS='active dgray';
}
$_SESSION['desc308a'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mining Guild FORGE</h3>
</div>
</div>
	<p>A blacksmith forge burns non stop here. This large well lit room easily has the most guild members in it, all taking turns creating armor and weapons. Feel free to craft items or rest here. There is also a Guild Directory.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="south">South</button>

	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
   	<input class="greenBG" type="submit" name="input1" value="rest" />

	</form>
</div></div></html>
HTML;


// ---------------------------------------------------- 308c
if ($roomID=='308c') {
    $_SESSION['dangerLVL'] = "0";
    $dirN='active dgray';
}
$_SESSION['desc308c'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mining Guild Headquarters</h3>
</div>
</div>
	<h4>Guild Leader</h4>
	<p>This room is business central for the guild, you see many upper level miners discussing rocks and such. The Guild Leader stands behind a desk near the far wall.</p>
	<a href data-link="quests" class="btn goldBG">Mining Guild Quests</a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
   </form>
</div></html>
HTML;

// ---------------------------------------------------- 308d
if ($roomID=='308d') {
    $_SESSION['dangerLVL'] = "0";
    $dirE='active dgray';
}
$_SESSION['desc308d'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mining Guild Supply Shop</h3>
</div>
</div>
	<p>A strange looking dwarf has a shop set up here. There are buckets of tools and long racks of stones all over the place. In the midst of all the junk is a perfectly organized display of brand new pickaxes and hammers. iron, steel and mithril, all for sale.</p>
	<a class="btn goldBG" data-link="shop">Mining Guild Shop</a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="east">East</button>
   </form>
</div></html>
HTML;

// ---------------------------------------------------- 308e
if ($roomID=='308e') {
    $_SESSION['dangerLVL'] = "20 - 100";
    $dirSE='active dgray';
}
$_SESSION['desc308e'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>The Sentinel Room</h3>
</div>
</div>
	<p>A massive fighting arena surrounded by walls of smooth stone.</p>
	<form id="mainForm" method="post" action="" name="formInput">
		<button type="submit" name="input1" value="southeast">Southeast</button>

		<input type="submit" class="darkgrayBG  h5" name="input1" value="attack stone sentinel" /> LVL 20 - cost: 10 stone
		<input type="submit" class="brownBG  h5" name="input1" value="attack iron sentinel" /> LVL 40 - cost: 10 iron
		<input type="submit" class="grayBG  h5" name="input1" value="attack steel sentinel" /> LVL 60 - cost: 10 steel
		<input type="submit" class="blueBG  h5" name="input1" value="attack mithril sentinel" /> LVL 80 - cost: 10 mithril
		<input type="submit" class="goldBG  h5" name="input1" value="attack sentinel titan" /> LVL 100 - cost: 5 stone, 5 iron, 5 steel, 5 mithril

   </form>
</div></html>
HTML;
// -------------------------------------------------------------------------------- NEVER-ENDING MINE
// ---------------------------------------------------- m0
if ($roomID=='m00') {
    $_SESSION['dangerLVL'] = "0";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-00'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 0</h3>
</div>
</div>
	<p>This place is Mine Room Zero, the big M00. Your trecherous journey below begins here. There is absolute no danger in this room, as well as no ore. If you want some, you're gonna have to grab a pickaxe and start digging.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
	<input type="submit" name="input1" value="read sign" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m01
if ($roomID=='m01') {
    $_SESSION['dangerLVL'] = "20";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-01'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 1</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m02
if ($roomID=='m02') {
    $_SESSION['dangerLVL'] = "20";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-02'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 2</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m03
if ($roomID=='m03') {
    $_SESSION['dangerLVL'] = "20";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-03'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 3</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m04
if ($roomID=='m04') {
    $_SESSION['dangerLVL'] = "20";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-04'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 4</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m05
if ($roomID=='m05') {
    $_SESSION['dangerLVL'] = "25";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-05'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 5</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m06
if ($roomID=='m06') {
    $_SESSION['dangerLVL'] = "25";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-06'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 6</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m07
if ($roomID=='m07') {
    $_SESSION['dangerLVL'] = "25";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-07'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 7</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m08
if ($roomID=='m08') {
    $_SESSION['dangerLVL'] = "25";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-08'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 8</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m09
if ($roomID=='m09') {
    $_SESSION['dangerLVL'] = "25";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-09'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 9</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m10
if ($roomID=='m10') {
    $_SESSION['dangerLVL'] = "30";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-10'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 10</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m11
if ($roomID=='m11') {
    $_SESSION['dangerLVL'] = "25";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-11'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 11</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m12
if ($roomID=='m12') {
    $_SESSION['dangerLVL'] = "25";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-12'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 12</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m13
if ($roomID=='m13') {
    $_SESSION['dangerLVL'] = "25";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-13'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 13</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m14
if ($roomID=='m14') {
    $_SESSION['dangerLVL'] = "25";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-14'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 14</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m15
if ($roomID=='m15') {
    $_SESSION['dangerLVL'] = "35";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-15'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 15 - Ulfberht</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m16
if ($roomID=='m16') {
    $_SESSION['dangerLVL'] = "35";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-16'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 16</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m17
if ($roomID=='m17') {
    $_SESSION['dangerLVL'] = "35";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-17'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 17</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m18
if ($roomID=='m18') {
    $_SESSION['dangerLVL'] = "35";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-18'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 18</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m19
if ($roomID=='m19') {
    $_SESSION['dangerLVL'] = "35";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-19'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 19</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m20
if ($roomID=='m20') {
    $_SESSION['dangerLVL'] = "40";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-20'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 20 - Cyclops</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m21
if ($roomID=='m21') {
    $_SESSION['dangerLVL'] = "30";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-21'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 21</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m22
if ($roomID=='m22') {
    $_SESSION['dangerLVL'] = "30";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-22'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 22</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m23
if ($roomID=='m23') {
    $_SESSION['dangerLVL'] = "30";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-23'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 23</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m24
if ($roomID=='m24') {
    $_SESSION['dangerLVL'] = "30";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-24'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 24</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m25
if ($roomID=='m25') {
    $_SESSION['dangerLVL'] = "50";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-25'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 25 - Griffin</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m26
if ($roomID=='m26') {
    $_SESSION['dangerLVL'] = "50";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-26'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 26</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m27
if ($roomID=='m27') {
    $_SESSION['dangerLVL'] = "50";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-27'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 27</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m28
if ($roomID=='m28') {
    $_SESSION['dangerLVL'] = "50";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-28'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 28</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m29
if ($roomID=='m29') {
    $_SESSION['dangerLVL'] = "50";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-29'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 29</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;
// ---------------------------------------------------- m30
if ($roomID=='m30') {
    $_SESSION['dangerLVL'] = "60";
    $dirU='active darkgray';
    $dirD='active darkgray';
}
$_SESSION['desc311-30'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mine Level 30 - Minotaur</h3>
</div>
</div>
	<p>You are in the neverending mine. You can mine down another level or mine here some more.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button><br>
	<input class="brownBG" type="submit" name="input1" value="mine here" />
	<input class="redBG" type="submit" name="input1" value="mine down" />
   </form>
</div></div></html>
HTML;





// ---------------------------------------------------- 309
if ($roomID=='309') {
    $_SESSION['dangerLVL'] = "0";
    $dirSE='active gold';
}
$_SESSION['desc309'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Dwarf Treasury</h3>
</div>
</div>
	<p>The Treasury is decorated very nicely with rare metals and jewels embedded in the furniture, walls and ceiling. There is a shimmering steel display here with a Gold and Silver Chest. If you have any keys, please help yourself.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southeast">Southeast</button>

	<input class="goldBG" type="submit" name="input1" value="open gold chest" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 310
if ($roomID=='310') {
    $_SESSION['dangerLVL'] = "0";
    $dirS='active gold';
}
$_SESSION['desc310'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Silver Shop</h3>
</div>
</div>
	<p>A fancy looking dwarf is decked out in full silver gear and has a shop set up offering the same silver weapons and armor for you. If you can afford it.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
      <a class="btn goldBG" data-link="shop">Silver Shop</a>

	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></html>
HTML;
// ---------------------------------------------------- 311
if ($roomID=='311') {
    $_SESSION['dangerLVL'] = "0";
    $dirS='active gold';
    $dirD='active gold';
}
$_SESSION['desc311'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>The Neverending Mine - Base Camp</h3>
</div>
</div>
	<p>You stand atop the Neverending mine owned by the Mining Guild. Several miners are seen here preparing for future expeditions. Head on down to enter level 1 of the Mine. If you don't have access yet complete the Mining Guild quest to the south. There are also some free mining supplies here and a fire to rest at.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="down">Down</button>
	<br>
	<input class="goldBG" type="submit" name="input1" value="grab pickaxe" />
	<input class="goldBG" type="submit" name="input1" value="grab red potion" />
	<input class="goldBG" type="submit" name="input1" value="grab blue potion" />
	</form>
</div></div></html>
HTML;


// ---------------------------------------------------- 312
if ($roomID=='312') {
    $_SESSION['dangerLVL'] = "8";
    $dirW='active swamp';
    $dirE='active ';
}
$_SESSION['desc312'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>On a Muddy Path by the Crossroads</h3>
</div>
</div>
	<p>The path west starts to get muddy here. To the east you see the Dwarf Captain standing guard.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 313
if ($roomID=='313') {
    $_SESSION['dangerLVL'] = "8";
    $dirW='active swamp';
    $dirE='active swamp';
}
$_SESSION['desc313'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>On a Muddy Path</h3>
</div>
</div>
	<p>That's pretty much it. It's muddy.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 314
if ($roomID=='314') {
    $_SESSION['dangerLVL'] = "8";
    $dirNW='active swamp';
    $dirE='active swamp';
    $dirNE='active darkgray';
}
$_SESSION['desc314'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>On a Muddy Path by an Abandoned Mine</h3>
</div>
</div>
	<p>The path continues northwest towards the Swamp. Another path splits off sharply to the northeast heading up a hill to the Abandoned Mine.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 315
if ($roomID=='315') {
    $_SESSION['dangerLVL'] = "8";
    $dirSW='active swamp';
    $dirD='active gold';
}
$_SESSION['desc315'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Abandoned Mine ENTRANCE</h3>
</div>
</div>
	<p>The entrance to the mine is a mess. There are broken tools and stone scattered everywhere. There is a sign here.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="down">Down</button>

   <button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 315a
if ($roomID=='315a') {
    $_SESSION['dangerLVL'] = "13";
    $dirSW='active dgray';
    $dirU='active gold';
}
$_SESSION['desc315a'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Abandoned Mine EXIT</h3>
</div>
</div>
	<p>A way out of the Abandoned Mine. Head up to exit or southeast to travel deeper into the condemned mine.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 315b
if ($roomID=='315b') {
    $_SESSION['dangerLVL'] = "16";
    $dirW='active dgray';
    $dirNE='active dgray';
}
$_SESSION['desc315b'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Bloody Skeever Tracks</h3>
</div>
</div>
	<p>Large rodent tracks go every which way in this room.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 315c
if ($roomID=='315c') {
    $_SESSION['dangerLVL'] = "21";
    $dirE='active dgray';
    $dirNE='active darkergray';
}
$_SESSION['desc315c'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Bleeding Nests</h3>
</div>
</div>
	<p>Slimy, bloody nests are found all over this room. You hear buzzing and screeching all around you.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 315d
if ($roomID=='315d') {
    $_SESSION['dangerLVL'] = "23";
    $dirSW='active dgray';
    $dirE='active dgray';
}
$_SESSION['desc315d'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Lair of the Worm</h3>
</div>
</div>
	<p>This room is almost completely covered in a slimy mucus, and it smells… bad. Watch out for the giant, poisonous boss worm here.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 316
if ($roomID=='316') {
    $_SESSION['dangerLVL'] = "8";
    $dirW='active swamp';
    $dirSE='active swamp';
}
$_SESSION['desc316'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>On a Muddy Path approaching a Swamp</h3>
</div>
</div>
	<p>A Blue Guard stands here blocking the path to the Swamp. If you wish to gain access to the Swamp Path you must open the Gold Chest in the Dwarf Mining Village. Otherwise head back southeast.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 317
if ($roomID=='317') {
    $_SESSION['dangerLVL'] = "8";
    //$dirW='active ';
    //$dirS='active ';
    $dirSW='active savannah';
    $dirSE='active ';
    $dirN='active darkgray';
}
$_SESSION['desc317'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Dry Grass Clearing</h3>
</div>
</div>
	<p>You are at a junction of paths. To the north you see the Dwarf Guard Captain. To the southeast you see a massive arena and to the south there is a locked gate. The path continues to the southwest.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 318
if ($roomID=='318') {
    $_SESSION['dangerLVL'] = "8";
    $dirW='active darkgray';
    $dirS='active savannah';
    $dirNE='active savannah';
}
$_SESSION['desc318'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>On a Grass Path near a Fortress</h3>
</div>
</div>
	<p>You see a massive Red Fort to the west. The grass path continues northeast and south.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 319
if ($roomID=='319') {
    $_SESSION['dangerLVL'] = "8";
    $dirSW='active darkgray';
    $dirS='active savannah';
    $dirN='active savannah';
}
$_SESSION['desc319'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>On a Grass Path near the Grotto</h3>
</div>
</div>
	<p>An intricately carved stone door blocks the Grotto Entrance to the southwest. You have a feeling a lever in the nearby Fort might open it. The grass path continues north and south. </p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="north">North</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 320
if ($roomID=='320') {
    $_SESSION['dangerLVL'] = "8";
    $dirS='active savannah';
    $dirN='active savannah';
}
$_SESSION['desc320'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>On a Grass Path Approaching the Savannah</h3>
</div>
</div>
	<p>A Gray Guard blocks the Savannah entrance here. He remains silent as you try to look past him. To exit head back north.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 321
if ($roomID=='321') {
    $_SESSION['dangerLVL'] = "25";
    $dirD='active gold';
    $dirNE='active savannah';
}
$_SESSION['desc321'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Stone Grotto</h3>
</div>
</div>
	<p>This stone cave has many lush trees and bushes growing in its natural running water. There is a small pond here surrounded by intricately carved dwarven statues. The statues have a variety of small birds and glowing dragonflies buzzing around them. Behind one of the statues you see a wide spiral staircase made of stone and covered with moss. The staircase descends under the ground.
</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="down">Down</button>

	<input class="goldBG" type="submit" name="input1" value="search" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 321b
if ($roomID=='321b') {
    $_SESSION['dangerLVL'] = "20";
    $dirU='active gold';
}
$_SESSION['desc321b'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Under the Grotto</h3>
</div>
</div>
	<p>Even more bushes and colorful flowers grow here beneath the roots. There is a big echo in this chamber and you hear odd noises coming from all around you. There are the same statues down here that are above. The statues all have their hands open ready to receive an offering. You see a strange pair of light blue gloves in the hands of one of the statues.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button>

	<input class="goldBG" type="submit" name="input1" value="ex gloves" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 322
if ($roomID=='322') {
    $_SESSION['dangerLVL'] = "15";
    $dirW='active darkgray';
    $dirE='active savannah';
}
$_SESSION['desc322'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Red Fort Courtyard</h3>
</div>
</div>
	<p>A nicely groomed lawn is here with little patches of bushes and flower. Try not to mess any of them up fighting the bandits. The path continues west into the Red Fort.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>

	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 323
if ($roomID=='323') {
    $_SESSION['dangerLVL'] = "17";
    $dirW='active darkgray';
    $dirE='active darkgray';
}
$_SESSION['desc323'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Red Fort Hallway</h3>
</div>
</div>
	<p>This large decorated hallway leads deeper into the Fort.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 324
if ($roomID=='324') {
    $_SESSION['dangerLVL'] = "18";
    $dirS='active darkgray';
    $dirN='active darkgray';
    $dirE='active darkgray';
}
$_SESSION['desc324'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Red Fort Barracks</h3>
</div>
</div>
	<p>Swords, axes, and armor for Red Beard's bandits are stored in this room. Might be useful to search for equipment here. You also smell some good cooking to the south.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="east">East</button>

	<input class="goldBG" type="submit" name="input1" value="search" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 325
if ($roomID=='325') {
    $_SESSION['dangerLVL'] = "23";
    $dirN='active darkgray';
}
$_SESSION['desc325'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Red Fort Kitchen</h3>
</div>
</div>
	<p>The infamous Red Fort Kitchen. Many great meals have been prepared here for the Red Bandits. Watch out for the Butcher though. He has a reputation for having a mean streak.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>

	<input class="goldBG" type="submit" name="input1" value="flip switch" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 326
if ($roomID=='326') {
    $_SESSION['dangerLVL'] = "30";
    $dirS='active darkgray';
}
$_SESSION['desc326'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Red Beard's War Room</h3>
</div>
</div>
	<p>A large oak table has a big map of the surrounding area with red markers to represent the bandits' location as well as all the opposing guards who watch over the land. This is where Red Beard can usually be found. Be cautious though, he packs quite a punch.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 327
if ($roomID=='327') {
    $_SESSION['dangerLVL'] = "0";
    $dirNW='active darkgray';
}
$_SESSION['desc327'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Empty Arena</h3>
</div>
</div>
	<p>In the empty arena of the Rocky Flats, you stand alone on the broken stone floor. The flat and barren ground stretches out around you, devoid of any vegetation or other features. The air is still and quiet, with only the gentle breeze blowing through the rocky hills providing any sound. </p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 328
if ($roomID=='328') {
    $_SESSION['dangerLVL'] = "0";
}
$_SESSION['desc328'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Silver Mine</h3>
</div>
</div>
	<p>The silver mine is below. Awesome.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="down">Down</button>
	</form>
</div></div></html>
HTML;



// ---------------------------------------------------- BLUE OCEAN MAP

// ---------------------------------------------------- 401
if ($roomID=='401') {
    $_SESSION['dangerLVL'] = "13";
    $dirE='active sand';
    $dirNW='active ocean';
    $dirSW='active ocean';
}
$_SESSION['desc401'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="ocean">In the Ocean near the Docks</h3>
</div>
</div>
	<p>The ocean's waves slowly roll in. The natural water current here wants to take you to the southwest. To the northwest is a smaller but calmer part of the ocean. Go east to return to the Grassy Field.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 402
if ($roomID=='402') {
    $_SESSION['dangerLVL'] = "13";
    $dirSE='active ocean';
}
$_SESSION['desc402'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="ocean">Quiet in the Ocean</h3>
</div>
</div>
	<p>The waves calm down here and the ocean is very pleasant. A nice breeze is rolling off the mountains to the northeast. You think you might even be able to go under the water here.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 403
if ($roomID=='403') {
    $_SESSION['dangerLVL'] = "13";
    $dirE='active sand';
    $dirW='active ocean';
}
$_SESSION['desc403'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="ocean">In the Waves by the Beach</h3>
</div>
</div>
	<p>The waves are somewhat choppy here. Head west to reach the rest of the ocean or east for the beach and grassy field.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 404
if ($roomID=='404') {
    $_SESSION['dangerLVL'] = "13";
    $dirW='active ocean';
    $dirS='active ocean';
    $dirE='active ocean';
    $dirNE='active ocean';
}
$_SESSION['desc404'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="ocean">Cruising Along a Beachside Current</h3>
</div>
</div>
	<p>A swirling current breaks off in many directions here. Far to the east you see a beach and to the south you see a large yellow temple. Go west to get to the rest of the ocean.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="south">South</button>
	<input type="submit" name="input1" value="northest" />
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 405
if ($roomID=='405') {
    $_SESSION['dangerLVL'] = "35";
    $dirW='active ocean';
    $dirSE='active gold';
    $dirNE='active ocean';
}
$_SESSION['desc405'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon gold"><i class="ra ra-tower"></i></div>
	<div class="roomTitle">
<h3 class="gold">Yellow Water Temple</h3>
</div>
</div>
	<p>You are in the middle of an enormous golden temple. There is water flowing from the walls and little fish jumping in and out of it.</p>
  	<p>The Heavy Walrus has insanely high Defense. You will need some big hits to defeat it.</p>
	<form id="mainForm" method="post" action="" name="formInput">
	<input type="submit" class="goldBG h5" name="input1" value="attack temple boss" />
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></html>
HTML;
// ---------------------------------------------------- 406
if ($roomID=='406') {
    $_SESSION['dangerLVL'] = "13";
    $dirW='active ocean';
    $dirE='active ocean';
    $dirN='active ocean';
    $dirS='active ocean';
}
$_SESSION['desc406'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="ocean">Blue Ocean Crossing</h3>
</div>
</div>
	<p>The vast ocean is quite beautiful here. You can go off in any direction. You see a storm brewing far to the north. The Yellow Water Temple lies to the east. A muddy island can be found to the south and more ocean lies to the west.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 407
if ($roomID=='407') {
    $_SESSION['dangerLVL'] = "13";
    $dirNW='active ocean';
    $dirN='active ocean';
    $dirS='active ocean';
}
$_SESSION['desc407'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="ocean">Storm to the North</h3>
</div>
</div>
	<p>You can go north, but be cautious, there is a massive storm forming. You can go around the storm if you go northwest. Head back south for the rest of the ocean.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 408
if ($roomID=='408') {
    $_SESSION['dangerLVL'] = "13";
    $dirNE='active blue';
    $dirSE='active ocean';
    $dirS='active sand';
}
$_SESSION['desc408'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="ocean">Traveling Along a Jetty</h3>
</div>
</div>
	<p>A fast moving jetty is traveling around the storm. You see a giant Blue Temple to the northeast. Head back southeast to get to the rest of the ocean.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 409
if ($roomID=='409') {
    $_SESSION['dangerLVL'] = "35";
    $dirSW='active ocean';
    $dirNE='active blue';
    $dirE='active ocean';
}
$_SESSION['desc409'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon blue"><i class="ra ra-tower"></i></div>
	<div class="roomTitle">
<h3 class="blue">Blue Water Temple</h3>
</div>
</div>
	<p>You are in the middle of an enormous sapphire temple. There is electrically charged water flowing down the walls as well as bluefish jumping in and out of the water around you.</p>
	<p>To summon the Blue Water Temple Boss, simply attack! Be prepared though, the Coral Wizard hits strong with magic.</p>
	<form id="mainForm" method="post" action="" name="formInput">
	<input type="submit" class="blueBG h5" name="input1" value="attack temple boss" /><br>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></html>
HTML;
// ---------------------------------------------------- 410
if ($roomID=='410') {
    $_SESSION['dangerLVL'] = "13";
    $dirD='active darkblue';
}
$_SESSION['desc410'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="ocean">In the Ocean trapped under the Storm</h3>
</div>
</div>
	<p>Dark clouds churn above you. You are surrounded by thunder and lightening and unable to find your way out of the storm. Head down under the ocean if you can, or teleport out of here to safety.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="down">Down</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 411
if ($roomID=='411') {
    $_SESSION['dangerLVL'] = "13";
    $dirW='active ocean';
    $dirN='active ocean';
    $dirSW='active ocean';
    $dirSE='active redbrown';
}
$_SESSION['desc411'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="ocean">In the Ocean near Mud Island</h3>
</div>
</div>
	<p>You see a muddy island to the southeast. The rest of the ocean is to the north and west. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 412
if ($roomID=='412') {
    $_SESSION['dangerLVL'] = "11";
    $dirNW='active ocean';
    $dirD='active redbrown';
}
$_SESSION['desc412'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="redbrown">Mud Island</h3>
</div>
</div>
	<p>Your cool boots are now covered with mud. There is a cave entrance here leading below. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="down">Down</button>
	</form>
</div></div></html>
HTML;


// ---------------------------------------------------- 413
if ($roomID=='413') {
    $_SESSION['dangerLVL'] = "0";
    $dirW='active ocean';
    $dirE='active ocean';
    $dirSE='active ocean';
}
$icon = file_get_contents("img/svg/npc/npc-pirate.svg");

$_SESSION['desc413'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon sand"><i class="icon-sun"></i></div>

    <span class="icon ocean big3">$icon</span>

	<div class="roomTitle">
<h3 class="ocean">Blue Oasis - Friendly Pirate</h3>
</div>
</div>
	<p>You stand on a beautiful island oasis. There are lush palm trees and vibrant berry bushes all around as well as a natural fresh water spring here where you can rest. A friendly pirate is here with some quests.</p>
	<a href data-link="quests" class="btn goldBG"><i class="ra ra-player"></i> Friendly Pirate Quests</a>

	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>

	<input class="redBG " type="submit" name="input1" value="pick 20 redberry" />
	<input class="blueBG " type="submit" name="input1" value="pick 20 blueberry" />
	<input class="greenBG" type="submit" name="input1" value="rest" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 414
if ($roomID=='414') {
    $_SESSION['dangerLVL'] = "13";
    $dirN='active ocean';
    $dirE='active ocean';
    $dirS='active ocean';
}
$_SESSION['desc414'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="ocean">In the Ocean</h3>
</div>
</div>
	<p>You are in the middle of the ocean. To the north you see a beautiful Island Oasis. To the far east you see a yellow temple and south is more ocean.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 415
if ($roomID=='415') {
    $_SESSION['dangerLVL'] = "13";
    $dirW='active ocean';
    $dirE='active ocean';
    $dirS='active ocean';
    $dirNE='active ocean';
}
$_SESSION['desc415'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="ocean">Ocean Calm</h3>
</div>
</div>
	<p>The waves have calmed down in this part of the Ocean. To the west you see a Green Temple and to the east you see a Muddy Island. Head south to the Swamp and northeast for more Ocean.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 416
if ($roomID=='416') {
    $_SESSION['dangerLVL'] = "13";
    $dirW='active ocean';
    $dirS='active swamp';
    $dirNW='active ocean';
}
$_SESSION['desc416'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="ocean">On the Ocean by the Swamp Entrance</h3>
</div>
</div>
	<p>Head south to leave the Ocean and enter the Swamp. To the northwest is the Green Temple and to the west you see a whirlpool.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 417
if ($roomID=='417') {
    $_SESSION['dangerLVL'] = "13";
    $dirN='active green';
    $dirE='active ocean';
    $dirD='active darkblue';
}
$_SESSION['desc417'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="ocean">A Secret Way Under the Sea</h3>
</div>
</div>
	<p>A giant whirlpool here draws the surface water below. You can go under the Ocean here if you are breathing water, or head north for the Green Temple, or east for the Swamp Entrance.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="down">Down</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 418
if ($roomID=='418') {
    $_SESSION['dangerLVL'] = "35";
    $dirNW='active darkblue';
    $dirE='active ocean';
    $dirSW='active green';
    $dirSE='active ocean';
}
$_SESSION['desc418'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-tower"></i></div>
	<div class="roomTitle">
<h3 class="green">Green Water Temple</h3>
</div>
</div>
	<p>You are in the middle of an enormous emerald temple. There are long leafy vines growing all around the walls.</p>
	<p>To summon the Green Water Temple Boss, simply attack! Be prepared though, the Smooth Ranger attacks with a powerful bow and can also heal.</p>
<form id="mainForm" method="post" action="" name="formInput">
	<input type="submit" class="greenBG h5" name="input1" value="attack temple boss" /><br>
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></html>
HTML;


// ---------------------------------------------------- 419
if ($roomID=='419') {
    $_SESSION['dangerLVL'] = "13";
    $dirW='active darkblue';
}
$_SESSION['desc419'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="ocean">Trapped in a Swirling Current</h3>
</div>
</div>
	<p>You find yourself stuck in a swirling current. The only way you can escape is by heading back west.</p>
<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 420
if ($roomID=='420') {
    $_SESSION['dangerLVL'] = "13";
    $dirE='active sand';
    $dirSW='active darkblue';
    $dirD='active darkblue';
}
$_SESSION['desc420'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="ocean">Near an Oasis</h3>
</div>
</div>
	<p>You see a beautiful island oasis to the east. You see a series of tornadoes forming to the southwest. It looks like you can also go underwater here.</p>
<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="down">Down</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 421
if ($roomID=='421') {
    $_SESSION['dangerLVL'] = "40";
    $dirE='active ocean';
    $dirSW='active red';
}
$_SESSION['desc421'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="ocean">Riding a Massive Wave</h3>
</div>
</div>
	<p>All the currents of the ocean lead here to create the gnarliest wave you've ever seen. Be careful though, this area is easily the most dangerous place in the whole ocean. Surfs up.</p>
<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 422
if ($roomID=='422') {
    $_SESSION['dangerLVL'] = "25";
    $dirW='active red';
    $dirE='active ocean';
    $dirSW='active darkgreen';
    $dirSE='active green';
    $dirNE='active darkblue';
}
$_SESSION['desc422'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="ocean">In a Tornado of Currents</h3>
</div>
</div>
	<p>The never-ending cycle of tornadoes here makes the area very dangerous. On top of the weather conditions you need to watch out for vicious crocodiles! Head west for the Red Water Temple and southeast for the Green Water Temple. You see a lush green island to the southwest.
</p>
<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 423
if ($roomID=='423') {
    $_SESSION['dangerLVL'] = "35";
    $dirE='active darkblue';
    $dirNW='active red';
    $dirNE='active darkblue';
}
$_SESSION['desc423'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="ra ra-tower"></i></div>
	<div class="roomTitle">
<h3 class="red">Red Water Temple</h3>
</div>
</div>
	<p>You are in the middle of an enormous ruby temple. You see rivers of flames flowing out of the walls.</p>
  	<p>To summon the Red Water Temple Boss, simply attack! Be prepared though, the Thunder Barbarian can hit hard with POWER and CRITICAL attacks!</p>
	<form id="mainForm" method="post" action="" name="formInput">
	<input type="submit" class="redBG h5" name="input1" value="attack temple boss" /><br>
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></html>
HTML;
// ---------------------------------------------------- 424
if ($roomID=='424') {
    $_SESSION['dangerLVL'] = "25";
    $dirNE='active darkblue';
}
$icon = file_get_contents("img/svg/npc/npc-surfer.svg");
$_SESSION['desc424'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">

	<div class="roomIcon sand"><i class="icon-sun"></i></div>

    <span class="icon ocean big3">$icon</span>
	<div class="roomTitle">
<h3 class="darkgreen">Crocodile Island - Jungle Jim</h3>
</div>
</div>
	<p>The island here is covered with lush trees and bushes and is very humid. Jungle Jim has a simple Tree Hut set up here and has some quests available for you. O and watch out for Crocs. </p>
	<a href data-link="quests" class="btn goldBG">Jungle Jim Quests </a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northeast">Northeast</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 425
if ($roomID=='425') {
    $_SESSION['dangerLVL'] = "50";
    $dirNE='active blue';
    $dirSE='active gold';
    $dirSW='active green';
    $dirNW='active red';
}
$icon = file_get_contents("img/svg/npc/npc-guardian.svg");

$_SESSION['desc425'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
<span class="icon ocean big3">$icon</span>
<div class="roomTitle">
<h4 class="white">Water Temple Guardian</h4>
<h3 class="ocean">Master Temple</h3>
</div>
</div>
	<p>You stand on the main platform of the Master Water Temple. You can reach any of the 4 Water Temples from this location. The powerful Water Temple Guardian stands watch here as well. </p>
	<form id="mainForm" method="post" action="" name="formInput">
	<button type="submit" name="input1" class="oceanBG" value="bathe in glory">Bathe in Glory</button>
	<button data-link="quests" class="goldBG">Quests +</button>
	<button type="submit" name="input1" class="greenBG" value="evolve info">Evolve +</button>
	<br/>
	<button type="submit" name="input1" class="deadBG" value="attack guardian">Water Temple Guardian Lvl. 50</button>
	<br/>
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></html>
HTML;



	// <input type="submit" name="input1" class="goldBG" value="grab master pack" />
	// <input type="submit" name="input1" class="greenBG" value="rest" />



// ---------------------------------------------------- 425p
if ($roomID=='425p') {
    $_SESSION['dangerLVL'] = "500";
}
$_SESSION['desc425p'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="ocean">Poseidon's Temple</h3>
</div>
</div>
	<p>You are flying miles high in Poseidon's Grand Temple. Floating rivers of water are flowing in and around the temple's massive pillars. Summon Poseidon by simply attacking, but understand, he is a true god and has godly stats. You will not survive. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="down">Down</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- UNDER THE OCEAN MAP


// ---------------------------------------------------- 480
if ($roomID=='480') {
    $_SESSION['dangerLVL'] = "18";
    $dirNE='active darkblue';
}
$_SESSION['desc480'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Underwater Silver Chest</h3>
</div>
</div>
	<p>The ocean floor smooths out here and in the smoothest area you see a silver chest. The ocean walls rise up here in all directions. The only exit you see is back northeast.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<input class="goldBG" type="submit" name="input1" value="open silver chest" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 481
if ($roomID=='481') {
    $_SESSION['dangerLVL'] = "18";
    $dirW='active darkblue';
    $dirN='active darkblue';
}
$_SESSION['desc481'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>By a School of Jellyfish</h3>
</div>
</div>
	<p>A mix of red, blue and silver jellyfish bob up and down in the chilly water here.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 482
if ($roomID=='482') {
    $_SESSION['dangerLVL'] = "18";
    $dirS='active darkblue';
    $dirNE='active darkblue';
    $dirU='active ocean';
}
$_SESSION['desc482'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Deep Under the Ocean</h3>
</div>
</div>
	<p>You are very deep under the ocean. The ocean get's brighter and warmer to the northeast. You see a pair of jellyfish swim to the south.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 483
if ($roomID=='483') {
    $_SESSION['dangerLVL'] = "18";
    $dirN='active darkblue';
}
$_SESSION['desc483'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Surrounded by Coral</h3>
</div>
</div>
	<p>You are in the most colorful coral reef you have ever seen. Vibrant jellyfish, eels and crustaceans swim all around you. There are many other small critters scurrying about amongst the reef. There is a piece of coral here in the shape of a lever.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<input class="goldBG" type="submit" name="input1" value="flip lever" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 484
if ($roomID=='484') {
    $_SESSION['dangerLVL'] = "18";
    $dirNW='active darkblue';
    $dirNE='active darkblue';
    $dirE='active darkblue';
    $dirS='active darkblue';
    $dirSW='active darkblue';
    $dirU='active ocean';
}
$_SESSION['desc484'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>A Vast Underwater Landscape</h3>
</div>
</div>
	<p>The ocean floor stretches in all directions as far as your eyes can see. You see an opening above you where you can swim to the surface. The ocean floor dips down to the southwest and get's increasingly colorful to the south. You see a gold shimmer to the north as well as a school of sharks swim by. The wide ocean floor continues to the east. It appears someone left a sign here.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button>
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>

   	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 485
if ($roomID=='485') {
    $_SESSION['dangerLVL'] = "18";
    $dirSW='active darkblue';
}
$_SESSION['desc485'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Underwater Gold Shrine</h3>
</div>
</div>
	<p>The gold chest here is centered on a solid gold platform with golden pillars at each corner. It's a lot of gold.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<input class="goldBG" type="submit" name="input1" value="open chest" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 486
if ($roomID=='486') {
    $_SESSION['dangerLVL'] = "18";
    $dirSE='active darkblue';
    $dirW='active darkblue';
}
$_SESSION['desc486'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>On the Ocean Floor</h3>
</div>
</div>
	<p>Assorted shells and rocks are all over the ocean floor here. You feel a current dragging you to the southeast. To the west you see the sun's light shining down into the ocean</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 487
if ($roomID=='487') {
    $_SESSION['dangerLVL'] = "18";
    $dirNW='active darkblue';
    $dirE='active darkblue';
}
$_SESSION['desc487'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>In an Underwater Current</h3>
</div>
</div>
	<p>A strong current drags you to the east.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 488
if ($roomID=='488') {
    $_SESSION['dangerLVL'] = "18";
    $dirSW='active darkblue';
    $dirU='active ocean';
}
$_SESSION['desc488'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Giant Turtle Nest</h3>
</div>
</div>
	<p>You see baby turtles swimming all around. Some momma turtles pop their head out of the nest here. You see an opening up to the surface from here and what appears to be a ship to the southwest.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 489
if ($roomID=='489') {
    $_SESSION['dangerLVL'] = "18";
    $dirNW='active darkblue';
    $dirNE='active darkblue';
    $dirSE='active redbrown';
}
$_SESSION['desc489'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Sunken Ship</h3>
</div>
</div>
	<p>An ancient sunken ship lies on the ocean floor. Tattered pirate flags wave in the waters. Fish and sharks swim in and out of the ships cracks. There are many explorable cabins and exposed crevices inside the ship.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	<input class="goldBG" type="submit" name="input1" value="search" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 490
if ($roomID=='490') {
    $_SESSION['dangerLVL'] = "11";
    $dirU='active redbrown';
    $dirE='active redbrown';
    $dirNE='active redbrown';
}
$_SESSION['desc490'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="redbrown">Mud Cave EXIT</h3>
</div>
</div>
	<p>This cave is completely covered in mud. You hear many many little crabs scurrying around you. Go east into the muddy tunnel or northeast to where you see most of the crabs coming from.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 491
if ($roomID=='491') {
    $_SESSION['dangerLVL'] = "11";
    $dirW='active redbrown';
    $dirN='active redbrown';
}
$_SESSION['desc491'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="redbrown">A Muddy Tunnel</h3>
</div>
</div>
	<p>You didn't think it was possible but this place is more muddy than the last.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>
	<input class="goldBG" type="submit" name="input1" value="search" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 492
if ($roomID=='492') {
    $_SESSION['dangerLVL'] = "11";
    $dirSW='active redbrown';
    $dirS='active redbrown';
}
$_SESSION['desc492'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="redbrown">Mud Crab Nest</h3>
</div>
</div>
	<p>The crabs never stop flowing out the walls!</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="south">South</button>
	<button class="redBG" type="submit" name="input1" value="attack">Attack</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 493
if ($roomID=='493') {
    $_SESSION['dangerLVL'] = "18";
    $dirE='active darkblue';
    $dirU='active ocean';
    $dirNW='active darkblue';
}
$_SESSION['desc493'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>An Underwater Alcove</h3>
</div>
</div>
	<p>Sparse patches of glowing coral pop out of the dark ocean floor. Impressive looking statues frame a large door made out of coral to the east.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 494
if ($roomID=='494') {
    $_SESSION['dangerLVL'] = "0";
    $dirW='active darkblue';
}
$_SESSION['desc494'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Underwater Flower Patch</h3>
</div>
</div>
	<p>A bright yellow flower patch grows on the ocean floor here. You see white and gold fish swim in and out of the flowers.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<input class="goldBG" type="submit" name="input1" value="pick flower" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 495
if ($roomID=='495') {
    $_SESSION['dangerLVL'] = "20";
    $dirSE='active darkblue';
    $dirW='active darkblue';
}
$_SESSION['desc495'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Shark Infested Water</h3>
</div>
</div>
	<p>Little fish are scared to swim here due to the many aggressive sharks hunting. You see all sorts of larger fish, sharks and even giant squids swimming in and out of the shadows.  Go west to continue through the shark infested water or head back southeast to return to a slightly safer part of the ocean.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 496
if ($roomID=='496') {
    $_SESSION['dangerLVL'] = "20";
    $dirNW='active darkblue';
    $dirE='active darkblue';
}
$_SESSION['desc496'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Great White Gauntlet</h3>
</div>
</div>
	<p>You see only sharks swimming here, no other fish can survive. You can't even count the number of great whites circling you. You hear a low rumble and then a high pitched scream come from the northwest. Go east to escape this very dangerous area. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 497
if ($roomID=='497') {
    $_SESSION['dangerLVL'] = "18";
    $dirU='active ocean';
}
$_SESSION['desc497'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Secret Underwater Cave</h3>
</div>
</div>
	<p>Fancy jewels and shiny stones jut out of the rocks here. There is plenty of random junk scattered around the ocean floor that you can search through. There is also a glowing green pillar here that you can rest at. After you are done exploring all you can do is return to the surface.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 498
if ($roomID=='498') {
    $_SESSION['dangerLVL'] = "18";
    $dirNW='active darkblue';
}
$_SESSION['desc498'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Underwater Cavern</h3>
</div>
</div>
	<p>The cavern is dim and shadowy, with jagged rocks on most surfaces. Stalagmites and stalactites jut from the ceiling and floor.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 499
if ($roomID=='499') {
    $_SESSION['dangerLVL'] = "25";
    $dirSE='active darkblue';
}
$_SESSION['desc499'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>The Kraken</h3>
</div>
</div>
	<p>You are in the lair of the Kraken. This unique beast attacks by launching multiple spiked projectiles in your direction while having the ability to heal itself and dodge your attacks. The kraken drops some great loot though, due to all the previous explorers and equipment it has consumed throughout the eons.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;


// ---------------------------------------------------- DARK FOREST MAP

// ---------------------------------------------------- 501
if ($roomID=='501') {
    $_SESSION['dangerLVL'] = "20";
    $dirN='active ';
    $dirS='active ';
}
$_SESSION['desc501'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Stone Path Bridge</h3>
</div>
</div>
	<p>A chilly stream flows west to east below your feet. You see many large dark trees to the northeast. Over the bridge to the north you see a Ranger Outpost. Back to the south you see the forest path that leads all the way to Red Town.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 502
if ($roomID=='502') {
    $_SESSION['dangerLVL'] = "0";
    $dirW='active ';
    $dirS='active ';
}
$_SESSION['desc502'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Dark Forest Outpost | Ranger Guard</h3>
</div>
</div>
		<p>A Ranger Outpost is set up here as a deterrent to would be criminals and thieves. Head west to follow the path to the Stone Mountains or south to reach the Forest and Red Town.</p>
	<a href data-link="quests" class="btn goldBG">Dark Forest Outpost Quests </a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="south">South</button>
	</form>
</div></div></html>
HTML;


// ---------------------------------------------------- 503
if ($roomID=='503') {
    $_SESSION['dangerLVL'] = "20";
    $dirW='active ';
    $dirE='active ';
}
$_SESSION['desc503'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Stone Path by the Outpost</h3>
</div>
</div>
	<p>On a rocky stone path between the Highway Mountain Toll  and the Ranger Guard Outpost. Watch out for highwaymen.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 504
if ($roomID=='504') {
    $_SESSION['dangerLVL'] = "20";
    $dirW='active ';
    $dirE='active ';
}
$_SESSION['desc504'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3>Highway Toll | Mountain Gate</h3>
</div>
</div>
	<p>A mean looking Highwayman stands guard at the Toll to the Stone Mountain Map. He’s looking to shake you down, don’t let that happen.</p>
	<p>"Pay up or go back to where you came from!" -Highwayman</p>
	<form id="mainForm" method="post" action="" name="formInput">

	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>

	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	<input class="goldBG" type="submit" name="input1" value="pay toll" />
	<input type="submit" class="redBG h5" name="input1" value="fight highwayman" /><br>
	</form>
</div></html>
HTML;


// ---------------------------------------------------- 505
if ($roomID=='505') {
    $_SESSION['dangerLVL'] = "25";
    $dirNE='active darkgreen';
    $dirNW='active darkgreen';
    $dirS='active darkgreen';
}
$_SESSION['desc505'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkgreen"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="darkgreen">Dark Forest Clearing</h3>
</div>
</div>
	<p>You enter the Dark Forest and immediately notice the trees are much larger and the leaves much darker. You hear grunting and clanging coming from the hill to the north. To the northeast lies a massive stone door. Follow the path northwest through the clearing to get to the rest of the Dark Forest.</p>
	<form id="mainForm" method="post" action="" name="formInput">

	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<input class="darkgreenBG" type="submit" name="input1" value="chop tree" />
	</form>
</div></html>
HTML;


// ---------------------------------------------------- 506
if ($roomID=='506') {
    $_SESSION['dangerLVL'] = "0";
    $dirNW='active darkgreen';
    $dirSE='active darkgreen';
}
$_SESSION['desc506'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkgreen"><i class="fa fa-home"></i></div>
	<div class="roomTitle">
<h3 class="darkgreen">Dark Elf | Tree Hut</h3>
</div>
</div>
	<p>You come across a finely crafted tree hut. The interior is warm and spacious. Impressive wood and stone tools are hanging on the walls, as well as framed paintings. A dark elf sits in a carved rocking chair sipping tea. He has several quests available for the enthusiastic adventurer. Make yourself at home and grab a cup of tea.</p>
	<p>Drinking tea will increase your health and mana regeneration.</p>
	<a href data-link="quests" class="btn goldBG">Dark Elf Quests </a>
	<form id="mainForm" method="post" action="" name="formInput">
	<input type="submit" name="input1" class="greenBG" value="rest" />
	<input type="submit" name="input1" class="greenBG" value="drink tea" />
	<input type="submit" name="input1" class="greenBG" value="grab tea" />
	<button type="submit" name="input1" value="northwest">nw</button>
	<button type="submit" name="input1" value="southeast">se</button>
	</form>
</div></html>
HTML;
// ---------------------------------------------------- 507
if ($roomID=='507') {
    $_SESSION['dangerLVL'] = "25";
    $dirSW='active darkgray';
    $dirE='active darkgreen';
    $dirN='active darkgreen';
    $dirSE='active darkgreen';
}
$_SESSION['desc507'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkgreen"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="darkgreen">Dark Forest Teleport</h3>
</div>
</div>
	<p>A gold pillar stands in the center of a murky pool here. The pillar glows a soft orange and appears to be carved with odd symbols. The trees tower above you, so lush and dense that very little light reaches the ground. To the southeast you see a Tree Hut and to the north you see a faint golden glow coming from the darkness. There is an oak sign here with an iron axe leaning against it.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	<input type="submit" name="input1" class="brownBG" value="grab iron hatchet" />
	<input class="darkgreenBG" type="submit" name="input1" value="chop tree" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 508
if ($roomID=='508') {
    $_SESSION['dangerLVL'] = "25";
    $dirNE='active darkgreen';
    $dirW='active darkgreen';
}
$_SESSION['desc508'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkgreen"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="darkgreen">Dark Path</h3>
</div>
</div>
	<p>You’re on a path through the forest. It’s getting dark. To the west lies the Dark Forest Teleport. To the northeast you hear many strange screeching and howling sounds.</p>
	<form id="mainForm" method="post" action="" name="formInput">

	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<input class="darkgreenBG" type="submit" name="input1" value="chop tree" />
	</form>
</div></html>
HTML;

// ---------------------------------------------------- 509
if ($roomID=='509') {
    $_SESSION['dangerLVL'] = "25";
    $dirSE='active darkgreen';
    $dirSW='active darkgreen';
}
$_SESSION['desc509'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkgreen"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="darkgreen">Dark Grove</h3>
</div>
</div>
	<p>A small, unique group of <span class="blue">darkgreen</span> trees grows here. You are surrounded by the dark forest in all directions. You feel like you might be lost here, but you are not.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	<input class="darkgreenBG" type="submit" name="input1" value="chop tree" />
	<input class="goldBG" type="submit" name="input1" value="search" />
	</form>
</div></html>
HTML;

// ---------------------------------------------------- 510
if ($roomID=='510') {
    $_SESSION['dangerLVL'] = "25";
    $dirNW='active darkgreen';
    $dirW='active darkgreen';
}
$_SESSION['desc510'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkgreen"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="darkgreen">Bloody Path</h3>
</div>
</div>
	<p>Damn. Things just got bloody. The red splattered path turns west here up to the top of a hill where you hear grunting and clanging. Return northwest to the grove.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="west">West</button>
	<input class="darkgreenBG" type="submit" name="input1" value="chop tree" />
	</form>
</div></html>
HTML;


// ---------------------------------------------------- 511
if ($roomID=='511') {
    $_SESSION['dangerLVL'] = "35";
    $dirE='active darkgreen';
    $dirSW='active darkgreen';
    $dirW='active darkgreen';
}
$_SESSION['desc511'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkgreen"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="darkgreen">Champion's Camp</h3>
</div>
</div>
	<p>Only the strongest trolls make it to the top of the hill. Remain and they will try to smash your face in. You can attempt to search all the scattered equipment if you can withstand the beating.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="east">East</button>
	<input class="darkgreenBG" type="submit" name="input1" value="chop tree" />
	<input class="goldBG" type="submit" name="input1" value="flip lever" />
	<input class="goldBG" type="submit" name="input1" value="search" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 512
if ($roomID=='512') {
    $_SESSION['dangerLVL'] = "25";
    $dirSW='active darkgreen';
    $dirN='active darkgreen';
}
$_SESSION['desc512'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkgreen"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="darkgreen">Dark Forest Silver Chest</h3>
</div>
</div>
	<p>A vine covered silver chest sits between 2 massive trees here at the edge of a steep ledge. You can jump north off the ledge, or return southwest through the open stone doors.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<input class="darkgreenBG" type="submit" name="input1" value="chop tree" />
	<input class="lightblueBG darkestgray" type="submit" name="input1" value="open silver chest" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 513
if ($roomID=='513') {
    $_SESSION['dangerLVL'] = "25";
    $dirNW='active darkgreen';
    $dirS='active darkgreen';
}
$_SESSION['desc513'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkgreen"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="darkgreen">Dark Forest Gold Chest</h3>
</div>
</div>
	<p>Surrounded by thorny bushes this gold chest sits on a wide stump. There are large trees all around you, especially to the north. To the northwest you see an iron fence and an open gate.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="south">South</button>
	<input class="darkgreenBG" type="submit" name="input1" value="chop tree" />
	<input class="goldBG" type="submit" name="input1" value="open gold chest" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 514
if ($roomID=='514') {
    $_SESSION['dangerLVL'] = "25";
    $dirN='active darkgreen';
    $dirNE='active darkgreen';
    $dirE='active darkgreen';
    $dirSE='active darkgreen';
    $dirS='active darkgreen';
    $dirSW='active darkgreen';
    $dirW='active darkgreen';
    $dirNW='active darkgreen';
}


$_SESSION['desc514'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkgreen"></div>
	<div class="roomTitle">
<h3 class="darkgreen">Lost in the Trees</h3>
</div>
</div>
	<p>You appear to be lost. Trees tower around you in all directions.</p>
	<form id="mainForm" method="post" action="" name="formInput">
	<input class="darkgreenBG" type="submit" name="input1" value="chop tree" />
	</form>
</div></html>
HTML;

// ---------------------------------------------------- 515
if ($roomID=='515') {
    $_SESSION['dangerLVL'] = "0";
    $dirU='active dgreen';
}
$_SESSION['desc515'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon dgreen"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="dgreen">Ranger's Guild</h3>
</div>
</div>
	<p>A wooden ladder ascends up the side of an enormous tree here. Up in the tree tops you see many wooden structures. Every now and then you see a ranger quickly climb up or down the tree.</p>
  <a href data-link="quests" class="btn dgreenBG">Quests </a>

	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="up">Up</button>
	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 515a
if ($roomID=='515a') {
    $_SESSION['dangerLVL'] = "0";
    $dirN='active dgreen';
    $dirS='active dgreen';
    $dirW='active dgreen';
    $dirE='active dgreen';
}
$_SESSION['desc515a'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon dgreen"><i class="icon-bow-arrow"></i></div>
	<div class="roomTitle">
<h3 class="dgreen">Ranger’s Guild Lobby</h3>
</div>
</div>
	<p>The Ranger’s Lobby is quite cozy. Rest at the burning fire or exchange some exciting adventure stories with your fellow Rangers.</p>
	<p>N - Ranger Quests<br>
	E - Silver Shaman<br>
	S - Ranger Skills/Spells<br>
	W - Ranger Shop </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="east">East</button>
	<input class="goldBG" type="submit" name="input1" value="cook all meat" />
	<input class="goldBG" type="submit" name="input1" value="grab ranger pack" />
	<input class="greenBG" type="submit" name="input1" value="rest" />
	</form>
</div></div></html>
HTML;
// ---------------------------------------------------- 515b
if ($roomID=='515b') {
    $_SESSION['dangerLVL'] = "0";
    $dirS='active dgreen';
    $dirSW='active dgreen';
    $dirSE='active dgreen';
}
$_SESSION['desc515b'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon dgreen"><i class="icon-bow-arrow"></i></div>
	<div class="roomTitle">
<h3 class="dgreen">Lego's Quests</h3>
</div>
</div>
	<p>Young Ranger Lego is just chillin here re-stringing his bow and crafting some arrows. He has 3 quests for you to complete.</p>
	<a href data-link="quests" class="btn goldBG">Ranger Quests</a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 515c
if ($roomID=='515c') {
    $_SESSION['dangerLVL'] = "0";
    $dirNW='active dgreen';
    $dirSW='active dgreen';
    $dirW='active dgreen';
    $dirD='active darkgreen';
}
$_SESSION['desc515c'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon dgreen"><i class="icon-bow-arrow"></i></div>
	<div class="roomTitle">
<h3 class="dgreen">Silver Shaman | Silver Aura</h3>
</div>
</div>
	<p>The Silver Shaman can be seen levitating in the corner of this fancy room.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="down">Down</button>
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	<input class="lightblueBG darkestgray" type="submit" name="input1" value="learn silver aura" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 515d
if ($roomID=='515d') {
    $_SESSION['dangerLVL'] = "0";
    $dirN='active dgreen';
    $dirNW='active dgreen';
    $dirNE='active dgreen';
}
$_SESSION['desc515d'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon dgreen"><i class="icon-bow-arrow"></i></div>
	<div class="roomTitle">
<h3 class="dgreen">Ranger Skills & Spells</h3>
</div>
</div>
	<p>Only the most skilled guild members are here to distill their knowledge of the bow. </p>
	<a href data-link2="skills" class="btn purpleBG">Skills </a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 515e
if ($roomID=='515e') {
    $_SESSION['dangerLVL'] = "0";
    $dirNE='active dgreen';
    $dirSE='active dgreen';
    $dirD='active dgreen';
    $dirE='active dgreen';
}
$_SESSION['desc515e'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon dgreen"><i class="icon-bow-arrow"></i></div>
	<div class="roomTitle">
<h3 class="dgreen">Ranger Shop</h3>
</div>
</div>
	<p>Welcome to the Ranger’s Guild Shop. Guild Merchant Flynn has some great weapons, armor and ammo for sale. The Guild’s Main Lobby is to the east. Lego is offering quests to the northeast and you can learn some great new skills to the southeast. Welcome Ranger.</p>
  <a class="btn goldBG" data-link="shop">Shop</a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="down">Down</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;













// ---------------------------------------------------- 516
if ($roomID=='516') {
    $_SESSION['dangerLVL'] = "25";
    $dirW='active darkergray';
    $dirNE='active darkgreen';
    $dirSE='active darkgreen';
}
$_SESSION['desc516'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3 class="darkgreen">Dark Keep Courtyard</h3>
</div>
</div>
	<p>This fenced in courtyard is dark and creepy. There are gruesome statues and twisted stone paths all around. You see the Dark Keep looming in the fog to the west.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	<input class="darkgreenBG" type="submit" name="input1" value="chop tree" />
	</form>
</div></div></html>
HTML;


// ---------------------------------------------------- 516a
if ($roomID=='516a') {
    $_SESSION['dangerLVL'] = "40";
    $dirW='active darkergray';
    $dirE='active darkergray';
    $dirSW='active darkergray';
    $dirS='active darkergray';
}
$_SESSION['desc516a'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkergray"><i class="ra ra-tower"></i></div>
	<div class="roomTitle">
<h3 class="darkergray">Dark Keep Main Hall</h3>
</div>
</div>
	<p>You are in the main gathering hall of the Dark Keep. Paths go to the west and south. There is a solid steel door to the southwest.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 516b
if ($roomID=='516b') {
    $_SESSION['dangerLVL'] = "40";
    $dirE='active darkergray';
}
$_SESSION['desc516b'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkergray"><i class="ra ra-tower"></i></div>
	<div class="roomTitle">
<h3 class="darkergray">Dark Keep Storeroom</h3>
</div>
</div>
	<p>You can rummage through this dusty storeroom. Beware of evil beasts though. There is a lever on the wall here.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="east">East</button>
	<input class="goldBG" type="submit" name="input1" value="flip lever" />
	<input class="goldBG" type="submit" name="input1" value="search" />
	</form>
</div></div></html>
HTML;


// ---------------------------------------------------- 516c
if ($roomID=='516c') {
    $_SESSION['dangerLVL'] = "40";
    $dirN='active darkergray';
}
$_SESSION['desc516c'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkergray"><i class="ra ra-tower"></i></div>
	<div class="roomTitle">
<h3 class="darkergray">Dark Keep Burial Chamber</h3>
</div>
</div>
	<p>There are many stone coffins in this room. Most are closed, but some are open. There is a lever on the wall here.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<input class="goldBG" type="submit" name="input1" value="flip lever" />
	</form>
</div></div></html>
HTML;


// ---------------------------------------------------- 516d
if ($roomID=='516d') {
    $_SESSION['dangerLVL'] = "60";
    $dirU='active darkergray';
    $dirNE='active darkergray';
}
$_SESSION['desc516d'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkergray"><i class="ra ra-tower"></i></div>
	<div class="roomTitle">
<h3 class="darkergray">Dark Stairwell</h3>
</div>
</div>
	<p>A winding stone stairwell makes it’s way up the keep here. Beware the stairwell guardian, a beast made completely of stone.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="up">Up</button>
	</form>
</div></div></html>
HTML;




// ---------------------------------------------------- 516e
if ($roomID=='516e') {
    $_SESSION['dangerLVL'] = "55";
    $dirN='active darkergray';
    $dirE='active darkergray';
    $dirNE='active darkergray';
    $dirD='active darkergray';
}
$_SESSION['desc516e'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkergray"><i class="ra ra-tower"></i></div>
	<div class="roomTitle">
<h3 class="darkergray">Top of the Stairwell</h3>
</div>
</div>
	<p>You’ve made it to the top of the Keep. A massive ornate door stands to your northeast.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 516f
if ($roomID=='516f') {
    $_SESSION['dangerLVL'] = "55";
    $dirW='active darkergray';
}
$_SESSION['desc516f'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkergray"><i class="ra ra-tower"></i></div>
	<div class="roomTitle">
<h3 class="darkergray">Dark Keep Barracks</h3>
</div>
</div>
	<p>All sorts of elite weapons and armor are stored in this room. Flip the switch or search through the rows of equipment.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<input class="goldBG" type="submit" name="input1" value="flip lever" />
	<input class="goldBG" type="submit" name="input1" value="search" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 516g
if ($roomID=='516g') {
    $_SESSION['dangerLVL'] = "55";
    $dirS='active darkergray';
}
$_SESSION['desc516g'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkergray"><i class="ra ra-tower"></i></div>
	<div class="roomTitle">
<h3 class="darkergray">Paladin Altar</h3>
</div>
</div>
	<p>The most holy of site’s for the disciplined paladins who guard the prince’s throne room. They will not allow you to desecrate it with your demonic presence any further.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="south">South</button>
	<input class="goldBG" type="submit" name="input1" value="flip lever" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 516h
if ($roomID=='516h') {
    $_SESSION['dangerLVL'] = "55";
    $dirSW='active darkergray';
}
$_SESSION['desc516h'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkergray"><i class="ra ra-death-skull"></i></div>
	<div class="roomTitle">
<h3 class="darkergray">Dark Throne</h3>
</div>
</div>
	<p>A crown sits atop an impressive steel throne. This giant throne room has the largest windows in the keep. Glancing to the east you see the magnificent Dark Forest. The trees continue to tower much higher than you already are. To the north you see a light greenish pillar of light. Beyond that you think you see an even Darker Forest, but that’s for another time. Right now there’s a crown.</p>
	<form id="mainForm" method="post" action="" name="formInput">
	<input class="goldBG" type="submit" name="input1" value="grab crown" />
	<button type="submit" name="input1" value="southwest">Southwest</button>
	</form>
</div></div></html>
HTML;





















// ---------------------------------------------------- 517
if ($roomID=='517') {
    $_SESSION['dangerLVL'] = "25";
    $dirN='active darkgreen';
    $dirSE='active darkgreen';
    $dirSW='active darkgreen';
}
$_SESSION['desc517'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkgreen"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="darkgreen">Dark Thicket</h3>
</div>
</div>
	<p>You are surrounded by dense thicket. A solid gold gate blocks the way to the north.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	<input class="darkgreenBG" type="submit" name="input1" value="chop tree" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 518
if ($roomID=='518') {
    $_SESSION['dangerLVL'] = "25";
    $dirE='active darkgreen';
    $dirNW='active darkgreen';
}
$_SESSION['desc518'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkgreen"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="darkgreen">Dark Twisted Path</h3>
</div>
</div>
	<p>The path gets really dark here and has many sharp twists and turns. Go east to head further into the forest or northwest to go back into the thicket. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="east">East</button>
	<input class="darkgreenBG" type="submit" name="input1" value="chop tree" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 519
if ($roomID=='519') {
    $_SESSION['dangerLVL'] = "25";
    $dirE='active darkgreen';
    $dirW='active darkgreen';	
}
$_SESSION['desc519'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkgreen"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="darkgreen">By a Fallen Tree</h3>
</div>
</div>
	<p>A giant tree has fallen here. You have to navigate around the massive trunk and through many twisted branches. The path continues to the east.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
	<input class="darkgreenBG" type="submit" name="input1" value="chop tree" />
	<input class="goldBG" type="submit" name="input1" value="search" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 520
if ($roomID=='520') {
    $_SESSION['dangerLVL'] = "25";
    $dirW='active darkgreen';
    $dirNW='active darkgreen';
}
$_SESSION['desc520'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkgreen"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="darkgreen">Thorny Path</h3>
</div>
</div>
	<p>The path gets all twisty again here. Large thorny bushes are scattered all over. be careful or you’ll get stuck.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<input class="darkgreenBG" type="submit" name="input1" value="chop tree" />
	</form>
</div></div></html>
HTML;



// ---------------------------------------------------- 521
if ($roomID=='521') {
    $_SESSION['dangerLVL'] = "40";
    $dirNW='active darkgreen';
    $dirSE='active darkgreen';
    $dirNE='active darkgreen';
}
$_SESSION['desc521'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkgreen"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="darkgreen">Dark Forest Troll Nest</h3>
</div>
</div>
	<p>You are in the heart of the Dark Forest where the magical Troll Queen guards the nest. There is an opening in the trees to the northwest and northeast. Go southeast to return to the path.
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	<input class="darkgreenBG" type="submit" name="input1" value="chop tree" />
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 522
if ($roomID=='522') {
    $_SESSION['dangerLVL'] = "0";
    $dirSE='active darkgreen';
	//A large topaz pillar stands in the center of this secluded area in the Dark Forest. The Demigod of Defense can be summoned by simply attacking.
}

$_SESSION['desc522'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3 class="darkgreen">Empty Arena</h3>
</div>
</div>
	<p>You stand in an empty arena surrounded by tall trees that block out most of the sunlight. The arena floor is made of ancient, worn-down stone that has been overgrown with moss and ivy. Despite its abandoned state, there is still a sense of foreboding and danger in the air, as if the arena is waiting for its next battle to begin.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 523
if ($roomID=='523') {
    $_SESSION['dangerLVL'] = "45";
    $dirSW='active darkgreen';
}
$_SESSION['desc523'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkgreen"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="darkgreen">Troll King</h3>
</div>
</div>
	<p>You are in the deepest and darkest part of the forest. It is dominated by the Troll King.</p>
	<p>The King doesn’t have particularly high health or impressive stats but attacks with such vicious blows you can be torn to shreds in seconds if you’re not careful.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<input class="darkgreenBG" type="submit" name="input1" value="chop tree" />
	</form>
</div></div></html>
HTML;


// ---------------------------------------------------- 524
if ($roomID=='524') {
    $_SESSION['dangerLVL'] = "0";
    $dirD='active darkestgray';
    $dirS='active darkgreen';
    $dirW='active darkgreen';
}
$_SESSION['desc524'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkestgray"><i class="icon-cave"></i></div>
	<div class="roomTitle">
<h3 class="darkestgray">Top of the Despair</h3>
</div>
</div>
	<p>You get an uneasy feeling when you lean into the darkness below
</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="south">South</button>
	<button  class="dddgrayBG" type="submit" name="input1" value="down">Down</button>
	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 525
if ($roomID=='525') {
    $_SESSION['dangerLVL'] = "80";
    $dirE='active darkgreen';
}
$_SESSION['desc525'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkgreen"><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="darkgreen">Test of Light | Forest Princess</h3>
</div>
</div>
	<p>The beautiful forest princess is here. Battle her if you wish to be tested, or rest and feel great.</p>
	<form id="mainForm" method="post" action="" name="formInput">
	<button class="greenBG" type="submit" name="input1" value="rest">Rest</button>	
	<button class="brownBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
	<button type="submit" name="input1" value="east">East</button>
	<input class="darkgreenBG " type="submit" name="input1" value="battle forest princess" />
	</form>
</div></html>
HTML;

















// ---------------------------------------------------- MOUNTAIN MAP

// ---------------------------------------------------- 601;
if ($roomID=='601') {
    $_SESSION['dangerLVL'] = "35";
    $dirE='active ';
    $dirW='active ';
}
$_SESSION['desc601'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mountain Path by the Dark Forest</h3>
</div>
</div>
	<p>The stone path continues west up the mountain. The path east will take you back to the forest. To the northwest you see a large patch of spruce trees growing on the mountain side.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;


// ---------------------------------------------------- 602;
if ($roomID=='602') {
    $_SESSION['dangerLVL'] = "35";
    $dirE='active ';
    $dirNW='active ';
}
$_SESSION['desc602'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mountain Path</h3>
</div>
</div>
	<p>The most generic mountain path you can think of.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></div></html>
HTML;



// ---------------------------------------------------- 603;
if ($roomID=='603') {
    $_SESSION['dangerLVL'] = "35";
    $dirE='active dgreen';
    $dirSW='active ';
    $dirSE='active ';
    $dirNW='active ';
}
$_SESSION['desc603'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon dgreen "><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="gray"><span class="dgreen">Wooded</span> Mountain Path</h3>
</div>
</div>
	<p>There are a few trees lining the mountain path here. You see many more trees to the east. You hear a faint noise come from the west.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;




// ---------------------------------------------------- 604;
if ($roomID=='604') {
    $_SESSION['dangerLVL'] = "35";
    $dirNE='active ';
}
$_SESSION['desc604'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon gray"><i class="ra ra-spawn-node"></i></div>
	<div class="roomTitle">
<h3 class="gray">Mountain Alcove</h3>
</div>
</div>
<p>You are inside a snowy alcove in the mountains. A bubbling stream travels east. You see a faint silver structure far to the west and to the northeast you see some tall trees.</p>
<form id="mainForm" method="post" action="" name="formInput">
<button type="submit" name="input1" value="northeast">Northeast</button>
</form>
</div></html>
HTML;


// ---------------------------------------------------- 605;
if ($roomID=='605') {
    $_SESSION['dangerLVL'] = "35";
    $dirW='active ';
    $dirSW='active ';
    $dirSE='active ';
    $dirNW='active ';
}
$_SESSION['desc605'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon sand"><i class="icon-sun"></i></div>
	<div class="roomTitle">
<h3 class="lgray">Snowy Mountain Clearing</h3>
</div>
</div>
	<p>The chilly air gets warmer here in this large clearing. Mountains surround you in all directions. There is a sign here. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>

	</form>
</div></div></html>
HTML;




// ---------------------------------------------------- 606;
if ($roomID=='606') {
    $_SESSION['dangerLVL'] = "0";
    $dirS='active ';
}
$_SESSION['desc606'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3 class="gray">Abandoned Campsite & Lift</h3>
</div>
</div>
	<p>A functioning lift is all that remains in this desolate campsite. Talk to Merl the lift operator if you want to take it. You see a river flowing to the east and a shiny tower off in the distance to the west.
	<form id="mainForm" method="post" action="" name="formInput">
	<input type="submit" class=" blueBG " name="input1" value="take lift north" /> One Way Lift Ticket: 500 coin
	</form>
</div></html>
HTML;


// ---------------------------------------------------- 607
if ($roomID=='607') {
    $_SESSION['dangerLVL'] = "0";
    $dirN='active ';
    $dirNE='active ';
}
$_SESSION['desc607'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon red"><i class="ra ra-campfire"></i></div>
	<div class="roomTitle">
<h3 class="gray">Stone Mountain <span class="brown">Base Camp</span></h3>
</div>
</div>
	<p>There are several tents set up here by explorers preparing for their next adventure. A big camp fire burns here. To the north you see the Blue Guard Outpost. Take the lift south to get back to the Grassy Field.</p>
	<a href data-link="quests" class="btn goldBG">Base Camp Quests </a>
	<form id="mainForm" method="post" action="" name="formInput">
	<input type="submit" class=" blueBG " name="input1" value="take lift south" /> One Way Lift Ticket: 500 coin
	<br>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>

   </form>
</div></html>
HTML;



// ---------------------------------------------------- 608
if ($roomID=='608') {
    $_SESSION['dangerLVL'] = "0";
    $dirN='active ';
    $dirE='active ';
    $dirS='active ';
    $dirW='active ';
}
$_SESSION['desc608'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon blue"><i class="ra ra-tower"></i></div>
	<div class="roomTitle">
<h3 class="gray"><span class="blue">Blue Guard</span> Mountain Outpost</h3>
</div>
</div>
	<p>A sturdy outpost made out of stone and wood stands here. Occupied by the Blue Guard, they keep this area safe. You can reach Star City by going west and more mountains by going east. Talk to Hector the Blue Guard Captain for some quests.</p>
	<a href data-link="quests" class="btn goldBG">Mountain Outpost Quests </a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="west">West</button>
   </form>
</div></html>
HTML;


// ---------------------------------------------------- 609
if ($roomID=='609') {
    $_SESSION['dangerLVL'] = "0";
    $dirNE='active ';
    $dirS='active ';
    $dirSE='active ';
}
$_SESSION['desc609'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon brown"><i class="fa fa-home"></i></div>
   	<div class="roomTitle">
<h3 class="gray">Chilly Pete <span class="brown"> Mountain Cabin</span></h3>
</div>
</div>
	<p>Chilly Pete has a nice cabin set up here in the Mountains. You're surprised at how chilly it is even though there’s a fire burning. There is some tea available for adventurers passing through.</p>
	<a href data-link="quests" class="btn goldBG">Chilly Pete's Quests </a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	<input type="submit" name="input1" class="greenBG" value="get tea" />
	<input type="submit" name="input1" class="greenBG" value="drink tea" />
   </form>
</div></html>
HTML;





// ---------------------------------------------------- 610
if ($roomID=='610') {
    $_SESSION['dangerLVL'] = "0";
    $dirE='active ';
    $dirW='active ';
    $dirSW='active blue ';
	//		You stand in the master’s courtyard. Marble pillars surround a hooded man levitating off the ground. Without saying a word he can teach you pro skills. Looking west you see the Gates to Star City, to the east the Blue Guard Outpost.
}
$_SESSION['desc610'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon darkblue"><i class="ra ra-hood"></i></div>
   	<div class="roomTitle">
<h3 class="gray">Master Trainer <span class="blue">Master Skills</span></h3>
</div>
</div>
	<p>	In the master's courtyard, you find yourself standing among marble pillars. In the center, a hooded man is floating off the ground. He is able to impart valuable skills without uttering a single word. To the west, you see the Gates to Star City, and to the east lies the Blue Guard Outpost.
	</p>
	<form id="mainForm" method="post" action="" name="formInput">
	<a href data-link2="skills" class="btn purpleBG">Skills </a>
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
   </form>
</div></html>
HTML;





// ---------------------------------------------------- 611
if ($roomID=='611') {
    $_SESSION['dangerLVL'] = "0";
    $dirE='active ';
    $dirW='active ';
}
$_SESSION['desc611'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
   	<div class="roomIcon blue"><i class="ra ra-bridge"></i></div>
	<div class="roomTitle">
<h3 class="gray">Star City <span class="blue">Blue Gate</span></h3>
</div>
</div>
	<p>You stand at the main gate to the city. It is an elaborate shiny structure, consisting of many moving pieces all clicking and popping in complex synchronization. Massive stone walls travel far to the north and south. Standing tall by the gate is Rigel the Knight.</p>
	<a href data-link="quests" class="btn goldBG">Blue Gate Quest </a>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
   </form>
</div></html>
HTML;




// ---------------------------------------------------- 612
if ($roomID=='612') {
    $_SESSION['dangerLVL'] = "35";
    $dirNE='active ';
    $dirW='active ';
}
$_SESSION['desc612'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon dgreen"><i class="ra ra-pine-tree"></i><i class="ra ra-pine-tree"></i></div>
	<div class="roomTitle">
<h3 class="gray">In the Mountains Surrounded by <span class="dgreen">Trees</span></h3>
</div>
</div>
	<p>Now we’re talking. It’s a lumberjack’s dream. You’re surrounded by massive trees in all directions.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<input class="dgreenBG" type="submit" name="input1" value="chop tree" />
   </form>
</div></html>
HTML;



// ---------------------------------------------------- 613
if ($roomID=='613') {
    $_SESSION['dangerLVL'] = "35";
    $dirNW='active ';
    $dirSW='active ';
}
$_SESSION['desc613'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
   	<div class="roomTitle">
<h3 class="lgray">Foggy Mountain Path</h3>
</div>
</div>
	<p>The dense fog makes it difficult to see where the path is going. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="northwest">Northwest</button>
   </form>
</div></html>
HTML;




// ---------------------------------------------------- 614
if ($roomID=='614') {
    $_SESSION['dangerLVL'] = "35";
    $dirSE='active ';
    $dirW='active ';
}
$_SESSION['desc614'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
   	<div class="roomTitle">
<h3 class="gray"><span class="blue">Icy</span> Mountain Path</h3>
</div>
</div>
	<p>The mountain path is dangerously slippery here. Proceed with caution.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southeast">Southeast</button>
	<button type="submit" name="input1" value="west">West</button>
   </form>
</div></html>
HTML;




// ---------------------------------------------------- 615
if ($roomID=='615') {
    $_SESSION['dangerLVL'] = "35";
    $dirS='active ';
}
$_SESSION['desc615'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
    <div class="roomTitle">
<h3 class="darkgray">Bottom of a Ledge</h3>
</div>
</div>
	<p>You are in cold, dank pit. The only way out is to crawl up the south ledge.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="south">South</button>
   </form>
</div></html>
HTML;



// ---------------------------------------------------- 616
if ($roomID=='616') {
    $_SESSION['dangerLVL'] = "30";
}
$_SESSION['desc616'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Cathedral Graveyard</h3>
</div>
</div>
	<p>You are lost in a gloomy graveyard. You might find your way out, but probably not.</p>
	<form id="mainForm" method="post" action="" name="formInput">

   </form>
</div></html>
HTML;



// ---------------------------------------------------- 617
if ($roomID=='617') {
    $_SESSION['dangerLVL'] = "50";
    $dirE='active ';
    $dirSW='active ';
}
$_SESSION['desc617'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
   	<div class="roomTitle">
<h3 class="gray">Stone Mountain Peak</h3>
</div>
</div>
	<p>You stand atop of the highest mountain peak. The largest giants wander around at this altitude. Stay frosty. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
   </form>
</div></html>
HTML;




// ---------------------------------------------------- 618
if ($roomID=='618') {
    $_SESSION['dangerLVL'] = "35";
    $dirNE='active green';
    $dirSW='active ';
    $dirW='active ';
}
$_SESSION['desc618'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Deserted Mountain Campsite</h3>
</div>
</div>
	<p>The remains of a camp and fire are here. To the west you see a stone bridge and to the northeast the path continues to the cathedral.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="west">West</button>
   </form>
</div></html>
HTML;



// ---------------------------------------------------- 619
if ($roomID=='619') {
    $_SESSION['dangerLVL'] = "55";
    $dirE='active ';
    $dirW='active ';
}
$_SESSION['desc619'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Mountain Bridge</h3>
</div>
</div>
	<p>You walk on a stone bridge spanning over a large chasm below. The air here is frigid and brisk. You see a broken sign on the ground reading “Do not try to cross! Beware the Gatekeeper!”</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="west">West</button>
   </form>
</div></html>
HTML;




// ---------------------------------------------------- 620
if ($roomID=='620') {
    $_SESSION['dangerLVL'] = "45";
    $dirE='active ';
}
$_SESSION['desc620'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Dragon’s Ledge</h3>
</div>
</div>
	<p>You stand at the edge of a mountain cliff overlooking the chasms below. To the northwest there is a vast expanse of unexplored mountains shining in the light. To the east is the stone bridge.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="east">East</button>
	<input class="goldBG" type="submit" name="input1" value="pick flower" />
   </form>
</div></html>
HTML;





// ---------------------------------------------------- 621
if ($roomID=='621') {
    $_SESSION['dangerLVL'] = "40";
    $dirE='active purple';
    $dirSW='active ';
}
$_SESSION['desc621'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
   	<div class="roomTitle">
<h3 class="darkergray">Cathedral Courtyard</h3>
</div>
</div>
	<p>Beware the gargoyle statues in this courtyard, for most of them are not statues. There is a gold chest placed in the center of a circular stone path. Go east to enter the cathedral, or southwest to return to the mountains.</p>
	<form id="mainForm" method="post" action="" name="formInput">
	<div class="roomIcon gold"><i class="icon-chest"></i></div>
	<input class="goldBG" type="submit" name="input1" value="open chest" />
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="east">East</button>
   </form>
</div></html>
HTML;




// ---------------------------------------------------- 622
if ($roomID=='622') {
    $_SESSION['dangerLVL'] = "50";
    $dirE='active purple';
    $dirW='active green';
}
$_SESSION['desc622'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
   	<div class="roomTitle">
<h3 class="gold">Cathedral Nave</h3>
</div>
</div>
	<p>You stand in the largest and most decorated room of the cathedral. Pillars and walls with intricate sculptures frame out ancient paintings and ornate tapestries. The is a carved marble fount here filled with holy water. There are many dark corners and shadows to be weary of. Head west to leave the cathedral or east to get to the main altar.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
   </form>
</div></html>
HTML;


// ---------------------------------------------------- 623
if ($roomID=='623') {
    $_SESSION['dangerLVL'] = "60";
    $dirW='active purple';
}
$_SESSION['desc623'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
   	<div class="roomTitle">
<h3 class="purple">Cathedral Altar</h3>
</div>
</div>
	<p>Marble stairs lead up to an altar decorated with rare stones and gems. Candles burn on every surface of the altar as well as the walls around you. The uneasy feeling in this room is almost unbearable.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
   </form>
</div></html>
HTML;



// ---------------------------------------------------- 625
if ($roomID=='625') {
    $_SESSION['dangerLVL'] = "45";
    $dirSE='active ';
}
$_SESSION['desc625'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Silver Temple</h3>
</div>
</div>
	<p>A simple glimmering tower stands here will a large arena before its entrance. Proud silver laden champions stand patiently around the arena ready to test those ready. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southeast">se</button>
   </form>
</div></html>
HTML;

// ---------------------------------------------------- STAR CITY MAP
// ---------------------------------------------------- 701
if ($roomID=='701') {
	$_SESSION['dangerLVL'] = "0";
	$dirE='active lgray';
}
$_SESSION['desc701'] = <<<HTML
	<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon gray"><i class="ra ra-campfire"></i></div>
	<div class="roomTitle">
<h3 class="gray">Camp Hero</span></h3>
</div>
</div>
	<p>Now this is a proper camp for a proper hero. There is a breathtaking view of Star City to the west. There are many areas to sit and mingle here and some food and supplies to grab. Rest at the fountain and feel fantastic.</p>
	<form id="mainForm" method="post" action="" name="formInput">
	<a href data-link2="skills" class="btn purpleBG">Skills </a>
	<a href data-link2="spells" class="btn purpleBG">Spells </a>
	<button class="greenBG" type="submit" name="input1" value="rest">Rest</button>
	<button type="submit" name="input1" value="east">East</button>
	</form>
</div></html>
HTML;
//	<input class="darkgreenBG" type="submit" name="input1" value="chop tree" />


		// Quests - 
		// Jikay
		// Jiemji

	//	Skills - 
	//	30 - 1h, 2h, ranged, warcraft
	//	20 - Slice, smash, aim, magic strike
	//	30 - Toughness, Block


// ---------------------------------------------------- SWAMP MAP

// ---------------------------------------------------- 801
if ($roomID=='801') {
 //   $_SESSION['dangerLVL'] = "0";
  //  $dirW='active swamp';
  //  $dirE='active swamp';
}
$_SESSION['desc801'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="swamp">Swamp Path near the Rocky Flats</span></h3>
</div>
</div>
	<p>A swampy path</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
   </form>
</div></html>
HTML;
// ---------------------------------------------------- 802
if ($roomID=='802') {
    $_SESSION['dangerLVL'] = "0";
    $dirW='active swamp';
    $dirE='active swamp';
	$dirNW='active dgray';
    $dirN='active dgray';
    $dirNE='active dgray';
}
$_SESSION['desc802'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="blue">Arcturus - Star City Wizard</span></h3>
</div>
</div>
	<p>A swampy path</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="east">East</button>
   </form>
</div></html>
HTML;
// ---------------------------------------------------- 803
if ($roomID=='803') {
    $_SESSION['dangerLVL'] = "0";
    $dirNW='active swamp';
    $dirE='active swamp';
}
$_SESSION['desc803'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
   <div class="roomTitle">
<h3 class="swamp">Junk Collector</span></h3>
</div>
</div>
   <h4 class="gold">Sell your junk here</span></h3>
</div>
</div>
	<p>A grimy junk collector has a broken down shop set up here. Instead of items to sell though, he wants to buy your junk.</p>
	<form id="mainForm" method="post" action="" name="formInput">
	<a class="btn goldBG" data-link="shop">Open Shop</a>

	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="east">East</button>
   </form>
</div></html>
HTML;
// ---------------------------------------------------- 804
if ($roomID=='804') {
    $_SESSION['dangerLVL'] = "0";
    $dirN='active ocean';
    $dirSE='active swamp';
}
$_SESSION['desc804'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="swamp">Swamp Path near the Ocean</span></h3>
</div>
</div>
	<p>A swampy path</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
   </form>
</div></html>
HTML;

// ---------------------------------------------------- 805
if ($roomID=='805') {
    $_SESSION['dangerLVL'] = "0";
    $dirSE='active swamp';
}
$_SESSION['desc805'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="dgray">Awesome Weapons</span></h3>
</div>
</div>
	<p>A swampy path</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southeast">Southeast</button>
   </form>
</div></html>
HTML;
// ---------------------------------------------------- 806
if ($roomID=='806') {
    $_SESSION['dangerLVL'] = "0";
    $dirS='active swamp';
}
$_SESSION['desc806'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="gold">Mage Ultima</span></h3>
</div>
</div>
	<p>A swampy path</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="south">South</button>
   </form>
</div></html>
HTML;
// ---------------------------------------------------- 807
if ($roomID=='807') {
    $_SESSION['dangerLVL'] = "0";
    $dirSW='active swamp';
}
$_SESSION['desc807'] = <<<HTML
   <html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomTitle">
<h3 class="dgray">Quest Rewards</span></h3>
</div>
</div>
	<p>A swampy path</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="southwest">Southwest</button>
   </form>
</div></html>
HTML;




// ---------------------------------------------------- DESPAIR

// ---------------------------------------------------- 901
if ($roomID=='901') {
	$_SESSION['dangerLVL'] = "0";
	$dirU='active darkgreen';
	$dirE='active black';
}
$_SESSION['desc901'] = <<<HTML
 <html><div class="roomBox">
<div class="roomIconTitle">
 <div class="roomTitle">
<h3 class="ddgray">The Despair</span></h3>
</div>
</div>
 <p class="gray">Go up to exit</p>
 <form id="mainForm" method="post" action="" name="formInput">
 <button class="ddgrayBG" type="submit" name="input1" value="up">Up</button>
 <button class="ddgrayBG" type="submit" name="input1" value="east">East</button>
 </form>
 </div></html>
HTML;
// ---------------------------------------------------- 902
if ($roomID=='902') {
	$_SESSION['dangerLVL'] = "0";
	$dirW='active black';
	$dirE='active black';
}
$_SESSION['desc902'] = <<<HTML
 <html><div class="roomBox">
<div class="roomIconTitle">
 <div class="roomTitle">
<h3 class="ddgray">The Despair</span></h3>
</div>
</div>
 <p class="lgray"></p>
 <form id="mainForm" method="post" action="" name="formInput">
 <button class="ddgrayBG" type="submit" name="input1" value="west">West</button>
 <button class="ddgrayBG" type="submit" name="input1" value="east">East</button>
 </form>
 </div></html>
HTML;
// ---------------------------------------------------- 903
if ($roomID=='903') {
	$_SESSION['dangerLVL'] = "0";
	$dirW='active black';
	$dirS='active black';
}
$_SESSION['desc903'] = <<<HTML
 <html><div class="roomBox">
<div class="roomIconTitle">
 <div class="roomTitle">
<h3 class="ddgray">The Despair</span></h3>
</div>
</div>
 <p class="lgray"></p>
 <form id="mainForm" method="post" action="" name="formInput">
 <button class="ddgrayBG" type="submit" name="input1" value="west">West</button>
 <button class="ddgrayBG" type="submit" name="input1" value="south">South</button>
 </form>
 </div></html>
HTML;
// ---------------------------------------------------- 904
if ($roomID=='904') {
	$_SESSION['dangerLVL'] = "0";
	$dirN='active black';
	$dirD='active black';
}
$_SESSION['desc904'] = <<<HTML
 <html><div class="roomBox">
<div class="roomIconTitle">
 <div class="roomTitle">
<h3 class="ddgray">The Despair</span></h3>
</div>
</div>
 <p class="lgray"></p>
 <form id="mainForm" method="post" action="" name="formInput">
 <button class="ddgrayBG" type="submit" name="input1" value="north">North</button>
 <button class="darkredBG" type="submit" name="input1" value="down">Jump Down</button>
 </form>
 </div></html>
HTML;
// ---------------------------------------------------- 905
if ($roomID=='905') {
	$_SESSION['dangerLVL'] = "50";
	$dirNW='active black';
	$dirNE='active black';
	$dirS='active black';
}
$_SESSION['desc905'] = <<<HTML
 <html><div class="roomBox">
<div class="roomIconTitle">
 <div class="roomTitle">
<h3 class="ddgray">Hydra Pit</span></h3>
</div>
</div>
 <p class="lgray"></p>
 <form id="mainForm" method="post" action="" name="formInput">
 <button class="ddgrayBG" type="submit" name="input1" value="northwest">Northwest</button>
 <button class="ddgrayBG" type="submit" name="input1" value="northeast">Northeast</button>
 <button class="ddgrayBG" type="submit" name="input1" value="south">South</button>
 </form>
 </div></html>
HTML;

// ---------------------------------------------------- 906
if ($roomID=='906') {
	$_SESSION['dangerLVL'] = "60";
	$dirN='active black';
	$dirSE='active black';
}
$_SESSION['desc906'] = <<<HTML
 <html><div class="roomBox">
<div class="roomIconTitle">
 <div class="roomTitle">
<h3 class="ddgray">The Despair</span></h3>
</div>
</div>
 <p class="lgray"></p>
 <form id="mainForm" method="post" action="" name="formInput">
 <button class="ddgrayBG" type="submit" name="input1" value="north">North</button>
 <button class="ddgrayBG" type="submit" name="input1" value="southeast">Southeast</button>
 </form>
 </div></html>
HTML;

// ---------------------------------------------------- 907
if ($roomID=='907') {
	$_SESSION['dangerLVL'] = "60";
	$dirW='active black';
	$dirSW='active black';
	$dirSE='active black';
}
$_SESSION['desc907'] = <<<HTML
 <html><div class="roomBox">
<div class="roomIconTitle">
 <div class="roomTitle">
<h3 class="ddgray">The Despair</span></h3>
</div>
</div>
 <p class="lgray"></p>
 <form id="mainForm" method="post" action="" name="formInput">
 <button class="ddgrayBG" type="submit" name="input1" value="west">West</button>
 <button class="ddgrayBG" type="submit" name="input1" value="southwest">Southwest</button>
 <button class="ddgrayBG" type="submit" name="input1" value="southeast">Southeast</button>
 </form>
 </div></html>
HTML;

// ---------------------------------------------------- 908
if ($roomID=='908') {
	$_SESSION['dangerLVL'] = "60";
	$dirNW='active black';
	$dirS='active black';
}
$_SESSION['desc908'] = <<<HTML
 <html><div class="roomBox">
<div class="roomIconTitle">
 <div class="roomTitle">
<h3 class="ddgray">The Despair</span></h3>
</div>
</div>
 <p class="lgray"></p>
 <form id="mainForm" method="post" action="" name="formInput">
 <button type="submit" name="input1" value="northwest">Northwest</button>
 <button type="submit" name="input1" value="south">South</button>
 </form>
 </div></html>
HTML;

// ---------------------------------------------------- 909
if ($roomID=='909') {
	$_SESSION['dangerLVL'] = "60";
	$dirN='active black';
	$dirE='active black';
	$dirSW='active black';
}
$_SESSION['desc909'] = <<<HTML
 <html><div class="roomBox">
<div class="roomIconTitle">
 <div class="roomTitle">
<h3 class="ddgray">The Despair</span></h3>
</div>
</div>
 <p class="lgray"></p>
 <form id="mainForm" method="post" action="" name="formInput">
 <button type="submit" name="input1" value="north">North</button>
 <button type="submit" name="input1" value="east">East</button>
 <button type="submit" name="input1" value="southwest">Southwest</button>
 </form>
 </div></html>
HTML;

// ---------------------------------------------------- 910
if ($roomID=='910') {
	$_SESSION['dangerLVL'] = "60";
	$dirN='active black';
	$dirW='active black';
}
$_SESSION['desc910'] = <<<HTML
 <html><div class="roomBox">
<div class="roomIconTitle">
 <div class="roomTitle">
<h3 class="ddgray">The Despair</span></h3>
</div>
</div>
 <p class="lgray"></p>
 <form id="mainForm" method="post" action="" name="formInput">
 <button type="submit" name="input1" value="north">North</button>
 <button type="submit" name="input1" value="west">West</button>
 </form>
 </div></html>
HTML;

// ---------------------------------------------------- 911
if ($roomID=='911') {
	$_SESSION['dangerLVL'] = "80";
	$dirS='active black';
}
$_SESSION['desc911'] = <<<HTML
 <html><div class="roomBox">
<div class="roomIconTitle">
 <div class="roomTitle">
<h3 class="ddgray">The Despair</span></h3>
</div>
</div>
 <p class="lgray"></p>
 <form id="mainForm" method="post" action="" name="formInput">
	<button type="submit" name="input1" value="south">South</button>
 </form>
 </div></html>
HTML;
// ---------------------------------------------------- 912
if ($roomID=='912') {
	$_SESSION['dangerLVL'] = "60";
	$dirNE='active black';
	$dirW='active black';
	$dirNW='active black';
	$dirSE='active black';
}
$_SESSION['desc912'] = <<<HTML
 <html><div class="roomBox">
<div class="roomIconTitle">
 <div class="roomTitle">
<h3 class="ddgray">The Despair</span></h3>
</div>
</div>
 <p class="lgray"></p>
 <form id="mainForm" method="post" action="" name="formInput">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
 </form>
 </div></html>
HTML;






/*
	<button type="submit" name="input1" value="north">North</button>

	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="northeast">Northeast</button>
	<button type="submit" name="input1" value="southwest">Southwest</button>
	<button type="submit" name="input1" value="northwest">Northwest</button>
	<button type="submit" name="input1" value="east">East</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>

	<button type="submit" name="input1" value="south">South</button>
*/