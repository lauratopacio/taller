<?php
		session_start();
		include('../php_conexion.php'); 
		if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='s'){
		}else{
			header('location:../index.php');
		}
		if($_SESSION['tipo_usu']=='a'){
			$titulo='Administrador';
		}else{
			$titulo='Secretaria/o';
		}
		$usuario=limpiar($_SESSION['username']);
		$sqll=mysql_query("SELECT * FROM usuarios WHERE usu='$usuario'");
		if($dato=mysql_fetch_array($sqll)){
			$nombre=$dato['nom'];
			$palabra=explode(" ", $nombre);
			$nomb=$palabra[0];
		}
?>