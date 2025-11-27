<?php
// --------------------------------------------------------------------------------- TRAINING TAB
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


    // ---------------------------------------------------------------------------------- // START VARIABLES
    // ---------------------------------------------------------------------------------- // START VARIABLES
    // ---------------------------------------------------------------------------------- // START VARIABLES
    $level = $row['level'];
    $xp = $row['xp'];
    $hp = $row['hpmax'];
    $mp = $row['mpmax'];
    $cp = $row['cp'];
    $tp = $row['tp'];
    $sp = $row['sp'];

    $currency = $row['currency'];
    $toopoor = $_SESSION['toopoor'];
    $notenoughtp = $_SESSION['notenoughtp'];
  //  $notenoughsp = $_SESSION['notenoughsp'];


    echo'<h3 class="spCount white">TP <span class="yellow">'.$tp.'</span></h3>';
    echo'<div class="gbox skills-spells">';

    echo'  <h1>Training</h1>';
    echo '<p class="gray">Use TP to increase your training. Physical and Mental Training should be your top priority.</p>';

    // ---------------------------------------------------------------------------------- Physical Training
 //   $stat=$button=$zeroskill=$cost=$maxcolor='';


    echo '<div class="gslice">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/strong.svg").'</span>
          <h4 class="inline">Physical Training</h4>
          <h2 class="inline"><span class="red">'.$row['physicaltraining'].'</span></h2>
          <div>';

            if ($tp>=1) {
            echo '<button type="submit" class="redBG" name="input1" value="learn physical training">+1 Physical Training</button>';
            }
            if ($tp>=2) {
            echo ' <button type="submit" class="redBG" name="input1" value="learn physical training 2">+2 Physical Training</button>';
            }
            if ($tp>=5) {
            echo ' <button type="submit" class="redBG" name="input1" value="learn physical training 5">+5 Physical Training</button>';
            }
            echo '
            </div>
            <p class="gray">Increases your HIT POINTS by 10 for each training level.</p>
            <p class="gray">Increases the amount of HP you gain when you level.</p>
            <p class="gray">Increases the amount of HP you replenish when you rest.</p>
            <p>Hit Points: <span class="red">'.$row['hp'].'/'.$row['hpmax'].'</span></p>
            ';
        echo '</div>';

    // ---------------------------------------------------------------------------------- Mental Training
    echo '<div class="gslice">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/smart.svg").'</span>
          <h4 class="inline">Mental Training</h4>
          <h2 class="inline"><span class="blue">'.$row['mentaltraining'].'</span></h2>
          <div>';
            if ($tp>=1) {
            echo '<button type="submit" class="blueBG" name="input1" value="learn mental training">+1 Mental Training</button>';
            }
            if ($tp>=2) {
            echo ' <button type="submit" class="blueBG" name="input1" value="learn mental training 2">+2 Mental Training</button>';
            }
            if ($tp>=5) {
            echo ' <button type="submit" class="blueBG" name="input1" value="learn mental training 5">+5 Mental Training</button>';
            }
            echo '
            </div>
            <p class="gray">Increases your MAGIC POINTS by 10 for each training level.</p>
            <p class="gray">Increases the amount of MP you gain when you level.</p>
            <p class="gray">Increases the amount of MP you replenish when you rest.</p>
            <p>Magic Points: <span class="blue">'.$row['mp'].'/'.$row['mpmax'].'</span></p>
            ';
        echo '</div>';
// }
