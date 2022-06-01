var isSending = false; //Formulario contacto

//Efectitos al ir haciendo scroll
var galleryCount = 0;
var navbarEl = document.querySelector(".navbar");
var contactBtnEl = document.querySelector('#contactForm #sendMessageButton');

var isWspToggle = false; //Ver si el popover o tooltip se desaparecio

//var wspPopver = new bootstrap.Popover(document.querySelector('.whatsappFloat'), { content: "Si tiene alguna duda o desea adquirir uno de los servicios mostrados puede contactarnos por WhatsApp.", title: '&iexcl;Estimado(a) visitante&excl;', html: true, offset: "-30", placement: 'left', trigger: 'manual' });

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
});

var scrollSpy = new bootstrap.ScrollSpy(document.body, {
    target: '.navbar',
    offset: 10
});

var modalLightbox = new bootstrap.Modal(document.getElementById('modalLightbox'), {});

var lazyLoadInstance = new LazyLoad({}); //Carga solo cuando se hace scroll hacia la imagen en cuestion

ScrollReveal().reveal('.sreveal', {
    duration: 1000,
    interval: 150,
    scale: 0.8,
    delay: 100
});
document.querySelectorAll('#ornamentales img').forEach(function(el) {
    el.addEventListener('click', showModalOrnamentales);
});
document.querySelectorAll('#navbarPrincipal .nav-link').forEach(function(el) {
    el.addEventListener('click', closeMenu);
});
document.querySelector('#navbarSideCollapse').addEventListener('click', toggleMenu);
document.querySelector('.loadMoreGallery a').addEventListener('click', showNextGallery);
contactBtnEl.addEventListener('click', sendContact);
showVisitorWsp();

window.onload = function() {
    document.querySelector('body').classList.remove('isLoad');
    document.querySelector('#cargando').style.display = 'none';

    checkScroll();
    //$('#cargando').fadeOut("slow");
};

window.onscroll = function() {
    checkScroll();
};