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
$forma="Credito";
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

///guarda pago


$estatus="No pagado";
//modificar tabla de venta
$query="UPDATE venta 
    SET estatus='$estatus',TOTAL='$total',forma_pago='$forma'
 WHERE pk_venta='$max'";
  
  $resultado=$con->query($query);

  //seleccionar productos añadidos al carrito

if ($query=true) {
  echo "<meta http-equiv='REFRESH' content='0; url= ../admin/index2.php'>
  <script>
    alert('Forma de pago a credito!');
  </script>";
}else
{
  echo "<meta http-equiv='REFRESH' content='0; url= forma_pago_credito.php'>
  <script>
    alert('Forma de pago fallida!');
  </script>"; 
}


  ?>
    <!---->
