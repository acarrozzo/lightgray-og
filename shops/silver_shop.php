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



// ---------------------------------------------------------------------------------- // SILVER SHOP LIST!!
echo '<article data-pop="shop" class="panel shop" id="shop">'.$closeMenuBtn.'

<ul> 
<form id="mainForm" method="post" action="" name="formInput">
<p>You have <span class="h3 gold">'.$coin.'</span> coin</p>
<h2 class="gold">Silver Shop</h2>';


echo '
			<li><h4>Weapons </h4></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver sword" /> 
			<span class="yellow">50k </span> <span class="lightblue">silver </span> sword <span>( <i class="lightred">+25</i> str, <i class="blue">+5</i> mag )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver staff" /> 
			<span class="yellow">50k </span> <span class="lightblue">silver </span> staff <span>( <i class="blue">+25</i> mag )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver 2h sword" /> 
			<span class="yellow">60k </span> <span class="lightblue">silver </span> 2h sword <span>( <i class="lightred">+45</i> str, <i class="blue">+5</i> mag )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver boomerang" /> 
			<span class="yellow">40k </span> <span class="lightblue">silver </span> boomerang <span>( <i class="green">+20</i> dex, <i class="blue">+5</i> mag )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver bow" /> 
			<span class="yellow">50k </span> <span class="lightblue">silver </span> bow <span>( <i class="green">+30</i> dex, <i class="blue">+5</i> mag )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver crossbow" /> 
			<span class="yellow">60k </span> <span class="lightblue">silver </span> crossbow <span>( <i class="green">+40</i> dex, <i class="blue">+5</i> mag )</span></li>
			<li><h4>Armor</h4></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver shield" /> 
			<span class="yellow">30k </span> <span class="lightblue">silver </span> shield <span>( <i class="gold">+50</i> def, <i class="blue">+1</i> mag )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver helmet" /> 
			<span class="yellow">20k </span> <span class="lightblue">silver </span> helmet <span>( <i class="gold">+40</i> def, <i class="blue">+1</i> mag )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver breastplate" /> 
			<span class="yellow">30k </span> <span class="lightblue">silver </span> breastplate <span>( <i class="gold">+50</i> def, <i class="blue">+1</i> mag )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver gauntlets" /> 
			<span class="yellow">20k </span> <span class="lightblue">silver </span> gauntlets <span>( <i class="gold">+30</i> def, <i class="blue">+1</i> mag )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver boots" /> 
			<span class="yellow">20k </span> <span class="lightblue">silver </span> boots <span>( <i class="gold">+30</i> def, <i class="blue">+1</i> mag )</span></li>
			<li><h4>Accessories & Keys </h4></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver ring" /> 
			<span class="yellow">100k </span> <span class="lightblue">silver </span> ring <span>( <i class="cyan">+10</i> all stats )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver necklace" /> 
			<span class="yellow">200k </span> <span class="lightblue">silver </span> necklace <span>( <i class="cyan">+20</i> all stats )</span></li>
			
';
		
		
		
echo'</form></ul></article>';	

// } //end while
?>