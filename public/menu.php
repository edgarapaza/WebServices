<?php 
require "../Model/Listados.model.php";
$listas = new Listas();
$data = $listas->ServiciosAbiertosTodos();

$num = $data->num_rows;



?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/menu.css">
	<title>Menu</title>
</head>
<body>
	<div class="header">
		<H3>Menu Conductor</H3>
		<div class="title">
			<span>*</span>
			<p class="subtitle">Lista de solicitudes pendientes</p>
			<span>
				<a href="menu.php">MENU</a>
			</span>
		</div>
	</div>
	
	<h1>Bienvenido</h1>
	<em>Eliga algunas de las herramientas</em>

	<div class="botones">
		
		<div class="nuevosMensajes">
			Tenemos <span class="numero"><?php echo $num; ?></span> nuevas solicitudes de movilidad
		</div>

		<a href="newSolicitudes.php" class="boton-principal">Nuevas Solicitudes</a>
		<br>
		<a href="nocerradas.php" class="boton-principal">Servicio en Curso</a>
		<br>
		<a href="concluidos.php" class="boton-principal">Servicios Concluidos</a>

	</div>

</body>
</html>
