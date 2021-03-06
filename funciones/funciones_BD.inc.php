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

/*----VALIDACIONES ------*/


/*----FUNCIONES DE CLIENTES ------*/
function InsertarCliente(){
	$insertSQL = "INSERT INTO cliente (nombre, apellido, domicilio, dni, telefono ) VALUES ('{$_POST['nombreCliente']}', '{$_POST['apellidoCliente']}', '{$_POST['domicilioCliente']}', '{$_POST['dniCliente']}', '{$_POST['telefonoCliente']}')";
	$linkConexion = conexionBD();

	if(!mysqli_query($linkConexion, $insertSQL)){
		return false;
	} else {
		return true;
	}
}
#Listar clientes
function ListarClientes(){
	$ListadoCategorias = array();
	$linkConexion = conexionBD();
	if($linkConexion != false){
		$SQL = "SELECT id_cliente, nombre, apellido, domicilio, dni, telefono from cliente where activo = 1 ORDER BY id_cliente asc";

		$result = mysqli_query($linkConexion, $SQL);
		$i = 0;
		while ($data = mysqli_fetch_array($result)){
			$ListadoCategorias[$i]['ID_CLIENTE'] =$data['id_cliente'];
			$ListadoCategorias[$i]['NOMBRE'] =$data['nombre'];
			$ListadoCategorias[$i]['APELLIDO'] =$data['apellido'];
			$ListadoCategorias[$i]['DOMICILIO'] =$data['domicilio'];
			$ListadoCategorias[$i]['DNI'] =$data['dni'];
			$ListadoCategorias[$i]['TELEFONO'] =$data['telefono'];
			$i++;
		}
	} else {
		echo 'Error';
	}
	
	return $ListadoCategorias;
}

#Activacion clientes
function activacion_cliente($Activo, $IdCliente){
	if ($Activo == 1 || $Activo == 0){
		$SQL = "UPDATE cliente set activo = $Activo WHERE id_cliente = $IdCliente";
		
		$linkConexion = conexionBD();
		if(!mysqli_query($linkConexion, $SQL)){
			return false;
		} else {
			return true;
		}
	} else {
		return false;
	}
}
function TraerDatoCliente($IdCliente){
	$DatosCliente = array();

	$linkConexion = conexionBD();
	if($linkConexion != false) {
		$SQL = "SELECT id_cliente, nombre, apellido, domicilio, dni, telefono from cliente where id_cliente = $IdCliente";

		$rs = mysqli_query($linkConexion, $SQL);
		$i = 0;

		$data = mysqli_fetch_array($rs);
		$DatosCliente['ID_CLIENTE'] = $data['id_cliente'];
		$DatosCliente['NOMBRE'] = $data['nombre'];
		$DatosCliente['APELLIDO'] = $data['apellido'];
		$DatosCliente['DOMICILIO'] = $data['domicilio'];
		$DatosCliente['DNI'] = $data['dni'];
		$DatosCliente['TELEFONO'] = $data['telefono'];
		
		return $DatosCliente;
	}
}

function Modificar_Cliente($IdCliente){
	$SQL = "UPDATE cliente set id_cliente='{$_POST['IdCliente']}', nombre='{$_POST['nombreCliente']}', apellido='{$_POST['apellidoCliente']}', domicilio='{$_POST['domicilioCliente']}', dni='{$_POST['dniCliente']}', telefono = '{$_POST['telefonoCliente']}' where id_cliente=$IdCliente";
	$linkConexion = conexionBD();

	if(!mysqli_query($linkConexion, $SQL)){
		return false;	
	} else {
		return true;
	}
}

/*----FUNCIONES DE CATEGORIAS-----*/
#Registrar categoria

function InsertarCategoria(){
	$insertSQL = "INSERT INTO categoria_producto (dsc_categoria) VALUES ('{$_POST['nombreCategoria']}')";
	$linkConexion = conexionBD();

	if(!mysqli_query($linkConexion, $insertSQL)){
		return false;
	} else {
		return true;
	}
}
#Listar categoria
function ListarCategorias(){
	$ListadoCategorias = array();
	$linkConexion = conexionBD();
	if($linkConexion != false){
		$SQL = "SELECT id_categoria, dsc_categoria from categoria_producto where activo = 1 ORDER BY id_categoria asc";

		$result = mysqli_query($linkConexion, $SQL);
		$i = 0;
		while ($data = mysqli_fetch_array($result)){
			$ListadoCategorias[$i]['ID_CATEGORIA'] =$data['id_categoria'];
			$ListadoCategorias[$i]['CATEGORIA'] = $data['dsc_categoria'];
			$i++;
		}
	} else {
		echo 'Error';
	}
	
	return $ListadoCategorias;
}


#Desactivar / Eliminar categoría

function Activacion_categoria($Activo, $IdCategoria){
	if ($Activo == 1 || $Activo == 0){
		$SQL = "UPDATE categoria_producto set activo = $Activo WHERE id_categoria = $IdCategoria";
		
		$linkConexion = conexionBD();
		if(!mysqli_query($linkConexion, $SQL)){
			return false;
		} else {
			return true;
		}
	} else {
		return false;
	}
}
#Traer categorias

function TraerDatoCategoria($IdCategoria){
	$DatosCategoria = array();

	$linkConexion = conexionBD();
	if($linkConexion != false) {
		$SQL = "SELECT id_categoria, dsc_categoria from categoria_producto where id_categoria = $IdCategoria";

		$rs = mysqli_query($linkConexion, $SQL);
		$i = 0;

		$data = mysqli_fetch_array($rs);
		$DatosCategoria['ID_CATEGORIA'] = $data['id_categoria'];
		$DatosCategoria['CATEGORIA'] = $data['dsc_categoria'];
		
		return $DatosCategoria;
	}
}
function Modificar_Categoria($IdCategoria){
	$SQL = "UPDATE categoria_producto set id_categoria='{$_POST['IdCategoria']}', dsc_categoria='{$_POST['nombreCategoria']}' where id_categoria=$IdCategoria";
	$linkConexion = conexionBD();

	if(!mysqli_query($linkConexion, $SQL)){
		return false;	
	} else {
		return true;
	}
}

/*----FUNCIONES DE FORMAS DE PAGO-----*/
#Registrar forma de pago

function InsertarFP(){
	$insertSQL = "INSERT INTO forma_pago (dsc_forma_pago) VALUES ('{$_POST['nombreFormaPago']}')";
	$linkConexion = conexionBD();

	if(!mysqli_query($linkConexion, $insertSQL)){
		return false;
	} else {
		return true;
	}
}

#Listar formas de pago
function ListarFP(){
	$ListadoCategorias = array();
	$linkConexion = conexionBD();
	if($linkConexion != false){
		$SQL = "SELECT id_forma_pago, dsc_forma_pago from forma_pago where activo = 1 ORDER BY id_forma_pago asc";

		$result = mysqli_query($linkConexion, $SQL);
		$i = 0;
		while ($data = mysqli_fetch_array($result)){
			$ListadoCategorias[$i]['ID_FORMA_PAGO'] =$data['id_forma_pago'];
			$ListadoCategorias[$i]['FORMA_PAGO'] = $data['dsc_forma_pago'];
			$i++;
		}
	} else {
		echo 'Error';
	}
	
	return $ListadoCategorias;
}

#Desactivar / Eliminar forma de pago

function Activacion_forma_pago($Activo, $IdFormaPago){
	if ($Activo == 1 || $Activo == 0){
		$SQL = "UPDATE forma_pago set activo = $Activo WHERE id_forma_pago = $IdFormaPago";
		
		$linkConexion = conexionBD();
		if(!mysqli_query($linkConexion, $SQL)){
			return false;
		} else {
			return true;
		}
	} else {
		return false;
	}
}
#Traer categorias

function TraerDatoFP($IdFormaPago){
	$DatosCategoria = array();

	$linkConexion = conexionBD();
	if($linkConexion != false) {
		$SQL = "SELECT id_forma_pago, dsc_forma_pago from forma_pago where id_forma_pago = $IdFormaPago";

		$rs = mysqli_query($linkConexion, $SQL);
		$i = 0;

		$data = mysqli_fetch_array($rs);
		$DatosCategoria['ID_FORMA_PAGO'] = $data['id_forma_pago'];
		$DatosCategoria['FORMA_PAGO'] = $data['dsc_forma_pago'];
		
		return $DatosCategoria;
	}
}
function Modificar_FP($IdFormaPago){
	$SQL = "UPDATE forma_pago set id_forma_pago='{$_POST['IdFormaPago']}', dsc_forma_pago='{$_POST['nombreFormaPago']}' where id_forma_pago=$IdFormaPago";
	$linkConexion = conexionBD();

	if(!mysqli_query($linkConexion, $SQL)){
		return false;	
	} else {
		return true;
	}
}

/*----FUNCIONES DE BANCOS-----*/
function ListarBanco(){
	$ListadoBancos = array();
	$linkConexion = conexionBD();
	if($linkConexion != false){
		$SQL = "SELECT id_banco, dsc_banco from banco where activo = 1 ORDER BY id_banco asc";

		$result = mysqli_query($linkConexion, $SQL);
		$i = 0;
		while ($data = mysqli_fetch_array($result)){
			$ListadoBancos[$i]['ID_BANCO'] =$data['id_banco'];
			$ListadoBancos[$i]['BANCO'] = $data['dsc_banco'];
			$i++;
		}
	} else {
		echo 'Error';
	}
	
	return $ListadoBancos;
}
#Registrar banco

function InsertarBanco(){
	$insertSQL = "INSERT INTO banco (dsc_banco) VALUES ('{$_POST['nombreBanco']}')";
	$linkConexion = conexionBD();

	if(!mysqli_query($linkConexion, $insertSQL)){
		return false;
	} else {
		return true;
	}
}
#Trear datso banco
function TraerDatoBanco($IdBanco){
	$DatosBanco = array();

	$linkConexion = conexionBD();
	if($linkConexion != false) {
		$SQL = "SELECT id_banco, dsc_banco from banco where id_banco = $IdBanco";

		$rs = mysqli_query($linkConexion, $SQL);
		$i = 0;

		$data = mysqli_fetch_array($rs);
		$DatosBanco['ID_BANCO'] = $data['id_banco'];
		$DatosBanco['BANCO'] = $data['dsc_banco'];
		
		return $DatosBanco;
	}
}
#Modificar bancos
function Modificar_Banco($IdBanco){
	$SQL = "UPDATE banco set id_banco='{$_POST['IdBanco']}', dsc_banco='{$_POST['nombreBanco']}' where id_banco=$IdBanco";
	$linkConexion = conexionBD();

	if(!mysqli_query($linkConexion, $SQL)){
		return false;	
	} else {
		return true;
	}
}
#Desactivar / Eliminar banco

function Activacion_banco($Activo, $IdBanco){
	if ($Activo == 1 || $Activo == 0){
		$SQL = "UPDATE banco set activo = $Activo WHERE id_banco = $IdBanco";
		
		$linkConexion = conexionBD();
		if(!mysqli_query($linkConexion, $SQL)){
			return false;
		} else {
			return true;
		}
	} else {
		return false;
	}
}
/*----FUNCIONES DE TARJETAS-----*/
function ListarTarjeta(){
	$ListadoTarjeta = array();
	$linkConexion = conexionBD();
	if($linkConexion != false){
		$SQL = "SELECT t1.id_tarjeta, t1.dsc_tarjeta, t2.dsc_forma_pago, t3.dsc_banco from tarjeta t1 
		INNER JOIN forma_pago t2 on (t1.id_forma_pago = t2.id_forma_pago) 
		INNER JOIN banco t3 on (t1.id_banco = t3.id_banco) where t1.activo = 1 ORDER BY t1.dsc_tarjeta asc";

		$result = mysqli_query($linkConexion, $SQL);
		$i = 0;
		while ($data = mysqli_fetch_array($result)){
			$ListadoTarjeta[$i]['ID_TARJETA'] =$data['id_tarjeta'];
			$ListadoTarjeta[$i]['TARJETA'] = $data['dsc_tarjeta'];
			$ListadoTarjeta[$i]['FORMA_PAGO'] = $data['dsc_forma_pago'];
			$ListadoTarjeta[$i]['BANCO'] = $data['dsc_banco'];
			$i++;
		}
	} else {
		echo 'Error';
	}
	
	return $ListadoTarjeta;
}
#Registrar tarjeta

function InsertarTarjeta(){
	$insertSQL = "INSERT INTO tarjeta (dsc_tarjeta, id_forma_pago, id_banco) VALUES ('{$_POST['nombreTarjeta']}', '{$_POST['idFormaPago']}', '{$_POST['idBanco']}')";
	$linkConexion = conexionBD();

	if(!mysqli_query($linkConexion, $insertSQL)){
		return false;
	} else {
		return true;
	}
}
#Desactivar / Eliminar tarjeta

function Activacion_tarjeta($Activo, $IdTarjeta){
	if ($Activo == 1 || $Activo == 0){
		$SQL = "UPDATE tarjeta set activo = $Activo WHERE id_tarjeta = $IdTarjeta";
		
		$linkConexion = conexionBD();
		if(!mysqli_query($linkConexion, $SQL)){
			return false;
		} else {
			return true;
		}
	} else {
		return false;
	}
}
#Trear datos tarjeta
function TraerDatoTarjeta($IdTarjeta){
	$DatosTarjeta = array();

	$linkConexion = conexionBD();
	if($linkConexion != false) {
		$SQL = "SELECT id_tarjeta, dsc_tarjeta, id_forma_pago, id_banco from tarjeta where id_tarjeta = $IdTarjeta";

		$rs = mysqli_query($linkConexion, $SQL);
		$i = 0;

		$data = mysqli_fetch_array($rs);
		$DatosTarjeta['ID_TARJETA'] = $data['id_tarjeta'];
		$DatosTarjeta['TARJETA'] = $data['dsc_tarjeta'];
		$DatosTarjeta['ID_FORMA_PAGO'] = $data['id_forma_pago'];
		$DatosTarjeta['ID_BANCO'] = $data['id_banco'];
		
		return $DatosTarjeta;
	}
}
function Modificar_Tarjeta($IdTarjeta){
	$SQL = "UPDATE tarjeta set dsc_tarjeta='{$_POST['nombreTarjeta']}', id_forma_pago='{$_POST['idFormaPago']}', id_banco='{$_POST['idBanco']}' where id_tarjeta=$IdTarjeta";
	$linkConexion = conexionBD();

	if(!mysqli_query($linkConexion, $SQL)){
		return false;	
	} else {
		return true;
	}
}

/*----FUNCIONES DE PRODUCTOS-----*/
function InsertarProducto(){
	$insertSQL = "INSERT INTO producto (dsc_producto, id_categoria, precio, stock) VALUES ('{$_POST['nombreProducto']}', '{$_POST['idCategoria']}','{$_POST['precioProducto']}', '{$_POST['stockProducto']}')";
	$linkConexion = conexionBD();

	if(!mysqli_query($linkConexion, $insertSQL)){
		return false;
	} else {
		return true;
	}
}
##LISTADO DE PRODUCTOS
function ListarProducto(){
	$ListadoProducto = array();
	$linkConexion = conexionBD();
	if($linkConexion != false){
		$SQL = "SELECT t1.id_producto, t1.dsc_producto, t2.dsc_categoria, t1.precio, t1.stock from producto t1 
		INNER JOIN categoria_producto t2 on (t1.id_categoria = t2.id_categoria) 
		where t1.activo = 1 ORDER BY t1.dsc_producto asc";

		$result = mysqli_query($linkConexion, $SQL);
		$i = 0;
		while ($data = mysqli_fetch_array($result)){
			$ListadoProducto[$i]['ID_PRODUCTO'] =$data['id_producto'];
			$ListadoProducto[$i]['DSC_PRODUCTO'] =$data['dsc_producto'];
			$ListadoProducto[$i]['DSC_CATEGORIA'] = $data['dsc_categoria'];
			$ListadoProducto[$i]['PRECIO'] = $data['precio'];
			$ListadoProducto[$i]['STOCK'] = $data['stock'];
			$i++;
		}
	} else {
		echo 'Error';
	}
	
	return $ListadoProducto;
}

#Trear datos tarjeta
function TraerDatoProducto($IdProducto){
	$DatosProducto = array();

	$linkConexion = conexionBD();
	if($linkConexion != false) {
		$SQL = "SELECT id_producto, id_categoria, dsc_producto, precio, stock from producto where id_producto = $IdProducto";

		$rs = mysqli_query($linkConexion, $SQL);
		$i = 0;

		$data = mysqli_fetch_array($rs);
		$DatosProducto['ID_PRODUCTO'] = $data['id_producto'];
		$DatosProducto['ID_CATEGORIA'] = $data['id_categoria'];
		$DatosProducto['PRODUCTO'] = $data['dsc_producto'];
		$DatosProducto['PRECIO'] = $data['precio'];
		$DatosProducto['STOCK'] = $data['stock'];
		
		return $DatosProducto;
	}
}

function Modificar_Producto($IdProducto){
	$SQL = "UPDATE producto set dsc_producto='{$_POST['nombreProducto']}', id_categoria='{$_POST['idCategoria']}', precio='{$_POST['precio']}', stock='{$_POST['stock']}' where id_producto=$IdProducto";
	$linkConexion = conexionBD();

	if(!mysqli_query($linkConexion, $SQL)){
		return false;	
	} else {
		return true;
	}
}
function Activacion_producto($Activo, $IdProducto){
	if ($Activo == 1 || $Activo == 0){
		$SQL = "UPDATE producto set activo = $Activo WHERE id_producto = $IdProducto";
		
		$linkConexion = conexionBD();
		if(!mysqli_query($linkConexion, $SQL)){
			return false;
		} else {
			return true;
		}
	} else {
		return false;
	}
}
?>