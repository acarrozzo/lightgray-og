<!doctype html>
<html>
<head>
<title>LG Mobile</title>

<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<!--
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
-->

<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=0, minimal-ui">


<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="mobile-web-app-capable" content="yes">
<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-retina.png" />
<link href='http://fonts.googleapis.com/css?family=Raleway:300,400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Dosis:300,400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="https://fontastic.s3.amazonaws.com/TCGhgaeZJzPgzSiUf3dwjZ/icons.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/lg.css" >



</head>

<body>
<h1> Light Gray RPG - The Longest Eon</h1>
<div id="wrapper" class="vert">
    <!---------------------------------------------------------------------- MAIN TABS -->
    <ul class="tabs">
        <li><a href="#" class="tab1 defaultTab fa fa-eye" rel="tabs1">
            <p>look</p>
            </a></li>
        <li><a href="#" class="tab2 icon-crowned-skull" rel="tabs2">
            <p>battle</p>
            </a></li>
        <li><a href="#" class="tab3 icon-sword-shield" rel="tabs3">
            <p>inv</p>
            </a></li>
        <li><a href="#" class="tab4 fa fa-child" rel="tabs4">
            <p>character</p>
            </a></li>
        <li><a href="#" class="tab5 fa fa-comment" rel="tabs5">
            <p>chat</p>
            </a></li>
        <li><a href="#" class="tab6 icon-trophy" rel="tabs6">
            <p>quests</p>
            </a></li>
        <li><a href="#" class="tab7 fa fa-home" rel="tabs7">
            <p>home</p>
            </a></li>
    </ul>
    <!---------------------------------------------------------------------- 1 - LOOK -->
    <div class="tab-content lookTAB" id="tabs1">
        <ul class="subTabs">
            <li class="defaultSubTab"><span class="fullToggler"><i class="fa fa-minus-circle"></i></span><a href="#" rel="tabs1a"> </a>
</li>
			<li><a href="#" class="icon-world" rel="tabs1b">
                <p>map</p>
                </a></li>
            <li><a href="#" class="icon-teleport" rel="tabs1c">
                <p>teleport</p>
                </a></li>
            <li><a href="#" class="icon-book" rel="tabs1d">
                <p>book</p>
                </a></li>
        </ul>
        <!---------------------------------------------------------------------- 1a - LOOK - NAV & DESCRIPTION -->
        <div class="sub-tab-content" id="tabs1a">
            <!---------------------------------------------------------------------- GLOBAL BOX -->
            <div id="globalBox" class="">
                <!---------------------------------------------------------------------- dPad - MAP & NAV -->
                <div class="gFrame navFrame">
                <h2 class="toggler"><i class="fa fa-minus"></i> NAV</h2>
                    <ul id="dPad">
                        <li class="d-look mapToggler"></li>
                        <li class="dPad-nw"><i class="fa fa-arrow-left rotate-45"></i></li>
                        <li class="dPad-n"><i class="fa fa-arrow-up"></i></li>
                        <li class="dPad-ne"><i class="fa fa-arrow-up rotate-45"></i></li>
                        <li class="dPad-w"><i class="fa fa-arrow-left"></i></li>
                        <li class="dPad-spacer"></li>
                        <li class="dPad-e"><i class="fa fa-arrow-right"></i></li>
                        <li class="dPad-sw"><i class="fa fa-arrow-down rotate-45"></i></li>
                        <li class="dPad-s"><i class="fa fa-arrow-down"></i></li>
                        <li class="dPad-se"><i class="fa fa-arrow-right rotate-45"></i></li>
                        <li class="dPad-u disabled"><i class="fa fa-arrow-up"></i></li>
                        <li class="dPad-d disabled"><i class="fa fa-arrow-down"></i></li>
                    </ul>
                </div>
                                 <!---------------------------------------------------------------------- global actions -->
                <div class="gFrame actionFrame heightRead">
                <h2 class="toggler"><i class="fa fa-minus"></i> ACTIONS</h2>
                    <div class="btn blueBG pop">
                        <p><span class="icon fa fa-eye"></span>look </p>
                    </div>
                    <div class="btn redBG pop disabled">
                        <p><span class="icon icon-sword"></span>attack </p>
                    </div>
                    <div class="btn goldBG pop">
                        <p><span class="icon fa fa-search"></span>search </p>
                    </div>
                    <div class="btn greenBG pop">
                        <p><span class="icon fa fa-bed"></span>rest </p>
                    </div>
                    <div class="btn lightgrayBG pop">
                        <p><span class="icon fa fa-plus"></span>add action</p>
                    </div>
                    <div class="btn lightgrayBG pop">
                        <p><span class="icon fa fa-plus"></span>add action</p>
                    </div>
                    <div class="btn lightgrayBG pop">
                        <p><span class="icon fa fa-plus"></span>add action</p>
                    </div>
                </div>

              <!---------------------------------------------------------------------- LAST ACTION & FEED -->
                <div class="gFrame feedFrame heightRead">
                    <!---------------------------------------------------------------------- FEED -->
                    <div id="feed">
                        <p>this is the top of the feed</p>
                        <p>
                        You look around:
                        <strong>Grassy Field Crossroads </strong>
                        <span>[ <i class="red">+2 hp</i> ]</span>
                        <span>[ <i class="blue">+1 mp</i> ]</span>
                        </p>

                        <p>You travel northwest to the Healing Springs<br>
                        <span>[ <i class="red">+2 hp</i> ]</span>
                        <span>[ <i class="blue">+1 mp</i> ]</span>
                        </p>

                        <p>You rest at the waterfall and supercharge your HP and MP!<br>
                        <span>[ <i class="red">full hp +10</i> ]</span>
                        <span>[ <i class="blue">full mp +2</i> ]</span>
                        </p>

                        <p>You travel south to the Flower Patch<br>
                        <span>[ <i class="red">+2 hp</i> ]</span>
                        <span>[ <i class="blue">+1 mp</i> ]</span>
                        </p>

                        <p>You pick up a flower<br>
                        <span>[ <i class="yellow">+1 flower</i> ]</span>
                        <span>[ <i class="red">full hp +10</i> ]</span>
                        <span>[ <i class="blue">full mp +2</i> ]</span>
                        </p>

                        <p>You travel east to the Grassy Field Crossroads<br>
                        <span>[ <i class="red">+2 hp</i> ]</span>
                        <span>[ <i class="blue">+1 mp</i> ]</span>
                        </p>


                        <p>You travel northwest to the Healing Springs<br>
                        <span>[ <i class="red">+2 hp</i> ]</span>
                        <span>[ <i class="blue">+1 mp</i> ]</span>
                        </p>

                        <p>You rest at the waterfall and supercharge your HP and MP!<br>
                        <span>[ <i class="red">full hp +10</i> ]</span>
                        <span>[ <i class="blue">full mp +2</i> ]</span>
                        </p>

                        <p>You travel south to the Flower Patch<br>
                        <span>[ <i class="red">+2 hp</i> ]</span>
                        <span>[ <i class="blue">+1 mp</i> ]</span>
                        </p>

                        <p>You pick up a flower<br>
                        <span>[ <i class="yellow">+1 flower</i> ]</span>
                        <span>[ <i class="red">full hp +10</i> ]</span>
                        <span>[ <i class="blue">full mp +2</i> ]</span>
                        </p>

                        <p>You travel east to the Grassy Field Crossroads<br>
                        <span>[ <i class="red">+2 hp</i> ]</span>
                        <span>[ <i class="blue">+1 mp</i> ]</span>
                        </p>



                    </div>
                    <!---------------------------------------------------------------------- LAST ACTION -->
                    <div class="lastAction dgrayBG white">
                        <p><span class="lastActionLabel">last action</span>
                          You look around:
                        <strong>Grassy Field Crossroads </strong>
                        <span>[ <i class="red">+2 hp</i> ]</span>
                        <span>[ <i class="blue">+1 mp</i> ]</span>

                        </p>
                        <div class="toggleFeed fa fa-angle-up"><p>feed</p></div>
                    </div>
                </div>

            </div>

            <!---------------------------------------------------------------------- ROOM BOX -->
            <div id="roomBox" class="gFrame heightRead">
                <h2 class="toggler"><i class="fa fa-minus"></i> ROOM</h2>
                <div id="roomInfo">
                    <div class="roomImg"></div>
                    <h2 class="green">Grassy Field Crossroads</h2>
                    <p class="roomStat lgray">#001 - no danger</p>
                    <p class="roomDesc">The air is warm and the sky above is bright blue. You are standing at an intersection of paths. <strong>There is a sign here with a gold chest at it's base.</strong>  To the southeast you see a dark cave and to the southwest you see an inviting cabin. To the west you see a flower patch.</p>

                </div>

                <!---------------------------------------------------------------------- ACTION BUTTONS -->

                <div id="roomActions" class="collapsed">
        <!------------------------------- BTN - read sign -->
                <div class="btn greenBG pop">
                        <p><i class="icon icon-sign"></i>read sign</p>
                        <aside>You will find signs almost everywhere you go. <strong>Read signs for useful information.</strong> This one will help you know what's around.</aside>
                        <div class="popBox">
                            <div class="popContent">
                                <h2>You read the sign</h2>
                                <span class='bigImg icon-sign lightbrown'></span>
                                <div class="module"><span class='fa fa-arrow-left rotate-45'></span><strong>Healing Waterfall</strong> Supercharge your HP & MP </div>
                                <div class="module"><span class='fa fa-arrow-up rotate-45'></span><strong>Pajama Shaman</strong> Shop, Skills, & Spells</div>
                                <div class="module"><span class='fa fa-arrow-down rotate-45'></span><strong>Wood Cabin - START HERE</strong> Old Man & Young Soldier </div>
                                <div class="module"><span class='fa fa-arrow-right rotate-45'></span><strong>Spider Cave</strong> Fight Baddies! Get XP & Loot </div>
                                <strong class='brown'>Feel free to explore the grassy field as much as you like. When you are ready to start your first quest visit the Old Man to the southwest.</strong>
                                <div class="okBtn close" >OK</div>
                            </div>
                        </div>
                    </div>
        <!------------------------------- BTN - unlock chest -->
                    <div class="btn goldBG pop" >
                        <p><span class="icon icon-chest"></span>unlock chest </p>
                        <aside><strong>Gold Chests will always contain great rewards.</strong> Unlocking this one will get you a boomerang, some green boots, 500 coin and some experience. It will also unlock the path south to the Bat Cave.</strong></aside>
                        <div class="popBox">
                            <div class="popContent">
                                <h2>You can't open this chest yet!</h2>
                                <p class='px25'>You need a Gold Key!</p>
                                <span class='bigImg icon-chest gold'></span>
                                <hr>
                                <p class='px20'>You can get a Gold Key from the Young Soldier to the southwest.</p>
                                <hr>
                                <span class='medImg icon-key gold'></span>
                                <div class="okBtn close" >OK</div>
                            </div>
                        </div>
                    </div>
        <!------------------------------- BTN - attack dummy -->
                    <div class="btn redBG pop" >
                        <p><span class="icon fa fa-certificate"></span>attack dummy </p>
                        <aside><strong>XXX</strong></aside>
                        <div class="popBox">
                            <div class="popContent">
                                <h2>H2</h2>
                                <p class='px25'>p</p>
                                <span class='bigImg fa fa-plus red'></span>
                                <hr>
                                <p class='px20'>P</p>
                                <hr>
                                <span class='medImg fa fa-plus red'></span>
                                <div class="okBtn close" >OK</div>
                            </div>
                        </div>
                    </div>
                           <!------------------------------- BTN - pick redberry -->
                    <div class="btn redBG pop" >
                        <p><span class="icon fa fa-circle"></span>pick redberry</p>
                        <aside><strong>XXX</strong></aside>
                        <div class="popBox">
                            <div class="popContent">
                                <h2>H2</h2>
                                <p class='px25'>p</p>
                                <span class='bigImg fa fa-plus red'></span>
                                <hr>
                                <p class='px20'>P</p>
                                <hr>
                                <span class='medImg fa fa-plus red'></span>
                                <div class="okBtn close" >OK</div>
                            </div>
                        </div>
                    </div>
               <!------------------------------- BTN - cook meat -->
                    <div class="btn redBG pop" >
                        <p><span class="icon fa fa-fire"></span>cook meat </p>
                        <aside><strong>XXX</strong></aside>
                        <div class="popBox">
                            <div class="popContent">
                                <h2>H2</h2>
                                <p class='px25'>p</p>
                                <span class='bigImg fa fa-plus red'></span>
                                <hr>
                                <p class='px20'>P</p>
                                <hr>
                                <span class='medImg fa fa-plus red'></span>
                                <div class="okBtn close" >OK</div>
                            </div>
                        </div>
                    </div>
                <!------------------------------- BTN - pick up training sword -->
                    <div class="btn grayBG pop" >
                        <p><span class="icon icon-sword"></span>pick up training sword</p>
                        <aside><strong>XXX</strong></aside>
                        <div class="popBox">
                            <div class="popContent">
                                <h2>H2</h2>
                                <p class='px25'>p</p>
                                <span class='bigImg fa fa-plus red'></span>
                                <hr>
                                <p class='px20'>P</p>
                                <hr>
                                <span class='medImg fa fa-plus red'></span>
                                <div class="okBtn close" >OK</div>
                            </div>
                        </div>
                    </div>



<a class="btnToggler" ><i class="fa fa-angle-down"></i></a>
                </div>
            </div>
            <a class="toggleRounded">//toggleRounded</a>
        </div>
        <!---------------------------------------------------------------------- 1b - WORLD MAP -->
        <div class="sub-tab-content" id="tabs1b">
            <h2>World Map</h2>
            <h3 class="blue">Main Lands</h3>
            <div class="mapWrapper"> <span class="mapSquare blueBG">
                <p>Blue City</p>
                </span> <span class="mapSquare grayBG">
                <p>Mountains</p>
                </span> <span class="mapSquare darkgreenBG">
                <p>Dark Forest</p>
                </span> <span class="mapSquare lightblueBG">
                <p>Blue Ocean</p>
                </span> <span class="mapSquare greenBG">
                <p>Grassy Field</p>
                </span> <span class="mapSquare dgreenBG">
                <p>Forest</p>
                </span> <span class="mapSquare swampgreenBG">
                <p>Swamp</p>
                </span> <span class="mapSquare dgrayBG">
                <p>Rocky Flats</p>
                </span> <span class="mapSquare dredBG">
                <p>Red Town</p>
                </span> </div>
            <span class="textBlock">To leave the Grassy Field and get to the Forest you need to defeat the Goblin Chief. Find and talk to Jack Lumber.</span> </div>
        <div class="sub-tab-content" id="tabs1c">
            <h2>Teleport</h2>
            <h3 class="blue">Beam me up</h3>
        </div>
        <div class="sub-tab-content" id="tabs1d">
            <h2>Book</h2>
            <!---------------------------------------------------------------------- MANUAL / LIST -->

            <div class="listBox">
                <h2>Manual</h2>
                <ul class="list">
                    <li class="header">
                        <h2>One Handed Weapons</h2>
                        <span> Right Hand </span> <em>DROPPED BY</em> <span class="collapseBtn fa fa-chevron-up"></span> </li>
                    <li class="subHead">Tier 2</li>
                    <li>
                        <aside>weak 1h</aside>
                    </li>
                    <li><span></span> dagger <span>( <i class='red'>+1</i> str )</span> <em>rat, scorpion, goblin, thief...</em></li>
                    <li><span></span> stiletto <span>( <i class='red'>+1</i> str, <i class='blue'>+1</i> mag )</span> <em>sand crab</em></li>
                    <li><span></span> training sword <span>( <i class='red'>+3</i> str )</span> <em>FREE from young soldier</em></li>
                    <li><span></span> short sword <span>( <i class='red'>+4</i> str )</span> <em>sand crab</em></li>
                    <li>
                        <aside>classic 1h</aside>
                    </li>
                    <li><span></span> broad sword <span>( <i class='red'>+4</i> str, <i class='yellow'>+2</i> def )</span> <em>alpha scorpion</em></li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li>
                        <aside>advanced 1h</aside>
                    </li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li>
                        <aside>magic 1h</aside>
                    </li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li>
                        <aside>best of class - tier 1</aside>
                    </li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li class="subHead">Tier 2</li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                    <li><span></span> SWORD <span>( <i class='red'>+000</i> str, <i class='blue'>+000</i> mag )</span> <em> DROP </em></li>
                </ul>
                <ul class="list">
                    <li class="header">
                        <h2>Two Handed Weapons</h2>
                        <span> L + R </span><em>DROPPED BY</em> <span class="collapseBtn fa fa-chevron-up"></span> </li>
                    <li><span></span> training 2h sword <span>( <i class='red'>+6</i> str )</span> <em>free from young soldier</em></li>
                </ul>
                <ul class="list">
                    <li class="header">
                        <h2>Ranged Weapons</h2>
                        <span> R / L + R </span><em>DROPPED BY</em> <span class="collapseBtn fa fa-chevron-up"></span> </li>
                    <li><span></span> boomerang <span>( <i class='green'>+1</i> dex )</span> <em>grassy field <span class="gold">gold chest</span></em></li>
                </ul>
                <ul class="list">
                    <li class="header">
                        <h2>Shields / Off Hand Weapons</h2>
                        <span> L </span><em>DROPPED BY</em> <span class="collapseBtn fa fa-chevron-up"></span> </li>
                    <li><span></span> training shield <span>( <i class='gold'>+3</i> def )</span> <em>free from young soldier</em></li>
                </ul>
            </div>
        </div>
    </div>
    <!---------------------------------------------------------------------- 2 - BATTLE -->
    <div class="tab-content battleTAB" id="tabs2">
        <ul class="subTabs">
            <li class="defaultSubTab"><a href="#" rel="tabs2a">Battle</a></li>
            <li><a href="#" class="fa fa-plus" rel="tabs2b"></a></li>
            <li><a href="#" class="fa fa-plus" rel="tabs2c"></a></li>
            <li><a href="#" class="fa fa-plus" rel="tabs2d"></a></li>
        </ul>

    <!---------------------------------------------------------------------- BATTLE TAB MAIN -->
         <div class="sub-tab-content" id="tabs2a">
    <!---------------------------------------------------------------------- BATTLE FRAME -->
         <div class="battleFrame gFrame">
                <h2 class="toggler"><i class="fa fa-minus"></i> BATTLE</h2>
    <!---------------------------------------------------------------------- BATTLE BOX -->
                <div class="battleBox redBorder">

                    <div class="uAtt">
                        <i class="uAttImg  fa fa-male"></i>                        <span class="blueBG uAttFinal">7</span>

                        <div span="uAttMath">
                            <span>You attack the Gator with your gladius for <i class="red">7</i> damage.</span>
                        </div>
                        <div span="uAttMath">
                            <span class="red">( 7 + 0 ) - 0 = 7</span>
                        </div>
                    </div>

                    <div class="eAtt">
                        <em class="eAttImg fa fa-male"></em>
                        <span class="blackBG eAttFinal">7</span>

                        <div span="eAttMath">
                            <span>The Gator attacks you for <em class="red">2</em> damage. </span>
                        </div>
                        <div span="eAttMath">
                            <span class="red">4 - 2 = 2</span>                 		</div>
                    </div>
				</div>


<!---------------------------------------------------------------------- BATTLE INFO BOX -->
                <div class="battleBox bb2 darkergrayBG white">

                    <div class="">
                        <i class="uAttImg  fa fa-male"></i>                        <span class="blueBG uAttFinal">7</span>

                        <div span="uAttMath">
                            <span>You attack the Gator with your gladius for <i class="red">7</i> damage.</span>
                        </div>
                        <div span="uAttMath">
                            <span class="red">( 7 + 0 ) - 0 = 7</span>
                        </div>
                    </div>

                    <div class="">

                    <span class="">circle</span>


                        <i class="eAttImg fa fa-male"></i>

                        <div span="eAttMath">
                            <span>The Gator attacks you for <em class="red">2</em> damage. </span>
                        </div>
                        <div span="eAttMath">
                            <span class="red">4 - 2 = 2</span>                 		</div>
                    </div>
				</div>




           	</div>



        </div>



    </div>
    <!---------------------------------------------------------------------- 3 - INV -->
    <div class="tab-content invTAB" id="tabs3">
        <ul class="subTabs">
            <li class="defaultSubTab"><a href="#" rel="tabs3a">Inv</a></li>
            <li><a href="#" class="icon-battle-gear" rel="tabs3b"></a></li>
            <li><a href="#" class="icon-pouch" rel="tabs3c"></a></li>
            <li><a href="#" class="icon-anvil" rel="tabs3d"></a></li>
        </ul>
        <div class="sub-tab-content" id="tabs3a">Equipped</div>
        <div class="sub-tab-content" id="tabs3b">List</div>
        <div class="sub-tab-content" id="tabs3c">Pouch</div>
        <div class="sub-tab-content" id="tabs3d">Craft</div>
    </div>
    <!---------------------------------------------------------------------- 4 - CHARACTER -->
    <div class="tab-content" id="tabs4">
        <ul class="subTabs">
            <li class="defaultSubTab"><a href="#" rel="tabs4a">Character</a></li>
            <li><a href="#" class="icon-crossed-swords" rel="tabs4b"></a></li>
            <li><a href="#" class="icon-fireball" rel="tabs4c"></a></li>
            <li><a href="#" class="icon-full-stats" rel="tabs4d"></a></li>
        </ul>
        <div class="sub-tab-content" id="tabs4a">
            <!---------------------------------------------------------------------- 4-1 - MAIN CHARACTER STAT BOX -->
            <div id="statBox">
                <header> <span class="points gold"> CP <em class="white"> 1 </em> SP <em class="white">21</em> coin <em class="yellow"> 14k</em></span> <span class="name">Character Name</span> <span class="level red">lvl 16</span> </header>
                <ul class="statBars">
                    <li><span class="statNum"><span class="red">HP </span> 885 / 885</span>
                        <div class="bar">
                            <div class="barMid redBG" style="width: 50%">
                                <div class="barStat lightgray">885 </div>
                            </div>
                        </div>
                    </li>
                    <li><span class="statNum"><span class="blue">MP</span> 62 / 677</span>
                        <div class="bar">
                            <div class="barMid blueBG" style="width: 40%">
                                <div class="barStat lightgray">62 </div>
                            </div>
                        </div>
                    </li>
                    <li><span class="statNum"><span class="green">XP</span> 73451</span>
                        <div class="bar">
                            <div class="barMid greenBG" style="width: 70%">
                                <div class="barStat lightgray">4530 </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sub-tab-content" id="tabs4b">Skills</div>
        <div class="sub-tab-content" id="tabs4c">Spells</div>
        <div class="sub-tab-content" id="tabs4d">Full Stats</div>
    </div>
    <!---------------------------------------------------------------------- 5 - CHAT -->
    <div class="tab-content" id="tabs5">
        <ul class="subTabs">
            <li class="defaultSubTab"><a href="#" rel="tabs5a">Chat</a></li>
            <li><a href="#" class="fa fa-comments-o" rel="tabs5b"></a></li>
            <li><a href="#" class="fa fa-users" rel="tabs5c"></a></li>
            <li><a href="#" class="icon-book" rel="tabs5d"></a></li>
        </ul>
        <div class="sub-tab-content" id="tabs5a">NPC</div>
        <div class="sub-tab-content" id="tabs5b">Global Chat</div>
        <div class="sub-tab-content" id="tabs5c">Friends</div>
        <div class="sub-tab-content" id="tabs5d">Book</div>
    </div>
    <!---------------------------------------------------------------------- 6 - QUEST -->
    <div class="tab-content" id="tabs6">
        <ul class="subTabs">
            <li class="defaultSubTab"><a href="#" rel="tabs6a">Quest</a></li>
            <li><a href="#" class="icon-medal" rel="tabs6b"></a></li>
            <li><a href="#" class="icon-gem" rel="tabs6c"></a></li>
            <li><a href="#" class="icon-full-stats" rel="tabs6d"></a></li>
        </ul>
        <div class="sub-tab-content" id="tabs6a">Active</div>
        <div class="sub-tab-content" id="tabs6b">Completed</div>
        <div class="sub-tab-content" id="tabs6c">Not Found Yet</div>
        <div class="sub-tab-content" id="tabs6d">Book</div>
    </div>
    <!---------------------------------------------------------------------- 7 - HOME -->
    <div class="tab-content" id="tabs7">
        <ul class="subTabs">
            <li class="defaultSubTab"><a href="#" rel="tabs7a">Home</a></li>
            <li><a href="#" class="fa fa-plus" rel="tabs7b"></a></li>
            <li><a href="#" class="fa fa-plus" rel="tabs7c"></a></li>
            <li><a href="#" class="fa fa-gear" rel="tabs7d"></a></li>
        </ul>
        <div class="sub-tab-content" id="tabs7a">X</div>
        <div class="sub-tab-content" id="tabs7b">X</div>
        <div class="sub-tab-content" id="tabs7c">X</div>
        <div class="sub-tab-content" id="tabs7d">Settings</div>
    </div>

    <!---------------------------------------------------------------------- POP UP BOX FRAME -->
    <div id="popBox" style="display:none">
        <!--<span id="close" class="fa fa-times-circle" ></span>-->
        <div id="popContent">
            <!-- this is where pop up content will be injected -->
        </div>
        <span id="close" class="fa fa-times-circle" ></span> </div>
</div>
<!---------------------------------------------------------------------- END WRAPPER -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/lg.js"></script>

<!---------------------------------------------------------------------- CROP IT PLUGIN -->
<script src="plugins/cropit-master/dist/jquery.cropit.min.js"></script>
<script>
//$('#image-cropper').cropit();
// In the demos I'm passing in an imageState option
// so it renders an image by default:
// $('#image-cropper').cropit({ imageState: { src: { imageSrc } } });
 $('#image-cropper').cropit({ imageState: { src: 'img/lightgray_map_grassyfield_main.jpg' } });
</script>
<style>
.cropit-image-preview {
  height: 100%	;
  width: 100%;
  }
#image-cropper {
  clear: both;
  float: left;
  position: absolute;
  z-index: 2;
  left: 0;
  top: 0;
  background: #666;
  height: 100%	;
  width: 100%;
}

#mapFrame {visibility:hidden;width:0%;height:0%;margin:0;  position: absolute;
  top: 50%;
  left: 50%;cursor:pointer;}

#mapFrame.full {visibility:visible;background:#eee;width:100%;height:100%;margin:0;
  top: 0;
  left: 0;z-index:1;}

</style>
<div id="mapFrame">
                <!-- This wraps the whole cropper -->
<div id="image-cropper" class="gFrame">
  <!-- This is where the preview image is displayed -->
  <div class="cropit-image-preview"></div>

  <!-- This range input controls zoom -->
  <!-- You can add additional elements here, e.g. the image icons -->
  <input type="range" class="cropit-image-zoom-input" />

  <!-- The cropit- classes above are needed
       so cropit can identify these elements -->
</div>

</div>




<script>
// This totally disables body scrolling on iOS devices. Locks site in place.
// document.ontouchmove = function(e){ e.preventDefault(); }
</script>







</body>
</html>
