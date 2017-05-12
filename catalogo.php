
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>


	
</head>
<body>
	<header>
		<a href="venta/carrito.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>

	</header>
	<section>

 		  <div  class="col-md-6">
          <table class="table">

	
          <form method="post" action="venta/catalogoo.php">
          
          <td><input  id="busca" name="busca" type="text" placeholder="Buscar" class="form-control input-md"></td>
          <td width="50%;">
          <input type="submit" name="button" id="button" class="btn btn-danger"value="Buscar">
          </td>
          </form>
          <td><a href="venta/cancelar.php"><button>CANCELAR VENTA</button></a></td>
          </table>
        </div>




	<?php
		include 'conexion.php';
$re = "SELECT * FROM producto where cantidad > stock+2";
		$result = mysqli_query($con,$re);
		while ($f=mysqli_fetch_array($result)) {
		?>


			<div class="producto">
			<center>
				<img src="./imagenes/<?php echo $f['imagen'];?>"><br>
				<span><?php echo $f['codigo'];?></span><br>
				<span><?php echo $f['nombre_pieza'];?></span><br>
				<span><?php echo $f['marca_carro'];?></span><br>
				<span>
					<?php if ($f['estatus']=='Insuficiente') {
                              ?>
                                   <style>                                
                                  .insuficiente {
                                    color : red;
                                    background-color: #fff;
                                    box-shadow : 0 0 5px 0 rgba(255, 255, 255, 0.7);
                                    transition : all .4s;
                                  }
                                   </style> 
                                   <b class="insuficiente"><?php echo $f['estatus'];  ?></b>  <?php
                              } if ($f['estatus']=='Producto Bajo') {
                              ?>
                                   <style>                                
                                  .insuficiente {
                                    color : orange;
                                    background-color: #fff;
                                    box-shadow : 0 0 5px 0 rgba(255, 255, 255, 0.7);
                                    transition : all .4s;
                                  }
                                   </style> 
                                   <b class="insuficiente"><?php echo $f['estatus'];  ?></b>  <?php
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
                              <?php echo $f['estatus'];?></b>
                             <?php
                              }
                              ?>
				</span><br>
				<span>Precio: <?php echo $f['costo'];?></span><br>
<form action="venta/carritodecompras.php" method="POST" name="form">
  <input type="hidden" name="id" value="<?php echo $f['pk_producto']; ?>">

      <label for="email">Cantidad</label>
      <input type="number" id="cantidad" name="cantidad" placeholder="1" required>
          <button type="submit" class="btn"><strong><i class="icon-ok"></i>Comprar</strong></button>
</form>


			</center>
		</div>
	<?php
		}
	?>
		
		

		
	</section>
</body>
</html>