<?php
require_once("../dompdf/dompdf_config.inc.php");
$conexion = mysql_connect("localhost","root","");
mysql_select_db("taller",$conexion);

$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>-Biblioteca-</title>
</head>
<body>
	<table border="0" align="right">
		<tr>
			<th>Fecha: '.date('d-m-Y').'</th>
		</tr>
	</table>
	
	
	<table border="0" align="center">
		<tr>
			<th><img src="../imagenes/Libros.png"></th>
			<th  style="color:#fff;">esp</th>
			<th width="150" style=" color:#000;  font-size: 20px;"><b>UNIVERSIDAD TECNOLOGICA DE LA COSTA</b>
				<br>
				carretera santiago entronque internacional 
				<br>
				R.F.C UTCC0206053R1 No. 15km.5</th>

				<th   style="color:#fff;">esp</th>
				<th><img src="../imagenes/logo_rep.jpg"></th>
			</tr>
		</table>
		

		<table align="center">
			<tr>
				<th style=" color:#0a6d13;  font-size: 22px;">Reporte De Libros Disponibles</th>
			</tr>

		</table>
		<br>
		<br>
		<table align="center" width="95%" border="1">
			<tr>
				<th  style="font-size: 18px;" bgcolor="#d7eccf" width="50">Clave</th>
				<th  style="font-size: 18px;" bgcolor="#d7eccf" width="120">Nombre</th>
				<th  style="font-size: 18px;" bgcolor="#d7eccf" width="80">Autor</th>
				<th  style="font-size: 18px;" bgcolor="#d7eccf" width="50">Edicion</th>
				<th  style="font-size: 18px;" bgcolor="#d7eccf" width="55">Editorial</th>
			</tr>';


			$consulta  =mysql_query ("SELECT fk_libro, nombre, nombre_autor, edicion, editorial	
				FROM libro inner join autor a on a.pk_autor = libro.fk_autor inner join editorial e on e.pk_editorial = libro.fk_editorial ", $conexion);
			while($resultado = mysql_fetch_array($consulta)){

				$codigoHTML.='
				<tr>
					
					<td>'.$resultado['fk_libro'].'</td>
					<td>'.$resultado['nombre'].'</td>
					<td>'.$resultado['nombre_autor'].'</td>
					<td>'.$resultado['edicion'].'</td>
					<td>'.$resultado['editorial'].'</td>
					
				</tr>';

			}
			$codigoHTML.='
		</table>

	</body>
	</html>';


$codigoHTML=utf8_decode($codigoHTML); //formato de caracter utf-8
	$dompdf=new DOMPDF(); // se declara que sera un dompdf
	$dompdf->load_html($codigoHTML);
	$dompdf->set_paper ('a4','landscape'); 

	ini_set("memory_limit","128M");
	$dompdf->render();
	$dompdf->stream("libros_disponibles.pdf");

	?>