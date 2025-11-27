<?php

// ------------------- BUFF LEFT!!!!


// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx SHIELDS

// ----------------------------------------------------------------- training shield buff +3 DEF
if ($row['equipL'] =="training shield") {
    echo " <span>( <i class='gold'>+3</i> )</span>";
    // $results = $link->query("UPDATE $user SET defmod = defmod +3");

    $_SESSION['defmod'] += 3;   

}
// ----------------------------------------------------------------- basic shield buff +5 DEF
if ($row['equipL'] =="basic shield") {
    echo " <span>( <i class='gold'>+7</i> )</span>";
    // $results = $link->query("UPDATE $user SET defmod = defmod +7");

    $_SESSION['defmod'] += 7;   
}
// ----------------------------------------------------------------- kite shield buff +12 DEF, -2 MAG
if ($row['equipL'] =="kite shield") {
    echo " <span>( <i class='gold'>+20</i>, <i class='black'>-5 mag</i> )</span>";
    // $results = $link->query("UPDATE $user SET defmod = defmod +20");
    // $results = $link->query("UPDATE $user SET magmod = magmod -5");
    $_SESSION['defmod'] += 20;   
    $_SESSION['magmod'] -= 5;       
}
// ----------------------------------------------------------------- buckler buff +5 DEF, +2 STR
if ($row['equipL'] =="buckler") {
    echo " <span>( <i class='gold'>+5</i>, <i class='red'>+2</i> )</span>";
    // // $results = $link->query("UPDATE $user SET defmod = defmod +5");
    // // $results = $link->query("UPDATE $user SET strmod = strmod +2");
    $_SESSION['defmod'] += 5;
    $_SESSION['strmod'] += 2;
}
// ----------------------------------------------------------------- wooden shield buff +13 DEF
if ($row['equipL'] =="wooden shield") {
    echo " <span>( <i class='gold'>+13</i> )</span>";
    // $results = $link->query("UPDATE $user SET defmod = defmod +13");
    $_SESSION['defmod'] += 13;
}
// ----------------------------------------------------------------- hunter shield
if ($row['equipL'] =="hunter shield") {
    echo " <span>( <i class='gold'>+10</i>, <i class='red'>+3</i>, <i class='green'>+3</i> )</span>";
    // $results = $link->query("UPDATE $user SET defmod = defmod +10");
    // $results = $link->query("UPDATE $user SET strmod = strmod +3");
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +3");
    $_SESSION['defmod'] += 10;
    $_SESSION['strmod'] += 3;
    $_SESSION['dexmod'] += 3;
}
// ----------------------------------------------------------------- tower shield
if ($row['equipL'] =="tower shield") {
    echo " <span>( <i class='gold'>+12</i>, <i class='blue'>+2</i> )</span>";
    // $results = $link->query("UPDATE $user SET defmod = defmod +12");
    // $results = $link->query("UPDATE $user SET magmod = magmod +2");
    $_SESSION['defmod'] += 12;
    $_SESSION['magmod'] += 2;
}

// ----------------------------------------------------------------- off hand dagger
if ($row['equipL'] =="off hand dagger") {
    echo " <span>( <i class='red'>+5</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +5");
    $_SESSION['strmod'] += 5;
}

// ----------------------------------------------------------------- glowing orb buff +3 MAG
if ($row['equipL'] =="glowing orb") {
    echo " <span>( <i class='blue'>+3</i> )</span>";
    // $results = $link->query("UPDATE $user SET magmod = magmod +3");
    $_SESSION['magmod'] += 3;
}
// ----------------------------------------------------------------- enchanted orb buff +7 MAG
if ($row['equipL'] =="enchanted orb") {
    echo " <span>( <i class='blue'>+7</i> )</span>";
    // $results = $link->query("UPDATE $user SET magmod = magmod +7");
    $_SESSION['magmod'] += 7;
}



// ----------------------------------------------------------------- iron shield buff +15 DEF
if ($row['equipL'] =="iron shield") {
    echo " <span>( <i class='gold'>+25</i> )</span>";
    // $results = $link->query("UPDATE $user SET defmod = defmod +25");
    $_SESSION['defmod'] += 25;  
}
// ----------------------------------------------------------------- iron kite shield
if ($row['equipL'] =="iron kite shield") {
    echo " <span>( <i class='gold'>+40</i>, <i class='black'>-10 mag</i> )</span>";
    // $results = $link->query("UPDATE $user SET defmod = defmod +40");
    // $results = $link->query("UPDATE $user SET magmod = magmod -10");
    $_SESSION['defmod'] += 40;  
    $_SESSION['magmod'] -= 10;
}

// ----------------------------------------------------------------- red shield buff
if ($row['equipL'] =="red shield") {
    echo " <span>( <i class='gold'>+25</i>, <i class='red'>+5</i> )</span>";
    // $results = $link->query("UPDATE $user SET defmod = defmod +25");
    // $results = $link->query("UPDATE $user SET strmod = strmod +5");
    $_SESSION['defmod'] += 25;
    $_SESSION['strmod'] += 5;
}

// ----------------------------------------------------------------- death orb
if ($row['equipL'] =="death orb") {
    echo " <span>( <i class='blue'>+10</i>, <i class='black'>-10 def</i> )</span>";
    // $results = $link->query("UPDATE $user SET magmod = magmod +10");
    // $results = $link->query("UPDATE $user SET defmod = defmod -10");
    $_SESSION['magmod'] += 10;
    $_SESSION['defmod'] -= 10;
}
// ----------------------------------------------------------------- silver shield buff
if ($row['equipL'] =="silver shield") {
    echo " <span>( <i class='gold'>+50</i>, <i class='blue'>+1</i> )</span>";
    // $results = $link->query("UPDATE $user SET defmod = defmod +50");
    // $results = $link->query("UPDATE $user SET magmod = magmod +1");
    $_SESSION['defmod'] += 50;  
    $_SESSION['magmod'] += 1;
}
// ----------------------------------------------------------------- steel shield buff +15 DEF
if ($row['equipL'] =="steel shield") {
    echo " <span>( <i class='gold'>+55</i> )</span>";
    // $results = $link->query("UPDATE $user SET defmod = defmod +55");
    $_SESSION['defmod'] += 55;  
}
// ----------------------------------------------------------------- steel kite shield
if ($row['equipL'] =="steel kite shield") {
    echo " <span>( <i class='gold'>+80</i>, <i class='black'>-20 mag</i> )</span>";
    // $results = $link->query("UPDATE $user SET defmod = defmod +80");
    // $results = $link->query("UPDATE $user SET magmod = magmod -20");
    $_SESSION['defmod'] += 80;  
    $_SESSION['magmod'] -= 20;
}


// ----------------------------------------------------------------- viking shield buff
if ($row['equipL'] =="viking shield") {
    echo " <span>( <i class='gold'>+50</i>, <i class='red'>+8</i> )</span>";
    // $results = $link->query("UPDATE $user SET defmod = defmod +50");
    // $results = $link->query("UPDATE $user SET strmod = strmod +8");
    $_SESSION['defmod'] += 50;  
    $_SESSION['strmod'] += 8;   
}


// ----------------------------------------------------------------- green orb
if ($row['equipL'] =="green orb") {
    echo " <span>( <i class='green'>+15</i>, <i class='black'>-15 def</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +15");
    // $results = $link->query("UPDATE $user SET defmod = defmod -15");
    $_SESSION['dexmod'] += 15;
    $_SESSION['defmod'] -= 15;
}
// ----------------------------------------------------------------- off hand sword
if ($row['equipL'] =="off hand sword") {
    echo " <span>( <i class='red'>+10</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +10");
    $_SESSION['strmod'] += 10;
}
// ----------------------------------------------------------------- off hand mace
if ($row['equipL'] =="off hand mace") {
    echo " <span>( <i class='red'>+25</i>, <i class='blue'>+5</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +25");
    // $results = $link->query("UPDATE $user SET magmod = magmod +5");
    $_SESSION['strmod'] += 25;
    $_SESSION['magmod'] += 5;
}
