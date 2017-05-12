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
    function abrirventana2(){
      $(".modificar").slideDown("slow");
    }
    function cerrarventana2(){
      $(".modificar").slideUp("slow");
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
                   echo"<td> </td>";
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
</section>

  <div class="container">
  <?php
  

  //seleccionar productos añadidos al carrito
  $query2="SELECT x.pk_servicio,x.mano_obra, x.costo from venta_servicio x, venta z where z.pk_venta=x.fk_venta and x.fk_venta='$max' ORDER BY x.mano_obra asc " ;
  $resultado2=$con->query($query2);
  ?>

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

        </fieldset>

      </tr>
      </TABLE>


</div>

<!-- Inicio de ventana modal modificar -->
   <h1>Modificar Producto</h1>
 </center>
 <form class="form-horizontal" method="post" action="actualizar.php">
<?php 
$pk_venta_producto=$_GET['pk_venta_producto'];
//conocer los datos del cliente qe realizo la venta
$query2="SELECT x.pk_venta_producto,x.fk_venta,x.fk_producto,sum(x.cantidad) as canti, y.costo , y.nombre_pieza FROM venta_productos x, producto y, venta z WHERE x.fk_venta=z.pk_venta and x.fk_producto=y.pk_producto and x.pk_venta_producto='$pk_venta_producto' group by x.fk_producto ";  
$resultado2=$con->query($query2);
    $row2=$resultado2->fetch_assoc();
 ?>
  <div class="form-group">
          <label class="col-md-4 control-label" for="e">C&oacutedigo</label>
          <div class="col-md-4">
          <input type="text" name="pk_venta_producto" id="pk_venta_producto"  class="form-control input-md" title="Codigo no se Modifica" readonly='radonly' restryng value="<?php echo $row2['pk_venta_producto'];?>" />
         </div>
        </div>

          <div class="form-group">
          <label class="col-md-4 control-label" for="e">Nombre pieza</label>
          <div class="col-md-4">
          <input type="text" name="nombre_pieza" id="nombre_pieza"  class="form-control input-md" title="Codigo no se Modifica" readonly='readonly' restryng value="<?php echo $row2['nombre_pieza'];?>" />
         </div>
        </div>

         <div class="form-group">
          <label class="col-md-4 control-label" for="e">Cantidad</label>
          <div class="col-md-4">
          <input type="text" name="cantidad" id="cantidad"  class="form-control input-md" restryng value="<?php echo $row2['canti'];?>">
         </div>
        </div>


         <div class="form-group">
          <label class="col-md-4 control-label" for="cantidad"></label>
          <div class="col-md-4">
          <button id="boton" name="boton" class="btn btn-primary"> Guardar </button>
          </div>
        </div>

</form>

   <div class="modal-dialog">   
    
  <tr>
    <td>
    <pre><center><strong><a href="https://www.facebook.com/soft.unicorn" target="_blank" style="color:#000">Santiago Ixcuintla</a></strong></center></pre>
    </td>
  </tr>
    </div>

  </body>
  </html>






