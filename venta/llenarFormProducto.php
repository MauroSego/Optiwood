<?php

    require_once "../funciones/conexion.inc.php";
    require_once "../funciones/funciones_BD.inc.php";

    $datoProductoAJAX = json_encode(TraerDatoProducto($_POST['idProducto']));
    echo $datoProductoAJAX;

?>