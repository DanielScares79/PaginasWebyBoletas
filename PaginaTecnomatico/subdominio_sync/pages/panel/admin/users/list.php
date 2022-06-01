<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

$list = $tmAdmin->usersList(array("selectors" => "user_id, user_name, user_lastname, user_email, user_telephone, user_rut, user_addedbyuid, user_admin, user_regdate"));

?>
<div class="card p-5 text-white gradient_user rounded-3 text-center mb-5">
    <h1>Usuarios de Tecnomatico Sync</h1>
    <p>Mr. Robot is happy!</p>
    <p><a href="<?php echo WEB_URL; ?>/panel/admin/users/add/" class="btn btn-light">Agregar nuevo usuario</a></p>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Correo Electr&oacute;nico</th>
                <th scope="col">Tel&eacute;fono</th>
                <th scope="col">RUT</th>
                <th scope="col">A&ntilde;adido Por</th>
                <th scope="col">Es Administrador?</th>
                <th scope="col">Fecha de registro</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody data-ajax="tablelist">
            <?php
            foreach ($list as $key => $val) {
            ?>
                <tr>
                    <th scope="row"><?php echo $val['user_id']; ?></th>
                    <td><?php echo $val['user_name']; ?></td>
                    <td><?php echo $val['user_lastname']; ?></td>
                    <td><?php echo $val['user_email']; ?></td>
                    <td><?php echo $val['user_telephone']; ?></td>
                    <td><?php echo $val['user_rut']; ?></td>
                    <td><?php echo $tmUser->getUserVCard($val['user_addedbyuid'], WEB_URL . '/panel/admin/users/manage/' . $val['user_addedbyuid'] . '/'); ?></td>
                    <td><?php echo $tmAdmin->YesOrNo($val['user_admin']); ?></td>
                    <td><?php echo time_passed($val['user_regdate']); ?></td>
                    <td><a href="<?php echo WEB_URL; ?>/panel/admin/users/manage/<?php echo $val['user_id']; ?>/">Gestionar</a> <a href="<?php echo WEB_URL; ?>/panel/admin/users/delete/<?php echo $val['user_id']; ?>/">Eliminar</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>