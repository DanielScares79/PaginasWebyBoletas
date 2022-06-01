<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

if(!empty(URLPATHPARTES[2])) {
    redirectToUrl(WEB_URL . '/panel/dashboard/');
    exit;
}

$avatarID = md5('avatartm_' . $tmUser->data['user_id'] . $tmUser->data['user_regdate']);
?>
<div class="card p-5 text-white gradient_other rounded-3 text-center mb-2 animate__animated animate__slideInDown">
    <h2>¡Hola <?php echo $tmUser->data['user_name']; ?>!</h2>
    <p>¿Listo para controlar tus dispositivos?</p>
</div>
<div class="alert alert-warning alert-dismissible fade show animate__animated animate__zoomIn" role="alert">
    <div class="d-flex mb-0 w-100 justify-content-between">
        <div>
            <h4 class="alert-heading">Nuevo comunicado</h4>
            <p>Nuestros servidores est&aacute; experimentando una falla. Estamos trabajando arduamente para solucionarla lo antes posible.<br />Se esperan problemas de conectividad.</p>
        </div>
        <small><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></small>
    </div>
    <hr>

    <p class="mb-0"><small>Podr&aacute; revisar este comunicado nuevamente en la secci&oacute;n correspondiente en el caso de cerrarlo.</small></p>
</div>
<div class="row animate__animated animate__slideInUp">
    <div class="col-md-3 col-lg-3 mb-2">
        <div class="card panelProfile">

            <div class="card-body text-center">
                <div class="img">
                    <img src="<?php echo WEB_URL . '/uploads/profile/' . $avatarID . '.jpg'; ?>" onerror="phdProf(this);">
                </div>

                <h4 class="card-title"><?php echo $tmUser->data['user_name']; ?> <?php echo $tmUser->data['user_lastname']; ?></h4>
            </div>
            <div class="list-group list-group-flush">
                <a href="<?php echo WEB_URL; ?>/panel/future/" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    Suscripci&oacute;n
                    <span class="badge bg-success badge-pill">ACTIVA</span>
                </a>
                <a href="<?php echo WEB_URL; ?>/panel/future/" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    Pr&oacute;ximo pago
                    <span class="badge bg-primary badge-pill">00/00/0000</span>
                </a>
                <a href="<?php echo WEB_URL; ?>/panel/future/" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    Dispositivos
                    <span class="badge bg-primary badge-pill"><?php echo count($myDevices); ?></span>
                </a>
                <a href="<?php echo WEB_URL; ?>/panel/future/" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    Tickets de soporte
                    <span class="badge bg-primary badge-pill">0</span>
                </a>
                <a href="<?php echo WEB_URL; ?>/panel/future/" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    Comunicaciones
                    <span class="badge bg-primary badge-pill">0</span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-lg-9 mb-2">
        <div class="card">
            <div class="list-group list-group-flush" data-ajax="listdevicesdashboard">
                <?php
                foreach ($myDevices as $key => $val) {
                ?>
                    <a href="<?php echo WEB_URL; ?>/panel/devices/manage/<?php echo $val['device_id']; ?>/" class="list-group-item list-group-item-action d-flex gap-3 py-3 align-items-center" aria-current="true">
                        <i class="fas fa-microchip flex-shrink-0 fa-3x"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                                <h6 class="mb-0"><?php echo $val['device_name']; ?></h6>
                                <p class="mb-0 opacity-75">Pronto podr&aacute;s personalizar este campo...</p>
                            </div>
                            <small class="opacity-50 text-nowrap">
                                <?php
                                if (time() >  $val['device_lastget'] + 30) {
                                    echo '<span class="text-danger" title="Sin conexi&oacute;n"><i class="fas fa-circle"></i></span>';
                                } else echo '<span class="text-success" title="Conectado"><i class="fas fa-circle"></i></span>';
                                ?>
                                <!--Act. <?php echo time_passed($val['device_lastuponsv']); ?>-->
                            </small>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>