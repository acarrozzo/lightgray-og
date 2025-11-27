<?php

// ------------------- BUFF FEET!!!!


// ----------------------------------------------------------------- training boots buff + 1 DEF
if ($row['equipFeet'] =="training boots"){ echo " <span>( <i class='gold'>+1</i> )</span>";
// $results = $link->query("UPDATE $user SET defmod = defmod + 1"); 
$_SESSION['defmod'] += 1;   
}
// ----------------------------------------------------------------- red boots buff + 2 STR
if ($row['equipFeet'] =="red boots"){ echo " <span>( <i class='red'>+2</i> )</span>";
$_SESSION['strmod'] += 2; 
// $results = $link->query("UPDATE $user SET strmod = strmod + 2"); 
}
// ----------------------------------------------------------------- green boots buff + 2 DEX
if ($row['equipFeet'] =="green boots"){ echo " <span>( <i class='green'>+2</i> )</span>";
$_SESSION['dexmod'] += 2; 
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 2"); 
}
// ----------------------------------------------------------------- black boots buff
if ($row['equipFeet'] =="black boots"){ echo " <span>( <i class='red'>+1</i>, <i class='blue'>+1</i> )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 1");
// $results = $link->query("UPDATE $user SET magmod = magmod + 1"); 
$_SESSION['strmod'] += 1;
$_SESSION['magmod'] += 1;   
}
// ----------------------------------------------------------------- gray boots buff + 2 MAG + 1 DEF
if ($row['equipFeet'] =="gray boots"){ echo " <span>( <i class='blue'>+2</i>, <i class='gold'>+1</i> )</span>";
// $results = $link->query("UPDATE $user SET magmod = magmod + 2");
// $results = $link->query("UPDATE $user SET defmod = defmod + 1");
$_SESSION['magmod'] += 2;
$_SESSION['defmod'] += 1;    
}
// ----------------------------------------------------------------- slippers buff + 1 ALL STATS
if ($row['equipFeet'] =="slippers"){ echo " <span>( <i class='cyan'>+1</i> all stats )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 1");
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 1");
// $results = $link->query("UPDATE $user SET magmod = magmod + 1");
// $results = $link->query("UPDATE $user SET defmod = defmod + 1"); 
$_SESSION['strmod'] += 1;
$_SESSION['dexmod'] += 1;
$_SESSION['magmod'] += 1;
$_SESSION['defmod'] += 1;    
}
// ----------------------------------------------------------------- leather boots buff
if ($row['equipFeet'] =="leather boots"){ echo " <span>( <i class='green'>+3</i>, <i class='gold'>+3</i> )</span>";
// $results = $link->query("UPDATE $user SET defmod = defmod + 3");
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 3"); 
$_SESSION['defmod'] += 3;
$_SESSION['dexmod'] += 3;
}
// ----------------------------------------------------------------- troll boots buff
if ($row['equipFeet'] =="troll boots"){ echo " <span>( <i class='red'>+3</i>, <i class='gold'>+3</i> )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 3"); 
// $results = $link->query("UPDATE $user SET defmod = defmod + 3"); 
$_SESSION['strmod'] += 3;
$_SESSION['defmod'] += 3;   
}
// ----------------------------------------------------------------- bone boots buff
if ($row['equipFeet'] =="bone boots"){ echo " <span>( <i class='blue'>+4</i>, <i class='gold'>+4</i> )</span>";
// $results = $link->query("UPDATE $user SET magmod = magmod + 4"); 
// $results = $link->query("UPDATE $user SET defmod = defmod + 4"); 
$_SESSION['magmod'] += 4;
$_SESSION['defmod'] += 4;   
}
// ----------------------------------------------------------------- iron boots buff
if ($row['equipFeet'] =="iron boots"){ echo " <span>( <i class='gold'>+20</i> )</span>";
// $results = $link->query("UPDATE $user SET defmod = defmod + 20"); 
$_SESSION['defmod'] += 20;   
}

// ----------------------------------------------------------------- bigfoot boots buff
if ($row['equipFeet'] =="bigfoot boots"){ echo " <span>( <i class='red'>+10</i>, <i class='gold'>+20</i> )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 10"); 
// $results = $link->query("UPDATE $user SET defmod = defmod + 20"); 
$_SESSION['strmod'] += 10; 
$_SESSION['defmod'] += 20; 
}
// ----------------------------------------------------------------- bandit boots buff
if ($row['equipFeet'] =="bandit boots"){ echo " <span>( <i class='green'>+6</i>, <i class='gold'>+2</i> )</span>";
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 6"); 
// $results = $link->query("UPDATE $user SET defmod = defmod + 2"); 
$_SESSION['dexmod'] += 6;
$_SESSION['defmod'] += 2; 
}
// ----------------------------------------------------------------- mud boots buff
if ($row['equipFeet'] =="mud boots"){ echo " <span>( <i class='red'>+6</i>, <i class='blue'>+3</i> )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 6"); 
// $results = $link->query("UPDATE $user SET magmod = magmod + 3"); 
$_SESSION['strmod'] += 6;
$_SESSION['magmod'] += 3; 
}
// ----------------------------------------------------------------- warlock boots buff
if ($row['equipFeet'] =="warlock boots"){ echo " <span>( <i class='blue'>+7</i> )</span>";
// $results = $link->query("UPDATE $user SET magmod = magmod + 7"); 
$_SESSION['magmod'] += 7; 

}
// ----------------------------------------------------------------- silver boots buff
if ($row['equipFeet'] =="silver boots"){ echo " <span>( <i class='gold'>+30</i>, <i class='blue'>+1</i> )</span>";
// $results = $link->query("UPDATE $user SET defmod = defmod + 30");
// $results = $link->query("UPDATE $user SET magmod = magmod + 1"); 
$_SESSION['defmod'] += 30;
$_SESSION['magmod'] += 1;   
}
// ----------------------------------------------------------------- steel boots buff
if ($row['equipFeet'] =="steel boots"){ echo " <span>( <i class='gold'>+35</i> )</span>";
// $results = $link->query("UPDATE $user SET defmod = defmod + 35");
$_SESSION['defmod'] += 35;    
}
// ----------------------------------------------------------------- thunder boots buff
if ($row['equipFeet'] =="thunder boots"){ echo " <span>( <i class='red'>+12</i>, <i class='gold'>+12</i> )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 12"); 
// $results = $link->query("UPDATE $user SET defmod = defmod + 12"); 
$_SESSION['strmod'] += 12;
$_SESSION['defmod'] += 12; 
}
// ----------------------------------------------------------------- ranger boots buff
if ($row['equipFeet'] =="ranger boots"){ echo " <span>( <i class='green'>+15</i> )</span>";
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 15"); 
$_SESSION['dexmod'] += 15; 
}
// ----------------------------------------------------------------- silver slippers buff
if ($row['equipFeet'] =="silver slippers"){ echo " <span>( <i class='cyan'>+10</i> all stats )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 10");
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 10");
// $results = $link->query("UPDATE $user SET magmod = magmod + 10");
// $results = $link->query("UPDATE $user SET defmod = defmod + 10"); 
$_SESSION['strmod'] += 10;
$_SESSION['dexmod'] += 10;
$_SESSION['magmod'] += 10;
$_SESSION['defmod'] += 10; 
}


?>