<?php 
	require('../seguridad/seguridad.php'); 
	require('../conexion.php');
	
	$pk_venta_producto=$_GET['pk_venta_producto'];
	
	$query="DELETE FROM venta_productos WHERE pk_venta_producto = '$pk_venta_producto'";
	
	$resultado=$con->query($query);



		
				if($resultado>0)
				{

echo"<html>
	<head>
	</head>
	<body>
	<br>
		<meta http-equiv='REFRESH' content='0 ; url=../venta/carrito.php'> 
		<script> 
			alert('Datos eliminados con Exito');
		</script>
	</body>
	</html>";	
}else {
	echo"<html>
	<head>
	</head>
	<body>
		<meta http-equiv='REFRESH' content='0 ; url=../venta/carrito.php'>
		<script> 
			alert('Error al eliminar los datos');
		</script>
	</body>
	</html>";
	}
				?>
				
				