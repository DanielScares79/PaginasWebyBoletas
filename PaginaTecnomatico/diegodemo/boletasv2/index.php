<?php
//Permitir acceso a archivos
define('ENABLE_TM', true);

require 'header.php';

if($userLogeado == true) {
    if(isset($_GET['action'])) {
        switch($_GET['action']) {
            case "logout":
                unset($_SESSION['acceso']);
header('Location: ' . TM_URL);
exit;
                break;
            case "verBoletas":
            case "verUsuarios":
                //Usaremos el mismo sistema de TM SYNC!
                //Requeriremos el contenido pero lo guardaremos en una variable y no lo mostraremos
                ob_start();
                require __DIR__ .  DIRECTORY_SEPARATOR . 'acciones' . DIRECTORY_SEPARATOR . $_GET['action'] . '.php';
                $pageContent = ob_get_clean();
                break;
            default:
                exit('ACCION INVALIDA.');
                break;
        }
    } else {
        $_GET['action'] = 'cpanel'; //hack
                ob_start();
                require __DIR__ .  DIRECTORY_SEPARATOR . 'acciones' . DIRECTORY_SEPARATOR .'cpanel.php';
                $pageContent = ob_get_clean();
        
    }
} else {
    $_GET['action'] = 'login'; //hack
    ob_start();
    require __DIR__ .  DIRECTORY_SEPARATOR . 'acciones' . DIRECTORY_SEPARATOR .'login.php';
    $pageContent = ob_get_clean();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="<?php echo TM_URL; ?>/assets/style.css" rel="stylesheet"/>
    <?php if(isset( $_GET['action'])) { ?>
    <link href="<?php echo TM_URL; ?>/assets/<?php echo $_GET['action']; ?>.css"  rel="stylesheet"/>
    <?php } ?>
    
    <title>Tecnomatico Boletas</title>
  </head>
  <body>
      <?php
      
      if($_GET['action'] != 'login') {
          echo '<div class="container my-2">';
      }
      
      //Mostraremos el error y luego eliminaremos la variable para que no se repita
      //En la pagina de login lo manejamos de otra manera!
      if(isset($_SESSION['tmError']) && $_GET['action'] != 'login') {
          echo '<div class="alert alert-danger">' . $_SESSION['tmError'] . '</div>';
          unset($_SESSION['tmError']);
      }
      
      echo $pageContent; 
      
      if($_GET['action'] != 'login') {
          echo '</div>';
      }
      
      
      ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    
    <script src="<?php echo TM_URL; ?>/assets/script.js"></script>
    <?php if(isset( $_GET['action'])) { ?>
    <script src="<?php echo TM_URL; ?>/assets/<?php echo $_GET['action']; ?>.js"></script>
    <?php } ?>  
  
  </body>
</html>
<?php
require 'footer.php';