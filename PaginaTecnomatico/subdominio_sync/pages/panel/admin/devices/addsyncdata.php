<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

if (!is_numeric(URLPATHPARTES[4]) || empty(URLPATHPARTES[4])) {
    $tmPanel->registerAlert("Por favor, ingrese un identificador v&aacute;lido.");
    return;
}

$form = array("fields" => array(
    "dvd_code" => array("type" => "text",  "label" => "C&oacute;digo", "value" => '', "small" => "El c&oacute;digo ser&aacute; como se mostr&aacute;/recibir&aacute; en JSON. Ejemplo: Si el c&oacute;digo es hola123, en JSON se enviar&aacute; y recibir&aacute; como: <b>{\"hola123\": \"valor\"}</b>."),
    "dvd_value" => array("type" => "text",  "label" => "Valor del dato", "value" => '', "validator" => function (&$str) {
        if (isset($_POST['admua_dvd_isdata']) && $_POST['admua_dvd_isdata'] == '0' && $str != '1' && $str != '0')
            $str = '0';
        return array("error" => false);
    }),
    "dvd_isdata" => array("type" => "radio", "options" => array(0 => array("value" => '0', "label" => "Es un dato de un Pin con HIGH y LOW"), 1 => array("value" => '1', "label" => "Es un dato")),  "label" => "Tipo de dato", "value" => '0'),
    "dvd_name" => array("type" => "text",  "label" => "Nombre del dato", "value" => ''),
    "dvd_descadm" => array("type" => "textarea",  "label" => "Descripci&oacute;n del administrador", "value" => ''),
    "dvd_desc" => array("type" => "textarea",  "label" => "Descripci&oacute;n del dispositivo", "value" => '')
), "prefix" => 'admua_', 'method' => 'POST');


if (isset($_POST['admua_save'])) {
    $wasFail = $tmAdmin->addDeviceSyncData($form, (int)URLPATHPARTES[4]);
    if ($wasFail == false) {
        $tmPanel->registerAlert("Los cambios han sido guardados correctamente!", "success");
        redirectToUrl(WEB_URL . '/panel/admin/devices/manage/'.(int)URLPATHPARTES[4]);
        exit;
    } else {
        $tmPanel->registerAlert($wasFail);
    }
}

?>
<h1>Agregar un nuevo dato de sincronizaci&oacute;n (PINS)</h1>

<form method="POST">
    <?php
    echo $tmPanel->createBSForm($form);
    ?>
    <input type="hidden" name="admua_save" value="1" />
    <button class="btn btn-success" type="submit">Guardar</button>
</form>