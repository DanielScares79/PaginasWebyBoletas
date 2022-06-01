<?php if (!defined("TECNOMATICO")) exit;
?>

<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background: url(paisaje.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .card {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }

    @media screen and (min-width: 720px) {
        .card {
            max-width: 500px;
        }
    }
</style>
<div class="card mb-2 mt-2">
    <div class="card-body text-center">
        <h1>Bienvenido(a)</h1>
        <p class="lead">Aqu&iacute; podr&aacute;s ver tu nota de avance en el sistema de Compumat.</p>
        <p class="lead">Primero debes identificarte.</p>
        <form method="post">
            <div class="d-flex justify-content-center">
                <input type="text" class="form-control" name="rutUser" placeholder="Rut (Sin puntos)" style="max-width:9em" maxlength="8" />
                <h3>-</h3>
                <input type="text" class="form-control" name="digVeri" placeholder="Digito Verificador" style="max-width:4em" maxlength="1" />
            </div>
            <select class="custom-select mb-1" style="max-width:13em" id="edutype" name="edutype">
                <option value="0" selected disabled>Seleccione Nivel</option>
                <option value="1">Soy alumno de media.</option>
                <option value="2">Soy alumno de b&aacute;sica.</option>
            </select>
            <div class="mt-1">
                <select class="custom-select" style="max-width:13em;display:none" id="cursos_basica">
                    <option value="0" disabled>Seleccione curso</option>
                    <?php
                    foreach ($cursos["basica"] as $key => $val) {
                        echo '<option value="bas_' . $key . '">' . $val . '</option>';
                    }
                    ?>
                </select>
                <select class="custom-select" style="max-width:13em;display:none" id="cursos_media">
                    <option value="0">Seleccione curso</option>
                    <?php
                    foreach ($cursos["media"] as $key => $val) {
                        echo '<option value="med_' . $key . '">' . $val . '</option>';
                    }
                    ?>
                </select>
            </div>
            <hr />
            <a href="#!" id="verNotas" class="btn btn-primary">Ver Notas</a>
        </form>
    </div>
</div>
<script>
    function dgv(T) //digito verificador
    {
        var M = 0,
            S = 1;
        for (; T; T = Math.floor(T / 10))
            S = (S + T % 10 * (9 - M++ % 6)) % 11;
        //return S?S-1:'k';

        return (S ? S - 1 : 'k');
    }
    $(function() {
        $('#verNotas').click(function() {
            var continueFo = true;
            $("form").find("input").each(function() {
                if (continueFo != false && ($(this).val().length < parseInt($(this).attr('maxlength')))) {
                    alert('Debes ingresar tu rut.');
                    continueFo = false;
                }
            });
            $("form").find("select").filter('[name]').each(function() {
                if (continueFo != false && ($(this).val() === null || $(this).val() == "0")) {
                    alert('Debes seleccionar tu curso y nivel de educacion.');
                    continueFo = false;
                }
            });
            if (continueFo == false) return false;
            if (/^\d+$/.test($('input[name="rutUser"]').val()) != true) {
                alert('Tu rut no es valido, recuerda que no deben ir puntos en el.');
                continueFo = false;
            } else if (/^\d+$/.test($('input[name="digVeri"]').val()) != true && $('input[name="digVeri"]').val().toLowerCase() != "k") {
                alert('Tu digito verificador no es valido.');
                continueFo = false;
            } else if (dgv($('input[name="rutUser"]').val()) != $('input[name="digVeri"]').val().toLowerCase()) {
                alert('Tu digito verificador no coincide con tu rut');
                continueFo = false;
            }
            if (continueFo == false) return false;
            $('form').submit();
            return false;
        });
        $('#edutype').change(function() {
            if ($(this).val() == "2") {
                $('#cursos_media').val('0').removeAttr('name').hide();
                $('#cursos_basica').val('0').attr('name', 'curso').show();
            } else {
                $('#cursos_media').val('0').attr('name', 'curso').show();
                $('#cursos_basica').val('0').removeAttr('name').hide();
            }
        });
    });
</script>