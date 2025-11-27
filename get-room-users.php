<?php
session_start();
require_once('db-connect.php');

if (!isset($_SESSION['username']) || !isset($_SESSION['roomID'])) {
    http_response_code(403);
    exit;
}

$username = $_SESSION['username'];
$room = $_SESSION['roomID'];

// Fetch both username and level of users in the same room (excluding self)
// $stmt = $link->prepare("SELECT username, level FROM users WHERE room = ? AND username != ?");
$stmt = $link->prepare("SELECT username, level FROM users WHERE room = ? AND username != ? ORDER BY level DESC, username ASC");

$stmt->bind_param("ss", $room, $username);
$stmt->execute();
$result = $stmt->get_result();

$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = [
        'username' => $row['username'],
        'level' => (int)$row['level'] // cast level to integer for safety
    ];
}
$stmt->close();

header('Content-Type: application/json');
echo json_encode($users);
?>
