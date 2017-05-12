<?php
// Se requiere la libreria Generica
require_once('../jpgraph/jpgraph/src/jpgraph.php');

// Esta sirve para las graficas de barras
require_once('../jpgraph/jpgraph/src/jpgraph_bar.php');


mysql_connect("localhost","root","");
mysql_select_db("taller");

$sql="SELECT  forma_pago, SUM(TOTAL) as Total FROM venta WHERE estatus='Pagado' GROUP BY forma_pago";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res))
{
	$datos[]=$row['forma_pago'];
	$labels[]=$row['Total'];

}

// Definimos formatos generales

$grafico = new Graph(500, 400, 'auto');
$grafico->SetScale("textint");
$grafico->title->Set("Ventas");
$grafico->xaxis->title->Set("Forma de pago");
$grafico->xaxis->SetTickLabels($datos);
$grafico->yaxis->title->Set("");

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