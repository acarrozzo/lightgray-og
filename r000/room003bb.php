<?php
// -- 003bb --- Destroyed Basement
$roomname = "Destroyed Basement";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc003bb'];
//$dangerLVL = $_SESSION['dangerLVL'] = "3"; // danger level


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
// while($row = $result->fetch_assoc())
// { 
	
$row = getUserData($link, $_SESSION['username']); // --- gets all user data from database


$infight = $row['infight'];
$endfight = $row['endfight'];



//This room is one of many dangerous areas. Enemies have a chance to spawn as you perform actions (like resting or searching).
//You can SEARCH until an enemy spawns naturally or you can ATTACK if you wish to battle right away. <br /><br />
//You win when your enemies HP drops below 0.<br /><br />
//If you health runs low, make sure you eat some meat or drink a red potion to heal up.<br>
// -----------------------------------------------------------------------read sign  
if($input=='read sign') {  //read sign 
   echo	$message="<i>you read the sign:</i> <br /> 
------------------------------------------------------------------------------<br />
<p>In this room, there is a chance for enemies to spawn as you perform certain actions (such as resting or searching). </p>
<br>
<p>You can SEARCH the area to see if an enemy appears, or ATTACK if you want to start a battle right away.</p>
<br>
<p>
To win a battle, you need to reduce your enemy's hit points to zero. If your own health is low, you can eat some meat or drink a red potion to heal yourself.
</p>
------------------------------------------------------------------------------</p>";
	include ('update_feed.php'); // --- update feed	

}


	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1) 
	{	$rand = rand (1,10); 
	}	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE GIANT RAT	- 20%
if(($input=='attack giant rat' || $input=='attack' || $rand <= 2 ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack giant rat') { $input = 'attack'; }
		//$results = $link->query("UPDATE $user SET enemy = 'Giant Rat'");
		$updates = [ 'enemy' => 'Giant Rat']; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
		include ('battle.php');	}
// -------------------------------------------------------------------------- INITIALIZE RAT - 10%
else if(($input=='attack rat' || $rand == 3 ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack rat') { $input = 'attack'; }
		//$results = $link->query("UPDATE $user SET enemy = 'Rat'");
		$updates = [ 'enemy' => 'Rat']; // -- set changes
        updateStats($link, $username, $updates); // -- apply changes
		include ('battle.php'); }

// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack giant rat' || $input=='attack rat') { $input = 'attack'; } 
		include ('battle.php');	}	


// -------------------------------------------------------------------------- SEARCH - fancy function i can try to implement in the future.
function searchCabinBasement($link, $username) {
    $rand = rand(1, 3); // 2/3 chance to find something
    if ($rand == 1 || $rand == 2) {
        $rand2 = rand(1, 10); // 1/10 chance for each item
        $updates = [];
        $message = '';

        switch ($rand2) {
            case 1:
                $message = "You search the cabin basement and find a Blueberry!<br>";
                $updates = ['blueberry' => 'blueberry + 1'];
                break;
            case 2:
                $message = "You search the cabin basement and find 2 Redberries!<br>";
                $updates = ['redberry' => 'redberry + 2'];
                break;
            case 3:
                $message = "You search the cabin basement and find some cooked meat!<br>";
                $updates = ['cookedmeat' => 'cookedmeat + 1'];
                break;
            case 4:
                $message = "You search the cabin basement and find a Crossbow Bolt!<br>";
                $updates = ['bolts' => 'bolts + 1'];
                break;
            case 5:
                $rand3 = rand(5, 25);
                $message = "You search the cabin basement and find $rand3 ".$_SESSION['currency']."!<br>";
                $updates = ['currency' => "currency + $rand3"];
                break;
            case 6:
                $rand3 = rand(2, 5);
                $message = "You search the cabin basement and find $rand3 arrows!<br>";
                $updates = ['arrows' => "arrows + $rand3"];
                break;
            case 7:
                $message = "You search the cabin basement and find a Mace!<br>";
                $updates = ['mace' => 'mace + 1'];
                break;
            case 8:
                $message = "You search the cabin basement and find a Red Potion!<br>";
                $updates = ['redpotion' => 'redpotion + 1'];
                break;
            case 9:
                $message = "You search the cabin basement and find a Dagger!<br>";
                $updates = ['dagger' => 'dagger + 1'];
                break;
            case 10:
                $message = "You search the cabin basement and find a Long Sword!<br>";
                $updates = ['longsword' => 'longsword + 1'];
                break;
        }

        echo $message;
        include('update_feed.php'); // --- update feed

        // Apply updates if any
        if (!empty($updates)) {
            updateStats($link, $username, $updates);
        }
    } else {
        echo $message = "You search the cabin basement and find nothing, you should search again.<br>";
        include('update_feed.php'); // --- update feed
    }

    // Reset fight
    updateStats($link, $username, ['endfight' => 0]);
}

// fancy function to search the cabin basement - currently not used
if ($input == 'searchXXXXX') {
    searchCabinBasement($link, $username);
}


if ($input == 'search')
{
	$rand = rand (1,3); 			//		2/3   // giant rat search
	if ($rand == 1 || $rand == 2) {
		$rand2 = rand(1,10);		//		1/10
		if ($rand2 ==1){
			echo $message="You search the cabin basement and find a Blueberry!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET blueberry = blueberry + 1");
			updateStats($link, $username, ['blueberry' => $blueberry + 1]); // -- update stats
		}
		if ($rand2 ==2){
			echo $message="You search the cabin basement and find 2 Redberry!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET redberry = redberry + 2");
			updateStats($link, $username, ['redberry' => $redberry + 2]); // -- update stats
		}
		if ($rand2 ==3){
			echo $message="You search the cabin basement and find some cooked meat!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET cookedmeat = cookedmeat + 1");
			updateStats($link, $username, ['cookedmeat' => $cookedmeat + 1]); // -- update stats
		}
		if ($rand2 ==4){
			echo $message="You search the cabin basement and find a Crossbow Bolt!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET bolts = bolts + 1");
			updateStats($link, $username, ['bolts' => $bolts + 1]); // -- update stats
		}
		if ($rand2 ==5){
			$rand3 = rand(5,25);
			echo $message= 'You search the cabin basement and find '.$rand3.' '.$_SESSION['currency'].'!<br>';
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET currency = currency + $rand3");
			//$updates = ['currency' => $row['currency'] + $rand3]; // -- set changes
			updateStats($link, $username, ['currency' => $currency + $rand3]); // -- update stats
		}
		if ($rand2 ==6){
			$rand3 = rand(2,5);
			echo $message= 'You search the cabin basement and find '.$rand3.' arrows!<br>';
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET arrows = arrows + $rand3");
			updateStats($link, $username, ['arrows' => $arrows + $rand3]); // -- update stats
		}
		if ($rand2 ==7){
			echo $message="You search the cabin basement and find a Mace!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET mace = mace + 1");
			updateStats($link, $username, ['mace' => $mace + 1]); // -- update stats
		}
		if ($rand2 ==8){
			echo $message="You search the cabin basement and find a Red Potion!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
			updateStats($link, $username, ['redpotion' => $redpotion + 1]); // -- update stats
		}
		if ($rand2 ==9){
			echo $message="You search the cabin basement and find a dagger!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET dagger = dagger + 1");
			updateStats($link, $username, ['dagger' => $dagger + 1]); // -- update stats
		}
		if ($rand2 ==10){
			echo $message="You search the cabin basement and find a Long Sword!<br>";
			include ('update_feed.php'); // --- update feed
			// $results = $link->query("UPDATE $user SET longsword = longsword + 1");
			updateStats($link, $username, ['longsword' => $longsword + 1]); // -- update stats
		}
	}
	else {
		echo $message="You search the cabin basement and find nothing, you should search again.<br>";
		include ('update_feed.php'); // --- update feed
	}
	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	updateStats($link, $username, ['endfight' => 0]); // -- update stats
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
else if($input=='u' || $input=='up') 
	{
	echo 'You travel up<br>';
   	$message="<i>You travel up to the Training Area</i><br>".$_SESSION['desc003c'];
	include ('update_feed.php'); // --- update feed
  // 	$results = $link->query("UPDATE $user SET room = '003c'"); // -- room change
  // 	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight

	   $updates = ['room' => '003c', 'endfight' => 0]; // -- room change + reset fight
	   updateStats($link, $username, $updates); // -- apply changes
	}
else if($input=='e' || $input=='east') 
	{
	echo 'You travel east<br>';
   	$message="<i>You travel east</i><br>".$_SESSION['desc003b'];
	include ('update_feed.php'); // --- update feed
   //	$results = $link->query("UPDATE $user SET room = '003b'"); // -- room change
   //	//  $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	   $updates = ['room' => '003b', 'endfight' => 0]; // -- room change + reset fight
	   updateStats($link, $username, $updates); // -- apply changes
	}	


// ----------------------------------- end of room function
include('function-end.php');
 

// }
?>