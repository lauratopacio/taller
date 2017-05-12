<?php 
	require('../seguridad/seguridad.php'); 
	require('../conexion.php');
	
	$nombre_empresa=$_POST['nombre_empresa'];
	//poner el nombre como estan en el input,y $ las bariables inventadas
	//pero que coinsida con lo que es 
	$persona_contacto=$_POST['persona_contacto'];
	$rfc=$_POST['rfc'];
	$tel_persona=$_POST['tel_persona'];
	$tel_empresa=$_POST['tel_empresa'];
	$ciudad=$_POST['ciudad'];
	$direccion=$_POST['direccion'];
	$cod_postal=$_POST['cod_postal'];
	$correo=$_POST['correo'];


	//poner tal cual como esta en la base de datos 
	//y en el values poner las mismas variables que pusimos arriva 
	
$query="INSERT INTO proveedor(nombre_empresa,persona_contacto,rfc,tel_persona,tel_empresa,ciudad,direccion,cod_postal,correo)

VALUES ('$nombre_empresa','$persona_contacto','$rfc','$tel_persona','$tel_empresa','$ciudad','$direccion','$cod_postal','$correo')";
	
	$resultado=$con->query($query);
	
?>

<html>
	<head>
		<title>Guardar Proveedor</title>
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
         <meta http-equiv= 'REFRESH' content= '0 ; url=mostrar-proveedor.php'>
         <script>
             alert('Datos insertados con exito');
         </script> 
    </body>
    </html>
				" ?>
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
         <meta http-equiv= 'REFRESH' content= '0 ; url=mostrar-proveedor.php'>
         <script>
             alert('Datos insertados con exito');
         </script> 
    </body>
    </html>
				" ?>	
			<?php	} ?>		
			
			
		</center>
	</body>
	</html>	