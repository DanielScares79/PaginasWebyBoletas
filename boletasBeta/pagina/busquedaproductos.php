<?php
error_reporting(E_ALL);

    include 'conexion.php';
 
    $query=mysqli_query($mysqli,"SELECT * FROM productosdsc ORDER BY producto");
    $query1=mysqli_query($mysqli,"SELECT * FROM productosdsc");
    if(isset($_POST['id']))
    {
        $estado=$_POST['id'];
        //echo $estado;
    }
?>

<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta Content-Type: "text/javascript">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
         <title>STOCK</title>
    </head>
<body style="background-color: rgba(128,128,128,0.7);">
    <div><center><h2>BUSCAR STOCK<h2></center></div>
    <div style="width:1200px; margin:0 auto; border:1px solid #FCC; padding: 10px;">
        
        <div class="container">
        <form action="busquedaproductos.php" method="post" >
        <center> 
           <div class="row">
            <div class="col-5">
                <!--Busca x producto-->
                
                    <h4>Productos</h4>
                            <select name="id" class="text-uppercase"  onchange="this.form.submit()">
                                
                            
                                <?php 
                                    
                                    while($datos = mysqli_fetch_array($query))
                                    {
                                ?>
                                        <option value="<?php echo $datos['id']?>">
                                        <?php
                                        $var1 = $datos['producto'];
                                    
                                        $todo = $var1;
                                        echo $todo?>
                                     
                                        
                                        
                                        </option>
                                        
                                <?php
                                    }
                                ?> 
                               
                            </select>
                            
                   
                 
        </form>
            </div>
          
                <div class="col-3"><!--Busca todos-->
                                <h4>Todos</h4>
                                <form action="busquedaproductos.php" method="POST">
                                <input type="submit" class="btn btn-primary" name="search" id="search" value="Buscar">
                                </form>
                </div>
          





            <div class="col-4"><!--Busca x Id-->
            <form action="busquedaproductos.php" method="post" name="posid">
            
                    <h4>Identificador</h4>
                            <select name="id" id="posid" onchange="this.form.submit()">
                            
                                <?php 
                                    
                                    while($datos = mysqli_fetch_array($query1))
                                    {
                                ?>
                                        <option value="<?php echo $datos['id']?>"><?php
                                        echo $datos['id']?>
                                     
                                        </option>
                                <?php
                                    }
                                ?> 
                            </select>
                
                    
           
            </form>
            </div>
            </div><!--div row-->

        </div><!--div Container-->
             </center>                           <div>
                                                <?php
                                                    if (isset($_POST['id']))
                                                    {
                                                
                                                        //htmlspecialchars(print_r($_POST, true));
                                                        foreach ($_POST as &$valor)
                                                            {
                                                                $valor;
                                                            }
                                                    
                                                        $query=mysqli_query($mysqli,"SELECT * FROM productosdsc WHERE id = $valor");
                                                        while($datos = mysqli_fetch_array($query))
                                                            {
                                                
                                                ?>
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div><h5>Producto<h5></div>
                                                                            <?php echo $datos['producto'];?>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div><h5>Código<h5></div>
                                                                            <?php echo $datos['codigo'];?>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div><h5>Precio<h5></div>
                                                                            <?php echo $datos['precio'];?>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div><h5>Cantidad<h5></div>
                                                                            <?php echo $datos['cantidad'];?>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div><h5>Total<h5></div>
                                                                            <?php $tot = $datos['cantidad'] * $datos['precio'];
                                                                            $numero = number_format($tot);
                                                                            echo '$ '.$numero;?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            
                                                    <?php        
                                                            }
                                                    }
                                                    ?>
                                         
                                
                                        </div>





                                        <div>
                                                <?php
                                                   if (isset($_POST['search'])) {//post todos los productos
                                                    ?>
                                                        
                                                        
                                                        <?php
                                                                
                                                                if ($resultado = $mysqli->query("SELECT * FROM productosdsc WHERE precio > 0 ORDER BY producto"))
                                                                {
                                                         ?>              
                                                                    <div class="container">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div><h5>Producto<h5></div>
                                                                        </div>
                                                                        <div class="col">
                                                                             <div><h5>Código<h5></div>
                                                                        </div>
                                                                        <div class="col">
                                                                             <div><h5>Precio<h5></div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div><h5>Cantidad<h5></div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div><h5>Total<h5></div>
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
                                                                                        <div class="col">
                                                                                            
                                                                                            <?php echo $fila['producto'];?><hr>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            
                                                                                            <?php echo $fila['codigo'];?><hr>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                          
                                                                                            <?php echo $fila['precio'];?><hr>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            
                                                                                            <?php echo $fila['cantidad'];?><hr>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            
                                                                                            <?php $tot = $fila['cantidad'] * $fila['precio'];
                                                                                            $numero = number_format($tot);
                                                                                            echo '$ '.$numero;?><hr>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                            <?php
                                                                                }
                                                                }
                                                              
                                                                exit();
                                                    }
                                                           ?> 
                                         
                                
                                        </div>



    </div>

</body>
</html>
        
   