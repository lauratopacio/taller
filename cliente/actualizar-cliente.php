<?php 
	require('../seguridad/seguridad.php'); 
	require('../conexion.php');

    $pk_cliente=$_POST['id'];
    $nombre=$_POST['nombre'];
	$rfc=$_POST['rfc'];
	$telefono=$_POST['telefono'];
	$ciudad=$_POST['ciudad'];
	$direccion=$_POST['direccion'];
$estado=$_POST['estatus'];

    //Se crean variables para poder hacer el UPDATE al crear las variables del archivo actualizar 
	//al poner $nombre=$_POST['nom'], el $nombre es una bariable nueva creada y el ['nom'] 
	//lo tomamos del archivo modificar de como lo llamamos en el otro archivo ejemplo
	// <input type="text" name="nom"  size="25" y vemos que es el mismo nombre 'nom'
	// y  despues del SET ponemos el nombre igual que en la base de datos seguido por la variable creada
	$query="UPDATE cliente 
    SET nombre='$nombre',rfc='$rfc',telefono='$telefono'
	,ciudad='$ciudad',direccion='$direccion',ciudad='$ciudad',direccion='$direccion',estatus='$estado' WHERE pk_cliente='$pk_cliente'";
	
	$resultado=$con->query($query);
	
?>

<html>
	<head>
		<title>Modificar Cliente</title>
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
         <meta http-equiv= 'REFRESH' content= '0 ; url=mostrar-cliente.php'>
         <script>
             alert('Datos Acualizados con exito');
         </script> 
    </body>
    </html>
				"; ?>
				
					<?php 	}else{ ?>
				
				<?php 
				echo "<html>
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
             alert('Error al Actualizar Datos'
    </body>
    </html>";
				 ?>
				
			<?php	} ?>
			
			<p></p>	
						
		</center>
	</body>
</html>
				
				