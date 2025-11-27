<?php


 
    // ---------------------------------------------------------------------------------- // START SKILL VARIABLES
    // ---------------------------------------------------------------------------------- // START SKILL VARIABLES
    // ---------------------------------------------------------------------------------- // START SKILL VARIABLES
    $level = $row['level'];
    $xp = $row['xp'];
    $hp = $row['hpmax'];
    $mp = $row['mpmax'];
    $cp = $row['cp'];
    $tp = $row['tp'];
    $sp = $row['sp'];

    $currency = $row['currency'];
    $toopoor = $_SESSION['toopoor'];
    $notenoughcp = $_SESSION['notenoughcp'];
    $notenoughsp = $_SESSION['notenoughsp'];

    $quest4 = $row['quest4']; // 1h, 2h, LVL 5
    $teleport2 = $row['teleport2']; // 1h, 2h, LVL 10
    $quest19 = $row['quest19']; // Warriors Guild Initiation
    $quest20 = $row['quest20']; // Wizards Guild Initiation
    $quest70 = $row['quest70']; // Camp Hero access



    $youngsoldierFlag = $row['youngsoldierFlag'];
    $jacklumberFlag = $row['jacklumberFlag'];
    $hunterbillFlag = $row['hunterbillFlag'];
    $travelingwarriorFlag = $row['travelingwarriorFlag'];
    $travelingwizardFlag = $row['travelingwizardFlag'];
    $warriorskillFlag = $row['warriorskillFlag'];
    $wizardskillFlag = $row['wizardskillFlag'];
    $miningskillFlag = $row['miningskillFlag'];
    $rangerskillFlag = $row['rangerskillFlag'];
    $mastertrainerFlag = $row['mastertrainerFlag'];
    $starcitysskillsFlag = $row['starcitysskillsFlag'];
    $starcityspellsFlag = $row['starcityspellsFlag'];

    // ----------------------------------------------------------------------------------One Handed MATH
    $onehanded = $row['onehanded'];
    $onehanded_cost = $onehanded_new = $onehanded + 1;
    if ($row['starcitysskillsFlag'] >= 1) {
        $onehanded_max = 25;
    }			// blue city
    elseif ($row['warriorskillFlag'] >= 1) {
        $onehanded_max = 20;
    }		// warriors guild
    elseif ($row['travelingwarriorFlag'] >= 1) {
        $onehanded_max = 10;
    }	// traveling warrior
    elseif ($row['youngsoldierFlag'] >= 1) {
        $onehanded_max = 5;
    }			// young soldier
    else {
        $onehanded_max = 0;
    }
    if ($onehanded_cost > $onehanded_max && $onehanded_max > 0) {
        $onehanded_cost = 'max';
    }
    // ----------------------------------------------------------------------------------One Handed PRO MATH - PRO SKILL
    $costmultiplier = 5;
    $onehandedpro = $row['onehandedpro'];
    $onehandedpro_cost = ($onehandedpro+1) * $costmultiplier;
    $onehandedpro_new = $onehandedpro + 1;
    if ($row['starcitysskillsFlag'] >= 1 && $row['onehanded'] >= 25  ) { // camphero && onehanded 25
        $onehandedpro_max = 10;
    }
    else if ($row['mastertrainerFlag'] >= 1 && $row['onehanded'] >= 20  ) { // master trainer && one handed 20
        $onehandedpro_max = 5;
    }			
    else if ($row['mastertrainerFlag'] >= 1) { // master trainer NO one handed 20
        $onehandedpro_max = 0;
    }		
    else {
        $onehandedpro_max = 0;
    }
    if ($onehandedpro >= $onehandedpro_max && $onehandedpro_max > 0) {
        $onehandedpro_cost = 'max';
    }

    // ----------------------------------------------------------------------------------Two Handed MATH
    $twohanded = $row['twohanded'];
    $twohanded_cost = $twohanded_new = $twohanded + 1;
    if ($row['starcitysskillsFlag'] >= 1) {
        $twohanded_max = 25;
    }			// blue city
    elseif ($row['warriorskillFlag'] >= 1) {
        $twohanded_max = 20;
    }		// warriors guild
    elseif ($row['travelingwarriorFlag'] >= 1) {
        $twohanded_max = 10;
    }	// traveling warrior
    elseif ($row['youngsoldierFlag'] >= 1) {
        $twohanded_max = 5;
    }			// young soldier
    else {
        $twohanded_max = 0;
    }
    if ($twohanded_cost > $twohanded_max && $twohanded_max > 0) {
        $twohanded_cost = 'max';
    }

    // ----------------------------------------------------------------------------------two Handed PRO MATH - PRO SKILL
    $costmultiplier = 5;
    $twohandedpro = $row['twohandedpro'];
    $twohandedpro_cost = ($twohandedpro+1) * $costmultiplier;
    $twohandedpro_new = $twohandedpro + 1;
    if ($row['starcitysskillsFlag'] >= 1 && $row['twohanded'] >= 25  ) { // camphero && twohanded 25
        $twohandedpro_max = 10;
    }
    else if ($row['mastertrainerFlag'] >= 1 && $row['twohanded'] >= 20  ) { // master trainer && two handed 20
        $twohandedpro_max = 5;
    }			
    else if ($row['mastertrainerFlag'] >= 1) { // master trainer NO two handed 20
        $twohandedpro_max = 0;
    }		
    else {
        $twohandedpro_max = 0;
    }
    if ($twohandedpro >= $twohandedpro_max && $twohandedpro_max > 0) {
        $twohandedpro_cost = 'max';
    }


    // ----------------------------------------------------------------------------------Ranged MATH
    $ranged = $row['ranged'];
    $ranged_cost = $ranged_new = $ranged + 1;
    if ($row['rangerskillFlag'] >= 1) {
        $ranged_max = 25;
    }		// ranged 30
    elseif ($row['hunterbillFlag'] >= 1) {
        $ranged_max = 15;
    }	// ranged 15
    elseif ($row['jacklumberFlag'] >= 1) {
        $ranged_max = 5;
    }	// ranged 5
    else {
        $ranged_max = 0;
    }
    if ($ranged_cost > $ranged_max && $ranged_max > 0) {
        $ranged_cost = 'max';
    }
    // ----------------------------------------------------------------------------------Ranged PRO MATH - PRO SKILL
    $costmultiplier = 5;
    $rangedpro = $row['rangedpro'];
    $rangedpro_cost = ($rangedpro+1) * $costmultiplier;
    $rangedpro_new = $rangedpro + 1;
    if ($row['starcitysskillsFlag'] >= 1 && $row['ranged'] >= 25  ) { // camphero && ranged 25
        $rangedpro_max = 10;
    }
    else if ($row['mastertrainerFlag'] >= 1 && $row['ranged'] >= 15  ) { // master trainer && ranged 15
        $rangedpro_max = 5;
    }			
    elseif ($row['mastertrainerFlag'] >= 1) { // master trainer NO ranged 20
        $rangedpro_max = 0;
    }		
    else {
        $rangedpro_max = 0;
    }
    if ($rangedpro >= $rangedpro_max && $rangedpro_max > 0) {
        $rangedpro_cost = 'max';
    }

    // ----------------------------------------------------------------------------------Warcaft MATH
    $warcraft = $row['warcraft'];
    $warcraft_cost = $warcraft_new = $warcraft + 1;
    if ($row['starcitysskillsFlag'] >= 1) {
        $warcraft_max = 25;
    }		// warcraft 30
    elseif ($row['mastertrainerFlag'] >= 1) {
        $warcraft_max = 20;
    }	    // warcraft 20
    else {
        $warcraft_max = 0;
    }
    if ($warcraft_cost > $warcraft_max && $warcraft_max > 0) {
        $warcraft_cost = 'max';
    }

    // ----------------------------------------------------------------------------------Toughness MATH
    $toughness = $row['toughness'];
    $toughness_cost = $toughness_new = $toughness + 1;
    if ($row['starcitysskillsFlag'] >= 1) {
        $toughness_max = 25;
    }			// blue city
    elseif ($row['warriorskillFlag'] >= 1) {
        $toughness_max = 20;
    }		// warriors guild
    elseif ($row['travelingwarriorFlag'] >= 1) {
        $toughness_max = 10;
    }	// traveling warrior
    elseif ($row['youngsoldierFlag'] >= 1) {
        $toughness_max = 5;
    }			// young soldier
    else {
        $toughness_max = 0;
    }
    if ($toughness_cost > $toughness_max && $toughness_max > 0) {
        $toughness_cost = 'max';
    }
    // ----------------------------------------------------------------------------------Block MATH
    $block = $row['block'];
    $block_cost = $block_new = $block + 1;
    if ($row['starcitysskillsFlag'] >= 1) {
        $block_max = 25;
    }			// blue city
    elseif ($row['warriorskillFlag'] >= 1) {
        $block_max = 10;
    }		// warriors guild
    else {
        $block_max = 0;
    }
    if ($block_cost > $block_max && $block_max > 0) {
        $block_cost = 'max';
    }
    // ----------------------------------------------------------------------------------Dodge MATH
    $ddge = $row['ddge'];
    $ddge_cost = $ddge_new = $ddge + 1;
    if ($row['rangerskillFlag'] >= 1) {
        $ddge_max = 10;
    }				// rangers guild
    elseif ($row['hunterbillFlag'] >= 1) {
        $ddge_max = 5;
    }		// hunter bill
    else {
        $ddge_max = 0;
    }
    if ($ddge_cost > $ddge_max && $ddge_max > 0) {
        $ddge_cost = 'max';
    }

    // ----------------------------------------------------------------------------------Slice MATH
    $slice = $row['slice'];
    $slice_cost = $slice_new = $slice + 1;
    if ($row['starcitysskillsFlag'] >= 1) {
        $slice_max = 25;
    }			// blue city
    elseif ($row['warriorskillFlag'] >= 1) {
        $slice_max = 10;
    }				// warriors guild
    elseif ($row['travelingwarriorFlag'] >= 1) {
        $slice_max = 5;
    }		// traveling warrior
    else {
        $slice_max = 0;
    }
    if ($slice_cost > $slice_max && $slice_max > 0) {
        $slice_cost = 'max';
    }
    // ----------------------------------------------------------------------------------Smash MATH
    $smash = $row['smash'];
    $smash_cost = $smash_new = $smash + 1;
    if ($row['starcitysskillsFlag'] >= 1) {
        $smash_max = 25;
    }			// blue city
    elseif ($row['warriorskillFlag'] >= 1) {
        $smash_max = 10;
    }				// warriors guild
    elseif ($row['travelingwarriorFlag'] >= 1) {
        $smash_max = 5;
    }		// traveling warrior
    else {
        $smash_max = 0;
    }
    if ($smash_cost > $smash_max && $smash_max > 0) {
        $smash_cost = 'max';
    }
    // ----------------------------------------------------------------------------------Aim MATH
    $aim = $row['aim'];
    $aim_cost = $aim_new = $aim + 1;
    if ($row['rangerskillFlag'] >= 1) {
        $aim_max = 25;
    }				// rangers guild
    elseif ($row['hunterbillFlag'] >= 1) {
        $aim_max = 5;
    }		// hunter bill
    else {
        $aim_max = 0;
    }
    if ($aim_cost > $aim_max && $aim_max > 0) {
        $aim_cost = 'max';
    }
    // ----------------------------------------------------------------------------------Magic Strike MATH
    $magicstrike = $row['magicstrike'];
    $magicstrike_cost = $magicstrike_new = $magicstrike + 1;
    if ($row['starcitysskillsFlag'] >= 1) {
        $magicstrike_max = 25;
    }		// blue city
    elseif ($row['warriorskillFlag'] >= 1) {
        $magicstrike_max = 10;
    }				// warriors guild
    else {
        $magicstrike_max = 0;
    }
    if ($magicstrike_cost > $magicstrike_max && $magicstrike_max > 0) {
        $magicstrike_cost = 'max';
    }

    // ----------------------------------------------------------------------------------Multi Arrow MATH
    $multiarrow = $row['multiarrow'];
    $multiarrow_cost = $multiarrow_new = $multiarrow + 1;
    if ($row['starcitysskillsFlag'] >= 1) {
        $multiarrow_max = 25;
    }		// blue city
    elseif ($row['rangerskillFlag'] >= 1) {
        $multiarrow_max = 20;
    }		// rangers guild
    else {
        $multiarrow_max = 0;
    }
    if ($multiarrow_cost > $multiarrow_max && $multiarrow_max > 0) {
        $multiarrow_cost = 'max';
    }

    // ----------------------------------------------------------------------------------Bolt Upgrade MATH
    $boltupgrade = $row['boltupgrade'];
    $boltupgrade_cost = $boltupgrade_new = $boltupgrade + 1;
    if ($row['starcitysskillsFlag'] >= 1) {
        $boltupgrade_max = 25;
    }		// blue city
    elseif ($row['rangerskillFlag'] >= 1) {
        $boltupgrade_max = 20;
    }		// rangers guild
    else {
        $boltupgrade_max = 0;
    }
    if ($boltupgrade_cost > $boltupgrade_max && $boltupgrade_max > 0) {
        $boltupgrade_cost = 'max';
    }

    // ----------------------------------------------------------------------------------PT MATH - NOT IN USE ANYMORE
    $physicaltraining = $row['physicaltraining'];
    $physicaltraining_cost = $physicaltraining_new = $physicaltraining + 1;
    if ($row['starcitysskillsFlag'] >= 1) {
        $physicaltraining_max = 30;
    }			// blue city
    elseif ($row['rangerskillFlag'] >= 1) {
        $physicaltraining_max = 25;
    }			// rangers guild
    elseif ($row['warriorskillFlag'] >= 1) {
        $physicaltraining_max = 20;
    }		// warriors guild
    else {
        $physicaltraining_max = 10;
    }
    if ($physicaltraining_cost > $physicaltraining_max && $physicaltraining_max > 0) {
        $physicaltraining_cost = 'max';
    }

    // ----------------------------------------------------------------------------------MT MATH - NOT IN USE ANYMORE
    $mentaltraining = $row['mentaltraining'];
    $mentaltraining_cost = $mentaltraining_new = $mentaltraining + 1;
    if ($row['starcitysskillsFlag'] >= 1) {
        $mentaltraining_max = 30;
    }			// blue city
    elseif ($row['rangerskillFlag'] >= 1) {
        $mentaltraining_max = 25;
    }		// rangers guild
    elseif ($row['wizardskillFlag'] >= 1) {
        $mentaltraining_max = 20;
    }		// wizards guild
    else {
        $mentaltraining_max = 10;
    }
    if ($mentaltraining_cost > $mentaltraining_max && $mentaltraining_max > 0) {
        $mentaltraining_cost = 'max';
    }
    // ---------------------------------------------------------------------------------- // END SKILL VARIABLES
    // ---------------------------------------------------------------------------------- // END SKILL VARIABLES
    // ---------------------------------------------------------------------------------- // END SKILL VARIABLES




    // ---------------------------------------------------------------------------------- // START SPELL VARIABLES
    // ---------------------------------------------------------------------------------- // START SPELL VARIABLES
    // ---------------------------------------------------------------------------------- // START SPELL VARIABLES
  /*  $level = $row['level'];
    $xp = $row['xp'];
    $hp = $row['hpmax'];
    $mp = $row['mpmax'];
    $cp = $row['cp'];
    $sp = $row['sp'];

    $currency = $row['currency'];
    $toopoor = $_SESSION['toopoor'];
    $notenoughcp = $_SESSION['notenoughcp'];
    $notenoughsp = $_SESSION['notenoughsp'];

    $quest4 = $row['quest4']; // 1h, 2h, LVL 5
$teleport2 = $row['teleport2']; // 1h, 2h, LVL 10
$quest19 = $row['quest19']; // Warriors Guild Initiation
$quest20 = $row['quest20']; // Wizards Guild Initiation

$pajamashamanFlag = $row['pajamashamanFlag'];
    $youngsoldierFlag = $row['youngsoldierFlag'];
    $jacklumberFlag = $row['jacklumberFlag'];
    $hunterbillFlag = $row['hunterbillFlag'];
    $travelingwarriorFlag = $row['travelingwarriorFlag'];
    $travelingwizardFlag = $row['travelingwizardFlag'];
    $warriorskillFlag = $row['warriorskillFlag'];
    $wizardskillFlag = $row['wizardskillFlag'];
    $miningskillFlag = $row['miningskillFlag'];
    $rangerskillFlag = $row['rangerskillFlag'];
    $mastertrainerFlag = $row['mastertrainerFlag'];
    $starcitysskillsFlag = $row['starcitysskillsFlag'];
    $starcityspellsFlag = $row['starcityspellsFlag'];
    */

    // ----------------------------------------------------------------------------------Magic Missile MATH
    $magicmissile = $row['magicmissile'];
    $magicmissile_cost = $magicmissile_new = $magicmissile + 1;
    if ($row['starcityspellsFlag'] >= 1) {
        $magicmissile_max = 5;
    } elseif ($row['wizardskillFlag'] >= 1) {
        $magicmissile_max = 3;
    } elseif ($row['travelingwizardFlag'] >= 1) {
        $magicmissile_max = 2;
    } elseif ($row['pajamashamanFlag'] >= 1) {
        $magicmissile_max = 1;
    }  else {
        $magicmissile_max = 0;
    }
    if ($magicmissile_cost > $magicmissile_max && $magicmissile_max > 0) {
        $magicmissile_cost = 'max';
    }
    // ----------------------------------------------------------------------------------Fireball MATH
    $fireball = $row['fireball'];
    $fireball_cost = $fireball_new = $fireball + 1;
    if ($row['starcityspellsFlag'] >= 1) {
        $fireball_max = 15;
    } elseif ($row['wizardskillFlag'] >= 1) {
        $fireball_max = 10;
    } elseif ($row['travelingwizardFlag'] >= 1) {
        $fireball_max = 5;
    } elseif ($row['pajamashamanFlag'] >= 1) {
        $fireball_max = 3;
    } else {
        $fireball_max = 0;
    }
    if ($fireball_cost > $fireball_max && $fireball_max > 0) {
        $fireball_cost = 'max';
    }
    // ----------------------------------------------------------------------------------Poison Dart MATH
    $poisondart = $row['poisondart'];
    $poisondart_cost = $poisondart_new = $poisondart + 1;
    if ($row['starcityspellsFlag'] >= 1) {
        $poisondart_max = 15;
    } elseif ($row['wizardskillFlag'] >= 1) {
        $poisondart_max = 10;
    } else {
        $poisondart_max = 0;
    }
    if ($poisondart_cost > $poisondart_max && $poisondart_max > 0) {
        $poisondart_cost = 'max';
    }
    // ----------------------------------------------------------------------------------Atomic Blast MATH
    $costmultiplier = 5; // PRO
  //  $costmultiplier = 10; // ELITE
    $atomicblast = $row['atomicblast'];
    $atomicblast_new = $atomicblast + 1;
    //$atomicblast_cost = $atomicblast + 11;		// --- PRO Spell
    $atomicblast_cost = ($atomicblast+1) * $costmultiplier;

    if ($row['starcityspellsFlag'] >= 1) {
        $atomicblast_max = 7;
    } elseif ($row['wizardskillFlag'] >= 1) {
        $atomicblast_max = 5;
    } else {
        $atomicblast_max = 0;
    }
    if (($atomicblast >= $atomicblast_max) && ($atomicblast_max > 0)) {
        $atomicblast_cost = 'max';
    }


    // ----------------------------------------------------------------------------------One Handed PRO MATH - PRO SKILL
    $costmultiplier = 5;
    $onehandedpro = $row['onehandedpro'];
    $onehandedpro_cost = ($onehandedpro+1) * $costmultiplier;
    $onehandedpro_new = $onehandedpro + 1;
    if ($row['starcitysskillsFlag'] >= 1 && $row['onehanded'] >= 25  ) { // camphero && onehanded 25
        $onehandedpro_max = 10;
    }
    else if ($row['mastertrainerFlag'] >= 1 && $row['onehanded'] >= 20  ) { // master trainer && one handed 20
        $onehandedpro_max = 5;
    }			
    else if ($row['mastertrainerFlag'] >= 1) { // master trainer NO one handed 20
        $onehandedpro_max = 0;
    }		
    else {
        $onehandedpro_max = 0;
    }
    if ($onehandedpro >= $onehandedpro_max && $onehandedpro_max > 0) {
        $onehandedpro_cost = 'max';
    }
   
   
   
   
    

    // ----------------------------------------------------------------------------------Heal MATH
    $heal = $row['heal'];
    $heal_cost = $heal_new = $heal + 1;
    if ($row['starcityspellsFlag'] >= 1) {
        $heal_max = 15;
    } elseif ($row['wizardskillFlag'] >= 1) {
        $heal_max = 10;
    } elseif ($row['travelingwizardFlag'] >= 1) {
        $heal_max = 5;
    } elseif ($row['pajamashamanFlag'] >= 1) {
        $heal_max = 3;
    } else {
        $heal_max = 0;
    }
    if ($heal_cost > $heal_max && $heal_max > 0) {
        $heal_cost = 'max';
    }
    // ----------------------------------------------------------------------------------regenerate MATH
    $regenerate = $row['regenerate'];
    $regenerate_cost = $regenerate_new = $regenerate + 1;
    if ($row['starcityspellsFlag'] >= 1) {
        $regenerate_max = 15;
    } elseif ($row['wizardskillFlag'] >= 1) {
        $regenerate_max = 10;
    } else {
        $regenerate_max = 0;
    }
    if ($regenerate_cost > $regenerate_max && $regenerate_max > 0) {
        $regenerate_cost = 'max';
    }
    // ----------------------------------------------------------------------------------antidote MATH
    $antidote = $row['antidote'];
    $antidote_cost = $antidote_new = $antidote + 1;
    if ($row['starcityspellsFlag'] >= 1) {
        $antidote_max = 15;
    } elseif ($row['wizardskillFlag'] >= 1) {
        $antidote_max = 10;
    } else {
        $antidote_max = 0;
    }
    if ($antidote_cost > $antidote_max && $antidote_max > 0) {
        $antidote_cost = 'max';
    }


    // ----------------------------------------------------------------------------------magicarmor MATH
    $magicarmor = $row['magicarmor'];
    $magicarmor_cost = $magicarmor_new = $magicarmor + 1;
    if ($row['starcityspellsFlag'] >= 1) {
        $magicarmor_max = 15;
    } elseif ($row['wizardskillFlag'] >= 1) {
        $magicarmor_max = 10;
    } else {
        $magicarmor_max = 0;
    }
    if ($magicarmor_cost > $magicarmor_max && $magicarmor_max > 0) {
        $magicarmor_cost = 'max';
    }
    // ----------------------------------------------------------------------------------ironskin MATH
    $ironskin = $row['ironskin'];
    $ironskin_cost = $ironskin_new = $ironskin + 1;
    if ($row['starcityspellsFlag'] >= 1) {
        $ironskin_max = 15;
    } elseif ($row['wizardskillFlag'] >= 1) {
        $ironskin_max = 10;
    } else {
        $ironskin_max = 0;
    }
    if ($ironskin_cost > $ironskin_max && $ironskin_max > 0) {
        $ironskin_cost = 'max';
    }
    // ----------------------------------------------------------------------------------wings MATH
    $wings = $row['wings'];
    $wings_cost = $wings_new = $wings + 1;
    if ($row['wizardskillFlag'] >= 1) {
        $wings_max = 5;
    } else {
        $wings_max = 0;
    }
    if ($wings_cost > $wings_max && $wings_max > 0) {
        $wings_cost = 'max';
    }
    // ----------------------------------------------------------------------------------gills MATH
    $gills = $row['gills'];
    $gills_cost = $gills_new = $gills + 1;
    if ($row['wizardskillFlag'] >= 1) {
        $gills_max = 5;
    } else {
        $gills_max = 0;
    }
    if ($gills_cost > $gills_max && $gills_max > 0) {
        $gills_cost = 'max';
    }




    // ---------------------------------------------------------------------------------- // END SPELL VARIABLES
    // ---------------------------------------------------------------------------------- // END SPELL VARIABLES
    // ---------------------------------------------------------------------------------- // END SPELL VARIABLES




