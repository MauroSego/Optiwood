<?php

require_once '../funciones/conexion.inc.php';
require_once '../funciones/funciones_BD.inc.php';

if(!empty($_GET['IdCliente']) && is_numeric($_GET['IdCliente']) && $_GET['IdCliente'] > 0 && !empty($_GET['Accion'])){
    $IdCliente = $_GET['IdCliente'];

    if($_GET['Accion'] == 'Desactivar'){
        $Activo = 0;

        if(activacion_cliente($Activo, $IdCliente) != false){
            $_SESSION['MensajeOk'] = 'Categoria eliminada correctamente';
        } else {
            $_SESSION['MensajeError'] = 'No se pudo desactivar la categoría, intente nuevamente';
        }
    } else {
        $_SESSION['MensajeError'] = 'Operación incorrecta.';
    }
} else {
    $_SESSION['MensajeError'] = 'Parametros incorrectos para realizar esta funcionalidad';
}
header('Location: ../clientes/eliminar_cliente.php');
exit;

?>