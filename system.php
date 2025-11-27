<?php


if (isset($_SESSION['username'])) {			// IF NO ONE IS LOGGED IN SHOW TITLE SCREEN

// --------------------------------------------------------------------------------- Quests TAB
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

$whichmap = $_SESSION['selectmap'];
//}
?>


<h2>System</h2>
  <form id="mainForm" method="post" action="" name="formInput">

<a class="btn" href="index.php">refresh page</a>
<input type="submit" name="input1" value="unequip all" />
<input type="submit" name="input1" value="clear feed" />
<a class="btn" href=logout.php>Logout</a>
  </form>

<?php
}

else {
  echo '<div class="worldtool">
  <h3 class="padd">Play now: <a class="green" href data-tab="game"> Log In / Create New Character</a></h3>
  </div>';
}
?>