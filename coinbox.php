<?php

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
    // Assign variables from the database
    $magicstrike = $row['magicstrike'];
    $magicmissile = $row['magicmissile'];
    $fireball = $row['fireball'];
    $poisondart = $row['poisondart'];
    $atomicblast = $row['atomicblast'];
    $recall = $row['recall'];

    $heal = $row['heal'];
    $regenerate = $row['regenerate'];
    $ironskin = $row['ironskin'];
    $wings = $row['wings'];
    $gills = $row['gills'];

    $purplepotion = $row['purplepotion'];
    $redpotion = $row['redpotion'];
    $bluepotion = $row['bluepotion'];
    $cookedmeat = $row['cookedmeat'];
    $rawmeat = $row['rawmeat'];
    $redberry = $row['redberry'];
    $blueberry = $row['blueberry'];

    $veggies = $row['veggies'];
    $meatball = $row['meatball'];
    $bluefish = $row['bluefish'];

    $redbalm = $row['redbalm'];
    $bluebalm = $row['bluebalm'];
    $purplebalm = $row['purplebalm'];

    $wingspotion = $row['wingspotion'];
    $gillspotion = $row['gillspotion'];
    $antidotepotion = $row['antidotepotion'];
    $coffee = $row['coffee'];
    $tea = $row['tea'];
    $reds = $row['reds'];
    $greens = $row['greens'];
    $blues = $row['blues'];
    $yellows = $row['yellows'];

    $currency = $row['currency'];
    $room = $row['room'];
    $endfight = $row['endfight'];
    $level = $row['level'];

    echo '<div>';
    echo '<span class="roomID">#' . $room . '</span> | ';

    // Danger level display
    // if ($endfight == 1) {
    //     echo $message;
    //     $stmt_update = $link->prepare("UPDATE users SET endfight = 2 WHERE username = ?");
    //     $stmt_update->bind_param("s", $_SESSION['username']);
    //     $stmt_update->execute();
    // } else
    if ($_SESSION['dangerLVL'] == 0) {
        echo '<span class="">no danger</span>';
    } 

    if ($endfight >= 1) {
        echo '<span class="green">danger LVL <span class="blue">' . $_SESSION['dangerLVL'] . '</span> <span class="green">SAFE</span></span>';
    } elseif ($_SESSION['dangerLVL'] >= ($level * 3)) {
        echo '<span class="">danger LVL <span class="black">' . $_SESSION['dangerLVL'] . '</span> <span class="black">SUICIDE!!!</span></span>';
    } elseif ($_SESSION['dangerLVL'] >= ($level * 2)) {
        echo '<span class="">danger LVL <span class="black">' . $_SESSION['dangerLVL'] . '</span> <span class="black">INSANE!!</span></span>';
    } elseif ($_SESSION['dangerLVL'] >= ($level * 1.5)) {
        echo '<span class="">danger LVL <span class="darkred">' . $_SESSION['dangerLVL'] . '</span> <span class="darkred">VERY HIGH!</span></span>';
    } elseif ($_SESSION['dangerLVL'] > $level) {
        echo '<span class="">danger LVL <span class="red">' . $_SESSION['dangerLVL'] . '</span> <span class="red">HIGH</span></span>';
    } elseif ($_SESSION['dangerLVL'] == $level) {
        echo '<span class="">danger LVL <span class="red">' . $_SESSION['dangerLVL'] . '</span> <span class="gold">EVEN MATCH!</span></span>';
    } elseif ($_SESSION['dangerLVL'] >= ($level / 1.25)) {
        echo '<span class="">danger LVL <span class="orange">' . $_SESSION['dangerLVL'] . '</span> <span class="orange">AVG</span></span>';
    } elseif ($_SESSION['dangerLVL'] >= ($level / 1.5)) {
        echo '<span class="">danger LVL <span class="gold">' . $_SESSION['dangerLVL'] . '</span> <span class="gold">AVG</span></span>';
    } elseif ($_SESSION['dangerLVL'] >= ($level / 2)) {
        echo '<span class="">danger LVL <span class="yellow">' . $_SESSION['dangerLVL'] . '</span> <span class="yellow">LOW</span></span>';
    } elseif ($_SESSION['dangerLVL'] >= ($level / 3)) {
        echo '<span class="">danger LVL <span class="yellowgreen">' . $_SESSION['dangerLVL'] . '</span> <span class="yellowgreen">VERY LOW</span></span>';
    } elseif ($_SESSION['dangerLVL'] < ($level / 3)) {
        echo '<span class="">danger LVL <span class="green">' . $_SESSION['dangerLVL'] . '</span> <span class="green">SUPER EZ</span></span>';
    } else {
        echo '<span class="">danger LVL <span class="gold">' . $_SESSION['dangerLVL'] . '</span> <span class="gold">LAST? check hud</span></span>';
    }

    echo ' | ';

    // CP, SP, and currency display
    if ($row['cp'] > 1) {
        echo '<br><span class="btn goldBG" data-link="stats"> Spend Points</span> ';
    }
    echo '<span class="">CP</span> ';
    echo '<strong class="' . ($row['cp'] > 0 ? 'gold' : '') . '"> ' . $row['cp'] . '</strong> ';

    if ($row['sp'] > 20) {
        echo '<br>
        <span class="btn purpleBG" data-link2="skills"> Buy Skills </span>
        <span class="btn purpleBG" data-link2="spells"> Buy Spells </span>';
    }
    echo ' <span class="">SP</span> ';
    echo '<strong class="' . ($row['sp'] >= 15 ? 'purple' : '') . '">' . $row['sp'] . '</strong> ';

    echo ' | ';
    echo '<span class="">' . $_SESSION['currency'] . '</span>';
    $currencyorig = $currency;
    if ($currency > 10000000) {
        $currency = floor($currency / 1000000);
        echo '<strong class="cyan"> ' . $currency . 'm</strong>';
    } elseif ($currency > 10000) {
        $currency = floor($currency / 1000);
        echo '<strong class="yellow"> ' . $currency . 'k </strong>';
    } else {
        echo '<strong class="gold"> ' . $currency . '</strong>';
    }

    if ($row['goldkey']==1) {
        echo ' <p class=" yellow"> You have '.$row['goldkey'].' gold key!</p> ';
    }
    if ($row['goldkey']>1) {
        echo ' <p class=" yellow"> You have '.$row['goldkey'].' gold keys!</p> ';
    }
    echo '</div>';

    // Wooden boat logic
    if ($row['equipMount'] != 'wooden boat' && $row['MOUNTwoodenboat'] > 0 &&
        in_array($room, [16, 401, 402, 403, 404, 405, 406, 407, 408, 409, 410, 411, 412, 413, 414, 415, 416, 417, 418, 419, 420, 421, 422, 423, 424, 426])) {
        echo '<div><input class="brownBG" type="submit" name="input1" value="use wooden boat" /> </div>';
    }
} // END WHILE
?>
