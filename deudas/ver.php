<?php
require('../seguridad/seguridad.php'); 
	require('../conexion.php');
	$bus=$_POST['bus'];
	$query="SELECT y.pk_cliente,SUM( x.TOTAL) as TOTAL,x.pk_venta, x.fecha_venta, x.fecha_fin, x.estatus,y.telefono, x.forma_pago, y.nombre,y.ciudad, y.direccion, y.rfc FROM venta x, cliente y WHERE y.pk_cliente=x.fk_cliente and x.estatus='No pagado' and x.forma_pago='Credito' and y.estatus='Debe' and y.nombre LIKE '%$bus%' group by y.pk_cliente";
	
	$resultado=$con->query($query);


        #paginar


	?>
   
   <html>
	<head>
	<title>cliente</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="images/favicon.ico" /> 
<link rel="stylesheet" href="css/style.css" type="text/css" />

	</head>
	<body ata-spy="scroll" data-target=".bs-docs-sidebar">
		<?php include('../menu/menu2.html'); ?>

		<div align="center">
    <table width="95%" border="0">
      <tr>
        <td>
          <table class="table table-bordered">
              <tr class="success">
                <td>
                    <div class="row-fluid">
                      <div class="span6">
                            <h1><div id="wrapper">

        <div id="examples_outer">
            <div id="slider_container_2">

<div id="SliderName_2" class="SliderName_2">

                </div>
                <div class="c"></div>
                <div id="SliderNameNavigation_2"></div>
                <div class="c"></div>

                <script type="text/javascript">
                    effectsDemo2 = 'rain,stairs,fade';
                    var demoSlider_2 = Sliderman.slider({container: 'SliderName_2', width: 700, height: 450, effects: effectsDemo2,
                        display: {
                            autoplay: 3000,
                            loading: {background: '#000000', opacity: 0.5, image: 'img/loading.gif'},
                            buttons: {hide: true, opacity: 1, prev: {className: 'SliderNamePrev_2', label: ''}, next: {className: 'SliderNameNext_2', label: ''}},
                            description: {hide: true, background: '#000000', opacity: 0.4, height: 50, position: 'bottom'},
                            navigation: {container: 'SliderNameNavigation_2', label: '<img src="img/clear.gif" />'}
                        }
                    });
                </script>

                <div class="c"></div>
            </div><center>Control de Deudas</center> </h1>
                      </div>
                      <div class="span6">
                        <div align="right">
                      
                        <div class="btn-group">
                           
                            <ul class="dropdown-menu">
                            
                            <li><a href="pantallaprincipal.html">Pantalla Principal</a></li>
                            </ul>
                        </div>
                        <form name="form1" method="post" action="ver.php">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-search"></i></span>
                                <input name="bus" type="text" placeholder="Buscar cliente" class="input-xlarge" autocomplete="off">
                            </div>
                        </form>
                        </div>
                      </div>
                    </div>
                </td>
              </tr>
            </table>

        </td>
      </tr>
      <tr>
        <td>

            <table class="table table-bordered table table-hover">
              <tr class="success">
                <td width="2%"><strong>No.</strong></td>            
                <td width="9%"><strong>Nombre</strong></td>            
                <td width="4%"><strong>RFC</strong></td>
                <td width="5%"><strong>Telefono</strong></td>
                <td width="5%"><strong>Ciudad</strong></td>
                <td width="5%"><strong>Direccion</strong></td>
                <td width="5%"><strong>Fecha de Venta</strong></td>
                <td width="5%"><strong>Fecha a pagar</strong></td>
                <td width="5%"><strong>Total</strong></td>             
                <td width="5%"><strong>Pagar a Cheque</strong></td>              
                <td width="5%"><strong>Pagar con PayPal</strong></td>              

              <thead>

				<tbody>
					<?php

					 while($row=$resultado->fetch_assoc()){ 
					 	?>

						<tr>
						<td>
                         <?php  echo $row['pk_venta'];?>
                         </td>

                             
						     <td>
						     <?php echo $row['nombre'];?>
						     </td>
                             
							<td>
							<?php echo $row['rfc'];?>
							</td>

							<td>
							<?php echo $row['telefono'];?>
							</td>

							<td>
							<?php echo $row['ciudad'];?>
							</td>

							<td>
							<?php echo $row['direccion'];?>
							</td>
                            
                            <td>
                            <?php echo $row['fecha_venta'];?>
                            </td>
 <td>
                            <?php echo $row['fecha_fin'];?>
                            </td>
							          <td>
                            <?php echo $row['TOTAL'];?>
                            </td>        
               
                    <td>
                        <center>
                           <a href="../credito/form_credito.php?pk_cliente=<?php echo $row['pk_cliente'];?>"> <button><strong>Cheque</strong></button></a>
                        </center>
                    </td>
                     <td>
                        <center>
      <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="sanix_educacionmedia178@hotmail.com">
<input type="hidden" name="item_name" value="Premium Subscription">
<input type="hidden" name="currency_code" value="MXN">
<input type="hidden" name="amount" value="<?php echo $total; ?>">
<input type="image" name="submit" src="http://www.paypal.com/es_XC/i/btn/x-click-but01.gif" alt="Make payments with Paypal - it's fast,free and secure">
<input type="hidden" name="return" value="http://localhost/taller/venta/pagar_paypal.php">
<input type="hidden" name="cancel_return" value="http://localhost/taller/venta/carrito.php">
</form>       </center>
                    </td>


							
						</tr>

					<?php } ?>
				</tbody>
			</table>
			<p>


		</body>
	</html>	
