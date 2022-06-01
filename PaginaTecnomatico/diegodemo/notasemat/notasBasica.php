<?php if(!defined("TECNOMATICO")) exit;

//Esto va a ser para obtener el numero de lista del usuario
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://reportes.e-mat.cl/Mintutorpasswordlista/planillaalumnos");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'Colegio='.$rbd.'&Ruttutor='.$rut_tutor.'&Lista='.urlencode($cursoObtain).'&admin=1&rut=');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$usuariosTable = curl_exec($ch); //GUARDAMOS VALOR
$usuariosTable = str_replace('<!--<script src="TableTools-2.2.1/js/dataTables.tableTools.js"></script> --!>', '', $usuariosTable);
curl_close ($ch);
unset($ch);

//Creamos un nuevo dom con la libreria
$htmlUsers = new simple_html_dom();

//Cargamos en el dom la tabla de usuarios obtenida por CURL
$htmlUsers->load($usuariosTable);

//Obtenemos el numero de lista verificando cada fila
foreach($htmlUsers->find("tr") as $k) {
    if(!isset($numeroLista)) { //evitamos seguir cargando
      if(trim(strtolower($rutUserComplet)) == trim(strtolower(@$k->find("td", 2)->plaintext))) {
          echo '<h1>Hola '.$k->find("td", 1)->plaintext.'!</h1>';
          $numeroLista = $k->find("td", 0)->plaintext;
      }
    }
}

//Eliminamos variables
unset($htmlUsers, $k, $usuariosTable);


if(!isset($numeroLista)) { //Si no esta definido el numero de lista
    echo '<div class="alert alert-danger">Ha ocurrido un error: <b>No se pudo encontrar su cuenta en el sistema.</b></div>';
} else { //Si esta definido, proseguimos
    
//Guardamos la autentificacion
$archivoAuth = __DIR__.'/historial_login.log';
$datosAuth = file_get_contents($archivoAuth);
$nuevoDatos = $datosAuth . "\n" . 'Se ha logeado el usuario de basica '.$rutUserComplet.' el dia '.date('l jS \of F Y h:i:s A').'.'; 
file_put_contents($archivoAuth, $nuevoDatos);
    
//Calculamos la nota del mes
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,'http://reportes.e-mat.cl/Mintutorpopup/editarmes/Colegio/'.$rbd.'/lista/'.urlencode($cursoObtain).'/mes/'.date("n"));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//$notaMes = curl_exec($ch); //GUARDAMOS VALOR
curl_close ($ch);
unset($ch);

//Ahora obtenemos la plantilla de notas
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://reportes.e-mat.cl/Mintutornotaslista/planillanotas");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'Colegio='.$rbd.'&Ruttutor='.$rut_tutor.'&Lista='.urlencode($cursoObtain).'&admin=1&rut=&dif=0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$tablaNotasCurl = curl_exec($ch); //GUARDAMOS VALOR
curl_close ($ch);
unset($ch);

//Creamos un nuevo dom con la libreria
$tablaNotas = new simple_html_dom();

//Cargamos datos
$tablaNotas->load($tablaNotasCurl);

//Suprimimos botones raros jaja
foreach($tablaNotas->find('.btn_unic') as $k) {
    $k->outertext = "";
}
unset($k);

//Mostramos contenido
echo '<div class="table-responsive-md d-flex justify-content-md-center">
<table class="table table-bordered">';
echo '<tbody>';

//Las de arriba, nombre de los meses y promedio de curso
echo $tablaNotas->find('div[id=tabla_notas]', 0)->find('table', 0)->find('tr', 0);
echo $tablaNotas->find('div[id=tabla_notas]', 0)->find('table', 0)->find('tr', 1);

//Buscamos con el numero de lista correspondiente al usuario
foreach($tablaNotas->find('div[id=tabla_notas]', 0)->find('table', 0)->find('tr') as $k) {
    $obtenemos = $k->find("td", 0)->plaintext;
    if(is_numeric($obtenemos) && intval($obtenemos) == intval($numeroLista)) {
         echo $k;
    }
}
unset($k, $obtenemos); //nunca se sabe
echo '</tbody>';
echo '</table>
</div>
<p class="lead text-left">Recuerda que:</p>
<ul class="text-left">
<li>El s&iacute;mbolo "<b>-</b>" significa que tu nota corresponde a un <b>1.0</b>.</li>
<li>La nota se calcula autom&aacute;ticamente por el sistema CompuMat al re-cargar esta p&aacute;gina.</li>
<li>El sistema actua en tiempo real correspondiente al avance que realices en el sistema.</li>
</ul>';
}
?>
<a href="index.php" class="btn btn-primary">Volver al inicio</a>