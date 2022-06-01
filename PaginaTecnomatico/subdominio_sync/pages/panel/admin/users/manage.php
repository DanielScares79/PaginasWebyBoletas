<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

if (!is_numeric(URLPATHPARTES[4]) || empty(URLPATHPARTES[4])) {
    $tmPanel->registerAlert("Por favor, ingrese un identificador v&aacute;lido.");
    return;
}

$userData = $tmAdmin->getUserData((int)URLPATHPARTES[4]);
if (empty($userData)) {
    $tmPanel->registerAlert("El usuario " . (int)URLPATHPARTES[4] . " no existe.");
    return;
}

$avatarID = md5('avatartm_' . $userData['user_id'] . $userData['user_regdate']);

$devPermissionList = $tmAdmin->getDevicePermissionList((int)$userData['user_id']);
$userSessions = $tmAdmin->getUserSessions((int)$userData['user_id']);

$form = array("fields" => array(
    "user_email" => array("type" => "text",  "label" => "DIRECCION DE CORREO ELECTRONICO", "value" => $userData['user_email']),
    "user_name" => array("type" => "text",  "label" => "NOMBRE DEL USUARIO", "value" => $userData['user_name']),
    "user_lastname" => array("type" => "text",  "label" => "APELLIDO DEL USUARIO", "value" => $userData['user_lastname']),
    "user_admin" => array("type" => "radio", "options" => array(0 => array("value" => '0', "label" => "No"), 1 => array("value" => '1', "label" => "Si")),  "label" => "ADMINISTRADOR? (1/0)", "value" => $userData['user_admin']),
    "user_telephone" => array("type" => "text",  "label" => "NUMERO DE TELEFONO", "value" => $userData['user_telephone']),
    "user_rut" => array("type" => "text",  "label" => "RUT DEL USUARIO (XXXXXX-X)", "value" => $userData['user_rut']),
    "user_password" => array("type" => "text",  "label" => "CONTRASE&Ntilde;A", "value" => $userData['user_password'])
), "prefix" => 'admu_', 'method' => 'POST');


if (isset($_POST['admu_save'])) {
    $wasFail = $tmAdmin->saveUser($form, $userData['user_id']);
    if ($wasFail == false) {
        $tmPanel->registerAlert("Los cambios han sido guardados correctamente!", "success");
        redirectToUrl(WEB_URL . '/panel/admin/users/manage/' . $userData['user_id'] . '/?result=ok');
        exit;
    } else {
        $tmPanel->registerAlert($wasFail);
    }
}

?>
<div class="card p-5 text-white gradient_user rounded-3 text-center mb-5">
    <h2>Ficha del usuario</h2>
    <p>Cambie la informaci&oacute;n que necesite del usuario y vea todo en un solo vistazo.</p>
</div>


<div class="row">
    <div class="col-md-3 text-center">
        <div><?php echo '<img src="' . WEB_URL . '/uploads/profile/' . $avatarID . '.jpg" style="max-width: 100%; width: 180px; height: 180px; border-radius: 6rem; object-fit: cover;" onerror="phdProf(this);">'; ?></div>
        <div><input type="text" class="form-control" value="<?php echo $avatarID; ?>" /></div>

    </div>
    <div class="col-md-9">

        <form method="POST">
            <?php
            echo $tmPanel->createBSForm($form);
            ?>
            <input type="hidden" name="admu_save" value="1" />
            <button class="btn btn-success" type="submit">Guardar</button>
        </form>

    </div>
</div>

<div class="card p-5 text-white gradient_user rounded-3 text-center my-5">
    <h2>Datos del usuario en formato raw</h2>
    <p>Se obtuvieron los siguientes datos del usuario desde la base de datos.</p>
</div>
<p data-ajax="printrdata">
    <code><?php echo print_r($userData, true); ?></code>
</p>
<div class="card p-5 text-white gradient_device rounded-3 text-center my-5">
    <h2>Dispositivos asociados</h2>
    <p>El usuario tiene asociado los siguientes dispositivos.</p>
    <p><a href="<?php echo WEB_URL; ?>/panel/admin/devices/permissions/?type=0&uid=<?php echo $userData['user_id']; ?>" class="btn btn-light">Asociar nuevo dispositivo</a></p>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Es due&ntilde;o?</th>
                <th scope="col">A&ntilde;adido por</th>
                <th scope="col">Dispositivo</th>
                <th scope="col">A&ntilde;adido el</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody data-ajax="tablelistlinkeddevices">
            <?php
            foreach ($devPermissionList as $key => $val) {
            ?>
                <tr>
                    <th scope="row"><?php echo $val['dp_id']; ?></th>
                    <td><?php echo $val['dp_isowner']; ?></td>
                    <td><?php echo $tmUser->getUserVCard($val['dp_addedbyuid'], WEB_URL . '/panel/admin/users/manage/' . $val['dp_addedbyuid'] . '/'); ?></td>
                    <td><a href="<?php echo WEB_URL; ?>/panel/admin/devices/manage/<?php echo $val['dp_deviceid']; ?>/"><?php echo $tmAdmin->getDeviceName($val['dp_deviceid']); ?></a></td>
                    <td><?php echo time_passed($val['dp_addeddate']); ?></td>
                    <td><a href="<?php echo WEB_URL; ?>/panel/admin/devices/permissions/?type=1&uid=<?php echo $val['dp_user']; ?>&did=<?php echo $val['dp_deviceid']; ?>">Desasociar</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="card p-5 text-white gradient_user rounded-3 text-center my-5">
    <h2>Sesiones del usuario</h2>
    <p>El usuario ha iniciado sesi&oacute;n en los siguientes lugares.</p>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">HASH</th>
                <th scope="col">IP</th>
                <th scope="col">NAVEGADOR</th>
                <th scope="col">EXPIRACI&Oacute;N</th>
                <th scope="col">FECHA DE CREACION</th>
                <th scope="col">RECUERDAME?</th>
                <th scope="col">ULTIMO USO</th>
                <th scope="col">ESTA INHABILITADA PARA USARSE?</th>
            </tr>
        </thead>
        <tbody data-ajax="tablelistusersess">
            <?php
            foreach ($userSessions as $key => $val) {
            ?>
                <tr>
                    <th scope="row"><?php echo $val['sess_id']; ?></th>
                    <td><?php echo $val['sess_hash']; ?></td>
                    <td><?php echo $val['sess_ip']; ?></td>
                    <td><?php echo xss_protect_string($val['sess_browser']); ?></td>
                    <td><?php echo time_passed($val['sess_expiration']); ?></td>
                    <td><?php echo time_passed($val['sess_date']); ?></td>
                    <td><?php echo $tmAdmin->YesOrNo($val['sess_rememberme']); ?></td>
                    <td><?php echo time_passed($val['sess_lastuse']); ?></td>
                    <td><?php echo $tmAdmin->YesOrNo($val['sess_loggedout']); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>