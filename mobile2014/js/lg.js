<!---------------------------------------------------------------------- MAIN TAB FUNCTION -->
$(document).ready(function() {
	$('.tabs a, .defaultSubTab a').click(function(e){
		e.preventDefault();
		switchTabs($(this));
	});
	
	$('.subTabs a').click(function(e){
		e.preventDefault();
		switchSubTabs($(this));
	});
	switchTabs($('.defaultTab'));
});
 
function switchTabs(obj)
{
	$('.subTabs a').removeClass("selected");
	$('.subTabs li.defaultSubTab a').addClass("selected");
	$('.sub-tab-content').hide();
	$('.tab-content').hide();
	$('.tabs a').removeClass("selected");
	var id = obj.attr("rel");
	$('#'+id).show().find(".sub-tab-content:eq(0)").show();
	obj.addClass("selected");
}

function switchSubTabs(obj) {
	if (obj.parent().hasClass("defaultSubTab")) {
		$('.subTabs a').removeClass("selected");
		$('.tabs a[rel="'+obj.parents(".tab-content").attr("id")+'"]').trigger("click");

	} else {
		$('.sub-tab-content').hide();
		$('.subTabs a').removeClass("selected");
		var id = obj.attr("rel");
		$('#'+id).show();
	}
	obj.addClass("selected");

}


// Remove mobile url bar
// When ready...
window.addEventListener("load",function() {
	// Set a timeout...
	setTimeout(function(){
		// Hide the address bar!
		window.scrollTo(0, 1);
	}, 0);
});

// Remove mobile url bar 2
var page   = document.getElementById('page'),
    ua     = navigator.userAgent,
    iphone = ~ua.indexOf('iPhone') || ~ua.indexOf('iPod');

var setupScroll = window.onload = function() {
  // Start out by adding the height of the location bar to the width, so that
  // we can scroll past it

//  if (ios) {
    // iOS reliably returns the innerWindow size for documentElement.clientHeight
    // but window.innerHeight is sometimes the wrong value after rotating
    // the orientation

//    var height = document.documentElement.clientHeight;

    // Only add extra padding to the height on iphone / ipod, since the ipad
    // browser doesn't scroll off the location bar.
//    if (iphone && !fullscreen) height += 60;
//    page.style.height = height + 'px';
//  }
  // Scroll after a timeout, since iOS will scroll to the top of the page
  // after it fires the onload event
//  setTimeout(scrollTo, 0, 0, 1);
};



/* ---------------------------------------------------------------------- POP UP  - OLDDDD--
$(document).ready(function(){
//open popup
$(".pop").click(function(){
$("#popBox").fadeIn(0);
positionPopup();

console.log($(this).data('popoption'));
$("#popContent").empty();
//append();

// 001 - Read Sign
if ($(this).data("popoption") === '001-readsign') { 
	var html = "<div class='pop1'>";
	html += "<h2>You read the sign</h2>";
	html += "<span class='bigImg icon-sign lightbrown'></span>";
	html += "<hr><span class='fa fa-arrow-down rotate-45'></span><strong>Wood Cabin - START HERE</strong><br>Old Man & Young Soldier";
	html += "<hr><strong>Pajama Shaman</strong><span class='fa fa-arrow-up rotate-45'></span><br>Shop, Skills, & Spells";
	html += "<hr><span class='fa fa-arrow-left rotate-45'></span><strong>Healing Waterfall</strong><br>Supercharge your HP & MP";
	html += "<hr><strong>Spider Cave</strong><span class='fa fa-arrow-right rotate-45'></span><br>Fight Baddies! Get XP & Loot";
	html += "<hr><strong class='lightbrown'>Visit the Old Man to the southwest when you are ready to start your first quest.</strong>";
	html += "</div>";
	$("#popContent").html(html);
}


// 001 - unlock chest Sign
if ($(this).data("popoption") === '001-unlockchest') { 
	var html = "<div class='pop1'>";
	html += "<p class='px16'>You can't open this chest yet!</p>";
	html += "<p class='px25'>You need a Gold Key!</p>";
	html += "<span class='bigImg icon-chest gold'></span>";
	html += "<hr><p class='px20'>You can get a Gold Key from the Young Soldier to the southwest.</p><hr>";
	html += "<span class='medImg icon-key gold'></span>";
	html += "<span class='okBtn greenBG'>ok</span>";
	html += "</div>";
	$("#popContent").html(html);
}

// - default search
if ($(this).data("popoption") === 'default-search') { 
	var html = "<div class='pop1'>";
	html += "<br><br><span class='px80 fa fa-search blue'></span><br><br><br>";
	html += "<p class='px40'>You search and find nothing</p>";
	html += "</div>";
	$("#popContent").html(html);
}

});
 
//close popup
$("#close").click(function(){
$("#popBox").fadeOut(0);
});
});
 
//position the popup at the center of the page
function positionPopup(){
if(!$("#popBox").is(':visible')){
return;
}
$("#popBox").css({
//left: ($(window).width() - $('#popBox').width()) / 2,
//top: ($(window).width() - $('#popBox').width()) / 7,
left:0,
top: 0,
//position:'absolute'
position:'fixed'
});
}
 
//maintain the popup at center of the page when browser resized
$(window).bind('resize',positionPopup);
 */


<!---------------------------------------------------------------------- POP UP - TOGGLE OPEN CLOSE -->
$(document).ready(function(){
//open popup
$('.pop p').click(function(){
	//$('.pop').find('.popBox').toggleClass('visible');
	$(this).parent().find('.popBox').addClass('visible');
});
});

$(document).ready(function(){
//open popup
$('.pop .close').click(function(){
	$('.pop').find('.popBox').removeClass('visible');
});
});






<!---------------------------------------------------------------------- COLLAPSE LIST FUNCTION -->
$(document).ready(function() {
	$('.collapseBtn').click(function(e){
	//var elem = $(this).closest('.list').hasClass('collapse');
	$(this).closest('.list').toggleClass('collapse');
	$(this).toggleClass('rotate180');

//	if ($(this).closest('.list').parents('.collapse').length)
//{

	//$(this).closest('.list').removeClass('collapse');
	
	//}
	//else {	
	//$(this).closest('.list').addClass('collapse');
//	}
	
});

});





// ------ SWAP ORIENTATION - CHANGE CLASS ON 
$(document).ready(function() {
  $(window).resize( function(){
    var height = $(window).height();
    var width = $(window).width();

    if(width>height) {
      // Landscape
      $("#wrapper").removeClass("vert");
	  $('#wrapper').addClass("hoz");
	  
    } else {
      // Portrait
      $("#wrapper").removeClass("hoz");
      $("#wrapper").addClass("vert");
	  
    }

   });
   });



// ------ Mobile detection
$(document).ready(function() {

if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
 
      $("#wrapper").addClass("mobileCheck");
 }
 else{
      $("#wrapper").addClass("noMobile");
	 
 }
   });
   
   
   // ------ BTN GROUP TOGGLER

   $('.btnToggler').click(function() {
	   if ($("#roomActions").is(".expanded")) {
	$("#roomActions").removeClass('expanded').addClass('collapsed');
		$(".fa-angle-up").removeClass('fa-angle-up').addClass('fa-angle-down');

	
	   }
	   else{
    $("#roomActions").removeClass('collapsed').addClass('expanded');
	$(".fa-angle-down").removeClass('fa-angle-down').addClass('fa-angle-up');
	   }

});


// ------ MAKE SQR
$(document).ready(function() {

// adjustHeight is the function that makes the objects squares
// (by setting each one's height equal to its width)
function adjustHeight() {
	var myWidth = jQuery('.sqr').width();
	var myString = myWidth + 'px';
	jQuery('.sqr').css('height', myString);
	//return myHeight;
}

// calls adjustHeight on window load
jQuery(window).load(function() {
	adjustHeight();
});

// calls adjustHeight anytime the browser window is resized
jQuery(window).resize(function() {
	adjustHeight();
});
});


/* ------ ROOM BOX ADJUST WIDTH

function roomBoxWidth() {
	
	var myWidth = ($(window).width())-340;
	var myString = myWidth + 'px';
	jQuery('#roomBox').css('width', myString);
	return myWidth;
}



jQuery(window).resize(function() {
	  	roomBoxWidth();
   });
jQuery(window).load(function() {
	  	roomBoxWidth();
	});
   
   */
   
   
// ------ TOGGLE FEED
$(document).ready(function(){
$('.toggleFeed').click(function(){
	$('#feed').toggleClass('visible');
	$('.feedFrame').toggleClass('expanded');
	
	if ($(".toggleFeed").hasClass("fa-angle-up")) {
		$(".toggleFeed").removeClass('fa-angle-up').addClass('fa-angle-down');
	   }
	else {
		$(".toggleFeed").removeClass('fa-angle-down').addClass('fa-angle-up');
	   }
	
});
});


// ------ TOGGLE GFRAME
$(document).ready(function(){
$('.toggler').click(function(){
	$(this).closest('.gFrame').toggleClass('min');
	
	if ($(this).find('i').hasClass("fa-minus")) {
		$(this).find('i').removeClass('fa-minus').addClass('fa-plus').toggleClass('blue');
	   	}
	else {
		$(this).find('i').removeClass('fa-plus').addClass('fa-minus').toggleClass('blue');
	   }
	
	

	
	
});
});


// ------ HEIGHT READ
//var heightread = $('.heightRead').height();
//$('.heightRead').height(heightread);



// ------ TOGGLE FULLSCREEN MAP
$(document).ready(function(){
$('.mapToggler,#mapFrame').click(function() {
	//$('#dPad').toggleClass('full');
	$('#mapFrame').toggleClass('full');
});
});



<!---------------------------------------------------------------------- POP UP - TOGGLE OPEN CLOSE -->
$(document).ready(function(){
//open popup
$('.toggleRounded').click(function(){
	//$('.pop').find('.popBox').toggleClass('visible');
	$('#wrapper').toggleClass('rounded');
});
});





 

   








