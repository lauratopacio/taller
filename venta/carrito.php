<?php 
  
require('../seguridad/seguridad.php');
  require('../conexion.php');
  

//SELECCIONA LA ULTIMA VENTA
$query="SELECT  max(pk_venta) as maxi from venta";  
$resultado=$con->query($query);
while($row=$resultado->fetch_array())
{
 $max=$row['maxi'];
}
////////////////////////////////////////////////////

////////////////////////////////////////////////////

?>

<!DOCTYPE html>
<html>
<head>
<!--imagen en la cabecera de la pagina-->
 <link rel="shortcut icon" href="../imagenes/simbo.png" type="image/png" />


  <title>Carrito</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="../jquery/jquery.js"></script> 

 
   <script src="../js/bootstrap-transition.js"></script>
    <script src="../js/bootstrap-alert.js"></script>
    <script src="../js/bootstrap-modal.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
    <script src="../js/bootstrap-scrollspy.js"></script>
    <script src="../js/bootstrap-tab.js"></script>
    <script src="../js/bootstrap-tooltip.js"></script>
    <script src="../js/bootstrap-popover.js"></script>
    <script src="../js/bootstrap-button.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
    <script src="../js/bootstrap-carousel.js"></script>
    <script src="../js/bootstrap-typeahead.js"></script>
    <script src="../js/bootstrap-affix.js"></script>
    <script src="../js/holder/holder.js"></script>
    <script src="../js/google-code-prettify/prettify.js"></script>
    <script src="../js/application.js"></script> 
      <link href="../js/google-code-prettify/prettify.css" rel="stylesheet">
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
  <script src="../js/jquery.js"></script> 
 
  <link rel="shortcut icon" href="../imagenes/favicon.jpg" type="image/png" />

  <title>-Bienvenido-</title>
  <meta charset="UTF-8">
  <!--link para que encuentre la libreria de Js-->
  <!--<script src="http://code.jquery.com/jquery-latest.js"></script>-->
  <script src="../jquery/latest.js"></script>

  <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
  <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">

  <link rel="stylesheet" type="text/css" href="../css/style-p.css">


  <!--Script para mandar llamar el modal-->
  <script type="text/javascript">
    function abrirventana(){
      $(".ventana").slideDown("slow");
    }
    function cerrarventana(){
      $(".ventana").slideUp("slow");
    }

   
    
  </script>
</head>
<body>

<nav class="navbar navbar-inverse" role="navigation">
<!--       <a href="#" class="navbar-brand"> </a>   
          <a href="#" class="navbar-brand"> </a>  
        <a href="#" class="navbar-brand"> </a>  
       -->

         
  
    
      <div class='container'>
    <div  align='right' >
    <a href="../catalogo.php" align="left">
    <img src="../imagenes/carrito.png" width='60px'>  
        </a>
    </div>  


</div>  

      </nav>
        <?php
  

  //seleccionar productos añadidos al carrito
  $query="SELECT y.pk_venta_producto,x.codigo, x.nombre_pieza, x.costo, sum(y.cantidad) as cant, sum(y.costo) as subtot from venta_productos y, producto x, venta z where z.pk_venta=y.fk_venta and x.pk_producto=y.fk_producto and y.fk_venta=$max group by x.codigo  ORDER BY x.nombre_pieza asc " ;
  $resultado=$con->query($query);
  ?>
    <!---->
  


    <!---->
  <section>
  
    <div class="container">
    <p><h2>Carrito de compra</h2></p>
    
    <table border=1 width="100%" class='table'>
      <thead>
        <tr>
      
        <td><b>Codigo</b></td>
      
          <td><b>Nombre pieza</b></td>
          <td><b>Cantidad</b></td>
          <td><b>Costo</b></td>
          <td><b>subtotal</b></td>
          <td><b>MODIFICAR</b></td>
          <td><b>ELIMINAR</b></td>
        </tr>

        <tbody>
          <?php

           while($row=$resultado->fetch_assoc()){ 
            ?>

            <tr>
            

                 <td>
                 <?php echo $row['codigo'];?>
                 </td>
                             
              
              <td>
              <?php echo $row['nombre_pieza'];?>
              </td>

              <td>
              <?php echo $row['cant'];?>
              </td>

              <td>
              <?php echo $row['costo'];?>
              </td>
                <td>
              <?php echo $row['subtot'];?>
              </td>
              <?php 
                   echo"<td> <a href=carrito2.php?pk_venta_producto=".$row['pk_venta_producto']."><span class='glyphicon glyphicon-share'></a></td>";
                   echo "<td> <a href=eliminar.php?pk_venta_producto=".$row['pk_venta_producto']."><span class='glyphicon glyphicon-trash'></a></td>";  
                ?>
            </tr>

          <?php } ?>
        </tbody>
      </table>
<?php
  //suma el total de los productos
  $query7="SELECT sum(x.costo) as costo_produc from venta_productos x, venta z where z.pk_venta=x.fk_venta and x.fk_venta='$max' " ;
  $resultado7=$con->query($query7);

while($row7=$resultado7->fetch_array())
{
 $sum_producto=$row7['costo_produc'];
}
?>  
<div align="right"><p><h4>Subtotal Productos: <?php echo $sum_producto;?></h4></p></div>
<a href="../catalogo.php"><button id="boton" name="boton">Añadir Productos</button> </a>
</section>
<section> 
<div class="container">
<p><h3>Registro de servicios</h3></p>
<div>
<form name="FORM" method="POST" action="alta_servicio.php" class="form-horizontal">
<br>  
      <div class="form-group">
          <label for="nombre"> Mano de Obra</label>
          <div class="col-md-4">
          <input id="mano_obra" name="mano_obra" type="text" placeholder="" class="form-control input-md" required="">
          </div>
          </div>  
            <div class="form-group">
          <label  for="costo"> Costo</label>
          <div class="col-md-4">
          <input id="costo" name="costo" type="text" placeholder="" class="form-control input-md" required="">
          </div>
          </div>  
            <!-- Button -->
        <div class="form-group">
          <label  for="boton"></label>
          <div class="col-md-4">
            <button id="boton" name="boton" > Guardar</button> 
          </div>
        </div>

</form>
  </div>

  </section>
  <div class="container">
<P><H2>Servicios</H2></P> 
  <?php
  

  //seleccionar productos añadidos al carrito
  $query2="SELECT x.pk_servicio,x.mano_obra, x.costo from venta_servicio x, venta z where z.pk_venta=x.fk_venta and x.fk_venta='$max' ORDER BY x.mano_obra asc " ;
  $resultado2=$con->query($query2);
  ?>

    <table border=1 width="100%" class='table'>
      <thead>
        <tr>
      
      
      
          <td><b>Mano de Obra</b></td>
          
          <td><b>Costo</b></td>
            <td><b>MODIFICAR</b></td>
          <td><b>ELIMINAR</b></td>
        </tr>

        <tbody>
          <?php

           while($row2=$resultado2->fetch_assoc()){ 
            ?>

            <tr>
            

                 <td>
                 <?php echo $row2['mano_obra'];?>
                 </td>
                             
              <td>
              <?php echo $row2['costo'];?>
              </td>
                <?php 
                         echo"<td> <a href=carrito3.php?pk_servicio=".$row2['pk_servicio']."><span class='glyphicon glyphicon-share'></a></td>";
                     echo "<td> <a href=eliminar2.php?pk_servicio=".$row2['pk_servicio']."><span class='glyphicon glyphicon-trash'></a></td>";  
                ?>


            </tr>

          <?php } ?>
        </tbody>
      </table>

<?php
  

  //seleccionar productos añadidos al carrito
  $query3="SELECT sum(x.costo) as costo_venta from venta_servicio x, venta z where z.pk_venta=x.fk_venta and x.fk_venta='$max' ORDER BY x.mano_obra asc " ;
  $resultado3=$con->query($query3);

while($row4=$resultado3->fetch_array())
{
 $sum_venta=$row4['costo_venta'];
}

//suma los productos y las ventas

  $total=$sum_producto+$sum_venta;
?>
  <div align="right">
    <p><h4>Subtotal Servicio: <?php echo $sum_venta;?></h4></p>
      <TABLE class="table">
      <tr><form class="form-horizontal" method="post" action="javascript:abrirventana();">

      <form class="form-horizontal">

        <fieldset>
<!-- --><td>     
          <label  for="sexo"> Forma de pago:</label>
    
        </td>
   <td> 
          
         
          <button id="boton" name="boton" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>Contado</button>
          
          </td> 
        </div>
       </form>
        <!-- Button -->
     <form class="form-horizontal" method="post" action="../credito/credito.php">

      <form class="form-horizontal">

        <fieldset>
<!-- -->
   <td> 
          
         
          <button id="boton" name="boton" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>Credito</button>
          
          </td> 
     
        </div>
       </form>
     <td>
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="sanix_educacionmedia178@hotmail.com">
<input type="hidden" name="item_name" value="Premium Subscription">
<input type="hidden" name="currency_code" value="MXN">
<input type="hidden" name="amount" value="<?php echo $total; ?>">
<input type="image" name="submit" src="http://www.paypal.com/es_XC/i/btn/x-click-but01.gif" alt="Make payments with Paypal - it's fast,free and secure">
<input type="hidden" name="return" value="http://localhost/taller/venta/carrito.php">
<input type="hidden" name="cancel_return" value="http://localhost/taller/venta/carrito.php">
</form>
          </td>
        </fieldset>
      

        <td><h4>TOTAL: <?php echo $total;?></h4></td>

      </tr>
      </TABLE>

</div>


<!--INICIO DE VENTANA MODAL-->

       <div class="ventana">
            <div class="form"><!--Div que contiene el formulario-->
              <div class="cerrar"> <a href="javascript:cerrarventana();">X</a></div> <!--Clase del encabezado cerrar-->
              <h2 align="center">Contado</h2>
    
        

           <div class="main-form">
           <div class="logo"></div>
             <form  method="post" action="carritoo.php">

               <label  align="left" >TOTAL: <?php echo $total;?></label>
             
               <label  align="left" >Pag&oacute </label>
               <input type="text" id="pago" name="pago" placeholder="cantidad" required/>
              <input type="submit" name="btn_g" id="button" value="Dar Cambio">
             </form>
            </div>
            </div>
          </div>

  </div>

<!--FIN DE VENTANA MODAL-->




</div>
  <tr>
    <td>
    <pre><center><strong><a href="https://www.facebook.com/soft.unicorn" target="_blank" style="color:#000">Santiago Ixcuintla</a></strong></center></pre>
    </td>
  </tr>
    </div>

  </body>
  </html>






