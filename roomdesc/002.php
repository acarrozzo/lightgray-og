<?php


// ---------------------------------------------------- 002 - Grassy Field South
//if ($roomID=='002') {
    $_SESSION['dangerLVL'] = "0";
    $dirN='active greenfield';
    $dirE='active greenfield';
    $dirNW='active greenfield';
    $dirNE='active greenfield';
    $dirS='active gray';
    $dirW='active greenfield';
    $icon = file_get_contents("img/svg/redberry.svg");
//}


//The grass starts to get rocky in this area. There is a redberry bush here. Eat redberry to restore lost health points. To the east you see an entrance to a cave and to the west you see a cabin.

echo '<div class="roomBox">
<div class="roomIconTitle">
    <span class="icon roomIcon red">'.$icon.'</span>
	<div class="roomTitle">
<h3 class="greenfield">Grassy Field South</h3>
  <h4 class="red">Redberry Patch</h4>
</div>
	</div>

<p>The grass starts to get rocky in this area. A redberry bush is here, and consuming its fruit will restore lost health points. An entrance to a cave can be seen to the east, and a cabin is visible to the west.</p>
	<form id="mainForm" method="post" action="" name="formInput">';
  




if (!function_exists('pickRedberry')) {
function pickRedberry() {
    // Ensure the HTML is properly formatted
    //return '<button class="redBG" type="submit" name="input1" value="pick redberry">Pick Redberry</button>';

    $btnIcon = file_get_contents("img/svg/redberry.svg");
        return '<button class="redBG btnIcon alignL" type="submit" name="input1" value="pick redberry">Pick Redberry
        <span>'.$btnIcon.'</span>
        </button>';
  }
}


// Call the function and echo its output
echo pickRedberry();



  echo '
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="east">East</button>
  </form>
  </div>';



  ?>

