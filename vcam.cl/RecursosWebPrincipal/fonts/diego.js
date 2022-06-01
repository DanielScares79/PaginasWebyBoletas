document.querySelector('#formContacto').addEventListener('submit', function(e) {
    e.preventDefault();

    var noContinuar = false;
    document.querySelector('#formContacto').querySelectorAll("input, textarea").forEach(el => {
                            if(el.value.trim().length == 0 && el.hasAttribute('required')) {
                                el.focus();
                                noContinuar = true;
                            }
                        });
    
    if(noContinuar) return false;

            var http = new XMLHttpRequest();
        var datax = Array.from(new FormData(document.querySelector('#formContacto')), e => e.map(encodeURIComponent).join('=')).join('&');
        document.querySelector('#formContacto #ajaxResponseContact').innerHTML = '';
        http.open('POST', 'https://tecnomatico.cl/ajaxContacto.php', true);
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        http.onreadystatechange = function() {
            if (http.readyState == 4) {
                var h = http.responseText;
                if (http.status == 200) {
                    var code = h.substring(0, 4); //incluye los :
                    var text = h.substring(4); //despues de los :
                    
                    if(code == '001:') {
                        document.querySelectorAll('#formContacto .form-control').forEach(el => {
                            el.value = '';
                        });
                    }
                    
                    document.querySelector('#formContacto #ajaxResponseContact').innerHTML = text;
                } else {
                    document.querySelector('#formContacto #ajaxResponseContact').innerHTML = '<div class="alert alert-danger"><b>Oh, no!</b> Al parecer ha ocurrido un error al enviar su mensaje. Por favor, intente nuevamente. Verifique su conexi&oacute;n a internet y si el problema persiste contacte al administrador.</div>';
                }
                grecaptcha.reset();
            }
        }
        http.send("sendForm=true&webName=tm&" + datax);
    return false;
});