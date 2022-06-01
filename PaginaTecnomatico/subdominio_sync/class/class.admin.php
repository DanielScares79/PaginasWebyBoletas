<?php
//Archivo de clases para panel

//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

class tmAdmin {

    //array("selectors" => "")
    function devicesList($extraElms = array()) {
        global $tmDB;
        return $tmDB->result_toarray($tmDB->execute('query', 'SELECT ' . (isset($extraElms['selectors']) ? $extraElms['selectors'] : '*') . ' FROM sync_devices'));
    }
    function usersList($extraElms = array()) {
        global $tmDB;
        return $tmDB->result_toarray($tmDB->execute('query', 'SELECT ' . (isset($extraElms['selectors']) ? $extraElms['selectors'] : '*') . ' FROM sync_usuarios'));
    }
    function getUserData($id = 0, $extraElms = array()) {
        global $tmDB;
        return $tmDB->execute('fetch_assoc', $tmDB->execute('query', 'SELECT ' . (isset($extraElms['selectors']) ? $extraElms['selectors'] : '*') . ' FROM sync_usuarios WHERE user_id = \'' . (int)$id . '\''));
    }
    function getDevicePermissionList($id = 0, $extraElms = array()) {
        global $tmDB;
        return $tmDB->result_toarray($tmDB->execute('query', 'SELECT ' . (isset($extraElms['selectors']) ? $extraElms['selectors'] : '*') . ' FROM sync_devicepermissions WHERE dp_user = \'' . (int)$id . '\''));
    }
    function getDeviceName($deviceID = 0) {
        global $tmDB;
        $data = $tmDB->execute('fetch_assoc', $tmDB->execute('query', 'SELECT device_name FROM sync_devices WHERE device_id = \'' . (int)$deviceID . '\' LIMIT 1'));
        return !empty($data) ? $data['device_name'] : 'EL DISPOSITIVO NO EXISTE.';
    }
    function getDeviceSyncData($devSDataID = 0, $extraElms = array()) {
        global $tmDB;
        return $tmDB->execute('fetch_assoc', $tmDB->execute('query', 'SELECT ' . (isset($extraElms['selectors']) ? $extraElms['selectors'] : '*') . ' FROM sync_devicesyncdata WHERE dvd_id = \'' . (int)$devSDataID . '\' LIMIT 1'));
    }
    function getUserSessions($id = 0, $extraElms = array()) {
        global $tmDB;
        return $tmDB->result_toarray($tmDB->execute('query', 'SELECT ' . (isset($extraElms['selectors']) ? $extraElms['selectors'] : '*') . ' FROM `sync_sessions` WHERE sess_uid = \'' . (int)$id . '\' ORDER BY sess_lastuse DESC'));
    }
    function YesOrNo($str = 0) {
        if (is_string($str)) $str = (int)$str;
        if ($str == 1)
            return 'SI';
        else return 'NO';
    }
    function addDeviceSyncData($form = 0, $deviceID = 0) {
        global $tmDB, $tmUser, $tmPanel;
        $data = $tmDB->execute('fetch_assoc', $tmDB->execute('query', 'SELECT device_id FROM sync_devices WHERE device_id = \'' . (int)$deviceID . '\' LIMIT 1'));
        if (empty($data)) return 'EL DISPOSITIVO NO EXISTE.';


        $methodData = $form['method'] == 'POST' ? $_POST : $_GET;
        $dataToPut = array();
        $query = 'INSERT INTO sync_devicesyncdata (dvd_id, dvd_addeddate, dvd_addeduid, dvd_did, __FIRST__) VALUES (0, \'' . (int)time() . '\', \'' . (int)$tmUser->uid . '\', \'' . (int)$deviceID . '\', __SECOND__)';

        //Validamos formulario
        $formValidation = $tmPanel->validateFormFields($form['fields'], $form['prefix'], $methodData, $dataToPut);
        if ($formValidation['error'] == true) return $formValidation['msg'];

        $setData = '';
        $setDataB = '';
        $lastKey = array_key_last($dataToPut);
        foreach ($dataToPut as $key => $val) {
            $setData .= $key . ($lastKey != $key ? ', ' : '');
        }
        foreach ($dataToPut as $key => $val) {
            $setDataB .= '\'' . $tmDB->secureData($val) . '\'' . ($lastKey != $key ? ', ' : '');
        }
        $query = str_replace(array('__FIRST__', '__SECOND__'), array($setData, $setDataB), $query);
        $tmDB->execute('query', $query);
        return false;
    }
    function editDeviceSyncData($form = array(), $devSDataID = 0, $deviceID = 0) {
        global $tmDB, $tmPanel;
        $methodData = $form['method'] == 'POST' ? $_POST : $_GET;
        $dataToPut = array();
        $query = 'UPDATE sync_devicesyncdata SET __SETDATA__ WHERE dvd_id = \'' . (int)$devSDataID . '\'';
        //Validamos formulario
        $formValidation = $tmPanel->validateFormFields($form['fields'], $form['prefix'], $methodData, $dataToPut);
        if ($formValidation['error'] == true) return $formValidation['msg'];
        $setData = '';
        $lastKey = array_key_last($dataToPut);
        foreach ($dataToPut as $key => $val) {
            $setData .= $key . ' = \'' . $tmDB->secureData($val) . '\'' . ($lastKey != $key ? ', ' : '');
        }
        $query = str_replace('__SETDATA__', $setData, $query);
        $tmDB->execute('query', $query);

        $tmPanel->updateTimeUpdateOnServer($deviceID);
        return false;
    }

    function deleteDeviceSyncData($id = 0) {
        global $tmDB;
        $tmDB->execute('query', 'DELETE FROM sync_devicesyncdata WHERE dvd_id = \'' . (int)$id . '\'');
    }

    function saveDevice($form, $id = 0) {
        global $tmDB, $tmPanel;

        $methodData = $form['method'] == 'POST' ? $_POST : $_GET;
        $dataToPut = array();
        $query = 'UPDATE sync_devices SET __SETDATA__ WHERE device_id = \'' . (int)$id . '\'';

        //Validamos formulario
        $formValidation = $tmPanel->validateFormFields($form['fields'], $form['prefix'], $methodData, $dataToPut);
        if ($formValidation['error'] == true) return $formValidation['msg'];

        $setData = '';
        $lastKey = array_key_last($dataToPut);
        foreach ($dataToPut as $key => $val) {
            $setData .= $key . ' = \'' . $tmDB->secureData($val) . '\'' . ($lastKey != $key ? ', ' : '');
        }
        $query = str_replace('__SETDATA__', $setData, $query);
        $tmDB->execute('query', $query);
        return false;
    }

    function addDevice($form) {

        global $tmDB, $tmUser, $tmPanel;

        $methodData = $form['method'] == 'POST' ? $_POST : $_GET;
        $dataToPut = array();
        $query = 'INSERT INTO sync_devices (device_id, device_adddate, device_addedbyuid, __FIRST__) VALUES (0, \'' . (int)time() . '\', \'' . (int)$tmUser->uid . '\', __SECOND__)';

        //Validamos formulario
        $formValidation = $tmPanel->validateFormFields($form['fields'], $form['prefix'], $methodData, $dataToPut);
        if ($formValidation['error'] == true) return $formValidation['msg'];

        $setData = '';
        $setDataB = '';
        $lastKey = array_key_last($dataToPut);
        foreach ($dataToPut as $key => $val) {
            $setData .= $key . ($lastKey != $key ? ', ' : '');
        }
        foreach ($dataToPut as $key => $val) {
            $setDataB .= '\'' . $tmDB->secureData($val) . '\'' . ($lastKey != $key ? ', ' : '');
        }

        $query = str_replace(array('__FIRST__', '__SECOND__'), array($setData, $setDataB), $query);

        $tmDB->execute('query', $query);

        return false;
    }

    function deleteDevice($id = 0) {
        global $tmDB;
        $tmDB->execute('query', 'DELETE FROM sync_devices WHERE device_id = \'' . (int)$id . '\'');
        $tmDB->execute('query', 'DELETE FROM sync_devicepermissions WHERE dp_deviceid = \'' . (int)$id . '\'');
        $tmDB->execute('query', 'DELETE FROM sync_devicesyncdata WHERE dvd_did = \'' . (int)$id . '\'');
    }

    function saveUser($form, $id = 0) {
        global $tmDB, $tmPanel;

        $methodData = $form['method'] == 'POST' ? $_POST : $_GET;
        $dataToPut = array();
        $query = 'UPDATE sync_usuarios SET __SETDATA__ WHERE user_id = \'' . (int)$id . '\'';

        //Validamos formulario
        $formValidation = $tmPanel->validateFormFields($form['fields'], $form['prefix'], $methodData, $dataToPut);
        if ($formValidation['error'] == true) return $formValidation['msg'];

        $setData = '';
        $lastKey = array_key_last($dataToPut);
        foreach ($dataToPut as $key => $val) {
            $setData .= $key . ' = \'' . $tmDB->secureData($val) . '\'' . ($lastKey != $key ? ', ' : '');
        }

        $query = str_replace('__SETDATA__', $setData, $query);

        $tmDB->execute('query', $query);

        return false;
    }
    function addUser($form = array()) {
        global $tmDB, $tmUser, $tmPanel;

        $methodData = $form['method'] == 'POST' ? $_POST : $_GET;
        $dataToPut = array();
        $query = 'INSERT INTO sync_usuarios (user_id, user_regdate, user_addedbyuid, __FIRST__) VALUES (0, \'' . (int)time() . '\', \'' . (int)$tmUser->uid . '\', __SECOND__)';

        //Validamos formulario
        $formValidation = $tmPanel->validateFormFields($form['fields'], $form['prefix'], $methodData, $dataToPut);
        if ($formValidation['error'] == true) return $formValidation['msg'];

        $setData = '';
        $setDataB = '';
        $lastKey = array_key_last($dataToPut);
        foreach ($dataToPut as $key => $val) {
            $setData .= $key . ($lastKey != $key ? ', ' : '');
        }
        foreach ($dataToPut as $key => $val) {
            $setDataB .= '\'' . $tmDB->secureData($val) . '\'' . ($lastKey != $key ? ', ' : '');
        }

        $query = str_replace(array('__FIRST__', '__SECOND__'), array($setData, $setDataB), $query);

        $tmDB->execute('query', $query);

        return false;
    }
    function deleteUser($id = 0) {
        global $tmDB;

        $tmDB->execute('query', 'DELETE FROM sync_devicepermissions WHERE dp_user = \'' . (int)$id . '\'');
        $tmDB->execute('query', 'DELETE FROM sync_sessions WHERE sess_uid = \'' . (int)$id . '\'');
        $tmDB->execute('query', 'DELETE FROM sync_usuarios WHERE user_id = \'' . (int)$id . '\'');

        return true;
    }
    function doAssociation() {
        global $tmDB, $tmUser, $tmPanel;

        $userExists = $tmDB->execute('num_rows', $tmDB->execute('query', 'SELECT user_id FROM sync_usuarios WHERE user_id = \'' . (int)$_POST['asoc_uid'] . '\' LIMIT 1'));

        if ($userExists == 0)
            return 'El usuario no existe.';

        $deviceExists = $tmDB->execute('num_rows', $tmDB->execute('query', 'SELECT device_id FROM sync_devices WHERE device_id = \'' . (int)$_POST['asoc_did'] . '\' LIMIT 1'));
        if ($deviceExists == 0)
            return 'El dispositivo no existe.';

        $asocExists = $tmDB->execute('num_rows', $tmDB->execute('query', 'SELECT dp_id FROM sync_devicepermissions WHERE dp_user = \'' . (int)$_POST['asoc_uid'] . '\' AND dp_deviceid = \'' . (int)$_POST['asoc_did'] . '\' LIMIT 1'));

        if ((int)$_POST['asoc_type'] == 1) {
            if ($asocExists == 0)
                return 'El usuario no est&aacute; vinculado a este dispositivo';
            $tmDB->execute('query', 'DELETE FROM sync_devicepermissions WHERE dp_user = \'' . (int)$_POST['asoc_uid'] . '\' AND dp_deviceid = \'' . (int)$_POST['asoc_did'] . '\'');
            $tmPanel->registerAlert("El usuario ha sido desvinculado del dispositivo.", "success");
        } else {
            if ($asocExists == 1)
                return 'El usuario ya estaba vinculado al dispositivo.';
            $tmDB->execute('query', 'INSERT INTO `sync_devicepermissions` (`dp_id`, `dp_user`, `dp_isowner`, `dp_addedbyuid`, `dp_deviceid`, `dp_addeddate`) VALUES (0, \'' . (int)$_POST['asoc_uid'] . '\', \'' . ((int)$_POST['asoc_owner'] == 1 ? 1 : 0) . '\', \'' . $tmUser->uid . '\', \'' . (int)$_POST['asoc_did'] . '\', \'' . time() . '\')');
            $tmPanel->registerAlert("El usuario ha sido vinculado del dispositivo.", "success");
        }
        return false;
    }

}
