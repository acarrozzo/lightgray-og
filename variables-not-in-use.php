<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

require_once('db-connect.php');

// Validate session username
if (!isset($_SESSION['username']) || !is_string($_SESSION['username']) || empty(trim($_SESSION['username']))) {
    die('Invalid session. Please log in again.');
}

$username = $_SESSION['username'];

// Check if the user already exists
$stmt = $link->prepare("SELECT id FROM users WHERE username = ?");
if (!$stmt) {
    die('Prepare failed: ' . $link->error);
}
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Insert a new user row with default values
    $stmt = $link->prepare("
        INSERT INTO users (username, password, recentlogin, characterclass, characterrace, room, recall, craftingtable, fire, feed, feedclear, feedcounter, clicks, deaths, level, xp, cp, tp, sp, currency, evolve, hp, hpmax, mp, mpmax, str, dex, mag, def, strmod, dexmod, magmod, defmod)
        VALUES (?, ?, NOW(), 'Scout', 'Human', '001', '001', '0', '0', NULL, 1, 0, 0, 0, 0, 0, 0, 0, 0, 7, 0, 10, 10, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0)
    ");
    if (!$stmt) {
        die('Prepare failed: ' . $link->error);
    }
    $defaultPassword = password_hash('defaultpassword', PASSWORD_DEFAULT); // Replace with a secure default password
    $stmt->bind_param("ss", $username, $defaultPassword);
    $stmt->execute();
    echo "New user row created for username: $username";
} else {
    echo "User already exists.";
}

// Update user-specific variables (if needed)
$stmt = $link->prepare("UPDATE users SET recentlogin = NOW() WHERE username = ?");
if (!$stmt) {
    die('Prepare failed: ' . $link->error);
}
$stmt->bind_param("s", $username);
$stmt->execute();

// Initialize session variables
$_SESSION['characterclass'] = 'Scout';
$_SESSION['characterrace'] = 'Human';
$_SESSION['room'] = '001';
$_SESSION['recall'] = '001';
$_SESSION['craftingtable'] = '0';
$_SESSION['fire'] = '0';
$_SESSION['feed'] = NULL;
$_SESSION['feedclear'] = 1;
$_SESSION['feedcounter'] = 0;
$_SESSION['clicks'] = 0;
$_SESSION['deaths'] = 0;
$_SESSION['level'] = 0;
$_SESSION['xp'] = 0;
$_SESSION['cp'] = 0;
$_SESSION['tp'] = 0;
$_SESSION['sp'] = 0;
$_SESSION['currency'] = 7;
$_SESSION['evolve'] = 0;
$_SESSION['hp'] = 10;
$_SESSION['hpmax'] = 10;
$_SESSION['mp'] = 2;
$_SESSION['mpmax'] = 2;
$_SESSION['str'] = 0;
$_SESSION['dex'] = 0;
$_SESSION['mag'] = 0;
$_SESSION['def'] = 0;
$_SESSION['strmod'] = 0;
$_SESSION['dexmod'] = 0;
$_SESSION['magmod'] = 0;
$_SESSION['defmod'] = 0;

// Add additional session variables as needed
$_SESSION['pots'] = 0;
$_SESSION['woodenchests'] = 0;
$_SESSION['graychests'] = 0;
$_SESSION['silverchests'] = 0;

// Example for debugging
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

?>