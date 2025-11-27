<?php
// ---------------------------------------------------------------------------- INV TAB
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

    echo '<section  data-pop="inv" class="panelXXX" id="weap">';
    echo '<div class="sticky tabs">
    Jump to
    <a href="#onehanded" class="ddgrayBG btn">1H</a>
    <a href="#twohanded" class="ddgrayBG btn">2H</a>
    <a href="#range" class="ddgrayBG btn">Range</a>
    <a href="#shield" class="ddgrayBG btn">Shield</a>
    </div>';

    echo '<div class="gbox" id="onehanded">';
    echo '<h2>1h Weapons</h2>';

    include('stats-quick.php'); // QUICK STATS AND MAX BUTTONS!


// -------------------- INV ITEM FUNCTION LOOP
function invItem($row,$disabled,$item,$item_color,$item_str,$item_dex,$item_mag,$item_def,$item_cost) {
    echo '<div class="itembox ddgrayBG">
    <span class="icon '.$item_color.'">'.file_get_contents("img/svg/equipment/".$item.".svg").'</span>
    <p class="'.$item_color.'">'.$item.'</p>
    <p class="">( '.$item_str.' STR, '.$item_dex.' DEX, '.$item_mag.' MAG, '.$item_def.' DEF )</p>
    <p class=""><span class="gold">cost:</span> 7 wood <span class="gray">('.$row[$item].')</span></p>
    <p class="qty">x'.$row[$item].'</p>
    <button class=" '.$disabled.'" type="submit" name="input1" value="equip '.$item.'">
        Equip
    </button>
    <button class=" '.$disabled.'" type="submit" name="input1" value="sell all '.$item.'">
        Sell all but 1
    </button>
    '.$item_cost.'
    </div>';    
}

$item = "dagger";   
$item_color = "red";
$item_str = 1;
$item_dex = 0;
$item_mag = 0;
$item_def = 0;
$item_cost = $_SESSION['COSTdagger'];


//invItem($row,$disabled,$item,$item_color,$item_str,$item_dex,$item_mag,$item_def,$item_cost);

// TURN THIS ON ABOVE TO SHOW THE BUTTON FUNCTIUON!!!@!!



    //-<span class="h2">1h Weapons<i>R</span></span>
    if ($row["dagger"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "dagger") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip dagger' /> ";
        }
        echo "<span>".$row["dagger"]."x </span> dagger <span>( <span class='lightred'>+1</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTdagger']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell dagger' />
		</div>";
    }

    if ($row["trainingsword"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "training sword") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip training sword' /> ";
        }
        echo "<span>".$row["trainingsword"]."x </span> training sword <span>( <span class='lightred'>+3</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTtrainingsword']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell training sword' />
					</div>";
    }
    if ($row["shortsword"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "short sword") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip short sword' /> ";
        }
        echo "<span>".$row["shortsword"]."x </span> short sword <span>( <span class='lightred'>+4</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTshortsword']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell short sword' />
					</div>";
    }

    if ($row["mace"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "mace") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mace' /> ";
        }
        echo "<span>".$row["mace"]."x </span> mace <span>( <span class='lightred'>+4</span> str, <span class='blue'>+2</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTmace']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mace' />
					</div>";
    }

    if ($row["broadsword"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "broad sword") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip broad sword' /> ";
        }
        echo "<span>".$row["broadsword"]."x </span> broad sword <span>( <span class='lightred'>+4</span> str, <span class='gold'>+2</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbroadsword']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell broad sword' />
	</div>";
    }
    if ($row["longsword"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "long sword") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip long sword' /> ";
        }
        echo "<span>".$row["longsword"]."x </span> long sword <span>( <span class='lightred'>+5</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTlongsword']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell long sword' />
			</div>";
    }
    if ($row["club"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "club") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip club' /> ";
        }
        echo "<span>".$row["club"]."x </span> club <span>( <span class='lightred'>+6</span> str, <span class='black'>-2</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTclub']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell club' />
			</div>";
    }



    if ($row["flail"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "flail") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip flail' /> ";
        }
        echo "<span>".$row["flail"]."x </span> flail <span>( <span class='lightred'>+7</span> str, <span class='gold'>+6</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTflail']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell flail' />
			</div>";
    }
    if ($row["morningstar"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "morning star") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip morning star' /> ";
        }
        echo "<span>".$row["morningstar"]."x </span> morning star <span>( <span class='lightred'>+6</span> str, <span class='blue'>+4</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTmorningstar']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell morning star' />
			</div>";
    }
    if ($row["samuraisword"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "samurai sword") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip samurai sword' /> ";
        }
        echo "<span>".$row["samuraisword"]."x </span> samurai sword <span>( <span class='lightred'>+8</span> str )</span>
 			<span class='sellPrice'>".$_SESSION['COSTsamuraisword']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell samurai sword' />
			</div>";
    }
    if ($row["gladius"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "gladius") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip gladius' /> ";
        }
        echo "<span>".$row["gladius"]."x </span> gladius <span>( <span class='lightred'>+9</span> str, <span class='blue'>+2</span> mag, <span class='gold'>+2</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgladius']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell gladius' />
			</div>";
    }


    if ($row["basicstaff"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "basic staff") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip basic staff' /> ";
        }
        echo "<span>".$row["basicstaff"]."x </span> basic staff <span>( <span class='blue'>+3</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTbasicstaff']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell basic staff' />
		</div>";
    }
    if ($row["woodenstaff"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "wooden staff") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip wooden staff' /> ";
        }
        echo "<span>".$row["woodenstaff"]."x </span> <span class='lightbrown'>wooden </span> staff <span>( <span class='blue'>+5</span> mag, <span class='lightred'>+1</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTwoodenstaff']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell wooden staff' />
		</div>";
    }
    if ($row["wand"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "wand") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip wand' /> ";
        }
        echo "<span>".$row["wand"]."x </span> wand <span>( <span class='blue'>+9</span> mag, <span class='black'>-2</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTwand']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell wand' />
		</div>";
    }
    if ($row["wizardstaff"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "wizard staff") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip wizard staff' /> ";
        }
        echo "<span>".$row["wizardstaff"]."x </span> wizard staff <span>( <span class='blue'>+8</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTwizardstaff']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell wizard staff' />
		</div>";
    }
    if ($row["demondagger"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "demon dagger") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip demon dagger' /> ";
        }
        echo "<span>".$row["demondagger"]."x </span> demon dagger <span>( <span class='blue'>+10</span> mag, <span class='lightred'>+5</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTdemondagger']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell demon dagger' />
		</div>";
    }
    if ($row["graywand"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "gray wand") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip gray wand' /> ";
        }
        echo "<span>".$row["graywand"]."x </span> <span class='lightergray'> gray </span> wand <span>( <span class='blue'>+15</span> mag, <span class='black'>-5</span> str, <span class='black'>-5</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgraywand']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell gray wand' />
		</div>";
    }


    if ($row["threechainedflail"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "three-chained flail") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip three-chained flail' /> ";
        }
        echo "<span>".$row["threechainedflail"]."x </span> three-chained flail <span>( <span class='lightred'>+15</span> str, <span class='blue'>+5</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTthreechainedflail']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell three-chained flail' /> </div>";
    }
    if ($row["bastardsword"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "bastard sword") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip bastard sword' /> ";
        }
        echo "<span>".$row["bastardsword"]."x </span> bastard sword <span>( <span class='lightred'>+11</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTbastardsword']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell bastard sword' /> </div>";
    }
    if ($row["giantclub"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "giant club") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip giant club' /> ";
        }
        echo "<span>".$row["giantclub"]."x </span> giant club <span>( <span class='lightred'>+13</span> str, <span class='black'>-3</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTgiantclub']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell giant club' /> </div>";
    }
    if ($row["greatwhitesword"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "great white sword") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip great white sword' /> ";
        }
        echo "<span>".$row["greatwhitesword"]."x </span> <span class='lightblue'> great white </span> sword <span>( <span class='lightred'>+17</span> str, <span class='blue'>+7</span> mag, <span class='gold'>+7</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgreatwhitesword']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell great white sword' /> </div>";
    }




    if ($row["masterblade"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "master blade") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip master blade' /> ";
        }
        echo "<span>".$row["masterblade"]."x </span> <span class='gold'>master blade</span> <span>( <span class='lightred'>+200</span> str, <span class='gold'>+100</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTmasterblade']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell master blade' /> </div>";
    }


    echo '-';
    // ------------------------------------------------------------------------------------------------- 1H iron Tier


    if ($row["irondagger"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "iron dagger") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron dagger' /> ";
        }
        echo "<span>".$row["irondagger"]."x </span> <span class='lightbrown'> iron </span> dagger <span>( <span class='lightred'>+7</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTirondagger']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron dagger' /> </div>";
    }
    if ($row["ironsword"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "iron sword") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron sword' /> ";
        }
        echo "<span>".$row["ironsword"]."x </span> <span class='lightbrown'> iron </span> sword <span>( <span class='lightred'>+18</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTironsword']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron sword' /> </div>";
    }
    if ($row["ironstaff"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "iron staff") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron staff' /> ";
        }
        echo "<span>".$row["ironstaff"]."x </span> <span class='lightbrown'> iron </span> staff <span>( <span class='blue'>+10</span> mag, <span class='lightred'>+3</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTironstaff']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron staff' /> </div>";
    }
    if ($row["poisonsaber"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "poison saber") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip poison saber' /> ";
        }
        echo "<span>".$row["poisonsaber"]."x </span> <span class='green'> poison </span> saber <span>( <span class='lightred'>+18</span> str, <span class='blue'>+3</span> mag,  <span class='green small'>poison<span class='green'>5</span></span> )</span>
			<span class='sellPrice'>".$_SESSION['COSTpoisonsaber']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell poison saber' /> </div>";
    }
    if ($row["ulfberht"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "ulfberht") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ulfberht' /> ";
        }
        echo "<span>".$row["ulfberht"]."x </span> <span class='blue'> ulfberht </span> <span>( <span class='lightred'>+26</span> str, <span class='gold'>+26</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTulfberht']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell ulfberht' /> </div>";
    }
    if ($row["axeofslaughter"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "axe of slaughter") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip axe of slaughter' /> ";
        }
        echo "<span>".$row["axeofslaughter"]."x </span> axe of <span class='lightred'> slaughter </span> <span>( <span class='lightred'>+45</span> str, <span class='black'>-5</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTaxeofslaughter']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell axe of slaughter' /> </div>";
    }

    echo '-';

    if ($row["silversword"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "silver sword") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip silver sword' /> ";
        }
        echo "<span>".$row["silversword"]."x </span> <span class='lightblue'> silver </span> sword <span>( <span class='lightred'>+25</span> str, <span class='blue'>+5</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilversword']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell silver sword' /> </div>";
    }
    if ($row["silverstaff"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "silver staff") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip silver staff' /> ";
        }
        echo "<span>".$row["silverstaff"]."x </span> <span class='lightblue'> silver </span> staff <span>( <span class='blue'>+25</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilverstaff']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell silver staff' /> </div>";
    }

    if ($row["steeldagger"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "steel dagger") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel dagger' /> ";
        }
        echo "<span>".$row["steeldagger"]."x </span> <span class='lightergray'> steel </span> dagger <span>( <span class='lightred'>+18</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteeldagger']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel dagger' /> </div>";
    }
    if ($row["steelsword"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "steel sword") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel sword' /> ";
        }
        echo "<span>".$row["steelsword"]."x </span> <span class='lightergray'> steel </span> sword <span>( <span class='lightred'>+27</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelsword']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel sword' /> </div>";
    }
    if ($row["steelstaff"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "steel staff") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel staff' /> ";
        }
        echo "<span>".$row["steelstaff"]."x </span> <span class='lightergray'> steel </span> staff <span>( <span class='blue'>+22</span> mag, <span class='lightred'>+5</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelstaff']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel staff' /> </div>";
    }

    if ($row["silverwhip"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "silver whip") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip silver whip' /> ";
        }
        echo "<span>".$row["silverwhip"]."x </span> <span class='lightblue'> silver </span> whip <span>( <span class='lightred'>+25</span> str, <span class='blue'>+25</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilverwhip']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell silver whip' /> </div>";
    }

    if ($row["staffofthescorpion"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "staff of the scorpion") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip staff of the scorpion' /> ";
        }
        echo "<span>".$row["staffofthescorpion"]."x </span> staff of the <span class='lightblue'> scorpion </span> <span>( <span class='blue'>+35</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTstaffofthescorpion']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell staff of the scorpion' /> </div>";
    }

    if ($row["forestsaber"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "forest saber") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip forest saberr' /> ";
        }
        echo "<span>".$row["forestsaber"]."x </span> <span class='green'> forest saber </span> <span>( <span class='lightred'>+30</span> str, <span class='blue'>+10</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTforestsaber']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell forest saber' /> </div>";
    }

    if ($row["sharpkatana"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "sharp katana") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip sharp katana' /> ";
        }
        echo "<span>".$row["sharpkatana"]."x </span> <span class='lightblue'> sharp </span> katana <span>( <span class='lightred'>+45</span> str, <span class='black'>-10</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsharpkatana']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell sharp katana' /> </div>";
    }


    if ($row["blackblade"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "black blade") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip black blade' /> ";
        }
        echo "<span>".$row["blackblade"]."x </span> <span class='black'> black </span> blade <span>( <span class='lightred'>+55</span> str, <span class='black'>-10</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTblackblade']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell black blade' /> </div>";
    }



    if ($row["flamberg"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "flamberg") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip flamberg' /> ";
        }
        echo "<span>".$row["flamberg"]."x </span>  flamberg <span>( <span class='lightred'>+50</span> str, <span class='blue'>+10</span> mag, <span class='gold'>+10</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTflamberg']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell flamberg' /> </div>";
    }


    echo '-';


    if ($row["mithrildagger"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "mithril dagger") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril dagger' /> ";
        }
        echo "<span>".$row["mithrildagger"]."x </span> <span class='blue'> mithril </span> dagger <span>( <span class='lightred'>+30</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrildagger']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril dagger' /> </div>";
    }
    if ($row["mithrilsword"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "mithril sword") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril sword' /> ";
        }
        echo "<span>".$row["mithrilsword"]."x </span> <span class='blue'> mithril </span> sword <span>( <span class='lightred'>+50</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilsword']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril sword' /> </div>";
    }
    if ($row["mithrilstaff"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "mithril staff") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril staff' /> ";
        }
        echo "<span>".$row["mithrilstaff"]."x </span> <span class='blue'> mithril </span> staff <span>( <span class='blue'>+40</span> mag, <span class='lightred'>+10</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilstaff']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril staff' /> </div>";
    }
    

    if ($row["vampiricdagger"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "vampiric dagger") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip vampiric dagger' /> ";
        }
        echo "<span>".$row["vampiricdagger"]."x </span> <span class='red'> vampiric </span> dagger <span>( <span class='lightred'>+30</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTvampiricdagger']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell vampiric dagger' /> </div>";
    }

    if ($row["guardianblade"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "guardian blade") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip guardian blade' /> ";
        }
        echo "<span>".$row["guardianblade"]."x </span> <span class='lightblue'> guardian </span> blade <span>( <span class='lightred'>+80</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTguardianblade']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell guardian blade' /> </div>";
    }

    if ($row["gildedfalcion"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "gilded falcion") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip gilded falcion' /> ";
        }
        echo "<span>".$row["gildedfalcion"]."x </span> <span class='gold'> gilded </span> falcion <span>( <span class='lightred'>+70</span> str, <span class='blue'>+20</span> mag, <span class='gold'>+20</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgildedfalcion']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell gilded falcion' /> </div>";
    }

    if ($row["gammaknife"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "gamma knife") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip gamma knife' /> ";
        }
        echo "<span>".$row["gammaknife"]."x </span> <span class='pink'> gamma </span> knife <span>( <span class='lightred'>+30</span> str, <span class='blue'>+30</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTgammaknife']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell gamma knife' /> </div>";
    }

    if ($row["mithrilwand"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "mithril wand") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril wand' /> ";
        }
        echo "<span>".$row["mithrilwand"]."x </span> <span class='blue'> mithril </span> wand <span>( <span class='blue'>+60</span> mag, <span class='black'>-30</span> str, <span class='black'>-30</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilwand']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril wand' /> </div>";
    }
    if ($row["mithrilflail"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "mithril flail") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril flail' /> ";
        }
        echo "<span>".$row["mithrilflail"]."x </span> <span class='blue'> mithril </span> flail <span>( <span class='lightred'>+80</span> str, <span class='gold'>+80</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilflail']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril flail' /> </div>";
    }
    if ($row["mithrilmace"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "mithril mace") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril mace' /> ";
        }
        echo "<span>".$row["mithrilmace"]."x </span> <span class='blue'> mithril </span> mace <span>( <span class='lightred'>+90</span> str, <span class='blue'>+30</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilmace']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril mace' /> </div>";
    }
    if ($row["mithrilcleaver"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "mithril cleaver") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril cleaver' /> ";
        }
        echo "<span>".$row["mithrilcleaver"]."x </span> <span class='blue'> mithril </span> cleaver <span>( <span class='lightred'>+150</span> str, <span class='black'>-50</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilcleaver']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril cleaver' /> </div>";
    }
    if ($row["gmgclub"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "gmg club") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip gmg club' /> ";
        }
        echo "<span>".$row["gmgclub"]."x </span> <span class='black'> gmg </span> club <span>( <span class='lightred'>+250</span> str, <span class='black'>-100</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTgmgclub']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell gmg club' /> </div>";
    }
    if ($row["gkclub"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "gk club") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip gk club' /> ";
        }
        echo "<span>".$row["gkclub"]."x </span> <span class='black'> gk </span> club <span>( <span class='lightred'>+200</span> str, <span class='black'>-200</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgkclub']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell gk club' /> </div>";
    }
    if ($row["kingblade"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "king blade") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip king blade' /> ";
        }
        echo "<span>".$row["kingblade"]."x </span> <span class='gold'> king </span> blade <span>( <span class='lightred'>+350</span> str, <span class='blue'>+50</span> mag, <span class='gold'>+50</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTkingblade']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell king blade' /> </div>";
    }




    echo '</div><div class="gbox" id="twohanded">';
    // ------------------------------------------------------------------------------------------------- 2h
    echo "<h2>2h Weapons</h2>";

    if ($row["training2hsword"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "training 2h sword") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip training 2h sword' /> ";
        }
        echo "<span>".$row["training2hsword"]."x </span> training 2h sword <span>( <span class='lightred'>+6</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTtraining2hsword']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell training 2h sword' />  </div>";
    }
    if ($row["bo"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "bo") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip bo' /> ";
        }
        echo "<span>".$row["bo"]."x </span> bo <span>( <span class='lightred'>+7</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTbo']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell bo' /></div>";
    }
    if ($row["battleaxe"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "battle axe") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip battle axe' /> ";
        }
        echo "<span>".$row["battleaxe"]."x </span> battle axe <span>( <span class='lightred'>+11</span> str, <span class='black'>-2</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbattleaxe']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell battle axe' /></div>";
    }
    if ($row["warhammer"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "warhammer") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip warhammer' /> ";
        }
        echo "<span>".$row["warhammer"]."x </span> warhammer <span>( <span class='lightred'>+13</span> str, <span class='black'>-5</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTwarhammer']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell warhammer' /></div>";
    }



    if ($row["woodenbo"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "wooden bo") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip wooden bo' /> ";
        }
        echo "<span>".$row["woodenbo"]."x </span> <span class='lightbrown'> wooden </span> bo <span>( <span class='lightred'>+9</span> str, <span class='blue'>+3</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTwoodenbo']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell wooden bo' /></div>";
    }
    if ($row["pike"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "pike") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip pike' /> ";
        }
        echo "<span>".$row["pike"]."x </span> pike <span>( <span class='lightred'>+11</span> str, <span class='gold'>+11</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTpike']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell pike' /></div>";
    }
    if ($row["claymore"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "claymore") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip claymore' /> ";
        }
        echo "<span>".$row["claymore"]."x </span> claymore <span>( <span class='lightred'>+13</span> str, <span class='blue'>+2</span> mag, <span class='gold'>+2</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTclaymore']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell claymore' /></div>";
    }

    if ($row["greatsword"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "great sword") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip great sword' /> ";
        }
        echo "<span>".$row["greatsword"]."x </span> great sword <span>( <span class='lightred'>+17</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTgreatsword']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell great sword' /></div>";
    }




    if ($row["bostaff"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "bo staff") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip bo staff' /> ";
        }
        echo "<span>".$row["bostaff"]."x </span> bo staff <span>( <span class='blue'>+4</span> mag, <span class='lightred'>+4</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTbostaff']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell bo staff' /></div>";
    }
    if ($row["battlestaff"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "battle staff") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip battle staff' /> ";
        }
        echo "<span>".$row["battlestaff"]."x </span> battle staff <span>( <span class='blue'>+6</span> mag, <span class='lightred'>+6</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTbattlestaff']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell battle staff' /></div>";
    }
    if ($row["dualtomahawk"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "dual tomahawk") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip dual tomahawk' /> ";
        }
        echo "<span>".$row["dualtomahawk"]."x </span> dual tomahawk <span>( <span class='blue'>+9</span> mag, <span class='lightred'>+9</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTdualtomahawk']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell dual tomahawk' /></div>";
    }

    if ($row["nunchaku"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "nunchaku") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip nunchaku' /> ";
        }
        echo "<span>".$row["nunchaku"]."x </span> nunchaku <span>( <span class='blue'>+13</span> mag, <span class='lightred'>+13</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTnunchaku']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell nunchaku' /></div>";
    }

    if ($row["boneknuckles"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "bone knuckles") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip bone knuckles' /> ";
        }
        echo "<span>".$row["boneknuckles"]."x </span> bone knuckles <span>( <span class='lightred'>+25</span> str, <span class='blue'>+5</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTboneknuckles']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell bone knuckles' /></div>";
    }
    if ($row["polearm"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "polearm") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip polearm' /> ";
        }
        echo "<span>".$row["polearm"]."x </span> polearm <span>( <span class='lightred'>+16</span> str, <span class='gold'>+20</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTpolearm']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell polearm' /></div>";
    }
    if ($row["bonecudgel"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "bone cudgel") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip bone cudgel' /> ";
        }
        echo "<span>".$row["bonecudgel"]."x </span> bone cudgel <span>( <span class='lightred'>+35</span> str, <span class='black'>-10</span> mag, <span class='black'>-10</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbonecudgel']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell bone cudgel' /></div>";
    }
    if ($row["hammerheadhammer"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "hammerhead hammer") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip hammerhead hammer' /> ";
        }
        echo "<span>".$row["hammerheadhammer"]."x </span> <span class='lightblue'> hammerhead </span> hammer
				<span>( <span class='lightred'>+35</span> str, <span class='blue'>+10</span> mag, <span class='gold'>+35</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSThammerheadhammer']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell hammerhead hammer' /></div>";
    }

    echo '-';




    if ($row["ironmaul"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "iron maul") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron maul' /> ";
        }
        echo "<span>".$row["ironmaul"]."x </span> <span class='lightbrown'> iron </span> maul <span>(
		<span class='lightred'>+22</span> str, <span class='gold'>+10</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTironmaul']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron maul' /></div>";
    }
    if ($row["iron2hsword"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "iron 2h sword") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron 2h sword' /> ";
        }
        echo "<span>".$row["iron2hsword"]."x </span> <span class='lightbrown'> iron </span> 2h sword <span>(
		<span class='lightred'>+25</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTiron2hsword']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron 2h sword' /></div>";
    }
    if ($row["ironbattlestaff"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "iron battle staff") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron battle staff' /> ";
        }
        echo "<span>".$row["ironbattlestaff"]."x </span>  <span class='lightbrown'> iron </span> battle staff <span>(
		<span class='blue'>+12</span> mag, <span class='lightred'>+12</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTironbattlestaff']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron battle staff' /></div>";
    }

    if ($row["ironnunchaku"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "iron nunchaku") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron nunchaku' /> ";
        }
        echo "<span>".$row["ironnunchaku"]."x </span> <span class='lightbrown'> iron </span> nunchaku <span>(
		<span class='blue'>+25</span> mag, <span class='lightred'>+25</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTironnunchaku']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron nunchaku' /></div>";
    }

    if ($row["greataxe"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "great axe") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip great axe' /> ";
        }
        echo "<span>".$row["greataxe"]."x </span> <span class='lightblue'>great </span> axe <span>(
		<span class='lightred'>+50</span> str, <span class='black'>-10</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgreataxe']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell great axe' /></div>";
    }

    if ($row["trident"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "trident") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip trident' /> ";
        }
        echo "<span>".$row["trident"]."x </span> <span class='gold'>trident</span> <span>( <span class='lightred'>+45</span> str, <span class='blue'>+15</span> mag, <span class='gold'>+15</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTtrident']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell trident' /></div>";
    }
    if ($row["solomonstaff"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "solomon staff") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip solomons staff' /> ";
        }
        echo "<span>".$row["solomonstaff"]."x </span> <span class='lightblue'>solomon</span> staff <span>( <span class='blue'>+45</span> mag, <span class='black'>-15</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTsolomonstaff']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell solomons staff' /></div>";
    }

    if ($row["oakbattlestaff"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "oak battle staff") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip oak battle staff' /> ";
        }
        echo "<span>".$row["oakbattlestaff"]."x </span> <span class='lightbrown'> oak </span> battle staff <span>( <span class='blue'>+30</span> mag, <span class='lightred'>+30</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSToakbattlestaff']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell oak battle staff' /></div>";
    }

    if ($row["jimbo"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "jim bo") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip jim bo' /> ";
        }
        echo "<span>".$row["jimbo"]."x </span> <span class='green'> jim </span> bo <span>( <span class='lightred'>+45</span> str, <span class='green small'>poison<span class='green'>5</span></span> )</span>
			<span class='sellPrice'>".$_SESSION['COSTjimbo']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell jim bo' />  </div>";
    }


    echo '-';

    if ($row["silver2hsword"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "silver 2h sword") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip silver 2h sword' /> ";
        }
        echo "<span>".$row["silver2hsword"]."x </span> <span class='lightblue'> silver </span> 2h sword <span>( <span class='lightred'>+45</span> str, <span class='blue'>+5</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilver2hsword']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell silver 2h sword' /></div>";
    }

    if ($row["steel2hsword"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "steel 2h sword") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel 2h sword' /> ";
        }
        echo "<span>".$row["steel2hsword"]."x </span> <span class='gray'> steel </span> 2h sword <span>( <span class='lightred'>+50</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteel2hsword']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel 2h sword' /></div>";
    }

    if ($row["steelbattlestaff"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "steel battle staff") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel battle staff' /> ";
        }
        echo "<span>".$row["steelbattlestaff"]."x </span> <span class='gray'> steel </span> battle staff <span>( <span class='blue'>+24</span> mag, <span class='lightred'>+24</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelbattlestaff']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel battle staff' /></div>";
    }

    if ($row["steelnunchaku"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "steel nunchaku") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel nunchaku' /> ";
        }
        echo "<span>".$row["steelnunchaku"]."x </span> <span class='gray'> steel </span> nunchaku <span>(
		<span class='blue'>+40</span> mag, <span class='lightred'>+40</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelnunchaku']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel nunchaku' /></div>";
    }


    if ($row["heavykatana"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "heavy katana") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip heavy katana' /> ";
        }
        echo "<span>".$row["heavykatana"]."x </span> <span class='lightblue'>heavy </span> katana <span>(
		<span class='lightred'>+90</span> str, <span class='black'>-20</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTheavykatana']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell heavy katana' /></div>";
    }

    if ($row["heavyspear"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "heavy spear") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip heavy spear' /> ";
        }
        echo "<span>".$row["heavyspear"]."x </span> <span class='lightblue'>heavy </span> spear <span>(
		<span class='lightred'>+40</span> str, <span class='gold'>+60</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTheavyspear']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell heavy spear' /></div>";
    }

    if ($row["heavyhammer"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "heavy hammer") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip heavy hammer' /> ";
        }
        echo "<span>".$row["heavyhammer"]."x </span> <span class='lightblue'>heavy </span> hammer <span>(
		<span class='lightred'>+120</span> str, <span class='black'>-40</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTheavyhammer']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell heavy hammer' /></div>";
    }

    if ($row["oakwarhammer"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "oak warhammer") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip oak warhammer' /> ";
        }
        echo "<span>".$row["oakwarhammer"]."x </span> <span class='lightbrown'>oak </span> warhammer <span>(
		<span class='lightred'>+85</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSToakwarhammer']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell oak warhammer' /></div>";
    }

    if ($row["bardiche"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "bardiche") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip bardiche' /> ";
        }
        echo "<span>".$row["bardiche"]."x </span> bardiche <span>( <span class='lightred'>+110</span> str, <span class='black'>-30</span> mag, <span class='black'>-30</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbardiche']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell bardiche' /></div>";
    }

    if ($row["glaive"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "glaive") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip glaive' /> ";
        }
        echo "<span>".$row["glaive"]."x </span> glaive <span>( <span class='lightred'>+80</span> str, <span class='gold'>+80</span> def  )</span>
			<span class='sellPrice'>".$_SESSION['COSTglaive']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell glaive' /></div>";
    }


    echo '-';

    if ($row["mithril2hsword"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "mithril 2h sword") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril 2h sword' /> ";
        }
        echo "<span>".$row["mithril2hsword"]."x </span> <span class='blue'> mithril </span> 2h sword <span>( <span class='lightred'>+100</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithril2hsword']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril 2h sword' /></div>";
    }

    if ($row["mithrilbattlestaff"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "mithril battle staff") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril battle staff' /> ";
        }
        echo "<span>".$row["mithrilbattlestaff"]."x </span> <span class='blue'> mithril </span> battle staff <span>( <span class='blue'>+45</span> mag, <span class='lightred'>+45</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilbattlestaff']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril battle staff' /></div>";
    }

    if ($row["mithrilnunchaku"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "mithril nunchaku") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril nunchaku' /> ";
        }
        echo "<span>".$row["mithrilnunchaku"]."x </span> <span class='blue'> mithril </span> nunchaku <span>(
		<span class='blue'>+60</span> mag, <span class='lightred'>+60</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilnunchaku']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril nunchaku' /></div>";
    }

    if ($row["humongousbattleaxe"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "humongous battleaxe") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip humongous battleaxe' /> ";
        }
        echo "<span>".$row["humongousbattleaxe"]."x </span> <span class='lightblue'>humongous </span> battleaxe <span>(
		<span class='lightred'>+150</span> str, <span class='black'>-50</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSThumongousbattleaxe']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell humongous battleaxe' /></div>";
    }


    if ($row["gargantuanwarhammer"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "gargantuan warhammer") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip gargantuan warhammer' /> ";
        }
        echo "<span>".$row["gargantuanwarhammer"]."x </span> <span class='lightblue'>gargantuan </span> warhammer <span>(
		<span class='lightred'>+250</span> str, <span class='black'>-100</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTgargantuanwarhammer']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell gargantuan warhammer' /></div>";
    }


    if ($row["blessedspear"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "blessed spear") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip blessed spear' /> ";
        }
        echo "<span>".$row["blessedspear"]."x </span> <span class='lightblue'>blessed </span> spear <span>(
		<span class='lightred'>+80</span> str, <span class='blue'>+40</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTblessedspear']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell blessed spear' /></div>";
    }


    if ($row["fortifiedfauchard"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "fortified fauchard") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip fortified fauchard' /> ";
        }
        echo "<span>".$row["fortifiedfauchard"]."x </span> <span class='gold'>fortified </span> fauchard <span>(
		<span class='lightred'>+120</span> str, <span class='gold'>+120</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTfortifiedfauchard']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell fortified fauchard' /></div>";
    }


    if ($row["neutronstaff"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "neutron staff") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip neutron staff' /> ";
        }
        echo "<span>".$row["neutronstaff"]."x </span> <span class='pink'> neutron </span> staff <span>( <span class='blue'>+110</span> mag, <span class='gold'>+110</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTneutronstaff']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell neutron staff' /> </div>";
    }



    if ($row["atomicwarhammer"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "atomic warhammer") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip atomic warhammer' /> ";
        }
        echo "<span>".$row["atomicwarhammer"]."x </span> <span class='gold'>atomic </span> warhammer <span>(
		<span class='lightred'>+500</span> str, <span class='gold'>+400</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTatomicwarhammer']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell atomic warhammer' /></div>";
    }
    


    echo '-';

    echo '</div><div class="gbox" id="range">';
    // ------------------------------------------------------------------------------------------------- RANGED

    echo '<h2>Ranged</h2>';
    echo '<p class="gray">Ranged attacks use DEX to cause damage. Weapons can be either one handed or two-handed.</p>';
    echo '<p class="gold">';
    if ($row["arrows"] > 0) {
        echo " <span class='gray'> ".$row["arrows"]."x </span> arrows  ";
    }
    if ($row["bolts"] > 0) {
        echo " <span class='gray'> ".$row["bolts"]."x </span> bolts ";
    }
    echo " </p>";

    if ($row["boomerang"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "boomerang") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip boomerang' /> ";
        }
        echo "<span>".$row["boomerang"]."x </span> boomerang <span>( <span class='green'>+3</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTboomerang']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell boomerang' />  </div>";
    }
    if ($row["chakram"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "chakram") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip chakram' /> ";
        }
        echo "<span>".$row["chakram"]."x </span>  chakram <span>( <span class='green'>+7</span> dex, <span class='blue'>+7</span> mag )</span>
      <span class='sellPrice'>".$_SESSION['COSTchakram']."</span>
      <input type='submit' class='sellBtn small' name='input1' value='sell chakram' />  </div>";
    }
    if ($row["woodenbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "wooden bow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip wooden bow' /> ";
        }
        echo "<span>".$row["woodenbow"]."x </span> <span class='lightbrown'> wooden </span> bow <span>( <span class='green'>+8</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTwoodenbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell wooden bow' />  </div>";
    }

    if ($row["hunterbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "hunter bow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip hunter bow' /> ";
        }
        echo "<span>".$row["hunterbow"]."x </span> hunter bow <span>( <span class='green'>+9</span> dex, <span class='gold'>+5</span> def )</span>
					<span class='sellPrice'>".$_SESSION['COSThunterbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell hunter bow' />  </div>";
    }
    if ($row["longbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "long bow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip long bow' /> ";
        }
        echo "<span>".$row["longbow"]."x </span> long bow <span>( <span class='green'>+11</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTlongbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell long bow' />  </div>";
    }



    if ($row["crossbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "crossbow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip crossbow' /> ";
        }
        echo "<span>".$row["crossbow"]."x </span> crossbow <span>( <span class='green'>+13</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTcrossbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell crossbow' />  </div>";
    }
    echo '-';

    if ($row["ironboomerang"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "iron boomerang") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron boomerang' /> ";
        }
        echo "<span>".$row["ironboomerang"]."x </span> <span class='lightbrown'> iron </span> boomerang <span>( <span class='green'>+10</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTironboomerang']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron boomerang' />  </div>";
    }
    if ($row["harpoon"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "harpoon") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip harpoon' /> ";
        }
        echo "<span>".$row["harpoon"]."x </span> harpoon <span>( <span class='green'>+8</span> dex, <span class='blue'>+4</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTharpoon']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell harpoon' />  </div>";
    }
    if ($row["ironchakram"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "iron chakram") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron chakram' /> ";
        }
        echo "<span>".$row["ironchakram"]."x </span> <span class='lightbrown'> iron </span> chakram <span>( <span class='green'>+15</span> dex, <span class='blue'>+15</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTironchakram']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron chakram' />  </div>";
    }

    if ($row["ironbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "iron bow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron bow' /> ";
        }
        echo "<span>".$row["ironbow"]."x </span> <span class='lightbrown'> iron </span> bow <span>( <span class='green'>+20</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTironbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron bow' />  </div>";
    }


    if ($row["enchantedbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "enchanted bow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip enchanted bow' /> ";
        }
        echo "<span>".$row["enchantedbow"]."x </span> <span class='pink'> enchanted </span> bow <span>( <span class='green'>+35</span> dex, <span class='blue'>+10</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTenchantedbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell enchanted bow' />  </div>";
    }


    if ($row["jimbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "jim bow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip jim bow' /> ";
        }
        echo "<span>".$row["jimbow"]."x </span> <span class='green'> jim </span> bow <span>( <span class='green'>+25</span> dex, <span class='green small'>poison<span class='green'>5</span></span> )</span>
			<span class='sellPrice'>".$_SESSION['COSTjimbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell jim bow' />  </div>";
    }



    if ($row["ironcrossbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "iron crossbow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron crossbow' /> ";
        }
        echo "<span>".$row["ironcrossbow"]."x </span> <span class='lightbrown'> iron </span> crossbow <span>( <span class='green'>+30</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTironcrossbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron crossbow' />  </div>";
    }
    if ($row["handcrossbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "hand crossbow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip hand crossbow' /> ";
        }
        echo "<span>".$row["handcrossbow"]."x </span> <span class='lightblue'>hand </span> crossbow <span>( <span class='green'>+35</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSThandcrossbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell hand crossbow' />  </div>";
    }
    if ($row["compoundcrossbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "compound crossbow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip compound crossbow' /> ";
        }
        echo "<span>".$row["compoundcrossbow"]."x </span> <span class='black'>compound </span> crossbow <span>( <span class='green'>+40</span> dex, <span class='gold'>+80</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTcompoundcrossbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell compound crossbow' />  </div>";
    }
    echo '-';

    if ($row["silverboomerang"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "silver boomerang") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip silver boomerang' /> ";
        }
        echo "<span>".$row["silverboomerang"]."x </span> <span class='lightblue'> silver </span> boomerang <span>( <span class='green'>+20</span> dex, <span class='blue'>+5</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilverboomerang']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell silver boomerang' />  </div>";
    }
    if ($row["silverbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "silver bow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip silver bow' /> ";
        }
        echo "<span>".$row["silverbow"]."x </span> <span class='lightblue'> silver </span> bow <span>( <span class='green'>+30</span> dex, <span class='blue'>+5</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilverbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell silver bow' />  </div>";
    }
    if ($row["silvercrossbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "silver crossbow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip silver crossbow' /> ";
        }
        echo "<span>".$row["silvercrossbow"]."x </span> <span class='lightblue'> silver </span> crossbow <span>( <span class='green'>+40</span> dex, <span class='blue'>+5</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilvercrossbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell silver crossbow' />  </div>";
    }

    if ($row["steelboomerang"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "steel boomerang") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel boomerang' /> ";
        }
        echo "<span>".$row["steelboomerang"]."x </span> <span class='gray'> steel </span> boomerang <span>( <span class='green'>+22</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelboomerang']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel boomerang' />  </div>";
    }
    if ($row["steelbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "steel bow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel bow' /> ";
        }
        echo "<span>".$row["steelbow"]."x </span> <span class='gray'> steel </span> bow <span>( <span class='green'>+33</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel bow' />  </div>";
    }
    if ($row["steelcrossbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "steel crossbow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel crossbow' /> ";
        }
        echo "<span>".$row["steelcrossbow"]."x </span> <span class='gray'> steel </span> crossbow <span>( <span class='green'>+44</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelcrossbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel crossbow' />  </div>";
    }
    if ($row["steelchakram"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "steel chakram") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel chakram' /> ";
        }
        echo "<span>".$row["steelchakram"]."x </span> <span class='gray'> steel </span> chakram <span>( <span class='green'>+25</span> dex, <span class='blue'>+25</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelchakram']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel chakram' />  </div>";
    }

    if ($row["snowbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "snow bow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip snow bow' /> ";
        }
        echo "<span>".$row["snowbow"]."x </span> <span class='white'> snow </span> bow <span>( <span class='green'>+45</span> dex, <span class='blue'>+15</span> mag, <span class='gold'>+15</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsnowbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell snow bow' />  </div>";
    }

    if ($row["greenhornbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "greenhorn bow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip greenhorn bow' /> ";
        }
        echo "<span>".$row["greenhornbow"]."x </span> <span class='green'> greenhorn </span> bow <span>( <span class='green'>+35</span> dex, <span class='gold'>+35</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgreenhornbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell greenhorn bow' />  </div>";
    }
    if ($row["keeperscrossbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "keeper's crossbow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip keepers crossbow' /> ";
        }
        echo "<span>".$row["keeperscrossbow"]."x </span> <span class='black'> keeper's </span> crossbow <span>( <span class='green'>+90</span> dex, <span class='black'>-50</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTkeeperscrossbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell keepers crossbow' />  </div>";
    }


    echo '-';



    if ($row["mithrilboomerang"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "mithril boomerang") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril boomerang' /> ";
        }
        echo "<span>".$row["mithrilboomerang"]."x </span> <span class='blue'> mithril </span> boomerang <span>( <span class='green'>+50</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilboomerang']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril boomerang' />  </div>";
    }
    if ($row["mithrilbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "mithril bow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril bow' /> ";
        }
        echo "<span>".$row["mithrilbow"]."x </span> <span class='blue'> mithril </span> bow <span>( <span class='green'>+60</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril bow' />  </div>";
    }
    if ($row["mithrilcrossbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "mithril crossbow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril crossbow' /> ";
        }
        echo "<span>".$row["mithrilcrossbow"]."x </span> <span class='blue'> mithril </span> crossbow <span>( <span class='green'>+80</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilcrossbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril crossbow' />  </div>";
    }

    if ($row["mithrilchakram"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "mithril chakram") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril chakram' /> ";
        }
        echo "<span>".$row["mithrilchakram"]."x </span> <span class='blue'> mithril </span> chakram <span>( <span class='green'>+40</span> dex, <span class='blue'>+40</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilchakram']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril chakram' />  </div>";
    }

    echo '-';



    if ($row["blackboomerang"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "black boomerang") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip black boomerang' /> ";
        }
        echo "<span>".$row["blackboomerang"]."x </span> <span class='black'> black </span> boomerang <span>( <span class='green'>+60</span> dex, <span class='blue'>+10</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTblackboomerang']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell black boomerang' />  </div>";
    }
    if ($row["blackbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "black bow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip black bow' /> ";
        }
        echo "<span>".$row["blackbow"]."x </span> <span class='black'> black </span> bow <span>( <span class='green'>+120</span> dex, <span class='blue'>+40</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTblackbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell black bow' />  </div>";
    }
    if ($row["blackcrossbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "black crossbow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip black crossbow' /> ";
        }
        echo "<span>".$row["blackcrossbow"]."x </span> <span class='black'> black </span> crossbow <span>( <span class='green'>+150</span> dex, <span class='gold'>+50</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTblackcrossbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell black crossbow' />  </div>";
    }
    if ($row["rangercrossbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "ranger crossbow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ranger crossbow' /> ";
        }
        echo "<span>".$row["rangercrossbow"]."x </span> <span class='green'> ranger </span> crossbow <span>( <span class='green'>+250</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTrangercrossbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell ranger crossbow' />  </div>";
    }
    if ($row["galaxybow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "galaxy bow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip galaxy bow' /> ";
        }
        echo "<span>".$row["galaxybow"]."x </span> <span class='pink'> galaxy </span> bow <span>( <span class='green'>+150</span> dex, <span class='blue'>+50</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTgalaxybow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell galaxy bow' />  </div>";
    }
    if ($row["chondrianbow"] > 0) {
        echo "<div>";
        if ($row["equipR"] == "chondrian bow") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip chondrian bow' /> ";
        }
        echo "<span>".$row["chondrianbow"]."x </span> <span class='purple'> chondrian </span> bow <span>( <span class='green'>+300</span> dex, <span class='blue'>+100</span> mag, <span class='gold'>+100</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTchondrianbow']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell chondrian bow' />  </div>";
    }



    echo '</div><div class="gbox" id="shield">';
    echo "<h2>Shields</h2>";


    // ------------------------------------------------------------------------------------------------- SHIELDS

    if ($row["trainingshield"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "training shield") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip training shield' /> ";
        }
        echo "<span>".$row["trainingshield"]."x </span> training shield <span>( <span class='gold'>+3</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTtrainingshield']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell training shield' />  </div>";
    }
    if ($row["basicshield"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "basic shield") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip basic shield' /> ";
        }
        echo "<span>".$row["basicshield"]."x </span> basic shield <span>( <span class='gold'>+7</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbasicshield']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell basic shield' />  </div>";
    }
    if ($row["kiteshield"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "kite shield") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip kite shield' /> ";
        }
        echo "<span>".$row["kiteshield"]."x </span> kite shield <span>( <span class='gold'>+20</span> def, <span class='black'>-5</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTkiteshield']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell kite shield' />  </div>";
    }
    if ($row["buckler"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "buckler") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip buckler' /> ";
        }
        echo "<span>".$row["buckler"]."x </span> buckler <span>( <span class='gold'>+5</span> def, <span class='lightred'>+2</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTbuckler']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell buckler' />  </div>";
    }
    if ($row["woodenshield"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "wooden shield") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip wooden shield' /> ";
        }
        echo "<span>".$row["woodenshield"]."x </span> <span class='lightbrown'> wooden </span> shield <span>( <span class='gold'>+13</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTwoodenshield']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell wooden shield' />  </div>";
    }
    if ($row["huntershield"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "hunter shield") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip hunter shield' /> ";
        }
        echo "<span>".$row["huntershield"]."x </span> <span class='lightblue'> hunter </span> shield <span>( <span class='gold'>+10</span> def, <span class='lightred'>+3</span> str, <span class='green'>+3</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSThuntershield']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell hunter shield' />  </div>";
    }
    if ($row["offhanddagger"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "off hand dagger") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip off hand dagger' /> ";
        }
        echo "<span>".$row["offhanddagger"]."x </span> off hand dagger <span>( <span class='lightred'>+5</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSToffhanddagger']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell off hand dagger' />  </div>";
    }
    if ($row["towershield"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "tower shield") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip tower shield' /> ";
        }
        echo "<span>".$row["towershield"]."x </span> tower shield <span>( <span class='gold'>+12</span> def, <span class='blue'>+2</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTtowershield']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell tower shield' />  </div>";
    }
    if ($row["glowingorb"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "glowing orb") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip glowing orb' /> ";
        }
        echo "<span>".$row["glowingorb"]."x </span> glowing orb <span>( <span class='blue'>+3</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTglowingorb']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell glowing orb' />  </div>";
    }
    if ($row["enchantedorb"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "enchanted orb") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip enchanted orb' /> ";
        }
        echo "<span>".$row["enchantedorb"]."x </span> enchanted orb <span>( <span class='blue'>+7</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTenchantedorb']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell enchanted orb' />  </div>";
    }

    echo '-';

    if ($row["ironshield"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "iron shield") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron shield' /> ";
        }
        echo "<span>".$row["ironshield"]."x </span> <span class='lightbrown'> iron </span> shield <span>( <span class='gold'>+25</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTironshield']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron shield' />  </div>";
    }
    if ($row["ironkiteshield"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "iron kite shield") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron kite shield' /> ";
        }
        echo "<span>".$row["ironkiteshield"]."x </span> <span class='lightbrown'> iron </span> kite shield <span>( <span class='gold'>+40</span> def, <span class='black'>-10</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTironkiteshield']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron kite shield' />  </div>";
    }
    if ($row["redshield"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "red shield") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip red shield' /> ";
        }
        echo "<span>".$row["redshield"]."x </span> <span class='lightred'> red </span> shield <span>( <span class='gold'>+25</span> def, <span class='lightred'>+5</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTredshield']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell red shield' />  </div>";
    }
    if ($row["deathorb"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "death orb") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip death orb' /> ";
        }
        echo "<span>".$row["deathorb"]."x </span> <span class='black'>death </span> orb <span>( <span class='blue'>+10</span> mag, <span class='black'>-10</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTdeathorb']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell death orb' />  </div>";
    }
    if ($row["greenshield"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "green shield") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip green shield' /> ";
        }
        echo "<span>".$row["greenshield"]."x </span> <span class='green'> green </span> shield <span>( <span class='green'>+7</span> dex, <span class='gold'>+7</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgreenshield']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell green shield' />  </div>";
    }

    echo '-';

    if ($row["silvershield"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "silver shield") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip silver shield' /> ";
        }
        echo "<span>".$row["silvershield"]."x </span> <span class='lightblue'> silver </span> shield <span>( <span class='gold'>+50</span> def, <span class='blue'>+1</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilvershield']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell silver shield' />  </div>";
    }
    if ($row["steelshield"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "steel shield") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel shield' /> ";
        }
        echo "<span>".$row["steelshield"]."x </span> <span class='lightblue'> steel </span> shield <span>( <span class='gold'>+55</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelshield']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel shield' />  </div>";
    }
    if ($row["steelkiteshield"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "steel kite shield") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel kite shield' /> ";
        }
        echo "<span>".$row["steelkiteshield"]."x </span> <span class='lightblue'> steel </span> kite shield <span>( <span class='gold'>+80</span> def, <span class='black'>-20</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelkiteshield']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel kite shield' />  </div>";
    }
    if ($row["vikingshield"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "viking shield") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip viking shield' /> ";
        }
        echo "<span>".$row["vikingshield"]."x </span> <span class='lightblue'> viking </span> shield <span>( <span class='gold'>+50</span> def, <span class='lightred'>+8</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTvikingshield']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell viking shield' />  </div>";
    }
    if ($row["greenorb"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "green orb") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip green orb' /> ";
        }
        echo "<span>".$row["greenorb"]."x </span> <span class='green'>green </span> orb <span>( <span class='green'>+15</span> dex, <span class='black'>-15</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgreenorb']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell green orb' />  </div>";
    }
    if ($row["offhandsword"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "off hand sword") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip off hand sword' /> ";
        }
        echo "<span>".$row["offhandsword"]."x </span> off hand sword <span>( <span class='lightred'>+10</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSToffhandsword']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell off hand sword' />  </div>";
    }


    echo '-';
    if ($row["mithrilshield"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "mithril shield") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril shield' /> ";
        }
        echo "<span>".$row["mithrilshield"]."x </span> <span class='blue'> mithril </span> shield <span>( <span class='gold'>+80</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilshield']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril shield' />  </div>";
    }
    if ($row["mithrilkiteshield"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "mithril kite shield") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril kite shield' /> ";
        }
        echo "<span>".$row["mithrilkiteshield"]."x </span> <span class='blue'> mithril </span> kite shield <span>( <span class='gold'>+160</span> def, <span class='black'>-40</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilkiteshield']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril kite shield' />  </div>";
    }



    if ($row["offhandmace"] > 0) {
        echo "<div>";
        if ($row["equipL"] == "off hand mace") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip off hand mace' /> ";
        }
        echo "<span>".$row["offhandmace"]."x </span> off hand mace <span>( <span class='lightred'>+25</span> str, <span class='blue'>+5</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSToffhandmace']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell off hand mace' />  </div>";
    }

    echo '-';











    echo '<div><input type="submit" name="input1" value="unequip all" /></div><br>';
    echo '</div>';

    echo "</section>";



    echo "<section data-pop2='armor'  class='panel' id='armor'>";


    echo '<div class="sticky tabs">
    Jump to
    <a href="#head" class="ddgrayBG btn">Head</a>
    <a href="#bod" class="ddgrayBG btn">Body</a>
    <a href="#hands" class="ddgrayBG btn">Hands</a>
    <a href="#feet" class="ddgrayBG btn">Feet</a>
    </div>';

    echo '<div class="gbox" id="head">';

    include('stats-quick.php'); // QUICK STATS AND MAX BUTTONS!


    echo "
	<h2>Head</h2>";


    if ($row["traininghelmet"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "training helmet") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip training helmet' /> ";
        }
        echo "<span>".$row["traininghelmet"]."x </span> training helmet <span>( <span class='gold'>+2</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTtraininghelmet']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell training helmet' />  </div>";
    }
    if ($row["basichelmet"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "basic helmet") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip basic helmet' /> ";
        }
        echo "<span>".$row["basichelmet"]."x </span> basic helmet <span>( <span class='gold'>+5</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbasichelmet']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell basic helmet' />  </div>";
    }
    if ($row["basichood"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "basic hood") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip basic hood' /> ";
        }
        echo "<span>".$row["basichood"]."x </span> basic hood <span>( <span class='lightred'>+1</span> str, <span class='green'>+1</span> dex, <span class='blue'>+1</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTbasichood']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell basic hood' />  </div>";
    }
    if ($row["redhood"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "red hood") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip red hood' /> ";
        }
        echo "<span>".$row["redhood"]."x </span> red hood <span>( <span class='lightred'>+2</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTredhood']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell red hood' />  </div>";
    }
    if ($row["greenhood"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "green hood") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip green hood' /> ";
        }
        echo "<span>".$row["greenhood"]."x </span> green hood <span>( <span class='green'>+2</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTgreenhood']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell green hood' />  </div>";
    }
    if ($row["bluehood"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "blue hood") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip blue hood' /> ";
        }
        echo "<span>".$row["bluehood"]."x </span> blue hood <span>( <span class='blue'>+2</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTbluehood']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell blue hood' />  </div>";
    }
    if ($row["leatherhood"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "leather hood") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip leather hood' /> ";
        }
        echo "<span>".$row["leatherhood"]."x </span> <span class='lightbrown'> leather </span> hood <span>( <span class='green'>+4</span> dex, <span class='gold'>+4</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTleatherhood']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell leather hood' />  </div>";
    }
    if ($row["leatherhelmet"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "leather helmet") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip leather helmet' /> ";
        }
        echo "<span>".$row["leatherhelmet"]."x </span> <span class='lightbrown'> leather </span> helmet <span>( <span class='lightred'>+2</span> str, <span class='gold'>+10</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTleatherhelmet']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell leather helmet' />  </div>";
    }
    if ($row["hornedhelmet"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "horned helmet") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip horned helmet' /> ";
        }
        echo "<span>".$row["hornedhelmet"]."x </span> horned helmet <span>( <span class='lightred'>+5</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSThornedhelmet']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell horned helmet' />  </div>";
    }
    if ($row["barbarianhelmet"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "barbarian helmet") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip barbarian helmet' /> ";
        }
        echo "<span>".$row["barbarianhelmet"]."x </span> barbarian helmet <span>( <span class='lightred'>+8</span> str, <span class='black'>-3</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTbarbarianhelmet']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell barbarian helmet' />  </div>";
    }

    if ($row["grayhood"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "gray hood") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip gray hood' /> ";
        }
        echo "<span>".$row["grayhood"]."x </span> <span class='gray'>gray</span> hood <span>( <span class='blue'>+4</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTgrayhood']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell gray hood' />  </div>";
    }
    if ($row["wizardhat"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "wizard hat") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip wizard hat' /> ";
        }
        echo "<span>".$row["wizardhat"]."x </span> <span class='lightpurple'>wizard</span> hat <span>( <span class='blue'>+5</span> mag, <span class='black'>-2</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTwizardhat']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell wizard hat' />  </div>";
    }
    if ($row["battlehelm"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "battle helm") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip battle helm' /> ";
        }
        echo "<span>".$row["battlehelm"]."x </span> <span class='lightbrown'>battle </span> helm <span>( <span class='lightred'>+4</span> str, <span class='gold'>+4</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbattlehelm']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell battle helm' /></div>";
    }
    if ($row["victoriashood"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "victoria's hood") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip victorias hood' /> ";
        }
        echo "<span>".$row["victoriashood"]."x </span> <span class='lightblue'> victoria's </span> hood <span>( <span class='blue'>+6</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTvictoriashood']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell victorias hood' />  </div>";
    }
    if ($row["scorpionhood"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "scorpion hood") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip scorpion hood' /> ";
        }
        echo "<span>".$row["scorpionhood"]."x </span> <span class='lightred'> scorpion </span> hood <span>( <span class='lightred'>+7</span> str, <span class='blue'>+5</span> mag, <span class='gold'>+5</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTscorpionhood']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell scorpion hood' />  </div>";
    }

    echo '-';
    if ($row["ironhood"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "iron hood") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron hood' /> ";
        }
        echo "<sp2an>".$row["ironhood"]."x </span> <span class='lightbrown'>iron </span> hood  <span>( <span class='lightred'>+3</span> str, <span class='green'>+3</span> dex, <span class='gold'>+3</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTironhood']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron hood' />  </div>";
    }
    if ($row["ironhelmet"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "iron helmet") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron helmet' /> ";
        }
        echo "<span>".$row["ironhelmet"]."x </span> <span class='lightbrown'>iron </span> helmet  <span>( <span class='gold'>+20</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTironhelmet']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron helmet' />  </div>";
    }
    if ($row["hauntedhelm"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "haunted helm") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip haunted helm' /> ";
        }
        echo "<span>".$row["hauntedhelm"]."x </span> <span class='lightblue'>haunted </span> helm <span>( <span class='blue'>+5</span> mag, <span class='gold'>+10</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSThauntedhelm']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell haunted helm' />  </div>";
    }

    if ($row["bandithood"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "bandit hood") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip bandit hood' /> ";
        }
        echo "<span>".$row["bandithood"]."x </span> <span class='black'>bandit </span> hood <span>(  <span class='green'>+8</span> dex, <span class='gold'>+8</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbandithood']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell bandit hood' />  </div>";
    }
    if ($row["calamaricap"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "calamari cap") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip calamari cap' /> ";
        }
        echo "<span>".$row["calamaricap"]."x </span> <span class='green'>calamari </span> cap <span>( <span class='cyan'>+4</span> all stats )</span>
			<span class='sellPrice'>".$_SESSION['COSTcalamaricap']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell calamari cap' />  </div>";
    }
    if ($row["heavyhelmet"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "heavy helmet") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip heavy helmet' /> ";
        }
        echo "<span>".$row["heavyhelmet"]."x </span> <span class='lightblue'>heavy </span> helmet <span>( <span class='lightred'>+10</span> str, <span class='gold'>+10</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTheavyhelmet']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell heavy helmet' />  </div>";
    }
    if ($row["earthhood"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "earth hood") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip earth hood' /> ";
        }
        echo "<span>".$row["earthhood"]."x </span> <span class='green'>earth </span> hood  <span>( <span class='lightred'>+16</span> str, <span class='gold'>+40</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTearthhood']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell earth hood' />  </div>";
    }
    if ($row["kettlehelm"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "kettle helm") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip kettle helm' /> ";
        }
        echo "<span>".$row["kettlehelm"]."x </span> <span class='gold'>kettle </span> helm <span>( <span class='gold'>+65</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTkettlehelm']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell kettle helm' />  </div>";
    }
    echo '-';


    if ($row["silverhelmet"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "silver helmet") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip silver helmet' /> ";
        }
        echo "<span>".$row["silverhelmet"]."x </span> <span class='lightblue'>silver </span> helmet  <span>( <span class='gold'>+40</span> def, <span class='blue'>+1</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilverhelmet']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell silver helmet' />  </div>";
    }
    if ($row["steelhood"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "steel hood") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel hood' /> ";
        }
        echo "<span>".$row["steelhood"]."x </span> <span class='lgray'>steel </span> hood  <span>( <span class='lightred'>+7</span> str, <span class='green'>+7</span> dex, <span class='gold'>+7</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelhood']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel hood' />  </div>";
    }
    if ($row["steelhelmet"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "steel helmet") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel helmet' /> ";
        }
        echo "<span>".$row["steelhelmet"]."x </span> <span class='lgray'>steel </span> helmet  <span>( <span class='gold'>+45</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelhelmet']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel helmet' />  </div>";
    }
    if ($row["steelmasterhelm"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "steel master helm") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel master helm' /> ";
        }
        echo "<span>".$row["steelmasterhelm"]."x </span> <span class='lgray'>steel </span> master helm  <span>( <span class='lightred'>+15</span> str, <span class='green'>+15</span> dex, <span class='gold'>+60</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelmasterhelm']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel master helm' />  </div>";
    }
    if ($row["trollcrown"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "troll crown") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip troll crown' /> ";
        }
        echo "<span>".$row["trollcrown"]."x </span> <span class='green'>troll </span> crown  <span>( <span class='lightred'>+12</span> str, <span class='blue'>+6</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTtrollcrown']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell troll crown' />  </div>";
    }
    if ($row["rangerhood"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "ranger hood") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ranger hood' /> ";
        }
        echo "<span>".$row["rangerhood"]."x </span> <span class='green'>ranger </span> hood  <span>( <span class='green'>+25</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTrangerhood']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell ranger hood' />  </div>";
    }
    if ($row["gammahood"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "gamma hood") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip gamma hood' /> ";
        }
        echo "<span>".$row["gammahood"]."x </span> <span class='pink'>gamma </span> hood  <span>( <span class='blue'>+10</span> mag, <span class='gold'>+30</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgammahood']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell gamma hood' />  </div>";
    }
    echo '-';


    if ($row["mithrilhelmet"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "mithril helmet") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril helmet' /> ";
        }
        echo "<span>".$row["mithrilhelmet"]."x </span> <span class='blue'>mithril </span> helmet  <span>( <span class='gold'>+80</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilhelmet']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril helmet' />  </div>";
    }
    if ($row["mithrilhood"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "mithril hood") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril hood' /> ";
        }
        echo "<span>".$row["mithrilhood"]."x </span> <span class='blue'>mithril </span> hood  <span>( <span class='lightred'>+13</span> str, <span class='green'>+13</span> dex, <span class='gold'>+13</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilhood']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril hood' />  </div>";
    }
    if ($row["bansheemask"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "banshee mask") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip banshee mask' /> ";
        }
        echo "<span>".$row["bansheemask"]."x </span> <span class='gold'>banshee </span> mask  <span>( <span class='lightred'>+35</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTbansheemask']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell banshee mask' />  </div>";
    }
    if ($row["blackhood"] > 0) {
        echo "<div>";
        if ($row["equipHead"] == "black hood") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip black hood' /> ";
        }
        echo "<span>".$row["blackhood"]."x </span> <span class='black'>black </span> hood  <span>( <span class='lightred'>+20</span> str, <span class='blue'>+10</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTblackhood']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell black hood' />  </div>";
    }
    echo '-';





    echo '</div><div class="gbox" id="bod">';

    echo "<h2>Body</h2>";



    if ($row["trainingarmor"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "training armor") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip training armor' /> ";
        }
        echo "<span>".$row["trainingarmor"]."x </span> training armor <span>( <span class='gold'>+3</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTtrainingarmor']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell training armor' />  </div>";
    }
    if ($row["trainingarmorpro"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "training armor pro") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip training armor pro' /> ";
        }
        echo "<span>".$row["trainingarmorpro"]."x </span> training armor pro <span>
					( <span class='gold'>+5</span> def, <span class='lightred'>+1</span> str, <span class='green'>+1</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTtrainingarmorpro']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell training armor pro' />  </div>";
    }
    if ($row["paddedarmor"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "padded armor") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip padded armor' /> ";
        }
        echo "<span>".$row["paddedarmor"]."x </span> padded armor <span>( <span class='gold'>+13</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTpaddedarmor']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell padded armor' />  </div>";
    }
    if ($row["pajamas"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "pajamas") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip pajamas' /> ";
        }
        echo "<span>".$row["pajamas"]."x </span> pajamas <span>( <span class='cyan'>+2</span> all stats )</span>
			<span class='sellPrice'>".$_SESSION['COSTpajamas']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell pajamas' />  </div>";
    }
    if ($row["greencloak"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "green cloak") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip green cloak' /> ";
        }
        echo "<span>".$row["greencloak"]."x </span> green cloak <span>( <span class='green'>+5</span> dex, <span class='gold'>+5</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgreencloak']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell green cloak' />  </div>";
    }
    if ($row["blackrobe"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "black robe") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip black robe' /> ";
        }
        echo "<span>".$row["blackrobe"]."x </span> black robe <span>( <span class='lightred'>+3</span> str, <span class='blue'>+3</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTblackrobe']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell black robe' />  </div>";
    }
    if ($row["grayrobe"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "gray robe") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip gray robe' /> ";
        }
        echo "<span>".$row["grayrobe"]."x </span> gray robe <span>( <span class='blue'>+6</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTgrayrobe']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell gray robe' />  </div>";
    }
    if ($row["leathervest"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "leather vest") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip leather vest' /> ";
        }
        echo "<span>".$row["leathervest"]."x </span> <span class='lightbrown'> leather </span> vest <span>( <span class='green'>+6</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTleathervest']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell leather vest' />  </div>";
    }
    if ($row["leatherarmor"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "leather armor") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip leather armor' /> ";
        }
        echo "<span>".$row["leatherarmor"]."x </span> <span class='lightbrown'> leather </span> armor <span>( <span class='lightred'>+4</span> str, <span class='gold'>+10</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTleatherarmor']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell leather armor' />  </div>";
    }
    if ($row["sasquatchcloak"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "sasquatch cloak") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip sasquatch cloak' /> ";
        }
        echo "<span>".$row["sasquatchcloak"]."x </span> <span class='lightblue'> sasquatch </span> cloak <span>( <span class='lightred'>+8</span> str, <span class='gold'>+8</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsasquatchcloak']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell sasquatch cloak' />  </div>";
    }
    if ($row["turtleshell"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "turtle shell") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip turtle shell' /> ";
        }
        echo "<span>".$row["turtleshell"]."x </span> <span class='green'> turtle </span> shell <span>( <span class='cyan'>+5</span> all stats )</span>
			<span class='sellPrice'>".$_SESSION['COSTturtleshell']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell turtle shell' />  </div>";
    }

    echo '-';
    if ($row["ironarmor"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "iron armor") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron armor' /> ";
        }
        echo "<span>".$row["ironarmor"]."x </span> <span class='lightbrown'> iron </span> armor <span>( <span class='gold'>+30</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTironarmor']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron armor' />  </div>";
    }
    if ($row["ironcape"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "iron cape") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron cape' /> ";
        }
        echo "<span>".$row["ironcape"]."x </span> <span class='lightbrown'> iron </span> cape <span>( <span class='lightred'>+15</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTironcape']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron cape' />  </div>";
    }
    if ($row["blackcape"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "black cape") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip black cape' /> ";
        }
        echo "<span>".$row["blackcape"]."x </span> <span class='black'> black </span> cape <span>( <span class='lightred'>+10</span> str, <span class='gold'>+10</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTblackcape']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell black cape' />  </div>";
    }
    if ($row["forestcloak"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "forest cloak") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip forest cloak' /> ";
        }
        echo "<span>".$row["forestcloak"]."x </span> <span class='green'> forest </span> cloak <span>( <span class='green'>+10</span> dex, <span class='blue'>+4</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTforestcloak']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell forest cloak' />  </div>";
    }
    if ($row["warlockrobe"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "warlock robe") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip warlock robe' /> ";
        }
        echo "<span>".$row["warlockrobe"]."x </span> <span class='lightblue'> warlock </span> robe <span>( <span class='blue'>+10</span> mag, <span class='black'>-10</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTwarlockrobe']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell warlock robe' />  </div>";
    }
    if ($row["championarmor"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "champion armor") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip champion armor' /> ";
        }
        echo "<span>".$row["championarmor"]."x </span> <span class='green'> champion </span> armor <span>( <span class='gold'>+45</span> def, <span class='lightred'>+5</span> str, <span class='blue'>+5</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTchampionarmor']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell champion armor' />  </div>";
    }


    echo '-';
    if ($row["silverbreastplate"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "silver breastplate") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip silver breastplate' /> ";
        }
        echo "<span>".$row["silverbreastplate"]."x </span> <span class='lightblue'> silver </span> breastplate <span>( <span class='gold'>+50</span> def, <span class='blue'>+1</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilverbreastplate']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell silver breastplate' />  </div>";
    }
    if ($row["steelarmor"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "steel armor") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel armor' /> ";
        }
        echo "<span>".$row["steelarmor"]."x </span> <span class='gray'> steel </span> armor <span>( <span class='gold'>+60</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelarmor']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel armor' />  </div>";
    }
    if ($row["steelcape"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "steel cape") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel cape' /> ";
        }
        echo "<span>".$row["steelcape"]."x </span> <span class='gray'> steel </span> cape <span>( <span class='lightred'>+30</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelcape']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel cape' />  </div>";
    }
    if ($row["rangercloak"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "ranger cloak") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ranger cloak' /> ";
        }
        echo "<span>".$row["rangercloak"]."x </span> <span class='green'> ranger </span> cloak <span>( <span class='green'>+25</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTrangercloak']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell ranger cloak' />  </div>";
    }
    if ($row["yeticloak"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "yeti cloak") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip yeti cloak' /> ";
        }
        echo "<span>".$row["yeticloak"]."x </span> <span class='white'> yeti </span> cloak <span>( <span class='lightred'>+25</span> str, <span class='gold'>+25</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTyeticloak']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell yeti cloak' />  </div>";
    }
    if ($row["demoncape"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "demon cape") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip demon cape' /> ";
        }
        echo "<span>".$row["demoncape"]."x </span> <span class='black'> demon </span> cape <span>( <span class='blue'>+20</span> mag, <span class='black'>-20</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTdemoncape']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell demon cape' />  </div>";
    }
    if ($row["silverpajamas"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "silver pajamas") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip silver pajamas' /> ";
        }
        echo "<span>".$row["silverpajamas"]."x </span> <span class='lightblue'> silver </span> pajamas <span>( <span class='cyan'>+20</span> all stats )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilverpajamas']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell silver pajamas' />  </div>";
    }
    echo '-';

    if ($row["mithrilarmor"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "mithril armor") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril armor' /> ";
        }
        echo "<span>".$row["mithrilarmor"]."x </span> <span class='blue'> mithril </span> armor <span>( <span class='gold'>+100</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilarmor']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril armor' />  </div>";
    }
    if ($row["mithrilcape"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "mithril cape") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril cape' /> ";
        }
        echo "<span>".$row["mithrilcape"]."x </span> <span class='blue'> mithril </span> cape <span>( <span class='lightred'>+50</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilcape']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril cape' />  </div>";
    }
    if ($row["snowvest"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "snow vest") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip snow vest' /> ";
        }
        echo "<span>".$row["snowvest"]."x </span> <span class='lightblue'> snow </span> vest <span>( <span class='green'>+20</span> dex, <span class='blue'>+5</span> mag, <span class='gold'>+50</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsnowvest']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell snow vest' />  </div>";
    }     
    if ($row["blackcloak"] > 0) {
        echo "<div>";
        if ($row["equipBody"] == "black cloak") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip black cloak' /> ";
        }
        echo "<span>".$row["blackcloak"]."x </span> <span class='black'> black </span> cloak <span>( <span class='red'>+40</span> str, <span class='blue'>+20</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTblackcloak']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell black cloak' />  </div>";
    }     






    echo '</div><div class="gbox" id="hands">';

    echo "<h2>Hands</h2>";



    if ($row["traininggloves"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "training gloves") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip training gloves' /> ";
        }
        echo "<span>".$row["traininggloves"]."x </span> training gloves <span>( <span class='green'>+1</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTtraininggloves']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell training gloves' /> </div>";
    }
    if ($row["wristbracers"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "wrist bracers") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip wrist bracers' /> ";
        }
        echo "<span>".$row["wristbracers"]."x </span> wrist bracers <span>( <span class='lightred'>+2</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTwristbracers']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell wrist bracers' /> </div>";
    }
    if ($row["glowingbrace"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "glowing brace") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip glowing brace' /> ";
        }
        echo "<span>".$row["glowingbrace"]."x </span> glowing brace <span>( <span class='blue'>+1</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTglowingbrace']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell glowing brace' /> </div>";
    }
    if ($row["blackgloves"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "black gloves") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip black gloves' /> ";
        }
        echo "<span>".$row["blackgloves"]."x </span> black gloves <span>( <span class='lightred'>+1</span> str, <span class='gold'>+2</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTblackgloves']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell black gloves' /> </div>";
    }
    if ($row["greengloves"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "green gloves") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip green gloves' /> ";
        }
        echo "<span>".$row["greengloves"]."x </span> green gloves <span>( <span class='green'>+2</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTgreengloves']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell green gloves' /> </div>";
    }
    if ($row["graygloves"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "gray gloves") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip gray gloves' /> ";
        }
        echo "<span>".$row["graygloves"]."x </span> gray gloves <span>( <span class='blue'>+2</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTgraygloves']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell gray gloves' /> </div>";
    }
    if ($row["leathergloves"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "leather gloves") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip leather gloves' /> ";
        }
        echo "<span>".$row["leathergloves"]."x </span> <span class='lightbrown'> leather </span> gloves <span>( <span class='green'>+3</span> dex, <span class='gold'>+3</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTleathergloves']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell leather gloves' /> </div>";
    }
    if ($row["huntergloves"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "hunter gloves") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip hunter gloves' /> ";
        }
        echo "<span>".$row["huntergloves"]."x </span> <span class='lightblue'> hunter </span> gloves <span>( <span class='lightred'>+3</span> str, <span class='green'>+3</span> dex, <span class='gold'>+3</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSThuntergloves']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell hunter gloves' /></div>";
    }
    if ($row["trollgloves"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "troll gloves") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip troll gloves' /> ";
        }
        echo "<span>".$row["trollgloves"]."x </span> <span class='green'> troll </span> gloves <span>( <span class='lightred'>+3</span> str, <span class='blue'>+3</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTtrollgloves']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell troll gloves' /> </div>";
    }
    echo '-';
    if ($row["irongauntlets"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "iron gauntlets") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron gauntlets' /> ";
        }
        echo "<span>".$row["irongauntlets"]."x </span> <span class='lightbrown'> iron </span> gauntlets <span>( <span class='gold'>+20</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTirongauntlets']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron gauntlets' /> </div>";
    }
    if ($row["irongloves"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "iron gloves") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron gloves' /> ";
        }
        echo "<span>".$row["irongloves"]."x </span> <span class='lightbrown'> iron </span> gloves <span>( <span class='lightred'>+5</span> str, <span class='gold'>+10</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTirongloves']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron gloves' /> </div>";
    }
    if ($row["ironknuckles"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "iron knuckles") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron knuckles' /> ";
        }
        echo "<span>".$row["ironknuckles"]."x </span> <span class='lightbrown'> iron </span> knuckles <span>( <span class='lightred'>+20</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTironknuckles']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron knuckles' /> </div>";
    }
    if ($row["banditgloves"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "bandit gloves") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip bandit gloves' /> ";
        }
        echo "<span>".$row["banditgloves"]."x </span> <span class='black'> bandit </span> gloves <span>( <span class='green'>+5</span> dex, <span class='blue'>+3</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTbanditgloves']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell bandit gloves' /> </div>";
    }
    if ($row["gatorgloves"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "gator gloves") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip gator gloves' /> ";
        }
        echo "<span>".$row["gatorgloves"]."x </span> <span class='green'> gator </span> gloves <span>( <span class='green'>+9</span> dex, <span class='gold'>+9</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgatorgloves']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell gator gloves' /> </div>";
    }
    if ($row["grottogloves"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "grotto gloves") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip grotto gloves' /> ";
        }
        echo "<span>".$row["grottogloves"]."x </span> <span class='lightblue'> grotto gloves </span> <span> ( <span class='blue'>+5</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTgrottogloves']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell grotto gloves' /> </div>";
    }

    echo '-';
    if ($row["silvergauntlets"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "silver gauntlets") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip silver gauntlets' /> ";
        }
        echo "<span>".$row["silvergauntlets"]."x </span> <span class='lightblue'> silver </span> gauntlets <span>( <span class='gold'>+30</span> def, <span class='blue'>+1</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilvergauntlets']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell silver gauntlets' /> </div>";
    }
    if ($row["steelgauntlets"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "steel gauntlets") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel gauntlets' /> ";
        }
        echo "<span>".$row["steelgauntlets"]."x </span> <span class='gray'> steel </span> gauntlets <span>( <span class='gold'>+35</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelgauntlets']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel gauntlets' /> </div>";
    }
    if ($row["steelgloves"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "steel gloves") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel gloves' /> ";
        }
        echo "<span>".$row["steelgloves"]."x </span> <span class='gray'> steel </span> gloves <span>( <span class='lightred'>+10</span> str, <span class='gold'>+20</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelgloves']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel gloves' /> </div>";
    }
    if ($row["silkbracers"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "silk bracers") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip silk bracers' /> ";
        }
        echo "<span>".$row["silkbracers"]."x </span> <span class='lightblue'> silk </span> bracers <span>( <span class='green'>+8</span> dex, <span class='blue'>+5</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilkbracers']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell silk bracers' /> </div>";
    }

    echo '-';




    if ($row["rangergloves"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "ranger gloves") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ranger gloves' /> ";
        }
        echo "<span>".$row["rangergloves"]."x </span> <span class='green'> ranger </span> gloves <span>( <span class='green'>+15</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTrangergloves']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell ranger gloves' /> </div>";
    }

    if ($row["glowinggloves"] > 0) {
        echo "<div>";
        if ($row["equipHands"] == "glowing gloves") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip glowing gloves' /> ";
        }
        echo "<span>".$row["glowinggloves"]."x </span> <span class='lightblue'> glowing </span> gloves <span>( <span class='blue'>+10</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTglowinggloves']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell glowing gloves' /> </div>";
    }

    echo '-';





    echo '</div><div class="gbox" id="feet">';


    echo "<h2>Feet</h2>";


    if ($row["trainingboots"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "training boots") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip training boots' /> ";
        }
        echo "<span>".$row["trainingboots"]."x </span> training boots <span>( <span class='gold'>+1</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTtrainingboots']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell training boots' /> </div>";
    }
    if ($row["redboots"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "red boots") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip red boots' /> ";
        }
        echo "<span>".$row["redboots"]."x </span> red boots <span>( <span class='lightred'>+2</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTredboots']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell red boots' /> </div>";
    }
    if ($row["greenboots"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "green boots") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip green boots' /> ";
        }
        echo "<span>".$row["greenboots"]."x </span> green boots <span>( <span class='green'>+2</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTgreenboots']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell green boots' /> </div>";
    }

    if ($row["blackboots"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "black boots") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip black boots' /> ";
        }
        echo "<span>".$row["blackboots"]."x </span> black boots <span>( <span class='lightred'>+1</span> str, <span class='blue'>+1</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTblackboots']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell black boots' /> </div>";
    }
    if ($row["grayboots"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "gray boots") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip gray boots' /> ";
        }
        echo "<span>".$row["grayboots"]."x </span> gray boots <span>( <span class='blue'>+2</span> mag, <span class='gold'>+1</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgrayboots']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell gray boots' /> </div>";
    }
    if ($row["slippers"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "slippers") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip slippers' /> ";
        }
        echo "<span>".$row["slippers"]."x </span> slippers <span>( <span class='cyan'>+1</span> all stats )</span>
			<span class='sellPrice'>".$_SESSION['COSTslippers']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell slippers' /> </div>";
    }
    if ($row["leatherboots"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "leather boots") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip leather boots' /> ";
        }
        echo "<span>".$row["leatherboots"]."x </span> <span class='lightbrown'> leather </span> boots <span>( <span class='green'>+3</span> dex, <span class='gold'>+3</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTleatherboots']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell leather boots' /> </div>";
    }
    if ($row["trollboots"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "troll boots") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip troll boots' /> ";
        }
        echo "<span>".$row["trollboots"]."x </span> <span class='green'> troll </span> boots <span>( <span class='lightred'>+3</span> str, <span class='gold'>+3</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTtrollboots']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell troll boots' /> </div>";
    }
    if ($row["boneboots"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "bone boots") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip bone boots' /> ";
        }
        echo "<span>".$row["boneboots"]."x </span> <span class='white'> bone </span> boots <span>( <span class='blue'>+4</span> mag, <span class='gold'>+4</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTboneboots']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell bone boots' /> </div>";
    }

    echo '-';
    if ($row["ironboots"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "iron boots") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron boots' /> ";
        }
        echo "<span>".$row["ironboots"]."x </span> <span class='lightbrown'> iron </span> boots <span>( <span class='gold'>+20</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTironboots']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell iron boots' /> </div>";
    }
    if ($row["bigfootboots"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "bigfoot boots") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip bigfoot boots' /> ";
        }
        echo "<span>".$row["bigfootboots"]."x </span> <span class='lightbrown'> bigfoot </span> boots <span>( <span class='lightred'>+10</span> str, <span class='gold'>+20</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbigfootboots']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell bigfoot boot' /> </div>";
    }
    if ($row["banditboots"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "bandit boots") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip bandit boots' /> ";
        }
        echo "<span>".$row["banditboots"]."x </span> <span class='black'> bandit </span> boots <span>( <span class='green'>+6</span> dex, <span class='gold'>+2</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbanditboots']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell bandit boots' /> </div>";
    }
    if ($row["mudboots"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "mud boots") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mud boots' /> ";
        }
        echo "<span>".$row["mudboots"]."x </span> <span class='lightbrown'> mud </span> boots <span>( <span class='lightred'>+6</span> str, <span class='blue'>+3</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTmudboots']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mud boots' /> </div>";
    }
    if ($row["warlockboots"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "warlock boots") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip warlock boots' /> ";
        }
        echo "<span>".$row["warlockboots"]."x </span> <span class='lightblue'> warlock </span> boots <span>( <span class='blue'>+7</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTwarlockboots']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell warlock boots' /> </div>";
    }


    echo '-';
    if ($row["silverboots"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "silver boots") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip silver boots' /> ";
        }
        echo "<span>".$row["silverboots"]."x </span> <span class='lightblue'> silver </span> boots <span>( <span class='gold'>+30</span> def, <span class='blue'>+1</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilverboots']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell silver boots' /> </div>";
    }
    if ($row["steelboots"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "steel boots") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel boots' /> ";
        }
        echo "<span>".$row["steelboots"]."x </span> <span class='gray'> steel </span> boots <span>( <span class='gold'>+35</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelboots']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell steel boots' /> </div>";
    }
    if ($row["thunderboots"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "thunder boots") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip thunder boots' /> ";
        }
        echo "<span>".$row["thunderboots"]."x </span> <span class='gold'> thunder </span> boots <span>( <span class='lightred'>+12</span> str, <span class='gold'>+12</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTthunderboots']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell thunder boots' /> </div>";
    }
    if ($row["rangerboots"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "ranger boots") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ranger boots' /> ";
        }
        echo "<span>".$row["rangerboots"]."x </span> <span class='green'> ranger </span> boots <span>( <span class='green'>+15</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTrangerboots']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell ranger boots' /> </div>";
    }
    if ($row["silverslippers"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "silver slippers") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip silver slippers' /> ";
        }
        echo "<span>".$row["silverslippers"]."x </span> <span class='lightblue'> silver </span> slippers <span>( <span class='cyan'>+10</span> all stats )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilverslippers']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell silver slippers' /> </div>";
    }

    echo '-';


    if ($row["mithrilboots"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "mithril boots") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril boots' /> ";
        }
        echo "<span>".$row["mithrilboots"]."x </span> <span class='blue'> mithril </span> boots <span>( <span class='gold'>+50</span> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilboots']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell mithril boots' /> </div>";
    }
    if ($row["crimsonmoccasins"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "crimson moccasins") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip crimson moccasins' /> ";
        }
        echo "<span>".$row["crimsonmoccasins"]."x </span> <span class='green'> crimson </span> moccasins <span>( <span class='red'>+20</span> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTcrimsonmoccasins']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell crimson moccasins' /> </div>";
    }
    if ($row["rangermoccasins"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "ranger moccasins") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ranger moccasins' /> ";
        }
        echo "<span>".$row["rangermoccasins"]."x </span> <span class='green'> ranger </span> moccasins <span>( <span class='green'>+20</span> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTrangermoccasins']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell ranger moccasins' /> </div>";
    }
    if ($row["silkmoccasins"] > 0) {
        echo "<div>";
        if ($row["equipFeet"] == "silk moccasins") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip silk moccasins' /> ";
        }
        echo "<span>".$row["silkmoccasins"]."x </span> <span class='lightblue'> silk </span> moccasins <span>( <span class='blue'>+15</span> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilkmoccasins']."</span>
			<input type='submit' class='sellBtn small' name='input1' value='sell silk moccasins' /> </div>";
    }


    echo "</div></section>
	<section data-pop2='acc'  class='panel' id='acc'>";

    echo '<div class="sticky tabs">
    Jump to
      <a href="#ring1" class="ddgrayBG btn">Ring1</a>
      <a href="#ring2" class="ddgrayBG btn">Ring2</a>
      <a href="#neck" class="ddgrayBG btn">Neck</a>
      <a href="#artifact" class="ddgrayBG btn">Artifact</a>
      </div>';

    echo '<div class="gbox" id="ring1">';

    include('stats-quick.php'); // QUICK STATS AND MAX BUTTONS!


    echo '<h2>Ring1</h2>';


    if ($row["ringofstrength"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of strength") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength' /> ";
        }
        echo "<span>".$row["ringofstrength"]."x </span> ring of strength <span>( <span class='lightred'>+1</span> str )</span> </div>";
    }
    if ($row["ringofdexterity"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity' /> ";
        }
        echo "<span>".$row["ringofdexterity"]."x </span> ring of dexterity <span>( <span class='green'>+1</span> dex )</span> </div>";
    }
    if ($row["ringofmagic"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of magic") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic' /> ";
        }
        echo "<span>".$row["ringofmagic"]."x </span> ring of magic <span>( <span class='blue'>+1</span> mag )</span> </div>";
    }
    if ($row["ringofdefense"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of defense") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense' /> ";
        }
        echo "<span>".$row["ringofdefense"]."x </span> ring of defense <span>( <span class='gold'>+1</span> def )</span> </div>";
    }

    if ($row["ringofstrengthII"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of strength II") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength II' /> ";
        }
        echo "<span>".$row["ringofstrengthII"]."x </span> ring of strength II <span>( <span class='lightred'>+2</span> str )</span> </div>";
    }
    if ($row["ringofdexterityII"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity II") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity II' /> ";
        }
        echo "<span>".$row["ringofdexterityII"]."x </span> ring of dexterity II <span>( <span class='green'>+2</span> dex )</span> </div>";
    }
    if ($row["ringofmagicII"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of magic II") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic II' /> ";
        }
        echo "<span>".$row["ringofmagicII"]."x </span> ring of magic II <span>( <span class='blue'>+2</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseII"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of defense II") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense II' /> ";
        }
        echo "<span>".$row["ringofdefenseII"]."x </span> ring of defense II <span>( <span class='gold'>+2</span> def )</span> </div>";
    }

    if ($row["ringofstrengthIII"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of strength III") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength III' /> ";
        }
        echo "<span>".$row["ringofstrengthIII"]."x </span> ring of strength III <span>( <span class='lightred'>+3</span> str )</span> </div>";
    }
    if ($row["ringofdexterityIII"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity III") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity III' /> ";
        }
        echo "<span>".$row["ringofdexterityIII"]."x </span> ring of dexterity III <span>( <span class='green'>+3</span> dex )</span> </div>";
    }
    if ($row["ringofmagicIII"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of magic III") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic III' /> ";
        }
        echo "<span>".$row["ringofmagicIII"]."x </span> ring of magic III <span>( <span class='blue'>+3</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseIII"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of defense III") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense III' /> ";
        }
        echo "<span>".$row["ringofdefenseIII"]."x </span> ring of defense III <span>( <span class='gold'>+3</span> def )</span> </div>";
    }

    if ($row["ringofstrengthIV"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of strength IV") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength IV' /> ";
        }
        echo "<span>".$row["ringofstrengthIV"]."x </span> ring of strength IV <span>( <span class='lightred'>+4</span> str )</span> </div>";
    }
    if ($row["ringofdexterityIV"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity IV") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity IV' /> ";
        }
        echo "<span>".$row["ringofdexterityIV"]."x </span> ring of dexterity IV <span>( <span class='green'>+4</span> dex )</span> </div>";
    }
    if ($row["ringofmagicIV"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of magic IV") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic IV' /> ";
        }
        echo "<span>".$row["ringofmagicIV"]."x </span> ring of magic IV <span>( <span class='blue'>+4</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseIV"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of defense IV") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense IV' /> ";
        }
        echo "<span>".$row["ringofdefenseIV"]."x </span> ring of defense IV <span>( <span class='gold'>+4</span> def )</span> </div>";
    }

    if ($row["ringofstrengthV"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of strength V") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength V' /> ";
        }
        echo "<span>".$row["ringofstrengthV"]."x </span> ring of strength V <span>( <span class='lightred'>+5</span> str )</span> </div>";
    }
    if ($row["ringofdexterityV"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity V") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity V' /> ";
        }
        echo "<span>".$row["ringofdexterityV"]."x </span> ring of dexterity V  <span>( <span class='green'>+5</span> dex )</span> </div>";
    }
    if ($row["ringofmagicV"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of magic V") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic V' /> ";
        }
        echo "<span>".$row["ringofmagicV"]."x </span> ring of magic V  <span>( <span class='blue'>+5</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseV"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of defense V") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense V' /> ";
        }
        echo "<span>".$row["ringofdefenseV"]."x </span> ring of defense V <span>( <span class='gold'>+5</span> def )</span> </div>";
    }


    if ($row["soldiersring"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "soldier's ring") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip soldiers ring' /> ";
        }
        echo "<span>".$row["soldiersring"]."x </span> <span class='gold'> soldier's </span> ring <span>( <span class='lightred'>+2</span> str, <span class='gold'>+2</span> def )</span> </div>";
    }
    if ($row["hunterring"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "hunter ring") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip hunter ring' /> ";
        }
        echo "<span>".$row["hunterring"]."x </span> <span class='green'> hunter </span> ring <span>( <span class='lightred'>+3</span> str, <span class='green'>+3</span> dex )</span> </div>";
    }
    if ($row["coyotering"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "coyote ring") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip coyote ring' /> ";
        }
        echo "<span>".$row["coyotering"]."x </span> <span class='lightblue'> coyote </span> ring <span>( <span class='lightred'>+2</span> str, <span class='green'>+2</span> dex, <span class='blue'>+2</span> mag )</span> </div>";
    }

    if ($row["redwizardring"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "red wizard ring") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip red wizard ring' /> ";
        }
        echo "<span>".$row["redwizardring"]."x </span> <span class='lightred'> red </span> wizard ring <span>( <span class='blue'>+5</span> mag, <span class='lightred'>+5</span> str )</span> </div>";
    }
    if ($row["greenwizardring"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "green wizard ring") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip green wizard ring' /> ";
        }
        echo "<span>".$row["greenwizardring"]."x </span> <span class='green'> green </span> wizard ring <span>( <span class='blue'>+5</span> mag, <span class='green'>+5</span> dex )</span> </div>";
    }
    if ($row["yellowwizardring"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "yellow wizard ring") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip yellow wizard ring' /> ";
        }
        echo "<span>".$row["yellowwizardring"]."x </span> <span class='yellow'> yellow </span> wizard ring <span>( <span class='blue'>+5</span> mag, <span class='gold'>+5</span> def )</span> </div>";
    }

    if ($row["rabidring"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "rabid ring") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip rabid ring' /> ";
        }
        echo "<span>".$row["rabidring"]."x </span> <span class='black'> rabid </span> ring <span>( <span class='lightred'>+5</span> str, <span class='green'>+5</span> dex, <span class='gold'>+5</span> def )</span> </div>";
    }


    if ($row["vaporring"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "vapor ring") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip vapor ring' /> ";
        }
        echo "<span>".$row["vaporring"]."x </span> <span class='pink'> vapor </span> ring <span>( <span class='cyan'>+5</span> all stats )</span> </div>";
    }


    if ($row["silverring"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "silver ring") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip silver ring' /> ";
        }
        echo "<span>".$row["silverring"]."x </span> <span class='lightblue'> silver </span> ring <span>( <span class='cyan'>+10</span> all stats )</span> </div>";
    }

    if ($row["warpedring"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "warped ring") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip warped ring' /> ";
        }
        echo "<span>".$row["warpedring"]."x </span> <span class='purple'> warped </span> ring <span>( <span class='blue'>+20</span> mag, <span class='black'>-20</span> def )</span> </div>";
    }

    if ($row["ringofthemagi"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of the magi") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of the magi' /> ";
        }
        echo "<span>".$row["ringofthemagi"]."x </span> ring of the <span class='blue'> magi </span> <span>( <span class='blue'>+50</span> mag</span> )</div>";
    }



    if ($row["ringofstrengthVI"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of strength VI") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength VI' /> ";
        }
        echo "<span>".$row["ringofstrengthVI"]."x </span> ring of strength VI <span>( <span class='lightred'>+6</span> str )</span> </div>";
    }
    if ($row["ringofdexterityVI"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity VI") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity VI' /> ";
        }
        echo "<span>".$row["ringofdexterityVI"]."x </span> ring of dexterity VI  <span>( <span class='green'>+6</span> dex )</span> </div>";
    }
    if ($row["ringofmagicVI"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of magic VI") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic VI' /> ";
        }
        echo "<span>".$row["ringofmagicVI"]."x </span> ring of magic VI  <span>( <span class='blue'>+6</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseVI"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of defense VI") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense VI' /> ";
        }
        echo "<span>".$row["ringofdefenseVI"]."x </span> ring of defense VI <span>( <span class='gold'>+6</span> def )</span> </div>";
    }


    if ($row["ringofstrengthVII"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of strength VII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength VII' /> ";
        }
        echo "<span>".$row["ringofstrengthVII"]."x </span> ring of strength VII <span>( <span class='lightred'>+7</span> str )</span> </div>";
    }
    if ($row["ringofdexterityVII"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity VII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity VII' /> ";
        }
        echo "<span>".$row["ringofdexterityVII"]."x </span> ring of dexterity VII  <span>( <span class='green'>+7</span> dex )</span> </div>";
    }
    if ($row["ringofmagicVII"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of magic VII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic VII' /> ";
        }
        echo "<span>".$row["ringofmagicVII"]."x </span> ring of magic VII  <span>( <span class='blue'>+7</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseVII"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of defense VII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense VII' /> ";
        }
        echo "<span>".$row["ringofdefenseVII"]."x </span> ring of defense VII <span>( <span class='gold'>+7</span> def )</span> </div>";
    }



    if ($row["ringofstrengthVIII"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of strength VIII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength VIII' /> ";
        }
        echo "<span>".$row["ringofstrengthVIII"]."x </span> ring of strength VIII <span>( <span class='lightred'>+8</span> str )</span> </div>";
    }
    if ($row["ringofdexterityVIII"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity VIII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity VIII' /> ";
        }
        echo "<span>".$row["ringofdexterityVIII"]."x </span> ring of dexterity VIII  <span>( <span class='green'>+8</span> dex )</span> </div>";
    }
    if ($row["ringofmagicVIII"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of magic VIII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic VIII' /> ";
        }
        echo "<span>".$row["ringofmagicVIII"]."x </span> ring of magic VIII  <span>( <span class='blue'>+8</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseVIII"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of defense VIII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense VIII' /> ";
        }
        echo "<span>".$row["ringofdefenseVIII"]."x </span> ring of defense VIII <span>( <span class='gold'>+8</span> def )</span> </div>";
    }

    if ($row["ringofstrengthIX"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of strength IX") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength IX' /> ";
        }
        echo "<span>".$row["ringofstrengthIX"]."x </span> ring of strength IX <span>( <span class='lightred'>+9</span> str )</span> </div>";
    }
    if ($row["ringofdexterityIX"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity IX") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity IX' /> ";
        }
        echo "<span>".$row["ringofdexterityIX"]."x </span> ring of dexterity IX  <span>( <span class='green'>+9</span> dex )</span> </div>";
    }
    if ($row["ringofmagicIX"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of magic IX") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic IX' /> ";
        }
        echo "<span>".$row["ringofmagicIX"]."x </span> ring of magic IX  <span>( <span class='blue'>+9</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseIX"] > 0) {
        echo "<div>";
        if ($row["equipRing1"] == "ring of defense IX") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense IX' /> ";
        }
        echo "<span>".$row["ringofdefenseIX"]."x </span> ring of defense IX <span>( <span class='gold'>+9</span> def )</span> </div>";
    }


    if ($row["ringofstrengthX"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of strength X") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength X' /> ";}
        echo "<span>".$row["ringofstrengthX"]."x </span> ring of strength X <span>( <span class='lightred'>+10</span> str )</span> </div>";
    }
    if ($row["ringofdexterityX"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity X") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity X' /> ";}
        echo "<span>".$row["ringofdexterityX"]."x </span> ring of dexterity X  <span>( <span class='green'>+10</span> dex )</span> </div>";
    }
    if ($row["ringofmagicX"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of magic X") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic X' /> ";}
        echo "<span>".$row["ringofmagicX"]."x </span> ring of magic X  <span>( <span class='blue'>+10</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseX"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of defense X") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense X' /> ";}
        echo "<span>".$row["ringofdefenseX"]."x </span> ring of defense X <span>( <span class='gold'>+10</span> def )</span> </div>";
    }

    if ($row["ringofstrengthXI"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of strength XI") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength XI' /> ";}
        echo "<span>".$row["ringofstrengthXI"]."x </span> ring of strength XI <span>( <span class='lightred'>+11</span> str )</span> </div>";
    }
    if ($row["ringofdexterityXI"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity XI") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity XI' /> ";}
        echo "<span>".$row["ringofdexterityXI"]."x </span> ring of dexterity XI  <span>( <span class='green'>+11</span> dex )</span> </div>";
    }
    if ($row["ringofmagicXI"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of magic XI") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic XI' /> ";}
        echo "<span>".$row["ringofmagicXI"]."x </span> ring of magic XI  <span>( <span class='blue'>+11</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseXI"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of defense XI") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense XI' /> ";}
        echo "<span>".$row["ringofdefenseXI"]."x </span> ring of defense XI <span>( <span class='gold'>+11</span> def )</span> </div>";
    }

    if ($row["ringofstrengthXII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of strength XII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength XII' /> ";}
        echo "<span>".$row["ringofstrengthXII"]."x </span> ring of strength XII <span>( <span class='lightred'>+12</span> str )</span> </div>";
    }
    if ($row["ringofdexterityXII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity XII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity XII' /> ";}
        echo "<span>".$row["ringofdexterityXII"]."x </span> ring of dexterity XII  <span>( <span class='green'>+12</span> dex )</span> </div>";
    }
    if ($row["ringofmagicXII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of magic XII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic XII' /> ";}
        echo "<span>".$row["ringofmagicXII"]."x </span> ring of magic XII  <span>( <span class='blue'>+12</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseXII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of defense XII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense XII' /> ";}
        echo "<span>".$row["ringofdefenseXII"]."x </span> ring of defense XII <span>( <span class='gold'>+12</span> def )</span> </div>";
    }

    if ($row["ringofstrengthXII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of strength XII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength XII' /> ";}
        echo "<span>".$row["ringofstrengthXII"]."x </span> ring of strength XII <span>( <span class='lightred'>+12</span> str )</span> </div>";
    }
    if ($row["ringofdexterityXII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity XII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity XII' /> ";}
        echo "<span>".$row["ringofdexterityXII"]."x </span> ring of dexterity XII  <span>( <span class='green'>+12</span> dex )</span> </div>";
    }
    if ($row["ringofmagicXII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of magic XII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic XII' /> ";}
        echo "<span>".$row["ringofmagicXII"]."x </span> ring of magic XII  <span>( <span class='blue'>+12</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseXII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of defense XII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense XII' /> ";}
        echo "<span>".$row["ringofdefenseXII"]."x </span> ring of defense XII <span>( <span class='gold'>+12</span> def )</span> </div>";
    }

    if ($row["ringofstrengthXIII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of strength XIII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength XIII' /> ";}
        echo "<span>".$row["ringofstrengthXIII"]."x </span> ring of strength XIII <span>( <span class='lightred'>+13</span> str )</span> </div>";
    }
    if ($row["ringofdexterityXIII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity XIII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity XIII' /> ";}
        echo "<span>".$row["ringofdexterityXIII"]."x </span> ring of dexterity XIII  <span>( <span class='green'>+13</span> dex )</span> </div>";
    }
    if ($row["ringofmagicXIII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of magic XIII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic XIII' /> ";}
        echo "<span>".$row["ringofmagicXIII"]."x </span> ring of magic XIII  <span>( <span class='blue'>+13</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseXIII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of defense XIII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense XIII' /> ";}
        echo "<span>".$row["ringofdefenseXIII"]."x </span> ring of defense XIII <span>( <span class='gold'>+13</span> def )</span> </div>";
    }

    if ($row["ringofstrengthXIV"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of strength XIV") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength XIV' /> ";}
        echo "<span>".$row["ringofstrengthXIV"]."x </span> ring of strength XIV <span>( <span class='lightred'>+14</span> str )</span> </div>";
    }
    if ($row["ringofdexterityXIV"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity XIV") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity XIV' /> ";}
        echo "<span>".$row["ringofdexterityXIV"]."x </span> ring of dexterity XIV  <span>( <span class='green'>+14</span> dex )</span> </div>";
    }
    if ($row["ringofmagicXIV"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of magic XIV") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic XIV' /> ";}
        echo "<span>".$row["ringofmagicXIV"]."x </span> ring of magic XIV  <span>( <span class='blue'>+14</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseXIV"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of defense XIV") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense XIV' /> ";}
        echo "<span>".$row["ringofdefenseXIV"]."x </span> ring of defense XIV <span>( <span class='gold'>+14</span> def )</span> </div>";
    }

    if ($row["ringofstrengthXV"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of strength XV") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength XV' /> ";}
        echo "<span>".$row["ringofstrengthXV"]."x </span> ring of strength XV <span>( <span class='lightred'>+15</span> str )</span> </div>";
    }
    if ($row["ringofdexterityXV"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity XV") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity XV' /> ";}
        echo "<span>".$row["ringofdexterityXV"]."x </span> ring of dexterity XV  <span>( <span class='green'>+15</span> dex )</span> </div>";
    }
    if ($row["ringofmagicXV"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of magic XV") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic XV' /> ";}
        echo "<span>".$row["ringofmagicXV"]."x </span> ring of magic XV  <span>( <span class='blue'>+15</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseXV"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of defense XV") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense XV' /> ";}
        echo "<span>".$row["ringofdefenseXV"]."x </span> ring of defense XV <span>( <span class='gold'>+15</span> def )</span> </div>";
    }


    if ($row["ringofstrengthXVI"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of strength XVI") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength XVI' /> ";}
        echo "<span>".$row["ringofstrengthXVI"]."x </span> ring of strength XVI <span>( <span class='lightred'>+16</span> str )</span> </div>";
    }
    if ($row["ringofdexterityXVI"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity XVI") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity XVI' /> ";}
        echo "<span>".$row["ringofdexterityXVI"]."x </span> ring of dexterity XVI  <span>( <span class='green'>+16</span> dex )</span> </div>";
    }
    if ($row["ringofmagicXVI"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of magic XVI") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic XVI' /> ";}
        echo "<span>".$row["ringofmagicXVI"]."x </span> ring of magic XVI  <span>( <span class='blue'>+16</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseXVI"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of defense XVI") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense XVI' /> ";}
        echo "<span>".$row["ringofdefenseXVI"]."x </span> ring of defense XVI <span>( <span class='gold'>+16</span> def )</span> </div>";
    }



    if ($row["ringofstrengthXVII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of strength XVII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength XVII' /> ";}
        echo "<span>".$row["ringofstrengthXVII"]."x </span> ring of strength XVII <span>( <span class='lightred'>+17</span> str )</span> </div>";
    }
    if ($row["ringofdexterityXVII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity XVII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity XVII' /> ";}
        echo "<span>".$row["ringofdexterityXVII"]."x </span> ring of dexterity XVII  <span>( <span class='green'>+17</span> dex )</span> </div>";
    }
    if ($row["ringofmagicXVII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of magic XVII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic XVII' /> ";}
        echo "<span>".$row["ringofmagicXVII"]."x </span> ring of magic XVII  <span>( <span class='blue'>+17</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseXVII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of defense XVII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense XVII' /> ";}
        echo "<span>".$row["ringofdefenseXVII"]."x </span> ring of defense XVII <span>( <span class='gold'>+17</span> def )</span> </div>";
    }



    if ($row["ringofstrengthXVIII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of strength XVIII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength XVIII' /> ";}
        echo "<span>".$row["ringofstrengthXVIII"]."x </span> ring of strength XVIII <span>( <span class='lightred'>+18</span> str )</span> </div>";
    }
    if ($row["ringofdexterityXVIII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity XVIII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity XVIII' /> ";}
        echo "<span>".$row["ringofdexterityXVIII"]."x </span> ring of dexterity XVIII  <span>( <span class='green'>+18</span> dex )</span> </div>";
    }
    if ($row["ringofmagicXVIII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of magic XVIII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic XVIII' /> ";}
        echo "<span>".$row["ringofmagicXVIII"]."x </span> ring of magic XVIII  <span>( <span class='blue'>+18</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseXVIII"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of defense XVIII") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense XVIII' /> ";}
        echo "<span>".$row["ringofdefenseXVIII"]."x </span> ring of defense XVIII <span>( <span class='gold'>+18</span> def )</span> </div>";
    }


    if ($row["ringofstrengthXIX"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of strength XIX") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength XIX' /> ";}
        echo "<span>".$row["ringofstrengthXIX"]."x </span> ring of strength XIX <span>( <span class='lightred'>+19</span> str )</span> </div>";
    }
    if ($row["ringofdexterityXIX"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity XIX") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity XIX' /> ";}
        echo "<span>".$row["ringofdexterityXIX"]."x </span> ring of dexterity XIX  <span>( <span class='green'>+19</span> dex )</span> </div>";
    }
    if ($row["ringofmagicXIX"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of magic XIX") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic XIX' /> ";}
        echo "<span>".$row["ringofmagicXIX"]."x </span> ring of magic XIX  <span>( <span class='blue'>+19</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseXIX"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of defense XIX") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense XIX' /> ";}
        echo "<span>".$row["ringofdefenseXIX"]."x </span> ring of defense XIX <span>( <span class='gold'>+19</span> def )</span> </div>";
    }


    if ($row["ringofstrengthXX"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of strength XX") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of strength XX' /> ";}
        echo "<span>".$row["ringofstrengthXX"]."x </span> ring of strength XX <span>( <span class='lightred'>+20</span> str )</span> </div>";
    }
    if ($row["ringofdexterityXX"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of dexterity XX") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of dexterity XX' /> ";}
        echo "<span>".$row["ringofdexterityXX"]."x </span> ring of dexterity XX  <span>( <span class='green'>+20</span> dex )</span> </div>";
    }
    if ($row["ringofmagicXX"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of magic XX") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of magic XX' /> ";}
        echo "<span>".$row["ringofmagicXX"]."x </span> ring of magic XX  <span>( <span class='blue'>+20</span> mag )</span> </div>";
    }
    if ($row["ringofdefenseXX"] > 0) {echo "<div>";
        if ($row["equipRing1"] == "ring of defense XX") {echo "<span class='equipped'>active</span> ";
        } else {echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of defense XX' /> ";}
        echo "<span>".$row["ringofdefenseXX"]."x </span> ring of defense XX <span>( <span class='gold'>+20</span> def )</span> </div>";
    }








    echo '</div><div class="gbox" id="ring2">';



    echo "<h2>Ring2</h2>";


    if ($row["ringofhealthregen"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen' /> ";
        }
        echo "<span>".$row["ringofhealthregen"]."x </span> ring of health regen <span>( <span class='lightred'>+1 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregen"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen' /> ";
        }
        echo "<span>".$row["ringofmanaregen"]."x </span> ring of mana regen <span>( <span class='blue'>+1 mp</span> / click )</span> </div>";
    }

    if ($row["ringofhealthregenII"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen II") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen II' /> ";
        }
        echo "<span>".$row["ringofhealthregenII"]."x </span> ring of health regen II <span>( <span class='lightred'>+2 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregenII"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen II") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen II' /> ";
        }
        echo "<span>".$row["ringofmanaregenII"]."x </span> ring of mana regen II <span>( <span class='blue'>+2 mp</span> / click )</span> </div>";
    }

    if ($row["ringofhealthregenIII"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen III") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen III' /> ";
        }
        echo "<span>".$row["ringofhealthregenIII"]."x </span> ring of health regen III <span>( <span class='lightred'>+3 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregenIII"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen III") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen III' /> ";
        }
        echo "<span>".$row["ringofmanaregenIII"]."x </span> ring of mana regen III <span>( <span class='blue'>+3 mp</span> / click )</span> </div>";
    }

    if ($row["ringofhealthregenIV"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen IV") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen IV' /> ";
        }
        echo "<span>".$row["ringofhealthregenIV"]."x </span> ring of health regen IV <span>( <span class='lightred'>+4 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregenIV"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen IV") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen IV' /> ";
        }
        echo "<span>".$row["ringofmanaregenIV"]."x </span> ring of mana regen IV <span>( <span class='blue'>+4 mp</span> / click )</span> </div>";
    }

    if ($row["ringofhealthregenV"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen V") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen V' /> ";
        }
        echo "<span>".$row["ringofhealthregenV"]."x </span> ring of health regen V <span>( <span class='lightred'>+5 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregenV"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen V") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen V' /> ";
        }
        echo "<span>".$row["ringofmanaregenV"]."x </span> ring of mana regen V <span>( <span class='blue'>+5 mp</span> / click )</span> </div>";
    }

    if ($row["ringofhealthregenVI"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen VI") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen VI' /> ";
        }
        echo "<span>".$row["ringofhealthregenVI"]."x </span> ring of health regen VI <span>( <span class='lightred'>+6 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregenVI"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen VI") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen VI' /> ";
        }
        echo "<span>".$row["ringofmanaregenVI"]."x </span> ring of mana regen VI <span>( <span class='blue'>+6 mp</span> / click )</span> </div>";
    }

    if ($row["ringofhealthregenVII"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen VII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen VII' /> ";
        }
        echo "<span>".$row["ringofhealthregenVII"]."x </span> ring of health regen VII <span>( <span class='lightred'>+7 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregenVII"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen VII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen VII' /> ";
        }
        echo "<span>".$row["ringofmanaregenVII"]."x </span> ring of mana regen VII <span>( <span class='blue'>+7 mp</span> / click )</span> </div>";
    }

    if ($row["ringofhealthregenVIII"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen VIII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen VIII' /> ";
        }
        echo "<span>".$row["ringofhealthregenVIII"]."x </span> ring of health regen VIII <span>( <span class='lightred'>+8 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregenVIII"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen VIII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen VIII' /> ";
        }
        echo "<span>".$row["ringofmanaregenVIII"]."x </span> ring of mana regen VIII <span>( <span class='blue'>+8 mp</span> / click )</span> </div>";
    }

    if ($row["ringofhealthregenIX"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen IX") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen IX' /> ";
        }
        echo "<span>".$row["ringofhealthregenIX"]."x </span> ring of health regen IX <span>( <span class='lightred'>+9 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregenIX"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen IX") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen IX' /> ";
        }
        echo "<span>".$row["ringofmanaregenIX"]."x </span> ring of mana regen IX <span>( <span class='blue'>+9 mp</span> / click )</span> </div>";
    }

    if ($row["ringofhealthregenX"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen X") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen X' /> ";
        }
        echo "<span>".$row["ringofhealthregenX"]."x </span> ring of health regen X <span>( <span class='lightred'>+10 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregenX"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen X") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen X' /> ";
        }
        echo "<span>".$row["ringofmanaregenX"]."x </span> ring of mana regen X <span>( <span class='blue'>+10 mp</span> / click )</span> </div>";
    }



    if ($row["ringofhealthregenXI"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen XI") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen XI' /> ";
        }
        echo "<span>".$row["ringofhealthregenXI"]."x </span> ring of health regen XI <span>( <span class='lightred'>+11 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregenXI"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen XI") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen XI' /> ";
        }
        echo "<span>".$row["ringofmanaregenXI"]."x </span> ring of mana regen XI <span>( <span class='blue'>+11 mp</span> / click )</span> </div>";
    }


    if ($row["ringofhealthregenXII"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen XII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen XII' /> ";
        }
        echo "<span>".$row["ringofhealthregenXII"]."x </span> ring of health regen XII <span>( <span class='lightred'>+12 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregenXII"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen XII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen XII' /> ";
        }
        echo "<span>".$row["ringofmanaregenXII"]."x </span> ring of mana regen XII <span>( <span class='blue'>+12 mp</span> / click )</span> </div>";
    }


    if ($row["ringofhealthregenXIII"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen XIII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen XIII' /> ";
        }
        echo "<span>".$row["ringofhealthregenXIII"]."x </span> ring of health regen XIII <span>( <span class='lightred'>+13 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregenXIII"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen XIII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen XIII' /> ";
        }
        echo "<span>".$row["ringofmanaregenXIII"]."x </span> ring of mana regen XIII <span>( <span class='blue'>+13 mp</span> / click )</span> </div>";
    }


    if ($row["ringofhealthregenXIV"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen XIV") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen XIV' /> ";
        }
        echo "<span>".$row["ringofhealthregenXIV"]."x </span> ring of health regen XIV <span>( <span class='lightred'>+14 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregenXIV"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen XIV") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen XIV' /> ";
        }
        echo "<span>".$row["ringofmanaregenXIV"]."x </span> ring of mana regen XIV <span>( <span class='blue'>+14 mp</span> / click )</span> </div>";
    }

    if ($row["ringofhealthregenXV"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen XV") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen XV' /> ";
        }
        echo "<span>".$row["ringofhealthregenXV"]."x </span> ring of health regen XV <span>( <span class='lightred'>+15 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregenXV"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen XV") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen XV' /> ";
        }
        echo "<span>".$row["ringofmanaregenXV"]."x </span> ring of mana regen XV <span>( <span class='blue'>+15 mp</span> / click )</span> </div>";
    }


    if ($row["ringofhealthregenXVI"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen XVI") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen XVI' /> ";
        }
        echo "<span>".$row["ringofhealthregenXVI"]."x </span> ring of health regen XVI <span>( <span class='lightred'>+16 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregenXVI"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen XVI") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen XVI' /> ";
        }
        echo "<span>".$row["ringofmanaregenXVI"]."x </span> ring of mana regen XVI <span>( <span class='blue'>+16 mp</span> / click )</span> </div>";
    }


    if ($row["ringofhealthregenXVII"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen XVII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen XVII' /> ";
        }
        echo "<span>".$row["ringofhealthregenXVII"]."x </span> ring of health regen XVII <span>( <span class='lightred'>+17 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregenXVII"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen XVII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen XVII' /> ";
        }
        echo "<span>".$row["ringofmanaregenXVII"]."x </span> ring of mana regen XVII <span>( <span class='blue'>+17 mp</span> / click )</span> </div>";
    }


    if ($row["ringofhealthregenXVIII"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen XVIII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen XVIII' /> ";
        }
        echo "<span>".$row["ringofhealthregenXVIII"]."x </span> ring of health regen XVIII <span>( <span class='lightred'>+18 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregenXVIII"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen XVIII") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen XVIII' /> ";
        }
        echo "<span>".$row["ringofmanaregenXVIII"]."x </span> ring of mana regen XVIII <span>( <span class='blue'>+18 mp</span> / click )</span> </div>";
    }


    if ($row["ringofhealthregenXIX"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen XIX") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen XIX' /> ";
        }
        echo "<span>".$row["ringofhealthregenXIX"]."x </span> ring of health regen XIX <span>( <span class='lightred'>+19 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregenXIX"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen XIX") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen XIX' /> ";
        }
        echo "<span>".$row["ringofmanaregenXIX"]."x </span> ring of mana regen XIX <span>( <span class='blue'>+19 mp</span> / click )</span> </div>";
    }


    if ($row["ringofhealthregenXX"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of health regen XX") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of health regen XX' /> ";
        }
        echo "<span>".$row["ringofhealthregenXX"]."x </span> ring of health regen XX <span>( <span class='lightred'>+20 hp</span> / click )</span> </div>";
    }
    if ($row["ringofmanaregenXX"] > 0) {
        echo "<div>";
        if ($row["equipRing2"] == "ring of mana regen XX") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ring of mana regen XX' /> ";
        }
        echo "<span>".$row["ringofmanaregenXX"]."x </span> ring of mana regen XX <span>( <span class='blue'>+20 mp</span> / click )</span> </div>";
    }







    echo '</div><div class="gbox" id="neck">';



    echo "<h2>Neck</h2>";

    if ($row["woodennecklace"] > 0) {
        echo "<div>";
        if ($row["equipNeck"] == "wooden necklace") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip wooden necklace' /> ";
        }
        echo "<span>".$row["woodennecklace"]."x </span> <span class='white'> wooden </span> necklace <span>( <span class='gold'>+5</span> def )</span> <input type='submit' class='sellBtn small' name='input1' value='sell wooden necklace' /></div>";
    }
    if ($row["bonenecklace"] > 0) {
        echo "<div>";
        if ($row["equipNeck"] == "bone necklace") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip bone necklace' /> ";
        }
        echo "<span>".$row["bonenecklace"]."x </span> <span class='white'> bone </span> necklace <span>( <span class='gold'>+10</span> def )</span> <input type='submit' class='sellBtn small' name='input1' value='sell bone necklace' /></div>";
    }
    if ($row["stonenecklace"] > 0) {
        echo "<div>";
        if ($row["equipNeck"] == "stone necklace") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip stone necklace' /> ";
        }
        echo "<span>".$row["stonenecklace"]."x </span> <span class='gray'> stone </span> necklace <span>( <span class='gold'>+15</span> def )</span> <input type='submit' class='sellBtn small' name='input1' value='sell stone necklace' /></div>";
    }
    if ($row["bluependant"] > 0) {
        echo "<div>";
        if ($row["equipNeck"] == "blue pendant") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip blue pendant' /> ";
        }
        echo "<span>".$row["bluependant"]."x </span> <span class='blue'> blue </span> pendant <span>( <span class='lightred'>+10</span> str, <span class='blue'>+5</span> mag )</span> <input type='submit' class='sellBtn small' name='input1' value='sell blue pendant' /></div>";
    }
    if ($row["redtalisman"] > 0) {
        echo "<div>";
        if ($row["equipNeck"] == "red talisman") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip red talisman' /> ";
        }
        echo "<span>".$row["redtalisman"]."x </span> <span class='lightred'> red </span> talisman <span>( <span class='lightred'>+10</span> str, <span class='gold'>+10</span> def )</span> <input type='submit' class='sellBtn small' name='input1' value='sell red talisman' /></div>";
    }
    if ($row["greenpendant"] > 0) {
        echo "<div>";
        if ($row["equipNeck"] == "green pendant") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip green pendant' /> ";
        }
        echo "<span>".$row["greenpendant"]."x </span> <span class='green'> green </span> pendant <span>( <span class='green'>+10</span> dex )</span> <input type='submit' class='sellBtn small' name='input1' value='sell green pendant' /></div>";
    }
    if ($row["coralnecklace"] > 0) {
        echo "<div>";
        if ($row["equipNeck"] == "coral necklace") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip coral necklace' /> ";
        }
        echo "<span>".$row["coralnecklace"]."x </span> <span class='lightblue'> coral </span> necklace <span>( <span class='blue'>+10</span> mag )</span> <input type='submit' class='sellBtn small' name='input1' value='sell coral necklace' /></div>";
    }
    if ($row["vapornecklace"] > 0) {
        echo "<div>";
        if ($row["equipNeck"] == "vapor necklace") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip vapor necklace' /> ";
        }
        echo "<span>".$row["vapornecklace"]."x </span> <span class='lightpurple'> vapor </span> necklace <span>( <span class='cyan'>+10</span> all stats )</span> <input type='submit' class='sellBtn small' name='input1' value='sell vapor necklace' /></div>";
    }
    if ($row["silvernecklace"] > 0) {
        echo "<div>";
        if ($row["equipNeck"] == "silver necklace") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip silver necklace' /> ";
        }
        echo "<span>".$row["silvernecklace"]."x </span> <span class='lightblue'> silver </span> necklace <span>( <span class='cyan'>+20</span> all stats )</span> <input type='submit' class='sellBtn small' name='input1' value='sell silver necklace' /></div>";
    }
    if ($row["ironnecklace"] > 0) {
        echo "<div>";
        if ($row["equipNeck"] == "iron necklace") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip iron necklace' /> ";
        }
        echo "<span>".$row["ironnecklace"]."x </span> <span class='lightbrown'> iron </span> necklace <span>( <span class='gold'>+25</span> def )</span> <input type='submit' class='sellBtn small' name='input1' value='sell iron necklace' /></div>";
    }

    if ($row["shamannecklace"] > 0) {
        echo "<div>";
        if ($row["equipNeck"] == "shaman necklace") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip shaman necklace' /> ";
        }
        echo "<span>".$row["shamannecklace"]."x </span> <span class='green'> shaman </span> necklace <span>( <span class='blue'>+5</span> mag, <span class='blue'>+5</span> mp regen )</span> <input type='submit' class='sellBtn small' name='input1' value='sell shaman necklace' /></div>";
    }

    if ($row["warriorpendant"] > 0) {
        echo "<div>";
        if ($row["equipNeck"] == "warrior pendant") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip warrior pendant' /> ";
        }
        echo "<span>".$row["warriorpendant"]."x </span> <span class='lightred'> warrior </span> pendant <span>( <span class='lightred'>+25</span> str, <span class='gold'>+25</span> def )</span> <input type='submit' class='sellBtn small' name='input1' value='sell warrior pendant' /></div>";
    }

    if ($row["rangeramulet"] > 0) {
        echo "<div>";
        if ($row["equipNeck"] == "ranger amulet") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip ranger amulet' /> ";
        }
        echo "<span>".$row["rangeramulet"]."x </span> <span class='green'> ranger </span> amulet <span>( <span class='green'>+25</span> dex, <span class='blue'>+5</span> mag )</span> <input type='submit' class='sellBtn small' name='input1' value='sell ranger amulet' /></div>";
    }



    if ($row["steelnecklace"] > 0) {
        echo "<div>";
        if ($row["equipNeck"] == "steel necklace") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip steel necklace' /> ";
        }
        echo "<span>".$row["steelnecklace"]."x </span> <span class='gray'> steel </span> necklace <span>( <span class='gold'>+50</span> def )</span> <input type='submit' class='sellBtn small' name='input1' value='sell steel necklace' /></div>";
    }

    if ($row["owleyependant"] > 0) {
        echo "<div>";
        if ($row["equipNeck"] == "owl eye pendant") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip owl eye pendant' /> ";
        }
        echo "<span>".$row["owleyependant"]."x </span> <span class='green'> owl eye </span> pendant <span>( <span class='green'>+30</span> dex, <span class='gold'>+30</span> def )</span> <input type='submit' class='sellBtn small' name='input1' value='sell owl eye pendant' /></div>";
    }
    if ($row["mithrilnecklace"] > 0) {
        echo "<div>";
        if ($row["equipNeck"] == "mithril necklace") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip mithril necklace' /> ";
        }
        echo "<span>".$row["mithrilnecklace"]."x </span> <span class='blue'> mithril </span> necklace <span>( <span class='gold'>+100</span> def )</span> <input type='submit' class='sellBtn small' name='input1' value='sell mithril necklace' /></div>";
    }



    echo '</div><div class="gbox" id="artifact">';



    echo "<h2>Artifact</h2>";

    if ($row["coralcoin"] > 0) {
        echo "<div>";
        if ($row["equipArtifact"] == "coral coin") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip coral coin' /> ";
        }
        echo "<span>".$row["coralcoin"]."x </span> <span class='lightpurple'> coral coin</span> <span>( <span class='cyan'>+5</span> all stats )</span> <input type='submit' class='sellBtn small' name='input1' value='sell coral coin' /></div>";
    }
    if ($row["squidtooth"] > 0) {
        echo "<div>";
        if ($row["equipArtifact"] == "squid tooth") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip squid tooth' /> ";
        }
        echo "<span>".$row["squidtooth"]."x </span> <span class='blue'> squid tooth</span> <span>( <span class='green'>+25</span> dex )</span> <input type='submit' class='sellBtn small' name='input1' value='sell squid tooth' /></div>";
    }

    if ($row["pearlofwisdom"] > 0) {
        echo "<div>";
        if ($row["equipArtifact"] == "pearl of wisdom") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip pearl of wisdom' /> ";
        }
        echo "<span>".$row["pearlofwisdom"]."x </span> <span class='lightblue'> pearl of wisdom</span> <span>( <span class='blue'>+50</span> mag, <span class='gold'>+50</span> def )</span> <input type='submit' class='sellBtn small' name='input1' value='sell pearl of wisdom' /></div>";
    }





    //echo '</div><div class="gbox">';
  //  echo "<h2>Tech</h2>";

    if ($row["bonenecklace"] > 100) {
        echo "<div>";
        if ($row["equipNeck"] == "bone necklace") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='equipBtn small' name='input1' value='equip bone necklace' /> ";
        }
        echo "<span>".$row["bonenecklace"]."x </span> <span class='white'> bone </span> necklace <span>( +5 def )</span> <input type='submit' class='sellBtn small' name='input1' value='sell bone necklace' /></div>";
    }


    echo '</div>';



    echo "</section>
	<section data-pop2='comp' class='panel' id='comp'>";
    echo '<div class="gbox">';


    include('stats-quick.php'); // QUICK STATS AND MAX BUTTONS!


    echo "<h2>Companion</h2>";

    if ($row["COMPdwarfaxeman"] > 0) {
        echo "<div>";
        if ($row["equipComp"] == "dwarf axeman") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='activateBtn small' name='input1' value='activate dwarf axeman' />";
        }
        echo " dwarf axeman <span> ( attacks for 1-5 damage )</span></div>";
    }

    if ($row["COMPelfranger"] > 0) {
        echo "<div>";
        if ($row["equipComp"] == "elf ranger") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='activateBtn small' name='input1' value='activate elf ranger' />";
        }
        echo " elf ranger <span> ( attacks for 1-10 ranged damage )</span></div>";
    }

    echo '</div><div class="gbox">';


    echo "<h2>Pet</h2>";

    if ($row["pethampster"] > 0) {
        echo "<div>";
        if ($row["equipPet"] == "pet hampster") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='activateBtn small' name='input1' value='activate pet hampster' /> ";
        }
        echo " pet hampster <span> ( bites for 0-2 damage )</span></div>";
    }
    if ($row["petbat"] > 0) {
        echo "<div>";
        if ($row["equipPet"] == "pet bat") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='activateBtn small' name='input1' value='activate pet bat' /> ";
        }
        echo " pet bat <span> ( bites for 0-3 damage, flies )</span></div>";
    }


    echo '</div><div class="gbox">';

    echo "<h2>Mount/Vehicle</h2>";


    if ($row["MOUNTwoodenboat"] > 0) {
        echo "<div>";
        if ($row["equipMount"] == "wooden boat") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='eatBtn small' name='input1' value='use wooden boat' />";
        }
        echo " <span>".$row["MOUNTwoodenboat"]."x </span> <span class='lightbrown'>wooden </span> boat <span> ( <span class='gold'>+25</span> def )</span></div>";
    }
    if ($row["MOUNTironboat"] > 0) {
        echo "<div>";
        if ($row["equipMount"] == "iron boat") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='eatBtn small' name='input1' value='use iron boat' />";
        }
        echo " <span>".$row["MOUNTironboat"]."x </span> <span class='lightbrown'>iron </span> boat <span> ( <span class='gold'>+50</span> def )</span></div>";
    }

    if ($row["MOUNTsteelboat"] > 0) {
        echo "<div>";
        if ($row["equipMount"] == "steel boat") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='eatBtn small' name='input1' value='use steel boat' />";
        }
        echo " <span>".$row["MOUNTsteelboat"]."x </span> <span class='gray'>steel </span> boat <span> ( <span class='gold'>+100</span> def )</span></div>";
    }

    if ($row["MOUNTmithrilboat"] > 0) {
        echo "<div>";
        if ($row["equipMount"] == "mithril boat") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='eatBtn small' name='input1' value='use mithril boat' />";
        }
        echo " <span>".$row["MOUNTmithrilboat"]."x </span> <span class='blue'>mithril </span> boat <span> ( <span class='gold'>+200</span> def )</span></div>";
    }


    if ($row["MOUNTdirewolf"] > 0) {
        echo "<div>";
        if ($row["equipMount"] == "dire wolf") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='mountBtn small' name='input1' value='mount dire wolf' />";
        }
        echo " <span>".$row["MOUNTdirewolf"]."x </span> <span class='lightred'>dire</span> wolf <span> ( <span class='lightred'>+50</span> str, <span class='gold'>+50</span> def )</span></div>";
    }

    if ($row["MOUNTskyhawk"] > 0) {
        echo "<div>";
        if ($row["equipMount"] == "sky hawk") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='mountBtn small' name='input1' value='mount sky hawk' />";
        }
        echo " <span>".$row["MOUNTskyhawk"]."x </span> <span class='blue'>sky</span> hawk <span> ( can fly <span class='blue'>+25</span> mag, <span class='blue'>+5 mp</span> regen )</span></div>";
    }

    if ($row["MOUNTgreengriffin"] > 0) {
        echo "<div>";
        if ($row["equipMount"] == "green griffin") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<input type='submit' class='mountBtn small' name='input1' value='mount green griffin' />";
        }
        echo " <span>".$row["MOUNTgreengriffin"]."x </span> <span class='green'>green</span> griffin <span> ( <span class='green'>+50</span> dex, can fly )</span></div>";
    }





  //  echo '</div><div class="gbox">';
 // echo "<h2>Robot</h2>";



   echo '</div><div class="gbox">';

    echo "<h2>Aura</h2>";

    if ($row["AURApajamaaura"] > 0) {
        if ($row["equipAura"] == "pajama aura") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<div><input type='submit' class='activateBtn small' name='input1' value='activate pajama aura' />";
        }
        echo " <span class='green'>pajama aura</span> <span> ( <span class='cyan'>+2</span> all stats )</span></div>";
    }

    if ($row["AURAstoneaura"] > 0) {
        if ($row["equipAura"] == "stone aura") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<div><input type='submit' class='activateBtn small' name='input1' value='activate stone aura' />";
        }
        echo " <span class='gray'>stone</span> aura <span> ( <span class='gold'>+40</span> def )</span></div>";
    }

    if ($row["AURAsilveraura"] > 0) {
        if ($row["equipAura"] == "silver aura") {
            echo "<span class='equipped'>active</span> ";
        } else {
            echo "<div><input type='submit' class='activateBtn small' name='input1' value='activate silver aura' />";
        }
        echo " <span class='lightblue'>silver</span> aura <span> ( <span class='cyan'>+20</span> all stats )</span></div>";
    }


    echo '</div>';

    echo "</section>
	<section data-pop2='bag' class='panel' id='bag'>";
    echo '<div class="gbox">';

    echo "<h2>Heal</h2>";

    echo "<div class='lightred'>+HP</span></div>";
    if ($row["redberry"] > 0) {
        echo "<div><input type='submit' class='eatBtn small' name='input1' value='eat redberry' />
		<span>".$row["redberry"]."x </span> redberry <span>( <span class='lightred'>+10</span> hp )</span></div>";
    }
    if ($row["rawmeat"] > 0) {
        echo "<div> <input type='submit' class='eatBtn small' name='input1' value='eat raw meat' />
		<span>".$row["rawmeat"]."x </span> raw meat <span>( <span class='lightred'>+25</span> hp )</span></div>";
    }
    if ($row["cookedmeat"] > 0) {
        echo "<div> <input type='submit' class='eatBtn small' name='input1' value='eat cooked meat' />
		<span>".$row["cookedmeat"]."x </span> cooked meat <span>( <span class='lightred'>+50</span> hp )</span></div>";
    }
    if ($row["redpotion"] > 0) {
        echo "<div><input type='submit' class='drinkBtn small' name='input1' value='drink red potion' />
		<span>".$row["redpotion"]."x </span> red potion <span>( <span class='lightred'>+100</span> hp )</span></div>";
    }
    if ($row["meatball"] > 0) {
        echo "<div> <input type='submit' class='eatBtn small' name='input1' value='eat meatball' />
		<span>".$row["meatball"]."x </span> meatball <span>( <span class='lightred'>+400</span> hp )</span></div>";
    }
    if ($row["redbalm"] > 0) {
        echo "<div> <input type='submit' class='drinkBtn small' name='input1' value='apply red balm' />
		<span>".$row["redbalm"]."x </span> red balm <span>( <span class='lightred'>+1000</span> hp )</span></div>";
    }

    echo "<br><div class='blue'>+MP</span></div>";
    if ($row["blueberry"] > 0) {
        echo "<div> <input type='submit' class='eatBtn small' name='input1' value='eat blueberry' />
		<span>".$row["blueberry"]."x </span> blueberry <span>( <span class='blue'>+10</span> mp )</span></div>";
    }
    if ($row["bluepotion"] > 0) {
        echo "<div> <input type='submit' class='drinkBtn small' name='input1' value='drink blue potion' />
		<span>".$row["bluepotion"]."x </span> blue potion <span>( <span class='blue'>+100</span> mp )</span></div>";
    }
    if ($row["bluefish"] > 0) {
        echo "<div> <input type='submit' class='eatBtn small' name='input1' value='eat bluefish' />
		<span>".$row["bluefish"]."x </span> bluefish <span>( <span class='blue'>+400</span> mp )</span></div>";
    }
    if ($row["bluebalm"] > 0) {
        echo "<div> <input type='submit' class='drinkBtn small' name='input1' value='apply blue balm' />
		<span>".$row["bluebalm"]."x </span> blue balm <span>( <span class='blue'>+1000</span> mp )</span></div>";
    }


    echo "<br><div class='lightpurple'>+HP/MP</span></div>";
    if ($row["veggies"] > 0) {
        echo "<div> <input type='submit' class='eatBtn small' name='input1' value='eat veggies' />
		<span>".$row["veggies"]."x </span> veggies <span>( <span class='lightred'>+80</span> hp, <span class='blue'>+80</span> mp )</span></div>";
    }
    if ($row["purplepotion"] > 0) {
        echo "<div> <input type='submit' class='drinkBtn small' name='input1' value='drink purple potion' />
		<span>".$row["purplepotion"]."x </span> purple potion <span>( <span class='lightred'>+200</span> hp, <span class='blue'>+200</span> mp )</span></div>";
    }
    if ($row["purplebalm"] > 0) {
        echo "<div> <input type='submit' class='drinkBtn small' name='input1' value='apply purple balm' />
		<span>".$row["purplebalm"]."x </span> purple balm <span>( <span class='lightred'>+2000</span> hp, <span class='blue'>+2000</span> mp )</span></div>";
    }

    echo '</div><div class="gbox">';


    echo "<h2>Buffs</h2>";


    if ($row["wingspotion"] > 0) {
        echo "<div><input type='submit' class='drinkBtn small' name='input1' value='drink wings potion' />
		<span>".$row["wingspotion"]."x </span> <span class='lightblue'> wings </span> potion <span>( can <span class='lightblue'>fly</span> for 100 clicks )</span></div>";
    }
    if ($row["gillspotion"] > 0) {
        echo "<div><input type='submit' class='drinkBtn small' name='input1' value='drink gills potion' />
		<span>".$row["gillspotion"]."x </span> <span class='blue'> gills </span> potion <span>( <span class='blue'>breathe water</span> for 100 clicks )</span></div>";
    }
    if ($row["antidotepotion"] > 0) {
        echo "<div><input type='submit' class='drinkBtn small' name='input1' value='drink antidote potion' />
		<span>".$row["antidotepotion"]."x </span> <span class='green'> antidote </span> potion <span>( <span class='green'>cure poison</span>, immune/10 clicks )</span></div>";
    }

    if ($row["coffee"] > 0) {
        echo "<div> <input type='submit' class='drinkBtn small' name='input1' value='drink coffee' />
		<span>".$row["coffee"]."x </span> <span class='lightbrown'>coffee</span> <span>( <span class='cyan'>+10</span> all stats / 10 clicks )</span></div>";
    }
    if ($row["tea"] > 0) {
        echo "<div> <input type='submit' class='drinkBtn small' name='input1' value='drink tea' />
		<span>".$row["tea"]."x </span> <span class='yellowgreen'>tea</span> <span>( <span class='yellowgreen'>+5</span> hp/mp regen / 10 clicks )</span></div>";
    }


    if ($row["reds"] > 0) {
        echo "<div> <input type='submit' class='eatBtn small' name='input1' value='use reds' />
		<span>".$row["reds"]."x </span> <span class='lightred'>reds</span> <span>( <span class='lightred'>+20</span> str / 100 clicks )</span></div>";
    }
    if ($row["greens"] > 0) {
        echo "<div> <input type='submit' class='eatBtn small' name='input1' value='use greens' />
		<span>".$row["greens"]."x </span> <span class='green'>greens </span> <span>( <span class='green'>+20</span> dex / 100 clicks )</span></div>";
    }
    if ($row["blues"] > 0) {
        echo "<div> <input type='submit' class='eatBtn small' name='input1' value='use blues' />
		<span>".$row["blues"]."x </span> <span class='blue'>blues </span> <span>( <span class='blue'>+20</span> mag / 100 clicks )</span></div>";
    }
    if ($row["yellows"] > 0) {
        echo "<div> <input type='submit' class='eatBtn small' name='input1' value='use yellows' />
		<span>".$row["yellows"]."x </span> <span class='gold'>yellows </span> <span>( <span class='gold'>+20</span> def / 100 clicks )</span></div>";
    }




    echo '</div><div class="gbox">';


    echo "<h2>Quest Items</h2>";



    if ($row["flower"] > 0) {
        echo "<div><span>".$row["flower"]."x </span> <span class='yellow'>flower</span></div>";
    }
    if ($row["scorpiontail"] > 0) {
        echo "<div><span>".$row["scorpiontail"]."x </span> scorpion tail</div>";
    }
    if ($row["batwing"] > 0) {
        echo "<div><span>".$row["batwing"]."x </span> bat wing</div>";
    }
    if ($row["bone"] > 0) {
        echo "<div><span>".$row["bone"]."x </span> bone</div>";
    }
    if ($row["bigfoot"] > 0) {
        echo "<div><span>".$row["bigfoot"]."x </span> big foot</div>";
    }

    echo "<h2>Keys</h2>";
    if ($row["silverkey"] > 0) {
        echo "<div><span>".$row["silverkey"]."x </span> <span class='lightblue'>silver </span> key</div>";
    }
    if ($row["goldkey"] > 0) {
        echo "<div><span>".$row["goldkey"]."x </span> <span class='gold'>gold</span> key</div>";
    }


    echo '</div><div class="gbox">';

    echo "<h2>Maps</h2>";

    if ($row["roomzeromap"] > 0) {
        echo "<div><input type='submit' class='viewBtn small' name='input1' value='view room zero map' /> room zero map</div>";
    }
    if ($row["grassyfieldmap"] > 0) {
        echo "<div><input type='submit' class='viewBtn small' name='input1' value='view grassy field map' /> grassy field map</div>";
    }
    if ($row["grassyfieldundergroundmap"] > 0) {
        echo "<div><input type='submit' class='viewBtn small' name='input1' value='view grassy field underground map' /> grassy field underground map</div>";
    }
    if ($row["forestmap"] > 0) {
        echo "<div><input type='submit' class='viewBtn small' name='input1' value='view forest map' /> forest map</div>";
    }


    if ($row["forestundergroundmap"] > 0) {
        echo "<div><input type='submit' class='viewBtn small' name='input1' value='view forest underground map' /> forest underground map</div>";
    }




    echo '</div>';


    echo "</section>";


// } //</form>
