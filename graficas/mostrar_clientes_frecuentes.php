<?php 
require("../menu/menu2.html");
 ?>
<!DOCTYPE html>
<html>
<head>
<!--imagen en la cabecera de la pagina-->
  <link rel="shortcut icon" href="./imagenes/simbo.png" type="image/png" />


    <title>Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>

    
<body>


         <div class="container">
<div class="jumbotron">
<form action="mostrar_frecuentes.php" method="POST" >
<div class="form-group">
         
          <div class="col-md-4">
          <input type="date" name="pk_cliente" id="pk_cliente"  class="form-control input-md" title="Codigo no se Modifica"   />
          
        
         </div>
        </div>
        <div class="form-group">
         
          <div class="col-md-4">
          <input type="date" name="pk_cliente" id="pk_cliente"  class="form-control input-md" title="Codigo no se Modifica"   />
          
        
         </div>
        </div> 
        <div class="form-group">
          <label class="col-md-4 control-label" for="cantidad"></label>
          <div class="col-md-4">
          <button id="boton" name="boton" class="btn btn-primary"> Buscar </button>
          </div>
        </div>
</form>
  <center>  

 <table>

<tr>
 <td><h2> Gr&aacutefica de mejores clientes</h2></td>
 <td> </td>

 <td><h2>Clientes mas frecuentes</h2></td>
 </tr>
<tr>
  <td><iframe src="pastel2.php" width='500px' height='400px'></iframe></td>
   <td> </td>
   <td> 
 <iframe src="tabla.php" width='500px' height='400px'></iframe></td>
    </td>
</tr>
            </table>

  




  </center> 
  </div>
  </div>
<div class="container">
 <pre><center><strong><a href="https://www.facebook.com/soft.unicorn" target="_blank" style="color:#000">Centro Multiservicio llantero y suspensiones de Santiago. Dirección Amado Nervo #321 C.P 63300 esquina Matamoros Col. Centro Santiago Ixc. Nay.</a></strong></center></pre>

</div>
</body>
</html>

   