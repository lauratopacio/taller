<?php 
	$mysqli=new mysqli("localhost","root","","taller"); 
	//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	$pk_venta_producto=$_POST['pk_venta_producto'];
	$cantidad=$_POST['cantidad'];
	
	


    //Se crean variables para poder hacer el UPDATE al crear las variables del archio actualizar 
	//al poner $nombre=$_POST['nom'], el $nombre es una bariable nueva creada y el ['nom'] 
	//lo tomamos del archivo modificar de como lo llamamos en el otro archivo ejemplo
	// <input type="text" name="nom"  size="25" y vemos que es el mismo nombre 'nom'
	// y  despues del SET ponemos el nombre igual que en la base de datos seguido por la variable creada
	$query="UPDATE venta_productos 
   SET cantidad='$cantidad'

	WHERE pk_venta_producto='$pk_venta_producto'";

	
	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>
		<title>Modificar Cantidad</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
					echo "
					<html>
					<head>
					<body>
					<meta http-equiv='REFRESH' content='0; url=carrito.php'>
					<script>
						alert('Producto Se Modifico Con Exito');
						</script>
					</body>
					</html>";
				?>
				

				
					<?php 	}else{ 
						echo "
					<html>
					<head>
					<body>
					<meta http-equiv='REFRESH' content='0; url=habitacion.php'>
					<script>
						alert('Producto No se Modifico');
						</script>
					</body>
					</html>";
						?>
				
				
				
			<?php	} ?>
			
			<p></p>	
					
		</center>
	</body>
</html>
				
				