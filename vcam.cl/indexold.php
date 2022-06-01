<?php
require __DIR__  . DIRECTORY_SEPARATOR . 'funciones.php';
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vcam</title>
    <meta name="title" content="Vcam">
    <meta name="description" content="Empresa dedicada a instalaciones de cámaras de seguridad">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="/">
    <meta property="og:title" content="vcam">
    <meta property="og:description" content="VCAM ofrece ejecutar un proyecto profesional de seguridad basado en cámaras de vigilancia.">
    <meta property="og:image" content="https://vcam.cl/RecursosWebPrincipal/pp.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="/">
    <meta property="twitter:title" content="vcam">
    <meta property="twitter:description" content="Mas seguridad con cámaras cctv.">
    <meta property="twitter:image" content="https://vcam.cl/RecursosWebPrincipal/pp.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
 

    <!-- CSS here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://vcam.cl/RecursosWebPrincipal/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://vcam.cl/RecursosWebPrincipal/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="https://vcam.cl/RecursosWebPrincipal/css/magnific-popup.css" rel="stylesheet" />
   
    <link href="https://vcam.cl/RecursosWebPrincipal/css/themify-icons.css" rel="stylesheet" />
    <link href="https://vcam.cl/RecursosWebPrincipal/css/nice-select.css" rel="stylesheet" />
    <link href="https://vcam.cl/RecursosWebPrincipal/css/flaticon.css" rel="stylesheet" />
    <link href="https://vcam.cl/RecursosWebPrincipal/css/gijgo.css" rel="stylesheet" />
    <link href="https://vcam.cl/RecursosWebPrincipal/css/animate.min.css" rel="stylesheet" />
    <link href="https://vcam.cl/RecursosWebPrincipal/css/slick.css" rel="stylesheet" />
    <link href="https://vcam.cl/RecursosWebPrincipal/css/slicknav.css" rel="stylesheet" />
    <link href="https://vcam.cl/RecursosWebPrincipal/css/style.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
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
h5 {text-align: center;color: #160e20;}
p.agranda {font-size:medium;text-align: justify;font-weight: 660;}
h2.stylegaranty {color: #160e20;}
h2.textrojo {color: #660808;text-align: center;}
z.textlogo {color: #e5e1e9; font-size: 19px;}
@media (min-width:992px){.alto-100{height: 100vw;}}
.padre {
  background-color: #fafafa;
  margin: 1rem;
  padding: 1rem;
  /* IMPORTANTE */
  text-align: center;
  display: flex;
  justify-content: center;}
  div.Proyect {text-align: center;}
  body {background-image: url(https://vcam.cl/RecursosWebPrincipal/img/fondo.jpg);background-repeat:no-repeat;background-attachment: fixed;background-size: cover;}
  .padre {background-image: url(https://vcam.cl/RecursosWebPrincipal/img/fondo.jpg);background-repeat:no-repeat;background-attachment: fixed;background-size: cover;}
  .asesoria {font-family: Helvetica, sans-serif;font-size: 1.8rem;font-weight:900;}
  .asesoria1 {font-family: Helvetica, Arial, sans-serif;font-size: 1.8rem;font-weight:900;}
  .cacho  {color:rgb(50, 53, 149);font-family: Helvetica, sans-serif;font-size: 1.4rem;font-weight:900;}
  .direcci {color:#FF5733;}
  .negra {font-weight:900;}

</style>
</head>
<body>
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-6 col-lg-4">
                            <div class="logo-img">
                                    <a href="https://vcam.cl">
                                    <img class="rounded-circle" src="https://vcam.cl/RecursosWebPrincipal/img/logo.png" alt="Logo Vcam" height="49" width="49">
                                    <z class="textlogo">LIDER EN SISTEMAS DE SEGURIDAD</z>
                                </a>
                            </div>
                           
                        </div>
                       
                        
                        <div class="col-xl-6 col-lg-8">
                            <div class="main-menu  d-none d-lg-block text-center">
                                                <nav>
                                                            <ul id="navigation">
                                                                <li><a href="https://vcam.cl">Inicio</a></li>
                                                                <li><a href="#Servicios">Servicios</a></li>
                                                                <li><a href="#Proyectos">Proyectos</a></li>
                                                                <li><a href="#Garantia">Garantía</a></li>
                                                                <li><a href="#Contacto">Contacto</a></li>
                                                            </ul>
                                                </nav>
                            </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

  

    <div class="slider_area"><div class="single_slider  d-flex align-items-center slider_bg_1 overlay"></div></div>
    <main class="container"><br><br><br>
                    
                    
        
                    <div class="row">
                            <div class="col-5">
                                            <div>
                                                    <H1 CLASS="asesoria text-left ms-1" style="color: #261141;">PROTEGE TU HOGAR Y</H1>
                                                    <p CLASS="asesoria text-left" style="color:#261141;">EMPRESA</p> 
                                            </div>
                                            <div>
                                                <div class="col d-flex align-items-center justify-content-center">
                                                   <div class="col-xl-12 col-md-0">
                                                      <div class="single_service text-center wow fadeInLeft" data-wow-delay=".1s" data-wow-duration="1.2s">
                                                            <br><br><br><br><p class="cacho">Solicita&nbsp;&nbsp;  tu &nbsp; cotización</p><p class="cacho"> y&nbsp;  obtén&nbsp;  hasta&nbsp;  un&nbsp;&nbsp;<FONT COLOR="red">30%</FONT></p><P class="cacho">de&nbsp;&nbsp; descuento&nbsp;&nbsp; en</P><P class="cacho">cámaras&nbsp; HD&nbsp; y &nbsp;full HD </P><P <P class="cacho">en&nbsp; &nbsp;la&nbsp; &nbsp;instalación&nbsp; de</P><P class="cacho">cámaras&nbsp; de vigilancia.</p>
                                                      </div> 
                                                   </div>
                                            </div>   
                                        </div>

                             </div>
                            
                            <div class="col-7">
                                            <div>

                                                <p CLASS="asesoria1" style="color:rgb(50, 53, 149);">&nbsp;ASESORÍA GRATUITA</p>
                                                <p CLASS="asesoria1" style="color: rgb(50, 53, 149);">¿Cómo saber qué sistema</p>
                                                <p CLASS="asesoria1" style="color: rgb(50, 53, 149);">de seguridad es mejor para tÍ?</p>
                                                <p CLASS="asesoria1" style="color: rgb(249, 249, 249);text-align: justify;">Confía en las manos de un experto en seguridad para ayudarte a tomar la mejor decisión.</p>
                                                <br><br><br><br><p class="negra" style="color:rgb(43, 15, 1) ";><img src="https://vcam.cl/RecursosWebPrincipal/img/fono.png" height="28" width="43">&nbsp;&nbsp;Fono: +56 9 989 30 910&nbsp;&nbsp;&nbsp;&nbsp;<img src="https://vcam.cl/RecursosWebPrincipal/img/gmail.png" height="21" width="36">&nbsp;Correo: contacto.vcam@gmail.com</p>
                                            </div>                             
                            </div>
                    </div>
          
     </main>
<!---Servicios-->
    <div class="servicios" id="Servicios">
            <div class="container-lg">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section_title text-center mb-100">
                            <br><br><br><br><br><h1 style="color: #362052;">SERVICIOS</h1>
                            <h2 class="wow fadeInUp" data-wow-delay=".1s" data-wow-duration="1s">Más seguridad, cuida lo mas preciado, lo que amas y protege tu vida.</h2>
                        </div>
                    </div>
                </div>    
                             <div class="row">

                                                        <div class="col d-flex align-items-center justify-content-center">
                                                            <div class="col-xl-12 col-md-10">
                                                                <div class="single_service text-center wow fadeInLeft" data-wow-delay=".1s" data-wow-duration="1.2s">
                                                                    <img src="https://vcam.cl/RecursosWebPrincipal/img/servicio1.png" alt="Alarmas" class="rounded" height="280" width="310">
                                                                    <h3>TODO TIPO DE ALARMAS</h3>
                                                                    <p class="agranda">Instalamos alarmas según las necesidades, estudiamos los puntos vulnerables para entregar la máxima protección.</p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col d-flex align-items-center justify-content-center">
                                                            <div class="col-xl-12 col-md-10">
                                                                <div class="single_service text-center wow fadeInLeft" data-wow-delay=".1s" data-wow-duration="1.2s">
                                                                    <img src="https://vcam.cl/RecursosWebPrincipal/img/servicio2.png" alt="Alarmas" class="rounded" height="280" width="310">
                                                                    <h3>CAMARAS DE SEGURIDAD CCTV</h3>
                                                                    <p class="agranda">Poseemos los mejores distribuidores de cámaras, cotice gratis la factibilidad técnica de la instalación.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                            </div>
                             <div class="row">

                                                            <div class="col d-flex align-items-center justify-content-center">
                                                                <div class="col-xl-12 col-md-10">
                                                                    <div class="single_service text-center wow fadeInLeft" data-wow-delay=".1s" data-wow-duration="1.2s">
                                                                        <img src="https://vcam.cl/RecursosWebPrincipal/img/servicio4.png" alt="Alarmas" class="rounded" height="280" width="310">
                                                                        <h3>CERCOS ELECTRICOS</h3>
                                                                        <p class="agranda">Se instala a una altura determinada el cual es como medio de seguridad para proteger personas o instalaciones. Los cercos electricos se le cono ce como Valla electrificada.</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col d-flex align-items-center justify-content-center">
                                                                <div class="col-xl-12 col-md-10">
                                                                    <div class="single_service text-center wow fadeInLeft" data-wow-delay=".1s" data-wow-duration="1.2s">
                                                                        <img src="https://vcam.cl/RecursosWebPrincipal/img/servicio3.png" alt="Alarmas" class="rounded" height="280" width="310">
                                                                        <h3>PORTONES ELECTRICOS</h3>
                                                                        <p class="agranda">La instalación que realizamos utiliza materiales de la más alta calidad y funcionalidad, te damos garantía. Contamos con los precios más accesibles</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                </div>
                                <div class="row">

                                    <div class="col d-flex align-items-center justify-content-center">
                                        <div class="col-xl-12 col-md-10">
                                            <div class="single_service text-center wow fadeInLeft" data-wow-delay=".1s" data-wow-duration="1.2s">
                                                <img src="https://vcam.cl/RecursosWebPrincipal/img/servicio5.png" alt="Alarmas" class="rounded" height="280" width="310">
                                                <h3>ALARMAS COMUNITARIAS</h3>
                                                <p class="agranda">Una excelente solución como método disuasivo. Cuando un vecino presencia una situación peligrosa o emergencia, solo deberá activar el control inalámbrico y este activara una alarma sonora y visual que alejara al ladrón y alertara a los vecinos</p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <div class="col-xl-12 col-md-10">
                                            <div class="single_service text-center wow fadeInLeft" data-wow-delay=".1s" data-wow-duration="1.2s">
                                                <img src="https://vcam.cl/RecursosWebPrincipal/img/servicio6.png" alt="Alarmas" class="rounded" height="280" width="310">
                                                <h3>DETECCION DE INCENDIOS</h3>
                                                <p class="agranda">Instalación de centrales de detección de incendio certificadas lazos inteligentes direccionables, sensores de humo, sensores de temperatura, ducto palanca de activación manual, sirenas, balizas, módulos de monitoreo y control.</p>
                                            </div>
                                        </div>
                                    </div>
                             </div>
                             <div class="row">
                             <div class="col d-flex align-items-center justify-content-center">
                                        <div class="col-xl-12 col-md-10">
                                            <div class="single_service text-center wow fadeInLeft" data-wow-delay=".1s" data-wow-duration="1.2s">
                                                <img src="https://vcam.cl/RecursosWebPrincipal/img/servicio7.png" alt="Alarmas" class="rounded" height="280" width="310">
                                                <h3>CONTROL DE ACCESO</h3>
                                                <p class="agranda">Permite controlar que solo personas autorizadas ingresen a determinadas areas de tu empresa o a su hogar. Al utilizar estos sistemas usted evitará robos y controlará a personas que usted autorice a ciertos lugares que ponga estos sistemas.</p>
                                         </div>
                                        </div>

                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <div class="col-xl-12 col-md-10">
                                            <div class="single_service text-center wow fadeInLeft" data-wow-delay=".1s" data-wow-duration="1.2s"><br>
                                            <br><img src="https://vcam.cl/RecursosWebPrincipal/img/servicio8.png" alt="Alarmas" class="rounded" height="280" width="310">
                                                <h3>CITOFONIA VIDEOFONIA</h3>
                                                <p class="agranda">Instalación de centrales telefónicas y sistemas de citofonía para empresas, edificios y comunidades. Contamos con soluciones digitales e IP, incorporación de video en llamadas, integración con equiposde control de acceso y domotica. Además contamos con equipos de control inalámbricos que pueden generar llamadas por la red celular.</p>
                                         </div>
                                        </div>
                                    </div>
                             </div>
                         </div>
           
            </div>
        </div>
<!--Proyectos-->
<div class="proyectos" id="Proyectos"></div>
            <div class="Proyect"><br><br>
           <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="section_title text-center mb-100">
                                                <br><br><br><h2 style="color: #362052;">PROYECTOS</h2>
                                                <h4 class="wow fadeInUp" data-wow-delay=".1s" data-wow-duration="1">Estos son algunos de nuestros proyectos; nos adaptamos a todo tipo de condiciones. Además contamos con personal calificado.</h4>
                                            </div>
                                        </div>
             </div> 

            </div>
            <div class="padre">
                
                
                                <div class="fotorama-wrap">
                                    <div class="fotorama" data-nav="thumbs" data-autoplay="true" data-width="750" data-height="450">
                                                <a href="https://vcam.cl/RecursosWebPrincipal/img/team/1.png" data-caption="Instaladores certificados"></a>
                                                <a href="https://vcam.cl/RecursosWebPrincipal/img/team/2.png" data-caption="Local comercial"></a> 
                                                <a href="https://vcam.cl/RecursosWebPrincipal/img/team/3.png" data-caption="Casas"></a> 
                                                <a href="https://vcam.cl/RecursosWebPrincipal/img/team/4.png" data-caption="Postes a gran altura"></a> 
                                                <a href="https://vcam.cl/RecursosWebPrincipal/img/team/5.png" data-caption="Vista desde un dispositivo movíl"></a>
                                                <a href="https://vcam.cl/RecursosWebPrincipal/img/team/6.png" data-caption="Controles de acceso"></a> 
                                                <a href="https://vcam.cl/RecursosWebPrincipal/img/team/7.png" data-caption="Camaras 360°"></a>
                                                <a href="https://vcam.cl/RecursosWebPrincipal/img/team/8.png" data-caption="Local en Vitacura"></a>
                                                <a href="https://vcam.cl/RecursosWebPrincipal/img/team/9.png" data-caption="Visión Nocturna"></a> 
                                                <a href="https://vcam.cl/RecursosWebPrincipal/img/team/10.png" data-caption="Alarmas antirrobo"></a> 
                                                <a href="https://vcam.cl/RecursosWebPrincipal/img/team/11.png" data-caption="Totus Vitacura"></a> 
                                                <a href="https://vcam.cl/RecursosWebPrincipal/img/team/12.png" data-caption="Instalacion en altura"></a>
                                                <a href="https://vcam.cl/RecursosWebPrincipal/img/team/13.png" data-caption="Trabajando"></a>
                                                <a href="https://vcam.cl/RecursosWebPrincipal/img/team/14.png" data-caption=""></a></a>
                                    </div>
                                </div>
                    
            </div> 
</div>





<!--GANATIA-->
<div class="proyectos" id="Garantia"><br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-lg-4"><br><br><br><br>






                    <div class="col d-flex align-items-center justify-content-center">
                        <div class="col-xl-12 col-md-10">
                            <div class="single_service text-center wow fadeInLeft" data-wow-delay=".1s" data-wow-duration="1.2s">
                                <img src="https://vcam.cl/RecursosWebPrincipal/img/garantia.png" alt="garantía" class="rounded" height="390" width="340">
                              
                               
                            </div>
                        </div>
                    </div>
                </div>
           <div class="col d-flex align-items-center justify-content-center">
                        <div class="col-xl-12 col-md-10">
                            <div class="single_service text-center wow fadeInLeft" data-wow-delay=".1s" data-wow-duration="1.2s">
                                <h2 style="color: #362052;">NUESTRA GARANTIA</h2>
                        <h2 style="padding-left:20px;">¿Que evaluar?</h2>
                                <br><br><p class="agranda" style="color: #130526;">Antes de adquirir un sistema de cámaras para su hogar y empresa. Que todos nuestros productos y servicios están 100% garantizados. Cuentan con garantía de ley vigente determinadas por el Sernac, para ello es importante contar con la boleta o factura del producto comprado o servicio realizado por VCAM. Visualice las cámaras de manera confiable desde cualquier lugar en su teléfono movil y tenga el control siempre de su hogar y empresa 24/7.</p>
                            </div>
                        </div>
                    </div>
            
        </div>
    </div>
</div>
<!--formulario-->
<div class="get_in_tauch_area" data-scroll-index="0" id="Contacto"></div>
                 
                 <form action="procesar.php" method="post" name="frm">
                    
                     <main class="container">
                        <h1 class="contact-title" style="color: #362052;"><br>FORMULARIO DE CONSULTAS</h1>
                                            <div class="row">
                                                        <div class="col-7">
                                                            <div class="form-group"><textarea class="form-control w-100" cols="1" name="mesaje" placeholder="Su Consulta *" rows=11" required></textarea></div>

                                                        </div>
                                                        <div class="col-5">
                                                                        <div class="embed-responsive embed-responsive-16by9">
                                                                            <iframe style="border:0;" allowfullscreen="" class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3324.4056295014334!2d-70.5832611850875!3d-33.568816010982246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc58dc31c443724ad!2zMzPCsDM0JzA3LjgiUyA3MMKwMzQnNTEuOSJX!5e0!3m2!1ses!2scl!4v1644382174297!5m2!1ses!2scl" width="300" height="250" style="border:0;" loading="lazy"></iframe>"
                                                                        </div>
                                                                       
                                                        </div>
                                            </div>
                                            <div class="row">
                                                            <div class="col-4">
                                                                <div class="form-group"><input class="form-control" name="fono" placeholder="Fono *" type="tel" required/></div>
                            
                                                            </div>                  
                                                            <div class="col-3">
                                                                <div class="form-group"><input class="form-control" name="correo" placeholder="Email *" type="email" required/></div>

                                                            </div> 
                                                            <div class="col-5">
                                                                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ubicaci&oacute;n</h4>
                                                                <p class="direcci">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Avenida Los Toros 240. Comuna de Puente Alto.</p>
                                                            </div>


                                            </div>
                                            <div class="row">
                                                            <div class="col-7">
                                                                <div class="form-group"><input class="form-control" name="nombre" placeholder="Su Nombre *" type="text" required/></div>

                                                            </div> 
                                                            <div class="col-5">
                                                            <div class="media contact-info">
                                                                <span class="contact-info__icon"></span>
                                                                <div class="media-body">
                                                                    <h4><img src="https://vcam.cl/RecursosWebPrincipal/img/fono.png" height="28" width="43">&nbsp;&nbsp;Tel&eacute;fono</h4>
                                                                    <p style="color: #FF5733;">+56 9 989 30 910</p>
                                                                </div>
                                                            </div>                 
                                            </div>
                                            <div class="row">
                                                            <div class="col-4">
                                                                <input button type="submit" button class="boxed-btn3" value="Enviar">
                                                                <p>Debes llenar todos los campos</p>
                                                            </div> 
                                                            <div class="col-3">
                                                                <div class="media contact-info">
                                                                    <span class="contact-info__icon"><i class="far fa-clock"></i></span>
                                                                    <div class="media-body">
                                                                        <h4>Lunes a Sábado</h4>
                                                                        <p>   de 9 AM - 18 PM</p>
                                                                    </div>
                                                                </div>

                                                            </div>  
                                                            <div class="col-5">
                                                                <div class="media contact-info">
                                                                    <span class="contact-info__icon"></span>
                                                                    <div class="media-body">
                                                                        <h4>&nbsp;&nbsp;&nbsp;<img src="https://vcam.cl/RecursosWebPrincipal/img/gmail.png" height="28" width="43">&nbsp;&nbsp;Correo electr&oacute;nico</h4>
                                                                        <p>&nbsp;&nbsp;&nbsp;<a href="#Contacto">contacto.vcam@gmail.com</a></p>
                                            
                                                                    </div>
                                                                </div>

                                                            </div>
                                            </div>
                                         </form>
                                            
                                                                
                                            

                                
                     </main>
                             
</div>





    <div class="btn-whatsapp">
        <a href="https://api.whatsapp.com/send?phone=+56998930910" target="_blank">
        <img src="http://s2.accesoperu.com/logos/btn_whatsapp.png" alt="">

        
    </a>
    </div>
</div></div>
<!-- footer start -->
<footer class="footer">
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border "></div>
            <div class="row">
                <div class="col-6 align-items-center">
                    <p>Página creada por  <a href="https://tecnomatico.cl">TECNOMATICO.CL</a>
                        
                   </p>
                </div>
            </div>
        </div>
    </div>
</footer>


<!--/ footer end  -->
<!-- JS here -->
<script src="https://vcam.cl/RecursosWebPrincipal/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/vendor/jquery-1.12.4.min.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/popper.min.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/bootstrap.min.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/owl.carousel.min.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/isotope.pkgd.min.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/ajax-form.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/waypoints.min.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/jquery.counterup.min.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/imagesloaded.pkgd.min.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/scrollIt.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/jquery.scrollUp.min.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/wow.min.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/nice-select.min.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/jquery.slicknav.min.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/jquery.magnific-popup.min.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/plugins.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/gijgo.min.js"></script>
<!--contact js-->
<script src="https://vcam.cl/RecursosWebPrincipal/js/contact.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/jquery.ajaxchimp.min.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/jquery.form.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/jquery.validate.min.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/mail-script.js"></script>
<script src="https://vcam.cl/RecursosWebPrincipal/js/main.js"></script>



</body>
</html>