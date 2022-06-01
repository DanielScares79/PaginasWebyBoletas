<?php
//Archivo AJAX

//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

require CLASS_DIR . DIRECTORY_SEPARATOR . 'class.panel.php';
$tmPanel = new tmPanel;

//Todo lo que retornemos sera JSON
header('Content-type: application/json', true);

if (!$tmUser->logged) exit(json_encode(array(
    "error" => true,
    "msg" => "No est&aacute;s logeado."
)));

switch (URLPATHPARTES[2]) {
    case "savesyncdata":
        echo $tmPanel->saveSyncData();
        break;
}
