<?php 
  
require('../seguridad/seguridad.php');
  require('../conexion.php');
  require('../menu/menu2.html');

//SELECCIONA LA ULTIMA VENTA
$query="SELECT  max(pk_venta) as maxi from venta";  
$resultado=$con->query($query);
while($row=$resultado->fetch_array())
{
 $max=$row['maxi'];
}
////////////////////////////////////////////////////
$pago=$_POST['pago'];
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


$cambio=$pago-$total;

if($pago<$total)
{
  echo"<html>
  <head>
  </head>
  <body>
  <br>


    <meta http-equiv='REFRESH' content='0 ; url=carrito.php'>
    <script>
      alert('Dinero Insuficiente');
    </script>
  </body>
  </html>";
}else {
  echo"<html>
  <head>
  </head>
  <body>

    
  </body>
  </html>";


///guarda pago
  $query6="INSERT INTO pago_contado(pk_pago, fk_venta,fecha,cantidad)VALUES(NULL, '$max',NOW(),'$total') " ;
  $resultado6=$con->query($query6);

$estatus="Pagado";
$contado="Contado";
//modificar tabla de venta
$query="UPDATE venta 
    SET estatus='$estatus', forma_pago='$contado', TOTAL='$total'
 WHERE pk_venta='$max'";
  
  $resultado=$con->query($query);




?>

<!DOCTYPE html>
<html>
<head>
<!--imagen en la cabecera de la pagina-->
 <link rel="shortcut icon" href="../imagenes/simbo.png" type="image/png" />


  <title>Alta citas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="../jquery/jquery.js"></script> 
  
 
  



 
</head>
<body>
 
        <?php
  

  //seleccionar productos añadidos al carrito
  $query="SELECT y.pk_venta_producto,x.codigo, x.nombre_pieza, x.costo, sum(y.cantidad) as cant, sum(y.costo) as subtot from venta_productos y, producto x, venta z where z.pk_venta=y.fk_venta and x.pk_producto=y.fk_producto and y.fk_venta=$max group by x.codigo  ORDER BY x.nombre_pieza asc " ;
  $resultado=$con->query($query);
  ?>
    <!---->
  
  <div class='container'>

    <!---->
 


  
  <div class="jumbotron">
  <div class="container">
   <center>  <h1>Gracias por su compra!</h1>
    <h2>Total: <?php   echo $total; ?></h2>
    <h2>Pag&oacute: <?php   echo $pago; ?></h2>
    <h2>Su cambio es: <?php   echo $cambio; ?></h2>
    <p><a class="btn btn-primary btn-lg" role="button">Imprimir Ticket</a></p></center> 
  </div>
</div>

<!--FIN DE VENTANA MODAL-->


  <tr>
    <td>
    <pre><center><strong><a href="https://www.facebook.com/soft.unicorn" target="_blank" style="color:#000">Desarrollado por Laura Topacio Valdez Morones, Cesar Ramirez Torres y Jesus Ivan 2016 - Santiago Ixcuintla</a></strong></center></pre>
    </td>
  </tr>
    </div>
  </div>


  </body>
  </html>
<?php 

}
?>




