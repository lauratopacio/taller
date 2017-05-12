<?php
require_once("conexion/conexion.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Los productos más vendidos al año'
        },
        subtitle: {
            text: 'Control de registro'
        },
        xAxis: {
            categories: [
<?php
$sql=mysql_query("SELECT sum(x.cantidad) as cantid, x.nombre_pieza from venta_productos y, producto x where y.fk_producto=x.pk_producto GROUP by y.fk_producto");
while($res=mysql_fetch_array($sql)){			
?>
			
			['<?php echo $res['nombre_pieza'] ?>'],
			
<?php
}
?>
			
			],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: ' (cantidad)',
                align: 'small'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' productos vendidos'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: '1 año',
            data: [
			<?php
$sql=mysql_query("SELECT sum(cantidad) as cantid from venta_productos GROUP by fk_producto  order by cantidad desc ");
while($res=mysql_fetch_array($sql)){			
?>			
			[<?php echo $res['cantid'] ?>],
		
<?php
}
?>			
			]
        }]
    });
});
		</script>
	</head>
	<body>
<script src="Highcharts-4.1.5/js/highcharts.js"></script>
<script src="Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
<br><br>
	</body>
</html>
