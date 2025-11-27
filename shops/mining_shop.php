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
// --------------------------------------------------- ------------------------------- // START VARIABLES

$level = $row['level'];
$room = $row['room'];
$xp = $row['xp'];
$hp = $row['hpmax'];
$mp = $row['mpmax'];
$cp = $row['cp'];
$sp = $row['sp'];

$coin = $currency = $row['currency'];
$toopoor = $_SESSION['toopoor'];
$notenoughcp = $_SESSION['notenoughcp'];
$notenoughsp = $_SESSION['notenoughsp'];

$quest31 = $row['quest31'];


// ---------------------------------------------------------------------------------- // Mining SHOP LIST!!
echo '<article data-pop="shop" class="panel shop" id="shop">'.$closeMenuBtn.'
<ul> 
<form id="mainForm" method="post" action="" name="formInput">
<p>You have <span class="h3 gold">'.$coin.'</span> coin</p>
<h2 class="gold">Mining Supply Shop</h2>';
						

if ($quest31 <2) {
	echo "<h4 class='padd'>Join the Mining Guild to access the Mining Guild Shop</h4>
	<a href data-link='quests' class='btn goldBG'>Open Quests</a>
	";

}
else {

//echo '<li><h4>Pickaxes</h4></li>';

echo '	
		<li><input type="submit" class="buyBtn" name="input1" value="buy pickaxe" /> 
			<span class="yellow">5k</span> pickaxe <span>( mines stone )</span></li>
	  	<li><input type="submit" class="buyBtn" name="input1" value="buy hammer" /> 
			<span class="yellow">5k</span> hammer <span>( craft basic equipment )</span></li>
	  	<br>
		<li><input type="submit" class="buyBtn" name="input1" value="buy iron pickaxe" /> 
			<span class="yellow">15k</span> <span class="lightbrown">iron</span> pickaxe <span>( mines iron & stone )</span></li>
	  	<li><input type="submit" class="buyBtn" name="input1" value="buy iron hammer" /> 
			<span class="yellow">15k</span> <span class="lightbrown">iron</span> hammer <span>( craft w/ iron )</span></li>
	  	<br>
		<li><input type="submit" class="buyBtn" name="input1" value="buy steel pickaxe" /> 
			<span class="yellow">50k</span> <span class="gray">steel</span> pickaxe <span>( mines coal, iron & stone )</span></li>
	  	<li><input type="submit" class="buyBtn" name="input1" value="buy steel hammer" /> 
			<span class="yellow">50k</span> <span class="gray">steel</span> hammer <span>( craft w/ steel )</span></li>
	  	
		<br>
		<li><input type="submit" class="buyBtn" name="input1" value="buy mithril pickaxe" /> 
			<span class="yellow">250k</span> <span class="blue">mithril</span> pickaxe <span>( mines mithril )</span></li>						
		<li><input type="submit" class="buyBtn" name="input1" value="buy mithril hammer" /> 
			<span class="yellow">250k</span> <span class="blue">mithril</span> hammer <span>( craft w/ mithril )</span></li>						
	';	
			}

echo'</form></ul></article>';	

// } //end while
?>