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

if(empty($_GET['IdTarjeta']) || !is_numeric($_GET['IdTarjeta'])){
	$_SESSION['MensajeError'] = "El ID de la tarjeta que desea modificar es incorrecto";
	//header('Location: ../tarjeta.php');
	//exit;
}

if (empty($_POST['btnModifTarjeta'])){
	$datoTarjeta = TraerDatoTarjeta($_GET['IdTarjeta']);
} else {
	if(empty($_SESSION['MensajeError'])){
		if(Modificar_Tarjeta($_GET['IdTarjeta']) != false){
			$_SESSION['MensajeOk'] = 'Tarjeta modificada correctamente';
			header('Location: ../tarjeta.php');
			exit;
		} else {
			$_SESSION['MensajeError'] = 'No se pudo modificar la tarjeta seleccionada. Intente nuevamente';
		}
	}
	/*$datoCategoria['ID_CATEGORIA'] != empty($_POST['IdCategoria'])?$_POST['IdCategoria']:'';
	$datoCategoria['CATEGORIA'] != empty($_POST['nombreCategoria'])?$_POST['nombreCategoria']:'';*/
}

?>

<head>
	<?php require_once '../includes/header.inc.php'; ?>
	<!-- Title Page-->
	<title>Optiwood - Modificar tarjeta</title>
	
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                            <img src="assets/img/logo.png" alt="Optiwood" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        
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
                            <a class="js-arrow" href="registrar_banco.php">
                                <i class="fas fa-table"></i>Registrar tarjeta</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="../banco.php">
                                <i class="fas fa-table"></i>Eliminar/modificar tarjeta</a>
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
                                        <strong>Modificar tarjeta</strong> 
                                    </div>
                                    <div class="card-body card-block">
										<form method="post" action="modificar_tarjeta.php?IdTarjeta=<?php echo $_GET['IdTarjeta'];?>">
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
											<strong><label for="nombreTarjeta">Tarjeta: </label></strong>
                                            <input class="form-control" type="text" name="nombreTarjeta" value="<?php echo $datoTarjeta['TARJETA']; ?>"/>
                                            <strong><label for="idFormaPago">Forma de pago: </label></strong>
                                            <?php
                                                $linkConexion = conexionBD();
                                                $consultaFP = "select id_forma_pago, dsc_forma_pago from forma_pago where activo=1 order by id_forma_pago;";
                                                $rsFormaPago = mysqli_query($linkConexion, $consultaFP);
                                            ?>
                                            <select name="idFormaPago" id="idFormaPago" class="form-control">
                                                <?php 
                                                    while($data = mysqli_fetch_array($rsFormaPago)){
                                                        echo "<option value='".$data['id_forma_pago']."' selected='".$datoTarjeta['ID_FORMA_PAGO']."'>".$data['dsc_forma_pago']."</option>";
                                                    }
                                                ?>
                                            </select>
                                            <strong><label for="idBanco">Banco: </label></strong>
                                            <?php
                                                $consultaBanco = "select id_banco, dsc_banco from banco where activo=1 order by id_banco";
                                                $rsBanco = mysqli_query($linkConexion, $consultaBanco);
                                            ?>
                                            <select name="idBanco" id="idBanco" class="form-control">
                                            <?php
                                                while($data = mysqli_fetch_array($rsBanco)){
                                                    echo "<option value='".$data['id_banco']."' selected='".$datoTarjeta['ID_BANCO']."'>".$data['dsc_banco']."</option>";
                                                }

                                            ?>
                                            </select>
                                            
                                            <input type="submit" class="btn btn-primary" name="btnModifTarjeta" value="Modificar Tarjeta"/>
                                            
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
