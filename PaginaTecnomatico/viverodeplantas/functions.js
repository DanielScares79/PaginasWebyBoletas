function dismissVisitorWsp() {
    return;
    if (!isWspToggle) {
        wspPopver.hide();
        isWspToggle = true;
    }
}

function showVisitorWsp() {
    return;
    setTimeout(dismissVisitorWsp, 5000);
    wspPopver.show();
}

function showNextGallery(e) {
    e.preventDefault();
    galleryCount++;
    document.querySelector('[data-galleryno="' + galleryCount + '"]').classList.remove('d-none');
    if (galleryCount == document.querySelectorAll('[data-galleryno]').length - 1)
        document.querySelector('.loadMoreGallery').classList.add('d-none');

    return false;
}

function showModalOrnamentales() {
    //if ($('#ornamentales ul').hasClass('lsGrab')) {
    document.querySelector('#modalLightbox .modal-body').innerHTML = '<img src="' + this.getAttribute('src') +
        '" class="img-fluid w-100" />';
    modalLightbox.show();
    //}
}

function checkScroll() {
    if (document.querySelector('html').scrollTop > 150) {
        navbarEl.classList.add("inscroll");
        dismissVisitorWsp();
    } else {
        navbarEl.classList.remove("inscroll");
    }
}

function sendContact(e) {

    e.preventDefault();

    if (isSending == true)
        return false;

    var continueF = true;
    document.querySelector('#contactForm').querySelectorAll("input, textarea").forEach(function(el) {
        if (el.value.trim().length == 0 && el.hasAttribute('required')) {
            continueF = false;
            el.focus();
            return false;
        }
    });

    if (continueF != false) {
        var http = new XMLHttpRequest();
        var datax = Array.from(new FormData(document.querySelector('#contactForm')), e => e.map(encodeURIComponent).join('=')).join('&');

        document.querySelector('#contactForm').querySelectorAll("input, textarea").forEach(function(el) {
            el.setAttribute('disabled', 'disabled');
        });

        isSending = true;
        contactBtnEl.classList.add('disabled');
        contactBtnEl.innerHTML = '<div class="d-flex align-items-center"><div class="spinner-border spinner-border-sm me-1" role="status"> <span class="visually-hidden">Loading...</span> </div> <span>Enviando...</span></div>';
        document.querySelector('#contactForm #ajaxResponseContact').innerHTML = '';


        http.open('POST', 'https://tecnomatico.cl/ajaxContacto.php', true);

        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        http.onreadystatechange = function() {
            if (http.readyState == 4) {

                var h = http.responseText;
var code = h.substring(0, 4); //incluye los :
                    var text = h.substring(4); //despues de los :
                    

                                        
                    
                if (http.status == 200 && code == '001:') {
                  document.querySelector('#contactForm').querySelectorAll("input, textarea").forEach(function(el) {
                        el.value = '';
                    });
                    
                    document.querySelector('#contactForm #ajaxResponseContact').innerHTML = text;
                    contactBtnEl.innerHTML = 'Enviar otro mensaje';
                } else {
                    document.querySelector('#contactForm #ajaxResponseContact').innerHTML = (code == '000:' ? text : '<div class="alert alert-danger"><b>Oh, no!</b> Al parecer ha ocurrido un error al enviar su mensaje. Por favor, intente nuevamente. Verifique su conexi&oacute;n a internet y si el problema persiste contacte al administrador.</div>');

                    contactBtnEl.innerHTML = 'Intentar nuevamente';

                    document.querySelector('#contactForm').querySelectorAll("input, textarea").forEach(function(el) {
                        el.addEventListener('keypress', function() {
                            contactBtnEl.innerHTML = 'Enviar otro mensaje';

                            //Esto hubiese sido mas simple con Jquery pero bueno
                            document.querySelector('#contactForm').querySelectorAll("input, textarea").forEach(function(el) {
                                var old_element = el;
                                var new_element = old_element.cloneNode(true);
                                old_element.parentNode.replaceChild(new_element, old_element);
                            });

                        });
                    });

                }
                isSending = false;
                contactBtnEl.classList.remove('disabled');
                document.querySelector('#contactForm').querySelectorAll("input, textarea").forEach(function(el) {
                    el.removeAttribute('disabled');
                });
                grecaptcha.reset();
            }
        }
        http.send("sendForm=true&webName=jds&" + datax);
    }
}

function toggleMenu() {
    document.querySelector('.offcanvas-collapse').classList.toggle('open');
}

function closeMenu() {
    document.querySelector('.offcanvas-collapse').classList.remove('open');
}