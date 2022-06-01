<?php
if (!defined('ENABLE_TM')) exit('ACCESO PROHIBIDO.');

if ($resultado = $mysqli->query("SELECT * FROM users")) {

    if ($consulta->errno) die($consulta->error);
?>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-0">Lista de usuarios</h6>
        <?php
        while ($fila = $resultado->fetch_assoc()) {
        ?>
            <div class="d-flex text-muted py-3 border-bottom">
                <div class="me-2 rounded bg-primary text-white d-flex px-4 py-0 align-items-center"><i class="fa fa-user"></i></div>

                <div class="small lh-sm  w-100">
                    <div class="d-flex justify-content-between">
          <strong class="text-gray-dark"><?php echo $fila['usuario']; ?></strong>
          <div><a href="#">Actualizar</a> · <a href="#" class="text-danger">Eliminar</a></div>
        </div>
                    <ul>
                    <li>ID: <?php echo $fila['id']; ?>.</li>
                    <li>Contrase&ntilde;a: <?php echo $fila['contrasena']; ?></li>
                    <li>&Uacute;ltimo acceso: Desconocido.</li>
                    <li>Registrado: Desconocido.</li>
                    </ul>
                </div>
            </div>

        <?php
        }
        ?>
        <small class="d-block text-end mt-3">
            <a href="#">Agregar nuevo usuario</a>
        </small>
    </div>
<?php
}
