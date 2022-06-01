<?php
//Archivo de clases para usuarios

//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

class tmUser {

    var $logged = false;
    var $uid = 0;
    var $sessExists = false;
    var $data = array();

    function __construct() {
        $this->checkUserLogged();
    }

    function deleteUserCookie() {
        global $tmDB;
        if ($this->sessExists) {
            $tmDB->execute('query', 'UPDATE sync_sessions SET sess_loggedout = \'1\' WHERE sess_hash = \'' . $tmDB->secureData($_COOKIE[COOKIE_LOGIN]) . '\'');
        }
        unset($_COOKIE[COOKIE_LOGIN]);
        setcookie(COOKIE_LOGIN, null, -1, "/", COOKIE_DOMAIN);
    }

    function createSession($uid = 0, $rememberme = 0) {
        global $tmDB;

        $time = time();
        $ip = getUserIP();
        $hash = md5($uid . $time . $ip);
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $expiration = $time + 604800;

        $query = 'INSERT INTO `sync_sessions` (`sess_id`, `sess_hash`, `sess_uid`, `sess_ip`, `sess_browser`, `sess_expiration`, `sess_date`, `sess_rememberme`, `sess_lastuse`) VALUES (0, \'' . $tmDB->secureData($hash) . '\', \'' . $tmDB->secureData($uid) . '\', \'' . $tmDB->secureData($ip) . '\', \'' . $tmDB->secureData($browser) . '\', \'' . $tmDB->secureData($expiration) . '\', \'' . $tmDB->secureData($time) . '\', \'' . $tmDB->secureData($rememberme) . '\', \'' . $tmDB->secureData($time) . '\')';

        $tmDB->execute('query', $query);

        setcookie(COOKIE_LOGIN, $hash, $expiration, "/", COOKIE_DOMAIN);
        return true;
    }

    function checkUserLogged() {
        global $tmDB;

        $time = time();

        if (isset($_COOKIE[COOKIE_LOGIN])) {
            $sessQuery = $tmDB->execute('query', 'SELECT * FROM sync_sessions WHERE sess_hash = \'' . $tmDB->secureData($_COOKIE[COOKIE_LOGIN]) . '\' LIMIT 1');
            $sessData = $tmDB->execute('fetch_assoc', $sessQuery);
            if (!empty($sessData)) {
                $this->sessExists = true;

                if ($sessData['sess_loggedout'] == 1) {
                    $this->deleteUserCookie();
                    displayErrorPageAndExit('Esta sesi&oacute;n ya hab&iacute; sido cerrada anteriormente.');
                } else if ($time > $sessData['sess_expiration']) {
                    $this->deleteUserCookie();
                    displayErrorPageAndExit('La sesi&oacute;n ha sido cerrada porque ha expirado.');
                } else if ((int)$sessData['sess_rememberme'] == 0 && $time > $sessData['sess_lastuse'] + 600 || $sessData['sess_browser'] != $_SERVER['HTTP_USER_AGENT'] || $sessData['sess_ip'] != getUserIP()) {
                    $this->deleteUserCookie();
                    //displayErrorPageAndExit('Esta sesi&oacute;n ha dejado de ser v&aacute;lida debido a que no has marcado rememberme.');
                    redirectToUrl( WEB_URL . '/auth/?ref=rmbexp');
                    exit;
                } else {
                    $tmDB->execute('query', 'UPDATE sync_sessions SET sess_lastuse = \'' . (int)$time . '\' WHERE sess_hash = \'' . $tmDB->secureData($_COOKIE[COOKIE_LOGIN]) . '\'');
                    $this->logged = true;
                    $this->uid = $sessData['sess_uid'];
                    $userQuery = $tmDB->execute('query', 'SELECT * FROM sync_usuarios WHERE user_id = \'' . (int)$this->uid . '\' LIMIT 1');
                    $userData = $tmDB->execute('fetch_assoc', $userQuery);
                    if (!empty($userData)) {
                        unset($userData['user_password']);
                        $this->data = $userData;
                        $this->uid = $this->data['user_id'];
                    } else {
                        $this->deleteUserCookie();
                        displayErrorPageAndExit('El usuario no existe.');
                    }
                }
            } else {
                $this->deleteUserCookie();
            }
        }
    }

    function doUserLogin($email = '', $password = '', $rememberme = 0) {
        global $tmDB;

        $email = $_POST['email'];
        $password = $_POST['pass']; //Esto deberia ser un campo integro, pero por ahora lo convertiremos para evitarnos problemas
        $rememberme = (isset($_POST['rememberme']) && $_POST['rememberme'] == 'ok' ? 1 : 0);


        if (empty($email) || empty($password)) {
            return json_encode(array(
                "error" => true,
                "msg" => "Por favor, complete todos los campos solicitados."
            ));
        } else {
            $email = strtolower($email); //Siempre minusculas en los correos
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return json_encode(array(
                    "error" => true,
                    "msg" => "La direcci&oacute;n de correo electr&oacute;nico no es v&aacute;lida."
                ));
            }

            //Robado de: https://gist.github.com/jonathanstark/dfb30bdfb522318fc819
            if (isset($_POST['g-recaptcha-response'])) {
                $post_data = http_build_query(array(
                    'secret' => RECAPTCHA_PRIVATE,
                    'response' => $_POST['g-recaptcha-response'],
                    'remoteip' => getUserIP()
                ));
                $opts = array(
                    'http' => array(
                        'method'  => 'POST',
                        'header'  => 'Content-type: application/x-www-form-urlencoded',
                        'content' => $post_data
                    )
                );
                $context  = stream_context_create($opts);
                $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
                if ($response !== false) {
                    $result = json_decode($response);
                    if (!$result->success)
                        return json_encode(array(
                            "error" => true,
                            "msg" => "No se ha podido validar el captcha. Intente nuevamente."
                        ));
                } else return json_encode(array(
                    "error" => true,
                    "msg" => "No se ha podido conectar con el servidor de Google."
                ));
            }


            $userQuery = $tmDB->execute('query', 'SELECT user_id, user_email, user_password, user_name, user_regdate FROM sync_usuarios WHERE user_email = \'' . $tmDB->secureData($email) . '\' LIMIT 1');
            $userData = $tmDB->execute('fetch_assoc', $userQuery);
            if (!empty($userData)) {
                if ($password != $userData['user_password']) {
                    return json_encode(array(
                        "error" => true,
                        "msg" => "La contrase&ntilde;a no es v&aacute;lida."
                    ));
                }

                if ($this->createSession($userData['user_id'], $rememberme)) {

                    //Seguridad extra
                    $avatarID = md5('avatartm_' . $userData['user_id'] . $userData['user_regdate']);

                    return json_encode(array(
                        "error" => false,
                        "logsuctxt" => '<h1 class="h3 mb-3 fw-normal">¡Bienvenido(a) ' . $userData['user_name'] . '!</h1> <p><img src="' . WEB_URL . '/uploads/profile/' . $avatarID . '.jpg" style="max-width: 100%; width: 180px; height: 180px; border-radius: 6rem; object-fit: cover;" onerror="phdProf(this);"></p><p>Por favor, espere mientras lo redireccionamos al panel...</p>'
                    ));
                } else {
                    return json_encode(array(
                        "error" => true,
                        "msg" => "Error al crear la sesi&oacute;n."
                    ));
                }
            } else {
                return json_encode(array(
                    "error" => true,
                    "msg" => "No se ha encontrado la cuenta. Por favor, verifique sus campos."
                ));
            }
        }
    }

    function getUserVCard($uid = 0, $url = '#!') {
        global $tmDB;
        $userQuery = $tmDB->execute('query', 'SELECT user_id, user_name, user_lastname FROM sync_usuarios WHERE user_id = \'' . (int)$uid . '\' LIMIT 1');
        $userData = $tmDB->execute('fetch_assoc', $userQuery);

        if (empty($userData)) return '<span class="text-danger">El usuario no existe.</span>';

        return '<a href="' . $url . '" data-bs-trigger="hover focus" data-bs-toggle="popover" title="' . $userData['user_name'] . ' ' . $userData['user_lastname'] . '" data-bs-content="Pronto...">' . $userData['user_name'] . ' ' . $userData['user_lastname'] . '</a>';
    }
}
