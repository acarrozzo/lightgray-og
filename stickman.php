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

        <div class="buttons">
            <div>
                <span class="btn toggleSword">Sword</span>
                <span class="btn toggle2h">2h Sword</span>
                <span class="btn toggleDagger">Dagger</span>
                <span class="btn toggleWarhammer">Warhammer</span>
                <span class="btn toggleAltDagger">Dual Dagger</span>
                <span class="btn toggleBo">Bo Staff</span>
                <span class="btn toggleBattleAxe">Battle Axe</span>
                <span class="btn toggleReset">reset</span>
            </div>

        </div>



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
