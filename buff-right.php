<?php

$level = $row['level'];

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx BUFF RIGHT!!!!

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ONE HANDED WEAPONS

// -----------------------------------------------------------------dagger buff +1 STR
if ($row["equipR"] =="dagger") {
    echo " <span>( <i class='red'>+1</i> )</span>";
  //  // $results = $link->query("UPDATE $user SET strmod = strmod +1");
        //  // 'strmod' => $_SESSION['strmod'] + 1
    $_SESSION['strmod'] += 1;
}
// -----------------------------------------------------------------training sword buff +3 STR
if ($row["equipR"] =="training sword") {
    echo " <span>( <i class='red'>+3</i> )</span>";
   // $results = $link->query("UPDATE $user SET strmod = strmod +3");
//$_SESSION['strmod'] +=3;
        // 'strmod' => $_SESSION['strmod'] + 3
    $_SESSION['strmod'] += 3;
}
// -----------------------------------------------------------------short sword buff +2 STR
if ($row["equipR"] =="short sword") {
    echo " <span>( <i class='red'>+4</i> )</span>";
  //  // $results = $link->query("UPDATE $user SET strmod = strmod +4");
        // 'strmod' => $_SESSION['strmod'] + 4
    $_SESSION['strmod'] += 4;
}

// -----------------------------------------------------------------broad sword buff +4 STR, +2 DEF
if ($row["equipR"] =="broad sword") {
    echo " <span>( <i class='red'>+4</i>, <i class='gold'>+2</i> )</span>";
        // 'strmod' => $_SESSION['strmod'] + 4,
        // 'defmod' => $_SESSION['defmod'] + 2 
    // $results = $link->query("UPDATE $user SET strmod = strmod +4");
    // $results = $link->query("UPDATE $user SET defmod = defmod +2");
    $_SESSION['strmod'] += 4;
    $_SESSION['defmod'] += 2;
}
// -----------------------------------------------------------------mace buff +4 STR, +2 MAG
if ($row["equipR"] =="mace") {
    echo " <span>( <i class='red'>+4</i>, <i class='blue'>+2</i> )</span>";
        // 'strmod' => $_SESSION['strmod'] + 4,
        // 'magmod' => $_SESSION['magmod'] + 2
    // $results = $link->query("UPDATE $user SET strmod = strmod +4");
   // $results = $link->query("UPDATE $user SET magmod = magmod +2");
    $_SESSION['strmod'] += 4;
    $_SESSION['magmod'] += 2;
}
// -----------------------------------------------------------------long sword buff +5 STR
if ($row["equipR"] =="long sword") {
    echo " <span>( <i class='red'>+5</i> )</span>";
        // 'strmod' => $_SESSION['strmod'] + 5

    $_SESSION['strmod'] += 5;
    // $results = $link->query("UPDATE $user SET strmod = strmod +5");
}
// -----------------------------------------------------------------club buff +6 STR, -2 DEF
if ($row["equipR"] =="club") {
    echo " <span>( <i class='red'>+6</i>, <i class='black'>-2 def</i>  )</span>";
        // 'strmod' => $_SESSION['strmod'] + 6,
        // 'defmod' => $_SESSION['defmod'] - 2

    $_SESSION['strmod'] += 6;
    $_SESSION['defmod'] -= 2;
    // $results = $link->query("UPDATE $user SET strmod = strmod +6");
    // $results = $link->query("UPDATE $user SET defmod = defmod -2");
}

// -----------------------------------------------------------------flail buff +7 STR +6 DEF
if ($row["equipR"] =="flail") {
    echo " <span>( <i class='red'>+7</i>, <i class='gold'>+6</i> )</span>";
        // 'strmod' => $_SESSION['strmod'] + 7,
        // 'defmod' => $_SESSION['defmod'] + 6
    $_SESSION['strmod'] += 7;
    $_SESSION['defmod'] += 6;
    // $results = $link->query("UPDATE $user SET strmod = strmod +7");
    // $results = $link->query("UPDATE $user SET defmod = defmod +6");
}
// -----------------------------------------------------------------morning star buff +6 STR +4 MAG
if ($row["equipR"] =="morning star") {
    echo " <span>( <i class='red'>+6</i>, <i class='blue'>+4</i> )</span>";
        // 'strmod' => $_SESSION['strmod'] + 6,
        // 'magmod' => $_SESSION['magmod'] + 4
    // $results = $link->query("UPDATE $user SET strmod = strmod +6");
    // $results = $link->query("UPDATE $user SET magmod = magmod +4");
    $_SESSION['strmod'] += 6;
    $_SESSION['magmod'] += 4;
}
// -----------------------------------------------------------------samurai sword buff +8 STR
if ($row["equipR"] =="samurai sword") {
    echo " <span>( <i class='red'>+8</i> )</span>";
        // 'strmod' => $_SESSION['strmod'] + 8
    // $results = $link->query("UPDATE $user SET strmod = strmod +8");
    $_SESSION['strmod'] += 8;
}
// -----------------------------------------------------------------gladius buff +9 STR, +2 DEF, +2 MAG
if ($row["equipR"] =="gladius") {
    echo " <span>( <i class='red'>+9</i>, <i class='blue'>+2</i>, <i class='gold'>+2</i> )</span>";
        // 'strmod' => $_SESSION['strmod'] + 9,
        // 'defmod' => $_SESSION['defmod'] + 2,
        // 'magmod' => $_SESSION['magmod'] + 2
    $_SESSION['strmod'] += 9;
    $_SESSION['defmod'] += 2;
    $_SESSION['magmod'] += 2;
    // $results = $link->query("UPDATE $user SET strmod = strmod +9");
  // $results = $link->query("UPDATE $user SET defmod = defmod +2");
    // $results = $link->query("UPDATE $user SET magmod = magmod +2");
}



// -----------------------------------------------------------------basic staff buff +3 MAG
if ($row["equipR"] =="basic staff") {
    echo " <span>( <i class='blue'>+3</i> )</span>";
        // 'magmod' => $_SESSION['magmod'] + 3
    // $results = $link->query("UPDATE $user SET magmod = magmod +3");
    $_SESSION['magmod'] += 3;   
}
// -----------------------------------------------------------------wooden staff buff +5 MAG, +1 STR
if ($row["equipR"] =="wooden staff") {
    echo " <span>( <i class='blue'>+5</i>, <i class='red'>+1</i> )</span>";
        // 'magmod' => $_SESSION['magmod'] + 5
    // $results = $link->query("UPDATE $user SET magmod = magmod +5");
    $_SESSION['magmod'] += 5; 
    $_SESSION['strmod'] += 1; 
    // $results = $link->query("UPDATE $user SET strmod = strmod +1");
}
// -----------------------------------------------------------------wand buff +7 MAG, -2 STR
if ($row["equipR"] =="wand") {
    echo " <span>( <i class='blue'>+9</i>, <i class='black'>-2 str</i> )</span>";
        // 'strmod' => $_SESSION['strmod'] - 2,
        // 'magmod' => $_SESSION['magmod'] + 9,
    // $results = $link->query("UPDATE $user SET magmod = magmod +9");
    // $results = $link->query("UPDATE $user SET strmod = strmod -2");
    $_SESSION['magmod'] += 9;   
    $_SESSION['strmod'] -= 2;   
}
// ----------------------------------------------------------------- wizard staff
if ($row["equipR"] =="wizard staff") {
    echo " <span>( <i class='blue'>+8</i> )</span>";
        // 'magmod' => $_SESSION['magmod'] + 8
    $_SESSION['magmod'] += 8;   
    // $results = $link->query("UPDATE $user SET magmod = magmod +8");
}
// -----------------------------------------------------------------demon dagger buff +7 MAG, +5 STR
if ($row["equipR"] =="demon dagger") {
    echo " <span>( <i class='blue'>+10</i>, <i class='red'>+5</i> )</span>";
        // 'strmod' => $_SESSION['strmod'] + 5,
        // 'magmod' => $_SESSION['magmod'] + 10
    $_SESSION['strmod'] += 5;   
    $_SESSION['magmod'] += 10; 
    // $results = $link->query("UPDATE $user SET magmod = magmod +10");
    // $results = $link->query("UPDATE $user SET strmod = strmod +5");
}
// -----------------------------------------------------------------gray wand buff +15 MAG, -5 STR, -5 DEF
if ($row["equipR"] =="gray wand") {
    echo " <span>( <i class='blue'>+15</i>, <i class='black'>-5 str</i>, <i class='black'>-5 def</i> )</span>";
        // 'magmod' => $_SESSION['magmod'] + 15,
        // 'strmod' => $_SESSION['strmod'] - 5,
        // 'defmod' => $_SESSION['defmod'] - 5
    $_SESSION['magmod'] += 15;
    $_SESSION['strmod'] -= 5;
    $_SESSION['defmod'] -= 5;
    // $results = $link->query("UPDATE $user SET magmod = magmod +15");
    // $results = $link->query("UPDATE $user SET strmod = strmod -5");
    // $results = $link->query("UPDATE $user SET defmod = defmod -5");
}


// ----------------------------------------------------------------- three-chained flail
if ($row["equipR"] =="three-chained flail") {
    echo " <span>( <i class='red'>+15</i>, <i class='blue'>+5</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +15");
    // $results = $link->query("UPDATE $user SET magmod = magmod +5");
    $_SESSION['strmod'] += 15;
    $_SESSION['magmod'] += 5;
}
// ----------------------------------------------------------------- bastard sword
if ($row["equipR"] =="bastard sword") {
    echo " <span>( <i class='red'>+11</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +11");
    $_SESSION['strmod'] += 11;
}

// ----------------------------------------------------------------- giant club
if ($row["equipR"] =="giant club") {
    echo " <span>( <i class='red'>+13</i>, <i class='black'>-3 mag</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +13");
    // $results = $link->query("UPDATE $user SET magmod = magmod -3");
    $_SESSION['strmod'] += 13;
    $_SESSION['magmod'] -= 3;
}
// ----------------------------------------------------------------- great white sword
if ($row["equipR"] =="great white sword") {
    echo " <span>( <i class='red'>+17</i>, <i class='blue'>+7</i>, <i class='gold'>+7</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +17");
    // $results = $link->query("UPDATE $user SET magmod = magmod +7");
    // $results = $link->query("UPDATE $user SET defmod = defmod +7");
    $_SESSION['strmod'] += 17;
    $_SESSION['magmod'] += 7;
    $_SESSION['defmod'] += 7;
}


// -----------------------------------------------------------------master blade buff +200 STR, +100 DEF
if ($row["equipR"] =="master blade") {
    echo " <span>( <i class='red'>+200</i>, <i class='gold'>+100</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +200");
    // $results = $link->query("UPDATE $user SET defmod = defmod +100");
    $_SESSION['strmod'] += 200;
    $_SESSION['defmod'] += 100;
}



// ----------------------------------------------------------------- iron dagger
if ($row["equipR"] =="iron dagger") {
    echo " <span>( <i class='red'>+7</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +7");
    $_SESSION['strmod'] += 7;
}
// ----------------------------------------------------------------- iron sword
if ($row["equipR"] =="iron sword") {
    echo " <span>( <i class='red'>+18</i> )</span>";
    $_SESSION['strmod'] += 18;
    // $results = $link->query("UPDATE $user SET strmod = strmod +18");
}
// ----------------------------------------------------------------- iron staff
if ($row["equipR"] =="iron staff") {
    echo " <span>( <i class='blue'>+10</i>, <i class='red'>+3</i> )</span>";
        // 'strmod' => $_SESSION['strmod'] + 3
    // $results = $link->query("UPDATE $user SET magmod = magmod +10");
    // $results = $link->query("UPDATE $user SET strmod = strmod +3");
    $_SESSION['magmod'] += 10;
    $_SESSION['strmod'] += 3;
}

// -----------------------------------------------------------------poison saber
if ($row["equipR"] =="poison saber") {
    echo " <span>( <i class='red'>+18</i>, <i class='blue'>+3</i>, <i class='green small'>poison<i class=''>5</i></i> )</span>";
    // $results = $link->query("UPDATE $user SET magmod = magmod +3");
    // $results = $link->query("UPDATE $user SET strmod = strmod +18");
    $_SESSION['magmod'] += 3;
    $_SESSION['strmod'] += 18;
}
// ----------------------------------------------------------------- axe of slaughter
if ($row["equipR"] =="axe of slaughter") {
    echo " <span>( <i class='red'>+45</i>, <i class='black'>-5 mag</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +45");
    // $results = $link->query("UPDATE $user SET magmod = magmod -5");
    $_SESSION['strmod'] += 45;
    $_SESSION['magmod'] -= 5;
}

// ----------------------------------------------------------------- silver sword
if ($row["equipR"] =="silver sword") {
    echo " <span>( <i class='red'>+25</i>, <i class='blue'>+5</i> )</span>";
        // 'strmod' => $_SESSION['strmod'] + 25
    $_SESSION['strmod'] += 25;
    $_SESSION['magmod'] += 5;
    // $results = $link->query("UPDATE $user SET strmod = strmod +25");
    // $results = $link->query("UPDATE $user SET magmod = magmod +5");
}
// ----------------------------------------------------------------- silver staff
if ($row["equipR"] =="silver staff") {
    echo " <span>( <i class='blue'>+25</i> )</span>";
    // $results = $link->query("UPDATE $user SET magmod = magmod +25");
    $_SESSION['magmod'] += 25; 
}
// ----------------------------------------------------------------- steel dagger
if ($row["equipR"] =="steel dagger") {
    echo " <span>( <i class='red'>+18</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +18");
    $_SESSION['strmod'] += 18;
}
// ----------------------------------------------------------------- steel sword
if ($row["equipR"] =="steel sword") {
    echo " <span>( <i class='red'>+27</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +27");
    $_SESSION['strmod'] += 27;
}
// ----------------------------------------------------------------- steel staff
if ($row["equipR"] =="steel staff") {
    echo " <span>( <i class='blue'>+22</i>, <i class='red'>+5</i> )</span>";
    // $results = $link->query("UPDATE $user SET magmod = magmod +22");
    // $results = $link->query("UPDATE $user SET strmod = strmod +5");
    $_SESSION['magmod'] += 22;
    $_SESSION['strmod'] += 5;
}

// ----------------------------------------------------------------- silver whip
if ($row["equipR"] =="silver whip") {
    echo " <span>( <i class='red'>+25</i>, <i class='blue'>+25</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +25");
    // $results = $link->query("UPDATE $user SET magmod = magmod +25");
    $_SESSION['strmod'] += 25;
    $_SESSION['magmod'] += 25;
}

// ----------------------------------------------------------------- staff of the scorpion
if ($row["equipR"] =="staff of the scorpion") {
    echo " <span>( <i class='blue'>+35</i> )</span>";
    // $results = $link->query("UPDATE $user SET magmod = magmod +35");
    $_SESSION['magmod'] += 35;
}

// ----------------------------------------------------------------- forest saber
if ($row["equipR"] =="forest saber") {
    echo " <span>( <i class='red'>+30</i>, <i class='blue'>+10</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +30");
    // $results = $link->query("UPDATE $user SET magmod = magmod +10");
    $_SESSION['strmod'] += 30;
    $_SESSION['magmod'] += 10;
}
// ----------------------------------------------------------------- sharp katana
if ($row["equipR"] =="sharp katana") {
    echo " <span>( <i class='red'>+45</i>, <i class='black'>-10 def</i>  )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +45");
    // $results = $link->query("UPDATE $user SET defmod = defmod -10");
    $_SESSION['strmod'] += 45;
    $_SESSION['defmod'] -= 10;
}
// ----------------------------------------------------------------- black blade
if ($row["equipR"] =="black blade") {
    echo " <span>( <i class='red'>+55</i>, <i class='black'>-10 mag</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +55");
    // $results = $link->query("UPDATE $user SET magmod = magmod -10");
    $_SESSION['strmod'] += 55;
    $_SESSION['magmod'] -= 10;
}
// ----------------------------------------------------------------- flamberg
if ($row["equipR"] =="flamberg") {
    echo " <span>( <i class='red'>+50</i>, <i class='blue'>+10</i>, <i class='gold'>+10</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +50");
    // $results = $link->query("UPDATE $user SET defmod = defmod +10");
    // $results = $link->query("UPDATE $user SET magmod = magmod +10");
    $_SESSION['strmod'] += 50; 
    $_SESSION['defmod'] += 10;
    $_SESSION['magmod'] += 10;
}

// ----------------------------------------------------------------- guardian blade
if ($row["equipR"] =="guardian blade") {
    echo " <span>( <i class='red'>+80</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +80");
    $_SESSION['strmod'] += 80;
}
// ----------------------------------------------------------------- gilded falcion
if ($row["equipR"] =="gilded falcion") {
    echo " <span>( <i class='red'>+70</i>, <i class='blue'>+20</i>, <i class='gold'>+20</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +80");
    $_SESSION['strmod'] += 70;
    $_SESSION['magmod'] += 20;
    $_SESSION['defmod'] += 20;
}
// ----------------------------------------------------------------- gamma knife
if ($row["equipR"] =="gamma knife") {
    echo " <span>( <i class='red'>+30</i>, <i class='blue'>+30</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +30");
    // $results = $link->query("UPDATE $user SET magmod = magmod +30");
    $_SESSION['strmod'] += 30;
    $_SESSION['magmod'] += 30;
}
// ----------------------------------------------------------------- gmg club
if ($row["equipR"] =="gmg club") {
    echo " <span>( <i class='red'>+250</i>, <i class='blac'>-100</i> mag )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +250");
    // $results = $link->query("UPDATE $user SET magmod = magmod -100");
    $_SESSION['strmod'] += 250;
    $_SESSION['magmod'] -= 100;
}
// ----------------------------------------------------------------- gk club
if ($row["equipR"] =="gk club") {
    echo " <span>( <i class='red'>+200</i>, <i class='black'>-200</i> def )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +200");
    // $results = $link->query("UPDATE $user SET defmod = defmod -200");
    $_SESSION['strmod'] += 200;
    $_SESSION['defmod'] -= 200;
}



// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx TWO HANDED WEAPONS

// -----------------------------------------------------------------training 2h sword buff +6 STR
if ($row["equipR"] =="training 2h sword") {
    echo " <span>( <i class='red'>+6</i> )</span>";
    //$results = $link->query("UPDATE $user SET strmod = strmod +6");
    $_SESSION['strmod'] +=6;
            // 'strmod' => $_SESSION['strmod']
}
// -----------------------------------------------------------------bo buff +7 STR
if ($row["equipR"] =="bo") {
    echo " <span>( <i class='red'>+7</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +7");
    $_SESSION['strmod'] += 7;
}
// ----------------------------------------------------------------- battle axe buff +11 STR -2 DEF
if ($row["equipR"] =="battle axe") {
    echo " <span>( <i class='red'>+11</i>, <i class='black'>-2 def</i>  )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +11");
    // $results = $link->query("UPDATE $user SET defmod = defmod -2");
    $_SESSION['strmod'] += 11;
    $_SESSION['defmod'] -= 2;
}
// -----------------------------------------------------------------warhammer buff +13 STR -5 DEF
if ($row["equipR"] =="warhammer") {
    echo " <span>( <i class='red'>+13</i>, <i class='black'>-5 def</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +13");
    // $results = $link->query("UPDATE $user SET defmod = defmod -5");
    $_SESSION['strmod'] += 13;
    $_SESSION['defmod'] -= 5;
}


// -----------------------------------------------------------------wooden bo buff
if ($row["equipR"] =="wooden bo") {
    echo " <span>( <i class='red'>+9</i>, <i class='blue'>+3</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +9");
    // $results = $link->query("UPDATE $user SET magmod = magmod +3");
    $_SESSION['strmod'] += 9;
    $_SESSION['magmod'] += 3;
}
// -----------------------------------------------------------------pike buff +11 STR + 12 DEF
if ($row["equipR"] =="pike") {
    echo " <span>( <i class='red'>+11</i>, <i class='gold'>+11</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +11");
    // $results = $link->query("UPDATE $user SET defmod = defmod +11");
    $_SESSION['strmod'] += 11;
    $_SESSION['defmod'] += 11;
}

// -----------------------------------------------------------------claymore buff +13 STR, +2 MAG, +2 DEF
if ($row["equipR"] =="claymore") {
    echo " <span>( <i class='red'>+13</i>, <i class='blue'>+2</i>, <i class='gold'>+2</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +13");
    // $results = $link->query("UPDATE $user SET magmod = magmod +2");
    // $results = $link->query("UPDATE $user SET defmod = defmod +2");
    $_SESSION['strmod'] += 13;
    $_SESSION['magmod'] += 2;
    $_SESSION['defmod'] += 2;
}
// -----------------------------------------------------------------great sword
if ($row["equipR"] =="great sword") {
    echo " <span>( <i class='red'>+17</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +17");
    $_SESSION['strmod'] += 17;
}
// -----------------------------------------------------------------bo staff buff
if ($row["equipR"] =="bo staff") {
    echo " <span>( <i class='blue'>+4</i>, <i class='red'>+4</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +4");
    // $results = $link->query("UPDATE $user SET magmod = magmod +4");
    $_SESSION['strmod'] += 4;
    $_SESSION['magmod'] += 4;
}
// -----------------------------------------------------------------battle staff buff
if ($row["equipR"] =="battle staff") {
    echo " <span>( <i class='blue'>+6</i>, <i class='red'>+6</i> )</span>";
    // $results = $link->query("UPDATE $user SET magmod = magmod +6");
    // $results = $link->query("UPDATE $user SET strmod = strmod +6");
    $_SESSION['magmod'] += 6;
    $_SESSION['strmod'] += 6;
}
// -----------------------------------------------------------------dual tomahawk buff
if ($row["equipR"] =="dual tomahawk") {
    echo " <span>( <i class='blue'>+9</i>, <i class='red'>+9</i> )</span>";
    // $results = $link->query("UPDATE $user SET magmod = magmod +9");
    // $results = $link->query("UPDATE $user SET strmod = strmod +9");
    $_SESSION['magmod'] += 9;
    $_SESSION['strmod'] += 9;
}
// -----------------------------------------------------------------nunchaku buff
if ($row["equipR"] =="nunchaku") {
    echo " <span>( <i class='blue'>+13</i>, <i class='red'>+13</i> )</span>";
    // $results = $link->query("UPDATE $user SET magmod = magmod +13");
    // $results = $link->query("UPDATE $user SET strmod = strmod +13");
    $_SESSION['magmod'] += 13;
    $_SESSION['strmod'] += 13;
}


// -----------------------------------------------------------------bone knuckles
if ($row["equipR"] =="bone knuckles") {
    echo " <span>( <i class='red'>+25</i>, <i class='blue'>+5</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +25");
    // $results = $link->query("UPDATE $user SET magmod = magmod +5");
    $_SESSION['strmod'] += 25;
    $_SESSION['magmod'] += 5;
}
// -----------------------------------------------------------------polearm
if ($row["equipR"] =="polearm") {
    echo " <span>( <i class='red'>+16</i>, <i class='gold'>+20</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +16");
    // $results = $link->query("UPDATE $user SET defmod = defmod +20");
    $_SESSION['strmod'] += 16;
    $_SESSION['defmod'] += 20;
}
// -----------------------------------------------------------------bone cudgel
if ($row["equipR"] =="bone cudgel") {
    echo " <span>( <i class='red'>+35</i>, <i class='black'>-10 mag</i>, <i class='black'>-10 def</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +35");
    // $results = $link->query("UPDATE $user SET magmod = magmod -10");
    // $results = $link->query("UPDATE $user SET defmod = defmod -10");
    $_SESSION['strmod'] += 35;
    $_SESSION['magmod'] -= 10;
    $_SESSION['defmod'] -= 10;
}
// -----------------------------------------------------------------hammerhead hammer
if ($row["equipR"] =="hammerhead hammer") {
    echo " <span>( <i class='red'>+35</i>, <i class='blue'>+10</i>, <i class='gold'>+35</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +35");
    // $results = $link->query("UPDATE $user SET magmod = magmod +10");
    // $results = $link->query("UPDATE $user SET defmod = defmod +35");
    $_SESSION['strmod'] += 35;
    $_SESSION['magmod'] += 10;
    $_SESSION['defmod'] += 35;
}

// -----------------------------------------------------------------iron maul
if ($row["equipR"] =="iron maul") {
    echo " <span>( <i class='red'>+22</i>, <i class='gold'>+10</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +22");
    // $results = $link->query("UPDATE $user SET defmod = defmod +10");
    $_SESSION['strmod'] += 22;
    $_SESSION['defmod'] += 10;
}
// -----------------------------------------------------------------iron 2h sword
if ($row["equipR"] =="iron 2h sword") {
    echo " <span>( <i class='red'>+25</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +25");
    $_SESSION['strmod'] += 25;
}
// -----------------------------------------------------------------iron battle staff buff +12 MAG +12 STR
if ($row["equipR"] =="iron battle staff") {
    echo " <span>( <i class='blue'>+12</i>, <i class='red'>+12</i> )</span>";
    // $results = $link->query("UPDATE $user SET magmod = magmod +12");
    // $results = $link->query("UPDATE $user SET strmod = strmod +12");
    $_SESSION['magmod'] += 12;
    $_SESSION['strmod'] += 12;
}
// ----------------------------------------------------------------- great axe
if ($row["equipR"] =="great axe") {
    echo " <span>( <i class='red'>+50</i>, <i class='black'>-10 def</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +50");
    // $results = $link->query("UPDATE $user SET defmod = defmod -10");
    $_SESSION['strmod'] += 50;
    $_SESSION['defmod'] -= 10;
}
// -----------------------------------------------------------------trident buff
if ($row["equipR"] =="trident") {
    echo " <span>( <i class='red'>+45</i>, <i class='blue'>+15</i>, <i class='gold'>+15</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +45");
    // $results = $link->query("UPDATE $user SET magmod = magmod +15");
    // $results = $link->query("UPDATE $user SET defmod = defmod +15");
    $_SESSION['strmod'] += 45;
    $_SESSION['magmod'] += 15;
    $_SESSION['defmod'] += 15;
}
// -----------------------------------------------------------------solomons staff
if ($row["equipR"] =="solomon staff") {
    echo " <span>( <i class='blue'>+45</i>, <i class='black'>-15 str</i> )</span>";
    // $results = $link->query("UPDATE $user SET magmod = magmod +45");
    // $results = $link->query("UPDATE $user SET strmod = strmod -15");
    $_SESSION['magmod'] += 45;
    $_SESSION['strmod'] -= 15;
}

// -----------------------------------------------------------------oak battle staff
if ($row["equipR"] =="oak battle staff") {
    echo " <span>( <i class='blue'>+30</i>, <i class='red'>+30</i> )</span>";

    $_SESSION['strmod'] += 30;
    $_SESSION['magmod'] += 30;
    // $results = $link->query("UPDATE $user SET strmod = strmod +30");
    // $results = $link->query("UPDATE $user SET magmod = magmod +30");
}
// ----------------------------------------------------------------- jim bo
if ($row["equipR"] =="jim bo") {
    echo " <span>( <i class='red'>+45</i>, <i class='green small'>poison<i class=''>5</i></i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +45");
    $_SESSION['strmod'] += 45;
}
// -----------------------------------------------------------------silver 2h sword
if ($row["equipR"] =="silver 2h sword") {
    echo " <span>( <i class='red'>+45</i>, <i class='blue'>+5</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +45");
    // $results = $link->query("UPDATE $user SET magmod = magmod +5");
    $_SESSION['strmod'] += 45;
    $_SESSION['magmod'] += 5;
}
// -----------------------------------------------------------------steel 2h sword
if ($row["equipR"] =="steel 2h sword") {
    echo " <span>( <i class='red'>+50</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +50");
    $_SESSION['strmod'] += 50;
}
// -----------------------------------------------------------------steel battle staff
if ($row["equipR"] =="steel battle staff") {
    echo " <span>( <i class='blue'>+24</i>, <i class='red'>+24</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +24");
    // $results = $link->query("UPDATE $user SET magmod = magmod +24");
    $_SESSION['strmod'] += 24;
    $_SESSION['magmod'] += 24;
}
// -----------------------------------------------------------------steel nunchaku
if ($row["equipR"] =="steel nunchaku") {
    echo " <span>( <i class='blue'>+40</i>, <i class='red'>+40</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +40");
    // $results = $link->query("UPDATE $user SET magmod = magmod +40");
    $_SESSION['strmod'] += 40;
    $_SESSION['magmod'] += 40;
}
// -----------------------------------------------------------------heavy katana
if ($row["equipR"] =="heavy katana") {
    echo " <span>( <i class='red'>+90</i>, <i class='black'>-20 def</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +90");
    // $results = $link->query("UPDATE $user SET defmod = defmod -20");
    $_SESSION['strmod'] += 90;
    $_SESSION['defmod'] -= 20;
}
// -----------------------------------------------------------------heavy spear
if ($row["equipR"] =="heavy spear") {
    echo " <span>( <i class='red'>+40</i>, <i class='gold'>+60</i> )</span>";

    $_SESSION['strmod'] += 40;
    $_SESSION['defmod'] += 60;
    // $results = $link->query("UPDATE $user SET strmod = strmod +40");
    // $results = $link->query("UPDATE $user SET defmod = defmod +60");
}
// -----------------------------------------------------------------heavy hammer
if ($row["equipR"] =="heavy hammer") {
    echo " <span>( <i class='red'>+120</i>, <i class='black'>-40 mag</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +120");
    // $results = $link->query("UPDATE $user SET magmod = magmod -40");
    $_SESSION['strmod'] += 120;
    $_SESSION['magmod'] -= 40;
}
// ----------------------------------------------------------------- oak warhammer
if ($row["equipR"] =="oak warhammer") {
    echo " <span>( <i class='red'>+85</i> )</span>";

    $_SESSION['strmod'] += 85;
}
// ----------------------------------------------------------------- bardiche
if ($row["equipR"] =="bardiche") {
    echo " <span>( <i class='red'>+110</i>, <i class='black'>-30 mag</i>, <i class='black'>-30 def</i> )</span>";

    $_SESSION['strmod'] += 110;
    $_SESSION['magmod'] -= 30;
    $_SESSION['defmod'] -= 30;
    // $results = $link->query("UPDATE $user SET strmod = strmod +110");
    // $results = $link->query("UPDATE $user SET magmod = magmod -30");
    // $results = $link->query("UPDATE $user SET defmod = defmod -30");
}
// ----------------------------------------------------------------- glaive
if ($row["equipR"] =="glaive") {
    echo " <span>( <i class='red'>+80</i>, <i class='gold'>+80</i> )</span>";

    $_SESSION['strmod'] += 80;
    $_SESSION['defmod'] += 80;
    // $results = $link->query("UPDATE $user SET strmod = strmod +80");
    // $results = $link->query("UPDATE $user SET defmod = defmod +80");
}

// -----------------------------------------------------------------mithril 2h sword
if ($row["equipR"] =="mithril 2h sword") {
    echo " <span>( <i class='red'>+100/i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +100");
    $_SESSION['strmod'] += 100;
}
// -----------------------------------------------------------------mithril battle staff
if ($row["equipR"] =="mithril battle staff") {
    echo " <span>( <i class='blue'>+45</i>, <i class='red'>+45</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +45");
    // $results = $link->query("UPDATE $user SET magmod = magmod +45");
    $_SESSION['strmod'] += 45;
    $_SESSION['magmod'] += 45;
}
// -----------------------------------------------------------------mithril nunchaku
if ($row["equipR"] =="mithril nunchaku") {
    echo " <span>( <i class='blue'>+60</i>, <i class='red'>+60</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +60");
    // $results = $link->query("UPDATE $user SET magmod = magmod +60");
    $_SESSION['strmod'] += 60;
    $_SESSION['magmod'] += 60;
}
// -----------------------------------------------------------------humongous battleaxe
if ($row["equipR"] =="humongous battleaxe") {
    echo " <span>( <i class='red'>+150</i>, <i class='black'>-50 mag</i> )</span>";

    $_SESSION['strmod'] += 150;
    $_SESSION['magmod'] -= 50;
    // $results = $link->query("UPDATE $user SET strmod = strmod +150");
    // $results = $link->query("UPDATE $user SET magmod = magmod -50");
}
// -----------------------------------------------------------------gargantuan warhammer
if ($row["equipR"] =="gargantuan warhammer") {
    echo " <span>( <i class='red'>+250</i>, <i class='black'>-100 mag</i> )</span>";

    $_SESSION['strmod'] += 250;
    $_SESSION['magmod'] -= 100;
    // $results = $link->query("UPDATE $user SET strmod = strmod +250");
    // $results = $link->query("UPDATE $user SET magmod = magmod -100");
}
// -----------------------------------------------------------------blessed spear
if ($row["equipR"] =="blessed spear") {
    echo " <span>( <i class='red'>+80</i>, <i class='blue'>+40</i> )</span>";

    $_SESSION['strmod'] += 80;
    $_SESSION['magmod'] += 40;
    // $results = $link->query("UPDATE $user SET strmod = strmod +80");
    // $results = $link->query("UPDATE $user SET magmod = magmod +40");
}
// -----------------------------------------------------------------fortified fauchard
if ($row["equipR"] =="fortified fauchard") {
    echo " <span>( <i class='red'>+120</i>, <i class='gold'>+120</i> )</span>";

    $_SESSION['strmod'] += 120;
    $_SESSION['defmod'] += 120;
    // $results = $link->query("UPDATE $user SET strmod = strmod +120");
    // $results = $link->query("UPDATE $user SET defmod = defmod +120");
}
// ----------------------------------------------------------------- neutron staff
if ($row["equipR"] =="neutron staff") {
    echo " <span>( <i class='blue'>+110</i>, <i class='gold'>+110</i> )</span>";
    // $results = $link->query("UPDATE $user SET magmod = magmod +110");
    // $results = $link->query("UPDATE $user SET defmod = defmod +110");
    $_SESSION['magmod'] += 110;
    $_SESSION['defmod'] += 110;
}


// -----------------------------------------------------------------atomic warhammer
if ($row["equipR"] =="atomic warhammer") {
    echo " <span>( <i class='red'>+500</i>, <i class='gold'>+400</i> )</span>";
    // $results = $link->query("UPDATE $user SET strmod = strmod +500");
    // $results = $link->query("UPDATE $user SET defmod = defmod +400");
    $_SESSION['strmod'] += 500;
    $_SESSION['defmod'] += 400;
}

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx PROJECTILE WEAPONS

// -----------------------------------------------------------------boomerang buff +1 DEX
// -----------------------------------------------------------------boomerang buff +3 DEX
if ($row["equipR"] =="boomerang") {
    echo " <span>( <i class='green'>+3</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +3");
    $_SESSION['dexmod'] += 3;
}
// -----------------------------------------------------------------chakram buff +7 DEX +7 MAG
if ($row["equipR"] =="chakram") {
    echo " <span>( <i class='green'>+7</i>, <i class='blue'>+7</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +7");
    // $results = $link->query("UPDATE $user SET magmod = magmod +7");
    $_SESSION['dexmod'] += 7;
    $_SESSION['magmod'] += 7;
}
// -----------------------------------------------------------------wooden bow buff +8 DEX
if ($row["equipR"] =="wooden bow") {
    echo " <span>( <i class='green'>+8</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +8");
    $_SESSION['dexmod'] += 8;
}
// -----------------------------------------------------------------hunter bow
if ($row["equipR"] =="hunter bow") {
    echo " <span>( <i class='green'>+9</i>, <i class='gold'>+5</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +9");
    // $results = $link->query("UPDATE $user SET defmod = defmod +5");
    $_SESSION['dexmod'] += 9;
    $_SESSION['defmod'] += 5;
}
// -----------------------------------------------------------------long bow
if ($row["equipR"] =="long bow") {
    echo " <span>( <i class='green'>+11</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +11");
    $_SESSION['dexmod'] += 11;
}

// -----------------------------------------------------------------crossbow buff +13 DEX
if ($row["equipR"] =="crossbow") {
    echo " <span>( <i class='green'>+13</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +13");
    $_SESSION['dexmod'] += 13;
}


// -----------------------------------------------------------------iron
if ($row["equipR"] =="iron boomerang") {
    echo " <span>( <i class='green'>+10</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +10");
    $_SESSION['dexmod'] += 10;
}

if ($row["equipR"] =="harpoon") {
    echo " <span>( <i class='green'>+8</i>, <i class='blue'>+4</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +8");
    // $results = $link->query("UPDATE $user SET magmod = magmod +4");
    $_SESSION['dexmod'] += 8;
    $_SESSION['magmod'] += 4;
}

if ($row["equipR"] =="iron chakram") {
    echo " <span>( <i class='green'>+15</i>, <i class='blue'>+15</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +15");
    // $results = $link->query("UPDATE $user SET magmod = magmod +15");
    $_SESSION['dexmod'] += 15;
    $_SESSION['magmod'] += 15;
}

if ($row["equipR"] =="iron bow") {
    echo " <span>( <i class='green'>+20</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +20");
    $_SESSION['dexmod'] += 20;
}

if ($row["equipR"] =="enchanted bow") {
    echo " <span>( <i class='green'>+35</i>, <i class='blue'>+10</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +35");
    // $results = $link->query("UPDATE $user SET magmod = magmod +10");
    $_SESSION['dexmod'] += 35;
    $_SESSION['magmod'] += 10;
}

if ($row["equipR"] =="jim bow") {
    echo " <span>( <i class='green'>+25</i>, <i class='green small'>poison<i class=''>5</i></i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +25");
    $_SESSION['dexmod'] += 25;
}

if ($row["equipR"] =="iron crossbow") {
    echo " <span>( <i class='green'>+30</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +30");
    $_SESSION['dexmod'] += 30;
}


if ($row["equipR"] =="compound crossbow") {
    echo " <span>( <i class='green'>+40</i>, <i class='gold'>+80</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +40");
    // $results = $link->query("UPDATE $user SET defmod = defmod +80");
    $_SESSION['dexmod'] += 40;
    $_SESSION['defmod'] += 80;
}


if ($row["equipR"] =="hand crossbow") {
    echo " <span>( <i class='green'>+35</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +35");
    $_SESSION['dexmod'] += 35;
}


// -----------------------------------------------------------------silver
if ($row["equipR"] =="silver boomerang") {
    echo " <span>( <i class='green'>+20</i>, <i class='blue'>+5</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +20");
    // $results = $link->query("UPDATE $user SET magmod = magmod +5");
    $_SESSION['dexmod'] += 20;
    $_SESSION['magmod'] += 5;
}

if ($row["equipR"] =="silver bow") {
    echo " <span>( <i class='green'>+30</i>, <i class='blue'>+5</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +30");
    // $results = $link->query("UPDATE $user SET magmod = magmod +5");
    $_SESSION['dexmod'] += 30;
    $_SESSION['magmod'] += 5;
}


if ($row["equipR"] =="silver crossbow") {
    echo " <span>( <i class='green'>+40</i>, <i class='blue'>+5</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +40");
    // $results = $link->query("UPDATE $user SET magmod = magmod +5");
    $_SESSION['dexmod'] += 40;
    $_SESSION['magmod'] += 5;
}

// -----------------------------------------------------------------steel
if ($row["equipR"] =="steel boomerang") {
    echo " <span>( <i class='green'>+22</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +22");
    $_SESSION['dexmod'] += 22;
}

if ($row["equipR"] =="steel bow") {
    echo " <span>( <i class='green'>+33</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +33");
    $_SESSION['dexmod'] += 33;
}

if ($row["equipR"] =="steel crossbow") {
    echo " <span>( <i class='green'>+44</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +44");
    $_SESSION['dexmod'] += 44;
}

if ($row["equipR"] =="steel chakram") {
    echo " <span>( <i class='green'>+25</i>, <i class='blue'>+25</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +25");
    // $results = $link->query("UPDATE $user SET magmod = magmod +25");
    $_SESSION['dexmod'] += 25;
    $_SESSION['magmod'] += 25;
}
if ($row["equipR"] =="greenhorn bow") {
    echo " <span>( <i class='green'>+35</i>, <i class='gold'>+35</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +50");
    // $results = $link->query("UPDATE $user SET defmod = defmod +25");
    $_SESSION['dexmod'] += 50;
    $_SESSION['defmod'] += 25;
}
if ($row["equipR"] =="snow bow") {
    echo " <span>( <i class='green'>+45</i>, <i class='blue'>+15</i>, <i class='gold'>+15</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +45");
    // $results = $link->query("UPDATE $user SET magmod = magmod +15");
    // $results = $link->query("UPDATE $user SET defmod = defmod +15");
    $_SESSION['dexmod'] += 45;
    $_SESSION['magmod'] += 15;
    $_SESSION['defmod'] += 15;
}

if ($row["equipR"] =="keeper's crossbow") {
    echo " <span>( <i class='green'>+90</i>, <i class='black'>-50 def</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +90");
    // $results = $link->query("UPDATE $user SET defmod = defmod -50");
    $_SESSION['dexmod'] += 90;
    $_SESSION['defmod'] -= 50;
}

if ($row["equipR"] =="mithril boomerang") {
    echo " <span>( <i class='green'>+50</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +50");
    $_SESSION['dexmod'] += 50;
}

if ($row["equipR"] =="mithril bow") {
    echo " <span>( <i class='green'>+80</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +80");
    $_SESSION['dexmod'] += 80;
}

if ($row["equipR"] =="mithril crossbow") {
    echo " <span>( <i class='green'>+100</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +100");
    $_SESSION['dexmod'] += 100;
}

if ($row["equipR"] =="mithril chakram") {
    echo " <span>( <i class='green'>+60</i>, <i class='blue'>+60</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +60");
    // $results = $link->query("UPDATE $user SET magmod = magmod +60");
    $_SESSION['dexmod'] += 60;
    $_SESSION['magmod'] += 60;
}

if ($row["equipR"] =="ranger crossbow") {
    echo " <span>( <i class='green'>+250</i> )</span>";
    // $results = $link->query("UPDATE $user SET dexmod = dexmod +250");
    $_SESSION['dexmod'] += 250;
}
