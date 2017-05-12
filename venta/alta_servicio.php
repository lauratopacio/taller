<?php 
	require('../seguridad/seguridad.php'); 
	require('../conexion.php');
	
$mano=$_POST['mano_obra'];
$costo=$_POST['costo'];
//SELECCIONA LA ULTIMA VENTA
$query="SELECT  max(pk_venta) as maxi from venta";	
$resultado=$con->query($query);
while($row=$resultado->fetch_array())
{
 $max=$row['maxi'];
}


//INSERTA NUEVA VENTA POR PRODUCTO
$query2="INSERT INTO venta_servicio(pk_servicio,fk_venta, mano_obra, costo) VALUES (NULL, '$max', '$mano', '$costo')";
$resultado4=$con->query($query2);

?>

<html>
	<head>
		<title>Guardar servicio</title>
	</head>
	<body>
		<center>	
			
			<?php 
			if ($resultado4=true) {
	echo "
		<meta charset='UTF-8' http-equiv='REFRESH' content='0 ; url=carrito.php'>
	<script>
		alert('Servicio añadido!');
	</script>";
}else
{
	echo "
	<script>
		alert('este servicio no ha podido ser añadido!');
	</script>"; 
}
?>
		
		</center>
	</body>
	</html>	


