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
		/*$SQL = "SELECT idPedido, idProducto, cantidad, idEstadoPedido, idPersona, idDomicilio from pedido where idPedido = '$nroPedido'";*/
		$SQL = "SELECT t1.idPedido, t2.dscProducto, t1.cantidad, t3.dscEstado, concat(t4.nombre, ' ', t4.apellido) as cliente, concat(t5.calle, ' ', t5.altura) as domicilio from pedido t1 join producto t2 on t1.idProducto = t2.idProducto join estados_pedido t3 on t1.idEstadoPedido = t3.idEstado join persona t4 on t1.idPersona = t4.idPersona join domicilio t5 on t1.idDomicilio = t5.idDomicilio where idPedido = '$nroPedido'";
		$result = mysqli_query($linkConexion, $SQL);
		$i = 0; 
		while ($data = mysqli_fetch_array($result)){
			$arrayPedido[$i]['IDPEDIDO'] = $data['idPedido'];
			$arrayPedido[$i]['IDPRODUCTO'] = $data['dscProducto'];
			$arrayPedido[$i]['CANTIDAD'] = $data['cantidad'];
			$arrayPedido[$i]['IDESTADOPEDIDO'] = $data['dscEstado'];
			$arrayPedido[$i]['IDPERSONA'] = $data['cliente'];
			$arrayPedido[$i]['IDDOMICILIO'] = $data['domicilio'];
			$i++;
		}
	}
	return $arrayPedido;
	/*nropedido, producto, cantidad, estado, cliente, domicilio*/
}

?>