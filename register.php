<?php session_start(); ?>
<!--<!DOCTYPE html>--
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = no">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="apple-mobile-web-app-capable" content="yes">

<link type="text/css" rel="stylesheet" href="css/lg.min.css" />
<link rel="stylesheet" type="text/css" href="css/rpg-awesome.css" >
<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">

</head>
-->

<?php
// REMOVE THIS WHEN DONE TESTING FOR TABLE ERRORS
// Enable error reporting for debugging
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<?php include('head.php');?>

<?php
// -------------------------DB CONNECT!

include('db-connect.php');


// Create the users table if it doesn't exist
// $link->query("
//     CREATE TABLE IF NOT EXISTS users (
//         id INT AUTO_INCREMENT PRIMARY KEY,
//         username VARCHAR(50) NOT NULL UNIQUE,
//         password VARCHAR(255) NOT NULL
//     ) 
// ");
// Check if the `users` table exists
$tableExists = $link->query("SHOW TABLES LIKE 'users'");
if ($tableExists->num_rows === 0) {
    // Create the `users` table if it doesn't exist
    $createTableQuery = "CREATE TABLE users (id INT AUTO_INCREMENT PRIMARY KEY)";
    if ($link->query($createTableQuery)) {
        echo "Table `users` created successfully.<br>";
    } else {
        die("Error creating table: " . $link->error);
    }
}





echo '<div id="title">';
//This code runs if the form has been submitted
if (isset($_POST['submit'])) {
    // Validate input
    if (empty($_POST['username']) || empty($_POST['pass']) || empty($_POST['pass2'])) {
        echo '<p class="red">You did not complete all of the required fields.</p>';
        include('register-form.php');
        die();
    }

    // Sanitize input
    // $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $username = strip_tags($_POST['username']);
    $password = $_POST['pass'];
    $password2 = $_POST['pass2'];

    // Check if passwords match
    if ($password !== $password2) {
        echo '<p class="red">Your passwords did not match.</p>';
        include('register-form.php');
        die();
    }

// Username format validation
if (!preg_match('/^[a-zA-Z][a-zA-Z0-9]*$/', $username)) {
    echo '<p class="red">Usernames can only contain letters and numbers, and must start with a letter.</p>';
    include('register-form.php');
    die();
}

    // Check if the username already exists
    $stmt = $link->prepare("SELECT id FROM users WHERE username = ?");
    if (!$stmt) {
        die('Prepare failed: ' . $link->error);
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<p class="red">Sorry, the username ' . htmlspecialchars($username) . ' is already in use.</p>';
        include('register-form.php');
        die();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $stmt = $link->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if (!$stmt) {
        die('Prepare failed: ' . $link->error);
    }
    $stmt->bind_param("ss", $username, $hashedPassword);
    $stmt->execute();

    // Insert the new user into the KL database!!!! NEW - ac 6/12/25
    $stmt = $link->prepare("INSERT INTO users_kl (username) VALUES (?)");
    if (!$stmt) {
        die('Prepare failed: ' . $link->error);
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();

    // Initialize the user's feed (optional)
    $feed_start = '
    <span class="icon darkergray lg-logo">' . file_get_contents("img/svg/lg-logo.svg") . '</span>
    <br>
    ....................feed initialized<br>
    +<br>
    <h2>Welcome <span class="blue">' . htmlspecialchars($username) . '!</span></h2>
    +<br>
    <h1>Interact with the world by clicking the buttons on screen.</h1>
    <br><br>
    <h4>When you interact with the world, the results will appear here, in this feed.</h4>
    <br><br>
    <h4>Use the tabs to check Stats, Items, and Quests.</h4>
    <br><br>
    <h4>To explore you need to move around. Click the arrows around the circle map to navigate. Click the circle to view the entire map.</h4>
    <br><br>
    <h3>...Scroll up to see the past...</h3>';

    // Update the user's feed in the database (if applicable)
    $stmt = $link->prepare("UPDATE users SET feed = ? WHERE username = ?");
    if (!$stmt) {
        die('Prepare failed: ' . $link->error);
    }
    $stmt->bind_param("ss", $feed_start, $username);
    $stmt->execute();

    // Send a welcome email (optional)
    $adminEmail = "acarrozzo@gmail.com"; // Replace with a configurable value
    $subject = "New User Registration: $username";
    $message = "A new user has registered with the username: $username.";
    mail($adminEmail, $subject, $message);

    // Display success message
    echo '<div class="register-success">';
    echo '<h3>Thank you for registering, ' . htmlspecialchars($username) . '!</h3>';
    echo '<a class="btn goldBG" href="index.php">Login Here</a>';
    echo '</div>';
} else {
    include('register-form.php');
}
?>
</div>
