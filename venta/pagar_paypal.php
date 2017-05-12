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
////////////////////////////////////////////////////
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
////////////////////////////////////////////////////

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
$forma='PayPal';
$estatus='Pagado';
$query="UPDATE venta
    SET forma_pago='$forma', TOTAL='$total', estatus='$estatus' WHERE pk_venta='$max'";
	$resultado=$con->query($query);


if($query)
{
  echo"<html>
  <head>
  </head>
  <body>

    
  </body>
  </html>";
?>

<!DOCTYPE html>
<html>
<head>
<!--imagen en la cabecera de la pagina-->
 <link rel="shortcut icon" href="../imagenes/simbo.png" type="image/png" />


  <title>Pago con PayPal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="../jquery/jquery.js"></script> 

</head>
<body>
 
        <?php
  
  require('../menu/menu2.html');

  //seleccionar productos añadidos al carrito
  $query="SELECT y.pk_venta_producto,x.codigo, x.nombre_pieza, x.costo, sum(y.cantidad) as cant, sum(y.costo) as subtot from venta_productos y, producto x, venta z where z.pk_venta=y.fk_venta and x.pk_producto=y.fk_producto and y.fk_venta=$max group by x.codigo  ORDER BY x.nombre_pieza asc " ;
  $resultado=$con->query($query);
  ?>
    <!---->
  
  <div class='container'>

    <!---->
 


  
  <div class="jumbotron">
  <div class="container">
   <center>  <h1>Gracias por su compra en PayPal!</h1>
    <h2>Total: <?php   echo $total; ?></h2>
    <h4>Nombre: <?php   echo $nombre; ?></h4>
	<h4>RFC: <?php   echo $rfc; ?></h4>
 	<h4>Telefono: <?php   echo $telefono; ?></h4> 
 	<h4>Ciudad: <?php   echo $ciudad; ?></h4>
 	<h4>Domicilio: <?php   echo $dom; ?></h4>
    <h4>Fecha de Venta:  <?php   echo $fecha; ?> 
</center> 
  </div>
</div>

<!--FIN DE VENTANA MODAL-->


  <tr>
    <td>
    <pre><center><strong><a href="https://www.facebook.com/soft.unicorn" target="_blank" style="color:#000">Centro Multiservicio llantero y suspensiones de Santiago. Dirección Amado Nervo #321 C.P 63300 esquina Matamoros Col. Centro Santiago Ixc. Nay.</a></strong></center></pre>
    </td>
  </tr>
    </div>
  </div>


  </body>
  </html>
<?php 

}
?>




