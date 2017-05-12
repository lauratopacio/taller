<?php
require('../seguridad/seguridad.php'); 
	require('../conexion.php');
	
	$query="SELECT pk_producto,codigo,marca_carro,nombre_pieza,cantidad, stock, costo FROM producto WHERE cantidad = stock+2";
	
	$resultado=$con->query($query);
	?>
   
   <html>
	<head>
	<title>Productos a surtir</title>
	</head>
	<body>
		
		<center><h1>Productos a surtir</h1></center>
		
		
		<p></p>
		
		<table border=1 width="100%">
			<thead>
				<tr>
				<td><b>PK</b></td>
				<td><b>Codigo</b></td>
				<td><b>Marca del Carro</b></td>
					<td><b>Nombre pieza</b></td>
					<td><b>Cantidad</b></td>
					<td><b>Stock</b></td>
					<td><b>Costo</b></td>
					
					<td><b>MODIFICAR<b></td>
					<td><b>ELIMINAR</b></td>
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
								<a href="modificar-producto.php?pk_producto=<?php echo $row['pk_producto'];?>">Modificar</a>
							</td>
							<td>
								<a href="eliminar.php?codigo=<?php echo $row['codigo'];?>">Eliminar</a>
							</td>
						</tr>

					<?php } ?>
				</tbody>
			</table>
			<p>
			<br>
			<a href="../index.php"> Atras </a>
			
		</body>
	</html>	
	
