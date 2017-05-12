 <?php require('../seguridad/seguridad.php'); 
    ?>
 <html>
    <head>
    <title>Productos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  
    </head>
   
    <body> 
    <?php  require('../menu/menu2.html'); ?>


      <script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

      </script>

     <div class="container">
  <center>
   <div class="jumbotron">

    <h1>Registro y control de Almac&eacuten</h1>
<form id="buscador" name="buscador" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
   <div style="vertical-align: 50%">
     <div class="row">  

        <div class="col-md-4 col-md-offset-4">
          <input id="buscar" name="buscar" type="text" class="form-control" placeholder="Nombre del productos" required=""><br>
        </div>
                    <div class="col-md-1">
              <button name="buscador" class="btn btn-primary"> Buscar</button>
              </div>        
              <div class="col-md-1">
                <a data-toggle="modal" href="#example" class="btn btn-primary btn-large">
                 Alta de Productos
                </a> </div>
              <div class="col-md-1">
                 </div>
                

     </div>
    </div>
</form>    

</div>

              <table class="table-striped table-condensed table-hover table-bordered">
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


// AUTHOR: webreunidos.es  // Primero definimos la conexión a la base de datos 
define('HOST_DB', 'localhost'); //Nombre del host, nomalmente localhost 
define('USER_DB', 'root'); //Usuario de la bbdd 
define('PASS_DB', ''); //Contraseña de la bbdd 
define('NAME_DB', 'taller'); //Nombre de la bbdd  // Definimos la conexión
function conectar(){ 
global $conexion; //Definición global para poder utilizar en todo el contexto
 $conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB) or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS'); mysql_select_db(NAME_DB) or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB); } function desconectar(){ global $conexion; mysql_close($conexion); }  //Variable que contendrá el resultado de la búsqueda 
 $texto = ''; //Variable que contendrá el número de resgistros encontrados
  $registros = '';
  $pk_producto=''; 
  $marca_carro='';
  $cantidad='';
  $stock='';
  $costo='';
  $estatus='';
  $codigo='';
  $imagen='';
 if($_POST){ 
 $busqueda = trim($_POST['buscar']);  
 $entero = 0; 
 if (empty($busqueda)){ $texto = 'Búsqueda sin resultados'; 
 }else{ // Si hay información para buscar, abrimos la conexión 
 conectar(); mysql_set_charset('utf8'); // para indicar a la bbdd que vamos a mostrar la info en utf  //Contulta para la base de datos, se utiliza un comparador LIKE para acceder a todo lo que contenga la cadena a buscar
  $sql = "SELECT * FROM producto WHERE nombre_pieza LIKE '%$busqueda%' GROUP BY pk_producto";  $resultado = mysql_query($sql); //Ejecución de la consulta //Si hay resultados... 
  if (mysql_num_rows($resultado) > 0){  // Se recoge el número de resultados 
    $registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; // Se almacenan las cadenas de resultado
  while($fila = mysql_fetch_assoc($resultado)){ 
  ?>  <tr>

  <td><?php   echo $fila['pk_producto'] . '<br />'; ?></td>
  <td><img src="../imagenes/<?php echo  $fila['imagen'];?>" width="80px"></td>
  <td><?php   echo  $fila['codigo'] . '<br />'; ?></td>
  <td><?php   echo $fila['nombre_pieza'] . '<br />'; ?></td>
<td><?php   echo  $fila['marca_carro'] . '<br />'; ?></td>
<td><?php echo  $fila['cantidad'] . '<br />'; ?></td>
<td><?php echo $fila['stock'] . '<br />'; ?></td>
<td><?php echo  $fila['costo'] . '<br />';?> </td> 
<td>

                              <?php if ($fila['estatus']=='Insuficiente') {
                              ?>
                                   <style>                                
                                  .insuficiente {
                                    color : red;
                                    background-color: #fff;
                                    box-shadow : 0 0 5px 0 rgba(255, 255, 255, 0.7);
                                    transition : all .4s;
                                  }
                                   </style> 
                                   <b class="insuficiente"><?php echo $fila['estatus'];  ?></b>  <?php
                              } else if ($fila['estatus']=='Producto Bajo') {
                              ?>
                                   <style>                                
                                  .insuficiente {
                                    color : orange;
                                    background-color: #fff;
                                    box-shadow : 0 0 5px 0 rgba(255, 255, 255, 0.7);
                                    transition : all .4s;
                                  }
                                   </style> 
                                   <b class="insuficiente"><?php echo $fila['estatus'];  ?></b>  <?php
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
                              <?php echo $fila['estatus'];?></b>
                             <?php
                              }
                              ?>
                           </td>
                            <?php 
                                 echo "<td> <center> <a href=eliminar.php?pk_producto=".$fila['pk_producto']." "; 
                                 ?>onclick="return confirm('¿En verdad deseas eliminar este registro?','Confirma')" role="button" class="btn btn-mini" data-toggle="modal" title="Eliminar registro"<?php echo"><span class='glyphicon glyphicon-trash'></span></a></center> </td>";
                            ?>    

                          <td> <center>                 
                                <a data-toggle="modal" href="#actualizar2<?php echo $fila['pk_producto']; ?>" role="button" class="btn btn-mini" title="Actualizar Informacion">
                                   <span class='glyphicon glyphicon-edit'></span>
                                </a></center>  
                            </td> 
                           

<!--INICIO de Pantalla Modal DE ACTUALIZAR-->

<div class="modal fade" id="actualizar2<?php echo $fila['pk_producto']; ?>">
   <div class="modal-dialog modal-sm">   
      <div class="modal-content"> 
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            ×
            </button>
            <h3>Actualizar Informaci&oacuten</h3> 
         </div> <form name="form2" method="post" enctype="multipart/form-data" action="actualizar-producto.php">

         <div class="modal-body">    
                         
    <input type="hidden" name="pk_producto" value="<?php echo $fila['pk_producto']; ?>">
    
    <div class="form-group">
      <label for="email">Nombre de pieza:</label>
      <input type="text" class="form-control" id="nombre_pieza" name="nombre_pieza"  placeholder="Ingrese nombre_pieza" maxlength="45" value="<?php echo $fila['nombre_pieza']; ?>" required>
    </div>
       <div class="form-group">
      <label for="email">C&oacutedigo:</label>
      <input type="text" class="form-control" id="codigo" name="codigo" maxlength="45" value="<?php echo $fila['codigo']; ?>" required>
    </div>

                              <div class="form-group">
                                    <label for="selectbasic">Marca de carro</label><br>
<input type="radio" name="marca" value="CHEVROLET" <?php echo $fila['marca_carro']=="CHEVROLET"?" checked ='checked'":'';?>>CHEVROLET<br>
<input type="radio" name="marca" value="HONDA" <?php echo $fila['marca_carro']=="HONDA"?" checked ='checked'":'';?>>HONDA<br>
<input type="radio" name="marca" value="NISSAN" <?php echo $fila['marca_carro']=="NISSAN"?" checked ='checked'":'';?>>NISSAN<br>
<input type="radio" name="marca" value="DOGE" <?php echo $fila["marca_carro"]=="DOGE"?" checked ='checked'":'';?>>DOGE<br>
<input type="radio" name="marca" value="SURU" <?php echo $fila["marca_carro"]=="SURU"?" checked ='checked'":'';?>>SURU<br>
                                </div>

    <div class="form-group">
      <label for="email">Cantidad</label>
      <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Ingrese el número de 10 dígitos" maxlength="10" value="<?php echo $fila['cantidad']; ?>" required>
    </div>

     <div class="form-group">
      <label for="costo">Costo</label>
      <input type="number" class="form-control" id="costo" name="costo" maxlength="30" placeholder="Ejm. Tuxpan Nayarit" value="<?php echo $fila['costo']; ?>" required>
    </div>

    <div class="form-group">
      <label for="email">Stock</label>
      <input type="number" class="form-control" id="stock" name="stock" placeholder="Numero" maxlength="30" value="<?php echo $fila['stock']; ?>" required>
    </div>   

    <div class="form-group">
      <label for="email">Estatus:</label>
      <input type="text" class="form-control" id="estatus" name="estatus" onkeypress="return soloLetras(event)" placeholder="Ingrese estatus"  readonly="readonly" value="<?php echo $fila['estatus']; ?>" required>
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


<?php  
      } 
    }else{ 
  ?> 
<div class="alert alert-danger">
  <strong>Advertencia!</strong> el producto que est&aacute buscando no se encuentra registrado en el sistema.
</div>
<?php   
 }}} 
?> 

    </tbody>
     </table>
      

</center>

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
                                    <label class="col-md-4 control-label" for="textinput">C&oacutedigo</label>  
                                    <div class="col-md-4">
                                        <input id="codigo" name="codigo" type="text" placeholder="" max="10" class="form-control input-md" required="">

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
                                               <option value="GENERAL">GENERAL</option>
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
                                    <label class="col-md-4 control-label"  for="textinput">Cantidad</label>  
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

<br><br>
                     

<div class="container">
 <pre><center><strong><a href="https://www.facebook.com/soft.unicorn" target="_blank" style="color:#000">Centro Multiservicio llantero y suspensiones de Santiago. Dirección Amado Nervo #321 C.P 63300 esquina Matamoros Col. Centro Santiago Ixc. Nay.</a></strong></center></pre>

</div>
    </body>
  </html> 
  
