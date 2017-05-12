<?php

require('../seguridad/seguridad.php');
	require('../conexion.php');
	$query="SELECT marca_carro,nombre_pieza,cantidad FROM producto WHERE cantidad <= stock";
	
	$resultado=$con->query($query);
	?>
   
<!DOCTYPE html>
<html>
<head>
<!--imagen en la cabecera de la pagina-->
  <link rel="shortcut icon" href="../imagenes/simbo.png" type="image/png" />


	<title>Inicio</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>	
<body>
		

<?php 
	require('../menu/menu2.html'); ?>

<style type="text/css">

.ea{
    color:white;
    font-size:21px;
}
.table{
  background: white;
}
</style>
	<!--
	Menu-->


	<div class="container">

	<div class="jumbotron">
	<center>
	
	<blockquote>
  <h1>Bienvenido al punto de venta</h1>
</blockquote>

	<table><tr>
	<td width="10%">
		<center>

	<img src="../imagenes/banderas.png" width="200px" alt=""></center>
</td>

	<td width="5%">

	<table border=1 width="100%" class="table" id="table">
			<thead>
			<tr><p>PRODUCTOS URGENTES A SURTIR</p></tr>
				<tr>
				
				
					<td><b>Nombre pieza</b></td>
					<td><b>Marca del Carro</b></td>
					<td><b>Cantidad</b></td>
				
				
				
				</tr>

				<tbody>
					<?php

					 while($row=$resultado->fetch_assoc()){ 
					 	?>

						<tr>
						
							
							<td>
							<?php echo $row['nombre_pieza'];?>
							</td>
							<td>
							<?php echo $row['marca_carro'];?>
							</td>

							<td>
							<?php echo $row['cantidad'];?>
							</td>
						
							
						
					<?php } ?>

				</tbody>

				</td>

				</tr>

				</table>

				<a href="../surtir/stock_bajo.php"  class="btn btn-default">
					Ir a inventario para surir</a>
				
				</tr>

			</table>
					</div>


<div class="col-xs-3">
   <div class="thumbnail">
      <img src="../imagenes/usuario.png" alt="imagen">
      <div class="caption">
          <h3>Administradores</h3>
              <p>Los administradores de sitios web son los responsables de los sitios web de internet.Se aseguran de que la información del sitio web es correcta, segura y está actualizada. </p>
          <p>
          <a href="../admin/mostrar-administrador.php" class="btn btn-primary">Ver</a> 
          <a href="../admin/form_adm.php" class="btn btn-default">Agregar</a>
          </p>
      </div>
   </div>
 </div>

<div class="col-xs-3">
   <div class="thumbnail">
      <img src="../imagenes/carro.png" alt="imagen">
      <div class="caption">
          <h3>Ventas</h3>
              <p>Aqu&iacute podr&aacute observar todas las ventas realizadas desde su existencia, usted podrá buscar por fechas y podr&aacute crear nuevas ventas</p>
          <p>
          <a href="../venta/ver_venta.php" class="btn btn-primary">Ver</a> 
          <a href="../cliente/mostrar-cliente.php" class="btn btn-default">Agregar</a>
          </p>
      </div>
   </div>
 </div>
 <div class="col-xs-3">
   <div class="thumbnail">
      <img src="../imagenes/grafica.png" alt="imagen">
      <div class="caption">
          <h3>Gr&aacuteficas</h3>
              <p>Donec nec justo eget felis facilisis fermentum. 
               Aliquam porttitor mauris sit amet orci.</p>
          <p>

                <a data-toggle="modal" href="#example" class="btn btn-primary btn-large">
                 Ver
                </a>
            
          </p>
      </div>
   </div>
 </div>
  <div class="col-xs-3">
   <div class="thumbnail">
      <img src="../imagenes/reporte.png" alt="imagen">
      <div class="caption">
          <h3>Inventario</h3>
              <p>Podr&aacutes ver catalogo de productos  necesarios a surtir</p>
          <p>
          <a href="../surtir/stock_bajo.php" class="btn btn-primary">Ver</a> 
          </p>
      </div>
   </div>
 </div>
				
</div>
<center>
<!--INICIO de Pantalla Modal-->
<div id="example" class="modal fade">
   <div class="modal-dialog modal-sm">   
      <div class="modal-content"> 
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            ×
            </button>
            <h3>Todas las Gr&aacuteficas</h3><div class="col-xs-3">
  
 </div>
         </div>
         <div class="modal-body">
<form id="a" name="form2" method="post" enctype="multipart/form-data" action="registrar-cliente.php">
       
    <a href="../graficas/mostrar_grafica1.php" class="btn btn-primary">Productos m&aacutes vendidos</a> <br><br>
  
<a href=../graficas/mostrar_clientes_frecuentes.php class="btn btn-primary">Clientes m&aacutes frecuentes</a> <br><br>
  
   <a href="../graficas/mostrar_grafica3.php" class="btn btn-primary">Ventas cr&eacutedito/contado</a> <br><br>
  
      
    <div class="modal-footer">
        <button src="mostrar-cliente.php" class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>
    </div>
    </form>


         </div>
         
    </div>
   </div>
</div>
<!--FIN de Pantalla Modal-->
</center>
<div class="container">
 <pre><center><strong><a href="https://www.facebook.com/soft.unicorn" target="_blank" style="color:#000">Centro Multiservicio llantero y suspensiones de Santiago. Dirección Amado Nervo #321 C.P 63300 esquina Matamoros Col. Centro Santiago Ixc. Nay.</a></strong></center></pre>

</div>
</body>
</html>
