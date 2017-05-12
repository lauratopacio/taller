
<?php
require('../seguridad/seguridad.php'); 
include('../conexion.php');

$pk_producto=$_GET['pk_producto'];
	
	$query="SELECT pk_producto,codigo,marca_carro,nombre_pieza,cantidad,costo FROM producto WHERE pk_producto='$pk_producto'";
	
	$resultado=$con->query($query);
	
    $row=$resultado->fetch_assoc();
?>



<!doctype html>
<html leng="es">
<head>
 

<meta charset="UTF-8">

<title>Modificar Producto</title>
</head>
<body>

<h1 align="center">Modificar producto </h1>


<form name="form1" action="actualizar-producto.php" method="POST">


<fieldset  style="border:double blue">
<legend><strong><b><i>Datos del producto</i></b></strong></legend>

<table  border="2">

<tr>
<td>PK</td>
<td><input type="text" name="pk_producto" id="pk_producto" title="Codigo no se Modifica" readonly='readonly' size="25" restryng value="<?php echo $row['pk_producto'];?>" /></td>
</tr>


<tr>
<td>Codigo</td>
<td><input type="text" name="codigo" id="codigo" size="25" required value="<?php echo $row['codigo'];?>" /></td>
</tr>


<tr>
<td>Marca del carro</td>
<td><input type="text" name="marca_carro" id="marca_carro" size="25" required value="<?php echo $row['marca_carro'];?>" /></td>
</tr>

<tr>
<td>Nombre de la pieza</td>
<td><input type="text" name="nombre_pieza" id="nombre_pieza"required size="25" value="<?php echo $row['nombre_pieza'];?>" /></td>
</tr>


<tr>
<td>Cantidad</td>
<td><input type="text" name="cantidad" id="cantidad" required value="<?php echo $row['cantidad'];?>" /></td>
</tr>

<tr>
<td> Costo</td>
<td>
<input type="text" name="costo" id="costo" size="25" required value="<?php echo $row['costo'];?>"  />
</td>
</tr>

</table>
</fieldset>
<p>

<p align="center">
    <input type="submit" name="button" id="button" value="Actualizar">
    <INPUT TYPE="reset" VALUE="Cancelar">

</p>

 <p align="center">&nbsp;</p>

</form>
</body>
</html>