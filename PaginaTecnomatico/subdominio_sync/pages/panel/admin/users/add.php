<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

$form = array("fields" => array(
    "user_email" => array("type" => "text",  "label" => "DIRECCION DE CORREO ELECTRONICO", "value" => ''),
    "user_name" => array("type" => "text",  "label" => "NOMBRE DEL USUARIO", "value" => ''),
    "user_lastname" => array("type" => "text",  "label" => "APELLIDO DEL USUARIO", "value" => ''),
    "user_admin" => array("type" => "radio", "options" => array(0 => array("value" => '0', "label" => "No"), 1 => array("value" => '1', "label" => "Si")),  "label" => "ADMINISTRADOR? (1/0)", "value" => '0'),
    "user_telephone" => array("type" => "text",  "label" => "NUMERO DE TELEFONO", "value" => '+569'),
    "user_rut" => array("type" => "text",  "label" => "RUT DEL USUARIO (XXXXXX-X)", "value" => ''),
    "user_password" => array("type" => "text",  "label" => "CONTRASE&Ntilde;A", "value" => '')
), "prefix" => 'admua_', 'method' => 'POST');


if (isset($_POST['admua_save'])) {
    $wasFail = $tmAdmin->addUser($form);
    if ($wasFail == false) {
        $tmPanel->registerAlert("Los cambios han sido guardados correctamente!", "success");
        redirectToUrl(WEB_URL . '/panel/admin/users/?added=t');
        exit;
    } else {
        $tmPanel->registerAlert($wasFail);
    }
}

?>
<h1 class="display-5">AGREGAR USUARIO</h1>

<form method="POST">
    <?php
    echo $tmPanel->createBSForm($form);
    ?>
    <input type="hidden" name="admua_save" value="1" />
    <button class="btn btn-success" type="submit">Guardar</button>
</form>