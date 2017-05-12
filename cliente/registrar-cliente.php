<?php 
	require('../seguridad/seguridad.php'); 
	require('../conexion.php');
	
	$nombre=$_POST['nombre']; 
	//poner el nombre como estan en el input,y $ las bariables inventadas
	//pero que coinsida con lo que es 
	$rfc=$_POST['rfc'];
	$telefono=$_POST['telefono'];
	$ciudad=$_POST['ciudad'];
	$direccion=$_POST['direccion'];
$estatus='Disponible';

	//poner tal cual como esta en la base de datos 
	//y en el values poner las mismas variables que pusimos arriva 
	
$query="INSERT INTO cliente(pk_cliente,nombre,rfc,telefono,ciudad,direccion,estatus)

VALUES (null,'$nombre','$rfc','$telefono','$ciudad','$direccion', '$estatus')";
	
	$resultado=$con->query($query);
	
?>

<html>
	<head>
		<title>Guardar Cliente</title>
	</head>
	<body>
		<center>	
			
			<?php 
			if($resultado>0){ ?>
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
         <meta http-equiv= 'REFRESH' content= '0 ; url=mostrar-cliente.php'>
         <script>
             alert('Datos insertados con exito');
         </script> 
    </body>
    </html>
				"; ?>
				<?php }else{ ?>
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
         <meta http-equiv= 'REFRESH' content= '0 ; url=mostrar-cliente.php'>
         <script>
             alert('Error al Registrar con exito');
         </script> 
    </body>
    </html>
				"; ?>	
			<?php	} ?>		
			
			<p></p>	
			

		</center>
	</body>
	</html>