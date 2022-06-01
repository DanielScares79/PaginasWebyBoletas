<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow" />

    <title><?php echo (isset($datosHeader['titulo']) && !empty($datosHeader['titulo']) ? $datosHeader['titulo'] : 'No hay titulo definido'); ?></title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo WEB_URL ?>/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo WEB_URL ?>/assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo WEB_URL ?>/assets/img/favicon-16x16.png">
    <link rel="manifest" href="<?php echo WEB_URL ?>/site.webmanifest">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" integrity="sha512-42kB9yDlYiCEfx2xVwq0q7hT4uf26FUgSIZBK8uiaEnTdShXjwr8Ip1V4xGJMg3mHkUt9nNuTDxunHF0/EgxLQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.0/materia/bootstrap.min.css" />
    <link href="<?php echo WEB_URL ?>/assets/css/style.css" rel="stylesheet">
    <?php if (isset($datosHeader['customcss']) && !empty($datosHeader['customcss'])) { ?>
        <link href="<?php echo WEB_URL ?>/assets/css/<?php echo $datosHeader['customcss']; ?>" rel="stylesheet">
    <?php } ?>


    <?php
    require SECTIONS_DIR . DIRECTORY_SEPARATOR . 'basicheader.php';
    ?>
</head>

<body>