<?php
//Archivo que maneja las urls y a que debe ir cada una

//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit();

define('PARTES_URL_ACTUAL', parse_url(ObtenerUrlActual()));
define('URLPATHPARTES',  explode("/", trim(PARTES_URL_ACTUAL['path'], "/")));
$matches = array();

//Fix Urls Extrañas con doble slashes
$pathNoSlashes = preg_replace('#/+#', '/', PARTES_URL_ACTUAL['path']);
$newUrl = PARTES_URL_ACTUAL;
$newUrl['path'] = $pathNoSlashes;
$construirNuevaUrl = construirURL($newUrl);

//Si las urls no son las mismas, entonces redireccionar
if (ObtenerUrlActual() != $construirNuevaUrl) {
    redirectToUrl($construirNuevaUrl, true, 302);
    exit;
}

//Verificar slashes en blanco ejemplo: ej.com/holi////hola/
//Esto es por si logran decifrar como pasar lo que hicimos arriba despues de redireccionar
foreach (URLPATHPARTES as $key => $val) {
    if ($key > 0 && empty($val))
        displayErrorPageAndExit('Como has logrado que salga esto?', 400);

    if (!preg_match('/^[A-Za-z0-9_-]{0,}$/', $val))
        displayErrorPageAndExit("La url contiene caracteres no permitidos.", 400);
}

/*
Manejamos urls!
Cada / es una key mas
Ejemplo:
/hola/como/estas
URLPATHPARTES[0] = HOLA
URLPATHPARTES[1] = COMO
URLPATHPARTES[2] = ESTAS

no olvidar poner un empty para aquellas que no tengan "subdivision"
*/

//Con esto minificamos la salida del HTML (ver fuente)
if (function_exists('sanitize_output'))
    ob_start("sanitize_output");

if (URLPATHPARTES[0] == 'index.php' || empty(URLPATHPARTES[0])) {
    require PAGES_DIR . DIRECTORY_SEPARATOR . 'landingpage.php';
} else if (empty(URLPATHPARTES[1]) && (URLPATHPARTES[0] == 'auth')) {
    require PAGES_DIR . DIRECTORY_SEPARATOR . URLPATHPARTES[0] . '.php';
} else if (URLPATHPARTES[0] == 'panel') {
    require PAGES_DIR . DIRECTORY_SEPARATOR . URLPATHPARTES[0] . '.php';
} else if (URLPATHPARTES[0] == 'ajax' && !empty(URLPATHPARTES[1]) && !empty(URLPATHPARTES[2])) {
    if (URLPATHPARTES[1] == 'user' || URLPATHPARTES[1] == 'panel') {
        require AJAX_DIR . DIRECTORY_SEPARATOR . 'ajax.' . URLPATHPARTES[1] . '.php';
    } else {
        http_response_code(404);
        header('Content-type: text/plain');
        echo '404 Not found.';
    }
} else {
    $_GET['HTAERRORCODE'] = 404; //hack
    require PAGES_DIR . DIRECTORY_SEPARATOR . 'htaerr.php';
}

//Terminamos minificacion
if (function_exists('sanitize_output')) ob_end_flush();
