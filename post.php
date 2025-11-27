<?
/*session_start();
if(isset($_SESSION['name'])){
	$text = $_SESSION['name']." say's : ".$_POST['text'];
	
	$fp = fopen("chat-log.html", 'a');
	fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>xxxx".$_SESSION['name']."</b>: ".stripslashes(htmlspecialchars($text))."222<br></div>");
	fclose($fp);
}*/
?>

<?php
/*session_start();
if(isset($_SESSION['name'])){
    $text = $_POST['text'];
     
    $text_message = "<div class='msgln'><span class='chat-time'>".date("g:i A")."</span> <b class='user-name'>".$_SESSION['name']."</b> ".stripslashes(htmlspecialchars($text))."<br></div>";
    file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);
}*/
?>




<?php

//https://www.w3schools.com/php/func_date_gmdate.asp

session_start();

if(isset($_SESSION['name']) && $_POST['text']!=''){
	date_default_timezone_set('America/New_York');

    $text = $_POST['text'];
     
    $text_message = "<div class='msgln'><span class='gray chat-time'><span class='gray chat-day'> ".date("n.j")." </span> ".date("H:i:s")."</span> <span class='".$_SESSION['chatcolor']."' chat-name'>".$_SESSION['name']."</span> (".$_SESSION['level'].")  : ".stripslashes(htmlspecialchars($text))."<br></div>";
     
    file_put_contents("chat-log.html", $text_message, FILE_APPEND | LOCK_EX);

            $username = $_SESSION['name'];
            //  EMAIL FOR CHAT MESSAGE
            $to = "acarrozzo+lg@gmail.com";
            $subject =' - LG CHAT - '. $username.' says "'.$text.'"';  
            $txt = ''.$username.' says "'.$text.'"';
            mail($to,$subject,$txt);
            // END EMAIL

}


?>