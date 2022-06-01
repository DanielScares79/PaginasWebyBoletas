<?php
//Todas las funciones de la web

//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

//Pagina de error
function displayErrorPageAndExit($error = '', $code = 500) {
    //Sobreescribimos
    header('Content-type: text/html', true);
    http_response_code($code);
    echo '<style>.dberr { font-family: Roboto,-apple-system,BlinkMacSystemFont,"Segoe UI","Helvetica Neue",Arial,sans-serif; }</style><div class="dberr"><div style="padding: 15px;"><h1>Oh no, tenemos un problema.</h1><p>' . $error . '</p><p>Si el error continua, por favor comuniquese con el soporte de Tecnomatico haciendo <a href="https://tecnomatico.cl/support/" target="_blank">click aqu&iacute;</a><br/>No olvide proporcionar el error o el c&oacute;digo de error para una ayuda m&aacute;s eficiente y r&aacute;pida.<br/><a href="javascript:location.reload();">Haga click aqu&iacute; para reiniciar la p&aacute;gina</a>.</p></p></div></div>';
    exit;
}

//Separamos la url en multiples partes
//Reutilizado de RetroGames.cl
function ObtenerUrlActual() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

//Construimos una nueva URL por partes
//Reutilizado de RetroGames.cl
function construirURL(array $parts) {
    $scheme   = isset($parts['scheme']) ? ($parts['scheme'] . '://') : '';

    $host     = $parts['host'] ?? '';
    $port     = isset($parts['port']) ? (':' . $parts['port']) : '';

    $user     = $parts['user'] ?? '';
    $pass     = isset($parts['pass']) ? (':' . $parts['pass'])  : '';
    $pass     = ($user || $pass) ? ($pass . '@') : '';

    $path     = $parts['path'] ?? '';

    $query    = empty($parts['query']) ? '' : ('?' . $parts['query']);

    $fragment = empty($parts['fragment']) ? '' : ('#' . $parts['fragment']);

    return implode('', [$scheme, $user, $pass, $host, $port, $path, $query, $fragment]);
}

//Obtener la ip del usuario
//https://stackoverflow.com/a/13646735
function getUserIP() {
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    return $ip;
}

//Minificacion para el buffer
//Reutilizado de RetroGames.cl
//https://www.php.net/manual/en/function.ob-start.php#71953
function sanitize_output($buffer = NULL) {
    $search = array(
        '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
        '/[^\S ]+\</s',     // strip whitespaces before tags, except space
        '/(\s)+/s',         // shorten multiple whitespace sequences
        '/<!--(.|\s)*?-->/' // Remove HTML comments
    );
    $replace = array(
        '>',
        '<',
        '\\1',
        ''
    );
    $buffer = preg_replace($search, $replace, $buffer);
    return $buffer;
}

//Tiempo transcurrido (hace x yyyyy)
function time_passed($timestamp = 0) {

    if ((int)$timestamp == 0) return 'Nunca';

    $diff = time() - (int) $timestamp;

    if ($diff < 10)
        return 'Justo ahora';

    if ($diff > 604800)
        return date("d M Y", $timestamp);

    $intervals = array(
        //1                   => array('año',    31556926),
        //$diff < 31556926    => array('mes',   2628000),
        //$diff < 2629744     => array('semana',    604800),
        $diff < 604800      => array('día',     86400),
        $diff < 86400       => array('hora',    3600),
        $diff < 3600        => array('minuto',  60),
        $diff < 60          => array('segundo',  1)
    );

    $value = floor($diff / $intervals[1][1]);
    return 'Hace ' . $value . ' ' . $intervals[1][0] . ($value > 1 ? 's' : '');
}

function redirectToUrl($url = '') {
    global $requestHeaders;
    if (isset($requestHeaders['x-isupdate'])) {
        http_response_code(200);
        header('Content-type: application/json');
        echo json_encode(array("ru" => $url));
    } else {
        http_response_code(302);
        header('Location: ' . $url);
    }
}

function beautyMac($macAddress = "") {
    $macAddress = str_replace('-', ':', strtoupper($macAddress));
    $macAddress = preg_replace('/\s+/', '', $macAddress);
    return $macAddress;
}
