
<?php 

    require('../conexion.php');
  $query="SELECT x.mano_obra, x.costo, y.fecha_venta, z.nombre FROM venta_servicio x, venta y, cliente z WHERE x.fk_venta=y.pk_venta and y.fk_cliente=z.pk_cliente";
    
    $resultado=$con->query($query); ?>


<!DOCTYPE html>
<html>
<head>
<!--imagen en la cabecera de la pagina-->
  <link rel="shortcut icon" href="./imagenes/simbo.png" type="image/png" />


    <title>Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../jquery/jquery.js"></script> 
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
   

    
    </head>

    
<body>
<table class="table table-bordered">
            <thead>
         
                <tr class="header">
                
                 
                    <td class="a" rowspan="5"><b>Mano de obra</b></td>
                
                    <td class="a"  rowspan="1"><b>Costo</b></td>
                
                   <td class="a"  rowspan="1"><b>Fecha</b></td>
                
                
                </tr>

                <tbody>
                    <?php

                     
                      while($row=$resultado->fetch_assoc()){ 
                        ?>

                        <tr>
                        
                            
                            <td>
                            <?php echo $row['mano_obra'];?>
                            </td>
                            

                            <td>
                            <?php echo $row['costo'];?>
                            </td>
                        
                            <td>
                            <?php echo $row['fecha_venta'];?>
                            </td>
                            
                        
                    <?php } ?>


                </tbody>

               

                </table>
             
                	
                </body></html>
