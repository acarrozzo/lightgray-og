<?php

// -------------------------------------------------------------------------------------------------------------- AURA

// ----------------------------------------------------------------- silver aura
if ($row['equipAura'] =="silver aura"){ 
	echo " <span>( <i class='cyan'>+20</i> all stats )</span>";
	// $results = $link->query("UPDATE $user SET strmod = strmod + 20");
	// $results = $link->query("UPDATE $user SET dexmod = dexmod + 20");
	// $results = $link->query("UPDATE $user SET magmod = magmod + 20");
	// $results = $link->query("UPDATE $user SET defmod = defmod + 20");
	$_SESSION['strmod'] += 20;
	$_SESSION['dexmod'] += 20;
	$_SESSION['magmod'] += 20;
	$_SESSION['defmod'] += 20;
}
	
	
?>