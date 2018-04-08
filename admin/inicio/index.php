
<?php include '../extend/header.php'; 
#10.11 pagina de inicio
$sel = $con->prepare("SELECT propiedad FROM inventario WHERE operacion = ?");
$sel->bind_param('s', $operacion);

?>

<div class="row">
	<div class="col s12 m6 l6">
		<div class="card blue-grey darken-1">
			<div class="card-content">
				<span class="card-title white-text"><b>Venta</b> </span>
				<h2 align="center" class="white-text">
					<?php
						$operacion = 'VENTA';
						$sel->execute();
						$res_venta = $sel->get_result();
						echo mysqli_num_rows($res_venta);
					?>
				</h2>
			</div>
			<div class="card-action">
				<a href="../propiedades/index.php?ope=VENTA">ver mas...</a>
			</div>
		</div>
	</div>

	<div class="col s12 m6 l6">
		<div class="card blue-grey darken-1">
			<div class="card-content">
				<span class="card-title white-text"><b>Renta</b> </span>
				<h2 align="center" class="white-text">
					<?php
						$operacion = 'RENTA';
						$sel->execute();
						$res_renta = $sel->get_result();
						echo mysqli_num_rows($res_renta);
					?>
				</h2>
			</div>
			<div class="card-action">
				<a href="../propiedades/index.php?ope=RENTA">ver mas...</a>
			</div>
		</div>
	</div>

	<div class="col s12 m6 l6">
		<div class="card blue-grey darken-1">
			<div class="card-content">
				<span class="card-title white-text"><b>Traspaso</b> </span>
				<h2 align="center" class="white-text">
					<?php
						$operacion = 'TRASPASO';
						$sel->execute();
						$res_traspaso = $sel->get_result();
						echo mysqli_num_rows($res_traspaso);
					?>
				</h2>
			</div>
			<div class="card-action">
				<a href="../propiedades/index.php?ope=TRASPASO">ver mas...</a>
			</div>
		</div>
	</div>

	<div class="col s12 m6 l6">
		<div class="card blue-grey darken-1">
			<div class="card-content">
				<span class="card-title white-text"><b>Ocupado</b> </span>
				<h2 align="center" class="white-text">
					<?php
						$operacion = 'OCUPADO';
						$sel->execute();
						$res_ocupado = $sel->get_result();
						echo mysqli_num_rows($res_ocupado);
					?>
				</h2>
			</div>
			<div class="card-action">
				<a href="../propiedades/index.php?ope=OCUPADO">ver mas...</a>
			</div>
		</div>
	</div>
</div>

<?php include '../extend/scripts.php'; ?>

</body>
</html>
