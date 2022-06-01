<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

if (!isset($_GET['type'])) {
    $tmPanel->registerAlert('Debe ingresar un tipo.');
    return;
}

if (isset($_POST['asoc_type']) && isset($_POST['asoc_uid']) && isset($_POST['asoc_did']) && isset($_POST['asoc_owner'])) {
    $wasFail = $tmAdmin->doAssociation();
    if ($wasFail == false) {
        //La alerta se hace desde la funcion de arriba
        //$tmPanel->registerAlert("Los cambios han sido guardados correctamente!", "success");
        if (isset($_GET['uid'])) {
            redirectToUrl(WEB_URL . '/panel/admin/users/manage/' . $_POST['asoc_uid'] . '/?result=assocok');
        } else {
            redirectToUrl( WEB_URL . '/panel/admin/devices/manage/' . $_POST['asoc_did'] . '/?result=assocok');
        }
        exit;
    } else {
        $tmPanel->registerAlert($wasFail);
    }
}

?>
<h1>Gestionar asociaciones de dispositivos</h1>
<form method="post">
    <div class="mb-3">
        <label>Deseo:</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="asoc_type" id="asoc_type_a" value="0" <?php if ($_GET['type'] != '1') echo 'checked';
                                                                                                        else echo 'disabled'; ?>>
            <label class="form-check-label" for="asoc_type_a">
                Asociar
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="asoc_type" id="asoc_type_b" value="1" <?php if ($_GET['type'] == '1') echo 'checked';
                                                                                                        else echo 'disabled'; ?>>
            <label class="form-check-label" for="asoc_type_b">
                Desasociar
            </label>
        </div>
    </div>
    <div class="mb-3">
        <label>La cuenta del usuario:</label>
        <select class="form-select" name="asoc_uid">
            <option value="0">Seleccione un usuario</option>
            <?php
            $list = $tmAdmin->usersList(array("selectors" => "user_id, user_name, user_lastname, user_rut"));
            foreach ($list as $key => $val) {
                echo '<option value="' . $val['user_id'] . '" ' . (isset($_GET['uid']) && $_GET['uid'] == $val['user_id'] ? 'selected' : '') . '>' . $val['user_name'] . ' ' . $val['user_lastname'] . ' | Rut: ' . $val['user_rut'] . ' | ID: ' . $val['user_id'] . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label>En el dispositivo:</label>
        <select class="form-select" name="asoc_did">
            <option value="0">Seleccione un dispositivo</option>
            <?php
            $list = $tmAdmin->devicesList(array("selectors" => "device_id, device_mac, device_name"));
            foreach ($list as $key => $val) {
                echo '<option value="' . $val['device_id'] . '" ' . (isset($_GET['did']) && $_GET['did'] == $val['device_id'] ? 'selected' : '') . '>' . $val['device_name'] . '  | MAC: ' . $val['device_mac'] . ' | ID: ' . $val['device_id'] . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Ser&aacute; due&ntilde;o?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="asoc_owner" id="asoc_owner_a" value="1">
            <label class="form-check-label" for="asoc_owner_a">
                Si
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="asoc_owner" id="asoc_owner_b" value="0" checked>
            <label class="form-check-label" for="asoc_owner_b">
                No
            </label>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Enviar formulario</button>
</form>