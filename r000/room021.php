<?php
$roomname = "Pajama Shaman";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc021'];

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

$pajamashamanFlag = $row['pajamashamanFlag'];
$flail = $row['flail'];
$morningstar = $row['morningstar'];
$gladius = $row['gladius'];
$battleaxe = $row['battleaxe'];
$warhammer = $row['warhammer'];
$claymore = $row['claymore'];
$longbow = $row['longbow'];
$arrows = $row['arrows'];
$pajamas = $row['pajamas'];
$slippers = $row['slippers'];


// ---------------------------------------------------------------------------------- // PAJAMA SHAMAN BUY FUNCTION
if($input=='buy flail') 
{	if($currency<1200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a flail for 1200 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET flail = flail + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 1200"); 
		updateStats($link, $username, ['currency' => $currency - 1200, 'flail' => $flail + 1]); // -- apply changes
		}
}
if($input=='buy morning star') 
{	if($currency<1200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a morning star for 1200 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET morningstar = morningstar + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 1200"); 
		updateStats($link, $username, ['currency' => $currency - 1200, 'morningstar' => $morningstar + 1]); // -- apply changes
		}
}
if($input=='buy gladius') 
{	if($currency<3000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a gladius for 3000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET gladius = gladius + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 3000"); 
		updateStats($link, $username, ['currency' => $currency - 3000, 'gladius' => $gladius + 1]); // -- apply changes
		}
}
if($input=='buy battle axe') 
{	if($currency<800) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a battle axe for 800 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET battleaxe = battleaxe + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 800");
		updateStats($link, $username, ['currency' => $currency - 800, 'battleaxe' => $battleaxe + 1]); // -- apply changes 
		}
}
if($input=='buy warhammer') 
{	if($currency<900) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a warhammer for 900 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET warhammer = warhammer + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 900"); 
		updateStats($link, $username, ['currency' => $currency - 900, 'warhammer' => $warhammer + 1]); // -- apply changes 
		}
}
if($input=='buy claymore') 
{	if($currency<5000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a claymore for 5000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET claymore = claymore + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 5000"); 
		updateStats($link, $username, ['currency' => $currency - 5000, 'claymore' => $claymore + 1]); // -- apply changes 
		}
}
if($input=='buy long bow') 
{	if($currency<1500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a long bow for 1500 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET longbow = longbow + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 1500"); 
		updateStats($link, $username, ['currency' => $currency - 1500, 'longbow' => $longbow + 1]); // -- apply changes 
		}
}
if($input=='buy arrows') 
{	if($currency<1000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy 100 arrows for 1000 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET arrows = arrows + 100"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 1000"); 
		updateStats($link, $username, ['currency' => $currency - 1000, 'arrows' => $arrows + 100]); // -- apply changes 
		}
}

if($input=='buy pajamas') 
{	if($currency<700) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy pajamas for 700 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET pajamas = pajamas + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 700"); 
		updateStats($link, $username, ['currency' => $currency - 700, 'pajamas' => $pajamas + 1]); // -- apply changes 
		}
}
if($input=='buy slippers') 
{	if($currency<700) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy slippers for 700 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET slippers = slippers + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 700"); 
		updateStats($link, $username, ['currency' => $currency - 700, 'slippers' => $slippers + 1]); // -- apply changes 
		}
}


// ---------------------- SPELL FLAG! ---------------------- 
if ($pajamashamanFlag==0) {
echo  $message = "<div class='menuAction'>The Pajama Shaman gives you a crash course in Magic! You can now learn the <em class='blue'>Magic Missile</em>, <em class='red'>FIREBALL</em> and <em class='green'>HEAL</em> spells!</span></div> ";
include ('update_feed.php'); // --- update feed
//$results = $link->query("UPDATE $user SET pajamashamanFlag = 1");
updateStats($link, $username, ['pajamashamanFlag' => 1]); // --- update stat
}
//else {$results = $link->query("UPDATE $user SET pajamashamanFlag = 0");}



// -------------------------------------------------------------------------- READ SKILL SIGN!
if($input=='read sign') {  //read sign
	echo '<i>You read the Pajama Shaman Sign</i> <br>  ';
	$message="
	<i>you read the sign:</i>   
	<div class='sign'>
	<h3>SKILLS</h3>
	<form id='mainForm' method='post' action='' name='formInput'>
	<span class='hilight'>You gain SP every time you level.</span> <br>
	Use SP to learn skills and spells.<br>
	---------------------------------------------------<br>
	<span class='hilight'>Physical Training and Mental Training are important.</span><br>
	Physical Training increases the amount of Hit Points you gain when you level. The same goes for Mental Training and Mana Points. For this reason it is advised to learn as early as possible.<br>
	---------------------------------------------------<br>
	<span class='hilight'>Rest up $username!</span> <br>
	When you rest you will restore lost HP and MP. The amount you restore is determined by your Physical Training and Mental Training skill.<br>
	</form>
	</div>";
	include ('update_feed.php'); // --- update feed	
}



// // -------------------------------------------------------------------------- TRAVEL
// if($input=='w' || $input=='west') 
// {	echo 'You travel west<br>';
//  	$message="<i>You travel west</i><br>".$_SESSION['desc005'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '005'"); // -- room change
// }
// else if($input=='sw' || $input=='southwest') 
// {	echo 'You travel southwest<br>';
//  	$message="<i>You travel southwest</i><br>".$_SESSION['desc001'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '001'"); // -- room change
// }
// else if($input=='s' || $input=='south') 
// {	echo 'You travel south<br>';
//  	$message="<i>You travel south</i><br>".$_SESSION['desc006'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '006'"); // -- room change
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'south') {    $roomNum = '006';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'west') {     $roomNum = '005';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'southwest') { $roomNum = '001';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');} 


// ----------------------------------- end of room function
include('function-end.php');

?>
