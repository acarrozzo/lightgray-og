<?php
						$roomname = "Michael's Weapon Shop";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc227'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1"; // danger level

include ('function-start.php'); 

// // -------------------------DB CONNECT!
// include ('db-connect.php');  
// // -------------------------DB QUERY!
// $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
// $stmt->bind_param("s", $_SESSION['username']);
// $stmt->execute();
// $result = $stmt->get_result();
// if (!$result) {
//     die('There was an error running the query [' . $link->error . ']');
// }
// // -------------------------DB OUTPUT!
// while($row = $result->fetch_assoc()){

$row = getUserData($link, $_SESSION['username']); // --- gets all user data from database   

// include ('battle-sets/thief.php');


$gladius = $row['gladius'];
$threechainedflail = $row['threechainedflail'];
$giantclub = $row['giantclub'];
$greatwhitesword = $row['greatwhitesword'];
$guardianblade = $row['guardianblade'];
$claymore = $row['claymore'];
$polearm = $row['polearm'];
$bonecudgel = $row['bonecudgel'];
$hammerheadhammer = $row['hammerheadhammer'];
$humongousbattleaxe = $row['humongousbattleaxe'];
$handcrossbow = $row['handcrossbow'];
$compoundcrossbow = $row['compoundcrossbow'];
$blackcrossbow = $row['blackcrossbow'];
$offhanddagger = $row['offhanddagger'];
$offhandsword = $row['offhandsword'];
$offhandmace = $row['offhandmace'];

if($input=='buy gladius') 
{	
	$tempCOST = $_SESSION['COSTgladius'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a gladius for '.$tempCOST.' '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET gladius = gladius + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		updateStats($link, $username, ['currency' => $currency - $tempCOST, 'gladius' => $gladius + 1]); // -- apply changes
		}
}
if($input=='buy three-chained flail') 
{	
	$tempCOST = $_SESSION['COSTthreechainedflail'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a three-chained flail for '.$tempCOST.' '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET threechainedflail = threechainedflail + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		updateStats($link, $username, ['currency' => $currency - $tempCOST, 'threechainedflail' => $threechainedflail + 1]); // -- apply changes
		}
}
if($input=='buy giant club') 
{	
	$tempCOST = $_SESSION['COSTgiantclub'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a giant club for '.$tempCOST.' '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET giantclub = giantclub + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		updateStats($link, $username, ['currency' => $currency - $tempCOST, 'giantclub' => $giantclub + 1]); // -- apply changes
		}
}
if($input=='buy great white sword') 
{	
	$tempCOST = $_SESSION['COSTgreatwhitesword'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a great white sword for '.$tempCOST.' '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET greatwhitesword = greatwhitesword + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		updateStats($link, $username, ['currency' => $currency - $tempCOST, 'greatwhitesword' => $greatwhitesword + 1]); // -- apply changes
		}
}
if($input=='buy guardian blade') 
{	
	$tempCOST = $_SESSION['COSTguardianblade'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a guardian blade for '.$tempCOST.' '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET guardianblade = guardianblade + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		updateStats($link, $username, ['currency' => $currency - $tempCOST, 'guardianblade' => $guardianblade + 1]); // -- apply changes
		}
}

if($input=='buy claymore') 
{	
	$tempCOST = $_SESSION['COSTclaymore'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a claymore for '.$tempCOST.' '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET claymore = claymore + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		updateStats($link, $username, ['currency' => $currency - $tempCOST, 'claymore' => $claymore + 1]); // -- apply changes
		}
}
if($input=='buy polearm') 
{	
	$tempCOST = $_SESSION['COSTpolearm'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a polearm for '.$tempCOST.' '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET polearm = polearm + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		updateStats($link, $username, ['currency' => $currency - $tempCOST, 'polearm' => $polearm + 1]); // -- apply changes
		}
}
if($input=='buy bone cudgel') 
{	
	$tempCOST = $_SESSION['COSTbonecudgel'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a bone cudgel for '.$tempCOST.' '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET bonecudgel = bonecudgel + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		updateStats($link, $username, ['currency' => $currency - $tempCOST, 'bonecudgel' => $bonecudgel + 1]); // -- apply changes
		}
}
if($input=='buy hammer headhammer') 
{	
	$tempCOST = $_SESSION['COSThammerheadhammer'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a hammer headhammer for '.$tempCOST.' '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET hammerheadhammer = hammerheadhammer + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		updateStats($link, $username, ['currency' => $currency - $tempCOST, 'hammerheadhammer' => $hammerheadhammer + 1]); // -- apply changes
		}
}
if($input=='buy humongous battleaxe') 
{	
	$tempCOST = $_SESSION['COSThumongousbattleaxe'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a humongous battleaxe for '.$tempCOST.' '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET humongousbattleaxe = humongousbattleaxe + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		updateStats($link, $username, ['currency' => $currency - $tempCOST, 'humongousbattleaxe' => $humongousbattleaxe + 1]); // -- apply changes
		}
}
if($input=='buy hand crossbow') 
{	
	$tempCOST = $_SESSION['COSThandcrossbow'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a hand crossbow for '.$tempCOST.' '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET handcrossbow = handcrossbow + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		updateStats($link, $username, ['currency' => $currency - $tempCOST, 'handcrossbow' => $handcrossbow + 1]); // -- apply changes
		}
}
if($input=='buy compound crossbow') 
{	
	$tempCOST = $_SESSION['COSTcompoundcrossbow'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a compound crossbow for '.$tempCOST.' '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET compoundcrossbow = compoundcrossbow + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		updateStats($link, $username, ['currency' => $currency - $tempCOST, 'compoundcrossbow' => $compoundcrossbow + 1]); // -- apply changes
		}
}
if($input=='buy black crossbow') 
{	
	$tempCOST = $_SESSION['COSTblackcrossbow'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a black crossbow for '.$tempCOST.' '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET blackcrossbow = blackcrossbow + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		updateStats($link, $username, ['currency' => $currency - $tempCOST, 'blackcrossbow' => $blackcrossbow + 1]); // -- apply changes 
		}
}

if($input=='buy off hand dagger') 
{	
	$tempCOST = $_SESSION['COSToffhanddagger'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a off hand dagger for '.$tempCOST.' '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET offhanddagger = offhanddagger + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		updateStats($link, $username, ['currency' => $currency - $tempCOST, 'offhanddagger' => $offhanddagger + 1]); // -- apply changes
		}
}
if($input=='buy off hand sword') 
{	
	$tempCOST = $_SESSION['COSToffhandsword'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a off hand sword for '.$tempCOST.' '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET offhandsword = offhandsword + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		updateStats($link, $username, ['currency' => $currency - $tempCOST, 'offhandsword' => $offhandsword + 1]); // -- apply changes
		}
}
if($input=='buy off hand mace') 
{	
	$tempCOST = $_SESSION['COSToffhandmace'] ;
	if($currency<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a off hand mace for '.$tempCOST.' '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET offhandmace = offhandmace + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		updateStats($link, $username, ['currency' => $currency - $tempCOST, 'offhandmace' => $offhandmace + 1]); // -- apply changes
		}
}





// -------------------------------------------------------------------------- Battle TRAVEL
if ((	$input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='east' || $input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' || $input=='down' )  && $infight >= 1) {
	echo 'You cannot leave the room in the middle of battle!<br>';
   	$message="<i>You cannot leave the room in the middle of battle!</i><br>";
	include ('update_feed.php'); // --- update feed
	}

// -------------------------------------------------------------------------- TRAVEL
// else if($input=='ne' || $input=='northeast') 
// {	echo 'You travel northeast<br>';
//    $message="<i>You travel northeast</i><br>".$_SESSION['desc210'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 210"); // -- room change
// }


// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'northeast') { $roomNum = '210';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');}





// ----------------------------------- end of room function
include('function-end.php');
// }
?>
