<?php

// this pages code is used to get the feed of the logged-in user and return it as JSON 

session_start();
require_once('db-connect.php');

header('Content-Type: application/json');

if (!isset($_SESSION['username'])) {
    http_response_code(403);
    echo json_encode(['error' => 'Not logged in']);
    exit;
}




$username = $_SESSION['username'];
$stmt = $link->prepare("SELECT feed FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($feed);
$stmt->fetch();
$stmt->close();

echo json_encode(['feed' => $feed]);


?>
