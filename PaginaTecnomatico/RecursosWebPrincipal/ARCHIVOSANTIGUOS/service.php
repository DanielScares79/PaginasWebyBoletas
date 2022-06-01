<?php
require __DIR__ . DIRECTORY_SEPARATOR. 'webprincipal' . DIRECTORY_SEPARATOR . 'funciones.php';
?>
<!doctype html>
<html lang="zxx">

<head>
    <meta charset="us-ascii">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tecnomatico.cl</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- Place favicon.ico in the root directory -->
    <!-- CSS here -->
    <link href="<?php echo WEB_URL; ?>/webprincipal/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo WEB_URL; ?>/webprincipal/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo WEB_URL; ?>/webprincipal/css/magnific-popup.css" rel="stylesheet" />
    <link href="<?php echo WEB_URL; ?>/webprincipal/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo WEB_URL; ?>/webprincipal/css/themify-icons.css" rel="stylesheet" />
    <link href="<?php echo WEB_URL; ?>/webprincipal/css/nice-select.css" rel="stylesheet" />
    <link href="<?php echo WEB_URL; ?>/webprincipal/css/flaticon.css" rel="stylesheet" />
    <link href="<?php echo WEB_URL; ?>/webprincipal/css/gijgo.css" rel="stylesheet" />
    <link href="<?php echo WEB_URL; ?>/webprincipal/css/animate.min.css" rel="stylesheet" />
    <link href="<?php echo WEB_URL; ?>/webprincipal/css/slick.css" rel="stylesheet" />
    <link href="<?php echo WEB_URL; ?>/webprincipal/css/slicknav.css" rel="stylesheet" />
    <link href="<?php echo WEB_URL; ?>/webprincipal/css/style.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="<?php echo WEB_URL; ?>/webprincipal/css/responsive.css"> -->
    <?php echo obtenerCodigoAnalytics(); ?>


</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div class="main-header-area" id="sticky-header">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="index.php"><img alt="" src="<?php echo WEB_URL; ?>/webprincipal/img/logo.png" /> </a>
                            </div>
                        </div>

                        <div class="col-xl-8 col-lg-8">
                            <div class="main-menu  d-none d-lg-block text-center">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="index.php">home</a></li>
                                        <li><a href="service.php">Servicios</a></li>
                                        <li><a href="contact.php">Contacto</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="col-lg-2 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-end"><a class="say_hi" data-scroll-nav="0" href="https://www.tecnomatico.cl/contact.php">Hola</a></div>
                        </div>

                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
    <!-- bradcam_area  -->

    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Nuestros Servicios</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->
    <!-- service_area  -->

    <div class="service_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-70"><span class="wow fadeInUp" data-wow-delay=".1s" data-wow-duration="1s">Servicios</span>

                        <h3 class="wow fadeInUp" data-wow-delay=".2s" data-wow-duration="1.2s">Con mas de 20 a&ntilde;os de experiencia en inform&aacute;tica y tecnolog&iacute;a de automatizaci&oacute;n.</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center wow fadeInLeft" data-wow-delay=".4s" data-wow-duration="1.2s">
                        <div class="icon"><img alt="" src="<?php echo WEB_URL; ?>/webprincipal/img/svg_icon/1.svg" /></div>

                        <h3>Dom&oacute;tica</h3>

                        <p>Automatiz&aacute;mos luces, motores, alarmas, portones, lo que puedas imaginar, instalaciones solares, etc.</p>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                        <div class="icon"><img alt="" src="<?php echo WEB_URL; ?>/webprincipal/img/svg_icon/2.svg" /></div>

                        <h3>Dise&ntilde;o Web</h3>

                        <p>Creamos tu pagina solo debes poseer un dominio y un hosting (te podemos orientar gratuitamente).</p>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center wow fadeInRight" data-wow-delay=".4s" data-wow-duration="1.2s">
                        <div class="icon"><img alt="" src="<?php echo WEB_URL; ?>/webprincipal/img/svg_icon/3.svg" /></div>

                        <h3>App M&oacute;viles</h3>

                        <p>Creamos aplicaciones hechas a la medida disponibles para celulares tablet, con s.o. android.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ service_area  -->

    <div class="how_we_work_area extra_margin_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="work_info">
                        <div class="section_title">
                            <h3 class="wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="1s">Implementaci&oacute;n</h3>

                            <p class="mid_text wow fadeInLeft" data-wow-delay=".4s" data-wow-duration="1s">&ldquo;Consulta por la factibilidad de tus proyectos, todo se puede realizar.</p>

                            <p class="last_p wow fadeInRight" data-wow-delay=".5s" data-wow-duration="1s">Las instalaciones solares hoy en d&iacute;a son un punto importante para el ahorro e independencia del sistema el&eacute;ctrico.</p>
                        </div>

                        <div class="video_watch d-flex align-items-center">
                            <div class="play_btn wow fadeInUp" data-wow-delay=".6s" data-wow-duration="1s"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p></p>

    <div class="get_in_tauch_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-90">
                        <h3 class="wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">Formulario para Consultas</h3>

                        <p class="wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1s">Resuelve tus dudas.</p>
                    </div>
                </div>
            </div>
            <div class="get_in_tauch_area" data-scroll-index="0">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="touch_form">
                            <form action="accion.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single_input wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s"><input name="nombre" placeholder="Tu Nombre" type="text" /></div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single_input wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1s"><input name="correo" placeholder="Email" type="email" /></div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="single_input wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s"><input name="fono" placeholder="Telefono" type="text" /></div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="single_input wow fadeInUp" data-wow-delay=".6s" data-wow-duration="1s"><textarea cols="30" name="mesaje" placeholder="Tu Consulta" rows="10"></textarea></div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="submit_btn wow fadeInUp" data-wow-delay=".7s" data-wow-duration="1s"><button class="boxed-btn3" type="submit">Enviar Mensaje</button></div>
                                    </div>
                                </div>
                                <div class="section_title text-center mb-90">
                                    <BR>
                                    <BR>
                                    <BR>
                                    <a href="whatsapp://send?text=Hola, mi consulta es: &phone=+56 930998708&abid=+56 930998708">Desde Celulares</a>
                                    <BR>
                                    <BR>
                                    <a href="whatsapp://send?text=Hola, mi consulta es: &phone=+56 930998708&abid=+56 930998708"><img src="https://www.tecnomatico.cl/<?php echo WEB_URL; ?>/webprincipal/img/WahtsApp.png" alt="WhatsApp" width="130" height="80">
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer start -->

        <p></p>

        <footer class="footer">
            <div class="footer_top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-3">
                            <div class="footer_logo wow fadeInRight" data-wow-delay=".3s" data-wow-duration="1s">
                                <a href="index.php"><img alt="" src="<?php echo WEB_URL; ?>/webprincipal/img/logo.png" /> </a>
                            </div>
                        </div>

                        <div class="col-xl-7 col-lg-7 col-md-9">
                            <div class="menu_links">
                                <ul>
                                    <li><a class="wow fadeInDown" data-wow-delay=".2s" data-wow-duration="1s" href="https://www.tecnomatico.cl/about.php" target="_self">Nosotros</a></li>
                                    <li><a class="wow fadeInDown" data-wow-delay=".4s" data-wow-duration="1s" href="https://www.tecnomatico.cl/service.php">Servicios</a></li>
                                    <li><a class="wow fadeInDown" data-wow-delay="1.1s" data-wow-duration="1s" href="https://www.tecnomatico.cl/contact.php">Contacto</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="copy-right_text">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <p class="copy_right text-center wow fadeInUp" data-wow-delay="1.3s" data-wow-duration="1s">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--/ footer end  -->
        <!-- JS here -->
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/popper.min.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/bootstrap.min.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/owl.carousel.min.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/isotope.pkgd.min.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/ajax-form.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/waypoints.min.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/jquery.counterup.min.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/imagesloaded.pkgd.min.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/scrollIt.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/jquery.scrollUp.min.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/wow.min.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/nice-select.min.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/jquery.slicknav.min.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/jquery.magnific-popup.min.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/plugins.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/gijgo.min.js"></script>
        <!--contact js-->
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/contact.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/jquery.ajaxchimp.min.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/jquery.form.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/jquery.validate.min.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/mail-script.js"></script>
        <script src="<?php echo WEB_URL; ?>/webprincipal/js/main.js"></script>
</body>

</html>