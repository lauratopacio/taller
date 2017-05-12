<?php 
	require('../seguridad/seguridad.php'); 
	require('../conexion.php');
	
	$pk_cliente=$_GET['pk_cliente'];
	
	$query="DELETE FROM cliente WHERE pk_cliente='$pk_cliente'";
	
	$resultado=$con->query($query);



		
				if($resultado>0)
				{

echo"<html>
	<head>
	</head>
	<body>
	<br>
		<meta http-equiv='REFRESH' content='0 ; url=mostrar-cliente.php'> 
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
		<meta http-equiv='REFRESH' content='0 ; url=mostrar-cliente.php'>
		<script> 
			alert('Error al eliminar los datos');
		</script>
	</body>
	</html>";
	}
				?>
				
				