<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;
if(!is_numeric(URLPATHPARTES[4]) || empty(URLPATHPARTES[4])) {
    $tmPanel->registerAlert("Por favor, ingrese un identificador v&aacute;lido.");
    return;
}

$devSyncData = $tmAdmin->getDeviceSyncData((int)URLPATHPARTES[4]);
if (empty($devSyncData)) {
    $tmPanel->registerAlert("El dato de sincronizaci&oacute;n " . (int)URLPATHPARTES[4] . " no existe.");
    return;
}


if(isset($_GET['confirm_delete'])) {
    $tmAdmin->deleteDeviceSyncData($devSyncData['dvd_id']);
    $tmPanel->registerAlert("El dato ha sido eliminado.", "warning");
    redirectToUrl(WEB_URL . '/panel/admin/devices/manage/' . $devSyncData['dvd_did'] . '/?result=ok');
    exit;
}


?>
<div class="text-center">
<h1>ELIMINAR DATO DE SINCRONIZACION DE UN DISPOSITIVO</h1>
<p class="text-danger"><b>¿ESTÁ SEGURO QUE QUIERE REALIZAR ESTA ACCI&Oacute;N?</b></p>
<p><a href="?confirm_delete=1" class="btn btn-xl btn-danger">ACEPTAR Y ELIMINAR DISPOSITIVO Y SUS USUARIOS ASOCIADOS (PERMISOS)</a>
</div>