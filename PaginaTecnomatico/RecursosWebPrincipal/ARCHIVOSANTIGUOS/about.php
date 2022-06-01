<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'webprincipal' . DIRECTORY_SEPARATOR . 'funciones.php';
?>
<!doctype html>
<html lang="zxx">

<head>
    <meta charset="us-ascii">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tecnomatico.cl</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1"><!-- <link rel="manifest" href="site.webmanifest"> -->
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
    <link href="<?php echo WEB_URL; ?>/webprincipal/css/style.css" rel="stylesheet" /><!-- <link rel="stylesheet" href="<?php echo WEB_URL; ?>/webprincipal/css/responsive.css"> -->
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
                            <div class="logo-img"><a href="index.php"><img alt="" src="<?php echo WEB_URL; ?>/webprincipal/img/logo.png" /> </a></div>
                        </div>

                        <div class="col-xl-8 col-lg-8">
                            <div class="main-menu  d-none d-lg-block text-center">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="index.php">home</a></li>
                                        <li><a href="https://www.tecnomatico.cl/service.php">servicios</a></li>
                                        <li><a href="https://www.tecnomatico.cl/contact.php">Contacto</a></li>
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
    <!-- slider_area_start -->

    <div class="slider_area">
        <div class="single_slider about_banner  d-flex align-items-center slider_bg_2 overlay">
            <div class="container">
                <div class="col-lg-12 col-md-12">
                    <div class="slider_text">
                        <h3 class="wow fadeInLeft" data-wow-delay=".1s" data-wow-duration="1s">Una empresa dedicada a dar soluciones inform&aacute;ticas y tecnol&oacute;gicas</h3>
                        <a class="boxed-btn3 wow fadeInLeft" data-wow-delay=".2s" data-wow-duration="1s" href="#">Visita nuestro trabajo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- slider_area_end -->

    <div class="our_mission_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mission_text">
                        <h4>Nuestra Misi&oacute;n</h4>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="mision_info">
                        <div class="single_mission">

                            <h4 style="padding-left:20px;">Somos profesionales dedicados a solucionar todo tipo de problemas de informaci&oacute;n, tecnolog&iacute;a, electricidad, contamos con una gran experiencia con mas de 20 a&ntilde;os en el rubro. Arreglamos tu pc, notebook, tablet, etc.</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about_area">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-5 offset-lg-1">
                    <div class="about_info">
                        <div class="section_title white_text"><span class="wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">Nosotros</span>

                            <h3 class="wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1s">Mejoramos tu empresa, pymes y hogar.</h3>
                            <div class="section_title text-center mb-90">
                                <h3 class="wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">Somos una empresa eficiente y creativa. Damos soluciones a todo tipo de rubros, portones automatizados, camaras, alarmas, programacion, p&aacute;ginas web, app, electricidad, arreglo de computadores, lo que sea.</h3>

                                <p class="wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1s"></p>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="how_we_work_area extra_margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="work_info">
                        <div class="section_title">
                            <h3 class="wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="1s">Como trabajamos</h3>

                            <p class="mid_text wow fadeInLeft" data-wow-delay=".4s" data-wow-duration="1s">Entendemos el problema o necesidad y proponemos soluciones econ&oacute;micas y de gran calidad.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team_member_start -->

    <div class="team_area ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-90">
                        <h3 class="wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">Somos un equipo creativo.</h3>

                        <p class="wow fadeInUp" data-wow-delay=".6s" data-wow-duration="1s">Maximizamos tu emprendimiento.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single_team wow fadeInUp" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="team_thumb"><img alt="" src="<?php echo WEB_URL; ?>/webprincipal/img/team/1.png" />
                            <div class="team_hover">
                                <div class="hover_inner text-center">
                                    <ul>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="team_title text-center">
                            <h3>Las mejores Soluciones</h3>
                            <p>Instalaci&oacute;n paneles solares</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single_team wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1s">
                        <div class="team_thumb"><img alt="" src="<?php echo WEB_URL; ?>/webprincipal/img/team/2.png" />
                            <div class="team_hover">
                                <div class="hover_inner text-center">
                                    <ul>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="team_title text-center">
                            <h3>Notebooks y de Escritorio</h3>
                            <p>Instalaci&oacute;n, Reparaci&oacute;n</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single_team wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1s">
                        <div class="team_thumb"><img alt="" src="<?php echo WEB_URL; ?>/webprincipal/img/team/3.png" />
                            <div class="team_hover">
                                <div class="hover_inner text-center">
                                    <ul>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="team_title text-center">
                            <h3>App personalizadas</h3>

                            <p>Dise&ntilde;o web</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single_team wow fadeInUp" data-wow-delay=".6s" data-wow-duration="1s">
                        <div class="team_thumb"><img alt="" src="<?php echo WEB_URL; ?>/webprincipal/img/team/4.png" />
                            <div class="team_hover">
                                <div class="hover_inner text-center">
                                    <ul>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="team_title text-center">
                            <h3>Expertos en Automatizaci&oacute;n</h3>

                            <p>Alarmas, c&aacute;maras, dom&oacute;tica</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_team wow fadeInUp" data-wow-delay=".8s" data-wow-duration="1s">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!--/ team_member_end -->
    <!-- testimonial_area  -->
    <!-- /testimonial_area  -->
    <div class="get_in_tauch_area" data-scroll-index="0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-90">
                        <h3 class="wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">Contactanos</h3>

                        <p class="wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1s"></p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="touch_form">
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single_input wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s"><input placeholder="Your Name" type="text" /></div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single_input wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1s"><input placeholder="Email" type="email" /></div>
                                </div>

                                <div class="col-md-12">
                                    <div class="single_input wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s"><input placeholder="Subject" type="email" /></div>
                                </div>

                                <div class="col-md-12">
                                    <div class="single_input wow fadeInUp" data-wow-delay=".6s" data-wow-duration="1s"><textarea cols="30" id="" name="" placeholder="Message" rows="10"></textarea></div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="submit_btn wow fadeInUp" data-wow-delay=".7s" data-wow-duration="1s"><button class="boxed-btn3" type="submit">Send Message</button></div>
                                </div>
                            </div>
                        </form>
                        <div class="section_title text-center mb-90">
                            <BR> <BR><BR>
                            <a href="whatsapp://send?text=Hola, mi consulta es: &phone=+56 930998708&abid=+56 930998708">Desde Celulares</a><BR><BR>
                            <a href="whatsapp://send?text=Hola, mi consulta es: &phone=+56 930998708&abid=+56 930998708"><img src="https://www.tecnomatico.cl/<?php echo WEB_URL; ?>/webprincipal/img/WahtsApp.png" alt="WhatsApp" width="130" height="80"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer start -->

    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-3">
                        <div class="footer_logo wow fadeInRight" data-wow-delay=".3s" data-wow-duration="1s"><a href="index.php"><img alt="" src="<?php echo WEB_URL; ?>/webprincipal/img/logo.png" /> </a></div>
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

                    <div class="col-lg-3 col-md-12">
                        <div class="socail_links">

                        </div>
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