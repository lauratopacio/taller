<?php 
  require('../seguridad/seguridad.php'); 
  require('../conexion.php');
//SELECCIONA LA ULTIMA VENTA
$query="SELECT  max(pk_venta) as maxi from venta";  
$resultado=$con->query($query);
while($row=$resultado->fetch_array())
{
 $max=$row['maxi'];
}
//conocer los datos del cliente qe realizo la venta
$query2="SELECT y.fk_cliente, x.nombre, x.telefono, x.ciudad, x.direccion, x.rfc, y.fecha_venta,y.fecha_fin from venta y, cliente x where y.fk_cliente=x.pk_cliente and y.pk_venta='$max'";  
$resultado2=$con->query($query2);
while($row2=$resultado2->fetch_array())
{
$pk_cliente=$row2['fk_cliente'];
 $nombre=$row2['nombre'];
$rfc=$row2['rfc'];
$fecha=$row2['fecha_venta'];
$nombre=$row2['nombre'];
$fecha_fin=$row2['fecha_fin'];
$dom=$row2['direccion'];
$ciudad=$row2['ciudad'];
$telefono=$row2['telefono'];

}
$debe='Debe'; 
$modificar_cliente="UPDATE cliente 
    SET estatus= '$debe' WHERE pk_cliente='$pk_cliente'";
$resultado2=$con->query($modificar_cliente);


//suma de costo de productos
 $query7="SELECT sum(x.costo) as costo_produc from venta_productos x, venta z where z.pk_venta=x.fk_venta and x.fk_venta='$max' " ;
  $resultado7=$con->query($query7);

while($row7=$resultado7->fetch_array())
{
 $sum_producto=$row7['costo_produc'];
}

/// suma de servicios
  $query3="SELECT sum(x.costo) as costo_venta from venta_servicio x, venta z where z.pk_venta=x.fk_venta and x.fk_venta='$max' ORDER BY x.mano_obra asc " ;
  $resultado3=$con->query($query3);

while($row4=$resultado3->fetch_array())
{
 $sum_venta=$row4['costo_venta'];
}


//suma los productos y las ventas

  $total=$sum_producto+$sum_venta;





?>

<!DOCTYPE html>
<html>
<head>
<!--imagen en la cabecera de la pagina-->
  <link rel="shortcut icon" href="./imagenes/simbo.png" type="image/png" />


	<title>Inicio</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="jquery/jquery.js"></script> 
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>

	<script src="../jquery/bootstrap.js"></script>
<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../css/docs.css" rel="stylesheet">
    <link href="../js/google-code-prettify/prettify.css" rel="stylesheet">
    <script src="../js/jquery.js"></script>
 
	
	</head>

	
<body>
	<!--
	Menu-->
	<nav class="navbar navbar-inverse" role="navigation">
<!--       <a href="#" class="navbar-brand"> </a>		
		    	<a href="#" class="navbar-brand"> </a>	
				<a href="#" class="navbar-brand"> </a>	
			 -->

				
				
		<div  align='right' >
		<a href="../catalogo.php" align="left">

                      
                       	<img src="../imagenes/carrito.png" width='60px'>  
                 </a>


			</nav>


		<!---->
		 <div class="container">
<div class="jumbotron">
 
   <center>  <h1>Pago a cr&eacutedito!</h1>
 

 <h4>Nombre: <?php   echo $nombre; ?></h4>
<h4>RFC: <?php   echo $rfc; ?></h4>
 <h4>Telefono: <?php   echo $telefono; ?></h4> 
 <h4>Ciudad: <?php   echo $ciudad; ?></h4>
 <h4>Domicilio: <?php   echo $dom; ?></h4>
  <h4>Fecha de Venta:  <?php   echo $fecha; ?> / Fecha a Pagar:  <?php   echo $fecha_fin; ?></h4>
 <table border="1">
 <td>
 <h3>Total a Pagar: <?php   echo $total; ?></h3></td>
 </table>   
 <br>
  <p><a href="forma_pago_credito.php" class="btn btn-primary btn-lg" role="button">Aceptar</a></p>
  </center> 
  </div>
  </div>

</body>
</html>