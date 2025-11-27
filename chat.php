<?php

// $row = getUserData($link, $_SESSION['username']); // --- gets all user data from database

echo '<div class="gbox">';
echo '<h1>Global Chat</h1>';
echo '<h3 class="blue">Talk it up</h3>';
echo '<p>Live chat with other players:</p>';


echo '
<div id="chat-all">
<div id="chat-box"></div>
<form id="chat-form">
<input class="" type="text" id="chat-input" placeholder="Say something...">
<button class="redBG" type="submit">Send</button>
</form>
<span id="chat-badge" style="display:none; color: yellow;">New messages!</span>
</div>';

include('users-all.php'); // all users table - move to its own tab probably

echo '</div>';

    //echo '</section>';
// }//</form>
?>