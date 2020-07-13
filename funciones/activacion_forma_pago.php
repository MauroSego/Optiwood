<?php

require_once '../funciones/conexion.inc.php';
require_once '../funciones/funciones_BD.inc.php';

if(!empty($_GET['IdFormaPago']) && is_numeric($_GET['IdFormaPago']) && $_GET['IdFormaPago'] > 0 && !empty($_GET['Accion'])){
    $IdFormaPago = $_GET['IdFormaPago'];

    if($_GET['Accion'] == 'Desactivar'){
        $Activo = 0;

        if(Activacion_forma_pago($Activo, $IdFormaPago) != false){
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
header('Location: ../formas_pago.php');
exit;

?>