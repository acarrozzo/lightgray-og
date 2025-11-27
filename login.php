<?php
// session_start();
require_once('db-connect.php'); // Ensure this connects to your database

if (!$link) {
    die('Database connection failed: ' . mysqli_connect_error());
}

if (isset($_SESSION['username'])) {

    echo "<p>Beep boop! Logging in 3...</p>";

    $username = $_SESSION['username'];

    // Fetch user data from the `users` table
    $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
    if (!$stmt) {
        die('Prepare failed: ' . $link->error);
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo '<div class="login"><p class="red">Session username does not exist in the database.</p>';
        die('<a class="btn" href="index.php">Return Home</a></div>');
    }

    $row = $result->fetch_assoc();
    if ($_SESSION['pass'] !== $row['password']) {
        echo '<div class="login"><p class="red">Session password does not match the database.</p>';
        die('<a class="btn" href="index.php">Return Home</a></div>');
    }

    // User is authenticated, include members area
    include('members.php');
    die();
}

if (isset($_POST['submit'])) { // If the form has been submitted


    // Validate input
    if (empty($_POST['username']) || empty($_POST['pass'])) {
        echo '<div class="login"><p class="red">You did not fill in a required field.</p>';
        die('<a class="btn" href="index.php">Return Home</a></div>');
    }

    // Sanitize input
    // $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $username = strip_tags($_POST['username']);
    $password = $_POST['pass'];

    // Check if the user exists
    $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
    if (!$stmt) {
        die('Prepare failed: ' . $link->error);
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo '<div class="login"><p class="red">That user does not exist in our database.</p>';
        die('<a class="btn" href="index.php">Return Home</a></div>');
    }

    // Verify password
    $row = $result->fetch_assoc();
    if (!password_verify($password, $row['password'])) {
        echo '<div class="login"><p class="red">Incorrect password, please try again.</p>';
        die('<a class="btn" href="index.php">Return Home</a></div>');
    }

    // Set session variables
    $_SESSION['username'] = $row['username'];
    $_SESSION['pass'] = $row['password']; // Avoid storing plaintext passwords in the session

    // Update recent login time
    $recentlogin = date("Y-m-d H:i:s");
    $stmt = $link->prepare("UPDATE users SET recentlogin = ? WHERE username = ?");
    if (!$stmt) {
        die('Prepare failed: ' . $link->error);
    }
    $stmt->bind_param("ss", $recentlogin, $username);
    $stmt->execute();


    // Redirect to members area
    //include('variables.php');
    include('table-users.php');
    include('table-users-kl.php');
   // include('members.php');
    die();
}

if (!isset($loginFlag)) {
    ?>
    <form id="login" class="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <h3>Log In</h3>
        <div class="inputs">
            <p class="lft hide">Username: </p>
            <input class="whiteBG ddgray inset" type="text" name="username" placeholder="username" maxlength="40" required>
            <p class="lft hide">Password:</p>
            <input class="whiteBG ddgray inset" type="password" name="pass" placeholder="password" maxlength="50" required>
            <input class="btn blueBG login" type="submit" name="submit" value="Login">
        </div>
    </form>
    <?php
}
?>
