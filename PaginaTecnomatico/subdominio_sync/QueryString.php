<?php
//Seguridad para lo que se envia
//Este codigo al parecer es de SMF o MyBB o PhpBB la verdad lo desconozco pero lo que se es que nos agregara seguridad en lo que son los datos enviados por los usuarios al servidor.
//Hara que cosas como <script> pasen a &xx;script&xx; y asi el navegador lo interpretara como caracter y no como simbolo (creo que asi se dice)

//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

// Clean the request variables - add html entities to GET and slashes if magic_quotes_gpc is Off.
function cleanRequest() {

    // What function to use to reverse magic quotes - if sybase is on we assume that the database sensibly has the right unescape function!
    $removeMagicQuoteFunction = @ini_get('magic_quotes_sybase') || strtolower(@ini_get('magic_quotes_sybase')) == 'on' ? 'unescapestring__recursive' : 'stripslashes__recursive';

    // Save some memory.. (since we don't use these anyway.)
    unset($GLOBALS['HTTP_POST_VARS'], $GLOBALS['HTTP_POST_VARS']);
    unset($GLOBALS['HTTP_POST_FILES'], $GLOBALS['HTTP_POST_FILES']);

    // These keys shouldn't be set...ever.
    if (isset($_REQUEST['GLOBALS']) || isset($_COOKIE['GLOBALS']))
        displayErrorPageAndExit('Por favor elimine sus cookies.', 400);

    // Same goes for numeric keys.
    foreach (array_merge(array_keys($_POST), array_keys($_GET), array_keys($_FILES)) as $key)
        if (is_numeric($key))
            displayErrorPageAndExit('No puedes usar n&uacute;meros en los parametros.', 400);

    // Numeric keys in cookies are less of a problem. Just unset those.
    foreach ($_COOKIE as $key => $value)
        if (is_numeric($key))
            unset($_COOKIE[$key]);

    // Get the correct query string.  It may be in an environment variable...
    if (!isset($_SERVER['QUERY_STRING']))
        $_SERVER['QUERY_STRING'] = getenv('QUERY_STRING');

    // It seems that sticking a URL after the query string is mighty common, well, it's evil - don't.
    if (strpos($_SERVER['QUERY_STRING'], 'http') === 0) {
        displayErrorPageAndExit("No se permite utilizar urls en los parametros.", 400);
    }

    // If magic quotes is on we have some work...
    if (function_exists('get_magic_quotes_gpc')) {
        if (@get_magic_quotes_gpc() != 0) {
            $_ENV = $removeMagicQuoteFunction($_ENV);
            $_POST = $removeMagicQuoteFunction($_POST);
            $_COOKIE = $removeMagicQuoteFunction($_COOKIE);
            foreach ($_FILES as $k => $dummy)
                if (isset($_FILES[$k]['name']))
                    $_FILES[$k]['name'] = $removeMagicQuoteFunction($_FILES[$k]['name']);
        }
    }

    // Add entities to GET.  This is kinda like the slashes on everything else.
    $_GET = htmlspecialchars__recursive($_GET);
    $_POST = htmlspecialchars__recursive($_POST);
    $_COOKIE = htmlspecialchars__recursive($_COOKIE);

    // Let's not depend on the ini settings... why even have COOKIE in there, anyway?
    $_REQUEST = $_POST + $_GET;

    // Check if the request comes from this site
    //Necesita mas trabajo
    /*
    $IsMySite = strpos(preg_replace("/https?:\/\/|www\./", "", $_SERVER["HTTP_REFERER"]), preg_replace("/https?:\/\/|www\./", "", $_SERVER["HTTP_HOST"])) === 0;
    if ((!empty($_SERVER["HTTP_REFERER"]) && !$IsMySite) || $_SERVER["REQUEST_METHOD"] === "POST" && !$IsMySite) {
        displayErrorPageAndExit("La petici&oacute;n no viene desde nuestro sitio.", 400);
    }
    */
}

//Convertira posibles caracteres que pueden hackear la web en seguros
//Ejemplo:
//<script> pasara a ser &lt;script&gt;
function xss_protect_string($str = '') {
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

// Adds slashes to the array/variable.  Uses two underscores to guard against overloading.
function escapestring__recursive($var) {
    global $smcFunc;

    if (!is_array($var))
        return addslashes($var);

    // Reindex the array with slashes.
    $new_var = array();

    // Add slashes to every element, even the indexes!
    foreach ($var as $k => $v)
        $new_var[addslashes($k)] = escapestring__recursive($v);

    return $new_var;
}

// Adds html entities to the array/variable.  Uses two underscores to guard against overloading.
function htmlspecialchars__recursive($var, $level = 0) {

    if (!is_array($var))
        return xss_protect_string($var);

    // Add the htmlspecialchars to every element.
    foreach ($var as $k => $v)
        $var[$k] = $level > 25 ? null : htmlspecialchars__recursive($v, $level + 1);

    return $var;
}

// Unescapes any array or variable.  Two underscores for the normal reason.
function unescapestring__recursive($var) {

    if (!is_array($var))
        return stripslashes($var);

    // Reindex the array without slashes, this time.
    $new_var = array();

    // Strip the slashes from every element.
    foreach ($var as $k => $v)
        $new_var[stripslashes($k)] = unescapestring__recursive($v);

    return $new_var;
}

// Remove slashes recursively...
function stripslashes__recursive($var, $level = 0) {
    if (!is_array($var))
        return stripslashes($var);

    // Reindex the array without slashes, this time.
    $new_var = array();

    // Strip the slashes from every element.
    foreach ($var as $k => $v)
        $new_var[stripslashes($k)] = $level > 25 ? null : stripslashes__recursive($v, $level + 1);

    return $new_var;
}
