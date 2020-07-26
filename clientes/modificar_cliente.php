<!DOCTYPE html>
<html lang="en">
<?php
/*
session_start();

if(empty($_SESSION['NOMBRE'])){
    header('Location: login.php');
    exit;
}
*/
require_once '../funciones/conexion.inc.php';

require_once '../funciones/funciones_BD.inc.php';

if(empty($_GET['IdCliente']) || !is_numeric($_GET['IdCliente'])){
	$_SESSION['MensajeError'] = "El ID de la categoría que desea modificar es incorrecto";
	/*header('Location: eliminar_cliente.php');
	exit;*/
}

if (empty($_POST['btnModifCliente'])){
	$datoCliente = TraerDatoCliente($_GET['IdCliente']);
} else {
	if(empty($_SESSION['MensajeError'])){
		if(Modificar_Cliente($_GET['IdCliente']) != false){
			echo 'Cambio';
			$_SESSION['MensajeOk'] = 'Cliente modificado correctamente';
			header('Location: eliminar_cliente.php');
			exit;
		} else {
			$_SESSION['MensajeError'] = 'No se pudo modificar al cliente seleccionado. Intente nuevamente';
		}
	}
	/*$datoCategoria['ID_CATEGORIA'] != empty($_POST['IdCategoria'])?$_POST['IdCategoria']:'';
	$datoCategoria['CATEGORIA'] != empty($_POST['nombreCategoria'])?$_POST['nombreCategoria']:'';*/
}

?>

<head>
	<?php require_once '../includes/header.inc.php'; ?>
	<!-- Title Page-->
	<title>Optiwood - Eliminar Categoria</title>
	
</head>

<body class="animsition">
    <div class="page-wrapper">        
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="../assets/img/logo.png" alt="Optiwood" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="registrar_cliente.php">
                                <i class="fas fa-table"></i>Registrar cliente</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="eliminar_cliente.php">
                                <i class="fas fa-table"></i>Eliminar/modificar cliente</a>
                        </li>
                       
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap row justify-content-end">
                            <!--<form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>-->
                            <div class="header-button col-5">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                            <!-- Acá va estar la notificacion de stock -->
                                                <p>You have 2 news message</p>
                                            </div>                                           
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <!--<div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>-->
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Nombre Apellido<?php /*echo $_SESSION['NOMBRE']; */?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <!--<div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>-->
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"> Nombre Apellido <?php/* echo $_SESSION['NOMBRE']; */?></a>
                                                    </h5>
                                                    <span class="email">Usuario<?php /* echo $_SESSION['MAIL']; */?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="funciones/cerrar_sesion.php">
                                                    <i class="zmdi zmdi-power"></i>Salir</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                           
                            
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Modificar cliente</strong> 
                                    </div>
                                    <div class="card-body card-block">
										<form method="post" action="modificar_cliente.php?IdCliente=<?php echo $_GET['IdCliente'];?>">
											<?php if(!empty($_SESSION['MensajeError'])){ ?> 
											<div style="color: red;">
												<?php echo $_SESSION['MensajeError']; ?>
											</div>
											<?php } ?>
											<?php if(!empty($_SESSION['MensajeOk'])){ ?> 
											<div style="color: #13b54c;">
												<?php echo $_SESSION['MensajeOk']; ?>
											</div>
											<?php } ?>
											<strong><label for="IdCliente">ID Cliente: </label></strong>
											<input class="form-control" type="text" name="IdCliente" value="<?php echo $datoCliente['ID_CLIENTE']; ?>"/>
											<strong><label for="nombreCliente">Nombre: </label></strong>
                                            <input class="form-control" type="text" name="nombreCliente" value="<?php echo $datoCliente['NOMBRE']; ?>"/>
                                            <strong><label for="apellidoCliente">Apellido: </label></strong>
                                            <input class="form-control" type="text" name="apellidoCliente" value="<?php echo $datoCliente['APELLIDO']; ?>"/>
                                            <strong><label for="domicilioCliente">Nombre: </label></strong>
                                            <input class="form-control" type="text" name="domicilioCliente" value="<?php echo $datoCliente['DOMICILIO']; ?>"/>
                                            <strong><label for="dniCliente">Nombre: </label></strong>
                                            <input class="form-control" type="text" name="dniCliente" value="<?php echo $datoCliente['DNI']; ?>"/>
                                            <strong><label for="telefonoCliente">Nombre: </label></strong>
                                            <input class="form-control" type="text" name="telefonoCliente" value="<?php echo $datoCliente['TELEFONO']; ?>"/>
											<br/>
                                            <input type="submit" class="btn btn-primary" name="btnModifCliente" value="Modificar cliente"/>											
										</form>
                                    </div>
                                  
                                </div>
                                
                            </div>
                         
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php require_once '../includes/javascript.inc.php'; ?>

</body>

</html>
<!-- end document-->
