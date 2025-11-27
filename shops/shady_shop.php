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
ammo		25% OFF! Twice as much for half the cost.
 50c arrows x20 
 100c bolts x20 

consumables
500c reds (increase strength 20 pts for 100 clicks) ( +20 str / 100 clicks )
500c greens (increase dexterity 20 pts for 100 clicks)
500c blues (increase magic 20 pts for 100 clicks)
500c yellows (increase defense 20 pts for 100 clicks)

shady special:
***50k vapor necklace ( +10 all stats )		// buy from shady shop




 
 */
 
 
// ---------------------------------------------------------------------------------- // shady_shop LIST!!
echo '<section data-pop="shop" class="panel shop" id="shop">'.$closeMenuBtn.'

<ul> 
<form id="mainForm" method="post" action="" name="formInput">
<p>You have <span class="h3 gold">'.$coin.'</span> coin</p>
<h2 class="gold">Shady Shop</h2>';

echo '<li><h4>Ammo (75% OFF!)</h4></li>';

		
	
echo '	 <li><input type="submit" class="buyBtn" name="input1" value="buy 200 arrows" /> 
		<span class="gold">500</span> arrows <span class="gray">x<i>200</i></span></li>
		
		<li><input type="submit" class="buyBtn" name="input1" value="buy 200 bolts" /> 
		<span class="gold">1000</span> bolts <span class="gray">x<i>200</i></span></li>';		
		
echo '<li><h4>Consumables (drugs)</h4></li>



		
	<li><input type="submit" class="buyBtn" name="input1" value="buy reds" /> 
		<span class="gold">500</span> reds <span>( <i class="lightred">+20 str</i> / 100 clicks )</li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy greens" /> 
		<span class="gold">500</span> greens <span>( <i class="green">+20 dex</i> / 100 clicks )</li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy blues" /> 
		<span class="gold">500</span> blues <span>( <i class="blue">+20 mag</i> / 100 clicks )</li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy yellows" /> 
		<span class="gold">500</span> yellows <span>( <i class="gold">+20 def</i> / 100 clicks )</li>
		
		

';


echo '<li><h4>Shady Special</h4></li>



		
	<li><input type="submit" class="buyBtn" name="input1" value="buy vapor necklace" /> 
		<span class="yellow">50k</span> vapor necklace <span>( <i class="cyan">+10</i> all stats )</li>';
		
		
echo'</form></ul></section>';	

// } //end while
?>