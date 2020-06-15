<!DOCTYPE html>
<html lang="en">
<?php
	require_once '../funciones/conexion.inc.php';
	require_once '../funciones/funciones_BD.inc.php';

	$pedido = array();

	if(!empty($_POST['BtnBuscarPedido'])){
		$_POST['Pedido'] = trim($_POST['Pedido']);

		if(!empty($_POST['Pedido'])){
			$pedido = buscarPedido($_POST['Pedido']);
			if(!empty($pedido)){
				echo 'Se encontró registro';
			} else {
				echo 'No se encontró registro';
			}
		}
	}
?>
<head>
	<meta charset="UTF-8">
	<title>Busqueda pedido</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<form method="post">
		<div class="form-group">
			<label>Pedido:</label>
			<input class="form-control" type="text" name="Pedido" id="pedido" value="">
		</div>
		<input type="submit" class="btn btn-default" name="BtnBuscarPedido" value="Buscar Pedido">
		<pre style="text-align: left;">
			<?php print_r($_POST); ?>
		</pre>
	</form>
</body>
</html>