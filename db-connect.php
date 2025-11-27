<?php
// filepath: /Users/anthonycarrozzo/Git/acworld/acarrozzo/lg/db-connect.php

// Load environment variables
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Check if running locally
$whitelist = array(
    '127.0.0.1',
    '::1'
);

if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    // Local environment variables
    $usermain = $_ENV['DB_USER_LOCAL'];
    $password = $_ENV['DB_PASSWORD_LOCAL'];
    $lgdb = $_ENV['DB_NAME_LOCAL'];
    $host = $_ENV['DB_HOST_LOCAL'];
    $port = $_ENV['DB_PORT_LOCAL'];
} else {
    // Production environment variables
    $usermain = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASSWORD'];
    $lgdb = $_ENV['DB_NAME'];
    $host = $_ENV['DB_HOST'];
    $port = $_ENV['DB_PORT'];
}

// Initialize and connect to the database
$link = $GLOBALS['link'] = mysqli_init();
$conn = mysqli_real_connect(
    $link,
    $host,
    $usermain,
    $password,
    $lgdb,
    $port
);

if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}

?>
