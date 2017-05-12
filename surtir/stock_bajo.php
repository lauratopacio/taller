<?php
require('../seguridad/seguridad.php'); 
	require('../conexion.php');

    require('../menu/menu2.html');
	
	$query="SELECT pk_producto,codigo,marca_carro,nombre_pieza,cantidad, stock, costo FROM producto WHERE cantidad <= stock+2";
	
	$resultado=$con->query($query);
	?>
   


<!DOCTYPE html>
<html>
<head>
<!--imagen en la cabecera de la pagina-->
  <link rel="shortcut icon" href="./imagenes/simbo.png" type="image/png" />


    <title>Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../jquery/jquery.js"></script> 
    
    </head>

    
<body>




        <!---->
         <div class="container">
         <center>
         <h1>Inventario a surtir</h1>
	<table border=1 width="100%" class="table">
			<thead>
				<tr>
				<td><b>PK</b></td>
				<td><b>Codigo</b></td>
				<td><b>Marca del Carro</b></td>
					<td><b>Nombre pieza</b></td>
					<td><b>Cantidad</b></td>
					<td><b>Stock</b></td>
					<td><b>Costo</b></td>
					
					<td><b>Surtir<b></td>
				
				</tr>

				<tbody>
					<?php

					 while($row=$resultado->fetch_assoc()){ 
					 	?>

						<tr>
							 <td>
						     <?php echo $row['pk_producto'];?>
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
							<?php echo $row['stock'];?>
							</td>

							<td>
							<?php echo $row['costo'];?>
							</td>
							<td>
								<a href="stock_bajos.php?pk_producto=<?php echo $row['pk_producto'];?>">Surtir Producto</a>
							</td>
							
						</tr>

					<?php } ?>
				</tbody>
			</table>
			</center>
  </div>
<div class="container">
 <pre><center><strong><a href="https://www.facebook.com/soft.unicorn" target="_blank" style="color:#000">Centro Multiservicio llantero y suspensiones de Santiago. Dirección Amado Nervo #321 C.P 63300 esquina Matamoros Col. Centro Santiago Ixc. Nay.</a></strong></center></pre>

</div>
</body>
</html>

   



  