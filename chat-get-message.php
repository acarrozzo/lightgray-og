<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once('db-connect.php');

$last_id = isset($_GET['last_id']) ? (int)$_GET['last_id'] : 0;

// Prepare and execute the SQL statement
$stmt = $link->prepare("SELECT id, username, message, user_level, timestamp FROM users_chat WHERE id > ? ORDER BY id ASC LIMIT 100");
$stmt->bind_param("i", $last_id);
$stmt->execute();

// Fetch the result set
$result = $stmt->get_result();

$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

$stmt->close();

// Return as JSON
header('Content-Type: application/json');
echo json_encode($messages);
?>
