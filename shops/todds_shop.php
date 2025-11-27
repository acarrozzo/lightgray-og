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


// ---------------------------------------------------------------------------------- // Todds shop LIST!!
echo '<article data-pop="shop" class="panel shop" id="shop">'.$closeMenuBtn.'

<ul> 
<form id="mainForm" method="post" action="" name="formInput">
<p>You have <span class="h3 gold">'.$coin.'</span> coin</p>
<h2 class="gold">Todd\'s Shop</h2>';


echo '<li><h4>Potions</h4></li>';
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy red potion" /> 
		<span class="gold">100</span> red potion <span>( restore <i class="lightred">100</i> HP )</li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy blue potion" /> 
		<span class="gold">200</span> blue potion <span>( restore <i class="blue">100</i> MP )</li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy purple potion" /> 
		<span class="gold">400</span> purple potion <span>( restore <i class="lightpurple">200</i> HP & MP )</li><br>';	
		
		echo '<li><input type="submit" class="buyBtn" name="input1" value="buy red balm" /> 
		<span class="gold">1000</span> red balm <span>( restore <i class="lightred">1000</i> HP )</li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy blue balm" /> 
		<span class="gold">2000</span> blue balm <span>( restore <i class="blue">1000</i> MP )</li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy purple balm" /> 
		<span class="gold">4000</span> purple balm <span>( restore <i class="lightpurple">2000</i> HP & MP )</li><br>';	
		
	
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy wings potion" /> 
		<span class="gold">500</span> wings potion <span>( <i class="lightblue">fly</i> for 100 clicks )</li>';		
		
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy gills potion" /> 
		<span class="gold">500</span> gills potion <span>( <i class="blue">breath water</i> for 100 clicks )</li>';		
		
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy antidote potion" /> 
		<span class="gold">500</span> antidote potion <span>( <i class="green">cure poison</i> & immune for 10 clicks )</li>';		
		
				
		
echo'</form></ul></article>';	

// } //end while
?>