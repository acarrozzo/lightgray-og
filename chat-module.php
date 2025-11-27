<?php
 
//session_start();
 
if(isset($_GET['logout'])){    
     
    //Simple exit message
    $logout_message = "<div class='msgln'><span class='left-info'>User <b class='user-name-left'>". $_SESSION['name'] ."</b> has left the chat session.</span><br></div>";
    file_put_contents("chat-log.html", $logout_message, FILE_APPEND | LOCK_EX);
     
    session_destroy();
    header("Location: index.php"); //Redirect the user
}
 
if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
    else{
        echo '<span class="error">Please type in a name</span>';
    }
}
 /*
function loginForm(){
    echo
    '<div id="loginform">
    <p>Please enter your name to continue!</p>
    <form action="index.php" method="post">
      <label for="name">Name &mdash;</label>
      <input type="text" name="name" id="name" />
      <input type="submit" name="enter" id="enter" value="Enter" />
    </form>
  </div>';
}
 */
if(isset($_SESSION['username'])){ // IF LOGGED IN
// // -------------------------DB CONNECT!
// include('db-connect.php');
// // -------------------------DB QUERY!
// $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
// $stmt->bind_param("s", $_SESSION['username']);
// $stmt->execute();
// $result = $stmt->get_result();
// if (!$result) {
//     die('There was an error running the query [' . $link->error . ']');
// }
// // -------------------------DB OUTPUT!
// while ($row = $result->fetch_assoc()) {

$row = getUserData($link, $_SESSION['username']); // --- gets all user data from database
	
$level = $_SESSION['level'] = $row['level'];

if 		($level >= 60) 	{$_SESSION['chatcolor'] = "cyan";}
else if ($level >= 50) 	{$_SESSION['chatcolor'] = "red";}
else if ($level >= 40) 	{$_SESSION['chatcolor'] = "yellow";}
else if ($level >= 30) 	{$_SESSION['chatcolor'] = "gold";}
else if ($level >= 20) 	{$_SESSION['chatcolor'] = "purple";}
else if ($level >= 10) 	{$_SESSION['chatcolor'] = "blue";}
else if ($level >= 5) 	{$_SESSION['chatcolor'] = "green";}
else if ($level >= 1) 	{$_SESSION['chatcolor'] = "white";}
else 					{$_SESSION['chatcolor'] = "lgray";}

//echo $_SESSION['chatcolor'];
}


// }



if(!isset($_SESSION['username'])){ // IF NOT LOGGED IN
	$disabled = "disabled";
}
else {$disabled = "";}

?>
 


        <div class="chat-frame">
		<h4>World Chat</h4>
            <div id="chatbox">
            <?php
            if(file_exists("chat-log.html") && filesize("chat-log.html") > 0){
                $contents = file_get_contents("chat-log.html");          
                echo $contents;
            }
            ?>
            </div>
 
            <form class="chat-form" name="message" action="">
                <input class="ddgrayBG" name="usermsg" type="text" id="usermsg"  <?php echo $disabled ?>/>
                <input class="blueBG <?php echo $disabled ?>" name="submitmsg" type="submit" id="submitmsg" value="Chat" />
            </form>

			<?php
if(!isset($_SESSION['username']))
{
	  echo '<p>Log in to Chat and Play. <a class="green" href data-tab="game"> Log In / Sign Up</a></p><br>';
	}
			?>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            // jQuery Document
            $(document).ready(function () {
                $("#submitmsg").click(function () {
                    var clientmsg = $("#usermsg").val();
                    $.post("post.php", { text: clientmsg });
                    $("#usermsg").val("");
                    return false;
                });
 
                function loadLog() {
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request
 
                    $.ajax({
                        url: "chat-log.html",
                        cache: false,
                        success: function (html) {
                            $("#chatbox").html(html); //Insert chat log into the #chatbox div
 
                            //Auto-scroll           
                            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request
                            if(newscrollHeight > oldscrollHeight){
                                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                            }   
							
                        }
                    });
                }
 


                setInterval (loadLog, 1000);
 
                $("#exit").click(function () {
                    var exit = confirm("Are you sure you want to end the session?");
                    if (exit == true) {
                    window.location = "index.php?logout=true";
                    }
                });
            });

			$('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);
  		//	$("#chatbox").animate({ scrollTop: "300px" });

        </script>
