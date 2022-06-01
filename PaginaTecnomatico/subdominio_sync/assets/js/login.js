var form = document.querySelector('form');
var originalBtnText = form.querySelector('button').innerHTML;
var backgrounds = ["colorful-2174045.png", "world.jpg", "newpolygon.jpg"];

function showBG() {
    var item = backgrounds[Math.floor(Math.random() * backgrounds.length)];
    document.querySelector('html').style.backgroundImage = "url('" + global_vars.web_url + '/assets/img/' + item + "')";
}
showBG();

function onValidateCaptcha(token) {
    if (sendingAjax) return false;
    sendingAjax = true;
    var params = "g-recaptcha-response=" + encodeURIComponent(token) + "&" + new URLSearchParams(new FormData(document.querySelector('form'))).toString();
    form.querySelector('button').innerHTML = '<div class="spinner-border" role="status"> <span class="visually-hidden">Cargando...</span> </div>';
    form.querySelectorAll('input, button').forEach(function(el) {
        el.setAttribute('disabled', 'disabled');
    });
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4) {
            form.querySelectorAll('input, button').forEach(function(el) {
                el.removeAttribute('disabled');
            });
            form.querySelector('button').innerHTML = originalBtnText;
            sendingAjax = false;
            if (this.status == 200) {
                if (this.getResponseHeader("Content-Type").toLowerCase() == 'application/json') {
                    var decodedResponse = JSON.parse(this.responseText);
                    if (decodedResponse.error == true) {
                        grecaptcha.reset();
                        Toastify({
                            text: repTilde(decodedResponse.msg),
                            duration: 5000,
                            gravity: "bottom",
                            position: "left",
                            backgroundColor: "linear-gradient(to right, #ed213a, #93291e)",
                            stopOnFocus: true
                        }).showToast();
                    } else {
                        if (typeof decodedResponse.logsuctxt !== "undefined") {
                            form.innerHTML = decodedResponse.logsuctxt;
                            setTimeout(function() {
                                location.reload();
                            }, 1500);
                        } else location.reload();
                    }
                } else {
                    toastDetErr();
                    location.reload();
                }
            } else {
                toastDetErr();
                grecaptcha.reset();
                form.innerHTML = this.responseText;
            }
        }
    };
    request.open('POST', global_vars.web_url + '/ajax/user/login/', true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(params);
}

form.addEventListener('submit', function(e) {
    e.preventDefault(); //Prevenimos comportamiento por defecto del elemento

    var continuex = true;
    form.querySelectorAll('input[type="email"], input[type="password"]').forEach(function(el) {
        if (continuex == true) {
            if (el.value.length == 0) {
                el.focus();
                continuex = false;
            }
        }
    });

    if (continuex == true)
        grecaptcha.execute(); //Ejecutamos el captcha
    return false; //evitamos que se envie
});