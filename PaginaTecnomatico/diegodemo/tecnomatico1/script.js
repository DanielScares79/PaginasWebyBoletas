var isSending = false;
function sendContact() {
    if(isSending == true) {
        return false;
    } else {
        var continueF = true;
        $('#contactForm').find("textarea, input").each(function() {
           if($.trim($(this).val()).length == 0) {
               continueF = false;
               $(this).focus();
               return false;
           }
        });
    
        if(continueF != false) {
            var datax = $('#contactForm').find("select, textarea, input").serialize();
        $('#contactForm').find("textarea, input").attr('disabled', 'disabled');
        isSending = true;
        $('#sendMessageButton').addClass('disabled').html('Enviando...');
        NProgress.start();
        $.ajax({
           method: "POST",
           url: "https://tecnomatico.cl/diegodemo/contacto.php",
           data: "sendForm=true&" + datax,
           success: function(h) {
               $('#contactForm #ajaxResponseContact').html(h);
           }, 
           error: function() {
               alert('Ha ocurrido un error al enviar su mensaje');
           },
           complete: function() {
               NProgress.done();
               isSending = false;
               $('#contactForm').find("textarea, input").removeAttr('disabled').val('');
               $('#sendMessageButton').removeClass('disabled').html('Enviar otro mensaje');
           }
        });
        }
    }
}
window.onload = function() {
  $('body').fadeIn(1000);
};
$(function() {
  $('#sendMessageButton').click(function(){
      sendContact();
      return false;
  });
  $('a.portfolio-link').click(function() {
      var elemPar = $(this).parent();
      $('#portfolioModal h2[data-modal="title"]').html(elemPar.find('.portfolio-caption h4').html());
      $('#portfolioModal p[data-modal="intro"]').html(elemPar.find('.portafolio-modal-contents').find('li:nth-child(1)').html());
      $('#portfolioModal img[data-modal="img"]').attr('src', $(this).find('img').attr('src').replace('-small', '-big'));
      $('#portfolioModal p[data-modal="desc"]').html(elemPar.find('.portafolio-modal-contents').find('li:nth-child(2)').html());
      $('#portfolioModal').modal(); //cargamos
  });
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 54)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });
  $('body').scrollspy({
    target: '#mainNav',
    offset: 56
  });
  var navbarCollapse = function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-shrink");
    } else {
      $("#mainNav").removeClass("navbar-shrink");
    }
  };
  navbarCollapse();
  $(window).scroll(navbarCollapse);

}); // End of use strict
