<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
// Defense-in-depth headers (sent before any output). A strict script-src is NOT set because
// the page relies on inline <script> blocks (night/dawn theming) — locking those down cleanly
// requires per-script nonces, which is out of scope here.
if (!headers_sent()) {
  header("Content-Security-Policy: object-src 'none'; base-uri 'self'; frame-ancestors 'self'");
  header("X-Content-Type-Options: nosniff");
}
include('head.php');
?>
<title>Light Gray RPG</title>
<body>
<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

// -------------------------DB CONNECT!
require_once('db-connect.php');

if (!isset($_SESSION['username']) || !is_string($_SESSION['username']) || empty(trim($_SESSION['username']))) { // Validate and sanitize session username
  // phpinfo(); // this shows all php info
  include('title.php');
} else {   

    require_once('functions.php'); // MAIN HELPER FUNCTIONS

   // ----------------------------------------------- FUNCTION! USED ALOT! // Move this to correct spot
   // -- getUserData - this function retrieves user data from the database and sets session variables


//   function getUserData($link, $username) {
//     $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
//     if (!$stmt) {
//         error_log('Database prepare failed: ' . $link->error);
//         die('An error occurred. Please try again later.');
//     }
//     $stmt->bind_param("s", $username);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     if ($result->num_rows === 0) {
//         die('User not found.');
//     }
//     return $result->fetch_assoc();
// }




// // this function retrieves kill list data from the database and sets session variables
// function getKLData($link, $username) { 
//     $stmt = $link->prepare("SELECT * FROM users_kl WHERE username = ?");
//     if (!$stmt) {
//         error_log('Database prepare failed: ' . $link->error);
//         die('An error occurred. Please try again later.');
//     }
//     $stmt->bind_param("s", $username);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     if ($result->num_rows === 0) {
//         die('Kill data not found.');
//     }
//     return $result->fetch_assoc();
// }

// This function retrieves all kill list data for a user and creates a variable for each monster in the users_kl table.
// function createKillListVariables($link, $username) {
//     $klData = getKLData($link, $username);
//     foreach ($klData as $key => $value) {
//       $_SESSION[$key] = $value; // Set session variable
//       // $GLOBALS[$key] = $value;     // Set global variable
//     }
// }
// // run createKillListVariables
// createKillListVariables($link, $_SESSION['username']);





   // ----------------------------------------------- FUNCTION! USED ALOT! // Move this to correct spot
   // ----------------------------------------------- FUNCTION! USED ALOT! // Move this to correct spot
   // ----------------------------------------------- FUNCTION! USED ALOT! // Move this to correct spot
   // ----------------------------------------------- FUNCTION! USED ALOT! // Move this to correct spot
   // ----------------------------------------------- FUNCTION! USED ALOT! // Move this to correct spot
   // ----------------------------------------------- FUNCTION! USED ALOT! // Move this to correct spot



// function updateStats($link, $username, $attributes, $table = 'users') {
//     // Validate input
//     if (!is_array($attributes) || empty($attributes)) {
//         throw new InvalidArgumentException('Attributes must be a non-empty associative array.');
//     }

//     // Whitelist of allowed tables
//     $allowedTables = ['users', 'users_kl']; // Add more table names as needed

//     if (!in_array($table, $allowedTables)) {
//         throw new InvalidArgumentException("Invalid table name: $table");
//     }

//     // Build the SET clause
//     $setClause = implode(", ", array_map(function ($column) {
//         return "$column = ?";
//     }, array_keys($attributes)));

//     // Prepare SQL
//     $query = "UPDATE `$table` SET $setClause WHERE username = ?";
//     $stmt = $link->prepare($query);

//     if (!$stmt) {
//         error_log('Database prepare failed: ' . $link->error);
//         die('An error occurred. Please try again later.');
//     }

//     // Bind parameters
//     $types = str_repeat("s", count($attributes)) . "s";
//     $values = array_merge(array_values($attributes), [$username]);
//     $stmt->bind_param($types, ...$values);

//     // Execute and return result
//     $stmt->execute();

//     if ($stmt->affected_rows > 0) {
//         echo "<p class='small gray'>Attributes updated successfully in <span class='green'>$table</span>: " . implode(", ", array_keys($attributes)) . ".</p>";
//         return true;
//     } else {
//         error_log("No rows affected or failed to update user '$username' in table '$table'.");
//         echo "<p class='small red'>No changes made in $table.</p>";
//         return false;
//     }
// }

// // Update main user stats
// updateStats($link, $_SESSION['username'], ['hp' => 20, 'mp' => 5]);

// // Update kill list in users_kl table
// updateStats($link, $_SESSION['username'], ['dragon' => 3, 'ogre' => 5], 'users_kl');





   // ----------------------------------------------- FUNCTION! USED ALOT! // Move this to correct spot OLD
   // ----------------------------------------------- FUNCTION! USED ALOT! // Move this to correct spot OLD
   // ----------------------------------------------- FUNCTION! USED ALOT! // Move this to correct spot OLD
   // ----------------------------------------------- FUNCTION! USED ALOT! // Move this to correct spot OLD
   // ----------------------------------------------- FUNCTION! USED ALOT! // Move this to correct spot OLD
   // ----------------------------------------------- FUNCTION! USED ALOT! // Move this to correct spot OLD
   // ----------------------------------------------- FUNCTION! USED ALOT! // Move this to correct spot OLD
   // ----------------------------------------------- FUNCTION! USED ALOT! // Move this to correct spot OLD

//    function updateStatsOLD($link, $username, $attributes) {
//     // Ensure $attributes is an associative array
//     if (!is_array($attributes) || empty($attributes)) {
//         throw new InvalidArgumentException('Attributes must be a non-empty associative array.');
//     }

//     // Build the SET clause dynamically
//     $setClause = implode(", ", array_map(function ($column) {
//         return "$column = ?";
//     }, array_keys($attributes)));

//     // Prepare the SQL query
//     $query = "UPDATE users SET $setClause WHERE username = ?";
//     $stmt = $link->prepare($query);

//     if (!$stmt) {
//         error_log('Database prepare failed: ' . $link->error);
//         die('An error occurred. Please try again later.');
//     }

//     // Bind the parameters dynamically
//     $types = str_repeat("s", count($attributes)) . "s"; // "s" for each attribute value + "s" for username
//     $values = array_merge(array_values($attributes), [$username]);
//     $stmt->bind_param($types, ...$values);

//     // Execute the query
//     $stmt->execute();

//     // Handle success or failure
//     if ($stmt->affected_rows > 0) {
//         echo "<p class='small gray'>Attributes updated successfully: <span class='green'>" . implode(", ", array_keys($attributes)) . ".</p>";
//         return true;
//     } else {
//         error_log('Failed to update user: ' . $username);
//         echo "<p class='small red'>Failed to update attributes: " . implode(", ", array_keys($attributes)) . ".</p>";
//         return false;
//     }
// }



// ----------------------------------------------- FUNCTION! USED ALOT! // Move this to correct spot
// ----------------------------------------------- FUNCTION! USED ALOT! // Move this to correct spot
// ----------------------------------------------- FUNCTION! USED ALOT! // Move this to correct spot
// ----------------------------------------------- FUNCTION! USED ALOT! // Move this to correct spot
// function handleTravel($username, $link, $direction, $room, $descriptionKey) {
//     $description = isset($_SESSION[$descriptionKey]) ? $_SESSION[$descriptionKey] : "No description available.";
//     echo "You travel $direction<br>";
//     $message = "<i>You travel $direction</i><br>$description";
//     include ('update_feed.php'); // --- update feed
//     $updates = ['room' => $room, 'endfight' => 0]; // -- room change + reset fight
//     if (!updateStats($link, $username, $updates)) {
//         echo "Failed to update user attributes.";
//     }
// }





?> 
<div id="container">
<?php // Last Room (checks if room changed, so doesn't display no exit message)
if ($_SESSION['lastroom'] != $_SESSION['roomID']) {
    $_SESSION['retreatroom'] = $_SESSION['lastroom'];
}
$lastroom = $_SESSION['lastroom'] = $_SESSION['roomID'];
// LAST ACTION TIME
$recentlogin = "".date("Ymd"); 
$user = $username = $_SESSION['username'];
//$results = $link->query("UPDATE $user SET recentlogin = $recentlogin");

//commenting this out for now - not sure what its used for
// $updates = ['recentlogin' => $recentlogin ]; // -- changes to be made
// updateStats($link, $_SESSION['username'], $updates); // -- set changes





?>


<!-- FORM ACTION -->
<form id="mainForm" method="post" action="<?php echo $_SERVER['PHP_SELF']  //index.php?>" name="formInput" class="TOPFORM">

<div class="all-sections">
<div id="action-module" class="module action">
<div  class="panel" data-pop="action">
<div class="panel custom-input" data-pop2="custom">
	<section>
		<h3>Custom Input</h3>
		<input class="" type="string" name="input1" value="<?php $input ?>" />
		<input class="" type="submit" name="submit" value="Submit" id="mainButton" />
	<!--</form>-->
  <p>try cheat codes!</p>
<form id="mainForm" method="post" action="" name="formInput">
<a class="btn" href="index.php">refresh page</a>
<input type="submit" name="input1" value="unequip all" />
<input type="submit" name="input1" value="clear feed" />
<a class="btn" href=logout.php>Logout</a>
</form>
</section>
</div>

<?php
$closeMenuBtn = '<span class="closeMenu icon goldBG dddgray">'.file_get_contents("img/svg/x.svg").'</span>';
echo $closeMenuBtn; ?>
<section id="action">
<!--<form id="mainForm" method="post" action="<?php //echo $_SERVER['PHP_SELF']  //index.php?>" name="formInput"> -->
<?php
    if (!isset($_POST['input1'])) {
        $_POST['input1']='';
    } // used to look on char creation
    $input = $_POST['input1']; ?>
<?php
// --  CALL GLOBAL VARIABES & SET GLOBAL LOCAL VARIABLES
    $user = $username = $_SESSION['username'];
    $pass = $_SESSION['pass'];
    $command = $_SESSION['command'];
    $notcommand = $_SESSION['notcommand'];
    $currency = $_SESSION['currency'];
    $quest = $_SESSION['quest'];
    $toopoor = $_SESSION['toopoor'];
    $notenoughcp = 	$_SESSION['notenoughcp'] = 'You don\'t have enough CP to '.$input.'<br>';
    $notenoughtp = 	$_SESSION['notenoughtp'] = 'You don\'t have enough TP to '.$input.'<br>';
    $notenoughsp = 	$_SESSION['notenoughsp'] = 'You don\'t have enough SP to '.$input.'<br>';

    //echo "<span class='lastaction'>last action:</span> ".$input."";   // ---- last input
    //echo "<span class='lastaction roomcolor'>+</span>";   // -- last input
    
    echo "<div class='lastActionBox'>";   // -- last input
    //echo "<strong class='red'>Last Action:</strong>";   // -- last input
    echo "<span class='blue'>ACTION</span>";   // -- last input
    echo'<div class="gameBox">';


    include('room-all.php');
    echo'</div>';   // END GAMEBOX
    echo '</div>'; //-- END lastActionBox
?>
 
<div class="descBox">

  <div class="gbox">
	<div>Location:</div>

	<?php
    include('room-desc.php');

    //<h2> All Actions</h2>
    echo '
<div class="">
<button type="submit" class=" redBG" name="input1" value="attack">Attack</button>
<button type="submit" class=" goldBG" name="input1" value="search">Search</button>
<button type="submit" class=" greenBG" name="input1" value="rest">Rest</button>
<button type="submit" class=" blueBG" name="input1" value="look">Look</button>
</div>';

    include('coinbox.php');

    echo '</div>';



    include('bagbox.php');
    include('spellbox.php');

    ?>
    

<?php
echo '<div class="gbox">';
echo '<h2>Teleport</h2>';
echo '<p>Visit the WORLD tab to teleport</p>';
echo '<a href data-link="world" class="btn blueBG">OPEN WORLD INTERFACE</a>';


echo '<div>
<a class="btn" href="index.php">refresh page</a>
<input type="submit" name="input1" value="unequip all" />
<input type="submit" name="input1" value="clear feed" />
<a class="btn" href=logout.php>Logout</a>
<a class="btn goldBG" href="world-tool.php" target="world-tool">Open World Tool</a>
</div>';

?>
</div>   


</div>
</section>

<div class="panel" data-pop2="craft">
<section>
<?php include('craft.php'); 

?>

</section>
</div>



	<div class="subMenu">
	<span class="menuIcon2 " data-link2="action"><span>Action</span></span>
	<span class="menuIcon2 " data-link2="craft"><span>Craft</span></span>
	<span class="menuIcon2 " data-link2="custom"><span>Custom</span></span>
 <!-- <span class="menuIcon2 " data-link2="system"><span>System</span></span>-->
	</div>

<!--</form>-->

</div>
<!-- STATS PANEL -->
<div class="panel stats" data-pop="stats">
  <?php echo $closeMenuBtn; ?>
  <section class="flex-contain"> <?php include('stats.php');?> </section>


  <div class="panel training" data-pop2="training"><section><?php include('training.php'); ?></section></div>
  <div class="panel skills-spells" data-pop2="skills"><section><?php include('skills.php'); ?></section></div>
	<div class="panel skills-spells" data-pop2="spells"><section><?php include('spells.php'); ?></section></div>

	<div class="subMenu">
	<span class="menuIcon2 activXXX" data-link2="stats"><span>Stats</span></span>
	<span class="menuIcon2" data-link2="training"><span>Training</span></span>
  <span class="menuIcon2 " data-link2="skills"><span>Skills</span></span>
  <span class="menuIcon2 " data-link2="spells"><span>Spells</span></span>
	</div>
</div>

<!-- INV PANEL -->
<div class="panel" data-pop="inv">
  <?php echo $closeMenuBtn; ?>
	<?php // include ('futureEQUIPPED.php');?>
	<?php include('inv.php'); ?>
	<div class="subMenu">
		<span class="menuIcon2 activXXX" data-link2="inv"><span>Weapons</span></span>
		<span class="menuIcon2 " data-link2="armor"><span>Armor</span></span>
		<span class="menuIcon2 " data-link2="acc"><span>Acc</span></span>
		<span class="menuIcon2 " data-link2="comp"><span>Comp</span></span>
		<span class="menuIcon2 " data-link2="bag"><span>Bag</span></span>
	</div>
</div>

<!-- QUESTS PANEL -->
<div class="panel" data-pop="quests" id="quests">
  <?php echo $closeMenuBtn; ?>
	<?php include('quests.php'); ?>
  <div class="panel" data-pop2="kl"><section><?php include('kl.php'); ?></section></div>
	<div class="subMenu">
		<span class="menuIcon2 activXXX" data-link2="quests"><span>Quests</span></span>
		<span class="menuIcon2" data-link2="notfound"><span>Not Found</span></span>
		<span class="menuIcon2 " data-link2="completed"><span>Completed</span></span>
		<span class="menuIcon2 " data-link2="kl"><span>KL</span></span>
	</div>
 </div>
<!-- WORLD PANEL -->
<div class="panel" data-pop="world">
  <?php echo $closeMenuBtn; ?>
    	<section data-pop2="world" id="world" class="panel training"> <?php include('teleport.php'); ?> </section>
    		<div class="subMenu">
		<span class="menuIcon2 activXXX" data-link2="world"><span>World</span></span>
			</div>
</div>

<?php
include('shop.php');			// ----- MENU CONTENT
    include('evolve.php');
?>

<!-- MENU TABS -->
<div class="menu">
  <a href="" class="menuIcon" data-link="stats"><span>Char</span>
    <i class="icon purple"><?php echo file_get_contents("img/svg/character.svg"); ?></i>
  </a>
<a href="" class="menuIcon" data-link="inv"><span>Inv</span>
  <i class="icon green"><?php echo file_get_contents("img/svg/inv.svg"); ?></i>
</a>
<a href="" class="menuIcon" data-link="quests"><span>Quests</span>
  <i class="icon gold"><?php echo file_get_contents("img/svg/trophy.svg"); ?></i>
</a>
<a href="" class="menuIcon" data-link="world"><span>World</span>
  <i class="icon blue"><?php echo file_get_contents("img/svg/world.svg"); ?></i>
</a>
<a href="" class="menuIcon" data-link="action"><span>Action</span>
  <i class="icon red"><?php echo file_get_contents("img/svg/hand.svg"); ?></i>
</a>
</div>




<?php
    // -------------------------DB QUERY!
    $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    if (!$result) {
        die('There was an error running the query [' . $link->error . ']');
    }
    // -------------------------DB OUTPUT!
    while ($row = $result->fetch_assoc()) {
  	  date_default_timezone_set('America/New_York');
      $timestamp = $_SESSION['timestamp'] = date('Y-m-d H:i:s');
      // $command = 	$_SESSION['command'] ="<span class='blue capX command'>  action  [ <span class='dddgray'>$input</span> ]</span>";
      $command = 	$_SESSION['command'] ="<div class='blue capX command'> <strong>action</strong> <span class='gray small'>[".$_SESSION['timestamp']."]</span> </div>";
    }


    include('nav.php'); 			// ----- DPAD + ACTIONS // MOBILE ONLY?

    include('hud.php');			// ----- HEADS UP DISPLAY // IN BATTLE?

    
    ?>

</div>

</div> <!-- END MODULE ACTION -->
</form>
    <!-- Displays Feed Module -->

<?php
    $feedClass="";
    if ($infight >= 1) {
        $feedClass="infight";
    }
    echo '<div class="module feed '.$feedClass.'">';
    echo '<div id="feed-module">';
    echo '<div id="feedinside" class="feedinside smallX">';

    // -------------------------DB CONNECT!
    // -------------------------DB QUERY!
$stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();
if (!$result) {
    die('There was an error running the query [' . $link->error . ']');
}
    // -------------------------DB OUTPUT!
    while ($row = $result->fetch_assoc()) {
        echo $row['feed'];
    } ?>
</div> <!-- END FEED INSIDE -->
</div> <!-- END MODULE ACTION -->
<?php
} // END IN GAME
?>
</div> <!-- end ???? -->
</div><!-- end CONTAINER #title -->
</div> <!-- END game tab -->





<script>
function pageScroll() {
    	window.scrollBy(0,0); // horizontal and vertical scroll increments
    	scrolldelay = setTimeout('pageScroll()',100); // scrolls every 100 milliseconds
}
</script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/app.min.js"></script>

<script>
var date = new Date();
    var hours = date.getHours();

    if (hours > 18 || hours < 6) {
        $('body').addClass('night');
    }
    if (hours > 6 && hours < 8) {
        $('body').addClass('dawn');
    }
    if (hours > 18 && hours < 20) {
        $('body').addClass('twilight');
    }
</script>
<script> // scroll to bottom
  $('#feed-module').scrollTop($('#feed-module')[0].scrollHeight);
</script>













</body>
</html>
