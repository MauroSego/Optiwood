<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Prueba hide</title>
	<link href="assets/css/font-face.css" rel="stylesheet" media="all">
	<link href="assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
	<link href="assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link href="assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
	<link href="assets/vendor/select2/select2.min.css" rel="stylesheet" href="text/css" >

	<!-- Bootstrap CSS-->
	<link href="assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
	<?php require_once "vistas/dependencias.php" ?>
</head>
<body>
	<h2>Esto es una prueba</h2>
	<span id="boton" class="btn btn-success">Botón</span>
	<div id="esconder">
		<h3>Este texto se debe esconder</h3>
		<form action="">
			<label for="nombre">Nombre: </label>
			<input id="nombre" type="text">
		</form>
	</div>
</body>
<script src="assets/js/main.js"></script>
<script src="assets/js/funciones.js"></script>

<script>
	$(document).ready(function(){
		var estadoHide = 0;
		esconderDiv();
		$('#boton').click(function(){
			if(estadoHide == 0){
				alert("Mostrar");
				$('#esconder').show();
				estadoHide = 1;
		} else {
			alert("Ocultar");
			esconderDiv();
			estadoHide=0;
		}
			
			
		})

		function esconderDiv(){
			$('#esconder').hide();
		}
	})
</script>

</html>