/*
var pjax = new Pjax({
    selectors: [
        "title",
        "meta",
        "#navbarDropdown",
        "#sidenavAccordion",
        "main",
    ],
    cacheBust: false,
    elements: "a[href]"
});

document.addEventListener('pjax:send', function () {
    clearTimeout(timeoutPage);
    NProgress.start();
});
document.addEventListener('pjax:complete', function () {
    NProgress.done();
    checkPageItems();
    reflushEverything();
});
document.addEventListener('pjax:error', function () {
    location.reload();
});
*/

window.addEventListener('DOMContentLoaded', event => {
    document.querySelector('body').classList.add('tmp-nav-fixed');
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('tmp-sidenav-toggled');
        });
    }
});

checkPageItems = function() {
    var datosItems = document.querySelectorAll('.datitm');
    if (datosItems) {
        datosItems.forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                if (sendingAjax) return false;
                sendingAjax = true;

                Toastify({
                    text: repTilde("Guardando..."),
                    duration: 5000,
                    gravity: "bottom",
                    position: "left",
                    backgroundColor: "linear-gradient(to right, #FFE000, #799F0C)",
                    stopOnFocus: true
                }).showToast();

                var params = new URLSearchParams(new FormData(form)).toString();
                form.querySelectorAll('input, button').forEach(function(el) {
                    el.setAttribute('disabled', 'disabled');
                });
                var request = new XMLHttpRequest();
                request.onreadystatechange = function() {
                    if (this.readyState == 4) {
                        form.querySelectorAll('input, button').forEach(function(el) {
                            el.removeAttribute('disabled');
                        });
                        sendingAjax = false;
                        if (this.status == 200) {
                            if (this.getResponseHeader("Content-Type").toLowerCase() == 'application/json') {
                                var decodedResponse = JSON.parse(this.responseText);
                                Toastify({
                                    text: repTilde(decodedResponse.msg),
                                    duration: 5000,
                                    gravity: "bottom",
                                    position: "left",
                                    backgroundColor: (decodedResponse.error == true ? "linear-gradient(to right, #ed213a, #93291e)" : "linear-gradient(to right, #11998e, #38ef7d)"),
                                    stopOnFocus: true
                                }).showToast();
                                form.innerHTML = '<div class="spinner-border" role="status"> <span class="visually-hidden">Cargando...</span> </div>';
                                reflushEverything();
                            } else {
                                toastDetErr();
                                location.reload();
                            }
                        } else {
                            toastDetErr();
                            form.innerHTML = this.responseText;
                        }
                    }
                };
                request.open('POST', global_vars.web_url + '/ajax/panel/savesyncdata/', true);
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.send(params);
                return false;
            });
        });
    }
};