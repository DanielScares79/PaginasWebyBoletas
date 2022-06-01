<?php
error_reporting(E_ALL);

    include 'conexion.php';

    $query=mysqli_query($mysqli,"SELECT * FROM productosdsc ORDER BY producto");
    $query1=mysqli_query($mysqli,"SELECT * FROM productosdsc ORDER BY producto");
    $query3=mysqli_query($mysqli,"SELECT * FROM codventas");
    $cont = 0;
    $ArrayCodigo = "";
    $ArrayStock ="";

?>  
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta Content-Type: "text/javascript">
    <meta content="text/html; charset=UTF-8; X-Content-Type-Options=nosniff" http-equiv="Content-Type" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    

    <title>Venta de Productos</title>
    
    </head>
<body style="background-color: rgba(128,128,128,0.7);">
    <div><center><h2><b>VENTA DE PRODUCTOS</b><h2></center></div><br>
    <div style="width:1150px; margin:0 auto; border:1px solid #FCC; padding: 10px;">
        
        <div class="container">
           <div class="row">
            <div class="col-sm-4">
                    <form action="GestionVentas.php" method="post" name="frmNuevaVenta">
                                                            
                            <select name="NuevaV" class="text-uppercase">
                                <?php 
                                   while($datos = mysqli_fetch_array($query))
                                    {
                                ?>
                                        <option value="<?php echo $datos['id']?>">
                                        <?php echo $datos['producto'];
                                ?>      
                                        </option>
                                        
                                <?php
                                    }
                                                           
                                                             
                                                             
                                ?> 
                                        
                            </select>
                            <input type="submit" class="btn btn-primary" value ="Nueva Venta">
                                                        
    
                     </form>
                           
             </div> 
             <div class="col-sm-4" id ="divagrega">
             <form action="GestionVentas.php" method="post" name="Agegaproducto">
                            <select name="Agregaproducto"  class="text-uppercase">
                                <?php 
                                   while($datos1 = mysqli_fetch_array($query1))
                                    {
                                ?>
                                        <option value="<?php echo $datos1['id']?>">
                                        <?php echo $datos1['producto'];?>
                                        </option>
                                        
                                <?php
                                    }
                                ?> 
                                        
                            </select>
                            <input type="submit" class="btn btn-warning" value ="+ Productos">
                            
 
                     </form>

            </div>



            



            <script>document.getElementById("divagrega").style.display = "none";</script>
            <div class="col-sm-4" id ="divanula">
                    <form action="GestionVentas.php" method="post"  name="frmAnulaVentas">
                            <select name="AnulavActual" style="visibility:hidden" class="text-uppercase">
                                <?php 
                                   while($datos = mysqli_fetch_array($query3))
                                    {
                                ?>
                                        <option type="hidden" value="<?php echo $datos['codi']?>">
                                        <?php echo $datos['codi'];?>
                                        <?php $Codigopaanularlastventa = $datos['codi'];?>
                                        </option>
                                        
                                <?php
                                    }
                                ?> 
                                        
                            </select>
                            <input type="submit" class="btn btn-danger" value ="Anula última venta">
                                                        
    
                     </form>
             </div> 







           </div> 
        </div> 
                                    
                                     <div><!--anular venta actual-->
                                                   <?php
                                                    
                                                       if (isset($_POST['AnulavActual']))
                                                       {
                                                        // echo $_SESSION['articulos'];
                                                            if ($_SESSION['articulos'] == 1)
                                                            {
                                                            $Anulidad = "si";
                                                            $U = $_SESSION['CantArt'];
                                                            $P = $_SESSION['CodArt'];
                                                            //Anula venta en ventas diarias
                                                            $Sql_UpdateANULA ='UPDATE `ventas_diarias` SET `nula` = (?) WHERE cod = (?)';
                                                            $Prepara_ANULA = $pdo->prepare($Sql_UpdateANULA);
                                                            $Prepara_ANULA->execute(array($Anulidad,$Codigopaanularlastventa));
                                                            //actualiza las unidades que no se vendieron en los productos ya que se anula la venta  plop                                                      
                                                            $Sql_noAnula ='UPDATE `productosdsc` SET `cantidad` = (?) WHERE id = (?)';
                                                            $Prep_UpdateNull = $pdo->prepare($Sql_noAnula);
                                                            $Prep_UpdateNull->execute(array($U,$P));
                                                            

                                                            ?><b><?php echo 'Última Venta Anulada Correctamente!, Stock Restaurado.';?></b>
                                                            <?php
                                                            }else
                                                            {
                                                               foreach ($_SESSION['ArrayCodProductos'] as $m => $value)
                                                                
                                                                {//Busca el Stock del producto para Sumar las unidades devueltas
                                                                   $nn = $_SESSION['ArrayCodProductos'][$m];
                                                                   $KK = $_SESSION['ArrayUnidaProductos'][$m];
                                                                    $query=mysqli_query($mysqli,"SELECT id, cantidad FROM productosdsc WHERE id = $nn");
                                                                     while($datos = mysqli_fetch_array($query))
                                                                    {
                                                                        $ParaSumar = $datos['cantidad'];
                                                                    }//actualiza las unidades que no se vendieron ya que se anula la venta plop
                                                                    $Sql_noAnula ='UPDATE `productosdsc` SET `cantidad` = (?) WHERE id = (?)';
                                                                    $Prep_UpdateNull = $pdo->prepare($Sql_noAnula);
                                                                    $Prep_UpdateNull->execute(array($ParaSumar + $KK,$_SESSION['ArrayCodProductos'][$m]));
                                                                    $Anulidad = "si";
                                                                    //Codigo de ventas array para poner "si" en tabla ventas diarias y anular
                                                                    $nn = $_SESSION['IdProductVentas'][$m];
                                                                    $Sql_UpdateANULA ='UPDATE `ventas_diarias` SET `nula` = (?) WHERE id = (?)';
                                                                    $Prepara_ANULA = $pdo->prepare($Sql_UpdateANULA);
                                                                    $Prepara_ANULA->execute(array($Anulidad,$nn));
                                                                 
                                                                  
                                                                }
                                                             
                                                             
                                                                echo ' Ventas Anuladas Correctamente, También Se Restauro El Stock!';
                                                            }

                                                        }
                                                        
                                                    ?>  
                                                
                                                        
                                                        

  
                                         
                                
                                    </div><!--Fin anular venta actual-->


                                    <div><!--buscar desde Select para nueva venta-->
                                                   <?php

                                                        
                                             if (isset($_POST['NuevaV']))
                                            {
                                                       foreach ($_POST as &$valor){$valor;}
                                                    ?>
                                                        <form action="GestionVentas.php" method="post" id="FormVentas" name="FormVentas" >
                                                    <?php
                                             
                                                        $query2=mysqli_query($mysqli,"SELECT codi FROM codventas");
                                                        while($datos = mysqli_fetch_array($query2))
                                                            {
                                                    ?>   
                                                        <div class="form-group"><input class="form-control text-uppercase" name="CodVentaenAgrega"  readonly value="<?php echo $datos['codi'];?>" ></div>
                                                        <?php }?>
                                                    <?php
                                                        $query=mysqli_query($mysqli,"SELECT * FROM productosdsc WHERE id = $valor");
                                                        while($datos = mysqli_fetch_array($query))
                                                            {
                                                          
                                                
                                                    ?>
                                                             
                                                             <div class="row ">
                                                                    
                                                                    <div class="col-sm-1 mt-2">
                                                                    <div class="form-group">STOCK<input class="form-control text-uppercase" name="cantidadenstock"  readonly value="<?php echo $datos['cantidad'];?>" ></div>
                                                                    </div>
                                                                    <div class="form-group"><input class="form-control text-uppercase" name="codproducto" type="hidden"  readonly value="<?php echo $datos['id'];?>"></div>
                                                               
                                                                    <div class="col-sm-1 mt-2">
                                                                    <div class="form-group"><input class="form-control text-uppercase" name="dniempresa"  type="hidden" readonly value="<?php echo $datos['dni'];?>" ></div>
                                                                    </div>
                                                                    
                                                             </div>
                                                             <div class="row">
                                                             <div class="col-sm-5 mt-2">
                                                             <div class="form-group">Producto<input class="form-control text-uppercase" name="producto" placeholder="Producto" type="text" readonly value="<?php echo $datos['producto'];?>" required></div>
                                                             </div> 
                                                             <div class="col-sm-3 mt-2">
                                                             <div class="form-group">Precio<input class="form-control" name="precio" placeholder="Precio" type="number" readonly value="<?php echo $datos['precio'];?>" required></div>
                                                             <?php $ValidarPrecio = $datos['precio'];?>
                                                            </div>
                                                             <div class="col-sm-1 mt-2">
                                                             <div class="form-group">Unidades<input class="form-control" name="unidades" placeholder="unidades" type="number" autofocus required onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" /></div>
                                                             </div>
                                                             <div class="col-sm-12 mt-4">
                                                             <?php
                                                             if ($ValidarPrecio == 0){
                                                                 echo "Primero seleccione un Producto!!";
                                                             }else{
                                                              ?>
                                                             <br><input type="submit" class="btn btn-primary" id="Inputagregar" name="FormVentas" value="Guardar">
                                                             
                                                             <?php
                                                             
                                                            }?>
                                                             </form>
                                                             <form action="GestionVentas.php" method="post" id ="formcancela" name = "formcancela"><br>
                                                             <input type="submit" class="btn btn-dark" id ="formcancela" name = "formcancela" value ="Cancela">
                                                             </form>
                                                             </div>
                                                    <?php        
                                                           }
                                            }
                                                            $conn = new mysqli("localhost", "tecnomat", "oriOn1344()", "tecnomat_datos");
                                                            $sql = "SELECT * FROM ventas_diarias";
                                                            if ($result=mysqli_query($conn,$sql))
                                                             {
                                                                $rowcount=mysqli_num_rows($result);
                                                             } 
                                                                date_default_timezone_set('America/Santiago'); 
                                                                $DateAndTime = date('Y-m-d');  
                                                       
                                                    ?>
                                         
                                
                                    </div><!--Fin-->
                                    <div><!--buscar desde Select agregar + ventas-->
                                                   <?php
                                            if (isset($_POST['Agregaproducto']))
                                             {
                                                        foreach ($_POST as &$valor){$valor;}
                                                    ?>  
                                                    <form action="GestionVentas.php" method="post" id="FormnVentas" name="FormnVentas">
                                                    <?php
                                                        $query2=mysqli_query($mysqli,"SELECT * FROM codventas");
                                                        while($datos = mysqli_fetch_array($query2))
                                                        {
                                                    ?>
                                                        <div class="form-group"><input class="form-control text-uppercase" name="CodVentaenAgrega" type="hidden" readonly value="<?php echo $datos['codi'];?>" ></div>
                                                     
                                                        <?php }?>
                                                   <?php
                                                        $query=mysqli_query($mysqli,"SELECT * FROM productosdsc WHERE id = $valor");
                                                        while($datos = mysqli_fetch_array($query))
                                                        {
                                                
                                                    ?>
                                                            <div class="row">
                                                                    <div class="col-sm-1 mt-2">
                                                                    <div class="form-group">Stock<input class="form-control text-uppercase" name="cantidadenstock" readonly value="<?php echo $datos['cantidad'];?>" ></div>
                                                                    </div>
                                                                    <div class="form-group"><input class="form-control text-uppercase" name="codproducto"  type="hidden" readonly value="<?php echo $datos['id'];?>">
                                                                    <div class="col-sm-1 mt-2">
                                                                    <div class="form-group"><input class="form-control text-uppercase" name="dniempresa"  type="hidden" readonly value="<?php echo $datos['dni'];?>" ></div>
                                                                    </div>
                                                                  
                                                            </div>
                                                             <div class="row">
                                                             <div class="col-sm-5 mt-2">
                                                             <div class="form-group">Producto<input class="form-control text-uppercase" name="producto" placeholder="Producto" type="text" readonly value="<?php echo $datos['producto'];?>" required></div>
                                                             </div> 
                                                             <div class="col-sm-3 mt-2">
                                                             <div class="form-group">Precio<input class="form-control" name="precio" placeholder="Precio" type="number" readonly value="<?php echo $datos['precio'];?>" required></div>
                                                             <?php $ValidarPrecio = $datos['precio'];?>
                                                             </div>
                                                             <div class="col-sm-1 mt-2">
                                                             <div class="form-group">Unidades<input class="form-control" name="unidades" placeholder="unidades" type="number" autofocus required onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" /></div>
                                                             </div>
                                                             <div class="col-sm-12 mt-0">
                                                             <?php
                                                             if ($ValidarPrecio == 0){
                                                                 echo "Elija un Producto para agregar a esta venta!!";
                                                                 ?><script>document.getElementById("divagrega").style.display = "block";</script><?php
                                                             }else{?>
                                                             <br><input type="submit" class="btn btn-warning" id="FormnVentas" name="FormnVentas" value="Guardar">
                                                             <?php
                                                             }?>
                                                             </form>
                                                             </div>
                                                    <?php    
                                                          
                                                         }
                                            }
                                                        date_default_timezone_set('America/Santiago'); 
                                                        $DateAndTime = date('Y-m-d');  
                                                       
                                                    ?>
                                         
                                
                                    </div><!--Fin-->
                                    
                                    <script>document.getElementById("divanula").style.display = "none";</script>
                                        <div><!--agrega registro-->
                                     
                                            <?php

                                                if (isset($_POST["FormVentas"])!="")  
                                                {
                                                    $_SESSION['ArrayCodProductos'][] = "";
                                                    $_SESSION['ArrayUnidaProductos'][] = 0;
                                                    foreach ($_SESSION['ArrayCodProductos'] as $i => $value) {
                                                        unset($_SESSION['ArrayCodProductos'][$i]);
                                                    }
                                                    foreach ($_SESSION['ArrayUnidaProductos'] as $i => $value) {
                                                        unset($_SESSION['ArrayUnidaProductos'][$i]);
                                                    }
                                                    $_SESSION['articulos']= 1;
                                                    $_SESSION['CodArt']= $_POST['codproducto'];
                                                    $_SESSION['CantArt']=  $_POST['cantidadenstock'];
                                                    $_SESSION['ArrayCodProductos'][$_SESSION['articulos']] = $_POST['codproducto'];
                                                    
                                                    $Stock = $_POST['cantidadenstock'];
                                                    $UnidadesProduc = $_POST['unidades'];
                                                   
                                                    $int1 = (int)$Stock;
                                                    $int2 = (int)$UnidadesProduc;
                                                    $Stock1 = $int1 - $int2;
                                                    $Stock2 = $Stock1;
                                                    $_SESSION['ArrayUnidaProductos'][$_SESSION['articulos']] = $_POST['unidades'];
                                                    if($Stock1<8){
                                                        echo '<script>alert("Quedan pocos productos, menos de 8!")</script>';
                                                    }
                                                    if($Stock1<0){
                                                        echo '<script>alert("La venta supera la cantidad de Stock, la venta será realizada igualmente!")</script>';
                                                        echo '<script>alert("Asegurese de agregar mas productos al Stock, para no ver este mensaje!")</script>';
                                                    }
                                                    $NumCodi = $_POST['codproducto'];
                                                    $dni =  $_POST['dniempresa'];
                                                    $ValPrecio = $_POST['precio'];
                                                    $NomProducto = $_POST['producto'];
                                                    $FechaVenta = $DateAndTime;
                                                    $Sql_Agregar ='INSERT INTO ventas_diarias (cod,idproducto,dni,producto,unidades,precio,fecha) VALUES (?,?,?,?,?,?,?)';
                                                    $Prepara_Agregar = $pdo->prepare($Sql_Agregar);
                                                    $Prepara_Agregar->execute(array($rowcount,$NumCodi,$dni,$NomProducto,$UnidadesProduc,$ValPrecio,$FechaVenta));
                                                    //Actualizamos el codigo de la venta para saber si seguimos agregando productos a la misma
                                                    $Sql_Update1 ='UPDATE `codventas` SET `codi` = (?), `contadorventas` = (?)';
                                                    $Prepara_Update1 = $pdo->prepare($Sql_Update1);
                                                    $Prepara_Update1->execute(array($rowcount,$_SESSION['articulos']));
                                                    //Actualizamos el stock real
                                                    $Sql_Update2 ='UPDATE `productosdsc` SET `cantidad` = (?) WHERE id = (?)';
                                                    $Prepara_Update2 = $pdo->prepare($Sql_Update2);
                                                    $Prepara_Update2->execute(array($Stock2,$NumCodi));
                                                   
                                                    //busca el ide de ventas diarias para posible eliminación
                                                    $query3=mysqli_query($mysqli,"SELECT MAX(id) AS id FROM ventas_diarias");
                                                    if ($row = mysqli_fetch_row($query3)) {
                                                    $_SESSION['IdProductVentas'][$_SESSION['articulos']] = trim($row[0]);
                                                   // echo $_SESSION['IdProductVentas'][$_SESSION['articulos']];
                                                    }
                                                    
                                                    ?><b><?php echo 'VENTA AGREGADA CORRECTAMENTE';?></b><?php
                                                    
                                                                 if ($resultado = $mysqli->query("SELECT * FROM ventas_diarias WHERE cod = $rowcount"))
                                                                 {
                                                          ?>  
                                                                   <script>document.getElementById("divagrega").style.display = "block";</script>  
                                                                   <script>document.getElementById("divanula").style.display = "block";</script> 
                                                                     <div class="container">
                                                                     <div class="row">
                                                                     <div class="col-1">
                                                                        <div>
                                                                         <div><b>id</b></div>
                                                                        </div>
                                                                         <div class="col-3">
                                                                             <div><b>Producto</b></div>
                                                                         </div>
                                                                         <div class="col-1">
                                                                              <div><b>Precio</b></div>
                                                                         </div>
                                                                         <div class="col-1">
                                                                             <div><b>Cantidad</b></div>
                                                                         </div>
                                                                         <div class="col-2">
                                                                             <div><b>Sub-Total</b></div>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                         <?php
                                                                         //El bucle recorre todos los registros.
                                                                         while($fila = $resultado->fetch_assoc()) 
                                                                                 {
                                                         ?>                         
                                                                                     <div class="container">
                                                                                     <div class="row">
                                                                                         <div class="col-1">
                                                                                            <?php echo $fila['id'];?><hr>
                                                                                         </div>
                                                                                         <div class="col-3">
                                                                                            <?php echo $fila['producto'];?><hr>
                                                                                         </div>
                                                                                         <div class="col-1">
                                                                                           
                                                                                             <?php echo $fila['precio'];?><hr>
                                                                                         </div>
                                                                                         <div class="col-1">
                                                                                             
                                                                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fila['unidades'];?><hr>
                                                                                         </div>
                                                                                         <div class="col-1">
                                                                                      
                                                                                             <?php $tot = $fila['unidades'] * $fila['precio'];
                                                                                             $numero = number_format($tot);
                                                                                             $TotalVentas = $tot;
                                                                                             echo $numero;?><hr>
                                                                                        </div>
                                                                                    </div>
                                                                                    </div>
                                                                                    <div class="container">
                                                                                    <center>
                                                                                        <div class="row">
                                                                                        <div class="col-12"> 
                                                                                        <b><?php echo 'TOTAL ' .'$ '.number_format($TotalVentas);?></b>
                                                                                        </div>
                                                                                        </div>
                                                                                    </center>
                                                                                    </div>
                                                            <?php
                                                                                 }

                                                                 }
                                                               
                                                                 //echo $_SESSION['ArrayCodProductos'][$_SESSION['articulos']];?><br><?php
                                                                 //echo $_SESSION['ArrayUnidaProductos'][$_SESSION['articulos']];?><br><?php

                                                     }
                                                            ?> 
                                        </div><!--FIN Agrega Registro-->


                                        <div><!--agrega + ventas a la anterior-->
                                        <?php
                                       if (isset($_POST["FormnVentas"])!="")
                                         {
                                            //$_SESSION['articulos']
                                                    $_SESSION['articulos']= $_SESSION['articulos'] + 1;//incrementa contador de Session
                                                    $_SESSION['ArrayCodProductos'][$_SESSION['articulos']] = $_POST['codproducto'];
                                                    $_SESSION['ArrayUnidaProductos'][$_SESSION['articulos']] = $_POST['unidades'];
                                                    $_SESSION['ArrayStProductos'][$_SESSION['articulos']] = $_POST['cantidadenstock'];
                                                     
                                                    $Stock = $_POST['cantidadenstock'];
                                                    $TotalVentas = 0;   
                                                    $iddeVenta = $_POST['CodVentaenAgrega'];
                                                    $UnidadesProduc = $_POST['unidades'];
                                                    $newValsinull = $Stock + $UnidadesProduc;
                                                    $_SESSION['ArrayStockincrement'][$_SESSION['articulos']] = $newValsinull;
                                                    $Stock5 = $Stock- $UnidadesProduc;//resta stock a tabla productos
                                                    $Stock4 = $Stock5;
                                                    if($Stock5<8){
                                                        echo '<script>alert("Quedan pocos productos, menos de 8!")</script>';
                                                    }
                                                    if($Stock5<0){
                                                        echo '<script>alert("La venta supera la cantidad de Stock, la venta será realizada igualmente!")</script>';
                                                        echo '<script>alert("Asegurese de agregar mas productos al Stock, para no ver este mensaje!")</script>';
                                                    }
                                                    $NumCodi = $_POST['codproducto'];
                                                    $dni =  $_POST['dniempresa'];
                                                    $ValPrecio = $_POST['precio'];
                                                    $NomProducto = $_POST['producto'];
                                                    $FechaVenta = $DateAndTime;
                                                    $Sql_Agregar ='INSERT INTO ventas_diarias (cod,idproducto,dni,producto,unidades,precio,fecha) VALUES (?,?,?,?,?,?,?)';
                                                    $Prepara_Agregar = $pdo->prepare($Sql_Agregar);
                                                    $Prepara_Agregar->execute(array($iddeVenta,$NumCodi,$dni,$NomProducto,$UnidadesProduc,$ValPrecio,$FechaVenta));
                                                    $Sql_Update4 ='UPDATE `productosdsc` SET `cantidad` = (?) WHERE id = (?)';
                                                    $Prepara_Update4 = $pdo->prepare($Sql_Update4);
                                                    $Prepara_Update4->execute(array($Stock4,$NumCodi));
                                                    
                                                    $query3=mysqli_query($mysqli,"SELECT MAX(id) AS id FROM ventas_diarias");
                                                    if ($row = mysqli_fetch_row($query3)) {
                                                    $_SESSION['IdProductVentas'][$_SESSION['articulos']] = trim($row[0]);
                                                    //echo $_SESSION['IdProductVentas'][$_SESSION['articulos']];
                                                    }

                                                    ?><b><?php echo 'AGEGADO NUEVO PRODUCTO AL MISMO CLIENTE Y VENTA';?></b><?php
                                                    if ($resultado = $mysqli->query("SELECT * FROM ventas_diarias WHERE cod = $iddeVenta"))
                                                    {
                                             ?>         
                                                         <script>document.getElementById("divagrega").style.display = "block";</script>
                                                         <script>document.getElementById("divanula").style.display = "block";</script>        
                                                        <div class="container">
                                                        <div class="row">
                                                        <div class="col-1">
                                                                         <div><b>id</b></div>
                                                                        </div>
                                                                         <div class="col-3">
                                                                             <div><b>Producto</b></div>
                                                                         </div>
                                                                         <div class="col-1">
                                                                              <div><b>Precio</b></div>
                                                                         </div>
                                                                         <div class="col-1">
                                                                             <div><b>Cantidad</b></div>
                                                                         </div>
                                                                         <div class="col-2">
                                                                             <div><b>Sub-Total</b></div>
                                                                         </div>
                                                        </div>
                                                    </div>
                                            <?php
                                                            //El bucle recorre todos los registros.
                                                            while($fila = $resultado->fetch_assoc()) 
                                                                    {
                                                                      
                                             ?>                          
                                                                        <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-1">
                                                                                <?php echo $fila['id'];?><hr>
                                                                            </div>
                                                                            <div class="col-3">
                                                                                <?php echo $fila['producto'];?><hr>
                                                                            </div>
                                                                            <div class="col-1">
                                                                                <?php echo $fila['precio'];?><hr>
                                                                            </div>
                                                                            <div class="col-1">
                                                                                
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fila['unidades'];?><hr>
                                                                            </div>
                                                                            <div class="col-2">
                                                                                            <?php $tot = $fila['unidades'] * $fila['precio'];
                                                                                             $TotalVentas = $tot +  $TotalVentas;
                                                                                             $numero = number_format($tot);
                                                                                ?>&nbsp;&nbsp;<?php echo $numero;?><hr>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                <?php
                                                
                                                                  
                                                                             
                                                                     }
                                                    }
                                                                    $numeroTOT = number_format($TotalVentas);
                                                                    $Sql_Update1 ='UPDATE `codventas` SET `contadorventas` = (?)';
                                                                    $Prepara_Update1 = $pdo->prepare($Sql_Update1);
                                                                    $Prepara_Update1->execute(array($_SESSION['articulos']));
                                                                   
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
                                                ?> 
                                        </div><!--FIN agrega + ventas-->
                                        <div class= "container"><!--Form Cancela-->
                                     
                                                    <?php

                                                        if (isset($_POST["formcancela"])!="")
                                                        {
                                                            echo "CANCELADO";

                                                        }
                                                    ?>  
                                                    
                                        </div>
</body>
</html>
        
  