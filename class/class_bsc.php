<?php
$hostname_Mysql = "localhost";
$database_Mysql = "taller";
$username_Mysql = "root";
$password_Mysql = "";

$Mysql= mysql_connect($hostname_Mysql, $username_Mysql,
	$password_Mysql) or die (mysql_error()); 
//permite la conexion entre las paginas y las base de datos
$bd=Mysql_select_db($database_Mysql, $Mysql);

?>