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






// ---------------------------------------------------------------------------------- // PAJAMA SHAMAN SHOP LIST!!
echo '<article data-pop="shop" class="panel shop" id="shop">'.$closeMenuBtn.'

<ul> 
<form id="mainForm" method="post" action="" name="formInput">
<p>You have <span class="h3 gold">'.$coin.'</span> coin</p>
<h2 class="gold">Pajama Shaman Shop</h2>';


echo '<li><h4>One Handed Weapons</h4></li>';
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy flail" /> 
		<span class="gold">1200</span> flail <span>( <i class="lightred">+7</i> str, <i class="gold">+6</i> def )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy morning star" /> 
		<span class="gold">1200</span> morning star <span>( <i class="lightred">+6</i> str, <i class="blue">+4</i> mag )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy gladius" /> 
		<span class="gold">3000</span> gladius <span>( <i class="lightred">+9</i> str, <i class="blue">+2</i> mag, <i class="gold">+2</i> def )</span></li>';
echo '<li><h4>Two Handed Weapons</h4></li>';
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy battle axe" /> 
		<span class="gold">800</span> battle axe <span>( <i class="lightred">+10</i> str, <i class="black">-2</i> def )</span></li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy warhammer" /> 
		<span class="gold">900</span> warhammer <span>( <i class="lightred">+12</i> str, <i class="black">-5</i> def )</span></li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy claymore" /> 
		<span class="gold">5000</span> claymore <span>( <i class="lightred">+13</i> str, <i class="blue">+2</i> mag, <i class="gold">+2</i> def )</span></li>';	 
echo '<li><h4>Ranged Weapons</h4></li>';
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy long bow" /> 
		<span class="gold">1500</span> long bow <span>( <i class="green">+11</i> dex )</li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy arrows" /> 
		<span class="gold">1000</span> arrows <span class="gray">x<i>100</i></span></li>';
echo '<li><h4>Armor Set</h4> <span class="small">( set bonus: equip both and get an extra +2 boost to all stats )</span></li>';
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy pajamas" /> 
		<span class="gold">700</span> pajamas <span>( <i class="cyan">+2</i> all stats )</li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy slippers" /> 
		<span class="gold">700</span> slippers <span>( <i class="cyan">+1</i> all stats )</li>	';	
	
echo'</form></ul></article>';	

// } //end while


    
	 

   