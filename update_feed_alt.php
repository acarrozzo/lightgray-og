<?php

// // -------------------------DB CONNECT!
// include ('db-connect.php'); 
// // -------------------------DB QUERY!
// $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
// $stmt->bind_param("s", $_SESSION['username']);
// $stmt->execute();
// $result = $stmt->get_result();
// if (!$result) {
//     die('There was an error running the query [' . $link->error . ']');
// }
// // -------------------------DB OUTPUT!
// while($row = $result->fetch_assoc()){ 

$row = getUserData($link, $_SESSION['username']); // --- gets all user data from database   


$feed_add=$message;
$feed_new = $row['feed'].$feed_add; // --------------------- UPDATE FEED
    // Use a prepared statement with a fixed table name
    $query = $link->prepare("UPDATE users SET feed = ? WHERE username = ?");
    $query->bind_param("ss", $feed_new, $_SESSION['username']);
    $query->execute();

$funflag = 1; 

// }
?>