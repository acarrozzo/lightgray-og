<?php
// -- ---------------------------------  BATTLE !!!!!!!!!!!!!!!!!!!!!

    // ---------------------------------------------------------------BATTLE BOX
    // ---------------------------------------------------------------BATTLE BOX
    // ---------------------------------------------------------------BATTLE BOX
    //if ($enemyhp >= 0){
    $message="<div class='battleFrame'>
    <div class='battleBox'>";
    include('update_feed_alt.php'); // --- update feed
//	}


// -------------------------DB CONNECT!
include('db-connect.php');
    // -------------------------DB QUERY!
$stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();
if (!$result) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {
    $enemy=$row['enemy'];     // enemy Stats
    if ($infight == 0) {
        include('battle-initialize.php');
    }
}
// -------------------------DB QUERY!
$stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();
if (!$result) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {
    $username=$row['username'];

    //$currency = $_SESSION['currency'];
    $currency = $row['currency'];
    $xp=$row['xp'];
    $level=$row['level'];

    $hp=$row['hp'];      // User Stats
    $hpmax=$row['hpmax'];
    $mp=$row['mp'];
    $mpmax=$row['mpmax'];
    
    $str=$row['str'];
    $dex=$row['dex'];
    $mag=$row['mag'];
    $def=$row['def'];

    $strmod=$_SESSION['strmod'];
    $dexmod=$_SESSION['dexmod'];
    $magmod=$_SESSION['magmod'];
    $defmod=$_SESSION['defmod'];

    $onehanded=$row['onehanded'];
    $twohanded=$row['twohanded'];
    $ranged=$row['ranged'];
    $warcraft=$row['warcraft'];
   // $toughness=$row['toughness'];
    $blockSkill=$row['block'];
    $ddge=$row['ddge'];

    $slice=$row['slice'];
    $smash=$row['smash'];
    $aim=$row['aim'];


    $magicstrike=$row['magicstrike'];

    $equipR=$row['equipR'];
    $equipL=$row['equipL'];
    $pet = $row['equipPet'];
    $comp = $row['equipComp'];

    $arrows=$row['arrows'];
    $bolts=$row['bolts'];

    $multiarrow=$row['multiarrow'];
    $boltupgrade=$row['boltupgrade'];

    $enemy=$row['enemy'];     // enemy Stats
    $enemyhp=$row['enemyhp'];
    $enemyhpmax=$row['enemyhpmax'];
    $enemyatt=$row['enemyatt'];
    $enemydef=$row['enemydef'];

    $infight = $row['infight'];
    $endfight = $row['endfight'];
    $weapontype = $_SESSION['weapontype'] = $row['weapontype'];

    $poisonimmune = $_SESSION['poisonimmune'];


    $heal_cost = $row['heal']*2; // so heal cost can display in battle

    //$flyingenemycheck = 0;		    // reset flying enemy check
            $dodgeCheck = 0;			// reset enemy dodge check
            $magResist = 0;			    // reset enemy magic resist check
            // $otherAttackCheck = 0;		// enemy OTHER attack check - so doesn't do regular attack // NOT NEEDED
            $otherEAttackCheck = 0;	    // enemy OTHER defend check
                $youDodge = 0;          // you dodge check - so don't apply damage
            $enemyLoop = 1;             // sets first enemy attack, will remain 1 if multi attack is checked
            $enemyLoopCount = 1;        //multi count

            if ($_SESSION['eDoubleHit'] == 1) {
                $_SESSION['eAlwaysHit'] =1;
            } elseif ($_SESSION['eTripleHit'] == 1) {
                $_SESSION['eAlwaysHit'] =2;
            } else {
                $_SESSION['eAlwaysHit'] =0;
            }
}

//function BATTLEnumbers() {


//}

// BATTLEnumbers(); // call the function

// ===================================================================================================== SET ATTACK NUMBERS
if ($endfight !=1) {  // ---------------------------- SET ATTACK NUMBERS
    if ($_SESSION['magiccast'] == 1 && $input == 'attack') {	 // magic ATTACK
        $damage = $magic_amount;
        echo 'Magic Amount'.$magic_amount.'<br>';
        $block = rand(0, $enemydef);
        if ($_SESSION['ePureD'] >= 1) {
            $block = $enemydef;
        }	// enemy pure defense check
        $damagetotal = $damage - $block;


    } elseif ($weapontype == 1 && $input == 'attack') {			 // -------------------------------------------------- 1h ATTACK
      //  $damage = rand(0, ($strmod-$onehanded-$warcraft));
      //  $damageskill = rand(0, $onehanded);
      //  $damageskill2 = rand(0, $warcraft);
        $damage = rand(0, $strmod); // including 1h and warcraft
        if ($_SESSION['slice']==1) {
            $slicedmg = rand(1, $slice);
        } else {
            $slicedmg=0;
        }
        $block = rand(0, $enemydef);
        if ($_SESSION['ePureD'] >= 1) {
            $block = $enemydef;
        }	// enemy pure defense check
       // $damagetotal = ($damage + $damageskill + $damageskill2 + $slicedmg) - $block;
        $damagetotal = ($damage + $slicedmg) - $block;
    } elseif ($weapontype == 2 && $input == 'attack') {			 // -------------------------------------------------- 2h ATTACK
        //$damage = rand(0, ($strmod-$twohanded-$warcraft));
        //$damageskill = rand(0, $twohanded);
        //$damageskill2 = rand(0, $warcraft);
        $damage = rand(0, $strmod); // including 2h and warcraft
        if ($_SESSION['smash']==1) {
            $smashdmg = rand(1, $smash);
        } else {
            $smashdmg=0;
        }
        $block = rand(0, $enemydef);
        if ($_SESSION['ePureD'] >= 1) {
            $block = $enemydef;
        }	// enemy pure defense check
        //$damagetotal = ($damage + $damageskill + $damageskill2 +$smashdmg) - $block;
        $damagetotal = ($damage + $smashdmg) - $block;
    } elseif ($weapontype == 3 && $input == 'attack') {	 // -------------------------------------------------- Ranged ATTACK
        //$damage = rand(0, ($dexmod-$ranged-$warcraft));
        //$damageskill = rand(0, $ranged);
        //$damageskill2 = rand(0, $warcraft);
        $damage = rand(0, $dexmod); // including ranged and warcraft
        if ($_SESSION['aim']==1) {
            $aimdmg = rand(1, $aim);
        } else {
            $aimdmg=0;
        }
        if ($boltupgrade >= 1 && $_SESSION['crossbow_equipped']==1) {
            $boltupgradedmg = rand(1, $boltupgrade);
        } else {
            $boltupgradedmg=0;
        }
        $block = rand(0, $enemydef);
        if ($_SESSION['ePureD'] >= 1) {
            $block = $enemydef;
        }	// enemy pure defense check
        //$damagetotal = ($damage + $damageskill + $damageskill2 + $aimdmg + $boltupgradedmg) - $block;
        $damagetotal = ($damage + $aimdmg) - $block;
    } elseif ($weapontype == 0 && $input == 'attack') {			 // none equipped
       // $damageskill=0;
        $damage = rand(0, $strmod);
        $block = rand(0, $enemydef);
        if ($_SESSION['ePureD'] >= 1) {
            $block = $enemydef;
        }	// enemy pure defense check
        $damagetotal = $damage - $block;
    } else {
        $damagetotal=0;
        $_SESSION['magiccast'] = 0;
        echo '......!!!last ditch attack! check battle.php // This is any non battle action?<br>';
    }


    // ======================================================================================== BATTLE MATH - REDO DOWN BELOW FOR MULTI
    // BLOCK MATH
    if ($equipL == 'training shield' || $equipL == 'basic shield'
                || $equipL == 'kite shield' || $equipL == 'buckler' || $equipL == 'wooden shield'
                || $equipL == 'hunter shield' || $equipL == 'iron shield' || $equipL == 'iron kite shield'
                || $equipL == 'silver shield' || $equipL == 'steel shield' || $equipL == 'steel kite shield') {
        $blockAmt = rand(1, $blockSkill);
    } else {
        $blockAmt = 0;
    }


    if ($_SESSION['ironskin_amount']>0) {	 // ironskin rand
        $ironskin_rand = rand(1, $_SESSION['ironskin_amount']);
    } else {
        $ironskin_rand = 0;
    }


    $edamage = rand(0, $enemyatt); 	 // ENEMY ATTACK
    $eblock = rand(0, $defmod) + $blockAmt + $ironskin_rand;
    $edamagetotal = $edamage - $eblock;
    if ($_SESSION['ePureA'] >= 1) {
        $edamagetotal = $enemyatt;
    }	// enemy pure attack check
    if ($_SESSION['eHeal'] >= 1) {
      //  $edamagetotal = 0;
    }	// if heal no damage to you

    $enemydodgeRand = rand(1, 100); // enemy dodge chance LVL x 10%

    if ($damagetotal <= 0) {
        $damagetotal = 0;
    }   // if negative damage make 0
    if ($edamagetotal <= 0) {
        $edamagetotal = 0;
    } // if negative damage make 0

    if ($_SESSION['notthe'] == 1) {
        $the = '';
        $The = '';
    } else {
        $the ='the';
        $The ='The';
    }	// set no THE for unique boss characters, ex: Diablo, Omar the Dead


    // ===================================================================================================== YOU ATTACK
    // ===================================================================================================== YOU ATTACK
    // ===================================================================================================== YOU ATTACK

    
    if (($input == 'attack' || $input == 'a') && $endfight != 1) {
        // -------------------------DB QUERY!
        $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $_SESSION['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        if (!$result) {
            die('There was an error running the query [' . $link->error . ']');
        }
        // -------------------------recalculate variables

        while ($row = $result->fetch_assoc()) {
            $enemyhp=$row['enemyhp'];
            $hp=$row['hp'];
            $infight=$row['infight'];
            $endfight=$row['endfight'];
        
        // --------------------------- USER ICON STUFF 
    
        $_SESSION['uIconAttack'] = 'attack';		// u attack icon
        $color='red';	

        if ($_SESSION['slice'] == 1) {  // 1h SLICE
            $_SESSION['uIconAttack'] = 'slice2';
        }
        if ($_SESSION['smash'] == 1) {  // 2h SMASH
            $_SESSION['uIconAttack'] = 'smash2';
        }
        if ($weapontype == 3) {  // Ranged weapon base attack
            $_SESSION['uIconAttack'] = 'target';
            $color='green';	
        }
        if ($_SESSION['aim'] == 1) {  // aim
            $_SESSION['uIconAttack'] = 'aim2';
            $color='green';	
        }
        if ($spell == 'magic strike') {  // magic strike
            $_SESSION['uIconAttack'] = 'magic';
            $spellColor = $color='blue';	
        }
        if ($spell == 'magic missile') {  // magic missile
            $_SESSION['uIconAttack'] = 'magicmissile2';
            $spellColor = $color='blue';	
        }
        if ($spell == 'fireball') {  // fireball
            $_SESSION['uIconAttack'] = 'fireball2';
            $spellColor = $color='dred';	
        }
        if ($spell == 'poison dart') {  // poison dart
            $_SESSION['uIconAttack'] = 'poisondart2';
            $spellColor = $color='dgreen';	
        }
        if ($spell == 'atomic blast') {  // atomic blast
            $_SESSION['uIconAttack'] = 'atomicblast2';
            $spellColor = $color='pink';	
        }

        if ($enemydodgeRand < ($_SESSION['eDodge'] * 10)) {  // dodge
            $_SESSION['uIconAttack'] = 'eDodge';
            $spellColor = $color='purple';	

        }
        if ($_SESSION['magiccast'] == 1 && ($spell != 'magic strike') ) 
            {
                $uIconWeapon = 'spellhand';
                //echo 
                $message= '<div class="uIconBox">
                <span class="icon uIcon">'.file_get_contents("img/svg/"."$uIconWeapon".".svg").'</span>';
                include('update_feed_alt.php'); // --- update feed
                $icon = "img/svg/".$_SESSION['uIconAttack'].".svg";
                //echo 
                $message= '<span class="icon uIconAttack '.$color.'">'.file_get_contents("$icon").'</span>
                </div>';
                include('update_feed_alt.php'); // --- update feed
        }
        else {
            $uIcon = $row['uIcon'];
            $uIconWeapon = $row['equipR'];
            //echo 
            $message= '<div class="uIconBox">
            <span class="icon uIcon">'.file_get_contents("img/svg/equipment/"."$uIconWeapon".".svg").'</span>';
            include('update_feed_alt.php'); // --- update feed
            $icon = "img/svg/".$_SESSION['uIconAttack'].".svg";
            //echo 
            $message= '<span class="icon uIconAttack '.$color.'">'.file_get_contents("$icon").'</span>
            </div>';
            include('update_feed_alt.php'); // --- update feed
        }
    }




    


        // ===================================================================================================== Flying Enemy Check
      //  echo 'MagicCast::::: '.$_SESSION['magiccast'].'    ';
    //    if ($_SESSION['eFly'] == 1  && $_SESSION['flying'] == 0 && ($weapontype != 3  && ($_SESSION['magiccast'] != 1 && $_SESSION['spell'] != 'magic strike'))) {
            if ($_SESSION['eFly'] == 1  && $_SESSION['flying'] == 0 && $weapontype != 3 && $_SESSION['magiccast'] != 1) {
        echo "You need to use a ranged weapon or projectile magic to hit $the flying $enemy!<br>";
        $message="<p><span class='yellow redBG'>You need to use a ranged weapon or projectile magic to hit $the flying $enemy!</span></p>";
        include('update_feed_alt.php'); // --- update feed
        }
        // --------------------------------------------------------------------------- NO AMMO check
        elseif ($arrows <= 0 && $_SESSION['bow_equipped'] == 1) {
            echo $message = '<i>You ran out of arrows! Equip another weapon.</i><br>';
            include('update_feed_alt.php');
        } // ----- arrow shot
        elseif ($bolts <= 0 && $_SESSION['crossbow_equipped'] == 1) {
            echo $message = '<i>You ran out of bolts! Equip another weapon.</i><br>';
            include('update_feed_alt.php');
        } // ----- bolt shot


    


    // ===================================================================================================== ENEMY DODGE CHECK
    elseif ($enemydodgeRand < ($_SESSION['eDodge'] * 10)) { // ------------  // enemy dodge chance LVL x 10%
                echo "".$The." $enemy dodges your attack!<br>";
        $message = "<p> $the $enemy <i class='purple'>DODGES</i> your attack!</p>
				<i class='purple'>Dodges $damagetotal</i>";
        include('update_feed_alt.php'); // --- update feed
        $otherEAttackCheck = 1;
        $damagetotal=0; // no damage to enemy
        $dodgeCheck = 1; // use later for dodge display
    }
        // ===================================================================================================== MAGIC ATTACK

        elseif ($_SESSION['magiccast'] == 1 && $input == 'attack') {
            if ($mp < $spell_cost) {
                echo $message="<p>You don't have enough MP to cast $spell!</p>";
                include('update_feed_alt.php'); // --- update feed
                $otherEAttackCheck = 1;
            } elseif ($_SESSION['eMagImm']==1) { 	// ----------------------------------------------- MAG RESIST ENEMY
                echo $message = "<p class='purple'>".$The." $enemy is immune to magic!</p>";
                include('update_feed_alt.php'); // --- update feed
               // $_SESSION['poison_amt']=0; // reset poison
                $magResist = 1;
                $otherEAttackCheck = 1;
                $damagetotal=0; // no damage to enemy
            }

         // ---------------------------------------------------------------------------------------------------- MAGIC STRIKE
         // ---------------------------------------------------------------------------------------------------- MAGIC STRIKE
         // ---------------------------------------------------------------------------------------------------- MAGIC STRIKE
      elseif ($spell == 'magic strike') { 
        if ($weapontype==3) {$color='green';}
        else {$color="red";}

            echo "You attack with a magic imbued $equipR for $spell_cost MP and hit ".$the." $enemy for $damagetotal damage.<br>";
            $message="
            <p class='".$color."'>($att_damage + <span class='blue'>$magicstrike_att</span>) - $block = $damagetotal <span class='small gray'>(max $maxhit)</span></p>
            <p>You <strong class='blue'>attack</strong> ".$the." $enemy with your 
            <span class='blue'>magic imbued </span>
            <strong class='".$color."'>$equipR</strong>
            <span class='blue small'>-$spell_cost mp</span></p>
            <strong class='attackBig blue'>$damagetotal</strong>";
            include('update_feed_alt.php'); // --- update feed
         //   $results = $link->query("UPDATE $user SET enemyhp = enemyhp - $damagetotal"); // subtract enemy hp
         //   $results = $link->query("UPDATE $user SET mp = mp - $spell_cost"); // -- mp change

            $updates = [ // -- set changes
                'enemyhp' => $enemyhp - $damagetotal,
                'mp' => $mp - $spell_cost
            ]; 
            updateStats($link, $username, $updates); // -- apply changes

            // -------------------------------------------- AMMO USE DUPLICATE x2 //////////////////////////////////////
            if ($_SESSION['bow_equipped'] == 1) {
               // $results = $link->query("UPDATE $user SET arrows = arrows - 1");
                $updates = [ // -- set changes
                    'arrows' => $arrows - 1
                ]; 
                updateStats($link, $username, $updates); // -- apply changes
            } //minus arrow
            if ($_SESSION['crossbow_equipped'] == 1) {
             //   $results = $link->query("UPDATE $user SET bolts = bolts - 1");
                $updates = [ // -- set changes
                    'bolts' => $bolts - 1
                ]; 
                updateStats($link, $username, $updates); // -- apply changes
            } //minus bolt
        }
        elseif ($otherEAttackCheck == 0) { // ----------------------------------------------- MAGIC HIT!
            echo "You cast $spell for $spell_cost MP and hit ".$the." $enemy for $damagetotal damage (enemy blocks $block)<br>";
            $message="
			<span class='attackMath $spellColor'>$damage - $block = $damagetotal </span>
			<p>You cast <strong class='$spellColor'>$spell!</strong></p>
			<span class='attackCost'>(-$spell_cost mp)</span>
			<strong class='attackBig $spellColor'>$damagetotal</strong>";
            include('update_feed_alt.php'); // --- update feed
            $results = $link->query("UPDATE $user SET enemyhp = enemyhp - $damagetotal"); // subtract enemy hp
            $results = $link->query("UPDATE $user SET mp = mp - $spell_cost"); // -- mp change
            $updates = [ // -- set changes
                'enemyhp' => $enemyhp - $damagetotal,
                'mp' => $mp - $spell_cost
            ]; 
            updateStats($link, $username, $updates); // -- apply changes
        }
    }






        // -------------------------------------------------------------------------------------------- WEAPON ATTACK
        // -------------------------------------------------------------------------------------------- WEAPON ATTACK
        // -------------------------------------------------------------------------------------------- WEAPON ATTACK

        elseif ($_SESSION['eStrImm']==1) { 	// ----------------------------------------------- STR RESIST ENEMY
            echo $message = "".$The." $enemy is immune to melee attacks!<br>";
            include('update_feed_alt.php'); // --- update feed
            $otherEAttackCheck = 1;
        } elseif ($_SESSION['eDexImm']==1 && $weapontype == 3) { 	// ----------------------------------------------- DEX RESIST ENEMY
            echo $message = "".$The." $enemy is immune to ranged attacks!<br>";
            include('update_feed_alt.php'); // --- update feed
            $otherEAttackCheck = 1;
        } elseif (1==1) { // ----------------------------------------------- WEAPON HIT!
    if ($_SESSION['multi_hit']>=1) { // ----------------------------------------------- MultiCheck!

      //  $results = $link->query("UPDATE $user SET enemyhp = enemyhp - $damagetotal"); // subtract enemy hp

        $updates = [ // -- set changes
            'enemyhp' => $enemyhp - $damagetotal
        ]; 
        updateStats($link, $username, $updates); // -- apply changes

        $weapondrop = rand(1, 500); // you drop your weapon 1/500

        // ---------------------------------------------------------------------------------------------------- SLICE 1h
        if ($_SESSION['slice'] == 1 && $weapontype == 1 && $otherEAttackCheck == 0) {  // 1h SLICE

                    $maxhit = $strmod + $slice;
                    echo "You Slice ".$the." $enemy with your $equipR for $damagetotal damage.<br>";
                    $message="
                    <p class='red'>($damage + $slicedmg) - $block = $damagetotal <span class='small gray'>(max $maxhit)</span></p>
                    <p>You <strong class='red'>Slice</strong> ".$the." $enemy with your
                    <strong class='red'>$equipR</strong>
                    <span class='small blue'>-$slice_cost_cast mp</span></p>
					<strong class='attackBig red'>$damagetotal</strong>";
                    include('update_feed_alt.php'); // --- update feed

                  //  $results = $link->query("UPDATE $user SET mp = mp - $slice_cost_cast"); // -- mp change

                    $updates = [ // -- set changes
                        'mp' => $mp - $slice_cost_cast
                    ]; 
                    updateStats($link, $username, $updates); // -- apply changes
                }

        // ---------------------------------------------------------------------------------------------------- SMASH 2h
        elseif ($_SESSION['smash'] == 1 && $weapontype == 2 && $otherEAttackCheck == 0) {  // 2h SMASH
                    $maxhit = $strmod + $smash;
                    echo "You Smash ".$the." $enemy with your $equipR for $damagetotal damage.<br>";
                    $message="
					<p class='red'>($damage + $smashdmg) - $block = $damagetotal <span class='small gray'>(max $maxhit)</span></p>
                    <p>You <strong class='red'>Smash</strong> ".$the." $enemy with your
                    <strong class='red'>$equipR</strong>
                    <span class='small blue'>-$smash_cost_cast mp</span></p>
					<strong class='attackBig red'>$damagetotal</strong>";
                    include('update_feed_alt.php'); // --- update feed
                //    $results = $link->query("UPDATE $user SET mp = mp - $smash_cost_cast"); // -- mp change

                    $updates = [ // -- set changes
                        'mp' => $mp - $smash_cost_cast
                    ]; 
                    updateStats($link, $username, $updates); // -- apply changes
                }
        // ---------------------------------------------------------------------------------------------------- DEFAULT RANGE ATTACK + AIM
        elseif ($weapontype==3) { 
             if ($_SESSION['bow_equipped']>=1) {
                $arrowsLeft = $arrows - 1;
                $arrowsLeftMessage = "<span class='gray small'>$arrowsLeft arrows left</span>";
             }
             else if ($_SESSION['crossbow_equipped']>=1) {
                $boltsLeft = $bolts - 1;
                $boltsLeftMessage = "<span class='gray small'>$boltsLeft bolts left</span>";
             }
             else {$boltsLeft = '';$arrowsleft = '';}
             if ($_SESSION['aim'] >= 1) {   // ------ AIM CHECK
             //   $results = $link->query("UPDATE $user SET mp = mp - $aim_cost_cast"); // -- mp change for aim

                $updates = [ // -- set changes
                    'mp' => $mp - $aim_cost_cast
                ]; 
                updateStats($link, $username, $updates); // -- apply changes

                $attacktext =' <span class="green">Aim</span>';
                $mpcosttext = '<span class="lgray small"><span class="blue">[-'.$aim_cost_cast.' mp]</span></span>';
                $maxhit=$dexmod+$aim;
            }
            else {$attacktext ='attack'; // --- not aim
                $maxhit=$dexmod;
                $mpcosttext='';
            }
                    while ($_SESSION['bow_equipped'] >= 0) {
                        echo "You $attacktext ".$the." $enemy with your $equipR for $damagetotal damage.<br>";
                        $message="
					<p class='attackMath green'>$damage - $block = $damagetotal <span class='small gray'>(max $maxhit)</span></p>
					<p>You $attacktext with your <strong class='green'>$equipR</strong></p>
					 $arrowsLeftMessage $boltsLeftMessage $mpcosttext
					<strong class='attackBig green'>$damagetotal</strong>";
                        include('update_feed_alt.php'); // --- update feed

                        // -------------------------------------------- MULTIHIT ???
                      //  if ($_SESSION['bow_equipped']>=1) {
                            $multiarrowhit = rand(0, $multiarrow);
                            echo ' M-a: '.$multiarrowhit;
                            $chance100 = rand(1, 100);
                            echo ' M-a %: '.$chance100;
                            if ($multiarrowhit >= $chance100) {
                                $_SESSION['bow_equipped'] = 1;  // re loop arrow attack
                             //   $results = $link->query("UPDATE $user SET enemyhp = enemyhp - $damagetotal"); // subtract enemy hp - DO WE NEED THIS BECAUSE OF LOOP?

                                $updates = [ // -- set changes / subtract enemy hp - DO WE NEED THIS BECAUSE OF LOOP?
                                    'enemyhp' => $enemyhp - $damagetotal
                                ]; 
                                updateStats($link, $username, $updates); // -- apply changes


                            } else {
                                $_SESSION['bow_equipped'] = -1;
                            }
                      //  }
                    }
                }
        // ---------------------------------------------------------------------------------------------------- ONE or TWO HANDED WEAPONS
        else { // DISPLAY FOR ONE or TWO HANDED WEAPONS
                echo "You attack ".$the." $enemy with your $equipR for $damagetotal damage.<br>";
                    $message="
				<p class='red attackMath'>$damage - $block = $damagetotal <span class='gray'>(max $strmod)</span></p>
				<p>You attack with your
				<strong class='red'>$equipR</strong>
				<strong class='attackBig red'>$damagetotal</strong></p> ";
                    include('update_feed_alt.php'); // --- update feed
                }






        // ---------------------------------------------------------------------------------------------------- END BASIC ATTACKS!!! 
        // ---------------------------------------------------------------------------------------------------- END BASIC ATTACKS!!! 
        // ---------------------------------------------------------------------------------------------------- END BASIC ATTACKS!!! 
        // ---------------------------------------------------------------------------------------------------- END BASIC ATTACKS!!! 
        // ---------------------------------------------------------------------------------------------------- END BASIC ATTACKS!!! 


    




        // ---------------------------------------------------------------------------------------------------- WEAPON DROP
        if ($weapondrop == 1) {
            echo $message="<i class='red'>O NO! As you attack with your $equipR it becomes unequipped! Equip a weapon!</i><br>";
            include('update_feed.php'); // --- update feed
          //  $results = $link->query("UPDATE $user SET equipR = 'fists'");
          //  $results = $link->query("UPDATE $user SET weapontype = '1'");


            $updates = [ // -- set changes
                'equipR' => 'fists',
                'weapontype' => 1
            ]; 
            updateStats($link, $username, $updates); // -- apply changes

            if ($equipR == $equipL) {
              //  $results = $link->query("UPDATE $user SET equipL = '- - -'");
                $updates = [ // -- set changes
                    'equipL' => '- - -'
                ]; 
                updateStats($link, $username, $updates); // -- apply changes

            } // Drop for Double handed check
        }

        $_SESSION['multi_hit']=0; /////// MIGHT NOT BE IN USE ANYMORE
    }
            $_SESSION['multi_hit'] = 1;
            // -------------------------------------------- AMMO USE!!!
            if ($equipR == "wooden bow" || $equipR == "hunter bow" || $equipR == "long bow" || $equipR == "iron bow" || $equipR == "enchanted bow"
                || $equipR == "steel bow" || $equipR == "silver bow" || $equipR == "greenhorn bow" || $equipR == "mithril bow" || $equipR == "black bow" || $equipR == "snow bow") {
               // $results = $link->query("UPDATE $user SET arrows = arrows - 1");
                $updates = [ // -- set changes
                    'arrows' => $arrows - 1
                ]; 
                updateStats($link, $username, $updates); // -- apply changes
            } //minus arrow
            if ($equipR == "crossbow" || $equipR == "hunter crossbow" || $equipR == "hand crossbow" || $equipR == "compound crossbow" || $equipR == "iron crossbow"
                || $equipR == "steel crossbow" || $equipR == "silver crossbow" || $equipR == "mithril crossbow") {
              //  $results = $link->query("UPDATE $user SET bolts = bolts - 1");
                $updates = [ // -- set changes
                    'bolts' => $bolts - 1
                ]; 
                updateStats($link, $username, $updates); // -- apply changes
            } //minus bolt

        }
    } // --- end attack
}
    
// ----------------------------------------------- MAGIC SPELL IN BATTLE DISPLAYS
if($input=='cast heal' || $input=='heal')  {
    $_SESSION['uIconAttack'] = 'heal';
    $spellColor = $color='red';	
    $icon = "img/svg/".$_SESSION['uIconAttack'].".svg";
    //echo 
    $message= '<span class="icon uIconAttack '.$color.'">'.file_get_contents("$icon").'</span>';
    include('update_feed_alt.php'); // --- update feed
    //echo 
    $message='<p>You cast heal for <span class="blue">'.$heal_cost.' MP</span> and restore <strong class="attackBig red">+'.$heal_amount.' HP</strong></p>';
    include ('update_feed_alt.php'); // --- update feed

    
}













// -------------------------------------------------------------------------------------------------------------------------- COMPANION
// -------------------------------------------------------------------------------------------------------------------------- COMPANION
// -------------------------------------------------------------------------------------------------------------------------- COMPANION
// -------------------------DB QUERY! // -------------------------------------------- COMPANION Recalculate enemy HP
$stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();
if (!$result) {
    die('There was an error running the query [' . $link->error . ']');
}
    // -------------------------recalculate variables for pet
    while ($row = $result->fetch_assoc()) {
        $enemyhp=$row['enemyhp'];
    }

    if ($comp == 'dwarf axeman' && $enemyhp > 0) {	// -------------------------------------------------------------- COMPANION ATTACK
        $compBase = rand(1, 5);
        $compEdef = rand(0, ($block/10));
        if ($_SESSION['ePureD'] >= 1) {$compEdef = ($enemydef/10);}	// enemy pure defense check
        $compDamage = $compBase - $compEdef;
        if ($compDamage < 0) {$compDamage = 0;} // set damage to 0 if negative //: $compBase-$compEdef =
        $message="<span class='attackMath'>Dwarf Axeman attacks:<strong class='red'>$compDamage</strong></span>";
        include('update_feed_alt.php'); // --- update feed
       // $results = $link->query("UPDATE $user SET enemyhp = enemyhp - $compDamage"); // subtract enemy hp
        $updates = [ // -- set changes
            'enemyhp' => $enemyhp - $compDamage
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
    }

    else if ($comp == 'elf ranger' && $enemyhp > 0) {	// -------------------------------------------------------------- COMPANION ATTACK
        $compBase = rand(1, 10);
        $compEdef = rand(0, ($block/10));
        if ($_SESSION['ePureD'] >= 1) {$compEdef = ($enemydef/10);}	// enemy pure defense check
        $compDamage = $compBase - $compEdef;
        if ($compDamage < 0) {$compDamage = 0;} // set damage to 0 if negative //$compBase-$compEdef =
        $message="<span class='attackMath'>Elf Ranger attacks: <strong class='green'>$compDamage</strong></span>";
        include('update_feed_alt.php'); // --- update feed
       // $results = $link->query("UPDATE $user SET enemyhp = enemyhp - $compDamage"); // subtract enemy hp
        $updates = [ // -- set changes
            'enemyhp' => $enemyhp - $compDamage
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
    }
    else {
        $compDamage = 0; // no companion equipped
    }


    
// -------------------------------------------------------------------------------------------------------------------------- PETS
    // -------------------------------------------------------------------------------------------------------------------------- PETS
    // -------------------------------------------------------------------------------------------------------------------------- PETS
    // -------------------------DB QUERY! // -------------------------------------------- PET Recalculate enemy HP
    $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    if (!$result) {
        die('There was an error running the query [' . $link->error . ']');
    }
            // -------------------------recalculate variables for pet
            while ($row = $result->fetch_assoc()) {
                $enemyhp=$row['enemyhp'];
            }



// ----------------------------------------------------------------------------------------------------- HAMPSTER ATTACK
    if ($pet == 'pet hampster' && $enemyhp > 0 && $_SESSION['eFly'] != 1) {
        $petDamage = rand(0, 2);
        $message="<span class='attackMath'> Pet hampster attacks: <strong class='red'> $petDamage</strong></span>";
        include('update_feed_alt.php'); // --- update feed
    //    $results = $link->query("UPDATE $user SET enemyhp = enemyhp - $petDamage"); // subtract enemy hp
        $updates = [ // -- set changes
            'enemyhp' => $enemyhp - $petDamage
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
    } elseif ($pet == 'pet hampster' && $enemyhp > 0 && $_SESSION['eFly'] == 1) {
        $message="Pet hampster can't attack flying enemies.<br>";
        include('update_feed_alt.php'); // --- update feed
    }

// ----------------------------------------------------------------------------------------------------- BAT ATTACK
    else if ($pet == 'pet bat' && $enemyhp > 0) {
        $petDamage = rand(0, 3);
        $message="<span class='attackMath'>Pet bat attacks: <strong class='red'> $petDamage</strong></span>";
        include('update_feed_alt.php'); // --- update feed
       // $results = $link->query("UPDATE $user SET enemyhp = enemyhp - $petDamage"); // subtract enemy hp
        $updates = [ // -- set changes
            'enemyhp' => $enemyhp - $petDamage
        ]; 
        updateStats($link, $username, $updates); // -- apply changes
    }
    else {
        $petDamage = 0; // no pet equipped
    }



// -------------------------------------------------------------------------------------------------------------------------- POISON
// -------------------------------------------------------------------------------------------------------------------------- POISON
// -------------------------------------------------------------------------------------------------------------------------- POISON
    
            // -------------------------DB QUERY! // -------------------------------------------- Poison Recalculate enemy HP
            $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->bind_param("s", $_SESSION['username']);
            $stmt->execute();
            $result = $stmt->get_result();
            if (!$result) {
                die('There was an error running the query [' . $link->error . ']');
            }
            // -------------------------recalculate variables for poison
            while ($row = $result->fetch_assoc()) {
                $enemyhp=$row['enemyhp'];
            }



                // -------------------------------------------- Check for poison weapons!
                if ($_SESSION['poison_amt']<=0 && ($equipR=='poison saber' || $equipR=='jim bo' || $equipR=='jim bow') && $input=='attack') {
                    $_SESSION['poison_amt'] = rand(1, 5);					 // poison weapons
                }


                    // -------------------------------------------------------------------------------------- Poison
if ($_SESSION['poison_amt']>0 && $enemyhp > 0) { // ------- Poison on Enemy
                $poison_amt = $_SESSION['poison_amt'] = $_SESSION['poison_amt'] - 1;
                if ($poison_amt > 0) {
                    echo "".$The." $enemy is poisoned $poison_amt<br>";
                    $message="<span class='attackMath'>Enemy Poisoned: <strong class='green'> ".$_SESSION['poison_amt']." </strong></span>";
                    include('update_feed_alt.php'); // --- update feed
                  //  $results = $link->query("UPDATE $user SET enemyhp = enemyhp - $poison_amt"); // subtract enemy hp w/ poison
                    $updates = [ // -- set changes
                        'enemyhp' => $enemyhp - $poison_amt
                    ]; 
                    updateStats($link, $username, $updates); // -- apply changes
                }
}




// ---------------------------------- END BATTLE CHECKS

// ---------------------------------- Start Enemy Battle Box
    $message="</div><div class='battleBox alignR'>";
    include('update_feed_alt.php'); // --- update feed




// ---------------------------------- START ENEMY ATTACK LOOP
while ($enemyLoop == 1) {
// -------------------------DB QUERY!
$stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();
if (!$result) {
    die('There was an error running the query [' . $link->error . ']');
}
    // -------------------------recalculate variables
    while ($row = $result->fetch_assoc()) {
        $enemyhp=$row['enemyhp'];
        $hp=$row['hp'];
        $infight=$row['infight'];
        $eIcon = $row['eIcon'];

    }

    // -----------------  ENEMY ICON BOX - DEAD

    if($enemyhp <= 0) {
        $icon = "img/svg/enemy/".$eIcon.".svg";
        echo 'You have defeated '.$The.' '.$enemy.'!<br>';
        $message= $enemy.' <div class="eIconBox">
        <span class="red flip">DEAD</span><span class="icon eIcon dead">'.file_get_contents("$icon").'</span>
        </div>';
        include('update_feed_alt.php'); // --- update feed
    }
        // --- END ENEMY ICON BOX


    // ------------------------ ENEMY DIES
    if ($enemyhp <= 0 && $infight >=1 && 1==2) {
        $_SESSION['poison_amt']=0; // reset poison on enemy death
      $enemyLoop = 0; // resets enemy multi loop
      $message="</div></div>";
      include('update_feed_alt.php'); // --- update feed
        include('battle-win.php');
    }






    
    



// ----------------------------------------------------------------------------------------------------------------- ENEMY ATTACK
// ----------------------------------------------------------------------------------------------------------------- ENEMY ATTACK
// ----------------------------------------------------------------------------------------------------------------- ENEMY ATTACK
// ----------------------------------------------------------------------------------------------------------------- ENEMY ATTACK
// ----------------------------------------------------------------------------------------------------------------- ENEMY ATTACK
// ----------------------------------------------------------------------------------------------------------------- ENEMY ATTACK


$enemycritattack = rand(1, 10); 		// enemy CRITICAL attack 10%
$enemywhirlwindattack = rand(1, 4); 		// enemy Whirlwind attack 25%
$enemyrandpickpocket = rand(1, 5); 	// enemy pickpocket chance 20%
$enemyhealchance = rand(1, 4); 		// enemy heal chance 25%
$enemypowerattack = rand(1, 3); 		// enemy POWER attack 33%
$enemybite = rand(1, 5); 				// enemy bite chance 20%
$enemyrage = rand(1, 5); 				// enemy rage chance 20%
$enemydragonfire = rand(1, 4); 				// enemy rage chance 25%

$ddgecheck = rand(1, 100); 			// You Dodge chance LVL/100


        // -----------------  ENEMY ICON BOX
        if($enemyhp > 0) {

            $icon = "img/svg/enemy/".$eIcon.".svg"; 
            $message= '<div class="eIconBox">
            <span class="icon eIcon">'.file_get_contents("$icon").'</span>';
            include('update_feed_alt.php'); // --- update feed

            $color='red';
            $_SESSION['uIconAttack'] = 'attack';			// u attack icon

            if (1==0) {
            }
            else if ($_SESSION['eHeal']>=1 && $enemyhp < $enemyhpmax && $enemyhealchance == 1) {
                $_SESSION['uIconAttack'] = 'eHeal';			// u attack icon
                $color='yellowgreen';
                $edamagetotal = 0; // if heal no damage to you
            }
           // else if ($ddgecheck <= $ddge) {
            else if ($ddgecheck <= $ddge) {
                $_SESSION['uIconAttack'] = 'eDodge';			// u attack icon
                $color='purple';
                $damagetotal = 0; // if dodge no damage to enemy
            }
            else if ($_SESSION['eWhirlwind']>=1 && $enemywhirlwindattack == 1) {
                $_SESSION['uIconAttack'] = 'eWhirlwind';			// u attack icon
                $color='darkblue';
            }
            else if ($_SESSION['eDragonFire']>=1 && $enemydragonfire == 1) {
                $_SESSION['uIconAttack'] = 'eDragonFire';			// u attack icon
                $color='darkred';
            }
            else if ($_SESSION['eCrit']>=1 && $enemycritattack == 1) {
                $_SESSION['uIconAttack'] = 'eCrit';			// u attack icon
                $color='darkred';
            }
            else if ($_SESSION['eRage']>=1 && $enemyrage == 1) {
                $_SESSION['uIconAttack'] = 'eRage';			// u attack icon
                $color='dred';
            }
            else if ($_SESSION['ePow']>=1 && $enemypowerattack == 1) {
                $_SESSION['uIconAttack'] = 'ePow';			// u attack icon
                $color='dred';
            }
            else if ($_SESSION['eBite']>=1 && $enemybite == 1) {
                $_SESSION['uIconAttack'] = 'eBite';			// u attack icon
                $color='dred';
            }
            else if ($_SESSION['ePoison']>=1 && $_SESSION['poisonyou'] < 1) {
                $_SESSION['uIconAttack'] = 'ePoison';			// u attack icon
                $color='dgreen';
            }
            else if ($_SESSION['ePureA']>=1) {
                $_SESSION['uIconAttack'] = 'ePureA';			// u attack icon
                $color='red';
                if ($_SESSION['eMag'] == 1) {
                    $color='blue';
                }
                if ($_SESSION['eDex'] == 1) {
                    $color='green';
                }
            }
            else if ($_SESSION['eMag'] == 1) {
                $_SESSION['uIconAttack'] = 'eMag';			// u attack icon
                $color='blue';
            }
            else if ($_SESSION['eDex'] == 1) {
                $_SESSION['uIconAttack'] = 'eDex';			// u attack icon
                $color='green';
            }
            else if ($_SESSION['eSteal'] == 1 && $enemyrandpickpocket == 1) {
                $_SESSION['uIconAttack'] = 'eSteal';			// u attack icon
                $color='gold';
            }            
            $icon = "img/svg/".$_SESSION['uIconAttack'].".svg";
            $message= '<span class="icon uIconAttack '.$color.'">'.file_get_contents("$icon").'</span></div>';
        include('update_feed_alt.php'); // --- update feed
    }
    // --- END ENEMY ICON BOX


    $eHealAmount=0; // reset heal amount for math later on when e heal is nothappening
    // ------------------------ YOU DIE
    if ($hp <= 0) {
        echo 'DEATH ):';
    } elseif ($enemyhp < 0) { // enemy alive check
    // echo 'ENEMY DEAD (:';
    }
        // ---------------------------------------------------------------------------------------- ENEMY HEAL	 - 25%
        elseif ($infight == 1 && $enemyhp > 0 && $enemyhp < $enemyhpmax && ($_SESSION['eHeal'] >= 1) && ($enemyhealchance == 1)) {
            $eHealAmount = rand(1, $enemyatt); 	 // ENEMY HEAL RECALCUATE so it doesn't take block into consideration.
          //  $eHealAmount = $edamage/2;
           // $results = $link->query("UPDATE $user SET enemyhp = enemyhp + $eHealAmount");
            $updates = [ // -- set changes
                'enemyhp' => $enemyhp + $eHealAmount
            ]; 
            updateStats($link, $username, $updates); // -- apply changes

            if ($enemyhp + $eHealAmount > $enemyhpmax) {
               // $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
                $updates = [ // -- set changes
                    'enemyhp' => $enemyhpmax
                ]; 
                updateStats($link, $username, $updates); // -- apply changes
            }
            echo ''.$The.' '.$enemy.' casts heal for +'.$eHealAmount.' hp!<br>';
    
            // $message="$the $enemy casts a <i class='green'>heal</i> spell! <span class='totalXXX green'>+ $eHealAmount</span><br><br>";
            // include('update_feed_alt.php'); // --- update feed
    
            $message="<span class='attackMath yellowgreen'>rand(1,$enemyatt) = $eHealAmount</span>
            <p><span>$The <strong> $enemy </strong> casts <strong class='yellowgreen'>HEAL</strong>
            <strong class='attackBig yellowgreen'>+$eHealAmount</strong></span></p>"; 
            include('update_feed_alt.php'); // --- update feed
            // $edamage = 0; // SO NO DAMAGE HAPPENS TO YOU, since enemy healed itself.
        }
    // ---------------------------------------------------------------------------------------- YOU DODGE ENEMY ATTACK!
    elseif (($ddgecheck <= $ddge)) { // YOU DODGE // $infight == 1 && $enemyhp > 0 && 
        echo "You dodge ".$the." $enemy's attack! (DODGED $edamagetotal)<br>";

     //   $message=  "<span>$The <strong> $enemy </strong> casts <strong class='green'>HEAL</strong>
     //   <strong class='attackBig green'>+$edamagetotal</strong></span>"; 

        $message="<p>You <i class='purple'>DODGE</i> $the $enemy's attack! </p><i class='purple'>You Dodge $edamagetotal</i>";

        include('update_feed_alt.php'); // --- update feed
        // $otherAttackCheck = 1;
        $youDodge = 1;
    }


//    $_SESSION['eWhirlwind'] = 0;	// enemy whirlwind attack, 1/4 chance to do 6x damage 	    (1-(att*6) damage) 
    // ---------------------------------------------------------------------------------------- ENEMY WHIRLWIND ATTACK 
    //- 1/5 chance to do 8x damage 	(1-(att*8) damage)
    elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['eWhirlwind']==1 &&  $enemywhirlwindattack == 1) {
        $edamage1 = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $edamage2 = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $edamage3 = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $edamage4 = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $edamage5 = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $edamage6 = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $edamagetotal = ($edamage1 + $edamage2 + $edamage3 + $edamage4 + $edamage5 + $edamage6) - $eblock;
        if ($_SESSION['ePureA'] >= 1) {$edamagetotal = $enemyatt*6;$edamage1=$enemyatt;$edamage2=$enemyatt;$edamage3=$enemyatt;$edamage4=$enemyatt;$edamage5=$enemyatt;$edamage6=$enemyatt;$eblock=0;}	// enemy pure attack check
        if ($edamagetotal <= 0) {$edamagetotal = 0;} // if negative damage make 0
        echo ''.$The.' '.$enemy.' launches a devastating WHIRLWIND ATTACK for '.$edamagetotal.' damage!<br>';
  
  
        $message="$The $enemy launches a devastating WHIRLWIND ATTACK!
	    <span class='attack red'>( $edamage1 + $edamage2 + $edamage3 + $edamage4 + $edamage5 + $edamage6 ) - $eblock = $edamagetotal</span><br>";
   //     include('update_feed_alt.php'); // --- update feed\

        $message="<span class='attackMath darkblue'>( $edamage1 + $edamage2 + $edamage3 + $edamage4 + $edamage5 + $edamage6 ) - $eblock = $edamagetotal</span>
		<p><strong class=''>$The $enemy </strong> launches a devastating  <strong class='darkblue'>WHIRLWIND ATTACK</strong>!
		<strong class='attackBig darkblue'>$edamagetotal</strong></p>";
        include('update_feed_alt.php'); // --- update feed
        // $otherAttackCheck = 1;
    }

   // $_SESSION['eDragonFire'] = 0;	// dragon fire = pure attack (no def ) + multi attack (3-5 times) --- 1/4 chance // 50% chance to catch on fire(1-damage). when on fire, burn forever for that dam. need to use water to cure on fire


   
    // ---------------------------------------------------------------------------------------- ENEMY DRAGONFIRE - pure damage 3-5x ENEMY ATTACK (1/4 chance)
    elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['eDragonFire']==1 &&  $enemydragonfire == 1) {
        $dragonfireCombo = $dragonfireCountdown = rand(3, 5);
        $edamagetotal = $enemyatt * $dragonfireCombo;
        while ($dragonfireCountdown > 0) {
            $message="FIREBREATH! <span class='darkred'>$enemyatt</span><br>";
            include('update_feed_alt.php'); // --- update feed
            $dragonfireCountdown -= 1;
        }
        if ($edamagetotal <= 0) { $edamagetotal = 0; } // if negative damage make 0
        $message="<p><strong class=''>$The $enemy </strong> BURNS you with <strong class='darkred'>FIREBREATH</strong> 
        <strong class='attackBig darkred'>$edamagetotal</strong></p>";
            include('update_feed_alt.php'); // --- update feed
        // $otherAttackCheck = 1;
    }


    // ---------------------------------------------------------------------------------------- ENEMY CRITICAL ATTACK - X10 ATTACK (1/10 chance)
    elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['eCrit']==1 &&  $enemycritattack == 1) {
        $edamage1 = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $edamage2 = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $edamage3 = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $edamage4 = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $edamage5 = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $edamage6 = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $edamage7 = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $edamage8 = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $edamage9 = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $edamage10 = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $edamagetotal = ($edamage1 + $edamage2 + $edamage3 + $edamage4 + $edamage5 + $edamage6 + $edamage7 + $edamage8 + $edamage9 + $edamage10) - $eblock;
        if ($_SESSION['ePureA'] >= 1) {
            $edamagetotal = $enemyatt*10;
        }	// enemy pure attack check
        if ($edamagetotal <= 0) {
            $edamagetotal = 0;
        } // if negative damage make 0
        echo ''.$The.' '.$enemy.' hits you with a CRITICAL ATTACK for '.$edamagetotal.' damage!<br>';
        $message="<span class='attackMath darkred'> ( $edamage1 + $edamage2 + $edamage3 + $edamage4 + $edamage5 + $edamage6 + $edamage7 + $edamage8 + $edamage9 + $edamage10 ) - $eblock = $edamagetotal</span>
        <p><strong class=''>$The $enemy </strong> hits you with a <strong class='darkred'>CRITICAL ATTACK</strong>!
        <strong class='attackBig darkred'>$edamagetotal</strong></p>";
            include('update_feed_alt.php'); // --- update feed

        // $otherAttackCheck = 1;
    }
    // ---------------------------------------------------------------------------------------- ENEMY RAGE ATTACK - 2-4 PURE COMBO ATTACK (1/5 chance)
    elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['eRage']==1 &&  $enemyrage == 1) {
        $rageCombo = $rageCountdown = rand(2, 4);
        $edamagetotal = $enemyatt * $rageCombo;
        $message="<span class='attackMath dred'> $enemyatt x $rageCombo = $edamagetotal</span>";
        include('update_feed_alt.php'); // --- update feed
        while ($rageCountdown > 0) {
            $message="PURE RAGE! <span class='dred'>$enemyatt</span><br>";
            include('update_feed_alt.php'); // --- update feed
            $rageCountdown -= 1;
        }
        if ($edamagetotal <= 0) {$edamagetotal = 0;} // if negative damage make 0
        $message="<p><strong class=''>$The $enemy </strong> goes on a <strong class='dred'>RAGE</strong> filled RAMPAGE for
        <strong class='attackBig dred'>$edamagetotal</strong></p>";
        include('update_feed_alt.php'); // --- update feed
        // $otherAttackCheck = 1;
    }

    // ---------------------------------------------------------------------------------------- ENEMY POWER ATTACK - X3 ATTACK (1/3 chance)
    elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['ePow']==1 &&  $enemypowerattack == 1) {
        $edamage1 = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $edamage2 = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $edamage3 = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $edamagetotal = ($edamage1 + $edamage2 + $edamage3) - $eblock;
        if ($_SESSION['ePureA'] >= 1) {$edamagetotal = $enemyatt*3;}	// enemy pure attack check
        if ($edamagetotal <= 0) {$edamagetotal = 0;} // if negative damage make 0
        echo ''.$The.' '.$enemy.'</span> unleashes a <span class="dred">Power Attack</span> for '.$edamagetotal.' damage.<br>';
        $message="<span class='attackMath dred'>( $edamage1 + $edamage2 + $edamage3 ) - $eblock = $edamagetotal</span>
		<p><strong class=''>$The $enemy </strong> unleashes a <strong class='dred'>POWER ATTACK</strong>!
		<strong class='attackBig dred'>$edamagetotal</strong></p>";
        include('update_feed_alt.php'); // --- update feed
        // $otherAttackCheck = 1;
    }

    //	$message="<p>The $enemy unleashes a POWER ATTACK!</p> <span class='total redBG power'>$edamagetotal</span><br>
    // ---------------------------------------------------------------------------------------- ENEMY BITE - X2 PURE ATTACK (1/5 chance)
    //<span class='total power'>$edamagetotal</span><br>
    elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['eBite']>=1 && $enemybite == 1) {
        $edamage1 = $enemyatt; 	 // ENEMY ATTACK
    $edamage2 = $enemyatt; 	 // ENEMY ATTACK
    $edamagetotal = $edamage1 + $edamage2;
  /*
        echo ''.$The.' '.$enemy.' BITES you for '.$edamagetotal.' damage!<br>';
        $message="$The $enemy BITES you!
	<span class='attack red'>( $edamage1 + $edamage2 ) = $edamagetotal</span><br>";
*/

    echo ''.$The.' '.$enemy.' BITES you for '.$edamagetotal.' damage.<br>';
    $message=
    "<span class='dred attackMath'>( $edamage1 + $edamage2 ) = $edamagetotal</span>
    <p>$The <strong class=''> $enemy </strong> <strong class='dred'> BITES </strong>  you for <strong class='attackBig dred'>$edamagetotal</strong></p>"; 

    include('update_feed_alt.php'); // --- update feed
    // $otherAttackCheck = 1;
    }
    // ---------------------------------------------------------------------------------------- ENEMY POISON ATTACK
    elseif ($infight == 1 && $enemyhp > 0  && $_SESSION['ePoison'] >= 1 && $_SESSION['poisonyou'] < 1) {

        if ($poisonimmune > 0) {
            echo $message="<span class='attackMath dgreen'>You are immune to poison for ".$_SESSION['poisonimmune']." clicks</span><br>";
                include('update_feed_alt.php'); // --- update feed
                
        } 
        else if ($ddgecheck <= $ddge || $enemyhealchance == 1){
            // no poison damage if you dodge attack
            // no poison damage if you enemy is healing
        }
        elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['ePoison'] ==1 && $_SESSION['poisonyou'] < 1) { // ENEMY POISONS YOU LEVEL 1) 1-lvl/2
            $poisonMax = $level/2;
            $poisonyou = $_SESSION['poisonyou'] = rand(1, $poisonMax);
        } elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['ePoison'] ==2 && $_SESSION['poisonyou'] < 1) { // ENEMY POISONS YOU LEVEL 2) 1-lvl
            $poisonMax = $level;
            $poisonyou = $_SESSION['poisonyou'] = rand(1, $poisonMax);
        }
        echo ''.$The.' '.$enemy.' attacks with poison and hits you for '.$edamagetotal.' damage.<br>';
        $message=
        "<span class='dgreen attackMath'>$edamage - $eblock = $edamagetotal</span>
		<p>$The <strong class=''> $enemy </strong> <strong class='dgreen'> ATTACKS </strong> you for <strong class='attackBig dgreen'>$edamagetotal</strong></p>"; 
        include('update_feed_alt.php'); // --- update feed

        if ($_SESSION['poisonyou']>0) { // ------- Poison on YOU
          //  $poisonyou = $_SESSION['poisonyou'] = $_SESSION['poisonyou'] - 1;
            if ($poisonyou > 0) {
            //    echo "You are poisoned for $poisonyou<br>";
                //$message="You are <span class='green'>poisoned</span> for <span class='green'>$poisonyou </span>";
            //    $message="<span class='attackMath'> You are <span class='green'>poisoned</span> for <strong class='attackBig green'>$poisonyou </strong></span>";
            //    include('update_feed_alt.php'); // --- update feed
             //           $results = $link->query("UPDATE $user SET hp = hp - $poisonyou"); // subtract enemy hp w/ poison
            }
        }
    }
    // ---------------------------------------------------------------------------------------- ENEMY MAG ATTACK // USES MAG AS DEF
    //<span class='total blue'>$edamagetotal</span><br>
    elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['eMag'] == 1) {
        $eblock = rand(0, $magmod) + $blockAmt;	// new mag block
    $edamagetotal = $edamage - $eblock;		// new damage
    if ($edamagetotal <= 0) {
        $edamagetotal = 0;
    } // if negative damage make 0
        echo ''.$The.' '.$enemy.' casts a spell at you for '.$edamagetotal.' damage.<br>';
//        $message=" $The $enemy casts a spell at you
        //	<span class='attack blue'>$edamage - $eblock = $edamagetotal</span><br>";
        $message=
        "<span class='blue attackMath'>$edamage - $eblock = $edamagetotal</span>
		<p>$The <strong class='blue'> $enemy </strong> casts a spell at you for <strong class='attackBig blue'>$edamagetotal</strong></p>";
        include('update_feed_alt.php'); // --- update feed
        // $otherAttackCheck = 1;
    }
    // ---------------------------------------------------------------------------------------- ENEMY PROJ ATTACK // USES DEX AS DEF
    //<span class='total green'>$edamagetotal</span><br>
    elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['eDex']==1) {
        $eblock = rand(0, $dexmod)+ $blockAmt;	// new dex block
    $edamagetotal = $edamage - $eblock;	 	// new damage
    if ($edamagetotal <= 0) {
        $edamagetotal = 0;
    } // if negative damage make 0
        echo ''.$The.' '.$enemy.' attacks you for '.$edamagetotal.' damage.<br>';
        $message=" $The $enemy attacks you
	<span class='attack green'>$edamage - $eblock = $edamagetotal</span><br>";

    $message=
    "<span class='green attackMath'>$edamage - $eblock = $edamagetotal</span>
    <p>$The <strong class='green'> $enemy </strong> attacks you for <strong class='attackBig green'>$edamagetotal</strong></p>";
        include('update_feed_alt.php'); // --- update feed
        // $otherAttackCheck = 1;
    }
    // ---------------------------------------------------------------------------------------- ENEMY PICKPOCKET
    elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['eSteal'] >=1 && ($enemyrandpickpocket == 1)) {
     //   $pickpocketAMT = rand(1, $level*3);		// coin amt old
        $pickpocketAMT = rand(1, $enemyatt);		// coin amt
       // $results = $link->query("UPDATE $user SET currency = currency - $pickpocketAMT");

        $updates = [ // -- set changes
            'currency' => $currency - $pickpocketAMT
        ]; 
        updateStats($link, $username, $updates); // -- apply changes


        echo ''.$The.' '.$enemy.' pickpockets '.$pickpocketAMT.' '.$_SESSION['currency'].' from you!<br>';
        $message="<span class='gold attackMath'>rand(1,$enemyatt) = $pickpocketAMT</span>
        $The $enemy <strong class='gold'>PICKPOCKETS</strong> <strong class='attackBig gold'>$pickpocketAMT ".$_SESSION['currency']."</strong><br>";
        include('update_feed_alt.php'); // --- update feed
        $edamagetotal = 0; // SO NO DAMAGE HAPPENS TO YOU, since enemy pickpocketed you.
    }
    // ---------------------------------------------------------------------------------------- ENEMY BASE ATTACK!!!
    elseif ($infight == 1 && $enemyhp > 0) {
        echo ''.$The.' '.$enemy.' attacks you for '.$edamagetotal.' damage.<br>';
        $message=
        "<span class='red attackMath'>$edamage - $eblock = $edamagetotal</span>
		<p>$The <strong class='red'> $enemy </strong> attacks you for <strong class='attackBig red'>$edamagetotal</strong></p>"; 
        include('update_feed_alt.php'); // --- update feed
    }    
    


    
    while ($row = $result->fetch_assoc()) {
        $hp=$row['hp'];
    }

    echo '$damagetotal: '.$damagetotal.'<br>';

    echo 'enemyHP: '.$enemyhp.'<br>';

    // --------------------------------------------------------------------------------------------REMOVE HP FROM YOU!!!
    // --------------------------------------------------------------------------------------------REMOVE HP FROM YOU!!!
    // --------------------------------------------------------------------------------------------REMOVE HP FROM YOU!!!
if ($enemyhp >0) { // ONLY REMOVE HP IF STILL IN FIGHT // ENEMY STILL ALIVE
// If you dodged damage is 0, OR if battle is over, or enemy hp is 0 or less
    if ($youDodge == 1 || $infight==0 || $enemyhp <=0) {
        $edamagetotal=0;
    } 
    if ($_SESSION['magicarmor_amount'] > 0) { // --- remove from magic armor first
            $_SESSION['magicarmor_amount'] =  $_SESSION['magicarmor_amount']  - $edamagetotal;
        if ($_SESSION['magicarmor_amount'] <= 0) { // magic armor run out, set remainder
            $remainder = $_SESSION['magicarmor_amount'] - $_SESSION['magicarmor_amount'] - $_SESSION['magicarmor_amount'];
        // $results = $link->query("UPDATE $user SET hp = hp - $remainder");
            $updates = [ // -- set changes
                'hp' => $hp - $remainder
            ]; 
            updateStats($link, $username, $updates); // -- apply changes
        }
    } else {  // SUBTRACT YOUR HP!!!
        // $results = $link->query("UPDATE $user SET hp = hp - $edamagetotal");  // SUBTRACT YOUR HP!!!
        echo 'hp'.$hp.'<br>';
        echo 'edamagetotal'.$edamagetotal.'<br>';
        $updates = [ 'hp' => $hp - $edamagetotal]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
}

    $eMultiCheck = rand(1, 100); // enemy multi hit rand
    //echo 'EMULTI: '.$eMultiCheck;

    if ($enemyhp > 0 && $enemyhp>0 && (($eMultiCheck < ($_SESSION['eMulti'] *10)) || $_SESSION['eAlwaysHit']>=1)) { // LVL * 10% chance of ENEMY MULTI ATTACK
        $enemyLoop = 1;
        $_SESSION['eAlwaysHit'] = $_SESSION['eAlwaysHit'] - 1;
        $enemyLoopCount = $enemyLoopCount + 1;
        echo $message="<strong class='multiHit'>hit ".$enemyLoopCount." </strong>";
        include('update_feed_alt.php'); // --- update feed


        // ================================================================= REDO !!! BATTLE MATH - COPIED FROM ABOVE, FOR ENEMY MULTI HIT
        if ($_SESSION['ironskin_amount']>0) {	 // ironskin rand
            $ironskin_rand = rand(1, $_SESSION['ironskin_amount']);
        } else {
            $ironskin_rand = 0;
        }

        $edamage = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $eblock = rand(0, $defmod) + $blockAmt + $ironskin_rand;
        $edamagetotal = $edamage - $eblock;
        if ($_SESSION['ePureA'] >= 1) {
            $edamagetotal = $enemyatt;
        }	// enemy pure attack check



        if ($edamagetotal <= 0) {
            $edamagetotal = 0;
        } // if negative damage make 0
    }	// END MULTI ATTACK CHECK

    else {
        $enemyLoop = 0;
    }
} // ------ end enemy attack loop





//echo 'XXXXXXX:'.$poisonimmune;
// ------------------------------------------------------------------------------------------------------------------ POISON YOU
// -------------------------DB QUERY! // ----------------------------- Poison Recalculate enemy HP
$stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();
if (!$result) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------recalculate variables for poison
while ($row = $result->fetch_assoc()) {
    $enemyhp=$row['enemyhp'];
}
if ($poisonimmune > 0) {
    echo $message="<span class='attackMath dgreen'>You are immune to poison for ".$_SESSION['poisonimmune']." clicks</span><br>";
        include('update_feed_alt.php'); // --- update feed
        
} 
else if ($ddgecheck <= $ddge || $enemyhealchance == 1){
    // no poison damage if you dodge attack
    // no poison damage if you enemy is healing
}
/* elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['ePoison'] ==1 && $_SESSION['poisonyou'] < 1) { // ENEMY POISONS YOU LEVEL 1) 1-lvl/2
    $poisonMax = $level/2;
    $poisonyou = $_SESSION['poisonyou'] = rand(1, $poisonMax);
} elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['ePoison'] ==2 && $_SESSION['poisonyou'] < 1) { // ENEMY POISONS YOU LEVEL 2) 1-lvl
    $poisonMax = $level;
    $poisonyou = $_SESSION['poisonyou'] = rand(1, $poisonMax);
}
*/

$poisonyou = 0;
if ($_SESSION['poisonyou']>0) { // ------- Poison on YOU
    $poisonyou = $_SESSION['poisonyou'] = $_SESSION['poisonyou'] - 1;
    if ($poisonyou > 0) {
        echo "You are poisoned for $poisonyou<br>";
        //$message="You are <span class='green'>poisoned</span> for <span class='green'>$poisonyou </span>";
        $message="<span class='clear attackMath'> You are <strong class='dgreen'>POISONED</strong> for <strong class='dgreen'>$poisonyou </strong></span>";
        include('update_feed_alt.php'); // --- update feed
              //  $results = $link->query("UPDATE $user SET hp = hp - $poisonyou"); // subtract enemy hp w/ poison

                $updates = [ // -- set changes
                    'hp' => $hp - $poisonyou
                ]; 
                updateStats($link, $username, $updates); // -- apply changes
    }
}









$message="</div>"; // ---- END BAttle Box 2
include('update_feed_alt.php'); // --- update feed



    // ---------------------------------------------------------------HP SUMMARY BETWEEN BOXES!
    //	if ($hp < $hpmax) {
    if (1 == 1) {

        //$edamagetotalReal = $edamagetotal + $poisonyou + $edamagemulti;
        $edamagetotalReal = $edamagetotal + $poisonyou;
        $hpleft = $hp - $edamagetotalReal;
        $damagetotal = $damagetotal + $petDamage + $compDamage + $_SESSION['poison_amt'] - $eHealAmount;

        $hpPercent = ($hpleft / $hpmax) * 100;
        $hpLostPercent = ($edamagetotalReal / $hpmax) * 100;
        $enemyhpPercent = ($enemyhp / $enemyhpmax) * 100;
        $enemyhpLostPercent = ($damagetotal / $enemyhpmax) * 100;

        $barChangeColor = "yellow"; 
        $direction = "-";
        $hpcolor="red";
        if ($hpleft <= 0) {
            $hpcolor="darkred";
           // $barChangeColor = "darkred";
        }
        if ($edamagetotalReal > 0) {
           // $hpcolor="lightgreen";
           // $barChangeColor="lightgreen";
        }
        else if ($edamagetotalReal == 0) {
            $hpcolor="gray";
            $barChangeColor="gray";
            $direction = "";

        }
        else if ($edamagetotalReal < 0) {
            $barChangeColor = "lightred";
            $hpcolor="lightred";
            $edamagetotalReal = $edamagetotalReal * -1; // Makes the negative a positive
            $direction = "+";
        }
        $ebarChangeColor = "yellow";
        $edirection = "-";
        $ehpcolor="red";
        if ($damagetotal == 0) {
            //$ehpcolor="gray";
            //$ebarChangeColor="gray";
            $edirection = "";

        }
        else if ($damagetotal < 0) {
            $ebarChangeColor = "lightred";
            $ehpcolor="lightred";
            $damagetotal = $damagetotal * -1; // Makes the negative a positive
            $edirection = "+";
        }
        

    //echo 'damagetotal'.$damagetotal;



        $message = '
        <div class="roundSummary">
        <div class="split">
        <span class="darkgray small">'.$level.'</span>
        <span class="gray small">'.$username.'</span>
        <strong class="'.$hpcolor.'">'.$hpleft.'</strong>
        <span class="'.$hpcolor.' small">hp</span>
        
                <div class="right">
                    <strong class="'.$barChangeColor.'">'.$direction.''.$edamagetotalReal.' </strong>
                </div>
            <div class="bar">	
                <div style="width: '.$hpPercent.'%" class="barMid redBG"></div>
                <div style="width: '.$hpLostPercent.'%" class="barMid '.$barChangeColor.'BG"></div>
            </div>
        </div>
        <div class="split alignR">
                <div class="left">  
                    <strong class="yellowX '.$ebarChangeColor.' ">'.$edirection.''.$damagetotal.' </strong>
                </div>
                <strong class="red ">'.$enemyhp.'</strong>
                <span class="red small">hp</span>
                <span class="gray small">'.$enemy.'</span>
                <span class="darkgray small">'.$_SESSION['eLvl'].'</span>
                <div class="bar flex-end">	
                <div style="width: '.$enemyhpLostPercent.'%" class="barMid '.$ebarChangeColor.'BG right"></div>
                <div style="width: '.$enemyhpPercent.'%" class="barMid '.$ehpcolor.'BG right"></div>
            </div>
        </div>
    </div>';
    

    include ('update_feed_alt.php'); // --- update feed
    }

    // ---------------------------------------------------------------BATTLE BOX END!

          // ------------------------ end normal battle box if no death
  //if ($enemyhp > 0) {
  

              //  $message="</div>";
        //  include('update_feed_alt.php'); // --- update feed
      
          $message = "</div>"; // --- end of BATTLE FRAME
          include('update_feed_alt.php'); // --- update feed
   //   }



    // ------------------------ ENEMY DIES
    if ($enemyhp <= 0 && $infight >=1) {
        $_SESSION['poison_amt']=0; // reset poison on enemy death
      $enemyLoop = 0; // resets enemy multi loop
     // $message="</div></div>";
     // include('update_feed_alt.php'); // --- update feed
        include('battle-win.php');
    }

//	$message = "<div class='defeated'> <strong>$enemy defeated! </strong></div>"; // BATTLE HUD // so the close div doesnt mess up the HUD

//$message="</div>"; // ---END BATTLE FRAME
//	include ('update_feed_alt.php'); // --- update feed
