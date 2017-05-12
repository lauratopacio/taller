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
#container {
	height: 400px; 
	min-width: 310px; 
	max-width: 800px;
	margin: 0 auto;
}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column',
            margin: 95,
            options3d: {
                enabled: true,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: 'Formas de pago'
        },
        subtitle: {
            text: 'Forma de pago de ventas realizadas'
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        xAxis: {
            categories: [
			<?php
$sql=mysql_query("SELECT  forma_pago, SUM(TOTAL) as Total FROM venta WHERE estatus='Pagado' GROUP BY forma_pago");
while($res=mysql_fetch_array($sql)){			
?>					
			
			['<?php echo $res['forma_pago']; ?>'],
<?php
}
?>
			]
        },
        yAxis: {
            title: {
                text: null
            }
        },
        series: [{
            name: 'Formas de pago',
            data: [
			
			<?php
$sql=mysql_query("SELECT  forma_pago, count(TOTAL) as Total FROM venta   GROUP BY forma_pago");
while($res=mysql_fetch_array($sql)){			
?>			
			
			[<?php echo $res['Total'] ?>],
			
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
<script src="Highcharts-4.1.5/js/highcharts-3d.js"></script>
<script src="Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="height: 400px"></div>
	</body>
</html>
