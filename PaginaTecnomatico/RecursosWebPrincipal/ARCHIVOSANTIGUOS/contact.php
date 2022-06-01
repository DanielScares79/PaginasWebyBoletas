<?php
require __DIR__ . DIRECTORY_SEPARATOR. 'webprincipal' . DIRECTORY_SEPARATOR . 'funciones.php';
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Tecnomatico.cl</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- <link rel="manifest" href="site.webmanifest"> -->
        <!-- Place favicon.ico in the root directory -->

        <!-- CSS here -->
        <link rel="stylesheet" href="<?php echo WEB_URL; ?>/webprincipal/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo WEB_URL; ?>/webprincipal/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo WEB_URL; ?>/webprincipal/css/magnific-popup.css">
        <link rel="stylesheet" href="<?php echo WEB_URL; ?>/webprincipal/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo WEB_URL; ?>/webprincipal/css/themify-icons.css">
        <link rel="stylesheet" href="<?php echo WEB_URL; ?>/webprincipal/css/nice-select.css">
        <link rel="stylesheet" href="<?php echo WEB_URL; ?>/webprincipal/css/flaticon.css">
        <link rel="stylesheet" href="<?php echo WEB_URL; ?>/webprincipal/css/gijgo.css">
        <link rel="stylesheet" href="<?php echo WEB_URL; ?>/webprincipal/css/animate.min.css">
        <link rel="stylesheet" href="<?php echo WEB_URL; ?>/webprincipal/css/slick.css">
        <link rel="stylesheet" href="<?php echo WEB_URL; ?>/webprincipal/css/slicknav.css">
        <link rel="stylesheet" href="<?php echo WEB_URL; ?>/webprincipal/css/style.css">
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
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="index.php">
                                    <img src="<?php echo WEB_URL; ?>/webprincipal/img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="main-menu  d-none d-lg-block text-center">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="https://tecnomatico.cl/index.php">Home</a></li>
                                        <li><a href="https://tecnomatico.cl/service.php">Servicios</a></li>

                                        </li>


                                        </li>
                                        <li><a href="https://tecnomatico.cl/contact.php">Contacto</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-2 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-end">
                                <div class="log_chat_area d-flex align-items-end"><a class="say_hi" data-scroll-nav="0" href="https://www.tecnomatico.cl/contact.php">Hola</a></div>
                            </div>
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
    <div class="bradcam_area breadcam_bg_3">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Contacto</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section section_padding">
        <div class="container">
            <div class="d-none d-sm-block mb-5 pb-4">
                <div id="map" style="height: 480px;"></div>
                <script>
                    function initMap() {
                        var uluru = {
                            lat: -25.363,
                            lng: 131.044
                        };
                        var grayStyles = [{
                                featureType: "all",
                                stylers: [{
                                        saturation: -90
                                    },
                                    {
                                        lightness: 50
                                    }
                                ]
                            },
                            {
                                elementType: 'labels.text.fill',
                                stylers: [{
                                    color: '#ccdee9'
                                }]
                            }
                        ];
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: {
                                lat: -31.197,
                                lng: 150.744
                            },
                            zoom: 9,
                            styles: grayStyles,
                            scrollwheel: false
                        });
                    }
                </script>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3325.118102732217!2d-70.59037778532242!3d-33.55030768074545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662d0c4eb54ad41%3A0x6ff41fda3781bc14!2sJos%C3%A9%20Miguel%20Carrera%2048%2C%20La%20Florida%2C%20Regi%C3%B3n%20Metropolitana!5e0!3m2!1ses!2scl!4v1594052649369!5m2!1ses!2scl" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>

            <div class="get_in_tauch_area" data-scroll-index="0">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Formulario de Consultas</h2>
                    </div>
                    <div class="col-lg-8">
                        <form action="accion.php" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group"><textarea class="form-control w-100" cols="30" name="mesaje" onblur="this.placeholder = 'Consulta'" onfocus="this.placeholder = ''" placeholder="Su Consulta" rows="9"></textarea></div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group"><input class="form-control" name="nombre" onblur="this.placeholder = 'Su Nombre'" onfocus="this.placeholder = ''" placeholder="Su Nombre" type="text" /></div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group"><input class="form-control" name="correo" onblur="this.placeholder = 'Correo Electr璐竛ico'" onfocus="this.placeholder = ''" placeholder="Email" type="email" /></div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group"><input class="form-control" name="fono" onblur="this.placeholder = 'Telefono'" onfocus="this.placeholder = ''" placeholder="Fono" type="text" /></div>
                                </div>
                            </div>

                            <div class="form-group mt-3"><button class="boxed-btn3" type="submit">Enviar Mensaje</button></div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Santiago, La Florida.</h3>
                                <p>José Miguel Carrera n° 48</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>(56) 930998708</h3>
                                <p>Lunes a Domingo 9am a 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>contacto@tecnomatico.cl</h3>
                                <div>

                                    <a href="whatsapp://send?text=Hola, mi consulta es: &phone=+56 930998708&abid=+56 930998708">WahtsApp al +56 930998708</a>
                                    <a href="whatsapp://send?text=Hola, mi consulta es: &phone=+56 930998708&abid=+56 930998708"><img src="https://www.tecnomatico.cl/<?php echo WEB_URL; ?>/webprincipal/img/WahtsApp.png" alt="WhatsApp" width="130" height="80"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- ================ contact section end ================= -->

    <!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-3">
                        <div class="footer_logo wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                            <a href="index.php">
                                <img src="<?php echo WEB_URL; ?>/webprincipal/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-9">
                        <div class="menu_links">
                            <ul>
                                <li><a class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".2s" href="https://tecnomatico.cl/about.php">Nosotros</a class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s"></li>
                                <li><a class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".4s" href="https://tecnomatico.cl/service.php">Servicios</a></li>
                                <li><a class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="1.1s" href="https://tecnomatico.cl/contact.php">Contacto</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="socail_links">
                            <ul>
                                <li><a class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s" href="#"> <i class="fa fa-facebook"></i> </a></li>
                                <li><a class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s" href="#"> <i class="fa fa-twitter"></i> </a></li>
                                <li><a class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s" href="#"> <i class="fa fa-instagram"></i> </a></li>
                                <li><a class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s" href="#"> <i class="fa fa-google-plus"></i> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.3s">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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