<?php
// session_start();

require_once('db-connect.php'); // Ensure this connects to your database

// // Validate session username
// if (!isset($_SESSION['username']) || !is_string($_SESSION['username']) || empty(trim($_SESSION['username']))) {
//     header("Location: login.php");
//     exit;
// }

// $username = $_SESSION['username'];



// // Fetch users data from the `users` table
// $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
// if (!$stmt) {
//     die('Prepare failed: ' . $link->error);
// }
// $stmt->bind_param("s", $username);
// $stmt->execute();
// $result = $stmt->get_result();

// if ($result->num_rows === 0) {
//     header("Location: login.php");
//     exit;
// }

// $row = $result->fetch_assoc();


$row = getUserData($link, $_SESSION['username']); // --- gets all user data from database 


// ----------------------------------------------- cancels fight if logging in
if ($_SESSION['freshlogin'] == 1) {
    if ($row['infight'] == 1) {
      $message = "<i>You were in a fight, but you logged out and back in. The enemy got bored and left.</i>";
      include ('update_feed.php'); // --- update feed
  
      $updates = [ // -- set changes
        'endfight' => 1,
        'infight' => 0
      ]; 
      updateStats($link, $username, $updates); // -- apply changes
    }
    $_SESSION['freshlogin'] = 0;
  } // END FRESH LOGIN







// Assign session variables
$_SESSION['roomID'] = $roomID = $row['room'];
$_SESSION['chest1'] = $row['chest1']; // Prevent first login error

// Assign spell variables
$weapontype = $row['weapontype'];
$magicstrike = $row['magicstrike'];
$slice = $row['slice'];
$smash = $row['smash'];
$aim = $row['aim'];
$heal = $row['heal'];
$regenerate = $row['regenerate'];
$ironskin = $row['ironskin'];
$fireball = $row['fireball'];
$magicmissile = $row['magicmissile'];
$poisondart = $row['poisondart'];
$atomicblast = $row['atomicblast'];
$magicarmor = $row['magicarmor'];

// Spell costs for buttons
$slice_cost_cast = $row['slice'];
$smash_cost_cast = $row['smash'];
$aim_cost_cast = $row['aim'];
$magicstrike_cost_cast = $row['magicstrike'] * 2;
$magicmissile_cost_cast = $row['magicmissile'] * 2;
$fireball_cost_cast = 5 + ($row['fireball'] * 2);
$poisondart_cost_cast = 5 + ($row['poisondart'] * 3);
$atomicblast_cost_cast = 100 * $row['atomicblast'] + $row['magmod'];
$wings_cost_cast = $row['wings'] * 10;
$gills_cost_cast = $row['gills'] * 10;
$heal_cost_cast = $row['heal'] * 2;
$regenerate_cost_cast = 20 * $row['regenerate'];
$magicarmor_cost_cast = 10 * $row['magicarmor'];
$ironskin_cost_cast = 10 * $row['ironskin'];

// Reset room variables
$dirN = $dirNE = $dirE = $dirSE = $dirS = $dirSW = $dirW = $dirNW = $dirU = $dirD = '';

// Dynamically include room files
$roomFile = sprintf('r%03d/room%03s.php', floor(intval($roomID) / 100) * 100, str_pad($roomID, 3, '0', STR_PAD_LEFT));
if (file_exists($roomFile)) {
    include($roomFile);
} else {
    echo "Room file not found for room ID: $roomID";
}


?>
