/**
 * Javascript - Index
 * Authors - Andrew Mass, Nick Kortendick
 */

function Veloce() {}

Veloce.applyActive = function() {
  $('.navbar li.active').removeClass('active');
  $('a[href$="' + '.' + window.location.pathname + '"]').parent().addClass('active');
};

Veloce.scrollNavbar = function() {
  if(document.body.clientWidth > 768){
    var adjust = 15 - (document.body.scrollTop / 10);
    adjust = (adjust <= 0) ? 0 : adjust;
    $('.navbar').css('margin-top', adjust);
  }
}

//Veloce.stickFooter = function() {
//  if($('html').outerHeight() <= window.innerHeight) {
//    $('html').css('height', window.innerHeight);
//  }
//  else {
//    $('html').css('height','');
// }
//}

$(function() {
  Veloce.applyActive();

  $(window).scroll(function() {
    Veloce.scrollNavbar();
  });

  $(window).resize(function() {
    Veloce.stickFooter();
  });
});
