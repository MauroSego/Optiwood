<?php

require_once '../funciones/conexion.inc.php';
require_once '../funciones/funciones_BD.inc.php';
$linkConexion = conexionBD();

if(!empty($_GET['IdProducto']) && is_numeric($_GET['IdProducto']) && $_GET['IdProducto'] > 0 && !empty($_GET['Accion'])){
    $IdProducto = $_GET['IdProducto'];

    if($_GET['Accion'] == 'Desactivar'){
        $Activo = 0;

        if(Activacion_producto($Activo, $IdProducto) != false){
            $_SESSION['MensajeOk'] = 'Producto eliminada correctamente';
        } else {
            $_SESSION['MensajeError'] = 'No se pudo desactivar la producto, intente nuevamente';
        }
    } else {
        $_SESSION['MensajeError'] = 'Operación incorrecta.';
    }
}
else {
    $_SESSION['MensajeError'] = 'Parametros incorrectos para realizar esta funcionalidad';
}
header("Location: ../producto.php");
exit;

?>