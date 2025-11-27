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

Weapons
 50c dagger ( +1 str )
 400c long sword ( +4 str )
Ammo
 100c arrows x10 
 200c bolts x10 
Misc
 10c redberry ( restores 5 HP )
 20c blueberry ( restores 5 MP )
 
 */

$quest19=$row['quest19'];


 
// ---------------------------------------------------------------------------------- // Warriors Shop LIST!!
echo '<article data-pop="shop" class="panel shop" id="shop">'.$closeMenuBtn.'

<ul> 
<form id="mainForm" method="post" action="" name="formInput">
<p>You have <span class="h3 gold">'.$coin.'</span> coin</p>
<h2 class="gold">Warrior\'s Shop</h2>';

if ($quest19 <2) {
	echo "<h4 class='padd'>Join the Warrior's Guild to access the Warrior's Shop</h4>
	<a href data-link='quests' class='btn goldBG'>Open Quests</a>
	";

}
	else {
echo '
<li><h4>1h Weapons </h4></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy iron dagger" /> 
			<span class="yellow">1k </span> <span class="lightbrown">iron </span> dagger <span>( <i class="lightred">+7</i> str )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy iron sword" /> 
			<span class="yellow">3k </span> <span class="lightbrown">iron </span> sword <span>( <i class="lightred">+18</i> str )</span></li>
			
			<li><h4>2h Weapons </h4></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy polearm" /> 
			<span class="yellow">3k </span> polearm <span>( <i class="lightred">+12</i> str, <i class="gold">+20</i> def )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy iron 2h sword" /> 
			<span class="yellow">5k </span> <span class="lightbrown">iron </span> 2h sword <span>( <i class="lightred">+25</i> str )</span></li>
			
			<li><h4>Accessories </h4></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy ring of strength V" /> 
			<span class="yellow">16k </span> ring of strength V <span>( <i class="lightred">+5</i> str )</span></li>
			
			<li><input type="submit" class="buyBtn" name="input1" value="buy ring of health regen V" /> 
			<span class="yellow">32k </span> ring of health regen V <span>( <i class="lightred">+5 hp</i> / click )</span></li>
			
			<li><h4>Misc </h4></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy meatball" /> 
			<span class="gold">250 </span> <span class="lightbrown"></span> meatball <span>( restore <i class="lightred">400</i> hp )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy red balm" /> 
			<span class="yellow">1k </span> <span class="lightbrown"></span> red balm <span>( restore <i class="lightred">1000</i> hp )</span></li>';			
		

			 }
		
echo'</form></ul></article>';	

 

// } //end while
?>