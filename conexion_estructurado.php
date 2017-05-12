<?php
$hostname_Mysql ="localhost";
$database_Mysql ="taller";
$username_Mysql ="root";
$password_Mysql ="";

mysql_query("SET NAMES 'UTF8'");
$Mysql=mysql_connect($hostname_Mysql,$username_Mysql,$password_Mysql) or die (mysql_error());

//mysql_select_db($database_Mysql,$Mysql);
?>