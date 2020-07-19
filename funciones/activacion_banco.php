<?php

require_once '../funciones/conexion.inc.php';
require_once '../funciones/funciones_BD.inc.php';

if(!empty($_GET['IdBanco']) && is_numeric($_GET['IdBanco']) && $_GET['IdBanco'] > 0 && !empty($_GET['Accion'])){
    $IdBanco = $_GET['IdBanco'];

    if($_GET['Accion'] == 'Desactivar'){
        $Activo = 0;

        if(Activacion_banco($Activo, $IdBanco) != false){
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
header('Location: ../banco.php');
exit;

?>