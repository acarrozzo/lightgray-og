
/*
 * Author: Matthew Cassella
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
