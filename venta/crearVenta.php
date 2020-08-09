<?php
	session_start();
	require_once '../funciones/funciones_BD.inc.php';
	require_once 'claseVenta.php';

	$obj = new ventas();

	if (count($_SESSION['tablaComprasTemp']) == 0) {
		echo 0;
	} else {
		$result=$obj->crearVenta();
		unset($_SESSION['tablaComprasTemp']);
		echo $result;
	}
?>
