<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php
if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['correo'];
    $celu = $_POST['fono'];
    $mensaje = $_POST['mesaje'];
    $ip = $_SERVER["REMOTE_ADDR"];
    $captcha = $_POST['g-recaptcha-response'];
    $secretKey = '6Lf79xwdAAAAAIhJzhPmMzWDRiwcz5SF0d8Xjx6v';
    
    $errors = array();

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}&remoteip={$ip}");

    $atributos = json_decode($response, TRUE);
    if (!$atributos['success']) {
        echo 'alert("Verifica el captcha")';
        
    }

    if (empty($nombre)) {
        echo 'alert("El campo nombre es obligatorio")';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "La dirección de correo electrónico no es válida";
    }

    if (empty($celu)) {
        echo 'alert("El campo fono es obligatorio")';
    }

    if (empty($mensaje)) {
        echo 'alert("El campo mensaje es obligatorio")';
    }
}

    
?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tecnomatico</title>
    <meta name="title" content="Tecnomatico">
    <meta name="description" content="Empresa dedicada a soluciones informáticas, computacionales, cámaras, automatización, domótica y electricidad">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="/">
    <meta property="og:title" content="Tecnomatico">
    <meta property="og:description" content="Empresa dedicada a soluciones informáticas, computacionales, cámaras, automatización, domótica y electricidad">
    <meta property="og:image" content="/RecursosWebPrincipal/pp.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="/">
    <meta property="twitter:title" content="Tecnomatico">
    <meta property="twitter:description" content="Empresa dedicada a soluciones informáticas, computacionales, cámaras, automatización, domótica y electricidad">
    <meta property="twitter:image" content="/RecursosWebPrincipal/pp.jpg">

    <link rel="apple-touch-icon" sizes="180x180" href="/RecursosWebPrincipal/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/RecursosWebPrincipal/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/RecursosWebPrincipal/favicon-16x16.png">
    <link rel="manifest" href="/RecursosWebPrincipal/site.webmanifest">

    <!-- CSS here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="/RecursosWebPrincipal/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/RecursosWebPrincipal/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="/RecursosWebPrincipal/css/magnific-popup.css" rel="stylesheet" />
   
    <link href="/RecursosWebPrincipal/css/themify-icons.css" rel="stylesheet" />
    <link href="/RecursosWebPrincipal/css/nice-select.css" rel="stylesheet" />
    <link href="/RecursosWebPrincipal/css/flaticon.css" rel="stylesheet" />
    <link href="/RecursosWebPrincipal/css/gijgo.css" rel="stylesheet" />
    <link href="/RecursosWebPrincipal/css/animate.min.css" rel="stylesheet" />
    <link href="/RecursosWebPrincipal/css/slick.css" rel="stylesheet" />
    <link href="/RecursosWebPrincipal/css/slicknav.css" rel="stylesheet" />
    <link href="/RecursosWebPrincipal/css/style.css" rel="stylesheet" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- <link rel="stylesheet" href="/RecursosWebPrincipal/css/responsive.css"> -->
    
    <style>
.btn-whatsapp {
       display:block;
       width:70px;
       height:70px;
       color:#fff;
       position: fixed;
       right:20px;
       bottom:20px;
       border-radius:50%;
       line-height:80px;
       text-align:center;
       z-index:999;
}
.paginas {color:#fff;}
</style>
</head>

<body>


    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="/">
                                    <img src="/RecursosWebPrincipal/img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="main-menu  d-none d-lg-block text-center">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="/">INICIO</a></li>
                                        <li><a href="#servicios">SERVICIOS</a></li>
                                        <li><a href="#trabajos">TRABAJOS</a></li>
                                        <li><a href="#areas">AREAS</a></li>
                                        <li><a href="#contacto">CONTACTO</a></li>
                                        <li><a href="#">OTROS <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="/boletasBeta/Login/index.php">Tecnomatico Boletas</a></li>
                                               <!-- <li><a href="https://sync.tecnomatico.cl">Tecnomatico Sync</a></li>
                                                <li><a href="/viverodeplantas/">Vivero de plantas</a></li>-->
                                            </ul>
                                        </li>
                                        
                                    </ul>
                                </nav>
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


    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
            <div class="container">
                <div class="row align-items-center justify-content-start">
                    <div class="col-lg-10 col-md-10">
                        <div class="slider_text">
                            <h3 class="wow fadeInLeft" data-wow-delay=".1s" data-wow-duration="1s">Dedicados a todo tipo de soluciones inform&aacute;ticas.</h3>

                            <p><a class="boxed-btn3 wow fadeInLeft" data-wow-delay=".2s" data-wow-duration="1s" href="#servicios">Ver m&aacute;s</a>&nbsp;</p>

                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->
    <!-- service_area  -->
    <div class="service_area" id="servicios">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center">
                        <h3 class="wow fadeInUp" data-wow-delay=".2s" data-wow-duration="1.2s">NUESTROS SERVICIOS</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center wow fadeInLeft" data-wow-delay=".4s" data-wow-duration="1.2s">
                        <div class="icon"><img alt="" src="/RecursosWebPrincipal/img/svg_icon/1.svg" /></div>

                        <h3>Notebooks&nbsp; -&nbsp; Computadores de escritorio&nbsp; -&nbsp; Laboratorios</h3>

                        <p>Laboratorios, Windows, Linux, Clonamos discos, rescatamos archivos borrados, pantallas, discos duros, s&oacute;lidos</p>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                        <div class="icon"><img alt="" src="/RecursosWebPrincipal/img/svg_icon/2.svg" /></div>

                        <h3>Luces Inteligentes, Portones, Interruptores, Dom&oacute;tica</h3>

                        <p>Cualquier cosa que use corriente es factible de automatizar. Soluciones&nbsp; orientadas&nbsp; a la automatizaci&oacute;n&nbsp; de&nbsp; forma econ&oacute;mica.</p>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center wow fadeInRight" data-wow-delay=".4s" data-wow-duration="1.2s">
                        <div class="icon"><img alt="" src="/RecursosWebPrincipal/img/svg_icon/3.svg" /></div>

                        <h3>Dise&ntilde;amos Diversos Programas para Android, Windows y Linux.</h3>

                        <p>Programaci&oacute;n&nbsp; de&nbsp;&nbsp; aplicaciones para tablet&nbsp; y&nbsp; celulares. Tambi&eacute;n&nbsp;&nbsp; podemos&nbsp;&nbsp; desarrollar sistemas para&nbsp; tu empresa&nbsp; o&nbsp;&nbsp; casa.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <!--/ service_area  -->

    <div class="tm_sync_area">
        <div class="container text-justify">
            <div>
           <h1 class="">Gestión en un solo lugar con Tecnomatico.cl</h1>
           <p class="lead">Hemos desarrollado tecnología &uacute;nica en Chile con la cual podr&aacute; controlar su espacio desde su m&oacute;vil o computadora desde cualquier parte del mundo.<br/>Controle las luces de su hogar, cierre o abra sus puertas, monitoree el estado de sus plantas, riegue su jardín, apague o encienda las luces de su casa o empresa, controle su acuario, sus máquinas; en general si usa electricidad es posible de automatizar.</p>
        </div>
        </div>
    </div>
    <div class="our_mission_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mission_text">
                        <h4>Nuestra Misi&oacute;n</h4>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="mision_info text-justify">
                        <div class="single_mission">

                            <h3 class="lead">Profesionales dedicados a solucionar todo tipo de problemas de informaci&oacute;n, tecnolog&iacute;a, electricidad, contamos con una gran experiencia. Arreglamos tu pc, notebook, tablet, etc.</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="portfolio_image_area" id="areas">
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-90">
                        <h4 class="wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">DIFERENTES AREAS DE NUESTRO TRABAJO.</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="single_Portfolio wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                        <div class="portfolio_thumb"><img alt="" src="/RecursosWebPrincipal/img/portfolio/alarmas.jpg"/></div>

                        <div class="portfolio_hover">
                            <div class="title"><span>Activala con una llamada telefónica o control.</span>

                                <h3>Alarmas comunitarias, casas o empresas.</h3>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single_Portfolio wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1s">
                        <div class="portfolio_thumb"><img alt="" src="/RecursosWebPrincipal/img/portfolio/2.png" /></div>

                        <div class="portfolio_hover">
                            <div class="title"><span>Desarrollamos software y aplicaciones.</span>

                                <h3>Programaci&oacute;n.</h3>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-lg-4">
                    <div class="single_Portfolio wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                        <div class="portfolio_thumb"><img alt="" src="/RecursosWebPrincipal/img/portfolio/3.png" /></div>

                        <div class="portfolio_hover">
                            <div class="title"><span>Tú lo imaginas y lo automatizamos.</span>
                                <h3>Domótica y automatización.</h3>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-lg-4">
                    <div class="single_Portfolio wow fadeInUp" data-wow-delay=".6s" data-wow-duration="1s">
                        <div class="portfolio_thumb"><img alt="" src="/RecursosWebPrincipal/img/portfolio/4.png" /></div>

                        <div class="portfolio_hover">
                            <div class="title"><span>Instalaciones electricas.</span>
                                <h3>Electricidad.</h3>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-lg-4">
                    <div class="single_Portfolio wow fadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="portfolio_thumb"><img alt="" src="/RecursosWebPrincipal/img/portfolio/5.png" /></div>

                        <div class="portfolio_hover">
                            <div class="title"><span>Páginas web, promociona tu empresa.</span>
                                <h3>Dise&ntilde;o Web</h3>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- team_member_start -->

    <div class="team_area" id="trabajos">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="lead text-justify mb-90">
                        <h3 class="wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">NUESTRO TRABAJO</h3>

                        <p>Se adapta a tus necesidades de tu empresa, negocio o casa. Tecnomatico abarca desde computadores, tablet, instalamos servidores, laboratorios, alarmas, instalaciones solares, app, redes, automatizaci&oacute;n y m&aacute;s.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single_team wow fadeInUp" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="team_thumb"><img alt="" src="/RecursosWebPrincipal/img/team/1.png" width="264" height="290" />
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
                            <h3>Soluciones Solares</h3>

                            <p></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single_team wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1s">
                        <div class="team_thumb"><img alt="" src="/RecursosWebPrincipal/img/team/2.png"  width="264" height="290"/>
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
                            <h3>Laboratorios</h3>

                            <p></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single_team wow fadeInUp" data-wow-delay=".6s" data-wow-duration="1s">
                        <div class="team_thumb"><img alt="" src="/RecursosWebPrincipal/img/team/3.png"  width="264" height="290"/>
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
                            <h3>App</h3>

                            <p></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single_team wow fadeInUp" data-wow-delay=".8s" data-wow-duration="1s">
                        <div class="team_thumb"><img alt="" src="/RecursosWebPrincipal/img/team/4.png"  width="264" height="290"/>
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
                            <h3>C&aacute;maras-Alarmas</h3>

                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="get_in_tauch_area" data-scroll-index="0" id="contacto">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Formulario de Consultas</h2>
                </div>
                <div class="col-lg-8">
        <form class="form" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                    
                        <div class="row">
                        <div class="col-12">
                            <div class="form-group"><textarea class="form-control w-100" cols="30" name="mesaje" placeholder="Su Consulta *" rows="9" required></textarea></div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group"><input class="form-control" name="nombre" placeholder="Su Nombre *" type="text" required/></div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group"><input class="form-control" name="correo" placeholder="Email *" type="email" required/></div>
                        </div>

                        <div class="col-12">
                            <div class="form-group"><input class="form-control" name="fono" placeholder="Fono" type="tel" /></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="g-recaptcha" data-sitekey="6Lf79xwdAAAAAOKzkZYNU26kGsl3TMQuFzD-PUTM"></div>
                    </div>
                    <!--<input type="submit" class="btn btn-success" id="button" value="Enviar Correo" >-->
                    <button type="submit" class="btn btn-primary mb-2">Enviar</button>
        </form>
       


         <script type="text/javascript"
         src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
        
        <script type="text/javascript">
          emailjs.init('_zEkOs2F6EVGZ7ZbN')
        </script>
                    <p><small>Los campos con el s&iacute;mbolo (*) son obligatorios.</small></p>
                </div>
                <div class="col-lg-4">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="fas fa-home"></i></span>
                        <div class="media-body">
                            <h3>Ubicaci&oacute;n</h3>
                            <p>José Miguel Carrera N° 48.<br/>Comuna de La Florida.</p>
                            <div class="embed-responsive embed-responsive-16by9">
                            <iframe style="border:0;" allowfullscreen="" class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3325.1181027322195!2d-70.59037778479819!3d-33.550307680745384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662d0c4eb54ad41%3A0x6ff41fda3781bc14!2sJos%C3%A9%20Miguel%20Carrera%2048%2C%20La%20Florida%2C%20Regi%C3%B3n%20Metropolitana!5e0!3m2!1ses-419!2scl!4v1637252470200!5m2!1ses-419!2scl" loading="lazy" allowfullscreen></iframe>
</div>

                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="fa fa-phone"></i></span>
                        <div class="media-body">
                            <h3>Tel&eacute;fono</h3>
                            <p><a href="tel:+56930998708">+56 9 3099 8708</a></p>
                        </div>
                    </div>
                   <div class="media contact-info">
                        <span class="contact-info__icon"><i class="far fa-clock"></i></span>
                        <div class="media-body">
                            <h3>Horario de atenci&oacute;n</h3>
                            <p>Lunes a Viernes<br/>9 AM - 6 PM</p>
                            <!--WHATSAPP start-->
                                        <div class="btn-whatsapp">
                                            <a href="https://api.whatsapp.com/send?phone=+56930998708" target="_blank"><img src="https://tecnomatico.cl/RecursosWebPrincipal/img/whatsapp.png" alt="Whatsapp" width="70" height="70"></a>
                                        </div>
                            <!--WHATSAPP end-->
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
                        
    </div>

    <!-- footer start -->

    <footer class="footer py-4">
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer_logo wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                            <a href="/">
                                <img src="/RecursosWebPrincipal/img/logo.png" alt="">
                                <p class="paginas">pulgaropuesto.cl&nbsp;&nbsp;&nbsp;expresionesmye.cl&nbsp;&nbsp;&nbsp;vcam.cl</p>
                            </a>
                        </div>
                        <p class="copy_right text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.3s">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> Todos los derechos reservados <i class="fa fa-heart-o" aria-hidden="true"></i> por <a href="https://tecnomatico.cl" target="_blank">TECNOMATICO.CL</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!--/ footer end  -->
    <!-- JS here -->
    <script src="/RecursosWebPrincipal/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="/RecursosWebPrincipal/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/RecursosWebPrincipal/js/popper.min.js"></script>
    <script src="/RecursosWebPrincipal/js/bootstrap.min.js"></script>
    <script src="/RecursosWebPrincipal/js/owl.carousel.min.js"></script>
    <script src="/RecursosWebPrincipal/js/isotope.pkgd.min.js"></script>
    <script src="/RecursosWebPrincipal/js/ajax-form.js"></script>
    <script src="/RecursosWebPrincipal/js/waypoints.min.js"></script>
    <script src="/RecursosWebPrincipal/js/jquery.counterup.min.js"></script>
    <script src="/RecursosWebPrincipal/js/imagesloaded.pkgd.min.js"></script>
    <script src="/RecursosWebPrincipal/js/scrollIt.js"></script>
    <script src="/RecursosWebPrincipal/js/jquery.scrollUp.min.js"></script>
    <script src="/RecursosWebPrincipal/js/wow.min.js"></script>
    <script src="/RecursosWebPrincipal/js/nice-select.min.js"></script>
    <script src="/RecursosWebPrincipal/js/jquery.slicknav.min.js"></script>
    <script src="/RecursosWebPrincipal/js/jquery.magnific-popup.min.js"></script>
    <script src="/RecursosWebPrincipal/js/plugins.js"></script>
    <script src="/RecursosWebPrincipal/js/gijgo.min.js"></script>
    <script src="/RecursosWebPrincipal/js/main.js"></script>
    
</body>
<!--Script Correo con Mailjs-->
<script>
                const btn = document.getElementById('button');
                
                document.getElementById('form')
                 .addEventListener('submit', function(event) {
                   event.preventDefault();
                
                   btn.value = 'Enviando...';
                
                   const serviceID = 'default_service';
                   const templateID = 'template_j5apobl';
                
                   emailjs.sendForm(serviceID, templateID, this)
                    .then(() => {
                      btn.value = 'Enviar Correo';
                      alert('Enviado Correctamente!');
                    }, (err) => {
                      btn.value = 'No se pudo enviar! Intentelo más tarde.';
                      alert(JSON.stringify(err));
                    });
                });
</script>
</html>