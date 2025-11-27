<?php
    $_SESSION['dangerLVL'] = "0";
    $dirN='active greenfield';
    $dirNE='active greenfield';
    $dirE='active greenfield';
    $dirSE='active greenfield';
    $dirS='active greenfield';
    $dirSW='active greenfield';
    $dirW='active greenfield';
    $dirNW='active greenfield';
    $icon = file_get_contents("img/svg/sun.svg");
    $btnIcon = file_get_contents("img/svg/sign.svg");
  //  $icon = file_get_contents("img/svg/grassyfield.svg");

//<button class="nobtn" type="submit" name="input1" value="pillar">pillar</button>

//  The air is warm and the sky above is bright blue. You are standing in the center of a large grassy field. There is a sign here with a gold chest at its base. To the southwest you see a cabin.

echo '<div class="roomBox">
<div class="roomIconTitle">
  <span class="icon roomIcon gold">'.$icon.'</span>
	<div class="roomTitle">
  <h4 class="blue">This is it. The world is yours.</h4>
 <h3 class="greenfield">Grassy Field Crossroads</h3>
</div>
	</div>
<p>You find yourself standing in the middle of a large, grassy field. The air is warm, and the sky above is bright blue. A sign stands nearby with a golden chest at its base. To the southwest, you see a small, cozy cabin. The peaceful atmosphere is filled with birdsong and the rustling of grass.</p> 
  <form id="mainForm" method="post" action="" name="formInput">
  <button type="submit" name="input1" value="west">West</button>
    <button type="submit" name="input1" value="south">South</button>
    <button type="submit" name="input1" value="north">North</button>
    <button type="submit" name="input1" value="east">East</button>
    ';


// THIS CHECKS IF DAILY CHEST HAS BEEN OPENED TODAY - from copilot
// Example: Fetch the `dailychestnextavailable` value from the database

//$dailychestnextavailable = $row['dailychestnextavailable']; // Replace with your actual logic
// Call the function

echo '  <button class="brownBG btnIcon" type="submit" name="input1" value="read sign">Read Sign <span class="">'.$btnIcon.'</span></button> ';
$dailyChestData = calculateDailyChestTimes($_SESSION['dailychestnextavailable']);

if ($_SESSION['chest1'] == 0) {
  //      if ($chest1 == 0) {
          echo ' <button class="goldBG" type="submit" name="input1" value="open chest">Open Gold Chest</button>';
      }
    // Check if the daily chest was opened today
    else if (($_SESSION['currenttimedaily'] >= $_SESSION['dailychestnextavailable']) && ($_SESSION['chest1'] == 1)) {
      $btnIcon = file_get_contents("img/svg/chest.svg");
      //echo "The daily chest is available to open.";
      echo '<button class="yellowBG dddgray btnIcon" type="submit" name="input1" value="open daily chest">
      <span>Open Daily Chest</span>
      <span>'.$btnIcon.'</span>
      </button>';
    
    } else if ($_SESSION['chest1'] == 1) {
      //  echo "The daily chest has already been opened today.";
        $btnIcon = file_get_contents("img/svg/checkedbox2.svg");
        echo '<button class="goldBG btnIcon" type="submit" name="input1" value="open daily chest">
        <span>Daily Chest Opened Today</span>
        <span>'.$btnIcon.'</span>
        </button>';
}
// ---END CHECK



  echo '</form>
  </div>';
 //	<button class="blueBG" type="submit" name="input1" value="view map">View Map</button>


