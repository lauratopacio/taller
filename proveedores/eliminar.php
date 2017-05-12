<?php 
	require('../seguridad/seguridad.php'); 
	require('../conexion.php');
	
	$pk_proveedor=$_GET['pk_proveedor'];
	
	$query="DELETE FROM proveedor WHERE pk_proveedor='$pk_proveedor'";
	
	$resultado=$con->query($query);



		
				if($resultado>0)
				{

echo"<html>
	<head>
	</head>
	<body>
	<br>
		<meta http-equiv='REFRESH' content='0 ; url=mostrar-proveedor.php'> 
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
		<meta http-equiv='REFRESH' content='0 ; url=mostrar-proveedor.php'>
		<script> 
			alert('Error al eliminar los datos');
		</script>
	</body>
	</html>";
	}
				?>
				
				