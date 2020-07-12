<?php

require_once '../funciones/conexion.inc.php';
require_once '../funciones/funciones_BD.inc.php';

if(!empty($_GET['IdCategoria']) && is_numeric($_GET['IdCategoria']) && $_GET['IdCategoria'] > 0 && !empty($_GET['Accion'])){
    $IdCategoria = $_GET['IdCategoria'];

    if($_GET['Accion'] == 'Desactivar'){
        $Activo = 0;

        if(Activacion_categoria($Activo, $IdCategoria) != false){
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
header('Location: ../categoria/eliminar_categoria.php');
exit;

?>