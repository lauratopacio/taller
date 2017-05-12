<?php require('../seguridad/seguridad.php'); 
		include("../menu/menu2.html"); 

		?>
<!DOCTYPE html>
<html>
<head>
<!--imagen en la cabecera de la pagina-->
  <link rel="shortcut icon" href="../imagenes/favicon.jpg" type="image/png" />

	<title>Alta Administradores</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>
<style type="text/css">
label{
	font-size: 20px;

}
.body{
	 background: url('../imagenes/fondo.jpg');
}
</style>
<body class="body">



			<div class="container">
				<!-- formulario-->
				<a href="../admin/mostrar-administrador.php"></a>

				<div align="center"> <!-- centrar el titulo del header-->
					<div class="panel panel-primary">

<h1>Administradores</h1> <img src="../imagenes/usuario.png" width="70px" alt="">
						<br>

						<div class="panel-body">


				

							<form class="form-horizontal" method="post" action="../admin/insertar-administrador.php">

								<div class="form-group">
									<label class="col-md-4 control-label" for="ced">C&eacutedula</label>  
									<div class="col-md-5">
										<input id="ced" name="ced" type="text"  class="form-control input-md">

									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="nom">Nombre completo</label>  
									<div class="col-md-5">
										<input id="nom" name="nom" type="text"  class="form-control input-md">

									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-4 control-label" for="usu">Usuario</label>  
									<div class="col-md-5">
										<input id="usu" name="usu" type="text"  class="form-control input-md">

									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-4 control-label" for="con">Contraseña</label>  
									<div class="col-md-5">
										<input id="con" name="con" type="password"  class="form-control input-md">

									</div>
								</div>
								
							
								<div class="form-group">
									<label class="col-md-4 control-label" for="selectbasic">Privilegios</label>
									<div class="col-md-5">
										<select id="tipo" name="tipo" class="form-control">
											<option value="">-Selecciones-</option>
										
											<option value="a">Administrador</option>
											<option value="b">Trabajador</option>
										</select>
									</div>
								</div>
								<!-- Button -->
								<div class="form-group">
									<label class="col-md-4 control-label" for="btn_guardar"></label>
									<div class="col-md-1">
										<button id="btn_guardar" name="btn_guardar" class="btn btn-danger">Registrar</button>
									</div>
								</div>


							</form>



						</div>

					</div>
				</div>


			</div>
		</body>
		</html>