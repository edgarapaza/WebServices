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
	
	
	<table width="100%" class="table">
		<tbody>
			<?php 
				while ($row = $datos->fetch_array()) {
			?>
			<tr>
				<td width="60px;">
					<div class="movilidad">Mov</div>
					<?php echo $row[1]; ?>
				</td>
				<td class="caja1">
					<p>
						<span class="etiqueta">Direccion:</span>
						<?php echo $row[3]; ?>
					</p>
					<p>
						<span class="etiqueta">Referencia:</span>
						<?php echo $row[4]; ?>
					</p>
					<p>
						<span class="etiqueta">Tipo Unidad:</span>
						<?php echo $row[5]; ?>
					</p>
					<p>
						<a href="../Control/aceptar.control.php?idpedir=<?php echo $row[0]; ?>&idauto=<?php echo 'M14';?>" class="boton-principal">Aceptar servicio</a>
					</p>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>