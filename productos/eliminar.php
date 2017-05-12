<?php 
	require('../seguridad/seguridad.php'); 
	require('../conexion.php');
	
	$codigo=$_GET['codigo'];
	
	$query="DELETE FROM producto WHERE codigo='$codigo'";
	
	$resultado=$con->query($query);



		
				if($resultado>0)
				{

echo"<html>
	<head>
	</head>
	<body>
	<br>
		<meta http-equiv='REFRESH' content='0 ; url=productos.php'> 
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
		<meta http-equiv='REFRESH' content='0 ; url=productos.php'>
		<script> 
			alert('Error al eliminar los datos');
		</script>
	</body>
	</html>";
	}
				?>
				
				