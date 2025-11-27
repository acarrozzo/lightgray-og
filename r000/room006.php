<?php
// -- 006 -- Grassy Field East
$roomname = "Grassy Field East / Basic Shop"; 
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc006'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // set danger level

include ('function-start.php'); 
//include ('shops/basic_shop.php');  



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



$dagger = $row['dagger'];
$mace = $row['mace'];
$broadsword = $row['broadsword'];
$longsword = $row['longsword'];
$basicstaff = $row['basicstaff'];
$buckler = $row['buckler'];
$kiteshield = $row['kiteshield'];
$basichood = $row['basichood'];
$paddedarmor = $row['paddedarmor'];
$blackgloves = $row['blackgloves'];
$blackboots = $row['blackboots'];
$redpotion = $row['redpotion'];
$bluepotion = $row['bluepotion'];

$pajamashamanFlag = $row['pajamashamanFlag'];






// ---------------------------------------------------------------------------------- // BASIC SHOP BUY FUNCTION
if($input=='buy dagger') 
{	if($currency<50) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a dagger for 50 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
	//	$query = $link->query("UPDATE $user SET dagger = dagger + 1"); 
	//	$query = $link->query("UPDATE $user SET currency = currency - 50"); 
		updateStats($link, $username, ['currency' => $currency - 50, 'dagger' => $dagger + 1]); // -- apply changes
		}
}
if($input=='buy mace') 
{	if($currency<400) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a mace for 400 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET mace = mace + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 400"); 
		updateStats($link, $username, ['currency' => $currency - 400, 'mace' => $mace + 1]); // -- apply changes
		}
}
if($input=='buy broad sword') 
{	if($currency<400) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a broad sword for 400 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET broadsword = broadsword + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 400"); 
		updateStats($link, $username, ['currency' => $currency - 400, 'broadsword' => $broadsword + 1]); // -- apply changes
		}
}
if($input=='buy long sword') 
{	if($currency<400) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a long sword for 400 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET longsword = longsword + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 400"); 
		updateStats($link, $username, ['currency' => $currency - 400, 'longsword' => $longsword + 1]); // -- apply changes
		}
}
if($input=='buy basic staff') 
{	if($currency<200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a basic staff for 200 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET basicstaff = basicstaff + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 200"); 
		updateStats($link, $username, ['currency' => $currency - 200, 'basicstaff' => $basicstaff + 1]); // -- apply changes
		}
}


if($input=='buy buckler') 
{	if($currency<200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a buckler for 200 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET buckler = buckler + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 200"); 
		updateStats($link, $username, ['currency' => $currency - 200, 'buckler' => $buckler + 1]); // -- apply changes
		}
}
if($input=='buy kite shield') 
{	if($currency<400) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a kite shield for 400 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET kiteshield = kiteshield + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 400"); 
		updateStats($link, $username, ['currency' => $currency - 400, 'kiteshield' => $kiteshield + 1]); // -- apply changes
		}
}
if($input=='buy basic hood') 
{	if($currency<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a basic hood for 500 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET basichood = basichood + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 500"); 
		updateStats($link, $username, ['currency' => $currency - 500, 'basichood' => $basichood + 1]); // -- apply changes
		}
}
if($input=='buy padded armor') 
{	if($currency<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy some padded armor for 500 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET paddedarmor = paddedarmor + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 500"); 
		updateStats($link, $username, ['currency' => $currency - 500, 'paddedarmor' => $paddedarmor + 1]); // -- apply changes
		}
}
if($input=='buy black gloves') 
{	if($currency<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy black gloves for 500 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET blackgloves = blackgloves + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 500"); 
		updateStats($link, $username, ['currency' => $currency - 500, 'blackgloves' => $blackgloves + 1]); // -- apply changes
		}
}
if($input=='buy black boots') 
{	if($currency<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy black boots for 500 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET blackboots = blackboots + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 500"); 
		updateStats($link, $username, ['currency' => $currency - 500, 'blackboots' => $blackboots + 1]); // -- apply changes
		}
}
if($input=='buy red potion') 
{	if($currency<100) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a red potion for 100 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET redpotion = redpotion + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 100"); 
		updateStats($link, $username, ['currency' => $currency - 100, 'redpotion' => $redpotion + 1]); // -- apply changes
		}
}
if($input=='buy blue potion') 
{	if($currency<200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a blue potion for 200 '.$_SESSION['currency'].'<br>';	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET bluepotion = bluepotion + 1"); 
		// $query = $link->query("UPDATE $user SET currency = currency - 200"); 
		updateStats($link, $username, ['currency' => $currency - 200, 'bluepotion' => $bluepotion + 1]); // -- apply changes
		}

} // --- END BASIC SHOP



// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'north') {   
	if ($pajamashamanFlag==0) {
        echo  $message = "<div class='menuAction'>
        The Pajama Shaman can teach you Magic! You can now learn the <em class='red'>FIREBALL</em> and <em class='green'>HEAL</em> spell!</span></div> ";
        include('update_feed.php'); // --- update feed
        updateStats($link, $_SESSION['username'],['pajamashamanFlag' => 1 ]); // -- update  
    } 
	$roomNum = '021';handleTravel($_SESSION['username'], $link, 'north', $roomNum, 'desc'.$roomNum.'');
} 
elseif ($input == 'east') {     
	if ($row['chest1'] <= 0){
		echo  $message="<i>You cannot travel to the east yet. You first need what is in the Gold Chest west of here. Help out the Young Soldier to get the Gold Key to open the Chest.</i><br>";	
		   include ('update_feed.php'); // --- update feed
		}
	else{
		$roomNum = '022';handleTravel($_SESSION['username'], $link, 'east', $roomNum, 'desc'.$roomNum.'');} 
	}
elseif ($input == 'south') {    $roomNum = '007';handleTravel($_SESSION['username'], $link, 'south', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'west') {     $roomNum = '001';handleTravel($_SESSION['username'], $link, 'west', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'southwest') { $roomNum = '002';handleTravel($_SESSION['username'], $link, 'southwest', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'northwest') { $roomNum = '005';handleTravel($_SESSION['username'], $link, 'northwest', $roomNum, 'desc'.$roomNum.'');} 

// -------------------------------------------------------------------------- TRAVEL
// if($input=='s' || $input=='south') 
// {
// echo 'You travel south<br>';
// 	$message="<i>You travel south</i><br>".$_SESSION['desc007'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '007'");// -- room change
// }
// if($input=='sw' || $input=='southwest') 
// {
// echo 'You travel southwest<br>';
// 	$message="<i>You travel southwest</i><br>".$_SESSION['desc002'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '002'");// -- room change
// }
// if($input=='nw' || $input=='northwest') 
// {
// echo 'You travel northwest<br>';
// 	$message="<i>You travel northwest</i><br>".$_SESSION['desc005'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '005'");// -- room change
// }

// else if($input=='w' || $input=='west') 
// {
// echo 'You travel west<br>';
//  $message="<i>You travel west</i><br>".$_SESSION['desc001'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '001'");// -- room change
// }
// else if($input=='e' || $input=='east') 
// {
// if ($row['chest1'] <= 0){
// 	echo  $message="<i>You cannot travel to the east yet. You first need what is in the Gold Chest west of here. Help out the Young Soldier to get the Gold Key to open the Chest.</i><br>";	
//    	include ('update_feed.php'); // --- update feed
// 	}
// else{
// echo 'You travel east<br>';
//  $message="<i>You travel east</i><br>".$_SESSION['desc022'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '022'");// -- room change
// }
// }
// else if($input=='n' || $input=='north') 
// {
// echo 'You travel north<br>';
//  $message="<i>You travel north</i><br>".$_SESSION['desc021'];
// 	include ('update_feed.php'); // --- update feed
// 	$results = $link->query("UPDATE $user SET room = '021'");// -- room change
// 	$results = $link->query("UPDATE $user SET pajamashamanFlag = 1");
// }

// ----------------------------------- end of room function
include('function-end.php');

?>
