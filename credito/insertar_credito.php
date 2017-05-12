<?php 
	require('../seguridad/seguridad.php'); 
	require('../conexion.php');
	
$no=$_POST['no'];
$banco=$_POST['banco'];
$cantidad=$_POST['cantidad'];
$pk_cliente=$_POST['pk_cliente'];

//SELECCIONA LA ULTIMA VENTA
$query="SELECT pk_venta, TOTAL from venta where fk_cliente='$pk_cliente'";  
$resultado=$con->query($query);
while($row=$resultado->fetch_array())
{
 $venta=$row['pk_venta'];
$total=$row['TOTAL'];
}

$seleccion_creditos="SELECT  sum(cantidad) as cantidad_pagada from credito where fk_venta='$venta'";  
$resultado_creditos=$con->query($seleccion_creditos);
while($rowss=$resultado_creditos->fetch_array())
{
$cantidad_pagada=$rowss['cantidad_pagada'];
}

$total2=$total-$cantidad_pagada;

	//poner tal cual como esta en la base de datos 
	//y en el values poner las mismas variables que pusimos arriva 
if ($cantidad>$total2) {
	echo "<meta http-equiv='REFRESH' content='0; url= ../deudas/ver_deudas.php'>
	<script>
		alert('Usted paga de más!');
	</script>";
}
else{
	

$query="INSERT INTO credito(pk_credito,fk_venta, fecha, num_cheque, banco, cantidad)
VALUES (NULL,'$venta',NOW(),'$no','$banco', '$cantidad')";
	$resultado=$con->query($query);


$seleccion_creditos="SELECT  sum(cantidad) as cantidad_pagada from credito where fk_venta='$venta'";  
$resultado_creditos=$con->query($seleccion_creditos);
while($rows=$resultado_creditos->fetch_array())
{
$cantidad_pagada=$rows['cantidad_pagada'];
}
$estado='Disponible';
$esta='Pagado';
if ($total==$cantidad_pagada) {
//modifica el estatus de la venta a pagada y al status del cliente como disponible porque ya no debe nada
	$modificar_status_cliente="UPDATE cliente 
    SET estatus= '$estado' WHERE pk_cliente='$pk_cliente'";
	$resultado_cliente=$con->query($modificar_status_cliente);

	$modificar_status_venta="UPDATE venta 
    SET estatus= '$esta' WHERE fk_cliente='$pk_cliente'";
	$resultado_venta=$con->query($modificar_status_venta);	
	
}
else{
	//aun debe, no pasa nada
	 
}

?>

<html>
	<head>
		<title>Guardar Producto</title>
	</head>
	<body>
		<center>	
			
			<?php 
		if ($cantidad<=$total) {
	echo "<meta http-equiv='REFRESH' content='0; url= ../admin/index2.php'>
	<script>
		alert('Credito pagado!');
	</script>";
}else
{
	echo "<meta http-equiv='REFRESH' content='0; url= mostrar.php'>
	<script>
		alert('Dinero Insuficiente!');
	</script>"; 
}
}
?>

			
		
			
		
			
		</center>
	</body>
	</html>	