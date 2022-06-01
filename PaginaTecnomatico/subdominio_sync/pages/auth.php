<?php
//Pagina de inicio

//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;

//Verificamos que el usuario no tenga su sesion iniciada
if ($tmUser->logged) {
    redirectToUrl(WEB_URL . '/panel/?ref=logged');
    exit;
}

$datosFooter = array(
    "customjs" => "login.js"
);

$datosHeader = array(
    "titulo" => "Acceder en Tecnomatico Sync",
    "customcss" => "login.css"
);
require SECTIONS_DIR . DIRECTORY_SEPARATOR . 'header.php';
?>
<div class="container-signin text-center container">
    <div class="card  animate__animated animate__zoomIn">
        <h1>Tecnomatico Sync</h1>
        <form>
            <h1 class="h3 mb-3 fw-normal" data-ajax="dummylogin">¡Hola de nuevo!</h1>
            <p>Inicie sesi&oacute;n con su cuenta</p>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput">Correo Electr&oacute;nico</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass">
                <label for="floatingPassword">Contrase&ntilde;a</label>
            </div>
            <div class="form-check justify-content-center d-flex mb-2">
                <input class="form-check-input me-2" type="checkbox" value="ok" id="checkboxRemember" name="rememberme" checked>
                <label class="form-check-label" for="checkboxRemember">
                    Mantener sesi&oacute;n iniciada
                </label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar Sesi&oacute;n</button>
        </form>
    </div>
    <p class="my-3 text-muted animate__animated animate__zoomIn"><small><a href="<?php echo WEB_URL; ?>/auth/recover/">Recuperar contrase&ntilde;a</a> &middot; <a href="https://tecnomatico.cl/support/?helpwith=tmsynclogin" target="_blank">Ayuda</a><br />Copyright &copy; Tecnomatico <?php echo date("Y"); ?></small></p>
</div>
<div id='recaptcha' class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_PUBLIC; ?>" data-callback="onValidateCaptcha" data-size="invisible"></div>
<script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>
<?php
require SECTIONS_DIR . DIRECTORY_SEPARATOR . 'footer.php';
