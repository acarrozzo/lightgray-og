<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once('db-connect.php');

$result = $link->query("SELECT COUNT(*) as count FROM users_chat");
echo json_encode($result->fetch_assoc());

?>