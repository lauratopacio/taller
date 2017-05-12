<?php 
	
require('../seguridad/seguridad.php');
	require('../conexion.php');
	
$pk_producto=$_POST['id'];
$cantid=$_POST['cantidad'];
//SELECCIONAR LOS ATRIBUTOS DEL PRODUCTO
$producto="SELECT  costo, cantidad, estatus FROM producto WHERE pk_producto='$pk_producto'";
$result=$con->query($producto);
while($row=$result->fetch_array())
{
$costo=$row['costo'];
$cantida=$row['cantidad'];
$estatu=$row['estatus'];
}
	
$cantidades=$cantida-1;
$estatus='Producto Insuficiente';
$query="UPDATE producto 
    SET cantidad='$cantidades' WHERE pk_producto='$pk_producto'";
	$resultado=$con->query($query);

$producto2="SELECT   cantidad,stock FROM producto WHERE pk_producto='$pk_producto'";
$result2=$con->query($producto2);
while($row=$result2->fetch_array())
{

$cantida=$row['cantidad'];
$stock=$row['stock'];
}
$stockk=$stock+2;

if ($cantida==0) {
$modi="UPDATE producto 
    SET estatus='Insuficiente' WHERE pk_producto='$pk_producto'";
	
	$resultados=$con->query($modi);
} 

else if ($cantida<=$stockk && $cantida>=1) {
$modi="UPDATE producto 
    SET estatus='Producto Bajo' WHERE pk_producto='$pk_producto'";
	
	$resultados=$con->query($modi);
}
else{


}

$costo2=$cantid*$costo;
//SELECCIONA LA ULTIMA VENTA
$query="SELECT  max(pk_venta) as maxi from venta";	
$resultado=$con->query($query);
while($row=$resultado->fetch_array())
{
 $max=$row['maxi'];
}


//INSERTA NUEVA VENTA POR PRODUCTO
$query2="INSERT INTO venta_productos(pk_venta_producto, fk_venta, fk_producto, cantidad, costo) VALUES (NULL, '$max', '$pk_producto', '$cantid','$costo2')";
$resultado4=$con->query($query2);

?>

<html>
	<head>
		<title>Guardar Producto</title>
	</head>
	<body>
		<center>	
			
			<?php 
					if ($resultado4=true) {
	echo "
		<meta charset='UTF-8' http-equiv='REFRESH' content='0 ; url=../catalogo.php'>
	<script>
		alert('Producto añadido!');
	</script>";
}else
{
	echo "
	<script>
		alert('este producto no ha podido ser añadido!');
	</script>"; 
}


?>
		
		</center>
	</body>
	</html>	


