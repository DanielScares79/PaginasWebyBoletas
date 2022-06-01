<?php
//Archivo AJAX

//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

//Todo lo que retornemos sera JSON
header('Content-type: application/json', true);

switch (URLPATHPARTES[2]) {
    case "login":

        if ($tmUser->logged) exit(json_encode(array(
            "error" => true,
            "msg" => "Ya est&aacute;s logeado."
        )));
        if (isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['g-recaptcha-response'])) {
            echo $tmUser->doUserLogin();
        } else {
            echo json_encode(array(
                "error" => true,
                "msg" => "No se ha enviado un campo."
            ));
        }
        break;
}
