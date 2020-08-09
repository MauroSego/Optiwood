<?php
	require_once '../funciones/conexion.inc.php';
	require_once '../funciones/funciones_BD.inc.php';
	require_once '../vistas/dependencias.php'
?>
<div class="row">
  <div class="col-lg-4">
      <form id="frmVentaProductos">
        <!--Cliente-->
        <label for="idCliente">Cliente</label>
        <?php 
        $linkConexion = conexionBD();
        $consultaCliente = "SELECT id_cliente, nombre, apellido FROM cliente where activo=1 order by apellido asc";
        $rsCliente=mysqli_query($linkConexion, $consultaCliente);
        ?> 
        <select class="form-control" name="idCliente" id="idCliente">
          <option value="A">Selecciona</option>
          <option value="0">Sin Cliente</option>
          <?php 
          while($data = mysqli_fetch_array($rsCliente)){
              echo "<option value='".$data['id_cliente']."'>".$data['apellido'] . ' '. $data['nombre']."</option>";
          }
          ?>
        </select>
        <!--Producto-->
        <?php
        $consultaProducto = "SELECT id_producto, dsc_producto, precio, stock FROM producto where activo=1 order by dsc_producto asc";
        $rsProducto=mysqli_query($linkConexion, $consultaProducto)
        ?>
        <label for="idProducto">Producto</label>
        <select class="form-control" name="idProducto" id="idProducto">
          <option value="-1">Selecciona</option>
          <?php 
          while($data = mysqli_fetch_array($rsProducto)){
              echo "<option value='".$data['id_producto']."'>".$data['dsc_producto']."</option>";
          }
          ?>
        </select>
        <label for="precio">Precio</label>
        <input type="text" readonly="" class="form-control input-sm" id="precio" name="precio">
        <label for="stock">Stock</label>
        <input type="text" readonly="" class="form-control input-sm" id="stock" name="stock">
        <span class="btn btn-primary" name="btnAgregarArticulo" id="btnAgregarArticulo">Agregar Producto</span> 
        <span class="btn btn-danger" id="btnVaciarVentas">Vaciar ventas</span>
      </form>      
	</div>
	<div class="col-lg-8">
	  <div id="tablaVentasTempLoad"></div>
	</div>	
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaVentasTempLoad').load("venta/tablaVentasTemp.php");
		//funcion llenar formulario
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
      console.log('click agregar art');
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
        	console.log('Agregó producto');
          $('#tablaVentasTempLoad').load("venta/tablaVentasTemp.php");
        } 
      })
    });

    $('#btnVaciarVentas').click(function(){
    	$.ajax({
        url:'venta/vaciarTemp.php',
        success:function(r){
        	$('#tablaVentasTempLoad').load("venta/tablaVentasTemp.php");
        } 
      })
    });
    
	})
</script>
<script type="text/javascript">
	function quitarP(index){
		$.ajax({
        type:"POST",
        data: "ind="+index,
        url:'venta/quitarproducto.php',
        success:function(r){
        	$('#tablaVentasTempLoad').load("venta/tablaVentasTemp.php");
        	alert("Se quitó el producto");
        } 
      })
	}

	function crearVenta(){
		console.log('ejecutó creacion venta');
			$.ajax({
				url:"venta/crearVenta.php",
				success:function(r){
					if(r > 0){
						$('#tablaVentasTempLoad').load("venta/tablaVentasTemp.php");
						$('#frmVentaProductos')[0].reset();
						alert('Venta creada exitosamente, consulte la información en Ventas Hechas');
					} else if(r == 0){
						alert('No hay lista de venta');
					} else {
						console.log(r, typeof(r));
						alert('No se pudo crear la venta');
					}
				}
			});
	}
</script>