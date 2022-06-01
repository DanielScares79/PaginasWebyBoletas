<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

if (!is_numeric(URLPATHPARTES[4]) || empty(URLPATHPARTES[4])) {
    $tmPanel->registerAlert("Por favor, ingrese un identificador v&aacute;lido.");
    return;
}

$userData = $tmAdmin->getUserData((int)URLPATHPARTES[4], array("selectors" => "user_id"));
if (empty($userData)) {
    $tmPanel->registerAlert("El usuario " . (int)URLPATHPARTES[4] . " no existe.");
    return;
}

if (isset($_GET['confirm_delete'])) {
    $tmAdmin->deleteUser($userData['user_id']);
    $tmPanel->registerAlert("El usuario ha sido eliminado correctamente.", "warning");
    redirectToUrl(WEB_URL . '/panel/admin/users/?result=ok');
    exit;
}

?>
<div class="p-5 text-white gradient_delete rounded-3 text-center">
    <h1>Eliminar usuario</h1>
    <p><b>¿ESTÁ SEGURO QUE QUIERE REALIZAR ESTA ACCI&Oacute;N?</b></p>
    <p><a href="?confirm_delete=1" class="btn btn-xl btn-danger">ACEPTAR Y ELIMINAR USUARIO</a>
</div>