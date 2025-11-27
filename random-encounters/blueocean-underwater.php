<?php
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


$hp = $row['hp'];
$mp = $row['mp'];
$coralcoin = $row['coralcoin'];


// -------------------------------------------------------------------------- rand
if ($infight == 0)  // -UNDER OCEAN RAND GENERATOR
	{	$randEncounter = rand (1,5); }	else {$randEncounter=0;}	
// -------------------------------------------------------------------------- INITIALIZE
if( $randEncounter == 1 ) 
	{	
	$randEncounter2 = rand(1,9);
		
		if( $randEncounter2 == 1 ) { 
			echo $message="<br><i> - a nemo looking clown fish swims past you</i><br>";	
			include ('update_feed_alt.php');   // --- update feed
		}
		if( $randEncounter2 == 2 ) { 
			echo $message="<br><i> - a sea horse emerges from the coral</i><br>";	
			include ('update_feed_alt.php');   // --- update feed
		}
		if( $randEncounter2 == 3 ) { 
			echo $message="<br><i> - a purple and blue illuminated jellyfish slowly swim up and down from the surface</i><br>";	
			include ('update_feed_alt.php');   // --- update feed
		}
		if( $randEncounter2 == 4 ) { 
			echo $message="<br><i> - a pulsating gold and red fish swims past and you feel a surge of healing power </i>[ +1000 HP! ]<br>";			
			// $query = $link->query("UPDATE $user SET hp = hp + 1000 "); 
			updateStats($link, $username,['hp' => $hp + 1000 ]); // -- update stat 
			include ('update_feed_alt.php');   // --- update feed
		}
		if( $randEncounter2 == 5 ) { 
			echo $message="<br><i> - a glowing blue fish swims past and you magically restore some magic points </i>[ +500 MP! ]<br>";	
			// $query = $link->query("UPDATE $user SET mp = mp + 500 "); 
			updateStats($link, $username,['mp' => $mp + 500 ]); // -- update stat
			include ('update_feed_alt.php');   // --- update feed
		}
		if( $randEncounter2 == 6 ) { 
			echo $message="<br><i> - a crab nips at your toe. ouch! </i>[ -10 HP! ]<br>";
			// $query = $link->query("UPDATE $user SET hp = hp - 10 "); 	
			updateStats($link, $username,['hp' => $hp - 10 ]); // -- update stat			
			include ('update_feed_alt.php');   // --- update feed
		}
		if( $randEncounter2 == 7 ) { 
			echo $message="<br><i> - you think you see a glowing squid looking beast in the distance, but then it fades from view</i><br>";	
			include ('update_feed_alt.php');   // --- update feed
		}
		if( $randEncounter2 == 8 ) { 
			echo $message="<br><i> - a shark swim past but then hurries back into the shadows</i><br>";	
			include ('update_feed_alt.php');   // --- update feed
		}
		if( $randEncounter2 == 9 ) { 
			echo $message="<br><i> - a giant whale swims by and coughs up a Coral Coin! </i>[ + ARTIFACT! ]<br>";	
			// $query = $link->query("UPDATE $user SET coralcoin = coralcoin + 1 "); 		
			updateStats($link, $username,['coralcoin' => $coralcoin + 1 ]); // -- update stat					
			include ('update_feed_alt.php');   // --- update feed
		}
		
	} 

	

	
	
// } // ---end while


?>