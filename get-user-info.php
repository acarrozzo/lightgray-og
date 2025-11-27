<?php
require_once('db-connect.php');
session_start();

if (!isset($_GET['user'])) {
    echo json_encode(['error' => 'No user specified']);
    exit;
}

$username = $_GET['user'];
$stmt = $link->prepare("SELECT username, level, hp, mp, xp, currency, physicaltraining, mentaltraining, str, dex, mag, def FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    echo json_encode($user);
} else {
    echo json_encode(['error' => 'User not found']);
}
$stmt->close();
?>
