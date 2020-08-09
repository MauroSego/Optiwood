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
		<td>Producto</td>
		<td>Precio</td>
		<td>Cantidad</td>
		<td>Quitar</td>
	</tr>
	<?php
	$total = 0; //esta variable tendrá el total de la compra
	$cliente=""; //Esta variable guarda el nombre del cliente
	if(isset($_SESSION['tablaComprasTemp'])):
		foreach (@$_SESSION['tablaComprasTemp'] as $key) {
			$d=explode("||", @$key);
		
	?>
	<tr>
		<td><?php echo $d[1] ?></td>
		<td><?php echo $d[2] ?></td>
		<td><?php echo 1 ?></td>
		<td>
			<span class="btn btn-danger"><strong>x</strong></span>
		</td>
	</tr>
	<?php
	} 
	endif;
	?>
</table>


<script type="text/javascript">
	console.log("Tabla ventas temp")
</script>