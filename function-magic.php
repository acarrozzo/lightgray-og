<?php
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


$_SESSION['magiccast'] = 0;
$_SESSION['noMPregen'] = 0;
$_SESSION['slice'] = 0;
$_SESSION['smash'] = 0;
$_SESSION['aim'] = 0;

$hp=$row['hp'];      // User Stats
$hpmax=$row['hpmax'];
$mp=$row['mp'];
$mpmax=$row['mpmax'];
$str=$row['str'];
$strmod=$row['strmod'];
$dex=$row['dex'];
$dexmod=$row['dexmod'];
$mag=$row['mag'];
$magmod=$row['magmod'];
$def=$row['def'];
$defmod=$row['defmod'];

		$infight = $row['infight'];

		$flying = $_SESSION['flying'];
		$breathingwater = $_SESSION['breathingwater'];
		
		$onehanded=$row['onehanded'];   
		$twohanded=$row['twohanded'];   
		$ranged=$row['ranged'];   		

		$infight = $row['infight'];
		$endfight = $row['endfight'];
// -------------------------------------------------------------------------- OFFENCE
// -------------------------------------------------------------------------- OFFENCE
// -------------------------------------------------------------------------- OFFENCE

$spell='none';
// -------------------------------------------------------------------------- ACTION/CAST SLICE
if($input=='slice') {
	if ($mp < $slice_cost_cast )
		{
			echo $message="<i class='redBG lightgray'>You don't have enough MP to SLICE!</i><br>";
			include ('update_feed_alt.php'); // --- update feed
		}
	else {	
		$_SESSION['slice'] = 1;
		$input = 'attack';
		$_SESSION['noMPregen'] = 1; // do not regenrate mp during magic attack

		}
	}
// -------------------------------------------------------------------------- ACTION/CAST SMASH
else if($input=='smash') {
	if ($mp < $smash_cost_cast )
		{
			echo $message="<i class='redBG lightgray'>You don't have enough MP to SMASH!</i><br>";
			include ('update_feed_alt.php'); // --- update feed
		}
	else {	
		$_SESSION['smash'] = 1;
		$input = 'attack';
		$_SESSION['noMPregen'] = 1; // do not regenrate mp during magic attack

		}
	}
// -------------------------------------------------------------------------- ACTION/CAST AIM
else if($input=='aim') {
	if ($mp < $aim_cost_cast )
		{
			echo $message="<i class='redBG lightgray'>You don't have enough MP to AIM!</i><br>";
			include ('update_feed_alt.php'); // --- update feed
		}
    else {	
		$_SESSION['aim'] = 1;
		$input = 'attack';
		$_SESSION['noMPregen'] = 1; // do not regenrate mp during magic attack

		//$results = $link->query("UPDATE $user SET mp = mp - $aim_cost_cast"); // -- mp change
		}	
	}	

// -------------------------------------------------------------------------- CAST magicmissile
else if($input=='cast magicmissile' || $input=='magicmissile') 
{	
   	$hp = $row['hp'];
   	$hpmax = $row['hpmax'];
   	$magic_base = $row['magicmissile'];
	$spell_level = $row['magicmissile'];
	$spell_cost = $row['magicmissile']*2;
   	
	$magic_rand = rand (0,$row['magmod']);
	// $magic_mod = ($spell_level / 5) + 1;
//	$magic_mod = ($spell_level * .05) + 1;
//	$magic_add = ceil($magic_rand * $magic_mod); // round up
	$magic_amount = 1 + $magic_base + $magic_rand;
	//*magic missile 	1		SPELL: dam = 1 + lvl + ( rand(0,mag) )		[ COST: (2*lvl) ] 		// most basic magic spell
	echo '<span class="blue">[ 1 + '.$magic_base.' + '.$magic_rand.' = '.$magic_amount.' ] </span> ';
    if ($row['magicmissile'] < 1)
	{
	include ('update_feed.php'); // --- update feed
	}
	else
	{
	$message=""; //so doesn't display message in HUD battle status
	$_SESSION['magiccast'] = 1;
	$input = 'attack';
	$spell = 'magic missile';
	$_SESSION['spellColor'] = $spellColor = 'blue';
	}
}


// -------------------------------------------------------------------------- CAST FIREBALL
else if($input=='cast fireball' || $input=='fireball') 
{		
	$hp = $row['hp']; 
   	$hpmax = $row['hpmax'];
   	$magic_base = $row['fireball'] ; // Base damage is spell level // OR 0 // reset magic damage
	$spell_level = $row['fireball'];
	$spell_cost = 5 + ($row['fireball']*2); // was *1
   	
	$magic_rand = rand (1,$row['magmod']);
	// $magic_mod = ($spell_level / 5) + 1;
	$magic_mod = ($spell_level * .05) + 1;
	$magic_add = ceil($magic_rand * $magic_mod); // round up
	$magic_amount = $magic_base + $magic_add;

	echo '<p class="blue">FIREBALL MATH: [ '.$magic_base.' + ('.$magic_rand.' x '.$magic_mod.') = '.$magic_amount.' ] </p> ';

	//echo ' Base: '.$magic_base.', ';
	//echo ' Rnd: '.$magic_rand.', ';
	//echo ' Mod%:'.$magic_mod.', ';
	//echo ' Amt: '.$magic_amount.', ';
	//echo ' RNDup: '.$magic_amount.'<br>';
	
		//while ($countdown > 0) // WILL BE ATOMIC BLAST
//	{
   	//	$fireball_add = rand (1,$row['magmod']);
   	//		echo ' + '.$fireball_add;
   	//	$magic_amount = $magic_amount + $fireball_add;
   	//	$countdown = $countdown - 1;
  // }
   
   if ($row['fireball'] < 1)
	{
	//	echo $message="<i>You don't know the Fireball spell</i><br>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{
	$message=""; //so doesn't display message in HUD battle status
	$magiccast = 1;
	$_SESSION['magiccast'] = 1;
	$input = 'attack';
	$spell = 'fireball';
	$_SESSION['spellColor'] = $spellColor = 'red';
	}
//$funflag=1;		
}


// -------------------------------------------------------------------------- CAST poison dart
if ($infight == 0) {$_SESSION['poison_amt']=0;}

if($input=='cast poison dart' || $input=='poison dart') 
{	
   	$hp = $row['hp'];
   	$mp = $row['mp'];
   	$hpmax = $row['hpmax'];
   	$magic_base = $row['poisondart'];
	$spell_level = $row['poisondart'];
	$spell_cost = 5 + ($row['poisondart']*3); // was 10 + lvl*1

	if ($_SESSION['poison_amt'] <= 1 && $mp >= $spell_cost) {
		$_SESSION['poison_amt'] = $poison_amt = rand (1,$row['poisondart']*2);   	
	}
	
	$magic_rand = rand (1,$row['magmod']);
	//$magic_mod = ($spell_level / 5) + 1;
	$magic_mod = ($spell_level * .05) + 1;
	$magic_add = ceil($magic_rand * $magic_mod); // round up
	$magic_amount = $magic_base + $magic_add;
	
	// echo '<span>[ </span><span class="darkblue">'.$magic_base.' + '.$magic_add.' </span><span> = '.$magic_amount.' ] </span>';
	echo '<span class="darkblue">[ '.$magic_base.' + ('.$magic_rand.' x '.$magic_mod.') = '.$magic_amount.' ] </span> ';

    if ($row['poisondart'] < 1)
	{
	include ('update_feed.php'); // --- update feed
	}
	else
	{
	$message=""; //so doesn't display message in HUD battle status
	$_SESSION['magiccast'] = 1;
	$input = 'attack';
	$spell = 'poison dart';
	$_SESSION['spellColor'] = $spellColor = 'green';
	}
}
// -------------------------------------------------------------------------- CAST atomic blast
if($input=='cast atomic blast' || $input=='atomic blast') 
{	
	$spell_level = $row['atomicblast'];
	$spell_cost = (100 * $row['atomicblast']) + $row['magmod'];   	
   	$base_amount = $row['mag'];
	$magic_amount = rand (0,$row['magmod']);
	$countdown = $row['atomicblast'];
	echo ' <span class="darkblue">[ '.$base_amount;
	echo ' + '.$magic_amount;
	$magic_amount = $magic_amount + $base_amount;
	while ($countdown > 1) // WILL BE ATOMIC BLAST
	{
   		$atomicblast_add = rand (0,$row['magmod']);
   			echo ' + '.$atomicblast_add;
   		$magic_amount = $magic_amount + $atomicblast_add;
   		$countdown = $countdown - 1;
   } 
	echo ' = '.$magic_amount.' ] </span> ';
    if ($row['atomicblast'] < 1)
	{
	include ('update_feed.php'); // --- update feed
	}
	else
	{
	$message=""; //so doesn't display message in HUD battle status
	$_SESSION['magiccast'] = 1;
	$input = 'attack';
	$spell = 'atomic blast';
	$_SESSION['spellColor'] = $spellColor = 'pink';

	}
}

// -------------------------------------------------------------------------- magic strike
if($input=='magic strike') 
{	
   	$hp = $row['hp'];
   	$hpmax = $row['hpmax'];
	   $spell_level = $row['magicstrike'];
	   $magicstrike = $row['magicstrike'];
	   $spell_cost = $row['magicstrike']*2;   	
	
	//cost: lvl*2	dam + ( lvl x 10% mag )
   	//echo $row['weapontype'];
	
	//$att_rand = rand (1,$row['strmod']);										//str base
		
	//		$damageskill = rand (0, $ranged);

	if ($row['weapontype'] == 1 || $row['weapontype'] == 2 ) { // 1h or 2h base
	//	$att_rand = rand (0,$row['strmod']);
		//$damageskill = rand (0, $onehanded);
		} 			
	if ($row['weapontype'] == 3) { 		//dex base
	//	$att_rand = rand (0,$row['dexmod']);
		//$damageskill = rand (0, $ranged);
		} 	
	
	//$att_rand = $att_rand + $damageskill;
	
//	$magic_base = rand (0,$row['magmod']); // magic damage base
//	$magic_addition = $magic_base * ($spell_level / 20); // 5% per level multiplier (100% damage at level 20)
//	$magic_amount = ($att_rand + $magic_addition); // total damage
//	$magic_amount = ceil($magic_amount) + 1; // round up
//	$_SESSION['mag_plus'] = $mag_plus = $magic_amount - $att_rand; // overall magic increase
	
//	echo ' Rnd: '.$att_rand.', ';
//	echo ' MagB: '.$magic_base.', ';
//	echo ' mod%: '.($spell_level / 10).', ';
//	echo ' MagA: '.$magic_addition.', ';
//	echo ' Amt: '.$magic_amount.', ';
//	echo ' RNDup: '.$magic_amount.', ';
	
if ($weapontype == 1 || $weapontype == 2 ) { // 1h or 2h base
	$att_damage = rand (0,$strmod);
	} 			
else if ($weapontype == 3) { 		//dex base
	$att_damage = rand (0,$dexmod);
	} 	
	else { // nothing equipped // same as str
		$att_damage = rand (0,$strmod);
	}
	$att_damage;                                   echo '<br>core str/dex damage:'.$att_damage;

	$magicstrike = $magicstrike;                                   echo '<br>spell level:'.$magicstrike;
	$spell_cost = $magicstrike*2;                            echo '<br>spell cost:'.$spell_cost;          
	$magicstrike_mod = $magicstrike / 20;                          echo '<br>mod%:'.$magicstrike_mod;       // mod %
	$magicstrike_max = $magmod * $magicstrike_mod;                 echo '<br>magic max dam:'.$magicstrike_max;           // magic damage base
	$magicstrike_max = ceil($magicstrike_max) + 1;              echo '<br>max damage rounded:'.$magicstrike_max;       // round up
	$magicstrike_att = rand (0,$magicstrike_max);                          echo '<br>magic dam:'.$magicstrike_att;           // magic damage base
	$magic_amount = ($att_damage + $magicstrike_att);         echo '<br>damage total:'.$magic_amount;       // total damage
	//$damagetotal = $damagetotal - $block;               echo '<br>damage total-block:'.$damagetotal.'<br><br>';       // total damage
	$maxhit = $strmod + $magicstrike_max;
	//if ($damagetotal <= 0) {$damagetotal = 0;}   // if negative damage make 0


	if ($row['weapontype'] == 3) { 	
//		echo '<span>[ </span><span class="green"> '.$att_rand.' </span> <span>+</span> <span class="darkblue"> '.$mag_plus.' </span> <span> = '.$magic_amount.' ] </span> '; 
		}
	else { 
//		echo '<span>[ </span><span class="red"> '.$att_rand.' </span> <span>+</span> <span class="darkblue"> '.$mag_plus.' </span> <span> = '.$magic_amount.' ] </span> ';
	}
    if ($row['magicstrike'] < 1)
	{
	include ('update_feed.php'); // --- update feed
	}
	else
	{
	$message=""; //so doesn't display message in HUD battle status
	$_SESSION['magiccast'] = 1;
	$input = 'attack';
	$spell = 'magic strike';
	$_SESSION['spellColor'] = $spellColor = 'blue';

	}
}


// -------------------------------------------------------------------------- BUFF / HEAL
// -------------------------------------------------------------------------- BUFF / HEAL
// -------------------------------------------------------------------------- BUFF / HEAL
		

// -------------------------------------------------------------------------- CAST wings
if($input=='cast wings' || $input=='wings') 
{	
	$wings_cost = $row['wings']*10;
	if	($flying>=1) { echo $message = "You are already flying!<br>"; include ('update_feed.php'); } // --- update feed	
	else if ($row['wings'] < 1) {
		echo $message = "<i>You don't know the wings spell</i><br>";
		include ('update_feed_alt.php'); // --- update feed
		}
	else {
		$flying = $_SESSION['flying'] = $row['wings']*20;
		// $results = $link->query("UPDATE $user SET mp = mp - $wings_cost");
		updateStats($link, $username,['mp' => $mp - $wings_cost ]); // -- update stat 

		echo $message = 'You cast wings and grow some! You can now fly for '.$flying.' clicks.<br>'; 
		include ('update_feed.php'); // --- update feed
	}
}
// -------------------------------------------------------------------------- CAST gills
if($input=='cast gills' || $input=='gills') 
{	
	$gills_cost = $row['gills']*10;
	if	($breathingwater>=1) { echo $message = "You are already breathing water!<br>"; include ('update_feed.php'); } // --- update feed	
	else if ($row['gills'] < 1) {
		echo $message = "<i>You don't know the gills spell</i><br>";
		include ('update_feed_alt.php'); // --- update feed
		}
	else {
		$breathingwater = $_SESSION['breathingwater'] = $row['gills']*20;
		// $results = $link->query("UPDATE $user SET mp = mp - $gills_cost");
		updateStats($link, $username,['mp' => $mp - $gills_cost ]); // -- update stat
		echo $message = 'You cast gills and grow some! You can now breathe water for '.$breathingwater.' clicks.<br>'; 
		include ('update_feed.php'); // --- update feed
	}
}






	
	
	
// -------------------------------------------------------------------------- CAST HEAL
if($input=='cast heal' || $input=='heal') 
{	
   	$hp = $row['hp'];
   	$hpmax = $row['hpmax'];
   	$heal_amount = rand (1,$row['magmod']); //$row['restoration'];
   		echo $heal_amount;
	$heal_cost = $row['heal']*2;
	$countdown = $row['heal'];   	
   	while ($countdown > 0)
	{
   		$heal_add = rand (1,$row['magmod']);
   			echo ' + '.$heal_add;
   		$heal_amount = $heal_amount + $heal_add;
   		$countdown = $countdown - 1;
   }
   echo ' = '.$heal_amount.'<br>';

   if ($row['heal'] < 1)
	{
		echo $message="<i>You don't know the Heal spell</i><br>";
		include ('update_feed.php'); // --- update feed
	}
   else if ($hp >= $hpmax)
	{
		echo "<i>You already have full health</i><br>";
		$message="<div class='menuAction'>You already have full health</div>";
		include ('update_feed_alt.php'); // --- update feed
	}
	else if ($row['mp'] < $heal_cost)
	{
		echo "<i>You don't have enough MP to cast Heal</i><br>";
		$message="<div class='menuAction'>You don't have enough MP to cast Heal</div>";
		include ('update_feed_alt.php'); // --- update feed
	}
	else
	{
	   echo 'You cast heal for '.$heal_cost.' MP and restore '.$heal_amount.' HP <br>';
		$message="<div class='menuAction'>You cast heal for $heal_cost MP and restore $heal_amount HP</div>";
		include ('update_feed_alt.php'); // --- update feed
	// $results = $link->query("UPDATE $user SET hp = hp + $heal_amount"); // -- hp change
 	// $results = $link->query("UPDATE $user SET mp = mp - $heal_cost"); // -- mp change
	 $updates = [ // -- set changes
        'hp' => $hp + $heal_amount,
		'mp' => $mp - $heal_cost,
    ]; 
    updateStats($link, $_SESSION['username'], $updates); // -- update  
	
	$message=""; //so doesn't display message in HUD battle status
	
	
	if (($hp + $heal_amount) > $hpmax) {
		// $query = $link->query("UPDATE $user SET hp = $hpmax "); 
		updateStats($link, $username,['hp' => $hpmax ]); // -- update stat 


	}
	
	}
//$funflag=1;		
}
// -------------------------------------------------------------------------- CAST regenerate
if($input=='cast regenerate' || $input=='regenerate') 
{	
   	
	$regenerate_cost = 20 * $row['regenerate']; // cost
	
   if ($row['regenerate'] < 1)
	{
		echo $message="<p>You don't know the regenerate spell</p>";
		include ('update_feed.php'); // --- update feed
	}
	/*else if ($row['regenerate'] > 1)
	{
		echo "<i> You already have regenerate casted!</i><br>";
		$message="<p class='menuAction'> You already have regenerate casted!</p>";
		include ('update_feed_alt.php'); // --- update feed
	}
		*/
   	else if ($row['mp'] < $regenerate_cost)
	{
		echo "<p>You don't have enough MP to cast regenerate</p>";
		$message="<p class='menuAction'>You don't have enough MP to cast regenerate!</p>";
		include ('update_feed_alt.php'); // --- update feed
	}
	else
	{
		$hp = $row['hp'];
   		$hpmax = $row['hpmax'];
   		$regenerate_amount =rand ($row['regenerate'],$row['regenerate']*2); // regenerate amount
		$_SESSION['regenerate_clicks'] = $regenerate_clicks = rand ($row['mag'],$row['magmod']); // for how many clicks
	
	   	echo '<p>You cast regenerate for '.$regenerate_cost.' MP and will restore '.$regenerate_amount.' HP for '.$regenerate_clicks.' clicks</p>';
		$message="<p class='menuAction'>You cast regenerate for $regenerate_cost MP and will restore $regenerate_amount HP for $regenerate_clicks clicks</p>";
		include ('update_feed_alt.php'); // --- update feed
	
		//$results = $link->query("UPDATE $user SET hp = hp + $regenerate_amount"); // -- hp change
 		// $results = $link->query("UPDATE $user SET mp = mp - $regenerate_cost"); // -- mp change
		$updates = [ // -- set changes
			'hp' => $hp + $regenerate_amount,
			'mp' => $mp - $regenerate_cost
		]; 
		updateStats($link, $username, $updates); // -- update  
		$message=""; //so doesn't display message in HUD battle status 
	}
}
// --- regeneration add
//if ($_SESSION['regenerate_clicks'] > 0) {  

//$_SESSION['healthregen']+=$row['regenerate'];

// $_SESSION['regenerate_clicks'] -=1; // moved to status effects
//}





// -------------------------------------------------------------------------- CAST magic armor
if($input=='cast magic armor' || $input=='magic armor') 
{	
   	   
	   	$magicarmor_cost = 10 * $row['magicarmor']; // cost

	   
	if ($row['magicarmor'] < 1)
	{
		echo $message="<p>You don't know the magic armor spell</p>";
		include ('update_feed.php'); // --- update feed
	}
   	else if ($_SESSION['magicarmor_amount'] > 0)
	{
		echo "<p>You already have magic armor cast!</p>";
		$message="<p class='menuAction'>You already have magic armor cast!</p>";
		include ('update_feed_alt.php'); // --- update feed
	}
   	else if ($row['mp'] < $magicarmor_cost)
	{
		echo "<p>You don't have enough MP to cast magic armor</p>";
		$message="<p class='menuAction'>You don't have enough MP to cast magic armor</p>";
		include ('update_feed_alt.php'); // --- update feed
	}
	else
	{
		$magicarmor_amount = rand(1, $row['magmod']);
		$countdown = $row['magicarmor'];
		echo ' <span class="darkblue">[ '.$magicarmor_amount;
		while ($countdown > 1) // WILL BE ATOMIC BLAST
		{
   			$magicarmor_add = rand (1,$row['magmod']);
   			echo ' + '.$magicarmor_add;
   			$magicarmor_amount = $magicarmor_amount + $magicarmor_add;
   			$countdown = $countdown - 1;
 	  	} 
	echo ' = '.$magicarmor_amount.' ] </span>';
	$_SESSION['magicarmor_amount'] = $magicarmor_amount; //set global
	
	   echo 'You cast magic armor for '.$magicarmor_cost.' MP and will absorb an extra '.$magicarmor_amount.' damage<br>';
		$message="<div class='menuAction'>You cast magic armor for $magicarmor_cost MP and will absorb an extra $magicarmor_amount damage</div>";
		include ('update_feed_alt.php'); // --- update feed
	//$results = $link->query("UPDATE $user SET hp = hp + $magicarmor_amount"); // -- hp change
 	// $results = $link->query("UPDATE $user SET mp = mp - $magicarmor_cost"); // -- mp change
	$updates = [ // -- set changes
		'hp' => $hp + $magicarmor_amount,
		'mp' => $mp - $magicarmor_cost
	]; 
    updateStats($link, $username, $updates); // -- apply changes
	$message=""; //so doesn't display message in HUD battle status 
	
		
	}
} 



if ($_SESSION['ironskin_clicks'] > 0) {$_SESSION['ironskin_clicks'] -=1;}
else if ($_SESSION['ironskin_clicks'] == 0) {$_SESSION['ironskin_amount'] =0;}
// -------------------------------------------------------------------------- CAST iron skin
if($input=='cast iron skin' || $input=='iron skin') 
{	
   	$ironskin_cost = 10 * $row['ironskin']; // cost
	if ($row['ironskin'] < 1)
	{
		echo $message="<p>You don't know the iron skin spell</p>";
		include ('update_feed.php'); // --- update feed
	}
   	else if ($_SESSION['ironskin_amount'] > 0)
	{
		echo "<p>You already have iron skin cast!</p>";
		$message="<p class='menuAction'>You already have iron skin cast!</p>";
		include ('update_feed_alt.php'); // --- update feed
	}
   	else if ($row['mp'] < $ironskin_cost)
	{
		echo "<p>You don't have enough MP to cast iron skin</p>";
		$message="<p class='menuAction'>You don't have enough MP to cast iron skin</p>";
		include ('update_feed_alt.php'); // --- update feed
	}
	else
	{
		$_SESSION['ironskin_amount'] = $ironskin_amount = rand($row['ironskin']*2,$row['ironskin']*4);
		$_SESSION['ironskin_clicks'] = $ironskin_clicks = rand($row['mag'],$row['magmod']);
		//echo ' <span class="darkblue">[ +'.$ironskin_amount.' Def for '.$ironskin_clicks.' clicks ] </span>';
		echo '<p>You cast iron skin for '.$ironskin_cost.' MP and gain '.$ironskin_amount.' defense for '.$ironskin_clicks.' clicks</p>';
		$message="<p class='menuAction'>You cast iron skin for $ironskin_cost MP and gain $ironskin_amount defense for $ironskin_clicks clicks</p>";
		include ('update_feed_alt.php'); // --- update feed
	//$results = $link->query("UPDATE $user SET hp = hp + $ironskin_amount"); // -- hp change
 	// $results = $link->query("UPDATE $user SET mp = mp - $ironskin_cost"); // -- mp change
	$updates = [ // -- set changes
		'hp' => $hp + $ironskin_amount,
		'mp' => $mp - $ironskin_cost
	];
	updateStats($link, $username, $updates); // -- update  
	$message=""; //so doesn't display message in HUD battle status 
	}
}




//$_SESSION['regenerate_clicks']=0;

// } // -end while

?>