<?php
		  
		  

// ------------------------------------------------------------------ BOX OF LIGHT - ROOM 000
if ($roomID=='000'){
			
			
if ($input=='ex sign')	 {
	echo "<h6>EX SIGN</h6>
	When you EXAMINE an item you will be given a brief description of it. Next you should EX PILLAR";
}		

else if ($input=='look') {
	echo "<h6>Look</h6>When you look around you are given a description of the room you are in. Go ahead and read the description in the center FEED column. When you are done you should click EX SIGN.";
}
else if ($input=='ex pillar') {
	echo "<h6>EX PILLAR</h6>Pillars are strange yet perfect geometric shapes jutting from the group. They will often offer massive quest rewards or supernatural abilities.<br />
<br />
This pillar has a light at the top of it. Go ahead and EX LIGHT.";
		 
}
else if ($input=='ex light') {
	echo "<h6>EX LIGHT</h6>
		 The light is very bright and as you just figured out, is a button. Before you press the button, read the sign if you haven't already.";
		 
}
else if ($input=='read sign') {
	echo "<h6>READ SIGN</h6>You will find many signs in the world above. Read them for useful information and directions. You will also come across maps. There is one here. PICK UP MAP.";
		 
}
else if ($input=='pick up map') {
	echo "<h6>PICK UP MAP</h6>
Maps are very useful. Get a bird eyes view of the rooms around you. To view your current map click the MAP tab above. [to exit the menu hit EXIT MENU at the left or right of the screen].<br />
After you check the map EXIT MENU and LOOK again.";

}
else if ($input=='look') {
	
echo "<h6>LOOK</h6>
Remember, if you don't know what to do, you should LOOK around. When you feel like you are done hanging out in this room go ahead and PRESS BUTTON to teleport to the Grassy Field.";
}

else {
	echo "<h6>Hey there $username!</h6>
		  You are in a strange place and i'm here to help you. I'll usually be around to give you helpful advice as you go on your journey. And remember, if you don't what to do, or are ever lost, press LOOK.";
		 

		 
	}
		 
		 } // END ROOM 000