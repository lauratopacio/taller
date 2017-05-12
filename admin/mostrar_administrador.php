<?php
require('../seguridad/seguridad.php'); 
  require('../conexion.php');

  $dato= $_POST['dato'];
  $query="SELECT ced,estado,nom,usu,con,tipo FROM usuarios WHERE nom LIKE '%$dato%' or ced LIKE '%$dato%'or usu LIKE '%$dato%'";
  $resultado=$con->query($query);




  
  ?>
   
    <html>
    <head>
    <title>Clientes</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  
    </head>
   
    <body class="body">
        <style>
    .body{
   background: url('../imagenes/fondo.jpg');

}
.table{
  background: white;
}
</style>
      <?php     require('../menu/menu2.html'); ?>
<div class="container">
<div class="jumbotron">
    <h1>Registro y control de Administrador</h1>
<form name="form1" method="post" action="mostrar_administrador.php">
   <div style="vertical-align: 50%">
     <div class="row">  
        <div class="col-md-4 col-md-offset-4">
          <input id="dato" name="dato" type="text" class="form-control" placeholder="Nombre del cliente">
        </div>
        <div class="col-md-1">
           <button id="boton" name="boton" class="btn btn-primary"> Buscar</button>
        </div>
             <div class="col-md-1">
                <a data-toggle="moda" href="form_adm.php" class="btn btn-primary btn-large">
                 Alta de Administrador
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



<form id="a" name="form2" method="post" enctype="multipart/form-data" action="registrar-cliente.php">
       
  
    <strong id="a">Nombre Cliente</strong><br>
         <input type="text" name="nombre" autocomplete="off" required><br>
    <strong>RFC</strong><br>
        <input type="text" name="rfc" autocomplete="off" required><br>
    <strong>Telefono</strong><br>
        <input id="a" type="text" name="telefono" autocomplete="off" required><br>
    <strong>Ciudad</strong><br>
        <input type="text" name="ciudad" autocomplete="off" required><br>
    
    <strong>Direccion</strong><br>
    <input type="text" name="direccion" autocomplete="off" required><br>

      
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


    <div class="container" >
            <table class="table table-bordered">
              <tr class="header">
                <td width="2%" class="a"><strong>Ced.</strong></td>            
                <td width="2%" class="a"><strong>Estado</strong></td>            
                <td width="3%" class="a"><strong>Nombre</strong></td>
                    <td width="4%" class="a"><strong>Usuario</strong></td>
                <td width="4%" class="a"><strong>Password</strong></td>
                    <td width="4%" class="a"><strong>Tipo</strong></td>
                <td width="1%" class="a"><strong>Eliminar</strong></td>       
                <td width="1%" class="a"><strong>Modificar</strong></td>              
              <thead>
        <tbody>
          <?php
           while($row=$resultado->fetch_assoc()){ 
            ?>
            <tr>
            <td>
                         <?php  echo $row['ced'];?>
                         </td>
                 <td>
                 <?php echo $row['estado'];?>
                 </td>
              <td>
              <?php echo $row['nom'];?>
              </td>
                 <td>
              <?php echo $row['usu'];?>
              </td>
              <td>
              <?php echo $row['con'];?>
              </td>
                 <td>
              <?php echo $row['tipo'];?>
              </td>
              <?php 
                  echo "<td> <center> <a href=eliminar.php?ced=".$row['ced']." "; 
                   ?>onclick="return confirm('¿En verdad deseas eliminar este registro?','Confirma')" role="button" class="btn btn-mini" data-toggle="modal" title="Actualizar Informacion"<?php echo"><span class='glyphicon glyphicon-trash'></span></a></center> </td>";
                            ?> 
             

                          <td> <center>                 
                                <a data-toggle="modal" href="#actualizar<?php echo $row['ced']; ?>" role="button" class="btn btn-mini" title="Actualizar Informacion">
                                   <span class='glyphicon glyphicon-edit'></span>
                                </a></center>  
                            </td> 
                           
                           

                           
                    </div>
                  

<!--INICIO de Pantalla Modal DE ACTUALIZAR-->

<div class="modal fade" id="actualizar<?php echo $row['ced']; ?>">
   <div class="modal-dialog">   
      <div class="modal-content"> 
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            ×
            </button>
            <h3>Actualizar Informaci&oacuten <img src="../imagenes/inicio.png" width="10%"></h3> 
         </div> <form name="form2" method="post" enctype="multipart/form-data" action="actualizar-adm.php">

         <div class="modal-body">    
                                    <input type="hidden" name="ced" value="<?php echo $row['ced']; ?>">
                                    <strong>Estado</strong><br>
                                    <input type="text" name="estado" autocomplete="off"  required value="<?php echo $row['estado']; ?>"><br>
                                    <strong>Nombre</strong><br>
                                    <input type="text" name="nom" autocomplete="off"  required value="<?php echo $row['nom']; ?>"><br>
                                 
                                    <strong>Usuario</strong><br>
                                  <input type="text" name="usu"  autocomplete="off" required value="<?php echo $row['usu']; ?>"><br>
                                    <strong>Password</strong><br>
                                    <input type="text" name="con" autocomplete="off" required value="<?php echo $row['con']; ?>"><br>
                                    <strong>Tipo</strong><br>
                                    <input type="text" name="tipo" autocomplete="off" value="<?php echo $row['tipo']; ?>"><br>
                                     
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
  
