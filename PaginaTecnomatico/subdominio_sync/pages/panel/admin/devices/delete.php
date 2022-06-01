<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

if(!is_numeric(URLPATHPARTES[4]) || empty(URLPATHPARTES[4])) {
    $tmPanel->registerAlert("Por favor, ingrese un identificador v&aacute;lido.");
    return;
}

$deviceData = $tmPanel->getDeviceData((int)URLPATHPARTES[4], array('selectors' => 'device_id'));
if (empty($deviceData)) {
    $tmPanel->registerAlert("El dispositivo " . (int)URLPATHPARTES[4] . " no existe.");
    return;
}

$devData = $deviceData['data'];

if(isset($_GET['confirm_delete'])) {
    $tmAdmin->deleteDevice($devData['device_id']);
    $tmPanel->registerAlert("El dispositivo ha sido eliminado.", "warning");
    redirectToUrl(WEB_URL . '/panel/admin/devices/?result=ok');
    exit;
}
?>
<div class="text-center">
<h1>ELIMINAR DISPOSITIVO</h1>
<p class="text-danger"><b>¿ESTÁ SEGURO QUE QUIERE REALIZAR ESTA ACCI&Oacute;N?</b></p>
<p><a href="?confirm_delete=1" class="btn btn-xl btn-danger">ACEPTAR Y ELIMINAR DISPOSITIVO Y SUS USUARIOS ASOCIADOS (PERMISOS)</a>
</div>