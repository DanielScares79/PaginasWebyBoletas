<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

if ($tmUser->data['user_admin'] == 0) {
    $tmPanel->registerAlert('No tienes permisos para ver este contenido.');
    redirectToUrl(WEB_URL . '/panel/dashboard/');
    exit;
}

if (empty(URLPATHPARTES[2])) {
    redirectToUrl(WEB_URL . '/panel/admin/home/');
    exit;
}

require CLASS_DIR . DIRECTORY_SEPARATOR . 'class.admin.php';
$tmAdmin = new tmAdmin;

$file = PAGES_DIR . DIRECTORY_SEPARATOR . 'panel' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . URLPATHPARTES[2] . '.php';

if(file_exists($file)) 
require $file;
else require PAGES_DIR . DIRECTORY_SEPARATOR . 'panel' . DIRECTORY_SEPARATOR . 'error404.php';