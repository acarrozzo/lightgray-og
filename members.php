<?php
// session_start();
require_once('db-connect.php'); // Ensure this connects to your database

// Validate session username
if (!isset($_SESSION['username']) || !is_string($_SESSION['username']) || empty(trim($_SESSION['username']))) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];


// Fetch user data from the `users` table
$stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
if (!$stmt) {
    die('Prepare failed: ' . $link->error);
}
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: login.php");
    exit;
}

$row = $result->fetch_assoc();

echo "<p>Beep boop! Logging in members...</p>";

// Verify session password (if applicable)
if (!password_verify($_SESSION['pass'], $row['password'])) {
 //   header("Location: login.php");
  //  exit;
}

// Display user information
echo '<h5>You are logged in as </h5> <h2 class="blue">' . htmlspecialchars($username) . '</h2>';
echo '<a class="btn greenBG" href="index.php">Click here to start the game</a>';

// Send login notification email (optional)
$adminEmail = "acarrozzo@gmail.com"; // Replace with a configurable value
$subject = "LG User Login: $username";
$message = "A new login has been detected for the user: $username.";
mail($adminEmail, $subject, $message);

// Initialize session variables
$_SESSION['command'] = '<span class="green command">Member loaded</span>
<form id="mainForm" method="post" action="" name="formInput">
<button class="blueBG" type="submit" name="input1" value="look">Look Around</button>
</form>';
$_SESSION['notcommand'] = 'Command not recognized - ';
$_SESSION['currency'] = 'gold';
$_SESSION['quest'] = 'Quest';
$_SESSION['toopoor'] = 'You\'re too poor.';
$_SESSION['roomID'] = 0;
$_SESSION['lastroom'] = 0;
$_SESSION['retreatroom'] = 0;
$_SESSION['selectmap'] = 0;
$_SESSION['eLvl'] = 0;

// Additional session variables (optional)
$_SESSION['hints'] = 2;
$_SESSION['emptytree'] = 0;
$_SESSION['bow_equipped'] = 0;
$_SESSION['crossbowbow_equipped'] = 0;
$_SESSION['multi_hit'] = 0;
$_SESSION['healthregen'] = 0;
$_SESSION['manaregen'] = 0;
$_SESSION['flying'] = 0;
$_SESSION['breathingwater'] = 0;
$_SESSION['magiccast'] = 0;
$_SESSION['magicarmor_amount'] = 0;
$_SESSION['ironskin_amount'] = 0;
$_SESSION['ironskin_clicks'] = 0;
$_SESSION['magicarmor'] = 0;
$_SESSION['regenerate_clicks'] = 0;
$_SESSION['coffee'] = 0;
$_SESSION['tea'] = 0;
$_SESSION['reds'] = 0;
$_SESSION['greens'] = 0;
$_SESSION['blues'] = 0;
$_SESSION['yellows'] = 0;
$_SESSION['poison'] = 0;
$_SESSION['poisonyou'] = 0;
$_SESSION['poisonimmune'] = 0;
$_SESSION['bleeding'] = 0;

// Room flags
$_SESSION['graychest'] = 0;
$_SESSION['silverchest'] = 0;
$_SESSION['scorpionswitch'] = 0;
$_SESSION['goblinsearch'] = 0;
$_SESSION['cowtoll'] = 0;
$_SESSION['ogresearch'] = 0;
$_SESSION['koboldswitch'] = 0;
$_SESSION['forestsearch'] = 0;
$_SESSION['grottoswitch'] = 0;
$_SESSION['shadysearch'] = 0;
$_SESSION['robfarmsearch'] = 0;
$_SESSION['underwaterswitch'] = 0;
$_SESSION['darkforestsearch'] = 0;
$_SESSION['dragonsledgesearch'] = 0;
$_SESSION['thievesdensearch'] = 0;
$_SESSION['catacombssearch'] = 0;
$_SESSION['darkforestsilverswitch'] = 0;
$_SESSION['darkkeepswitchA'] = 0;
$_SESSION['darkkeepswitchB'] = 0;
$_SESSION['enterdespair'] = 0;

// boss treasure checks
$_SESSION['scorpiontreasure'] = 0; 
$_SESSION['scorpiontreasurecheck'] = 0;
$_SESSION['ogretreasure'] = 0;
$_SESSION['ogretreasurecheck'] = 0;
$_SESSION['koboldtreasure'] = 0;
$_SESSION['koboldtreasurecheck'] = 0;
$_SESSION['thieftreasure'] = 0;
$_SESSION['thieftreasurecheck'] = 0;

// Random event flags
$_SESSION['pots'] = -1;
$_SESSION['woodenchests'] = -1;
$_SESSION['silverchest'] = -1;
$_SESSION['graycontainer'] = -1;
$_SESSION['dronescout'] = -1;

$_SESSION['freshlogin'] = 1;






?>
