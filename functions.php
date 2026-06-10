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

    $_SESSION['roomID'] = $room;

    // update DB stats
    $updates = ['room' => $room, 'endfight' => 0]; // -- room change + reset fight
    if (!updateStats($link, $username, $updates)) {
        echo "Failed to update user attributes.";
    }

}

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






?>
