<?php 
	require_once '../funciones/conexion.inc.php';
	require_once 'claseVenta.php';

	$linkconexion = conexionBD();
	$obj=new ventas();

	$SQL = "SELECT id_venta, fecha, id_cliente from venta group by id_venta";
	$result = mysqli_query($linkconexion, $SQL);

?>

<h4>Reportes y ventas</h4>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="table-responsive">
			<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
				<tr><td colspan="6">Ventas</td></tr>
				<tr>
					<td>N° Venta</td>
					<td>Fecha</td>
					<td>Cliente</td>
					<td>Total de compra</td>
					<td>Ticket</td>
					<td>Reporte</td>
				</tr>
			<?php while($verDatoVenta=mysqli_fetch_row($result)): ?> 
				<tr>
					<td> <?php echo $verDatoVenta[0]; ?> </td>
					<td> <?php echo $verDatoVenta[1]; ?> </td>
					<td> 
						<?php
							if($obj->nombreCliente($verDatoVenta[2]) == " "){
								echo "Sin Cliente";
							} else {
								echo $obj->nombreCliente($verDatoVenta[2]);
							}
						?>
					</td>
					<td>
						<?php
							echo $obj->obtenerTotal($verDatoVenta[0]);
						?>
					</td>
					<td>
						<a href="#" class="btn btn-danger btn-sm">
							Ticket
							<i class="fas fa-file-download"></i>
						</a>
					</td>
					<td>
						<a href="#" class="btn btn-danger btn-sm">
							Reporte
							<i class="fas fa-file-pdf"></i>
						</a>
					</td>
				</tr>
			<?php endwhile; ?>
			</table>
		</div>
	</div>
</div>