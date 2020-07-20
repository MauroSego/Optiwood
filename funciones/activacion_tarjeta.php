<?php

require_once '../funciones/conexion.inc.php';
require_once '../funciones/funciones_BD.inc.php';

if(!empty($_GET['IdTarjeta']) && is_numeric($_GET['IdTarjeta']) && $_GET['IdTarjeta'] > 0 && !empty($_GET['Accion'])){
    $IdTarjeta = $_GET['IdTarjeta'];

    if($_GET['Accion'] == 'Desactivar'){
        $Activo = 0;

        if(Activacion_tarjeta($Activo, $IdTarjeta) != false){
            $_SESSION['MensajeOk'] = 'Tarjeta eliminada correctamente';
        } else {
            $_SESSION['MensajeError'] = 'No se pudo desactivar la tarjeta, intente nuevamente';
        }
    } else {
        $_SESSION['MensajeError'] = 'Operación incorrecta.';
    }
} else {
    $_SESSION['MensajeError'] = 'Parametros incorrectos para realizar esta funcionalidad';
}
header('Location: ../tarjeta.php');
exit;

?>