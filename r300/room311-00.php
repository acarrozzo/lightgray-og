<?php
						$roomname = "Mine Level 0";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc311-00'];

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


 	$pickaxe = $row['pickaxe'];
 	$ironpickaxe = $row['ironpickaxe'];
 	$steelpickaxe = $row['steelpickaxe'];
 	$mithrilpickaxe = $row['mithrilpickaxe'];



// -------------------------------------------------------------------------- NOT IN USE ANYMORE - GOES STRAIGHT TO 1
// -------------------------------------------------------------------------- NOT IN USE ANYMORE - GOES STRAIGHT TO 1
// -------------------------------------------------------------------------- NOT IN USE ANYMORE - GOES STRAIGHT TO 1
// -------------------------------------------------------------------------- NOT IN USE ANYMORE - GOES STRAIGHT TO 1
// -------------------------------------------------------------------------- NOT IN USE ANYMORE - GOES STRAIGHT TO 1
// -------------------------------------------------------------------------- NOT IN USE ANYMORE - GOES STRAIGHT TO 1


// -------------------------------------------------------------------------- READ SIGN!
 if($input=='read sign') {  //read sign
   echo	 '<i>You read the Mine Room Zero Sign.</i><br>';
   
   $message="
   <i>you read the sign:</i>   
   <div class='sign darkgrayBG'>
---------------------------------------------------<br>
<span class='h4 lgray'>Mine Basics</span><br>
<span class='gold'>mine down into the earth using pickaxes to retrieve valuable crafting materials. </span><br>
---------------------------------------------------<br>
encounter random creatures while gathering loot and treasure.<br>
---------------------------------------------------<br>
every 5 levels there is a sub <span class='lightred'>Boss Fight</span> and every 10 levels there is a <span class='lightred'>Boss Fight</span>.<br><br>
at mine level 10 <span class='ddgray'>coal</span> is introduced. <br>
mix <span class='ddgray'>coal</span> and <span class='lightbrown'>iron</span> to create <span class='lightgray'>steel</span>, which is much stronger than <span class='lightbrown'>iron</span>.<br>
---------------------------------------------------<br>


You can mine <span class='gray'>stone</span>, <span class='lightbrown'>iron</span>, <span class='lightgray'>steel</span>, <span class='blue'>mithril</span>, <span class='green'>adamantium</span> & more.</span><br>
With these new materials you can create stronger weapons, armor and items.<br>

---------------------------------------------------<br>
Start by crafting <span class='lightbrown'>iron</span> equipment after you beat the <span class='lightred'>M10 Boss</span>, the <span class='lightred'>Phoenix</span>. <br><br>
You can mine <span class='blue'>mithril</span> at Mine Level 20, but you can only create <span class='blue'>mithril</span> weapons and armor after defeating the <span class='lightred'>M30 Boss</span>. <br>
---------------------------------------------------<br>
<span class='gold'>Create increasingly stronger equipment with each new tier of metal you can mine and then eventually craft with.</span>
<br>
</div>";
	include ('update_feed.php'); // --- update feed	
}		

// mine down into the earth using pickaxes to retrieve valuable crafting materials 
// encounter random creatures while gathering loot and treasure
// every 5 levels there is a sub boss fight and every 10 levels there is a boss fight
// every 10 levels there is also a new ore introduced
// at mine level 10 coal is introduced. 
// mix coal and iron to create steel, which is much stronger than iron

// you can mine stone, iron, steel, mithril, adamantium
// with these new materials you can create stronger weapons, armor and items

// start by crafting iron equipment after you beat the M10 level boss, the Pheonix. 
// Defeat the boss at M20 level and you will be able to craft with Steel.
// you can mine mithril at mine level 20, but you can only create mithril weapons and armor after defeating the M30 boss. 
// create increasingly stronger equipment with each new tier of metal you can mine and then eventually craft with
// there are also quests all about requesting you present yourself in a specific full suit of armor. 



// -------------------------------------------------------------------------- Battle TRAVEL
if ((	$input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='east' || $input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' || $input=='down' )  && $infight >= 1) {
	echo 'You cannot leave the room in the middle of battle!<br>';
   	$message="<i>You cannot leave the room in the middle of battle!</i><br>";
	include ('update_feed.php'); // --- update feed
	}
// -------------------------------------------------------------------------- TRAVEL
else if($input=='sw' || $input=='southwest')  
{			echo 'You travel southwest to the FORGE.<br>';
   	$message="<i>You travel southwest to the FORGE</i><br>".$_SESSION['desc308a'];
	include ('update_feed.php'); // --- update feed
   								// $results = $link->query("UPDATE $user SET room = '308a'"); // -- room change
    $updates = ['endfight' => 0, 'room' => '311' ]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes
}


else if($input=='u' || $input=='up')  
{			echo 'You travel up to the Mine\'s surface.<br>';
   	$message="<i>You travel up to the Mine's surface</i><br>".$_SESSION['desc311'];
	include ('update_feed.php'); // --- update feed
   								// $results = $link->query("UPDATE $user SET room = '311'"); // -- room change
    $updates = ['endfight' => 0, 'room' => '311' ]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes
}
else if($input=='d' || $input=='mine down' || $input=='down') 
{		
		if ($pickaxe<=0 && $ironpickaxe<=0 && $steelpickaxe<=0 && $mithrilpickaxe<=0) {
			echo $message="<i class='redBG lightgray'>You need a pickaxe to mine down!</i><br>";
			include ('update_feed.php'); // --- update feed
		}
		else {
			echo 'You dig down to level 1 in the mine.<br>';
			include ('function-mine.php');	// MINE FOR ORE			
   			$message="<i class='blueBG'>You dig down to mine level 1.</i><br>".$_SESSION['desc311-01'];
			include ('update_feed.php'); // --- update feed
   										// $results = $link->query("UPDATE $user SET room = 'm01'"); // -- room change
    $updates = ['endfight' => 0, 'room' => '311-01' ]; // -- set changes
    updateStats($link, $username, $updates); // -- apply changes
								
		}
}






// ----------------------------------- end of room function
include('function-end.php');
// }
?>