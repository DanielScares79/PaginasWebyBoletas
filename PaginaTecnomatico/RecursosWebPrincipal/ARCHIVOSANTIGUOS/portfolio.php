<?php
require __DIR__ . DIRECTORY_SEPARATOR. 'webprincipal' . DIRECTORY_SEPARATOR . 'funciones.php';
?>
<!doctype html>
<html class="no-js" lang="zxx">

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
    <!--[if lte IE 11]>
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
                                        <li><a class="active" href="index.php">home</a></li>
                                        <li><a href="service.php">services</a></li>
                                        <li><a href="Portfolio.php">Portfolio</a></li>
                                        <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="portfolio_details.php">Portfolio details</a></li>
                                                <li><a href="about.php">about</a></li>
                                                <li><a href="elements.php">elements</a></li>
                                            </ul>
                                        </li>

                                        <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="blog.php">blog</a></li>
                                                <li><a href="single-blog.php">single-blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.php">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-2 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-end">
                                <a href="#" target="_black" class="say_hi">Say Hello</a>
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
     <div class="bradcam_area breadcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Portfolio</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->

    <!-- portfolio_image_area  -->
    <div class="portfolio_image_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-90">
                        <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">Featured Works</h3>
                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">Tour function information without cross action media value quickly maximize timely deliverables.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="single_Portfolio wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="portfolio_thumb">
                            <img src="<?php echo WEB_URL; ?>/webprincipal/img/portfolio/1.png" alt="">
                        </div>
                        <div class="portfolio_hover">
                            <div class="title">
                                <span>App Design</span>
                                    <h3>Colorlib Mobile App</h3>
                                    <a class="boxed-btn3" href="portfolio_details.php">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_Portfolio wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="portfolio_thumb">
                            <img src="<?php echo WEB_URL; ?>/webprincipal/img/portfolio/2.png" alt="">
                        </div>
                        <div class="portfolio_hover">
                            <div class="title">
                                <span>App Design</span>
                                    <h3>Colorlib Mobile App</h3>
                                    <a class="boxed-btn3" href="portfolio_details.php">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-lg-4">
                    <div class="single_Portfolio wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                        <div class="portfolio_thumb">
                            <img src="<?php echo WEB_URL; ?>/webprincipal/img/portfolio/3.png" alt="">
                        </div>
                        <div class="portfolio_hover">
                            <div class="title">
                                <span>App Design</span>
                                    <h3>Colorlib Mobile App</h3>
                                    <a class="boxed-btn3" href="portfolio_details.php">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-lg-4">
                    <div class="single_Portfolio wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                        <div class="portfolio_thumb">
                            <img src="<?php echo WEB_URL; ?>/webprincipal/img/portfolio/4.png" alt="">
                        </div>
                        <div class="portfolio_hover">
                            <div class="title">
                                <span>App Design</span>
                                    <h3>Colorlib Mobile App</h3>
                                    <a class="boxed-btn3" href="portfolio_details.php">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-lg-4">
                    <div class="single_Portfolio wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
                        <div class="portfolio_thumb">
                            <img src="<?php echo WEB_URL; ?>/webprincipal/img/portfolio/5.png" alt="">
                        </div>
                        <div class="portfolio_hover">
                            <div class="title">
                                <span>App Design</span>
                                    <h3>Colorlib Mobile App</h3>
                                    <a class="boxed-btn3" href="portfolio_details.php">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ portfolio_image_area  -->


    <!-- testimonial_area  -->
    <div class="testimonial_area ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <div class="single_carousel">
                                <div class="single_testmonial text-center">
                                        <div class="quote">
                                            <img src="<?php echo WEB_URL; ?>/webprincipal/img/testmonial/quote.svg" alt="">
                                        </div>
                                        <p>Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor <br> 
                                                sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.  <br>
                                                Fusce ac mattis nulla. Morbi eget ornare dui. </p>
                                        <div class="testmonial_author">
                                            <div class="thumb">
                                                    <img src="<?php echo WEB_URL; ?>/webprincipal/img/testmonial/thumb.png" alt="">
                                            </div>
                                            <h3>Robert Thomson</h3>
                                            <span>Business Owner</span>
                                        </div>
                                    </div>
                        </div>
                        <div class="single_carousel">
                                <div class="single_testmonial text-center">
                                        <div class="quote">
                                            <img src="<?php echo WEB_URL; ?>/webprincipal/img/testmonial/quote.svg" alt="">
                                        </div>
                                        <p>Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor <br> 
                                                sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.  <br>
                                                Fusce ac mattis nulla. Morbi eget ornare dui. </p>
                                        <div class="testmonial_author">
                                            <div class="thumb">
                                                    <img src="<?php echo WEB_URL; ?>/webprincipal/img/testmonial/thumb.png" alt="">
                                            </div>
                                            <h3>Robert Thomson</h3>
                                            <span>Business Owner</span>
                                        </div>
                                    </div>
                        </div>
                        <div class="single_carousel">
                                <div class="single_testmonial text-center">
                                        <div class="quote">
                                            <img src="<?php echo WEB_URL; ?>/webprincipal/img/testmonial/quote.svg" alt="">
                                        </div>
                                        <p>Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor <br> 
                                                sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.  <br>
                                                Fusce ac mattis nulla. Morbi eget ornare dui. </p>
                                        <div class="testmonial_author">
                                            <div class="thumb">
                                                    <img src="<?php echo WEB_URL; ?>/webprincipal/img/testmonial/thumb.png" alt="">
                                            </div>
                                            <h3>Robert Thomson</h3>
                                            <span>Business Owner</span>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /testimonial_area  -->

    <div class="get_in_tauch_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-90">
                        <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">Get in Touch</h3>
                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">Tour function information without cross action media value quickly maximize timely deliverables.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="touch_form">
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single_input wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                        <input type="text" placeholder="Your Name" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single_input wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                                        <input type="email" placeholder="Email" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="single_input wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                        <input type="email" placeholder="Subject" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="single_input wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                                       <textarea name="" id="" cols="30" placeholder="Message" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="submit_btn wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
                                        <button class="boxed-btn3" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                        <div class="footer_logo wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                            <a href="index.php">
                                <img src="<?php echo WEB_URL; ?>/webprincipal/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-9">
                        <div class="menu_links">
                            <ul>
                                <li><a class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".2s" href="#">About</a class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s"></li>
                                <li><a class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".4s" href="#">Services</a></li>
                                <li><a class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".6s" href="#">Portfolio</a></li>
                                <li><a class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".8s" href="#">Pages</a></li>
                                <li><a class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="1s" href="#">Blog</a></li>
                                <li><a class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="1.1s" href="#">Contact</a></li>
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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