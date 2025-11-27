<?php
// ------------------- BUFF HEAD!!!!
// // ----------------------------------------------------------------- training helmet buff + 2 DEF
if ($row['equipHead'] =="training helmet"){
echo " <span>( <i class='gold'>+2</i> )</span>";
// // $results = $link->query("UPDATE $user SET defmod = defmod + 2"); 
        $_SESSION['defmod'] += 2;   }
// ----------------------------------------------------------------- basic helmet buff + 5 DEF
if ($row['equipHead'] =="basic helmet"){
echo " <span>( <i class='gold'>+5</i> )</span>";        // 'defmod' => $_SESSION['defmod'] + 5
        $_SESSION['defmod'] += 5; 
// // $results = $link->query("UPDATE $user SET defmod = defmod + 5"); 
}
// ----------------------------------------------------------------- basic hood + 1 STR + 1 DEX + 1 MAG
if ($row['equipHead'] =="basic hood"){
echo " <span>( <i class='red'>+1</i>, <i class='green'>+1</i>, <i class='blue'>+1</i> )</span>";        // 'strmod' => $_SESSION['strmod'] + 1,
        // 'dexmod' => $_SESSION['dexmod'] + 1,
        // 'magmod' => $_SESSION['magmod'] + 1
        $_SESSION['strmod'] += 1;
        $_SESSION['dexmod'] += 1;
        $_SESSION['magmod'] += 1;
// // $results = $link->query("UPDATE $user SET strmod = strmod + 1");
// // $results = $link->query("UPDATE $user SET dexmod = dexmod + 1");
// // $results = $link->query("UPDATE $user SET magmod = magmod + 1"); 
}
// ----------------------------------------------------------------- red hood + 2 STR
if ($row['equipHead'] =="red hood"){
echo " <span>( <i class='red'>+2</i> )</span>";// // $results = $link->query("UPDATE $user SET strmod = strmod + 2"); 
$_SESSION['strmod'] += 2; 
}
// ----------------------------------------------------------------- green hood + 2 DEX
if ($row['equipHead'] =="green hood"){
echo " <span>( <i class='green'>+2</i> )</span>";
// // $results = $link->query("UPDATE $user SET dexmod = dexmod + 2"); 
$_SESSION['dexmod'] += 2; 
}// ----------------------------------------------------------------- blue hood + 2 MAG
if ($row['equipHead'] =="blue hood"){
echo " <span>( <i class='blue'>+2</i> )</span>";
// // $results = $link->query("UPDATE $user SET magmod = magmod + 2"); 
$_SESSION['magmod'] += 2; 
}
// ----------------------------------------------------------------- leather hood + 4 DEX, +4 DEF
if ($row['equipHead'] =="leather hood"){
echo " <span>( <i class='green'>+4</i>, <i class='gold'>+4</i> )</span>";
// // $results = $link->query("UPDATE $user SET dexmod = dexmod + 4");
// $results = $link->query("UPDATE $user SET defmod = defmod + 4"); 
$_SESSION['dexmod'] += 4;
$_SESSION['defmod'] += 4;
}
// ----------------------------------------------------------------- leather helmet +2 STR +10 DEF
if ($row['equipHead'] =="leather helmet"){
echo " <span>( <i class='red'>+2</i>, <i class='gold'>+10</i> )</span>";
// // $results = $link->query("UPDATE $user SET strmod = strmod + 2");
// $results = $link->query("UPDATE $user SET defmod = defmod + 10"); 
$_SESSION['strmod'] += 2;
$_SESSION['defmod'] += 10;
}
// ----------------------------------------------------------------- horned helmet +5 STR
if ($row['equipHead'] =="horned helmet"){
echo " <span>( <i class='red'>+5</i> )</span>";
// // $results = $link->query("UPDATE $user SET strmod = strmod + 5"); 
$_SESSION['strmod'] += 5; 
}
// ----------------------------------------------------------------- barbarian helmet +8 STR, -3 MAG
if ($row['equipHead'] =="barbarian helmet"){
echo " <span>( <i class='red'>+8</i>, <i class='black'>-3 mag</i> )</span>";
// // $results = $link->query("UPDATE $user SET strmod = strmod + 8");
// $results = $link->query("UPDATE $user SET magmod = magmod - 3"); 
$_SESSION['strmod'] += 8;
$_SESSION['magmod'] -= 3; 
}
// ----------------------------------------------------------------- gray hood + 4 MAG
if ($row['equipHead'] =="gray hood"){
echo " <span>( <i class='blue'>+4</i> )</span>";
// // $results = $link->query("UPDATE $user SET magmod = magmod + 4"); 
$_SESSION['magmod'] += 4; 
}
// ----------------------------------------------------------------- wizard hat + 5 MAG - 2 DEF
if ($row['equipHead'] =="wizard hat"){
echo " <span>( <i class='blue'>+5</i>, <i class='black'>-2 def</i> )</span>";
// // $results = $link->query("UPDATE $user SET magmod = magmod + 5");
// $results = $link->query("UPDATE $user SET defmod = defmod - 2"); 
$_SESSION['magmod'] += 5;
$_SESSION['defmod'] -= 2; 
}
// ----------------------------------------------------------------- battle helm + 4 STR + 4 DEF
if ($row['equipHead'] =="battle helm"){
echo " <span>( <i class='red'>+4</i>, <i class='gold'>+4</i> )</span>";
// // $results = $link->query("UPDATE $user SET strmod = strmod + 4"); 
// $results = $link->query("UPDATE $user SET defmod = defmod + 4"); 
$_SESSION['strmod'] += 4;
$_SESSION['defmod'] += 4; 
}
// ----------------------------------------------------------------- victoria's hood + 6 MAG
if ($row['equipHead'] =="victoria's hood"){
echo " <span>( <i class='blue'>+6</i> )</span>";
// // $results = $link->query("UPDATE $user SET magmod = magmod + 6"); 
$_SESSION['magmod'] += 6; 
}
// ----------------------------------------------------------------- scorpion hood 
if ($row['equipHead'] =="scorpion hood"){
echo " <span>( <i class='red'>+7</i>, <i class='blue'>+5</i>, <i class='gold'>+5</i> )</span>";
        $_SESSION['strmod'] += 7; 
        $_SESSION['defmod'] += 5; 
        $_SESSION['magmod'] += 5; 
// // $results = $link->query("UPDATE $user SET strmod = strmod + 7"); 
// $results = $link->query("UPDATE $user SET defmod = defmod + 5");
// $results = $link->query("UPDATE $user SET magmod = magmod + 5"); 
}
// ----------------------------------------------------------------- iron hood
if ($row['equipHead'] =="iron hood"){
echo " <span>( <i class='red'>+3</i>, <i class='green'>+3</i>, <i class='gold'>+3</i> )</span>";
// // $results = $link->query("UPDATE $user SET strmod = strmod + 3"); 
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 3");
// $results = $link->query("UPDATE $user SET defmod = defmod + 3");
$_SESSION['strmod'] += 3;
$_SESSION['dexmod'] += 3;
$_SESSION['defmod'] += 3; 
}
// ----------------------------------------------------------------- iron helmet
if ($row['equipHead'] =="iron helmet"){
echo " <span>( <i class='gold'>+20</i> )</span>";
// // $results = $link->query("UPDATE $user SET defmod = defmod + 20"); 
$_SESSION['defmod'] += 20; 
}
// ----------------------------------------------------------------- haunted helm
if ($row['equipHead'] =="haunted helm"){
echo " <span>( <i class='blue'>+5</i>, <i class='gold'>+10</i> )</span>"; 
// $results = $link->query("UPDATE $user SET defmod = defmod + 10");
// $results = $link->query("UPDATE $user SET magmod = magmod + 5"); 
$_SESSION['defmod'] += 10;
$_SESSION['magmod'] += 5;  
}// ----------------------------------------------------------------- Bandit Hood
if ($row['equipHead'] =="bandit hood"){
echo " <span>( <i class='green'>+8</i>, <i class='gold'>+8</i> )</span>"; 
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 8");
// $results = $link->query("UPDATE $user SET defmod = defmod + 8");
$_SESSION['dexmod'] += 8;
$_SESSION['defmod'] += 8; 
}
// ----------------------------------------------------------------- Calamari Cap
if ($row['equipHead'] =="calamari cap"){
echo " <span>( <i class='cyan'>+4</i> all stats )</span>"; 
// $results = $link->query("UPDATE $user SET strmod = strmod + 4"); 
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 4");
// $results = $link->query("UPDATE $user SET magmod = magmod + 4");
// $results = $link->query("UPDATE $user SET defmod = defmod + 4");
$_SESSION['strmod'] += 4;
$_SESSION['dexmod'] += 4;
$_SESSION['magmod'] += 4;
$_SESSION['defmod'] += 4; 
}
// ----------------------------------------------------------------- X
if ($row['equipHead'] =="heavy helmet"){
echo " <span>( <i class='red'>+10</i>, <i class='gold'>+10</i> )</span>"; 
// $results = $link->query("UPDATE $user SET strmod = strmod + 10");
// $results = $link->query("UPDATE $user SET defmod = defmod + 10");
$_SESSION['strmod'] += 10;
$_SESSION['defmod'] += 10; 
}
// ----------------------------------------------------------------- X
if ($row['equipHead'] =="earth hood"){
    echo " <span>( <i class='red'>+16</i>, <i class='gold'>+40</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod + 16"); 
    // $results = $link->query("UPDATE $user SET defmod = defmod + 40"); 
    $_SESSION['strmod'] += 16;
    $_SESSION['defmod'] += 40;
}
// ----------------------------------------------------------------- X
if ($row['equipHead'] =="kettle helm"){
echo " <span>( <i class='gold'>+65</i> )</span>"; 
// $results = $link->query("UPDATE $user SET defmod = defmod + 65");
$_SESSION['defmod'] += 65; 
}// ----------------------------------------------------------------- silver helmet
if ($row['equipHead'] =="silver helmet"){
echo " <span>( <i class='gold'>+40</i>, <i class='blue'>+1</i> )</span>";
// // $results = $link->query("UPDATE $user SET defmod = defmod + 40");
// $results = $link->query("UPDATE $user SET magmod = magmod + 1"); 
$_SESSION['defmod'] += 40;
$_SESSION['magmod'] += 1; 
}
// ----------------------------------------------------------------- steel hood
if ($row['equipHead'] =="steel hood"){
echo " <span>( <i class='red'>+7</i>, <i class='green'>+7</i>, <i class='gold'>+7</i> )</span>"; 
// $results = $link->query("UPDATE $user SET strmod = strmod + 7"); 
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 7");
// $results = $link->query("UPDATE $user SET defmod = defmod + 7");
$_SESSION['strmod'] += 7;
$_SESSION['dexmod'] += 7;
$_SESSION['defmod'] += 7;

}
// ----------------------------------------------------------------- steel helmet
if ($row['equipHead'] =="steel helmet"){
echo " <span>( <i class='gold'>+45</i> )</span>";
// // $results = $link->query("UPDATE $user SET defmod = defmod + 45"); 
$_SESSION['defmod'] += 45; 
}// ----------------------------------------------------------------- steel master helm
if ($row['equipHead'] =="steel master helm"){
echo " <span>( <i class='red'>+15</i>, <i class='green'>+15</i>, <i class='gold'>+60</i> )</span>";
// // $results = $link->query("UPDATE $user SET strmod = strmod + 15"); 
// $results = $link->query("UPDATE $user SET dexmod = dexmod + 15");
// $results = $link->query("UPDATE $user SET defmod = defmod + 60"); 
$_SESSION['strmod'] += 15;
$_SESSION['dexmod'] += 15;
$_SESSION['defmod'] += 60; 
}
// ----------------------------------------------------------------- troll crown
if ($row['equipHead'] =="troll crown"){
echo " <span>( <i class='red'>+12</i>, <i class='blue'>+6</i> )</span>";
// // $results = $link->query("UPDATE $user SET strmod = strmod + 12");
// $results = $link->query("UPDATE $user SET magmod = magmod + 6");
$_SESSION['strmod'] += 12;
$_SESSION['magmod'] += 6; 
}
// ----------------------------------------------------------------- ranger hood
if ($row['equipHead'] =="ranger hood"){
    echo " <span>( <i class='green'>+25</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod + 25"); 
    $_SESSION['dexmod'] += 25;
}    // ----------------------------------------------------------------- gamma hood
if ($row['equipHead'] =="gamma hood"){
    echo " <span>( <i class='blue'>+10</i>, <i class='gold'>+30</i> )</span>";
    // $results = $link->query("UPDATE $user SET magmod = magmod + 10");
    // $results = $link->query("UPDATE $user SET defmod = defmod + 30");
    $_SESSION['magmod'] += 10;
    $_SESSION['defmod'] += 30;
 }
 // ----------------------------------------------------------------- mithril helmet
if ($row['equipHead'] =="mithril helmet"){
    echo " <span>( <i class='gold'>+80</i> )</span>"; 
    // $results = $link->query("UPDATE $user SET defmod = defmod + 80");
    $_SESSION['defmod'] += 80;
}
// ----------------------------------------------------------------- mithril hood
if ($row['equipHead'] =="mithril hood"){
    echo " <span>( <i class='red'>+13</i>, <i class='green'>+13</i>, <i class='gold'>+13</i> )</span>"; 
    // $results = $link->query("UPDATE $user SET strmod = strmod + 13"); 
    // $results = $link->query("UPDATE $user SET dexmod = dexmod + 13");
    // $results = $link->query("UPDATE $user SET defmod = defmod + 13");
    $_SESSION['strmod'] += 13;
    $_SESSION['dexmod'] += 13;
    $_SESSION['defmod'] += 13;
}
// ----------------------------------------------------------------- banshee mask
if ($row['equipHead'] =="banshee mask"){
    echo " <span>( <i class='red'>+35</i> )</span>"; 
    // $results = $link->query("UPDATE $user SET strmod = strmod + 35");
    $_SESSION['strmod'] += 35; 
}
// ----------------------------------------------------------------- black hood
if ($row['equipHead'] =="black hood"){
    echo " <span>( <i class='red'>+20</i>, <i class='blue'>+10</i> )</span>"; 
    // $results = $link->query("UPDATE $user SET strmod = strmod + 20"); 
    // $results = $link->query("UPDATE $user SET magmod = magmod + 10");
    $_SESSION['strmod'] += 20; 
    $_SESSION['magmod'] += 10; 
}	?>