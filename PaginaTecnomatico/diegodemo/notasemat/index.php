<?php
define("TECNOMATICO", true); //accesar a otros archivos
date_default_timezone_set('America/Santiago'); //para fechas de autentificacion

$rbd = "9347"; //12/12/2020: Se agrego variable RBD y se cambio en los archivos que la requiran.
$rut_tutor = "13675254-5";  //12/12/2020: Se agrego variable rut_tutor y se cambio en los archivos que la requiran. (Por lo visto solo estaba puesto en notasbasica)

//Array de cursos para el select
$cursos = array();
$cursos["basica"] = array(
    "2 BASICO-A",
    "2 BASICO-B",
    "3 BASICO-A",
    "3 BASICO-B",
    "4 BASICO-A",
    "4 BASICO-B",
    "5 BASICO-A",
    "5 BASICO-B",
    "6 BASICO-A",
    "6 BASICO-B",
    "7 BASICO-A",
    "7 BASICO-B",
    "8 BASICO-A",
    "8 BASICO-B",
);
$cursos["media"] = array(
    "I MEDIO-A",
    "I MEDIO-B",
    "I MEDIO-C",
    "I MEDIO-D",
    "I MEDIO-E",
    "II MEDIO-A",
    "II MEDIO-B",
    "II MEDIO-C",
    "II MEDIO-D",
    "II MEDIO-E",
);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="robots" content="noindex, nofollow, nocache" />
    <title>Notas E-MAT - Tecnomatico</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" integrity="sha512-42kB9yDlYiCEfx2xVwq0q7hT4uf26FUgSIZBK8uiaEnTdShXjwr8Ip1V4xGJMg3mHkUt9nNuTDxunHF0/EgxLQ==" crossorigin="anonymous" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js" integrity="sha512-iceXjjbmB2rwoX93Ka6HAHP+B76IY1z0o3h+N1PeDtRSsyeetU3/0QKJqGyPJcX63zysNehggFwMC/bi7dvMig==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js" integrity="sha512-bUg5gaqBVaXIJNuebamJ6uex//mjxPk8kljQTdM1SwkNrQD7pjS+PerntUSD+QRWPNJ0tq54/x4zRV8bLrLhZg==" crossorigin="anonymous"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->

    <!-- Comentado 12/12/2020 -->
    <!--
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-148029659-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-148029659-1');
    </script>
    -->
</head>

<body>
    <?php
    //el @ suprime mensajes de error
    //verificamos que todo este OK
    if (
        isset($_POST['rutUser']) && isset($_POST['digVeri']) && isset($_POST['edutype']) && isset($_POST['curso'])
        && is_numeric($_POST['edutype']) && is_numeric($_POST['rutUser']) && (is_numeric($_POST['digVeri']) && strtolower($_POST['digVeri']) != "k")
        && strlen($_POST['digVeri']) == 1 && strlen($_POST['rutUser']) == 8
    ) {
        $rutUser = intval($_POST['rutUser']); //RUT sin digito verificador, puntos, etc
        $digVeri = strtolower(htmlspecialchars($_POST['digVeri'])); //Obtenemos el digito verificador
        $rutUserComplet = trim($rutUser . '-' . $digVeri); //Rut completo (sin puntos, solo con guion)
        $eduType = (isset($_POST['edutype']) && $_POST['edutype'] == "2") ? 2 : 1; //basica = 2, media = 1
        $cursoNoArray = htmlspecialchars($_POST['curso']); //Obtenemos el curso (aqui hay que ver el select)
        $cursoArray = explode("_", $cursoNoArray, 2); //Desglosamos la string
        $cursoType = (isset($cursoArray[0]) && $cursoArray[0] == "med" && $eduType == "1") ? "media" : "basica"; //Vemos el tipo (Ocupar $eduType pls, esto es solo para el array de mas abajo)
        $cursoKey = isset($cursoArray[1]) ? $cursoArray[1] : 0; //Obtenemos la key del array
        $cursoObtain = isset($cursos[$cursoType][$cursoKey]) ? $cursos[$cursoType][$cursoKey] : 0; //Ahora seleccionamos del array

        //Verificamos que el curso exista en el array, de lo contrario, la personita puede andar haciendo bombachas jaja
        if (empty($cursoNoArray) || empty($cursoArray) || !isset($cursoArray[0]) || !isset($cursoArray[1]) || !isset($cursos[$cursoType][$cursoKey]) || isset($cursoArray[2])) {
            echo '<div class="alert alert-danger">Ha ocurrido un error: <b>El curso no es v&aacute;lido.</b></alert>';
        } else {

            //Aqui manejamos las notas

            //Cargamos clase
            require __DIR__ . '/simple_html_dom.php';

            //Que me estas container
            echo '<div class="container mt-2 text-center" id="showNotas">';

            //Vemos el nivel de educacion y requerimos el archivo
            if ($eduType == 1) {
                require __DIR__ . '/notasMedia.php';
            } else {
                require __DIR__ . '/notasBasica.php';
            }

            //Copyright (c) Tecnomatico :) y cerramos container
            echo '<footer class="mt-2"><p><a href="/" target="_blank">TECNOMATICO</a></p></footer></div>';
        }
    } else { //cargamos login page por defecto
        require __DIR__ . '/loginPage.php';
    }
    ?>
    <div class="modal fade" id="modalLightbox" tabindex="-1" role="dialog" aria-labelledby="modalLightboxLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLightboxLabel">Imagen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                </div>
            </div>
        </div>
    </div>
    <?php
    //Comentario y mejora anadido 12/12/2020
    //Sistema mejorado
    $ajaxData = "holi=true"; //jeje
    $ajaxData .= (isset($rutUser) ? "&rutUser=" . urlencode($rutUser) : "");
    $ajaxData .=  (isset($digVeri) ? "&digVeri=" . urlencode($digVeri) : "");
    $ajaxData .=  (isset($eduType) ? "&edutype=" . urlencode($eduType) : "");
    $ajaxData .=  (isset($cursoNoArray) ? "&curso=" . urlencode($cursoNoArray) : "");
    ?>
    <script>
        //Comentario anadido 12/12/2020
        //Para mostrar la imagen en una modal
        function lightBox(el) {
            $('#modalLightbox .modal-body').html('<img src="' + el.attr('src') + '" class="img-fluid" />');
            $('#modalLightbox').modal();
        }

        //Comentario anadido 12/12/2020 (modificado tambien)
        //Esta funcion sirve para mantener la nota en tiempo real, en el caso que el estudiante estuviera trabajando y viendo su nota al mismo tiempo
        function updateNotas() {
            NProgress.start();
            $.ajax({
                method: "POST",
                data: "<?php echo $ajaxData; ?>",
                success: function(h) {
                    $('#showNotas').html($(h).filter('#showNotas').html());
                },
                error: function() {
                    alert('Hemos intentado actualizar esta pagina automaticamente pero ha ocurrido un error.');
                },
                complete: function() {
                    console.log('Notas Actualizadas!');
                    NProgress.done();
                    setTimeout(function() {
                        updateNotas();
                    }, 60000);
                }
            });
        }
        $(function() {
            if ($('#showNotas').length) {
                setTimeout(function() {
                    updateNotas();
                }, 60000); //Ya cargamos todo antes, no lo volvemos a cargar
            }
        });
    </script>
</body>

</html>