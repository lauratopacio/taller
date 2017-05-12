<?php
require('../seguridad/seguridad.php'); 
include('../conexion_estructurado.php');
$ruta="../imagenes";
$archivo= $_FILES['imagen']['tmp_name'];
$nombreArchivo=$_FILES['imagen']['name'];
move_uploaded_file($archivo, $ruta."/".$nombreArchivo);


$ruta2 = $ruta."/".$nombreArchivo;

 $codigo=$_POST['codigo'];
	//poner el nombre como estan en el input,y $ las bariables inventadas
	//pero que coinsida con lo que es 
$marca_carro=$_POST['marca'];
	 $nombre_pieza=$_POST['nombre'];
	$cantidad=$_POST['cantidad'];
	$costo=$_POST['costo'];
$stock=$_POST['stock'];
 $estatus='Disponible';

mysql_select_db($database_Mysql,$Mysql);

$insertar=mysql_query("INSERT INTO producto(pk_producto,codigo, marca_carro, nombre_pieza, cantidad,stock, costo,imagen, estatus)VALUES(NULL,'".$codigo."','".$marca_carro."','".$nombre_pieza."','".$cantidad."','".$stock."','".$costo."','".$ruta2."','".$estatus."')",$Mysql);
if ($insertar=true) {
	echo "<meta http-equiv='REFRESH' content='0; url= productos.php'>
	<script>
		alert('Producto guardado con exito!');
	</script>";
}else
{
	echo "<meta http-equiv='REFRESH' content='0; url= productos.php'>
	<script>
		alert('Este registro ya existe intente con otro!');
	</script>"; 
}
?>