<?php
require __DIR__  . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR.  'funciones.php';

define('WEB_URL', 'https://tecnomatico.cl/viverodeplantas'); //Sin el ultimo slash (/)
?>
<!DOCTYPE html>
<html lang="es-CL">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="title" content="Vivero de plantas">
    <meta name="description" content="Poseemos una gran cantidad de plantas con más de medio siglo. autóctonas, ornamentales, frutales (arándanos, maqui, duraznos, manzanos, cerezos), flores, plantas de interior camelias, azaleas, ilex, bonsai y filodendros.">

    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo WEB_URL; ?>">
    <meta property="og:title" content="Vivero de plantas">
    <meta property="og:description" content="Poseemos una gran cantidad de plantas con más de medio siglo. autóctonas, ornamentales, frutales (arándanos, maqui, duraznos, manzanos, cerezos), flores, plantas de interior camelias, azaleas, ilex, bonsai y filodendros.">
    <meta property="og:image" content="<?php echo WEB_URL; ?>/imagenes/viverobig.png">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo WEB_URL; ?>">
    <meta property="twitter:title" content="Vivero de plantas">
    <meta property="twitter:description" content="Poseemos una gran cantidad de plantas con más de medio siglo. autóctonas, ornamentales, frutales (arándanos, maqui, duraznos, manzanos, cerezos), flores, plantas de interior camelias, azaleas, ilex, bonsai y filodendros.">
    <meta property="twitter:image" content="<?php echo WEB_URL; ?>/imagenes/viverobig.png">

    <title>Vivero de plantas</title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo WEB_URL; ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo WEB_URL; ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo WEB_URL; ?>/favicon-16x16.png">

    <link rel="manifest" href="<?php echo WEB_URL; ?>/site.webmanifest">

    <link rel='stylesheet' id='fontawesome-css' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css?ver=5.3.2' type='text/css' media='all' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lux/bootstrap.min.css" integrity="sha512-B5sIrmt97CGoPUHgazLWO0fKVVbtXgGIOayWsbp9Z5aq4DJVATpOftE/sTTL27cu+QOqpI/jpt6tldZ4SwFDZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel='stylesheet' id='theme-css-css' href='<?php echo WEB_URL; ?>/style.css?ver=5.3.2' type='text/css' media='all' />

    <script>
        var WEB_URL = '<?php echo WEB_URL; ?>';
    </script>

    <?php echo obtenerCodigoAnalytics(); ?>
    
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body>
    <div id="cargando">
        <!--[if lte IE 9]>
            <div class="alert alert-danger m-2">Est&aacute; usando un navegador <strong>desactualizado</strong>. Por favor, <a href="https://browsehappy.com/">cambie de navegador</a> para mejorar su experiencia y seguridad.</div>
        <![endif]-->
        <noscript>
            <div class="alert alert-danger m-2">Por favor, habilite Javascript en su navegador para continuar.</div>
        </noscript>
    </div>


    <a href="https://api.whatsapp.com/send?phone=56930395507" class="whatsappFloat" target="_blank" tabindex="0" role="button"> <i class="fab fa-whatsapp"></i> </a>


    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container"><a class="navbar-brand js-scroll-trigger" href="#welcome">Vivero de plantas</a>
            <button class="navbar-toggler" type="button" aria-label="Mostrar menu" id="navbarSideCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navbarPrincipal" class="navbar-collapse offcanvas-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#welcome">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#ofrecemos">Ofrecemos</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#servicios">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#galeria">Galer&iacute;a</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contacto">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header id="welcome" style="background-image: linear-gradient(#4bbf739c, rgb(0 0 0 / 41%)),  url('<?php echo WEB_URL; ?>/imagenes/parcelasandielito.jpg');">
        <div class="d-flex align-items-center justify-content-center">
            <div class="container container-header">
                <div class="intro-text">
                    <div class="intro-heading text-uppercase sreveal">VIVERO DE PLANTAS</div>
                    <h4 class="text-white sreveal">Poseemos una gran cantidad de plantas con más de medio siglo. autóctonas, ornamentales, frutales (arándanos, maqui, duraznos, manzanos, cerezos), flores, plantas de interior camelias, azaleas, ilex, bonsai y filodendros.</h4>
                    <a class="btn btn-outline-light sreveal js-scroll-trigger mt-2" href="#ofrecemos">Aprender Más</a>
                </div>
            </div>
        </div>
        <svg class="bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
            <polygon fill="white" points="0,100 100,0 100,100"></polygon>
        </svg>
    </header>
    <section id="ofrecemos">
        <div class="container py-5 text-center">
            <h1 class="display-4 text-dark sreveal">Ofrecemos</h1>
            <hr class="separator sreveal" />
            <div class="row text-center mt-5">
                <div class="col-md-4 sreveal mb-5"><span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-info"></i>
                        <i class="fas fa-seedling fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-2">Variedad</h4>
                    Basta cantidad de variedades en especies, desde las más exóticas hasta las más
                    comúnes.
                </div>
                <div class="col-md-4 sreveal mb-5"><span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-success"></i>
                        <i class="fas fa-hand-holding-heart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-2">Cuidado y Calidad</h4>
                    Un cuidado delicado y minucioso para garantizar la calidad y salud de las plantas.
                </div>
                <div class="col-md-4 sreveal mb-5"><span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-warning"></i>
                        <i class="fas fa-sun fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-2">Decoración</h4>
                    Las plantas más lindas para la decoración de su hogar, oficina o jardín.
                </div>
            </div>
        </div>
    </section>
    <section id="servicios" style="background-color: #3f51b5 ;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" class="start">
            <polygon fill="white" points="0,100 100,0 100,100"></polygon>
        </svg>
        <div class="container text-center">
            <h1 class="display-4 sreveal text-white">Servicios</h1>
            <p class="lead sreveal text-white">En Jardin del sur ofrecemos distintos servicios para hacer que tu espacio tenga un toque especial.</p>
            <hr class="separator sreveal" />
        </div>
        <div id="creamostuespacio">
            <div class="container pt-3 pt-lg-0">
                <div class="row text-center text-lg-start">
                    <div class="col-lg-6 intro sreveal order-last order-lg-first">
                        <div>
                            <h1 class="text-white">Sientase en la naturaleza</h1>
                            <p class="lead text-white">En cada &aacute;rea una planta distinta.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 sreveal"><img data-src="<?php echo WEB_URL; ?>/imagenes/cactus.jpg" class="lazy w-100 shadow-img rounded mb-4" /></div>
                </div>
            </div>
        </div>
        <div id="disenamosareasverdes">
            <div class="container pt-3 pt-lg-0">
                <div class="row text-center text-lg-start">
                    <div class="col-lg-6 sreveal"><img data-src="<?php echo WEB_URL; ?>/imagenes/jardineria.jpg" class="lazy w-100 shadow-img rounded mb-4" /></div>
                    <div class="col-lg-6 intro sreveal">
                        <div>
                            <h1 class="text-white">Jardiner&iacute;a</h1>
                            <p class="lead text-white">Tenemos nuestra basta experiencia y herramientas que nos permiten hacer tu espacio un lugar mejor.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" class="end">
            <polygon fill=" #673ab7" points="0,100 100,0 100,100"></polygon>
        </svg>
        <div id="tecnomatico" style="background-color: #673ab7 ;">

            <div class="container pt-3 pt-lg-0">
                <div class="row text-center text-lg-start">
                    <div class="col-lg-6 introtm sreveal">
                        <div>
                            <h1 class="text-white">Gesti&oacute;n en un solo lugar con Tecnomatico Sync</h1>
                            <p class="lead text-white">Una nueva e innovadora plataforma &uacute;nica en Chile para cuidar su jard&iacute;n. Riege cuando quiera, desde donde quiera. Monitoree el estado de salud de sus plantas. Todo desde su tel&eacute;fono inteligente o computadora.</p>
                            <a class="btn btn-outline-primary btn-xl text-white mb-1" href="https://tecnomatico.cl/service.html">Saber m&aacute;s</a>
                        </div>
                    </div>
                    <div class="col-lg-6 sreveal"><img data-src="<?php echo WEB_URL; ?>/imagenes/jardininteligente.jpg" class="lazy w-100 shadow-img rounded mb-4" /></div>
                </div>
            </div>
        </div>
    </section>


    <section id="galeria" style="background-color:#1a1a1a">
        <div class="gallery-start">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                <polygon fill="#673ab7" points="0,100 100,0 100,100" />
            </svg>
            <div class="container text-center">
                <h1 class="display-4 sreveal text-white">Galer&iacute;a</h1>
                <p class="lead sreveal text-white">Vea algunos de nuestros mejores ejemplares.</p>
            </div>
        </div>
        <div class="container py-5 text-center sreveal" id="ornamentales">

            <div class="row" data-galleryno="0">
                <div class=" col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <img data-src="<?php echo WEB_URL; ?>/imagenes/20190208_111309.jpg" class="lazy w-100 shadow-img rounded mb-4" alt="" />

                    <img data-src="<?php echo WEB_URL; ?>/imagenes/20190208_111255.jpg" class="lazy w-100 shadow-img rounded mb-4" alt="" />
                </div>

                <div class=" col-lg-4 mb-4 mb-lg-0">
                    <img data-src="<?php echo WEB_URL; ?>/imagenes/20190208_111352.jpg" class="lazy w-100 shadow-img rounded mb-4" alt="" />

                    <img data-src="<?php echo WEB_URL; ?>/imagenes/20190208_111348.jpg" class="lazy w-100 shadow-img rounded mb-4" alt="" />
                </div>

                <div class=" col-lg-4 mb-4 mb-lg-0">
                    <img data-src="<?php echo WEB_URL; ?>/imagenes/20190208_111345.jpg" class="lazy w-100 shadow-img rounded mb-4" alt="" />

                    <img data-src="<?php echo WEB_URL; ?>/imagenes/20190208_111356.jpg" class="lazy w-100 shadow-img rounded mb-4" alt="" />
                </div>
            </div>
            <div class="row d-none" data-galleryno="1">
                <div class=" col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <img data-src="<?php echo WEB_URL; ?>/imagenes/20190208_111359.jpg" class="lazy w-100 shadow-img rounded mb-4" alt="" />

                    <img data-src="<?php echo WEB_URL; ?>/imagenes/20190208_111415.jpg" class="lazy w-100 shadow-img rounded mb-4" alt="" />
                </div>

                <div class=" col-lg-4 mb-4 mb-lg-0">
                    <img data-src="<?php echo WEB_URL; ?>/imagenes/20190208_111420.jpg" class="lazy w-100 shadow-img rounded mb-4" alt="" />

                    <img data-src="<?php echo WEB_URL; ?>/imagenes/20190208_111426.jpg" class="lazy w-100 shadow-img rounded mb-4" alt="" />
                </div>

                <div class=" col-lg-4 mb-4 mb-lg-0">
                    <img data-src="<?php echo WEB_URL; ?>/imagenes/20190208_111431.jpg" class="lazy w-100 shadow-img rounded mb-4" alt="" />

                    <img data-src="<?php echo WEB_URL; ?>/imagenes/20190208_111444.jpg" class="lazy w-100 shadow-img rounded mb-4" alt="" />
                </div>
            </div>
            <div class="row d-none" data-galleryno="2">
                <div class=" col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <img data-src="<?php echo WEB_URL; ?>/imagenes/20190208_111524.jpg" class="lazy w-100 shadow-img rounded mb-4" alt="" />

                    <img data-src="<?php echo WEB_URL; ?>/imagenes/20190208_111508.jpg" class="lazy w-100 shadow-img rounded mb-4" alt="" />
                </div>

                <div class=" col-lg-4 mb-4 mb-lg-0">
                    <img data-src="<?php echo WEB_URL; ?>/imagenes/20190208_111533.jpg" class="lazy w-100 shadow-img rounded mb-4" alt="" />

                    <img data-src="<?php echo WEB_URL; ?>/imagenes/20190208_111426.jpg" class="lazy w-100 shadow-img rounded mb-4" alt="" />
                </div>

                <div class=" col-lg-4 mb-4 mb-lg-0">
                    <img data-src="<?php echo WEB_URL; ?>/imagenes/20190208_111550.jpg" class="lazy w-100 shadow-img rounded mb-4" alt="" />

                    <img data-src="<?php echo WEB_URL; ?>/imagenes/20190208_111444.jpg" class="lazy w-100 shadow-img rounded mb-4" alt="" />
                </div>
            </div>
            <div class="loadMoreGallery"><a href="/" class="text-white">Mostrar m&aacute;s</a></div>
        </div>
    </section>
    <section id="contacto">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
            <polygon fill="#1a1a1a" points="0,100 100,0 100,100" />
        </svg>
        <div class="container">
            <div class=" text-center semitrans">
                <h1 class="display-4 text-white sreveal">Cont&aacute;ctenos</h1>
                <div class="row sreveal">
                    <div class="col-md-6 mb-2">
                        <p class="lead text-white">Puede contactarnos a través del siguiente formulario o al siguiente número
                            telefónico: +56 930 39 55 07.</p>
                        <p class="lead text-white">Nuestro horario de atenci&oacute;n es de Lunes a Viernes desde 09:00 a 18:00 hrs.</p>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <input class="form-control" name="nombre" required="required" type="text" placeholder="Su nombre *" />
                                    </div>
                                    <div class="mb-2">
                                        <input class="form-control" name="correo" required="required" type="email" placeholder="Su correo electrónico *" />
                                    </div>
                                    <div class="mb-2">
                                        <input class="form-control" name="fono" type="tel" placeholder="Su numero de teléfono" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2 h-100 pb-2">
                                        <textarea class="form-control h-100" name="mesaje" required="required" placeholder="Su mensaje *"></textarea>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <div class="g-recaptcha my-2" data-sitekey="6Lf79xwdAAAAAOKzkZYNU26kGsl3TMQuFzD-PUTM"></div>
                                    <div id="ajaxResponseContact" class="text-white"></div>
                                    <button type="submit" id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase">Enviar mensaje</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <p class="lead text-white">Si desea visitar nuestro vivero de plantas, estamos camino a Villarrica en la parcela San Daniel.</p>

                        <div class="ratio ratio-16x9">
                            <iframe data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d796.2591423826249!2d-72.59211817075801!3d-39.00929695662488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMznCsDAwJzMzLjUiUyA3MsKwMzUnMjkuNyJX!5e1!3m2!1ses-419!2scl!4v1634837432887!5m2!1ses-419!2scl" style="border:0;" allowfullscreen="" loading="lazy" class="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="catalogo" class="py-5" style="background-color: #f0ad4e">
        <div class="container">
            <div class="row text-center text-md-start">
                <div class="col-md-6">
                    <h1 class="text-white">¿Le gust&oacute; alguno de nuestros ejemplares?</h1>
                    <p class="lead text-white">No olvide visitar nuestra tienda o cat&aacute;logo en l&iacute;nea.</p>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center justify-content-md-start"><a class="btn btn-outline-light btn-xl" href="https://wa.me/c/56983368747" target="_blank">Ir al cat&aacute;logo</a></div>
            </div>
        </div>
    </section>

    <footer class="py-2 mt-3 bg-white">
        <div class="container text-center">
            <a class="text-dark js-scroll-trigger" href="#welcome" style="font-size: 4em;"><i class="fa fa-chevron-up"></i></a>
            <p class="lead text-dark">Copyright &copy; <?php echo date("Y"); ?> Tecnomatico.</p>
        </div>
    </footer>

    <div class="modal fade" id="modalLightbox" tabindex="-1" aria-labelledby="modalLightboxLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLightboxLabel">Imagen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>

    <script type='text/javascript' src="<?php echo WEB_URL; ?>/ie.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js" integrity="sha512-pax4MlgXjHEPfCwcJLQhigY7+N8rt6bVvWLFyUMuxShv170X53TRzGPmPkZmGBhk+jikR8WBM4yl7A9WMHHqvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.5.0/dist/lazyload.min.js"></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/scrollreveal@4.0.5/dist/scrollreveal.min.js?ver=4.0.5'></script>

    <script type='text/javascript' src="<?php echo WEB_URL; ?>/functions.js"></script>
    <script type='text/javascript' src="<?php echo WEB_URL; ?>/script.js"></script>
</body>

</html>