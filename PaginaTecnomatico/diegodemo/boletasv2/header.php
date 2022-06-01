<?php
if(!defined('ENABLE_TM')) exit('ACCESO PROHIBIDO.');

//URL DE LA PLATAFORMA SIN EL ULTIMO /
define('TM_URL', 'https://tecnomatico.cl/diegodemo/boletasv2');

session_name("TMBOLETAS");
session_start();
$userLogeado = isset($_SESSION['acceso']) ? true : false;

$mysqli = new mysqli('localhost', 'tecnomat_daniel', '98421912dante', 'tecnomat_datos');

// Error al conectar
if ($mysqli->connect_errno) {
  
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    echo isset($aid) ? $aid : '';
  
    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
    // Podría ser conveniente mostrar algo interesante, aunque nosotros simplemente saldremos
    exit;
}

if (!$mysqli->set_charset("utf8")) {
    printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
    exit();
}

//Basicamente convierte caracteres como " o ' a \" o \' para que la consulta no falle o se puedan ejecutar diferentes cosas no deseadas
function protegerConsulta($data = null) {
    global $mysqli;
        return  $mysqli->real_escape_string(function_exists('magic_quotes_gpc') ? stripslashes($data) : $data);
    }
