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

 
 
 /*
 	
	<li><input type="submit" class="buyBtn" name="input1" value="buy black boomerang" /> 
		<span class="yellow">200k</span> <span class="black">black</span> boomerang <span>( <i class="green">+60</i> dex, <i class="blue">+10</i> mag )</span></li>
		
	<li><input type="submit" class="buyBtn" name="input1" value="buy black bow" /> 
		<span class="yellow">250k</span> <span class="black">black</span> bow <span>( <i class="green">+120</i> dex, <i class="blue">+40</i> mag )</span></li>

	<li><input type="submit" class="buyBtn" name="input1" value="buy black crossbow" /> 
		<span class="yellow">300k</span> <span class="black">black</span> crossbow <span>( <i class="green">+150</i> dex, <i class="gold">+50</i> def )</span></li>	
		
		<br>
		*/
// ---------------------------------------------------------------------------------- // RANGER Shop LIST!!
echo '<article data-pop="shop" class="panel shop" id="shop">'.$closeMenuBtn.'

<ul> 
<form id="mainForm" method="post" action="" name="formInput">
<p>You have <span class="h3 gold">'.$coin.'</span> coin</p>
<h2 class="gold">Ranger Shop</h2>';


echo '<li><h4>Weapons</h4></li>';
echo '	
	<li><input type="submit" class="buyBtn" name="input1" value="buy mithril boomerang" /> 
		<span class="yellow">50k</span> <span class="blue">mithril</span> boomerang <span>( <i class="green">+40</i> dex )</span></li>
		
	<li><input type="submit" class="buyBtn" name="input1" value="buy mithril bow" /> 
		<span class="yellow">75k</span> <span class="blue">mithril</span> bow <span>( <i class="green">+60</i> dex )</span></li>

	<li><input type="submit" class="buyBtn" name="input1" value="buy mithril crossbow" /> 
		<span class="yellow">100k</span> <span class="blue">mithril</span> crossbow <span>( <i class="green">+80</i> dex )</span></li>

	<br>

			<li><input type="submit" class="buyBtn" name="input1" value="buy greenhorn bow" /> 
		<span class="yellow">100k</span> <span class="green">greenhorn</span> bow <span>( <i class="green">+35</i> dex, <i class="gold">+35</i> def )</span></li>

	<li><input type="submit" class="buyBtn" name="input1" value="buy ranger crossbow" /> 
		<span class="yellow">500k</span> <span class="green">ranger</span> crossbow <span>( <i class="green">+250</i> dex )</span></li>';
		
		echo '<li><h4>Armor</h4></li>';
echo '	
	<li><input type="submit" class="buyBtn" name="input1" value="buy ranger hood" /> 
		<span class="yellow">30k</span> <span class="green">ranger</span> hood <span>( <i class="green">+25</i> dex )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy ranger cloak" /> 
		<span class="yellow">30k</span> <span class="green">ranger</span> cloak <span>( <i class="green">+25</i> dex )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy ranger gloves" /> 
		<span class="yellow">20k</span> <span class="green">ranger</span> gloves <span>( <i class="green">+15</i> dex )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy ranger boots" /> 
		<span class="yellow">20k</span> <span class="green">ranger</span> boots <span>( <i class="green">+15</i> dex )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy ranger amulet" /> 
		<span class="yellow">50k</span> <span class="green">ranger</span> amulet <span>( <i class="green">+25</i> dex, <i class="blue">+5</i> mag )</span></li>';
		
		echo '<li><h4>Ammo</h4></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy 100 arrows" /> 
			<span class="yellow">1k</span>  arrows <span class="gray">x<i>100</i></span> <span></span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy 100 bolts" /> 
			<span class="yellow">2k</span>  bolts <span class="gray">x<i>100</i></span> <span></span></li>';

		
echo'</form></ul></article>';	

// } //end while
/*
30k ranger hood ( +25 dex )		// dark ranger
30k ranger cloak ( +25 dex )		// dark ranger
20k ranger gloves ( +15 dex )		// dark ranger
20k ranger boots ( +15 dex )		// dark ranger
50k ranger amulet ( +25 dex, +5 mag )	// griffin, buy

ammo 
1k arrows x100
2k bolts x100
*/

?>