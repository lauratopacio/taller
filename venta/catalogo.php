<?php

require('../seguridad/seguridad.php');
include('../conexion/conexion_mysqli.php');
$nom=$_POST['nom'];
$am=$_POST['am'];
$ap=$_POST['ap'];
$fecha=$_POST['date'];
$sexo=$_POST['sexo'];
$muni=$_POST['muni'];
$estado=$_POST['estado'];
$localidad=$_POST['local'];
$pk_especialidad=$_POST['pk_especialidad'];
$dom=$_POST['dom'];
$pk_unidad=$_POST['pk_unidad'];



$query=("INSERT INTO medico(pk_medico,nombre_medico,ap_paterno_medico,ap_materno_medico,fecha_nacimiento,sexo,municipio,estado,localidad,fk_especialidad,domicilio,fk_unidad_medica)
VALUES(NULL,'".$nom."','".$am."','".$ap."','".$fecha."','".$sexo."','".$muni."','".$estado."','".$localidad."','".$pk_especialidad."','".$dom."','".$pk_unidad."')");
$resultado=$mysqli->query($query);
if($resultado)
{
	echo"<html>
	<head>
	</head>
	<body>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

		<meta http-equiv='REFRESH' content='0 ; url=form-medicos.php'>
		<script>
			alert('Datos Insertados con Exito');
		</script>
	</body>
	</html>";
}else {
	echo"<html>
	<head>
	</head>
	<body>
		<meta http-equiv='REFRESH' content='0 ; url=som_servicio.html'>
		<script>
			alert('Error al insertar los datos');
		</script>
	</body>
	</html>";
}
?>
