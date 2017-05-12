 <?php require('../seguridad/seguridad.php'); 
    ?>
 <html>
    <head>
    <title>Clientes</title>
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

    <h1>Registro y control de clientes</h1>
<form id="buscador" name="buscador" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
   <div style="vertical-align: 50%">
     <div class="row">  

        <div class="col-md-4 col-md-offset-4">
          <input id="buscar" name="buscar" type="text" class="form-control" placeholder="Nombre del cliente" required=""><br>
        </div>
                    <div class="col-md-1">
              <button name="buscador" class="btn btn-primary"> Buscar</button>
              </div>        
              <div class="col-md-1">
                <a data-toggle="modal" href="#example" class="btn btn-primary btn-large">
                 Alta de Clientes
                </a> </div>
              <div class="col-md-1">
                
                <img src="../imagenes/clientes.png" width="80px" alt=""> </div>
                

     </div>
    </div>
</form>    

</div>

              <table class="table-striped table-condensed table-hover table-bordered">
              <tr class="header">
                <td width="2%" class="a"><strong>No.</strong></td>            
                <td width="10%" class="a"><strong>Nombre</strong></td>            
                <td width="3%" class="a"><strong>RFC</strong></td>
                    <td width="4%" class="a"><strong>Tel&eacutefono</strong></td>
                <td width="4%" class="a"><strong>Ciudad</strong></td>
                    <td width="4%" class="a"><strong>Direcci&oacuten</strong></td>
                 <td width="3%" class="a"><strong>Estatus</strong></td>   
                <td width="3%" class="a"><strong>Eliminar</strong></td>       
                <td width="3%" class="a"><strong>Modificar</strong></td>              
                <td width="4%" class="a"><strong><p>Vender</p></strong></td>                   
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
  $pk_cliente=''; 
  $rfc='';
  $telefono='';
  $ciudad='';
  $direccion='';
  $estatus='';
 if($_POST){ 
 $busqueda = trim($_POST['buscar']);  
 $entero = 0; 
 if (empty($busqueda)){ $texto = 'Búsqueda sin resultados'; 
 }else{ // Si hay información para buscar, abrimos la conexión 
 conectar(); mysql_set_charset('utf8'); // para indicar a la bbdd que vamos a mostrar la info en utf  //Contulta para la base de datos, se utiliza un comparador LIKE para acceder a todo lo que contenga la cadena a buscar
  $sql = "SELECT * FROM cliente WHERE nombre LIKE '%" .$busqueda. "%' ORDER BY nombre";  $resultado = mysql_query($sql); //Ejecución de la consulta //Si hay resultados... 
  if (mysql_num_rows($resultado) > 0){  // Se recoge el número de resultados 
    $registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; // Se almacenan las cadenas de resultado

   
	?>
   


  
    
          <?php

  while($fila = mysql_fetch_assoc($resultado)){ 
  ?>  <tr>
   <td><?php   echo  $fila['pk_cliente'] . '<br />'; ?></td>
  <td><?php   echo  $fila['nombre'] . '<br />'; ?></td>
<td><?php   echo  $fila['rfc'] . '<br />'; ?></td>
<td><?php echo  $fila['telefono'] . '<br />'; ?></td>
<td><?php echo  $fila['ciudad'] . '<br />'; ?></td>
<td><?php echo  $fila['direccion'] . '<br />';?> </td> <td>

                              <?php if ($fila['estatus']=='Debe') {
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
                                 echo "<td> <center> <a href=eliminar.php?pk_cliente=".$fila['pk_cliente']." "; 
                                 ?>onclick="return confirm('¿En verdad deseas eliminar este registro?','Confirma')" role="button" class="btn btn-mini" data-toggle="modal" title="Eliminar registro"<?php echo"><span class='glyphicon glyphicon-trash'></span></a></center> </td>";
                            ?>    

                          <td> <center>                 
                                <a data-toggle="modal" href="#actualizar2<?php echo $fila['pk_cliente']; ?>" role="button" class="btn btn-mini" title="Actualizar Informacion">
                                   <span class='glyphicon glyphicon-edit'></span>
                                </a></center>  
                            </td> 
                           

<!--INICIO de Pantalla Modal DE ACTUALIZAR-->

<div class="modal fade" id="actualizar2<?php echo $fila['pk_cliente']; ?>">
   <div class="modal-dialog modal-sm">   
      <div class="modal-content"> 
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            ×
            </button>
            <h3>Actualizar Informaci&oacuten</h3> 
         </div> <form name="form2" method="post" enctype="multipart/form-data" action="actualizar-cliente.php">

         <div class="modal-body">    
                         
    <input type="hidden" name="id" value="<?php echo $fila['pk_cliente']; ?>">
    
    <div class="form-group">
      <label for="email">Nombre:</label>
      <input type="text" class="form-control" id="nombre" name="nombre" onkeypress="return soloLetras(event)" placeholder="Ingrese nombre" maxlength="45" value="<?php echo $fila['nombre']; ?>" required>
    </div>

    <div class="form-group">
      <label for="email">RFC:</label>
      <input type="text" class="form-control" id="rfc" name="rfc" maxlength="12" placeholder="Ingrese rfc" value="<?php echo $fila['rfc']; ?>" required>
    </div>

    <div class="form-group">
      <label for="email">Tel&eacutefono:</label>
      <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el número de 10 dígitos" maxlength="10" value="<?php echo $fila['telefono']; ?>" required>
    </div>

     <div class="form-group">
      <label for="email">Ciudad:</label>
      <input type="text" class="form-control" id="ciudad" name="ciudad" onkeypress="return soloLetras(event)" maxlength="30" placeholder="Ejm. Tuxpan Nayarit" value="<?php echo $fila['ciudad']; ?>" required>
    </div>

    <div class="form-group">
      <label for="email">Direcci&oacuten:</label>
      <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ejm. Tabasco 125 Col. Zaurdas" maxlength="30" value="<?php echo $fila['direccion']; ?>" required>
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
                           <?php 
                                 echo "<td> <center> <a href=../venta/alta_venta.php?pk_cliente=".$fila['pk_cliente']." "; 
                                 ?>onclick="return confirm('¿En verdad deseas crear una venta?','Confirma')" role="button" class="btn btn-mini" data-toggle="modal" title="Vender"<?php echo"><button>Vender</button></a></center> </td>";
                            ?>   
                            </tr>  


<?php  
      } 
    }else{ 
  ?> 
<div class="alert alert-danger">
  <strong>Advertencia!</strong> el cliente que est&aacute buscando no se encuentra registrado en el sistema.
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
   <div class="modal-dialog modal-sm">   
      <div class="modal-content"> 
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            ×
            </button> <center>
            <h3>Registro de clientes</h3></center>
         </div>
         <div class="modal-body">

<center>
<form id="a" name="form2" method="post" enctype="multipart/form-data" action="registrar-cliente.php">
       
    <div class="form-group">
      <label for="email">Nombre:</label>
      <input type="text" class="form-control" id="nombre" name="nombre" onkeypress="return soloLetras(event)" maxlength="38" placeholder="Ingrese nombre" required>
    </div>
    <div class="form-group">
      <label for="pwd">RFC:</label>
      <input type="text" maxlength="12" class="form-control" id="rfc" name="rfc" placeholder="Ingrese 10 dígitos" required>
    </div>
    <div class="form-group">
      <label>tel&eacutefono</label><input type="text" class="form-control" name="telefono" id="telefono" placeholder="10 dígitos" maxlength="10" required> 
    </div>
      <div class="form-group">
      <label for="pwd">Ciudad:</label>
      <input type="ciudad" class="form-control" onkeypress="return soloLetras(event)" id="text" name="ciudad" maxlength="20" placeholder="Ejm. Santiago Ixcuintla" required>
    </div>
      <div class="form-group">
      <label for="pwd">Direcci&oacuten:</label>
      <input type="direccion" class="form-control" name="direccion" id="text" placeholder="Ejm. Puebla 194 Sur" maxlength="40" required>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn"><strong><i class="icon-ok"></i> Ingresar Cliente</strong></button>
        <button src="mostrar-cliente.php" class="btn btn-default" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>
    </div>
    </form>

</center>
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
	
