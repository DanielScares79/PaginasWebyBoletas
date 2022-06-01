function repTilde(str) {
    return String(str).replace('&ntilde;', 'ñ')
        .replace('&Ntilde;', 'Ñ')
        .replace('&amp;', '&')
        .replace('&Ntilde;', 'Ñ')
        .replace('&ntilde;', 'ñ')
        .replace('&Ntilde;', 'Ñ')
        .replace('&Agrave;', 'À')
        .replace('&Aacute;', 'Á')
        .replace('&Acirc;', 'Â')
        .replace('&Atilde;', 'Ã')
        .replace('&Auml;', 'Ä')
        .replace('&Aring;', 'Å')
        .replace('&AElig;', 'Æ')
        .replace('&Ccedil;', 'Ç')
        .replace('&Egrave;', 'È')
        .replace('&Eacute;', 'É')
        .replace('&Ecirc;', 'Ê')
        .replace('&Euml;', 'Ë')
        .replace('&Igrave;', 'Ì')
        .replace('&Iacute;', 'Í')
        .replace('&Icirc;', 'Î')
        .replace('&Iuml;', 'Ï')
        .replace('&ETH;', 'Ð')
        .replace('&Ntilde;', 'Ñ')
        .replace('&Ograve;', 'Ò')
        .replace('&Oacute;', 'Ó')
        .replace('&Ocirc;', 'Ô')
        .replace('&Otilde;', 'Õ')
        .replace('&Ouml;', 'Ö')
        .replace('&Oslash;', 'Ø')
        .replace('&Ugrave;', 'Ù')
        .replace('&Uacute;', 'Ú')
        .replace('&Ucirc;', 'Û')
        .replace('&Uuml;', 'Ü')
        .replace('&Yacute;', 'Ý')
        .replace('&THORN;', 'Þ')
        .replace('&szlig;', 'ß')
        .replace('&agrave;', 'à')
        .replace('&aacute;', 'á')
        .replace('&acirc;', 'â')
        .replace('&atilde;', 'ã')
        .replace('&auml;', 'ä')
        .replace('&aring;', 'å')
        .replace('&aelig;', 'æ')
        .replace('&ccedil;', 'ç')
        .replace('&egrave;', 'è')
        .replace('&eacute;', 'é')
        .replace('&ecirc;', 'ê')
        .replace('&euml;', 'ë')
        .replace('&igrave;', 'ì')
        .replace('&iacute;', 'í')
        .replace('&icirc;', 'î')
        .replace('&iuml;', 'ï')
        .replace('&eth;', 'ð')
        .replace('&ntilde;', 'ñ')
        .replace('&ograve;', 'ò')
        .replace('&oacute;', 'ó')
        .replace('&ocirc;', 'ô')
        .replace('&otilde;', 'õ')
        .replace('&ouml;', 'ö')
        .replace('&oslash;', 'ø')
        .replace('&ugrave;', 'ù')
        .replace('&uacute;', 'ú')
        .replace('&ucirc;', 'û')
        .replace('&uuml;', 'ü')
        .replace('&yacute;', 'ý')
        .replace('&thorn;', 'þ')
        .replace('&yuml;', 'ÿ');
}

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
});

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
});
var checkPageItems = function() {};
var sendingAjax = false;
var timeoutPage;
var PageCache = {};
var toastErr = Toastify({
    text: repTilde("Al parecer ha ocurrido un problema al actualizar el sitio. Es posible que su conexi&oacute;n a internet se haya perdido o nuestros servidores tengan un problema."),
    duration: 0,
    gravity: "bottom",
    position: "center",
    backgroundColor: "linear-gradient(to right, #ed213a, #93291e)",
    stopOnFocus: true
});
var toastErrShown = false;

function reflushEverything() {
    cleanCache();
    createCache();
    updatePage();
}

function cleanCache() {
    PageCache = {};
}

function createCache() {
    document.querySelectorAll('[data-ajax]').forEach(function(e) {
        var name = e.getAttribute('data-ajax');
        PageCache[name] = e.innerHTML;
    });
}

function updateToastErr(success) {
    if (success && toastErrShown) {
        toastErrShown = false;
        toastErr.hideToast();
        Toastify({
            text: repTilde("La conexi&oacute;n ha sido re-establecida."),
            duration: 5000,
            gravity: "bottom",
            position: "left",
            backgroundColor: "linear-gradient(to right, #11998e, #38ef7d)",
            stopOnFocus: false
        }).showToast();
    } else if (!toastErrShown && !success) {
        toastErrShown = true;
        toastErr.showToast();
    }
}

function updatePage() {

    if (!document.querySelector('[data-ajax]')) return;

    if (sendingAjax) {
        clearTimeout(timeoutPage);
        timeoutPage = setTimeout(updatePage, 2000);
        return;
    }

    sendingAjax = true;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            clearTimeout(timeoutPage);
            if (xhr.status == 200) {

                if (xhr.getResponseHeader("Content-Type") == 'application/json') {
                    var decoded = JSON.parse(xhr.responseText);
                    if (decoded.ru) {
                        location.href = decoded.ru;
                        setInterval(function() {
                            location.href = decoded.ru;
                        }, 10000);
                    } else {
                        location.reload();
                        setInterval(function() {
                            location.reload();
                        }, 10000);
                    }
                    return;
                }

                if (xhr.responseText == 'RST') {
                    location.reload();
                    setInterval(function() {
                        location.reload();
                    }, 10000);
                    return;
                }

                var container = document.implementation.createHTMLDocument().documentElement;
                container.innerHTML = xhr.responseText;
                var nodeList = container.querySelectorAll('[data-ajax]');
                nodeList.forEach(function(e) {
                    var name = e.getAttribute('data-ajax');
                    if (PageCache[name] != e.innerHTML) {
                        document.querySelector('[data-ajax="' + name + '"]').innerHTML = e.innerHTML;
                        PageCache[name] = e.innerHTML;
                    }
                });
                checkPageItems();
                timeoutPage = setTimeout(updatePage, 2000);
                updateToastErr(true);
            } else {
                //location.reload();
                updateToastErr(false);
                timeoutPage = setTimeout(updatePage, 5000);
            }
            sendingAjax = false;
        }
    }
    xhr.open('GET', '', true);
    xhr.setRequestHeader("x-isupdate", "t");
    xhr.send(null);
}


function toastDetErr() {
    Toastify({
        text: repTilde("Ha ocurrido una respuesta inesperada durante la petici&oacute;n."),
        duration: 10000,
        gravity: "bottom",
        position: "left",
        backgroundColor: "linear-gradient(to right, #ed213a, #93291e)",
        stopOnFocus: true
    }).showToast();
}

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
});

window.addEventListener("load", function() {

    createCache();
    updatePage();
});