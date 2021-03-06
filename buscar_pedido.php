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

require_once 'funciones/conexion.inc.php';
require_once 'funciones/funciones_BD.inc.php';

$pedido = array();

if(!empty($_POST['BtnBuscarPedido'])){
    $_POST['Pedido'] = trim($_POST['Pedido']);

    if(!empty($_POST['Pedido'])){
        $pedido = buscarPedido($_POST['Pedido']);
        /* --- Poner mensaje de error --- 
        if(!empty($pedido)){
            echo 'Se encontró registro';
        } else {
            echo 'No se encontró registro';
        }*/
    }
}
?>

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Optiwood</title>

    <!-- Fontfaces CSS-->
    <link href="assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets/css/theme.css" rel="stylesheet" media="all">

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
        </header>
        <!-- END HEADER MOBILE-->       
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="assets/img/logo.png" alt="Optiwood" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="listado.php">
                                <i class="fas fa-table"></i>Ingreso de pedido</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="buscar_pedido.php">
                                <i class="fas fa-table"></i>Buscar pedido</a>
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
                                        <strong>Bucar pedido</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form method="post">
                                            <div class="form-group">
                                                <label>Pedido:</label>
                                                <input class="form-control" type="text" name="Pedido" id="pedido" value="">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-default" name="BtnBuscarPedido" value="Buscar Pedido">
                                            </div>
                                        </form>
                                        <?php
                                            if(!empty($_POST['BtnBuscarPedido'])){
                                                $_POST['Pedido'] = trim($_POST['Pedido']);
                                                if(!empty($_POST['Pedido'])){
                                                    $pedido = buscarPedido($_POST['Pedido']);
                                                    if(!empty($pedido)){
                                                        $cantDatos = count($pedido);
                                                        for($i = 0; $i<$cantDatos; $i++) {
                                                            ?>
                                            <ul class="list-group">
                                                <li class="list-group-item">Nro. Pedido: <span> <?php echo $pedido[$i]['IDPEDIDO'] ?> </span></li>
                                                <li class="list-group-item">Producto: <span> <?php echo $pedido[$i]['IDPRODUCTO'] ?> </span></li>
                                                <li class="list-group-item">Cantidad: <span> <?php echo $pedido[$i]['CANTIDAD'] ?> </span></li>
                                                <li class="list-group-item">Estado: <span> <?php echo $pedido[$i]['IDESTADOPEDIDO'] ?> </span></li>
                                                <li class="list-group-item">Cliente: <span> <?php echo $pedido[$i]['IDPERSONA'] ?> </span></li>
                                                <li class="list-group-item">Domicilio: <span> <?php echo $pedido[$i]['IDDOMICILIO'] ?> </span></li>
                                            </ul>
                                            <?php
                                                        }
                                                    } else { ?>
                                                    <div class="alert alert-danger">
                                                        <span>No se encuentra el número de pedido pedido.</span>
                                                    </div>
                                                    <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        
                                    </div>
                                  
                                </div>
                                
                            </div>
                         
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="assets/vendor/slick/slick.min.js">
    </script>
    <script src="assets/vendor/wow/wow.min.js"></script>
    <script src="assets/vendor/animsition/animsition.min.js"></script>
    <script src="assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="assets/vendor/js/main.js"></script>

</body>

</html>
<!-- end document-->
