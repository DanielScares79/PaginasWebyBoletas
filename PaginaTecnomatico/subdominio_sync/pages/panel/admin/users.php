<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;
$seccion = empty(URLPATHPARTES[3]) ? 'list' : URLPATHPARTES[3];
$file = PAGES_DIR . DIRECTORY_SEPARATOR . 'panel' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'users' . DIRECTORY_SEPARATOR . $seccion . '.php';
if(file_exists($file)) 
require $file;
else require PAGES_DIR . DIRECTORY_SEPARATOR . 'panel' . DIRECTORY_SEPARATOR . 'error404.php';