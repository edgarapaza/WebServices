<?php
require_once "../Model/ListaPendientes.model.php";

$pendientes = new ListaPendientes();
$datos = $pendientes->MostrarLista();

$row['idauto']="M13";

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Nuevas Solicitudes</title>
	<link rel="stylesheet" href="css/solicitudes.css">
</head>
<body>
	<div class="header">
		<H3>Menu Conductor</H3>
		<div class="title">
			<span>*</span>
			<p class="subtitle">Lista de solicitudes pendientes</p>
			<span>
				<a href="menu.html" class="mimenu">MENU</a>
			</span>
		</div>
	</div>

	<?php 
		while ($row = $datos->fetch_array()) {
	?>
	<div class="content-pedidos">
		<div class="pedido_imagen">
			<div class="movilidad">Mov</div>
			<span class="etiqueta"><?php echo $row[1]; ?></span>
		</div>
		<div class="pedidos_detalles">
			<span class="etiqueta">Direccion:</span>
			<p><?php echo $row[3]; ?></p>
			<span class="etiqueta">Referencia:</span>
			<p><?php echo $row[4]; ?></p>
			<span class="etiqueta">Tipo Unidad:</span>
			<p><?php echo $row[5]; ?></p>
			<p>
				<a href="../Control/aceptar.control.php?idpedir=<?php echo $row[0]; ?>&idauto=<?php echo 'M14';?>" class="boton-principal">Aceptar servicio</a>
			</p>
		</div>
	</div>

	<?php } ?>
	
	
	
</body>
</html>