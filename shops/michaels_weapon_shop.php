<?php
// --------------------------------------------------------------------------------- SHOP TAB
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


// ---------------------------------------------------------------------------------- // START VARIABLES
// ---------------------------------------------------------------------------------- // START VARIABLES 
// ---------------------------------------------------------------------------------- // START VARIABLES

$coin = $currency = $row['currency'];
$toopoor = $_SESSION['toopoor'];


 
 
// ---------------------------------------------------------------------------------- // Michaels Shop LIST!!
echo '<article data-pop="shop" class="panel shop" id="shop">'.$closeMenuBtn.'

<ul> 
<form id="mainForm" method="post" action="" name="formInput">
<p>You have <span class="h3 gold">'.$coin.'</span> coin</p>
<h2 class="gold">Michael\'s Weapon Shop</h2>';


echo '<li><h4>One Handed Weapons</h4></li>';
echo '	
	<li><input type="submit" class="buyBtn" name="input1" value="buy gladius" /> 
		<span class="yellow">3k</span> gladius <span>( <i class="lightred">+9</i> str, <i class="blue">+2</i> mag, <i class="gold">+2</i> def )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy three-chained flail" /> 
		<span class="yellow">10k</span> three-chained flail <span>( <i class="lightred">+15</i> str, <i class="blue">+5</i> mag )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy giant club" /> 
		<span class="yellow">5k</span> giant club <span>( <i class="lightred">+13</i> str, <i class="black">-3</i> mag )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy great white sword" /> 
		<span class="yellow">15k</span> great white sword  <span>( <i class="lightred">+17</i> str, <i class="blue">+7</i> mag, <i class="gold">+7</i> def )</span></li>
		
	<li><input type="submit" class="buyBtn" name="input1" value="buy guardian blade" /> 
		<span class="yellow">200k</span> guardian blade <span>( <i class="lightred">+80</i> str )</span></li>';

echo '<li><h4>Two Handed Weapons</h4></li>';
echo '	
	<li><input type="submit" class="buyBtn" name="input1" value="buy claymore" /> 
		<span class="yellow">5k</span> claymore <span>( <i class="lightred">+13</i> str, <i class="blue">+2</i> mag, <i class="gold">+2</i> def )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy polearm" /> 
		<span class="yellow">5k</span> polearm <span>( <i class="lightred">+16</i> str, <i class="gold">+20</i> def )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy bone cudgel" /> 
		<span class="yellow">8k</span> bone cudgel <span>( <i class="lightred">+35</i> str, <i class="black">-10</i> mag, <i class="black">-10</i> def )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy hammerhead hammer" /> 
		<span class="yellow">25k</span> hammerhead hammer <span>( <i class="lightred">+35</i> str, <i class="blue">+10</i> mag, <i class="gold">+10</i> def )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy humongous battleaxe" /> 
		<span class="yellow">200k</span> humongous battleaxe <span>( <i class="lightred">+150</i> str, <i class="black">-50</i> mag )</span></li>';

echo '<li><h4>Ranged Weapons</h4></li>';
echo '	
	<li><input type="submit" class="buyBtn" name="input1" value="buy hand crossbow" /> 
		<span class="yellow">20k</span> hand crossbow <span>( <i class="green">+35</i> dex )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy compound crossbow" /> 
		<span class="yellow">20k</span> compound crossbow <span>( <i class="green">+40</i> dex, <i class="gold">+80</i> def )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy black crossbow" /> 
		<span class="yellow">300k</span> black crossbow <span>( <i class="green">+150</i> dex, <i class="gold">+50</i> def )</span></li>';
		
echo '<li><h4>Off Hand Weapons</h4></li>';
echo '	
	<li><input type="submit" class="buyBtn" name="input1" value="buy off hand dagger" /> 
		<span class="yellow">3k</span> off hand dagger <span>( <i class="lightred">+5</i> str )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy off hand sword" /> 
		<span class="yellow">15k</span> off hand sword <span>( <i class="lightred">+10</i> str )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy off hand mace" /> 
		<span class="yellow">100k</span> off hand mace <span>( <i class="lightred">+25</i> str, <i class="blue">+5</i> mag )</span></li>				
		
		';		

echo'</form></ul></article>';	

// } //end while

/*
ranged
20k compound crossbow ( +40 dex, +80 def )  	// bowman, great white
20k hand crossbow ( +35??? dex )	 		// bowman
*200k black crossbow ( +150 dex, +50 def ) 	// lizard king

off hand
3k off hand dagger ( +5 str ) 			// master thief // scorpion queen
*15k off hand sword ( +10 str ) 			// troll champion
*100k off hand mace ( +25 str, +5 mag )		// fallen angel 
*/

?>