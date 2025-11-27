<?php session_start();?>
<?php include('head.php');?>
<title>Light Gray RPG WORLD TOOL</title>




<style>
  .full {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    position: fixed;
    left: 0;
    right: 0;
    top: 0;
    max-width: 100vw;
    max-height: 100vh;
    padding: 0;
    z-index: 6;
    background: #000000cc !important;
    width: 100vw;
    height: 100vh;
  }
  .mapCubes {
    width: 94vw;
    height: 94vh;
    max-width: 94vh;
    max-height: 94vw;
    gap: 0;
  }
  .mapCubes p {
    display:none;
  }
  .mapCube {
    background:none;
    padding:2px;
    flex-basis: 33.33333%;
  }
  .full img {
    width: initial;
    height: initial;
  }

#tabs {     
    top: 0;
    z-index: 6;
    position: fixed;
    left: 0;
    right: 0;
    margin: 0;
    display: flex;

	border-bottom: solid 2px #111;
    height: 30px;
    align-items: center;
    align-items: stretch;
    justify-content: space-around;
	gap:1px;
}
#tabs .tab {
		cursor: pointer;
		width: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
		background: #333;
}
#tabs .tab.active {
			background:#111;
			pointer-events: none;
		}
		#tabs .tab:hover {
			background-color:#222;
		}
    #tabs li a {
    display: block;
    padding: 12px 12px;
    color:$lightgray;
	    font-weight: bold;
}
	#tabs li a.active {background:$gold;color:$darkergray;}

#tabs a.hilight {
    color:$gold;
}
#tabs a:hover {
    background: $gray;
}

.tab-content {
	display:none;
}
.tab-content.active {display:block;}

/* -- ----------------------------- CHAT BOX -- */
#chatbox {
    text-align: left;
    height: 18rem;
    border: none;
    overflow: auto;
    padding: 1rem;
    border-bottom: solid 1px #ccc;
}
.chat-frame {
    border: solid 1px #ccc;
    margin: 1rem auto;
}
.chat-frame h4 {
		text-align: left;
		padding: 1rem;
		border-bottom: solid 1px #ccc;
	}

.chat-form {
	display: flex;
	padding: 10px;
}
.chat-day {
	font-size:1rem;
}
input#usermsg {
    width: 100%;
    margin-right: 10px;
	font-size: 1.4rem;
}
</style>


<!--
<body>
-->
<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

// -------------------------DB CONNECT!
require_once('db-connect.php');




// run createKillListVariables
createKillListVariables($link, $_SESSION['username']);



?>
<title>WORLD TOOL</title>
<main class="worldtool">
<!-- MAIN TABS -->
<div id="tabs">
<div class="tab active" data-tab="world-tool">World Tool</div>
<!--<div class="tab" data-tab="leaderboards">Leaderboards</div>-->
<!--<div class="tab" data-tab="chat">Chat</div>-->
<div class="tab" data-tab="maps">Maps</div>
<div class="tab" data-tab="hints">Hints & Tips</div>
<div class="tab" data-tab="game">Play Game</div>

<!-- <div class="tab" data-tab="system">System</div>-->

</div>



<?php
    //include('world-tool.php');
  ?>
 <!-- </div> END WORLD TOOL CONTAINER -->
<!--  </div>END WORLD TOOL tab -->



<div class="tab-content" data-tab-content="game">

<h1>Light Gray RPG<br>World Tool</h1>

<?php  echo '<span class="icon white chest">'.file_get_contents("img/svg/chest.svg").'</span>';?>

<a href="index.php" class="btn goldBG" target="game">
  Play Light Gray RPG</a>
</div>


<div class="tab-content active" data-tab-content="world-tool">

<?php

//$user = $username = $_SESSION['username'];
if(isset($_SESSION['username'])){
  $user = $username = $_SESSION['name'] = $_SESSION['user'] = $_SESSION['username'];
  echo 'You are logged in as <span class="'.$_SESSION['chatcolor'].'">'.$username.'</span> ('.$_SESSION['level'].') ';
//  echo '| <a class="green" target="_blank" href="index.php" target="game"> Play the Game > </a>';
}
  else{
    echo '<p>Log in to Chat and Play. <a class="green" href="index.php" target="game"> Log In / Create New Character</a></p>';
  }

  echo '<div clas="chat-frame">';


  
 include ('chat-module.php');
//  include ('test-chat.php');

echo '</div>';

echo '

<p>Light Gray</p>
<h3>Characters</h3>
<p class="gray padd">click on the headers to sort.</p>

';
  //  $listdbtables = array_column(mysqli_fetch_all($link->query('SHOW TABLES')),0);
echo '<table class="table searchable sortable"><tr>
<th class="stick-right"><strong>Name</strong></th>
<th>Level</th>
<th>HP</th>
<th>MP</th>
<th>PT</th>
<th>MT</th>
<th>Weapon</th>
<th>Helm</th>
<th>Body</th>
<th>Kills</th>
<th>Last Enemy</th>
<th>Deaths</th>

<th>Room#</th>
<th>Quests</th>
<th>Chests</th>
<th>EXP</th>

<th>Clicks</th>
<th>Last Login</th>
</tr>';
//<th>Feed</th>

  if($stmt = $link->query("SHOW TABLES")){
    $numRecords = "<p>Total characters : ".$stmt->num_rows."</p>";
    while ($row = $stmt->fetch_array()) {
      $temp = $row[0];
      $sql = "SELECT * FROM $temp;";
      $result = mysqli_query($link, $sql);
      $resultCheck = mysqli_num_rows($result); //optional
      if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          if ($row['clicks']==0) {
            $hider = "hide";
            $hider = "lgray";
            $hider = "fade";
          } else {$hider="";}
          $username = $row['username'];
          echo '<tr class="'.$hider.'">';
          echo '<td class="stick-left"><strong><a class="gold" href="profile.php?char='.$username.'">'.$username.'</a></strong></td>';
          echo '<td>'.$row['level'].'</td>';
          echo '<td class="red">'.$row['hpmax'].'</td>';
          echo '<td class="blue">'.$row['mpmax'].'</td>';
          echo '<td class="">'.$row['physicaltraining'].'</td>';
          echo '<td>'.$row['mentaltraining'].'</td>';
          echo '<td>'.$row['equipR'].'</td>';
          echo '<td>'.$row['equipHead'].'</td>';
          echo '<td>'.$row['equipBody'].'</td>';

          echo '<td class="darkred">'.$_SESSION['KLtotalkill'].'</td>';
          $enemy=$row['enemy'];
          if ($enemy=="eName") {
            $enemy="-";
          }
          echo '<td class="">'.$enemy.'</td>';
          echo '<td class="darkred">'.$row['deaths'].'</td>';
          echo '<td>'.$row['room'].'</td>';
          $i=01;
          $count=0;
          while ($i<=70) {
              if ($row['quest'.$i.'']>=2){
                $count++;
              }
              $i++;
          }
          echo '<td class="gold">'.$count.'</td>'; // completed quests
          $i=1;
          $count=0;
          while ($i<=10) {
              if ($row['chest'.$i.'']>=1){
                $count++;
              }
              $i++;
          }
          echo '<td class="gold">'.$count.'</td>'; // gold chests
          echo '<td class="green">'.$row['xp'].'</td>';
        //  echo '<td class="scroll"><div class="inside">'.$row['feed'].'</div></td>'; // FEED SCROLL
        echo '<td>'.$row['clicks'].'</td>';
        echo '<td>'.$row['recentlogin'].'</td>';

          echo '</tr>';
        }
      }
    }

  }
  else{
  echo $conn->error;
  }
  echo '</table>';
  echo $numRecords;

 // echo '<p class="padd">Play now: <a class="blue underline" target="_blank" href="index.php" target="game"> Light Gray RPG | Trials of Vega</a></p>';
  echo '<p class="padd">Play now: <a class="green" href="index.php" target="game"> Log In / Create New Character</a></p>';

?>
</div> <!-- /////////////////////// END WORLD TOOL TAB -->




<div class="tab-content" data-tab-content="maps">
<div class="mapCubes">

<div class="mapCube fullClick"><p>Star City</p><img src="img/lightgray_map_starcity.jpg"></div>
<div class="mapCube fullClick"><p>Mountains</p><img src="img/lightgray_map_mountains.jpg"></div>
<div class="mapCube fullClick"><p>Dark Forest</p><img src="img/lightgray_map_dark_forest_main.jpg"></div>

<div class="mapCube fullClick"><p>Blue Ocean</p><img src="img/lightgray_map_blueocean_main.jpg"></div>
<div class="mapCube fullClick"><p>Grassy Field</p><img src="img/lightgray_map_grassyfield_main.jpg"></div>
<div class="mapCube fullClick"><p>Forest</p><img src="img/lightgray_map_forest_main.jpg"></div>

<div class="mapCube fullClick"><p>Swamp</p><img src="img/lightgray_map_swamp_main.jpg"></div>
<div class="mapCube fullClick"><p>Rock Flats</p><img src="img/lightgray_map_rockyflats_main.jpg"></div>
<div class="mapCube fullClick"><p>Red Town</p><img src="img/lightgray_map_redtown_main.jpg"></div>
</div>
</div>

<script>
// Get all elements with the class .fullClick
const fullClickContainers = document.querySelectorAll('.fullClick');

// Loop through each fullClick container
fullClickContainers.forEach(function(container) {
  container.addEventListener('click', function() {
    container.classList.toggle('full'); // Toggle the 'full' class on/off
  });
});
</script>





<div class="tab-content" data-tab-content="hints">
<div class="worldtool">
<h2> Hints & Tips </h2>

<p>Always spend your TRAINING POINTS when you level! They increases your Physical Training or Mental Training, which in turn gives you more HP & MP respectively when you level.</p>
<br>
<p>There are 4 Core Stats: Strength, Dexterity, Magic and Defense</span></p>
<p><span class="red">STR </span>increases damage with <span class="red">melee weapons</span></p>
<p><span class="green">DEX </span> increases damage with <span class="green">ranged weapons</span></p>
<p><span class="blue">MAG </span> increases damage and power when <span class="blue">casting spells</span></p>
<p><span class="gold">DEF </span> increases your ability to <span class="gold">block damage</span> when attacked</p>
<br>
<p>If you're unsure what to do, check your QUESTS tab</p>

<br>
<p>Equip items using the INV tab. Equipped items increase your 4 core stats. It makes sense to try and max out the stat that correlates with your weapon type. For begginers it's recommended to equip melee weapons and increase STR.</p>

<br>
<p>
SEARCH: Most rooms have absolutely nothing to find when searching.
</p>
<p>However if you get a different prompt than "You search the room and find nothing." then there is something else possible. But otherwise no need to keep searching
</p>




</div>
</div> <!-- /////////////////////// END HINTS TAB -->
<!-- /////////////////////// START SYSTEM TAB -->
<div class="tab-content"  data-tab-content="system">
<div>
<?php include('system.php');?>
</div> <!-- END system CONTAINER -->
</div><!-- /////////////////////// END SYSTEM TAB -->



</main> <!--end world tool container-->
<?php

/*
// ---======== = = = = = = =
$sql = "SELECT * FROM Superior;";
$sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA LIKE 'lg_db';";
//$sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES ORDER BY level DESC LIMIT 1,15;";
//$sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES;";

//$sql = "SELECT * FROM ?;";
    //  $sql = "SELECT * FROM sys.tables;";
    //  $sql = "SELECT * FROM information_schema;";
//$sql = "SELECT * FROM lg_db;";
$result = mysqli_query($link, $sql);
$resultCheck = mysqli_num_rows($result); //optional
if ($resultCheck > 0) {
  //while($row = $result->fetch_assoc()) {
  //  var_dump($row);
  //}
  while ($row = mysqli_fetch_assoc($result)) {
  //  while ($row = mysqli_fetch_array($result)) {
//  while($row = $result->fetch_assoc()) {

    echo '<p>'.$row['username'].'</p>';
    echo '<p>'.$row['level'].'</p>';
    echo '<p>'.$row['room'].'</p>';
    echo '<p>'.$row['xp'].'</p>';
    //var_dump($row);

  }

}
//======


    $result = mysqli_query('SHOW TABLES',$conn) or die('cannot show tables');
    while($tableName = mysql_fetch_row($result)) {

    	$table = $tableName[0];

    	echo '<h3>',$table,'</h3>';
    	$result2 = mysql_query('SHOW COLUMNS FROM '.$table) or die('cannot show columns from '.$table);
    	if(mysql_num_rows($result2)) {
    		echo '<table cellpadding="0" cellspacing="0" class="db-table">';
    		echo '<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default<th>Extra</th></tr>';
    		while($row2 = mysql_fetch_row($result2)) {
    			echo '<tr>';
    			foreach($row2 as $key=>$value) {
    				echo '<td>',$value,'</td>';
    			}
    			echo '</tr>';
    		}
    		echo '</table><br />';
    	}
    }


//====


function get_tables()
{
  $tableList = array();
  $res = mysqli_query($this->conn,"SHOW TABLES");
  while($cRow = mysqli_fetch_array($res))
  {
    $tableList[] = $cRow[0];
  }
  return $tableList;
}


/*
$query = "SELECT * FROM *";
$results=mysqli_query($link,$query);
$row_count=mysqli_num_rows($results);

echo "<table>";
while ($row = mysqli_fetch_array($results)) {
echo "<tr><td>".($row['id'])."</td></tr>";
}
echo "</table>";

mysqli_query($con,$query);
mysqli_close($con);
*/


//ini_set('display_errors', 'on');
//error_reporting(E_ALL);


?>
<!--
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/app.min.js"></script>
-->

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>



</body>
</html>



<style>
.worldtool {
  padding:2rem;
  text-align: center;
}
td.scroll {
  font-size: 10px;
	max-height: 70vh;
	max-width: 100vw;
	overflow: scroll;
	display: inline-block;
  text-align: center;
  position: relative;
	max-width: 20rem;
  max-height: 2.5rem;


}
.table {
	border-spacing: 0;
  margin:2rem auto;
  text-align: left;
  background:#111;
  max-width: 100vw;
  overflow: auto;
  display: block;
}
.table td {
	padding: .2rem 0.5rem;
	border: solid 1px #222;
}
.table th {
  position: sticky;
	top: 0;
	background: #000;
	padding: 0.4rem 1.5rem 0.4rem 0.5rem;
	border: solid 1px #222;
	z-index: 1;
  cursor:pointer;
}
.stick-left {
	position: sticky;
	left: 0;
	background: #000;
}
.fade {opacity:.3;}
#sorttable_sortfwdind, #sorttable_sortrevind {
	position: absolute;
}
</style>


<script>

  // --------- ac - DATA TABS AC POP FUNCTION - data tab - data tab content - .closePop
	$("[data-tab]").click(function(e){

		e.preventDefault();
		var tab_id = $(this).attr('data-tab');

			$('[data-tab]').removeClass('active');
			$('[data-tab-content]').removeClass('active');
   			//$('[data-tab="' + tab_id + '"]').parent().parent().addClass('active');
   			//$(this).closest('[data-tab-content]').addClass('active');

		//	$('this').addClass('active');
			$('[data-tab="' + tab_id + '"]').addClass('active');
			$('[data-tab-content="' + tab_id + '"]').addClass('active');

	//	$("#chatbox").scrollTop($("#chatbox")[0].scrollHeight);
	$('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);
 
	})

</script>