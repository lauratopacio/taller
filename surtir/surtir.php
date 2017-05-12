<?php 
require('../seguridad/seguridad.php'); 
require('../conexion.php');
    $codigo=$_POST['codigo'];
  $cantidad=$_POST['cantidad'];

  $query="SELECT pk_producto,cantidad,stock FROM producto WHERE codigo='$codigo'";
$resultado=$con->query($query);

while($row=$resultado->fetch_array())

{

	 $pk_producto=$row['pk_producto'];	
	 $cantidad2=$row['cantidad'];
     $stock=$row['stock'];

}

$cantidad3=$cantidad+$cantidad2;

$stock2=$stock+2;
if ($cantidad3>=$stock2) {
   $query2="UPDATE producto 
    SET cantidad='$cantidad3', estatus='Disponible' WHERE pk_producto='$pk_producto'";
    $resultado2=$con->query($query2);
}
else if($cantidad){

$query2="UPDATE producto 
    SET cantidad='$cantidad3' WHERE pk_producto='$pk_producto'";
    $resultado2=$con->query($query2);
}



				if($resultado2>0){
				?>
				<?php echo "
				<html>
    <head>
    </head>
    <body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
         <meta http-equiv= 'REFRESH' content= '0 ; url=stock_bajo.php'>
         <script>
             alert('Se ha surtido producto');
         </script> 
    </body>
    </html>
				" ?>
				
					<?php 	}else{ ?>
				
				<?php echo 
				"
				<html>
    <head>
    </head>
    <body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
         <meta http-equiv= 'REFRESH' content= '0 ; url=productos.php'>
         <script>
             alert('error');
         </script> 
    </body>
    </html>
				"
				 ?>
				
			<?php	} ?>