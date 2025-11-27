<?php


// ---------------------------------------------------- 29 - Destroyed Academy - Grand Quest
$_SESSION['dangerLVL'] = "0";
$dirNW='active gray';
$dirS='active greenfield';
$icon = file_get_contents("img/svg/environment/destroyed-academy.svg");

echo '<div class="roomBox">
<div class="roomIconTitle">

<span class="icon roomIcon lgray">'.$icon.'</span>
<div class="roomTitle">
<h3>Destroyed Academy</h3>
<h4 class="gold">Grand Quest</h4>
</div>
</div>
<p>The shattered remains of a once majestic academy now stand, its crumbling walls revealing a labyrinth of broken archways, tattered banners, and fallen stone. Complete these grand quests to rebuild the Academy.</p>
<form id="mainForm" method="post" action="" name="formInput">
  <a href data-link="quests" class="btn goldBG">Open Quests </a>
  <button type="submit" name="input1" value="south">South</button>
</form></div>';



/*  <br>
  <span>You have completed </span>
  <div class="roomTitle">
<h3><span class="green">'.$_SESSION['questCounter'].'</span> Quests</h3>
</div>
  <br>
  <a href data-link="quests" class="btn goldBG">Open Quests </a>
  <button type="submit" name="input1" value="south">South</button>
  </div>
<p> 5 Quests-  <button type="submit" name="input1" class="greenBG" value="unlock library">Unlock Library</button> Unlocks books + lore </p>
  </div>
<p> 10 Quests - Unlock Garden - Reddberry & Blueberry</p>
  </div>
<p> 20 Quests - Unlock Cow Farm</p>
  </div>
<p> 30 Quests - Unlock Jeweler</p>
  </div>
<p> 40 Quests - Unlock Blacksmith</p>
  */



/*
  <h4>GRAND QUESTS:</h4>
  <input type="submit" name="input1" class=" goldBG" value="grand quest 1" /> Grassy Field Savior<br>
  <input type="submit" name="input1" class=" goldBG" value="grand quest 2" /> Red Town Savior<br>
  <input type="submit" name="input1" class=" goldBG" value="grand quest 3" /> Rocky Flats Savior <br>
  <input type="submit" name="input1" class=" goldBG" value="grand quest 4" /> Mountain Savior<br>
  <input type="submit" name="input1" class=" goldBG" value="grand quest 5" /> Star City Savior<br>
  */


  /*
  echo '<div class="gslice">
  </div>
<p>You have completed </p>
  <h5><span class="green">'.$_SESSION['questCounter'].'</span>/70 Quests</h5>';


  

  echo '<div class="questCircles">';
    if ($row['quest1']=='0') {echo '<span class="qbox q0">1</span>';}
    if ($row['quest1']=='1') {echo '<span class="qbox q1">1</span>';}
    if ($row['quest1']=='2') {echo '<span class="qbox q2">1</span>';}

    if ($row['quest2']=='0') {echo '<span class="qbox q0">2</span>';}
    if ($row['quest2']=='1') {echo '<span class="qbox q1">2</span>';}
    if ($row['quest2']=='2') {echo '<span class="qbox q2">2</span>';}

    if ($row['quest3']=='0') {echo '<span class="qbox q0">3</span>';}
    if ($row['quest3']=='1') {echo '<span class="qbox q1">3</span>';}
    if ($row['quest3']=='2') {echo '<span class="qbox q2">3</span>';}

    if ($row['quest4']=='0') {echo '<span class="qbox q0">4</span>';}
    if ($row['quest4']=='1') {echo '<span class="qbox q1">4</span>';}
    if ($row['quest4']=='2') {echo '<span class="qbox q2">4</span>';}

    if ($row['quest5']=='0') {echo '<span class="qbox q0">5</span>';}
    if ($row['quest5']=='1') {echo '<span class="qbox q1">5</span>';}
    if ($row['quest5']=='2') {echo '<span class="qbox q2">5</span>';}

    if ($row['quest6']=='0') {echo '<span class="qbox q0">6</span>';}
    if ($row['quest6']=='1') {echo '<span class="qbox q1">6</span>';}
    if ($row['quest6']=='2') {echo '<span class="qbox q2">6</span>';}

    if ($row['quest7']=='0') {echo '<span class="qbox q0">7</span>';}
    if ($row['quest7']=='1') {echo '<span class="qbox q1">7</span>';}
    if ($row['quest7']=='2') {echo '<span class="qbox q2">7</span>';}

    if ($row['quest8']=='0') {echo '<span class="qbox q0">8</span>';}
    if ($row['quest8']=='1') {echo '<span class="qbox q1">8</span>';}
    if ($row['quest8']=='2') {echo '<span class="qbox q2">8</span>';}

    if ($row['quest9']=='0') {echo '<span class="qbox q0">9</span>';}
    if ($row['quest9']=='1') {echo '<span class="qbox q1">9</span>';}
    if ($row['quest9']=='2') {echo '<span class="qbox q2">9</span>';}

    if ($row['quest10']=='0') {echo '<span class="qbox q0">10</span>';}
    if ($row['quest10']=='1') {echo '<span class="qbox q1">10</span>';}
    if ($row['quest10']=='2') {echo '<span class="qbox q2">10</span>';}



//    echo '</div>';
//  }

// ----------------------------------------- IN PROGRESS - GRAND QUEST 2

//   if ($row['grandquest2']>='1') {
//       echo '<div class="gslice">
//       <h5>Grand Quest 2 <span class="white">Forest Age </span></h5>';

    if ($row['quest11']=='0') {echo '<span class="qbox q0">11</span>';}
    if ($row['quest11']=='1') {echo '<span class="qbox q1">11</span>';}
    if ($row['quest11']=='2') {echo '<span class="qbox q2">11</span>';}

    if ($row['quest12']=='0') {echo '<span class="qbox q0">12</span>';}
    if ($row['quest12']=='1') {echo '<span class="qbox q1">12</span>';}
    if ($row['quest12']=='2') {echo '<span class="qbox q2">12</span>';}

    if ($row['quest13']=='0') {echo '<span class="qbox q0">13</span>';}
    if ($row['quest13']=='1') {echo '<span class="qbox q1">13</span>';}
    if ($row['quest13']=='2') {echo '<span class="qbox q2">13</span>';}

    if ($row['quest14']=='0') {echo '<span class="qbox q0">14</span>';}
    if ($row['quest14']=='1') {echo '<span class="qbox q1">14</span>';}
    if ($row['quest14']=='2') {echo '<span class="qbox q2">14</span>';}

    if ($row['quest15']=='0') {echo '<span class="qbox q0">15</span>';}
    if ($row['quest15']=='1') {echo '<span class="qbox q1">15</span>';}
    if ($row['quest15']=='2') {echo '<span class="qbox q2">15</span>';}

    if ($row['quest16']=='0') {echo '<span class="qbox q0">16</span>';}
    if ($row['quest16']=='1') {echo '<span class="qbox q1">16</span>';}
    if ($row['quest16']=='2') {echo '<span class="qbox q2">16</span>';}

    if ($row['quest17']=='0') {echo '<span class="qbox q0">17</span>';}
    if ($row['quest17']=='1') {echo '<span class="qbox q1">17</span>';}
    if ($row['quest17']=='2') {echo '<span class="qbox q2">17</span>';}

    if ($row['quest18']=='0') {echo '<span class="qbox q0">18</span>';}
    if ($row['quest18']=='1') {echo '<span class="qbox q1">18</span>';}
    if ($row['quest18']=='2') {echo '<span class="qbox q2">18</span>';}

    if ($row['quest19']=='0') {echo '<span class="qbox q0">19</span>';}
    if ($row['quest19']=='1') {echo '<span class="qbox q1">19</span>';}
    if ($row['quest19']=='2') {echo '<span class="qbox q2">19</span>';}

    if ($row['quest20']=='0') {echo '<span class="qbox q0">20</span>';}
    if ($row['quest20']=='1') {echo '<span class="qbox q1">20</span>';}
    if ($row['quest20']=='2') {echo '<span class="qbox q2">20</span>';}

    if ($row['quest21']=='0') {echo '<span class="qbox q0">21</span>';}
    if ($row['quest21']=='1') {echo '<span class="qbox q1">21</span>';}
    if ($row['quest21']=='2') {echo '<span class="qbox q2">21</span>';}

    if ($row['quest22']=='0') {echo '<span class="qbox q0">22</span>';}
    if ($row['quest22']=='1') {echo '<span class="qbox q1">22</span>';}
    if ($row['quest22']=='2') {echo '<span class="qbox q2">22</span>';}

    if ($row['quest23']=='0') {echo '<span class="qbox q0">23</span>';}
    if ($row['quest23']=='1') {echo '<span class="qbox q1">23</span>';}
    if ($row['quest23']=='2') {echo '<span class="qbox q2">23</span>';}

    if ($row['quest24']=='0') {echo '<span class="qbox q0">24</span>';}
    if ($row['quest24']=='1') {echo '<span class="qbox q1">24</span>';}
    if ($row['quest24']=='2') {echo '<span class="qbox q2">24</span>';}

    if ($row['quest25']=='0') {echo '<span class="qbox q0">25</span>';}
    if ($row['quest25']=='1') {echo '<span class="qbox q1">25</span>';}
    if ($row['quest25']=='2') {echo '<span class="qbox q2">25</span>';}

    if ($row['quest26']=='0') {echo '<span class="qbox q0">26</span>';}
    if ($row['quest26']=='1') {echo '<span class="qbox q1">26</span>';}
    if ($row['quest26']=='2') {echo '<span class="qbox q2">26</span>';}

    if ($row['quest27']=='0') {echo '<span class="qbox q0">27</span>';}
    if ($row['quest27']=='1') {echo '<span class="qbox q1">27</span>';}
    if ($row['quest27']=='2') {echo '<span class="qbox q2">27</span>';}

    if ($row['quest28']=='0') {echo '<span class="qbox q0">28</span>';}
    if ($row['quest28']=='1') {echo '<span class="qbox q1">28</span>';}
    if ($row['quest28']=='2') {echo '<span class="qbox q2">28</span>';}

    if ($row['quest29']=='0') {echo '<span class="qbox q0">29</span>';}
    if ($row['quest29']=='1') {echo '<span class="qbox q1">29</span>';}
    if ($row['quest29']=='2') {echo '<span class="qbox q2">29</span>';}

    if ($row['quest30']=='0') {echo '<span class="qbox q0">30</span>';}
    if ($row['quest30']=='1') {echo '<span class="qbox q1">30</span>';}
    if ($row['quest30']=='2') {echo '<span class="qbox q2">30</span>';}
//    echo '</div>';
//   }

// ----------------------------------------- END GRAND QUEST 2


// ----------------------------------------- IN PROGRESS - GRAND QUEST 3
//    if ($row['grandquest3']>='1') {
//        echo '<div class="gslice">
//         <h5>Grand Quest 3 <span class="white">Ocean Age </span></h5>';


    if ($row['quest31']=='0') {echo '<span class="qbox q0">31</span>';}
    if ($row['quest31']=='1') {echo '<span class="qbox q1">31</span>';}
    if ($row['quest31']=='2') {echo '<span class="qbox q2">31</span>';}

    if ($row['quest32']=='0') {echo '<span class="qbox q0">32</span>';}
    if ($row['quest32']=='1') {echo '<span class="qbox q1">32</span>';}
    if ($row['quest32']=='2') {echo '<span class="qbox q2">32</span>';}

    if ($row['quest33']=='0') {echo '<span class="qbox q0">33</span>';}
    if ($row['quest33']=='1') {echo '<span class="qbox q1">33</span>';}
    if ($row['quest33']=='2') {echo '<span class="qbox q2">33</span>';}

    if ($row['quest34']=='0') {echo '<span class="qbox q0">34</span>';}
    if ($row['quest34']=='1') {echo '<span class="qbox q1">34</span>';}
    if ($row['quest34']=='2') {echo '<span class="qbox q2">34</span>';}

    if ($row['quest35']=='0') {echo '<span class="qbox q0">35</span>';}
    if ($row['quest35']=='1') {echo '<span class="qbox q1">35</span>';}
    if ($row['quest35']=='2') {echo '<span class="qbox q2">35</span>';}

    if ($row['quest36']=='0') {echo '<span class="qbox q0">36</span>';}
    if ($row['quest36']=='1') {echo '<span class="qbox q1">36</span>';}
    if ($row['quest36']=='2') {echo '<span class="qbox q2">36</span>';}

    if ($row['quest37']=='0') {echo '<span class="qbox q0">37</span>';}
    if ($row['quest37']=='1') {echo '<span class="qbox q1">37</span>';}
    if ($row['quest37']=='2') {echo '<span class="qbox q2">37</span>';}

    if ($row['quest38']=='0') {echo '<span class="qbox q0">38</span>';}
    if ($row['quest38']=='1') {echo '<span class="qbox q1">38</span>';}
    if ($row['quest38']=='2') {echo '<span class="qbox q2">38</span>';}

    if ($row['quest39']=='0') {echo '<span class="qbox q0">39</span>';}
    if ($row['quest39']=='1') {echo '<span class="qbox q1">39</span>';}
    if ($row['quest39']=='2') {echo '<span class="qbox q2">39</span>';}

    if ($row['quest40']=='0') {echo '<span class="qbox q0">40</span>';}
    if ($row['quest40']=='1') {echo '<span class="qbox q1">40</span>';}
    if ($row['quest40']=='2') {echo '<span class="qbox q2">40</span>';}

    if ($row['quest41']=='0') {echo '<span class="qbox q0">41</span>';}
    if ($row['quest41']=='1') {echo '<span class="qbox q1">41</span>';}
    if ($row['quest41']=='2') {echo '<span class="qbox q2">41</span>';}

    if ($row['quest42']=='0') {echo '<span class="qbox q0">42</span>';}
    if ($row['quest42']=='1') {echo '<span class="qbox q1">42</span>';}
    if ($row['quest42']=='2') {echo '<span class="qbox q2">42</span>';}

    if ($row['quest43']=='0') {echo '<span class="qbox q0">43</span>';}
    if ($row['quest43']=='1') {echo '<span class="qbox q1">43</span>';}
    if ($row['quest43']=='2') {echo '<span class="qbox q2">43</span>';}

    if ($row['quest44']=='0') {echo '<span class="qbox q0">44</span>';}
    if ($row['quest44']=='1') {echo '<span class="qbox q1">44</span>';}
    if ($row['quest44']=='2') {echo '<span class="qbox q2">44</span>';}

    if ($row['quest45']=='0') {echo '<span class="qbox q0">45</span>';}
    if ($row['quest45']=='1') {echo '<span class="qbox q1">45</span>';}
    if ($row['quest45']=='2') {echo '<span class="qbox q2">45</span>';}

    if ($row['quest46']=='0') {echo '<span class="qbox q0">46</span>';}
    if ($row['quest46']=='1') {echo '<span class="qbox q1">46</span>';}
    if ($row['quest46']=='2') {echo '<span class="qbox q2">46</span>';}

    if ($row['quest47']=='0') {echo '<span class="qbox q0">47</span>';}
    if ($row['quest47']=='1') {echo '<span class="qbox q1">47</span>';}
    if ($row['quest47']=='2') {echo '<span class="qbox q2">47</span>';}

    if ($row['quest48']=='0') {echo '<span class="qbox q0">48</span>';}
    if ($row['quest48']=='1') {echo '<span class="qbox q1">48</span>';}
    if ($row['quest48']=='2') {echo '<span class="qbox q2">48</span>';}

    if ($row['quest49']=='0') {echo '<span class="qbox q0">49</span>';}
    if ($row['quest49']=='1') {echo '<span class="qbox q1">49</span>';}
    if ($row['quest49']=='2') {echo '<span class="qbox q2">49</span>';}

    if ($row['quest50']=='0') {echo '<span class="qbox q0">50</span>';}
    if ($row['quest50']=='1') {echo '<span class="qbox q1">50</span>';}
    if ($row['quest50']=='2') {echo '<span class="qbox q2">50</span>';}
//      echo '</div>';
//   }

// ----------------------------------------- IN PROGRESS - GRAND QUEST 4
//    if ($row['grandquest4']>='1') {
//         echo '<div class="gslice">
//         <h5>Grand Quest 4 <span class="white">Mountain Age </span></h5>';

    if ($row['quest51']=='0') {echo '<span class="qbox q0">51</span>';}
    if ($row['quest51']=='1') {echo '<span class="qbox q1">51</span>';}
    if ($row['quest51']=='2') {echo '<span class="qbox q2">51</span>';}

    if ($row['quest52']=='0') {echo '<span class="qbox q0">52</span>';}
    if ($row['quest52']=='1') {echo '<span class="qbox q1">52</span>';}
    if ($row['quest52']=='2') {echo '<span class="qbox q2">52</span>';}

    if ($row['quest53']=='0') {echo '<span class="qbox q0">53</span>';}
    if ($row['quest53']=='1') {echo '<span class="qbox q1">53</span>';}
    if ($row['quest53']=='2') {echo '<span class="qbox q2">53</span>';}

    if ($row['quest54']=='0') {echo '<span class="qbox q0">54</span>';}
    if ($row['quest54']=='1') {echo '<span class="qbox q1">54</span>';}
    if ($row['quest54']=='2') {echo '<span class="qbox q2">54</span>';}

    if ($row['quest55']=='0') {echo '<span class="qbox q0">55</span>';}
    if ($row['quest55']=='1') {echo '<span class="qbox q1">55</span>';}
    if ($row['quest55']=='2') {echo '<span class="qbox q2">55</span>';}

    if ($row['quest56']=='0') {echo '<span class="qbox q0">56</span>';}
    if ($row['quest56']=='1') {echo '<span class="qbox q1">56</span>';}
    if ($row['quest56']=='2') {echo '<span class="qbox q2">56</span>';}

    if ($row['quest57']=='0') {echo '<span class="qbox q0">57</span>';}
    if ($row['quest57']=='1') {echo '<span class="qbox q1">57</span>';}
    if ($row['quest57']=='2') {echo '<span class="qbox q2">57</span>';}

    if ($row['quest58']=='0') {echo '<span class="qbox q0">58</span>';}
    if ($row['quest58']=='1') {echo '<span class="qbox q1">58</span>';}
    if ($row['quest58']=='2') {echo '<span class="qbox q2">58</span>';}

    if ($row['quest59']=='0') {echo '<span class="qbox q0">59</span>';}
    if ($row['quest59']=='1') {echo '<span class="qbox q1">59</span>';}
    if ($row['quest59']=='2') {echo '<span class="qbox q2">59</span>';}

    if ($row['quest60']=='0') {echo '<span class="qbox q0">60</span>';}
    if ($row['quest60']=='1') {echo '<span class="qbox q1">60</span>';}
    if ($row['quest60']=='2') {echo '<span class="qbox q2">60</span>';}

    if ($row['quest61']=='0') {echo '<span class="qbox q0">61</span>';}
    if ($row['quest61']=='1') {echo '<span class="qbox q1">61</span>';}
    if ($row['quest61']=='2') {echo '<span class="qbox q2">61</span>';}

    if ($row['quest62']=='0') {echo '<span class="qbox q0">62</span>';}
    if ($row['quest62']=='1') {echo '<span class="qbox q1">62</span>';}
    if ($row['quest62']=='2') {echo '<span class="qbox q2">62</span>';}

    if ($row['quest63']=='0') {echo '<span class="qbox q0">63</span>';}
    if ($row['quest63']=='1') {echo '<span class="qbox q1">63</span>';}
    if ($row['quest63']=='2') {echo '<span class="qbox q2">63</span>';}

    if ($row['quest64']=='0') {echo '<span class="qbox q0">64</span>';}
    if ($row['quest64']=='1') {echo '<span class="qbox q1">64</span>';}
    if ($row['quest64']=='2') {echo '<span class="qbox q2">64</span>';}

    if ($row['quest65']=='0') {echo '<span class="qbox q0">65</span>';}
    if ($row['quest65']=='1') {echo '<span class="qbox q1">65</span>';}
    if ($row['quest65']=='2') {echo '<span class="qbox q2">65</span>';}

    if ($row['quest66']=='0') {echo '<span class="qbox q0">66</span>';}
    if ($row['quest66']=='1') {echo '<span class="qbox q1">66</span>';}
    if ($row['quest66']=='2') {echo '<span class="qbox q2">66</span>';}

    if ($row['quest67']=='0') {echo '<span class="qbox q0">67</span>';}
    if ($row['quest67']=='1') {echo '<span class="qbox q1">67</span>';}
    if ($row['quest67']=='2') {echo '<span class="qbox q2">67</span>';}

    if ($row['quest68']=='0') {echo '<span class="qbox q0">68</span>';}
    if ($row['quest68']=='1') {echo '<span class="qbox q1">68</span>';}
    if ($row['quest68']=='2') {echo '<span class="qbox q2">68</span>';}

    if ($row['quest69']=='0') {echo '<span class="qbox q0">69</span>';}
    if ($row['quest69']=='1') {echo '<span class="qbox q1">69</span>';}
    if ($row['quest69']=='2') {echo '<span class="qbox q2">69</span>';}

    if ($row['quest70']=='0') {echo '<span class="qbox q0">70</span>';}
    if ($row['quest70']=='1') {echo '<span class="qbox q1">70</span>';}
    if ($row['quest70']=='2') {echo '<span class="qbox q2">70</span>';}


    echo '</div>';	


echo '</div>';	

*/

?>

