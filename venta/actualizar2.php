<?php 
	$mysqli=new mysqli("localhost","root","","taller"); 
	//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	echo$pk_servicio=$_POST['pk_servicio'];
	$mano_obra=$_POST['mano_obra'];
	$costo=$_POST['costo'];


	
    //Se crean variables para poder hacer el UPDATE al crear las variables del archio actualizar 
	//al poner $nombre=$_POST['nom'], el $nombre es una bariable nueva creada y el ['nom'] 
	//lo tomamos del archivo modificar de como lo llamamos en el otro archivo ejemplo
	// <input type="text" name="nom"  size="25" y vemos que es el mismo nombre 'nom'
	// y  despues del SET ponemos el nombre igual que en la base de datos seguido por la variable creada
	$query="UPDATE venta_servicio 
   SET mano_obra='$mano_obra',costo='$costo'
	WHERE pk_servicio='$pk_servicio'";

	
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
						alert('Servicio Se Modifico Con Exito');
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
						alert('Servicio No se Modifico');
						</script>
					</body>
					</html>";
						?>
				
				
				
			<?php	} ?>
			
			<p></p>	
						
		</center>
	</body>
</html>
				
				