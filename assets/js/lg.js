
/*
 * Author: AC
 * Date Created: Sept 2013
 * Really cool dropdown script. Enjoy
 */





$(function() {
// Global navigation flyout script
  $(".flyout").click(
          function() {
            var target = $(this).attr("data-target");
            if ($(target).is(":hidden")) {
                $(target).fadeIn();
            } else {
    $(target).fadeOut();
            }
          }
  );
});





// --------- simple toggle from http://stackoverflow.com/questions/2586913/toggling-an-active-class-between-cousins
var allAnchors = $('#mapXXX').click(function(){
    allAnchors.removeClass('active');
    $(this).removeClass('active').addClass('active');
});


// --------- ac - simple toggle class
 $(document).ready(function() {
    $(".toggle").click(function () {
      $(this).toggleClass("active");
    });
   });






// ------ FULL SCREEN MAP
   $(document).ready(function() {
  // Get the original element
  var original = document.getElementById('map');
  // Add a click event listener to the original element
  original.addEventListener('click', function() {
    // Create a new element that is a duplicate of the original
    var duplicate = original.cloneNode(true);
    // Add the "active" class to the duplicate element
    duplicate.classList.add('active');
    // Add a click event listener to the duplicate
    duplicate.addEventListener('click', function() {
      // Remove the duplicate when it is clicked
      duplicate.parentNode.removeChild(duplicate);
    });
    // Get the body element
    var body = document.getElementsByTagName('body')[0];
    // Add the duplicate as the first child of the body element
    body.insertBefore(duplicate, body.firstChild);
  });
});

//write a cookie that checks if any data-link attributes have a class of .active. If they do save a cookie that will put the active class back on that data-link tag on browser page refresh. dont use the cookies library

// ---COOKIE TO SAVE ACTIVE TAB
// ---COOKIE TO SAVE ACTIVE TAB
// ---COOKIE TO SAVE ACTIVE TAB






  
  

  
  
  
  
  

  

  

  



// --------- ac - simple toggle parent
 $(document).ready(function() {
    $(".toggleParent").click(function () {
      $(this).parent().toggleClass("active");
    });
   });


	  $(this).parent().toggleClass("collapsed");


// --------- ac - simple change class main body
// --------- ac - simple font swap
$(".ralewayBtn").click(function(){
    $("body").addClass("ralewayFnt").removeClass('titilliumFnt');
});
$(".titilliumBtn").click(function(){
    $("body").addClass("titilliumFnt").removeClass('ralewayFnt');
});
// --------- ac - simple rounded corners swap
$(".roundedBtn").click(function(){
    $("body").addClass("rounded").removeClass('squared');
});
$(".squaredBtn").click(function(){
    $("body").addClass("squared").removeClass('rounded');
});
// --------- ac - simple body toggle
$(".boldBtn").click(function(){
    $("body").toggleClass("bold")
});
$(".bigTextBtn").click(function(){
    $("body").toggleClass("bigText")
});

/*
<!----------------------------------------- super simple Tab JS ---->
/*$(function(){
	var panels = $("article"),
      tabs = $(".tabbb");
  panels.hide();
  tabs.click(function(e){
	 e.preventDefault();
	 var url = window.location.href;
	 url = url.substring(0, url.lastIndexOf("#"));
   		url += $(this).attr("href");

		window.location.href = url;



     panels.hide();
     panelheight = $(this.hash).outerHeight();
     //$(this.hash).show().parent().animate({"height":  panelheight});
     $(this.hash).show().parent().animate({"height":"100%"});

	 tabs.removeClass("selected");
     $(this).addClass("selected");

	 $('html, body').animate({scrollTop: '0px'}, 1); // scroll page to top!

  });
  if (window.location.href.indexOf("#") === -1) {
	tabs.first().trigger("click");
  } else {
	  var tabIndex = window.location.href.substring(window.location.href.lastIndexOf("#"), window.location.href.length);
  	tabs.each(function() {
		if ($(this).attr("href") === tabIndex) {
			$(this).trigger("click");
		}
	});

  }
});

*/

$(".toggleAction").click(function(e){
	e.preventDefault();
	$('#action-module').toggleClass('active');
	$('#hud').toggleClass('active');
});


// --------- ac - menuIcon toggle
$("XXX.menuIcon").click(function(e){
 e.preventDefault();
   // $(".menuIcon").addClass("active");
    $("#tabs").addClass("active");
	$('[data-pop="stats"]').addClass('active');
});

$("XXX.closeMenu").click(function(e){
 e.preventDefault();
   // $(".menuIcon").removeClass("active");
	$('[data-pop].active').removeClass('active');inf
    $("#tabs").removeClass("active");
});



// --------- ac - LOCAL STORAGE SET FOR POP and POP 2

var activeIndex = localStorage.getItem('mySelectedMenu');
var activeIndex2 = localStorage.getItem('mySelectedMenu2');
	if (activeIndex!="stats" && activeIndex != "inv" && activeIndex != "shop" ) { // only keep tabs for stats and inv + shop
		activeIndex = 'nope';
	}
$('[data-link="' + activeIndex + '"]').addClass('active');
$('[data-pop="' + activeIndex + '"]').addClass('active');
$('[data-link2="' + activeIndex2 + '"]').addClass('active');
$('[data-pop2="' + activeIndex2 + '"]').addClass('active');


// --------- ac - ANYTHING AC POP FUNCTION - data link - data pop - .closePop

$(document).ready(function(){
	// $("[data-link]").click(function(e){
	$(document).on('click', '[data-link]', function(e){
		e.preventDefault();
		var tab_id = $(this).attr('data-link');


		if ($('[data-pop="' + tab_id + '"]').hasClass("active")) {
			$('[data-pop].active').removeClass('active');
			$("[data-link]").removeClass("active");
			$('[data-pop2]').removeClass('active');
			$('[data-link2]').removeClass('active');
					//	$('[data-link2="stats"]').addClass('active');
					//	$('[data-link2="equipped"]').addClass('active');
					//	$('[data-link2="quests"]').addClass('active');
						//$('[data-link2="look"]').addClass('active');
						//$('[data-link="action"]').addClass('active');
						//$('[data-pop="action"]').addClass('active');
						localStorage.setItem('mySelectedMenu', 'none'); // set local storage none
						localStorage.setItem('mySelectedMenu2', 'none'); // set local storage none 2
					}
		else {
			$('[data-link]').removeClass('active');
			$('[data-pop]').removeClass('active');
			$('[data-pop2]').removeClass('active');
			$("[data-link2]").removeClass("active");

						$('[data-link2="stats"]').addClass('active');
						$('[data-link2="inv"]').addClass('active');
						$('[data-link2="quests"]').addClass('active');
						$('[data-link2="world"]').addClass('active');
						$('[data-link2="action"]').addClass('active');

			$(this).addClass('active');
			$('[data-pop="' + tab_id + '"]').addClass('active');
			$('[data-pop2="' + tab_id + '"]').addClass('active');
			localStorage.setItem('mySelectedMenu', tab_id); // set local storage to open tab
			localStorage.setItem('mySelectedMenu2', tab_id); // set local storage to open tab 2

		}
	})
	$('.closeMenu').click(function(e){
		e.preventDefault();
//		$(this).closest('[data-pop]').removeClass('active');
		$('[data-pop]').removeClass('active');
		$('[data-link]').removeClass('active');
		$('[data-pop2]').removeClass('active');
		$('[data-link2]').removeClass('active');
		localStorage.setItem('mySelectedMenu', 'none'); // set local storage none
		localStorage.setItem('mySelectedMenu2', 'none'); // set local storage none

		console.log('xxx');
	})
})


// --------- ac - ANYTHING AC POP FUNCTION 222222 - data link - data pop - .closePop

$(document).ready(function(){
	// $("[data-link2]").click(function(e){
	$(document).on('click', '[data-link2]', function(e){
		e.preventDefault();
		var tab_id = $(this).attr('data-link2');


		if ($('[data-pop2="' + tab_id + '"]').hasClass("active")) {
			$('[data-pop2].active').removeClass('active');
			$("[data-link2]").removeClass("active");
			$('[data-link2="' + tab_id + '"]').parent().parent().removeClass('active');

			localStorage.setItem('mySelectedMenu2', 'none'); // set local storage none

		}
		else {
			$('[data-link2]').removeClass('active');
			$('[data-pop2]').removeClass('active');
   			$('[data-link2="' + tab_id + '"]').parent().parent().addClass('active');
   			$(this).closest('[data-pop]').addClass('active');

			$('this').addClass('active');
			$('[data-link2="' + tab_id + '"]').addClass('active');
			$('[data-pop2="' + tab_id + '"]').addClass('active');
			localStorage.setItem('mySelectedMenu2', tab_id); // set local storage to open tab 2

		}
	})

})

// --------- ac - DATA TABS AC POP FUNCTION - data tab - data tab content - .closePop
// --------- MOVED THIS TO WORLD TOOL FOR TABS!!!!
/*
$(document).ready(function(){

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

})
*/