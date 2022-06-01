<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;
?>
<div class="card p-2">
    <div class="card-body text-center">
        <h1>Ha ocurrido un error</h1>
        <p class="lead">La secci&oacute;n solicitada no existe.</p>
        <p><a href="<?php echo WEB_URL; ?>/panel/dashboard/" class="btn btn-primary btn-sm">Volver al inicio</a></p>
    </div>
</div>