<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

$phpLogFileName = LOGS_DIR . DIRECTORY_SEPARATOR . 'php.log';
$sqlLogFileName = LOGS_DIR . DIRECTORY_SEPARATOR . 'db.log';

$phpCont = "";
$sqlCont = "";

if (file_exists($phpLogFileName)) {
    $contenido = @file_get_contents($phpLogFileName);
    if ($contenido !== false) {
        $phpCont = $contenido;
    }
}
if (file_exists($sqlLogFileName)) {
    $contenido = @file_get_contents($sqlLogFileName);
    if ($contenido !== false) {
        $sqlCont = $contenido;
    }
}

$phpCont = xss_protect_string($phpCont);
$sqlCont = xss_protect_string($sqlCont);
?>
<div class="card p-5 text-white gradient_other rounded-3 text-center mb-2">
    <h1>Logs del sistema</h1>
    <p>Todos los fallos de este bonito sistema en un solo lugar :D</p>
</div>
<?php
if (!empty($phpCont)) {
?>
    <div class="card rounded-3 text-center mb-2">
        <div class="card-body">
            <h2>Errores generados en PHP</h2>
            <div>
                <textarea class="form-control log" readonly><?php echo $phpCont; ?></textarea>
            </div>
        </div>
    </div>
<?php
}
?>
<?php
if (!empty($sqlCont)) {
?>
    <div class="card rounded-3 text-center mb-2">
        <div class="card-body">
            <h2>Errores generados con consultas de la base de datos</h2>
            <div>
                <textarea class="form-control log" readonly><?php echo $sqlCont; ?></textarea>
            </div>
        </div>
    </div>
<?php
}
?>