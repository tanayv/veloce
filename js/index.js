/**
 * Javascript - Index
 * Authors - Andrew Mass, Nick Kortendick
 */

function Veloce() {}

Veloce.applyActive = function() {
  //$('.navbar li.active').removeClass('active');
  //$('a[href$="' + '.' + window.location.pathname + '"]').parent().addClass('active');
  $(".nav li").removeClass("active");
  var filename = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
  filename=filename.substring(0, filename.length-4);
  $("#" + filename).addClass("active");
  if(filename == "")
  $("#home").addClass("active");
};

//Veloce.scrollNavbar = function() {
//  if(document.body.clientWidth > 992){
//    var adjust = 15 - ($(window).scrollTop() / 10);
//    adjust = (adjust <= 0) ? 0 : adjust;
//    $('.navbar').css('margin-top', adjust);
//  }
//}

$(function() {
  Veloce.applyActive();

  //$(window).scroll(function() {
  //  Veloce.scrollNavbar();
  //});
});
