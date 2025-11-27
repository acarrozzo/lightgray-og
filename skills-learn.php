<?php
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();
if (!$result) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------DB OUTPUT! 
while($row = $result->fetch_assoc()){ 	



	include('skills-spells-calculator.php'); // LOAD MAX SKILL/SPELLS


// -------------------------------------------------------------------------------One Handed - learn
if($input=='learn one handed') 
{	
	if ($onehanded_cost == 'max') {
		echo $message="You have MAXED out your One Handed skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$onehanded_cost) {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	else { 	
		echo $message = "
		<div class='menuAction'>
		(You spend $onehanded_cost SP)
		<strong class='h3 red'>One Handed </strong>
		is now level
		<strong class='h2 red'>$onehanded_new</strong>
		</div>";		
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET onehanded = onehanded + 1"); 
		// $query = $link->query("UPDATE $user SET sp = sp - $onehanded_cost"); 
		$updates = [ // -- set changes
			'onehanded' => $onehanded + 1,
			'sp' => $sp - $onehanded_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes
		}
}



// $updates = [ // -- set changes
// 	'onehanded' => 3,
// 	'sp' => 10
// ]; 
// updateStats($link, $username, $updates); // -- apply changes
// echo $message = "RESET FOR MAX 1H TEST";
// include ('update_feed.php'); // --- update feed





// -------------------------------------------------------------------------------One Handed - learn MAX
if($input=='max one handed') 
{	 
	if ($onehanded_cost == 'max') {
		echo $message="You have MAXED out your One Handed skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$onehanded_cost && $onehanded_cost !='max') {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	
	else while ($onehanded_cost <= $onehanded_max && $onehanded_cost <= $sp) 
	{
		echo $message = "
		<div class='menuAction'>
		(You spend $onehanded_cost SP)
		<strong class='h3 red'>One Handed </strong>
		is now level
		<strong class='h2 red'>$onehanded_new</strong>
		</div>";		
			
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET onehanded = onehanded + 1");  
		// $query = $link->query("UPDATE $user SET sp = sp - $onehanded_cost"); 

		$updates = [ // -- set changes
			'onehanded' => $onehanded + 1,
			'sp' => $sp - $onehanded_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes

		$onehanded = $onehanded + 1;
		$onehanded_new = $onehanded_new + 1;  
		$sp = $sp - $onehanded_cost;
		$onehanded_cost = $onehanded_cost + 1;
	}
	if($onehanded_max == $onehanded_new-1) {
					echo $message="<strong class='menuAction h3 red'>ONE HANDED MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$onehanded_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}






// -------------------------------------------------------------------------------One Handed PRO - learn
if($input=='learn one handed pro') 
{	
	if ($onehandedpro_cost == 'max') {
		echo $message="You have MAXED out your One Handed Pro skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$onehandedpro_cost) {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	else { 	
		echo $message = "
		<div class='menuAction'> (You spend $onehandedpro_cost SP)
		<strong class='h3 red'>One Handed Pro</strong> is now level <strong class='h2 red'>$onehandedpro_new</strong></div>";		
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET onehandedpro = onehandedpro + 1"); 
		// $query = $link->query("UPDATE $user SET sp = sp - $onehandedpro_cost"); 

		$updates = [ // -- set changes
			'onehandedpro' => $onehandedpro + 1,
			'sp' => $sp - $onehandedpro_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes

		}
}

// -------------------------------------------------------------------------------One Handed Pro - learn MAX
if($input=='max one handed pro') 
{	 
	if ($onehandedpro_cost == 'max') {
		echo $message="You have MAXED out your One Handed Pro skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$onehandedpro_cost && $onehandedpro_cost !='max') {
		echo $message=$notenoughsp;
		include ('update_feed.php'); // --- update feed
	}
	
	else while ($onehandedpro_cost <= ($onehandedpro_max*5) && $onehandedpro_cost <= $sp) {
		echo $message = "
		<div class='menuAction'>
		(You spend $onehandedpro_cost SP)
		<strong class='h3 red'>One Handed Pro</strong>
		is now level
		<strong class='h2 red'>$onehandedpro_new</strong>
		</div>";		
			
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET onehandedpro = onehandedpro + 1");  
		// $query = $link->query("UPDATE $user SET sp = sp - $onehandedpro_cost"); 

		$updates = [ // -- set changes
			'onehandedpro' => $onehandedpro + 1,
			'sp' => $sp - $onehandedpro_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes

		$onehandedpro = $onehandedpro + 1;
		$onehandedpro_new = $onehandedpro_new + 1;  
		$sp = $sp - $onehandedpro_cost;
		$onehandedpro_cost = $onehandedpro_cost + 5;
		}
	if($onehandedpro_max == $onehandedpro_new-1) {
		echo $message="<strong class='menuAction h3 red'>ONE HANDED PRO MAX!</strong>";
		include ('update_feed.php'); 
		}				
	else if($sp<$onehandedpro_cost) {
		echo $message='You don\'t have enough SP!'; 
		include ('update_feed.php');   
		}			
}





// -------------------------------------------------------------------------------Two Handed - learn
if($input=='learn two handed') 
{	
	if ($twohanded_cost == 'max') {
		echo $message="You have MAXED out your Two Handed skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$twohanded_cost) {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	else { 
		echo $message = "
		<div class='menuAction'>
		(You spend $twohanded_cost SP)
		<strong class='h3 red'>Two Handed </strong>
		is now level
		<strong class='h2 red'>$twohanded_new</strong>
		</div>";		
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET twohanded = twohanded + 1"); 
		// $query = $link->query("UPDATE $user SET sp = sp - $twohanded_cost"); 

		$updates = [ // -- set changes
			'twohanded' => $twohanded + 1,
			'sp' => $sp - $twohanded_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes

		}
} 

// -------------------------------------------------------------------------------Two Handed - learn MAX
if($input=='max two handed') 
{	 
	if ($twohanded_cost == 'max') {
		echo $message="You have MAXED out your Two Handed skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$twohanded_cost && $twohanded_cost !='max') {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	
	else while ($twohanded_cost <= $twohanded_max && $twohanded_cost <= $sp) 
	{
		echo $message = "
		<div class='menuAction'>
		(You spend $twohanded_cost SP)
		<strong class='h3 red'>Two Handed </strong>
		is now level
		<strong class='h2 red'>$twohanded_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET twohanded = twohanded + 1");  
		// $query = $link->query("UPDATE $user SET sp = sp - $twohanded_cost"); 
		$updates = [ // -- set changes
			'twohanded' => $twohanded + 1,
			'sp' => $sp - $twohanded_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes
		$twohanded = $twohanded + 1;
		$twohanded_new = $twohanded_new + 1;  
		$sp = $sp - $twohanded_cost;
		$twohanded_cost = $twohanded_cost + 1;
	}
	if($twohanded_max == $twohanded_new-1) {
					echo $message="<strong class='menuAction h3 red'>TWO HANDED MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$twohanded_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}



// -------------------------------------------------------------------------------Two Handed PRO - learn
if($input=='learn two handed pro') 
{	
	if ($twohandedpro_cost == 'max') {
		echo $message="You have MAXED out your Two Handed Pro skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$twohandedpro_cost) {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	else { 	
		echo $message = "
		<div class='menuAction'> (You spend $twohandedpro_cost SP)
		<strong class='h3 red'>Two Handed Pro</strong> is now level <strong class='h2 red'>$twohandedpro_new</strong></div>";		
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET twohandedpro = twohandedpro + 1"); 
		// $query = $link->query("UPDATE $user SET sp = sp - $twohandedpro_cost"); 
		$updates = [ // -- set changes
			'twohandedpro' => $twohandedpro + 1,
			'sp' => $sp - $twohandedpro_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes
		}
}
	
// -------------------------------------------------------------------------------Two Handed Pro - learn MAX
if($input=='max two handed pro') 
{	 
	if ($twohandedpro_cost == 'max') {
		echo $message="You have MAXED out your Two Handed Pro skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$twohandedpro_cost && $twohandedpro_cost !='max') {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	else while ($twohandedpro_cost <= ($twohandedpro_max*5) && $twohandedpro_cost <= $sp) {
		echo $message = "
		<div class='menuAction'>
		(You spend $twohandedpro_cost SP)
		<strong class='h3 red'>Two Handed Pro</strong>
		is now level
		<strong class='h2 red'>$twohandedpro_new</strong>
		</div>";		
			
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET twohandedpro = twohandedpro + 1");  
		// $query = $link->query("UPDATE $user SET sp = sp - $twohandedpro_cost"); 
		$updates = [ // -- set changes
			'twohandedpro' => $twohandedpro + 1,
			'sp' => $sp - $twohandedpro_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes
		$twohandedpro = $twohandedpro + 1;
		$twohandedpro_new = $twohandedpro_new + 1;  
		$sp = $sp - $twohandedpro_cost;
		$twohandedpro_cost = $twohandedpro_cost + 5;
		}
	if($twohandedpro_max == $twohandedpro_new-1) {
		echo $message="<strong class='menuAction h3 red'>Two Handed PRO MAX!</strong>";
		include ('update_feed.php'); 
		}				
	else if($sp<$twohandedpro_cost) {
		echo $message='You don\'t have enough SP!'; 
		include ('update_feed.php');   
		}			
}



// -------------------------------------------------------------------------------Ranged - learn
if($input=='learn ranged') 
{	
	if ($ranged_cost == 'max') {
		echo $message="You have MAXED out your Ranged skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$ranged_cost) {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	else { 
		echo $message = "
		<div class='menuAction'>
		(You spend $ranged_cost SP)
		<strong class='h3 green'>Ranged </strong>
		is now level
		<strong class='h2 green'>$ranged_new</strong>
		</div>";	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET ranged = ranged + 1"); 
		// $query = $link->query("UPDATE $user SET sp = sp - $ranged_cost"); 
		$updates = [ // -- set changes
			'ranged' => $ranged + 1,
			'sp' => $sp - $ranged_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes
		}
}
// -------------------------------------------------------------------------------Ranged - learn MAX
if($input=='max ranged') 
{	 
	if ($ranged_cost == 'max') {
		echo $message="You have MAXED out your Ranged skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$ranged_cost && $ranged_cost !='max') {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	else while ($ranged_cost <= $ranged_max && $ranged_cost <= $sp) 
	{
		echo $message = "
		<div class='menuAction'>
		(You spend $ranged_cost SP)
		<strong class='h3 green'>Ranged </strong>
		is now level
		<strong class='h2 green'>$ranged_new</strong>
		</div>";
		
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET ranged = ranged + 1");  
		// $query = $link->query("UPDATE $user SET sp = sp - $ranged_cost"); 
		$updates = [ // -- set changes
			'ranged' => $ranged + 1,
			'sp' => $sp - $ranged_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes
		$ranged = $ranged + 1;
		$ranged_new = $ranged_new + 1;  
		$sp = $sp - $ranged_cost;
		$ranged_cost = $ranged_cost + 1;
	}
	if($ranged_max == $ranged_new-1) {
					echo $message="<strong class='menuAction h3 green'>RANGED MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$ranged_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}


// -------------------------------------------------------------------------------Ranged PRO - learn
if($input=='learn ranged pro') 
{	
	if ($rangedpro_cost == 'max') {
		echo $message="You have MAXED out your Ranged Pro skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$rangedpro_cost) {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	else { 	
		echo $message = "
		<div class='menuAction'> (You spend $rangedpro_cost SP)
		<strong class='h3 red'>Ranged Pro</strong> is now level <strong class='h2 red'>$rangedpro_new</strong></div>";		
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET rangedpro = rangedpro + 1"); 
		// $query = $link->query("UPDATE $user SET sp = sp - $rangedpro_cost"); 
		$updates = [ // -- set changes
			'rangedpro' => $rangedpro + 1,
			'sp' => $sp - $rangedpro_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes
		}
}
	
// -------------------------------------------------------------------------------Ranged Pro - learn MAX
if($input=='max ranged pro') 
{	 
	if ($rangedpro_cost == 'max') {
		echo $message="You have MAXED out your Ranged Pro skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$rangedpro_cost && $rangedpro_cost !='max') {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	else while ($rangedpro_cost <= ($rangedpro_max*5) && $rangedpro_cost <= $sp) {
		echo $message = "
		<div class='menuAction'>
		(You spend $rangedpro_cost SP)
		<strong class='h3 red'>Ranged Pro</strong>
		is now level
		<strong class='h2 red'>$rangedpro_new</strong>
		</div>";		
			
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET rangedpro = rangedpro + 1");  
		// $query = $link->query("UPDATE $user SET sp = sp - $rangedpro_cost"); 
		$updates = [ // -- set changes
			'rangedpro' => $rangedpro + 1,
			'sp' => $sp - $rangedpro_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes
		$rangedpro = $rangedpro + 1;
		$rangedpro_new = $rangedpro_new + 1;  
		$sp = $sp - $rangedpro_cost;
		$rangedpro_cost = $rangedpro_cost + 5;
		}
	if($rangedpro_max == $rangedpro_new-1) {
		echo $message="<strong class='menuAction h3 red'>Ranged PRO MAX!</strong>";
		include ('update_feed.php'); 
		}				
	else if($sp<$rangedpro_cost) {
		echo $message='You don\'t have enough SP!'; 
		include ('update_feed.php');   
		}			
}




// -------------------------------------------------------------------------------Warcraft - learn
if($input=='learn warcraft') 
{	
	if ($warcraft_cost == 'max') {
		echo $message="You have MAXED out your Warcraft skill!<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$warcraft_cost) {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	else { 
		echo $message = "
		<div class='menuAction'>
		(You spend $warcraft_cost SP)
		<strong class='h3 purple'>Warcraft </strong>
		is now level
		<strong class='h2 purple'>$warcraft_new</strong>
		</div>";	
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET warcraft = warcraft + 1"); 
		// $query = $link->query("UPDATE $user SET sp = sp - $warcraft_cost"); 
		$updates = [ // -- set changes
			'warcraft' => $warcraft + 1,
			'sp' => $sp - $warcraft_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes
		}
}
// -------------------------------------------------------------------------------Warcraft - learn MAX
if($input=='max warcraft') 
{	 
	if ($warcraft_cost == 'max') {
		echo $message="You have MAXED out your Warcraft skill!<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$warcraft_cost && $warcraft_cost !='max') {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	
	else while ($warcraft_cost <= $warcraft_max && $warcraft_cost <= $sp) 
	{
		echo $message = "
		<div class='menuAction'>
		(You spend $warcraft_cost SP)
		<strong class='h3 purple'>Warcraft </strong>
		is now level
		<strong class='h2 purple'>$warcraft_new</strong>
		</div>";
		
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET warcraft = warcraft + 1");  
		// $query = $link->query("UPDATE $user SET sp = sp - $warcraft_cost"); 
		$updates = [ // -- set changes
			'warcraft' => $warcraft + 1,
			'sp' => $sp - $warcraft_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes
		$warcraft = $warcraft + 1;
		$warcraft_new = $warcraft_new + 1;  
		$sp = $sp - $warcraft_cost;
		$warcraft_cost = $warcraft_cost + 1;
	}
	if($warcraft_max == $warcraft_new-1) {
					echo $message="<strong class='menuAction h3 green'>WARCRAFT MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$warcraft_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}

// -------------------------------------------------------------------------------Toughness - learn
if($input=='learn toughness') 
{	
	if ($toughness_cost == 'max') {
		echo $message="You have MAXED out your Toughness skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$toughness_cost) {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	else { 
		echo $message = "
		<div class='menuAction'>
		(You spend $toughness_cost SP)
		<strong class='h3 gold'>Toughness </strong>
		is now level
		<strong class='h2 gold'>$toughness_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET toughness = toughness + 1"); 
		// $query = $link->query("UPDATE $user SET sp = sp - $toughness_cost"); 
		$updates = [ // -- set changes
			'toughness' => $toughness + 1,
			'sp' => $sp - $toughness_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes
		}
}
// -------------------------------------------------------------------------------Toughness - learn MAX
if($input=='max toughness') 
{	 
	if ($toughness_cost == 'max') {
		echo $message="You have MAXED out your Toughness skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$toughness_cost && $toughness_cost !='max') {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	
	else while ($toughness_cost <= $toughness_max && $toughness_cost <= $sp) 
	{
		echo $message = "
		<div class='menuAction'>
		(You spend $toughness_cost SP)
		<strong class='h3 gold'>Toughness </strong>
		is now level
		<strong class='h2 gold'>$toughness_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET toughness = toughness + 1");  
		// $query = $link->query("UPDATE $user SET sp = sp - $toughness_cost"); 
		$updates = [ // -- set changes
			'toughness' => $toughness + 1,
			'sp' => $sp - $toughness_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes
		$toughness = $toughness + 1;
		$toughness_new = $toughness_new + 1;  
		$sp = $sp - $toughness_cost;
		$toughness_cost = $toughness_cost + 1;
	}
	if($toughness_max == $toughness_new-1) {
					echo $message="<strong class='menuAction h3 gold'>TOUGHNESS MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$toughness_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}
// -------------------------------------------------------------------------------Dodge - learn
if($input=='learn dodge') 
{	
	if ($ddge_cost == 'max') {
		echo $message="You have MAXED out your Dodge skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$ddge_cost) {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	else { 
		echo $message = "
		<div class='menuAction'>
		(You spend $ddge_cost SP)
		<strong class='h3 gold'>Dodge </strong>
		is now level
		<strong class='h2 gold'>$ddge_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET ddge = ddge + 1"); 
		// $query = $link->query("UPDATE $user SET sp = sp - $ddge_cost"); 
		$updates = [ // -- set changes
			'ddge' => $ddge + 1,
			'sp' => $sp - $ddge_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes
		}
}
// -------------------------------------------------------------------------------Dodge - learn MAX
if($input=='max dodge') 
{	 
	if ($ddge_cost == 'max') {
		echo $message="You have MAXED out your Dodge skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$ddge_cost && $ddge_cost !='max') {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	
	else while ($ddge_cost <= $ddge_max && $ddge_cost <= $sp) 
	{
		echo $message = "
		<div class='menuAction'>
		(You spend $ddge_cost SP)
		<strong class='h3 gold'>Dodge </strong>
		is now level
		<strong class='h2 gold'>$ddge_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET ddge = ddge + 1");  
		// $query = $link->query("UPDATE $user SET sp = sp - $ddge_cost"); 
		$updates = [ // -- set changes
			'ddge' => $ddge + 1,
			'sp' => $sp - $ddge_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes
		$ddge = $ddge + 1;
		$ddge_new = $ddge_new + 1;  
		$sp = $sp - $ddge_cost;
		$ddge_cost = $ddge_cost + 1;
	}
	if($ddge_max == $ddge_new-1) {
					echo $message="<strong class='menuAction h3 gold'>DODGE MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$ddge_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}
// -------------------------------------------------------------------------------Block - learn
if($input=='learn block') 
{	
	if ($block_cost == 'max') {
		echo $message="You have MAXED out your Block skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$block_cost) {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	else { 
		echo $message = "
		<div class='menuAction'>
		(You spend $block_cost SP)
		<strong class='h3 gold'>Block </strong>
		is now level
		<strong class='h2 gold'>$block_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET block = block + 1"); 
		// $query = $link->query("UPDATE $user SET sp = sp - $block_cost");
		$updates = [ // -- set changes
			'block' => $block + 1,
			'sp' => $sp - $block_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes 
		}
}
// -------------------------------------------------------------------------------Block - learn MAX
if($input=='max block') 
{	 
	if ($block_cost == 'max') {
		echo $message="You have MAXED out your Block skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$block_cost && $block_cost !='max') {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	
	else while ($block_cost <= $block_max && $block_cost <= $sp) 
	{
		echo $message = "
		<div class='menuAction'>
		(You spend $block_cost SP)
		<strong class='h3 gold'>Block </strong>
		is now level
		<strong class='h2 gold'>$block_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET block = block + 1");  
		// $query = $link->query("UPDATE $user SET sp = sp - $block_cost"); 
		$updates = [ // -- set changes
			'block' => $block + 1,
			'sp' => $sp - $block_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes 
		$block = $block + 1;
		$block_new = $block_new + 1;  
		$sp = $sp - $block_cost;
		$block_cost = $block_cost + 1;
	}
	if($block_max == $block_new-1) {
					echo $message="<strong class='menuAction h3 gold'>BLOCK MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$block_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}

// -------------------------------------------------------------------------------Slice - learn
if($input=='learn slice') 
{	
	if ($slice_cost == 'max') {
		echo $message="You have MAXED out your Slice skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$slice_cost) {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	else { 
		echo $message = "
		<div class='menuAction'>
		(You spend $slice_cost SP)
		<strong class='h3 red'>Slice </strong>
		is now level
		<strong class='h2 red'>$slice_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET slice = slice + 1"); 
		// $query = $link->query("UPDATE $user SET sp = sp - $slice_cost"); 
		$updates = [ // -- set changes
			'slice' => $slice + 1,
			'sp' => $sp - $slice_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes 
		}
}
// -------------------------------------------------------------------------------Slice - learn MAX
if($input=='max slice') 
{	 
	if ($slice_cost == 'max') {
		echo $message="You have MAXED out your Slice skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$slice_cost && $slice_cost !='max') {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	
	else while ($slice_cost <= $slice_max && $slice_cost <= $sp) 
	{
		echo $message = "
		<div class='menuAction'>
		(You spend $slice_cost SP)
		<strong class='h3 red'>Slice </strong>
		is now level
		<strong class='h2 red'>$slice_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET slice = slice + 1");  
		// $query = $link->query("UPDATE $user SET sp = sp - $slice_cost"); 
		$updates = [ // -- set changes
			'slice' => $slice + 1,
			'sp' => $sp - $slice_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes 
		$slice = $slice + 1;
		$slice_new = $slice_new + 1;  
		$sp = $sp - $slice_cost;
		$slice_cost = $slice_cost + 1;
	}
	if($slice_max == $slice_new-1) {
					echo $message="<strong class='menuAction h3 red'>SLICE MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$slice_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}
// -------------------------------------------------------------------------------Smash - learn
if($input=='learn smash') 
{	
	if ($smash_cost == 'max') {
		echo $message="You have MAXED out your Smash skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$smash_cost) {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	else { 
		echo $message = "
		<div class='menuAction'>
		(You spend $smash_cost SP)
		<strong class='h3 red'>Smash </strong>
		is now level
		<strong class='h2 red'>$smash_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET smash = smash + 1"); 
		// $query = $link->query("UPDATE $user SET sp = sp - $smash_cost"); 
		$updates = [ // -- set changes
			'smash' => $smash + 1,
			'sp' => $sp - $smash_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes 
		}
}
// -------------------------------------------------------------------------------Smash - learn MAX
if($input=='max smash') 
{	 
	if ($smash_cost == 'max') {
		echo $message="You have MAXED out your Smash skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$smash_cost && $smash_cost !='max') {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	
	else while ($smash_cost <= $smash_max && $smash_cost <= $sp) 
	{
		echo $message = "
		<div class='menuAction'>
		(You spend $smash_cost SP)
		<strong class='h3 red'>Smash </strong>
		is now level
		<strong class='h2 red'>$smash_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET smash = smash + 1");  
		// $query = $link->query("UPDATE $user SET sp = sp - $smash_cost"); 
		$updates = [ // -- set changes
			'smash' => $smash + 1,
			'sp' => $sp - $smash_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes 
		$smash = $smash + 1;
		$smash_new = $smash_new + 1;  
		$sp = $sp - $smash_cost;
		$smash_cost = $smash_cost + 1;
	}
	if($smash_max == $smash_new-1) {
					echo $message="<strong class='menuAction h3 red'>SMASH MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$smash_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}
// -------------------------------------------------------------------------------Aim - learn
if($input=='learn aim') 
{	
	if ($aim_cost == 'max') {
		echo $message="You have MAXED out your Aim skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$aim_cost) {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	else { 
		echo $message = "
		<div class='menuAction'>
		(You spend $aim_cost SP)
		<strong class='h3 green'>Aim </strong>
		is now level
		<strong class='h2 green'>$aim_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET aim = aim + 1"); 
		// $query = $link->query("UPDATE $user SET sp = sp - $aim_cost"); 
		$updates = [ // -- set changes
			'aim' => $aim + 1,
			'sp' => $sp - $aim_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes 
		}
}
// -------------------------------------------------------------------------------Aim - learn MAX
if($input=='max aim') 
{	 
	if ($aim_cost == 'max') {
		echo $message="You have MAXED out your Aim skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$aim_cost && $aim_cost !='max') {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	
	else while ($aim_cost <= $aim_max && $aim_cost <= $sp) 
	{
		echo $message = "
		<div class='menuAction'>
		(You spend $aim_cost SP)
		<strong class='h3 green'>Aim </strong>
		is now level
		<strong class='h2 green'>$aim_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET aim = aim + 1");  
		// $query = $link->query("UPDATE $user SET sp = sp - $aim_cost"); 
		$updates = [ // -- set changes
			'aim' => $aim + 1,
			'sp' => $sp - $aim_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes 
		$aim = $aim + 1;
		$aim_new = $aim_new + 1;  
		$sp = $sp - $aim_cost;
		$aim_cost = $aim_cost + 1;
	}
	if($aim_max == $aim_new-1) {
					echo $message="<strong class='menuAction h3 green'>AIM MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$aim_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}
// -------------------------------------------------------------------------------Multi Arrow - learn
if($input=='learn multi arrow') 
{	
	if ($multiarrow_cost == 'max') {
		echo $message="You have MAXED out your Multi Arrow skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$multiarrow_cost) {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	else { 
		echo $message = "
		<div class='menuAction'>
		(You spend $multiarrow_cost SP)
		<strong class='h3 green'>Multi Arrow </strong>
		is now level
		<strong class='h2 green'>$multiarrow_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET multiarrow = multiarrow + 1"); 
		// $query = $link->query("UPDATE $user SET sp = sp - $multiarrow_cost"); 
		$updates = [ // -- set changes
			'multiarrow' => $multiarrow + 1,
			'sp' => $sp - $multiarrow_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes 
		}
}
// -------------------------------------------------------------------------------Multi Arrow - learn MAX
if($input=='max multi arrow') 
{	 
	if ($multiarrow_cost == 'max') {
		echo $message="You have MAXED out your Multi Arrow skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$multiarrow_cost && $multiarrow_cost !='max') {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	
	else while ($multiarrow_cost <= $multiarrow_max && $multiarrow_cost <= $sp) 
	{
		echo $message = "
		<div class='menuAction'>
		(You spend $multiarrow_cost SP)
		<strong class='h3 green'>Multi Arrow </strong>
		is now level
		<strong class='h2 green'>$multiarrow_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET multiarrow = multiarrow + 1");  
		// $query = $link->query("UPDATE $user SET sp = sp - $multiarrow_cost"); 
		$updates = [ // -- set changes
			'multiarrow' => $multiarrow + 1,
			'sp' => $sp - $multiarrow_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes 
		$multiarrow = $multiarrow + 1;
		$multiarrow_new = $multiarrow_new + 1;  
		$sp = $sp - $multiarrow_cost;
		$multiarrow_cost = $multiarrow_cost + 1;
	}
	if($multiarrow_max == $multiarrow_new-1) {
					echo $message="<strong class='menuAction h3 green'>MULTI ARROW MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$multiarrow_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}


// -------------------------------------------------------------------------------Bolt Upgrade - learn
if($input=='learn bolt upgrade') 
{	
	if ($boltupgrade_cost == 'max') {
		echo $message="You have MAXED out your Bolt Upgrade skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$boltupgrade_cost) {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	else { 
		echo $message = "
		<div class='menuAction'>
		(You spend $boltupgrade_cost SP)
		<strong class='h3 green'>Bolt Upgrade </strong>
		is now level
		<strong class='h2 green'>$boltupgrade_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET boltupgrade = boltupgrade + 1"); 
		// $query = $link->query("UPDATE $user SET sp = sp - $boltupgrade_cost"); 
		$updates = [ // -- set changes
			'boltupgrade' => $boltupgrade + 1,
			'sp' => $sp - $boltupgrade_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes 
		}
}
// -------------------------------------------------------------------------------Bolt Upgrade - learn MAX
if($input=='max bolt upgrade') 
{	 
	if ($boltupgrade_cost == 'max') {
		echo $message="You have MAXED out your Bolt Upgrade skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$boltupgrade_cost && $boltupgrade_cost !='max') {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	
	else while ($boltupgrade_cost <= $boltupgrade_max && $boltupgrade_cost <= $sp) 
	{
		echo $message = "
		<div class='menuAction'>
		(You spend $boltupgrade_cost SP)
		<strong class='h3 green'>Bolt Upgrade </strong>
		is now level
		<strong class='h2 green'>$boltupgrade_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET boltupgrade = boltupgrade + 1");  
		// $query = $link->query("UPDATE $user SET sp = sp - $boltupgrade_cost"); 
		$updates = [ // -- set changes
			'boltupgrade' => $boltupgrade + 1,
			'sp' => $sp - $boltupgrade_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes 
		$boltupgrade = $boltupgrade + 1;
		$boltupgrade_new = $boltupgrade_new + 1;  
		$sp = $sp - $boltupgrade_cost;
		$boltupgrade_cost = $boltupgrade_cost + 1;
	}
	if($boltupgrade_max == $boltupgrade_new-1) {
					echo $message="<strong class='menuAction h3 green'>BOLT UPGRADE MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$boltupgrade_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}



// -------------------------------------------------------------------------------Magic Strike - learn
if($input=='learn magic strike') 
{	
	if ($magicstrike_cost == 'max') {
		echo $message="You have MAXED out your Magic Strike skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$magicstrike_cost) {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	else { 
		echo $message = "
		<div class='menuAction'>
		(You spend $magicstrike_cost SP)
		<strong class='h3 blue'>Magic Strike </strong>
		is now level
		<strong class='h2 blue'>$magicstrike_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET magicstrike = magicstrike + 1"); 
		// $query = $link->query("UPDATE $user SET sp = sp - $magicstrike_cost"); 
		$updates = [ // -- set changes
			'magicstrike' => $magicstrike + 1,
			'sp' => $sp - $magicstrike_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes 
		}
}
// -------------------------------------------------------------------------------Magic Strike - learn MAX
if($input=='max magic strike') 
{	 
	if ($magicstrike_cost == 'max') {
		echo $message="You have MAXED out your Magic Strike skill! Search for more advanced teachers.<br>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$magicstrike_cost && $magicstrike_cost !='max') {
		echo $message=$notenoughsp;include ('update_feed.php');
	}
	
	else while ($magicstrike_cost <= $magicstrike_max && $magicstrike_cost <= $sp) 
	{
		echo $message = "
		<div class='menuAction'>
		(You spend $magicstrike_cost SP)
		<strong class='h3 blue'>Magic Strike </strong>
		is now level
		<strong class='h2 blue'>$magicstrike_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		// $query = $link->query("UPDATE $user SET magicstrike = magicstrike + 1");  
		// $query = $link->query("UPDATE $user SET sp = sp - $magicstrike_cost"); 
		$updates = [ // -- set changes
			'magicstrike' => $magicstrike + 1,
			'sp' => $sp - $magicstrike_cost
		]; 
		updateStats($link, $username, $updates); // -- apply changes
		$magicstrike = $magicstrike + 1;
		$magicstrike_new = $magicstrike_new + 1;  
		$sp = $sp - $magicstrike_cost;
		$magicstrike_cost = $magicstrike_cost + 1;
	}
	if($magicstrike_max == $magicstrike_new-1) {
					echo $message="<strong class='menuAction h3 blue'>MAGIC STRIKE MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$magicstrike_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}
} // -- end while

?>