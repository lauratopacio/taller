<?php 
	require('../seguridad/seguridad.php'); 
	require('../conexion.php');

    $pk_proveedor=$_POST['id'];
    $nombre_empresa=$_POST['nombre'];
	$persona_contacto=$_POST['persona_contacto'];
	$rfc=$_POST['rfc'];
	$tel_persona=$_POST['tel_persona'];
	$tel_empresa=$_POST['tel_empresa'];
	$ciudad=$_POST['ciudad'];
	$direccion=$_POST['direccion'];
	$cod_postal=$_POST['cod_postal'];
	$correo=$_POST['correo'];
	
    //Se crean variables para poder hacer el UPDATE al crear las variables del archivo actualizar 
	//al poner $nombre=$_POST['nom'], el $nombre es una bariable nueva creada y el ['nom'] 
	//lo tomamos del archivo modificar de como lo llamamos en el otro archivo ejemplo
	// <input type="text" name="nom"  size="25" y vemos que es el mismo nombre 'nom'
	// y  despues del SET ponemos el nombre igual que en la base de datos seguido por la variable creada
	$query="UPDATE proveedor 
    SET nombre_empresa='$nombre_empresa',persona_contacto='$persona_contacto',rfc='$rfc'
	,tel_persona='$tel_persona',tel_empresa='$tel_empresa',ciudad='$ciudad',direccion='$direccion',cod_postal='$cod_postal'
	,correo='$correo' WHERE pk_proveedor='$pk_proveedor'";
	
	$resultado=$con->query($query);
	
?>

<html>
	<head>
		<title>Modificar Proveedor</title>
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
         <meta http-equiv= 'REFRESH' content= '0 ; url=mostrar-proveedor.php'>
         <script>
             alert('Datos insertados con exito');
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
         <meta http-equiv= 'REFRESH' content= '0 ; url=mostrar-proveedor.php'>
         <script>
             alert('Datos Actualizados con exito');
         </script> 
    </body>
    </html>
				"
				 ?>
				
			<?php	} ?>
			
			
			
		</center>
	</body>
</html>
				
				