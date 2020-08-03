<?php
    require_once "../funciones/conexion.inc.php";
    $linkConexion = conexionBD();

    class ventas {
        function obtenDatosProducto($idProducto){
            $DatosProducto = array();

            $sql="SELECT id_producto, dsc_producto, precio, stock FROM producto where id_producto = $idProducto";
            $result = mysqli_query($linkConexion, $sql);

            $data = mysqli_fetch_array($rs);

            $DatosProducto['ID_PRODUCTO'] = $data['id_producto'];
            $DatosProducto['PRODUCTO'] = $data['dsc_producto'];
            $DatosProducto['PRECIO'] = $data['precio'];
            $DatosProducto['STOCK'] = $data['stock'];

            return $DatosProducto;
        }
    }
?>
