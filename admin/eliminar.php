<?php 
	require('../seguridad/seguridad.php'); 
	require('../conexion.php');
	
	$ced=$_GET['ced'];
	
	$query="DELETE FROM usuarios WHERE ced='$ced'";
	
	$resultado=$con->query($query);



		
				if($resultado>0)
				{

echo"<html>
	<head>
	</head>
	<body>
	<br>
		<meta http-equiv='REFRESH' content='0 ; url=mostrar-administrador.php'> 
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
		<meta http-equiv='REFRESH' content='0 ; url=mostrar-administrador.php'>
		<script> 
			alert('Error al eliminar los datos');
		</script>
	</body>
	</html>";
	}
				?>
				
				