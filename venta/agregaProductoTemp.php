<?php
    session_start();
    require_once "../funciones/conexion.inc.php";

    $linkConexion = conexionBD();

    $idCliente = $_POST['idCliente'];
    $idProducto = $_POST['idProducto'];
    $precio = $_POST['precio'];

    $DatosCliente = array();
    $DatosProducto = array();
    $SQL = "SELECT nombre, apellido FROM cliente where id_cliente=$idCliente";
    $result=mysqli_query($linkConexion, $SQL);

    $cliente=mysqli_fetch_array($result);

    $DatosCliente['NOMBRE'] = $cliente['nombre'] 
    $DatosCliente['APELLIDO']= $cliente['apellido'];

    $nombreCliente = $DatosCliente['NOMBRE'] . " " . $DatosCliente['APELLIDO'];

    $SQL = "SELECT dsc_producto FROM producto where id_producto=$idProducto";
    $result = mysqli_query($linkConexion, $SQL);

    $producto = mysqli_fetch_array($result);
    $nombreProducto = $producto['dsc_producto'];

    $articulo=  $idProducto."||".
                $nombreProducto."||".
                $precio."||".
                $idCliente."||".
                $nombreCliente;

    $_SESSION['tablaComprasTemp'][] = $articulo;

?>