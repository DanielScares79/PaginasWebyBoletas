Nombre: <?php echo htmlspecialchars($_POST['nombre']);echo $d."<br />";?>
Correo   : <?php echo htmlspecialchars($_POST['correo']);echo $d."<br />";?>
Consulta : <?php echo htmlspecialchars($_POST['mesaje']);echo $d."<br />";?>
Telefono : <?php echo htmlspecialchars($_POST['fono']);echo $d."<br />";?>
 <?php
$headers .= "Content-type: text/html; charset=utf-8 \r\n";
$headers .= ($_POST['mesaje']);
$headers .= ($_POST['fono']);
$to = "contacto@pulgaropuesto.cl";
$subject = ($_POST['nombre']);
$txt = ($_POST['correo']);
if($subject == null || $txt == null || $headers == null) {
echo '<span style="color:red; font-size:25px;">No ha sido enviado. Intente nuevamente llenando todos los campos  '.$to.'</span>';
} else {
mail($to,$subject,$txt,$headers);
echo $d."<br />";
echo '<span style="color:blue; font-size:15px;">Un integrante de nuestro equipo se pondrá en contacto contigo para ayudarte con tu proyecto. Escríbenos a través del formulario de contacto.</span>';
}
?>
<html>
    <head>
        <body>
            <meta http-equiv="refresh" content="6; url=https://www.pulgaropuesto.cl/">
        </body>
    </head>
</html>
