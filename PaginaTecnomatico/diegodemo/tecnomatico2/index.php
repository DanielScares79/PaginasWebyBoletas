<?php
//BASADO EN EL TEMA DE WORDPRESS QUE HICE HACE MUCHO TIEMPO!

$isLanding = false;
$isHomePage = true;

if (isset($_GET['what'])) {
    $isHomePage = false;
    switch ($_GET['what']) {
        case "productos":
        case "servicios":
            $isLanding = true;
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="robots" content="noindex, nofollow" />
    <title>Tecnomatico Beta</title>


    <link rel='stylesheet' id='fontawesome-css' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css?ver=5.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-css-css' href='https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/materia/bootstrap.min.css?ver=5.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='nprogress-css-css' href='https://cdn.jsdelivr.net/npm/nprogress@0.2.0/nprogress.css?ver=5.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='theme-css-css' href='https://tecnomatico.cl/diegodemo/tecnomatico2/tema/style.css?ver=5.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='animatecss-css' href='https://cdn.jsdelivr.net/npm/animate.css@3.7.2/animate.min.css?ver=5.3.2' type='text/css' media='all' />
    <?php if($isHomePage) { ?>
    <link rel='stylesheet' id='theme-landing-css' href='https://tecnomatico.cl/diegodemo/tecnomatico2/tema/landing/style.css?ver=5.3.2' type='text/css' media='all' />
    <?php } ?>
</head>

<body class="<?php echo ($isHomePage ? 'is-load' : ''); ?>">
    <div class="cont-menu fixed-top<?php echo (!$isLanding && !$isHomePage ? ' is-page' : ''); ?>">
        <div id="border">
            <div class="container py-1 text-white" style="font-size: 1.3em">

                <div class="d-flex justify-content-between">
                    <div>
                        <span class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Plataformas</a>
                            <div class="dropdown-menu text-center">
                                <h6 class="dropdown-header">Acceso R&aacute;pido</h6>
                                <a class="dropdown-item" href="https://schoolnews.tecnomatico.cl">SchoolNews</a>
                                <a class="dropdown-item" href="https://tecnomatico.cl/panel/">TecnoProductos</a>
                            </div>
                        </span>

                    </div>

                    <div style="font-size: 6px;">
                        <span class="fa-stack fa-2x">
                            <i class="far fa-circle fa-stack-2x"></i>
                            <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                        </span>

                        <span class="fa-stack fa-2x">
                            <i class="far fa-circle fa-stack-2x"></i>
                            <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                        </span>

                        <span class="fa-stack fa-2x">
                            <i class="far fa-circle fa-stack-2x"></i>
                            <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
                        </span>

                        <span class="fa-stack fa-2x">
                            <i class="far fa-circle fa-stack-2x"></i>
                            <i class="fas fa-phone-alt fa-stack-1x fa-inverse"></i>
                        </span>

                        <span class="fa-stack fa-2x">
                            <i class="far fa-circle fa-stack-2x"></i>
                            <i class="fas fa-at fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>


                    <div>
                        <a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=login">Iniciar Sesi&oacute;n</a>


                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark py-0" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Tecnomatico DEMO</a>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul id="menu-menu-1" class="nav navbar-nav ml-auto">
                        <li class="nav-item"> <!-- active -->
                            <a title="Inicio" href="https://tecnomatico.cl/diegodemo/tecnomatico2/" class="nav-link">Inicio</a></li>
                        <li class="nav-item">
                            <a title="Contacto" href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=contacto" class="nav-link">Contacto</a></li>
                        <li class="nav-item">
                            <a title="Nosotros" href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=nosotros" class="nav-link">Nosotros</a></li>
                        <li class="dropdown nav-item">
                            <a title="Productos" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-50">Productos</a>
                            <ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-50" role="menu">
                                <li class="nav-item"><a title="TecnoOficina" href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=productos" class="dropdown-item">TecnoOficina</a></li>
                                <li class="nav-item"><a title="TecnoHogar" href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=productos" class="dropdown-item">TecnoHogar</a></li>
                                <li class="nav-item"><a title="TecnoJardín" href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=productos" class="dropdown-item">TecnoJardín</a></li>
                                <li class="nav-item"><a title="TecnoTimbre" href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=productos" class="dropdown-item">TecnoTimbre</a></li>
                                <li class="nav-item"><a title="SchoolNews" href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=productos" class="dropdown-item">SchoolNews</a></li>
                                <li class="nav-item"><a title="AvisaMochila" href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=productos" class="dropdown-item">AvisaMochila</a></li>
                            </ul>
                        </li>
                        <li class="dropdown nav-item">
                            <a title="Servicios" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-94">Servicios</a>
                            <ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-94" role="menu">
                                <li class="nav-item"><a title="Gestión" href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=servicios" class="dropdown-item">Gestión</a></li>
                                <li class="nav-item"><a title="Instalación" href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=servicios" class="dropdown-item">Instalación</a></li>
                                <li class="nav-item"><a title="Fabricación" href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=servicios" class="dropdown-item">Fabricación</a></li>
                                <li class="nav-item"><a title="Automatización" href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=servicios" class="dropdown-item">Automatización</a></li>
                                <li class="nav-item"><a title="Diseño de Apps." href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=servicios" class="dropdown-item">Diseño de Apps.</a></li>
                                <li class="nav-item"><a title="Diseño Web" href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=servicios" class="dropdown-item">Diseño Web</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a title="Blog" href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=blog" class="nav-link">Blog</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <?php if ($isHomePage) { ?>

        <div class="landingSelector">
        <ul>
            <li><a class="js-scroll-trigger nav-link" href="#page-top" title="Conectamos Tu Mundo"><span></span></a></li>
            <li class="is-dark"><a class="js-scroll-trigger nav-link" href="#servicios" title="Servicios"><span></span></a></li>
            <li class="is-dark"><a class="js-scroll-trigger nav-link" href="#productos" title="Productos"><span></span></a></li>
            <li><a class="js-scroll-trigger nav-link" href="#porque-confiar" title="¿Por qué confiar en nosotros?"><span></span></a></li>
            <li class="is-dark"><a class="js-scroll-trigger nav-link" href="#equipo" title="Equipo"><span></span></a></li>
            <li><a class="js-scroll-trigger nav-link" href="#contacto" title="Contacto"><span></span></a></li>
        </ul>
    </div>

    <div class="loadSplash">
        <div class="content d-flex justify-content-center align-items-center">
            <div class="text-center">
                <h1 class="animated pulse infinite display-5 text-white">Cargando...</h1>
            </div>
        </div>
    </div>
    <header id="page-top" data-src-particles="https://tecnomatico.cl/diegodemo/tecnomatico2/tema/landing/particlesjs-config.jsonbonito">
        <div class="container-header">
            <div class="intro-text">
                <div class="intro-heading text-uppercase animated bounceIn"><span class="text-white">Conectamos</span><br /><span class="text-tmcolor">Tu<br /><span class="text-tmcolor">Mundo</span></div>
                <a class="text-uppercase js-scroll-trigger" href="#servicios"><i class="fa fa-chevron-down fa-4x animated infinite pulse"></i></a>
            </div>
        </div>
        <svg class="bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
            <polygon fill="white" points="0,100 100,0 100,100" />
        </svg>
    </header>
    <main>
        <section id="servicios">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center sreveal">
                        <h2 class="section-heading text-uppercase">Servicios</h2>
                        <h3 class="section-subheading text-muted">Automatizamos cualquier dispositivo, Acuarios, Sistemas de
                            portones eléctricos, riegos, luces autom&aacute;ticas, control, gesti&oacute;n; ademas creamos
                            nuestras propias aplicaciones y mucho m&aacute;s.</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 text-center sreveal">
                        <a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=productos">
                            <span class="iconrascii-mejunje">
                                <i class="iconrascii-alarmbell icon text-white"></i>
                                <i class="iconrascii-circle bg text-primary"></i>
                            </span>
                        </a>
                        <h4 class="my-2">Timbres Inteligentes</h4>
                        <p>Estos timbres estan configurados a las necesidades de cada cliente, con posibilidad de
                            actualizarlos y programarlos remotamente.</p>
                    </div>
                    <div class="col-md-4 text-center sreveal">
                        <a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=servicios">
                            <span class="iconrascii-mejunje">
                                <i class="iconrascii-mobile icon text-white"></i>
                                <i class="iconrascii-circle bg text-primary"></i>
                            </span>
                        </a>
                        <h4 class="my-2">Aplicaciones M&oacute;viles</h4>
                        <p>Desarrollamos nuestras propias app, personalizadas a cada exigencia.</p>
                    </div>
                    <div class="col-md-4 text-center sreveal">
                        <a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=servicios">
                            <span class="iconrascii-mejunje">
                                <i class="iconrascii-robot icon text-white"></i>
                                <i class="iconrascii-circle bg text-primary"></i>
                            </span>
                        </a>
                        <h4 class="my-2">Automatizaci&oacute;n</h4>
                        <p>¡Podemos automatizar lo que sea! ¡Todo controlado v&iacute;a Internet!</p>
                    </div>
                    <div class="col-md-4 text-center sreveal">
                        <a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=servicios">
                            <span class="iconrascii-mejunje">
                                <i class="iconrascii-screwdriver icon text-white"></i>
                                <i class="iconrascii-circle bg text-warning"></i>
                            </span>
                        </a>
                        <h4 class="my-2">Instalaci&oacute;n</h4>
                        <p>Servidores, Laboratorios con Windows, Linux (LTSP, Virtual Box), Redes, Port&aacute;tiles, PC,
                            etc.</p>
                    </div>
                    <div class="col-md-4 text-center sreveal">
                        <a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=servicios">
                            <span class="iconrascii-mejunje">
                                <i class="iconrascii-webdesign icon text-white"></i>
                                <i class="iconrascii-circle bg text-warning"></i>
                            </span>
                        </a>
                        <h4 class="my-2">Dise&ntilde;o Web</h4>
                        <p>Nuestros sitios son desarrollados utilizando las últimas tecnologías disponibles en informática
                            como: Ajax, Jquery, Java, Php, MySql, BootStrap.</p>
                    </div>
                    <div class="col-md-4 text-center sreveal">
                        <a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=servicios">
                            <span class="iconrascii-mejunje">
                                <i class="iconrascii-cogwheel icon text-white"></i>
                                <i class="iconrascii-circle bg text-warning"></i>
                            </span>
                        </a>
                        <h4 class="my-2">Gesti&oacute;n</h4>
                        <p>¡Controla todos los servicios de TECNOMATICO desde cualquier dispositivo!</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="productos">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center sreveal">
                        <h2 class="section-heading text-uppercase">Productos</h2>
                        <h3 class="section-subheading text-muted">Aparte de nuestros servicios, ofrecemos diferentes
                            productos ya creados por nosotros para diferentes necesidades.</h3>
                    </div>
                </div>
                <h1 class="display-5 text-center sreveal">TecnoTimbre</h1>
                <div class="row mt-2 d-flex">
                    <div class="col-md-7 pl-md-5 p-md-0 bg-white d-flex align-self-md-center text-center text-md-left sreveal-left">
                        <div>
                            <p class="lead">Un timbre totalmente automatizado para instituciones educacionales, empresas o
                                personas.</p>
                            <p class="lead">Algunas de sus funciones son:</p>
                            <ul>
                                <li>Control por Wi-Fi o manual (no es necesario tener Wi-Fi, el sistema puede generar un
                                    punto de acceso para acceder al portal).</li>
                                <li>Portal de administraci&oacute;n.</li>
                                <li>Automatizaci&oacute;n por horas y d&iacute;as de la semana.</li>
                                <li>Horarios pre-creados para instituciones educacionales: Operaci&oacute;n Deyse, Recreos,
                                    Cambios de hora, Salida, Talleres, etc .</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5 p-md-0 d-flex align-items-center sreveal-right">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <polygon fill="white" points="0,100 0,0 100,100"></polygon>
                        </svg>
                        <a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=productos"><img src="https://tecnomatico.cl/diegodemo/tecnomatico2/pics/timbre-big.jpg" class="img-fluid" /></a>
                    </div>
                </div>
                <h1 class="display-5 text-center sreveal">TecnoJard&iacute;n</h1>
                <div class="row mt-2 d-flex">
                    <div class="col-md-5 p-md-0 d-flex align-items-center sreveal-left">
                        <a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=productos"><img src="https://tecnomatico.cl/diegodemo/tecnomatico2/pics/jardininteligente.jpg" class="img-fluid mt-3" /></a>
                        <svg class="right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <polygon fill="white" points="0,100 100,0 100,100"></polygon>
                        </svg>
                    </div>
                    <div class="col-md-7 pr-md-5 text-md-right text-center p-md-0 bg-white d-flex align-self-md-center sreveal-right">
                        <div>
                            <p class="lead">Un jard&iacute;n inteligente, simple y moderno.</p>
                            <p class="lead">Realizado en conjunto con <a href="https://tecnomatico.cljardindelsur" target="_blank" rel="noopener noreferrer">Jard&iacute;n del sur</a>.</p>
                            <p class="lead">Algunas de sus funciones son:</p>
                            <ul>
                                <li>Verifica el estado de tus plantas, puedes ver la humedad, la temperatura y hasta la
                                    luminocidad!</li>
                                <li>Control del riego mediante electrov&aacute;lvulas.</li>
                                <li>Control por Wi-Fi mediante un portal de administraci&oacute;n.</li>
                                <li>Automatizaci&oacute;n por horas y d&iacute;as de la semana.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h1 class="display-5 text-center sreveal">TecnoHogar</h1>
                <div class="row mt-2 d-flex">
                    <div class="col-md-7 pl-md-5 bg-white p-md-0 d-flex align-self-md-center text-md-left text-center sreveal-left">
                        <div>
                            <p class="lead">Automatizaci&oacute;n para cualquier hogar u oficinas de cualquier persona.</p>
                            <p class="lead">Algunas de sus funciones, aplicaciones y ejemplos son:</p>
                            <ul>
                                <li>Control por Wi-Fi.</li>
                                <li>Automatizaci&oacute;n por horarios.</li>
                                <li>Encender o Apagar Luces, Aparatos Electrodom&eacute;sticos y/o electr&oacute;nicos, etc.
                                </li>
                                <li>Adaptaci&oacute;n de electrodomesticos como lavadoras o secadoras comunes: Ver el tiempo
                                    de su lavadora en su tel&eacute;fono, acciones como detener, empezar o apagar.</li>
                                <li>Cocinas: Puede revisar si hay peligros como dejar el gas activo o revisar la temperatura
                                    de ella.</li>
                                <li>Ba&ntilde;os y cocinas: Revise si la llave del agua est&aacute; corriendo.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5 p-md-0 d-flex align-items-md-center sreveal-right">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <polygon fill="white" points="0,100 0,0 100,100"></polygon>
                        </svg>
                        <a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=productos"><img class="img-fluid mt-1" src="https://tecnomatico.cl/diegodemo/tecnomatico2/pics/hogar-inteligente.jpg" /></a>
                    </div>
                </div>
                <div class="sreveal">
                    <hr />
                    <p class="lead text-center sreveal">Si desea agregar alguna caracter&iacute;stica en particular, desea
                        preguntarnos o quiere adquirir alg&uacute;n producto,
                        puede consultarnos en <a href="#contacto" class="js-scroll-trigger">contacto</a>.</p>
                </div>
            </div>
        </section>
        <section class="nosecpadding" id="porque-confiar">
            <svg class="top" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                <polygon fill="white" points="0,100 100,0 100,100"></polygon>
            </svg>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase text-white sreveal">¿Por qu&eacute; confiar en nosotros?
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-2">
                        <div class="trust-box sreveal">
                            <div class="row m-0">
                                <div class="col-3 bg-success trust-box-bg m-0 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-shield-alt text-white fa-4x"></i>
                                </div>
                                <div class="col m-0 p-4">
                                    <h5>Seguridad</h5>
                                    <p class="lead">Todos nuestros productos son fabricados, dise&ntilde;ados y probados
                                        minuciosamente por nuestro equipo de profesionales.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <div class="trust-box sreveal">
                            <div class="row m-0">
                                <div class="col-3 bg-primary trust-box-bg m-0 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-tools text-white fa-4x"></i>
                                </div>
                                <div class="col m-0 p-4 align-self-md-end">
                                    <h5>Instalaci&oacute;n</h5>
                                    <p class="lead">Nuestros productos y servicios son instalados por profesionales de
                                        TECNOMATICO en la materia garantizando el mejor funcionamiento de los
                                        productos.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <div class="trust-box sreveal">
                            <div class="row m-0">
                                <div class="col-3 bg-warning trust-box-bg m-0 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-microchip text-white fa-4x"></i>
                                </div>
                                <div class="col m-0 p-4 align-self-md-end">
                                    <h5>Tecnolog&iacute;a</h5>
                                    <p class="lead">Nos destacamos por proporcionar soluciones de &uacute;ltima
                                        generaci&oacute;n a todo tipo de dispositivos electrónicos.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <div class="trust-box sreveal">
                            <div class="row m-0">
                                <div class="col-3 bg-danger trust-box-bg m-0 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-check text-white fa-4x"></i>
                                </div>
                                <div class="col m-0 p-4 align-self-md-end">
                                    <h5>Calidad</h5>
                                    <p class="lead">Usamos los mejores materiales de las mejores marcas para poder realizar
                                        y confeccionar los productos.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <svg class="bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                <polygon fill="white" points="0,100 100,0 100,100"></polygon>
            </svg>
        </section>
        <section id="equipo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center sreveal">
                        <h2 class="section-heading text-uppercase">Nuestro Equipo</h2>
                        <h3 class="section-subheading text-muted">Somos dos peque&ntilde;os emprendedores con el
                            sue&ntilde;o de poder crear un mundo m&aacute;s conectado, simple e interactivo.</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="team-member sreveal">
                            <img class="mx-auto rounded-circle" src="https://tecnomatico.cl/diegodemo/tecnomatico2/pics/daniel.png">
                            <h4>Daniel Sep&uacute;lveda</h4>
                            <p class="text-muted">Fundador</p>
                            <p class="text-muted">Ingeniero en inform&aacute;tica</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="team-member sreveal">
                            <img class="mx-auto rounded-circle" src="https://tecnomatico.cl/diegodemo/tecnomatico2/pics/diego.png">
                            <h4>Diego Mu&ntilde;oz</h4>
                            <p class="text-muted">Fundador</p>
                            <p class="text-muted">Analista Programador</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center sreveal">
                        <p class="large text-muted">M&aacute;s de 10 a&ntilde;os de experiencia en inform&aacute;tica y
                            electr&oacute;nica.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5" id="clientes">
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-4 sreveal">
                        <a href="https://acuariofilia.cl">
                            <img class="img-fluid d-block mx-auto" src="https://tecnomatico.cl/diegodemo/tecnomatico2/pics/afcl.jpg" alt="Acuariofilia Chile">
                        </a>
                    </div>
                    <div class="col-sm-4 sreveal">
                        <a href="http://celf.cl/">
                            <img class="img-fluid d-block mx-auto" src="https://tecnomatico.cl/diegodemo/tecnomatico2/pics/celf.jpg" alt="Centro Educacional La Florida">
                        </a>
                    </div>
                    <div class="col-sm-4 sreveal">
                        <a href="https://tecnomatico.cl/jardindelsur">
                            <img class="img-fluid d-block mx-auto" src="https://tecnomatico.cl/diegodemo/tecnomatico2/pics/jardindelsur.jpg" alt="Jard&iacute; del sur">
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="nosecpadding" id="contacto">
            <svg class="top" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                <polygon fill="white" points="0,100 100,0 100,100"></polygon>
            </svg>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center sreveal">
                        <h2 class="section-heading text-uppercase text-tmcolor">Contacto</h2>
                        <h3 class="section-subheading text-muted">Si tiene alguna duda o desea contratar nuestros servicios,
                            cont&aacute;ctenos.</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="contactForm">
                            <div class="row sreveal">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" name="nombre" type="text" placeholder="Su nombre *" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="correo" type="email" placeholder="Su correo electr&oacute;nico *" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="telefono" type="number" placeholder="Su numero de teléfono">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea class="form-control" name="mensaje" placeholder="Su mensaje *" required="required"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        Aqui deberia ir un captcha pero no hay presupuesto.
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="ajaxResponseContact" class="text-white"></div>
                                    <a href="#!" id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase">Enviar
                                        Mensaje</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php } else if ($isLanding) { ?>
        <header id="page-top" class="d-flex tm-page bg-primary" style="background-image:linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.2)), url(https://tecnomatico.cl/diegodemo/tecnomatico2/pics/studen.jpg);">
            <div class="container align-self-center mt-lg-5">
                <div class="justify-content-center text-white tm-page-content text-lg-left text-center">
                    <h1 class="tm-page-intro">Este deber&iacute;a de ser un buen slogan para atraer.</h1>
                    <h1></h1>
                    <h2 class="mt-5 tm-page-lead">Otro slogan que sea m&aacute;s espec&iacute;fico.</h2>
                    <h2>
                        <div class="mt-4">
                            <a href="https://tecnomatico.cl" class="btn btn-lg btn-info">Acci&oacute;n 1</a>
                            <a href="#app" class="btn btn-lg btn-primary">Descargar App.</a>
                        </div>
                    </h2>
                </div>
            </div>
        </header>
        <main>
            <div class="container py-5 text-center">
                <h1 class="display-4">Blablabla?</h1>
                <p class="lead">Bla.</p>
            </div>
        </main>
    <?php } else { ?>
        <div class="jumbotron jumbotron-fluid bg-primary jumbo-thumbimg">
            <div class="container text-center text-white">
                <h1 class="display-4">Demo P&aacute;gina</h1>
            </div>
        </div>
        <div class="container">
            <div class="alert alert-primary">Aqu&iacute; una demo de lo que ser&iacute; una p&aacute;gina normal y no landing.</div>
            <div id="contactForm">
                <div>
                    <div class="form-group">
                        <input class="form-control" name="nombre" type="text" placeholder="Su nombre *" required="required">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="correo" type="email" placeholder="Su correo electrónico *" required="required">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="telefono" type="number" placeholder="Su numero de telefono">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="mensaje" placeholder="Su mensaje *" required="required"></textarea>
                    </div>
                    <div class="g-recaptcha" data-sitekey=""></div>
                    <script src="https://www.google.com/recaptcha/api.js?hl=es" async="" defer=""></script>
                    <div id="ajaxResponseContact" class="text-dark"></div>
                    <p> <a href="#!" id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase">Enviar Mensaje</a>
                    </p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <footer>
        <div class="first-bg">
            <div class="container py-2 text-white">
                <div class="row py-2">
                    <div class="col-md-3">
                        <h1 class="webname">Tecnomatico</h1>
                        <p class="lead text-justify">Soluciones informaticas y electr&oacute;nicas dise&ntilde;adas por expertos.</p>
                    </div>
                    <div class="col-md-2">
                        <p><b>Nosotros</b></p>
                        <ul>
                            <li><a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=nosotros">Sobre Tecnomatico</a></li>
                            <li><a href="https://tecnomatico.cl/diegodemo/tecnomatico2/#clients">Clientes</a></li>
                            <li><a href="https://tecnomatico.cl/diegodemo/tecnomatico2/#contacto">Soporte y Contacto</a></li>
                            <li><a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=faq">Preguntas Frecuentes</a></li>
                            <li><a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=terminosycondiciones">T&eacute;rminos y Condiciones</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <p><b>Productos</b></p>
                        <ul>
                            <li><a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=productos">TecnoTimbre</a></li>
                            <li><a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=productos">TecnoJard&iacute;n</a></li>
                            <li><a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=productos">TecnoCasa</a></li>
                            <li><a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=productos">TecnoOficina</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <p><b>Servicios</b></p>
                        <ul>
                            <li><a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=servicios">Dise&ntilde;o Web</a></li>
                            <li><a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=servicios">Dise&ntilde;o de apps.</a></li>
                            <li><a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=servicios">Dom&oacute;tica</a></li>
                            <li><a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=servicios">Gesti&oacute;n de dispositivos</a></li>
                            <li><a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=servicios">Instalaciones</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <p><b>Otros</b></p>
                        <ul>
                            <li><a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=login">Acceso Empleados</a></li>
                            <li><a href="https://tecnomatico.cl/diegodemo/tecnomatico2/index.php?what=panel">Acceso Clientes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100 bg-dark pt-3 pb-1 text-center text-white">
            <p class="lead">Copyright &copy; Tecnomatico <?php echo date("Y"); ?>.</p>
        </div>
    </footer>
    <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js?ver=3.4.1'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js?ver=4.4.1'></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/nprogress@0.2.0/nprogress.js?ver=0.2.0'></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.26.0/feather.min.js?ver=4.26.0'></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/jquery-easing@0.0.1/jquery.easing.1.3.js?ver=0.0.1'></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.js?ver=2.0.0'></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/scrollreveal@4.0.5/dist/scrollreveal.min.js?ver=4.0.5'></script>
    <script type='text/javascript' src='https://tecnomatico.cl/diegodemo/tecnomatico2/tema/js/app.js?ver=0.0.0'></script>
    <?php if($isHomePage) { ?>
    <script type='text/javascript' src='https://tecnomatico.cl/diegodemo/tecnomatico2/tema/landing/script.js?ver=0.0.0'></script>
    <?php } ?>
</body>

</html>