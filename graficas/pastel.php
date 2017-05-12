<?php
require_once ("../jpgraph/jpgraph/src/jpgraph.php");
require_once ("../jpgraph/jpgraph/src/jpgraph_pie.php");
 
mysql_connect("localhost","root","");
mysql_select_db("taller");

$sql="SELECT nombre_pieza, COUNT(fk_producto) as Cantidad FROM venta_productos v, producto p, venta x WHERE p.pk_producto=v.fk_producto and x.pk_venta=v.fk_venta and fecha_venta BETWEEN'2016-06-18' and '2016-06-20' GROUP BY nombre_pieza ORDER BY COUNT(fk_producto) DESC";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res))
{
	 $leyenda[]=$row['nombre_pieza'];
	 $datos[]=$row['Cantidad'];

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