<?php
//Basicamente maneja los formularios antiguos de contacto
//Por suerte reutilice el codigo JS en todos asi que fue facil implementarlo

if(isset($_POST) && !empty($_POST)) {
echo '<div class="alert alert-danger"><h1>OOPS! No podemos recibir su mensaje debido a que es una demo! Por favor, vaya a https://tecnomatico.cl y envienos un mensaje por ese medio.</h1></div>';
} else {
    http_response_code(404);
}
?>
