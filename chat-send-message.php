<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once('db-connect.php');


require_once('functions.php');


//  $row = getChatData($link, $_SESSION['username']); // --- gets all chat data from database


if (!isset($_SESSION['username']) || empty($_POST['message'])) {
    http_response_code(400);
    exit;
}

$username = $_SESSION['username'];
$message = trim($_POST['message']);
$user_level = isset($_POST['level']) ? (int)$_POST['level'] : 1;

if ($message === '') {
    http_response_code(400);
    exit;
}

//$_SESSION['getUsernameColor'] = 'red';
//$color = $_SESSION['getUsernameColor'] = getUsernameColor($user_level);


// ----------------------------- Broadcasts a message to all users' feeds
function broadcastToAllFeeds($link, $sender, $level, $message, $command = '') { 
    // Build the feed message

    //$timestamp = date('Y-m-d H:i');
     $time = date("H:i", strtotime($row['timestamp']));

    $feed_message = "<div class='chat-bubble'>\n <span class='timestamp'>[".$_SESSION['timestamp']."]</span> <span class='".$_SESSION['getUsernameColor']."'>[$level] $sender</span> <span class='gray'>says:</span> \"<i>$message</i>\"</div>";
    

        // $time = date("H:i", strtotime($row['timestamp']));
        // $messages[] = "<p><span style='color:gray;'>[$time]</span> <strong style='color:$color;'>{$row['username']}</strong>: {$row['message']}</p>";
    // }



    // ----------------------------- Get only users active in the last 3600 seconds - (1 hour)
    $sql = "SELECT username, feed FROM users WHERE last_active >= NOW() - INTERVAL 3600 SECOND";
    $result = $link->query($sql);

    if (!$result) {
        error_log("Error fetching users for feed broadcast: " . $link->error);
        return false;
    }

    // ----------------------------- Loop through each user and append the message
    while ($row = $result->fetch_assoc()) {
        $username = $row['username'];
        $existing_feed = $row['feed'];
        $new_feed = $existing_feed . $feed_message;

        // ----------------------------- Update that user's feed with the new message
        $update = $link->prepare("UPDATE users SET feed = ? WHERE username = ?");
        if ($update) {
            $update->bind_param("ss", $new_feed, $username);
            $update->execute();
            $update->close();
        } else {
            error_log("Failed to prepare update for user '$username': " . $link->error);
        }
    }

    return true;
}


// Usage:
broadcastToAllFeeds(
    $link,
    $username, // sender's username
    $user_level, // sender's level
    $message, // message text
    isset($_SESSION['command']) ? $_SESSION['command'] : '' // optional command
);





// $stmt = $link->prepare("INSERT INTO users_chat (username, message) VALUES (?, ?)");
// $stmt->bind_param("ss", $username, $message);
// $stmt->execute();

$stmt = $link->prepare("INSERT INTO users_chat (username, message, user_level) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $username, $message, $user_level);
$stmt->execute();


$stmt->close();

?>
