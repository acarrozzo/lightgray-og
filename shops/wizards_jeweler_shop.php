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



// ---------------------------------------------------------------------------------- // Wizard SHOP LIST!!
echo '<article data-pop="shop" class="panel shop" id="shop">'.$closeMenuBtn.'

<ul> 
<form id="mainForm" method="post" action="" name="formInput">
<p>You have <span class="h3 gold">'.$coin.'</span> coin</p>
<h2 class="gold">Wizard Jeweler</h2>';


echo '<li><h4>Rings </h4></li> 
			<br>
			<li><input type="submit" class="buyBtn" name="input1" value="buy red wizard ring" /> 
			<span class="yellow">10k </span> <span class="lightred"> red </span> wizard ring 
					<span>( <i class="blue">+5</i> mag, <i class="lightred">+5</i> str )</span></li>
			<br>
			<li><input type="submit" class="buyBtn" name="input1" value="buy green wizard ring" /> 
			<span class="yellow">10k </span> <span class="green"> green </span> wizard ring 
					<span>( <i class="blue">+5</i> mag, <i class="green">+5</i> dex )</span></li>
			<br>
			<li><input type="submit" class="buyBtn" name="input1" value="buy yellow wizard ring" /> 
			<span class="yellow">10k </span> <span class="gold"> yellow </span> wizard ring 
					<span>( <i class="blue">+5</i> mag, <i class="gold">+5</i> def )</span></li>';

		
echo'</form></ul></article>';	

// } //end while
?>