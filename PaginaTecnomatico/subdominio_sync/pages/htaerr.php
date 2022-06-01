<?php

//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

$msg;

switch ((int)$_GET['HTAERRORCODE']) {
    case 401:
        $msg = 'No tiene permisos para ver esto.';
        break;
    case 404:
        $msg = 'El recurso solicitado no existe.';
        break;
    case 403:
        $msg = 'No puede ver el contenido de esto.';
        break;
    default:
        $msg = 'Error desconocido!';
        break;
}

?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow" />

    <title>Tecnomatico Sync</title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo WEB_URL ?>/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo WEB_URL ?>/assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo WEB_URL ?>/assets/img/favicon-16x16.png">
    <link rel="manifest" href="<?php echo WEB_URL ?>/site.webmanifest">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.0/materia/bootstrap.min.css" />
    <style>
        html,
        body,
        header {
            height: 100%;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <?php
    //SIEMPRE DEJAR ANTES DEL </HEAD>
    require SECTIONS_DIR . DIRECTORY_SEPARATOR . 'basicheader.php';
    ?>
</head>

<body>
    <header class="text-center bg-danger text-white">
        <div class="p-2">
            <h1 class="display-4 fw-bold">Lo sentimos, pero ha ocurrido un error.</h1>
            <p class="lead mb-4"><?php echo $msg; ?></p>
            <div>
                <a href="<?php echo WEB_URL ?>/" class="btn btn-primary btn-lg">Volver al inicio</a> 
                <a href="https://tecnomatico.cl/support/?helpwith=httperrcode" class="btn btn-warning btn-lg">Obtener Ayuda</a> 
            </div>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>