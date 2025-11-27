<?php
// -------------------------------------------ROOM DESCRIPTIONS!
// -------------------------DB CONNECT!
//include('db-connect.php');

// Secure database query
$stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();

// Set session variables
$_SESSION['roomID'] = $userData['room'];
$_SESSION['chest1'] = $userData['chest1'];

include('style_map.php'); // -------------------------MAP STYLES!

$mapID= $_SESSION['roomID'];
   //<div class="mapID $mapID"></div>
   

function directionReset()
{
    $dirReset = [
        'dirN' => "0",
        'dirNE'=> "0",
        'dirE' => "0",
        'dirSE'=> "0",
        'dirS' => "0",
        'dirSW'=> "0",
        'dirW' => "0",
        'dirNW'=> "0",
        'dirU' => "0",
        'dirD' => "0"
       ];
    return $dirReset;
    $dirSW='x';
}

// Load room description
function loadRoomDescription($roomID) {
    // Allow alphanumeric characters, underscores, and hyphens
    $filePath = "roomdesc/" . preg_replace('/[^a-zA-Z0-9_-]/', '', $roomID) . ".php";
    if (file_exists($filePath)) {
        ob_start();
        include($filePath);
        $description = ob_get_contents();
        ob_end_clean();
        return $description;
    }
    return "Room description not found.";
}

$roomID = $_SESSION['roomID'];
$_SESSION['desc' . $roomID] = loadRoomDescription($roomID);

function roomSet($filename)
{
	ob_start();
	directionReset();
	include("roomdesc/".$filename.".php");
	$_SESSION['desc'.$filename] = ob_get_contents();
	ob_end_clean();
}

foreach (glob("roomdesc/*.php") as $filename) {
    $filename = str_replace("roomdesc/", "", $filename);
    $filename = str_replace(".php", "", $filename);
    roomSet($filename);
}

// --- SET ROOM DESC FOR SPECIFIC ROOM
$roomSelect = $roomID;
if ($roomID==$roomSelect) {
    ob_start();
    directionReset();
    include("roomdesc/".$roomID.".php");
    $_SESSION['desc'.$roomID] = ob_get_contents();
    ob_end_clean();
}

// ---------------------------------------------------- 030;
if ($roomID=='030') {
    $_SESSION['dangerLVL'] = "30";
    $dirN='active gray';
    $dirSE='active gray';
}
$_SESSION['desc030'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle"><div class="roomTitle">
<h3>Friendly Giant - Mountain Shortcut</h3>
</div>
</div>
	<p>An enormous smiling giant stands in front of the mountain path. He tells you every creature you encounter north of here is stronger than him, so if you want to pass you must beat him in friendly competition. </p>
	<form id="mainForm" method="post" action="" name="formInput">
<p class=""> All enemies in the mountains are stronger than the Giant here, and no where near as friendly. Beat the giant in combat to take the shortcut north. </p>

<input type="submit" class="XXXredBG h5" name="input1" value="attack friendly giant" /><br>
		<button type="submit" name="input1" value="north">North</button>

	<button type="submit" name="input1" value="southeast">southeast</button>

	</form>
</div></div></html>
HTML;

// ---------------------------------------------------- 101 - Forest Path
if ($roomID=='101') {
    $_SESSION['dangerLVL'] = "2";
    $dirW='active greenfield';
    $dirSE='active green';
}

$_SESSION['desc101'] = <<<HTML
<html><div class="roomBox">
<div class="roomIconTitle">
	<div class="roomIcon green"><i class="ra ra-grass-patch"></i></div>
	<div class="roomTitle">
<h3 class="green">Forest Path</h3>
</div>
</div>
	<p>On a path through the Forest. Go west to return to the Grassy Field.</p>
	<form id="mainForm" method="post" action="" name="formInput">
<div class="roomButtons">
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="southeast">Southeast</button>
	</form>
</div></div></html>
HTML;


include('room-desc-extra.php');

$roomIDlong = 'desc'.$roomID;
echo "$_SESSION[$roomIDlong]";
