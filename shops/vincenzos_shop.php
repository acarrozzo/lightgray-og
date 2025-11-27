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

FOODS

50c cooked meat (+50 hp)

250c meatball (+400 hp) (combine 5 cooked meats)

500c blue fish (+400 mp)

100c veggies (+80 hp, +80 mp)


*/
 
 
// ---------------------------------------------------------------------------------- // vincenzos_shop LIST!!
echo '<article data-pop="shop" class="panel shop" id="shop">'.$closeMenuBtn.'

<ul> 
<form id="mainForm" method="post" action="" name="formInput">
<p>You have <span class="h3 gold">'.$coin.'</span> coin</p>
<h2 class="gold">Vincenzo\'s Meat & Produce</h2>';


			echo '<li><h4>Food Stuffs</h4></li>';
echo '	

<li><input type="submit" class="buyBtn" name="input1" value="buy cooked meat" /> 
		<span class="gold">50c</span> cooked meat <span>( <i class="lightred">+50</i> HP )</li>
<li><input type="submit" class="buyBtn" name="input1" value="buy meatball" /> 
		<span class="gold">250c</span> meatball <span>( <i class="lightred">+400</i> HP )</li>		
<li><input type="submit" class="buyBtn" name="input1" value="buy bluefish" /> 
		<span class="gold">500c</span> bluefish <span>( <i class="blue">+400</i> MP )</li>		
		
<li><input type="submit" class="buyBtn" name="input1" value="buy veggies" /> 
		<span class="gold">100c</span> veggies <span>( <i class="lightpurple">+80</i> HP, <i class="lightpurple">+80</i> MP )</li>		
		
		
		';


echo'</form></ul></article>';	

// } //end while
?>