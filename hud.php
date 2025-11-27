<?php

// ----------------------------------------------------------------------------- HUD GROUP

// // -------------------------DB CONNECT!
// include('db-connect.php');
// // -------------------------DB QUERY!
// $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
// $stmt->bind_param("s", $_SESSION['username']);
// $stmt->execute();
// $result = $stmt->get_result();
// if (!$result) {
//     die('There was an error running the query [' . $link->error . ']');
// }
// // -------------------------DB OUTPUT!
// while ($row = $result->fetch_assoc()) {

$row = getUserData($link, $_SESSION['username']); // --- gets all user data from database

//------------------------------------ BATTLE STATUS

    $hp = $row['hp'];
    $hpmax = $row['hpmax'];
    $mp = $row['mp'];
    $mpmax = $row['mpmax'];
    $str = $row['str'];
    $mag = $row['mag'];
    $dex = $row['dex'];
    $def = $row['def'];

    
    // $_SESSION['magmod'] = $row['magmod'];
    // $_SESSION['dexmod'] = $row['dexmod'];
    // $defmod = $row['defmod'];

    $enemy = $row['enemy'];
    $enemyhpmax = $row['enemyhpmax'];
    $enemyhp = $row['enemyhp'];
    $enemyatt = $row['enemyatt'];
    $enemydef = $row['enemydef'];

    $infight = $row['infight'];
    $endfight = $row['endfight'];
    $weapontype = $row['weapontype'];

    $currency = $row['currency'];

    //  HP Percent
    $percent = (($hp / $hpmax)* 100);
    if ($percent > 100) {
        $percent = 100;
    }

    //$barBGcolor = 'blackBG';
    $barBGcolor = 'redBG';
    $barNUMcolor = 'lightgray';

    $enemyLVL = $_SESSION['eLvl'];			// enemy level



    //  $uncookedmeat = $row['uncookedmeat'];
    //  $uncookedmeat = $row['uncookedmeat']; ?>



<?php
    if ($infight >= 1) {
        $hudActive = "inBattle";
    } else {
        $hudActive = "";
    }



    echo '<div id="hud" class="'.$hudActive.'">'; ?>
<?php


if ($infight >= 1) {



// ----------------------------------------------------------------------------------------------------------- UBOX
    echo '<div id="uBox">';

    echo '<strong class="user"> <span class="lvlBox"> '.$level.' </span> '.$row['username'].'</strong>';

    echo   '<div class="statBarsXXX">
		<div class="bar hpBar">
        <div class="barStat">
        <strong class=""> '.$hp.'</strong><span class="small lgray">/'.$hpmax.'</span>
        </div>
		<div style="width: '.$percent.'%" class="barMid '.$barBGcolor.'">
		</div>
		</div>';
   

    // MP Percent
    $percent = (($mp / $mpmax)* 100);
    if ($percent > 100) {
        $percent = 100;
    }
    //$percent = $percent * $scale;

    $extramp = $row['mp'] - $row['mpmax'];

    if ($mp >  $mpmax) {
        //		 $barBGcolor = 'yellowBG';
        //		 $barNUMcolor = 'darkgray';

        $barBGcolor = 'blueBG';
        $barNUMcolor = 'lightgray';
    //echo '<li><span class="blue">MP </span> <span class="yellow">'.$mp.' </span> / '.$mpmax;
    } else {
        $barBGcolor = 'blueBG';
        $barNUMcolor = 'lightgray';
        //echo '<li><span class="blue">MP</span> '.$mp.' / '.$mpmax;
    }

    //if ($mp>$mpmax) {$mp=$mpmax;} // show max mp if mp is more than max

    echo '
	<div class="bar mpBar">
    <div class="barStat"><strong class=""> '.$mp.'</strong><span class="small lgray">/'.$mpmax.'</span>
    </div>
	<div style="width: '.$percent.'%" class="barMid '.$barBGcolor.'">
    </div>
    </div>';
    /*
        if ( $row['mp'] >  $row['mpmax'] ) // HP EXTRA
        {
        echo '<span class="extrahpBox mpBox">'.$extramp.'</span>';
        }
    */

    $level = $row['level'];
    $nxlevel = $level + 1;
    $xp = $row['xp'];


    // --- EASY ORIGINAL LEVELING
    $nextlevel = ($level+1) * ($level+1) * ($level+1);
    $prevlevel = $level * $level * $level;

    // --- DOUBLE ORIGINAL LEVELING
    $nextlevel = (($level+1) * ($level+1) * ($level+1))*2;
    $prevlevel = ($level * $level * $level)*2;

   // $nextlevel = ($level+1) * ($level+1) * ($level+1) * ($level+1); // activate for hard / slow leveling // TOO SLOW
   // $prevlevel = $level * $level * $level * $level; // activate for hard / slow leveling // TOO SLOW

    $num_total = $nextlevel - $prevlevel;
    $num_xp = $xp - $prevlevel;
    $need = $nextlevel - $xp;
    $levelxp = $xp - $prevlevel;

    $count1 = $num_xp / $num_total;
    $count2 = $count1 * 100;
    $count = number_format($count2, 0);

    // XP Percent
    $percent = $count2;
    if ($percent > 100) {
        $percent = 100;
    }
    if ($percent < 0) {
        $percent = 0;
    }
    //$percent = $percent * $scale;

    $barBGcolor = 'greenBG';
    $barNUMcolor = 'lightgray';

    echo '</div>';

    // --------------------------------------------------------------------------- HP NUMBERS
if ($row['hp'] >  $row['hpmax']) { // HP EXTRA
            $barBGcolor = 'redBG';
    $barNUMcolor = 'lightgray';
    $extrahp = $row['hp'] - $row['hpmax'];
}

    if ($_SESSION['magicarmor_amount'] >  0) {
        echo '<span class="red magicarmorBox">+'.$_SESSION['magicarmor_amount'].'</span>';
    }

    echo '<div>';
  //  echo '
//		<span><strong class="red"> '.$hp.'</strong>hp</span>
//		<span><strong class="blue"> '.$mp.'</strong>mp</span>'; 
        // <span>/'.$hpmax.'hp</span>  //<span>/'.$mpmax.'mp</span>';

    // --------------------------------------------------------------------------- Magic Armor Buff Box

    echo '<div class="statBox">';


    if ($weapontype == 3) {
        echo '<span class="small lgray">DEX</span> <strong class="green">'.$_SESSION['dexmod'].' </strong> ';
    } elseif ($_SESSION['magmod'] > $_SESSION['strmod'] && $_SESSION['magmod'] > $_SESSION['dexmod']) {
        echo '<span class="small lgray">MAG</span> <strong class="blue">'.$_SESSION['magmod'].' </strong>';
    } else {
        echo '<span class="small lgray">STR</span> <strong class="red">'.$_SESSION['strmod'].' </strong>';
    }


    echo '<span class="small lgray">DEF</span> <strong class="gold">'.$_SESSION['defmod'].' </strong>
			</div>';
    echo '<div class="buffbound small">';

    // --------------------------------------------------------------------------- Poison Buff Box
    if ($_SESSION['poisonyou'] >  0) {
        echo '<span class="green buffBox">poisoned '.$_SESSION['poisonyou'].'</span>';
    }
    // --------------------------------------------------------------------------- COLORS Box
    if ($_SESSION['reds'] >  0) {
        echo '<span class="red buffBox">str</span>';
    }
    if ($_SESSION['greens'] >  0) {
        echo '<span class="green buffBox">dex</span>';
    }
    if ($_SESSION['blues'] >  0) {
        echo '<span class="blue buffBox">mag</span>';
    }
    if ($_SESSION['yellows'] >  0) {
        echo '<span class="gold buffBox">def</span>';
    }
    if ($_SESSION['coffee'] >  0) {
        echo '<span class="lightbrown buffBox">java</span>';
    }
    if ($_SESSION['tea'] >  0) {
        echo '<span class="yellowgreen buffBox">tea</span>';
    }
    // --------------------------------------------------------------------------- Iron Skin Buff Box
    if ($_SESSION['ironskin_amount'] >  0) {
        echo '<span class="lightbrown buffBox">ironskin +'.$_SESSION['ironskin_amount'].'</span>';
    }
    // --------------------------------------------------------------------------- Regenerate Buff Box
    if ($_SESSION['regenerate_clicks'] >  0) {
        echo '<span class="red buffBox">regen +'.$row['regenerate'].'</span>';
    }
    // --------------------------------------------------------------------------- Flying Buff Box
    if ($_SESSION['flying'] >  0) {
        echo '<span class="blue buffBox">wings</span>';
    }
    // --------------------------------------------------------------------------- Breathing Water Buff Box
    if ($_SESSION['breathingwater'] >  0) {
        echo '<span class="darkblue buffBox">gills</span>';
    }

    echo '</div>'; 	// end buffbound box
    echo '</div>';
    echo '</div>';	// end uBox




    // Enemy HP Percent
    $epercent = (($enemyhp / $enemyhpmax)* 100);
    if ($percent > 100) {
        $percent = 100;
    }

    echo '<div id="eBox">';     // ENEMY BATTLE BOX
    echo '
		<strong class=""> '.$enemy.' <span class="lvlBox"> '.$enemyLVL.' </span></strong>
		<div class="bar">
		<div class="barStat">
        <strong class=""> '.$enemyhp.'</strong><span class="small lgray">/'.$enemyhpmax.'</span>
		</div>		
        <div style="width: '.$epercent.'%" class="barMid redBG">

		</div>
		</div>

		<div>
		<div class="statBox">
		<span class="small lgray"> eATT </span><strong class="red">'.$enemyatt.'</strong>
		<span class="small lgray"> eDEF </span><strong class="gold">'.$enemydef.'</strong>
		</div>
		';
//		<strong class="red"> '.$enemyhp.'</strong><span>/'.$enemyhpmax.'hp</span>
    echo'
		<span class="buffbound small">';
    if ($_SESSION['eFly'] >= 1) {
        echo '<span class="buffBox blue">Flying</span>';
    }
    if ($_SESSION['eCrit'] >= 1) {
        echo '<span class="buffBox white">Crit</span>';
    }
    if ($_SESSION['eWhirlwind'] >= 1) {
        echo '<span class="buffBox lightblue">WW</span>';
    }
    if ($_SESSION['eRage'] >= 1) {
        echo '<span class="buffBox red">Rage</span>';
    }
    if ($_SESSION['eDragonFire'] >= 1) {
        echo '<span class="buffBox red">DragonFire</span>';
    }
    if ($_SESSION['ePow'] >= 1) {
        echo '<span class="buffBox red">Pow</span>';
    }
    if ($_SESSION['eBite'] >= 1) {
        echo '<span class="buffBox red">Bite</span>';
    }
    if ($_SESSION['eDex'] >= 1) {
        echo '<span class="buffBox green">Range</span>';
    }
    if ($_SESSION['eMag'] >= 1) {
        echo '<span class="buffBox blue">Mag</span>';
    }
    if ($_SESSION['eHeal'] >= 1) {
        echo '<span class="buffBox green">Heal</span>';
    }
    if ($_SESSION['eSteal'] >= 1) {
        echo '<span class="buffBox gold">Steal'.$_SESSION['eSteal'].'</span>';
    }
    if ($_SESSION['eMulti'] >= 1) {
        echo '<span class="buffBox purple">Multi '.$_SESSION['eMulti'].'</span>';
    }
    if ($_SESSION['eDoubleHit'] >= 1) {
        echo '<span class="buffBox white">2x Hit</span>';
    }
    if ($_SESSION['eTripleHit'] >= 1) {
        echo '<span class="buffBox white">3x Hit</span>';
    }
    if ($_SESSION['ePureA'] >= 1) {
        echo '<span class="buffBox eBox red">Pure A</span>';
    }
    if ($_SESSION['ePureD'] >= 1) {
        echo '<span class="buffBox eBox gold">Pure D</span>';
    }
    if ($_SESSION['eStrImm'] >= 1) {
        echo '<span class="buffBox eBox red">Str Imm</span>';
    }
    if ($_SESSION['eDexImm'] >= 1) {
        echo '<span class="buffBox eBox green">Dex Imm</span>';
    }
    if ($_SESSION['eMagImm'] >= 1) {
        echo '<span class="buffBox eBox blue">Mag Imm</span>';
    }
    if ($_SESSION['eDodge'] >= 1) {
        echo '<span class="buffBox eBox green">Dodge '.$_SESSION['eDodge'].'</span>';
    }
    if ($_SESSION['ePoison'] >= 1) {
        echo '<span class="buffBox eBox green">Poison '.$_SESSION['ePoison'].'</span>';
    }
    echo '</span>';

    echo '</div>';

    echo '</div>';     // END E BOX




    echo '<span class="vsBox">vs</span>';     // VS CIRCLE





    $activeAtt = "active";
    $activeMag ="";
    $tabType = "";
    if ($weapontype == 3 && ($_SESSION['magmod'] < $_SESSION['dexmod'])) {
        $tabType = "dex";
    } elseif ($_SESSION['magmod'] >= $_SESSION['strmod']) {
        $activeAtt = "";
        $activeMag ="active";
    }

    echo'
  <div class="battleBlock">

  <div class="battleTabs">';

    if ($weapontype == 3) {
        echo '<a href="/" class="btn '.$activeAtt.' '.$tabType.'" data-link="battle-actions"><i class="icon-bow-arrow"></i> Actions</a>';
    } else {
        echo '<a href="/" class="btn '.$activeAtt.'" data-link="battle-actions"><i class="icon-crossed-swords"></i> Actions</a>';
    }

    echo' <a href="/" class="btn '.$activeMag.'" data-link="battle-magic"><i class="icon-fireball"></i> Spells</a>
  	<a href="/" class="btn " data-link="battle-bag"><i class="icon-backpack"></i> Items</a>
  </div>
  <div class="battleTab '.$activeAtt.' '.$tabType.'" data-pop="battle-actions">';
    echo '<h4>Attacks</h4><br/>';


    echo '<div class="item-flex">'; // item flex box
    // --------------------------------------------------------------------- basic ATTACK
    if ($weapontype == 3) {
        $maxhit = $_SESSION['dexmod'];
        $color = 'green';
       // $icon = "bowarrow";
    } else {
        $maxhit = $_SESSION['strmod'];
        $color = 'red';
        //$icon = "sword1";
       // if ($weapontype == 2) {$icon = "axe1";}
    } 
    $icon = $row['equipR'];
    
        echo '<button class="itembox" type="submit" name="input1" value="attack">
                <span class="icon '.$color.'">'.file_get_contents("img/svg/equipment/".$icon.".svg").'</span>
                <p class="">Basic </p>
                <strong class="'.$color.'">Attack</strong>
                <br/><span class="gray small">'.$maxhit.' max damage</strong>
                </button>';

    // --------------------------------------------------------------------- 1h SLICE
    if ($slice >= 1  && $weapontype==1) {
        if ($mp < $slice_cost_cast) { $disabled="disabled";} else { $disabled="";} // disabled check
        echo '
                <button class="itembox '.$disabled.'" type="submit" name="input1" value="slice">
                <span class="icon red">'.file_get_contents("img/svg/slice.svg").'</span>
                <p class="">lvl '.$slice.'</p>
                <strong class="red">Slice</strong>
                <p class=" qty">'.$slice_cost_cast.'mp</p>
                </button>';
        }

        // --------------------------------------------------------------------- 2h SMASH
        if ($smash >= 1  && $weapontype==2) {
            if ($mp < $smash_cost_cast) { $disabled="disabled";} else { $disabled="";} // disabled check
            echo '
                    <button class="itembox '.$disabled.'" type="submit" name="input1" value="smash">
                    <span class="icon red">'.file_get_contents("img/svg/smash.svg").'</span>
                    <p class="">lvl '.$smash.'</p>
                    <strong class="red">Smash</strong>
                    <p class=" qty">'.$smash_cost_cast.'mp</p>
                    </button>';
            }

         // --------------------------------------------------------------------- Ranged Attack SMASH
    if ($aim >= 1  && $weapontype==3) {
        if ($mp < $aim_cost_cast) { $disabled="disabled";} else { $disabled="";} // disabled check
        echo '
                <button class="itembox '.$disabled.'" type="submit" name="input1" value="aim">
                <span class="icon green">'.file_get_contents("img/svg/aim.svg").'</span>
                <p class="">lvl '.$aim.'</p>
                <strong class="green">Aim</strong>
                <p class=" qty">'.$aim_cost_cast.'mp</p>
                </button>';
        }
        // --------------------------------------------------------------------- MAGIC STRIKE
        if ($magicstrike >= 1) {
            if ($mp < $magicstrike_cost_cast) { $disabled="disabled";} else { $disabled="";} // disabled check
            echo '
                    <button class="itembox '.$disabled.'" type="submit" name="input1" value="magic strike">
                    <span class="icon blue">'.file_get_contents("img/svg/magicstrike.svg").'</span>
                    <p class="">lvl '.$magicstrike.'</p>
                    <strong class="blue">Magic Strike</strong>
                    <p class="qty">'.$magicstrike_cost_cast.'mp</p>
                    </button>';
            }
    

            echo '</div>'; // end item flex box




    echo '</div>
  <div class="battleTab '.$activeMag.'" data-pop="battle-magic">';


  include('spellbox.php');



    echo '</div>


  <div class="battleTab" data-pop="battle-bag">';

  include('bagbox.php');



    

echo '<p class="padd">
<span class="btn" data-link2="bag">View all items</span>
</p>';

    echo '</div>';


    //if ($infight >=1) {
    echo '<input class="retreatBtn" type="submit" name="input1" value="retreat" />';
    //echo '<style>.battleBlock{display:block;}</style>';
    //}

    echo '</div>';
} // END in in battle
    echo '</div>'; 	// end HUD
    
// }
