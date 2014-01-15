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

Veloce.affixNavbar = function() {
  $('#header').affix({
    offset: {
      top: $('#splash-container').outerHeight()
    }
  });
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
