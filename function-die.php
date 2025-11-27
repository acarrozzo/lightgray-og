<?php
// --------- Die Function

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
		$hp=$row['hp'];
		$hpmax=$row['hpmax'];   
		$room=$row['room'];
		$deaths=$row['deaths'];
	
		//$icon = file_get_contents("img/svg/warcraft.svg");
		$icon = file_get_contents("img/svg/skull.svg");

if ($hp <= 0 && $room != '0')
{
echo 'HP < 0 = DEAD!';
$message="
<span class='icon dead big'>$icon</span>

<h2 class='dead'>HP < 0 = DEAD!</h2>
<p>Well it happens to the best of us.</p>
<p>When your health gets low make sure to heal yourself by drinking a red potion, eating some cooked meat, casting a heal spell, etc.</p>
<p class='gold'>Your health has been replenished and you have been teleported back to the Grassy Field. </p>
<p>Godspeed.</p>";//.$_SESSION['desc001'];
include ('update_feed_alt.php'); // --- update feed

// $results = $link->query("UPDATE $user SET room = '001'"); // ROOM CHANGE
// $results = $link->query("UPDATE $user SET hp = $hpmax");
// $results = $link->query("UPDATE $user SET mp = $mpmax");
// $results = $link->query("UPDATE $user SET deaths = deaths + 1");
// $results = $link->query("UPDATE $user SET endfight = 0"); // End fight 
// $results = $link->query("UPDATE $user SET infight = 0"); // End Fight

$updates = [ // --- set changes
	'room' => '001', 
	'hp' => $hpmax, 
	'mp' => $mpmax, 
	'deaths' => $deaths + 1, 
	'infight' => 0, 
	'endfight' => 0
];  
updateStats($link, $username, $updates); // -- apply changes



$_SESSION['magicarmor_amount'] = 0;   		// reset most buffs
$_SESSION['ironskin_amount'] = 0;
$_SESSION['ironskin_clicks'] = 0;

$_SESSION['flying'] = 0;
$_SESSION['breathingwater'] = 0;

$_SESSION['reds'] = 0;
$_SESSION['greens'] = 0;
$_SESSION['blues'] = 0;
$_SESSION['yellows'] = 0;

$_SESSION['coffee'] = 0;
$_SESSION['tea'] = 0;

$_SESSION['poison'] = 0;
$_SESSION['poisonyou'] = 0;
$_SESSION['poisonimmune'] = 0;
$_SESSION['bleeding'] = 0;

$_SESSION['magicarmor'] = 0;
$_SESSION['regenerate_clicks'] =0;



}

?>