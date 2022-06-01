<?php
//Pagina de inicio

//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

//Verificamos que el usuario tenga su sesion iniciada
if (!$tmUser->logged) {
    redirectToUrl(WEB_URL . '/auth/?err=need_login');
    exit;
}

if (URLPATHPARTES[1] == 'logout') {
    $tmUser->deleteUserCookie();
    redirectToUrl(WEB_URL . '/auth/?ref=success_logout');
    exit;
}

if (empty(URLPATHPARTES[1])) {
    redirectToUrl(WEB_URL . '/panel/dashboard/');
    exit;
}

require CLASS_DIR . DIRECTORY_SEPARATOR . 'class.panel.php';
$tmPanel = new tmPanel;

//Pequenio hack
if (isset($requestHeaders['x-isupdate']) && !empty($_SESSION['panelalerts'])) {
    echo 'RST';
    exit;
}


$myDevices = $tmPanel->getDevices();

$seccion = empty(URLPATHPARTES[1]) ? 'dashboard' : URLPATHPARTES[1];
$file = PAGES_DIR . DIRECTORY_SEPARATOR . 'panel' . DIRECTORY_SEPARATOR . $seccion . '.php';

//Hacemos esto para poder obtener el contenido en una variable, ademas de poder hacer cosas con los headers como redirecciones ya que si obtuviesemos el archivo directamente en la parte de abajo no podriamos hacer redirecciones con headers o hacer exits
ob_start();
if (file_exists($file))
    require $file;
else require PAGES_DIR . DIRECTORY_SEPARATOR . 'panel' . DIRECTORY_SEPARATOR . 'error404.php';
$pageContent = ob_get_clean();

$datosFooter = array(
    "customjs" => "panel.js"
);

if (!isset($datosHeader)) $datosHeader = array(
    "titulo" => "Panel del usuario",
    "customcss" => "panel.css"
);
require SECTIONS_DIR . DIRECTORY_SEPARATOR . 'header.php';
?>
<nav class="tmp-topnav navbar navbar-expand navbar-dark bg-dark gradient_menu noselect">
    <a class="navbar-brand ps-3 d-flex align-items-center" href="<?php echo WEB_URL; ?>/panel/"><span>TM Sync</span> <span class="badge bg-secondary ms-2">Beta</span></a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?php echo WEB_URL; ?>/panel/future/" target="_blank">Comunicados</a></li>
                <li><a class="dropdown-item" href="<?php echo WEB_URL; ?>/panel/future/" target="_blank">Suscripci&oacute;n y pagos</a></li>
                <li><a class="dropdown-item" href="https://tecnomatico.cl/support/" target="_blank">Soporte</a></li>
                <li><a class="dropdown-item" href="<?php echo WEB_URL; ?>/panel/future/" target="_blank">Configuraci&oacute;n</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="<?php echo WEB_URL; ?>/panel/logout/">Cerrar Sesi&oacute;n</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="tmp-sidenav accordion tmp-sidenav-dark noselect" id="sidenavAccordion" data-ajax="sidenavpanel">
            <div class="tmp-sidenav-menu">
                <div class="nav">
                    <div class="tmp-sidenav-menu-heading">Panel</div>
                    <a class="nav-link<?php if (URLPATHPARTES[1] == 'dashboard') echo ' active'; ?>" href="<?php echo WEB_URL; ?>/panel/dashboard/">
                        <div class="tmp-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Panel de control
                    </a>
                    <?php if ($tmUser->data['user_admin'] == 1) {
                    ?>
                        <a class="nav-link<?php if (URLPATHPARTES[1] != 'admin') echo ' collapsed';
                                            else echo ' active'; ?> text-danger" href="<?php echo WEB_URL; ?>/panel/admin/" data-bs-toggle="collapse" data-bs-target="#collapseAdmin" aria-expanded="false" aria-controls="collapseAdmin">
                            <div class="tmp-nav-link-icon"><i class="fas fa-crown"></i></div>
                            Administrador
                            <div class="tmp-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse<?php if (URLPATHPARTES[1] == 'admin') echo ' show'; ?>" id="collapseAdmin">
                            <nav class="tmp-sidenav-menu-nested nav">
                                <a class="nav-link<?php if (URLPATHPARTES[1] == 'admin' && URLPATHPARTES[2] == '') echo ' active'; ?>" href="<?php echo WEB_URL; ?>/panel/admin/">Resumen</a>
                                <a class="nav-link<?php if (URLPATHPARTES[1] == 'admin' && URLPATHPARTES[2] == 'users') echo ' active'; ?>" href="<?php echo WEB_URL; ?>/panel/admin/users/">Usuarios</a>
                                <a class="nav-link<?php if (URLPATHPARTES[1] == 'admin' && URLPATHPARTES[2] == 'devices') echo ' active'; ?>" href="<?php echo WEB_URL; ?>/panel/admin/devices/">Dispositivos</a>
                                <a class="nav-link" href="<?php echo WEB_URL; ?>/panel/future/">Suscripciones, morosos y pagos</a>
                                <a class="nav-link" href="<?php echo WEB_URL; ?>/panel/admin/support/">Soporte</a>
                                <a class="nav-link" href="<?php echo WEB_URL; ?>/panel/future/">Comunicaciones y envio de mensajes masivos</a>
                                <a class="nav-link<?php if (URLPATHPARTES[1] == 'admin' && URLPATHPARTES[2] == 'logs') echo ' active'; ?>" href="<?php echo WEB_URL; ?>/panel/admin/logs/">Logs del sistema</a>
                            </nav>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="tmp-sidenav-menu-heading">Mis Dispositivos</div>

                    <?php
                    foreach ($myDevices as $key => $val) {
                    ?>
                        <a class="nav-link<?php if (!(URLPATHPARTES[1] == 'devices' && (URLPATHPARTES[2] == $val['device_id'] || ((URLPATHPARTES[2] == 'manage' || URLPATHPARTES[2] == 'users') && URLPATHPARTES[3] == $val['device_id'])))) echo ' collapsed';
                                            else echo ' active'; ?>" href="<?php echo WEB_URL; ?>/panel/devices/manage/<?php echo $val['device_id']; ?>/" data-bs-toggle="collapse" data-bs-target="#collapseDevice<?php echo $val['device_id']; ?>" aria-expanded="false" aria-controls="collapseDevice<?php echo $val['device_id']; ?>">
                            <div class="tmp-nav-link-icon"><i class="fas fa-microchip"></i></div>
                            <?php echo $val['device_name']; ?>
                            <div class="tmp-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse<?php if (URLPATHPARTES[1] == 'devices' && (URLPATHPARTES[2] == $val['device_id'] || ((URLPATHPARTES[2] == 'manage' || URLPATHPARTES[2] == 'users') && URLPATHPARTES[3] == $val['device_id']))) echo ' show'; ?>" id="collapseDevice<?php echo $val['device_id']; ?>">
                            <nav class="tmp-sidenav-menu-nested nav">
                                <a class="nav-link<?php if (URLPATHPARTES[1] == 'devices' && URLPATHPARTES[2] == 'manage' && URLPATHPARTES[3] == $val['device_id']) echo ' active'; ?>" href="<?php echo WEB_URL; ?>/panel/devices/manage/<?php echo $val['device_id']; ?>/">Controlar</a>
                                <a class="nav-link" href="<?php echo WEB_URL; ?>/panel/future/" target="_blank">Historial de actividades</a>
                                <a class="nav-link" href="<?php echo WEB_URL; ?>/panel/future/" target="_blank">Permisos</a>
                                <a class="nav-link" href="<?php echo WEB_URL; ?>/panel/future/" target="_blank">Configuraci&oacute;n</a>
                            </nav>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="tmp-sidenav-footer">
                <div class="small">Sesi&oacute;n iniciada como:</div>
                <?php echo $tmUser->data['user_name'] . ' ' . $tmUser->data['user_lastname']; ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 py-2">
                <?php
                echo $tmPanel->displayAlertRegistered();
                echo $pageContent;
                ?>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Tecnomatico <?php echo date("Y"); ?></div>
                    <div>
                        <a href="https://tecnomatico.cl/support/" target="_blank">Soporte</a> &middot; <a href="https://tecnomatico.cl/terminos-y-condiciones/" target="_blank">T&eacute;rminos y condiciones</a> &middot; <a href="https://tecnomatico.cl/politica-de-privacidad/" target="_blank">Pol&iacute;tica de privacidad</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<?php
require SECTIONS_DIR . DIRECTORY_SEPARATOR . 'footer.php';
