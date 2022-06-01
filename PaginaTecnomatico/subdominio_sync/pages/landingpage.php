<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Controle cualquier dispositivo de su hogar u oficina desde cualquier parte del mundo." />
    <meta name="robots" content="noindex, nofollow" />

    <title>Tecnomatico Sync</title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo WEB_URL ?>/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo WEB_URL ?>/assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo WEB_URL ?>/assets/img/favicon-16x16.png">
    <link rel="manifest" href="<?php echo WEB_URL ?>/site.webmanifest">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <header class="text-center bg-primary text-white">
        <div class="p-2 animate__animated animate__jackInTheBox">
            <h1 class="display-4 fw-bold">Tecnomatico Sync</h1>
            <p class="lead mb-4">Control en un solo lugar.</p>
            <div>
                <?php
                if ($tmUser->logged) {
                ?>

                    <a href="<?php echo WEB_URL ?>/panel/dashboard/" class="btn btn-light btn-lg">Ir al panel</a>
                <?php } else { ?>

                    <a href="<?php echo WEB_URL ?>/auth/" class="btn btn-light btn-lg">Acceder</a>
                <?php
                }
                ?>
            </div>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>