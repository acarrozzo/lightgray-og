<?php

// -------------------------DB CONNECT!
include('db-connect.php');

// -------------------------DB QUERY!
// Fetch the current feed for the logged-in user
$sql = "SELECT feed FROM users WHERE username = '" . $_SESSION['username'] . "'";
if (!$result = $link->query($sql)) {
    die('There was an error running the query [' . $link->error . ']');
}

// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {
    $feed_add = $_SESSION['command'] . $message;
    $feed_new = $row['feed'] . $feed_add; // --------------------- UPDATE FEED

    // Update the feed for the current user
    $query = $link->prepare("UPDATE users SET feed = ? WHERE username = ?");
    $query->bind_param("ss", $feed_new, $_SESSION['username']);
    $query->execute();

    $funflag = 1;
}
