<?php
// --------------------------------------------------------------------------------- SHOP TAB - JUNK COLLECTOR
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

$scorpiontail = $row['scorpiontail'];
$batwing = $row['batwing'];
$bone = $row['bone'];
$bigfoot = $row['bigfoot'];

/*
38x scorpion tail
12x bat wing
21x bone
2x big foot
*/

// ---------------------------------------------------------------------------------- // Junk Collector LIST!!
echo '<article data-pop="shop" class="panel shop" id="shop">'.$closeMenuBtn.'

<ul> 
<form id="mainForm" method="post" action="" name="formInput">
<p>You have <span class="h3 gold">'.$coin.'</span> coin</p>
<h2 class="gold">Junk Collector</h2>';			

echo '
			<li><h4>Sell </h4></li>
			<li><input type="submit" class="buyBtn" name="input1" value="sell 20 scorpion tails" /> 
			<span class="yellow">10k </span> Sell 20 Scorpion Tails <span class="gray">(have '.$scorpiontail.') </span> </li>
            <li><input type="submit" class="buyBtn" name="input1" value="sell 20 bat wings" /> 
			<span class="yellow">10k </span> Sell 20 bat wings <span class="gray">(have '.$batwing.') </span> </li>
            <li><input type="submit" class="buyBtn" name="input1" value="sell 20 bones" /> 
			<span class="yellow">10k </span> Sell 20 bones <span class="gray">(have '.$bone.') </span> </li>
            <li><input type="submit" class="buyBtn" name="input1" value="sell big foot" /> 
			<span class="yellow">5k </span> Sell big foot <span class="gray">(have '.$bigfoot.') </span> </li>


			
';
		
		
		
echo'</form></ul></article>';	

// } //end while
?>