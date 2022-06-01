var contactIsSending = false;

function sendContact() {
    if (contactIsSending == true) {
        return false;
    } else {
        var continueF = true;
        $('#contactForm').find("textarea, input").each(function () {
            if ($.trim($(this).val()).length == 0 && typeof $(this).attr('required') !== "undefined") {
                continueF = false;
                $(this).focus();
                return false;
            }
        });

        if (continueF != false) {
            var datax = $('#contactForm').find("select, textarea, input").serialize();
            $('#contactForm').find("textarea, input").attr('disabled', 'disabled');
            contactIsSending = true;
            $('#contactForm #sendMessageButton').addClass('disabled').html('Enviando...');
            NProgress.start();
            $.ajax({
                method: "POST",
                url: "https://tecnomatico.cl/diegodemo/contacto.php",
                data: "sendForm=true&" + datax,
                success: function (h) {
                    $('#contactForm #ajaxResponseContact').html(h);
                },
                error: function () {
                    alert('Ha ocurrido un error al enviar su mensaje.');
                },
                complete: function () {
                    NProgress.done();
                    contactIsSending = false;
                    $('#contactForm').find("textarea, input").removeAttr('disabled').val('');
                    $('#contactForm #sendMessageButton').removeClass('disabled').html('Enviar otro mensaje');
                }
            });
        }
    }
}

function navbarCollapse() {
    if (!$(".cont-menu").hasClass('fixed-top')) return;
    if ($(".cont-menu").offset().top > 50) {
        $(".cont-menu").addClass("activated");
    } else {
        $(".cont-menu").removeClass("activated");
    }
}

$(function () {
    if ($('#sendMessageButton').length) {
        $('#sendMessageButton').click(function () {
            sendContact();
            return false;
        });
    }
	if($('.landingSelector').length) {
       $('.landingSelector ul li a[title]').tooltip({placement: 'left', trigger : 'hover'});
    }
    if ($('.comments-box').length) {
        $('.comments-box .comment-form-comment textarea, .comments-box input[type="text"]').addClass('form-control');
        $('.comments-box .form-submit input.submit').addClass('btn btn-primary');
    }
    if ($('.searchform').length) {
        $('.searchform input[type="text"]').addClass('form-control');
        $('.searchform input[type="submit"]').addClass('btn btn-primary');
    }
    navbarCollapse();
    $(window).scroll(navbarCollapse);
});