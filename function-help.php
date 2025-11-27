<?php
// // -------------------------DB CONNECT!
// include ('db-connect.php'); 
// // -------------------------DB QUERY!
// $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
// $stmt->bind_param("s", $_SESSION['username']);
// $stmt->execute();
// $result = $stmt->get_result();
// if (!$result) {
//     die('There was an error running the query [' . $link->error . ']');
// }
// // -------------------------DB OUTPUT!
// while($row = $result->fetch_assoc()){ 

$row = getUserData($link, $_SESSION['username']); // --- gets all user data from database   	


  

// -------------------------------------------------------------------------- help menu
// -------------------------------------------------------------------------- help 
if($input=='help' || $input=='help main') 
{	
	echo 'HELP MENU - MAIN';
	$message="
	<div class='helpMenu'>
	<ul>
	<li>HELP - MAIN</span>
	<li>TOUGHNESS is another way to increase your defense. Each point in TOUGHNESS is another 2 potential points of damage you can absorb when you are attacked by an enemy.</li>
	
	</ul>
   	<input class='hov blueBG' type='submit' name='input1' value='help main' />
	</div>";
	include ('update_feed.php'); // --- update feed
	//$funflag=1;		
}


// -------------------------------------------------------------------------- help toughness
if($input=='help toughness') 
{	
	echo 'help toughness';
	$message="<i>TOUGHNESS is another way to increase your defense. Each point in TOUGHNESS is another 2 potential points of damage you can absorb when you are attacked by an enemy.</i><br>";
	include ('update_feed.php'); // --- update feed
	$funflag=1;		
}
// -------------------------------------------------------------------------- help physical training
if($input=='help physical training') 
{	
	echo 'help physical training';
	$message="<i>PHYSICAL TRAINING will increase the amount of HP you gain when you level. Each point is both a guaranteed point to HP as well as a potential point. So if your PHYSICAL TRIANING is 5, you will gain between 5 and 10 HP when you level.</i><br>";
	include ('update_feed.php'); // --- update feed
	$funflag=1;		
}
// -------------------------------------------------------------------------- help mental training
if($input=='help mental training') 
{	
	echo 'help mental training';
	$message="<i>MENTAL TRAINING will increase the amount of MP you gain when you level. Each point is both a guaranteed point to MP as well as a potential point. So if your MENTAL TRIANING is 5, you will gain between 5 and 10 MP when you level.</i><br>";
	include ('update_feed.php'); // --- update feed
	$funflag=1;		
}




// -------------------------------------------------------------------------- help crafting
if($input=='help crafting' || $input=='help craft') 
{	
	echo 'help crafting';
	$message=" --- 

<br>";
	include ('update_feed.php'); // --- update feed
	$funflag=1;		
}
// -------------------------------------------------------------------------- craft list
if($input=='craft list' || $input=='crafting list' || $input=='full crafting list') 
{	
	echo 'crafting list';
	$message="CRAFTING LIST<br />
// ------------ # BASIC  CRAFTING <br />
<span class='width'>crafting table</span> 3 wood<br />
// ------------ # ADVANCED CRAFTING (need crafting table)<br />
<span class='width'>fire</span> 1 wood<br />
<span class='width'>cooked meat</span> raw meat + fire<br />
<span class='width'>glass</span> sand + fire<br />
<span class='width'>bottle</span> glass + fire<br />
<span class='width'>red potion</span> 5 redberry + bottle<br />
<span class='width'>blue potion</span> 5 blueberry + bottle<br />
<span class='width'>purple potion</span> 2 red potion + 2 bluepotion<br />
------------------ TOOLS ------------------ <br />
<span class='width'>hatchet</span>3 stone + 1 wood<br />
<span class='width'>pickaxe</span>3 stone + 1 wood<br />
<span class='width'>hammer</span>3 stone + 1 wood<br />
(all items below here need hammer)<br />
------------------ WEAPONS ------------------ <br />
<span class='width'>wooden staff</span> 5 wood + 2 stone + hammer<br />
<span class='width'>wooden bo</span> 7 wood + hammer<br />
<span class='width'>wooden shield</span> 5 wood + 2 stone + hammer<br />
<span class='width'>wooden bow</span> 5 wood + 1 string + hammer<br />
<span class='width'>10 arrows</span> 1 wood + 1 stone + hammer<br />
------------------ ARMOR ------------------ <br />
<span class='width'>leather hood</span> 3 leather + hammer<br />
<span class='width'>leather helmet</span>5 leather + hammer<br />
<span class='width'>leather vest</span>7 leather + hammer<br />
<span class='width'>leather armor</span>10 leather + hammer<br />
<span class='width'>leather gloves</span>3 leather + hammer	<br />
<span class='width'>leather boots</span>3 leather + hammer<br />
------------------ ACCESSORIES ------------------ <br />
<span class='width'>ring of strength II</span>ring of strength + ring of strength<br />
<span class='width'>ring of dexterity II</span>ring of dexterity + ring of dexterity<br />
<span class='width'>ring of magic II</span>ring of magic + ring of magic<br />
<span class='width'>ring of defense II</span>ring of defense + ring of defense<br />
------------------ END CRAFT MENU<br />";
	include ('update_feed.php'); // --- update feed
	$funflag=1;$input='craft';		
}
// -------------------------------------------------------------------------- craft list full
if($input=='craft list full') 
{	
	echo 'craft list full';
	$message="CRAFTING LIST FULL<br />
// ------------ # BASIC CRAFTING <br />
<span class='width'>crafting table</span> 3 wood<br />
<span class='width'>fire</span> 1 wood<br />
<span class='width'>cooked meat</span> raw meat + fire<br />
// ------------ # ADVANCED CRAFTING (need crafting table)<br />
<span class='width'>fire</span> 1 wood<br />
<span class='width'>glass</span> sand + fire<br />
<span class='width'>bottle</span> glass + fire<br />
<span class='width'>cooked meat</span> raw meat + fire<br />
<span class='width'>red potion</span> 5 redberry + bottle<br />
<span class='width'>blue potion</span> 5 blueberry + bottle<br />
<span class='width'>purple potion</span> red potion + bluepotion<br />
(all items below here need hammer)<br />
------------------ WEAPONS ------------------ <br />
<span class='width'>wooden staff</span> 5 wood + 2 stone<br />
<span class='width'>wooden shield</span> 5 wood + 2 stone<br />
<span class='width'>wooden bow</span> 5 wood + 1 string<br />
<span class='width'>10 arrows</span> 1 wood + 1 stone<br />
------------------ ARMOR ------------------ <br />
<span class='width'>leather hood</span> 3 leather + hammer<br />
<span class='width'>leather helmet</span>5 leather + hammer<br />
<span class='width'>leather vest</span>7 leather + hammer<br />
<span class='width'>leather armor</span>10 leather + hammer<br />
<span class='width'>leather gloves</span>3 leather + hammer	<br />
<span class='width'>leather boots</span>3 leather + hammer<br />
------------------ TOOLS ------------------ <br />
<span class='width'>hatchet</span>3 stone + 5 wood<br />
<span class='width'>pickaxe</span>3 stone + 5 wood<br />
<span class='width'>hammer</span>3 stone + 5 wood<br />
<span class='width'>iron hatchet</span>3 iron + 5 wood<br />
<span class='width'>iron pickaxe</span>3 iron + 5 wood<br />
<span class='width'>iron hammer</span>3 iron + 5 wood<br />
------------------ ACCESSORIES ------------------ <br />
<span class='width'>ring of strength II</span>ring of strength + ring of strength<br />
<span class='width'>ring of dexterity II</span>ring of dexterity + ring of dexterity<br />
<span class='width'>ring of magic II</span>ring of magic + ring of magic<br />
<span class='width'>ring of defense II</span>ring of defense + ring of defense<br />
------------------ IRON WEAPONS ------------------ <br />
<span class='width'>iron dagger</span>5 iron<br />
<span class='width'>iron sword</span>5 iron<br />
<span class='width'>iron staff</span>5 iron<br />
<span class='width'>iron 2h sword</span>7 iron<br />
<span class='width'>iron boomerang</span>5 iron<br />
------------------ IRON ARMOR ------------------ <br />
<span class='width'>iron shield</span>5 iron<br />
<span class='width'>iron helmet</span>3 iron<br />
<span class='width'>iron chestplate</span>10 iron<br />
<span class='width'>iron gauntlets</span>3 iron<br />
<span class='width'>iron boots</span>3 iron<br />
------------------ END CRAFT MENU<br />";
	include ('update_feed.php'); // --- update feed
	$funflag=1;$input='craft';		
}

// }
?>