<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'funciones.php';

//Denegar el acceso directo al archivo
if(!isset($_GET['HTAERRORCODE']) || substr($_SERVER['REQUEST_URI'], 0, 18)== '/paginaDeError.php') {
    header('Location: https://tecnomatico.cl');
    exit;
}

$msg;

switch((int)$_GET['HTAERRORCODE']) {
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
            header('Location: https://tecnomatico.cl');
    exit;
        break;
}

?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Error <?php echo (int)$_GET['HTAERRORCODE']; ?> - Tecnomatico</title>
    
    <?php echo obtenerCodigoAnalytics(); ?>
  </head>
  <body>
    <main class="container my-2">
        <div class="bg-light p-5 rounded text-center">
          <h1>Oh, no!</h1>
          <p class="lead"><?php echo $msg; ?></p>
          <a class="btn btn-lg btn-primary" href="/" role="button">Ir a la p&aacute;gina de inicio</a>
        </div>
      </main>
  </body>
</html>