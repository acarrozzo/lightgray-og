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



// ---------------------------------------------------------------------------------- // Broccoli Rob Shop LIST!!
echo '<article data-pop="shop" class="panel shop" id="shop">'.$closeMenuBtn.'

		 <ul> 
		 <ul> 
		 <form id="mainForm" method="post" action="" name="formInput">
		 <p>You have <span class="h3 gold">'.$coin.'</span> coin</p>
		 <h2 class="gold">Broccoli Rob</h2>';


echo '<li><h4>Consumables</h4></li>';

echo '
<li><input type="submit" class="buyBtn" name="input1" value="buy redberry" /> 
		<span class="gold">10</span> redberry <span>( <i class="lightred">+10</i> HP )</li>';
echo '
<li><input type="submit" class="buyBtn" name="input1" value="buy blueberry" /> 
		<span class="gold">20</span> blueberry <span>( <i class="blue">+10</i> MP )</li>';
	
echo '
<li><input type="submit" class="buyBtn" name="input1" value="buy veggies" /> 
		<span class="gold">100</span> veggies <span>( <i class="lightpurple">+80</i> HP, <i class="lightpurple">+80</i> MP )</li>';
	
echo'</form></ul></article>';	

// } //end while
?>