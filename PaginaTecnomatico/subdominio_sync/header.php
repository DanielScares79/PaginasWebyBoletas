<?php
//Archivo que maneja funciones principales para todos los archivos

//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit();

//Verificacion
if (!function_exists('curl_version')) {
    exit('<h1>This script needs "CURL LIB" to work.</h1>');
} else if (version_compare(PHP_VERSION, '7.3.0', '<')) {
    exit('<h1>This script needs at least "PHP 7.3.0" to work.</h1>');
}

//Errores PHP
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
ini_set('display_errors', TRUE);

// Limite de ejecución
set_time_limit(300);

//Idioma
setlocale(LC_ALL, 'es_ES');

//Zona Horaria
date_default_timezone_set("America/Santiago");

//Codificacion
ini_set('default_charset', 'UTF-8');

//Definimos constantes
define('ROOT_PATH',  realpath(dirname(__FILE__))); //La direccion al directorio raiz (este se supone)

//Directorio donde guardaremos cada archivo de log
define('LOGS_DIR', ROOT_PATH . DIRECTORY_SEPARATOR . 'logs');

//Lo puse aqui pero ni idea
ini_set('error_log', LOGS_DIR . DIRECTORY_SEPARATOR . 'php.log');

if (!is_dir(LOGS_DIR)) @mkdir(LOGS_DIR, 0777, true); //Si la carpeta no existe, crearla

//Localhost
define('IS_LOCALHOST', (strpos($_SERVER['HTTP_HOST'], 'tmsync.localhost') !== false || strpos($_SERVER['HTTP_HOST'], '192.168.0.90') !== false ? true : false)); //desarrollo

//Directorio donde guardaremos cada php que usaremos aqui
define('PAGES_DIR', ROOT_PATH . DIRECTORY_SEPARATOR . 'pages');

//Directorio donde guardaremos cada parte en la parte frontend
define('SECTIONS_DIR', ROOT_PATH . DIRECTORY_SEPARATOR . 'sections');

//Directorio donde guardaremos cada archivo de clases
define('CLASS_DIR', ROOT_PATH . DIRECTORY_SEPARATOR . 'class');

//Directorio donde guardaremos cada archivo de ajax
define('AJAX_DIR', ROOT_PATH . DIRECTORY_SEPARATOR . 'ajax');


define('WEB_URL', IS_LOCALHOST ? 'https://tmsync.localhost' : 'https://sync.tecnomatico.cl'); //Url de la web sin la ultima / o slash (como el de guns n roses jajaj)

//Para la cookie del login
define('COOKIE_LOGIN', 'TmUsrLgSess');

//Poner el puntito antes pero no un nombre hace que la cookie sea accesible por todo el sitio
define('COOKIE_DOMAIN', IS_LOCALHOST ? 'tmsync.localhost' : '.tecnomatico.cl');

define('MOSTRAR_ERROR_EN_VEZ_DE_HASH', IS_LOCALHOST ? true : false); //SI ESTO ESTA EN TRUE, MOSTRARA EL ERROR EN CASO DE FALLA DE BASE DE DATOS

//ESP API
define('AUTH_CODE_API', 'DANXNOSEDUERMA6815');

//Recaptcha V2 Invisible
//https://www.google.com/recaptcha/admin
define('RECAPTCHA_PUBLIC', '6LdtiS4cAAAAAON_snZH7K9YLOgJdhG_2zPGU-Fi');
define('RECAPTCHA_PRIVATE', '6LdtiS4cAAAAAMUBV9sWRXjSltuU17EfAQdTWL3v');

//DATOS DE LA BASE DE DATOS
define('DB_DATOS', IS_LOCALHOST ? array(

    //DATOS PARA LA BASE DE DATOS EN LOCALHOST

    "user" => "root",
    "pass" => "",
    "url" => "localhost",
    "port" => 0,
    "name" => "tecnomatico_sync"
) : array(

    //DATOS PARA LA BASE DE DATOS EN LINEA (TECNOMATICO / HOST)

    "user" => "tecnomat_daniel",
    "pass" => "cinestrenar98421912", //Actualizado 12/11/2021
    "url" => "localhost",
    "port" => 0,
    "name" => "tecnomat_datos"
));

// Sesión
if (!isset($_SESSION)) {
    session_name("TMPSS"); //Tecnomatico PHP SESS SYNC
    session_start();
}

//Requerimos archivos importantes
//Se supone que no hay problema al usarlo arriba del querystring puesto que las funciones seran llamadas a posteriori
require 'functions.php';

//Seguridad adicional POST, ETC
require 'QueryString.php';
cleanRequest();


//Xd
$requestHeaders = apache_request_headers();

//Requerimos archivos de clases e instanciamos su clase
require CLASS_DIR . DIRECTORY_SEPARATOR . 'class.db.php';
$tmDB = new tmDB;

require CLASS_DIR . DIRECTORY_SEPARATOR . 'class.user.php';
$tmUser = new tmUser;

if (!filter_var(getUserIP(), FILTER_VALIDATE_IP)) displayErrorPageAndExit("Su direcci&oacute;n IP (" . xss_protect_string(getUserIP()) . ") no es v&aacute;lida.", 400);
