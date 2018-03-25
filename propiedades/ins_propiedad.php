<!--11 foreach para formularios con muchos campos -->
<?php 
include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	foreach ($_POST as $campo => $valor) {
		$variable = "$" . $campo. "='".htmlentities($valor)."';";
		eval($variable);
	}
	echo $nombre_cliente;
	echo "<br>";
	echo $fecha_registro;
	$con->close();
}else {
	header('location:../extend/alerta.php?msj=USO INDEVIDO DEL SISTEMA&c=salir&p=salir&t=error');
}

?>