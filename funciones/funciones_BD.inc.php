<?php

require_once 'conexion.inc.php';

function listar_producto_poco_stock(){
	$listado = array();
	$linkConexion = conexionBD();

	$limiteStock = 10;

	if($linkConexion != false){
		$SQL = "SELECT idProducto, dscProducto, stock FROM producto where stock <= '$limiteStock'order by stock desc;";

		$result = mysqli_query($linkConexion, $SQL);
		$i = 0;
		while ($data = mysqli_fetch_array($result)){
			$listado[$i]['IDPRODUCTO'] = $data['idProducto'];
			$listado[$i]['DSCPRODUCTO'] = $data['dscProducto'];
			$listado[$i]['STOCK'] = $data['stock'];
			$i++;
		}
	}
	return $listado;
}

?>