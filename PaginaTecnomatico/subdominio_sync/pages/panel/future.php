<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

if(!empty(URLPATHPARTES[2])) {
    redirectToUrl(WEB_URL . '/panel/dashboard/');
    exit;
}
?>
<div class="card p-2">
    <div class="card-body text-center">
        <h1>Oh, te has adelantado un poco.</h1>
        <p class="lead">Esta funci&oacute;n estar&aacute; disponible en el futuro.</p>
        <p><a href="<?php echo WEB_URL; ?>/panel/dashboard/" class="btn btn-primary btn-sm">Volver al inicio</a></p>
    </div>
</div>