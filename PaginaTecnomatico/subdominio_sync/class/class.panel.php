<?php
//Archivo de clases para panel

//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

class tmPanel {
    function getDevices() {
        global $tmUser, $tmDB;
        $query = $tmDB->execute('query', 'SELECT dp_deviceid FROM sync_devicepermissions WHERE dp_user = \'' . (int)$tmUser->uid . '\'');
        $data = $tmDB->result_toarray($query);

        $return = array();
        foreach ($data as $key => $val) {
            $queryDevice = $tmDB->execute('query', 'SELECT device_id, device_name, device_lastuponsv, device_lastget FROM sync_devices WHERE device_id = \'' . (int)$val['dp_deviceid'] . '\' LIMIT 1');
            $deviceData = $tmDB->execute('fetch_assoc', $queryDevice);
            if (!empty($deviceData)) {
                $return[] = $deviceData;
            } else {
                displayErrorPageAndExit("El dispositivo (ID: " . (int)$val['dp_deviceid'] . ") no existe y usted tiene acceso.");
            }
        }

        return $return;
    }
    function getDeviceData($deviceID = 0, $extraElms = array()) {
        global $tmDB;
        $query = $tmDB->execute('query', 'SELECT ' . (isset($extraElms['selectors']) ? $extraElms['selectors'] : '*') . ' FROM sync_devices WHERE device_id = \'' . (int)$deviceID . '\' LIMIT 1');
        $data = $tmDB->execute('fetch_assoc', $query);
        $dataPerm = array();
        $devSyncData = array();
        if (!empty($data)) {
            if (isset($extraElms['permissionlist'])) {
                $query = $tmDB->execute('query', 'SELECT * FROM sync_devicepermissions WHERE dp_deviceid = \'' . (int)$deviceID . '\'');
                $dataPerm = $tmDB->result_toarray($query);
            }
            if (isset($extraElms['devSyncData'])) {
                $query = $tmDB->execute('query', 'SELECT * FROM sync_devicesyncdata WHERE dvd_did = \'' . (int)$deviceID . '\'');
                $devSyncData = $tmDB->result_toarray($query);
            }
            return array("data" => $data, "permissionlist" => $dataPerm, "devSyncData" => $devSyncData);
        } else return array();
    }
    function updateTimeUpdateOnServer($deviceID = 0) {
        global $tmDB;
        $tmDB->execute('query', 'UPDATE sync_devices SET device_lastuponsv = \'' . time() . '\' WHERE device_id = \'' . (int)$deviceID . '\'');
    }

    //El & sirve para poder modificar las variables afuera de la funcion! (algo como global)
    function validateFormFields($fields = array(), $prefix = '', &$methodData = array(), &$dataToPut = array()) {
        foreach ($fields as $key => $val) {
            $name = $prefix . $key;
            if (!isset($methodData[$name]))
                return array("error" => true, "msg" => 'Falta el parametro <b>' . $val['label'] . '</b>.');
            else {
                if (!is_numeric($methodData[$name]) && empty($methodData[$name]) && !isset($val['canempty']))
                    return array("error" => true, "msg" => 'Por favor complete el campo: ' . $val['label']);

                //En el validador tambien debemos usar & en los argumentos de la funcion si vamos a modificar la string!
                if (isset($val['validator'])) {
                    $validator = $val['validator']($methodData[$name]);
                    if ($validator['error'] == true)
                        return array("error" => true, "msg" => $validator['msg']);
                }
                $dataToPut[$key] = $methodData[$name];
            }
        }
        return array("error" => false);
    }

    function createBSForm($form = array()) {
        $result = '';
        $prefix = $form['prefix'];
        foreach ($form['fields'] as $key => $val) {
            $id = $prefix . $key;
            $result .= '<div class="mb-3"><label for="' . $id . '" class="form-label">' . $val['label'] . '</label>';
            if ($val['type'] == 'radio') {
                foreach ($val['options'] as $rk => $rv) {
                    $radioid = $id . '_radio_opt' . $rk;
                    $result .= '<div class="form-check"> <input class="form-check-input" type="radio" name="' . $id . '" id="' . $radioid . '" value="' . $rv['value'] . '" ' . (strval($val['value']) == strval($rv['value']) ? 'checked="checked"' : '') . '> <label class="form-check-label" for="' . $radioid . '"> ' . $rv['label'] . ' </label> </div>';
                }
            } else if ($val['type'] == 'textarea') {
                $result .= '<textarea class="form-control" id="' . $id . '" name="' . $id . '">' . $val['value'] . '</textarea>';
            } else {
                $result .= '<input type="' . $val['type'] . '" class="form-control" id="' . $id . '" name="' . $id . '" value="' . $val['value'] . '" ' . (isset($val['readonly']) ? 'readonly="readonly"' : '') . '>';
            }
            if (isset($val['small'])) $result .= '<p class="text-muted"><small>' . $val['small'] . '</small></p>';
            $result .= '</div>';
        }
        return $result;
    }

    function registerAlert($msg = '', $type = 'danger') {
        $_SESSION['panelalerts'][] = array("type" => $type, "msg" => $msg);
    }

    function displayAlertRegistered() {
        $return = '';
        if (!empty($_SESSION['panelalerts'])) {
            $return .= '<div class="panelalertsess">';
            foreach ($_SESSION['panelalerts'] as $key => $val) {
                $return .= '<div class="alert alert-' . $val['type'] . '">' . $val['msg'] . '</div>';
                unset($_SESSION['panelalerts'][$key]);
            }
            $return .= "</div>";
        }
        return $return;
    }

    function hasUserPermission($device_id = 0, $user_id = 0) {
        global $tmDB, $tmUser;

        if ($user_id == 0)
            $user_id = $tmUser->uid;

        $hasPermission = $tmDB->execute('num_rows', $tmDB->execute('query', 'SELECT dp_id FROM sync_devicepermissions WHERE dp_deviceid = \'' . (int)$device_id . '\' AND dp_user = \'' . (int)$user_id . '\' LIMIT 1'));

        return $hasPermission == 0 ? false : true;
    }

    function saveSyncData() {
        global $tmDB, $tmUser;

        if (!isset($_POST['did']) && !isset($_POST['datid']) && !isset($_POST['v'])) {
            return json_encode(array("error" => true, "msg" => "?"));
        } else {
            $deviceExists = $tmDB->execute('num_rows', $tmDB->execute('query', 'SELECT device_id FROM sync_devices WHERE device_id = \'' . (int)$_POST['did'] . '\' LIMIT 1'));
            if ($deviceExists == 0)
                return json_encode(array("error" => true, "msg" => "El dispositivo no existe."));

            if ($this->hasUserPermission((int)$_POST['did']) == false)
                return json_encode(array("error" => true, "msg" => "No tienes permisos para esto."));

            $syncDataQuery = $tmDB->execute('query', 'SELECT dvd_id, dvd_isdata FROM sync_devicesyncdata WHERE dvd_did = \'' . (int)$_POST['did'] . '\' AND dvd_id = \'' . (int)$_POST['datid'] . '\' LIMIT 1');
            $syncDataData = $tmDB->execute('fetch_assoc', $syncDataQuery);

            if (empty($syncDataData))
                return json_encode(array("error" => true, "msg" => "No se ha encontrado el dato."));

            if ($syncDataData['dvd_isdata'] == 0) {
                if ($_POST['v'] != '0' && $_POST['v'] != '1') return json_encode(array("error" => true, "msg" => "No es un dato de sincronizacion de datos!"));
            }
            $this->updateTimeUpdateOnServer((int)$_POST['did']);
            $tmDB->execute('query', 'UPDATE sync_devicesyncdata SET dvd_value = \'' . $tmDB->secureData($_POST['v']) . '\' WHERE dvd_id = \'' . (int)$_POST['datid'] . '\'');
            
            //Historial
            $tmDB->execute('query', 'INSERT INTO `sync_dactlog` (`act_id`, `act_deviceid`, `act_wasuser`, `act_userid`, `act_dsdid`, `act_date`, `act_val`) VALUES (NULL, \'' . (int)$_POST['did'] . '\', \'1\', \''.(int)$tmUser->uid.'\', \'' . (int)$_POST['datid'] . '\', \'' . time() . '\', \'' . $tmDB->secureData($_POST['v']) . '\')');
            
            return json_encode(array("error" => false, "msg" => "Guardado correctamente!"));
        }
    }
}
