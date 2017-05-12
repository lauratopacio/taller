<?php 
  require('../seguridad/seguridad.php'); 
  require('../conexion.php');
  

//SELECCIONA LA ULTIMA VENTA

$max=$_GET['pk_cliente'];

//conocer los datos del cliente qe realizo la venta
$query2="SELECT  x.nombre, x.rfc, y.fecha_venta from venta y, cliente x where y.fk_cliente=x.pk_cliente and x.pk_cliente='$max'";  
$resultado2=$con->query($query2);
while($row2=$resultado2->fetch_array())
{
 $nombre=$row2['nombre'];
$rfc=$row2['rfc'];
$fecha=$row2['fecha_venta'];
$nombre=$row2['nombre'];
}

//suma de costo de productos
 $query7="SELECT y.pk_cliente,x.TOTAL,x.pk_venta, x.fecha_venta, x.fecha_fin, x.estatus,y.telefono, x.forma_pago, y.nombre,y.ciudad, y.direccion, y.rfc FROM venta x, cliente y WHERE y.pk_cliente=x.fk_cliente and x.estatus='No pagado' and x.forma_pago='Credito' and y.estatus='Debe' and x.fk_cliente='$max' group by y.pk_cliente" ;
  $resultado7=$con->query($query7);

while($row7=$resultado7->fetch_array())
{
 $TOTAL=$row7['TOTAL'];
}



 
?>

<!DOCTYPE html>
<html>
<head>
<!--imagen en la cabecera de la pagina-->
  <link rel="shortcut icon" href="./imagenes/simbo.png" type="image/png" />


	<title>Inicio</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="jquery/jquery.js"></script> 
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	<link href="../css/style.css" rel="stylesheet">
	<script src="../jquery/bootstrap.js"></script>
<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../css/docs.css" rel="stylesheet">
    <link href="../js/google-code-prettify/prettify.css" rel="stylesheet">
    <script src="../js/jquery.js"></script>
 
	
	</head>

	
<body>
	<!--
	Menu-->
	<nav class="navbar navbar-inverse" role="navigation">
<!--       <a href="#" class="navbar-brand"> </a>		
		    	<a href="#" class="navbar-brand"> </a>	
				<a href="#" class="navbar-brand"> </a>	
			 -->

				
				
		<div  align='right' >
		<a href="../catalogo.php" align="left">

                      
                       	<img src="../imagenes/carrito.png" width='60px'>  
                 </a>
		
 <div class="jumbotron">
  <div class="container">
   <center>  <h1>Pago a cr&eacutedito!</h1>
 <div class="panel panel-primary">

        
      <!-- Default panel contents -->

     
      <div class="panel-body">
      <table  class="table" border="1">

   <TD> FECHA: <?php   echo $fecha; ?></TD>
  <TD>Deuda Actual <?php   echo $TOTAL; ?></TD></tr></table>
      <form class="form-horizontal" method="post" action="insertar_credito.php">

      <form class="form-horizontal">

        <fieldset>
<?php 
//conocer los datos del cliente qe realizo la venta
$query7="SELECT rfc,nombre, pk_cliente from  cliente  where pk_cliente='$max'";  
$resultado7=$con->query($query7);
    $row7=$resultado7->fetch_assoc();
 ?>
        <div class="form-group">
          <label class="col-md-4 control-label" for="e">No.Cliente</label>
          <div class="col-md-4">
          <input type="text" name="pk_cliente" id="pk_cliente"  class="form-control input-md" title="Codigo no se Modifica" readonly='readonly' restryng value="<?php echo $row7['pk_cliente'];?>" />
         </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="e">RFC</label>
          <div class="col-md-4">
          <input type="text" name="rfc" id="rfc"  title="Codigo no se Modifica" readonly='readonly' class="form-control input-md" restryng value="<?php echo $row7['rfc'];?>" />
         </div>
        </div>
         <div class="form-group">
          <label class="col-md-4 control-label" for="e">Nombre</label>
          <div class="col-md-4">
          <input type="text" name="nombre" id="nombre" title="Codigo no se Modifica" readonly='readonly' class="form-control input-md" restryng value="<?php echo $row7['nombre'];?>" />
         </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="e">No. Cheque</label>
          <div class="col-md-4">
          <input id="no" name="no" type="text" placeholder="XXX-XXX-XXX" class="form-control input-md" required="">
          </div>
        </div>
  <!-- Text input-->
      
    
        <div class="form-group">
          <label class="col-md-4 control-label" for="cantidad">Cantidad</label>
          <div class="col-md-4">
          <input id="cantidad" name="cantidad" type="text" placeholder="" class="form-control input-md" required="">
          </div>
        </div>
        		<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="sexo">Banco</label>
				  <div class="col-md-4">
				    <select id="banco" name="banco" class="form-control">
				    <option value="">Elija una opci&oacuten</option>
				      <option value="Bancomer">Bancomer</option>
				      <option value="Banamex">Banamex</option>
				       <option value="Santander">Santander</option>

				    </select>
				  </div>
				</div>


           <div class="form-group">
          <label class="col-md-4 control-label" for="cantidad"></label>
          <div class="col-md-4">
          <button id="boton" name="boton" class="btn btn-primary"> Guardar </button>
          </div>
        </div>
       
</form>
 
  </center> 
  </div>
</div>
<a href=""> hola</a>


			</nav>


		<!---->
		

</body>
</html>