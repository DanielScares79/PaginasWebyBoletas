<?php
//Archivo de clases para usuarios

//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

class tmDB {
    var $link;

    function __construct() {
        $this->createLink();
        $this->setCharset();
    }

    function createLink() {
        $this->link = mysqli_connect(DB_DATOS['url'], DB_DATOS['user'], DB_DATOS['pass'], DB_DATOS['name']);
        if (!$this->link)
            $this->displayError("Connection failed: " . mysqli_connect_error());
    }

    function setCharset() {
        if (!mysqli_set_charset($this->link, 'utf8'))
            $this->displayError('No se pudo establecer la codificaci&oacute;n de caracteres');
    }


    function execute($type = 'query', $data = null) {
        switch ($type) {
            case "query":
                $result = mysqli_query($this->link, $data);
                if (!$result) {
                    $error = mysqli_error($this->link);
                    $this->displayError('Query: "' . $data . '", Error: "' . $error . '"', array_shift(debug_backtrace()));
                }
                break;
            case "real_escape_string":
                $result = mysqli_real_escape_string($this->link, $data);
                break;
            case "fetch_assoc":
                $result = mysqli_fetch_assoc($data);
                break;
            case "num_rows":
                $result = mysqli_num_rows($data);
                break;
            case "insert_id":
                $result = mysqli_insert_id($this->link);
                break;
            default:
                $this->displayError('Method not found');
                break;
        }
        return $result;
    }

    function result_toarray($result = null) {
        $result instanceof mysqli_result;
        if (!is_a($result, 'mysqli_result')) return false;
        while ($row = $this->execute('fetch_assoc', $result)) $array[] = $row;
        return $array;
    }

    function saveToLog($hash = '', $msg = '', $backtrace = array()) {
        $file = LOGS_DIR . DIRECTORY_SEPARATOR . 'db.log';
        if (!file_exists($file)) touch($file);
        $getFile = file_get_contents($file);

        if ($getFile !== false) {
            if (file_put_contents($file, $getFile . "\n----------------------------\nNew Database Error:\n-Hash: " . $hash . "\n-File:" . $backtrace['file'] . "\n-Line:" . $backtrace['line'] . "\n-Error: " . $msg . "\n-Date: " . time() . "\n-User IP:" . getUserIP() . "\n-Browser:" . $_SERVER['HTTP_USER_AGENT'] . "\n-User Headers:\n------------------------------\n") !== false) return true;
        }

        return false;
    }

    function displayError($msg = '', $backtrace = array()) {
        $hash = md5(time());
        $backtrace = empty($backtrace) ? array_shift(debug_backtrace()) : $backtrace;
        $details = ($this->saveToLog($hash, $msg, $backtrace) ? 'Por favor, proporcione el siguiente c&oacute;digo en soporte: <b>db' . $hash . '</b>' : 'No se pudo guardar el hash.') . (MOSTRAR_ERROR_EN_VEZ_DE_HASH ? '<br/><textarea class="form-control" style="width: 300px;height: 150px;" readonly>' . xss_protect_string($msg) . '</textarea>' : '');

        displayErrorPageAndExit($details);
    }

    function secureData($data = null) {
        return $this->execute('real_escape_string', function_exists('magic_quotes_gpc') ? stripslashes($data) : $data);
    }
}
