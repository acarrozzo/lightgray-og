<?php
						$roomname = "Mining Guild FORGE";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc308a'];

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


   			$results = $link->query("UPDATE $user SET craftingtable = '308a'"); // -- set room to crafting table
   			$results = $link->query("UPDATE $user SET fire = '308a'"); // -- set fire to room



// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
		$query = $link->query("UPDATE $user SET hp = $hpmax + 50 "); 
		$query = $link->query("UPDATE $user SET mp = $mpmax + 50 "); 
		echo $message = "You rest at the Guild Forge! (+50 HP, +50 MP)<br>";
		include ('update_feed.php'); // --- update feed
		//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}


// -------------------------------------------------------------------------- READ SIGN!
else if($input=='read sign') { 
   echo '<i>You read the Mining Guild Directory</i> <br>  ';
   	$message="
   <i>you read the sign:</i>   
   <div class='sign darkgrayBG'>
   <h3>Mining Guild <i>Directory</i></h3>
   	<form id='mainForm' method='post' action='' name='formInput'>
<span class='direc'><input type='submit' name='input1' value='east' /></span> <span class='hilight'>Mining Guild Exit</span> <i>Dwarven Village</i><br />
<span class='direc'><input type='submit' name='input1' value='south' /></span> <span class='hilight'>Guild Headquarters</span> <i>Quests 32 - 34</i><br />
<span class='direc'><input type='submit' name='input1' value='west' /></span> <span class='hilight'>Mining Guild Supply Shop</span> <i>Buy Pickaxes & Hammers </i><br />
<span class='direc'><input type='submit' name='input1' value='nw' /></span> <span class='hilight'>The Sentinel Room </span> <i>Battle Test</i><br />
<span class='direc'><input type='submit' name='input1' value='ne' /></span> <span class='hilight'>Neverending Mine</span> <i>Mine Iron, Steel & Mithril</i><br />
---------------------------------------------------<br>
<span class='hilight'>Quest 32-34:</span> 
Visit the <span class='hilight'>Guild Leader</span> to the south to complete the Mining Guild Quests and learn how to Craft better items.<br>
---------------------------------------------------
</form>
</div>";
	include ('update_feed.php'); // --- update feed	
}







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
else if($input=='w' || $input=='west') 
{			echo 'You travel west<br>';
   	$message="<i>You travel west</i><br>".$_SESSION['desc308d'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '308d'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}
else if($input=='nw' || $input=='northwest') 
{			echo 'You travel northwest<br>';
   	$message="<i>You travel northwest</i><br>".$_SESSION['desc308e'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '308e'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}
else if($input=='ne' || $input=='northeast') 
{			echo 'You travel northeast to Mine Level 0<br>';
   	$message="<i>You travel northeast to Mine Level 0</i><br>".$_SESSION['desc311-00'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 'm00'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}
else if($input=='e' || $input=='east') 
{			echo 'You travel east<br>';
   	$message="<i>You travel east</i><br>".$_SESSION['desc308b'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '308b'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}
else if($input=='s' || $input=='south') 
{			echo 'You travel south<br>';
   	$message="<i>You travel south</i><br>".$_SESSION['desc308c'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '308c'"); // -- room change
   			//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		 updateStats($link, $username, ['endfight' => 0]); // -- update stats
}





// ----------------------------------- end of room function
include('function-end.php');
// }
?>