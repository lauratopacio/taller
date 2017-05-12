<?php 

    require('../conexion.php');
  $query="SELECT c.nombre , COUNT(v.fk_cliente) as Compras, SUM(v.TOTAL) as total FROM venta v, cliente c WHERE c.pk_cliente=v.fk_cliente  and c.nombre!='publico' GROUP by c.nombre ORDER BY SUM(v.TOTAL) DESC";
    
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
                
                 
                    <td class="a" rowspan="5"><b>Cliente</b></td>
                
                    <td class="a"  rowspan="1"><b>Compras</b></td>
                
                
                
                </tr>

                <tbody>
                    <?php

                     
                      while($row=$resultado->fetch_assoc()){ 
                        ?>

                        <tr>
                        
                            
                            <td>
                            <?php echo $row['nombre'];?>
                            </td>
                            

                            <td>
                            <?php echo $row['total'];?>
                            </td>
                        
                            
                        
                    <?php } ?>


                </tbody>

               

                </table>
             
                	
                </body></html>
