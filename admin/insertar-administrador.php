<?php
require('../seguridad/seguridad.php'); 
$host="localhost";
  $user="root";
  $pw="";
  $db="taller";
  $con=mysql_connect($host,$user,$pw) or die("error al conectar la base de datos");
  mysql_select_db($db,$con);


echo $ced =$_POST['ced'];
echo $act = "s";
echo $tip = $_POST['nom'];
echo $tipo = $_POST['usu'];
echo $dur = $_POST['con'];
echo $equ = $_POST['tipo'];
$Mysql=mysql_select_db($db, $con) or die (mysql_error());

$insertar =  mysql_query("INSERT INTO usuarios(ced,estado,nom,usu,con,tipo)
                           VALUES
                        ('".$ced."','".$act."', '".$tip."', '".$tipo."', '".$dur."', '".$equ."')",$con);

   if($insertar)
{
    echo "<html>
    <head>
    </head>
    <body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
         <meta http-equiv= 'REFRESH' content= '0 ; url=mostrar-administrador.php'>
         <script>
             alert('Datos insertados con exito');
         </script> 
    </body>
    </html>";
}else {
  echo "<html>
    <head>
    </head>
    <body>
         <meta http-equiv= 'REFRESH' content= '0 ; url=mostrar-administrador.php'>
         <script>
             alert('Error al insertar los datos');
         </script> 
    </body>
    </html>";
}

?>
 </body>
</html>