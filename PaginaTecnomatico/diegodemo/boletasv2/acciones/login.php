<?php
if(!defined('ENABLE_TM')) exit('ACCESO PROHIBIDO.');

if(isset($_POST['tmuser']) && isset($_POST['tmpass'])) {
$aid= $_POST['tmuser'];
$aid1= $_POST['tmpass'];
$sql = 'SELECT usuario, contrasena FROM users WHERE usuario = \''.protegerConsulta($aid).'\' and contrasena = \''.protegerConsulta($aid1).'\' LIMIT 1';
if ($result = $mysqli->query($sql)) {

    if($result->num_rows > 0) {
        $_SESSION['acceso'] = true;
    } else {
        $_SESSION['tmError'] = "No se pudo encontrar su cuenta.";
    }

    $result->close();
}

header('Location: ' . TM_URL);
exit;

}

?>
<main class="form-signin text-center">
<?php
      if(isset($_SESSION['tmError'])) {
          echo '<div class="alert alert-danger">' . $_SESSION['tmError'] . '</div>';
          unset($_SESSION['tmError']);
      }
?>
  <form method="POST">
    <h1 class="h3 mb-3 fw-normal">Tecnomatico Boletas</h1>
    <p>Por favor, acceda con sus credenciales.</p>

    <div class="form-floating">
      <input type="text" class="form-control" id="tmuser" name="tmuser" placeholder="Ejemplo123">
      <label for="tmuser">Nombre de usuario</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="tmpass" name="tmpass" placeholder="Contrasena123">
      <label for="tmpass">Contrase&ntilde;a</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Acceder</button>
    <p class="mt-5 mb-3 text-muted">© Tecnomatico 2021</p>
  </form>
</main>