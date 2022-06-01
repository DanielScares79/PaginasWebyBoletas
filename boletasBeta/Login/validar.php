<?php
$login=$_POST['u1']; 
$clave1=$_POST['pwd'];
session_start();
$base = "ventas";
$key1 = "";
$usuario = "root";
$_SESSION['u1']=$login;
$conexion=mysqli_connect("localhost",$usuario,$key1,$base);



$consulta=("SELECT * FROM usuarios WHERE usuario='$login' and clave='$clave1'");
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);
if($filas){
    header("location:home.php");
}else{
     include("index.php");
    ?>
    <h1 class="bad">Error en la autentificacion</h1>
    <?php
    
    //echo "usuario es $clave1"; 
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>