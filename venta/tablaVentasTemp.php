<?php
    session_start();

    //print_r($_SESSION['tablaComprasTemp']);


?>
<h4>Hacer venta</h4>
<h4><div id="nombreClienteVenta"></div></h4>
<table class="table-bordered table-hover table-condensed" style="text-align:center;">
	<caption>
		<span class="btn btn-success"> 
			Generar venta $
		</span>
	</caption>
	<tr>
		<td>Nombre Producto</td>
		<td>Precio</td>
		<td>Cantidad</td>
		<td>Quitar</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>


<script type="text/javascript">
	console.log("Tabla ventas temp")
</script>