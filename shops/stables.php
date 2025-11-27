<?php
// --------------------------------------------------------------------------------- STABLES - SHOP TAB
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

$coin = $currency = $row['currency'];
$toopoor = $_SESSION['toopoor'];



// ---------------------------------------------------------------------------------- // Broccoli Rob Shop LIST!!
echo '<article data-pop="shop" class="panel shop" id="shop">'.$closeMenuBtn.'

<ul> 
<form id="mainForm" method="post" action="" name="formInput">
<p>You have <span class="h3 gold">'.$coin.'</span> coin</p>
<h2 class="gold">Stables</h2>';			


echo '<li><h4>Mounts</h4></li>';


echo '<br><br>
// ----------------------------------------------------- Red Town Stables - COMING SOON!<br>

50k  pony ( +20 all stats ) 			<br>
100k  stallion ( +100 str, +200 def ) 		<br>
200k  clydesdale ( +200 str ) 			<br>
200k  thoroughbred ( +200 dex ) 		<br>
200k  donkey ( +100 mag ) 			<br>
200k  mule ( +400 def ) 				<br>
500k  mustang ( +100 all stats ) 			<br>
2m  unicorn ( +200 all stats, flies ) 		<br>

';

// echo '<br>
//<li><input type="submit" class="buyBtn" name="input1" value="buy donkey" /> 
//		<span class="gold">10</span> donkey <span>( <i class="lightred">+10</i> HP )</li>';

echo'</form></ul></article>';	

// } //end while
?>