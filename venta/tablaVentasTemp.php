<?php
    session_start();

    //print_r($_SESSION['tablaComprasTemp']);


?>
<h4>Hacer venta</h4>
<h4><strong><div id="nombreClienteVenta"></div></strong></h4>
<table class="table-bordered table-hover table-condensed" style="text-align:center;">
	<caption>
		<span class="btn btn-success" onclick="crearVenta()">Generar venta $</span>
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
		$i=0;
		foreach (@$_SESSION['tablaComprasTemp'] as $key) {

			$d=explode("||", @$key);
		
	?>
	<tr>
		<td><?php echo $d[1] ?></td>
		<td><?php echo '$'.$d[2] ?></td>
		<td><?php echo 1 ?></td>
		<td>
			<span class="btn btn-danger" onclick="quitarP('<?php echo $i;?>')">
				<strong>x</strong>
			</span>
		</td>
	</tr>
	<?php
		$cliente = $d[4];
		$total = $total + $d[2];
		$i++;

	} 
	endif;
	?>
	<tr>
		<td>Total de venta: <?php echo '$'.$total; ?></td>
	</tr>
</table>
<script type="text/javascript">
	$(document).ready(function(){
		nombre = "<?php echo @$cliente ?>"
		$('#nombreClienteVenta').text("Nombre del cliente: " + nombre);
	})
</script>


<script type="text/javascript">
	console.log("Tabla ventas temp")
</script>