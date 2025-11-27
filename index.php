<?php 
if (session_status() === PHP_SESSION_NONE) {
  session_start();
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





// function getChatData($link, $username) {
//     $stmt = $link->prepare("SELECT * FROM users_chat WHERE username = ?");
//     if (!$stmt) {
//         error_log('Database prepare failed: ' . $link->error);
//         die('An error occurred. Please try again later.');
//     }
//     $stmt->bind_param("s", $username);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     if ($result->num_rows === 0) {
//         die('Chat data not found.');
//     }
//     return $result->fetch_assoc();
// }
// // $row = getChatData($link, $username); // --- gets all chat data from database


// function getUsernameColor($level) {
//     $colors = [
//         '#999999', // 0-9 gray
//         '#00cc00', // 10-19 green
//         '#0066ff', // 20-29 blue
//         '#9900cc', // 30-39 purple
//         '#ff6600', // 40-49 orange
//         '#cc0000', // 50-59 red
//         '#ffcc00', // 60-69 gold
//         '#00ffff', // 70-79 cyan
//         '#ff00ff', // 80-89 magenta
//         '#ffffff', // 90+ white
//     ];
//     return $colors[min(intval($level / 10), count($colors) - 1)];
// }
// function fetchChatMessages($link) {
//     $result = $link->query("SELECT username, message, timestamp, user_level FROM chat_messages ORDER BY id DESC LIMIT 100");
//     $messages = [];
//     while ($row = $result->fetch_assoc()) {
//         $color = $_SESSION['getUsernameColor'] = getUsernameColor($row['user_level']);
//         $time = date("H:i", strtotime($row['timestamp']));
//         $messages[] = "<p><span style='color:gray;'>[$time]</span> <strong style='color:$color;'>{$row['username']}</strong>: {$row['message']}</p>";
//     }
//     return implode('', array_reverse($messages)); // most recent at bottom
// }


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


// this updates the last active time in the database for the user
if (isset($_SESSION['username'])) {
    $stmt = $link->prepare("UPDATE users SET last_active = NOW() WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();
    $stmt->close();
}

// this updates the user's status to active if they are logged in
// Get user's previous status
$stmt = $link->prepare("SELECT last_active, is_active FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($last_active, $was_active);
$stmt->fetch();
$stmt->close();

// Determine new status
$now = new DateTime();
$last = new DateTime($last_active);
$diff = $now->getTimestamp() - $last->getTimestamp();
$nowStr = $now->format('Y-m-d H:i:s');

$is_active = true; // Assume they're now active

// If they were inactive and now active again
if (!$was_active && $diff >= 3600) {
    broadcastSystemFeedMessage($link, "$username is now active again.");
} 

// Update last_active and is_active if status changed
$stmt = $link->prepare("UPDATE users SET last_active = ?, is_active = ? WHERE username = ?");
$stmt->bind_param("sis", $nowStr, $is_active, $username);
$stmt->execute();
$stmt->close();
// -- end of updating last active time and status







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
    	<section data-pop2="chat" id="chat" class="panel training"> <?php include('chat.php'); ?> </section>
	<div class="subMenu">
		<span class="menuIcon2 activXXX" data-link2="world"><span>World</span></span>
		<span class="menuIcon2" data-link2="chat"><span>Chat</span></span>
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








<script> // CHAT SCRIPT - MOVE EVENTUALLY TO SEPARATE FILE
// This script handles the chat functionality, including fetching messages and sending new ones.
// It uses the Fetch API to communicate with the server and updates the chat box in real-time.
// It also manages the chat badge visibility based on whether the window has focus or not.

let lastId = 0;
let hasFocus = true;

window.addEventListener("focus", () => hasFocus = true);
window.addEventListener("blur", () => hasFocus = false);

let lastMessageDate = null; // tracks the last date header shown

function appendMessage(msg) {
    const chatBox = document.getElementById('chat-box');
    const level = parseInt(msg.user_level || 1);
    const levelClass = getLevelColorClass(level);

    const msgDate = new Date(msg.timestamp);
    const dateString = formatDateHeader(msgDate); // e.g., "June 15, 2025"
    const timeString = formatTime(msgDate);       // e.g., "14:05"

    // Add date header if this message is on a different date
    if (lastMessageDate !== dateString) {
        // const dateDivider = document.createElement('div');
        const dateDivider = document.createElement('h3');
        dateDivider.className = 'date-divider';
        dateDivider.textContent = dateString;
        chatBox.appendChild(dateDivider);
        lastMessageDate = dateString;
    }

    // Add message
    const messageDiv = document.createElement('div');
    messageDiv.className = 'chat-message';
    // messageDiv.innerHTML = `
    //     <span class="timestamp">[${timeString}]</span>
    //     <strong class="${levelClass}">[${level}] ${msg.username}</strong>: ${msg.message}
    // `;
        messageDiv.innerHTML = `
        <strong class="${levelClass}">[${level}] ${msg.username}</strong>: ${msg.message}   <span class="timestamp">${timeString}</span>
    `;
    chatBox.appendChild(messageDiv);
    chatBox.scrollTop = chatBox.scrollHeight;
}
function formatTime(date) {
    const h = String(date.getHours()).padStart(2, '0');
    const m = String(date.getMinutes()).padStart(2, '0');
    return `${h}:${m}`;
}

function formatDateHeader(date) {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return date.toLocaleDateString(undefined, options); // uses browser locale
}
function getLevelColorClass(level) {
    if (level >= 60) return 'lvl-60';
    if (level >= 50) return 'lvl-50';
    if (level >= 40) return 'lvl-40';
    if (level >= 30) return 'lvl-30';
    if (level >= 20) return 'lvl-20';
    if (level >= 10) return 'lvl-10';
    return 'lvl-0';
}

function fetchMessages() {
    fetch(`chat-get-message.php?last_id=${lastId}`)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                data.forEach(msg => {
                    appendMessage(msg);
                    lastId = msg.id;
                });
                if (!hasFocus) {
                    document.getElementById('chat-badge').style.display = 'inline';
                }
            }
        });
}
setInterval(fetchMessages, 3000); // Poll every 3 seconds
// Optional: fetch once on load
fetchMessages();

// this function fetches the feed from the server every 5 seconds and updates the feed inside the module.
// this is used to catch any messages sent by other users in the chat and display them in the feed.
let lastFeedContent = null;

function fetchFeed() {
    fetch('feed-get.php')
        .then(response => response.json())
        .then(data => {
            if (data.feed !== undefined) {
                if (lastFeedContent !== data.feed) { // this checks if the feed content has changed
                    document.getElementById('feedinside').innerHTML = data.feed; // updates the feed inside the module if it has changed
                    lastFeedContent = data.feed; 
                }
            }
        });
}
// Update feed every 5 seconds
setInterval(fetchFeed, 5000);
// Optional: fetch once on load
fetchFeed();



document.getElementById('chat-form').addEventListener('submit', function (e) {
    e.preventDefault();
    const input = document.getElementById('chat-input');
    const message = input.value.trim();
    var currentUserLevel = <?php echo isset($_SESSION['level']) ? (int)$_SESSION['level'] : 1; ?>;
    
    if (message !== '') {
        fetch('chat-send-message.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'message=' + encodeURIComponent(message) + '&level=' + encodeURIComponent(currentUserLevel)
        })
        .then(response => response.text())
        .then(text => {
           // console.log('Server said:', text); // optionally log for debugging
            input.value = '';
            fetchMessages(); // instantly update chat
            document.getElementById('chat-badge').style.display = 'none';
        });
    }
});

</script>





<script>
let lastUserList = [];

function updateRoomUserButtons() { // this function fetches the list of users in the room and updates the buttons accordingly.
    // Fetch the list of users in the room
    fetch('get-room-users.php')
        .then(response => response.json())
        .then(users => {
            // Sort both arrays for reliable comparison
            const newList = [...users].sort();
            const oldList = [...lastUserList].sort();

            // Compare as JSON strings for simplicity
            if (JSON.stringify(newList) !== JSON.stringify(oldList)) {
                // Update stored list
                lastUserList = users;

                // Update DOM
                const container = document.getElementById('room-users-container');
                container.innerHTML = ''; // Clear old buttons

                if (users.length > 0) {
                    const label = document.createElement('p');
                    label.className = 'gold';
                    label.textContent = 'Also Here:';
                    container.appendChild(label);

                    users.forEach(user => {
                        const form = document.createElement('form');
                        form.method = 'post';
                        form.className = 'inline-form';

                        const button = document.createElement('button');
                        button.className = 'oceanBGXXX userButton';
                        button.type = 'submit';
                        button.name = 'input1';
                        button.value = `view ${user.username}`;
                        button.textContent = `[${user.level}] ${user.username}`;

                        form.appendChild(button);
                        container.appendChild(form);
                    });


                    const dot = document.createTextNode('•');
                    container.appendChild(dot);
                }
            }
        })
        .catch(err => console.error('Error fetching room users:', err));
}

// Refresh every 5 seconds
setInterval(updateRoomUserButtons, 5000);
// Run immediately on page load
updateRoomUserButtons();
</script>



<script> // This script checks for new messages in the chat every 5 seconds and updates the chat box if there are new messages.
// It also manages the visibility of the chat badge to indicate new messages.
  // let lastMessageCount = 0;

// function loadChat() {
//     fetch('get_chat.php')
//         .then(response => response.text())
//         .then(data => {
//             document.getElementById('chat-box').innerHTML = data;
//         });
// }

// function checkNewMessages() {
//     fetch('chat-count-get.php')
//         .then(response => response.json())
//         .then(data => {
//             if (data.count > lastMessageCount) {
//                 document.getElementById('chat-badge').style.display = 'inline';
//                 lastMessageCount = data.count;
//                 loadChat();
//             }
//         });
// }

// setInterval(checkNewMessages, 5000); // Poll every 5 sec



</script>





</body>
</html>
