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
$quest20 = $row['quest20'];


// ---------------------------------------------------------------------------------- // Wizard SHOP LIST!!
echo '<article data-pop="shop" class="panel shop" id="shop">'.$closeMenuBtn.'

<ul> 
<form id="mainForm" method="post" action="" name="formInput">
<p>You have <span class="h3 gold">'.$coin.'</span> coin</p>
<h2 class="gold">Wizard Shop</h2>';

	if ($quest20 <2) {
		echo "<h4 class='padd'>Join the Wizard's Guild to access the Wizard's Shop</h4>
		<a href data-link='quests' class='btn goldBG'>Open Quests</a>";

	}
	else {
		
			
echo '<li><h4>1h Weapons </h4></li> 
			<li><input type="submit" class="buyBtn" name="input1" value="buy iron staff" /> 
			<span class="yellow">3k </span> <span class="lightbrown">iron </span> staff <span>( <i class="blue">+10</i> mag, <i class="lightred">+3</i> str )</span></li>
			
			<li><h4>2h Weapons </h4></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy iron battle staff" /> 
			<span class="yellow">5k </span> <span class="lightbrown">iron </span> battle staff <span>( <i class="blue">+12</i> mag, <i class="lightred">+12</i> str )</span></li>
			
			<li><h4>Accessories </h4></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy ring of magic V" /> 
			<span class="yellow">16k </span> ring of magic V <span>( <i class="blue">+5</i> mag )</span></li>
			
			<li><input type="submit" class="buyBtn" name="input1" value="buy ring of mana regen V" /> 
			<span class="yellow">32k </span> ring of mana regen V <span>( <i class="blue">+5</i> mp / click )</span></li>
			
			<li><h4>Misc </h4></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy blue potion" /> 
			<span class="gold">200 </span> blue potion <span>(  restore <i class="blue">100</i> MP  )</span></li>
		<li><input type="submit" class="buyBtn" name="input1" value="buy blue balm" /> 
			<span class="yellow">2k </span> blue balm <span>(  restore <i class="blue">1000</i> MP  )</span></li>';

		}

		
echo'</form></ul></article>';	

// } //end while
?>