<?php
	
	$conexion = new mysqli('localhost','root','','taller');
	
	$nombre_pieza = array('nombre_pieza');
	$cantidad= array('cantidad');
	
	
	$consulta = "SELECT nombre_pieza, COUNT(fk_producto) as Cantidad FROM venta_productos v, producto p, venta x WHERE p.pk_producto=v.fk_producto and x.pk_venta=v.fk_venta  GROUP BY nombre_pieza ORDER BY COUNT(fk_producto) DESC";

	$result = $conexion->query($consulta);
	
	while ($fila = $result->fetch_array()) {
		$nombre_pieza[] = $fila['nombre_pieza'];
	}
	
	
	echo json_encode( array($nombre_pieza,$cantidad) );
	
?>
