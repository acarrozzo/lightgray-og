<?php
 
// -------------------------------------------------------------------------------------------------------------- ARTIFACT

// ----------------------------------------------------------------- squid tooth artifact
if ($row['equipArtifact'] =="squid tooth"){ 
	echo " <span>( <i class='green'>+25</i> )</span>";
	// $results = $link->query("UPDATE $user SET dexmod = dexmod + 25");
	$_SESSION['dexmod'] += 25;
}
// ----------------------------------------------------------------- coral coin artifact
if ($row['equipArtifact'] =="coral coin"){ 
	echo " <span>( <i class='cyan'>+5</i> all stats )</span>";
	// $results = $link->query("UPDATE $user SET strmod = strmod + 5");
	// $results = $link->query("UPDATE $user SET dexmod = dexmod + 5");
	// $results = $link->query("UPDATE $user SET magmod = magmod + 5");
	// $results = $link->query("UPDATE $user SET defmod = defmod + 5");
	$_SESSION['strmod'] += 5;
	$_SESSION['dexmod'] += 5;
	$_SESSION['magmod'] += 5;
	$_SESSION['defmod'] += 5;
}
	
// ----------------------------------------------------------------- pearl of wisdom artifact
if ($row['equipArtifact'] =="pearl of wisdom"){ 
	echo " <span>( <i class='blue'>+50</i>, <i class='gold'>+50</i> )</span>";
	// $results = $link->query("UPDATE $user SET magmod = magmod + 50");
	// $results = $link->query("UPDATE $user SET defmod = defmod + 50");
	$_SESSION['magmod'] += 50;
	$_SESSION['defmod'] += 50;
}	
	
	
?>