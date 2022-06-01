<?php
$email_to = "contacto.vcam@gmail.com";
$email_subject = "Consulta desde Vcam.cl";
$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Mensaje: " . $_POST['mesaje'] . "\n";
$email_message .= "Nombre: " . $_POST['nombre'] . "\n";
$email_message .= "E-mail: " . $_POST['correo'] . "\n";
$email_message .= "Teléfono: " . $_POST['fono'] . "\n";
@mail($email_to, $email_subject, $email_message);
echo "¡Listo ha sido enviado";
echo '<script type="text/javascript">
function redireccionarPagina() {
  window.location = "https://www.vcam.cl";
}
setTimeout("redireccionarPagina()", 4000);
  </script>';
?>