<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

$devices = $tmAdmin->devicesList(array("selectors" => "device_id, device_name, device_lastupdate, device_lastget, device_adddate, device_addedbyuid"));

?>
<div class="card p-5 text-white gradient_device rounded-3 text-center mb-5">
    <h1>Gesti&oacute;n de dispositivos</h1>
    <p>Mr. Robot is happy!</p>
    <p><a href="<?php echo WEB_URL; ?>/panel/admin/devices/manage/add/" class="btn btn-light">Agregar nuevo dispositivo</a></p>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Last Update</th>
                <th scope="col">Last Get</th>
                <th scope="col">A&ntilde;adido el</th>
                <th scope="col">A&ntilde;adido por</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody  data-ajax="tablelist"> 
            <?php
            foreach ($devices as $key => $val) {
            ?>
                <tr>
                    <th scope="row"><?php echo $val['device_id']; ?></th>
                    <td><?php echo $val['device_name']; ?></td>
                    <td><?php echo time_passed($val['device_lastupdate']); ?></td>
                    <td><?php echo time_passed($val['device_lastget']); ?></td>
                    <td><?php echo time_passed($val['device_adddate']); ?></td>
                    <td><?php echo $tmUser->getUserVCard($val['device_addedbyuid'], WEB_URL . '/panel/admin/users/manage/' . $val['device_addedbyuid'] . '/'); ?></td>
                    <td><a href="<?php echo WEB_URL; ?>/panel/admin/devices/manage/<?php echo $val['device_id']; ?>/">Gestionar</a> <a href="<?php echo WEB_URL; ?>/panel/admin/devices/delete/<?php echo $val['device_id']; ?>/">Eliminar</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>