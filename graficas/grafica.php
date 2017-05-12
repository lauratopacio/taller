<?php
// Se requiere la libreria Generica
require_once('../jpgraph/jpgraph/src/jpgraph.php');

// Esta sirve para las graficas de barras
require_once('../jpgraph/jpgraph/src/jpgraph_bar.php');


mysql_connect("localhost","root","");
mysql_select_db("taller");

$sql="SELECT nombre_pieza, COUNT(fk_producto) as Cantidad FROM venta_productos v, producto p, venta x WHERE p.pk_producto=v.fk_producto and x.pk_venta=v.fk_venta  GROUP BY nombre_pieza ORDER BY COUNT(fk_producto) DESC";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res))
{
	$datos[]=$row['nombre_pieza'];
	$labels[]=$row['Cantidad'];

}

// Definimos formatos generales

$grafico = new Graph(500, 400, 'auto');
$grafico->SetScale("textint");
$grafico->title->Set("Productos vendidos");
$grafico->xaxis->title->Set("Producto");
$grafico->xaxis->SetTickLabels($datos);
$grafico->yaxis->title->Set("Ventas de producto");

//Ingresamos los datos al arreglo
$barplot1 = new BarPlot($labels);

//Se definen formatos expecificos

//se definen los colores de los bordados
$barplot1->SetFillGradient("#BE81F7", "#E3CEF6", GRAD_HOR);

//30 ancho de pixeles para cada barra
$barplot1->Setwidth(30);

//Al grafico le agregamos los datos
$grafico->Add($barplot1);

//Salida por pantalla

$grafico->Stroke(_IMG_HANDLER);



// Mandarlo al navegador
$grafico->img->Headers();
$grafico->img->Stream();






?>