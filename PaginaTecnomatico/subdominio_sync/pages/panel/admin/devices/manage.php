<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

$esAgregar = (bool)(URLPATHPARTES[4] == "add");

if (!$esAgregar) {
    if (!is_numeric(URLPATHPARTES[4]) || empty(URLPATHPARTES[4])) {
        $tmPanel->registerAlert("Por favor, ingrese un identificador v&aacute;lido.");
        return;
    }

    $deviceData = $tmPanel->getDeviceData((int)URLPATHPARTES[4], array("permissionlist" => true, "devSyncData" => true));
    if (empty($deviceData)) {
        $tmPanel->registerAlert("El dispositivo " . (int)URLPATHPARTES[4] . " no existe.");
        return;
    }

    $devData = $deviceData['data'];
    $devPermissionList = $deviceData['permissionlist'];
    $devSyncData = $deviceData['devSyncData'];
}

$form = array("fields" => array(
    "device_name" => array("type" => "text",  "label" => "NOMBRE DEL DISPOSITIVO", "value" => $devData['device_name']),
    "device_mac" => array("type" => "text",  "label" => "MAC ADDRESS DEL DISPOSITIVO", "value" => $devData['device_mac'], "validator" => function (&$str) {
        $str = beautyMac($str);
        if (!filter_var($str, FILTER_VALIDATE_MAC))
            return array("error" => true, "msg" => 'Por favor, ingrese una direcci&oacute;n MAC v&aacute;lida.');
        else return array("error" => false);
    }),
), "prefix" => 'admdev_', 'method' => 'POST');


if (isset($_POST['admdev_save'])) {
    $wasFail = $esAgregar ? $tmAdmin->addDevice($form) : $tmAdmin->saveDevice($form, $deviceData['data']['device_id']);
    if ($wasFail == false) {
        $tmPanel->registerAlert(($esAgregar ? "Se ha agregado el dispositivo" : "Los cambios han sido guardados correctamente!"), "success");
        redirectToUrl(WEB_URL . '/panel/admin/devices/manage/' .  ($esAgregar ? (int)$tmDB->execute("insert_id") : $deviceData['data']['device_id']) . '/?result=ok');
        exit;
    } else {
        $tmPanel->registerAlert($wasFail);
    }
}

?>
<h1 class="display-5"><?php echo ($esAgregar ? 'Agregar' : 'Editar'); ?> dispositivo</h1>



<div class="accordion accordion-flush" id="accAdmBS">
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Ficha
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse show" aria-labelledby="flush-headingOne">
            <div class="accordion-body">
                <form method="POST">
                    <?php
                    echo $tmPanel->createBSForm($form);
                    ?>
                    <input type="hidden" name="admdev_save" value="1" />
                    <button class="btn btn-success" type="submit">Guardar</button>
                </form>


            </div>
        </div>
    </div>
    <?php if (!$esAgregar) { ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Print_r de la base de datos
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo">
                <div class="accordion-body">
                    <p data-ajax="printrdevdata"><code><?php echo print_r($devData, true); ?></code></p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    <span>Informaci&oacute;n o datos de sincronizaci&oacute;n</span>
                </button>
                
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" >
                <div class="accordion-body">
                    <a href="<?php echo WEB_URL; ?>/panel/admin/devices/addsyncdata/<?php echo $deviceData['data']['device_id']; ?>/">Agregar un nuevo dato</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">C&oacute;digo (JSON)</th>
                                    <th scope="col">Valor actual</th>
                                    <th scope="col">A&ntilde;adido el</th>
                                    <th scope="col">A&ntilde;adido por</th>
                                    <th scope="col">Descripci&oacute;n</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripci&oacute;n de administrador</th>
                                    <th scope="col">Es informaci&oacute;n en vez de un pin?</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody data-ajax="tablelistsyncdata">
                                <?php
                                foreach ($devSyncData as $key => $val) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $val['dvd_id']; ?></th>
                                        <td><?php echo $val['dvd_code']; ?></td>
                                        <td><?php echo $val['dvd_value']; ?></td>
                                        <td><?php echo time_passed($val['dvd_addeddate']); ?></td>
                                        <td><?php echo $tmUser->getUserVCard($val['dvd_addeduid'],  WEB_URL . '/panel/admin/users/manage/' . $val['dvd_addeduid'] . '/'); ?></td>
                                        <td><?php echo $val['dvd_desc']; ?></td>
                                        <td><?php echo $val['dvd_name']; ?></td>
                                        <td><?php echo $val['dvd_descadm']; ?></td>
                                        <td><?php echo $tmAdmin->YesOrNo($val['dvd_isdata']); ?></td>
                                        <td><a href="<?php echo WEB_URL; ?>/panel/admin/devices/managesyncdata/<?php echo $val['dvd_id']; ?>/">Gestionar</a> <a href="<?php echo WEB_URL; ?>/panel/admin/devices/deletesyncdata/<?php echo $val['dvd_id']; ?>/">Eliminar</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                    Usuarios asociados al dispositivo
                </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour">
                <div class="accordion-body">
                    <a href="<?php echo WEB_URL; ?>/panel/admin/devices/permissions/?type=0&did=<?php echo  $deviceData['data']['device_id']; ?>">Asociar nuevo usuario</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Usuario asociado</th>
                                    <th scope="col">Es due&ntilde;o?</th>
                                    <th scope="col">A&ntilde;adido por</th>
                                    <th scope="col">Dispositivo</th>
                                    <th scope="col">A&ntilde;adido el</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody data-ajax="tablelistuserslinked">
                                <?php
                                foreach ($devPermissionList as $key => $val) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $val['dp_id']; ?></th>
                                        <td><?php echo $tmUser->getUserVCard($val['dp_user'], WEB_URL . '/panel/admin/users/manage/' . $val['dp_user'] . '/'); ?></td>
                                        <td><?php echo $tmAdmin->YesOrNo($val['dp_isowner']); ?></td>
                                        <td><?php echo $tmUser->getUserVCard($val['dp_addedbyuid'], WEB_URL . '/panel/admin/users/manage/' . $val['dp_addedbyuid'] . '/'); ?></td>
                                        <td><a href="<?php echo WEB_URL; ?>/panel/admin/devices/manage/<?php echo $val['dp_deviceid']; ?>/"><?php echo $tmAdmin->getDeviceName($val['dp_deviceid']); ?></a></td>
                                        <td><?php echo time_passed($val['dp_addeddate']); ?></td>
                                        <td><a href="<?php echo WEB_URL; ?>/panel/admin/devices/permissions/?type=1&uid=<?php echo $val['dp_user']; ?>&did=<?php echo $val['dp_deviceid']; ?>">Desasociar</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>