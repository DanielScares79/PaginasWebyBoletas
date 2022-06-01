<?php
define('ACC_ARCH', true);

require realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'header.php';

function exitErrorJson($error = '') {
    http_response_code(500);
    echo json_encode(array(
        "error" => true,
        "details" => $error
    ));
    exit;
}


header('Content-type: application/json');

//Debug Purposes
//$requestHeaders["ESP_CODAUTH"] = AUTH_CODE_API;
//$requestHeaders["ESP_MAC"] = "00:00:00:00:00:04";
//$requestHeaders["ESP_TYPE"] = "update";

if (!isset($requestHeaders["ESP_CODAUTH"]))
    exitErrorJson('NO_AUTH_CODE');

if ($requestHeaders["ESP_CODAUTH"] != AUTH_CODE_API) exitErrorJson('INVALID_AUTH_CODE');

if (!isset($requestHeaders["ESP_MAC"]))
    exitErrorJson('NO_MAC_SENT');

if (!isset($requestHeaders["ESP_TYPE"]))
    exitErrorJson('NO_TYPE_SENT');

$type = strtolower($requestHeaders["ESP_TYPE"]);
$macAddress = beautyMac($requestHeaders["ESP_MAC"]);

if ($type != "update" && $type != "get")
    exitErrorJson('TYPE_INVALID');

if (!filter_var($macAddress, FILTER_VALIDATE_MAC)) exitErrorJson('INVALID_MAC');

$deviceQuery = $tmDB->execute('query', 'SELECT device_id, device_lastuponsv FROM `sync_devices` WHERE device_mac = \'' . $tmDB->secureData($macAddress) . '\' LIMIT 1');
$deviceData = $tmDB->execute('fetch_assoc', $deviceQuery);
if (empty($deviceData)) exitErrorJson('NO_DEVICE_FOUND');

$deviceSyncQuery = $tmDB->execute('query', 'SELECT dvd_code, dvd_isdata, dvd_value, dvd_id FROM `sync_devicesyncdata` WHERE dvd_did = \'' . (int)$deviceData['device_id'] . '\'');
$deviceSyncData = $tmDB->result_toarray($deviceSyncQuery);
if (empty($deviceSyncData)) exitErrorJson('NO_DEVICE_SYNCDATA');

$sdata = array();

switch ($type) {
    case "update":
        $dataPeticionPOST = json_decode(file_get_contents('php://input'), true);
        if (json_last_error() !== JSON_ERROR_NONE) exitErrorJson('ERR_JSON_DECODE');

        //reutilizamos variable
        foreach ($deviceSyncData as $key => $val) {
            $sdata[$val['dvd_code']] = array(
                "value" => $val['dvd_isdata'] == 1 ? strval($val['dvd_value']) : intval($val['dvd_value']),
                "isData" => $val['dvd_isdata'] == 1 ? true : false,
                "id" => $val['dvd_id'],
            );
        }

        //Verificamos que todo exista
        foreach ($dataPeticionPOST as $key => $val) {
            if (!is_string($val) && !is_int($val)) exitErrorJson('ERR_NOT_SUPPORTED_VALDATA');
            if (!isset($sdata[$key])) exitErrorJson('ERR_SYNCDATA_SENT_NOT_EXIST');
            $dataPeticionPOST[$key] = $sdata[$key]['isData'] == true ? strval($val) : intval($val);

            //Mas optimizacion, verificamos que los valores sean distintos
            if ($sdata[$key]['value'] == $dataPeticionPOST[$key]) {
                unset($dataPeticionPOST[$key]);
            }
        }

        //Si todo existe, volver a intentarlo
        foreach ($dataPeticionPOST as $key => $val) {
            $tmDB->execute('query', 'UPDATE sync_devicesyncdata SET dvd_value = \'' . $tmDB->secureData($val) . '\' WHERE dvd_code = \'' . $tmDB->secureData($key) . '\' AND dvd_did = \'' . (int)$deviceData['device_id'] . '\'');

            $tmDB->execute('query', 'INSERT INTO `sync_dactlog` (`act_id`, `act_deviceid`, `act_wasuser`, `act_userid`, `act_dsdid`, `act_date`, `act_val`) VALUES (NULL, \'' . (int)$deviceData['device_id'] . '\', \'0\', \'0\', \'' . (int)$sdata[$key]['dvd_id'] . '\', \'' . time() . '\', \'' . $tmDB->secureData($val) . '\')');
        }

        $sdata = array("result" => true);

        $tmDB->execute('query', 'UPDATE sync_devices SET device_lastupdate = \'' . (int)time() . '\' WHERE device_id = \'' . (int)$deviceData['device_id'] . '\'');
        break;
    case "get":

        foreach ($deviceSyncData as $key => $val) {
            $sdata[$val['dvd_code']] = $val['dvd_isdata'] == 1 ? strval($val['dvd_value']) : intval($val['dvd_value']);
        }

        $tmDB->execute('query', 'UPDATE sync_devices SET device_lastget = \'' . (int)time() . '\' WHERE device_id = \'' . (int)$deviceData['device_id'] . '\'');
        break;
}

echo json_encode(array(
    "error" => false, //No es error
    "sdata" => $sdata, //Datos de sincronizacion / Pins
    "ltms" => (int)$deviceData['device_lastuponsv'] //Timestamp ultima actualizacion de los pines
));
