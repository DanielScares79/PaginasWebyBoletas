<?php
    session_start();
    $mysqli=mysqli_connect("localhost","tecnomat","oriOn1344()","tecnomat_datos");

?>
<?php
$link ='mysql:host=localhost;dbname=tecnomat_datos';
$usuario='tecnomat';
$pass ='oriOn1344()';
try{$pdo =new PDO($link,$usuario,$pass);}
catch (PDOException $e) {
    print "!Error al conectar:". $e->getMessage(). "<br/>";
    die();
}?>