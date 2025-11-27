<?php

// -------------------------------------------------------------------------------------------------------------- NECKLACE

// ----------------------------------------------------------------- wooden necklace
if ($row['equipNeck'] =="wooden necklace") { 
  echo " <span>( <i class='gold'>+5</i> )</span>";
	// $results = $link->query("UPDATE $user SET defmod = defmod + 5");
	$_SESSION['defmod'] += 5;
} 
// ----------------------------------------------------------------- bone necklace
if ($row['equipNeck'] =="bone necklace") { 
  echo " <span>( <i class='gold'>+10</i> )</span>";
	// $results = $link->query("UPDATE $user SET defmod = defmod + 10");
	$_SESSION['defmod'] += 10;
}
// ----------------------------------------------------------------- stone necklace
if ($row['equipNeck'] =="stone necklace") { 
  echo " <span>( <i class='gold'>+15</i> )</span>";
	// $results = $link->query("UPDATE $user SET defmod = defmod + 15");
	$_SESSION['defmod'] += 15;
}	 
// ----------------------------------------------------------------- blue pendant
if ($row['equipNeck'] =="blue pendant") { 
  echo " <span>( <i class='red'>+10</i>, <i class='blue'>+5</i> )</span>";
	// $results = $link->query("UPDATE $user SET strmod = strmod + 10");
	// $results = $link->query("UPDATE $user SET magmod = magmod + 5");
	$_SESSION['strmod'] += 10;
	$_SESSION['magmod'] += 5;
}
// ----------------------------------------------------------------- red talisman
if ($row['equipNeck'] =="red talisman") { 
  echo " <span>( <i class='red'>+10</i>, <i class='gold'>+10</i> )</span>";
	// $results = $link->query("UPDATE $user SET strmod = strmod + 10");
	// $results = $link->query("UPDATE $user SET defmod = defmod + 10");
	$_SESSION['strmod'] += 10;
	$_SESSION['defmod'] += 10;	
}
// ----------------------------------------------------------------- green pendant
if ($row['equipNeck'] =="green pendant") { 
  echo " <span>( <i class='green'>+10</i> )</span>";
	// $results = $link->query("UPDATE $user SET dexmod = dexmod + 10");
	$_SESSION['dexmod'] += 10;
}
// ----------------------------------------------------------------- coral necklace
if ($row['equipNeck'] =="coral necklace") { 
  echo " <span>( <i class='blue'>+10</i> )</span>";
	// $results = $link->query("UPDATE $user SET magmod = magmod + 10");
	$_SESSION['magmod'] += 10;
}	 
// ----------------------------------------------------------------- vapor necklace
if ($row['equipNeck'] =="vapor necklace") { 
  echo " <span>( <i class='cyan'>+10</i> all stats )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 10");
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 10");
// $results = $link->query("UPDATE $user SET magmod = magmod + 10");
// $results = $link->query("UPDATE $user SET defmod = defmod + 10");
	$_SESSION['strmod'] += 10;
	$_SESSION['dexmod'] += 10;
	$_SESSION['magmod'] += 10;
	$_SESSION['defmod'] += 10;	
}	

// ----------------------------------------------------------------- silver necklace
if ($row['equipNeck'] =="silver necklace") { 
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
// ----------------------------------------------------------------- iron necklace
if ($row['equipNeck'] =="iron necklace") { 
  echo " <span>( <i class='gold'>+25</i> )</span>";
	// $results = $link->query("UPDATE $user SET defmod = defmod + 25");
	$_SESSION['defmod'] += 25;	
}	 		


// ----------------------------------------------------------------- shaman necklace
if ($row['equipNeck'] =="shaman necklace") { 
  echo " <span>( <i class='blue'>+5</i>, <i class='blue'>+5</i> mp regen )</span>";
	// $results = $link->query("UPDATE $user SET magmod = magmod + 5");
	$_SESSION['magmod'] += 5;
	$_SESSION['manaregen'] += 5; // regenerate 5 mana per tick
}
// ----------------------------------------------------------------- warrior pendant
if ($row['equipNeck'] =="warrior pendant") { 
  echo " <span>( <i class='red'>+25</i>, <i class='gold'>+25</i> )</span>";
	// $results = $link->query("UPDATE $user SET strmod = strmod + 25");
	// $results = $link->query("UPDATE $user SET defmod = defmod + 25");
	$_SESSION['strmod'] += 25;
	$_SESSION['defmod'] += 25;

}

	// ----------------------------------------------------------------- ranger amulet
if ($row['equipNeck'] =="ranger amulet") { 
  echo " <span>( <i class='green'>+25</i>, <i class='blue'>+5</i> )</span>";
	// $results = $link->query("UPDATE $user SET dexmod = dexmod + 25");
	// $results = $link->query("UPDATE $user SET maxmod = maxmod + 5");
	$_SESSION['dexmod'] += 25;
	$_SESSION['maxmod'] += 5;
}

	// ----------------------------------------------------------------- royal necklace
if ($row['equipNeck'] =="royal necklace") { 
  echo " <span>( <i class='blue'>+25</i> )</span>";
	// $results = $link->query("UPDATE $user SET maxmod = maxmod + 25");
	$_SESSION['maxmod'] += 25;
}

// ----------------------------------------------------------------- steel necklace
if ($row['equipNeck'] =="steel necklace") { 
  echo " <span>( <i class='gold'>+50</i> )</span>";
	// $results = $link->query("UPDATE $user SET defmod = defmod + 50");
	$_SESSION['defmod'] += 50;
}	 		


// ----------------------------------------------------------------- owl eye pendant
if ($row['equipNeck'] =="owl eye pendant") { 
  echo " <span>( <i class='green'>+30</i>, <i class='gold'>+30</i> )</span>";
	// $results = $link->query("UPDATE $user SET dexmod = dexmod + 30");
	// $results = $link->query("UPDATE $user SET defmod = defmod + 30");
	$_SESSION['dexmod'] += 30;
	$_SESSION['defmod'] += 30;
}


	// ----------------------------------------------------------------- mithril necklace
if ($row['equipNeck'] =="mithril necklace") { 
  echo " <span>( <i class='gold'>+100</i> )</span>";
	// $results = $link->query("UPDATE $user SET defmod = defmod + 100");
}	 		



?>