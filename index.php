<?php
		session_start();
		include_once('php_conexion.php'); 
		
		if(!empty($_POST['usuario']) and !empty($_POST['contra'])){
			$usuario=limpiar($_POST['usuario']);
			$contra=limpiar($_POST['contra']);
			$can=mysql_query("SELECT * FROM usuarios WHERE (usu='".$usuario."' or ced='".$usuario."') and con='".$contra."'");
			if($dato=mysql_fetch_array($can)){
				$_SESSION['username']=$dato['usu'];
				$_SESSION['tipo_usu']=$dato['tipo'];
 				
				///////////////////////////////
				if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u'){
					if($dato['estado']=='s'){
						header('location:admin/index2.php');
					}
				}
			}
		}
?>

     
   <!DOCTYPE html>
<html>
<head>
<!--imagen en la cabecera de la pagina-->
  <link rel="shortcut icon" href="imagenes/favicon.jpg" type="image/png" />

  <title>-Bienvenido-</title>
  <meta charset="UTF-8">
  <!--link para que encuentre la libreria de Js-->
  <!--<script src="http://code.jquery.com/jquery-latest.js"></script>-->
  <script src="jquery/latest.js"></script>

  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
  <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">

  <link rel="stylesheet" type="text/css" href="css/styles2.css">


  <!--Script para mandar llamar el modal-->
  <script type="text/javascript">
    function abrirventana(){
      $(".ventana").slideDown("slow");
    }
    function cerrarventana(){
      $(".ventana").slideUp("slow");
    }
    
  </script>
</head>
<body class="body">
  <!--Div que contiene el titulo-->
  <div align="center" class="titulo">



    <!---->
    
    <header class="head">
      <div class="container">
        <div class="row">

          <div class="hidden-xs col-sm-6 col-md-4 col-lg-4 centrar">
            <img src="imagenes/llanta.png" width="200px"  alt="">
          </div>
          <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 ">
            <h2 class="texto tamtex1">Multiservicios llanteros y suspenciones de Santiago</h2>
            <h2 class="texto tamtex2">Venta de llantas</h2>
          </div>
          
        </div>
      </div>
    </header>




  </div>
  
  
  <!--llamar la ventana dando click a la imagen-->
  <div class="cargar_login">
    <a href="javascript:abrirventana();">
      <img src="imagenes/inicio.png" class="img-responsive img-rounded" alt="Reponsive image">
    </a>
  </div>
  <!--Div que contendra la ventana del login-->
  <div class="ventana">
    <div class="form"><!--Div que contiene el formulario-->
      <div class="cerrar"> <a href="javascript:cerrarventana();">X</a></div> <!--Clase del encabezado cerrar-->
      <h2 align="center">Iniciar sesiòn</h2>
      
    <form name="form1" method="post" action="" class="form-signin">
  

        <label  align="left" >Usuario </label>
        <input type="text" id="usuario" name="usuario" placeholder="Nombre de usuario" required/>

        <label  align="left" >Contraseña </label>
        <input type="password" id="contra" name="contra" placeholder="contraseña de cuenta" required/>

        <input type="submit" name="btn_g" id="button" value="Entrar">


        <p>&nbsp;</p>
<?php
    $act="1";
    if(!empty($_POST['usuario']) and !empty($_POST['contra'])){
      $usuario=limpiar($_POST['usuario']);
      $contra=limpiar($_POST['contra']);
      $can=mysql_query("SELECT * FROM usuarios WHERE (usu='".$usuario."' or ced='".$usuario."') and con='".$contra."'");
      if(!$dato=mysql_fetch_array($can)){
        if($act=="1"){
              echo "<script> alert('La Clave o el usuario no son correctos');
          window.location.href=\"index.php\"</script>";
        }else{
          $act="0";
        }
      }else{
        if($dato['estado']=='n'){
          echo '<div class="alert alert-error" align="center"><strong>Consulte con el Administrador</strong></div>';
        }
      }
    }else{
      
    }
  ?>
      </form>
    </div>
  </div>
</body>
</html>