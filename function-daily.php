<?php
// --------- DAILY Events

// -------------------------DB CONNECT!
include('db-connect.php');

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

    // -------------------------------------------------------------------------- BATTLE VARIABLES
    $infight = $row['infight'];
    $endfight = $row['endfight'];
    $enemy = $row['enemy'];
    $level = $row['level'];
    $chest1 = $row['chest1'];

    $dailychestlast = $row['dailychestlast'];
    $_SESSION['dailychestnextavailable'] = $dailychestnextavailable = $row['dailychestnextavailable'];
    $dailychestcount = $row['dailychestcount'];

    $currency = $row['currency'];
    $room = $row['room'];

    $currenttimedaily = "".date("YmdH"); // Current time rounded to the hour // outside of function to prevent issue when opening chest 1 for the first time

    function calculateDailyChestTimes($dailychestnextavailable) {
        date_default_timezone_set('America/New_York');
        $currenttime = ''.date("Y/m/d H:i:s");
        $currenttimedaily = "".date("YmdH"); // Current time rounded to the hour
        $nextdailychest = ("".date("Ymd") * 100) + 106; // 6 AM the next day
        $nextdailychesthours = $nextdailychest - $currenttimedaily - 77;
        $minutes = "".date("i");
        $nextdailyminutes = 60 - $minutes;

        if ($currenttimedaily > $dailychestnextavailable) {
            $_SESSION['dailychestopenedtoday'] = 0;
        } else {
            $_SESSION['dailychestopenedtoday'] = 0; // This might not be needed
        }

        return [
            'currenttime' => $currenttime,
            'currenttimedaily' => $currenttimedaily,
            'nextdailychest' => $nextdailychest,
            'nextdailychesthours' => $nextdailychesthours,
            'nextdailyminutes' => $nextdailyminutes,
            'dailychestopenedtoday' => $_SESSION['dailychestopenedtoday']
        ];
    }

    if ($infight == 0 && $_SESSION['chest1'] != 0) {
        $_SESSION['dailyChestTimes'] = $dailyChestTimes = calculateDailyChestTimes($dailychestnextavailable);
        $_SESSION['currenttime'] = $currenttime = $dailyChestTimes['currenttime'];
        $_SESSION['currenttimedaily'] = $currenttimedaily = $dailyChestTimes['currenttimedaily'];
        $_SESSION['nextdailychest'] = $nextdailychest = $dailyChestTimes['nextdailychest'];
        $_SESSION['nextdailychesthours'] = $nextdailychesthours = $dailyChestTimes['nextdailychesthours'];
        $_SESSION['nextdailyminutes'] = $nextdailyminutes = $dailyChestTimes['nextdailyminutes'];

        $dailyChestData = calculateDailyChestTimes($dailychestnextavailable);

        if ($currenttimedaily >= $dailychestnextavailable) {
            echo "<p>The daily chest is available to open.</p>";
            echo '<button class="yellowBG dddgray" type="submit" name="input1" value="open daily chest"><span>Open Daily Chest</span></button></br>';
        } else if ($room == '001' && $infight == 0 && $_SESSION['chest1'] != 0) {
            echo "<p class='lgray'>The daily chest has already been opened today.</p>";
            echo "<p class='lgray'>Current Time: " . $dailyChestData['currenttime'] . '</p>';
            echo "<p class='lgray'>Next Daily Chest Available in: " . $dailyChestData['nextdailychesthours'] . " hours and " . $dailyChestData['nextdailyminutes'] . " minutes.</p>";
        }

        if ($input == 'open daily chest') {
            if ($_SESSION['chest1'] == 0) {  // IF GOLD CHEST 1 ISN'T OPENED YET
                echo $message = "<p>You need to open the gold chest here before you can open the daily chest.</p>";
                include('update_feed.php'); // --- update feed
            } else if ($currenttimedaily >= $dailychestnextavailable) { // OPEN DAILY CHEST CHECK
                $dailyChestData['dailychestopenedtoday'] = 1;
                include('function-daily-chest-contents.php'); // --- DAILY CHEST CONTENTS
                $_SESSION['dailychestopenedtoday'] = 1;

                // Update the database with new chest times and count
                $stmt_update = $link->prepare("UPDATE users SET dailychestlast = ?, dailychestnextavailable = ?, dailychestcount = dailychestcount + 1 WHERE username = ?");
                $stmt_update->bind_param("iis", $currenttimedaily, $nextdailychest, $_SESSION['username']);
                $stmt_update->execute();
            } else { // CHEST ALREADY OPENED
                echo $message = "<p>You already opened the Daily Chest today.</p>
                <p> Come back in " . $nextdailychesthours . " hours and " . $nextdailyminutes . " minutes.</p>";
                include('update_feed.php'); // --- update feed
            }
        }
    } // END BIG WHILE NOT IN FIGHT!
} // END WHILE LOOP
?>
