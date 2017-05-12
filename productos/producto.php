   <?php
  require('../seguridad/seguridad.php'); 
    require('../conexion.php');
   
    $query="SELECT pk_producto,codigo,marca_carro,nombre_pieza,cantidad,costo,stock, imagen, estatus FROM producto";
    
    $resultado=$con->query($query);

    ?>
   
    <html>
    <head>
    <title>Productos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

  
    </head>
   
    <body>
      <?php   require('../menu/menu2.html'); ?>

<div class="container">
<div class="jumbotron">
    <h1>Registro y control de Producto</h1>
<form name="form1" method="post" action="mostrar.php">
   <div style="vertical-align: 50%">
     <div class="row">  
        <div class="col-md-4 col-md-offset-4">
          <input id="dato" name="dato" type="text" class="form-control" placeholder="Nombre, marca o codigo del Producto">
        </div>
        <div class="col-md-1">
           <button id="boton" name="boton" class="btn btn-primary"> Buscar</button>
        </div>
             <div class="col-md-1">
                <a data-toggle="modal" href="#example" class="btn btn-primary btn-large">
                 Alta de Productos
                </a>
             </div>
     </div>
    </div>
</form>     
</div>
</div>

<!--INICIO de Pantalla Modal-->
<div id="example" class="modal fade">
   <div class="modal-dialog">   
      <div class="modal-content"> 
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            ×
            </button>
            <h3>Registro de Productos</h3>
         </div>
         <div class="modal-body">



<form id="a" name="form2" method="post" class="form-horizontal" enctype="multipart/form-data" action="registrar-producto.php">
          
<div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">Codigo</label>  
                                    <div class="col-md-4">
                                        <input id="codigo" name="codigo" type="text" placeholder="" class="form-control input-md" required="">

                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="selectbasic">Marca de carro</label>
                                    <div class="col-md-4">
                                        <select id="marca" name="marca" class="form-control">
                                            <option value="0">-Seleccione-</option>
                                            <option value="CHEVROLET">CHEVROLET</option>
                                            <option value="HONDA">HONDA</option>
                                            <option value="NISSAN">NISSAN</option>
                                            <option value="DOGE">DOGE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">Nombre de Pieza</label>  
                                    <div class="col-md-4">
                                        <input id="nombre" name="nombre" type="text" placeholder="" class="form-control input-md" required="">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">Cantidad</label>  
                                    <div class="col-md-4">
                                        <input id="cantidad" name="cantidad" type="text" placeholder="" class="form-control input-md" required="">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">Costo</label>  
                                    <div class="col-md-4">
                                        <input id="costo" name="costo" type="text" placeholder="" class="form-control input-md" required="">

                                    </div>
                                </div>
    <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">Stock</label>  
                                    <div class="col-md-4">
                                        <input id="stock" name="stock" type="text" placeholder="" class="form-control input-md" required="">

                                    </div>
                                </div>
  
                             
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">Imagen</label>  
                                    <div class="col-md-4">
                                        <input id="imagen" name="imagen" type="file" placeholder="" class="form-control input-md" required="">

                                    </div>
                                </div>
      
      
    <div class="modal-footer">
        <button type="submit" class="btn"><strong><i class="icon-ok"></i> Ingresar Producto</strong></button>
        <button src="productos.php" class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>
    </div>
    </form>


         </div>
         
    </div>
   </div>
</div>
<!--FIN de Pantalla Modal-->

    <div class="container">
            <table class="table table-bordered">
              <tr class="header">
                <td width="2%" class="a"><strong>No.</strong></td>  
                <td width="2%" class="a"><strong>Foto</strong></td>              
                <td width="10%" class="a"><strong>C&oacutedigo</strong></td>            
                <td width="3%" class="a"><strong>Marca del Vehiculo</strong></td>
                    <td width="4%" class="a"><strong>Nombre de pieza</strong></td>
                <td width="4%" class="a"><strong>Cantidad</strong></td>
                    <td width="4%" class="a"><strong>Costo</strong></td> 
                      <td width="4%" class="a"><strong>Stock</strong></td> 
                        <td width="4%" class="a"><strong>Estado</strong></td> 
                <td width="1%" class="a"><strong>Eliminar</strong></td>       
                <td width="1%" class="a"><strong>Modificar</strong></td>                       
              <thead>
                <tbody>
                    <?php
                     while($row=$resultado->fetch_assoc()){ 
                        ?>
                        <tr>
                        <td>
                         <?php  echo $row['pk_producto'];?>
                         </td>
                         <td>
                          <img src="../imagenes/<?php echo $row['imagen'];?>" width="80px">
             </td>
                             <td>
                             <?php echo $row['codigo'];?>
                             </td>
                            <td>
                            <?php echo $row['marca_carro'];?>
                            </td>
                               <td>
              <?php echo $row['nombre_pieza'];?>
              </td>
                            <td>
                            <?php echo $row['cantidad'];?>
                            </td>
                               <td>
                              <?php echo $row['costo'];?>
                              </td>
                               <td>
                              <?php echo $row['stock'];?>
                              </td>
               
                           <td>

                              <?php if ($row['estatus']=='Insuficiente') {
                              ?>
                                   <style>                                
                                  .insuficiente {
                                    color : red;
                                    background-color: #fff;
                                    box-shadow : 0 0 5px 0 rgba(255, 255, 255, 0.7);
                                    transition : all .4s;
                                  }
                                   </style> 
                                   <b class="insuficiente"><?php echo $row['estatus'];  ?></b>  <?php
                              } if ($row['estatus']=='Producto Bajo') {
                              ?>
                                   <style>                                
                                  .insuficiente {
                                    color : orange;
                                    background-color: #fff;
                                    box-shadow : 0 0 5px 0 rgba(255, 255, 255, 0.7);
                                    transition : all .4s;
                                  }
                                   </style> 
                                   <b class="insuficiente"><?php echo $row['estatus'];  ?></b>  <?php
                              } 
                              else{
                                  ?> 
                                   <style>                                
                                  .estatus {
                                    color : green;
                                    background-color: #fff;
                                    box-shadow : 0 0 5px 0 rgba(255, 255, 255, 0.7);
                                    transition : all .4s;
                                  }
                                   </style>  <b class="estatus">
                              <?php echo $row['estatus'];?></b>
                             <?php
                              }
                              ?>
                           </td>
             
             
             
                            <?php 
                                 echo "<td> <center> <a href=eliminar.php?pk_cliente=".$row['pk_producto']." "; 
                                 ?>onclick="return confirm('¿En verdad deseas eliminar este registro?','Confirma')" role="button" class="btn btn-mini" data-toggle="modal" title="Eliminar"<?php echo"><span class='glyphicon glyphicon-trash'></span></a></center> </td>";
                            ?>    

                          <td> <center>                 
                                <a data-toggle="modal" href="#actualizar2<?php echo $row['pk_producto']; ?>" role="button" class="btn btn-mini" title="Actualizar Informacion">
                                   <span class='glyphicon glyphicon-edit'></span>
                                </a></center>  
                            </td> 
                       
                    </div>
                    

<!--INICIO de Pantalla Modal DE ACTUALIZAR-->

<div class="modal fade" id="actualizar2<?php echo $row['pk_producto']; ?>">
   <div class="modal-dialog">   
      <div class="modal-content"> 
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            ×
            </button>
            <h3>Actualizar Informaci&oacuten de productos  <img src="../imagenes/<?php echo $row['imagen'];?>" width="80px"></h3> 
         </div> <form name="form2" method="post" enctype="multipart/form-data" action="actualizar-producto.php">

         <div class="modal-body">    
                                    <input type="hidden" name="pk_producto" value="<?php echo $row['pk_producto']; ?>">
                                    <strong>Nombre de Pieza</strong><br>
                                    <input type="text" name="nombre_pieza" autocomplete="off"  required value="<?php echo $row['nombre_pieza']; ?>"><br>
                                    <strong>C&oacutedigo</strong><br>
                                    <input type="text" name="codigo" autocomplete="off"  required value="<?php echo $row['codigo']; ?>"><br>
                                 
                                    <strong>Marca de Carro</strong><br>
                                  <input type="text" name="marca_carro"  autocomplete="off" required value="<?php echo $row['marca_carro']; ?>"><br>
                                    <strong>Cantidad</strong><br>
                                    <input type="text" name="cantidad" autocomplete="off" required value="<?php echo $row['cantidad']; ?>"><br>
                                    <strong>Costo</strong><br>
                                    <input type="text" name="costo" autocomplete="off" value="<?php echo $row['costo']; ?>"><br>
                                     <strong>Stock</strong><br>
                                    <input type="text" name="stock"  autocomplete="off" value="<?php echo $row['stock']; ?>"><br>
                    
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn"><strong><i class="icon-ok"></i> Actualizar</strong></button>
        <button src="mostrar-cliente.php" class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>
    </div>

        </form>
    </div>
   </div>
</div>
<!--FIN de Pantalla Modal de actualizar-->
                     
                        </tr>
                    <?php } ?>
                </tbody>
            </table>


        </body>
    </html> 
    
