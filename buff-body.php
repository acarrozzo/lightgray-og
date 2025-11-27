<?php

// ------------------- BUFF BODY!!!!

// ----------------------------------------------------------------- training armor buff + 3 DEF
if ($row['equipBody'] =="training armor"){ echo " <span>( <i class='gold'>+3</i> )</span>";
// $results = $link->query("UPDATE $user SET defmod = defmod + 3");
$_SESSION['defmod'] += 3;
}
// ----------------------------------------------------------------- training armor pro buff  + 5 DEF, +1 STR, +1 DEX
if ($row['equipBody'] =="training armor pro"){ echo ' <span>( <i class="gold">+5</i>, <i class="red">+1</i>, <i class="green">+1</i> )</span>';
// $results = $link->query("UPDATE $user SET defmod = defmod + 5");
// $results = $link->query("UPDATE $user SET strmod = strmod + 1");
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 1");
$_SESSION['defmod'] += 5;
$_SESSION['strmod'] += 1;
$_SESSION['dexmod'] += 1;
}
// ----------------------------------------------------------------- padded armor buff
if ($row['equipBody'] =="padded armor"){ echo " <span>( <i class='gold'>+13</i> )</span>";
// $results = $link->query("UPDATE $user SET defmod = defmod + 13"); 
$_SESSION['defmod'] += 13;
}
// ----------------------------------------------------------------- pajamas buff + 2 ALL STATS
if ($row['equipBody'] =="pajamas"){ echo " <span>( <i class='cyan'>+2</i> all stats )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 2");
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 2");
// $results = $link->query("UPDATE $user SET magmod = magmod + 2");
// $results = $link->query("UPDATE $user SET defmod = defmod + 2"); 
$_SESSION['strmod'] += 2;
$_SESSION['dexmod'] += 2;
$_SESSION['magmod'] += 2;
$_SESSION['defmod'] += 2;
}
// ----------------------------------------------------------------- green cloak buff
if ($row['equipBody'] =="green cloak"){ echo " <span>( <i class='green'>+5</i>, <i class='gold'>+5</i> )</span>";
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 5");
// $results = $link->query("UPDATE $user SET defmod = defmod + 5"); 
$_SESSION['dexmod'] += 5;
$_SESSION['defmod'] += 5;
}
// ----------------------------------------------------------------- black robe buff
if ($row['equipBody'] =="black robe"){ echo " <span>( <i class='red'>+3</i>, <i class='blue'>+3</i> )</span>";
// $results = $link->query("UPDATE $user SET magmod = magmod + 3");
// $results = $link->query("UPDATE $user SET strmod = strmod + 3");
$_SESSION['magmod'] += 3;
$_SESSION['strmod'] += 3;

}
// ----------------------------------------------------------------- gray robe buff 
if ($row['equipBody'] =="gray robe"){ echo " <span>( <i class='blue'>+6</i> )</span>";
// $results = $link->query("UPDATE $user SET magmod = magmod + 6"); 
$_SESSION['magmod'] += 6;
}
// ----------------------------------------------------------------- leather vest buff 
if ($row['equipBody'] =="leather vest"){ echo " <span>( <i class='green'>+6</i> )</span>";
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 6"); 
$_SESSION['dexmod'] += 6;
}
// ----------------------------------------------------------------- leather armor buff 
if ($row['equipBody'] =="leather armor"){ echo " <span>( <i class='red'>+4</i>, <i class='gold'>+10</i> )</span>";
// $results = $link->query("UPDATE $user SET defmod = defmod + 10");
// $results = $link->query("UPDATE $user SET strmod = strmod + 4"); 
$_SESSION['defmod'] += 10;
$_SESSION['strmod'] += 4;

}
// ----------------------------------------------------------------- sasquatch cloak buff 
if ($row['equipBody'] =="sasquatch cloak"){ echo " <span>( <i class='red'>+8</i>, <i class='gold'>+8</i> )</span>";
// $results = $link->query("UPDATE $user SET defmod = defmod + 8");
// $results = $link->query("UPDATE $user SET strmod = strmod + 8"); 
$_SESSION['defmod'] += 8;
$_SESSION['strmod'] += 8;
}
// ----------------------------------------------------------------- turtle shell buff
if ($row['equipBody'] =="turtle shell"){ echo " <span>( <i class='cyan'>+5</i> all stats )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 5");
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 5");
// $results = $link->query("UPDATE $user SET magmod = magmod + 5");
// $results = $link->query("UPDATE $user SET defmod = defmod + 5");
$_SESSION['strmod'] += 5;
$_SESSION['dexmod'] += 5;
$_SESSION['magmod'] += 5;
$_SESSION['defmod'] += 5;
}


// ----------------------------------------------------------------- iron armor buff
if ($row['equipBody'] =="iron armor"){ echo " <span>( <i class='gold'>+30</i> )</span>";
// $results = $link->query("UPDATE $user SET defmod = defmod + 30"); 
$_SESSION['defmod'] += 30;
}
// ----------------------------------------------------------------- iron cape buff
if ($row['equipBody'] =="iron cape"){ echo " <span>( <i class='red'>+15</i> )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 15"); 

$_SESSION['strmod'] += 15;
}
// ----------------------------------------------------------------- black cape buff
if ($row['equipBody'] =="black cape"){ echo " <span>( <i class='red'>+10</i>, <i class='gold'>+10</i> )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 10");
// $results = $link->query("UPDATE $user SET defmod = defmod + 10"); 
$_SESSION['strmod'] += 10;
$_SESSION['defmod'] += 10;
}
// ----------------------------------------------------------------- forest cloak buff
if ($row['equipBody'] =="forest cloak"){ echo " <span>( <i class='green'>+10</i>, <i class='blue'>+4</i> )</span>";
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 10");
// $results = $link->query("UPDATE $user SET magmod = magmod + 4"); 
$_SESSION['dexmod'] += 10;
$_SESSION['magmod'] += 4;
}
// ----------------------------------------------------------------- warlock robe buff
if ($row['equipBody'] =="warlock robe"){ echo " <span>( <i class='blue'>+10</i>, <i class='black'>-10 def</i> )</span>";
// $results = $link->query("UPDATE $user SET magmod = magmod + 10");
// $results = $link->query("UPDATE $user SET defmod = defmod - 10"); 
$_SESSION['magmod'] += 10;
$_SESSION['defmod'] -= 10;
}
// ----------------------------------------------------------------- champion armor buff
if ($row['equipBody'] =="champion armor"){ echo " <span>( <i class='gold'>+45</i>, <i class='red'>+5</i>, <i class='blue'>+5</i> )</span>";
// $results = $link->query("UPDATE $user SET defmod = defmod + 45");
// $results = $link->query("UPDATE $user SET strmod = strmod + 5");
// $results = $link->query("UPDATE $user SET magmod = magmod + 5"); 
$_SESSION['defmod'] += 45;
$_SESSION['strmod'] += 5;
$_SESSION['magmod'] += 5;
}



// ----------------------------------------------------------------- silver breastplate buff
if ($row['equipBody'] =="silver breastplate"){ echo " <span>( <i class='gold'>+50</i>, <i class='blue'>+1</i> )</span>";
// $results = $link->query("UPDATE $user SET defmod = defmod + 50");
// $results = $link->query("UPDATE $user SET magmod = magmod + 1"); 
$_SESSION['defmod'] += 50;
$_SESSION['magmod'] += 1;
}
// ----------------------------------------------------------------- steel armor buff
if ($row['equipBody'] =="steel armor"){ echo " <span>( <i class='gold'>+60</i> )</span>";
// $results = $link->query("UPDATE $user SET defmod = defmod + 60"); 
$_SESSION['defmod'] += 60;
}
// ----------------------------------------------------------------- steel cape buff
if ($row['equipBody'] =="steel cape"){ echo " <span>( <i class='red'>+30</i> )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 30"); 
$_SESSION['strmod'] += 30;
}
// ----------------------------------------------------------------- ranger cloak buff
if ($row['equipBody'] =="ranger cloak"){ echo " <span>( <i class='green'>+25</i> )</span>";
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 25"); 
$_SESSION['dexmod'] += 25;
}
// ----------------------------------------------------------------- yeti cloak buff
if ($row['equipBody'] =="yeti cloak"){ echo " <span>( <i class='red'>+25</i>, <i class='gold'>+25</i> )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 25");
// $results = $link->query("UPDATE $user SET defmod = defmod + 25");
$_SESSION['strmod'] += 25;
$_SESSION['defmod'] += 25;
}
// ----------------------------------------------------------------- demon cape buff
if ($row['equipBody'] =="demon cape"){ echo " <span>( <i class='blue'>+20</i>, <i class='black'>-20 def</i> )</span>";
// $results = $link->query("UPDATE $user SET magmod = magmod + 20");
// $results = $link->query("UPDATE $user SET defmod = defmod - 20"); 
$_SESSION['magmod'] += 20;
$_SESSION['defmod'] -= 20;
}
// ----------------------------------------------------------------- silver pajamas buff
if ($row['equipBody'] =="silver pajamas"){ echo " <span>( <i class='cyan'>+20</i> all stats )</span>";
// $results = $link->query("UPDATE $user SET strmod = strmod + 20");
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 20");
// $results = $link->query("UPDATE $user SET magmod = magmod + 20");
// $results = $link->query("UPDATE $user SET defmod = defmod + 20");  
$_SESSION['strmod'] += 20;
$_SESSION['dexmod'] += 20;
$_SESSION['magmod'] += 20;
$_SESSION['defmod'] += 20;
}
	


// ----------------------------------------------------------------- mithril armor buff
if ($row['equipBody'] =="mithril armor"){ echo " <span>( <i class='gold'>+100</i> )</span>";
    // $results = $link->query("UPDATE $user SET defmod = defmod + 100"); 
    $_SESSION['defmod'] += 100;
}
// ----------------------------------------------------------------- mithril cape buff
if ($row['equipBody'] =="mithril cape"){ echo " <span>( <i class='red'>+50</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod + 50"); 
    $_SESSION['strmod'] += 50;
}


// ----------------------------------------------------------------- snow vest buff
if ($row['equipBody'] =="snow vest"){ echo " <span>( <i class='green'>+20</i> dex, <i class='blue'>+5</i> mag, <i class='gold'>+50</i> def )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod + 20");
    // $results = $link->query("UPDATE $user SET magmod = magmod + 5");
    // $results = $link->query("UPDATE $user SET defmod = defmod + 50"); 
    $_SESSION['dexmod'] += 20;
    $_SESSION['magmod'] += 5;
    $_SESSION['defmod'] += 50;
 }
// ----------------------------------------------------------------- black cloak buff
if ($row['equipBody'] =="black cloak"){ echo " <span>( <i class='red'>+40</i> str, <i class='blue'>+20</i> mag )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod + 40");
    // $results = $link->query("UPDATE $user SET magmod = magmod + 20"); 
    $_SESSION['strmod'] += 40;
    $_SESSION['magmod'] += 20;
}

?>