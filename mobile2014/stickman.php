<style>
.hide {display:none;}
</style>

<!doctype html>
<html>
    <head>
        <title>STICK MAN TEST</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:300,400,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/stickman.css" >

    </head>

    <body>

        <div class="buttons"> 


            <section>
                <h3>WEAPON</h3>
                <span class="toggleSword">Sword</span>
                <span class="toggle2h">2h Sword</span>
                <span class="toggleDagger">Dagger</span>
                <span class="toggleAltDagger">Dagger (alt)</span>
                <span class="toggleBo">Bo Staff</span>
                <span class="toggleWarhammer">Warhammer</span>
                <span class="toggleBattleAxe">Battle Axe</span>
            </section>    
            <section>
                <h3>WEIGHT</h3>
                <span class="toggleLight">Light</span>
                <span class="toggleMedium">Medium</span>
                <span class="toggleHeavy">Heavy</span>
            </section> 
            <section>
                <h3>BODY TYPE</h3> 
                <span class="toggleSquare">Square</span>
                <span class="toggleRound active">Rounded</span>
                <span class="toggleEllipse">Ellipse</span>
            </section>
            <section>
                <h3>RACE / SKEW</h3>
                <span class="toggleHuman">Human</span>
                <span class="toggleElven">Elven</span>
                <span class="toggleHalfling">Halfling</span>
                <span class="toggleDwarf">Dwarf</span>
            </section>
            <section>
                <h3>LEAN</h3>
                <span class="toggleLeanBack">L</span>
                <span class="toggleNoLean">C</span>
                <span class="toggleLeanForward">R</span>
                <h3>LEAN (old)</h3>
                <span class="toggleLeanL">L</span>
                <span class="toggleNoLean">C</span>
                <span class="toggleLeanR">R</span>
            </section>  

            <section>
                <span class="toggleReset">reset</span>
                <!--
                <span class="toggleZoom">ZOOM</span>
                -->
            </section>







        </div>

        <div id="stickman" class="round">
            <div id="raceBox"  class="">
                <div id="skewBox"  class="">
                    <div id="equipped"  class="">

                        
                        <div class="lowerHalf">
                            <div id="leftLeg" class="bPart"><span class="armorPiece hide"></span></div>
                            <div id="rightLeg" class="bPart"><span class="armorPiece hide"></span></div>
                        </div>
                        <div class="upperHalf">
                            <div id="head" class="bPart">
                                <span class="eyes hide">
                                    <i class="e1"><span class="pupil"></i>
                                    <i class="e2"><span class="pupil"></i>
                                </span>
                                <span class="armorPiece"></span>
                            </div>
                            <div id="body" class="bPart"><span class="armorPiece hide"></span></div>
                            <div id="leftArm" class="bPart"><span class="armorPiece hide"></span></div>
                            <div id="rightArm" class="bPart"><span class="armorPiece hide"></span></div>
                            <div id="swordHand">
                                <i class="p1"></i>
                                <i class="p2"></i>
                                <i class="p3"></i>
                                <i class="p4"></i>
                            </div>
                            <div id="shieldHand">
                                <i class="p1"></i>
                                <i class="p2"></i>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div> 

        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script> 

        <script>

            $(document).ready(function () {
                // ------ Toggle WEIGHT
                $('.toggleZoom').on('click', function () {
                    $('#stickman').removeClass('').addClass('zoomX2');
                });


                $('.toggleHeavy').on('click', function () {
                    $('#stickman').removeClass('light').addClass('heavy');
                });

                $('.toggleLight').on('click', function () {
                    $('#stickman').removeClass('heavy').addClass('light');
                });
                $('.toggleMedium').on('click', function () {
                    $('#stickman').removeClass('heavy').removeClass('light');
                });



                $('.toggleRound').on('click', function () {
                    $('#stickman').removeClass('ellipse').removeClass('square').addClass('round');
                });
                $('.toggleEllipse').on('click', function () {
                    $('#stickman').removeClass('round').removeClass('square').addClass('ellipse');
                });
                $('.toggleSquare').on('click', function () {
                    $('#stickman').removeClass('round').removeClass('ellipse').addClass('square');
                });


                $('.toggleHuman').on('click', function () {
                    $('#raceBox').removeClass('elven').removeClass('halfling').removeClass('dwarf');
                });
                $('.toggleElven').on('click', function () {
                    $('#raceBox').removeClass('halfling').removeClass('dwarf').addClass('elven');
                });
                $('.toggleHalfling').on('click', function () {
                    $('#raceBox').removeClass('elven').removeClass('dwarf').addClass('halfling');
                });
                $('.toggleDwarf').on('click', function () {
                    $('#raceBox').removeClass('elven').removeClass('halfling').addClass('dwarf');
                });


                $('.toggleLeanBack').on('click', function () {
                    $('#stickman').removeClass('leanForward').addClass('leanBack');
                });
                $('.toggleLeanForward').on('click', function () {
                    $('#stickman').removeClass('leanBack').addClass('leanForward');
                });
                $('.toggleNoLean').on('click', function () {
                    $('#stickman').removeClass('leanForward').removeClass('leanBack');
                });


                $('.toggleLeanL').on('click', function () {
                    $('#skewBox').removeClass('leanR').addClass('leanL');
                });
                $('.toggleLeanR').on('click', function () {
                    $('#skewBox').removeClass('leanL').addClass('leanR');
                });
                $('.toggleNoLean').on('click', function () {
                    $('#skewBox').removeClass('leanL').removeClass('leanR');
                });



                $('.toggleArmRaise').on('click', function () {
                    $('#equipped').removeClass().addClass('armRaise');
                });
                $('.toggleSword').on('click', function () {
                    $('#equipped').removeClass().addClass('armWeapon').addClass('armShield').addClass('armRaise');
                });
                $('.toggle2h').on('click', function () {
                    $('#equipped').removeClass().addClass('armWeapon').addClass('arm2h');
                });
                $('.toggleDagger').on('click', function () {
                    $('#equipped').removeClass().addClass('armWeapon').addClass('armShield').addClass('armDagger');
                });
                $('.toggleAltDagger').on('click', function () {
                    $('#equipped').removeClass().addClass('armWeapon').addClass('armShield').addClass('armAltDagger');
                });
                $('.toggleBo').on('click', function () {
                    $('#equipped').removeClass().addClass('armWeapon').addClass('arm2h').addClass('armBo');
                });
                $('.toggleWarhammer').on('click', function () {
                    $('#equipped').removeClass().addClass('armWeapon').addClass('arm2h').addClass('armWarhammer');
                });
                $('.toggleBattleAxe').on('click', function () {
                    $('#equipped').removeClass().addClass('armWeapon').addClass('arm2h').addClass('armBattleAxe');
                });
                $('.toggleReset').on('click', function () {
                    $('#equipped').removeClass();
                    $('#skewBox').removeClass();
                    $('#raceBox').removeClass();
                    $('#stickman').removeClass();
                });




            });

        </script>



    </body>
</html>