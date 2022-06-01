<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

if (!is_numeric(URLPATHPARTES[3]) || empty(URLPATHPARTES[3])) {
    $tmPanel->registerAlert("Por favor, ingrese un identificador v&aacute;lido.");
    redirectToUrl(WEB_URL . '/panel/dashboard/');
    exit;
}

$deviceData = $tmPanel->getDeviceData((int)URLPATHPARTES[3], array("devSyncData" => true, 'selectors' => 'device_id, device_name, device_lastget'));
if (empty($deviceData)) {
    $tmPanel->registerAlert("El dispositivo " . (int)URLPATHPARTES[3] . " no existe.");
    redirectToUrl(WEB_URL . '/panel/dashboard/');
    exit;
}

$devSyncData = $deviceData['devSyncData'];

if (!$tmPanel->hasUserPermission($deviceData['data']['device_id'])) {
    $tmPanel->registerAlert("No tienes permisos para acceder a este dispositivo.");
    redirectToUrl(WEB_URL . '/panel/dashboard/');
    exit;
}

?>
<div class="card p-5 text-white gradient_device rounded-3 text-center mb-2">
    <h1><?php echo $deviceData['data']['device_name']; ?></h1>
    <p class="mb-0 opacity-75">Pronto podr&aacute;s personalizar este campo...</p>
</div>
<div class="avisos" data-ajax="avisdev">
    <?php
    if (time() > $deviceData['data']['device_lastget'] + 30) {
    ?>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Alerta de conexi&oacute;n</h4>
            <p>El dispositivo no se ha conectado con Tecnomatico Sync. A continuaci&oacute;n le recomendamos verificar lo siguiente:</p>
            <ul>
                <li>El dispositivo est&aacute; encendido.</li>
                <li>Desde la misma red Wi-Fi que el dispositivo usted puede acceder a Tecnomatico Sync correctamente.</li>
                <li>El dispositivo est&aacute; correctamente conectado a la red Wi-Fi.</li>
                <li>El dispositivo no tiene una luz roja encendida.</li>
            </ul>
            <hr>
            <p class="mb-0">El dispositivo se conect&oacute; por &uacute;ltima vez <?php echo time_passed($deviceData['data']['device_lastget']); ?>.</p>
        </div>
    <?php
    }
    ?>
</div>
<div class="row">
    <?php
    foreach ($devSyncData as $key => $val) {
    ?>
        <div class="col-md-4 mb-2">
            <div class="card noselect" data-ajax="datidajaxbox_<?php echo $val['dvd_id']; ?>">
                <img src="<?php echo WEB_URL; ?>/uploads/datpic/<?php echo $val['dvd_id']; ?>.jpg" class="card-img-top img-objectfit" alt="<?php echo $val['dvd_name']; ?>" onerror="phdatSy(this);">
                <div class="card-body">
                    <div class="text-center">
                        <h5 class="card-title"><?php echo $val['dvd_name']; ?></h5>
                        <p class="card-text"><?php echo $val['dvd_desc']; ?></p>
                        <form class="datitm">
                            <input type="hidden" name="did" value="<?php echo $deviceData['data']['device_id']; ?>" />
                            <input type="hidden" name="datid" value="<?php echo $val['dvd_id']; ?>" />
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <input type="text" class="form-control" value="<?php echo $val['dvd_value']; ?>" name="v">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-3"><i class="fa fa-save"></i></button>
                                </div>
                            </div>
                            <!--
                            <?php
                            if ($val['dvd_isdata']) {
                            ?>

                            <?php
                            } else {
                            ?>
                                <div class="form-check form-switch d-flex align-items-center justify-content-center">
                                    <input class="form-check-input me-2" type="checkbox" id="flexSwitchCheckDefault" value="1" <?php echo ((int)$val['dvd_value'] == 1 ? 'checked' : ''); ?>>
                                </div>
                            <?php
                            }
                            ?>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<?php
