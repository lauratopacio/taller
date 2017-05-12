<?php 
	require('../seguridad/seguridad.php'); 
	require('../conexion.php');

    $pk_producto=$_POST['pk_producto'];
    $codigo=$_POST['codigo'];
    $marca_carro=$_POST['marca'];
	$nombre_pieza=$_POST['nombre_pieza'];
	$cantidad=$_POST['cantidad'];
	$costo=$_POST['costo'];
	$stock=$_POST['stock'];

	$ruta="imagenes";
	if (empty($_POST['imagen'])) {
$query="UPDATE producto 
    SET codigo='$codigo',marca_carro='$marca_carro',nombre_pieza='$nombre_pieza'
	,cantidad='$cantidad',costo='$costo', stock='$stock' WHERE pk_producto='$pk_producto'";
	
	$resultado=$con->query($query);
}else {
	

$archivo= $_FILES['imagen']['tmp_name'];
$nombreArchivo=$_FILES['imagen']['name'];
		
$ruta2 = $nombreArchivo;
    //Se crean variables para poder hacer el UPDATE al crear las variables del archivo actualizar 
	//al poner $nombre=$_POST['nom'], el $nombre es una bariable nueva creada y el ['nom'] 
	//lo tomamos del archivo modificar de como lo llamamos en el otro archivo ejemplo
	// <input type="text" name="nom"  size="25" y vemos que es el mismo nombre 'nom'
	// y  despues del SET ponemos el nombre igual que en la base de datos seguido por la variable creada
	$query="UPDATE producto 
    SET codigo='$codigo',marca_carro='$marca_carro',nombre_pieza='$nombre_pieza'
	,cantidad='$cantidad',costo='$costo', imagen='$ruta2' WHERE pk_producto='$pk_producto'";
	
	$resultado=$con->query($query);
	}
?>

<html>
	<head>
		<title>Modificar Producto</title>
	</head>
	
	<body>
		<center>
<?php 
				if($resultado>0){
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
         <meta http-equiv= 'REFRESH' content= '0 ; url=productos.php'>
         <script>
             alert('Datos Modificados con exito');
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
             alert('Datos Modificados con exito');
         </script> 
    </body>
    </html>
				"
				 ?>
				
			<?php	} ?>
			
			<p></p>	
			
			<a href="mostrar-proveedor.php">Regresar</a>
			
		</center>
	</body>
</html>
				
					