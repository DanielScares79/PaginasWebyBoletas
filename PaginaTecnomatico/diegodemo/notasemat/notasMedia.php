<?php if (!defined("TECNOMATICO")) exit;

//Esto va a ser para obtener el numero de lista del usuario
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://reportes.e-mat.cl/Psututorpasswordlista/planillaalumnos");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'Colegio='.$rbd.'&Ruttutor=&Lista=' . urlencode($cursoObtain) . '&admin=&rut=');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$usuariosTable = curl_exec($ch); //GUARDAMOS VALOR
$usuariosTable = str_replace('<!--<script src="TableTools-2.2.1/js/dataTables.tableTools.js"></script> --!>', '', $usuariosTable);
curl_close($ch);
unset($ch);

//Creamos un nuevo dom con la libreria
$htmlUsers = new simple_html_dom();

//Cargamos en el dom la tabla de usuarios obtenida por CURL
$htmlUsers->load($usuariosTable);

//Obtenemos el numero de lista verificando cada fila
foreach ($htmlUsers->find("tr") as $k) {
    if (!isset($numeroLista)) { //evitamos seguir cargando
        if (trim(strtolower($rutUserComplet)) == trim(strtolower(@$k->find("td", 2)->plaintext))) {
            echo '<h1>Hola ' . $k->find("td", 1)->plaintext . '!</h1>';
            $numeroLista = $k->find("td", 0)->plaintext;
        }
    }
}

//Eliminamos variables
unset($htmlUsers, $k, $usuariosTable);


if (!isset($numeroLista)) { //Si no esta definido el numero de lista
    echo '<div class="alert alert-danger">Ha ocurrido un error: <b>No se pudo encontrar su cuenta en el sistema.</b></div>';
} else { //Si esta definido, proseguimos
    //Guardamos la autentificacion
    $archivoAuth = __DIR__ . '/historial_login.log';
    $datosAuth = file_get_contents($archivoAuth);
    $nuevoDatos = $datosAuth . "\n" . 'Se ha logeado el usuario de media ' . $rutUserComplet . ' el dia ' . date('l jS \of F Y h:i:s A') . '.';
    file_put_contents($archivoAuth, $nuevoDatos);

    //Ahora obtenemos la plantilla de notas
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://reportes.e-mat.cl/Psututornotaslista/planillanotas");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'Colegio='.$rbd.'&Ruttutor=&Lista=' . urlencode($cursoObtain) . '&admin=1&rut=');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $tablaNotasCurl = curl_exec($ch); //GUARDAMOS VALOR
    curl_close($ch);
    unset($ch);

    //Creamos un nuevo dom con la libreria
    $tablaNotas = new simple_html_dom();

    //Para ir categorizando
    $notas = array();

    //Cargamos datos
    $tablaNotas->load($tablaNotasCurl);

    foreach($tablaNotas->find('a') as $k) {
        $k->outertext = $k->plaintext;
    }
    unset($k);

    //pest 1
    foreach ($tablaNotas->find('.pest1', 0)->find('table', 0)->find('tr') as $k) {
        $obtenemos = $k->find("td", 0)->plaintext;
        if (is_numeric($obtenemos) && intval($obtenemos) == intval($numeroLista)) {
            $notas[0] = $k;
        }
    }
    unset($k, $obtenemos); //nunca se sabe
    
    //pest 2
    foreach ($tablaNotas->find('.pest2', 0)->find('table', 0)->find('tr') as $k) {
        $obtenemos = $k->find("td", 0)->plaintext;
        if (is_numeric($obtenemos) && intval($obtenemos) == intval($numeroLista)) {
            $notas[1] = $k;
        }
    }
    unset($k, $obtenemos); //nunca se sabe
    
    //pest 3 ponderado 1
    foreach ($tablaNotas->find('.pest3', 0)->find('table', 0)->find('.tr_pond1') as $k) {
        $obtenemos = $k->find("td", 0)->plaintext;
        if (is_numeric($obtenemos) && intval($obtenemos) == intval($numeroLista)) {
            $k->style = null;
            $notas[2] = $k;
        }
    }
    unset($k, $obtenemos); //nunca se sabe
    
    //pest 3 ponderado 2
    foreach ($tablaNotas->find('.pest3', 0)->find('table', 0)->find('.tr_pond2') as $k) {
        $obtenemos = $k->find("td", 0)->plaintext;
        if (is_numeric($obtenemos) && intval($obtenemos) == intval($numeroLista)) {
            $k->style = null;
            $notas[3] = $k;
        }
    }
    unset($k, $obtenemos); //nunca se sabe
    
    //pest 3 ponderado 3
    foreach ($tablaNotas->find('.pest3', 0)->find('table', 0)->find('.tr_pond3') as $k) {
        $obtenemos = $k->find("td", 0)->plaintext;
        if (is_numeric($obtenemos) && intval($obtenemos) == intval($numeroLista)) {
            $k->style = null;
            $notas[4] = $k;
        }
    }
    unset($k, $obtenemos); //nunca se sabe
    
    
    ?>
    <!-- TABLA-->
    <nav>
        <div class="nav nav-tabs d-flex justify-content-md-center" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-a" role="tab">Avance Mensual</a>
            <a class="nav-item nav-link" data-toggle="tab" href="#nav-b" role="tab">Logro Mensual</a>
            <a class="nav-item nav-link" data-toggle="tab" href="#nav-c" role="tab">Nota Propuesta</a>
        </div>
    </nav>
    <div class="tab-content mt-2" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-a" role="tabpanel">
       <div class="alert alert-info">Las notas de Avance mensual se obtiene sumando todas las actividades realizadas por el alumno durante el mes. 
        Si tu nota es de 1 a 3 tendrás un 3, si tu nota es un 4 tendrás un 4 y as&iacute; sucesivamente hasta llegar al 7.</div>
            <div class="table-responsive-md d-flex justify-content-md-center">
                <table class="table table-bordered">
                    <tbody>
                        <?php echo $tablaNotas->find('.pest1', 0)->find('table', 0)->find('tr', 0);
                            echo $notas[0];
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-b" role="tabpanel">
                <div class="alert alert-info">Las notas de Logro mensual se obtiene promediando la nota de las actividades A3, B3, C3, A4, A6, A7, B5, Z1, Z2 y 
        minitest aprobados realizados por el alumno durante el mes. Vea esta <a onclick="lightBox($(this));return false;" href="#!" src="tablamat1.jpg">tabla</a> para m&aacute;s informaci&oacute;n.
    </div>
            <div class="table-responsive-md d-flex justify-content-md-center">
                <table class="table table-bordered">
                    <tbody>
                        <?php echo $tablaNotas->find('.pest2', 0)->find('table', 0)->find('tr', 0);
                            echo $notas[1];
                            ?>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="tab-pane fade" id="nav-c" role="tabpanel">
            
            <div class="alert alert-info">E-Mat te propone una nota mensual considerando, cada mes, la cantidad de actividades realizadas y los resultados
obtenidos en las actividades de evaluación.</div>
            
            <h2>40% AVANCE, 60% LOGRO</h2>
            <div class="table-responsive-md d-flex justify-content-md-center">
                <table class="table table-bordered">
                    <tbody>
                        <?php echo $tablaNotas->find('.pest3', 0)->find('table', 0)->find('tr', 0);
                            $promCur = $tablaNotas->find('.pest3', 0)->find('table', 0)->find('.tr_pond1', 0);
                            $promCur->style = null;
                            echo $promCur;
                            unset($promCur);
                            echo $notas[2];
                            ?>
                    </tbody>
                </table>
            </div>
            <h2>30% AVANCE, 70% LOGRO</h2>
            <div class="table-responsive-md d-flex justify-content-md-center">
                <table class="table table-bordered">
                    <tbody>
                        <?php echo $tablaNotas->find('.pest3', 0)->find('table', 0)->find('tr', 0);
                            $promCur = $tablaNotas->find('.pest3', 0)->find('table', 0)->find('.tr_pond2', 0);
                            $promCur->style = null;
                            echo $promCur;
                            unset($promCur);
                            echo $notas[3];
                            ?>
                    </tbody>
                </table>
            </div>
            <h2>20% AVANCE, 80% LOGRO</h2>
            <div class="table-responsive-md d-flex justify-content-md-center">
                <table class="table table-bordered">
                    <tbody>
                        <?php echo $tablaNotas->find('.pest3', 0)->find('table', 0)->find('tr', 0);
                            $promCur = $tablaNotas->find('.pest3', 0)->find('table', 0)->find('.tr_pond3', 0);
                            $promCur->style = null;
                            echo $promCur;
                            unset($promCur);
                            echo $notas[4];
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>

<a href="index.php" class="btn btn-primary">Volver al inicio</a>