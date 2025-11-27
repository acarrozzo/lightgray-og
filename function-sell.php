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


$sellpercent = 1/10;

// ---------------------------------------------------------- sell dagger - OLD - SELL ALL
$sellone = $_SESSION['COSTdagger'] * $sellpercent;
$sellall = $_SESSION['COSTdagger'] * $row['dagger'] * $sellpercent; 
if($input=='sell daggerOLD' && $row['dagger'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your dagger for '.$_SESSION['COSTdagger'].' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET dagger = dagger - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + 2");}
		if($input=='sell all dagger' && $row['dagger'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$row['dagger'].' of your daggers for '.$sellall.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET dagger = dagger - $sellone"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall");;
}
// ------------------------------------------------------------------------------------------ SELL ITEMS - ONE HANDED

// ---------------------------------------------------------- sell dagger
if($input=='sell dagger' && $row['dagger'] >= 1) 
{		$sellamt = $_SESSION['COSTdagger'] * $sellpercent;
		echo $message = '<span>You sell your dagger for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET dagger = dagger - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell trainingsword
if($input=='sell training sword' && $row['trainingsword'] >= 1) 
{		$sellamt = $_SESSION['COSTtrainingsword'] * $sellpercent;
		echo $message = '<span>You sell your training sword for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET trainingsword = trainingsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell shortsword
if($input=='sell short sword' && $row['shortsword'] >= 1) 
{		$sellamt = $_SESSION['COSTshortsword'] * $sellpercent;
		echo $message = '<span>You sell your short sword for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET shortsword = shortsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell broadsword
if($input=='sell broad sword' && $row['broadsword'] >= 1) 
{		$sellamt = $_SESSION['COSTbroadsword'] * $sellpercent;
		echo $message = '<span>You sell your broad sword for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET broadsword = broadsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
// ---------------------------------------------------------- sell mace
if($input=='sell mace' && $row['mace'] >= 1) 
{		$sellamt = $_SESSION['COSTmace'] * $sellpercent;
		echo $message = '<span>You sell your mace for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET mace = mace - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell longsword
if($input=='sell long sword' && $row['longsword'] >= 1) 
{		$sellamt = $_SESSION['COSTlongsword'] * $sellpercent;
		echo $message = '<span>You sell your long sword for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET longsword = longsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
// ---------------------------------------------------------- sell club
if($input=='sell club' && $row['club'] >= 1) 
{		$sellamt = $_SESSION['COSTclub'] * $sellpercent;
		echo $message = '<span>You sell your club for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET club = club - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell flail
if($input=='sell flail' && $row['flail'] >= 1) 
{		$sellamt = $_SESSION['COSTflail'] * $sellpercent;
		echo $message = '<span>You sell your flail for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET flail = flail - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell morningstar
if($input=='sell morning star' && $row['morningstar'] >= 1) 
{		$sellamt = $_SESSION['COSTmorningstar'] * $sellpercent;
		echo $message = '<span>You sell your morning star for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET morningstar = morningstar - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell samuraisword
if($input=='sell samurai sword' && $row['samuraisword'] >= 1) 
{		$sellamt = $_SESSION['COSTsamuraisword'] * $sellpercent;
		echo $message = '<span>You sell your samurai sword for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET samuraisword = samuraisword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
// ---------------------------------------------------------- sell gladius
if($input=='sell gladius' && $row['gladius'] >= 1) 
{		$sellamt = $_SESSION['COSTgladius'] * $sellpercent;
		echo $message = '<span>You sell your gladius for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET gladius = gladius - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell basicstaff
if($input=='sell basic staff' && $row['basicstaff'] >= 1) 
{		$sellamt = $_SESSION['COSTbasicstaff'] * $sellpercent;
		echo $message = '<span>You sell your basic staff for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET basicstaff = basicstaff - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell woodenstaff
if($input=='sell wooden staff' && $row['woodenstaff'] >= 1) 
{		$sellamt = $_SESSION['COSTwoodenstaff'] * $sellpercent;
		echo $message = '<span>You sell your wooden staff for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET woodenstaff = woodenstaff - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
// ---------------------------------------------------------- sell wand
if($input=='sell wand' && $row['wand'] >= 1) 
{		$sellamt = $_SESSION['COSTwand'] * $sellpercent;
		echo $message = '<span>You sell your wand for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET wand = wand - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell wizardstaff
if($input=='sell wizard staff' && $row['wizardstaff'] >= 1) 
{		$sellamt = $_SESSION['COSTwizardstaff'] * $sellpercent;
		echo $message = '<span>You sell your wizard staff for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET wizardstaff = wizardstaff - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell demondagger
if($input=='sell demon dagger' && $row['demondagger'] >= 1) 
{		$sellamt = $_SESSION['COSTdemondagger'] * $sellpercent;
		echo $message = '<span>You sell your demon dagger for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET demondagger = demondagger - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell graywand
if($input=='sell gray wand' && $row['graywand'] >= 1) 
{		$sellamt = $_SESSION['COSTgraywand'] * $sellpercent;
		echo $message = '<span>You sell your gray wand for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET graywand = graywand - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell threechainedflail
if($input=='sell three-chained flail' && $row['threechainedflail'] >= 1) 
{		$sellamt = $_SESSION['COSTthreechainedflail'] * $sellpercent;
		echo $message = '<span>You sell your three-chained flail for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET threechainedflail = threechainedflail - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell bastardsword
if($input=='sell bastard sword' && $row['bastardsword'] >= 1) 
{		$sellamt = $_SESSION['COSTbastardsword'] * $sellpercent;
		echo $message = '<span>You sell your bastard sword for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bastardsword = bastardsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell giantclub
if($input=='sell giant club' && $row['giantclub'] >= 1) 
{		$sellamt = $_SESSION['COSTgiantclub'] * $sellpercent;
		echo $message = '<span>You sell your giant club for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET giantclub = giantclub - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell greatwhitesword
if($input=='sell great white sword' && $row['greatwhitesword'] >= 1) 
{		$sellamt = $_SESSION['COSTgreatwhitesword'] * $sellpercent;
		echo $message = '<span>You sell your great white sword for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET greatwhitesword = greatwhitesword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell mastersword
if($input=='sell master sword' && $row['mastersword'] >= 1) 
{		$sellamt = $_SESSION['COSTmastersword'] * $sellpercent;
		echo $message = '<span>You sell your master sword for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET mastersword = mastersword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}							

// ---------------------------------------------------------- sell irondagger
if($input=='sell iron dagger' && $row['irondagger'] >= 1) 
{		$sellamt = $_SESSION['COSTirondagger'] * $sellpercent;
		echo $message = '<span>You sell your iron dagger for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET irondagger = irondagger - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell ironsword
if($input=='sell iron sword' && $row['ironsword'] >= 1) 
{		$sellamt = $_SESSION['COSTironsword'] * $sellpercent;
		echo $message = '<span>You sell your iron sword for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironsword = ironsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell ironstaff
if($input=='sell iron staff' && $row['ironstaff'] >= 1) 
{		$sellamt = $_SESSION['COSTironstaff'] * $sellpercent;
		echo $message = '<span>You sell your iron staff for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironstaff = ironstaff - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell poisonsaber
if($input=='sell poison saber' && $row['poisonsaber'] >= 1) 
{		$sellamt = $_SESSION['COSTpoisonsaber'] * $sellpercent;
		echo $message = '<span>You sell your poison saber for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET poisonsaber = poisonsaber - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
// ---------------------------------------------------------- sell ulfberhrt
if($input=='sell ulfberhrt' && $row['ulfberhrt'] >= 1) 
{		$sellamt = $_SESSION['COSTulfberhrt'] * $sellpercent;
		echo $message = '<span>You sell your ulfberhrt for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ulfberhrt = ulfberhrt - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}				
// ---------------------------------------------------------- sell axe of slaughter
if($input=='sell axe of slaughter' && $row['axeofslaughter'] >= 1) 
{		$sellamt = $_SESSION['COSTaxeofslaughter'] * $sellpercent;
		echo $message = '<span>You sell your axe of slaughter for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET axeofslaughter = axeofslaughter - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}				
// ---------------------------------------------------------- sell silversword
if($input=='sell silver sword' && $row['silversword'] >= 1) 
{		$sellamt = $_SESSION['COSTsilversword'] * $sellpercent;
		echo $message = '<span>You sell your silver sword for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silversword = silversword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell silverstaff
if($input=='sell silver staff' && $row['silverstaff'] >= 1) 
{		$sellamt = $_SESSION['COSTsilverstaff'] * $sellpercent;
		echo $message = '<span>You sell your silver staff for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverstaff = silverstaff - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
		
// ---------------------------------------------------------- sell steeldagger
if($input=='sell steel dagger' && $row['steeldagger'] >= 1) 
{		$sellamt = $_SESSION['COSTsteeldagger'] * $sellpercent;
		echo $message = '<span>You sell your steel dagger for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET steeldagger = steeldagger - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell steelsword
if($input=='sell steel sword' && $row['steelsword'] >= 1) 
{		$sellamt = $_SESSION['COSTsteelsword'] * $sellpercent;
		echo $message = '<span>You sell your steel sword for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET steelsword = steelsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
// ---------------------------------------------------------- sell steelstaff
if($input=='sell steel staff' && $row['steelstaff'] >= 1) 
{		$sellamt = $_SESSION['COSTsteelstaff'] * $sellpercent;
		echo $message = '<span>You sell your steel staff for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET steelstaff = steelstaff - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
// ---------------------------------------------------------- sell silverwhip
if($input=='sell silver whip' && $row['silverwhip'] >= 1) 
{		$sellamt = $_SESSION['COSTsilverwhip'] * $sellpercent;
		echo $message = '<span>You sell your silver whip for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverwhip = silverwhip - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell sharpkatana
if($input=='sell sharp katana' && $row['sharpkatana'] >= 1) 
{		$sellamt = $_SESSION['COSTsharpkatana'] * $sellpercent;
		echo $message = '<span>You sell your sharp katana for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET sharpkatana = sharpkatana - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
// ---------------------------------------------------------- sell staffofthescorpion
if($input=='sell staff of the scorpion' && $row['staffofthescorpion'] >= 1) 
{		$sellamt = $_SESSION['COSTstaffofthescorpion'] * $sellpercent;
		echo $message = '<span>You sell your staff of the scorpion for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET staffofthescorpion = staffofthescorpion - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell forestsaber
if($input=='sell forest saber' && $row['forestsaber'] >= 1) 
{		$sellamt = $_SESSION['COSTforestsaber'] * $sellpercent;
		echo $message = '<span>You sell your forest saber for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET forestsaber = forestsaber - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell blackblade
if($input=='sell black blade' && $row['blackblade'] >= 1) 
{		$sellamt = $_SESSION['COSTblackblade'] * $sellpercent;
		echo $message = '<span>You sell your black blade for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET blackblade = blackblade - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell flamberg
if($input=='sell flamberg' && $row['flamberg'] >= 1) 
{		$sellamt = $_SESSION['COSTflamberg'] * $sellpercent;
		echo $message = '<span>You sell your flamberg for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET flamberg = flamberg - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
		
// ------------------------------------------------------------------------------------------ SELL ITEMS - TWO HANDED
// ------------------------------------------------------------------------------------------ SELL ITEMS - TWO HANDED
// ------------------------------------------------------------------------------------------ SELL ITEMS - TWO HANDED
// ---------------------------------------------------------- sell training2hsword
if($input=='sell training 2h sword' && $row['training2hsword'] >= 1) 
{		$sellamt = $_SESSION['COSTtraining2hsword'] * $sellpercent;
		echo $message = '<span>You sell your training 2h sword for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET training2hsword = training2hsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell bo
if($input=='sell bo' && $row['bo'] >= 1) 
{		$sellamt = $_SESSION['COSTbo'] * $sellpercent;
		echo $message = '<span>You sell your bo for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bo = bo - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
// ---------------------------------------------------------- sell battleaxe
if($input=='sell battle axe' && $row['battleaxe'] >= 1) 
{		$sellamt = $_SESSION['COSTbattleaxe'] * $sellpercent;
		echo $message = '<span>You sell your battle axe for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET battleaxe = battleaxe - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell warhammer
if($input=='sell warhammer' && $row['warhammer'] >= 1) 
{		$sellamt = $_SESSION['COSTwarhammer'] * $sellpercent;
		echo $message = '<span>You sell your warhammer for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET warhammer = warhammer - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
// ---------------------------------------------------------- sell woodenbo
if($input=='sell wooden bo' && $row['woodenbo'] >= 1) 
{		$sellamt = $_SESSION['COSTwoodenbo'] * $sellpercent;
		echo $message = '<span>You sell your wooden bo for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET woodenbo = woodenbo - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell pike
if($input=='sell pike' && $row['pike'] >= 1) 
{		$sellamt = $_SESSION['COSTpike'] * $sellpercent;
		echo $message = '<span>You sell your pike for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET pike = pike - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell claymore
if($input=='sell claymore' && $row['claymore'] >= 1) 
{		$sellamt = $_SESSION['COSTclaymore'] * $sellpercent;
		echo $message = '<span>You sell your claymore for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET claymore = claymore - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}				
// ---------------------------------------------------------- sell greatsword
if($input=='sell great sword' && $row['greatsword'] >= 1) 
{		$sellamt = $_SESSION['COSTgreatsword'] * $sellpercent;
		echo $message = '<span>You sell your great sword for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET greatsword = greatsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell bostaff
if($input=='sell bo staff' && $row['bostaff'] >= 1) 
{		$sellamt = $_SESSION['COSTbostaff'] * $sellpercent;
		echo $message = '<span>You sell your bo staff for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bostaff = bostaff - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}				
// ---------------------------------------------------------- sell battlestaff
if($input=='sell battle staff' && $row['battlestaff'] >= 1) 
{		$sellamt = $_SESSION['COSTbattlestaff'] * $sellpercent;
		echo $message = '<span>You sell your battle staff for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET battlestaff = battlestaff - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}				
// ---------------------------------------------------------- sell dualtomahawk
if($input=='sell dual tomahawk' && $row['dualtomahawk'] >= 1) 
{		$sellamt = $_SESSION['COSTdualtomahawk'] * $sellpercent;
		echo $message = '<span>You sell your dual tomahawk for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET dualtomahawk = dualtomahawk - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}				
// ---------------------------------------------------------- sell nunchaku
if($input=='sell nunchaku' && $row['nunchaku'] >= 1) 
{		$sellamt = $_SESSION['COSTnunchaku'] * $sellpercent;
		echo $message = '<span>You sell your nunchaku for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET nunchaku = nunchaku - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}				
// ---------------------------------------------------------- sell boneknuckles
if($input=='sell bone knuckles' && $row['boneknuckles'] >= 1) 
{		$sellamt = $_SESSION['COSTboneknuckles'] * $sellpercent;
		echo $message = '<span>You sell your bone knuckles for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET boneknuckles = boneknuckles - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell polearm
if($input=='sell polearm' && $row['polearm'] >= 1) 
{		$sellamt = $_SESSION['COSTpolearm'] * $sellpercent;
		echo $message = '<span>You sell your polearm for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET polearm = polearm - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
// ---------------------------------------------------------- sell bonecudgel
if($input=='sell bone cudgel' && $row['bonecudgel'] >= 1) 
{		$sellamt = $_SESSION['COSTbonecudgel'] * $sellpercent;
		echo $message = '<span>You sell your bone cudgel for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bonecudgel = bonecudgel - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell hammerheadhammer
if($input=='sell hammerhead hammer' && $row['hammerheadhammer'] >= 1) 
{		$sellamt = $_SESSION['COSThammerheadhammer'] * $sellpercent;
		echo $message = '<span>You sell your hammerhead hammer for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET hammerheadhammer = hammerheadhammer - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
if($input=='sell forever 2h sword' && $row['forever2hsword'] >= 1) 
{		$sellamt = $_SESSION['COSTforever2hsword'] * $sellpercent;
		echo $message = '<span>You sell your forever 2h sword for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET forever2hsword = forever2hsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}

// ---------------------------------------------------------- sell ironmaul
if($input=='sell iron maul' && $row['ironmaul'] >= 1) 
{		$sellamt = $_SESSION['COSTironmaul'] * $sellpercent;
		echo $message = '<span>You sell your iron maul for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironmaul = ironmaul - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
if($input=='sell iron 2h sword' && $row['iron2hsword'] >= 1) 
{		$sellamt = $_SESSION['COSTiron2hsword'] * $sellpercent;
		echo $message = '<span>You sell your iron 2h sword for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET iron2hsword = iron2hsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
if($input=='sell iron battle staff' && $row['ironbattlestaff'] >= 1) 
{		$sellamt = $_SESSION['COSTironbattlestaff'] * $sellpercent;
		echo $message = '<span>You sell your iron battle staff for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironbattlestaff = ironbattlestaff - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
if($input=='sell iron nunchaku' && $row['ironnunchaku'] >= 1) 
{		$sellamt = $_SESSION['COSTironnunchaku'] * $sellpercent;
		echo $message = '<span>You sell your iron nunchaku for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironnunchaku = ironnunchaku - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell greataxe
if($input=='sell great axe' && $row['greataxe'] >= 1) 
{		$sellamt = $_SESSION['COSTgreataxe'] * $sellpercent;
		echo $message = '<span>You sell your great axe for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET greataxe = greataxe - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell trident
if($input=='sell trident' && $row['trident'] >= 1) 
{		$sellamt = $_SESSION['COSTtrident'] * $sellpercent;
		echo $message = '<span>You sell your trident for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET trident = trident - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
// ---------------------------------------------------------- sell solomonstaff
if($input=='sell solomons staff' && $row['solomonstaff'] >= 1) 
{		$sellamt = $_SESSION['COSTsolomonstaff'] * $sellpercent;
		echo $message = '<span>You sell your solomons staff for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET solomonstaff = solomonstaff - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell oakbattlestaff		
if($input=='sell oak battle staff' && $row['oakbattlestaff'] >= 1) 
{		$sellamt = $_SESSION['COSToakbattlestaff'] * $sellpercent;
		echo $message = '<span>You sell your oak battle staff for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET oakbattlestaff = oakbattlestaff - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
// ---------------------------------------------------------- sell jimbo
if($input=='sell jim bo' && $row['jimbo'] >= 1) 
{		$sellamt = $_SESSION['COSTjimbo'] * $sellpercent;
		echo $message = '<span>You sell your jim bo for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET jimbo = jimbo - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}								
// ---------------------------------------------------------- sell silver2hsword
if($input=='sell silver 2h sword' && $row['silver2hsword'] >= 1) 
{		$sellamt = $_SESSION['COSTsilver2hsword'] * $sellpercent;
		echo $message = '<span>You sell your silver 2h sword for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silver2hsword = silver2hsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell steel2hsword
if($input=='sell steel 2h sword' && $row['steel2hsword'] >= 1) 
{		$sellamt = $_SESSION['COSTsteel2hsword'] * $sellpercent;
		echo $message = '<span>You sell your steel 2h sword for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET steel2hsword = steel2hsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}							
// ---------------------------------------------------------- sell steelbattlestaff		
if($input=='sell steel battlestaff' && $row['steelbattlestaff'] >= 1) 
{		$sellamt = $_SESSION['COSTsteelbattlestaff'] * $sellpercent;
		echo $message = '<span>You sell your steel battlestaff for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET steelbattlestaff = steelbattlestaff - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell steelnunchaku		
if($input=='sell steel nunchaku' && $row['steelnunchaku'] >= 1) 
{		$sellamt = $_SESSION['COSTsteelnunchaku'] * $sellpercent;
		echo $message = '<span>You sell your steel nunchaku for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET steelnunchaku = steelnunchaku - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell heavykatana		
if($input=='sell heavy katana' && $row['heavykatana'] >= 1) 
{		$sellamt = $_SESSION['COSTheavykatana'] * $sellpercent;
		echo $message = '<span>You sell your heavy katana for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET heavykatana = heavykatana - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell heavyspear		
if($input=='sell heavy spear' && $row['heavyspear'] >= 1) 
{		$sellamt = $_SESSION['COSTheavyspear'] * $sellpercent;
		echo $message = '<span>You sell your heavy spear for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET heavyspear = heavyspear - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
// ---------------------------------------------------------- sell heavyhammer		
if($input=='sell heavy hammer' && $row['heavyhammer'] >= 1) 
{		$sellamt = $_SESSION['COSTheavyhammer'] * $sellpercent;
		echo $message = '<span>You sell your heavy hammer for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET heavyhammer = heavyhammer - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}								
// ---------------------------------------------------------- sell oakwarhammer		
if($input=='sell oak warhammer' && $row['oakwarhammer'] >= 1) 
{		$sellamt = $_SESSION['COSToakwarhammer'] * $sellpercent;
		echo $message = '<span>You sell your oak warhammer for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET oakwarhammer = oakwarhammer - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
// ---------------------------------------------------------- sell bardiche
if($input=='sell bardiche' && $row['bardiche'] >= 1) 
{		$sellamt = $_SESSION['COSTbardiche'] * $sellpercent;
		echo $message = '<span>You sell your bardiche for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bardiche = bardiche - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
// ---------------------------------------------------------- sell glaive
if($input=='sell glaive' && $row['glaive'] >= 1) 
{		$sellamt = $_SESSION['COSTglaive'] * $sellpercent;
		echo $message = '<span>You sell your glaive for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET glaive = glaive - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}									


		
// ------------------------------------------------------------------------------------------ SELL ITEMS - RANGED
// ------------------------------------------------------------------------------------------ SELL ITEMS - RANGED
// ------------------------------------------------------------------------------------------ SELL ITEMS - RANGED

// ---------------------------------------------------------- sell boomerang
if($input=='sell boomerang' && $row['boomerang'] >= 1) 
{		$sellamt = $_SESSION['COSTboomerang'] * $sellpercent;
		echo $message = '<span>You sell your boomerang for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET boomerang = boomerang - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
// ---------------------------------------------------------- sell chakram
if($input=='sell chakram' && $row['chakram'] >= 1) 
{		$sellamt = $_SESSION['COSTchakram'] * $sellpercent;
		echo $message = '<span>You sell your chakram for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET chakram = chakram - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
// ---------------------------------------------------------- sell woodenbow
if($input=='sell wooden bow' && $row['woodenbow'] >= 1) 
{		$sellamt = $_SESSION['COSTwoodenbow'] * $sellpercent;
		echo $message = '<span>You sell your wooden bow for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET woodenbow = woodenbow - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell hunterbow
if($input=='sell hunter bow' && $row['hunterbow'] >= 1) 
{		$sellamt = $_SESSION['COSThunterbow'] * $sellpercent;
		echo $message = '<span>You sell your hunter bow for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET hunterbow = hunterbow - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
// ---------------------------------------------------------- sell longbow
if($input=='sell long bow' && $row['longbow'] >= 1) 
{		$sellamt = $_SESSION['COSTlongbow'] * $sellpercent;
		echo $message = '<span>You sell your long bow for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET longbow = longbow - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell crossbow
if($input=='sell crossbow' && $row['crossbow'] >= 1) 
{		$sellamt = $_SESSION['COSTcrossbow'] * $sellpercent;
		echo $message = '<span>You sell your crossbow for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET crossbow = crossbow - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
		
// ---------------------------------------------------------- sell ironboomerang
if($input=='sell iron boomerang' && $row['ironboomerang'] >= 1) 
{		$sellamt = $_SESSION['COSTironboomerang'] * $sellpercent;
		echo $message = '<span>You sell your iron boomerang for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironboomerang = ironboomerang - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell harpoon
if($input=='sell harpoon' && $row['harpoon'] >= 1) 
{		$sellamt = $_SESSION['COSTharpoon'] * $sellpercent;
		echo $message = '<span>You sell your harpoon for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET harpoon = harpoon - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell ironchakram
if($input=='sell iron chakram' && $row['ironchakram'] >= 1) 
{		$sellamt = $_SESSION['COSTironchakram'] * $sellpercent;
		echo $message = '<span>You sell your iron chakram for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironchakram = ironchakram - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell ironbow
if($input=='sell iron bow' && $row['ironbow'] >= 1) 
{		$sellamt = $_SESSION['COSTironbow'] * $sellpercent;
		echo $message = '<span>You sell your iron bow for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironbow = ironbow - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell enchantedbow
if($input=='sell enchanted bow' && $row['enchantedbow'] >= 1) 
{		$sellamt = $_SESSION['COSTenchantedbow'] * $sellpercent;
		echo $message = '<span>You sell your enchanted bow for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET enchantedbow = enchantedbow - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell jimbow
if($input=='sell jim bow' && $row['jimbow'] >= 1) 
{		$sellamt = $_SESSION['COSTjimbow'] * $sellpercent;
		echo $message = '<span>You sell your jim bow for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET jimbow = jimbow - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell ironcrossbow
if($input=='sell iron crossbow' && $row['ironcrossbow'] >= 1) 
{		$sellamt = $_SESSION['COSTironcrossbow'] * $sellpercent;
		echo $message = '<span>You sell your iron crossbow for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironcrossbow = ironcrossbow - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell ironcrossbow
if($input=='sell iron crossbow' && $row['ironcrossbow'] >= 1) 
{		$sellamt = $_SESSION['COSTironcrossbow'] * $sellpercent;
		echo $message = '<span>You sell your iron crossbow for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironcrossbow = ironcrossbow - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
// ---------------------------------------------------------- sell compoundcrossbow
if($input=='sell compound crossbow' && $row['compoundcrossbow'] >= 1) 
{		$sellamt = $_SESSION['COSTcompoundcrossbow'] * $sellpercent;
		echo $message = '<span>You sell your compound crossbow for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET compoundcrossbow = compoundcrossbow - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}							
// ---------------------------------------------------------- sell handcrossbow
if($input=='sell hand crossbow' && $row['handcrossbow'] >= 1) 
{		$sellamt = $_SESSION['COSThandcrossbow'] * $sellpercent;
		echo $message = '<span>You sell your hand crossbow for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET handcrossbow = handcrossbow - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
// ---------------------------------------------------------- sell silverboomerang
if($input=='sell silver boomerang' && $row['silverboomerang'] >= 1) 
{		$sellamt = $_SESSION['COSTsilverboomerang'] * $sellpercent;
		echo $message = '<span>You sell your silver boomerang for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverboomerang = silverboomerang - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell silverbow
if($input=='sell silver bow' && $row['silverbow'] >= 1) 
{		$sellamt = $_SESSION['COSTsilverbow'] * $sellpercent;
		echo $message = '<span>You sell your silver bow for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverbow = silverbow - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell silvercrossbow
if($input=='sell silver crossbow' && $row['silvercrossbow'] >= 1) 
{		$sellamt = $_SESSION['COSTsilvercrossbow'] * $sellpercent;
		echo $message = '<span>You sell your silver crossbow for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silvercrossbow = silvercrossbow - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}						
// ---------------------------------------------------------- sell steelboomerang
if($input=='sell steel boomerang' && $row['steelboomerang'] >= 1) 
{		$sellamt = $_SESSION['COSTsteelboomerang'] * $sellpercent;
		echo $message = '<span>You sell your steel boomerang for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET steelboomerang = steelboomerang - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell steelbow
if($input=='sell steel bow' && $row['steelbow'] >= 1) 
{		$sellamt = $_SESSION['COSTsteelbow'] * $sellpercent;
		echo $message = '<span>You sell your steel bow for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET steelbow = steelbow - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell steelcrossbow
if($input=='sell steel crossbow' && $row['steelcrossbow'] >= 1) 
{		$sellamt = $_SESSION['COSTsteelcrossbow'] * $sellpercent;
		echo $message = '<span>You sell your steel crossbow for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET steelcrossbow = steelcrossbow - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell steelchakram
if($input=='sell steel chakram' && $row['steelchakram'] >= 1) 
{		$sellamt = $_SESSION['COSTsteelchakram'] * $sellpercent;
		echo $message = '<span>You sell your steel chakram for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET steelchakram = steelchakram - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
// ---------------------------------------------------------- sell greenhornbow
if($input=='sell greenhorn bow' && $row['greenhornbow'] >= 1) 
{		$sellamt = $_SESSION['COSTgreenhornbow'] * $sellpercent;
		echo $message = '<span>You sell your greenhorn bow for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET greenhornbow = greenhornbow - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
// ---------------------------------------------------------- sell keeperscrossbow
if($input=='sell keepers crossbow' && $row['keeperscrossbow'] >= 1) 
{		$sellamt = $_SESSION['COSTkeeperscrossbow'] * $sellpercent;
		echo $message = '<span>You sell your keepers crossbow for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET keeperscrossbow = keeperscrossbow - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
	
							
// ------------------------------------------------------------------------------------------ SELL ITEMS - SHIELDS
// ------------------------------------------------------------------------------------------ SELL ITEMS - SHIELDS
// ------------------------------------------------------------------------------------------ SELL ITEMS - SHIELDS
							
// ---------------------------------------------------------- sell trainingshield
if($input=='sell training shield' && $row['trainingshield'] >= 1) 
{		$sellamt = $_SESSION['COSTtrainingshield'] * $sellpercent;
		echo $message = '<span>You sell your training shield for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET trainingshield = trainingshield - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell basicshield
if($input=='sell basic shield' && $row['basicshield'] >= 1) 
{		$sellamt = $_SESSION['COSTbasicshield'] * $sellpercent;
		echo $message = '<span>You sell your basic shield for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET basicshield = basicshield - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}									
// ---------------------------------------------------------- sell buckler
if($input=='sell buckler' && $row['buckler'] >= 1) 
{		$sellamt = $_SESSION['COSTbuckler'] * $sellpercent;
		echo $message = '<span>You sell your buckler for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET buckler = buckler - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}								
// ---------------------------------------------------------- sell woodenshield
if($input=='sell wooden shield' && $row['woodenshield'] >= 1) 
{		$sellamt = $_SESSION['COSTwoodenshield'] * $sellpercent;
		echo $message = '<span>You sell your wooden shield for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET woodenshield = woodenshield - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell kiteshield
if($input=='sell kite shield' && $row['kiteshield'] >= 1) 
{		$sellamt = $_SESSION['COSTkiteshield'] * $sellpercent;
		echo $message = '<span>You sell your kite shield for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET kiteshield = kiteshield - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell huntershield
if($input=='sell hunter shield' && $row['huntershield'] >= 1) 
{		$sellamt = $_SESSION['COSThuntershield'] * $sellpercent;
		echo $message = '<span>You sell your hunter shield for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET huntershield = huntershield - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell offhanddagger
if($input=='sell off hand dagger' && $row['offhanddagger'] >= 1) 
{		$sellamt = $_SESSION['COSToffhanddagger'] * $sellpercent;
		echo $message = '<span>You sell your off hand dagger for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET offhanddagger = offhanddagger - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
		// ---------------------------------------------------------- sell towershield
if($input=='sell tower shield' && $row['towershield'] >= 1) 
{		$sellamt = $_SESSION['COSTtowershield'] * $sellpercent;
		echo $message = '<span>You sell your tower shield for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET towershield = towershield - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell glowingorb
if($input=='sell glowing orb' && $row['glowingorb'] >= 1) 
{		$sellamt = $_SESSION['COSTglowingorb'] * $sellpercent;
		echo $message = '<span>You sell your glowing orb for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET glowingorb = glowingorb - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell enchantedorb
if($input=='sell enchanted orb' && $row['enchantedorb'] >= 1) 
{		$sellamt = $_SESSION['COSTenchantedorb'] * $sellpercent;
		echo $message = '<span>You sell your enchanted orb for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET enchantedorb = enchantedorb - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell ironshield
if($input=='sell iron shield' && $row['ironshield'] >= 1) 
{		$sellamt = $_SESSION['COSTironshield'] * $sellpercent;
		echo $message = '<span>You sell your iron shield for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironshield = ironshield - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell ironkiteshield
if($input=='sell iron kite shield' && $row['ironkiteshield'] >= 1) 
{		$sellamt = $_SESSION['COSTironkiteshield'] * $sellpercent;
		echo $message = '<span>You sell your iron kite shield for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironkiteshield = ironkiteshield - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell redshield
if($input=='sell red shield' && $row['redshield'] >= 1) 
{		$sellamt = $_SESSION['COSTredshield'] * $sellpercent;
		echo $message = '<span>You sell your red shield for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET redshield = redshield - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell deathorb
if($input=='sell death orb' && $row['deathorb'] >= 1) 
{		$sellamt = $_SESSION['COSTdeathorb'] * $sellpercent;
		echo $message = '<span>You sell your death orb for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET deathorb = deathorb - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell silvershield
if($input=='sell silver shield' && $row['silvershield'] >= 1) 
{		$sellamt = $_SESSION['COSTsilvershield'] * $sellpercent;
		echo $message = '<span>You sell your silver shield for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silvershield = silvershield - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
// ---------------------------------------------------------- sell steelkiteshield
if($input=='sell steel kite shield' && $row['steelkiteshield'] >= 1) 
{		$sellamt = $_SESSION['COSTsteelkiteshield'] * $sellpercent;
		echo $message = '<span>You sell your steel kite shield for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET steelkiteshield = steelkiteshield - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell greenorb
if($input=='sell green orb' && $row['greenorb'] >= 1) 
{		$sellamt = $_SESSION['COSTgreenorb'] * $sellpercent;
		echo $message = '<span>You sell your green orb for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET greenorb = greenorb - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
// ---------------------------------------------------------- sell offhandsword
if($input=='sell off hand sword' && $row['offhandsword'] >= 1) 
{		$sellamt = $_SESSION['COSToffhandsword'] * $sellpercent;
		echo $message = '<span>You sell your off hand sword for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET offhandsword = offhandsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			

// ------------------------------------------------------------------------------------------ SELL ITEMS - HEAD
// ------------------------------------------------------------------------------------------ SELL ITEMS - HEAD
// ------------------------------------------------------------------------------------------ SELL ITEMS - HEAD

// ---------------------------------------------------------- sell traininghelmet
if($input=='sell training helmet' && $row['traininghelmet'] >= 1) 
{		$sellamt = $_SESSION['COSTtraininghelmet'] * $sellpercent;
		echo $message = '<span>You sell your training helmet for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET traininghelmet = traininghelmet - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell basichelmet
if($input=='sell basic helmet' && $row['basichelmet'] >= 1) 
{		$sellamt = $_SESSION['COSTbasichelmet'] * $sellpercent;
		echo $message = '<span>You sell your basic helmet for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET basichelmet = basichelmet - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell basichood
if($input=='sell basic hood' && $row['basichood'] >= 1) 
{		$sellamt = $_SESSION['COSTbasichood'] * $sellpercent;
		echo $message = '<span>You sell your basic hood for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET basichood = basichood - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell redhood
if($input=='sell red hood' && $row['redhood'] >= 1) 
{		$sellamt = $_SESSION['COSTredhood'] * $sellpercent;
		echo $message = '<span>You sell your red hood for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET redhood = redhood - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
// ---------------------------------------------------------- sell greenhood
if($input=='sell green hood' && $row['greenhood'] >= 1) 
{		$sellamt = $_SESSION['COSTgreenhood'] * $sellpercent;
		echo $message = '<span>You sell your green hood for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET greenhood = greenhood - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell bluehood
if($input=='sell blue hood' && $row['bluehood'] >= 1) 
{		$sellamt = $_SESSION['COSTbluehood'] * $sellpercent;
		echo $message = '<span>You sell your blue hood for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bluehood = bluehood - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell leatherhood
if($input=='sell leather hood' && $row['leatherhood'] >= 1) 
{		$sellamt = $_SESSION['COSTleatherhood'] * $sellpercent;
		echo $message = '<span>You sell your leather hood for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET leatherhood = leatherhood - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell leatherhelmet
if($input=='sell leather helmet' && $row['leatherhelmet'] >= 1) 
{		$sellamt = $_SESSION['COSTleatherhelmet'] * $sellpercent;
		echo $message = '<span>You sell your leather helmet for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET leatherhelmet = leatherhelmet - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
// ---------------------------------------------------------- sell hornedhelmet
if($input=='sell horned helmet' && $row['hornedhelmet'] >= 1) 
{		$sellamt = $_SESSION['COSThornedhelmet'] * $sellpercent;
		echo $message = '<span>You sell your horned helmet for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET hornedhelmet = hornedhelmet - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
// ---------------------------------------------------------- sell barbarianhelmet
if($input=='sell barbarian helmet' && $row['barbarianhelmet'] >= 1) 
{		$sellamt = $_SESSION['COSTbarbarianhelmet'] * $sellpercent;
		echo $message = '<span>You sell your barbarian helmet for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET barbarianhelmet = barbarianhelmet - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}																			
// ---------------------------------------------------------- sell grayhood
if($input=='sell gray hood' && $row['grayhood'] >= 1) 
{		$sellamt = $_SESSION['COSTgrayhood'] * $sellpercent;
		echo $message = '<span>You sell your gray hood for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET grayhood = grayhood - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell wizardhat
if($input=='sell wizard hat' && $row['wizardhat'] >= 1) 
{		$sellamt = $_SESSION['COSTwizardhat'] * $sellpercent;
		echo $message = '<span>You sell your wizard hat for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET wizardhat = wizardhat - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell battlehelm
if($input=='sell battle helm' && $row['battlehelm'] >= 1) 
{		$sellamt = $_SESSION['COSTbattlehelm'] * $sellpercent;
		echo $message = '<span>You sell your battle helm for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET battlehelm = battlehelm - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell victoriashood
if($input=='sell victorias hood' && $row['victoriashood'] >= 1) 
{		$sellamt = $_SESSION['COSTvictoriashood'] * $sellpercent;
		echo $message = '<span>You sell your victorias hood for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET victoriashood = victoriashood - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell scorpionhood
if($input=='sell scorpion hood' && $row['scorpionhood'] >= 1) 
{		$sellamt = $_SESSION['COSTscorpionhood'] * $sellpercent;
		echo $message = '<span>You sell your scorpion hood for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET scorpionhood = scorpionhood - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		

// ---------------------------------------------------------- sell ironhood
if($input=='sell iron hood' && $row['ironhood'] >= 1) 
{		$sellamt = $_SESSION['COSTironhood'] * $sellpercent;
		echo $message = '<span>You sell your iron hood for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironhood = ironhood - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell ironhelmet
if($input=='sell iron helmet' && $row['ironhelmet'] >= 1) 
{		$sellamt = $_SESSION['COSTironhelmet'] * $sellpercent;
		echo $message = '<span>You sell your iron helmet for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironhelmet = ironhelmet - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell hauntedhelm
if($input=='sell haunted helm' && $row['hauntedhelm'] >= 1) 
{		$sellamt = $_SESSION['COSThauntedhelm'] * $sellpercent;
		echo $message = '<span>You sell your haunted helm for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET hauntedhelm = hauntedhelm - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell bandithood
if($input=='sell bandit hood' && $row['bandithood'] >= 1) 
{		$sellamt = $_SESSION['COSTbandithood'] * $sellpercent;
		echo $message = '<span>You sell your bandit hood for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bandithood = bandithood - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell calamaricap
if($input=='sell calamari cap' && $row['calamaricap'] >= 1) 
{		$sellamt = $_SESSION['COSTcalamaricap'] * $sellpercent;
		echo $message = '<span>You sell your calamari cap for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET calamaricap = calamaricap - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell heavyhelmet
if($input=='sell heavy helmet' && $row['heavyhelmet'] >= 1) 
{		$sellamt = $_SESSION['COSTheavyhelmet'] * $sellpercent;
		echo $message = '<span>You sell your heavy helmet for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET heavyhelmet = heavyhelmet - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell earthhood
if($input=='sell earth hood' && $row['earthhood'] >= 1) 
{		$sellamt = $_SESSION['COSTearthhood'] * $sellpercent;
		echo $message = '<span>You sell your earth hood for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET earthhood = earthhood - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell kettlehelm
if($input=='sell kettle helm' && $row['kettlehelm'] >= 1) 
{		$sellamt = $_SESSION['COSTkettlehelm'] * $sellpercent;
		echo $message = '<span>You sell your kettle helm for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET kettlehelm = kettlehelm - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
	

// ---------------------------------------------------------- sell silverhelmet
if($input=='sell silver helmet' && $row['silverhelmet'] >= 1) 
{		$sellamt = $_SESSION['COSTsilverhelmet'] * $sellpercent;
		echo $message = '<span>You sell your silver helmet for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverhelmet = silverhelmet - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}				
// ---------------------------------------------------------- sell steelhood
if($input=='sell steel hood' && $row['steelhood'] >= 1) 
{		$sellamt = $_SESSION['COSTsteelhood'] * $sellpercent;
		echo $message = '<span>You sell your steel hood for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET steelhood = steelhood - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell steelhelmet
if($input=='sell steel helmet' && $row['steelhelmet'] >= 1) 
{		$sellamt = $_SESSION['COSTsteelhelmet'] * $sellpercent;
		echo $message = '<span>You sell your steel helmet for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET steelhelmet = steelhelmet - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}

// ---------------------------------------------------------- sell steelmasterhelm
if($input=='sell steel master helm' && $row['steelmasterhelm'] >= 1) 
{		$sellamt = $_SESSION['COSTsteelmasterhelm'] * $sellpercent;
		echo $message = '<span>You sell your steel master helm for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET steelmasterhelm = steelmasterhelm - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		

// ---------------------------------------------------------- sell trollcrown
if($input=='sell troll crown' && $row['trollcrown'] >= 1) 
{		$sellamt = $_SESSION['COSTtrollcrown'] * $sellpercent;
		echo $message = '<span>You sell your troll crown for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET trollcrown = trollcrown - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	

// ---------------------------------------------------------- sell rangerhood
if($input=='sell ranger hood' && $row['rangerhood'] >= 1) 
{		$sellamt = $_SESSION['COSTrangerhood'] * $sellpercent;
		echo $message = '<span>You sell your ranger hood for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET rangerhood = rangerhood - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell gammahood
if($input=='sell gamma hood' && $row['gammahood'] >= 1) 
{		$sellamt = $_SESSION['COSTgammahood'] * $sellpercent;
		echo $message = '<span>You sell your gamma hood for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET gammahood = gammahood - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}					

// ---------------------------------------------------------- sell mithrilhood
if($input=='sell mithril hood' && $row['mithrilhood'] >= 1) 
{		$sellamt = $_SESSION['COSTmithrilhood'] * $sellpercent;
		echo $message = '<span>You sell your mithril hood for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET mithrilhood = mithrilhood - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell mithrilhelmet
if($input=='sell mithril helmet' && $row['mithrilhelmet'] >= 1) 
{		$sellamt = $_SESSION['COSTmithrilhelmet'] * $sellpercent;
		echo $message = '<span>You sell your mithril helmet for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET mithrilhelmet = mithrilhelmet - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell bansheemask
if($input=='sell banshee mask' && $row['bansheemask'] >= 1) 
{		$sellamt = $_SESSION['COSTbansheemask'] * $sellpercent;
		echo $message = '<span>You sell your banshee mask for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bansheemask = bansheemask - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell blackhood
if($input=='sell black hood' && $row['blackhood'] >= 1) 
{		$sellamt = $_SESSION['COSTblackhood'] * $sellpercent;
		echo $message = '<span>You sell your black hood for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET blackhood = blackhood - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	

// ------------------------------------------------------------------------------------------ SELL ITEMS - BODY
// ------------------------------------------------------------------------------------------ SELL ITEMS - BODY
// ------------------------------------------------------------------------------------------ SELL ITEMS - BODY

// ---------------------------------------------------------- sell trainingarmor
if($input=='sell training armor' && $row['trainingarmor'] >= 1) 
{		$sellamt = $_SESSION['COSTtrainingarmor'] * $sellpercent;
		echo $message = '<span>You sell your training armor for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET trainingarmor = trainingarmor - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell trainingarmorpro
if($input=='sell training armor pro' && $row['trainingarmorpro'] >= 1) 
{		$sellamt = $_SESSION['COSTtrainingarmorpro'] * $sellpercent;
		echo $message = '<span>You sell your training armor pro for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET trainingarmorpro = trainingarmorpro - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell paddedarmor
if($input=='sell padded armor' && $row['paddedarmor'] >= 1) 
{		$sellamt = $_SESSION['COSTpaddedarmor'] * $sellpercent;
		echo $message = '<span>You sell your padded armor for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET paddedarmor = paddedarmor - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell pajamas
if($input=='sell pajamas' && $row['pajamas'] >= 1) 
{		$sellamt = $_SESSION['COSTpajamas'] * $sellpercent;
		echo $message = '<span>You sell your pajamas for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET pajamas = pajamas - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell greencloak
if($input=='sell green cloak' && $row['greencloak'] >= 1) 
{		$sellamt = $_SESSION['COSTgreencloak'] * $sellpercent;
		echo $message = '<span>You sell your green cloak for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET greencloak = greencloak - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell blackrobe
if($input=='sell black robe' && $row['blackrobe'] >= 1) 
{		$sellamt = $_SESSION['COSTblackrobe'] * $sellpercent;
		echo $message = '<span>You sell your black robe for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET blackrobe = blackrobe - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell grayrobe
if($input=='sell gray robe' && $row['grayrobe'] >= 1) 
{		$sellamt = $_SESSION['COSTgrayrobe'] * $sellpercent;
		echo $message = '<span>You sell your gray robe for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET grayrobe = grayrobe - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell leathervest
if($input=='sell leather vest' && $row['leathervest'] >= 1) 
{		$sellamt = $_SESSION['COSTleathervest'] * $sellpercent;
		echo $message = '<span>You sell your leather vest for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET leathervest = leathervest - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell leatherarmor
if($input=='sell leather armor' && $row['leatherarmor'] >= 1) 
{		$sellamt = $_SESSION['COSTleatherarmor'] * $sellpercent;
		echo $message = '<span>You sell your leather armor for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET leatherarmor = leatherarmor - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}								
// ---------------------------------------------------------- sell sasquatchcloak
if($input=='sell sasquatch cloak' && $row['sasquatchcloak'] >= 1) 
{		$sellamt = $_SESSION['COSTsasquatchcloak'] * $sellpercent;
		echo $message = '<span>You sell your sasquatch cloak for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET sasquatchcloak = sasquatchcloak - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell turtleshell
if($input=='sell turtle shell' && $row['turtleshell'] >= 1) 
{		$sellamt = $_SESSION['COSTturtleshell'] * $sellpercent;
		echo $message = '<span>You sell your turtle shell for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET turtleshell = turtleshell - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
		
// body - TIER 2
		
// ---------------------------------------------------------- sell ironarmor
if($input=='sell iron armor' && $row['ironarmor'] >= 1) 
{		$sellamt = $_SESSION['COSTironarmor'] * $sellpercent;
		echo $message = '<span>You sell your iron armor for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironarmor = ironarmor - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
// ---------------------------------------------------------- sell ironcape
if($input=='sell iron cape' && $row['ironcape'] >= 1) 
{		$sellamt = $_SESSION['COSTironcape'] * $sellpercent;
		echo $message = '<span>You sell your iron cape for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironcape = ironcape - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
	// ---------------------------------------------------------- sell eartharmor
if($input=='sell earth armor' && $row['eartharmor'] >= 1) 
{		$sellamt = $_SESSION['COSTeartharmor'] * $sellpercent;
		echo $message = '<span>You sell your earth armor for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET eartharmor = eartharmor - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}				
				
// ---------------------------------------------------------- sell blackcape
if($input=='sell black cape' && $row['blackcape'] >= 1) 
{		$sellamt = $_SESSION['COSTblackcape'] * $sellpercent;
		echo $message = '<span>You sell your black cape for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET blackcape = blackcape - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
// ---------------------------------------------------------- sell forestcloak
if($input=='sell forest cloak' && $row['forestcloak'] >= 1) 
{		$sellamt = $_SESSION['COSTforestcloak'] * $sellpercent;
		echo $message = '<span>You sell your forest cloak for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET forestcloak = forestcloak - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell warlockrobe
if($input=='sell warlock robe' && $row['warlockrobe'] >= 1) 
{		$sellamt = $_SESSION['COSTwarlockrobe'] * $sellpercent;
		echo $message = '<span>You sell your warlock robe for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET warlockrobe = warlockrobe - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell championarmor
if($input=='sell champion armor' && $row['championarmor'] >= 1) 
{		$sellamt = $_SESSION['COSTchampionarmor'] * $sellpercent;
		echo $message = '<span>You sell your champion armor for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET championarmor = championarmor - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
					
				
// body - TIER 3
// ---------------------------------------------------------- sell silverbreastplate
if($input=='sell silver breastplate' && $row['silverbreastplate'] >= 1) 
{		$sellamt = $_SESSION['COSTsilverbreastplate'] * $sellpercent;
		echo $message = '<span>You sell your silver breastplate for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverbreastplate = silverbreastplate - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell steelarmor
if($input=='sell steel armor' && $row['steelarmor'] >= 1) 
{		$sellamt = $_SESSION['COSTsteelarmor'] * $sellpercent;
		echo $message = '<span>You sell your steel armor for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET steelarmor = steelarmor - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell steelcape
if($input=='sell steel cape' && $row['steelcape'] >= 1) 
{		$sellamt = $_SESSION['COSTsteelcape'] * $sellpercent;
		echo $message = '<span>You sell your steel cape for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET steelcape = steelcape - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
// ---------------------------------------------------------- sell rangercloak
if($input=='sell ranger cloak' && $row['rangercloak'] >= 1) 
{		$sellamt = $_SESSION['COSTrangercloak'] * $sellpercent;
		echo $message = '<span>You sell your ranger cloak for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET rangercloak = rangercloak - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}									
// ---------------------------------------------------------- sell yeticloak
if($input=='sell yeti cloak' && $row['yeticloak'] >= 1) 
{		$sellamt = $_SESSION['COSTyeticloak'] * $sellpercent;
		echo $message = '<span>You sell your yeti cloak for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET yeticloak = yeticloak - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}																										
// ---------------------------------------------------------- sell demoncape
if($input=='sell demon cape' && $row['demoncape'] >= 1) 
{		$sellamt = $_SESSION['COSTdemoncape'] * $sellpercent;
		echo $message = '<span>You sell your demon cape for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET demoncape = demoncape - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell gammarobe
if($input=='sell gamma robe' && $row['gammarobe'] >= 1) 
{		$sellamt = $_SESSION['COSTgammarobe'] * $sellpercent;
		echo $message = '<span>You sell your gamma robe for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET gammarobe = gammarobe - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell silverpajamas
if($input=='sell silver pajamas' && $row['silverpajamas'] >= 1) 
{		$sellamt = $_SESSION['COSTsilverpajamas'] * $sellpercent;
		echo $message = '<span>You sell your silver pajamas for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverpajamas = silverpajamas - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
		
		
// ------------------------------------------------------------------------------------------ SELL ITEMS - HANDS
// ------------------------------------------------------------------------------------------ SELL ITEMS - HANDS
// ------------------------------------------------------------------------------------------ SELL ITEMS - HANDS

// ---------------------------------------------------------- sell traininggloves
if($input=='sell training gloves' && $row['traininggloves'] >= 1) 
{		$sellamt = $_SESSION['COSTtraininggloves'] * $sellpercent;
		echo $message = '<span>You sell your training gloves for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET traininggloves = traininggloves - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell wristbracers
if($input=='sell wrist bracers' && $row['wristbracers'] >= 1) 
{		$sellamt = $_SESSION['COSTwristbracers'] * $sellpercent;
		echo $message = '<span>You sell your wrist bracers for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET wristbracers = wristbracers - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
		
// ---------------------------------------------------------- sell glowingbrace
if($input=='sell glowing brace' && $row['glowingbrace'] >= 1) 
{		$sellamt = $_SESSION['COSTglowingbrace'] * $sellpercent;
		echo $message = '<span>You sell your glowing brace for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET glowingbrace = glowingbrace - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}					
// ---------------------------------------------------------- sell blackgloves
if($input=='sell black gloves' && $row['blackgloves'] >= 1) 
{		$sellamt = $_SESSION['COSTblackgloves'] * $sellpercent;
		echo $message = '<span>You sell your black gloves for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET blackgloves = blackgloves - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell greengloves
if($input=='sell green gloves' && $row['greengloves'] >= 1) 
{		$sellamt = $_SESSION['COSTgreengloves'] * $sellpercent;
		echo $message = '<span>You sell your green gloves for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET greengloves = greengloves - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell graygloves
if($input=='sell gray gloves' && $row['graygloves'] >= 1) 
{		$sellamt = $_SESSION['COSTgraygloves'] * $sellpercent;
		echo $message = '<span>You sell your gray gloves for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET graygloves = graygloves - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
// ---------------------------------------------------------- sell leathergloves
if($input=='sell leather gloves' && $row['leathergloves'] >= 1) 
{		$sellamt = $_SESSION['COSTleathergloves'] * $sellpercent;
		echo $message = '<span>You sell your leather gloves for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET leathergloves = leathergloves - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
// ---------------------------------------------------------- sell huntergloves
if($input=='sell hunter gloves' && $row['huntergloves'] >= 1) 
{		$sellamt = $_SESSION['COSThuntergloves'] * $sellpercent;
		echo $message = '<span>You sell your hunter gloves for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET huntergloves = huntergloves - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell trollgloves
if($input=='sell troll gloves' && $row['trollgloves'] >= 1) 
{		$sellamt = $_SESSION['COSTtrollgloves'] * $sellpercent;
		echo $message = '<span>You sell your troll gloves for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET trollgloves = trollgloves - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}					

// hands - TIER 2

// ---------------------------------------------------------- sell irongauntlets
if($input=='sell iron gauntlets' && $row['irongauntlets'] >= 1) 
{		$sellamt = $_SESSION['COSTirongauntlets'] * $sellpercent;
		echo $message = '<span>You sell your iron gauntlets for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET irongauntlets = irongauntlets - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell irongloves
if($input=='sell iron gloves' && $row['irongloves'] >= 1) 
{		$sellamt = $_SESSION['COSTirongloves'] * $sellpercent;
		echo $message = '<span>You sell your iron gloves for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET irongloves = irongloves - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell ironknuckles
if($input=='sell iron knuckles' && $row['ironknuckles'] >= 1) 
{		$sellamt = $_SESSION['COSTironknuckles'] * $sellpercent;
		echo $message = '<span>You sell your iron knuckles for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironknuckles = ironknuckles - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}					
// ---------------------------------------------------------- sell gatorgloves
if($input=='sell gator gloves' && $row['gatorgloves'] >= 1) 
{		$sellamt = $_SESSION['COSTgatorgloves'] * $sellpercent;
		echo $message = '<span>You sell your gator gloves for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET gatorgloves = gatorgloves - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell banditgloves
if($input=='sell bandit gloves' && $row['banditgloves'] >= 1) 
{		$sellamt = $_SESSION['COSTbanditgloves'] * $sellpercent;
		echo $message = '<span>You sell your bandit gloves for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET banditgloves = banditgloves - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell grottogloves
if($input=='sell grotto gloves' && $row['grottogloves'] >= 1) 
{		$sellamt = $_SESSION['COSTgrottogloves'] * $sellpercent;
		echo $message = '<span>You sell your grotto gloves for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET grottogloves = grottogloves - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell earthmittens
if($input=='sell earth mittens' && $row['earthmittens'] >= 1) 
{		$sellamt = $_SESSION['COSTearthmittens'] * $sellpercent;
		echo $message = '<span>You sell your earth mittens for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET earthmittens = earthmittens - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
	
	
// hands - TIER 3

// ---------------------------------------------------------- sell silvergauntlets
if($input=='sell silver gauntlets' && $row['silvergauntlets'] >= 1) 
{		$sellamt = $_SESSION['COSTsilvergauntlets'] * $sellpercent;
		echo $message = '<span>You sell your silver gauntlets for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silvergauntlets = silvergauntlets - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell steelgauntlets
if($input=='sell steel gauntlets' && $row['steelgauntlets'] >= 1) 
{		$sellamt = $_SESSION['COSTsteelgauntlets'] * $sellpercent;
		echo $message = '<span>You sell your steel gauntlets for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET steelgauntlets = steelgauntlets - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell steelgloves
if($input=='sell steel gloves' && $row['steelgloves'] >= 1) 
{		$sellamt = $_SESSION['COSTsteelgloves'] * $sellpercent;
		echo $message = '<span>You sell your steel gloves for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET steelgloves = steelgloves - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell silkbracers
if($input=='sell silk bracers' && $row['silkbracers'] >= 1) 
{		$sellamt = $_SESSION['COSTsilkbracers'] * $sellpercent;
		echo $message = '<span>You sell your silk bracers for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silkbracers = silkbracers - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}				
// ---------------------------------------------------------- sell gammahandwraps
if($input=='sell gamma handwraps' && $row['gammahandwraps'] >= 1) 
{		$sellamt = $_SESSION['COSTgammahandwraps'] * $sellpercent;
		echo $message = '<span>You sell your gamma handwraps for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET gammahandwraps = gammahandwraps - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}											
		
// hands - TIER 4
// ---------------------------------------------------------- sell mithrilgauntlets
if($input=='sell mithril gauntlets' && $row['mithrilgauntlets'] >= 1) 
{		$sellamt = $_SESSION['COSTmithrilgauntlets'] * $sellpercent;
		echo $message = '<span>You sell your mithril gauntlets for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET mithrilgauntlets = mithrilgauntlets - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell mithrilgloves
if($input=='sell mithril gloves' && $row['mithrilgloves'] >= 1) 
{		$sellamt = $_SESSION['COSTmithrilgloves'] * $sellpercent;
		echo $message = '<span>You sell your mithril gloves for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET mithrilgloves = mithrilgloves - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell vambraces
if($input=='sell vambraces' && $row['vambraces'] >= 1) 
{		$sellamt = $_SESSION['COSTvambraces'] * $sellpercent;
		echo $message = '<span>You sell your vambraces for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET vambraces = vambraces - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}			
// ---------------------------------------------------------- sell rangergloves
if($input=='sell ranger gloves' && $row['rangergloves'] >= 1) 
{		$sellamt = $_SESSION['COSTrangergloves'] * $sellpercent;
		echo $message = '<span>You sell your ranger gloves for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET rangergloves = rangergloves - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}
// ---------------------------------------------------------- sell glowinggloves
if($input=='sell glowing gloves' && $row['glowinggloves'] >= 1) 
{		$sellamt = $_SESSION['COSTglowinggloves'] * $sellpercent;
		echo $message = '<span>You sell your glowing gloves for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET glowinggloves = glowinggloves - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}		
		
		
	
// ------------------------------------------------------------------------------------------ SELL ITEMS - FEET
// ------------------------------------------------------------------------------------------ SELL ITEMS - FEET
// ------------------------------------------------------------------------------------------ SELL ITEMS - FEET

// ---------------------------------------------------------- sell trainingboots
if($input=='sell training boots' && $row['trainingboots'] >= 1) 
{		$sellamt = $_SESSION['COSTtrainingboots'] * $sellpercent;
		echo $message = '<span>You sell your training boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET trainingboots = trainingboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell redboots
if($input=='sell red boots' && $row['redboots'] >= 1) 
{		$sellamt = $_SESSION['COSTredboots'] * $sellpercent;
		echo $message = '<span>You sell your red boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET redboots = redboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell greenboots
if($input=='sell green boots' && $row['greenboots'] >= 1) 
{		$sellamt = $_SESSION['COSTgreenboots'] * $sellpercent;
		echo $message = '<span>You sell your green boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET greenboots = greenboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell blackboots
if($input=='sell black boots' && $row['blackboots'] >= 1) 
{		$sellamt = $_SESSION['COSTblackboots'] * $sellpercent;
		echo $message = '<span>You sell your black boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET blackboots = blackboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell grayboots
if($input=='sell gray boots' && $row['grayboots'] >= 1) 
{		$sellamt = $_SESSION['COSTgrayboots'] * $sellpercent;
		echo $message = '<span>You sell your gray boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET grayboots = grayboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell slippers
if($input=='sell slippers' && $row['slippers'] >= 1) 
{		$sellamt = $_SESSION['COSTslippers'] * $sellpercent;
		echo $message = '<span>You sell your slippers for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET slippers = slippers - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell leatherboots
if($input=='sell leather boots' && $row['leatherboots'] >= 1) 
{		$sellamt = $_SESSION['COSTleatherboots'] * $sellpercent;
		echo $message = '<span>You sell your leather boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET leatherboots = leatherboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell trollboots
if($input=='sell troll boots' && $row['trollboots'] >= 1) 
{		$sellamt = $_SESSION['COSTtrollboots'] * $sellpercent;
		echo $message = '<span>You sell your troll boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET trollboots = trollboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell boneboots
if($input=='sell bone boots' && $row['boneboots'] >= 1) 
{		$sellamt = $_SESSION['COSTboneboots'] * $sellpercent;
		echo $message = '<span>You sell your bone boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET boneboots = boneboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
							
	// feet - TIER 2
// ---------------------------------------------------------- sell ironboots
if($input=='sell iron boots' && $row['ironboots'] >= 1) 
{		$sellamt = $_SESSION['COSTironboots'] * $sellpercent;
		echo $message = '<span>You sell your iron boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironboots = ironboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell bigfootboots
if($input=='sell bigfoot boots' && $row['bigfootboots'] >= 1) 
{		$sellamt = $_SESSION['COSTbigfootboots'] * $sellpercent;
		echo $message = '<span>You sell your bigfoot boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bigfootboots = bigfootboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell banditboots
if($input=='sell bandit boots' && $row['banditboots'] >= 1) 
{		$sellamt = $_SESSION['COSTbanditboots'] * $sellpercent;
		echo $message = '<span>You sell your bandit boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET banditboots = banditboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell mudboots
if($input=='sell mud boots' && $row['mudboots'] >= 1) 
{		$sellamt = $_SESSION['COSTmudboots'] * $sellpercent;
		echo $message = '<span>You sell your mud boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET mudboots = mudboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell warlockboots
if($input=='sell warlock boots' && $row['warlockboots'] >= 1) 
{		$sellamt = $_SESSION['COSTwarlockboots'] * $sellpercent;
		echo $message = '<span>You sell your warlock boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET warlockboots = warlockboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell earthboots
if($input=='sell earth boots' && $row['earthboots'] >= 1) 
{		$sellamt = $_SESSION['COSTearthboots'] * $sellpercent;
		echo $message = '<span>You sell your earth boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET earthboots = earthboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	

// feet - TIER 3
// ---------------------------------------------------------- sell ironboots
if($input=='sell silver boots' && $row['silverboots'] >= 1) 
{		$sellamt = $_SESSION['COSTsilverboots'] * $sellpercent;
		echo $message = '<span>You sell your silver boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverboots = silverboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	

// ---------------------------------------------------------- sell steelboots
if($input=='sell steel boots' && $row['steelboots'] >= 1) 
{		$sellamt = $_SESSION['COSTsteelboots'] * $sellpercent;
		echo $message = '<span>You sell your steel boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET steelboots = steelboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell thunderboots
if($input=='sell thunder boots' && $row['thunderboots'] >= 1) 
{		$sellamt = $_SESSION['COSTthunderboots'] * $sellpercent;
		echo $message = '<span>You sell your thunder boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET thunderboots = thunderboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell gammaboots
if($input=='sell gamma boots' && $row['gammaboots'] >= 1) 
{		$sellamt = $_SESSION['COSTgammaboots'] * $sellpercent;
		echo $message = '<span>You sell your gamma boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET gammaboots = gammaboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell rangerboots
if($input=='sell ranger boots' && $row['rangerboots'] >= 1) 
{		$sellamt = $_SESSION['COSTrangerboots'] * $sellpercent;
		echo $message = '<span>You sell your ranger boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET rangerboots = rangerboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell silverslippers
if($input=='sell silver slippers' && $row['silverslippers'] >= 1) 
{		$sellamt = $_SESSION['COSTsilverslippers'] * $sellpercent;
		echo $message = '<span>You sell your silver slippers for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverslippers = silverslippers - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
		
// feet - TIER 4
// ---------------------------------------------------------- sell ironboots
if($input=='sell mithril boots' && $row['mithrilboots'] >= 1) 
{		$sellamt = $_SESSION['COSTmithrilboots'] * $sellpercent;
		echo $message = '<span>You sell your mithril boots for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET mithrilboots = mithrilboots - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}	
// ---------------------------------------------------------- sell crimsonmoccasins
if($input=='sell silver moccasins' && $row['silvermoccasins'] >= 1) 
{		$sellamt = $_SESSION['COSTsilvermoccasins'] * $sellpercent;
		echo $message = '<span>You sell your silver moccasins for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silvermoccasins = silvermoccasins - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}						
// ---------------------------------------------------------- sell rangermoccasins
if($input=='sell silver moccasins' && $row['silvermoccasins'] >= 1) 
{		$sellamt = $_SESSION['COSTsilvermoccasins'] * $sellpercent;
		echo $message = '<span>You sell your silver moccasins for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silvermoccasins = silvermoccasins - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}					
// ---------------------------------------------------------- sell silkmoccasins
if($input=='sell silver moccasins' && $row['silvermoccasins'] >= 1) 
{		$sellamt = $_SESSION['COSTsilvermoccasins'] * $sellpercent;
		echo $message = '<span>You sell your silver moccasins for '.$sellamt.' '.$_SESSION['currency'].'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silvermoccasins = silvermoccasins - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellamt"); 
		}					
				

// }
?>