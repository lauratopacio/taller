<?php
session_start();
//se incluye la conexion
include('../Class/class_bsc.php');

/* se declaran dos variables que se encargaran de recibir el usuario y la contraseña que introduzca
 el usuario'"*/
  $usuario = $_POST['usuario'];
  $password = $_POST['pass_us'];
  $bd=Mysql_select_db($database_Mysql, $Mysql)  or die (mysql_error()); 

    /*consulta de todos los registros que estan dados de alta en la tabla de login*/
    $consulta = mysql_query ("SELECT usuario, privilegio FROM login WHERE usuario = '".$usuario."' 
     AND clave = '".$password."' ", $Mysql);

    /* Aqui es una variable donde almacena cuantos renglones devuelve como resultado la consulta que se ejecuto.*/
    $num_renglones = mysql_num_rows($consulta);

     //si 1 es igual al numero de renglones que devuelve 
    if ( 1 == $num_renglones ) {
      $resultado = mysql_fetch_array($consulta);

      $user =$resultado[0];
      $privilegio = $resultado[1];
          session_start();
        //valida que privilegio tiene
      $_SESSION["privilegio"] = $privilegio;

      //Guardamos dos variables de sesión que nos auxiliará para saber si se está o no "logueando" un usuario
      $_SESSION["autentica"] = "SIP";
      $_SESSION["usuarioactual"] = mysql_result($consulta,0,0); //nombre del usuario logueado.
               
               switch ($privilegio) {
                case 'administrador':
                header("location:../admin/index2.php"); //administrador
                break;
                case 'altas':
                header("location:../altas/index-a-m.php"); //dar de altas
                break;
                case 'reportes':
                header("location:../imprime/rep/index-rep.php"); //solo imprimir
                break;
              }
            } else {
          /*si alguno de los datos introducidos no coinciden 
          entonces mandara un alert*/
          echo "<script> alert('La Clave o el usuario no son correctos');
          window.location.href=\"../index.php\"</script>";

        }

        mysql_close();
        ?>
