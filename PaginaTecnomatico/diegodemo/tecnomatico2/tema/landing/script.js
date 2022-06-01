function checkIfScrolling() {
	return false;
}
var sr = ScrollReveal();
sr.reveal('.sreveal', {
    distance: "20px",
    duration: 1000,
    interval: 150,
    scale: 0.8,
	afterReveal: checkIfScrolling,
});
sr.reveal('.sreveal-right', {
    distance: "20px",
    duration: 1000,
    interval: 150,
    origin: 'right',
    scale: 0.8,
	afterReveal: checkIfScrolling
});
sr.reveal('.sreveal-left', {
    distance: "20px",
    duration: 1000,
    interval: 150,
    origin: 'left',
    scale: 0.8,
	afterReveal: checkIfScrolling
});

window.onload = function () {
    particlesJS.load('page-top', $('#page-top').attr('data-src-particles'), function () {
        $('body').removeClass('isLoad');
        $('.loadSplash').fadeOut(1000);
    });
};
$(function () {
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: (target.offset().top - 54)
                }, 1000, "easeInOutExpo", function() {
					sr.sync();
				});
                return false;
            }
        }
    });
    $('.js-scroll-trigger').click(function () {
        $('.navbar-collapse').collapse('hide');
    });
    $('body').scrollspy({
        target: '.landingSelector',
        offset: 350
    });
	$(window).on('activate.bs.scrollspy', function () {
		 if($('.landingSelector ul li a.active').parent().hasClass('is-dark')) {
			 $('.landingSelector ul').addClass('is-dark');
		 } else {
			 $('.landingSelector ul').removeClass('is-dark');
		 }
    });
});