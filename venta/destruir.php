<?php

	session_start();

	session_destroy();

	session_unset();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>session destroy</title>
</head>
<body>
	<h3>Valores de la sesión después de limpiar</h3>
	<?php
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
	?>
</body>
</html>