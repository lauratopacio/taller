<?php
   require('../seguridad/seguridad.php'); 
  require('../conexion.php');
  $query="SELECT pk_proveedor,nombre_empresa,persona_contacto,rfc,tel_persona,tel_empresa,ciudad,direccion,cod_postal,correo FROM proveedor";
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
                                 ?>onclick="return confirm('¿En verdad deseas eliminar este registro?','Confirma')" role="button" class="btn btn-mini" data-toggle="modal" title="Eliminar Información"<?php echo"><span class='glyphicon glyphicon-trash'></span></a></center> </td>";
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
   <div class="modal-dialog modal-sm">   
      <div class="modal-content"> 
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            ×
            </button>
            <h3>Actualizar Informaci&oacuten</h3> 
         </div> <form name="form2" method="post" enctype="multipart/form-data" action="actualizar-proveedor.php">

         <div class="modal-body">    

                                    <input type="hidden" name="id" value="<?php echo $row['pk_proveedor']; ?>">

    <div class="form-group">
      <label for="email">Nombre de empresa:</label>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre empresa" maxlength="30" value="<?php echo $row['nombre_empresa']; ?>" required>
    </div>  

      <div class="form-group">
      <label for="email">Persona de contacto:</label>
      <input type="text" class="form-control" id="persona_contacto" name="persona_contacto" placeholder="nombre empresa" maxlength="30" value="<?php echo $row['persona_contacto']; ?>" required>
    </div>  

  <div class="form-group">
      <label for="email">RFC:</label>
      <input type="text" class="form-control" id="rfc" name="rfc" placeholder="nombre empresa" maxlength="12" value="<?php echo $row['rfc']; ?>" required>
    </div>  
                                  
   <div class="form-group">
      <label for="email">Tel&eacutefono del contacto:</label>
      <input type="text" class="form-control" id="tel_persona" name="tel_persona" placeholder="nombre empresa" maxlength="10" value="<?php echo $row['tel_persona']; ?>" required>
    </div>                          

   <div class="form-group">
      <label for="email">Tel. empresa:</label>
      <input type="text" class="form-control" id="tel_empresa" name="tel_empresa" placeholder="xxx-xxx-xxx-xxx" maxlength="10" value="<?php echo $row['tel_empresa']; ?>" required>
    </div>   
                
    <div class="form-group">
      <label for="email">Ciudad:</label>
      <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="ejm. Tepic" maxlength="30" value="<?php echo $row['ciudad']; ?>" required>
    </div>               
   <div class="form-group">
      <label for="email">Direcci&oacuten:</label>
      <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion de la empresa" maxlength="30" value="<?php echo $row['direccion']; ?>" required>
    </div>         
      <div class="form-group">
      <label for="email">C&oacutedigo Postal</label>
      <input type="text" class="form-control" id="cod_postal" name="cod_postal" placeholder="Ejm. 63200" maxlength="5" value="<?php echo $row['cod_postal']; ?>" required>
    </div>    

                
  <div class="form-group">
      <label for="email">Correo electr&oacutenico:</label>
      <input type="text" class="form-control" id="correo" name="correo" placeholder="correo@empresa.com" maxlength="50" value="<?php echo $row['correo']; ?>" required>
    </div>                          
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
   <div class="modal-dialog modal-sm">   
      <div class="modal-content"> 
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            ×
            </button>
            <h3>Informaci&oacuten de proveedor</h3> 
         </div> <form name="form2" method="post" enctype="multipart/form-data" action="actualizar-cliente.php">

         <div class="modal-body">    
                                  
                                   
      <input type="hidden" name="id" value="<?php echo $row['pk_proveedor']; ?>">

    <div class="form-group">
      <label for="email">Nombre de empresa:</label>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre empresa" readonly="readonly" maxlength="30" value="<?php echo $row['nombre_empresa']; ?>" required>
    </div>  

      <div class="form-group">
      <label for="email">Persona de contacto:</label>
      <input type="text" class="form-control" id="persona_contacto" name="persona_contacto" readonly="readonly" placeholder="nombre empresa" maxlength="30" value="<?php echo $row['persona_contacto']; ?>" required>
    </div>  

  <div class="form-group">
      <label for="email">RFC:</label>
      <input type="text" class="form-control" readonly="readonly" id="rfc" name="rfc" placeholder="nombre empresa" maxlength="12" value="<?php echo $row['rfc']; ?>" required>
    </div>  
                                  
   <div class="form-group">
      <label for="email">Tel&eacutefono del contacto:</label>
      <input type="text" class="form-control" id="tel_persona" name="tel_persona" placeholder="nombre empresa" maxlength="10"readonly="readonly" value="<?php echo $row['tel_persona']; ?>" required>
    </div>                          

   <div class="form-group">
      <label for="email">Tel. empresa:</label>
      <input type="text" class="form-control" id="tel_empresa" name="tel_empresa" placeholder="xxx-xxx-xxx-xxx" maxlength="10" readonly="readonly" value="<?php echo $row['tel_empresa']; ?>" required>
    </div>   
                
    <div class="form-group">
      <label for="email">Ciudad:</label>
      <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="ejm. Tepic" maxlength="30" readonly="readonly" value="<?php echo $row['ciudad']; ?>" required>
    </div>               
   <div class="form-group">
      <label for="email">Direcci&oacuten:</label>
      <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion de la empresa" readonly="readonly" maxlength="30" value="<?php echo $row['direccion']; ?>" required>
    </div>         
      <div class="form-group">
      <label for="email">C&oacutedigo Postal</label>
      <input type="text" class="form-control" readonly="readonly" id="cod_postal" name="cod_postal" placeholder="Ejm. 63200" maxlength="5" value="<?php echo $row['cod_postal']; ?>" required>
    </div>    

                
  <div class="form-group">
      <label for="email">Correo electr&oacutenico:</label>
      <input type="text" class="form-control" readonly="readonly" id="correo" name="correo" placeholder="correo@empresa.com" maxlength="50" value="<?php echo $row['correo']; ?>" required>
    </div>   
                           
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
  
