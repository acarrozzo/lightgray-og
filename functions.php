<?php

// -------------------------------------------------------------------------------------------- updateStats
// -- updateStats - this function updates user attributes in the database
function updateStats($link, $username, $attributes, $table = 'users') {
    // Validate input
    if (!is_array($attributes) || empty($attributes)) {
        throw new InvalidArgumentException('Attributes must be a non-empty associative array.');
    }

    // Whitelist of allowed tables
    $allowedTables = ['users', 'users_kl']; // Add more table names as needed

    if (!in_array($table, $allowedTables)) {
        throw new InvalidArgumentException("Invalid table name: $table");
    }

    // Build the SET clause
    $setClause = implode(", ", array_map(function ($column) {
        return "$column = ?";
    }, array_keys($attributes)));

    // Prepare SQL
    $query = "UPDATE `$table` SET $setClause WHERE username = ?";
    $stmt = $link->prepare($query);

    if (!$stmt) {
        error_log('Database prepare failed: ' . $link->error);
        die('An error occurred. Please try again later.');
    }

    // Bind parameters
    $types = str_repeat("s", count($attributes)) . "s";
    $values = array_merge(array_values($attributes), [$username]);
    $stmt->bind_param($types, ...$values);

    // Execute and return result
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<p class='small gray'>Attributes updated successfully in <span class='green'>$table</span>: " . implode(", ", array_keys($attributes)) . ".</p>";
        return true;
    } else {
        error_log("No rows affected or failed to update user '$username' in table '$table'.");
        echo "<p class='small red'>No changes made in $table.</p>";
        return false;
    }
}


// -------------------------------------------------------------------------------------------- handleTravel
// -- handleTravel - this function handles the travel action and updates the user's room and feed
function handleTravel($username, $link, $direction, $room, $descriptionKey) {
    $description = isset($_SESSION[$descriptionKey]) ? $_SESSION[$descriptionKey] : "No description available.";
    echo "You travel $direction<br>";
    $message = "<i>You travel $direction</i><br>$description";
    include('update_feed.php'); // --- update feed

    $oldRoom = $_SESSION['roomID']; // store current room before changing
    $_SESSION['lastroom'] = $oldRoom;

    // update room in session FIRST so entry announcement uses new location
    $_SESSION['roomID'] = $room;

    // announce EXIT to users in old room
    announceRoomMovement($link, $username, $direction, $oldRoom, 'exit');

    // update DB stats
    $updates = ['room' => $room, 'endfight' => 0]; // -- room change + reset fight
    if (!updateStats($link, $username, $updates)) {
        echo "Failed to update user attributes.";
    }

    // reverse direction for ENTRY message
    function reverseDirection($dir) {
        $map = [
            'north' => 'south', 'south' => 'north',
            'east' => 'west',   'west' => 'east',
            'northeast' => 'southwest', 'southwest' => 'northeast',
            'northwest' => 'southeast', 'southeast' => 'northwest'
        ];
        return $map[$dir] ?? 'somewhere';
    }
    $reverse = reverseDirection($direction);

    // announce ENTRY to users in new room
    announceRoomMovement($link, $username, $reverse, $room, 'enter');
    displayOtherUsers($room, $username); // Call the function with the current room and username from the user data

}

// -------------------------------------------------------------------------------------------- announceRoomMovement
// // announceRoomMovement - this function announces a user's movement in the room to all active users in that room
function announceRoomMovement($link, $username, $direction, $roomId, $type = 'enter') {
   // $timestamp = date('Y-m-d H:i');
    $action = ($type === 'enter') ? 'enters from' : 'exits to';
    
    // Build the message
    $message = "<div class='fBox'><span class='gray'>[".$_SESSION['timestamp']."]</span> <span class='system'>$username $action the $direction.</span></div>";

    // Fetch all active users in the same room, excluding the moving user
    $stmt = $link->prepare("SELECT username, feed FROM users WHERE room = ? AND is_active = 1 AND username != ?");
    $stmt->bind_param("ss", $roomId, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Append message to each user's feed
    while ($row = $result->fetch_assoc()) {
        $targetUser = $row['username'];
        $updatedFeed = $row['feed'] . $message;

        $update = $link->prepare("UPDATE users SET feed = ? WHERE username = ?");
        if ($update) {
            $update->bind_param("ss", $updatedFeed, $targetUser);
            $update->execute();
            $update->close();
        }
    }
    $stmt->close();
}



// --------------------------------------------------------------------------- DISPLAY OTHER USERS
// function to display a button for every other users names here if it matches the room you, the user, is also in.
function displayOtherUsers($currentRoom, $currentUsername) {
    global $users;
    $otherUsers = [];
    foreach ($users as $user) {
        if ($user['room'] === $currentRoom && $user['username'] !== $currentUsername) {
            $otherUsers[] = $user;
        }
    }
    // Show the message ONCE if there are any other users
    if (count($otherUsers) > 0) {
        echo '<p class="gold">Also Here:</p>';
        foreach ($otherUsers as $user) {
        echo '
        <form method="POST" style="display:inline;">
            <input type="hidden" name="view_user" value="' . htmlspecialchars($user['username']) . '">
            <button class="redBG userButton" type="submit">' . htmlspecialchars($user['username']) . '</button>
        </form>';
        }
        echo '•';
    }
}
// Fetch all users from the database
$users = [];
$result = $link->query("SELECT username, room FROM users");
if ($result) {
    while ($user = $result->fetch_assoc()) {
        $users[] = $user;
    }
}
//displayOtherUsers($row['room'], $row['username']); // Call the function with the current room and username from the user data




// --------------------------------------------------------------------------------------------getUserData
// // -- getUserData - this function retrieves user data from the database and sets session variables
function getUserData($link, $username) {
    $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
    if (!$stmt) {
        error_log('Database prepare failed: ' . $link->error);
        die('An error occurred. Please try again later.');
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        die('User not found.');
    }
    return $result->fetch_assoc();
}


// -------------------------------------------------------------------------------------------- getKLData
// this function retrieves kill list data from the database and sets session variables
function getKLData($link, $username) { 
    $stmt = $link->prepare("SELECT * FROM users_kl WHERE username = ?");
    if (!$stmt) {
        error_log('Database prepare failed: ' . $link->error);
        die('An error occurred. Please try again later.');
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        die('Kill data not found.');
    }
    return $result->fetch_assoc();
}
function createKillListVariables($link, $username) {
    $klData = getKLData($link, $username);
    foreach ($klData as $key => $value) {
      $_SESSION[$key] = $value; // Set session variable
      // $GLOBALS[$key] = $value;     // Set global variable
    }
}
// run createKillListVariables
createKillListVariables($link, $_SESSION['username']);




// -------------------------------------------------------------------------------------------- getChatData
// this function retrieves chat data from the database and sets session variables
function getChatData($link, $username) {
    $stmt = $link->prepare("SELECT * FROM users_chat WHERE username = ?");
    if (!$stmt) {
        error_log('Database prepare failed: ' . $link->error);
        die('An error occurred. Please try again later.');
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        die('Chat data not found.');
    }
    return $result->fetch_assoc();
}
// $row = getChatData($link, $username); // --- gets all chat data from database






// -------------------------------------------------------------------------------------------- getUsernameColor
// this function returns a color based on the user's level
function getUsernameColor($level) {
    $colors = [
        '#999999', // 0-9 gray
        '#00cc00', // 10-19 green
        '#0066ff', // 20-29 blue
        '#9900cc', // 30-39 purple
        '#ff6600', // 40-49 orange
        '#cc0000', // 50-59 red
        '#ffcc00', // 60-69 gold
        '#00ffff', // 70-79 cyan
        '#ff00ff', // 80-89 magenta
        '#ffffff', // 90+ white
    ];
    return $colors[min(intval($level / 10), count($colors) - 1)];
}
// -------------------------------------------------------------------------------------------- fetchChatMessages
// this function fetches chat messages from the database and formats them for display
function fetchChatMessages($link) {
    $result = $link->query("SELECT username, message, timestamp, user_level FROM chat_messages ORDER BY id DESC LIMIT 100");
    $messages = [];
    while ($row = $result->fetch_assoc()) {
        $color = $_SESSION['getUsernameColor'] = getUsernameColor($row['user_level']);
        $time = date("H:i", strtotime($row['timestamp']));
        $messages[] = "<p><span style='color:gray;'>[$time]</span> <strong style='color:$color;'>{$row['username']}</strong>: {$row['message']}</p>";
    }
    return implode('', array_reverse($messages)); // most recent at bottom
}




// this checks if the input starts with 'view ' and extracts the username
// if (strpos($input, 'view ') === 0) { 
//     $viewedUsername = trim(substr($input, 5));
//     displayUserCard($link, $viewedUsername, $_SESSION['username']);
//     exit;
// }
function displayUserCard($link, $targetUsername, $viewerUsername) {
    $stmt = $link->prepare("SELECT level, hp, mp, xp, currency, physicaltraining, mentaltraining, str, dex, mag, def FROM users WHERE username = ?");
    if (!$stmt) {
        error_log("Failed to prepare statement in displayUserCard: " . $link->error);
        return;
    }
    $stmt->bind_param("s", $targetUsername);
    $stmt->execute();
    $result = $stmt->get_result();
    // <span class='gray'>[$timestamp]</span>
    if ($user = $result->fetch_assoc()) {
      //  $timestamp = date('Y-m-d H:i');
        $cardHtml = "        
        <div class='fBox user-card'>
            <p><strong>{$targetUsername}</strong> (Lv {$user['level']})</p>
            <p class='gray small'>user description goes here user description goes here user description goes here user description goes here </p>
            <p>HP: {$user['hp']}, MP: {$user['mp']}, XP: {$user['xp']}</p>
            <p>Gold: {$user['currency']} • PT: {$user['physicaltraining']} • MT: {$user['mentaltraining']}</p>
            <p>STR: {$user['str']}, DEX: {$user['dex']}, MAG: {$user['mag']}, DEF: {$user['def']}</p>
        </div>";
        // Append to feed
        $stmt2 = $link->prepare("UPDATE users SET feed = CONCAT(feed, ?) WHERE username = ?");
        $stmt2->bind_param("ss", $cardHtml, $viewerUsername);
        $stmt2->execute();
        $stmt2->close();
    }
    $stmt->close();
}








?>
