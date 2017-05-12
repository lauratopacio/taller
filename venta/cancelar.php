<?php 
	require('../seguridad/seguridad.php'); 
	require('../conexion.php');
	
$query="SELECT  max(pk_venta) as maxi from venta";	
$resultado=$con->query($query);
while($row=$resultado->fetch_array())
{
 $max=$row['maxi'];
}
	//todos los pedidos por producto
$modificar="select COUNT(x.cantidad) as cant, y.nombre_pieza, x.fk_producto from venta_productos x, producto y, venta z where z.pk_venta=x.fk_venta and  x.fk_producto=y.pk_producto and x.fk_venta='$max' GROUP BY y.pk_producto";
$resul=$con->query($modificar);
while($row=$resul->fetch_array() )
{
	echo 'cantidad comprado';
	echo $cantidad=$row['cant'];
    echo 'producto';
	echo $fk_productos=$row['fk_producto'];	
 }

//selecciona la cantidad de productos que existen
$productos="select COUNT(cantidad) as cantidad, nombre_pieza, pk_producto from producto";
$result=$con->query($productos);
while($row2=$result->fetch_array() )
{
	echo 'cantidad comprado';
	echo $cant=$row2['cant'];
    echo 'producto';
	echo $fk_producto=$row2['fk_producto'];
	echo 'cantidad original';
 	echo $cant=$row2['cantidad'];
 	echo 'pk_producto';
 	echo $pk_producto=$row2['pk_producto'];
 	
 }
                                              00000
 	$cantid=$cant+$cantidad;

 	$query="UPDATE producto 
    SET cantidad='$cantid' WHERE pk_producto='$pk_producto'";
	
	$resultado=$con->query($query);

	$eliminar2="DELETE from venta_productos where fk_venta = '$max' ";
	$resultado3=$con->query($eliminar2);
	
	$eliminar4="DELETE from venta_servicio where fk_venta = '$max' ";
	$resultado4=$con->query($eliminar4);
	
	$eliminar="DELETE from venta where pk_venta = '$max' ";
	$resultado2=$con->query($eliminar);
?>

<html>
	<head>
		<title>Guardar Producto</title>
	</head>
	<body>
		<center>	
			
		
			<?php 
			if ($insertar=true) {
	echo "<meta http-equiv='REFRESH' content='0; url= ../admin/index2.php'>
	<script>
		alert('Venta Cancelada');
	</script>";
}else
{
	echo "<meta http-equiv='REFRESH' content='0; url= carrito.php'>
	<script>
		alert('Error!');
	</script>"; 
}
?>

			
		
			
		
			
		</center>
	</body>
	</html>	