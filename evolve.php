<?php
// --------------------------------------------------------------------------------- EVOLVE TAB
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


// ---------------------------------------------------------------------------------- // START VARIABLES
// ---------------------------------------------------------------------------------- // START VARIABLES 
// ---------------------------------------------------------------------------------- // START VARIABLES

$level = $row['level'];

// ---------------------------------------------------------------------------------- // EVOLVE
	
echo '<article data-pop="evolve" id="evolve">
		 <ul> 

<span class="h2">EVOLVE</span>';
						
echo '<br><br>
		<li class="h4">Evolving will reset all your CP and SP, allowing you to re-allocate your stats, skills & spells.</li><br><br>
		
<li>	<input type="submit" class="goldBG hov darkestgray" name="input1" value="evolve" /></li>

<li>	cost: <i class="yellow">1k</i></li>';


echo'</ul></article>';	

// } 
//</form>
//end while
?>