<?php

// -------------------------------------------------------------------------------------------------------------- MOUNT



// ----------------------------------------------------------------- wooden boat +25 DEF
if ($row['equipMount'] == "wooden boat"){ 
	echo "<span>( <i class='gold'>+25</i> )</span>";
// $results = $link->query("UPDATE $user SET defmod = defmod + 25"); 
$_SESSION['defmod'] += 25;
}



// ----------------------------------------------------------------- dire wolf
if ($row['equipMount'] == "dire wolf"){ 
	echo " <span>( <i class='red'>+50</i>, <i class='gold'>+50</i> )</span>"; 
// $results = $link->query("UPDATE $user SET strmod = strmod + 50"); 
// $results = $link->query("UPDATE $user SET defmod = defmod + 50"); 
$_SESSION['strmod'] += 50;
$_SESSION['defmod'] += 50;
}
// ----------------------------------------------------------------- sky hawk
if ($row['equipMount'] == "sky hawk"){ 
	echo " <span>( <i class='blue'>+25</i>, <i class='blue'>+5 mp</i> regen )</span>"; 
// $results = $link->query("UPDATE $user SET magmod = magmod + 25"); 
$_SESSION['magmod'] += 25;
$_SESSION['manaregen']= $_SESSION['manaregen']+5;
$_SESSION['flying'] =2;
	}
// ----------------------------------------------------------------- green griffin
if ($row['equipMount'] == "green griffin"){ 
	echo " <span>( <i class='green'>+50</i> )</span>"; 
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 50");
$_SESSION['dexmod'] += 50;
$_SESSION['flying'] =2; 
}

?>