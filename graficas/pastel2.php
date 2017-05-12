<?php
require_once ("../jpgraph/jpgraph/src/jpgraph.php");
require_once ("../jpgraph/jpgraph/src/jpgraph_pie.php");
 

mysql_connect("localhost","root","");
mysql_select_db("taller");

$sql="SELECT nombre, COUNT(fk_cliente) as Compras, SUM(TOTAL) FROM venta v, cliente c WHERE c.pk_cliente=v.fk_cliente GROUP by nombre ORDER BY COUNT(fk_cliente) DESC";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res))
{
$leyenda[]=$row['nombre'];
	 $datos[]=$row['Compras'];

}



//Se define el grafico
$grafico = new PieGraph(550,400);
 
//Definimos el titulo
$grafico->title->Set("Grafica de porcentaje de productos mas vendidos");
$grafico->title->SetFont(FF_FONT1,FS_BOLD);
 
//Añadimos el titulo y la leyenda
$p1 = new PiePlot($datos);
$p1->SetLegends($leyenda);
$p1->SetCenter(0.4);
 
//Se muestra el grafico
$grafico->Add($p1);
$grafico->Stroke();
?>