<?php
//Esto es para que los usuarios normales no puedan acceder a archivos internos directamente por la url
if (!defined('ACC_ARCH')) exit;
?>
<script>
    var global_vars = {
        web_url: '<?php echo WEB_URL; ?>',
        userid: 0
    };

    function phdProf(el) {
        el.setAttribute('src', global_vars.web_url + '/assets/img/placeholderuser.png');
    }

    function phdatSy(el) {
        el.setAttribute('src', global_vars.web_url + '/assets/img/placeholdersync.png');
    }
</script>

<?php if (!IS_LOCALHOST) { ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-211586168-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-211586168-1');
    </script>
<?php } ?>