/**
 * Javascript - Index
 * Author - Andrew Mass, Nick Kortendick
 */

function Veloce() {}

Veloce.applyActive = function() {
  $('.navbar li.active').removeClass('active');
  $('a[href$="' + '.' + window.location.pathname + '"]').parent().addClass('active');
};

$(function() {
  Veloce.applyActive();
});
