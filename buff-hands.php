<?php

// ------------------- BUFF HANDS!!!!
// ----------------------------------------------------------------- training gloves buff + 1 DEX
if ($row['equipHands'] =="training gloves"){ echo " <span>( <i class='green'>+1</i> )</span>";
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 1"); 
$_SESSION['dexmod'] += 1;
} 
// ----------------------------------------------------------------- wrist bracers buff + 2 STR
if ($row['equipHands'] =="wrist bracers"){ echo " <span>( <i class='red'>+2</i> )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 2"); 
$_SESSION['strmod'] += 2;
}
// ----------------------------------------------------------------- glowing brace buff + 1 MAG
if ($row['equipHands'] =="glowing brace"){ echo " <span>( <i class='blue'>+1</i> )</span>";
// $results = $link->query("UPDATE $user SET magmod = magmod + 1"); 
$_SESSION['magmod'] += 1;
} 
// ----------------------------------------------------------------- black gloves buff + 1 STR, +2 DEF
if ($row['equipHands'] =="black gloves"){ echo " <span>( <i class='red'>+1</i>, <i class='gold'>+2</i> )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 1");
// $results = $link->query("UPDATE $user SET defmod = defmod + 2");
$_SESSION['strmod'] += 1;
$_SESSION['defmod'] += 2;
} 
// ----------------------------------------------------------------- green gloves buff + 2 DEX
if ($row['equipHands'] =="green gloves"){ echo " <span>( <i class='green'>+2</i> )</span>";
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 2"); 
$_SESSION['dexmod'] += 2;  
} 
// ----------------------------------------------------------------- gray gloves buff + 2 MAG
if ($row['equipHands'] =="gray gloves"){ echo " <span>( <i class='blue'>+2</i> )</span>";
// $results = $link->query("UPDATE $user SET magmod = magmod + 2"); 
$_SESSION['magmod'] += 2;  
} 
// ----------------------------------------------------------------- leather gloves buff
if ($row['equipHands'] =="leather gloves"){ echo " <span>( <i class='green'>+3</i>, <i class='gold'>+3</i> )</span>";
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 3");
// $results = $link->query("UPDATE $user SET defmod = defmod + 3"); 
$_SESSION['dexmod'] += 3;
$_SESSION['defmod'] += 3;  
} 
// ----------------------------------------------------------------- hunter gloves buff + 3 STR, + 3 DEX, + 3 DEF
if ($row['equipHands'] =="hunter gloves"){ echo " <span>( <i class='red'>+3</i>, <i class='green'>+3</i>, <i class='gold'>+3</i> )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 3");
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 3");
// $results = $link->query("UPDATE $user SET defmod = defmod + 3");
$_SESSION['strmod'] += 3;
$_SESSION['dexmod'] += 3;
$_SESSION['defmod'] += 3;   
} 
// ----------------------------------------------------------------- troll gloves buff + 3 STR, + 3 MAG
if ($row['equipHands'] =="troll gloves"){ echo " <span>( <i class='red'>+3</i>, <i class='blue'>+3</i> )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 3");
// $results = $link->query("UPDATE $user SET magmod = magmod + 3"); 
$_SESSION['strmod'] += 3;
$_SESSION['magmod'] += 3;   
} 

// ----------------------------------------------------------------- iron gauntlets buff
if ($row['equipHands'] =="iron gauntlets"){ echo " <span>( <i class='gold'>+20</i> )</span>";
// $results = $link->query("UPDATE $user SET defmod = defmod + 20");
$_SESSION['defmod'] += 20;   
} 
// ----------------------------------------------------------------- iron gloves buff
if ($row['equipHands'] =="iron gloves"){ echo " <span>( <i class='red'>+5</i>, <i class='gold'>+10</i> )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 5");
// $results = $link->query("UPDATE $user SET defmod = defmod + 10");
$_SESSION['strmod'] += 5;
$_SESSION['defmod'] += 10;  
} 
// ----------------------------------------------------------------- iron knuckles buff
if ($row['equipHands'] =="iron knuckles"){ echo " <span>( <i class='red'>+20</i> )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 20"); 
$_SESSION['strmod'] += 20;   
} 
// ----------------------------------------------------------------- gator gloves buff
if ($row['equipHands'] =="gator gloves"){ echo " <span>( <i class='green'>+9</i>, <i class='gold'>+9</i> )</span>";
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 9");
// $results = $link->query("UPDATE $user SET defmod = defmod + 9");
$_SESSION['dexmod'] += 9;
$_SESSION['defmod'] += 9;   
} 
// ----------------------------------------------------------------- bandit gloves buff
if ($row['equipHands'] =="bandit gloves"){ echo " <span>( <i class='green'>+5</i>, <i class='blue'>+3</i>  )</span>";
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 5");
// $results = $link->query("UPDATE $user SET magmod = magmod + 3");
$_SESSION['dexmod'] += 5;
$_SESSION['magmod'] += 3;   
} 
// ----------------------------------------------------------------- grotto gloves buff
if ($row['equipHands'] =="grotto gloves"){ echo " <span>( <i class='blue'>+5</i> )</span>";
// $results = $link->query("UPDATE $user SET magmod = magmod + 5");
$_SESSION['magmod'] += 5;   
} 


// ----------------------------------------------------------------- silver gauntlets buff
if ($row['equipHands'] =="silver gauntlets"){ echo " <span>( <i class='gold'>+30</i>, <i class='blue'>+1</i> )</span>";
// $results = $link->query("UPDATE $user SET defmod = defmod + 30");
// $results = $link->query("UPDATE $user SET magmod = magmod + 1");
$_SESSION['defmod'] += 30;
$_SESSION['magmod'] += 1;   
}
// ----------------------------------------------------------------- steel gauntlets buff
if ($row['equipHands'] =="steel gauntlets"){ echo " <span>( <i class='gold'>+35</i> )</span>";
// $results = $link->query("UPDATE $user SET defmod = defmod + 35"); 
$_SESSION['defmod'] += 35;   
} 
// ----------------------------------------------------------------- steel gloves buff
if ($row['equipHands'] =="steel gloves"){ echo " <span>( <i class='red'>+10</i>, <i class='gold'>+20</i> )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 10");
// $results = $link->query("UPDATE $user SET defmod = defmod + 20");
$_SESSION['strmod'] += 10;
$_SESSION['defmod'] += 20;  
} 
// ----------------------------------------------------------------- silk bracers buff
if ($row['equipHands'] =="silk bracers"){ echo " <span>( <i class='green'>+8</i>, <i class='blue'>+5</i> )</span>";
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 8");
// $results = $link->query("UPDATE $user SET magmod = magmod + 5");
$_SESSION['dexmod'] += 8;
$_SESSION['magmod'] += 5;   
} 
// ----------------------------------------------------------------- ranger gloves buff
if ($row['equipHands'] =="ranger gloves"){ echo " <span>( <i class='green'>+15</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod + 15");
$_SESSION['dexmod'] += 15;
} 
    // ----------------------------------------------------------------- glowing gloves buff
if ($row['equipHands'] =="glowing gloves"){ echo " <span>( <i class='blue'>+10</i> )</span>";
    // $results = $link->query("UPDATE $user SET magmod = magmod + 10");
$_SESSION['magmod'] += 10;  
} 

	



?>