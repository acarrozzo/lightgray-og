<?php
// ---------------------------------------------------------------------------- INV TAB
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

    // ---------------------------------------------------------------------------- CRAFT MENU
    echo '<div class="gbox">';
    echo'<h2 class="red">Craft <span class=""><span class="dgray">LVL </span> <span class="gold">'.$row['crafting'].'</span></span></h2>';
    // ---------------------------------------------------------------------------- IF CRAFTING IS 0
    if ($row['crafting'] == 0) {
        echo '<div class="gslice">';
        echo '<span class="icon ddgray npc">'.file_get_contents("img/svg/npc/npc-jacklumber.svg").'</span>';
        echo '<h4>Talk to <span class="gold">Jack Lumber</span> to learn how to craft useful weapons, armor and items.</h4>';
        echo '<h4 class="gray">Jack can be found at his Tree Farm east of the Grassy Field.</h4>';
        echo '</div>';
    }

    // ------------------------------------ IF CRAFTING IS > 1
    else {
        // ------------------------------------ TABLE!!!!!!!!!!!!!!!!
        // ------------------------------------ CRAFT TABLE -  NO TABLE
        if ($row['craftingtable'] != $row['room']) {
            echo '<div class="gslice">';
            echo '<li class="">
            <input type="submit" class="btn goldBG noTable" name="input1" value="craft table" />
<span class="gold"> 3 wood <span class="dgray">( have '.$row['wood'].' )</span></span>
</li>  ';
            echo '</div>';
        }

        // ------------------------------------ FIRE!!!!!!!!!!!!!!!!
        // ------------------------------------ CRAFT FIRE -  NO FIRE
        if ($row['fire'] != $row['room']) {
            echo '<div class="gslice">';
            echo '<li><input type="submit" class="btn redBG noTable" name="input1" value="build fire" />
			<span class="gold"> 1 wood <span class="dgray">( have '.$row['wood'].' )</span></span></li>  ';
            echo '</div>';
        }


        // ---------------------------------------------------------------------------- CRAFT MENU - WITH FIRE!!!
        // ---------------------------------------------------------------------------- CRAFT MENU - WITH FIRE!!!
        // ---------------------------------------------------------------------------- CRAFT MENU - WITH FIRE!!!
        if ($row['fire'] == $row['room']) {
            echo '<div class="gslice">';
            echo '<h3 class="red">';
            echo '<i class="icon ">'.file_get_contents("img/svg/fire.svg").'</i> ';
            echo 'Cook</h3>';
            if ($row['rawmeat'] >= 1 && $row['fire'] == $row['room']) { // -------------------------------------------------------------------------- raw meat = cook meat
                echo "<li><input type='submit' class='redBG white' name='input1' value='cook all meat' />
		<i class='dgray'>( +50 HP ) </i> <i class='red'>raw meat</i><i class='dgray'> ( ".$row['rawmeat']." )</i>
					 <i class='ddgray right'> have ".$row['rawmeat']."</i></li>";
            } else {
                echo "<li class='gray'>- cooked meat <i class='dgray'>( +50 HP )</i> raw meat
				<span class='dgray'> ( ".$row['rawmeat']." )</span> <i class='ddgray right'> have ".$row['cookedmeat']."</i></li>";
            }
            if ($row['quest22'] >= 2 && $row['cookedmeat'] >= 5 && $row['fire'] == $row['room']) { // -------------------------------------------------------------------------- cook meatball = meatball
                echo "<li><input type='submit' class='redBG white' name='input1' value='cook all meatball' />
		<i class='dgray'>( +400 HP ) </i> 5 <i class='red'>cooked meat</i><i class='dgray'> ( ".$row['cookedmeat']." )</i>
							 <i class='ddgray right'> have ".$row['meatball']."</i></li>";
            } elseif ($row['quest22'] >= 2) {
                echo "<li class='gray'>- meatball <i class='dgray'>( +400 HP )</i> 5 cooked meat
				<span class='dgray'> ( ".$row['cookedmeat']." )</span><i class='ddgray right'> have ".$row['meatball']."</i></li>";
            } else {
                echo "<li class='gold'>- Find the Red Town Chef to learn how to cook meatballs.";
            }
            echo '</div>'; // end gslice
        } // -- end fire




        // ----------------------------------------------------------------------- CRAFT MENU - WITH TABLE!!!
        // ----------------------------------------------------------------------- CRAFT MENU - WITH TABLE!!!
        // ----------------------------------------------------------------------- CRAFT MENU - WITH TABLE!!!
        if ($row['craftingtable'] == $row['room']) {
            echo '<div class="gslice">';

            // -------------------------------------------------------------------------- POTIONS
            echo '<h3 class="purple">';
            echo '<i class="icon purple">'.file_get_contents("img/svg/potion.svg").'</i> ';
            echo 'Potions</h3>';

            // -------------------------------------------------------------------------- redberry = red potion
            if ($row['redberry'] >= 5 && $row['craftingtable'] == $row['room']) {
                echo "<li><input type='submit' class='redBG white' name='input1' value='craft all red potion' />
		<i class='dgray'>( +100 HP ) </i> 5 <i class='red'>redberry</i><i class='dgray'> ( ".$row['redberry']." )</i>
							 <i class='ddgray right'> have ".$row['redpotion']."</i></li>";
            } else { // -------------------------------------------------------------------------- else
                echo "<li class='gray'>- red potion <i class='dgray'>( +100 HP )</i> 5 redberry
		<i class='dgray'> ( ".$row['redberry']." )</i>
		<i class='ddgray right'> have ".$row['redpotion']."</i></li>";
            }
            // -------------------------------------------------------------------------- blueberry = blue potion
            if ($row['blueberry'] >= 5 && $row['craftingtable'] == $row['room']) {
                echo "<li><input type='submit' class='blueBG white' name='input1' value='craft all blue potion' />
		<i class='dgray'>( +100 MP ) </i> 5 <i class='blue'>blueberry</i> <i class='dgray'> ( ".$row['blueberry']." )</i>
									 <i class='ddgray right'> have ".$row['bluepotion']."</i></li>";
            } else { // -------------------------------------------------------------------------- else
                echo "<li class='gray'>- blue potion <i class='dgray'>( +100 MP )</i> 5 blueberry
		<i class='dgray'> ( ".$row['blueberry']." )</i>
		<i class='ddgray right'> have ".$row['bluepotion']."</i></li>";
            }

            // -------------------------------------------------------------------------- purple potion = blue + red
            if ($row['redpotion'] >= 1 && $row['bluepotion'] >= 1 && $row['craftingtable'] == $row['room'] && $row['travelingwizardFlag'] >= 1) {
                echo "<li><input type='submit' class='lightpurpleBG white' name='input1' value='craft all purple potion' />
		<i class='dgray'>( +200 HP, + 200 MP ) </i>
	<i class='red'>red potion</i> <i class='dgray'> ( ".$row['redpotion']." )</i> + <i class='blue'>blue potion</i> <i class='dgray'> ( ".$row['bluepotion']." )</i>
									 <i class='ddgray right'> have ".$row['purplepotion']."</i></li>";
            } elseif ($row['travelingwizardFlag'] >= 1) { // -------------------------------------------------------------------------- else
                echo "<li class='gray'>- purple potion <i class='dgray'>( +200 HP, + 200 MP )</i>
			red potion <i class='dgray'> ( ".$row['redpotion']." )</i> + blue potion
		<i class='dgray'> ( ".$row['bluepotion']." )</i>
		<i class='ddgray right'> have ".$row['purplepotion']."</i></li>";
            } else { // -------------------------------------------------------------------------- else
                echo "<li class='gold'>- Find the Traveling Wizard to learn how to craft purple potions.</li>";
            }

            // -------------------------------------------------------------------------- redpotion + mud = red balm
            if ($row['quest62'] >= 2 && $row['redpotion'] >= 5 && $row['mud'] >= 1 && $row['craftingtable'] == $row['room']) {
                echo "<li><input type='submit' class='redBG white' name='input1' value='craft all red balm' />
		<i class='dgray'>( +1000 HP ) </i> 5 <i class='red'>red potion</i><i class='dgray'> ( ".$row['redpotion']." )</i>
							 <i class='ddgray right'> have ".$row['redbalm']."</i></li>";
            } else if ($row['quest62'] >= 2) { // -------------------------------------------------------------------------- else
                echo "<li class='gray'>- red balm <i class='dgray'>( +1000 HP )</i> 5 red potion
		<i class='dgray'> ( ".$row['redpotion']." )</i>
		<i class='ddgray right'> have ".$row['redbalm']."</i></li>";
            }
            // -------------------------------------------------------------------------- bluepotion = blue balm
            if ($row['quest62'] >= 2 && $row['bluepotion'] >= 5 && $row['mud'] >= 1 && $row['craftingtable'] == $row['room']) {
                echo "<li><input type='submit' class='blueBG white' name='input1' value='craft all blue balm' />
		<i class='dgray'>( +1000 MP ) </i> 5 <i class='blue'>blue potion</i> <i class='dgray'> ( ".$row['bluepotion']." )</i>
									 <i class='ddgray right'> have ".$row['bluebalm']."</i></li>";
            } else if ($row['quest62'] >= 2) { // -------------------------------------------------------------------------- else
                echo "<li class='gray'>- blue balm <i class='dgray'>( +1000 MP )</i> 5 blue potion
		<i class='dgray'> ( ".$row['bluepotion']." )</i>
		<i class='ddgray right'> have ".$row['bluebalm']."</i></li>";
            }

            // -------------------------------------------------------------------------- purple balm = blue + red
            if ($row['quest62'] >= 2 && $row['redbalm'] >= 1 && $row['bluebalm'] >= 1 && $row['craftingtable'] == $row['room'] && $row['travelingwizardFlag'] >= 1) {
                echo "<li><input type='submit' class='lightpurpleBG white' name='input1' value='craft all purple balm' />
		<i class='dgray'>( +2000 HP, + 2000 MP ) </i>
	<i class='red'>red balm</i> <i class='dgray'> ( ".$row['redbalm']." )</i> + <i class='blue'>blue balm</i> <i class='dgray'> ( ".$row['bluebalm']." )</i>
									 <i class='ddgray right'> have ".$row['purplebalm']."</i></li>";
            } else if ($row['quest62'] >= 2) { // -------------------------------------------------------------------------- else
                echo "<li class='gray'>- purple balm <i class='dgray'>( +2000 HP, + 2000 MP )</i>
			red balm <i class='dgray'> ( ".$row['redbalm']." )</i> + blue balm
		<i class='dgray'> ( ".$row['bluebalm']." )</i>
		<i class='ddgray right'> have ".$row['purplebalm']."</i></li>";
            } else { // -------------------------------------------------------------------------- else
                echo "<li class='gold'>- Find the Shaman at the Stone Mountain Base Camp to learn how to craft balms.</li>";
            }

            // -------------------------------------------------------------------------- purple balm = purple potion x 5
            if ($row['quest62'] >= 2 && $row['purplepotion'] >= 5 && $row['craftingtable'] == $row['room'] && $row['travelingwizardFlag'] >= 1) {
                echo "<li><input type='submit' class='lightpurpleBG white' name='input1' value='craft all purple balm 2' />
		<i class='dgray'>( +2000 HP, + 2000 MP ) </i>
	<i class='purple'>purple potion</i>  x 5 <i class='dgray'> ( ".$row['purplepotion']." )</i>
									 <i class='ddgray right'> have ".$row['purplebalm']."</i></li>";
            } else if ($row['quest62'] >= 2) { // -------------------------------------------------------------------------- else
                echo "<li class='gray'>- purple balm <i class='dgray'>( +2000 HP, + 2000 MP )</i>
			5 purple potion <i class='dgray'> ( ".$row['purplepotion']." )</i> 
    <i class='ddgray right'> have ".$row['purplebalm']."</i></li>";
            } else { // -------------------------------------------------------------------------- else
               // echo "<li class='gold'>- Find the Shaman at the Stone Mountain Base Camp to learn how to craft balms.</li>";
            }           
            echo '</div>'; // end gslice

            //echo '<div class="craftBox transition"> ';

            echo '<div class="gslice">';

            // ------------------------------------------------------------------------------------------------ TABLE - WOOD!
            echo '<h3 class=" brown"><span class="icon-wood"></span> Wood <span class="gold">x'.$row['wood'].'</span></h3>';
            if ($row['crafting'] < 1) {
                echo '<p class="gold">- To Craft w/ Wood find Jack Lumber</p>';
            } elseif ($row['hammer'] < 1) {
                echo '<p class="gold padd">- Need Hammer! You can find one in the Bat Cave</p>';
            }
            else {
            echo '</li>';


            $button_open = '<button class="itembox ddgrayBG';
            $button_open2 = '" type="submit" name="input1" value="';
            
            // -------------------- CRAFT BUTTON FUNCTION LOOP
            function craftBtn($row,$disabled,$button_input,$button_title,$button_svg,$button_color,$button_stats) {
                echo '<button class="itembox ddgrayBG '.$disabled.'" type="submit" name="input1" value="'.$button_input.'">
                <span class="icon '.$button_color.'">'.file_get_contents("img/svg/".$button_svg.".svg").'</span>
                <p class="'.$button_svg.' '.$button_color.'">'.$button_title.'</p>
                <p class="">( '.$button_stats.' )</p>
                <p class=""><span class="gold">cost:</span> 7 wood <span class="gray">('.$row['wood'].')</span></p>
                <p class="qty">x'.$row['woodenbo'].'</p>
                </button>';
            }
            
            // -------------------- WOODEN BO
            if ($row['wood'] >= 7 && $row['craftingtable'] == $row['room'] && $row['hammer'] >= 1 && $row['hammer'] >= 1) {
                $disabled="";
            } else {
                $disabled="disabled";
            }
            //if ($purplebalm >= 1 || $hp >= 600) {

                $button_input = "craft wooden bo";
                $button_title = "Craft Wooden Bo";
                $button_svg = "bo";
                $button_color = "brown";
                $button_stats = "+9 str, +1 mag";


                craftBtn($row,$disabled,$button_input,$button_title,$button_svg,$button_color,$button_stats);
 
           // }

            // ------------------------------------------------------------------------------------------------- wooden bo
            if ($row['wood'] >= 7 && $row['craftingtable'] == $row['room'] && $row['hammer'] >= 1 && $row['hammer'] >= 1) {
                echo "<li><input type='submit' class='brownBG white' name='input1' value='craft wooden bo' />
		<i class='dgray'>( +9 str, +1 mag ) </i> 7 <i class='brown'>wood</i> <i class='dgray'>( ".$row['wood']." )</i>
		<i class='ddgray right'> have ".$row['woodenbo']." </i></li>";
            } else { // -------------------------------------------------------------------------- else
                echo "<li class='gray'>- wooden bo <i class='dgray'>( +9 str, +1 mag )</i> 7 wood
		<i class='ddgray right'> have ".$row['woodenbo']."</i></li>";
            }
            // ------------------------------------------------------------------------------------------------- wooden bow
            if ($row['wood'] >= 5 && $row['string'] >= 1 && $row['craftingtable'] == $row['room'] && $row['hammer'] >= 1) {
                echo "<li><input type='submit' class='brownBG white' name='input1' value='craft wooden bow' />
		<i class='dgray'>( +8 dex ) </i> 5 <i class='brown'>wood</i> <i class='dgray'>( ".$row['wood']." )</i>  + <i class='gray'>string</i> <i class='dgray'>( ".$row['string']." )</i>
		<i class='ddgray right'> have ".$row['woodenbow']." </i></li>";
            } else { // -------------------------------------------------------------------------- else
                echo "<li class='gray'>- wooden bow <i class='dgray'>( +8 dex )</i> 5 wood + string
		<i class='ddgray right'> have ".$row['woodenbow']."</i></li>";
            }
            // ------------------------------------------------------------------------------------------------- wooden staff
            if ($row['wood'] >= 7 && $row['craftingtable'] == $row['room'] && $row['hammer'] >= 1) {
                echo "<li><input type='submit' class='brownBG white' name='input1' value='craft wooden staff' />
		<i class='dgray'>( +5 mag, +1 str ) </i> 7 <i class='brown'>wood</i> <i class='dgray'>( ".$row['wood']." )</i>
		<i class='ddgray right'> have ".$row['woodenstaff']." </i></li>";
            } else { // -------------------------------------------------------------------------- else
                echo "<li class='gray'>- wooden staff <i class='dgray'>( +5 mag, +1 str )</i> 7 wood
		<i class='ddgray right'> have ".$row['woodenstaff']."</i></li>";
            }
            // ------------------------------------------------------------------------------------------------- wooden shield
            if ($row['wood'] >= 5 && $row['stone'] >= 2 && $row['craftingtable'] == $row['room'] && $row['hammer'] >= 1) {
                echo "<li><input type='submit' class='brownBG white' name='input1' value='craft wooden shield' />
		<i class='dgray'>( +13 def ) </i> 5 <i class='brown'>wood</i> <i class='dgray'>( ".$row['wood']." )</i> + 2 <i class='gray'>stone</i> <i class='dgray'>( ".$row['stone']." )</i>
		<i class='ddgray right'> have ".$row['woodenshield']." </i></li>";
            } else { // -------------------------------------------------------------------------- else
                echo "<li class='gray'>- wooden shield <i class='dgray'>( +13 def )</i> 5 wood + 2 stone
		<i class='ddgray right'> have ".$row['woodenshield']."</i></li>";
            }
            // ------------------------------------------------------------------------------------------------- arrows
            if ($row['wood'] >= 1 && $row['stone'] >= 1 && $row['craftingtable'] == $row['room'] && $row['hammer'] >= 1) {
                echo "<li><input type='submit' class='brownBG white' name='input1' value='craft 10 arrows' />
		<i class='dgray'>( ammo ) </i> <i class='brown'>wood</i> <i class='dgray'>( ".$row['wood']." )</i> + <i class='gray'>stone</i> <i class='dgray'>( ".$row['stone']." )</i>
		<i class='ddgray right'> have ".$row['arrows']." </i></li>";
            } else { // -------------------------------------------------------------------------- else
                echo "<li class='gray'>- 10x arrows <i class='dgray'>( ammo )</i> wood + stone
		<i class='ddgray right'> have ".$row['arrows']."</i></li>";
            }

            // ------------------------------------------------------------------------------------------------- wooden boat
            if ($row['wood'] >= 20 && $row['craftingtable'] == $row['room'] && $row['hammer'] >= 1) {
                echo "<li><input type='submit' class='brownBG white' name='input1' value='craft wooden boat' />
		<i class='dgray'>( +25 def ) </i> 20 <i class='brown'>wood</i> <i class='dgray'>( ".$row['wood']." )</i>
		<i class='ddgray right'> have ".$row['MOUNTwoodenboat']."</i></li>";
            } else { // -------------------------------------------------------------------------- else
                echo "<li class='gray'>- wooden boat <i class='dgray'>( +25 def )</i> 20 wood
		<i class='ddgray right'> have ".$row['MOUNTwoodenboat']."</i></li>";
            }
            //echo '</li>';
            //echo '</div>'; // -- end craftBox toggle
        }
            echo '</div>'; // end gslice


            echo '<div class="gslice">';

            //echo '<div class="craftBox transition"> ';
            // ------------------------------------------------------------------------------------------------ TABLE - LEATHER!
            echo '<h3 class="brown">Leather <span class="gold">x'.$row['leather'].'</span></h3>';
            if ($row['quest10'] < 1) {
                echo '<p class="gold padd">- To Craft w/ Leather find Freddy\'s Cow Farm</p>';
            } elseif ($row['hammer'] < 1) {
                echo '<p class="gold padd">- Need Hammer!</p>';
            } else {
                // ------------------------------------------------------------------------------------------------- leather hood
                if ($row['leather'] >= 3 && $row['craftingtable'] == $row['room'] && $row['hammer'] >= 1) {
                    echo "<li><input type='submit' class='brownBG white' name='input1' value='craft leather hood' />
		<i class='dgray'>( +4 dex, +4 def ) </i> 3 <i class='brown'>leather</i> <i class='dgray'>( ".$row['leather']." )</i>
		<i class='ddgray right'> have ".$row['leatherhood']." </i></li>";
                } else { // -------------------------------------------------------------------------- else
                    echo "<li class='gray'>- leather hood <i class='dgray'>( +4 dex, +4 def )</i> 3 leather
		<i class='ddgray right'> have ".$row['leatherhood']."</i></li>";
                }
                // ------------------------------------------------------------------------------------------------- leather helmet
                if ($row['leather'] >= 5 && $row['craftingtable'] == $row['room'] && $row['hammer'] >= 1) {
                    echo "<li><input type='submit' class='brownBG white' name='input1' value='craft leather helmet' />
		<i class='dgray'>( +2 str, +6 def ) </i> 5 <i class='brown'>leather</i>  <i class='dgray'>( ".$row['leather']." )</i>
		<i class='ddgray right'> have ".$row['leatherhelmet']." </i></li>";
                } else { // -------------------------------------------------------------------------- else
                    echo "<li class='gray'>- leather helmet <i class='dgray'>( +2 str, +10 def )</i> 5 leather
		<i class='ddgray right'> have ".$row['leatherhelmet']."</i></li>";
                }
                // ------------------------------------------------------------------------------------------------- leather vest
                if ($row['leather'] >= 7 && $row['craftingtable'] == $row['room'] && $row['hammer'] >= 1) {
                    echo "<li><input type='submit' class='brownBG white' name='input1' value='craft leather vest' />
		<i class='dgray'>( +6 dex ) </i> 7 <i class='brown'>leather</i>  <i class='dgray'>( ".$row['leather']." )</i>
		<i class='ddgray right'> have ".$row['leathervest']." </i></li>";
                } else { // -------------------------------------------------------------------------- else
                    echo "<li class='gray'>- leather vest <i class='dgray'>( +6 dex )</i> 7 leather
		<i class='ddgray right'> have ".$row['leathervest']."</i></li>";
                }
                // ------------------------------------------------------------------------------------------------- leather armor
                if ($row['leather'] >= 10 && $row['craftingtable'] == $row['room'] && $row['hammer'] >= 1) {
                    echo "<li><input type='submit' class='brownBG white' name='input1' value='craft leather armor' />
		<i class='dgray'>( +4 str, +10 def ) </i> 10 <i class='brown'>leather</i>  <i class='dgray'>( ".$row['leather']." )</i>
		<i class='ddgray right'> have ".$row['leatherarmor']." </i></li>";
                } else { // -------------------------------------------------------------------------- else
                    echo "<li class='gray'>- leather armor <i class='dgray'>( +4 str, +10 def )</i> 10 leather
		<i class='ddgray right'> have ".$row['leatherarmor']."</i></li>";
                }
                // ------------------------------------------------------------------------------------------------- leather gloves
                if ($row['leather'] >= 3 && $row['craftingtable'] == $row['room'] && $row['hammer'] >= 1) {
                    echo "<li><input type='submit' class='brownBG white' name='input1' value='craft leather gloves' />
		<i class='dgray'>( +3 dex, +3 def ) </i> 3 <i class='brown'>leather</i>  <i class='dgray'>( ".$row['leather']." )</i>
		<i class='ddgray right'> have ".$row['leathergloves']." </i></li>";
                } else { // -------------------------------------------------------------------------- else
                    echo "<li class='gray'>- leather gloves <i class='dgray'>( +3 dex, +3 def )</i> 3 leather
		<i class='ddgray right'> have ".$row['leathergloves']."</i></li>";
                }
                // ------------------------------------------------------------------------------------------------- leather boots
                if ($row['leather'] >= 3 && $row['craftingtable'] == $row['room'] && $row['hammer'] >= 1) {
                    echo "<li><input type='submit' class='brownBG white' name='input1' value='craft leather boots' />
		<i class='dgray'>( +3 dex, +3 def ) </i> 3 <i class='brown'>leather</i>  <i class='dgray'>( ".$row['leather']." )</i>
		<i class='ddgray right'> have ".$row['leatherboots']." </i></li>";
                } else { // -------------------------------------------------------------------------- else
                    echo "<li class='gray'>- leather boots <i class='dgray'>( +3 dex, +3 def )</i> 3 leather
		<i class='ddgray right'> have ".$row['leatherboots']."</i></li>";
                }
                //echo '</div>'; // -- end craftBox toggle
            }

            if ($row['quest10'] >=2) {	// iron display check, after leather quest
                //echo '<div class="craftBox transition">';
                // ------------------------------------------------------------------------------------------------ TABLE - IRON!
                echo '<h2 class=" brown"><span class="ra ra-gold-bar"></span> Iron <i class="gold">x'.$row['iron'].'</i></h2>';
                if ($row['quest10'] < 2) {
                    echo '';
                } elseif ($row['quest31'] < 1) {
                    echo '<p class="gold padd">To Craft w/ Iron find the Mining Guild</p>';
                } elseif ($row['quest32'] < 2) {
                    echo '<p class="gold">To Craft w/ Iron defeat the Phoenix at mine level 10 ( Quest 32 )</p>';
                } elseif ($row['ironhammer'] < 1) {
                    echo '<p class="gold right">need iron hammer!</p>';
                } else {
                    echo '<li class="gray center">1h</li>';
                    // ------------------------------------------------------------------------------------------------- iron dagger
                    if ($row['iron'] >= 1 && $row['wood'] >= 1 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron dagger' />
		 1 <i class='brown'>iron</i> + <i class='brown'>wood</i>   <i class='dgray'>( +7 str ) </i>
		<i class='ddgray right'> have ".$row['irondagger']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron dagger
		<i class='ddgray right'> have ".$row['irondagger']."</i></li>";
                    }
                    // ------------------------------------------------------------------------------------------------- iron sword
                    if ($row['iron'] >= 7 && $row['wood'] >= 1 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron sword' />
		 7 <i class='brown'>iron</i> + <i class='brown'>wood</i>  <i class='dgray'>( +18 str ) </i>
		<i class='ddgray right'> have ".$row['ironsword']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron sword
		<i class='ddgray right'> have ".$row['ironsword']."</i></li>";
                    }
                    // ------------------------------------------------------------------------------------------------- iron staff
                    if ($row['iron'] >= 7 && $row['wood'] >= 1 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron staff' />
		7 <i class='brown'>iron</i> + <i class='brown'>wood</i>  <i class='dgray'>( +10 mag, +3 str ) </i>
		<i class='ddgray right'> have ".$row['ironstaff']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron staff
		<i class='ddgray right'> have ".$row['ironstaff']."</i></li>";
                    }
                    echo '<li class="gray center">2h</li>';
                    // ------------------------------------------------------------------------------------------------- iron maul
                    if ($row['iron'] >= 10 && $row['wood'] >= 1 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron maul' />
		10 <i class='brown'>iron</i> + <i class='brown'>wood</i>  <i class='dgray'>( +22 str, +10 def ) </i>
		<i class='ddgray right'> have ".$row['ironmaul']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron maul
		<i class='ddgray right'> have ".$row['ironmaul']."</i></li>";
                    }
                    // ------------------------------------------------------------------------------------------------- iron 2h sword
                    if ($row['iron'] >= 15 && $row['wood'] >= 1 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron 2h sword' />
		15 <i class='brown'>iron</i> + <i class='brown'>wood</i>  <i class='dgray'>( +25 str ) </i>
		<i class='ddgray right'> have ".$row['iron2hsword']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron 2h sword
		<i class='ddgray right'> have ".$row['iron2hsword']."</i></li>";
                    }
                    // ------------------------------------------------------------------------------------------------- iron battle staff
                    if ($row['iron'] >= 15 && $row['wood'] >= 1 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron battle staff' />
		15 <i class='brown'>iron</i> + <i class='brown'>wood</i>  <i class='dgray'>( +12 mag, +12 str ) </i>
		<i class='ddgray right'> have ".$row['ironbattlestaff']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron battle staff
		<i class='ddgray right'> have ".$row['ironbattlestaff']."</i></li>";
                    }
                    // ------------------------------------------------------------------------------------------------- iron nunchaku
                    if ($row['iron'] >= 10 && $row['graymatter'] >= 1 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron nunchaku' />
		10 <i class='brown'>iron</i> + <i class='gray'>gray matter</i>  <i class='dgray'>( +25 mag, +25 str ) </i>
		<i class='ddgray right'> have ".$row['ironnunchaku']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron nunchaku
		<i class='ddgray right'> have ".$row['ironnunchaku']."</i></li>";
                    }


                    echo '<li class="gray center">ranged</li>';
                    // ------------------------------------------------------------------------------------------------- iron boomerang
                    if ($row['iron'] >= 5 && $row['wood'] >= 1 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron boomerang' />
		 5 <i class='brown'>iron</i> + <i class='brown'>wood</i>  <i class='dgray'>( +10 dex ) </i>
		<i class='ddgray right'> have ".$row['ironboomerang']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron boomerang
		<i class='ddgray right'> have ".$row['ironboomerang']."</i></li>";
                    }
                    // ------------------------------------------------------------------------------------------------- iron bow
                    if ($row['iron'] >= 7 && $row['wood'] >= 1 && $row['string'] >= 1 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron bow' />
		 7 <i class='brown'>iron</i> + <i class='brown'>wood</i> + <i class='white'>string</i>  <i class='dgray'>( +20 dex ) </i>
		<i class='ddgray right'> have ".$row['ironbow']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron bow
		<i class='ddgray right'> have ".$row['ironbow']."</i></li>";
                    }
                    // ------------------------------------------------------------------------------------------------- iron crossbow
                    if ($row['iron'] >= 10 && $row['wood'] >= 1 && $row['string'] >= 1 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron crossbow' />
		 10 <i class='brown'>iron</i> + <i class='brown'>wood</i> + <i class='white'>string</i>  <i class='dgray'>( +30 dex ) </i>
		<i class='ddgray right'> have ".$row['ironcrossbow']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron crossbow
		<i class='ddgray right'> have ".$row['ironcrossbow']."</i></li>";
                    }
                    // ------------------------------------------------------------------------------------------------- iron chakram
                    if ($row['iron'] >= 7 && $row['graymatter'] >= 1 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron chakram' />
		7 <i class='brown'>iron</i> + <i class='gray'>gray matter</i>  <i class='dgray'>( +15 dex, +15 mag ) </i>
		<i class='ddgray right'> have ".$row['ironchakram']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron chakram
		<i class='ddgray right'> have ".$row['ironchakram']."</i></li>";
                    }

                    echo '<li class="gray center">shields</li>';
                    // ------------------------------------------------------------------------------------------------- iron shield
                    if ($row['iron'] >= 10 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron shield' />
		10 <i class='brown'>iron</i> <i class='dgray'>( +25 def ) </i>
		<i class='ddgray right'> have ".$row['ironshield']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron shield
		<i class='ddgray right'> have ".$row['ironshield']."</i></li>";
                    }
                    // ------------------------------------------------------------------------------------------------- iron kite shield
                    if ($row['iron'] >= 15 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron kite shield' />
		15 <i class='brown'>iron</i> <i class='dgray'>( +40 def, -10 mag ) </i>
		<i class='ddgray right'> have ".$row['ironkiteshield']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron kite shield
		<i class='ddgray right'> have ".$row['ironkiteshield']."</i></li>";
                    }


                    echo '<li class="gray center">armor</li>';
                    // echo '<li class="gray center">head</li>';
                    // ------------------------------------------------------------------------------------------------- iron helmet
                    if ($row['iron'] >= 5 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron helmet' />
		5 <i class='brown'>iron</i> <i class='dgray'>( +20 def ) </i>
		<i class='ddgray right'> have ".$row['ironhelmet']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron helmet
		<i class='ddgray right'> have ".$row['ironhelmet']."</i></li>";
                    }
                    // ------------------------------------------------------------------------------------------------- iron hood
                    if ($row['iron'] >= 3 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron hood' />
		3 <i class='brown'>iron</i> <i class='dgray'>( +3 str, +3 dex, +3 def ) </i>
		<i class='ddgray right'> have ".$row['ironhood']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron hood
		<i class='ddgray right'> have ".$row['ironhood']."</i></li>";
                    }

                    //echo '<li class="gray center">body</li>';
                    // ------------------------------------------------------------------------------------------------- iron armor
                    if ($row['iron'] >= 10 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron armor' />
		10 <i class='brown'>iron</i> <i class='dgray'>( +30 def ) </i>
		<i class='ddgray right'> have ".$row['ironarmor']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron armor
		<i class='ddgray right'> have ".$row['ironarmor']."</i></li>";
                    }
                    // ------------------------------------------------------------------------------------------------- iron cape
                    if ($row['iron'] >= 7 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron cape' />
		7 <i class='brown'>iron</i> <i class='dgray'>( +15 str ) </i>
		<i class='ddgray right'> have ".$row['ironcape']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron cape
		<i class='ddgray right'> have ".$row['ironcape']."</i></li>";
                    }

                    //echo '<li class="gray center">hands</li>';
                    // ------------------------------------------------------------------------------------------------- iron gauntlets
                    if ($row['iron'] >= 5 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron gauntlets' />
		5 <i class='brown'>iron</i> <i class='dgray'>( +20 def ) </i>
		<i class='ddgray right'> have ".$row['irongauntlets']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron gauntlets
		<i class='ddgray right'> have ".$row['irongauntlets']."</i></li>";
                    }
                    // ------------------------------------------------------------------------------------------------- iron gloves
                    if ($row['iron'] >= 3 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron gloves' />
		3 <i class='brown'>iron</i> <i class='dgray'>( +5 str, +10 def ) </i>
		<i class='ddgray right'> have ".$row['irongloves']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron gloves
		<i class='ddgray right'> have ".$row['irongloves']."</i></li>";
                    }

                    //echo '<li class="gray center">feet</li>';
                    // ------------------------------------------------------------------------------------------------- iron boots
                    if ($row['iron'] >= 3 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron boots' />
		3 <i class='brown'>iron</i> <i class='dgray'>( +20 def ) </i>
		<i class='ddgray right'> have ".$row['ironboots']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron boots
		<i class='ddgray right'> have ".$row['ironboots']."</i></li>";
                    }

                    //echo '</div>'; // -- end craftBox
                } // end iron quest  check

                //echo '<div class="craftBox transition"> ';
                // ------------------------------------------------------------------------------------------------ TABLE - TOOLS!
                // ------------------------------------------------------------------------------------------------- hatchet
                echo '<h2 class="gray">Tools</h2>';
                if ($row['wood'] >= 1 && $row['stone'] >= 3 && $row['craftingtable'] == $row['room']) {
                    echo "<li><input type='submit' class='white grayBG' name='input1' value='craft hatchet' />
			  3 <i class='gray'>stone</i> + <i class='brown'>wood</i> <i class='dgray'> ( chop wood ) </i>
			 <i class='ddgray right'> have ".$row['hatchet']." </i></li>";
                } else { // -------------------------------------------------------------------------- else
                    echo "<li class='gray'>- hatchet <i class='dgray'> ( chop wood ) </i> 3 stone + wood
		<i class='ddgray right'> have ".$row['hatchet']."</i></li>";
                }
                // ------------------------------------------------------------------------------------------------- pickaxe
                if ($row['wood'] >= 1 && $row['stone'] >= 3 && $row['craftingtable'] == $row['room']) {
                    echo "<li><input type='submit' class='white grayBG' name='input1' value='craft pickaxe' />
			 3 <i class='gray'>stone</i> + <i class='brown'>wood</i> <i class='dgray'> ( mine ore ) </i>
			 <i class='ddgray right'> have ".$row['pickaxe']."</i></li>";
                } else { // -------------------------------------------------------------------------- else
                    echo "<li class='gray'>- pickaxe <i class='dgray'> ( mine ore ) </i> 3 stone + wood
		<i class='ddgray right'> have ".$row['pickaxe']."</i></li>";
                }
                // ------------------------------------------------------------------------------------------------- hammer
                if ($row['wood'] >= 1 && $row['stone'] >= 3 && $row['craftingtable'] == $row['room']) {
                    echo "<li><input type='submit' class='white grayBG' name='input1' value='craft hammer' />
			 3 <i class='gray'>stone</i> + <i class='brown'>wood</i> <i class='dgray'> ( craft items ) </i>
			 <i class='ddgray right'> have ".$row['hammer']."</i></li>";
                } else { // -------------------------------------------------------------------------- else
                    echo "<li class='gray'>- hammer <i class='dgray'> ( craft items ) </i> 3 stone + wood
		<i class='ddgray right'> have ".$row['hammer']."</i></li>";
                }

                if ($row['quest32'] >=2) {	// iron tool check
                    // ------------------------------------------------------------------------------------------------- iron hatchet
                    if ($row['iron'] >= 3 && $row['wood'] >= 1 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron hatchet' />
		 3 <i class='brown'>iron</i> + <i class='brown'>wood</i>  <i class='dgray'>( chops 2 wood ) </i>
		<i class='ddgray right'> have ".$row['ironhatchet']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron hatchet
		<i class='ddgray right'> have ".$row['ironhatchet']."</i></li>";
                    }
                    // ------------------------------------------------------------------------------------------------- iron pickaxe
                    if ($row['iron'] >= 3 && $row['wood'] >= 1 && $row['craftingtable'] == $row['room'] && $row['ironhammer'] >= 1) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron pickaxe' />
		 3 <i class='brown'>iron</i> + <i class='brown'>wood</i>  <i class='dgray'>( mine iron & stone ) </i>
		<i class='ddgray right'> have ".$row['ironpickaxe']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron pickaxe
		<i class='ddgray right'> have ".$row['ironpickaxe']."</i></li>";
                    }
                    // ------------------------------------------------------------------------------------------------- iron hammer
                    if ($row['iron'] >= 3 && $row['wood'] >= 1 && $row['craftingtable'] == $row['room']) {
                        echo "<li><input type='submit' class='brownBG white' name='input1' value='craft iron hammer' />
		 3 <i class='brown'>iron</i> + <i class='brown'>wood</i>  <i class='dgray'>( craft iron equipment ) </i>
		<i class='ddgray right'> have ".$row['ironhammer']." </i></li>";
                    } else { // -------------------------------------------------------------------------- else
                        echo "<li class='gray'>- iron hammer
		<i class='ddgray right'> have ".$row['ironhammer']."</i></li>";
                    }
                } // end iron tool check
        echo '</div>'; // end gslice

            }
        } // --- end table

        // ---------------------------------------------------------------------------- MATERIALS MENU

        echo '<div class="gslice">';
        echo '<h2>Materials & Tools</h2>';
        if ($row['wood'] > 0) {
            echo '<li><span>'.$row['wood'].' </span> <span class="brown"> wood</span></li> ';
        } else {
            echo '<li><span class="dgray"> - wood </span></li> ';
        }
        if ($row['leather'] > 0) {
            echo '<li><span>'.$row['leather'].' </span> <span class="brown"> leather</span></li> ';
        } else {
            echo '<li><span class="dgray"> - leather </span></li> ';
        }
        if ($row['water'] > 0) {
            echo '<li><span>'.$row['water'].' </span > <span class="blue"> water</li> ';
        } else {
            echo '<li><span class="dgray"> - water </span></li> ';
        }
        if ($row['sand'] > 0) {
            echo '<li><span>'.$row['sand'].' </span> <span class="lyellow">sand</span></li> ';
        } else {
            echo '<li><span class="dgray"> - sand </span></li> ';
        }
        if ($row['mud'] > 0) {
            echo '<li><span>'.$row['mud'].' </span> <span class="brown">mud</span></li> ';
        } else {
            echo '<li><span class="dgray"> - mud </span></li> ';
        }
        if ($row['string'] > 0) {
            echo '<li><span>'.$row['string'].' </span> string</li> ';
        } else {
            echo '<li><span class="dgray"> - string </span></li> ';
        }
        if ($row['graymatter'] > 0) {
            echo '<li><span class="gold">'.$row['graymatter'].' </span> <span class="gray">gray</span> matter</li> ';
        } else {
            echo '<li><span class="dgray">- gray matter </span></li> ';
        }
        // if ($row['dagger'] > 0) {
        //     echo '<li><span class="gold">'.$row['dagger'].' </span> dagger</li> ';
        // } else {
        //     echo '<li><span class="dgray">- dagger </span></li> ';
        // }
        // if ($row['irondagger'] > 0) {
        //     echo '<li><span class="gold">'.$row['irondagger'].' </span> <span class="brown">iron</span> dagger</li> ';
        // } else {
        //     echo '<li><span class="dgray">- iron dagger </span></li> ';
        // }
        // if ($row['steeldagger'] > 0) {
        //     echo '<li><span class="gold">'.$row['steeldagger'].' </span> <span class="gray">steel</span> dagger</li> ';
        // } else {
        //     echo '<li><span class="dgray">- steel dagger </span></li> ';
        // }

        echo '</div>';
        echo '<div class="gslice">';
        if ($row['stone'] > 0) {
            echo '<li><span>'.$row['stone'].' </span> <span class="gray"> stone</span></li>  ';
        } else {
            echo '<li><span class="dgray"> - stone </span></li> ';
        }
        if ($row['iron'] > 0) {
            echo '<li><span>'.$row['iron'].' </span> <span class="brown"> iron</span></li> ';
        } else {
            echo '<li><span class="dgray"> 0-iron </span></li> ';
        }
        if ($row['coal'] > 0) {
            echo '<li><span>'.$row['coal'].' </span> <span class="ddgray"> coal</span></li> ';
        } else {
            echo '<li><span class="dgray"> - coal </span></li> ';
        }
        if ($row['steel'] > 0) {
            echo '<li><span>'.$row['steel'].' </span> <span class="lightgray"> steel</span></li> ';
        } else {
            echo '<li><span class="dgray"> - steel </span></li> ';
        }
        if ($row['mithril'] > 0) {
            echo '<li><span>'.$row['mithril'].' </span> <span class="blue"> mithril</span></li> ';
        } else {
            echo '<li><span class="dgray"> - mithril </span></li> ';
        }



        echo '</div>';
        echo '<div class="gslice">';
        if ($row['hatchet'] > 0) {
            echo '<li><span class="gold">'.$row['hatchet'].' </span> hatchet</li> ';
        } else {
            echo '<li><span class="dgray">- hatchet </span></li> ';
        }
        if ($row['ironhatchet'] > 0) {
            echo '<li><span class="gold">'.$row['ironhatchet'].' </span> <span class="brown">iron</span> hatchet</li> ';
        } else {
            echo '<li><span class="dgray">- iron hatchet </span></li> ';
        }
        if ($row['steelhatchet'] > 0) {
            echo '<li><span class="gold">'.$row['steelhatchet'].' </span> <span class="gray">steel</span> hatchet</li> ';
        } else {
            echo '<li><span class="dgray">- steel hatchet </span></li> ';
        }
        if ($row['mithrilhatchet'] > 0) {
            echo '<li><span class="gold">'.$row['mithrilhatchet'].' </span> <span class="blue">mithril</span> hatchet</li> ';
        } else {
            echo '<li><span class="dgray">- mithril hatchet </span></li> ';
        }



        if ($row['pickaxe'] > 0) {
            echo '<li><span class="gold">'.$row['pickaxe'].' </span> pickaxe</li> ';
        } else {
            echo '<li><span class="dgray">- pickaxe </span></li> ';
        }
        if ($row['ironpickaxe'] > 0) {
            echo '<li><span class="gold">'.$row['ironpickaxe'].' </span> <span class="brown">iron</span> pickaxe</li> ';
        } else {
            echo '<li><span class="dgray">- iron pickaxe </span></li> ';
        }
        if ($row['steelpickaxe'] > 0) {
            echo '<li><span class="gold">'.$row['steelpickaxe'].' </span> <span class="gray">steel</span> pickaxe</li> ';
        } else {
            echo '<li><span class="dgray">- steel pickaxe </span></li> ';
        }
        if ($row['mithrilpickaxe'] > 0) {
            echo '<li><span class="gold">'.$row['mithrilpickaxe'].' </span> <span class="blue">mithril</span> pickaxe</li> ';
        } else {
            echo '<li><span class="dgray">- mithril pickaxe </span></li> ';
        }

        if ($row['hammer'] > 0) {
            echo '<li><span class="gold">'.$row['hammer'].' </span> hammer</li> ';
        } else {
            echo '<li><span class="dgray">- hammer </span></li> ';
        }
        if ($row['ironhammer'] > 0) {
            echo '<li><span class="gold">'.$row['ironhammer'].' </span> <span class="brown">iron</span> hammer</li> ';
        } else {
            echo '<li><span class="dgray">- iron hammer </span></li> ';
        }
        if ($row['steelhammer'] > 0) {
            echo '<li><span class="gold">'.$row['steelhammer'].' </span> <span class="gray">steel</span> hammer</li> ';
        } else {
            echo '<li><span class="dgray">- steel hammer </span></li> ';
        }
        if ($row['mithrilhammer'] > 0) {
            echo '<li><span class="gold">'.$row['mithrilhammer'].' </span> <span class="blue">mithril</span> hammer</li> ';
        } else {
            echo '<li><span class="dgray">- mithril hammer </span></li> ';
        }

        echo '</div>';


        // ---------------------------------------------------------------------------- RINGS MENU
        echo '<div class="gslice">';
        echo '<h2>Combine Rings</h2>';
        //  echo '<h4 class="gray">need table & hammer</h4>';
        if ($row['hammer'] <1) {
            echo '<p class="gold padd">- Need Hammer!</p>';
        }

        if (($row['craftingtable'] == $row['room']) && ($row['hammer'] >=1 || $row['ironhammer'] >=1 || $row['steelhammer'] >=1 || $row['mithrilhammer'] >=1)) {
            echo '<li>	<button class="goldBG" type="submit" name="input1" value="auto combine">Combine Rings</button>
</li>';
            
            if ($row['ringofstrength'] >=2) { // ------------------------------------------------------------------------------- rings II
                echo "<li><input type='submit' class='white redBG' name='input1' value='craft ring of strength II' /> 2x ring of strength    <span class='right'>".$row['ringofstrength']."</span> </li>";
            }
            if ($row['ringofdexterity'] >=2) {
                echo "<li><input type='submit' class='white greenBG' name='input1' value='craft ring of dexterity II' /> 2x ring of dexterity  <span class='right'>".$row['ringofdexterity']."</span> </li>";
            }
            if ($row['ringofmagic'] >=2) {
                echo  "<li><input type='submit' class='white blueBG' name='input1' value='craft ring of magic II' /> 2x ring of magic  <span class='right'>".$row['ringofmagic']."</span> </li>";
            }
            if ($row['ringofdefense'] >=2) {
                echo "<li><input type='submit' class='darkgray yellowBG' name='input1' value='craft ring of defense II' /> 2x ring of defense   <span class='right'>".$row['ringofdefense']."</span> </li>";
            }

            if ($row['ringofstrengthII'] >=2) { // ------------------------------------------------------------------------------- rings III
                echo "<li><input type='submit' class='white redBG' name='input1' value='craft ring of strength III' />  2x ring of strength II   <span class='right'>".$row['ringofstrengthII']."</span> </li>";
            }
            if ($row['ringofdexterityII'] >=2) {
                echo "<li><input type='submit' class='white greenBG' name='input1' value='craft ring of dexterity III' /> 2x ring of dexterity II  <span class='right'>".$row['ringofdexterityII']."</span> </li>";
            }
            if ($row['ringofmagicII'] >=2) {
                echo  "<li><input type='submit' class='white blueBG' name='input1' value='craft ring of magic III' /> 2x ring of magic II   <span class='right'>".$row['ringofmagicII']."</span> </li>";
            }
            if ($row['ringofdefenseII'] >=2) {
                echo "<li><input type='submit' class='darkgray yellowBG' name='input1' value='craft ring of defense III' /> 2x ring of defense II   <span class='right'>".$row['ringofdefenseII']."</span> </li>";
            }

            if ($row['ringofstrengthIII'] >=2) { // ------------------------------------------------------------------------------- rings IV
                echo "<li><input type='submit' class='white redBG' name='input1' value='craft ring of strength IV' /> 2x ring of strength III   <span class='right'>".$row['ringofstrengthIII']."</span> </li>";
            }
            if ($row['ringofdexterityIII'] >=2) {
                echo "<li><input type='submit' class='white greenBG' name='input1' value='craft ring of dexterity IV' /> 2x ring of dexterity III  <span class='right'>".$row['ringofdexterityIII']."</span> </li>";
            }
            if ($row['ringofmagicIII'] >=2) {
                echo  "<li><input type='submit' class='white blueBG' name='input1' value='craft ring of magic IV' /> 2x ring of magic III   <span class='right'>".$row['ringofmagicIII']."</span> </li>";
            }
            if ($row['ringofdefenseIII'] >=2) {
                echo "<li><input type='submit' class='darkgray yellowBG' name='input1' value='craft ring of defense IV' /> 2x ring of defense III   <span class='right'>".$row['ringofdefenseIII']."</span> </li>";
            }

            if ($row['ringofstrengthIV'] >=2) { // ------------------------------------------------------------------------------- rings V
                echo "<li><input type='submit' class='white redBG' name='input1' value='craft ring of strength V' />  2x ring of strength IV   <span class='right'>".$row['ringofstrengthIV']."</span> </li>";
            }
            if ($row['ringofdexterityIV'] >=2) {
                echo "<li><input type='submit' class='white greenBG' name='input1' value='craft ring of dexterity V' /> 2x ring of dexterity IV  <span class='right'>".$row['ringofdexterityIV']."</span> </li>";
            }
            if ($row['ringofmagicIV'] >=2) {
                echo  "<li><input type='submit' class='white blueBG' name='input1' value='craft ring of magic V' /> 2x ring of magic IV   <span class='right'>".$row['ringofmagicIV']."</span> </li>";
            }
            if ($row['ringofdefenseIV'] >=2) {
                echo "<li><input type='submit' class='darkgray yellowBG' name='input1' value='craft ring of defense V' /> 2x ring of defense IV   <span class='right'>".$row['ringofdefenseIV']."</span> </li>";
            }
        } // END IF HAMMER FOR RINGS //


        // ------------------------------------------------------------------------------- HIGHEST RINGS!
        echo '<li class="gold">Rings - Max Stat</li>';
        if ($row['ringofstrengthXX'] > 0) {
            echo "<li class='maxRing redborder red'>XX</li>";
        } elseif ($row['ringofstrengthXIX'] > 0) {
            echo "<li class='maxRing redborder red'>XIX</li>";
        } elseif ($row['ringofstrengthXVIII'] > 0) {
            echo "<li class='maxRing redborder red'>XVIII</li>";
        } elseif ($row['ringofstrengthXVII'] > 0) {
            echo "<li class='maxRing redborder red'>XVII</li>";
        } elseif ($row['ringofstrengthXVI'] > 0) {
            echo "<li class='maxRing redborder red'>XVI</li>";
        } elseif ($row['ringofstrengthXV'] > 0) {
            echo "<li class='maxRing redborder red'>XV</li>";
        } elseif ($row['ringofstrengthXIV'] > 0) {
            echo "<li class='maxRing redborder red'>XIV</li>";
        } elseif ($row['ringofstrengthXIII'] > 0) {
            echo "<li class='maxRing redborder red'>XIII</li>";
        } elseif ($row['ringofstrengthXII'] > 0) {
            echo "<li class='maxRing redborder red'>XII</li>";
        } elseif ($row['ringofstrengthXI'] > 0) {
            echo "<li class='maxRing redborder red'>XI</li>";
        } elseif ($row['ringofstrengthX'] > 0) {
            echo "<li class='maxRing redborder red'>X</li>";
        } elseif ($row['ringofstrengthIX'] > 0) {
            echo "<li class='maxRing redborder red'>IX</li>";
        } elseif ($row['ringofstrengthVIII'] > 0) {
            echo "<li class='maxRing redborder red'>VIII</li>";
        } elseif ($row['ringofstrengthVII'] > 0) {
            echo "<li class='maxRing redborder red'>VII</li>";
        } elseif ($row['ringofstrengthVI'] > 0) {
            echo "<li class='maxRing redborder red'>VI</li>";
        } elseif ($row['ringofstrengthV'] > 0) {
            echo "<li class='maxRing redborder red'>V</li>";
        } elseif ($row['ringofstrengthIV'] > 0) {
            echo "<li class='maxRing redborder red'>IV</li>";
        } elseif ($row['ringofstrengthIII'] > 0) {
            echo "<li class='maxRing redborder red'>III</li>";
        } elseif ($row['ringofstrengthII'] > 0) {
            echo "<li class='maxRing redborder red'>II</li>";
        } elseif ($row['ringofstrength'] > 0) {
            echo "<li class='maxRing redborder red'>I</li>";
        }


        if ($row['ringofdexterityXX'] > 0) {
            echo "<li class='maxRing greenborder green'>XX</li>";
        } elseif ($row['ringofdexterityXIX'] > 0) {
            echo "<li class='maxRing greenborder green'>XIX</li>";
        } elseif ($row['ringofdexterityXVIII'] > 0) {
            echo "<li class='maxRing greenborder green'>XVIII</li>";
        } elseif ($row['ringofdexterityXVII'] > 0) {
            echo "<li class='maxRing greenborder green'>XVII</li>";
        } elseif ($row['ringofdexterityXVI'] > 0) {
            echo "<li class='maxRing greenborder green'>XVI</li>";
        } elseif ($row['ringofdexterityXV'] > 0) {
            echo "<li class='maxRing greenborder green'>XV</li>";
        } elseif ($row['ringofdexterityXIV'] > 0) {
            echo "<li class='maxRing greenborder green'>XIV</li>";
        } elseif ($row['ringofdexterityXIII'] > 0) {
            echo "<li class='maxRing greenborder green'>XIII</li>";
        } elseif ($row['ringofdexterityXII'] > 0) {
            echo "<li class='maxRing greenborder green'>XII</li>";
        } elseif ($row['ringofdexterityXI'] > 0) {
            echo "<li class='maxRing greenborder green'>XI</li>";
        } elseif ($row['ringofdexterityX'] > 0) {
            echo "<li class='maxRing greenborder green'>X</li>";
        } elseif ($row['ringofdexterityIX'] > 0) {
            echo "<li class='maxRing greenborder green'>IX</li>";
        } elseif ($row['ringofdexterityVIII'] > 0) {
            echo "<li class='maxRing greenborder green'>VIII</li>";
        } elseif ($row['ringofdexterityVII'] > 0) {
            echo "<li class='maxRing greenborder green'>VII</li>";
        } elseif ($row['ringofdexterityVI'] > 0) {
            echo "<li class='maxRing greenborder green'>VI</li>";
        } elseif ($row['ringofdexterityV'] > 0) {
            echo "<li class='maxRing greenborder green'>V</li>";
        } elseif ($row['ringofdexterityIV'] > 0) {
            echo "<li class='maxRing greenborder green'>IV</li>";
        } elseif ($row['ringofdexterityIII'] > 0) {
            echo "<li class='maxRing greenborder green'>III</li>";
        } elseif ($row['ringofdexterityII'] > 0) {
            echo "<li class='maxRing greenborder green'>II</li>";
        } elseif ($row['ringofdexterity'] > 0) {
            echo "<li class='maxRing greenborder green'>I</li>";
        }

        if ($row['ringofmagicXX'] > 0) {
            echo "<li class='maxRing blueborder blue'>XX</li>";
        } elseif ($row['ringofmagicXIX'] > 0) {
            echo "<li class='maxRing blueborder blue'>XIX</li>";
        } elseif ($row['ringofmagicXVIII'] > 0) {
            echo "<li class='maxRing blueborder blue'>XVIII</li>";
        } elseif ($row['ringofmagicXVII'] > 0) {
            echo "<li class='maxRing blueborder blue'>XVII</li>";
        } elseif ($row['ringofmagicXVI'] > 0) {
            echo "<li class='maxRing blueborder blue'>XVI</li>";
        } elseif ($row['ringofmagicXV'] > 0) {
            echo "<li class='maxRing blueborder blue'>XV</li>";
        } elseif ($row['ringofmagicXIV'] > 0) {
            echo "<li class='maxRing blueborder blue'>XIV</li>";
        } elseif ($row['ringofmagicXIII'] > 0) {
            echo "<li class='maxRing blueborder blue'>XIII</li>";
        } elseif ($row['ringofmagicXII'] > 0) {
            echo "<li class='maxRing blueborder blue'>XII</li>";
        } elseif ($row['ringofmagicXI'] > 0) {
            echo "<li class='maxRing blueborder blue'>XI</li>";
        } elseif ($row['ringofmagicX'] > 0) {
            echo "<li class='maxRing blueborder blue'>X</li>";
        } elseif ($row['ringofmagicIX'] > 0) {
            echo "<li class='maxRing blueborder blue'>IX</li>";
        } elseif ($row['ringofmagicVIII'] > 0) {
            echo "<li class='maxRing blueborder blue'>VIII</li>";
        } elseif ($row['ringofmagicVII'] > 0) {
            echo "<li class='maxRing blueborder blue'>VII</li>";
        } elseif ($row['ringofmagicVI'] > 0) {
            echo "<li class='maxRing blueborder blue'>VI</li>";
        } elseif ($row['ringofmagicV'] > 0) {
            echo "<li class='maxRing blueborder blue'>V</li>";
        } elseif ($row['ringofmagicIV'] > 0) {
            echo "<li class='maxRing blueborder blue'>IV</li>";
        } elseif ($row['ringofmagicIII'] > 0) {
            echo "<li class='maxRing blueborder blue'>III</li>";
        } elseif ($row['ringofmagicII'] > 0) {
            echo "<li class='maxRing blueborder blue'>II</li>";
        } elseif ($row['ringofmagic'] > 0) {
            echo "<li class='maxRing blueborder blue'>I</li>";
        }

        if ($row['ringofdefenseXX'] > 0) {
            echo "<li class='maxRing goldborder gold'>XX</li>";
        } elseif ($row['ringofdefenseXIX'] > 0) {
            echo "<li class='maxRing goldborder gold'>XIX</li>";
        } elseif ($row['ringofdefenseXVIII'] > 0) {
            echo "<li class='maxRing goldborder gold'>XVIII</li>";
        } elseif ($row['ringofdefenseXVII'] > 0) {
            echo "<li class='maxRing goldborder gold'>XVII</li>";
        } elseif ($row['ringofdefenseXVI'] > 0) {
            echo "<li class='maxRing goldborder gold'>XVI</li>";
        } elseif ($row['ringofdefenseXV'] > 0) {
            echo "<li class='maxRing goldborder gold'>XV</li>";
        } elseif ($row['ringofdefenseXIV'] > 0) {
            echo "<li class='maxRing goldborder gold'>XIV</li>";
        } elseif ($row['ringofdefenseXIII'] > 0) {
            echo "<li class='maxRing goldborder gold'>XIII</li>";
        } elseif ($row['ringofdefenseXII'] > 0) {
            echo "<li class='maxRing goldborder gold'>XII</li>";
        } elseif ($row['ringofdefenseXI'] > 0) {
            echo "<li class='maxRing goldborder gold'>XI</li>";
        } elseif ($row['ringofdefenseX'] > 0) {
            echo "<li class='maxRing goldborder gold'>X</li>";
        } elseif ($row['ringofdefenseIX'] > 0) {
            echo "<li class='maxRing goldborder gold'>IX</li>";
        } elseif ($row['ringofdefenseVIII'] > 0) {
            echo "<li class='maxRing goldborder gold'>VIII</li>";
        } elseif ($row['ringofdefenseVII'] > 0) {
            echo "<li class='maxRing goldborder gold'>VII</li>";
        } elseif ($row['ringofdefenseVI'] > 0) {
            echo "<li class='maxRing goldborder gold'>VI</li>";
        } elseif ($row['ringofdefenseV'] > 0) {
            echo "<li class='maxRing goldborder gold'>V</li>";
        } elseif ($row['ringofdefenseIV'] > 0) {
            echo "<li class='maxRing goldborder gold'>IV</li>";
        } elseif ($row['ringofdefenseIII'] > 0) {
            echo "<li class='maxRing goldborder gold'>III</li>";
        } elseif ($row['ringofdefenseII'] > 0) {
            echo "<li class='maxRing goldborder gold'>II</li>";
        } elseif ($row['ringofdefense'] > 0) {
            echo "<li class='maxRing goldborder gold'>I</li>";
        }
        echo '</div>';
    }
    echo '</div>';
}
?>
