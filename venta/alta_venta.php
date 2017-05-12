<?php 
	require('../seguridad/seguridad.php'); 
	require('../conexion.php');
	
$estatus='No pagado';
$usu=$_GET['pk_cliente'];
	//poner tal cual como esta en la base de datos 
	//y en el values poner las mismas variables que pusimos arriva 

$query="INSERT INTO venta(pk_venta,fecha_venta, fecha_fin,fk_cliente,estatus,forma_pago, TOTAL)

VALUES (NULL,NOW(),NOW(),'$usu', '$estatus',NULL,NULL)";
	
	$resultado=$con->query($query);
	
?>

<html>
	<head>
		<title>Guardar Producto</title>
	</head>
	<body>
		<center>	
			
		
			<?php 
			if ($insertar=true) {
	echo "<meta http-equiv='REFRESH' content='0; url= ../catalogo.php'>
	<script>
		alert('Inicie su venta!');
	</script>";
}else
{
	echo "<meta http-equiv='REFRESH' content='0; url= mostrar.php'>
	<script>
		alert('Este registro ya existe intente con otro!');
	</script>"; 
}
?>

			
		
			
		
			
		</center>
	</body>
	</html>	