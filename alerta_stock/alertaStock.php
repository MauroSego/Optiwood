<!DOCTYPE html>
<html lang="en">
<?php
	require_once '../funciones/conexion.inc.php';
	require_once '../funciones/funciones_BD.inc.php';
?>
<head>
	<meta charset="UTF-8">
	<title>Alerta stock</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
	<header>
		<a href="" data-toggle="modal" data-target="#modalAlertaStock">Estado Stock</a>
	</header>
	<!-- Modal -->
	<div class="modal fade" id="modalAlertaStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalCenterTitle">Productos con poco stock</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<?php
				$listadoProductos = listar_producto_poco_stock();
				if(!empty($listadoProductos)){
			?>
					<table class="table table-hover">
						<thead class="thead-dark">
							<tr>
								<th>ID Producto</th>
								<th>Nombre del producto</th>
								<th>Stock</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$cantRegistros = count($listadoProductos);
								for($i = 0; $i < $cantRegistros; $i++){
								
							?>
							<tr>
								<td><?php echo $listadoProductos[$i]['IDPRODUCTO'] ?></td>
								<td><?php echo $listadoProductos[$i]['DSCPRODUCTO'] ?></td>
								<td><?php echo $listadoProductos[$i]['STOCK'] ?></td>
							</tr>
							<?php
								}
							}
							?>
						</tbody>
					</table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
	      </div>
	    </div>
	  </div>
	</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>