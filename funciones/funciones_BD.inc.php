<?php

require_once 'conexion.inc.php';

function listar_producto_poco_stock(){
	$listado = array();
	$linkConexion = conexionBD();

	$limiteStock = 10;

	if($linkConexion != false){
		$SQL = "SELECT idProducto, dscProducto, stock FROM producto where stock <= '$limiteStock' order by stock desc;";

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

function buscarPedido($nroPedido){
	$arrayPedido = array();
	$linkConexion = conexionBD();

	if($linkConexion != false){
		$SQL = "SELECT idPedido, idProducto, cantidad, idEstadoPedido, idPersona, idDomicilio from pedido where idPedido = '$nroPedido'";

		$result = mysqli_query($linkConexion, $SQL);
		$i = 0; 
		while ($data = mysqli_fetch_array($result)){
			$arrayPedido[$i]['IDPEDIDO'] = $data['idPedido'];
			$arrayPedido[$i]['IDPRODUCTO'] = $data['idProducto'];
			$arrayPedido[$i]['CANTIDAD'] = $data['cantidad'];
			$arrayPedido[$i]['IDESTADOPEDIDO'] = $data['idEstadoPedido'];
			$arrayPedido[$i]['IDPERSONA'] = $data['idPersona'];
			$arrayPedido[$i]['IDDOMICILIO'] = $data['idDomicilio'];
			$i++;
		}
	}
	return $arrayPedido;
	/*nropedido, producto, cantidad, estado, cliente, domicilio*/
}

?>