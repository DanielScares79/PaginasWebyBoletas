<?php
error_reporting(E_ALL);

    include 'conexion.php';

    $query=mysqli_query($mysqli,"SELECT * FROM productosdsc ORDER BY producto");
    $querydel=mysqli_query($mysqli,"SELECT * FROM productosdsc ORDER BY producto");
    if(isset($_POST['id']))
    {
        
        $IdentProducto = $_POST['id'];
    }
?>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta Content-Type: "text/javascript">
    <meta content="text/html; charset=UTF-8; X-Content-Type-Options=nosniff" http-equiv="Content-Type" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Control Productos</title>

    </head>
<body style="background-color: rgba(128,128,128,0.7);">
    <div><center><h2>CONTROL DE PRODUCTOS<h2></center></div>
    <div style="width:1350px; margin:0 auto; border:1px solid #FCC; padding: 10px;">
        
        <div class="container">
           <div class="row">
            <div class="col-sm-5">
            <form action="ingresoproductosok.php" method="post" name="posproducto">
            <!--Busca x producto-->
                    <h4>Modificar</h4>
                            <select name="id"  class="text-uppercase" onchange="this.form.submit()">
                            
                                <?php 
                                    
                                    while($datos = mysqli_fetch_array($query))
                                    {
                                ?>
                                        <option value="<?php echo $datos['id']?>">
                                        <?php echo $datos['producto']?>
                                        <?php $IdentEmpresa = $datos['dni']?> 
                                        <?php $IdentProducto = $datos['id']?>
                                        
                                        
                                        </option>
                                        
                                <?php
                           
                                    }
                                    
                                ?> 
                            </select>
                     
                    
                    </form>
            
                  
                 
            </div> 
          
                <div class="col-sm-3">
                    <form action="ingresoproductosok.php" method="POST" name ="formNuevo">
                    <h4>Agregar</h4>
                       <input type="submit" class="btn btn-primary" name="nuevo" id="button1" value="PRODUCTO"> 
                    <script>window.onload = function () {document.NuevoForm1.producto.focus();}</script>
                    </form>
                </div>
                <div class="col-sm-4">
                <form action="ingresoproductosok.php" method="post" name="frmElimina">
            <!--eliminar x producto-->
                    <h4>Borrar</h4>
                            <select name="idelimina"  class="text-uppercase">
                            
                                <?php 
                                    
                                    while($datos = mysqli_fetch_array($querydel))
                                    {
                                ?>
                                        <option value="<?php echo $datos['id']?>">
                                        <?php echo $datos['producto']?>
                                        <?php $IdentEmpresa = $datos['dni']?> 
                                        <?php $IdentProducto = $datos['id']?>
                                        </option>
                                <?php
                                    }
                                ?> 
                            </select>
                            <input type="submit" class="btn btn-danger" value ="IR">
                            
                    </form>
                </div>
                 
        </div>    
        </div><!--div Container-->
       
                                       <div><!--buscar desde Select para modificar-->
                                                <?php
                                                
                                                    if (isset($_POST['id']))
                                                    {
                                                
                                                        foreach ($_POST as &$valor)
                                                            {
                                                                $valor;
                                                            }
                                                    
                                                        $query=mysqli_query($mysqli,"SELECT * FROM productosdsc WHERE id = $valor");
                                                        while($datos = mysqli_fetch_array($query))
                                                            {
                                                
                                                ?>
                                                             <form action="ingresoproductosok.php" method="post" id="FormActualiza" name="FormActualiza">
                                                             <div class="row">
                                                             <div class="col-sm-6 mt-2">
                                                              <div class="form-group">Producto<input class="form-control text-uppercase" name="producto" placeholder="Producto" type="text" value="<?php echo $datos['producto'];?>" required></div>
                                                             </div> 
                                                             <div class="col-sm-3 mt-2">
                                                             <div class="form-group">Id Producto<input class="form-control" name="iden" placeholder="ID" type="number" readonly value="<?php echo $datos['id'];?>" required></div>
                                                             </div> 
                                                             <div class="col-sm-3 mt-2">
                                                             <div class="form-group">Id Empresa<input class="form-control" name="dni" placeholder="DNI" type="number" readonly value="<?php echo $datos['dni'];?>" required></div>
                                                             </div> 
                                                             <div class="col-sm-12 mt-2">
                                                             <div class="form-group">Código<input class="form-control" name="codigo" placeholder="Código barras" type="number" value="<?php echo $datos['codigo'];?>" required></div>
                                                             </div>
                                                             <div class="col-sm-12 mt-2">
                                                             <div class="form-group">Precio<input class="form-control" name="precio" placeholder="Precio" type="number" value="<?php echo $datos['precio'];?>" required></div>
                                                             </div>
                                                             <div class="col-sm-12 mt-2">
                                                             <div class="form-group">Cantidad<input class="form-control" name="cantidad" placeholder="Cantidad" type="number" value="<?php echo $datos['cantidad'];?>" required></div>
                                                             </div>
                                                             <div class="col-sm-12 mt-0">
                                                             <br><input type="submit" class="btn btn-dark" id="FormActualiza" name="FormActualiza" value="Guardar Modificación">            
                                                            </div>
                                                            </form>
                                                            
                                                    <?php        
                                                            }
                                                    }
                                                    
                                                   
                                                    
                                                    ?>
                                         
                                
                                        </div><!--Fin-->
                                        <div><!--buscar desde Select para eliminar-->
                                                <?php
                                                
                                                    if (isset($_POST['idelimina']))
                                                    {
                                                
                                                        foreach ($_POST as &$valor)
                                                            {
                                                                $valor;
                                                            }
                                                    
                                                        $querydel=mysqli_query($mysqli,"SELECT * FROM productosdsc WHERE id = $valor");
                                                        while($datos = mysqli_fetch_array($querydel))
                                                            {
                                                
                                                ?>
                                                             <form action="ingresoproductosok.php" method="post" id="Formdelete" name="Formdelete">
                                                             <div class="row">
                                                             <div class="col-sm-6 mt-2">
                                                              <div class="form-group">Producto<input class="form-control text-uppercase" name="producto" placeholder="Producto" type="text" readonly value="<?php echo $datos['producto'];?>" required></div>
                                                             </div> 
                                                             <div class="col-sm-3 mt-2">
                                                             <div class="form-group">Id Producto<input class="form-control" name="iden" placeholder="ID" type="number" readonly value="<?php echo $datos['id'];?>" required></div>
                                                             </div> 
                                                             <div class="col-sm-3 mt-2">
                                                             <div class="form-group">Id Empresa<input class="form-control" name="dni" placeholder="DNI" type="number" readonly value="<?php echo $datos['dni'];?>" required></div>
                                                             </div> 
                                                             <div class="col-sm-12 mt-2">
                                                             <div class="form-group">Código<input class="form-control" name="codigo" placeholder="Código barras" type="number" readonly value="<?php echo $datos['codigo'];?>" required></div>
                                                             </div>
                                                             <div class="col-sm-12 mt-2">
                                                             <div class="form-group">Precio<input class="form-control" name="precio" placeholder="Precio" type="number" readonly value="<?php echo $datos['precio'];?>" required></div>
                                                             </div>
                                                             <div class="col-sm-12 mt-2">
                                                             <div class="form-group">Cantidad<input class="form-control" name="cantidad" placeholder="Cantidad" type="number" readonly value="<?php echo $datos['cantidad'];?>" required></div>
                                                             </div>
                                                             <div class="col-sm-12 mt-0">
                                                             <br><input type="submit" class="btn btn-danger" id="Formdelete" name="Formdelete" value="Eliminar">            
                                                            </div>
                                                            </form>
                                                                                                                        
                                                    <?php        
                                                            }
                                                    }
                                                  
                                                   
                                                    
                                                    ?>
                                         
                                
                                        </div><!--Fin-->
                                        <div>
                                                <?php
                                               
                                                    if (isset($_POST['nuevo']))
                                                    {
                                         
                                                
                                                ?>
                                                             <form action="ingresoproductosok.php" method="POST" id="NuevoForm1" name="NuevoForm1">
                                                                    <div class="row">
                                                                    <div class="col-sm-8 mt-2">
                                                                    <div class="form-group">Producto<input class="form-control" name="producto" placeholder="Producto" type="text" required></div>
                                                                    </div> 
                                                                    <div class="col-sm-8 mt-2">
                                                                    <div class="form-group">Código<input class="form-control" name="codigo" placeholder="Código barras" type="number" required></div>
                                                                    </div>
                                                                    <div class="col-sm-8 mt-2">
                                                                    <div class="form-group">Precio<input class="form-control" name="precio" placeholder="Precio" type="number" required></div>
                                                                    </div>
                                                                    <div class="col-8 mt-2">
                                                                    <div class="form-group">Cantidad<input class="form-control" name="cantidad" placeholder="Cantidad" type="number" required></div>
                                                                    </div>
                                                                    <div class="col-10 mt-0">
                                                                    <br><input type="submit" class="btn btn-primary"  id="NuevoForm1" name="NuevoForm1" value="Guardar Producto">            
                                                                    </div>
                                                                </form>
                                                            
                                                    <?php        
                                                            
                                                    }
                                                    ?>
                                      
                                        </div>
                                        <div><!--Nuevo registro-->
                                            <?php
                                                if  (isset($_POST['NuevoForm1'])){
                                                    $CantProduc = $_POST['cantidad'];
                                                    $NumCodi = $_POST['codigo'];
                                                    $dni = $IdentEmpresa;
                                                    $ValPrecio = $_POST['precio'];
                                                    $NomProducto = $_POST['producto'];
                                                    $Sql_Agregar ='INSERT INTO productosdsc (cantidad,codigo,dni,precio,producto) VALUES (?,?,?,?,?)';
                                                    $Prepara_Agregar = $pdo->prepare($Sql_Agregar);
                                                    $Prepara_Agregar->execute(array($CantProduc,$NumCodi,$dni,$ValPrecio,$NomProducto));
                                                    echo 'AGEGADO CORRECTAMENTE';
                                                   
                                                   
                                                }
                                                    ?>
                                                    <?php
                                                    if (isset($_POST["NuevoForm1"])!="")
                                                     {?>
                                                        <meta http-equiv="refresh" content=".5; url=ingresoproductosok.php">
                                                     <?php
                                                     } ?>
                                                    

                                        </div><!--Fin Nuevo registro-->
                                        <div><!--actualiza registro-->
                                            <?php
                                                if  (isset($_POST['FormActualiza'])){
                                                    $CantProduc1 = $_POST['cantidad'];
                                                    $NumCodi1 = $_POST['codigo'];
                                                    $ValPrecio1 = $_POST['precio'];
                                                    $dni1 = $_POST['dni'];
                                                    $IdentProducto = $_POST['iden'];
                                                    $NomProducto1 = $_POST['producto'];
                                                    $Sql_actualiza ="UPDATE `productosdsc` SET `cantidad` = (?), `codigo` = (?), `dni` = (?), `id` = (?), `precio` = (?), `producto` = (?) WHERE `id` = $IdentProducto AND `dni` = $dni1";
                                                    $Prepara_Actualiza = $pdo->prepare($Sql_actualiza);
                                                    $Prepara_Actualiza->execute(array($CantProduc1,$NumCodi1,$dni1,$IdentProducto,$ValPrecio1,$NomProducto1));
                                                    echo 'ACTUALIZADO CORRECTAMENTE';
                                                  
                                                  
                                                }
                                                    ?>
                                                    <?php
                                                    if (isset($_POST["FormActualiza"])!="")
                                                     {?>
                                                        <meta http-equiv="refresh" content=".5; url=ingresoproductosok.php">
                                                     <?php
                                                     } ?>
                                                    

                                        </div><!--Fin actualiza registro-->
                                        <div><!--Elimina registro-->
                                      
                                            <?php
                                             
                                                if (isset($_POST["Formdelete"])!="")
                                                {
                                                    $IdentPro = $_POST['iden'];
                                                    $dniPro = $_POST['dni'];
                                                    $Sql_elimina ="DELETE FROM productosdsc WHERE id = $IdentPro AND dni =  $dniPro";
                                                    $Prepara_Elimina = $pdo->prepare($Sql_elimina);
                                                    $Prepara_Elimina->execute();
                                                    echo 'ELIMINADO CORRECTAMENTE';
                                                  
                                                }
                                             
                                              
                                               
                                             ?>
                                     
                                             <?php
                                             if (isset($_POST["Formdelete"])!="")
                                                     {?>
                                                        <meta http-equiv="refresh" content=".5; url=ingresoproductosok.php">
                                                     <?php
                                                     } 
                                                     
                                            ?>
                                                    
                                                    
                                                    

                                        </div><!--FIN Elimina registro-->

</body>
</html>
        
  