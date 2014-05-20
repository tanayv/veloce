/**
 * Javascript - Index
 * Authors - Andrew Mass, Nick Kortendick
 */

function Veloce() {}

Veloce.track = function(args) {
  _gaq.push(args);
};

Veloce.hasClicked = false;

Veloce.applyActive = function() {
  $('.nav li').removeClass('active');
  var filename = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
  filename = filename.substring(0, filename.length - 4);
  $('#' + filename).addClass('active');
  if(filename == '') {
    $('#home').addClass('active');
  }
};

$(function() {
  Veloce.applyActive();
});
