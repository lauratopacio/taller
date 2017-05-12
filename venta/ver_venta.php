<?php
   
require('../seguridad/seguridad.php');
  require('../conexion.php');

    $query="SELECT x.pk_venta,x.fecha_venta, x.fecha_fin,y.nombre,x.estatus,x.forma_pago, x.TOTAL FROM venta x, cliente y where y.pk_cliente=x.fk_cliente";
    
  $resultado=$con->query($query);
  ?>
   
    <html>
    <head>
    <title>Ventas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  
    </head>
   
    <body>
      <?php  require('../menu/menu2.html'); ?>
<div class="container">
<div class="jumbotron">
    <h1>VENTAS <img src="../imagenes/carro.png" width="70px" ></h1>
<form name="form1" method="post" action="ver_ventas.php">
   <div style="vertical-align: 70%">
     <div class="row">  
        <div class="col-md-3 ">
          <input id="fecha_inicio" name="fecha_inicio" type="date" class="form-control" placeholder="Nombre del cliente">
        </div>
        <div class="col-md-3 ">
          <input id="fecha_fin" name="fecha_fin" type="date" class="form-control" placeholder="Nombre del cliente">
        </div>
        <div class="col-md-1">
           <button id="boton" name="boton" class="btn btn-primary"> Buscar</button>
        </div>
           
     </div>
    </div>
</form>     
         <?php
              $query = mysql_query("SELECT * FROM venta");
              $no_rows = mysql_num_rows($query);
         ?>
</div>
  <h3>   
   Total de Ventas: <?php echo $no_rows; ?>
  </h3>
</div>
  

    <div class="container">
    
            <table class="table table-bordered" >
              <tr class="header">          
              <td width="2%" class="a"><strong>No.</strong></td>            
                <td width="3%" class="a"><strong>Fecha de venta</strong></td>            
                <td width="3%" class="a"><strong>Fecha fin</strong></td>
                <td width="5%" class="a"><strong>Cliente</strong></td>
                <td width="4%" class="a"><strong>Estatus</strong></td>
                <td width="5%" class="a"><strong>Forma de pago</strong></td>
                 
                  <td width="1%" class="a"><strong>Total</strong></td>   
                      
              <thead>
        <tbody>
          <?php
           while($row=$resultado->fetch_assoc()){ 
            ?>
            <tr><td>
                         <?php  echo $row['pk_venta'];?>
                         </td>

                             <td>
                             <?php echo $row['fecha_venta'];?>
                             </td>
                             
                            <td>
                            <?php echo $row['fecha_fin'];?>
                            </td>

                            <td>
                            <?php echo $row['nombre'];?>
                            </td>

                            <td>

                              <?php if ($row['estatus']=='No pagado') {
                              ?>
                                   <style>                                
                                  .insuficiente {
                                    color : red;
                                    background-color: #fff;
                                    box-shadow : 0 0 5px 0 rgba(255, 255, 255, 0.7);
                                    transition : all .4s;
                                  }
                                   </style> 
                                   <b class="insuficiente"><?php echo $row['estatus'];  ?></b>  <?php
                              }
                              else{
                                  ?> 
                                   <style>                                
                                  .estatus {
                                    color : green;
                                    background-color: #fff;
                                    box-shadow : 0 0 5px 0 rgba(255, 255, 255, 0.7);
                                    transition : all .4s;
                                  }
                                   </style>  <b class="estatus">
                              <?php echo $row['estatus'];?></b>
                             <?php
                              }
                              ?>
                           </td>



                            <td>
                            <?php echo $row['forma_pago'];?>
                            </td>
                            <td>
                            <?php echo $row['TOTAL'];?>
                            </td>
     
                    </div>
                  
                    
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="container">
 <pre><center><strong><a href="https://www.facebook.com/soft.unicorn" target="_blank" style="color:#000">Centro Multiservicio llantero y suspensiones de Santiago. Dirección Amado Nervo #321 C.P 63300 esquina Matamoros Col. Centro Santiago Ixc. Nay.</a></strong></center></pre>

</div>
    </body>
  </html> 
  
