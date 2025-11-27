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

		$hpmax=$row['hpmax'];   
		$mpmax=$row['mpmax'];   
		 
		$hp=$row['hp'];   
		$mp=$row['mp'];
		
		$regenHP = $_SESSION['healthregen'];
		$regenMP = $_SESSION['manaregen'];
		
		
		$flying = $_SESSION['flying'];
		$breathingwater = $_SESSION['breathingwater'];
		
		$infight = $row['infight'];
		$endfight = $row['endfight'];
	
//echo '<br>';
//echo '<br>HP REGEN RINGZ:'. $_SESSION['healthregen'];
//echo '<br>HP REGENNNZ:'. $regenHP;
//echo '<br>HP REGENNNZ CLICKZ:'. $_SESSION['regenerate_clicks'];
//echo '<br>HP SPELL REGEN:'. $row['regenerate'];
//echo '<br>';

if	($_SESSION['tea']>0) {  // tea adjustment before regen being applied
		$regenHP+=5;
		$regenMP+=5;
		echo '<br>HP TEA REGEN +5 clicks:'. $_SESSION['tea'];

}
if ($_SESSION['regenerate_clicks']>0){
	echo '<span>[ regen +'.$row['regenerate'].' hp / '.$_SESSION['regenerate_clicks'].' clicks ]</span> ';
	$_SESSION['regenerate_clicks'] -=1;
	$regenHP+=$row['regenerate'];
	}
	//echo '<br>HP REGENNNZ:'. $regenHP;

// --------------------------------------------------------------------------- REGEN STATUS EFFECTS - HP
if ($regenHP >= 1 && $hp < $hpmax ) { 
		echo '<span class="lightred">[ +'.$regenHP.' HP ]</span> ';
		//$message = 'You regen <span class="green"> '.$regenHP.' </span> HP.<br>'; include ('update_feed.php');
		$results = $link->query("UPDATE $user SET hp = hp + $regenHP");
		if ( ($hp + $regenHP > $hpmax) && $input !="rest") {$query = $link->query("UPDATE $user SET hp = hpmax "); } // if healing goes over max HP
}
// --------------------------------------------------------------------------- REGEN STATUS EFFECTS - MP
if ($regenMP >= 1 && $mp < $mpmax && $_SESSION['magiccast'] != 1 && $_SESSION['noMPregen'] != 1) {
		echo '<span class="blue">[ +'.$regenMP.' MP ]</span> ';
		//$message = 'You regen <span class="green"> '.$regenHP.' </span> HP.<br>'; include ('update_feed.php');
		$results = $link->query("UPDATE $user SET mp = mp + $regenMP");
		if ( $mp + $regenMP > $mpmax) {$query = $link->query("UPDATE $user SET mp = mpmax "); } // if healing goes over max HP
}

//$query = $link->query("UPDATE $user SET mp = 10000 ");

// --------------------------------------------------------------------------- IRON SKIN - SHOW STATUS
if ($_SESSION['ironskin_amount'] >= 1) { 
		echo '<span>[ <span class="lightbrown"> iron skin</span> <span class="gold">+'.$_SESSION['ironskin_amount'].' def</span> / '.$_SESSION['ironskin_clicks'].' clicks ]</span> ';
		}	

// --------------------------------------------------------------------------- YOURE POISONED!
if ($_SESSION['poisonyou'] > 0 ) // ------- Poison on YOU
{	
	if ($infight == 0){ 
	$poisonyou = $_SESSION['poisonyou'] = $_SESSION['poisonyou'] - 1;
	
	$results = $link->query("UPDATE $user SET hp = hp - $poisonyou"); // subtract enemy hp w/ poison

	}
echo "<span class='green'> [ poison: -$poisonyou HP ]</span> ";
}		




// --------------------------------------------------------------------------- COLORS!
		if	($_SESSION['coffee']>0) { 
					$_SESSION['coffee'] = $_SESSION['coffee'] - 1;
					echo "<span>[ <span class='lightbrown'>coffee +10 all stats</span> / ".$_SESSION['coffee']." ] </span> "; } // --- update feed

		if	($_SESSION['tea']>0) { 
					$_SESSION['tea'] = $_SESSION['tea'] - 1;
					echo "<span>[ <span class='yellowgreen'>tea +5 regen</span> / ".$_SESSION['tea']." ] </span> ";
		}		
	//	echo ' HRgn: '.	$_SESSION['healthregen'];
	//	echo ' MRgn: '.	$_SESSION['manaregen'];
	//	echo ' TEA: '.$_SESSION['tea'];

					
		
		
		if	($_SESSION['reds']>0) { 
					$_SESSION['reds'] = $_SESSION['reds'] - 1;
					echo "<span>[ <span class='red'>reds +20 str</span> / ".$_SESSION['reds']." ] </span> "; } // --- update feed
		if	($_SESSION['greens']>0) { 
					$_SESSION['greens'] = $_SESSION['greens'] - 1;
					echo "<span>[ <span class='green'>greens +20 dex</span> / ".$_SESSION['greens']." ] </span> "; } // --- update feed
		if	($_SESSION['blues']>0) { 
					$_SESSION['blues'] = $_SESSION['blues'] - 1;
					echo "<span>[ <span class='blue'>blues +20 mag</span> / ".$_SESSION['blues']." ] </span> "; } // --- update feed
		if	($_SESSION['yellows']>0) { 
					$_SESSION['yellows'] = $_SESSION['yellows'] - 1;
					echo "<span>[ <span class='gold'>yellows +20 def</span> / ".$_SESSION['yellows']." ] </span> "; } // --- update feed
		if	($_SESSION['poisonimmune']>0) { 
					$_SESSION['poisonimmune'] = $_SESSION['poisonimmune'] - 1;
					echo "<span>[ <span class='green'>Poison Immune</span> / ".$_SESSION['poisonimmune']." ] </span> "; } // --- update feed



		
// --------------------------------------------------------------------------- WINGS BUFF
		if	($flying>=1) { 		$flying = $_SESSION['flying'] = $_SESSION['flying'] - 1;
								echo "<span>[ <span class='lightblue'>wings</span> / $flying ] </span> "; } // --- update feed	
// --------------------------------------------------------------------------- GILLS BUFF
		if	($breathingwater>=1) { 		$breathingwater = $_SESSION['breathingwater'] = $_SESSION['breathingwater'] - 1;
								echo "<span>[ <span class='blue'>gills</span> / $breathingwater ] </span> "; } // --- update feed		

		
// } // end database while

// echo '<br>-<br>';


?>