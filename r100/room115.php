<?php
// -- 115 -- Kobold Lair
$roomname = "Kobold Lair";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc115'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

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

if (1!=1) {} //nada




// -------------------------------------------------------------------------- READ SIGN!
else if($input=='read sign') {  //read sign
   
   echo '   <i>You read the sign</i> <br>  ';

   $message="
   <i>you read the sign:</i>   
   <div class='sign'>
   <h3>Magical Kobold's Below! <i></i></h3>
   <form id='mainForm' method='post' action='' name='formInput'>
   ---------------------------------------------------<br>
   <span class='direc'><input type='submit' name='input1' value='down' /></span> <span class='hilight'>Kobold Lair</span><br>
   ---------------------------------------------------<br>
   <span class='hilight'>The enemies below generally drop MAGIC increasing equipment.</span><br>
   ---------------------------------------------------<br>
   <span class='hilight'>Defeat the Kobold Master to join the Wizard's Guild.</span><br>
   ---------------------------------------------------<br>
   </form>
   </div>";
   include ('update_feed.php'); // --- update feed	

}
// -------------------------------------------------------------------------- TRAVEL


// else if($input=='ne' || $input=='northeast') 
// {	echo 'You travel northeast<br>';
//    $message="<i>You travel northeast</i><br>".$_SESSION['desc114'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 114"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='se' || $input=='southeast') 
// {	echo 'You travel southeast<br>';
//    $message="<i>You travel southeast</i><br>".$_SESSION['desc112'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = 112"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }
// else if($input=='d' || $input=='down') 
// {	echo 'You travel down<br>';
//    $message="<i>You travel down</i><br>".$_SESSION['desc115a'];
// 	include ('update_feed.php'); // --- update feed
//    $results = $link->query("UPDATE $user SET room = '115a'"); // -- room change
//    //  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
// 		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
// }

// -------------------------------------------------------------------------- TRAVEL
elseif ($input == 'northeast') { $roomNum = '114';handleTravel($_SESSION['username'], $link, 'northeast', $roomNum, 'desc'.$roomNum.'');} 
elseif ($input == 'southeast') { $roomNum = '112';handleTravel($_SESSION['username'], $link, 'southeast', $roomNum, 'desc'.$roomNum.'');} 

elseif ($input == 'down') {     $roomNum = '115a';handleTravel($_SESSION['username'], $link, 'down', $roomNum, 'desc'.$roomNum.'');}
// ----------------------------------- end of room function
include('function-end.php');
// }
?>
