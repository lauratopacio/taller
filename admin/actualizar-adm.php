<?php 
require('../seguridad/seguridad.php'); 
	$mysqli=new mysqli("localhost","root","","taller"); 
	//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}

    $ced=$_POST['ced'];
    $estado=$_POST['estado'];
	$nom=$_POST['nom'];
	$usu=$_POST['usu'];
	$con=$_POST['con'];
	$tipo=$_POST['tipo'];
	
    //Se crean variables para poder hacer el UPDATE al crear las variables del archio actualizar 
	//al poner $nombre=$_POST['nom'], el $nombre es una bariable nueva creada y el ['nom'] 
	//lo tomamos del archivo modificar de como lo llamamos en el otro archivo ejemplo
	// <input type="text" name="nom"  size="25" y vemos que es el mismo nombre 'nom'
	// y  despues del SET ponemos el nombre igual que en la base de datos seguido por la variable creada
	$query="UPDATE usuarios 
   SET ced='$ced', estado='$estado',nom='$nom',usu='$usu',con='$con'
	,tipo='$tipo'
	WHERE ced='$ced'";
	
	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>
		<title>Modificar Trabajador</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
					echo "

					<html>
					<head>
					<body>
					<meta http-equiv='REFRESH' content='0; url=mostrar-administrador.php'>
					<script>
						alert('Habitacion Se Modifico Con Exito');
						</script>
					</body>
					</html>";
					
				?>
				
				
					<?php 	}else{ 
						echo "


					<html>
					<head>
					<body>
					<meta http-equiv='REFRESH' content='0; url=mostrar-administrador.php'>
					
					</body>
					</html>";
						?>
				
				
				
			<?php	} ?>
		</center>
	</body>
</html>
				
			