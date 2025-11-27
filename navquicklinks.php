
<?php


echo'<div class="navquicklinks hide-on-mobile">'; // NAV QUICK LINKS

include('stats-quick.php'); // QUICK STATS AND MAX BUTTONS!



echo'<div class="dgray">';
echo'<span class="">PT </span><span class="red ">'.$physicaltraining.'</span> ' ;
echo'<span class="">MT </span><span class="blue ">'.$mentaltraining.'</span> ' ;
echo ' |  ';

if ($row['tp']>0) {
    echo'<span class="">TP</span> ';
    echo '<span class=" gold"> '.$row['tp'].'</span> ';
    echo'<a class="gold" href="" data-link2="training">Training &gt;</a>';
} else {
    echo'<span class="lgray" href="" data-link2="training">Training</span>';

   // echo'<span class=" gray"> '.$row['tp'].'</span> ';
}
echo '</div>' ;

echo'<div class="dgray">';

if ($row['sp']>0) {
    echo '<span class="dgray">SP </span> ';
    echo'<span class=" purple"> '.$row['sp'].'</span> ';
    echo ' | ';
    echo '<a class="purple" href="" data-link2="skills">Skills &gt;</a> | <a class="purple" href="" data-link2="spells">Spells &gt;</a>';
} else {
    echo '<span class="">SP </span> ';
    echo'<span class=" purple"> '.$row['sp'].'</span> ';
    echo ' | ';
    echo '<a class="lgray" href="" data-link2="skills">Skills</a> | <a class="lgray" href="" data-link2="spells">Spells</a>';
}
echo '</div>';

/*
    $currencyorig = $currency;
    if ($currency > 10000000) {
        $currency = $currency / 1000000;
        $currency = floor($currency);
        echo '<span class="white ">'.$currency.'m</span> <span class="gray"> ['.$currencyorig.']</span>' ;
    } elseif ($currency > 10000) {
        $currency = $currency / 1000;
        $currency = floor($currency);
        echo '<span class="yellow ">'.$currency.'k </span> <span class="gray"> ['.$currencyorig.']</span>' ;
    } else {
        echo '<span class="gold ">'.$currency.'</span> ' ;
    }

*/






// --- CURRENT EQUIPPED WEAPON
echo '<div class="dgray"> ';
echo ' <span class=" gold"> '.$row['equipR'].'</span> ';
echo ' | <a class="green" href="" data-link2="inv">Weapons ></a>';

echo '</div> ';

echo '<div class="dgray"> ';

echo ' <span class=" gold"> '.$row['equipHead'].'</span> ';
echo ' | <a class="green" href="" data-link2="armor">Armor ></a>';
echo '</div> ';

echo '<div class="">';

// ---- CURRENCY COIN
//echo '<div class="">';
//echo '</div>' ;

//  echo' <span class="dgray">'.$currency.'</span>';
//echo' <span class="gold"> currency </span> ';
$currencyorig = $currency;
if ($currency > 1000000) {
    $currency = $currency / 1000000;
 //   $currency = floor($currency);
    echo '<span class="cyan"> '.$currency.'m '.$_SESSION['currency'].'</span>' ;
} 
// elseif ($currency > 1000) {
//     $currency = $currency / 1000;
//  //   $currency = floor($currency);
//     echo '<strong class="yellow"> '.$currency.'k </strong>' ;
// } 
else {
    echo '<span class="gold"> '.$currency.' '.$_SESSION['currency'].'</span>' ;
}




// <span class=""> ['.$currencyorig.']</span>

if ($row['goldkey']==1) {
    echo ' |  ';
    echo ' <span class=" yellow"> You have '.$row['goldkey'].' gold key!</span> ';
}
if ($row['goldkey']>1) {
    echo ' |  ';
    echo ' <span class=" yellow"> You have '.$row['goldkey'].' gold keys!</span> ';
}
echo '</div>';




echo '<div class="dgray"> ';

echo'<span class="roomID ">room'.$roomID.'</span> | ';

if ($endfight>=1) {
    echo '	<span class="  blue">danger lvl <span class="blue">'.$_SESSION['dangerLVL'].'</span> <span class="green">SAFE</span></span>';
} elseif ($_SESSION['dangerLVL'] == 0) { //no danger
    echo '	<span class=" ">danger lvl <span class="green">None</span></span>';
} elseif ($_SESSION['dangerLVL'] >= ($level*3)) { 		//10 			/30
    echo '	<span class=" ">danger lvl <span class="black">'.$_SESSION['dangerLVL'].'</span> <span class="black">SUICIDE!!! </span></span>';
} elseif ($_SESSION['dangerLVL'] >= ($level*2)) { 		//10 			/20
    echo '	<span class=" ">danger lvl <span class="black">'.$_SESSION['dangerLVL'].'</span>  <span class="black">INSANE!! </span></span>';
} elseif ($_SESSION['dangerLVL'] >= ($level*(1.5))) { 		//10 			/15
    echo '	<span class=" ">danger lvl <span class="darkred">'.$_SESSION['dangerLVL'].'</span>  <span class="darkred">VERY HIGH! </span></span>';
} elseif ($_SESSION['dangerLVL'] > $level) {		//10  // 10
    echo '	<span class=" ">danger lvl <span class="red">'.$_SESSION['dangerLVL'].'</span>  <span class="red">HIGH </span></span>';
} elseif ($_SESSION['dangerLVL'] == $level) {		//10  // 10
    echo '	<span class=" ">danger lvl <span class="red">'.$_SESSION['dangerLVL'].'</span>  <span class="gold">EVEN MATCH! </span></span>';
} elseif ($_SESSION['dangerLVL'] >= ($level/(1.25))) { //10  // 8
    echo '	<span class=" ">danger lvl <span class="orange">'.$_SESSION['dangerLVL'].'</span>  <span class="orange">AVG</span></span>';
} elseif ($_SESSION['dangerLVL'] >= ($level/(1.5))) { //10  // 6.666
    echo '	<span class=" ">danger lvl <span class="gold">'.$_SESSION['dangerLVL'].'</span> <span class="gold">AVG </span></span>';
} elseif ($_SESSION['dangerLVL'] >= ($level/2)) { //10  // 5
    echo '	<span class=" ">danger lvl <span class="yellow">'.$_SESSION['dangerLVL'].'</span> <span class="yellow">LOW</span></span>';
} elseif ($_SESSION['dangerLVL'] >= ($level/3)) { //10  // 3.333
    echo '	<span class=" ">danger lvl <span class="yellowgreen">'.$_SESSION['dangerLVL'].'</span>  <span class="yellowgreen">VERY LOW</span></span>';
} elseif ($_SESSION['dangerLVL'] < ($level/3)) { //10  // 3.333
    echo '	<span class=" ">danger lvl <span class="green">'.$_SESSION['dangerLVL'].'</span>  <span class="green">SUPER EZ</span></span>';
} else {
    echo '	<span class=" ">danger lvl <span class="gold">'.$_SESSION['dangerLVL'].'</span>  <span class="gold"> LAST? check hud</span></span>';
}
echo'</div>';

echo '</div>'; // END NAV QUICK LINKS

?>

