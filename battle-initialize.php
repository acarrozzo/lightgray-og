<?php
// -----------------------------------  RESET ENEMY FLAGS

        $_SESSION['eLvl'] = 0;			// enemy level
        $_SESSION['eFly'] = 0;			// enemy flies, need ranged weapon or magic

        $_SESSION['eBite'] = 0;		    // enemy - 2x pure damage, 1/5 chance		(200% pure damage)          // BITE
        $_SESSION['ePow'] = 0;			// enemy - 3x damage, 1/3 chance			((1-att)*3)                 // POWER
        $_SESSION['eRage'] = 0;	    	// enemy - 2-4x pure hit, 1/5 chance 	    (200%, 300% or 400% pure)   // RAGE
        $_SESSION['eCrit'] = 0;	    	// enemy - 10x damage, 1/10 chance  		((1-att)*10)                // CRITICAL
        $_SESSION['eDragonFire'] = 0;	// enemy - 3-5x pure hit, 1/4 chance        (300%, 400% or 500% pure)   // DRAGONFIRE
        // 50% chance to catch on fire(1-damage). when on fire, burn forever for that dam. need to use water to cure on fire??
        $_SESSION['eWhirlwind'] = 0;	// enemy - 6x damage, 1/4 chance	        (1-(att*6) damage)          // WHIRLWIND

        $_SESSION['eAssassinate'] = 0;	// NEW!!!! - 1/4 chance to do 50 times damage, first strike??? // NEEED TO WRITE IN!!!!

        $_SESSION['eDex'] = 0;			// enemy dex att, uses your dex as def
        $_SESSION['eMag'] = 0;			// enemy mag att, uses your mag as def
        $_SESSION['eHeal'] = 0;		    // enemy heals self
        $_SESSION['eSteal'] = 0;		// enemy steals 20% [ 1 - attack ] coin
        $_SESSION['ePoison'] = 0;		// enemy poisons you (1) 1 - lvl/2  (2) 1-lvl

        $_SESSION['eMulti'] = 0;		// enemy LVL * 10% chance attack again (1 - 10)
        $_SESSION['eDoubleHit'] = 0;	// enemy always hits 2 times
        $_SESSION['eTripleHit'] = 0;	// enemy always hits 3 times


        $_SESSION['ePureA'] = 0;		// enemy attacks pure, you have no def
        $_SESSION['ePureD'] = 0;		// enemy has max defense
        $_SESSION['eStrImm'] = 0;		// enemy str immune
        $_SESSION['eDexImm'] = 0;		// enemy dex immune
        $_SESSION['eMagImm'] = 0;		// enemy mag immune
        $_SESSION['eDodge'] = 0;		// enemy dodges LVL x 10%
        $_SESSION['eBlock'] = 0;		// block all damage, 1/5 chance

        $_SESSION['eDrainMP'] = 0;		// enemy drains MP (1) 1 - lvl/2  (2) 1-lvl   // NEEED TO WRITE IN!!!!
        $_SESSION['eDrainHP'] = 0;		// enemy drains HP (1) 1 - lvl/2  (2) 1-lvl   // NEEED TO WRITE IN!!!!
        $_SESSION['eResurrect'] = 0;		// # percent chance to ressurect after enemy dies   // NEEED TO WRITE IN!!!!

        $_SESSION['notthe'] = 0;		// make 1 when enemy doesn't have THE (ex. diablo)

        
// -----------------------------------  Volphina - ATTACK IN SECRET BATTLE ARENA // currently Mage Ultima
if ($enemy == 'Volphina') {
    // // $results = $link->query("UPDATE $user SET enemyhpmax = 10000");
    // // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // // $results = $link->query("UPDATE $user SET enemyatt = 1000");
    // // $results = $link->query("UPDATE $user SET enemydef = 1000");
    $updates = [ // -- set changes
        'enemyhpmax' => 100,
        'enemyhp' => 100,
        'enemyatt' => 5,
        'enemydef' => 5
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 100;		// enemy level
    $_SESSION['eFly'] = 0;			// enemy flies, need ranged weapon
    $_SESSION['eBite'] = 0;		    // enemy bites you, 2x pure attack damage
    $_SESSION['ePow'] = 0;			// enemy power attack, 1/3 chance x3 att
    $_SESSION['eRage'] = 0;	    	// enemy - 2-4x pure hit, 1/5 chance 	    (200%, 300% or 400% pure)   // RAGE
    $_SESSION['eCrit'] = 0;		    // enemy critical attack, 1/10 chance x10 attack
    $_SESSION['eDragonFire'] = 0;	// enemy - 3-5x pure hit, 1/4 chance        (300%, 400% or 500% pure)   // DRAGONFIRE
    $_SESSION['eWhirlwind'] = 0;	// enemy - 6x damage, 1/4 chance	        (1-(att*6) damage)          // WHIRLWIND

    $_SESSION['eDex'] = 0;			// enemy dex att, uses your dex as def
    $_SESSION['eMag'] = 0;			// enemy mag att, uses your mag as def
    $_SESSION['eHeal'] = 0; 		// enemy heals self
    $_SESSION['eSteal'] = 0;		// enemy steals 20% [ 1 - lvl*3 ] coidn // enemy steals 20% [ 1 - attack ] coin
    $_SESSION['ePoison'] = 0;		// enemy poisons you (1) 1 - lvl/2  (2) 1-lvl
    $_SESSION['eMulti'] = 0;		// enemy LVL * 10% chance attack again (1 - 10)
    $_SESSION['eDoubleHit'] = 0;	// enemy always hits 2 times
    $_SESSION['eTripleHit'] = 0;	// enemy always hits 3 times

    $_SESSION['ePureA'] = 0;		// enemy attacks pure, you have no def
    $_SESSION['ePureD'] = 0;		// enemy has max defense
    $_SESSION['eStrImm'] = 0;		// enemy str immune
    $_SESSION['eDexImm'] = 0;		// enemy dex immune
    $_SESSION['eMagImm'] = 0;		// enemy mag immune
    $_SESSION['eDodge'] = 0;		// enemy dodges LVL x 10%
    $_SESSION['notthe'] = 1;		// make 1 when enemy doesn't have THE (ex. diablo)
}
// -----------------------------------  BATTLE INITIALIZE
//// $results = $link->query("UPDATE $user SET eIcon = '$enemy'");

$updates = [ // -- set changes
    'eIcon' => $enemy
]; 
updateStats($link, $username, $updates); // -- apply changes


// ------------------------------------------------------------------------ GRASSY FIELD
// --------------------------------------------------------------  rat
if ($enemy == 'Rat') {
    // // $results = $link->query("UPDATE $user SET enemyhpmax = 3");
    // // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // // $results = $link->query("UPDATE $user SET enemyatt = 1");
    // // $results = $link->query("UPDATE $user SET enemydef = 1");



    $updates = [ // -- set changes
        'enemyhpmax' => 3,
        'enemyhp' => 3,
        'enemyatt' => 1,
        'enemydef' => 1
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 1;			// enemy level
}
// --------------------------------------------------------------  Sand Crab
if ($enemy == 'Sand Crab') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 3");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 2");
    // $results = $link->query("UPDATE $user SET enemydef = 2");

    $updates = [ // -- set changes
        'enemyhpmax' => 3,
        'enemyhp' => 3,
        'enemyatt' => 2,
        'enemydef' => 2
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 2;			// enemy level
}
// --------------------------------------------------------------  giant rat
if ($enemy == 'Giant Rat') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 6");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 3");
    // $results = $link->query("UPDATE $user SET enemydef = 1");
    $updates = [ // -- set changes
        'enemyhpmax' => 6,
        'enemyhp' => 6,
        'enemyatt' => 3,
        'enemydef' => 1
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 3;			// enemy level
}
// --------------------------------------------------------------  Gator (real Gator)
if ($enemy == 'Gator') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 100");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 8");
    // $results = $link->query("UPDATE $user SET enemydef = 0");

    $updates = [ // -- set changes
        'enemyhpmax' => 100,
        'enemyhp' => 100,
        'enemyatt' => 8,
        'enemydef' => 0
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 5;			// enemy level
}

// ------------------------------------------------------------------------ SPIDER CAVE
// --------------------------------------------------------------  spider
if ($enemy == 'Spider') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 5");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 3");
    // $results = $link->query("UPDATE $user SET enemydef = 1");

    $updates = [ // -- set changes
        'enemyhpmax' => 5,
        'enemyhp' => 5,
        'enemyatt' => 3,
        'enemydef' => 1
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 2;			// enemy level
}

// --------------------------------------------------------------  scorpion
if ($enemy == 'Scorpion') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 8");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 5");
    // $results = $link->query("UPDATE $user SET enemydef = 2");
    $updates = [ // -- set changes
        'enemyhpmax' => 8,
        'enemyhp' => 8,
        'enemyatt' => 5,
        'enemydef' => 2
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 3;			// enemy level
}
// --------------------------------------------------------------  giant spider
if ($enemy == 'Giant Spider') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 10");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 6");
    // $results = $link->query("UPDATE $user SET enemydef = 3");
    $updates = [ // -- set changes
        'enemyhpmax' => 10,
        'enemyhp' => 10,
        'enemyatt' => 6,
        'enemydef' => 3
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 4;			// enemy level
}

// --------------------------------------------------------------  alpha scorpion
if ($enemy == 'Alpha Scorpion') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 20");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 8");
    // $results = $link->query("UPDATE $user SET enemydef = 5");
    $updates = [ // -- set changes
        'enemyhpmax' => 20,
        'enemyhp' => 20,
        'enemyatt' => 8,
        'enemydef' => 5
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 5;			// enemy level
}

// --------------------------------------------------------------  scorpion guard
if ($enemy == 'Scorpion Guard') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 30");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 10");
    // $results = $link->query("UPDATE $user SET enemydef = 8");
    $updates = [ // -- set changes
        'enemyhpmax' => 30,
        'enemyhp' => 30,
        'enemyatt' => 10,
        'enemydef' => 8
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 7;			// enemy level
}
// --------------------------------------------------------------  mammoth scorpion
if ($enemy == 'Mammoth Scorpion') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 70");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 20");
    // $results = $link->query("UPDATE $user SET enemydef = 16");
    $updates = [ // -- set changes
        'enemyhpmax' => 70,
        'enemyhp' => 70,
        'enemyatt' => 20,
        'enemydef' => 16
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 10;			// enemy level
}
// --------------------------------------------------------------  scorpion queen
if ($enemy == 'Scorpion Queen') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 200");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 50");
    // $results = $link->query("UPDATE $user SET enemydef = 40");
    $updates = [ // -- set changes
        'enemyhpmax' => 200,
        'enemyhp' => 200,
        'enemyatt' => 50,
        'enemydef' => 40
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 15;			// enemy level
}
// --------------------------------------------------------------  scorpion king
if ($enemy == 'Scorpion King') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 500");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 100");
    // $results = $link->query("UPDATE $user SET enemydef = 80");
    $updates = [ // -- set changes
        'enemyhpmax' => 500,
        'enemyhp' => 500,
        'enemyatt' => 100,
        'enemydef' => 80
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 30;			// enemy level
}
// ------------------------------------------------------------------------ BAT CAVE
// --------------------------------------------------------------  bat
if ($enemy == 'Bat') {
  //  // $results = $link->query("UPDATE $user SET enemyhpmax = 3");
  //  // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
  //  // $results = $link->query("UPDATE $user SET enemyatt = 2");
  //  // $results = $link->query("UPDATE $user SET enemydef = 2");
    $updates = [ // -- set changes
        'enemyhpmax' => 3,
        'enemyhp' => 3,
        'enemyatt' => 2,
        'enemydef' => 2
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 2;			// enemy level
        $_SESSION['eFly'] = 1;			// enemy flies
}
// --------------------------------------------------------------  golden bat
if ($enemy == 'Golden Bat') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 20");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 8");
    // $results = $link->query("UPDATE $user SET enemydef = 2");
    $updates = [ // -- set changes
        'enemyhpmax' => 20,
        'enemyhp' => 20,
        'enemyatt' => 8,
        'enemydef' => 2
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 6;			// enemy level
        $_SESSION['eFly'] = 1;			// enemy flies
        $_SESSION['eMagImm'] = 1;		// enemy mag immune

}
// --------------------------------------------------------------  salamander
if ($enemy == 'Salamander') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 30");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 10");
    // $results = $link->query("UPDATE $user SET enemydef = 6");
    $updates = [ // -- set changes
        'enemyhpmax' => 30,
        'enemyhp' => 30,
        'enemyatt' => 10,
        'enemydef' => 6
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 6;			// enemy level
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
}

// --------------------------------------------------------------  goblin
if ($enemy == 'Goblin') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 20");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 8");
    // $results = $link->query("UPDATE $user SET enemydef = 6");
    $updates = [ // -- set changes
        'enemyhpmax' => 20,
        'enemyhp' => 20,
        'enemyatt' => 8,
        'enemydef' => 6
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 5;			// enemy level
}
// --------------------------------------------------------------  goblin bandit
if ($enemy == 'Goblin Bandit') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 40");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 12");
    // $results = $link->query("UPDATE $user SET enemydef = 8");
    $updates = [ // -- set changes
        'enemyhpmax' => 40,
        'enemyhp' => 40,
        'enemyatt' => 12,
        'enemydef' => 8
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 7;			// enemy level
}
// --------------------------------------------------------------  goblin chief
if ($enemy == 'Goblin Chief') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 120");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 20");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 120,
        'enemyhp' => 120,
        'enemyatt' => 20,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 10;			// enemy level
}

// --------------------------------------------------------------  cow
if ($enemy == 'Cow') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 20");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 5");
    // $results = $link->query("UPDATE $user SET enemydef = 5");
    $updates = [ // -- set changes
        'enemyhpmax' => 20,
        'enemyhp' => 20,
        'enemyatt' => 5,
        'enemydef' => 5
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 4;			// enemy level
}
// --------------------------------------------------------------  wild boar
if ($enemy == 'Wild Boar') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 40");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 8");
    // $results = $link->query("UPDATE $user SET enemydef = 5");
    $updates = [ // -- set changes
        'enemyhpmax' => 40,
        'enemyhp' => 40,
        'enemyatt' => 8,
        'enemydef' => 5
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 5;			// enemy level
}
// --------------------------------------------------------------  snake
if ($enemy == 'Snake') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 15");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 15");
    // $results = $link->query("UPDATE $user SET enemydef = 5");
    $updates = [ // -- set changes
        'enemyhpmax' => 15,
        'enemyhp' => 15,
        'enemyatt' => 15,
        'enemydef' => 5
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 5;			// enemy level
}
// --------------------------------------------------------------  hill ogre
if ($enemy == 'Hill Ogre') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 100");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 20");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 100,
        'enemyhp' => 100,
        'enemyatt' => 20,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 10;			// enemy level
            $_SESSION['ePow'] = 1;			// enemy power x3 att
}
// ------------------------------------------------------------------------ OGRE CAVE
// --------------------------------------------------------------  hob goblin
if ($enemy == 'Hob Goblin') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 30");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 9");
    // $results = $link->query("UPDATE $user SET enemydef = 7");
    $updates = [ // -- set changes
        'enemyhpmax' => 30,
        'enemyhp' => 30,
        'enemyatt' => 9,
        'enemydef' => 7
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 6;			// enemy level
}
// --------------------------------------------------------------  orc
if ($enemy == 'Orc') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 40");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 11");
    // $results = $link->query("UPDATE $user SET enemydef = 7");
    $updates = [ // -- set changes
        'enemyhpmax' => 40,
        'enemyhp' => 40,
        'enemyatt' => 11,
        'enemydef' => 7
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 7;			// enemy level
        $_SESSION['eDex'] = 1;			// enemy dex att, used your dex as def
}
// --------------------------------------------------------------  ogre
if ($enemy == 'Ogre') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 50");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 15");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 50,
        'enemyhp' => 50,
        'enemyatt' => 15,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 8;			// enemy level
}
// --------------------------------------------------------------  ogre guard
if ($enemy == 'Ogre Guard') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 80");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 20");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 80,
        'enemyhp' => 80,
        'enemyatt' => 20,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 9;			// enemy level
}
// --------------------------------------------------------------  fire ogress
if ($enemy == 'Fire Ogress') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 70");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 25");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 70,
        'enemyhp' => 70,
        'enemyatt' => 25,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 10;			// enemy level
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
}
// --------------------------------------------------------------  ogre lieutenant
if ($enemy == 'Ogre Lieutenant') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 250");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 35");
    // $results = $link->query("UPDATE $user SET enemydef = 20");
    $updates = [ // -- set changes
        'enemyhpmax' => 250,
        'enemyhp' => 250,
        'enemyatt' => 35,
        'enemydef' => 20
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 13;			// enemy level
}
// --------------------------------------------------------------  ogre priest
if ($enemy == 'Ogre Priest') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 80");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 30");
    // $results = $link->query("UPDATE $user SET enemydef = 20");
    $updates = [ // -- set changes
        'enemyhpmax' => 80,
        'enemyhp' => 80,
        'enemyatt' => 30,
        'enemydef' => 20
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 11;			// enemy level
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
        $_SESSION['eHeal'] = 1;		// enemy heals self
}

// ------------------------------------------------------------------------ KOBOLD CAVE
// --------------------------------------------------------------  kobold
if ($enemy == 'Kobold') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 30");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 10");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 30,
        'enemyhp' => 30,
        'enemyatt' => 10,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 7;			// enemy level
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
}
// --------------------------------------------------------------  flying kobold
if ($enemy == 'Flying Kobold') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 30");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 10");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 30,
        'enemyhp' => 30,
        'enemyatt' => 10,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 7;			// enemy level
        $_SESSION['eFly'] = 1;			// enemy flies
}
// --------------------------------------------------------------  kobold shaman
if ($enemy == 'Kobold Shaman') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 40");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 15");
    // $results = $link->query("UPDATE $user SET enemydef = 4");
    $updates = [ // -- set changes
        'enemyhpmax' => 40,
        'enemyhp' => 40,
        'enemyatt' => 15,
        'enemydef' => 4
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 8;			// enemy level
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
}
// --------------------------------------------------------------  kobold ninja
if ($enemy == 'Kobold Ninja') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 40");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 20");
    // $results = $link->query("UPDATE $user SET enemydef = 8");
    $updates = [ // -- set changes
        'enemyhpmax' => 40,
        'enemyhp' => 40,
        'enemyatt' => 20,
        'enemydef' => 8
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 8;			// enemy level
}
// --------------------------------------------------------------  kobold warlock
if ($enemy == 'Kobold Warlock') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 50");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 25");
    // $results = $link->query("UPDATE $user SET enemydef = 4");
    $updates = [ // -- set changes
        'enemyhpmax' => 50,
        'enemyhp' => 50,
        'enemyatt' => 25,
        'enemydef' => 4
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 9;			// enemy level
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
}
// --------------------------------------------------------------  kobold champion
if ($enemy == 'Kobold Champion') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 100");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 25");
    // $results = $link->query("UPDATE $user SET enemydef = 8");
    $updates = [ // -- set changes
        'enemyhpmax' => 100,
        'enemyhp' => 100,
        'enemyatt' => 25,
        'enemydef' => 8
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 10;			// enemy level
}
// --------------------------------------------------------------  kobold master
if ($enemy == 'Kobold Master') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 80");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 40");
    // $results = $link->query("UPDATE $user SET enemydef = 50");
    $updates = [ // -- set changes
        'enemyhpmax' => 80,
        'enemyhp' => 80,
        'enemyatt' => 40,
        'enemydef' => 50
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 13;			// enemy level
                $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
}
// --------------------------------------------------------------  kobold monk
if ($enemy == 'Kobold Monk') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 60");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 30");
    // $results = $link->query("UPDATE $user SET enemydef = 30");
    $updates = [ // -- set changes
        'enemyhpmax' => 60,
        'enemyhp' => 60,
        'enemyatt' => 30,
        'enemydef' => 30
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 11;			// enemy level
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
        $_SESSION['eHeal'] = 1;		// enemy heals self
}




// ------------------------------------------------------------------------ FOREST
if ($enemy == 'Wolf') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 40");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 12");
    // $results = $link->query("UPDATE $user SET enemydef = 5");
    $updates = [ // -- set changes
        'enemyhpmax' => 40,
        'enemyhp' => 40,
        'enemyatt' => 12,
        'enemydef' => 5
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 5;			// enemy level
}
if ($enemy == 'Coyote') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 40");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 15");
    // $results = $link->query("UPDATE $user SET enemydef = 5");
    $updates = [ // -- set changes
        'enemyhpmax' => 40,
        'enemyhp' => 40,
        'enemyatt' => 15,
        'enemydef' => 5
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 6;			// enemy level
}
if ($enemy == 'Buck') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 60");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 15");
    // $results = $link->query("UPDATE $user SET enemydef = 8");
    $updates = [ // -- set changes
        'enemyhpmax' => 60,
        'enemyhp' => 60,
        'enemyatt' => 15,
        'enemydef' => 8
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 6;			// enemy level
}
if ($enemy == 'Bear') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 100");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 25");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 100,
        'enemyhp' => 100,
        'enemyatt' => 25,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 8;			// enemy level
}
if ($enemy == 'Stag') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 80");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 20");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 80,
        'enemyhp' => 80,
        'enemyatt' => 20,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 8;			// enemy level
        $_SESSION['eMagImm'] = 1;		// enemy mag immune
}
if ($enemy == 'Bigfoot') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 200");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 40");
    // $results = $link->query("UPDATE $user SET enemydef = 15");
    $updates = [ // -- set changes
        'enemyhpmax' => 200,
        'enemyhp' => 200,
        'enemyatt' => 40,
        'enemydef' => 15
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 13;			// enemy level
}
if ($enemy == 'Hawk') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 30");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 25");
    // $results = $link->query("UPDATE $user SET enemydef = 15");
    $updates = [ // -- set changes
        'enemyhpmax' => 30,
        'enemyhp' => 30,
        'enemyatt' => 25,
        'enemydef' => 15
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 9;			// enemy level
    $_SESSION['eFly'] = 1;			// enemy flies
}
// ------------------------------------------------------------------------ SEWER
if ($enemy == 'Tarantula') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 50");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 20");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 50,
        'enemyhp' => 50,
        'enemyatt' => 20,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 7;			// enemy level
}
if ($enemy == 'Sewer Rat') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 60");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 15");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 60,
        'enemyhp' => 60,
        'enemyatt' => 15,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 7;			// enemy level
}
if ($enemy == 'Red Gator') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 250");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 25");
    // $results = $link->query("UPDATE $user SET enemydef = 0");
    $updates = [ // -- set changes
        'enemyhpmax' => 250,
        'enemyhp' => 250,
        'enemyatt' => 5,
        'enemydef' => 0
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 10;			// enemy level
}
if ($enemy == 'Flying Dung Beetle') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 40");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 20");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 40,
        'enemyhp' => 40,
        'enemyatt' => 20,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 8;			// enemy level
    $_SESSION['eFly'] = 1;			// enemy flies
}
if ($enemy == 'Imp') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 10");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 25");
    // $results = $link->query("UPDATE $user SET enemydef = 25");
    $updates = [ // -- set changes
        'enemyhpmax' => 10,
        'enemyhp' => 10,
        'enemyatt' => 25,
        'enemydef' => 25
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 7;			// enemy level
        $_SESSION['eDodge'] = 5;		// enemy dodges LVL x 10%
}
// ------------------------------------------------------------------------ THIEVE'S DEN
if ($enemy == 'Thief') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 20");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 10");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 20,
        'enemyhp' => 20,
        'enemyatt' => 10,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 5;			// enemy level
        $_SESSION['eSteal'] = 1;		// enemy steals 20% [ 1 - attack ] coin
}
if ($enemy == 'Thief Pickpocket') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 70");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 25");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 70,
        'enemyhp' => 70,
        'enemyatt' => 25,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 8;			// enemy level
        $_SESSION['eSteal'] = 1;		// enemy steals 20% [ 1 - attack ] coin
}
if ($enemy == 'Thief Brute') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 120");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 30");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 120,
        'enemyhp' => 120,
        'enemyatt' => 30,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 11;			// enemy level
}
if ($enemy == 'Master Thief') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 200");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 45");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 200,
        'enemyhp' => 200,
        'enemyatt' => 45,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 14;			// enemy level
        $_SESSION['eSteal'] = 1;		// enemy steals 20% [ 1 - attack ] coin
}
// ------------------------------------------------------------------------ CATACOMBS
if ($enemy == 'Skeleton') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 40");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 15");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 40,
        'enemyhp' => 40,
        'enemyatt' => 15,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 7;			// enemy level
}
if ($enemy == 'Skeleton Archer') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 50");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 25");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 50,
        'enemyhp' => 50,
        'enemyatt' => 25,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 8;			// enemy level
        $_SESSION['eDex'] = 1;			// enemy dex att, used your dex as def
}
if ($enemy == 'Skeleton Knight') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 80");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 35");
    // $results = $link->query("UPDATE $user SET enemydef = 15");
    $updates = [ // -- set changes
        'enemyhpmax' => 80,
        'enemyhp' => 80,
        'enemyatt' => 35,
        'enemydef' => 15
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 10;			// enemy level
}
if ($enemy == 'Skeleton Sorcerer') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 80");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 40");
    // $results = $link->query("UPDATE $user SET enemydef = 5");
    $updates = [ // -- set changes
        'enemyhpmax' => 80,
        'enemyhp' => 80,
        'enemyatt' => 40,
        'enemydef' => 5
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 11;			// enemy level
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
}
if ($enemy == 'Ancient Skeleton') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 120");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 40");
    // $results = $link->query("UPDATE $user SET enemydef = 30");
    $updates = [ // -- set changes
        'enemyhpmax' => 120,
        'enemyhp' => 120,
        'enemyatt' => 40,
        'enemydef' => 30
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 13;			// enemy level
}
if ($enemy == 'Victoria the Dead') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 250");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 50");
    // $results = $link->query("UPDATE $user SET enemydef = 15");
    $updates = [ // -- set changes
        'enemyhpmax' => 250,
        'enemyhp' => 250,
        'enemyatt' => 50,
        'enemydef' => 15
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 17;			// enemy level
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
        $_SESSION['eMagImm'] = 1;		// enemy mag immune
        $_SESSION['notthe'] = 1;		// make 1 when enemy doesn't have THE (ex. diablo)
}
if ($enemy == 'Omar the Dead') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 250");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 60");
    // $results = $link->query("UPDATE $user SET enemydef = 30");
    $updates = [ // -- set changes
        'enemyhpmax' => 250,
        'enemyhp' => 250,
        'enemyatt' => 60,
        'enemydef' => 30
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 17;			// enemy level
        $_SESSION['notthe'] = 1;		// make 1 when enemy doesn't have THE (ex. diablo)
}
// ------------------------------------------------------------------------ Abandoned Mine
if ($enemy == 'Rabid Skeever') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 200");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 30");
    // $results = $link->query("UPDATE $user SET enemydef = 20");
    $updates = [ // -- set changes
        'enemyhpmax' => 200,
        'enemyhp' => 200,
        'enemyatt' => 30,
        'enemydef' => 20
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 15;			// enemy level
        $_SESSION['eBite'] = 1;		// enemy bites you, 2x pure attack damage
}
if ($enemy == 'Bleeding Dartwing') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 200");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 50");
    // $results = $link->query("UPDATE $user SET enemydef = 30");
    $updates = [ // -- set changes
        'enemyhpmax' => 200,
        'enemyhp' => 200,
        'enemyatt' => 50,
        'enemydef' => 30
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 20;			// enemy level
        $_SESSION['eFly'] = 1;			// enemy flies
}
if ($enemy == 'Mongolian Death Worm') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 600");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 70");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 600,
        'enemyhp' => 600,
        'enemyatt' => 70,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 23;			// enemy level
        $_SESSION['ePoison'] = 2;		// enemy poisons you 1:[ 1 - lvl/2 ], 2:[ 1 - lvl ]
}
// ------------------------------------------------------------------------ Stone Grotto
if ($enemy == 'Demon Wing') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 150");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 50");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 150,
        'enemyhp' => 150,
        'enemyatt' => 50,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 20;			// enemy level
        $_SESSION['eFly'] = 1;			// enemy flies
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
}
if ($enemy == 'Possessed Axeman') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 600");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 70");
    // $results = $link->query("UPDATE $user SET enemydef = 30");
    $updates = [ // -- set changes
        'enemyhpmax' => 600,
        'enemyhp' => 600,
        'enemyatt' => 70,
        'enemydef' => 30
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 25;			// enemy level
        $_SESSION['ePow'] = 1;			// enemy power x3 att
}
// ------------------------------------------------------------------------ RED FORT
if ($enemy == 'Red Bandit') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 250");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 40");
    // $results = $link->query("UPDATE $user SET enemydef = 30");
    $updates = [ // -- set changes
        'enemyhpmax' => 250,
        'enemyhp' => 250,
        'enemyatt' => 40,
        'enemydef' => 30
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 15;			// enemy level
        $_SESSION['eSteal'] = 1;		// enemy steals 20% [ 1 - attack ] coin
}
if ($enemy == 'Bandit Marauder') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 400");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 50");
    // $results = $link->query("UPDATE $user SET enemydef = 30");
    $updates = [ // -- set changes
        'enemyhpmax' => 400,
        'enemyhp' => 400,
        'enemyatt' => 50,
        'enemydef' => 30
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 18;			// enemy level
        $_SESSION['eDex'] = 1;			// enemy dex att
}
if ($enemy == 'Butcher') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 500");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 60");
    // $results = $link->query("UPDATE $user SET enemydef = 30");
    $updates = [ // -- set changes
        'enemyhpmax' => 500,
        'enemyhp' => 500,
        'enemyatt' => 60,
        'enemydef' => 30
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 23;			// enemy level
        $_SESSION['ePow'] = 1;			// enemy power x3 att
}
if ($enemy == 'Red Beard') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 600");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 90");
    // $results = $link->query("UPDATE $user SET enemydef = 40");
    $updates = [ // -- set changes
        'enemyhpmax' => 600,
        'enemyhp' => 600,
        'enemyatt' => 90,
        'enemydef' => 40
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 30;			// enemy level
        $_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack
        $_SESSION['notthe'] = 1;		// make 1 when enemy doesn't have THE (ex. diablo)
}











// ------------------------------------------------------------------------ BLUE OCEAN
if ($enemy == 'Jellyfish') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 50");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 25");
    // $results = $link->query("UPDATE $user SET enemydef = 15");
    $updates = [ // -- set changes
        'enemyhpmax' => 50,
        'enemyhp' => 50,
        'enemyatt' => 25,
        'enemydef' => 15
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 10;			// enemy level
}
if ($enemy == 'Electric Eel') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 60");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 20");
    // $results = $link->query("UPDATE $user SET enemydef = 15");
    $updates = [ // -- set changes
        'enemyhpmax' => 60,
        'enemyhp' => 60,
        'enemyatt' => 20,
        'enemydef' => 15
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 10;			// enemy level
        $_SESSION['eDodge'] = 2;		// enemy dodges LVL x 10%
}
if ($enemy == 'Piranha') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 80");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 25");
    // $results = $link->query("UPDATE $user SET enemydef = 15");
    $updates = [ // -- set changes
        'enemyhpmax' => 80,
        'enemyhp' => 80,
        'enemyatt' => 25,
        'enemydef' => 15
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 11;			// enemy level
        $_SESSION['eMulti'] = 2;		// enemy LVL * 10% chance attack again (1 - 10)
}
if ($enemy == 'Barracuda') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 100");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 25");
    // $results = $link->query("UPDATE $user SET enemydef = 25");
    $updates = [ // -- set changes
        'enemyhpmax' => 100,
        'enemyhp' => 100,
        'enemyatt' => 25,
        'enemydef' => 25
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 12;			// enemy level
}
if ($enemy == 'Squid') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 120");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 35");
    // $results = $link->query("UPDATE $user SET enemydef = 25");
    $updates = [ // -- set changes
        'enemyhpmax' => 120,
        'enemyhp' => 120,
        'enemyatt' => 35,
        'enemydef' => 25
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 13;			// enemy level
}
if ($enemy == 'Albatross') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 60");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 40");
    // $results = $link->query("UPDATE $user SET enemydef = 15");
    $updates = [ // -- set changes
        'enemyhpmax' => 60,
        'enemyhp' => 60,
        'enemyatt' => 40,
        'enemydef' => 15
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 13;			// enemy level
        $_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
}
if ($enemy == 'Crocodile') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 500");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 100");
    // $results = $link->query("UPDATE $user SET enemydef = 50");
    $updates = [ // -- set changes
        'enemyhpmax' => 500,
        'enemyhp' => 500,
        'enemyatt' => 100,
        'enemydef' => 50
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 25;			// enemy level
        $_SESSION['eBite'] = 1;		// enemy bites you, 2x pure attack damage
}
if ($enemy == 'King Squid') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 300");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 120");
    // $results = $link->query("UPDATE $user SET enemydef = 120");
    $updates = [ // -- set changes
        'enemyhpmax' => 300,
        'enemyhp' => 300,
        'enemyatt' => 120,
        'enemydef' => 120
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 40;			// enemy level
        $_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
        $_SESSION['eTripleHit'] = 1;	// enemy always hits 3 times
}
if ($enemy == 'Mud Crab') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 50");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 30");
    // $results = $link->query("UPDATE $user SET enemydef = 5");
    $updates = [ // -- set changes
        'enemyhpmax' => 50,
        'enemyhp' => 50,
        'enemyatt' => 30,
        'enemydef' => 5
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 11;			// enemy level
}
// ------------------------------------------------------------------------ UNDERWATER
if ($enemy == 'Giant Sea Turtle') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 400");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 35");
    // $results = $link->query("UPDATE $user SET enemydef = 5");
    $updates = [ // -- set changes
        'enemyhpmax' => 400,
        'enemyhp' => 400,
        'enemyatt' => 35,
        'enemydef' => 5
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 15;			// enemy level
        $_SESSION['eDexImm'] = 1;		// enemy dex immune
}
if ($enemy == 'Colossal Squid') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 600");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 45");
    // $results = $link->query("UPDATE $user SET enemydef = 5");
    $updates = [ // -- set changes
        'enemyhpmax' => 600,
        'enemyhp' => 600,
        'enemyatt' => 45,
        'enemydef' => 5
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 17;			// enemy level
        $_SESSION['eDexImm'] = 1;		// enemy dex immune
}
if ($enemy == 'Hammerhead') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 200");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 50");
    // $results = $link->query("UPDATE $user SET enemydef = 50");
    $updates = [ // -- set changes
        'enemyhpmax' => 200,
        'enemyhp' => 200,
        'enemyatt' => 50,
        'enemydef' => 50
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 20;			// enemy level
        $_SESSION['eDexImm'] = 1;		// enemy dex immune
        $_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
}
if ($enemy == 'Great White') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 250");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 60");
    // $results = $link->query("UPDATE $user SET enemydef = 40");
    $updates = [ // -- set changes
        'enemyhpmax' => 250,
        'enemyhp' => 250,
        'enemyatt' => 60,
        'enemydef' => 40
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 20;			// enemy level
        $_SESSION['eDexImm'] = 1;		// enemy dex immune
        $_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
}
if ($enemy == 'Kraken') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 400");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 80");
    // $results = $link->query("UPDATE $user SET enemydef = 40");
    $updates = [ // -- set changes
        'enemyhpmax' => 400,
        'enemyhp' => 400,
        'enemyatt' => 80,
        'enemydef' => 40
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 25;			// enemy level
        $_SESSION['eDexImm'] = 1;		// enemy dex immune
        $_SESSION['eDex'] = 1;			// enemy dex att, used your dex as def
        $_SESSION['eDodge'] = 1;		// enemy dodges LVL x 10%
        $_SESSION['eMulti'] = 6;		// enemy LVL * 10% chance attack again (1 - 10)
}
if ($enemy == 'Glowing Octopus') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 150");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 50");
    // $results = $link->query("UPDATE $user SET enemydef = 20");
    $updates = [ // -- set changes
        'enemyhpmax' => 150,
        'enemyhp' => 150,
        'enemyatt' => 50,
        'enemydef' => 20
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 20;			// enemy level
        $_SESSION['eDexImm'] = 1;		// enemy dex immune
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
}

if ($enemy == 'Thunder Barbarian') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 500");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 100");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 500,
        'enemyhp' => 500,
        'enemyatt' => 100,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 35;			// enemy level
        $_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack
        $_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
        $_SESSION['ePureD'] = 1;		// enemy has max defense
}
if ($enemy == 'Smooth Ranger') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 500");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 150");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 500,
        'enemyhp' => 500,
        'enemyatt' => 150,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 35;			// enemy level
        $_SESSION['eDex'] = 1;			// enemy dex att, uses your dex as def
        $_SESSION['eHeal'] = 1;		// enemy heals self
        $_SESSION['ePureD'] = 1;		// enemy has max defense
}
if ($enemy == 'Coral Wizard') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 500");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 200");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 500,
        'enemyhp' => 500,
        'enemyatt' => 200,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 35;			// enemy level
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
        $_SESSION['eMagImm'] = 1;		// enemy mag immune
        $_SESSION['ePureD'] = 1;		// enemy has max defense
}
if ($enemy == 'Heavy Walrus') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 500");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 150");
    // $results = $link->query("UPDATE $user SET enemydef = 150");
    $updates = [ // -- set changes
        'enemyhpmax' => 500,
        'enemyhp' => 500,
        'enemyatt' => 150,
        'enemydef' => 150
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 35;			// enemy level
        $_SESSION['eBite'] = 1;		//
        $_SESSION['ePureD'] = 1;		// enemy has max defense
}
if ($enemy == 'Water Temple Guardian') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 2000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 200");
    // $results = $link->query("UPDATE $user SET enemydef = 200");
    $updates = [ // -- set changes
        'enemyhpmax' => 2000,
        'enemyhp' => 2000,
        'enemyatt' => 200,
        'enemydef' => 200
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 50;			// enemy level
        $_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
        $_SESSION['ePureA'] = 1;		// enemy attacks pure, you have no def
        $_SESSION['ePureD'] = 1;		// enemy has max defense
}
if ($enemy == 'Poseidon') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1000000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 100000");
    // $results = $link->query("UPDATE $user SET enemydef = 100000");
    $updates = [ // -- set changes
        'enemyhpmax' => 1000000,
        'enemyhp' => 1000000,
        'enemyatt' => 100000,
        'enemydef' => 100000
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 500;			// enemy level
}




// ------------------------------------------------------------------------ NEVERENDING MINE
if ($enemy == 'Iron Rat') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 100");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 40");
    // $results = $link->query("UPDATE $user SET enemydef = 40");
    $updates = [ // -- set changes
        'enemyhpmax' => 100,
        'enemyhp' => 100,
        'enemyatt' => 40,
        'enemydef' => 40
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 15;			// enemy level
        $_SESSION['eBite'] = 1;		// enemy bites you, 2x pure attack damage
}
if ($enemy == 'Iron Crab') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 100");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 60");
    // $results = $link->query("UPDATE $user SET enemydef = 20");
    $updates = [ // -- set changes
        'enemyhpmax' => 100,
        'enemyhp' => 100,
        'enemyatt' => 60,
        'enemydef' => 20
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 15;			// enemy level
}
if ($enemy == 'Iron Scorpion') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 200");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 40");
    // $results = $link->query("UPDATE $user SET enemydef = 40");
    $updates = [ // -- set changes
        'enemyhpmax' => 200,
        'enemyhp' => 200,
        'enemyatt' => 40,
        'enemydef' => 40
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 20;			// enemy level
        $_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack
}
if ($enemy == 'War Turtle') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 800");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 80");
    // $results = $link->query("UPDATE $user SET enemydef = 60");
    $updates = [ // -- set changes
        'enemyhpmax' => 800,
        'enemyhp' => 800,
        'enemyatt' => 80,
        'enemydef' => 60
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 25;			// enemy level
        $_SESSION['eBite'] = 1;		// enemy bites you, 2x pure attack damage
        $_SESSION['eDexImm'] = 1;		// enemy dex immune
}
if ($enemy == 'Slag Beast') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 250");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 60");
    // $results = $link->query("UPDATE $user SET enemydef = 20");
    $updates = [ // -- set changes
        'enemyhpmax' => 250,
        'enemyhp' => 250,
        'enemyatt' => 60,
        'enemydef' => 20
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 25;			// enemy level
        $_SESSION['eMulti'] = 4;		// enemy LVL * 10% chance attack again (1 - 10)
}
if ($enemy == 'Iron Gator') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 500");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 90");
    // $results = $link->query("UPDATE $user SET enemydef = 0");
    $updates = [ // -- set changes
        'enemyhpmax' => 500,
        'enemyhp' => 500,
        'enemyatt' => 90,
        'enemydef' => 0
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 25;			// enemy level
}
if ($enemy == 'Iron Golem') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 250");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 90");
    // $results = $link->query("UPDATE $user SET enemydef = 80");
    $updates = [ // -- set changes
        'enemyhpmax' => 250,
        'enemyhp' => 250,
        'enemyatt' => 90,
        'enemydef' => 80
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 25;			// enemy level
}
if ($enemy == 'Phoenix') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 500");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 100");
    // $results = $link->query("UPDATE $user SET enemydef = 50");
    $updates = [ // -- set changes
        'enemyhpmax' => 500,
        'enemyhp' => 500,
        'enemyatt' => 100,
        'enemydef' => 50
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 30;			// enemy level
        $_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
        $_SESSION['eMulti'] = 3;		// enemy LVL * 10% chance attack again (1 - 10)
}
if ($enemy == 'Iron Cobra') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 200");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 100");
    // $results = $link->query("UPDATE $user SET enemydef = 80");
    $updates = [ // -- set changes
        'enemyhpmax' => 200,
        'enemyhp' => 200,
        'enemyatt' => 100,
        'enemydef' => 80
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 30;			// enemy level
        $_SESSION['eDex'] = 1;			// enemy dex att, uses your dex as def
        $_SESSION['ePoison'] = 2;		// enemy poisons you (1) 1 - lvl/2  (2) 1-lvl
}
if ($enemy == 'Earth Golem') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 400");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 100");
    // $results = $link->query("UPDATE $user SET enemydef = 120");
    $updates = [ // -- set changes
        'enemyhpmax' => 400,
        'enemyhp' => 400,
        'enemyatt' => 100,
        'enemydef' => 120
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 30;			// enemy level
        $_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
}


if ($enemy == 'Steel Rat') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 400");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 60");
    // $results = $link->query("UPDATE $user SET enemydef = 60");
    $updates = [ // -- set changes
        'enemyhpmax' => 400,
        'enemyhp' => 400,
        'enemyatt' => 100,
        'enemydef' => 120
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 20;			// enemy level
        $_SESSION['eBite'] = 1;		// enemy bites you, 2x pure attack damage
}
if ($enemy == 'Steel Crab') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 400");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 80");
    // $results = $link->query("UPDATE $user SET enemydef = 40");
    $updates = [ // -- set changes
        'enemyhpmax' => 400,
        'enemyhp' => 400,
        'enemyatt' => 80,
        'enemydef' => 40
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 20;			// enemy level
}
if ($enemy == 'Steel Scorpion') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 500");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 60");
    // $results = $link->query("UPDATE $user SET enemydef = 60");
    $updates = [ // -- set changes
        'enemyhpmax' => 500,
        'enemyhp' => 500,
        'enemyatt' => 60,
        'enemydef' => 60
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 25;			// enemy level
        $_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack
}
if ($enemy == 'Ulfberht') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 800");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 120");
    // $results = $link->query("UPDATE $user SET enemydef = 120");
    $updates = [ // -- set changes
        'enemyhpmax' => 800,
        'enemyhp' => 800,
        'enemyatt' => 120,
        'enemydef' => 120
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 35;			// enemy level
        $_SESSION['notthe'] = 1;		// make 1 when enemy doesn't have THE (ex. diablo)
        $_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
        $_SESSION['eBlock'] = 1;		// block all damage, 1/5 chance
}
if ($enemy == 'Black Frog') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 600");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 100");
    // $results = $link->query("UPDATE $user SET enemydef = 40");
    $updates = [ // -- set changes
        'enemyhpmax' => 600,
        'enemyhp' => 600,
        'enemyatt' => 100,
        'enemydef' => 40
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 30;			// enemy level
        $_SESSION['eStrImm'] = 0;		// enemy str immune
}
if ($enemy == 'Steel Gator') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 800");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 120");
    // $results = $link->query("UPDATE $user SET enemydef = 0");
    $updates = [ // -- set changes
        'enemyhpmax' => 800,
        'enemyhp' => 800,
        'enemyatt' => 120,
        'enemydef' => 0
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 35;			// enemy level
}
if ($enemy == 'Steel Golem') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 600");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 140");
    // $results = $link->query("UPDATE $user SET enemydef = 140");
    $updates = [ // -- set changes
        'enemyhpmax' => 600,
        'enemyhp' => 600,
        'enemyatt' => 140,
        'enemydef' => 140
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 35;			// enemy level
}
if ($enemy == 'Cyclops') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 150");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 1000,
        'enemyhp' => 1000,
        'enemyatt' => 150,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 40;			// enemy level
        $_SESSION['ePureA'] = 1;		// enemy attacks pure, you have no def
}
if ($enemy == 'Stone Assassin') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 500");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 200");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 500,
        'enemyhp' => 500,
        'enemyatt' => 200,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 40;			// enemy level
        $_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack
}
if ($enemy == 'Gamma Monk') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 400");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 200");
    // $results = $link->query("UPDATE $user SET enemydef = 200");
    $updates = [ // -- set changes
        'enemyhpmax' => 400,
        'enemyhp' => 400,
        'enemyatt' => 200,
        'enemydef' => 200
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 40;			// enemy level
        $_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
        $_SESSION['eHeal'] = 1;		// enemy heals self
}






if ($enemy == 'Mithril Rat') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 800");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 150");
    // $results = $link->query("UPDATE $user SET enemydef = 80");
    $updates = [ // -- set changes
        'enemyhpmax' => 800,
        'enemyhp' => 800,
        'enemyatt' => 150,
        'enemydef' => 80
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 30;			// enemy level
        $_SESSION['eBite'] = 1;		// enemy bites you, 2x pure attack damage
}
if ($enemy == 'Mithril Crab') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 800");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 200");
    // $results = $link->query("UPDATE $user SET enemydef = 60");
    $updates = [ // -- set changes
        'enemyhpmax' => 800,
        'enemyhp' => 800,
        'enemyatt' => 200,
        'enemydef' => 60
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 30;			// enemy level
}
if ($enemy == 'Mithril Scorpion') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 150");
    // $results = $link->query("UPDATE $user SET enemydef = 80");
    $updates = [ // -- set changes
        'enemyhpmax' => 1000,
        'enemyhp' => 1000,
        'enemyatt' => 150,
        'enemydef' => 80
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 40;			// enemy level
        $_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack
}
if ($enemy == 'Griffin') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1500");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 250");
    // $results = $link->query("UPDATE $user SET enemydef = 150");
    $updates = [ // -- set changes
        'enemyhpmax' => 1500,
        'enemyhp' => 1500,
        'enemyatt' => 250,
        'enemydef' => 150
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 50;			// enemy level
       $_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
       $_SESSION['eMulti'] = 3;		// enemy LVL * 10% chance attack again (1 - 10)
       $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
       $_SESSION['eStrImm'] = 1;		// enemy str immune
}
if ($enemy == 'Blue Frog') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 200");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 1000,
        'enemyhp' => 1000,
        'enemyatt' => 200,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 30;			// enemy level
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
        $_SESSION['eMagImm'] = 1;		// enemy mag immune
        $_SESSION['eHeal'] = 1;		// enemy heals self
}
if ($enemy == 'Mithril Gator') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1200");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 250");
    // $results = $link->query("UPDATE $user SET enemydef = 0");
    $updates = [ // -- set changes
        'enemyhpmax' => 1200,
        'enemyhp' => 1200,
        'enemyatt' => 250,
        'enemydef' => 0
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 45;			// enemy level
}
if ($enemy == 'Mithril Golem') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 900");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 300");
    // $results = $link->query("UPDATE $user SET enemydef = 300");
    $updates = [ // -- set changes
        'enemyhpmax' => 900,
        'enemyhp' => 900,
        'enemyatt' => 300,
        'enemydef' => 300
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 55;			// enemy level
}
if ($enemy == 'Minotaur') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 3000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 350");
    // $results = $link->query("UPDATE $user SET enemydef = 150");
    $updates = [ // -- set changes
        'enemyhpmax' => 3000,
        'enemyhp' => 3000,
        'enemyatt' => 350,
        'enemydef' => 150
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 60;			// enemy level
    $_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att					((1-att)*3)
    $_SESSION['eRage'] = 1;		// enemy rage attack, 1/5 chance to do 2-4 pure hit combo	(200%, 300% or 400% pure damage)
}
if ($enemy == 'Cosmic Mage') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 400");
    // $results = $link->query("UPDATE $user SET enemydef = 50");
    $updates = [ // -- set changes
        'enemyhpmax' => 1000,
        'enemyhp' => 1000,
        'enemyatt' => 400,
        'enemydef' => 50
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 60;			// enemy level
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
        $_SESSION['eMagImm'] = 1;		// enemy mag immune
}
if ($enemy == 'Carbon Beast') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 800");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 500");
    // $results = $link->query("UPDATE $user SET enemydef = 0");
    $updates = [ // -- set changes
        'enemyhpmax' => 800,
        'enemyhp' => 800,
        'enemyatt' => 500,
        'enemydef' => 0
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 60;			// enemy level
        $_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
        $_SESSION['eDodge'] = 2;		// enemy dodges LVL x 10%
}





// --
// --
// --
// --

// ------------------------------------------------------------------------ NEVERENDING MINE / END
if ($enemy == 'Earth Giant') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 40000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 40000");
    // $results = $link->query("UPDATE $user SET enemydef = 20000");
    $updates = [ // -- set changes
        'enemyhpmax' => 40000,
        'enemyhp' => 40000,
        'enemyatt' => 40000,
        'enemydef' => 20000
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 150;			// enemy level
        $_SESSION['ePow'] = 1;			// enemy power x3 att
}
// ------------------------------------------------------------------------
if ($enemy == 'God of Earth') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1000000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 120000");
    // $results = $link->query("UPDATE $user SET enemydef = 100000");
    $updates = [ // -- set changes
        'enemyhpmax' => 1000000,
        'enemyhp' => 1000000,
        'enemyatt' => 120000,
        'enemydef' => 100000
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 500;			// enemy level
        $_SESSION['ePow'] = 1;			// enemy power x3 att
}

// --
// --
// --
// --

// ------------------------------------------------------------------------ DF Mountain Path
if ($enemy == 'Bowman') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 300");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 60");
    // $results = $link->query("UPDATE $user SET enemydef = 40");
    $updates = [ // -- set changes
        'enemyhpmax' => 300,
        'enemyhp' => 300,
        'enemyatt' => 60,
        'enemydef' => 40
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 23;			// enemy level
        $_SESSION['eDex'] = 1;			// enemy dex att, uses your dex as def
        $_SESSION['eMulti'] = 2;		// enemy LVL * 10% chance attack again (1 - 10)}
}
if ($enemy == 'Highwayman') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 400");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 60");
    // $results = $link->query("UPDATE $user SET enemydef = 40");
    $updates = [ // -- set changes
        'enemyhpmax' => 400,
        'enemyhp' => 400,
        'enemyatt' => 60,
        'enemydef' => 40
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 25;			// enemy level
        $_SESSION['ePureA'] = 1;		// enemy attacks pure, you have no def
        $_SESSION['eSteal'] = 1;		// enemy steals 20% [ 1 - attack ] coin
}


// ------------------------------------------------------------------------ DARK FOREST
if ($enemy == 'Troll') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 120");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 30");
    // $results = $link->query("UPDATE $user SET enemydef = 15");
    $updates = [ // -- set changes
        'enemyhpmax' => 120,
        'enemyhp' => 120,
        'enemyatt' => 30,
        'enemydef' => 15
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 13;			// enemy level
        $_SESSION['ePow'] = 1;			// enemy power x3 att
}
if ($enemy == 'Troll Shaman') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 150");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 70");
    // $results = $link->query("UPDATE $user SET enemydef = 30");
    $updates = [ // -- set changes
        'enemyhpmax' => 150,
        'enemyhp' => 150,
        'enemyatt' => 70,
        'enemydef' => 30
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 20;			// enemy level
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
        $_SESSION['eHeal'] = 1;		// enemy heals self
}
if ($enemy == 'Troll Sorcerer') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 300");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 70");
    // $results = $link->query("UPDATE $user SET enemydef = 30");
    $updates = [ // -- set changes
        'enemyhpmax' => 300,
        'enemyhp' => 300,
        'enemyatt' => 70,
        'enemydef' => 30
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 25;			// enemy level
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
        $_SESSION['ePoison'] = 1;		// enemy poisons you (1) 1 - lvl/2  (2) 1-lvl
        $_SESSION['eMulti'] = 4;		// enemy LVL * 10% chance attack again (1 - 10)
}
if ($enemy == 'Troll Elder') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 400");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 90");
    // $results = $link->query("UPDATE $user SET enemydef = 30");
    $updates = [ // -- set changes
        'enemyhpmax' => 400,
        'enemyhp' => 400,
        'enemyatt' => 90,
        'enemydef' => 30
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 30;			// enemy level
        $_SESSION['ePow'] = 1;			// enemy power x3 att
}
if ($enemy == 'Troll Champion') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 500");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 100");
    // $results = $link->query("UPDATE $user SET enemydef = 10");
    $updates = [ // -- set changes
        'enemyhpmax' => 500,
        'enemyhp' => 500,
        'enemyatt' => 100,
        'enemydef' => 10
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 35;			// enemy level
        $_SESSION['eRage'] = 1;		// enemy rage attack, 1/5 chance to do 2-4 pure hit combo (200% - 400% damage)
}
if ($enemy == 'Troll Queen') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 700");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 140");
    // $results = $link->query("UPDATE $user SET enemydef = 70");
    $updates = [ // -- set changes
        'enemyhpmax' => 700,
        'enemyhp' => 700,
        'enemyatt' => 140,
        'enemydef' => 70
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 40;			// enemy level
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
        $_SESSION['eStrImm'] = 1;		// enemy str immune
        $_SESSION['eDexImm'] = 1;		// enemy dex immune
        $_SESSION['eMulti'] = 4;		// enemy LVL * 10% chance attack again (1 - 10)
}
if ($enemy == 'Troll King') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 800");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 160");
    // $results = $link->query("UPDATE $user SET enemydef = 80");
    $updates = [ // -- set changes
        'enemyhpmax' => 800,
        'enemyhp' => 800,
        'enemyatt' => 160,
        'enemydef' => 80
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 45;			// enemy level
        $_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack
        $_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
        $_SESSION['eBite'] = 1;		// enemy bites you, 2x pure attack damage
        $_SESSION['eDoubleHit'] = 1;	// enemy always hits 2 times
}

if ($enemy == 'Falcon') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 200");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 100");
    // $results = $link->query("UPDATE $user SET enemydef = 20");
    $updates = [ // -- set changes
        'enemyhpmax' => 200,
        'enemyhp' => 200,
        'enemyatt' => 100,
        'enemydef' => 20
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 25;			// enemy level
        $_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
}
if ($enemy == 'Ent') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 400");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 100");
    // $results = $link->query("UPDATE $user SET enemydef = 70");
    $updates = [ // -- set changes
        'enemyhpmax' => 400,
        'enemyhp' => 400,
        'enemyatt' => 100,
        'enemydef' => 70
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 30;			// enemy level
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
        $_SESSION['eMagImm'] = 1;		// enemy mag immune
}
if ($enemy == 'Dark Ranger') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 400");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 100");
    // $results = $link->query("UPDATE $user SET enemydef = 20");
    $updates = [ // -- set changes
        'enemyhpmax' => 400,
        'enemyhp' => 400,
        'enemyatt' => 100,
        'enemydef' => 70
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 30;			// enemy level
        $_SESSION['eDex'] = 1;			// enemy dex att, uses your dex as def
        $_SESSION['eDexImm'] = 1;		// enemy dex immune
}
if ($enemy == 'Wisp') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 500");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 150");
    // $results = $link->query("UPDATE $user SET enemydef = 50");
    $updates = [ // -- set changes
        'enemyhpmax' => 500,
        'enemyhp' => 500,
        'enemyatt' => 150,
        'enemydef' => 50
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 40;			// enemy level
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
        $_SESSION['eDodge'] = 5;		// enemy dodges LVL x 10%
}



// ------------------------------------------------------------------------ DARK KEEP
if ($enemy == 'Lurker') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 800");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 100");
    // $results = $link->query("UPDATE $user SET enemydef = 80");
    $updates = [ // -- set changes
        'enemyhpmax' => 800,
        'enemyhp' => 800,
        'enemyatt' => 100,
        'enemydef' => 80
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 30;			// enemy level
        $_SESSION['ePoison'] = 1;		// enemy poisons you (1) 1 - lvl/2  (2) 1-lvl
}
if ($enemy == 'Winged Demon') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 100");
    // $results = $link->query("UPDATE $user SET enemydef = 120");
    $updates = [ // -- set changes
        'enemyhpmax' => 1000,
        'enemyhp' => 1000,
        'enemyatt' => 150,
        'enemydef' => 50
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 35;			// enemy level
        $_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
}
if ($enemy == 'Undead Orc') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 150");
    // $results = $link->query("UPDATE $user SET enemydef = 150");
    $updates = [ // -- set changes
        'enemyhpmax' => 1000,
        'enemyhp' => 1000,
        'enemyatt' => 150,
        'enemydef' => 150
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 45;			// enemy level
        $_SESSION['eDex'] = 1;			// enemy dex att, uses your dex as def
        $_SESSION['eMulti'] = 3;		// enemy LVL * 10% chance attack again (1 - 10)
}
if ($enemy == 'Stone Sphinx') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 2000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 150");
    // $results = $link->query("UPDATE $user SET enemydef = 150");
    $updates = [ // -- set changes
        'enemyhpmax' => 2000,
        'enemyhp' => 2000,
        'enemyatt' => 150,
        'enemydef' => 150
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 50;			// enemy level
        $_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att					((1-att)*3)
        $_SESSION['eDexImm'] = 1;		// enemy dex immune
        $_SESSION['eMagImm'] = 1;		// enemy mag immune
}
if ($enemy == 'Warped Priest') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 200");
    // $results = $link->query("UPDATE $user SET enemydef = 150");
    $updates = [ // -- set changes
        'enemyhpmax' => 1000,
        'enemyhp' => 1000,
        'enemyatt' => 200,
        'enemydef' => 150
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 55;			// enemy level
        $_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
        $_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack			((1-att)*10)
}
if ($enemy == 'Dark Paladin') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1500");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 250");
    // $results = $link->query("UPDATE $user SET enemydef = 200");
    $updates = [ // -- set changes
        'enemyhpmax' => 1500,
        'enemyhp' => 1500,
        'enemyatt' => 250,
        'enemydef' => 200
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 55;			// enemy level
        $_SESSION['eHeal'] = 1;		// enemy heals self
}
if ($enemy == 'Dark Prince') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 3000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 300");
    // $results = $link->query("UPDATE $user SET enemydef = 300");
    $updates = [ // -- set changes
        'enemyhpmax' => 3000,
        'enemyhp' => 3000,
        'enemyatt' => 300,
        'enemydef' => 300
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 60;			// enemy level
        $_SESSION['eMulti'] = 5;		// enemy LVL * 10% chance attack again (1 - 10)
        $_SESSION['eDrainMP'] = 1;		// enemy drains MP (1) 1 - lvl/2  (2) 1-lvl
}


if ($enemy == 'Forest Princess') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 10000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 300");
    // $results = $link->query("UPDATE $user SET enemydef = 300");
    $updates = [ // -- set changes
        'enemyhpmax' => 10000,
        'enemyhp' => 10000,
        'enemyatt' => 300,
        'enemydef' => 300
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 80;			// enemy level
        $_SESSION['ePureA'] = 1;		// enemy attacks pure, you have no def
        $_SESSION['ePureD'] = 1;		// enemy has max defense
        $_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack			((1-att)*10)
}




// ------------------------------------------------------------------------ MOUNTAINS
if ($enemy == 'Friendly Giant') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 500");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 100");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 500,
        'enemyhp' => 500,
        'enemyatt' => 100,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 30;			// enemy level
}
if ($enemy == 'Mountain Giant') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 100");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 1000,
        'enemyhp' => 1000,
        'enemyatt' => 100,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 30;			// enemy level
}
if ($enemy == 'Ice Troll') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 800");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 80");
    // $results = $link->query("UPDATE $user SET enemydef = 80");
    $updates = [ // -- set changes
        'enemyhpmax' => 800,
        'enemyhp' => 800,
        'enemyatt' => 80,
        'enemydef' => 80
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 30;			// enemy level
        $_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att					((1-att)*3)
        $_SESSION['eBite'] = 1;		// enemy bites you, 2x pure attack damage					(200% pure damage)
}
if ($enemy == 'Giant Brute') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1200");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 150");
    // $results = $link->query("UPDATE $user SET enemydef = 20");
    $updates = [ // -- set changes
        'enemyhpmax' => 1200,
        'enemyhp' => 1200,
        'enemyatt' => 150,
        'enemydef' => 20
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 35;			// enemy level
        $_SESSION['eSteal'] = 1;		// enemy steals 20% [ 1 - attack ] coin
}
if ($enemy == 'Wyvern') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 800");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 120");
    // $results = $link->query("UPDATE $user SET enemydef = 80");
    $updates = [ // -- set changes
        'enemyhpmax' => 800,
        'enemyhp' => 800,
        'enemyatt' => 120,
        'enemydef' => 80
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 35;			// enemy level
        $_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
}
if ($enemy == 'Stone Dwarf') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 800");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 120");
    // $results = $link->query("UPDATE $user SET enemydef = 200");
    $updates = [ // -- set changes
        'enemyhpmax' => 800,
        'enemyhp' => 800,
        'enemyatt' => 120,
        'enemydef' => 200
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 40;			// enemy level
        $_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att					((1-att)*3)
        $_SESSION['eBlock'] = 1;			// block all damage, 1/5 chance
}
if ($enemy == 'Giant Mountain Giant') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 6000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 300");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 6000,
        'enemyhp' => 6000,
        'enemyatt' => 300,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 50;			// enemy level
}
if ($enemy == 'Gatekeeper') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 4000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 200");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 4000,
        'enemyhp' => 4000,
        'enemyatt' => 200,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 60;			// enemy level
        $_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack			((1-att)*10)
        $_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att					((1-att)*3)
        $_SESSION['eAssassinate'] = 1;		// NEW!!!! - 1/4 chance to do 50 times damage, first strike
}
if ($enemy == 'Yeti') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 2000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 200");
    // $results = $link->query("UPDATE $user SET enemydef = 80");
    $updates = [ // -- set changes
        'enemyhpmax' => 2000,
        'enemyhp' => 2000,
        'enemyatt' => 200,
        'enemydef' => 80
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 45;			// enemy level
            $_SESSION['eMagImm'] = 0;		// enemy mag immune
}
if ($enemy == 'Snow Ogre') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1500");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 200");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 1500,
        'enemyhp' => 1500,
        'enemyatt' => 200,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 50;			// enemy level
            $_SESSION['eRage'] = 1;		// enemy rage attack, 1/5 chance to do 2-4 pure hit combo	(200%, 300% or 400% pure damage)
}
if ($enemy == 'Snow Ninja') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1200");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 200");
    // $results = $link->query("UPDATE $user SET enemydef = 150");
    $updates = [ // -- set changes
        'enemyhpmax' => 1200,
        'enemyhp' => 1200,
        'enemyatt' => 200,
        'enemydef' => 150
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 50;			// enemy level
            $_SESSION['eAssassinate'] = 1;		// NEW!!!! - 1/4 chance to do 50 times damage, first strike
            $_SESSION['ePoison'] = 2;		// enemy poisons you (1) 1 - lvl/2  (2) 1-lvl
}
if ($enemy == 'Snow Owl') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 250");
    // $results = $link->query("UPDATE $user SET enemydef = 50");
    $updates = [ // -- set changes
        'enemyhpmax' => 1000,
        'enemyhp' => 1000,
        'enemyatt' => 250,
        'enemydef' => 50
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 50;			    // enemy level
            $_SESSION['eFly'] = 1;		// enemy flies, need ranged weapon
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
        $_SESSION['eHeal'] = 1;		    // enemy heals self
}
if ($enemy == 'Dragon') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 2500");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 250");
    // $results = $link->query("UPDATE $user SET enemydef = 250");
    $updates = [ // -- set changes
        'enemyhpmax' => 2500,
        'enemyhp' => 2500,
        'enemyatt' => 250,
        'enemydef' => 250
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 60;			    // enemy level
            $_SESSION['eFly'] = 1;		// enemy flies, need ranged weapon
        $_SESSION['eDragonFire'] = 1;	// dragon fire = pure attack (no def ) + multi attack (3-5 times) --- 1/4 chance // 50% chance to catch on fire(1-damage). when on fire, burn forever for that dam. need to use water to cure on fire
}

// ------------------------------------------------------------------------ MOUNTAIN CATHEDRAL
if ($enemy == 'Grey Gargoyle') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 800");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 200");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 800,
        'enemyhp' => 800,
        'enemyatt' => 200,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 40;			// enemy level
            $_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
}
if ($enemy == 'White Gargoyle') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 600");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 250");
    // $results = $link->query("UPDATE $user SET enemydef = 150");
    $updates = [ // -- set changes
        'enemyhpmax' => 600,
        'enemyhp' => 600,
        'enemyatt' => 250,
        'enemydef' => 150
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 45;			// enemy level
            $_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
            $_SESSION['eHeal'] = 1;			// enemy heals self
}
if ($enemy == 'Vampire') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 800");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 250");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 800,
        'enemyhp' => 800,
        'enemyatt' => 250,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 45;			// enemy level
            $_SESSION['eDrainHP'] = 2;		// enemy drains HP (1) 1 - lvl/2  (2) 1-lvl !! not in use yet
            $_SESSION['ePoison'] = 2;		// enemy poisons you (1) 1 - lvl/2  (2) 1-lvl

}
if ($enemy == 'Fallen Priest') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 2000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 250");
    // $results = $link->query("UPDATE $user SET enemydef = 150");
    $updates = [ // -- set changes
        'enemyhpmax' => 2000,
        'enemyhp' => 2000,
        'enemyatt' => 250,
        'enemydef' => 150
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 50;			// enemy level
            $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
            $_SESSION['eHeal'] = 1;			// enemy heals self
}
if ($enemy == 'Fallen Angel') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 4000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 400");
    // $results = $link->query("UPDATE $user SET enemydef = 200");
    $updates = [ // -- set changes
        'enemyhpmax' => 4000,
        'enemyhp' => 4000,
        'enemyatt' => 400,
        'enemydef' => 200
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 60;			// enemy level
            $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
            $_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
            $_SESSION['ePoison'] = 2;		// enemy poisons you (1) 1 - lvl/2  (2) 1-lvl
}
if ($enemy == 'Risen Skeleton') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 700");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 150");
    // $results = $link->query("UPDATE $user SET enemydef = 80");
    $updates = [ // -- set changes
        'enemyhpmax' => 700,
        'enemyhp' => 700,
        'enemyatt' => 150,
        'enemydef' => 80
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 30;			// enemy level
            $_SESSION['eResurrect'] = 20;		// # percent chance to ressurect after enemy dies
}

// ------------------------------------------------------------------------ MOUNTAIN XTRA
if ($enemy == 'Jiemji') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 6000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 300");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 6000,
        'enemyhp' => 6000,
        'enemyatt' => 300,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 70;			// enemy level
        $_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack			((1-att)*10)
        $_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att					((1-att)*3)
        $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
        $_SESSION['notthe'] = 1;		// make 1 when enemy doesn't have THE (ex. diablo)
}
if ($enemy == 'Jikay') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 4000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 200");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 4000,
        'enemyhp' => 4000,
        'enemyatt' => 200,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 70;			// enemy level
        $_SESSION['eMulti'] = 7;		// enemy LVL * 10% chance attack again (1 - 10)
        $_SESSION['ePureA'] = 1;		// enemy attacks pure, you have no def
        $_SESSION['notthe'] = 1;		// make 1 when enemy doesn't have THE (ex. diablo)
}
if ($enemy == 'King Blade') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 10000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 1200");
    // $results = $link->query("UPDATE $user SET enemydef = 600");
    $updates = [ // -- set changes
        'enemyhpmax' => 10000,
        'enemyhp' => 10000,
        'enemyatt' => 1200,
        'enemydef' => 600
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 90;			// enemy level
        $_SESSION['eMulti'] = 2;		// enemy LVL * 10% chance attack again (1 - 10)
        $_SESSION['eRage'] = 1;		// enemy rage attack, 1/5 chance to do 2-4 pure hit combo	(200%, 300% or 400% pure damage)
        $_SESSION['eWhirlwind'] = 1;	//  
        $_SESSION['notthe'] = 1;		// make 1 when enemy doesn't have THE (ex. diablo)
}




// --------------------------------------------------------------  Silver Titan
if ($enemy == 'Silver Titan') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 9000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 900");
    // $results = $link->query("UPDATE $user SET enemydef = 900");
    $updates = [ // -- set changes
        'enemyhpmax' => 9000,
        'enemyhp' => 9000,
        'enemyatt' => 900,
        'enemydef' => 900
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 90;			// enemy level
    $_SESSION['eWhirlwind'] = 1;	//  

}




// ------------------------------------------------------------------------ THE DESPAIR


if ($enemy == 'Hydra') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 2000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 200");
    // $results = $link->query("UPDATE $user SET enemydef = 200");
    $updates = [ // -- set changes
        'enemyhpmax' => 2000,
        'enemyhp' => 2000,
        'enemyatt' => 200,
        'enemydef' => 200
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 50;			// enemy level
    $_SESSION['eMulti'] = 3;		// enemy LVL * 10% chance attack again (1 - 10)
}

if ($enemy == 'Brownie') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 200");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 1000,
        'enemyhp' => 1000,
        'enemyatt' => 200,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 50;			// enemy level
    $_SESSION['eBite'] = 1;		    // enemy - 2x pure damage, 1/5 chance		(200% pure damage)          // BITE
    $_SESSION['eStrImm'] = 1;		// enemy str immune
}
if ($enemy == 'Harpy') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 300");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 1000,
        'enemyhp' => 1000,
        'enemyatt' => 300,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 50;			// enemy level
    $_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon or magic
    $_SESSION['eDex'] = 1;			// enemy dex att, uses your dex as def
    $_SESSION['eMagImm'] = 1;		// enemy mag immune
    $_SESSION['ePoison'] = 1;		// enemy poisons you (1) 1 - lvl/2  (2) 1-lvl
}
if ($enemy == 'Gorgon') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 400");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 1000,
        'enemyhp' => 1000,
        'enemyatt' => 400,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 60;			// enemy level
    $_SESSION['eTripleHit'] = 1;	// enemy always hits 3 times
}
if ($enemy == 'Banshee') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 2000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 700");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 2000,
        'enemyhp' => 2000,
        'enemyatt' => 700,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 60;			// enemy level
    $_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon or magic
    $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
    $_SESSION['eMagImm'] = 1;		// enemy mag immune
    $_SESSION['eDodge'] = 3;		// enemy dodges LVL x 10%
}
if ($enemy == 'Succubus') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 3000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 600");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 3000,
        'enemyhp' => 3000,
        'enemyatt' => 600,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 70;			// enemy level
    $_SESSION['ePoison'] = 2;		// enemy poisons you (1) 1 - lvl/2  (2) 1-lvl
}

if ($enemy == 'Magma Goblin') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 2000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 200");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 2000,
        'enemyhp' => 2000,
        'enemyatt' => 200,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 50;			// enemy level
    $_SESSION['eMulti'] = 4;		// enemy LVL * 10% chance attack again (1 - 10)
}
if ($enemy == 'Magma Kobold') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 2000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 300");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 2000,
        'enemyhp' => 2000,
        'enemyatt' => 300,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 60;			// enemy level
    $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
    $_SESSION['eMagImm'] = 1;		// enemy mag immune
    }
if ($enemy == 'Magma Orc') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 3000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 400");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 3000,
        'enemyhp' => 3000,
        'enemyatt' => 400,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 60;			// enemy level
    $_SESSION['eDoubleHit'] = 1;	// enemy always hits 2 times
    $_SESSION['eDex'] = 1;			// enemy dex att, uses your dex as def
    }    
if ($enemy == 'Magma Ogre') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 3000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 500");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 3000,
        'enemyhp' => 3000,
        'enemyatt' => 500,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 70;			// enemy level
    $_SESSION['eRage'] = 1;	    	// enemy - 2-4x pure hit, 1/5 chance 	    (200%, 300% or 400% pure)   // RAGE
    }
if ($enemy == 'Magma Troll') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 4000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 600");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 4000,
        'enemyhp' => 4000,
        'enemyatt' => 600,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 70;			// enemy level
    $_SESSION['ePow'] = 1;			// enemy - 3x damage, 1/3 chance			((1-att)*3)                 // POWER
    $_SESSION['eDexImm'] = 1;		// enemy dex immune
}
if ($enemy == 'Chimera') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 8000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 600");
    // $results = $link->query("UPDATE $user SET enemydef = 300");
    $updates = [ // -- set changes
        'enemyhpmax' => 8000,
        'enemyhp' => 8000,
        'enemyatt' => 600,
        'enemydef' => 300
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 80;			// enemy level
    $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
    $_SESSION['eStrImm'] = 1;		// enemy str immune
    $_SESSION['eMagImm'] = 1;		// enemy mag immune
}   
if ($enemy == 'Basilisk') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 8000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 600");
    // $results = $link->query("UPDATE $user SET enemydef = 300");
    $updates = [ // -- set changes
        'enemyhpmax' => 8000,
        'enemyhp' => 8000,
        'enemyatt' => 600,
        'enemydef' => 300
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 80;			// enemy level
    $_SESSION['ePoison'] = 2;		// enemy poisons you (1) 1 - lvl/2  (2) 1-lvl
    $_SESSION['eBite'] = 1;		    // enemy - 2x pure damage, 1/5 chance		(200% pure damage)          // BITE
    $_SESSION['eDodge'] = 2;		// enemy dodges LVL x 10%
}
if ($enemy == 'Cerberus') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 8000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 600");
    // $results = $link->query("UPDATE $user SET enemydef = 300");
    $updates = [ // -- set changes
        'enemyhpmax' => 8000,
        'enemyhp' => 8000,
        'enemyatt' => 600,
        'enemydef' => 300
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 80;			// enemy level
    $_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
    $_SESSION['eTripleHit'] = 1;	// enemy always hits 3 times
}
if ($enemy == 'Manticore') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 8000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 600");
    // $results = $link->query("UPDATE $user SET enemydef = 300");
    $updates = [ // -- set changes
        'enemyhpmax' => 8000,
        'enemyhp' => 8000,
        'enemyatt' => 600,
        'enemydef' => 300
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 80;			// enemy level
    $_SESSION['eCrit'] = 1;	    	// enemy - 10x damage, 1/10 chance  		((1-att)*10)                // CRITICAL
}  
if ($enemy == 'Medusa') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 8000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 600");
    // $results = $link->query("UPDATE $user SET enemydef = 300");
    $updates = [ // -- set changes
        'enemyhpmax' => 8000,
        'enemyhp' => 8000,
        'enemyatt' => 600,
        'enemydef' => 300
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 80;			// enemy level
    $_SESSION['eTripleHit'] = 1;	// enemy always hits 3 times
    $_SESSION['eDodge'] = 2;		// enemy dodges LVL x 10%
}  
if ($enemy == 'Skeleton King') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 20000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 1000");
    // $results = $link->query("UPDATE $user SET enemydef = 500");
    $updates = [ // -- set changes
        'enemyhpmax' => 20000,
        'enemyhp' => 20000,
        'enemyatt' => 1000,
        'enemydef' => 500
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 100;			// enemy level
    $_SESSION['eRage'] = 1;	    	// enemy - 2-4x pure hit, 1/5 chance 	    (200%, 300% or 400% pure)   // RAGE
    $_SESSION['eWhirlwind'] = 1;	// enemy - 6x damage, 1/4 chance	        (1-(att*6) damage)          // WHIRLWIND
}  





// ------------------------------------------------------------------------ SWAMP


// --------------------------------------------------------------  Bull Frog
if ($enemy == 'Bull Frog') {
    // $results = $link->query("UPDATE $user SET enemyhpmax = 1000");
    // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
    // $results = $link->query("UPDATE $user SET enemyatt = 200");
    // $results = $link->query("UPDATE $user SET enemydef = 100");
    $updates = [ // -- set changes
        'enemyhpmax' => 1000,
        'enemyhp' => 1000,
        'enemyatt' => 200,
        'enemydef' => 100
    ]; 
    updateStats($link, $username, $updates); // -- apply changes
    $_SESSION['eLvl'] = 40;			// enemy level
}





//// $results = $link->query("UPDATE $user SET infight = 1"); 	// INFIGHT!!!!!

$updates = [ // -- set changes
    'infight' => 1
]; 
updateStats($link, $username, $updates); // -- apply changes


