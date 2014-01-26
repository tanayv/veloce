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

Veloce.affixNavbar = function() {
  // Only affix the navbar if on the home page and not on small screens.
  if($('body').hasClass('home') && $('#desktop').css('display') === 'block') {
    $('#header').affix({
      offset: {
        top: $('#splash-container').outerHeight()
      }
    });
  }
};

Veloce.applyReplacementMargin = function() {
  if($('#header').hasClass('affix')) {
    $('#content-wrapper').css('margin-top', 115);
  }
  else {
    $('#content-wrapper').css('margin-top', 0);
  }
};

$(function() {
  Veloce.applyActive();
  Veloce.affixNavbar();
  Veloce.applyReplacementMargin();

  $(window).scroll(function() {
    Veloce.applyReplacementMargin();
  });

  $(window).resize(function() {
    Veloce.affixNavbar();
    Veloce.applyReplacementMargin();
  });
});
