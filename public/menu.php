<?php
session_start();
if($_SESSION['conductor']){
	require "../Model/Listados.model.php";
	$listas = new Listas();
	$data = $listas->ServiciosAbiertosTodos();

	$num = $data->num_rows;

	include "./inc/header.php";
?>
<div class="container">
	<div class="row">
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
	</div>

	<div class="row">
		<h1>Bienvenido</h1>
		<div class="collection">
			<a href="#!" class="collection-item"><span class="badge"><?php echo $num; ?></span>Pedidos Delivery</a>
			<a href="#!" class="collection-item"><span class="new badge"><?php echo $num; ?></span>Nuevas Solicitudes</a>
			<a href="#!" class="collection-item"><span class="badge"><?php echo $num; ?></span>Reserva</a>
			
		</div>
		Tenemos <span class="numero"></span> nuevas solicitudes de movilidad
		<div class="row">
				<div class="col s12 m6">
					<div class="card blue-grey darken-1">
						<div class="card-content white-text">
							<span class="card-title">5 Pedidos de Taxi</span>
							<p>Ver la lista completa</p>
						</div>
						<div class="card-action">
							<a href="newSolicitudes.php">Ver Lista</a>
							<a href="#">Cerrar</a>
						</div>
					</div>
				</div>
  				
		</div>

		<div class="row">
				<div class="col s12 m6">
					<div class="card teal darken-2">
						<div class="card-content white-text">
							<span class="card-title">11 Pedidos Delivery </span>
							<p>Ver la lista completa</p>
						</div>
						<div class="card-action">
							<a href="newSolicitudes.php">Ver Lista</a>
							<a href="#">Cerrar</a>
						</div>
					</div>
				</div>
  				
		</div>

		<div class="row">
				<div class="col s12 m6">
					<div class="card pink darken-3">
						<div class="card-content white-text">
							<span class="card-title">2 Reservas de Vehiculos </span>
							<p>Ver la lista completa</p>
						</div>
						<div class="card-action">
							<a href="newSolicitudes.php">Ver Lista</a>
							<a href="#">Cerrar</a>
						</div>
					</div>
				</div>
  				
		</div>

			<br/>
			<a href="nocerradas.php" class="btn">Servicio en Curso</a>
			<br/>
			<a href="concluidos.php" class="btn">Servicios Concluidos</a>

		</div>
	</div>
</div>
	

<?php
include "./inc/footer.php";
}else{
	header("Location: ../index.html");
}
?>