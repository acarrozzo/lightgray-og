<?php
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


$right = $row['equipR'];
$left = $row['equipL'];
$mount = $row['equipMount'];
$room = $row['room'];


// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX STR
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX STR
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX STR
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX STR
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX STR
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX STR
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX STR
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX STR
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX STR
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX STR
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX STR
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX STR
if ($input=="max 1h" || $input=="max 2h"){
    if ($input=="max 2h" ){
    if (1==2) {}
    // --------------------------------------------------- 2H - STR
    // else if ($row["malbattleaxe"] > 0) { $tempweap = "mal battleaxe"; }
    else if ($row["blackbo"] > 0) { $tempweap = "black bo"; }
    else if ($row["atomicwarhammer"] > 0) { $tempweap = "atomic warhammer"; }
    // else if ($row["mithrilbo"] > 0) { $tempweap = "mithril bo"; }
    else if ($row["gargantuanwarhammer"] > 0) { $tempweap = "gargantuan warhammer"; }
    else if ($row["humongousbattleaxe"] > 0) { $tempweap = "humongous battleaxe"; }
    else if ($row["fortifiedfauchard"] > 0) { $tempweap = "fortified fauchard"; }
    else if ($row["heavyhammer"] > 0) { $tempweap = "heavy hammer"; }
    else if ($row["bardiche"] > 0) { $tempweap = "bardiche"; }
    else if ($row["mithril2hsword"] > 0) { $tempweap = "mithril 2h sword"; }
    else if ($row["heavykatana"] > 0) { $tempweap = "heavy katana"; }
    else if ($row["oakwarhammer"] > 0) { $tempweap = "oak warhammer"; }
    else if ($row["blessedspear"] > 0) { $tempweap = "blessed spear"; }
    else if ($row["glaive"] > 0) { $tempweap = "glaive"; }
    else if ($row["mithrilnunchaku"] > 0) { $tempweap = "mithril nunchaku"; } // 60
    else if ($row["steel2hsword"] > 0) { $tempweap = "steel 2h sword"; } // 50
    else if ($row["greataxe"] > 0) { $tempweap = "great axe"; }
    else if ($row["trident"] > 0) { $tempweap = "trident"; }
    else if ($row["jimbo"] > 0) { $tempweap = "jim bo"; }
    else if ($row["mithrilbattlestaff"] > 0) { $tempweap = "mithril battle staff"; } //45
    else if ($row["silver2hsword"] > 0) { $tempweap = "silver 2h sword"; }//45
    else if ($row["steelnunchaku"] > 0) { $tempweap = "steel nunchaku"; } // 40        
    else if ($row["heavyspear"] > 0) { $tempweap = "heavy spear"; } //40
    else if ($row["hammerheadhammer"] > 0) { $tempweap = "hammerhead hammer"; } //35
    else if ($row["bonecudgel"] > 0) { $tempweap = "bone cudgel"; } //35
    else if ($row["oakbattlestaff"] > 0) { $tempweap = "oak battle staff"; } //30
    else if ($row["ironnunchaku"] > 0) { $tempweap = "iron nunchaku"; } //25
    else if ($row["boneknuckles"] > 0) { $tempweap = "bone knuckles"; } //25
    else if ($row["iron2hsword"] > 0) { $tempweap = "iron 2h sword"; } //25
    else if ($row["steelbattlestaff"] > 0) { $tempweap = "steel battle staff"; } //24
    else if ($row["ironmaul"] > 0) { $tempweap = "iron maul"; } //22
    else if ($row["greatsword"] > 0) { $tempweap = "great sword"; } //17
    else if ($row["polearm"] > 0) { $tempweap = "polearm"; } //16
    else if ($row["nunchaku"] > 0) { $tempweap = "nunchaku"; } //13
    else if ($row["claymore"] > 0) { $tempweap = "claymore"; } //13
    else if ($row["warhammer"] > 0) { $tempweap = "warhammer"; } //13
    else if ($row["pike"] > 0) { $tempweap = "pike"; } //11
    else if ($row["battleaxe"] > 0) { $tempweap = "battle axe"; } //11
    else if ($row["dualtomahawk"] > 0) { $tempweap = "dual tomahawk"; } //9
    else if ($row["woodenbo"] > 0) { $tempweap = "wooden bo"; } //9
    else if ($row["bo"] > 0) { $tempweap = "bo"; } // 7
    else if ($row["battlestaff"] > 0) { $tempweap = "battle staff"; } //6
    else if ($row["training2hsword"] > 0) { $tempweap = "training 2h sword"; } //6
    else if ($row["bostaff"] > 0) { $tempweap = "bo staff"; } //4

    else { $tempweap = "fists"; } //0

    if ($tempweap == "fists") {
        // $results = $link->query("UPDATE $user SET weapontype = 0");
        $updates = ['weapontype' => 0]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes

    }
    else {
    // $results = $link->query("UPDATE $user SET weapontype = 2");
    $updates = ['weapontype' => 2]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes
    }
    // $results = $link->query("UPDATE $user SET equipR ='$tempweap'");
    // $results = $link->query("UPDATE $user SET equipL ='$tempweap'");
    $updates = ['equipR' => $tempweap,'equipL' => $tempweap]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes
    $tempoffhand = $tempweap;

} // end 1H

if ($input=="max 1h" ){
    if (1==2) {}    

    else if ($row["kingblade"] > 0) { $tempweap = "king blade";} //350
    else if ($row["gmgclub"] > 0) { $tempweap = "gmg club";} //250
    else if ($row["gkclub"] > 0) { $tempweap = "gk club";} //200
    else if ($row["mithrilcleaver"] > 0) { $tempweap = "mithril cleaver";} //150
    else if ($row["mithrilmace"] > 0) { $tempweap = "mithril mace";} //90
    else if ($row["mithrilflail"] > 0) { $tempweap = "mithril flail";} //80
    else if ($row["guardianblade"] > 0) { $tempweap = "guardian blade";} //80
    else if ($row["gildedfalcion"] > 0) { $tempweap = "gilded falcion";} //70
    else if ($row["blackblade"] > 0) { $tempweap = "black blade";} //55
    else if ($row["mithrilsword"] > 0) { $tempweap = "mithril sword";} //50
    else if ($row["flamberg"] > 0) { $tempweap = "flamberg";} //50
    else if ($row["sharpkatana"] > 0) { $tempweap = "sharp katana";} //45
    else if ($row["axeofslaughter"] > 0) { $tempweap = "axe of slaughter";} //45
    else if ($row["axeofslaughter"] > 0) { $tempweap = "axe of slaughter";} //45
    else if ($row["gammaknife"] > 0) { $tempweap = "gamma knife";} //35
    else if ($row["vampiricdagger"] > 0) { $tempweap = "vampiric dagger";} //30
    else if ($row["forestsaber"] > 0) { $tempweap = "forest saber";} //30
    else if ($row["mithrildagger"] > 0) { $tempweap = "mithril dagger";} //30
    else if ($row["steelsword"] > 0) { $tempweap = "steel sword";} //27
    else if ($row["ulfberht"] > 0) { $tempweap = "ulfberht";} //26
    else if ($row["silversword"] > 0) { $tempweap = "silver sword";} //25
    else if ($row["poisonsaber"] > 0) { $tempweap = "poison saber";} //18
    else if ($row["steeldagger"] > 0) { $tempweap = "steel dagger";} //18
    else if ($row["ironsword"] > 0) { $tempweap = "iron sword";} //18
    else if ($row["greatwhitesword"] > 0) { $tempweap = "great white sword";} //17
    else if ($row["threechainedflail"] > 0) { $tempweap = "three chained flail";} //15
    else if ($row["giantclub"] > 0) { $tempweap = "giant club";} //13
    else if ($row["bastardsword"] > 0) { $tempweap = "bastard sword";} //11
    else if ($row["mithrilstaff"] > 0) { $tempweap = "mithril staff";} //10
    else if ($row["gladius"] > 0) { $tempweap = "gladius";} //9
    else if ($row["samuraisword"] > 0) { $tempweap = "samurai sword";} //8
    else if ($row["flail"] > 0) { $tempweap = "flail";} //7
    else if ($row["irondagger"] > 0) { $tempweap = "iron dagger";} //7
    else if ($row["morningstar"] > 0) { $tempweap = "morning star";} //6
    else if ($row["club"] > 0) { $tempweap = "club";} //6
    else if ($row["steelstaff"] > 0) { $tempweap = "steel staff";} //5
    else if ($row["demondagger"] > 0) { $tempweap = "demon dagger";} //5
    else if ($row["longsword"] > 0) { $tempweap = "long sword";} //5
    else if ($row["mace"] > 0) { $tempweap = "mace";} //4
    else if ($row["broadsword"] > 0) { $tempweap = "broad sword";} //4
    else if ($row["shortsword"] > 0) { $tempweap = "short sword";} //4
    else if ($row["ironstaff"] > 0) { $tempweap = "iron staff";} //3
    else if ($row["trainingsword"] > 0) { $tempweap = "training sword";} //3
    else if ($row["woodenstaff"] > 0) { $tempweap = "wooden staff";} //1
    else if ($row["dagger"] > 0) { $tempweap = "dagger";} //1
    else { $tempweap = "fists"; } //0
    
    // OFF HAND
    if (1==2) {}    

    else if ($row["kingshield"] > 0) { $tempoffhand = "king shield";} //200
    else if ($row["heatershield"] > 0) { $tempoffhand = "heater shield";} //40
    else if ($row["offhandmace"] > 0) { $tempoffhand = "off hand mace";} //25
    else if ($row["dragonshield"] > 0) { $tempoffhand = "dragon shield";} //20
    else if ($row["dragonorb"] > 0) { $tempoffhand = "dragon orb";} //10
    else if ($row["offhandsword"] > 0) { $tempoffhand = "off hand sword";} //10
    else if ($row["vikingshield"] > 0) { $tempoffhand = "viking shield";} //8
    else if ($row["redshield"] > 0) { $tempoffhand = "red shield";} //5
    else if ($row["offhanddagger"] > 0) { $tempoffhand = "off hand dagger";} //5
    else if ($row["huntershield"] > 0) { $tempoffhand = "hunter shield";} //3
    else if ($row["buckler"] > 0) { $tempoffhand = "buckler";} //2
    else if ($row["starterorb"] > 0) { $tempoffhand = "starter orb";} //1
    else if ($row["woodenshield"] > 0) { $tempoffhand = "wooden shield";} //13def
    else if ($row["towershield"] > 0) { $tempoffhand = "tower shield";} //12def
    else if ($row["basicshield"] > 0) { $tempoffhand = "basic shield";} //7def
    else if ($row["trainingshield"] > 0) { $tempoffhand = "training shield";} //3def
    else { $tempoffhand = "<span> - - - </span>"; } //0



    if ($tempweap == "fists") {
        // $results = $link->query("UPDATE $user SET weapontype = 0");
        // $results = $link->query("UPDATE $user SET equipR ='$tempweap'");
        // $results = $link->query("UPDATE $user SET equipL ='$tempoffhand'");  
        $updates = [ // -- set changes
            'weapontype' => 0,
            'equipR' => $tempweap,
            'equipL' => $tempoffhand,
        ]; 
        updateStats($link, $username, $updates); // -- apply changes      
    }
    else { // OFF HAND FOR ONE HANDED MAX STR
        // $results = $link->query("UPDATE $user SET weapontype = 1");
        // $results = $link->query("UPDATE $user SET equipR ='$tempweap'");
        // $results = $link->query("UPDATE $user SET equipL ='$tempoffhand'");
        $updates = [ // -- set changes
            'weapontype' => 1,
            'equipR' => $tempweap,
            'equipL' => $tempoffhand,
        ];
        updateStats($link, $username, $updates); // -- apply changes      
    }
} // end 1H





    // --------------------------------------------------- HEAD - STR
    if (1==2) {}
    // else if ($row["solarcrown"] > 0) { $temphead = "solar crown"; }        //100
    // else if ($row["dragonbonehelmet"] > 0) { $temphead = "dragonbone helmet"; }        //60
    // else if ($row["helmetoftheconqueror"] > 0) { $temphead = "helmet of the conqueror"; }        //50
    // else if ($row["bansheemask"] > 0) { $temphead = "banshee mask"; }        //35
    // else if ($row["goldenhelmet"] > 0) { $temphead = "golden helmet"; }        //30
    else if ($row["magnificentcrown"] > 0) { $temphead = "magnificent crown"; }        //25
    // else if ($row["imperialhelmet"] > 0) { $temphead = "imperial helmet"; }        //25
    else if ($row["blackhood"] > 0) { $temphead = "black hood"; }        //20
    else if ($row["earthhood"] > 0) { $temphead = "earth hood"; }        //16
    else if ($row["steelmasterhelm"] > 0) { $temphead = "steel master helm"; }        //15
    else if ($row["mithrilhood"] > 0) { $temphead = "mithril hood"; }        //13
    else if ($row["trollcrown"] > 0) { $temphead = "troll crown"; }        //12
    else if ($row["heavyhelmet"] > 0) { $temphead = "heavy helmet"; }        //10
    else if ($row["barbarianhelmet"] > 0) { $temphead = "barbarian helmet"; }        //8
    else if ($row["scorpionhood"] > 0) { $temphead = "scorpion hood"; }        //7
    else if ($row["hornedhelmet"] > 0) { $temphead = "horned helmet"; }        //5
    else if ($row["battlehelm"] > 0) { $temphead = "battle helm"; }        //4
    else if ($row["ironhood"] > 0) { $temphead = "iron hood"; }        //3
    else if ($row["leatherhelmet"] > 0) { $temphead = "leather helmet"; }        //2
    else if ($row["redhood"] > 0) { $temphead = "red hood"; }        //2
    else if ($row["basichood"] > 0) { $temphead = "basic hood"; }        //1
    else if ($row["basichelmet"] > 0) { $temphead = "basic helmet"; }        //Def5
    else if ($row["traininghelmet"] > 0) { $temphead = "training helmet"; }        //Def3
    else { $temphead = "<span> - - - </span>"; } //0

    // $results = $link->query("UPDATE $user SET equipHead = '$temphead'");
    $updates = ['equipHead' => $temphead]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes

    // --------------------------------------------------- BODY - STR
    if (1==2) {}    
    // else if ($row["dragonbonearmor"] > 0) { $tempbody = "dragonbone armor"; }        //80
    // else if ($row["blackjacket"] > 0) { $tempbody = "black jacket"; }        //60
    else if ($row["terrarobe"] > 0) { $tempbody = "terra robe"; }        //50
    else if ($row["mithrilcape"] > 0) { $tempbody = "mithril cape"; }        //50
    // else if ($row["goldenbreastplate"] > 0) { $tempbody = "golden breastplate"; }        //40
    else if ($row["blackcloak"] > 0) { $tempbody = "black cloak"; }        //40
    // else if ($row["imperialarmor"] > 0) { $tempbody = "imperial armor"; }        //35
    else if ($row["steelcape"] > 0) { $tempbody = "steel cape"; }        //30
    else if ($row["yeticloak"] > 0) { $tempbody = "yeti cloak"; }        //25
    else if ($row["ironcape"] > 0) { $tempbody = "iron cape"; }        //15
    else if ($row["blackcape"] > 0) { $tempbody = "black cape"; }        //10
    else if ($row["eartharmor"] > 0) { $tempbody = "earth armor"; }        //8
    else if ($row["sasquatchcloak"] > 0) { $tempbody = "sasquatch cloak"; }        //8
    else if ($row["championarmor"] > 0) { $tempbody = "champion armor"; }        //5
    else if ($row["turtleshell"] > 0) { $tempbody = "turtle shell"; }        //5
    else if ($row["leatherarmor"] > 0) { $tempbody = "leather armor"; }        //4
    else if ($row["blackrobe"] > 0) { $tempbody = "black robe"; }        //3
    else if ($row["pajamas"] > 0) { $tempbody = "pajamas"; }        //2
    else if ($row["trainingarmorpro"] > 0) { $tempbody = "training armor pro"; }        //1
    else if ($row["paddedarmor"] > 0) { $tempbody = "padded armor"; }        //Def13
    else if ($row["trainingarmor"] > 0) { $tempbody = "training armor"; }        //Def3
    else { $tempbody = "<span> - - - </span>"; } //0

    // $results = $link->query("UPDATE $user SET equipBody = '$tempbody'");
    $updates = ['equipBody' => $tempbody]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes
    
    // --------------------------------------------------- HANDS - STR
    if (1==2) {}    
    // else if ($row["dragonbonegauntlets"] > 0) { $temphands = "dragonbone gauntlets"; }        //30
    // else if ($row["glovesofthemountain"] > 0) { $temphands = "gloves of the mountain"; }        //25
    // else if ($row["goldengauntlets"] > 0) { $temphands = "golden gauntlets"; }        //20
    else if ($row["ironknuckles"] > 0) { $temphands = "iron knuckles"; }        //20
    // else if ($row["imperialbracers"] > 0) { $temphands = "imperial bracers"; }        //15
    else if ($row["mithrilgloves"] > 0) { $temphands = "mithril gloves"; }        //15
    else if ($row["steelgloves"] > 0) { $temphands = "steel gloves"; }        //10
    else if ($row["earthmittens"] > 0) { $temphands = "earth mittens"; }        //8
    else if ($row["irongloves"] > 0) { $temphands = "iron gloves"; }        //5
    else if ($row["trollgloves"] > 0) { $temphands = "troll gloves"; }        //3
    else if ($row["huntergloves"] > 0) { $temphands = "hunter gloves"; }        //3
    else if ($row["wristbracers"] > 0) { $temphands = "wrist bracers"; }        //2
    else if ($row["blackgloves"] > 0) { $temphands = "black gloves"; }        //1
    else if ($row["glowingbrace"] > 0) { $temphands = "glowing brace"; }    //1mag
    else if ($row["traininggloves"] > 0) { $temphands = "training gloves"; }    //1dex
    else { $temphands = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipHands = '$temphands'");
    $updates = ['equipHands' => $temphands]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes


    // --------------------------------------------------- FEET - STR
    if (1==2) {}    
    // else if ($row["steeltippedloafers"] > 0) { $tempfeet = "steel tipped loafers"; }        // 60
    // else if ($row["dragonboneboots"] > 0) { $tempfeet = "dragonbone boots"; }        // 30
    // else if ($row["goldengreaves"] > 0) { $tempfeet = "golden greaves"; }        // 20
    else if ($row["crimsonmoccasins"] > 0) { $tempfeet = "crimson moccasins"; }        // 20
    // else if ($row["imperialboots"] > 0) { $tempfeet = "imperial boots"; }        // 15
    else if ($row["thunderboots"] > 0) { $tempfeet = "thunder boots"; }        // 12
    else if ($row["bigfootboots"] > 0) { $tempfeet = "bigfoot boots"; }        // 10
    else if ($row["earthboots"] > 0) { $tempfeet = "earth boots"; }        // 8
    else if ($row["mudboots"] > 0) { $tempfeet = "mud boots"; }        // 6
    else if ($row["trollboots"] > 0) { $tempfeet = "troll boots"; }        // 3
    else if ($row["redboots"] > 0) { $tempfeet = "red boots"; }        // 2
    else if ($row["slippers"] > 0) { $tempfeet = "slippers"; }        // 1
    else if ($row["blackboots"] > 0) { $tempfeet = "black boots"; }        // 1
    else if ($row["trainingboots"] > 0) { $tempfeet = "training boots"; }        // 1def
    else { $tempfeet = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipFeet = '$tempfeet'");
    $updates = ['equipFeet' => $tempfeet]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes

    // --------------------------------------------------- RING 1 - STR
    if (1==2) {}    

    // else if ($row["pinkyring"] > 0) { $tempring1 = "pinky ring"; } 

    else if ($row["ringofstrengthXXX"] > 0) { $tempring1 = "ring of strength XXX"; } 

    else if ($row["ringofstrengthXX"] > 0) { $tempring1 = "ring of strength XX"; } 
    else if ($row["ringofstrengthXIX"] > 0) { $tempring1 = "ring of strength XIX"; } 
    else if ($row["ringofstrengthXVIII"] > 0) { $tempring1 = "ring of strength XVIII"; } 
    else if ($row["ringofstrengthXVII"] > 0) { $tempring1 = "ring of strength XVII"; } 
    else if ($row["ringofstrengthXVI"] > 0) { $tempring1 = "ring of strength XVI"; } 
    else if ($row["ringofstrengthXV"] > 0) { $tempring1 = "ring of strength XV"; } 
    else if ($row["ringofstrengthXIV"] > 0) { $tempring1 = "ring of strength XIV"; } 
    else if ($row["ringofstrengthXIII"] > 0) { $tempring1 = "ring of strength XIII"; } 
    else if ($row["ringofstrengthXII"] > 0) { $tempring1 = "ring of strength XII"; } 
    else if ($row["ringofstrengthXI"] > 0) { $tempring1 = "ring of strength XI"; } 
    
    else if ($row["silverring"] > 0) { $tempring1 = "silver ring"; } 

    else if ($row["ringofstrengthX"] > 0) { $tempring1 = "ring of strength X"; } 
    else if ($row["ringofstrengthIX"] > 0) { $tempring1 = "ring of strength IX"; } 
    else if ($row["ringofstrengthVIII"] > 0) { $tempring1 = "ring of strength VIII"; } 
    else if ($row["ringofstrengthVII"] > 0) { $tempring1 = "ring of strength VII"; } 
    else if ($row["ringofstrengthVI"] > 0) { $tempring1 = "ring of strength VI"; } 

    else if ($row["vaporring"] > 0) { $tempring1 = "vapor ring"; } //5
    else if ($row["redwizardring"] > 0) { $tempring1 = "red wizard ring"; } 
    else if ($row["rabidring"] > 0) { $tempring1 = "rabid ring"; } 

    else if ($row["ringofstrengthV"] > 0) { $tempring1 = "ring of strength V"; } 
    else if ($row["ringofstrengthIV"] > 0) { $tempring1 = "ring of strength IV"; } 
    else if ($row["hunterring"] > 0) { $tempring1 = "hunter ring"; } 
    else if ($row["ringofstrengthIII"] > 0) { $tempring1 = "ring of strength III"; } 

    else if ($row["coyotering"] > 0) { $tempring1 = "coyote ring"; } 
    else if ($row["soldiersring"] > 0) { $tempring1 = "soldier\'s ring"; } 

    else if ($row["ringofstrengthII"] > 0) { $tempring1 = "ring of strength II"; } 
    else if ($row["ringofstrength"] > 0) { $tempring1 = "ring of strength"; } 

    else if ($row["mithrilring"] > 0) { $tempring1 = "mithril ring"; } 
    else if ($row["steelring"] > 0) { $tempring1 = "steel ring"; } 
    else if ($row["ironring"] > 0) { $tempring1 = "iron ring"; } 
    else if ($row["ringofmagic"] > 0) { $tempring1 = "ring of magic"; } 
    else if ($row["ringofdexterity"] > 0) { $tempring1 = "ring of dexterity"; } 
    else if ($row["ringofdefense"] > 0) { $tempring1 = "ring of defense"; } 


    else { $tempring1 = "<span> - - - </span>"; } //0

    // $results = $link->query("UPDATE $user SET equipRing1 = '$tempring1'");
    $updates = ['equipRing1' => $tempring1]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes


    // --------------------------------------------------- RING 2 - HEALTH REGEN
    if (1==2) {}    

    else if ($row["ringofhealthregenXXX"] > 0) { $tempring2 = "ring of health regen XXX"; } 

    else if ($row["ringofhealthregenXX"] > 0) { $tempring2 = "ring of health regen XX"; } 
    else if ($row["ringofhealthregenXIX"] > 0) { $tempring2 = "ring of health regen XIX"; } 
    else if ($row["ringofhealthregenXVIII"] > 0) { $tempring2 = "ring of health regen XVIII"; } 
    else if ($row["ringofhealthregenXVII"] > 0) { $tempring2 = "ring of health regen XVII"; } 
    else if ($row["ringofhealthregenXVI"] > 0) { $tempring2 = "ring of health regen XVI"; } 
    else if ($row["ringofhealthregenXV"] > 0) { $tempring2 = "ring of health regen XV"; } 
    else if ($row["ringofhealthregenXIV"] > 0) { $tempring2 = "ring of health regen XIV"; } 
    else if ($row["ringofhealthregenXIII"] > 0) { $tempring2 = "ring of health regen XIII"; } 
    else if ($row["ringofhealthregenXII"] > 0) { $tempring2 = "ring of health regen XII"; } 
    else if ($row["ringofhealthregenXI"] > 0) { $tempring2 = "ring of health regen XI"; } 

    else if ($row["ringofhealthregenX"] > 0) { $tempring2 = "ring of health regen X"; } 
    else if ($row["ringofhealthregenIX"] > 0) { $tempring2 = "ring of health regen IX"; } 
    else if ($row["ringofhealthregenVIII"] > 0) { $tempring2 = "ring of health regen VIII"; } 
    else if ($row["ringofhealthregenVII"] > 0) { $tempring2 = "ring of health regen VII"; } 
    else if ($row["ringofhealthregenVI"] > 0) { $tempring2 = "ring of health regen VI"; } 
    else if ($row["ringofhealthregenV"] > 0) { $tempring2 = "ring of health regen V"; } 
    else if ($row["ringofhealthregenIV"] > 0) { $tempring2 = "ring of health regen IV"; } 
    else if ($row["ringofhealthregenIII"] > 0) { $tempring2 = "ring of health regen III"; } 
    else if ($row["ringofhealthregenII"] > 0) { $tempring2 = "ring of health regen II"; } 
    else if ($row["ringofhealthregenI"] > 0) { $tempring2 = "ring of health regen"; } 
    else if ($row["ringofhealthregen"] > 0) { $tempring2 = "ring of health regen"; } 
    else { $tempring2 = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipring2 = '$tempring2'");
    $updates = ['equipRing2' => $tempring2]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes


    // --------------------------------------------------- NECK - STR
    if (1==2) {}    
    // else if ($row["amuletofsol"] > 0) { $tempneck = "amulet of sol"; }        // 
    else if ($row["warriorpendant"] > 0) { $tempneck = "warrior pendant"; }        // 25
    else if ($row["silvernecklace"] > 0) { $tempneck = "silver necklace"; }        // 20
    else if ($row["vapornecklace"] > 0) { $tempneck = "vapor necklace"; }        // 10
    else if ($row["redtalisman"] > 0) { $tempneck = "red talisman"; }        // 10
    else if ($row["bluependant"] > 0) { $tempneck = "blue pendant"; }        // 10
    else if ($row["ironnecklace"] > 0) { $tempneck = "iron necklace"; }        // 
    else if ($row["stonenecklace"] > 0) { $tempneck = "stone necklace"; }        // 
    else if ($row["bonenecklace"] > 0) { $tempneck = "bone necklace"; }        // 
    else if ($row["woodennecklace"] > 0) { $tempneck = "wooden necklace"; }        // 
    else { $tempneck = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipneck = '$tempneck'");
    $updates = ['equipNeck' => $tempneck]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes


    // --------------------------------------------------- COMP - STR / ALL
    if (1==2) {}    
    //   else if ($row["COMPsnowberserker"] > 0) { $tempcomp = "snow berserker"; }        // 
    //  else if ($row["COMPogreshieldmate"] > 0) { $tempcomp = "ogre shieldmate"; }        // 
    else if ($row["COMPelfranger"] > 0) { $tempcomp = "elf ranger"; }        // 
    else if ($row["COMPdwarfaxeman"] > 0) { $tempcomp = "dwarf axeman"; }        // 
    else { $tempcomp = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipcomp = '$tempcomp'");        
    $updates = ['equipComp' => $tempcomp]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes        

    // --------------------------------------------------- PET - STR / ALL
    if (1==2) {}    
    // else if ($row["babyowl"] > 0) { $temppet = "baby owl"; }        // 
    else if ($row["petbat"] > 0) { $temppet = "pet bat"; }        // 
    else if ($row["pethampster"] > 0) { $temppet = "pet hampster"; }        // 
    else { $temppet = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equippet = '$temppet'");
    $updates = ['equipPet' => $temppet]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes


    // --------------------------------------------------- MOUNT - STR
    if (1==2) {}    
    else if ($row["MOUNTdirewolf"] > 0) { $tempmount = "dire wolf"; }        // str50
    else if ($row["MOUNTskyhawk"] > 0) { $tempmount = "sky hawk"; }        // mag25
    else if ($row["MOUNTgreengriffin"] > 0) { $tempmount = "green griffin"; }        // dex50
    else { $tempmount = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipmount = '$tempmount'");  
    $updates = ['equipMount' => $tempmount]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes      


    // --------------------------------------------------- ARTIFACT - STR
    if (1==2) {}    
    // else if ($row["bloodcoin"] > 0) { $tempartifact = "bloodcoin"; }        // str100
    else if ($row["onyxcross"] > 0) { $tempartifact = "onyx cross"; }        // str 50
    else if ($row["luckybone"] > 0) { $tempartifact = "lucky bone"; }        // all 10
    else if ($row["coralcoin"] > 0) { $tempartifact = "coral coin"; }        // all 5
    else if ($row["pearlofwisdom"] > 0) { $tempartifact = "pearl of wisdom"; } // mag 50
    else if ($row["squidtooth"] > 0) { $tempartifact = "squid tooth"; }        // dex 25
    else { $tempartifact = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipartifact = '$tempartifact'");     
    $updates = ['equipArtifact' => $tempartifact]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes   



    // --------------------------------------------------- DISPLAY
    echo $message = '<p class="">You auto-equip to <span class="red">MAXIMIZE STRENGTH!</span></p>';
    include('update_feed.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Right:</span> '.$tempweap.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Left:</span> '.$tempoffhand.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Head:</span> '.$temphead.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Body:</span> '.$tempbody.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Hands:</span> '.$temphands.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Feet:</span> '.$tempfeet.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Ring1:</span> '.$tempring1.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Ring2:</span> '.$tempring2.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Neck:</span> '.$tempneck.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Comp:</span> '.$tempcomp.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Pet:</span> '.$temppet.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Mount:</span> '.$tempmount.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Artifact:</span> '.$tempartifact.'</div>';
    include('update_feed_alt.php'); // --- update feed


} // - END MAX STR!!!


// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx END MAX STR
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx END MAX STR
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx END MAX STR
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx END MAX STR
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx END MAX STR




// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX DEX
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX DEX
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX DEX
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX DEX
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX DEX
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX DEX
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX DEX
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX DEX
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX DEX
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX DEX
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX DEX
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX DEX
if ($input=="max dex"){

    // --------------------------------------------------- 2H + 1H - DEX
    $onehandeddex = 0;
    if (1==2) {}    
    // else if ($row["jinxcrossbow"] > 0) { $tempweap = "jinx crossbow";} //600
    else if ($row["chondrianbow"] > 0) { $tempweap = "chondrian bow";} //400
    else if ($row["blackcrossbow"] > 0) { $tempweap = "black crossbow";} //350
    else if ($row["bladerang"] > 0) { $tempweap = "bladerang"; $onehandeddex = 1;} //300
    else if ($row["rangercrossbow"] > 0) { $tempweap = "ranger crossbow";} //200
    else if ($row["blackbow"] > 0) { $tempweap = "black bow";} //200

    // else if ($row["emyprealchakram"] > 0) { $tempweap = "emypreal chakram"; $onehandeddex = 1;} //150
    else if ($row["galaxybow"] > 0) { $tempweap = "galaxy bow";} //150
    else if ($row["blackboomerang"] > 0) { $tempweap = "black boomerang"; $onehandeddex = 1;} //120
    // else if ($row["rangerboomerang"] > 0) { $tempweap = "ranger boomerang"; $onehandeddex = 1;} //100     
    else if ($row["mithrilcrossbow"] > 0) { $tempweap = "mithril crossbow";} //100
    else if ($row["keeperscrossbow"] > 0) { $tempweap = "keepers crossbow";} //90
    else if ($row["mithrilbow"] > 0) { $tempweap = "mithril bow";} //80
    else if ($row["mithrilchakram"] > 0) { $tempweap = "mithril chakram"; $onehandeddex = 1;} //60
    else if ($row["mithrilboomerang"] > 0) { $tempweap = "mithril boomerang"; $onehandeddex = 1;} //50
    else if ($row["snowbow"] > 0) { $tempweap = "snow bow";} //45
    else if ($row["steelcrossbow"] > 0) { $tempweap = "steel crossbow";} //44
    else if ($row["silvercrossbow"] > 0) { $tempweap = "silver crossbow";} //40
    else if ($row["compoundcrossbow"] > 0) { $tempweap = "compound crossbow";} //40
    else if ($row["greenhornbow"] > 0) { $tempweap = "greenhorn bow";} //35
    else if ($row["handcrossbow"] > 0) { $tempweap = "hand crossbow"; $onehandeddex = 1;} //35
    else if ($row["enchantedbow"] > 0) { $tempweap = "enchanted bow";} //35
    else if ($row["steelbow"] > 0) { $tempweap = "steel bow";} //33
    else if ($row["silverbow"] > 0) { $tempweap = "silver bow";} //30
    else if ($row["ironcrossbow"] > 0) { $tempweap = "iron crossbow";} //30
    else if ($row["steelchakram"] > 0) { $tempweap = "steel chakram"; $onehandeddex = 1;} //25
    else if ($row["jimbow"] > 0) { $tempweap = "jim bow";} //25
    else if ($row["steelboomerang"] > 0) { $tempweap = "steel boomerang"; $onehandeddex = 1;} //22
    else if ($row["silverboomerang"] > 0) { $tempweap = "silver boomerang"; $onehandeddex = 1;} //20
    else if ($row["ironbow"] > 0) { $tempweap = "iron bow";} //20
    else if ($row["ironchakram"] > 0) { $tempweap = "iron chakram"; $onehandeddex = 1;} //15
    else if ($row["crossbow"] > 0) { $tempweap = "crossbow";} //13
    else if ($row["longbow"] > 0) { $tempweap = "long bow";} //11
    else if ($row["ironboomerang"] > 0) { $tempweap = "iron boomerang";$onehandeddex = 1;} //10
    else if ($row["hunterbow"] > 0) { $tempweap = "hunter bow";} //9
    else if ($row["harpoon"] > 0) { $tempweap = "harpoon"; $onehandeddex = 1;} //8
    else if ($row["woodenbow"] > 0) { $tempweap = "wooden bow";} //8
    else if ($row["chakram"] > 0) { $tempweap = "chakram"; $onehandeddex = 1;} //7
    else if ($row["boomerang"] > 0) { $tempweap = "boomerang"; $onehandeddex = 1;} //3
    else { $tempweap = "fists"; } //0

    if ($tempweap != "fists") {
        // $results = $link->query("UPDATE $user SET weapontype = 3");
        $updates = ['weapontype' => 3]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    else {
        // $results = $link->query("UPDATE $user SET weapontype = 0");}
        $updates = ['weapontype' => 0]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }


    // $results = $link->query("UPDATE $user SET equipR ='$tempweap'");
    // $results = $link->query("UPDATE $user SET equipL ='$tempweap'");
    $updates = ['equipR' => $tempweap, 'equipL' => $tempweap]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes
    $tempoffhand = $tempweap;
   
    
    if ($onehandeddex == 1) {
        // EQUIP OFF HAND FOR 1 HANDED DEX
        if (1==2) {}    
        else if ($row["orbofsevendimensions"] > 0) { $tempoffhand = "orb of seven dimensions";} //150
        else if ($row["offhandcrossbow"] > 0) { $tempoffhand = "off hand crossbow";} //75
        else if ($row["offhandboomerang"] > 0) { $tempoffhand = "off hand boomerang";} //50
        else if ($row["rangerorb"] > 0) { $tempoffhand = "ranger orb";} //50
        else if ($row["offhandchakram"] > 0) { $tempoffhand = "off hand chakram";} //40
        else if ($row["rangershield"] > 0) { $tempoffhand = "ranger shield";} //30
        else if ($row["greenorb"] > 0) { $tempoffhand = "green orb";} //15
        else if ($row["greenshield"] > 0) { $tempoffhand = "green shield";} //7
        else if ($row["huntershield"] > 0) { $tempoffhand = "hunter shield";} //3
        else if ($row["starterorb"] > 0) { $tempoffhand = "starter orb";} //1
        else if ($row["basicshield"] > 0) { $tempoffhand = "basic shield";} //def
        else if ($row["trainingshield"] > 0) { $tempoffhand = "training shield";} //def
        else { $tempoffhand = "<span> - - - </span>"; } //0
        $results = $link->query("UPDATE $user SET equipL ='$tempoffhand'");
        $updates = ['equipL' => $tempoffhand]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    // --------------------------------------------------- HEAD - DEX
    if (1==2) {}    

    else if ($row["rangerhood"] > 0) { $temphead = "ranger hood"; }        //25
    else if ($row["steelmasterhelm"] > 0) { $temphead = "steel master helm"; }        //15
    else if ($row["mithrilhood"] > 0) { $temphead = "mithril hood"; }        //13
    else if ($row["bandithood"] > 0) { $temphead = "bandit hood"; }        //8
    else if ($row["steelhood"] > 0) { $temphead = "steel hood"; }        //7
    else if ($row["calamaricap"] > 0) { $temphead = "calamari cap"; }        //4
    else if ($row["leatherhood"] > 0) { $temphead = "leather hood"; }        //4
    else if ($row["ironhood"] > 0) { $temphead = "iron hood"; }        //3
    else if ($row["greenhood"] > 0) { $temphead = "green hood"; }        //2
    else if ($row["basichood"] > 0) { $temphead = "basic hood"; }        //1
    else if ($row["basichelmet"] > 0) { $temphead = "basic helmet"; }        //Def5
    else if ($row["traininghelmet"] > 0) { $temphead = "training helmet"; }        //Def3
    else { $temphead = "<span> - - - </span>"; } //0

    // $results = $link->query("UPDATE $user SET equipHead = '$temphead'");
    $updates = ['equipHead' => $temphead]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes   



    // --------------------------------------------------- BODY - DEX
    if (1==2) {}    

    else if ($row["rangercloak"] > 0) { $tempbody = "ranger cloak"; }        //25
    else if ($row["silverpajamas"] > 0) { $tempbody = "silver pajamas"; }        //20
    else if ($row["snowvest"] > 0) { $tempbody = "snow vest"; }        //20
    else if ($row["forestcloak"] > 0) { $tempbody = "forest cloak"; }        //10
    else if ($row["leathervest"] > 0) { $tempbody = "leather vest"; }        //6
    else if ($row["turtleshell"] > 0) { $tempbody = "turtle shell"; }        //5
    else if ($row["greencloak"] > 0) { $tempbody = "green cloak"; }        //5
    else if ($row["pajamas"] > 0) { $tempbody = "pajamas"; }        //2
    else if ($row["trainingarmorpro"] > 0) { $tempbody = "training armor pro"; }        //1
    else if ($row["paddedarmor"] > 0) { $tempbody = "padded armor"; }        //Def13
    else if ($row["trainingarmor"] > 0) { $tempbody = "training armor"; }        //Def3
    else { $tempbody = "<span> - - - </span>"; } //0

    // $results = $link->query("UPDATE $user SET equipBody = '$tempbody'");
    $updates = ['equipBody' => $tempbody]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes


    // --------------------------------------------------- HANDS - DEX
    if (1==2) {}    

    else if ($row["rangergloves"] > 0) { $temphands = "ranger gloves"; }        //15
    else if ($row["vambraces"] > 0) { $temphands = "vambraces"; }           //10
    else if ($row["gatorgloves"] > 0) { $temphands = "gator gloves"; }        //9
    else if ($row["silkbracers"] > 0) { $temphands = "silk bracers"; }        //8
    else if ($row["banditgloves"] > 0) { $temphands = "bandit gloves"; }        //5
    else if ($row["huntergloves"] > 0) { $temphands = "hunter gloves"; }        //3
    else if ($row["leathergloves"] > 0) { $temphands = "leather gloves"; }        //3
    else if ($row["greengloves"] > 0) { $temphands = "green gloves"; }        //2
    else if ($row["traininggloves"] > 0) { $temphands = "training gloves"; }     //1
    else if ($row["glowingbrace"] > 0) { $temphands = "glowing brace"; }    //1mag
            else { $temphands = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipHands = '$temphands'");
    $updates = ['equipHands' => $temphands]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes


    // --------------------------------------------------- FEET - DEX
    if (1==2) {}    

    else if ($row["rangermoccasins"] > 0) { $tempfeet = "ranger moccasins"; }        // 20
    else if ($row["rangerboots"] > 0) { $tempfeet = "ranger boots"; }        // 15
    else if ($row["silverslippers"] > 0) { $tempfeet = "silver slippers"; }        // 10
    else if ($row["banditboots"] > 0) { $tempfeet = "bandit boots"; }        // 6
    else if ($row["leatherboots"] > 0) { $tempfeet = "leather boots"; }        // 3
    else if ($row["greenboots"] > 0) { $tempfeet = "green boots"; }        // 2
    else if ($row["slippers"] > 0) { $tempfeet = "slippers"; }        // 1
    else if ($row["blackboots"] > 0) { $tempfeet = "black boots"; }        // 1
    else if ($row["trainingboots"] > 0) { $tempfeet = "training boots"; }        // 1def
        else { $tempfeet = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipFeet = '$tempfeet'");
    $updates = ['equipFeet' => $tempfeet]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes

    // --------------------------------------------------- RING 1 - DEX
    if (1==2) {}    

    else if ($row["ringofdexterityXXX"] > 0) { $tempring1 = "ring of dexterity XXX"; } 

    else if ($row["ringofdexterityXX"] > 0) { $tempring1 = "ring of dexterity XX"; } 
    else if ($row["ringofdexterityXIX"] > 0) { $tempring1 = "ring of dexterity XIX"; } 
    else if ($row["ringofdexterityXVIII"] > 0) { $tempring1 = "ring of dexterity XVIII"; } 
    else if ($row["ringofdexterityXVII"] > 0) { $tempring1 = "ring of dexterity XVII"; } 
    else if ($row["ringofdexterityXVI"] > 0) { $tempring1 = "ring of dexterity XVI"; } 
    else if ($row["ringofdexterityXV"] > 0) { $tempring1 = "ring of dexterity XV"; } 
    else if ($row["ringofdexterityXIV"] > 0) { $tempring1 = "ring of dexterity XIV"; } 
    else if ($row["ringofdexterityXIII"] > 0) { $tempring1 = "ring of dexterity XIII"; } 
    else if ($row["ringofdexterityXII"] > 0) { $tempring1 = "ring of dexterity XII"; } 
    else if ($row["ringofdexterityXI"] > 0) { $tempring1 = "ring of dexterity XI"; } 
    
    else if ($row["silverring"] > 0) { $tempring1 = "silver ring"; } //10

    else if ($row["ringofdexterityX"] > 0) { $tempring1 = "ring of dexterity X"; } 
    else if ($row["ringofdexterityIX"] > 0) { $tempring1 = "ring of dexterity IX"; } 
    else if ($row["ringofdexterityVIII"] > 0) { $tempring1 = "ring of dexterity VIII"; } 
    else if ($row["ringofdexterityVII"] > 0) { $tempring1 = "ring of dexterity VII"; } 
    else if ($row["ringofdexterityVI"] > 0) { $tempring1 = "ring of dexterity VI"; } 

    else if ($row["vaporring"] > 0) { $tempring1 = "vapor ring"; } //5
    else if ($row["greenwizardring"] > 0) { $tempring1 = "green wizard ring"; } //5
    else if ($row["rabidring"] > 0) { $tempring1 = "rabid ring"; } //5

    else if ($row["ringofdexterityV"] > 0) { $tempring1 = "ring of dexterity V"; } 
    else if ($row["ringofdexterityIV"] > 0) { $tempring1 = "ring of dexterity IV"; } 
    else if ($row["hunterring"] > 0) { $tempring1 = "hunter ring"; } 
    else if ($row["ringofdexterityIII"] > 0) { $tempring1 = "ring of dexterity III"; } 

    else if ($row["hunterring"] > 0) { $tempring1 = "hunter ring"; } //3

    else if ($row["coyotering"] > 0) { $tempring1 = "coyote ring"; } //2

    else if ($row["ringofdexterityII"] > 0) { $tempring1 = "ring of dexterity II"; } 
    else if ($row["ringofdexterity"] > 0) { $tempring1 = "ring of dexterity"; } 

    else if ($row["mithrilring"] > 0) { $tempring1 = "mithril ring"; } 
    else if ($row["steelring"] > 0) { $tempring1 = "steel ring"; } 
    else if ($row["ironring"] > 0) { $tempring1 = "iron ring"; } 

    else if ($row["soldiersring"] > 0) { $tempring1 = "soldier\'s ring"; } 

    else if ($row["ringofmagic"] > 0) { $tempring1 = "ring of magic"; } 
    else if ($row["ringofstrength"] > 0) { $tempring1 = "ring of strength"; } 
    else if ($row["ringofdefense"] > 0) { $tempring1 = "ring of defense"; } 

    else { $tempring1 = "<span> - - - </span>"; } //0

    // $results = $link->query("UPDATE $user SET equipRing1 = '$tempring1'");
    $updates = ['equipRing1' => $tempring1]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes


    // --------------------------------------------------- RING 2 - HEALTH REGEN
    if (1==2) {}    

    else if ($row["ringofhealthregenXXX"] > 0) { $tempring2 = "ring of health regen XXX"; } 

    else if ($row["ringofhealthregenXX"] > 0) { $tempring2 = "ring of health regen XX"; } 
    else if ($row["ringofhealthregenXIX"] > 0) { $tempring2 = "ring of health regen XIX"; } 
    else if ($row["ringofhealthregenXVIII"] > 0) { $tempring2 = "ring of health regen XVIII"; } 
    else if ($row["ringofhealthregenXVII"] > 0) { $tempring2 = "ring of health regen XVII"; } 
    else if ($row["ringofhealthregenXVI"] > 0) { $tempring2 = "ring of health regen XVI"; } 
    else if ($row["ringofhealthregenXV"] > 0) { $tempring2 = "ring of health regen XV"; } 
    else if ($row["ringofhealthregenXIV"] > 0) { $tempring2 = "ring of health regen XIV"; } 
    else if ($row["ringofhealthregenXIII"] > 0) { $tempring2 = "ring of health regen XIII"; } 
    else if ($row["ringofhealthregenXII"] > 0) { $tempring2 = "ring of health regen XII"; } 
    else if ($row["ringofhealthregenXI"] > 0) { $tempring2 = "ring of health regen XI"; } 

    else if ($row["ringofhealthregenX"] > 0) { $tempring2 = "ring of health regen X"; } 
    else if ($row["ringofhealthregenIX"] > 0) { $tempring2 = "ring of health regen IX"; } 
    else if ($row["ringofhealthregenVIII"] > 0) { $tempring2 = "ring of health regen VIII"; } 
    else if ($row["ringofhealthregenVII"] > 0) { $tempring2 = "ring of health regen VII"; } 
    else if ($row["ringofhealthregenVI"] > 0) { $tempring2 = "ring of health regen VI"; } 
    else if ($row["ringofhealthregenV"] > 0) { $tempring2 = "ring of health regen V"; } 
    else if ($row["ringofhealthregenIV"] > 0) { $tempring2 = "ring of health regen IV"; } 
    else if ($row["ringofhealthregenIII"] > 0) { $tempring2 = "ring of health regen III"; } 
    else if ($row["ringofhealthregenII"] > 0) { $tempring2 = "ring of health regen II"; } 
    else if ($row["ringofhealthregenI"] > 0) { $tempring2 = "ring of health regen I"; } 
    else if ($row["ringofhealthregen"] > 0) { $tempring2 = "ring of health regen"; } 
    else { $tempring2 = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipring2 = '$tempring2'");
    $updates = ['equipRing2' => $tempring2]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes



    // --------------------------------------------------- NECK - DEX
    if (1==2) {}    
    else if ($row["owleyependant"] > 0) { $tempneck = "owl eye pendant"; }        // 30
    else if ($row["rangeramulet"] > 0) { $tempneck = "ranger amulet"; }        // 25
    else if ($row["silvernecklace"] > 0) { $tempneck = "silver necklace"; }        // 20
    else if ($row["vapornecklace"] > 0) { $tempneck = "vapor necklace"; }        // 10
    else if ($row["greenpendant"] > 0) { $tempneck = "green pendant"; }        // 10
    else if ($row["ironnecklace"] > 0) { $tempneck = "iron necklace"; }        // 
    else if ($row["stonenecklace"] > 0) { $tempneck = "stone necklace"; }        // 
    else if ($row["bonenecklace"] > 0) { $tempneck = "bone necklace"; }        // 
    else if ($row["woodennecklace"] > 0) { $tempneck = "wooden necklace"; }        // 
    else { $tempneck = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipneck = '$tempneck'");
    $updates = ['equipneck' => $tempneck]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes

    // --------------------------------------------------- COMP - DEX / ALL
    if (1==2) {}    
    //   else if ($row["COMPsnowberserker"] > 0) { $tempcomp = "snow berserker"; }        // 
    //  else if ($row["COMPogreshieldmate"] > 0) { $tempcomp = "ogre shieldmate"; }        // 
    else if ($row["COMPelfranger"] > 0) { $tempcomp = "elf ranger"; }        // 
    else if ($row["COMPdwarfaxeman"] > 0) { $tempcomp = "dwarf axeman"; }        // 
    else { $tempcomp = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipcomp = '$tempcomp'");    
    $updates = ['equipcomp' => $tempcomp]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes    
    

    // --------------------------------------------------- PET - DEX / ALL
    if (1==2) {}    
    // else if ($row["babyowl"] > 0) { $temppet = "baby owl"; }        // 
    else if ($row["petbat"] > 0) { $temppet = "pet bat"; }        // 
    else if ($row["pethampster"] > 0) { $temppet = "pet hampster"; }        // 
    else { $temppet = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equippet = '$temppet'");
    $updates = ['equippet' => $temppet]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes


    // --------------------------------------------------- MOUNT - DEX
    if (1==2) {}    
    else if ($row["MOUNTgreengriffin"] > 0) { $tempmount = "green griffin"; }        // dex50
    else if ($row["MOUNTskyhawk"] > 0) { $tempmount = "sky hawk"; }        // mag25
    else if ($row["MOUNTdirewolf"] > 0) { $tempmount = "dire wolf"; }        // STR50
    else { $tempmount = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipmount = '$tempmount'");  
    $updates = ['equipmount' => $tempmount]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes      


    // --------------------------------------------------- ARTIFACT - DEX
    if (1==2) {}    
    else if ($row["squidtooth"] > 0) { $tempartifact = "squid tooth"; }        // dex 25
    else if ($row["luckybone"] > 0) { $tempartifact = "lucky bone"; }        // all 10
    else if ($row["coralcoin"] > 0) { $tempartifact = "coral coin"; }        // all 5
    else if ($row["pearlofwisdom"] > 0) { $tempartifact = "pearl of wisdom"; } // mag 50
    else if ($row["onyxcross"] > 0) { $tempartifact = "onyx cross"; }        // STR 50
    else { $tempartifact = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipartifact = '$tempartifact'");   
    $updates = ['equipartifact' => $tempartifact]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes     



    // --------------------------------------------------- DISPLAY
    echo $message = '<p class="">You auto-equip to <span class="green">MAXIMIZE DEXTERITY!</span></p>';
    include('update_feed.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Right:</span> '.$tempweap.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Left:</span> '.$tempoffhand.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Head:</span> '.$temphead.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Body:</span> '.$tempbody.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Hands:</span> '.$temphands.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Feet:</span> '.$tempfeet.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Ring1:</span> '.$tempring1.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Ring2:</span> '.$tempring2.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Neck:</span> '.$tempneck.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Comp:</span> '.$tempcomp.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Pet:</span> '.$temppet.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Mount:</span> '.$tempmount.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Artifact:</span> '.$tempartifact.'</div>';
    include('update_feed_alt.php'); // --- update feed


} // - END MAX DEX!!!

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx END MAX DEX
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx END MAX DEX
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx END MAX DEX
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx END MAX DEX
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx END MAX DEX






// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX MAG
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX MAG
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX MAG
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX MAG
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX MAG
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX MAG
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX MAG
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX MAG
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX MAG
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX MAG
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX MAG
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX MAG
if ($input=="max mag"){

    // --------------------------------------------------- 2H - MAG
    if (1==2) {}    

    //1h 
    else if ($row["gladiusofvalor"] > 0) { $tempweap = "gladius of valor"; $tempstyle="1h";} //100
        //2h
        else if ($row["neutronstaff"] > 0) { $tempweap = "neutron staff"; $tempstyle="2h";} //110
    else if ($row["mithrilwand"] > 0) { $tempweap = "mithril wand"; $tempstyle="1h";} //60
        else if ($row["mithrilnunchaku"] > 0) { $tempweap = "mithril nunchaku"; $tempstyle="2h";} //60
    else if ($row["kingblade"] > 0) { $tempweap = "king blade"; $tempstyle="1h";} //50
        else if ($row["mithrilbattlestaff"] > 0) { $tempweap = "mithril battle staff"; $tempstyle="2h";} //45
        else if ($row["solomonstaff"] > 0) { $tempweap = "solomon staff"; $tempstyle="2h";} //45
    else if ($row["mithrilstaff"] > 0) { $tempweap = "mithril staff"; $tempstyle="1h";} //40
        else if ($row["blessedspear"] > 0) { $tempweap = "blessed spear"; $tempstyle="2h";} //40
        else if ($row["steelnunchaku"] > 0) { $tempweap = "steel nunchaku"; $tempstyle="2h";} //40
    else if ($row["staffofthescorpion"] > 0) { $tempweap = "staff of the scorpion"; $tempstyle="1h";} //35
    else if ($row["mithrilmace"] > 0) { $tempweap = "mithril mace"; $tempstyle="1h";} //30
    else if ($row["gammaknife"] > 0) { $tempweap = "gamma knife"; $tempstyle="1h";} //30
        else if ($row["oakbattlestaff"] > 0) { $tempweap = "oak battle staff"; $tempstyle="2h";} //30
        else if ($row["ironnunchaku"] > 0) { $tempweap = "iron nunchaku"; $tempstyle="2h";} //25
    else if ($row["silverstaff"] > 0) { $tempweap = "silver staff"; $tempstyle="1h";} //25
        else if ($row["steelbattlestaff"] > 0) { $tempweap = "steel battle staff"; $tempstyle="2h";} //24        else if ($row["steelstaff"] > 0) { $tempweap = "steel staff"; $tempstyle="1h";} //22
    else if ($row["gildedfalcion"] > 0) { $tempweap = "gilded falcion"; $tempstyle="1h";} //20
        else if ($row["trident"] > 0) { $tempweap = "trident"; $tempstyle="2h";} //15
    else if ($row["graywand"] > 0) { $tempweap = "gray wand"; $tempstyle="1h";} //15
        else if ($row["nunchaku"] > 0) { $tempweap = "nunchaku"; $tempstyle="2h";} //13
        else if ($row["ironbattlestaff"] > 0) { $tempweap = "iron battle staff"; $tempstyle="2h";} //12
    else if ($row["flamberg"] > 0) { $tempweap = "flamberg"; $tempstyle="1h";} //10
    else if ($row["forestsaber"] > 0) { $tempweap = "forest saber"; $tempstyle="1h";} //10
        else if ($row["hammerheadhammer"] > 0) { $tempweap = "hammer headhammer"; $tempstyle="2h";} //10
    else if ($row["ironstaff"] > 0) { $tempweap = "iron staff"; $tempstyle="1h";} //10
    else if ($row["demondagger"] > 0) { $tempweap = "demon dagger"; $tempstyle="1h";} //10
        else if ($row["dualtomohawk"] > 0) { $tempweap = "dual tomohawk"; $tempstyle="2h";} //9
    else if ($row["wand"] > 0) { $tempweap = "wand"; $tempstyle="1h";} //9
    else if ($row["wizardstaff"] > 0) { $tempweap = "wizard staff"; $tempstyle="1h";} //8
    else if ($row["greatwhitesword"] > 0) { $tempweap = "great white sword"; $tempstyle="1h";} //7
        else if ($row["battlestaff"] > 0) { $tempweap = "battle staff"; $tempstyle="2h";} //6
        else if ($row["boneknuckles"] > 0) { $tempweap = "bone knuckles"; $tempstyle="2h";} //5
        else if ($row["threechainedflail"] > 0) { $tempweap = "three chained flail"; $tempstyle="1h";} //5
    else if ($row["swilversword"] > 0) { $tempweap = "silver sword"; $tempstyle="1h";} //5
    else if ($row["woodenstaff"] > 0) { $tempweap = "wooden staff"; $tempstyle="1h";} //5
        else if ($row["silver2hsword"] > 0) { $tempweap = "silver 2h sword"; $tempstyle="2h";} //5
        else if ($row["bostaff"] > 0) { $tempweap = "bo staff"; $tempstyle="2h";} //4
    else if ($row["poisonsaber"] > 0) { $tempweap = "poison saber"; $tempstyle="1h";} //3
    else if ($row["basicstaff"] > 0) { $tempweap = "basic staff"; $tempstyle="1h";} //3
    else if ($row["morningstar"] > 0) { $tempweap = "morning star"; $tempstyle="1h";} //3
    else if ($row["woodenbo"] > 0) { $tempweap = "wooden bo"; $tempstyle="2h";} //3
    else if ($row["gladius"] > 0) { $tempweap = "gladius"; $tempstyle="1h";} //2
        else if ($row["claymore"] > 0) { $tempweap = "claymore"; $tempstyle="2h";} //2
    else if ($row["mace"] > 0) { $tempweap = "mace"; $tempstyle="1h";} //2

    else { $tempweap = "fists"; } //0

    if ($tempweap == "fists") {
        // $results = $link->query("UPDATE $user SET weapontype = 0");
        // $results = $link->query("UPDATE $user SET equipR ='$tempweap'");
        // $results = $link->query("UPDATE $user SET equipL ='$tempweap'");
        $updates = [
            'equipL' => $tempweap,
            'equipR' => $tempweap,
            'weapontype' => 0,
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    if ($tempstyle=="1h") { // OFF HAND FOR ONE HANDED MAX MAG
        if (1==2) {}    
        else if ($row["magictalisman"] > 0) { $tempoffhand = "magic talisman";} //30
        else if ($row["rangerorb"] > 0) { $tempoffhand = "ranger orb";} //10
        else if ($row["dragonorb"] > 0) { $tempoffhand = "dragon orb";} //10
        else if ($row["rangershield"] > 0) { $tempoffhand = "ranger shield";} //10
        else if ($row["deathorb"] > 0) { $tempoffhand = "death orb";} //10
        else if ($row["enchantedorb"] > 0) { $tempoffhand = "enchanted orb";} //7
        else if ($row["offhandmace"] > 0) { $tempoffhand = "off hand mace";} //5
        else if ($row["glowingorb"] > 0) { $tempoffhand = "glowing orb";} //3
        else if ($row["towershield"] > 0) { $tempoffhand = "tower shield";} //2
        else if ($row["silvershield"] > 0) { $tempoffhand = "silver shield";} //1
        // else if ($row["starterorb"] > 0) { $tempoffhand = "starter orb";} //1
        else if ($row["woodenshield"] > 0) { $tempoffhand = "wooden shield";} //13def
        else if ($row["basicshield"] > 0) { $tempoffhand = "basic shield";} //7def
        else if ($row["trainingshield"] > 0) { $tempoffhand = "training shield";} //3def
        else { $tempoffhand = "<span> - - - </span>"; } //0

        // $results = $link->query("UPDATE $user SET weapontype = 1");
        // $results = $link->query("UPDATE $user SET equipR ='$tempweap'");
        // $results = $link->query("UPDATE $user SET equipL ='$tempoffhand'");
        $updates = [
            'equipL' => $tempoffhand,
            'equipR' => $tempweap,
            'weapontype' => 1,
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
    }
    else if ($tempstyle=="2h") { // 2h MAG - no off hand
        // $results = $link->query("UPDATE $user SET weapontype = 2");
        // $results = $link->query("UPDATE $user SET equipR ='$tempweap'");
        // $results = $link->query("UPDATE $user SET equipL ='$tempweap'");
        $updates = [
            'equipL' => $tempweap,
            'equipR' => $tempweap,
            'weapontype' => 2,
        ]; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
        $tempoffhand = $tempweap;
    }



    // --------------------------------------------------- HEAD - MAG
    if (1==2) {}    

    else if ($row["gammahood"] > 0) { $temphead = "gamma hood"; }        //10
    else if ($row["blackhood"] > 0) { $temphead = "black hood"; }        //10
    else if ($row["trollcrown"] > 0) { $temphead = "troll crown"; }        //6
    else if ($row["victoriashood"] > 0) { $temphead = "victoria\'s hood"; }        //6
    else if ($row["hauntedhelm"] > 0) { $temphead = "haunted helm"; }        //5
    else if ($row["scorpionhood"] > 0) { $temphead = "scorpion hood"; }        //5
    else if ($row["wizardhat"] > 0) { $temphead = "wizard hat"; }        //5
    else if ($row["calamaricap"] > 0) { $temphead = "calamari cap"; }        //4
    else if ($row["grayhood"] > 0) { $temphead = "gray hood"; }        //4
    else if ($row["bluehood"] > 0) { $temphead = "blue hood"; }        //2
    else if ($row["silverhelmet"] > 0) { $temphead = "silver helmet"; }        //1
    else if ($row["basichood"] > 0) { $temphead = "basic hood"; }        //1
    else if ($row["basichelmet"] > 0) { $temphead = "basic helmet"; }        //Def5
    else if ($row["traininghelmet"] > 0) { $temphead = "training helmet"; }        //Def3
    else { $temphead = "<span> - - - </span>"; } //0

    // $results = $link->query("UPDATE $user SET equipHead = '$temphead'");
    $updates = ['equipHead' => $temphead]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes

    // --------------------------------------------------- BODY - MAG
    if (1==2) {}    

    else if ($row["blackcloak"] > 0) { $tempbody = "black cloak"; }  //20
    else if ($row["silverpajamas"] > 0) { $tempbody = "silver pajamas"; }  //20
    else if ($row["demoncape"] > 0) { $tempbody = "demon cape"; }  //20
    else if ($row["gammarobe"] > 0) { $tempbody = "gamma robe"; }  //15
    else if ($row["warlockrobe"] > 0) { $tempbody = "warlock robe"; }  //10
    else if ($row["grayrobe"] > 0) { $tempbody = "gray robe"; }  //6
    else if ($row["snowvest"] > 0) { $tempbody = "snow vest"; }  //5
    else if ($row["championarmor"] > 0) { $tempbody = "champion armor"; }  //5
    else if ($row["turtleshell"] > 0) { $tempbody = "turtle shell"; }  //5
    else if ($row["forestcloak"] > 0) { $tempbody = "forest cloak"; }  //4
    else if ($row["blackrobe"] > 0) { $tempbody = "black robe"; }  //3
    else if ($row["pajamas"] > 0) { $tempbody = "pajamas"; }  //2
    else if ($row["silverbreastplate"] > 0) { $tempbody = "silver breastplate"; }  //1
    else if ($row["paddedarmor"] > 0) { $tempbody = "padded armor"; }        //Def13
    else if ($row["trainingarmorpro"] > 0) { $tempbody = "training armor pro"; }        //1
    else if ($row["trainingarmor"] > 0) { $tempbody = "training armor"; }        //Def3
    else { $tempbody = "<span> - - - </span>"; } //0

    // $results = $link->query("UPDATE $user SET equipBody = '$tempbody'");
    $updates = ['equipBody' => $tempbody]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes

    // --------------------------------------------------- HANDS - MAG
    if (1==2) {}    

    else if ($row["glowinggloves"] > 0) { $temphands = "glowing gloves"; }        //10
    else if ($row["gammahandwraps"] > 0) { $temphands = "gamma handwraps"; }        //8
    else if ($row["silkbracers"] > 0) { $temphands = "silk bracers"; }        //5
    else if ($row["grottogloves"] > 0) { $temphands = "grotto gloves"; }        //5
    else if ($row["banditgloves"] > 0) { $temphands = "bandit gloves"; }        //3
    else if ($row["trollgloves"] > 0) { $temphands = "troll gloves"; }        //3
    else if ($row["graygloves"] > 0) { $temphands = "gray gloves"; }        //2
    else if ($row["silvergauntlets"] > 0) { $temphands = "silver gauntlets"; }        //1
    else if ($row["glowingbrace"] > 0) { $temphands = "glowing brace"; }        //1
    else if ($row["traininggloves"] > 0) { $temphands = "training gloves"; }    //1dex
            else { $temphands = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipHands = '$temphands'");
    $updates = ['equipHands' => $temphands]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes


    // --------------------------------------------------- FEET - MAG
    if (1==2) {}    

    else if ($row["silkmoccasins"] > 0) { $tempfeet = "silk moccasins"; }        // 15
    else if ($row["gammaboots"] > 0) { $tempfeet = "gamma boots"; }        // 12
    else if ($row["silverslippers"] > 0) { $tempfeet = "silver slippers"; }        // 10
    else if ($row["warlockboots"] > 0) { $tempfeet = "warlock boots"; }        // 7
    else if ($row["boneboots"] > 0) { $tempfeet = "bone boots"; }        // 4
    else if ($row["mudboots"] > 0) { $tempfeet = "mud boots"; }        // 3
    else if ($row["grayboots"] > 0) { $tempfeet = "gray boots"; }        // 2
    else if ($row["silverboots"] > 0) { $tempfeet = "silver boots"; }        // 1
    else if ($row["slippers"] > 0) { $tempfeet = "slippers"; }        // 1
    else if ($row["blackboots"] > 0) { $tempfeet = "black boots"; }        // 1
    else if ($row["trainingboots"] > 0) { $tempfeet = "training boots"; }        // 1def
            else { $tempfeet = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipFeet = '$tempfeet'");
    $updates = ['equipFeet' => $tempfeet]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes


    // --------------------------------------------------- RING 1 - MAG
    if (1==2) {}    

    else if ($row["ringofthemagi"] > 0) { $tempring1 = "ring of the magi"; } //50

    else if ($row["ringofmagicXXX"] > 0) { $tempring1 = "ring of magic XXX"; } 

    else if ($row["ringofmagicXX"] > 0) { $tempring1 = "ring of magic XX"; } 

    else if ($row["warpedring"] > 0) { $tempring1 = "warped ring"; } //20

    else if ($row["ringofmagicXIX"] > 0) { $tempring1 = "ring of magic XIX"; } 
    else if ($row["ringofmagicXVIII"] > 0) { $tempring1 = "ring of magic XVIII"; } 
    else if ($row["ringofmagicXVII"] > 0) { $tempring1 = "ring of magic XVII"; } 
    else if ($row["ringofmagicXVI"] > 0) { $tempring1 = "ring of magic XVI"; } 
    else if ($row["ringofmagicXV"] > 0) { $tempring1 = "ring of magic XV"; } 
    else if ($row["ringofmagicXIV"] > 0) { $tempring1 = "ring of magic XIV"; } 
    else if ($row["ringofmagicXIII"] > 0) { $tempring1 = "ring of magic XIII"; } 
    else if ($row["ringofmagicXII"] > 0) { $tempring1 = "ring of magic XII"; } 
    else if ($row["ringofmagicXI"] > 0) { $tempring1 = "ring of magic XI"; } 
    
    else if ($row["silverring"] > 0) { $tempring1 = "silver ring"; } //10

    else if ($row["ringofmagicX"] > 0) { $tempring1 = "ring of magic X"; } 
    else if ($row["ringofmagicIX"] > 0) { $tempring1 = "ring of magic IX"; } 
    else if ($row["ringofmagicVIII"] > 0) { $tempring1 = "ring of magic VIII"; } 
    else if ($row["ringofmagicVII"] > 0) { $tempring1 = "ring of magic VII"; } 
    else if ($row["ringofmagicVI"] > 0) { $tempring1 = "ring of magic VI"; } 

    else if ($row["vaporring"] > 0) { $tempring1 = "vapor ring"; } //5
    else if ($row["redwizardring"] > 0) { $tempring1 = "red wizard ring"; } //5
    else if ($row["greenwizardring"] > 0) { $tempring1 = "green wizard ring"; } //5
    else if ($row["yellowwizardring"] > 0) { $tempring1 = "yellow wizard ring"; } //5
    else if ($row["rabidring"] > 0) { $tempring1 = "rabid ring"; } 

    else if ($row["ringofmagicV"] > 0) { $tempring1 = "ring of magic V"; } 
    else if ($row["ringofmagicIV"] > 0) { $tempring1 = "ring of magic IV"; } 
    else if ($row["hunterring"] > 0) { $tempring1 = "hunter ring"; } 
    else if ($row["ringofmagicIII"] > 0) { $tempring1 = "ring of magic III"; } 

    else if ($row["coyotering"] > 0) { $tempring1 = "coyote ring"; } //2

    else if ($row["ringofmagicII"] > 0) { $tempring1 = "ring of magic II"; } 
    else if ($row["ringofmagic"] > 0) { $tempring1 = "ring of magic"; } 
    else if ($row["soldiersring"] > 0) { $tempring1 = "soldier\'s ring"; } 

    else if ($row["mithrilring"] > 0) { $tempring1 = "mithril ring"; } 
    else if ($row["steelring"] > 0) { $tempring1 = "steel ring"; } 
    else if ($row["ironring"] > 0) { $tempring1 = "iron ring"; } 

    else if ($row["soldiersring"] > 0) { $tempring1 = "soldier\'s ring"; } 

    else if ($row["ringofstrength"] > 0) { $tempring1 = "ring of strength"; } 
    else if ($row["ringofdexterity"] > 0) { $tempring1 = "ring of dexterity"; } 
    else if ($row["ringofdefense"] > 0) { $tempring1 = "ring of defense"; } 

    else { $tempring1 = "<span> - - - </span>"; } //0

    // $results = $link->query("UPDATE $user SET equipRing1 = '$tempring1'");
    $updates = ['equipRing1' => $tempring1]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes


    // --------------------------------------------------- RING 2 - mana REGEN
    if (1==2) {}    

    else if ($row["ringofmanaregenXXX"] > 0) { $tempring2 = "ring of mana regen XXX"; } 

    else if ($row["ringofmanaregenXX"] > 0) { $tempring2 = "ring of mana regen XX"; } 
    else if ($row["ringofmanaregenXIX"] > 0) { $tempring2 = "ring of mana regen XIX"; } 
    else if ($row["ringofmanaregenXVIII"] > 0) { $tempring2 = "ring of mana regen XVIII"; } 
    else if ($row["ringofmanaregenXVII"] > 0) { $tempring2 = "ring of mana regen XVII"; } 
    else if ($row["ringofmanaregenXVI"] > 0) { $tempring2 = "ring of mana regen XVI"; } 
    else if ($row["ringofmanaregenXV"] > 0) { $tempring2 = "ring of mana regen XV"; } 
    else if ($row["ringofmanaregenXIV"] > 0) { $tempring2 = "ring of mana regen XIV"; } 
    else if ($row["ringofmanaregenXIII"] > 0) { $tempring2 = "ring of mana regen XIII"; } 
    else if ($row["ringofmanaregenXII"] > 0) { $tempring2 = "ring of mana regen XII"; } 
    else if ($row["ringofmanaregenXI"] > 0) { $tempring2 = "ring of mana regen XI"; } 

    else if ($row["ringofmanaregenX"] > 0) { $tempring2 = "ring of mana regen X"; } 
    else if ($row["ringofmanaregenIX"] > 0) { $tempring2 = "ring of mana regen IX"; } 
    else if ($row["ringofmanaregenVIII"] > 0) { $tempring2 = "ring of mana regen VIII"; } 
    else if ($row["ringofmanaregenVII"] > 0) { $tempring2 = "ring of mana regen VII"; } 
    else if ($row["ringofmanaregenVI"] > 0) { $tempring2 = "ring of mana regen VI"; } 
    else if ($row["ringofmanaregenV"] > 0) { $tempring2 = "ring of mana regen V"; } 
    else if ($row["ringofmanaregenIV"] > 0) { $tempring2 = "ring of mana regen IV"; } 
    else if ($row["ringofmanaregenIII"] > 0) { $tempring2 = "ring of mana regen III"; } 
    else if ($row["ringofmanaregenII"] > 0) { $tempring2 = "ring of mana regen II"; } 
    else if ($row["ringofmanaregenI"] > 0) { $tempring2 = "ring of mana regen I"; } 
    else if ($row["ringofmanaregen"] > 0) { $tempring2 = "ring of mana regen"; } 
    else { $tempring2 = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipring2 = '$tempring2'");
    $updates = ['equipRing2' => $tempring2]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes


    // --------------------------------------------------- NECK - MAG
    if (1==2) {}    
    else if ($row["royalnecklace"] > 0) { $tempneck = "royal necklace"; }        // 25

    else if ($row["silvernecklace"] > 0) { $tempneck = "silver necklace"; }        // 20
    else if ($row["vapornecklace"] > 0) { $tempneck = "vapor necklace"; }        // 10
    else if ($row["coralnecklace"] > 0) { $tempneck = "coral necklace"; }        // 10
    else if ($row["shamannecklace"] > 0) { $tempneck = "shaman necklace"; }        // 5
    else if ($row["bluependant"] > 0) { $tempneck = "blue pendant"; }        // 5
    else if ($row["rangeramulet"] > 0) { $tempneck = "ranger amulet"; }        // 5
    else if ($row["ironnecklace"] > 0) { $tempneck = "iron necklace"; }        // 
    else if ($row["redtalisman"] > 0) { $tempneck = "red talisman"; }        // 
    else if ($row["stonenecklace"] > 0) { $tempneck = "stone necklace"; }        // 
    else if ($row["bonenecklace"] > 0) { $tempneck = "bone necklace"; }        // 
    else if ($row["woodennecklace"] > 0) { $tempneck = "wooden necklace"; }        // 
    else { $tempneck = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipneck = '$tempneck'");
    $updates = ['equipNeck' => $tempneck]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes


    // --------------------------------------------------- COMP - MAG / ALL
    if (1==2) {}    
    //   else if ($row["COMPsnowberserker"] > 0) { $tempcomp = "snow berserker"; }        // 
    //  else if ($row["COMPogreshieldmate"] > 0) { $tempcomp = "ogre shieldmate"; }        // 
    else if ($row["COMPelfranger"] > 0) { $tempcomp = "elf ranger"; }        // 
    else if ($row["COMPdwarfaxeman"] > 0) { $tempcomp = "dwarf axeman"; }        // 
    else { $tempcomp = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipcomp = '$tempcomp'");   
    $updates = ['equipComp' => $tempcomp]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes     
    

    // --------------------------------------------------- PET - MAG / ALL
    if (1==2) {}    
    // else if ($row["babyowl"] > 0) { $temppet = "baby owl"; }        // 
    else if ($row["petbat"] > 0) { $temppet = "pet bat"; }        // 
    else if ($row["pethampster"] > 0) { $temppet = "pet hampster"; }        // 
    else { $temppet = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equippet = '$temppet'");
    $updates = ['equipPet' => $temppet]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes


    // --------------------------------------------------- MOUNT - MAG
    if (1==2) {}    
    else if ($row["MOUNTskyhawk"] > 0) { $tempmount = "sky hawk"; }        // mag25
    else if ($row["MOUNTdirewolf"] > 0) { $tempmount = "dire wolf"; }        // STR50
    else if ($row["MOUNTgreengriffin"] > 0) { $tempmount = "green griffin"; }        // dex50
    else { $tempmount = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipmount = '$tempmount'");  
    $updates = ['equipMount' => $tempmount]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes

    // --------------------------------------------------- ARTIFACT - MAG
    if (1==2) {}    
    // else if ($row["bloodcoin"] > 0) { $tempartifact = "bloodcoin"; }        // STR 100
    else if ($row["pearlofwisdom"] > 0) { $tempartifact = "pearl of wisdom"; } // mag 50
    else if ($row["luckybone"] > 0) { $tempartifact = "lucky bone"; }        // all 10
    else if ($row["coralcoin"] > 0) { $tempartifact = "coral coin"; }        // all 5
    else if ($row["onyxcross"] > 0) { $tempartifact = "onyx cross"; }        // STR 50
    else if ($row["squidtooth"] > 0) { $tempartifact = "squid tooth"; }        // dex 25
    else { $tempartifact = "<span> - - - </span>"; } //0
    // $results = $link->query("UPDATE $user SET equipartifact = '$tempartifact'");       
    $updates = ['equipArtifact' => $tempartifact]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes


    // --------------------------------------------------- DISPLAY
    echo $message = '<p class="">You auto-equip to <span class="blue">MAXIMIZE MAGIC!</span></p>';
    include('update_feed.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Right:</span> '.$tempweap.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Left:</span> '.$tempoffhand.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Head:</span> '.$temphead.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Body:</span> '.$tempbody.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Hands:</span> '.$temphands.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Feet:</span> '.$tempfeet.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Ring1:</span> '.$tempring1.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Ring2:</span> '.$tempring2.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Neck:</span> '.$tempneck.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Comp:</span> '.$tempcomp.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Pet:</span> '.$temppet.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Mount:</span> '.$tempmount.'</div>';
    include('update_feed_alt.php'); // --- update feed
    echo $message = '<div class=""><span class="gray">Artifact:</span> '.$tempartifact.'</div>';
    include('update_feed_alt.php'); // --- update feed


} // - END MAX MAG!!!

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx END MAX MAG
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx END MAX MAG
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx END MAX MAG
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx END MAX MAG
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx END MAX MAG   


// }