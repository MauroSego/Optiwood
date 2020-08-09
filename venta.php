<!DOCTYPE html>
<html lang="en">
<?php
session_start();
/*

if(empty($_SESSION['NOMBRE'])){
header('Location: login.php');
exit;
}
*/
require_once 'funciones/conexion.inc.php';

require_once 'funciones/funciones_BD.inc.php';
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
<link href="assets/vendor/select2/select2.min.css" rel="stylesheet" href="text/css" >

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
<!--Librerias vistas-->
<?php require_once "vistas/dependencias.php" ?>

</head>

<body class="animsition">
<div class="page-wrapper">       
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
                    <a class="js-arrow" href="tarjeta/registrar_tarjeta.php">
                        <i class="fas fa-table"></i>Registrar Tarjeta</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-table"></i>Eliminar / Modificar tarjetas</a>
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
                              <strong>Estás en la sección de ventas</strong> 
                          </div>
                          <div class="card-body card-block col-sm-4"> 
                            <div class="row">
                              <div class="col-sm-12">
                                <span class="btn btn-success" id="ventaProductosBtn">Vender producto</span>
                              </div>
                            </div>
                            <div id="ventaProductos">
                            <!--Formulario-->
                            </div>
                          </div>
                        
                      </div>
                      
                  </div>
               
                 
              </div>
          </div>
      </div>
    </div>
  </div>

</div>

</body>

</html>
<!-- end document-->
<script src="assets/js/main.js"></script>
<script src="assets/js/funciones.js"></script>

<script type="text/javascript">
  $(document).ready(function(){

    var estadoHide = 0;
    esconderSeccionVenta();
    $('#ventaProductosBtn').click(function(){
      if(estadoHide == 0){
        console.log('mostrar');
        mostrarSeccionVenta();
        $('#ventaProductos').load('venta/ventasDeProducto.php');
        estadoHide = 1;  
      } else {
        esconderSeccionVenta();
        estadoHide =0;
      }
      
    });

    function mostrarSeccionVenta(){
      $('#ventaProductos').show();
    }
    function esconderSeccionVenta(){
      $('#ventaProductos').hide();
    }

    //$('#tablaVentasTempLoad').load("venta/tablaVentasTemp.php");

    $('#idProducto').change(function(){
        $.ajax({
            type:"POST",
            data:"idProducto=" + $('#idProducto').val(),
            url: 'venta/llenarFormProducto.php',
            success:function(r){
                var dato = jQuery.parseJSON(r);
                $('#precio').val(dato.PRECIO);
                $('#stock').val(dato.STOCK);
            }

        }) 
    });
    $('#btnAgregarArticulo').click(function(){
      vacio = validarFormVacio('frmVentaProductos');

      if(vacios>0){
          //alertify.alert("Debes completar todos los campos");
          alert("Debes completar los campos");
          return false;
      }
      datos=$('#frmVentaProductos').serialize();
      $.ajax({
        type:"POST",
        data: datos,
        url:'venta/agregaProductoTemp.php',
        success:function(r){
          $('#tablaVentasTempLoad').load("venta/tablaVentasTemp.php");
        } 
      })
    })

    
  });
</script>