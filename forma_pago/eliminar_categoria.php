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
                            <a class="js-arrow" href="../categoria/registrar_categoria.php">
                                <i class="fas fa-table"></i>Registrar categoría</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-table"></i>Editar categoría</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="eliminar_categoria.php">
                                <i class="fas fa-table"></i>Eliminar categoría</a>
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
                                        <strong>Registrar categorías</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <?php 
                                        $listado = ListarCategorias();

                                        if(!empty($listado)){
                                            $cantCategorias = count($listado);
                                            ?>
                                            <h3>Listado de categorias</h3>
                                            <table class="table">
                                                <tr>
                                                    <th>ID categoria</th>
                                                    <th>Categoria</th>
                                                    <th>Editar</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                                <?php for($i = 0; $i < $cantCategorias; $i++){ ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $listado[$i]['ID_CATEGORIA']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $listado[$i]['CATEGORIA']; ?>
                                                    </td>
                                                    <td>
                                                        <a href="modificar_categoria.php?IdCategoria=<?php echo $listado[$i]['ID_CATEGORIA']; ?>">Editar</a>
                                                    </td>
                                                    <td>
                                                        <a href="../funciones/activacion_categoria.php?Accion=Desactivar&IdCategoria=<?php echo $listado[$i]['ID_CATEGORIA']; ?>" onclick="javascript: if (confirm('Confirma eliminar este registro?')){return true;} else {return false;}">Eliminar</a>
                                                    </td>
                                                </tr>
                                            <?php    
                                            }
                                            ?>
                                            </table>
                                        <?php
                                        } else {
                                            echo 'No hay categorías cargadas';
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

    <?php require_once '../includes/javascript.inc.php'; ?>

</body>

</html>
<!-- end document-->
