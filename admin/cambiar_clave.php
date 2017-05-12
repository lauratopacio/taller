<?php

 require('../seguridad/seguridad.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cambiar Clave</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


</head>
<body class="body">
<?php include('../menu/menu2.html'); ?>
    <style>
    .body{
   background: url('../imagenes/fondo.jpg');

}
.table{
  background: white;
}
</style>
<div align="center">
<table width="50%" border="0">
<tr>
  <td>
<table border="0" class="table table-bordered">
  <tr class="success">
    <td>
    	<center><strong>
        	<h3><img src="../imagenes/seguridad.jpg" class="img-circle img-polaroid" width="50" height="65"> 
            Cambiar Contraseña</h3>
        </strong></center>
    </td>
  </tr>
  <tr>
    <td>
      <div align="center">
        <form name="form1" method="post" action="">
          <label><strong>Contraseña Antigua: </strong></label><br><input type="password" name="contra" id="contra" required><br>
          <label><strong>Nueva Contraseña: </strong></label><br><input type="password" name="c1" id="c1" required><br>
          <label><strong>Repita Nueva Contraseña: </strong></label><br><input type="password" name="c2" id="c2" required><br><br>
          <input type="submit" name="button" id="button" class="btn btn-primary" value="Cambiar Contraseña">
          </form>
        <?php 
	if(!empty($_POST['c1']) and !empty($_POST['c2']) and !empty($_POST['contra'])){
		if($_POST['c1']==$_POST['c2']){
			$usuario=limpiar($_SESSION['username']);
			$contra=limpiar($_POST['contra']);
			$can=mysql_query("SELECT * FROM usuarios WHERE usu='".$usuario."' and con='".$contra."'");
			if($dato=mysql_fetch_array($can)){
				$cnueva=limpiar($_POST['c2']);
				$sql="Update usuarios Set con='$cnueva' Where usu='$usuario'";
				mysql_query($sql);
				echo '<div class="alert alert-info" align="center">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong>Contraseña!</strong> Actualizada con exito
					</div>';
			}else{
				echo '<div class="alert alert-error">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong>Contraseña!</strong> Digitada no corresponde a la antigua
					</div>';
			}
		}else{
			echo '<div class="alert alert-error">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong>Las dos Contraseña!</strong> Digitadas no soy iguales
					</div>';
		}
	}
	?>
        </div>
      </td>
    </tr>
</table>
</td></tr>
</table>
</div>
</body>
</html>