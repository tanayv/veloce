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

$(document).ready(function() {


var topHeight = $('#header').offset().top;     

$(window).scroll(function() {                  
    var currentScroll = $(window).scrollTop(); 
    if (currentScroll >= topHeight) {  

        $('#header').css({                     
            position: 'fixed',
            top: '0',
            left: '0'
        });
    } else {                                  
        $('#header').css({                    
            position: 'static'
        });
     
    }

});

});