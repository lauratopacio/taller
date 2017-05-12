<?php 
include('../conexion.php');
$query="SELECT  max(pk_venta) as maxi from venta";	
$resultado=$con->query($query);
while($row=$resultado->fetch_array())
{
 $max=$row['maxi'];
}
	

for ($i=1; $i < 30; $i++) { 
	$numeros = array($i => $i);
	echo $numeros[$i];
}

 ?>