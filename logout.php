<?php session_start(); ?>

<?php include('head.php');?>

<?php
$username = $_SESSION['username'] = null;
$pass = $_SESSION['pass'] = null;



 //$past = time() - 100;

 //this makes the time in the past to destroy the cookie
 //setcookie(ID_my_site, $username, $past);
 //setcookie(Key_my_site, $pass, $past);

echo '<div id="title" class="">
<br/>
<h3>You have Logged Out</h3>
<br/>
<a class="btn blueBG" href="index.php">Return Home</a>
</div> ';
//echo '<a class="btn" href="login.php">Login</a> ';
//echo '<a class="btn" href="register.php">Register</a> </div>';
?>
<?php session_destroy(); ?>
