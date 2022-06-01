<?php
error_reporting(E_ALL);

    include 'conexion.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta Content-Type: "text/javascript">
    <meta content="text/html; charset=UTF-8; X-Content-Type-Options=nosniff" http-equiv="Content-Type" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Ver Ventas</title>
</head>
<body style="background-color: rgba(128,128,128,0.7);">
<div style="width:1320px; margin:0 auto; border:1px solid #FCC; padding: 10px;">
<?php date_default_timezone_set('America/Santiago');$Date = date('Y-m-d');$Date1 = date('d-m-Y');?>
<CENTER><div><h1><B>LISTAR VENTAS</B></h1></div></CENTER><br>
    <div class="container">
            <div class="row">
                        <div class="col-sm-2">
                                <form action="ListarVentas.php" method="post" name="frmVentas" id="frmVentas">
                                                <div><b>DÍA DE HOY</b></div>
                                                 <br><input type="submit" name="frmVentas" id="frmVentas"class="btn btn-primary" value ="<?php echo $Date1;?>"><br><br>
                                </form>
                        </div> 
          
        

                
                       
                        <div class="col-sm-3">
                                <form action="ListarVentas.php" method="post" name="frmVentasxfecha" id="frmVentas">
                                                <div><b>VENTAS POR FECHA</b></div>
                                                <input type="date" id="fecha1" name="fecha1">
                                                <input type="date" id="fecha2" name="fecha2"> 
                                                <input type="submit" name="frmVentasxfecha" id="frmVentasxfecha"class="btn btn-primary" value ="Buscar"><br><br>             
                                                
                                </form>
                        </div> 
                        <div class="col-sm-4">
                                <form action="ListarVentas.php" method="post" name="frmNulasHoy" id="frmNulasHoy">
                                                <div><b>NULAS HOY</b></div><br>
                                                &nbsp;&nbsp;&nbsp;<input type="submit" name="frmNulasHoy" id="frmNulasHoy"class="btn btn-warning" value ="Buscar"><br><br>             
                                                
                                </form>
                        </div> 
                        <div class="col-sm-3">
                                <form action="ListarVentas.php" method="post" name="frmNulasxfecha" id="frmNulasxfecha">
                                                <div><b>NULAS POR FECHA</b></div>
                                                <input type="date" id="fecha1" name="fecha1">
                                                <input type="date" id="fecha2" name="fecha2"> 
                                                <input type="submit" name="frmNulasxfecha" id="frmNulasxfecha"class="btn btn-warning" value ="Buscar"><br><br>             
                                                
                                </form>
                        </div> 
            </div>             
    </div> 

    <div><!--Busca x fecha actual-->
                                                <?php
                                                 $TotalVentas = 0;
                                                 
                                                   if (isset($_POST['frmVentas'])) {//post todos los productos
                                                    ?>
                                                        
                                                        
                                                        <?php
                                                               
                                                                if ($resultado = $mysqli->query("SELECT * FROM ventas_diarias WHERE nula ='no' AND fecha = '$Date' ORDER BY producto"))
                                                                {
                                                         ?>              
                                                                    <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <div><h5><b>Producto</b><h5></div>
                                                                        </div>
                                                                        <div class="col-2">
                                                                             <div><h5><b>Precio</b><h5></div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div><h5><b>Cantidad</b><h5></div>
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <div><h5><b>Total</b><h5></div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div><h5><b>Nula</b><h5></div>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                        <?php
                                                                        //Ejemplo para imprimir los datos. El bucle recorre todos los registros.
                                                                        while($fila = $resultado->fetch_assoc()) 
                                                                                {
                                                        ?>
                                                                                    <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="col-3">
                                                                                            <?php echo $fila['producto'];?><hr>
                                                                                        </div>
                                                                                        <div class="col-2">
                                                                                            <?php echo $fila['precio'];?><hr>
                                                                                        </div>
                                                                                        <div class="col-1">
                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fila['unidades'];?><hr>
                                                                                        </div>
                                                                                        <div class="col-2">
                                                                                            <?php $tot = $fila['unidades'] * $fila['precio'];
                                                                                           
                                                                                            $TotalVentas = $tot +  $TotalVentas;
                                                                                            $numero = number_format($tot);
                                                                                            echo '$ '.$numero;?><hr>
                                                                                        </div>
                                                                                        <div class="col-1">
                                                                                            <?php echo $fila['nula'];?><hr>
                                                                                        </div>
                                                                                    </div>
                                                                                    </div>
                                                            <?php
                                                                                }
                                                                               
                                                                                $numeroTOT = number_format($TotalVentas);
                                                            ?>
                                                                                <div class="container">
                                                                                        <center>
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                            <b>&nbsp;&nbsp;&nbsp;<?php echo 'TOTAL '.'$ '.  $numeroTOT;?></b>
                                                                                            </div>
                                                                                        </div>
                                                                                        </center>
                                                                                </div>
                                                          <?php
                                                                   }
                                                                   $resultado->close();
                                                                   $mysqli-> close();
                                                              
                                                                exit();
                                                    }
                                                           ?> 
                                         
 </div><!--FIN Busca x fecha actual-->


 <div><!--Busca entre fecha-->
                                                <?php
                                                 $TotalVentas = 0;
                                                
                                                   if (isset($_POST['frmVentasxfecha'])) {//post todos los productos
                                                    ?>
                                                        
                                                        
                                                        <?php
                                                               $date1= $_POST['fecha1'];
                                                               $date2 = $_POST['fecha2'];
                                                               
                                                                $nul = "no";
                                                                if ($resultado = $mysqli->query("SELECT producto, precio, unidades, fecha, nula FROM ventas_diarias WHERE (nula = '$nul') and (fecha between '$date1' and '$date2') ORDER BY producto"));
                                                                {
                                                         ?>              
                                                                    <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <div><h5><b>Producto</b><h5></div>
                                                                        </div>
                                                                        <div class="col-2">
                                                                             <div><h5><b>Precio</b><h5></div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div><h5><b>Cantidad</b><h5></div>
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <div><h5><b>Total</b><h5></div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div><h5><b>Nula</b><h5></div>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                        <?php
                                                                        //Ejemplo para imprimir los datos. El bucle recorre todos los registros.
                                                                        while($fila = $resultado->fetch_assoc()) 
                                                                                {
                                                        ?>
                                                                                    <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="col-3">
                                                                                            <?php echo $fila['producto'];?><hr>
                                                                                        </div>
                                                                                        <div class="col-2">
                                                                                            <?php echo $fila['precio'];?><hr>
                                                                                        </div>
                                                                                        <div class="col-1">
                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fila['unidades'];?><hr>
                                                                                        </div>
                                                                                        <div class="col-2">
                                                                                            <?php $tot = $fila['unidades'] * $fila['precio'];
                                                                                           
                                                                                            $TotalVentas = $tot +  $TotalVentas;
                                                                                            $numero = number_format($tot);
                                                                                            echo '$ '.$numero;?><hr>
                                                                                        </div>
                                                                                        <div class="col-1">
                                                                                            <?php echo $fila['nula'];?><hr>
                                                                                        </div>
                                                                                    </div>
                                                                                    </div>
                                                            <?php
                                                                                }
                                                                               
                                                                                $numeroTOT = number_format($TotalVentas);
                                                            ?>
                                                                                <div class="container">
                                                                                        <center>
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                            <b>&nbsp;&nbsp;&nbsp;<?php echo 'TOTAL '.'$ '.  $numeroTOT;?></b>
                                                                                            </div>
                                                                                        </div>
                                                                                        </center>
                                                                                </div>
                                                          <?php
                                                                   }
                                                                   $resultado->close();
                                                                   $mysqli-> close();
                                                                   exit();
                                                    }
                                                           ?> 
                                         
 </div><!--FIN Busca entre fechas-->
 <div><!--Nulas x fecha actual-->
                                                <?php
                                                 $TotalVentas = 0;
                                                 
                                                   if (isset($_POST['frmNulasHoy'])) {//post todos los productos
                                                    ?>
                                                        
                                                        
                                                        <?php
                                                       
                                                                
                                                                if ($resultado = $mysqli->query("SELECT * FROM ventas_diarias WHERE nula ='si' AND fecha = '$Date' ORDER BY producto"))
                                                                {
                                                         ?>              
                                                                    <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <div><h5><b>Producto</b><h5></div>
                                                                        </div>
                                                                        <div class="col-2">
                                                                             <div><h5><b>Precio</b><h5></div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div><h5><b>Cantidad</b><h5></div>
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <div><h5><b>Total</b><h5></div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div><h5><b>Nula</b><h5></div>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                        <?php
                                                                        //Ejemplo para imprimir los datos. El bucle recorre todos los registros.
                                                                        while($fila = $resultado->fetch_assoc()) 
                                                                                {
                                                        ?>
                                                                                    <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="col-3">
                                                                                            <?php echo $fila['producto'];?><hr>
                                                                                        </div>
                                                                                        <div class="col-2">
                                                                                            <?php echo $fila['precio'];?><hr>
                                                                                        </div>
                                                                                        <div class="col-1">
                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fila['unidades'];?><hr>
                                                                                        </div>
                                                                                        <div class="col-2">
                                                                                            <?php $tot = $fila['unidades'] * $fila['precio'];
                                                                                           
                                                                                            $TotalVentas = $tot +  $TotalVentas;
                                                                                            $numero = number_format($tot);
                                                                                            echo '$ '.$numero;?><hr>
                                                                                        </div>
                                                                                        <div class="col-1">
                                                                                            <?php echo $fila['nula'];?><hr>
                                                                                        </div>
                                                                                    </div>
                                                                                    </div>
                                                            <?php
                                                                                }
                                                                               
                                                                                $numeroTOT = number_format($TotalVentas);
                                                            ?>
                                                                                <div class="container">
                                                                                        <center>
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                            <b>&nbsp;&nbsp;&nbsp;<?php echo 'TOTAL '.'$ '.  $numeroTOT;?></b>
                                                                                            </div>
                                                                                        </div>
                                                                                        </center>
                                                                                </div>
                                                          <?php
                                                                   }
                                                              
                                                                   $resultado->close();
                                                                   $mysqli-> close();
                                                                   exit();
                                                    }
                                                           ?> 
                                         
 </div><!--Nulas x fecha actual-->
 <div><!--Busca entre fecha-->
                                                <?php
                                                 $TotalVentas = 0;
                                                 
                                                   if (isset($_POST['frmNulasxfecha'])) {//post todos los productos
                                                    ?>
                                                        
                                                        
                                                        <?php
                                                               $date1= $_POST['fecha1'];
                                                               $date2 = $_POST['fecha2'];
                                                               
                                                                $nul = "si";
                                                                if ($resultado = $mysqli->query("SELECT producto, precio, unidades, fecha, nula FROM ventas_diarias WHERE (nula = '$nul') and (fecha between '$date1' and '$date2') ORDER BY producto"));
                                                                {
                                                         ?>              
                                                                    <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <div><h5><b>Producto</b><h5></div>
                                                                        </div>
                                                                        <div class="col-2">
                                                                             <div><h5><b>Precio</b><h5></div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div><h5><b>Cantidad</b><h5></div>
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <div><h5><b>Total</b><h5></div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div><h5><b>Nula</b><h5></div>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                        <?php
                                                                        //Ejemplo para imprimir los datos. El bucle recorre todos los registros.
                                                                        while($fila = $resultado->fetch_assoc()) 
                                                                                {
                                                        ?>
                                                                                    <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="col-3">
                                                                                            <?php echo $fila['producto'];?><hr>
                                                                                        </div>
                                                                                        <div class="col-2">
                                                                                            <?php echo $fila['precio'];?><hr>
                                                                                        </div>
                                                                                        <div class="col-1">
                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fila['unidades'];?><hr>
                                                                                        </div>
                                                                                        <div class="col-2">
                                                                                            <?php $tot = $fila['unidades'] * $fila['precio'];
                                                                                           
                                                                                            $TotalVentas = $tot +  $TotalVentas;
                                                                                            $numero = number_format($tot);
                                                                                            echo '$ '.$numero;?><hr>
                                                                                        </div>
                                                                                        <div class="col-1">
                                                                                            <?php echo $fila['nula'];?><hr>
                                                                                        </div>
                                                                                    </div>
                                                                                    </div>
                                                            <?php
                                                                                }
                                                                               
                                                                                $numeroTOT = number_format($TotalVentas);
                                                            ?>
                                                                                <div class="container">
                                                                                        <center>
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                            <b>&nbsp;&nbsp;&nbsp;<?php echo 'TOTAL '.'$ '.  $numeroTOT;?></b>
                                                                                            </div>
                                                                                        </div>
                                                                                        </center>
                                                                                </div>
                                                          <?php
                                                                   }
                                                              
                                                                   $resultado->close();
                                                                   $mysqli-> close();
                                                                   exit();
                                                    }
                                                           ?> 
                                         
 </div><!--FIN Nulas entre fechas-->
</body>
</html>