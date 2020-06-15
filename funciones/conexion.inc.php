<?php

function conexionBD(){
	$Host = '127.0.0.1';
	$User = 'root';
	$Password = '';
	$BaseDeDatos = 'optiwood';

	$linkConexion = mysqli_connect($Host, $User, $Password, $BaseDeDatos);

	if(!empty($linkConexion)){
		return $linkConexion;
	}
}
conexionBD();
?>