<?php
require('../seguridad/seguridad.php'); 
	require('../conexion.php');
	$dato=$_POST['dato'];
	$query="SELECT pk_proveedor,nombre_empresa,persona_contacto,rfc,tel_persona,tel_empresa,ciudad,direccion,cod_postal,correo FROM proveedor where nombre_empresa LIKE '%$dato%'";
	

  $resultado=$con->query($query);

  ?>
   
    <html>
    <head>
    <title>Proveedores</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  
    </head>
   
    <body>
      <?php  require('../menu/menu2.html'); ?>
<div class="container">
<div class="jumbotron">
    <h1>Registro y control de Proveedores</h1>
<form name="form1" method="post" action="mostrar_proveedor.php">
   <div style="vertical-align: 50%">
     <div class="row">  
        <div class="col-md-4 col-md-offset-4">
          <input id="dato" name="dato" type="text" class="form-control" placeholder="Nombre del cliente">
        </div>
        <div class="col-md-1">
           <button id="boton" name="boton" class="btn btn-primary"> Buscar</button>
        </div>
             <div class="col-md-1">
                <a data-toggle="modal" href="#example" class="btn btn-primary btn-large">
                 Alta de Proveedor
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
            <h3>Registro de clientes</h3>
         </div>
         <div class="modal-body">



<form id="a" name="form2" method="post" enctype="multipart/form-data" action="registrar-proveedor.php">
       
        <strong id="a">Nombre Empresa</strong><br>
         <input type="text" name="nombre_empresa" autocomplete="off" required><br>
    <strong>Persona Contacto</strong><br>
        <input type="text" name="persona_contacto" autocomplete="off" required><br>
    <strong>RFC</strong><br>
        <input id="a" type="text" name="rfc" autocomplete="off" required><br>
    <strong>Telefono Persona</strong><br>
        <input type="text" name="tel_persona" autocomplete="off" required><br>
    <strong>Telefono Empresa </strong><br>
    <input type="text" name="tel_empresa" autocomplete="off" required><br>
  <strong>Ciudad</strong> <br>
    <input type="text" name="ciudad" autocomplete="off" required><br>
  <strong>Direccion</strong><br>
    <input type="text" name="direccion" autocomplete="off" required><br>
  <strong>Codigo Postal</strong><br>
    <input type="text" name="cod_postal" autocomplete="off" required><br>
  <strong>Correo</strong><br>
    <input type="text" name="correo" autocomplete="off" required>




      
    <div class="modal-footer">
        <button type="submit" class="btn"><strong><i class="icon-ok"></i> Ingresar Cliente</strong></button>
        <button src="mostrar-cliente.php" class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>
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
           <td width="7%" class="a"><strong>Codigo</strong></td>            
                <td width="5%" class="a"><strong>Nombre Empresa</strong></td>            
                <td width="15%" class="a"><strong>Persona Contacto</strong></td>
                <td width="7%" class="a"><strong>RFC</strong></td>
                <td width="5%" class="a"><strong>Telefono Empresa</strong></td>
                <td width="5%" class="a"><strong>Ciudad</strong></td>
                <td width="5%" class="a"><strong>Correo</strong></td>
                <td width="5%" class="a"><strong>Eliminar</strong></td>       
                <td width="5%" class="a"><strong>Modificar</strong></td>              
                <td width="5%" class="a"><strong>Ver</strong></td>                 
              <thead>
        <tbody>
          <?php
           while($row=$resultado->fetch_assoc()){ 
            ?>
            <tr><td>
             <?php  echo $row['pk_proveedor'];?>
                         </td>

                 <td>
                 <?php echo $row['nombre_empresa'];?>
                 </td>
                             
              <td>
              <?php echo $row['persona_contacto'];?>
              </td>

              <td>
              <?php echo $row['rfc'];?>
              </td>
              <td>
              <?php echo $row['tel_empresa'];?>
              </td>
                            <td>
              <?php echo $row['ciudad'];?>
              </td>
             
              <td>
              <?php echo $row['correo'];?>
              </td>
                            
                             
                            <?php 
                                 echo "<td> <center> <a href=eliminar.php?pk_cliente=".$row['pk_proveedor']." "; 
                                 ?>onclick="return confirm('¿En verdad deseas eliminar este registro?','Confirma')" role="button" class="btn btn-mini" data-toggle="modal" title="Actualizar Informacion"<?php echo"><span class='glyphicon glyphicon-trash'></span></a></center> </td>";
                            ?>    

                          <td> <center>                 
                                <a data-toggle="modal" href="#actualizar2<?php echo $row['pk_proveedor']; ?>" role="button" class="btn btn-mini" title="Actualizar Informacion">
                                   <span class='glyphicon glyphicon-edit'></span>
                                </a></center>  
                            </td> 
                           
                            <td> <center>                 
                                <a data-toggle="modal" href="#informacion<?php echo $row['pk_proveedor']; ?>" role="button" class="btn btn-mini" title="Ver informacion">
                                   <span class='glyphicon glyphicon-list-alt'></span>
                                </a></center>  
                            </td> 
                             

                           
                    </div>
                  

<!--INICIO de Pantalla Modal DE ACTUALIZAR-->

<div class="modal fade" id="actualizar2<?php echo $row['pk_proveedor']; ?>">
   <div class="modal-dialog">   
      <div class="modal-content"> 
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            ×
            </button>
            <h3>Actualizar Informaci&oacuten <img src="../imagenes/inicio.png" width="10%"></h3> 
         </div> <form name="form2" method="post" enctype="multipart/form-data" action="actualizar-proveedor.php">

         <div class="modal-body">    

                                    <input type="hidden" name="id" value="<?php echo $row['pk_proveedor']; ?>">
                                    <strong>Nombre</strong><br>
                                    <input type="text" name="nombre_empresa" autocomplete="off"  required value="<?php echo $row['nombre_empresa']; ?>"><br>
 <strong>Persona de Contacto</strong><br>
                                    <input type="text" name="persona_contacto" autocomplete="off"  required value="<?php echo $row['persona_contacto']; ?>"><br>
                                    <strong>RFC</strong><br>
                                    <input type="text" name="rfc" autocomplete="off"  required value="<?php echo $row['rfc']; ?>"><br>
                                    <strong>Telefono del contacto</strong><br>
                                  <input type="text" name="tel_persona"  autocomplete="off" required value="<?php echo $row['tel_persona']; ?>"><br>
                                    <strong>Tel. empresa</strong><br>
                                    <input type="text" name="tel_empresa" autocomplete="off" required value="<?php echo $row['tel_empresa']; ?>"><br>
                                     <strong>ciudad</strong><br>
                                    <input type="text" name="ciudad" autocomplete="off"  required value="<?php echo $row['ciudad']; ?>"><br>
                                    <strong>Direccion</strong><br>
                                    <input type="text" name="direccion" autocomplete="off" value="<?php echo $row['direccion']; ?>"><br>
                                     <strong>cod_postal</strong><br>
                                    <input type="text" name="cod_postal" autocomplete="off"  required value="<?php echo $row['cod_postal']; ?>"><br>
                                     <strong>Correo electr&oacutenico</strong><br>
                                    <input type="text" name="correo" readonly="readonly" autocomplete="off" value="<?php echo $row['correo']; ?>"><br>
                    
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
                     
<!--INICIO de Pantalla Modal DE VER INFORMACION-->

<div class="modal fade" id="informacion<?php echo $row['pk_proveedor']; ?>">
   <div class="modal-dialog">   
      <div class="modal-content"> 
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            ×
            </button>
            <h3>Informaci&oacuten de proveedor<img src="../imagenes/inicio.png" width="10%"></h3> 
         </div> <form name="form2" method="post" enctype="multipart/form-data" action="actualizar-cliente.php">

         <div class="modal-body">    
                                  
                                    <strong>Nombre Empresa</strong><br>
                                    <input type="text" name="nombre_empresa" readonly="readonly"  autocomplete="off" required value="<?php echo $row['nombre_empresa']; ?>"><br>
                                    <strong>Persona Contacto</strong><br>
                                  <input type="text" name="persona_contacto" readonly="readonly"  autocomplete="off" required value="<?php echo $row['persona_contacto']; ?>"><br>
                                    <strong>RFC</strong><br>
                                  <input type="text" name="rfc" readonly="readonly"  autocomplete="off" required value="<?php echo $row['rfc']; ?>"><br>
                                    <strong>Telefono Persona</strong><br>
                                    <input type="text" name="tel_persona" readonly="readonly" autocomplete="off" required value="<?php echo $row['tel_persona']; ?>"><br>
                                    <strong>Telefono Empresa</strong><br>
                                    <input type="text" name="tel_empresa" readonly="readonly"  autocomplete="off" value="<?php echo $row['tel_empresa']; ?>"><br>
                                   <strong>Ciudad</strong><br>
                                    <input type="text" name="ciudad" readonly="readonly"  autocomplete="off" value="<?php echo $row['ciudad']; ?>"><br>
                                   <strong>Direccion</strong><br>
                                    <input type="text" name="direccion" readonly="readonly"  autocomplete="off" value="<?php echo $row['direccion']; ?>"><br>
                                   <strong>Codigo Postal</strong><br>
                                    <input type="text" name="cod_postal" readonly="readonly"  autocomplete="off" value="<?php echo $row['cod_postal']; ?>"><br>
                                   <strong>Correo</strong><br>
                                    <input type="text" name="correo" readonly="readonly"  autocomplete="off" value="<?php echo $row['correo']; ?>"><br>
                           
        </div>
        <div class="modal-footer">
        <button src="mostrar-proveedor.php" class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>
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
      <div class="container">
 <pre><center><strong><a href="https://www.facebook.com/soft.unicorn" target="_blank" style="color:#000">Centro Multiservicio llantero y suspensiones de Santiago. Dirección Amado Nervo #321 C.P 63300 esquina Matamoros Col. Centro Santiago Ixc. Nay.</a></strong></center></pre>

</div>
    </body>
  </html> 
  
